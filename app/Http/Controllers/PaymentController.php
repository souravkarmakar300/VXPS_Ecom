<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use App\Services\StripePaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Throwable;

class PaymentController extends Controller
{
    public function __construct(
        private readonly StripePaymentService $stripe
    ) {}

    /**
     * Create a Stripe PaymentIntent for the current cart total (used by Stripe.js).
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

        $totals = $this->cartTotals($cart);
        $amountCents = $totals['amount_cents'];

        if ($amountCents < 50) {
            return response()->json([
                'success' => false,
                'message' => 'Order total is too low to process payment.',
            ], 422);
        }

        $email = (string) $request->input('email', '');

        try {
            $intent = $this->stripe->createPaymentIntent($amountCents, $this->stripe->currency(), [
                'source' => 'vxps_checkout',
                'customer_email' => $email,
            ], $email !== '' ? $email : null);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'demo_mode' => $this->stripe->isDemoMode(),
            ], 422);
        }

        session()->put('checkout_payment_intent_id', $intent['id']);
        session()->put('checkout_payment_amount', $amountCents);

        return response()->json([
            'success' => true,
            'demo' => (bool) ($intent['demo'] ?? false),
            'publishable_key' => $this->stripe->publishableKey(),
            'payment_intent_id' => $intent['id'],
            'client_secret' => $intent['client_secret'],
            'amount' => $totals['grand_total'],
            'amount_cents' => $amountCents,
            'currency' => $this->stripe->currency(),
        ]);
    }

    /**
     * Create Stripe Checkout Session for Apple Pay (QR) or Stripe redirect.
     */
    public function checkoutSession(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'channel' => ['required', 'string', 'in:apple_pay,stripe'],
            'customer_name' => ['required', 'string', 'max:150'],
            'customer_email' => ['required', 'email', 'max:150'],
            'customer_phone' => ['nullable', 'string', 'max:40'],
            'shipping_address' => ['required', 'string', 'max:255'],
            'shipping_address2' => ['nullable', 'string', 'max:255'],
            'shipping_city' => ['required', 'string', 'max:100'],
            'shipping_state' => ['required', 'string', 'max:50'],
            'shipping_postcode' => ['required', 'string', 'max:20'],
            'shipping_country' => ['nullable', 'string', 'max:60'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return response()->json([
                'success' => false,
                'message' => 'Your shopping cart is empty.',
            ], 422);
        }

        $totals = $this->cartTotals($cart);
        if ($totals['amount_cents'] < 50) {
            return response()->json([
                'success' => false,
                'message' => 'Order total is too low to process payment.',
            ], 422);
        }

        $lineItems = [];
        foreach ($cart as $item) {
            $lineItems[] = [
                'name' => (string) ($item['name'] ?? 'VXPS Product'),
                'amount_cents' => (int) round(((float) ($item['price'] ?? 0)) * 100),
                'quantity' => max(1, (int) ($item['quantity'] ?? 1)),
            ];
        }

        if ($totals['shipping'] > 0) {
            $lineItems[] = [
                'name' => 'Shipping',
                'amount_cents' => (int) round($totals['shipping'] * 100),
                'quantity' => 1,
            ];
        }

        $fullAddress = $validated['shipping_address'];
        if (! empty($validated['shipping_address2'])) {
            $fullAddress .= ', '.$validated['shipping_address2'];
        }

        $pending = [
            'channel' => $validated['channel'],
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'] ?? 'N/A',
            'shipping_address' => $fullAddress,
            'shipping_city' => $validated['shipping_city'],
            'shipping_state' => $validated['shipping_state'],
            'shipping_postcode' => $validated['shipping_postcode'],
            'shipping_country' => $validated['shipping_country'] ?? 'Australia',
            'notes' => $validated['notes'] ?? null,
            'shipping_cost' => $totals['shipping'],
            'total_amount' => $totals['grand_total'],
            'items' => array_values($cart),
        ];

        session()->put('checkout_pending', $pending);

        try {
            $session = $this->stripe->createCheckoutSession(
                $lineItems,
                route('payment.checkout.success').'?session_id={CHECKOUT_SESSION_ID}',
                route('checkout'),
                $validated['customer_email'],
                [
                    'channel' => $validated['channel'],
                    'customer_name' => $validated['customer_name'],
                ]
            );
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }

        session()->put('checkout_stripe_session_id', $session['id']);

        return response()->json([
            'success' => true,
            'demo' => (bool) ($session['demo'] ?? false),
            'session_id' => $session['id'],
            'url' => $session['url'],
            'channel' => $validated['channel'],
            'qr_image_url' => 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data='.urlencode($session['url']),
            'amount' => $totals['grand_total'],
        ]);
    }

    /**
     * Stripe Checkout success return URL — create order after paid session.
     */
    public function checkoutSuccess(Request $request): RedirectResponse
    {
        $sessionId = (string) $request->query('session_id', '');
        if ($sessionId === '') {
            return redirect()->route('checkout')->with('error', 'Missing Stripe session.');
        }

        $session = $this->stripe->retrieveCheckoutSession($sessionId);
        if (! ($session['ok'] ?? false)) {
            return redirect()->route('checkout')->with('error', $session['message'] ?? 'Unable to verify payment.');
        }

        if (($session['payment_status'] ?? '') !== 'paid' && ! str_starts_with($sessionId, 'cs_demo_')) {
            return redirect()->route('checkout')->with('error', 'Payment was not completed.');
        }

        $pending = session('checkout_pending');
        $cart = session('cart', []);

        if (empty($pending) || empty($cart)) {
            return redirect()->route('shop')->with('error', 'Checkout session expired. If you were charged, contact support with your Stripe receipt.');
        }

        $channel = $pending['channel'] ?? 'stripe';
        $orderNumber = 'VXPS-'.date('Y').'-'.strtoupper(Str::random(6));

        $order = Order::create([
            'order_number' => $orderNumber,
            'customer_name' => $pending['customer_name'],
            'customer_email' => $session['customer_email'] ?? $pending['customer_email'],
            'customer_phone' => $pending['customer_phone'] ?? 'N/A',
            'shipping_address' => $pending['shipping_address'],
            'shipping_city' => $pending['shipping_city'],
            'shipping_state' => $pending['shipping_state'],
            'shipping_postcode' => $pending['shipping_postcode'],
            'shipping_country' => $pending['shipping_country'] ?? 'Australia',
            'shipping_method' => 'standard',
            'shipping_cost' => $pending['shipping_cost'] ?? 0,
            'discount_amount' => 0,
            'discount_code' => null,
            'payment_method' => $channel,
            'payment_status' => 'paid',
            'stripe_payment_intent_id' => $session['payment_intent_id'] ?? $sessionId,
            'payment_reference' => strtoupper($channel).'-'.Str::upper(Str::random(8)),
            'total_amount' => $pending['total_amount'],
            'status' => 'confirmed',
            'notes' => $pending['notes'] ?? null,
            'items' => $pending['items'] ?? array_values($cart),
        ]);

        try {
            Mail::to($order->customer_email)->send(new OrderConfirmationMail($order));
            $adminEmail = config('mail.from.address', 'support@vxps.com.au');
            if (! empty($adminEmail) && strtolower($adminEmail) !== strtolower($order->customer_email)) {
                Mail::to($adminEmail)->send(new OrderConfirmationMail($order));
            }
        } catch (Throwable $e) {
            Log::warning('Order confirmation email failed: '.$e->getMessage(), [
                'order_number' => $order->order_number,
            ]);
        }

        session()->forget([
            'cart',
            'checkout_pending',
            'checkout_stripe_session_id',
            'checkout_payment_intent_id',
            'checkout_payment_amount',
            'checkout_payment_method',
            'checkout_payment_confirmed',
        ]);

        return redirect()->route('checkout.success', $order->order_number);
    }

    /**
     * Local demo pay page (when Stripe demo mode is on).
     */
    public function demoPay(Request $request): View|RedirectResponse
    {
        $token = (string) $request->query('token', '');
        $payload = session('demo_checkout_token_'.$token);

        if (! $payload) {
            return redirect()->route('checkout')->with('error', 'Demo payment link expired.');
        }

        return view('payment-demo', [
            'token' => $token,
            'sessionId' => $payload['session_id'] ?? ('cs_demo_'.$token),
            'channel' => $payload['metadata']['channel'] ?? 'stripe',
        ]);
    }

    public function demoPayComplete(Request $request): RedirectResponse
    {
        $token = (string) $request->input('token', '');
        $payload = session('demo_checkout_token_'.$token);

        if (! $payload) {
            return redirect()->route('checkout')->with('error', 'Demo payment link expired.');
        }

        session()->forget('demo_checkout_token_'.$token);

        return redirect()->route('payment.checkout.success', [
            'session_id' => $payload['session_id'] ?? ('cs_demo_'.$token),
        ]);
    }

    /**
     * Mark payment as authorised after Stripe.js confirmation, or charge via card fields fallback.
     */
    public function confirm(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'payment_intent_id' => ['nullable', 'string', 'max:120'],
            'payment_method' => ['required', 'string', 'in:card,apple_pay,link,stripe,stripe_link'],
            'card_number' => ['nullable', 'string', 'max:30'],
            'card_expiry' => ['nullable', 'string', 'max:10'],
            'card_cvc' => ['nullable', 'string', 'max:4'],
            'email' => ['nullable', 'email'],
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return response()->json([
                'success' => false,
                'message' => 'Your shopping cart is empty.',
            ], 422);
        }

        $method = $validated['payment_method'];
        $intentId = (string) ($validated['payment_intent_id'] ?? '');
        $hasCardFields = filled($validated['card_number'] ?? null)
            && filled($validated['card_expiry'] ?? null)
            && filled($validated['card_cvc'] ?? null);

        // Prefer verifying an already-confirmed PaymentIntent (Stripe Elements path)
        if ($intentId !== '' && ! $hasCardFields) {
            $result = $this->stripe->confirmPayment($intentId, $method);
        } elseif ($hasCardFields) {
            $totals = $this->cartTotals($cart);
            $result = $this->stripe->chargeCard(
                $totals['amount_cents'],
                (string) $validated['card_number'],
                (string) $validated['card_expiry'],
                (string) $validated['card_cvc'],
                'card',
                [
                    'source' => 'vxps_checkout',
                    'customer_email' => (string) ($validated['email'] ?? ''),
                ]
            );
        } elseif ($intentId !== '' && $this->stripe->isDemoMode()) {
            $result = $this->stripe->confirmPayment(
                $intentId,
                $method,
                $validated['card_number'] ?? null
            );
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Enter card details or complete Stripe payment first.',
            ], 422);
        }

        if (! ($result['ok'] ?? false)) {
            return response()->json([
                'success' => false,
                'message' => $result['message'] ?? 'Payment failed.',
                'status' => $result['status'] ?? 'failed',
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
            'demo' => $this->stripe->isDemoMode() || str_starts_with((string) $result['payment_intent_id'], 'pi_demo_'),
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
            'live_mode' => $this->stripe->isLiveMode(),
            'currency' => $this->stripe->currency(),
            'country' => 'AU',
        ]);
    }

    /**
     * @param  array<int|string, array<string, mixed>>  $cart
     * @return array{subtotal: float, shipping: float, grand_total: float, amount_cents: int}
     */
    private function cartTotals(array $cart): array
    {
        $subtotal = 0.0;
        foreach ($cart as $item) {
            $subtotal += ((float) ($item['price'] ?? 0)) * ((int) ($item['quantity'] ?? 1));
        }

        $shipping = ($subtotal <= 0 || $subtotal >= 79.0) ? 0.00 : 9.95;
        $grandTotal = max(0.0, $subtotal + $shipping);

        return [
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'grand_total' => $grandTotal,
            'amount_cents' => (int) round($grandTotal * 100),
        ];
    }
}
