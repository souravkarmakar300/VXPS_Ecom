<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use App\Models\Product;
use App\Services\StripePaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function __construct(
        private readonly StripePaymentService $stripe
    ) {}

    /**
     * Display checkout screen.
     */
    public function index(Request $request): View
    {
        $cart = session()->get('cart', []);

        // Direct buy: if query has product slug, add/set as primary item
        if ($request->filled('product')) {
            $productSlug = $request->string('product')->toString();
            $qty = max(1, (int) $request->input('qty', 1));

            $product = Product::where('status', 'active')
                ->where(function ($q) use ($productSlug) {
                    $q->where('slug', $productSlug)->orWhere('id', $productSlug);
                })
                ->first();

            if ($product) {
                $effectivePrice = ($product->special_offer_price !== null && (float) $product->special_offer_price > 0)
                    ? (float) $product->special_offer_price
                    : (float) $product->price;

                $cart[$product->id] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'slug' => $product->slug,
                    'price' => $effectivePrice,
                    'quantity' => $qty,
                    'image' => $product->image ? asset('storage/' . $product->image) : null,
                    'category' => $product->category->name ?? 'Hardware',
                ];

                session()->put('cart', $cart);
            }
        }

        // If cart is completely empty, offer the first available active product as sample or empty state
        if (empty($cart)) {
            $sampleProduct = Product::where('status', 'active')->first();
            if ($sampleProduct) {
                $effectivePrice = ($sampleProduct->special_offer_price !== null && (float) $sampleProduct->special_offer_price > 0)
                    ? (float) $sampleProduct->special_offer_price
                    : (float) $sampleProduct->price;

                $cart[$sampleProduct->id] = [
                    'id' => $sampleProduct->id,
                    'name' => $sampleProduct->name,
                    'slug' => $sampleProduct->slug,
                    'price' => $effectivePrice,
                    'quantity' => 1,
                    'image' => $sampleProduct->image ? asset('storage/' . $sampleProduct->image) : null,
                    'category' => $sampleProduct->category->name ?? 'Hardware',
                ];
                session()->put('cart', $cart);
            }
        }

        $calculations = $this->calculateTotals($cart);

        return view('checkout', array_merge([
            'items' => $cart,
            'stripeKey' => $this->stripe->publishableKey(),
            'stripeDemoMode' => $this->stripe->isDemoMode(),
        ], $calculations));
    }

    /**
     * Add item to cart via AJAX or form.
     */
    public function addToCart(Request $request): JsonResponse|RedirectResponse
    {
        $productId = $request->input('product_id');
        $quantity = max(1, (int) $request->input('quantity', 1));

        $product = Product::where('status', 'active')->find($productId);

        if (!$product) {
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Product not found.'], 404);
            }
            return back()->with('error', 'Product not found.');
        }

        $effectivePrice = ($product->special_offer_price !== null && (float) $product->special_offer_price > 0)
            ? (float) $product->special_offer_price
            : (float) $product->price;

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => $effectivePrice,
                'quantity' => $quantity,
                'image' => $product->image ? asset('storage/' . $product->image) : null,
                'category' => $product->category->name ?? 'Hardware',
            ];
        }

        session()->put('cart', $cart);
        $totalItems = array_sum(array_column($cart, 'quantity'));

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "{$product->name} added to cart.",
                'total_items' => $totalItems,
                'cart' => $cart,
            ]);
        }

        return redirect()->route('checkout');
    }

    /**
     * Update item quantity in cart.
     */
    public function updateQuantity(Request $request): JsonResponse|RedirectResponse
    {
        $productId = $request->input('product_id');
        $action = $request->input('action'); // 'increase', 'decrease', or 'remove'
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            if ($action === 'increase') {
                $cart[$productId]['quantity']++;
            } elseif ($action === 'decrease') {
                $cart[$productId]['quantity']--;
                if ($cart[$productId]['quantity'] <= 0) {
                    unset($cart[$productId]);
                }
            } elseif ($action === 'remove') {
                unset($cart[$productId]);
            }
            session()->put('cart', $cart);
        }

        $calculations = $this->calculateTotals($cart);

        if ($request->wantsJson()) {
            return response()->json(array_merge([
                'success' => true,
                'cart' => $cart,
                'total_items' => array_sum(array_column($cart, 'quantity')),
            ], $calculations));
        }

        return back();
    }

    /**
     * Process checkout & place order.
     */
    public function store(Request $request): RedirectResponse
    {
        // Support both unified full name and split first_name / last_name
        $firstName = trim($request->input('first_name', ''));
        $lastName = trim($request->input('last_name', ''));
        $fullName = trim($firstName . ' ' . $lastName);
        if ($fullName !== '') {
            $request->merge(['customer_name' => $fullName]);
        }

        // Support suburb as alias for shipping_city
        if (!$request->filled('shipping_city') && $request->filled('suburb')) {
            $request->merge(['shipping_city' => $request->input('suburb')]);
        }

        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:150'],
            'customer_email' => ['required', 'email', 'max:150'],
            'customer_phone' => ['nullable', 'string', 'max:40'],
            'shipping_address' => ['required', 'string', 'max:255'],
            'shipping_address2' => ['nullable', 'string', 'max:255'],
            'shipping_city' => ['required', 'string', 'max:100'],
            'shipping_state' => ['required', 'string', 'max:50'],
            'shipping_postcode' => ['required', 'string', 'max:20'],
            'shipping_country' => ['nullable', 'string', 'max:60'],
            'shipping_method' => ['nullable', 'string', 'in:standard,express'],
            'payment_method' => ['nullable', 'string', 'in:card,apple_pay,link,stripe'],
            'payment_intent_id' => ['nullable', 'string', 'max:120'],
            'card_number' => ['nullable', 'string', 'max:30'],
            'card_expiry' => ['nullable', 'string', 'max:10'],
            'card_cvc' => ['nullable', 'string', 'max:4'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('shop')->with('error', 'Your shopping cart is empty.');
        }

        $paymentMethod = $validated['payment_method'] ?? 'card';
        $paymentIntentId = $validated['payment_intent_id']
            ?? session('checkout_payment_intent_id')
            ?? '';

        // Ensure a payment intent exists (demo or Stripe).
        if ($paymentIntentId === '') {
            $calculationsPreview = $this->calculateTotals($cart);
            $intent = $this->stripe->createPaymentIntent(
                (int) round($calculationsPreview['grandTotal'] * 100),
                'aud'
            );
            $paymentIntentId = $intent['id'];
        }

        $payment = $this->stripe->confirmPayment(
            $paymentIntentId,
            $paymentMethod,
            $validated['card_number'] ?? null
        );

        if (! $payment['ok']) {
            return redirect()
                ->route('checkout')
                ->withInput()
                ->with('error', $payment['message'] ?? 'Payment failed. Please try again.');
        }

        $shippingMethod = 'standard';
        $calculations = $this->calculateTotals($cart);

        $orderNumber = 'VXPS-' . date('Y') . '-' . strtoupper(Str::random(6));

        $fullAddress = $validated['shipping_address'];
        if (!empty($validated['shipping_address2'])) {
            $fullAddress .= ', ' . $validated['shipping_address2'];
        }

        $order = Order::create([
            'order_number' => $orderNumber,
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'] ?? 'N/A',
            'shipping_address' => $fullAddress,
            'shipping_city' => $validated['shipping_city'],
            'shipping_state' => $validated['shipping_state'],
            'shipping_postcode' => $validated['shipping_postcode'],
            'shipping_country' => $validated['shipping_country'] ?? 'Australia',
            'shipping_method' => $shippingMethod,
            'shipping_cost' => $calculations['shippingCost'],
            'discount_amount' => 0,
            'discount_code' => null,
            'payment_method' => $payment['method'],
            'payment_status' => 'paid',
            'stripe_payment_intent_id' => $payment['payment_intent_id'],
            'payment_reference' => strtoupper($payment['method']).'-'.Str::upper(Str::random(8)),
            'total_amount' => $calculations['grandTotal'],
            'status' => 'confirmed',
            'notes' => $validated['notes'] ?? null,
            'items' => array_values($cart),
        ]);

        // Send Order Confirmation Emails
        try {
            // 1. Send receipt & order breakdown to customer
            Mail::to($order->customer_email)->send(new OrderConfirmationMail($order));

            // 2. Also notify admin store mailbox if configured
            $adminEmail = config('mail.from.address', 'support@vxps.com.au');
            if (!empty($adminEmail) && strtolower($adminEmail) !== strtolower($order->customer_email)) {
                Mail::to($adminEmail)->send(new OrderConfirmationMail($order));
            }
        } catch (\Throwable $e) {
            // Keep customer order flow successful even if mail transport encounters network issues
            Log::warning('Order confirmation email failed to send: ' . $e->getMessage(), [
                'order_number' => $order->order_number,
                'customer_email' => $order->customer_email,
            ]);
        }

        session()->forget([
            'cart',
            'checkout_payment_intent_id',
            'checkout_payment_amount',
            'checkout_payment_method',
            'checkout_payment_confirmed',
        ]);

        return redirect()->route('checkout.success', $order->order_number);
    }

    /**
     * Display order success confirmation page.
     */
    public function success(string $orderNumber): View
    {
        $order = Order::where('order_number', $orderNumber)->firstOrFail();

        return view('checkout-success', compact('order'));
    }

    /**
     * Calculate financial totals helper.
     */
    private function calculateTotals(array $cart): array
    {
        $subtotal = 0.0;
        foreach ($cart as $item) {
            $subtotal += ((float) ($item['price'] ?? 0)) * ((int) ($item['quantity'] ?? 1));
        }

        // Shipping calculation: Free standard shipping over $79 AUD, otherwise $9.95
        $shippingCost = ($subtotal >= 79.0) ? 0.00 : 9.95;
        $grandTotal = max(0.0, $subtotal + $shippingCost);

        return [
            'subtotal' => $subtotal,
            'shippingCost' => $shippingCost,
            'grandTotal' => $grandTotal,
            'freeShippingQualified' => ($subtotal >= 79.0),
            'freeShippingThreshold' => 79.0,
            'amountNeededForFreeShipping' => max(0.0, 79.0 - $subtotal),
        ];
    }
}

