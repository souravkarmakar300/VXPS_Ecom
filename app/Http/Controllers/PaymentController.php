<?php

namespace App\Http\Controllers;

use App\Services\StripePaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(
        private readonly StripePaymentService $stripe
    ) {}

    /**
     * Create a Stripe PaymentIntent for the current cart total.
     */
    public function createIntent(Request $request): JsonResponse
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return response()->json([
                'success' => false,
                'message' => 'Your shopping cart is empty.',
            ], 422);
        }

        $subtotal = 0.0;
        foreach ($cart as $item) {
            $subtotal += ((float) ($item['price'] ?? 0)) * ((int) ($item['quantity'] ?? 1));
        }

        $shippingCost = ($subtotal >= 79.0) ? 0.00 : 9.95;
        $grandTotal = max(0.0, $subtotal + $shippingCost);
        $amountCents = (int) round($grandTotal * 100);

        if ($amountCents < 50) {
            return response()->json([
                'success' => false,
                'message' => 'Order total is too low to process payment.',
            ], 422);
        }

        $intent = $this->stripe->createPaymentIntent($amountCents, 'aud', [
            'source' => 'vxps_checkout',
            'customer_email' => (string) $request->input('email', ''),
        ]);

        session()->put('checkout_payment_intent_id', $intent['id']);
        session()->put('checkout_payment_amount', $amountCents);

        return response()->json([
            'success' => true,
            'demo' => (bool) ($intent['demo'] ?? false),
            'publishable_key' => $this->stripe->publishableKey(),
            'payment_intent_id' => $intent['id'],
            'client_secret' => $intent['client_secret'],
            'amount' => $grandTotal,
            'amount_cents' => $amountCents,
            'currency' => 'aud',
            'fallback_reason' => $intent['fallback_reason'] ?? null,
        ]);
    }

    /**
     * Demo / wallet confirmation endpoint (Apple Pay, Link, Card).
     */
    public function confirm(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'payment_intent_id' => ['nullable', 'string', 'max:120'],
            'payment_method' => ['required', 'string', 'in:card,apple_pay,link,stripe,stripe_link'],
            'card_number' => ['nullable', 'string', 'max:30'],
            'card_expiry' => ['nullable', 'string', 'max:10'],
            'card_cvc' => ['nullable', 'string', 'max:4'],
        ]);

        $intentId = $validated['payment_intent_id']
            ?? session('checkout_payment_intent_id')
            ?? '';

        if ($validated['payment_method'] === 'card') {
            $request->validate([
                'card_number' => ['required', 'string', 'min:12'],
                'card_expiry' => ['required', 'string', 'min:4'],
                'card_cvc' => ['required', 'string', 'min:3'],
            ]);
        }

        $result = $this->stripe->confirmPayment(
            (string) $intentId,
            $validated['payment_method'],
            $validated['card_number'] ?? null
        );

        if (! $result['ok']) {
            return response()->json([
                'success' => false,
                'message' => $result['message'] ?? 'Payment failed.',
                'status' => $result['status'],
            ], 422);
        }

        session()->put('checkout_payment_intent_id', $result['payment_intent_id']);
        session()->put('checkout_payment_method', $result['method']);
        session()->put('checkout_payment_confirmed', true);

        return response()->json([
            'success' => true,
            'message' => 'Payment authorised successfully.',
            'payment_intent_id' => $result['payment_intent_id'],
            'payment_method' => $result['method'],
            'status' => $result['status'],
            'demo' => $this->stripe->isDemoMode() || str_starts_with($result['payment_intent_id'], 'pi_demo_'),
        ]);
    }

    /**
     * Public Stripe config for the checkout page.
     */
    public function config(): JsonResponse
    {
        return response()->json([
            'publishable_key' => $this->stripe->publishableKey(),
            'demo_mode' => $this->stripe->isDemoMode(),
            'currency' => 'aud',
            'country' => 'AU',
            'test_cards' => [
                'visa' => '4242 4242 4242 4242',
                'mastercard' => '5555 5555 5555 4444',
            ],
        ]);
    }
}
