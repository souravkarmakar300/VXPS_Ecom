<?php

namespace App\Services;

use Illuminate\Support\Str;
use Stripe\Checkout\Session as CheckoutSession;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
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
        $key = (string) config('services.stripe.key');

        if ($secret === '' || $key === '') {
            return true;
        }

        if (str_contains(strtolower($secret), 'dummy') || str_contains(strtolower($key), 'dummy')) {
            return true;
        }

        return false;
    }

    public function isLiveMode(): bool
    {
        if ($this->isDemoMode()) {
            return false;
        }

        $secret = (string) config('services.stripe.secret');
        $key = (string) config('services.stripe.key');

        return str_starts_with($secret, 'sk_live_')
            || str_starts_with($secret, 'rk_live_')
            || str_starts_with($key, 'pk_live_');
    }

    public function publishableKey(): string
    {
        return (string) config('services.stripe.key');
    }

    public function currency(): string
    {
        return strtolower((string) config('services.stripe.currency', 'aud'));
    }

    /**
     * Create a PaymentIntent for client-side confirmation (Stripe.js / Apple Pay).
     *
     * @param  array<string, mixed>  $metadata
     * @return array{id: string, client_secret: string, amount: int, currency: string, status: string, demo: bool}
     */
    public function createPaymentIntent(
        int $amountCents,
        ?string $currency = null,
        array $metadata = [],
        ?string $receiptEmail = null
    ): array {
        $currency = strtolower($currency ?: $this->currency());

        if ($this->isDemoMode()) {
            $id = 'pi_demo_'.Str::lower(Str::random(24));

            return [
                'id' => $id,
                'client_secret' => $id.'_secret_'.Str::lower(Str::random(16)),
                'amount' => $amountCents,
                'currency' => $currency,
                'status' => 'requires_payment_method',
                'demo' => true,
            ];
        }

        try {
            $payload = [
                'amount' => $amountCents,
                'currency' => $currency,
                // Cards + wallets (Apple Pay / Google Pay) via Stripe.js; stay on-page (3DS modal OK)
                'automatic_payment_methods' => [
                    'enabled' => true,
                    'allow_redirects' => 'never',
                ],
                'metadata' => $metadata,
            ];

            if ($receiptEmail) {
                $payload['receipt_email'] = $receiptEmail;
            }

            $intent = PaymentIntent::create($payload);

            return [
                'id' => $intent->id,
                'client_secret' => (string) $intent->client_secret,
                'amount' => (int) $intent->amount,
                'currency' => (string) $intent->currency,
                'status' => (string) $intent->status,
                'demo' => false,
            ];
        } catch (ApiErrorException|\Throwable $e) {
            throw new \RuntimeException('Unable to create Stripe PaymentIntent: '.$e->getMessage(), 0, $e);
        }
    }

    /**
     * Charge a card from checkout HTML fields.
     * Test cards map to Stripe test PaymentMethod tokens. Live raw PANs require Stripe Elements
     * (preferred) — this method is a fallback when Elements did not mount.
     *
     * @return array{ok: bool, status: string, method: string, payment_intent_id: string, message?: string}
     */
    public function chargeCard(
        int $amountCents,
        string $cardNumber,
        string $expiry,
        string $cvc,
        string $paymentMethodLabel = 'card',
        array $metadata = []
    ): array {
        $digits = preg_replace('/\D+/', '', $cardNumber) ?? '';
        $expiryDigits = preg_replace('/\D+/', '', $expiry) ?? '';
        $cvcDigits = preg_replace('/\D+/', '', $cvc) ?? '';

        if (strlen($digits) < 12 || strlen($expiryDigits) < 4 || strlen($cvcDigits) < 3) {
            return [
                'ok' => false,
                'status' => 'failed',
                'method' => $paymentMethodLabel,
                'payment_intent_id' => '',
                'message' => 'Enter a valid card number, expiry, and CVC.',
            ];
        }

        $expMonth = (int) substr($expiryDigits, 0, 2);
        $expYear = (int) substr($expiryDigits, 2);
        if ($expYear < 100) {
            $expYear += 2000;
        }

        if ($this->isDemoMode()) {
            $accepted = ['4242424242424242', '4000056655665556', '5555555555554444'];
            if (! in_array($digits, $accepted, true)) {
                return [
                    'ok' => false,
                    'status' => 'failed',
                    'method' => $paymentMethodLabel,
                    'payment_intent_id' => '',
                    'message' => 'Card declined. Use test card 4242 4242 4242 4242.',
                ];
            }

            return [
                'ok' => true,
                'status' => 'succeeded',
                'method' => $paymentMethodLabel,
                'payment_intent_id' => 'pi_demo_'.Str::lower(Str::random(16)),
            ];
        }

        try {
            $testPaymentMethod = $this->mapTestCardToPaymentMethod($digits);

            if ($testPaymentMethod) {
                $intent = PaymentIntent::create([
                    'amount' => $amountCents,
                    'currency' => $this->currency(),
                    'payment_method' => $testPaymentMethod,
                    'confirm' => true,
                    'automatic_payment_methods' => [
                        'enabled' => true,
                        'allow_redirects' => 'never',
                    ],
                    'metadata' => array_merge($metadata, [
                        'test_card_last4' => substr($digits, -4),
                        'vxps_channel' => $paymentMethodLabel,
                    ]),
                ]);
            } elseif ($this->isLiveMode()) {
                return [
                    'ok' => false,
                    'status' => 'failed',
                    'method' => $paymentMethodLabel,
                    'payment_intent_id' => '',
                    'message' => 'Live card payments require the secure Stripe card fields. Please refresh the page and try again.',
                ];
            } else {
                $paymentMethod = PaymentMethod::create([
                    'type' => 'card',
                    'card' => [
                        'number' => $digits,
                        'exp_month' => $expMonth,
                        'exp_year' => $expYear,
                        'cvc' => $cvcDigits,
                    ],
                ]);

                $intent = PaymentIntent::create([
                    'amount' => $amountCents,
                    'currency' => $this->currency(),
                    'payment_method' => $paymentMethod->id,
                    'confirm' => true,
                    'automatic_payment_methods' => [
                        'enabled' => true,
                        'allow_redirects' => 'never',
                    ],
                    'metadata' => $metadata,
                ]);
            }

            if (($intent->status ?? '') !== 'succeeded') {
                return [
                    'ok' => false,
                    'status' => (string) ($intent->status ?? 'unknown'),
                    'method' => $paymentMethodLabel,
                    'payment_intent_id' => (string) ($intent->id ?? ''),
                    'message' => 'Payment was not completed. Status: '.($intent->status ?? 'unknown'),
                ];
            }

            return [
                'ok' => true,
                'status' => 'succeeded',
                'method' => $paymentMethodLabel,
                'payment_intent_id' => (string) $intent->id,
            ];
        } catch (ApiErrorException|\Throwable $e) {
            return [
                'ok' => false,
                'status' => 'error',
                'method' => $paymentMethodLabel,
                'payment_intent_id' => '',
                'message' => 'Card charge failed: '.$e->getMessage(),
            ];
        }
    }

    /**
     * Map Stripe test card numbers to PaymentMethod tokens.
     */
    private function mapTestCardToPaymentMethod(string $digits): ?string
    {
        return match ($digits) {
            '4242424242424242' => 'pm_card_visa',
            '4000056655665556' => 'pm_card_visa_debit',
            '5555555555554444' => 'pm_card_mastercard',
            '2223003122003222' => 'pm_card_mastercard',
            '378282246310005' => 'pm_card_amex',
            '6011111111111117' => 'pm_card_discover',
            '4000000000000002' => 'pm_card_chargeDeclined',
            '4000000000009995' => 'pm_card_visa_chargeDeclinedInsufficientFunds',
            default => null,
        };
    }

    /**
     * Verify a PaymentIntent after client-side confirmation (PCI-safe — no raw card data).
     *
     * @return array{ok: bool, status: string, method: string, message?: string, payment_intent_id: string}
     */
    public function confirmPayment(
        string $paymentIntentId,
        string $paymentMethod = 'card',
        ?string $cardNumber = null
    ): array {
        $method = match ($paymentMethod) {
            'apple_pay' => 'apple_pay',
            'stripe', 'link', 'stripe_link' => 'stripe',
            default => 'card',
        };

        if ($this->isDemoMode() || str_starts_with($paymentIntentId, 'pi_demo_')) {
            if ($method === 'card' && $cardNumber !== null && $cardNumber !== '') {
                $digits = preg_replace('/\D+/', '', $cardNumber) ?? '';
                $acceptedTestCards = [
                    '4242424242424242',
                    '4000056655665556',
                    '5555555555554444',
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

        if ($paymentIntentId === '') {
            return [
                'ok' => false,
                'status' => 'missing',
                'method' => $method,
                'payment_intent_id' => '',
                'message' => 'Missing payment intent. Please try paying again.',
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

            $detectedMethod = $this->detectWalletMethod($intent) ?? $method;

            return [
                'ok' => true,
                'status' => 'succeeded',
                'method' => $detectedMethod,
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

    /**
     * @param  object|PaymentIntent  $intent
     */
    private function detectWalletMethod(object $intent): ?string
    {
        try {
            $pm = $intent->payment_method ?? null;
            if (is_string($pm) && $pm !== '') {
                $pm = \Stripe\PaymentMethod::retrieve($pm);
            }
            $wallet = $pm->card->wallet->type ?? null;
            if ($wallet === 'apple_pay') {
                return 'apple_pay';
            }
            if ($wallet === 'google_pay') {
                return 'card';
            }
            if (($pm->type ?? '') === 'link') {
                return 'stripe';
            }
        } catch (\Throwable) {
            // Fall through to caller-provided method label.
        }

        return null;
    }

    /**
     * Create a Stripe hosted Checkout Session (redirect / Apple Pay QR target).
     *
     * @param  array<int, array{name: string, amount_cents: int, quantity: int}>  $lineItems
     * @param  array<string, mixed>  $metadata
     * @return array{id: string, url: string, demo: bool}
     */
    public function createCheckoutSession(
    array $lineItems,
    string $successUrl,
    string $cancelUrl,
    ?string $customerEmail = null,
    array $metadata = []
): array {

    if ($this->isDemoMode()) {

        $id = 'cs_demo_' . Str::lower(Str::random(24));
        $token = Str::lower(Str::random(32));

        session()->put('demo_checkout_token_' . $token, [
            'session_id' => $id,
            'metadata' => $metadata,
            'email' => $customerEmail,
        ]);

        return [
            'id' => $id,
            'url' => url('/payment/demo-pay?token=' . $token),
            'demo' => true,
        ];
    }

    try {

        $stripeLineItems = [];

        foreach ($lineItems as $item) {

            $stripeLineItems[] = [
                'price_data' => [
                    'currency' => $this->currency(),

                    'product_data' => [
                        'name' => (string) ($item['name'] ?? 'VXPS Product'),
                    ],

                    'unit_amount' => (int) ($item['amount_cents'] ?? 0),
                ],

                'quantity' => max(1, (int) ($item['quantity'] ?? 1)),
            ];
        }

        $payload = [
            'mode' => 'payment',

            'line_items' => $stripeLineItems,

            'success_url' => $successUrl,

            'cancel_url' => $cancelUrl,

            'metadata' => $metadata,

            'payment_intent_data' => [
                'metadata' => $metadata,
            ],
        ];

        if ($customerEmail) {
            $payload['customer_email'] = $customerEmail;
        }

        // Create Stripe Checkout Session
        // Payment methods are managed through Stripe Dashboard.

        $session = CheckoutSession::create($payload);

        return [
            'id' => (string) $session->id,
            'url' => (string) $session->url,
            'demo' => false,
        ];

    } catch (\Throwable $e) {

        \Log::error('Stripe Checkout Session Error', [
            'error' => $e->getMessage(),
        ]);

        throw new \RuntimeException(
            'Unable to create Stripe Checkout Session: ' . $e->getMessage(),
            0,
            $e
        );
    }
}

    /**
     * @return array{ok: bool, id?: string, payment_intent_id?: string, payment_status?: string, customer_email?: string|null, metadata?: array<string, mixed>, message?: string}
     */
    public function retrieveCheckoutSession(string $sessionId): array
    {
        if ($this->isDemoMode() || str_starts_with($sessionId, 'cs_demo_')) {
            return [
                'ok' => true,
                'id' => $sessionId,
                'payment_intent_id' => 'pi_demo_'.Str::lower(Str::random(16)),
                'payment_status' => 'paid',
                'customer_email' => null,
                'metadata' => [],
            ];
        }

        try {
            $session = CheckoutSession::retrieve($sessionId);

            return [
                'ok' => true,
                'id' => (string) $session->id,
                'payment_intent_id' => is_string($session->payment_intent)
                    ? $session->payment_intent
                    : (string) ($session->payment_intent->id ?? ''),
                'payment_status' => (string) ($session->payment_status ?? ''),
                'customer_email' => $session->customer_details->email
                    ?? $session->customer_email
                    ?? null,
                'metadata' => (array) ($session->metadata?->toArray() ?? []),
            ];
        } catch (ApiErrorException|\Throwable $e) {
            return [
                'ok' => false,
                'message' => 'Unable to verify Stripe Checkout Session: '.$e->getMessage(),
            ];
        }
    }
}
