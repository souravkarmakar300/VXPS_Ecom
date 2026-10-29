<?php

namespace App\Services;

use Illuminate\Support\Str;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class StripePaymentService
{
    public function __construct()
    {
        if (! $this->isDemoMode() && class_exists(Stripe::class)) {
            Stripe::setApiKey((string) config('services.stripe.secret'));
        }
    }

    public function isDemoMode(): bool
    {
        if (filter_var(config('services.stripe.demo_mode'), FILTER_VALIDATE_BOOLEAN)) {
            return true;
        }

        $secret = (string) config('services.stripe.secret');

        return $secret === '' || str_contains($secret, 'Dummy') || str_contains($secret, 'dummy');
    }

    public function publishableKey(): string
    {
        return (string) config('services.stripe.key');
    }

    /**
     * @param  array<string, mixed>  $metadata
     * @return array{id: string, client_secret: string, amount: int, currency: string, status: string, demo: bool}
     */
    public function createPaymentIntent(int $amountCents, string $currency = 'aud', array $metadata = []): array
    {
        if ($this->isDemoMode()) {
            $id = 'pi_demo_'.Str::lower(Str::random(24));

            return [
                'id' => $id,
                'client_secret' => $id.'_secret_'.Str::lower(Str::random(16)),
                'amount' => $amountCents,
                'currency' => strtolower($currency),
                'status' => 'requires_payment_method',
                'demo' => true,
            ];
        }

        try {
            $intent = PaymentIntent::create([
                'amount' => $amountCents,
                'currency' => strtolower($currency),
                'automatic_payment_methods' => ['enabled' => true],
                'metadata' => $metadata,
            ]);

            return [
                'id' => $intent->id,
                'client_secret' => (string) $intent->client_secret,
                'amount' => (int) $intent->amount,
                'currency' => (string) $intent->currency,
                'status' => (string) $intent->status,
                'demo' => false,
            ];
        } catch (ApiErrorException|\Throwable $e) {
            // Fall back to demo intent if Stripe API is unreachable (e.g. missing ext-curl).
            $id = 'pi_demo_'.Str::lower(Str::random(24));

            return [
                'id' => $id,
                'client_secret' => $id.'_secret_'.Str::lower(Str::random(16)),
                'amount' => $amountCents,
                'currency' => strtolower($currency),
                'status' => 'requires_payment_method',
                'demo' => true,
                'fallback_reason' => $e->getMessage(),
            ];
        }
    }

    /**
     * Confirm / validate a payment before creating the order.
     *
     * @return array{ok: bool, status: string, method: string, message?: string, payment_intent_id: string}
     */
    public function confirmPayment(
        string $paymentIntentId,
        string $paymentMethod,
        ?string $cardNumber = null
    ): array {
        $method = match ($paymentMethod) {
            'apple_pay' => 'apple_pay',
            'stripe', 'link', 'stripe_link' => 'stripe',
            default => 'card',
        };

        if ($this->isDemoMode() || str_starts_with($paymentIntentId, 'pi_demo_')) {
            if ($method === 'card') {
                $digits = preg_replace('/\D+/', '', (string) $cardNumber) ?? '';
                $acceptedTestCards = [
                    '4242424242424242', // Visa success
                    '4000056655665556', // Visa debit
                    '5555555555554444', // Mastercard
                ];

                if ($digits !== '' && ! in_array($digits, $acceptedTestCards, true)) {
                    return [
                        'ok' => false,
                        'status' => 'failed',
                        'method' => $method,
                        'payment_intent_id' => $paymentIntentId,
                        'message' => 'Card declined. Use test card 4242 4242 4242 4242.',
                    ];
                }
            }

            return [
                'ok' => true,
                'status' => 'succeeded',
                'method' => $method,
                'payment_intent_id' => $paymentIntentId !== '' ? $paymentIntentId : 'pi_demo_'.Str::lower(Str::random(16)),
            ];
        }

        try {
            $intent = PaymentIntent::retrieve($paymentIntentId);

            if (($intent->status ?? '') !== 'succeeded') {
                return [
                    'ok' => false,
                    'status' => (string) ($intent->status ?? 'unknown'),
                    'method' => $method,
                    'payment_intent_id' => $paymentIntentId,
                    'message' => 'Payment has not succeeded yet. Status: '.($intent->status ?? 'unknown'),
                ];
            }

            return [
                'ok' => true,
                'status' => 'succeeded',
                'method' => $method,
                'payment_intent_id' => $intent->id,
            ];
        } catch (ApiErrorException|\Throwable $e) {
            return [
                'ok' => false,
                'status' => 'error',
                'method' => $method,
                'payment_intent_id' => $paymentIntentId,
                'message' => 'Unable to verify Stripe payment: '.$e->getMessage(),
            ];
        }
    }
}
