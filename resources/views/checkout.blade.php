@extends('layouts.app')

@section('title', 'Secure Checkout | VXPS Australia')
@section('meta_description', '')
@section('meta_keywords', '')

@section('meta')
    <meta name="description" content="Complete your purchase with encrypted checkout. Fast tracked shipping across Australia with 2-year warranty.">
@endsection

@section('content')
<div class="py-8 sm:py-12 bg-gray-50/70 dark:bg-slate-950">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Checkout Process Breadcrumbs / Indicator --}}
            <div class="mb-8 flex items-center justify-between flex-wrap gap-4">
                <nav class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400">
                    <a href="{{ route('home') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">Home</a>
                    <span>/</span>
                    <a href="{{ route('shop') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">Shop</a>
                    <span>/</span>
                    <span class="text-indigo-600 dark:text-indigo-400 font-bold">Checkout</span>
                </nav>

                <div class="flex items-center gap-3 text-xs">
                    <span class="flex items-center gap-1.5 text-slate-500">
                        <span class="w-5 h-5 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold text-[10px]">1</span>
                        <span class="font-bold text-slate-900 dark:text-white">Details &amp; Payment</span>
                    </span>
                    <span class="text-slate-300 dark:text-slate-700">&rarr;</span>
                    <span class="flex items-center gap-1.5 text-slate-400">
                        <span class="w-5 h-5 rounded-full bg-gray-200 dark:bg-slate-800 text-slate-500 flex items-center justify-center font-bold text-[10px]">2</span>
                        <span>Confirmation</span>
                    </span>
                </div>
            </div>

            @if(session('error'))
                <div class="mb-6 p-4 rounded-2xl bg-rose-50 dark:bg-rose-950/50 border border-rose-200 dark:border-rose-900 text-rose-700 dark:text-rose-300 text-xs flex items-center gap-3">
                    <span class="text-base">⚠️</span>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            {{-- Main Form Wrapping Both Columns --}}
            <form method="POST" action="{{ route('checkout.store') }}" id="checkout-form">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                    {{-- Left Column (7 cols): Billing Details --}}
                    <div class="lg:col-span-7 space-y-6">
                        <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-lg p-6 sm:p-8 shadow-xs">
                            <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mb-6 tracking-tight">Billing & Shipping Details</h2>

                            <div class="space-y-4">
                                {{-- Email Address --}}
                                <div>
                                    <label for="customer_email" class="block text-xs font-semibold text-slate-800 dark:text-slate-200 mb-1.5">
                                        Email Address <span class="text-rose-500">*</span>
                                    </label>
                                    <input
                                        type="email"
                                        id="customer_email"
                                        name="customer_email"
                                        value="{{ old('customer_email') }}"
                                        placeholder="Email Address"
                                        required
                                        class="w-full px-5 py-3 rounded-full bg-[#f3f4f6] dark:bg-slate-800/90 border border-gray-300 dark:border-slate-700 text-sm text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all"
                                    >
                                    @error('customer_email')
                                        <p class="text-xs text-rose-500 mt-1 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- First & Last Name --}}
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="first_name" class="block text-xs font-semibold text-slate-800 dark:text-slate-200 mb-1.5">
                                            First Name <span class="text-rose-500">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            id="first_name"
                                            name="first_name"
                                            value="{{ old('first_name') }}"
                                            placeholder="First Name"
                                            required
                                            class="w-full px-5 py-3 rounded-full bg-[#f3f4f6] dark:bg-slate-800/90 border border-gray-300 dark:border-slate-700 text-sm text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all"
                                        >
                                    </div>
                                    <div>
                                        <label for="last_name" class="block text-xs font-semibold text-slate-800 dark:text-slate-200 mb-1.5">
                                            Last Name <span class="text-rose-500">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            id="last_name"
                                            name="last_name"
                                            value="{{ old('last_name') }}"
                                            placeholder="Last Name"
                                            required
                                            class="w-full px-5 py-3 rounded-full bg-[#f3f4f6] dark:bg-slate-800/90 border border-gray-300 dark:border-slate-700 text-sm text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all"
                                        >
                                    </div>
                                </div>

                                {{-- Country / Region --}}
                                <div>
                                    <label for="shipping_country" class="block text-xs font-semibold text-slate-800 dark:text-slate-200 mb-1.5">
                                        Country / Region <span class="text-rose-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <select
                                            id="shipping_country"
                                            name="shipping_country"
                                            required
                                            class="w-full px-5 py-3 rounded-full bg-[#f3f4f6] dark:bg-slate-800/90 border border-gray-300 dark:border-slate-700 text-sm text-slate-900 dark:text-white appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all pr-10"
                                        >
                                            <option value="Australia" selected>Australia</option>
                                        </select>
                                        <svg class="w-4 h-4 text-slate-500 absolute right-4 top-3.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>

                                {{-- Street address (2 inputs) --}}
                                <div>
                                    <label for="shipping_address" class="block text-xs font-semibold text-slate-800 dark:text-slate-200 mb-1.5">
                                        Street address <span class="text-rose-500">*</span>
                                    </label>
                                    <div class="space-y-3">
                                        <input
                                            type="text"
                                            id="shipping_address"
                                            name="shipping_address"
                                            value="{{ old('shipping_address') }}"
                                            placeholder="House number and street name"
                                            required
                                            class="w-full px-5 py-3 rounded-full bg-[#f3f4f6] dark:bg-slate-800/90 border border-gray-300 dark:border-slate-700 text-sm text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all"
                                        >
                                        @error('shipping_address')
                                            <p class="text-xs text-rose-500 mt-1 font-medium">{{ $message }}</p>
                                        @enderror
                                        <input
                                            type="text"
                                            id="shipping_address2"
                                            name="shipping_address2"
                                            value="{{ old('shipping_address2') }}"
                                            placeholder="Apartment, suite, unit, etc. (optional)"
                                            class="w-full px-5 py-3 rounded-full bg-[#f3f4f6] dark:bg-slate-800/90 border border-gray-300 dark:border-slate-700 text-sm text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all"
                                        >
                                    </div>
                                </div>

                                {{-- Suburb --}}
                                <div>
                                    <label for="shipping_city" class="block text-xs font-semibold text-slate-800 dark:text-slate-200 mb-1.5">
                                        Suburb <span class="text-rose-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        id="shipping_city"
                                        name="shipping_city"
                                        value="{{ old('shipping_city') }}"
                                        required
                                        class="w-full px-5 py-3 rounded-full bg-[#f3f4f6] dark:bg-slate-800/90 border border-gray-300 dark:border-slate-700 text-sm text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all"
                                    >
                                    @error('shipping_city')
                                        <p class="text-xs text-rose-500 mt-1 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- State --}}
                                <div>
                                    <label for="shipping_state" class="block text-xs font-semibold text-slate-800 dark:text-slate-200 mb-1.5">
                                        State <span class="text-rose-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <select
                                            id="shipping_state"
                                            name="shipping_state"
                                            required
                                            class="w-full px-5 py-3 rounded-full bg-[#f3f4f6] dark:bg-slate-800/90 border border-gray-300 dark:border-slate-700 text-sm text-slate-900 dark:text-white appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all pr-10"
                                        >
                                            <option value="NSW" {{ old('shipping_state', 'NSW') === 'NSW' ? 'selected' : '' }}>New South Wales</option>
                                            <option value="VIC" {{ old('shipping_state') === 'VIC' ? 'selected' : '' }}>Victoria</option>
                                            <option value="QLD" {{ old('shipping_state') === 'QLD' ? 'selected' : '' }}>Queensland</option>
                                            <option value="SA" {{ old('shipping_state') === 'SA' ? 'selected' : '' }}>South Australia</option>
                                            <option value="WA" {{ old('shipping_state') === 'WA' ? 'selected' : '' }}>Western Australia</option>
                                            <option value="TAS" {{ old('shipping_state') === 'TAS' ? 'selected' : '' }}>Tasmania</option>
                                            <option value="ACT" {{ old('shipping_state') === 'ACT' ? 'selected' : '' }}>Australian Capital Territory</option>
                                            <option value="NT" {{ old('shipping_state') === 'NT' ? 'selected' : '' }}>Northern Territory</option>
                                        </select>
                                        <svg class="w-4 h-4 text-slate-500 absolute right-4 top-3.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>

                                {{-- Postcode --}}
                                <div>
                                    <label for="shipping_postcode" class="block text-xs font-semibold text-slate-800 dark:text-slate-200 mb-1.5">
                                        Postcode <span class="text-rose-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        id="shipping_postcode"
                                        name="shipping_postcode"
                                        value="{{ old('shipping_postcode') }}"
                                        required
                                        class="w-full px-5 py-3 rounded-full bg-[#f3f4f6] dark:bg-slate-800/90 border border-gray-300 dark:border-slate-700 text-sm text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all"
                                    >
                                    @error('shipping_postcode')
                                        <p class="text-xs text-rose-500 mt-1 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Phone (optional) --}}
                                <div>
                                    <label for="customer_phone" class="block text-xs font-semibold text-slate-800 dark:text-slate-200 mb-1.5">
                                        Phone (optional)
                                    </label>
                                    <input
                                        type="tel"
                                        id="customer_phone"
                                        name="customer_phone"
                                        value="{{ old('customer_phone') }}"
                                        placeholder="Phone"
                                        class="w-full px-5 py-3 rounded-full bg-[#f3f4f6] dark:bg-slate-800/90 border border-gray-300 dark:border-slate-700 text-sm text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all"
                                    >
                                </div>

                                {{-- Ship to a different address? --}}
                                {{-- <label class="flex items-center gap-2.5 pt-2 cursor-pointer select-none">
                                    <input
                                        type="checkbox"
                                        name="ship_to_different_address"
                                        id="ship_different"
                                        class="w-4 h-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500"
                                    >
                                    <span class="text-xs text-slate-700 dark:text-slate-300">Ship to a different address?</span>
                                </label> --}}
                            </div>
                        </div>

                        {{-- Order Notes (optional) Container --}}
                        <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-lg p-5 shadow-xs">
                            <label for="notes" class="block text-xs font-semibold text-slate-800 dark:text-slate-200 mb-2">
                                Order notes (optional)
                            </label>
                            <textarea
                                id="notes"
                                name="notes"
                                rows="3"
                                placeholder="Notes about your order, e.g. special notes for delivery."
                                class="w-full p-4 rounded-2xl bg-[#f3f4f6] dark:bg-slate-800/90 border border-gray-300 dark:border-slate-700 text-xs text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all resize-none"
                            >{{ old('notes') }}</textarea>
                        </div>
                    </div>

                    {{-- Right Column (5 cols): Your Order & Payment --}}
                    @php
                        $isCartEmpty = empty($items) || count($items) === 0;
                    @endphp
                    <div class="lg:col-span-5 sticky top-24 space-y-4">
                        {{-- Your Order Card --}}
                        <div class="bg-white dark:bg-slate-900 rounded-lg border border-gray-200 dark:border-slate-800 p-6 shadow-xs">
                            <div class="flex items-center justify-between mb-5">
                                <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Your Order</h2>
                                <span id="cart-item-count-badge" class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-100 dark:bg-emerald-950/80 text-emerald-700 dark:text-emerald-300 border border-emerald-500/20">
                                    {{ array_sum(array_column($items ?? [], 'quantity')) }} {{ Str::plural('item', array_sum(array_column($items ?? [], 'quantity'))) }}
                                </span>
                            </div>

                            <div class="text-xs">
                                {{-- Header --}}
                                <div class="flex items-center justify-between pb-3 font-semibold text-slate-600 dark:text-slate-400 border-b border-gray-100 dark:border-slate-800">
                                    <span>Product</span>
                                    <span>Subtotal</span>
                                </div>

                                {{-- Items Container --}}
                                <div id="checkout-cart-items" class="divide-y divide-gray-100 dark:divide-slate-800">
                                    @forelse($items as $productId => $item)
                                        @php
                                            $itemPrice = (float) ($item['price'] ?? 0);
                                            $itemQty = (int) ($item['quantity'] ?? 1);
                                            $lineTotal = $itemPrice * $itemQty;
                                            $itemImg = $item['image'] ?? null;
                                            if (!$itemImg) {
                                                $prodObj = \App\Models\Product::find($item['id'] ?? $productId);
                                                $itemImg = $prodObj?->display_image ?? asset('images/categories/jump.png');
                                            }
                                        @endphp
                                        <div 
                                            id="cart-item-row-{{ $productId }}" 
                                            data-product-id="{{ $productId }}"
                                            class="py-3.5 flex flex-col gap-2.5 transition-all duration-200"
                                        >
                                            <div class="flex items-start justify-between gap-3">
                                                {{-- Item Image & Title --}}
                                                <div class="flex items-center gap-3 min-w-0">
                                                    <div class="w-12 h-12 rounded-xl bg-gray-50 dark:bg-slate-800/80 border border-gray-200/80 dark:border-slate-700/80 p-1 shrink-0 overflow-hidden flex items-center justify-center">
                                                        <img src="{{ $itemImg }}" alt="{{ $item['name'] }}" class="w-full h-full object-contain">
                                                    </div>
                                                    <div class="min-w-0">
                                                        <a 
                                                            href="{{ !empty($item['slug']) ? route('product.show', $item['slug']) : route('shop') }}" 
                                                            class="font-bold text-slate-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400 line-clamp-1 transition-colors text-xs sm:text-sm"
                                                            title="{{ $item['name'] }}"
                                                        >
                                                            {{ $item['name'] }}
                                                        </a>
                                                        <p class="text-[11px] text-slate-500 dark:text-slate-400 font-mono mt-0.5">
                                                            ${{ number_format($itemPrice, 2) }} each
                                                        </p>
                                                    </div>
                                                </div>

                                                {{-- Line Total --}}
                                                <div class="text-right shrink-0">
                                                    <span id="line-total-{{ $productId }}" class="font-bold text-slate-900 dark:text-white font-mono text-sm">
                                                        ${{ number_format($lineTotal, 2) }}
                                                    </span>
                                                </div>
                                            </div>

                                            {{-- Stepper & Remove Controls --}}
                                            <div class="flex items-center justify-between pt-1">
                                                {{-- Quantity Stepper --}}
                                                <div class="flex items-center rounded-lg border border-gray-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-950 p-0.5 shadow-2xs">
                                                    {{-- Decrement button --}}
                                                    <button
                                                        type="button"
                                                        onclick="updateCartItem('{{ $productId }}', 'decrease')"
                                                        id="btn-decrease-{{ $productId }}"
                                                        class="w-7 h-7 rounded-md flex items-center justify-center text-slate-600 dark:text-slate-300 hover:bg-white dark:hover:bg-slate-800 font-bold transition-all cursor-pointer select-none active:scale-90 disabled:opacity-40"
                                                        aria-label="Decrease quantity"
                                                        title="Decrease quantity"
                                                    >
                                                        &minus;
                                                    </button>

                                                    {{-- Current Quantity --}}
                                                    <span 
                                                        id="item-qty-{{ $productId }}" 
                                                        class="w-8 text-center text-xs font-bold text-slate-900 dark:text-white tabular-nums select-none"
                                                    >
                                                        {{ $itemQty }}
                                                    </span>

                                                    {{-- Increment button --}}
                                                    <button
                                                        type="button"
                                                        onclick="updateCartItem('{{ $productId }}', 'increase')"
                                                        id="btn-increase-{{ $productId }}"
                                                        class="w-7 h-7 rounded-md flex items-center justify-center text-slate-600 dark:text-slate-300 hover:bg-white dark:hover:bg-slate-800 font-bold transition-all cursor-pointer select-none active:scale-90 disabled:opacity-40"
                                                        aria-label="Increase quantity"
                                                        title="Increase quantity"
                                                    >
                                                        &#43;
                                                    </button>
                                                </div>

                                                {{-- Remove Button --}}
                                                <button
                                                    type="button"
                                                    onclick="updateCartItem('{{ $productId }}', 'remove')"
                                                    id="btn-remove-{{ $productId }}"
                                                    class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-rose-500 hover:text-rose-600 dark:text-rose-400 dark:hover:text-rose-300 px-2.5 py-1 rounded-md hover:bg-rose-50 dark:hover:bg-rose-950/50 transition-all cursor-pointer group"
                                                    title="Remove from cart"
                                                >
                                                    <svg class="w-3.5 h-3.5 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    <span>Remove</span>
                                                </button>
                                            </div>
                                        </div>
                                    @empty
                                        <div id="empty-cart-message" class="py-8 text-center space-y-3">
                                            <div class="w-12 h-12 mx-auto rounded-full bg-gray-100 dark:bg-slate-800 flex items-center justify-center text-slate-400">
                                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                </svg>
                                            </div>
                                            <p class="text-slate-600 dark:text-slate-300 font-semibold text-xs sm:text-sm">Your cart is empty.</p>
                                            <a href="{{ route('shop') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-500 shadow-sm transition-all">
                                                <span>Browse Products &rarr;</span>
                                            </a>
                                        </div>
                                    @endforelse
                                </div>

                                {{-- Calculations Summary --}}
                                <div class="divide-y divide-gray-100 dark:divide-slate-800 border-t border-gray-100 dark:border-slate-800 mt-2">
                                    {{-- Subtotal --}}
                                    <div class="flex items-center justify-between py-3 font-semibold text-slate-800 dark:text-slate-200">
                                        <span>Subtotal</span>
                                        <span id="summary-subtotal" class="font-mono">${{ number_format($subtotal, 2) }}</span>
                                    </div>

                                    {{-- Shipment --}}
                                    <div class="flex items-center justify-between py-3 font-semibold text-slate-800 dark:text-slate-200">
                                        <span>Shipment</span>
                                        <span id="summary-shipping" class="font-mono">
                                            @if($isCartEmpty || $subtotal <= 0)
                                                <span>$0.00</span>
                                            @elseif($shippingCost == 0)
                                                <span class="text-emerald-600 dark:text-emerald-400 font-semibold">Free Delivery</span>
                                            @else
                                                ${{ number_format($shippingCost, 2) }}
                                            @endif
                                        </span>
                                    </div>

                                    {{-- Total --}}
                                    <div class="flex items-center justify-between py-3 text-sm font-bold text-slate-900 dark:text-white">
                                        <span>Total</span>
                                        <span id="summary-grand-total" class="font-mono">${{ number_format($grandTotal, 2) }}</span>
                                    </div>
                                </div>
                            </div>

                            <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-2">
                                Delivery charges ($9.99) apply to orders below $70. Free tracked shipping on orders over $70.
                            </p>
                        </div>

                        {{-- Hidden payment fields --}}
                        <input type="hidden" name="payment_method" id="selected_payment_method" value="card">
                        <input type="hidden" name="payment_intent_id" id="payment_intent_id" value="">
                        <input type="hidden" name="shipping_method" value="standard">

                        <div class="rounded-md border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2.5 text-[11px] text-slate-600 dark:text-slate-300">
                            <p class="font-bold text-slate-900 dark:text-white mb-1">Choose a payment method</p>
                            <p>Apple Pay · Stripe · Credit / Debit Card</p>
                        </div>

                        @if($stripeDemoMode ?? true)
                            <div class="rounded-md border border-amber-200 dark:border-amber-900/50 bg-amber-50 dark:bg-amber-950/40 px-3 py-2 text-[11px] text-amber-800 dark:text-amber-200">
                                <strong>Demo mode.</strong> Payments are simulated locally (not sent to Stripe).
                                Test card: <span class="font-mono">4242 4242 4242 4242</span> · Exp <span class="font-mono">12/34</span> · CVC <span class="font-mono">123</span>
                            </div>
                        @elseif($stripeLiveMode ?? false)
                            <div class="rounded-md border border-emerald-200 dark:border-emerald-900/50 bg-emerald-50 dark:bg-emerald-950/40 px-3 py-2 text-[11px] text-emerald-800 dark:text-emerald-200">
                                <strong>Live payments active.</strong> Card details are handled securely by Stripe. Real charges will be created on your Stripe account.
                            </div>
                        @else
                            <div class="rounded-md border border-sky-200 dark:border-sky-900/50 bg-sky-50 dark:bg-sky-950/40 px-3 py-2 text-[11px] text-sky-800 dark:text-sky-200">
                                <strong>Stripe test mode.</strong> Use card <span class="font-mono">4242 4242 4242 4242</span> · any future expiry · any CVC.
                                Charges appear in Stripe Dashboard → Payments (test).
                            </div>
                        @endif

                        {{-- Empty Cart Warning Banner --}}
                        <div id="empty-cart-warning" class="{{ $isCartEmpty ? '' : 'hidden' }} p-3 rounded-xl bg-amber-50 dark:bg-amber-950/40 border border-amber-200 dark:border-amber-900/50 text-amber-800 dark:text-amber-300 text-xs text-center font-medium">
                            Your cart is empty. Please add items from the <a href="{{ route('shop') }}" class="underline font-bold hover:text-amber-900 dark:hover:text-amber-200">shop</a> before proceeding.
                        </div>

                        {{-- Native Apple Pay / Google Pay (Stripe Payment Request) --}}
                        <div id="payment-request-button" class="{{ $isCartEmpty ? 'hidden' : '' }} min-h-[44px]"></div>

                        {{-- Apple Pay → native sheet when available, otherwise QR to Stripe Checkout --}}
                        <button
                            type="button"
                            id="apple-pay-btn"
                            onclick="payWithWallet('apple_pay')"
                            {{ $isCartEmpty ? 'disabled' : '' }}
                            class="w-full h-11 bg-black hover:bg-neutral-900 text-white rounded-md flex items-center justify-center gap-1.5 font-semibold text-base transition-colors shadow-sm cursor-pointer select-none disabled:opacity-40 disabled:cursor-not-allowed"
                        >
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 170 170" aria-hidden="true">
                                <path d="M150.37 130.25c-2.45 5.66-5.35 10.87-8.71 15.66-4.58 6.53-8.33 11.05-11.22 13.56-4.48 4.12-9.28 6.23-14.42 6.35-3.69 0-8.14-1.05-13.32-3.18-5.19-2.12-9.97-3.17-14.34-3.17-4.58 0-9.49 1.05-14.75 3.17-5.26 2.13-9.5 3.24-12.74 3.35-4.35.13-9.16-1.9-14.42-6.08-3.7-3.04-7.58-7.7-11.64-13.98-5.77-8.8-10.27-18.7-13.5-29.7-3.23-11.01-4.85-21.75-4.85-32.22 0-14.8 3.7-27.12 11.1-36.96 7.4-9.84 16.7-14.87 27.9-15.09 5.25 0 10.66 1.45 16.23 4.36 5.57 2.91 9.3 4.43 11.2 4.56 1.69 0 5.64-1.57 11.87-4.7 6.22-3.14 11.87-4.48 16.94-4.04 13.9.78 24.8 6.06 32.72 15.82-12.18 7.37-18.15 17.5-17.9 30.39.23 10.22 4.13 18.8 11.7 25.75 7.57 6.95 16.53 10.87 26.89 11.76-2.12 6.53-4.68 13.2-7.68 20.02zM119.22 31.85c0-7.39 2.66-14.35 7.98-20.89 5.32-6.53 11.75-10.45 19.3-11.76.22 1.09.33 2.18.33 3.27 0 7.39-2.73 14.51-8.18 21.36-5.46 6.85-11.94 10.8-19.43 11.85-.22-1.3-.33-2.5-.33-3.83z"/>
                            </svg>
                            <span class="tracking-tight text-lg font-medium">Pay</span>
                        </button>
                        <p id="apple-pay-hint" class="text-[10px] text-center text-slate-500 -mt-1">Apple Pay on supported devices, or scan a QR code on your iPhone</p>

                        {{-- 2. Stripe → hosted login / pay redirect --}}
                        <button
                            type="button"
                            id="stripe-pay-btn"
                            onclick="payWithWallet('stripe')"
                            {{ $isCartEmpty ? 'disabled' : '' }}
                            class="w-full h-11 bg-[#635BFF] hover:bg-[#544EE0] text-white rounded-md flex items-center justify-center gap-2 font-bold text-sm transition-colors shadow-sm cursor-pointer select-none disabled:opacity-40 disabled:cursor-not-allowed"
                        >
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M13.976 9.15c-2.172-.806-3.356-1.426-3.356-2.409 0-.831.683-1.305 1.901-1.305 2.227 0 4.515.858 6.09 1.631l.89-5.494C18.252.975 15.697 0 12.165 0 9.667 0 7.589.654 6.104 1.846 4.515 3.125 3.8 4.911 3.8 7.044c0 4.039 2.467 5.76 6.476 7.219 2.585.92 3.445 1.574 3.445 2.583 0 .98-.84 1.545-2.354 1.545-1.875 0-4.965-.921-6.99-2.109l-.9 5.555C5.175 22.99 8.385 24 11.714 24c2.641 0 4.843-.624 6.328-1.813 1.664-1.305 2.525-3.236 2.525-5.732 0-4.128-2.524-5.851-6.591-7.305h.001z"/>
                            </svg>
                            <span>Pay with Stripe</span>
                        </button>
                        <p class="text-[10px] text-center text-slate-500 -mt-1">Redirects to Stripe Checkout to log in and pay</p>

                        {{-- Divider --}}
                        <div class="text-center my-1 text-xs font-semibold text-slate-400 tracking-wider select-none">
                            &minus; OR PAY BY CARD &minus;
                        </div>

                        {{-- 4. Credit / Debit Card Box --}}
                        <div class="border border-gray-200 dark:border-slate-800 rounded-md p-5 bg-white dark:bg-slate-900 shadow-xs">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="text-xs font-semibold text-slate-800 dark:text-slate-200">Credit / Debit Card</h3>
                                <span class="inline-flex items-center gap-1 text-[10px] font-bold text-indigo-600 dark:text-indigo-400">
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M13.976 9.15c-2.172-.806-3.356-1.426-3.356-2.409 0-.831.683-1.305 1.901-1.305 2.227 0 4.515.858 6.09 1.631l.89-5.494C18.252.975 15.697 0 12.165 0 9.667 0 7.589.654 6.104 1.846 4.515 3.125 3.8 4.911 3.8 7.044c0 4.039 2.467 5.76 6.476 7.219 2.585.92 3.445 1.574 3.445 2.583 0 .98-.84 1.545-2.354 1.545-1.875 0-4.965-.921-6.99-2.109l-.9 5.555C5.175 22.99 8.385 24 11.714 24c2.641 0 4.843-.624 6.328-1.813 1.664-1.305 2.525-3.236 2.525-5.732 0-4.128-2.524-5.851-6.591-7.305h.001z"/></svg>
                                    Powered by Stripe
                                </span>
                            </div>

                            <div id="payment-status" class="hidden mb-3 rounded-lg px-3 py-2 text-[11px] font-medium"></div>

                            {{-- Card fields: always-visible HTML inputs; Stripe mounts over them when ready --}}
                            <div class="bg-[#f3f4f6] dark:bg-slate-800/80 rounded-xl p-4 space-y-3">
                                <div class="flex items-center gap-1.5 text-xs text-[#0284c7] font-medium">
                                    <svg class="w-3.5 h-3.5 text-emerald-600 fill-current shrink-0" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>Secure card checkout (Visa / Mastercard / Amex)</span>
                                </div>

                                <div id="card-fields-root" class="space-y-3">
                                    <div>
                                        <label for="card_number" class="block text-[11px] text-slate-600 dark:text-slate-400 font-medium mb-1">
                                            Card number
                                        </label>
                                        <div class="relative">
                                            <input
                                                type="text"
                                                id="card_number"
                                                name="card_number"
                                                placeholder="4242 4242 4242 4242"
                                                maxlength="19"
                                                autocomplete="cc-number"
                                                inputmode="numeric"
                                                oninput="formatCardNumber(this)"
                                                class="w-full px-4 py-2.5 rounded-full bg-white dark:bg-slate-900 border border-gray-300 dark:border-slate-700 text-sm font-mono text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 shadow-xs pr-28"
                                            >
                                            <div class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center gap-1 pointer-events-none select-none z-10">
                                                <span class="px-1.5 py-0.5 rounded bg-[#1434cb] text-white text-[9px] font-black italic tracking-tighter">VISA</span>
                                                <div class="flex -space-x-1 items-center">
                                                    <span class="w-3.5 h-3.5 rounded-full bg-[#eb001b] inline-block opacity-90"></span>
                                                    <span class="w-3.5 h-3.5 rounded-full bg-[#f79e1b] inline-block opacity-90"></span>
                                                </div>
                                                <span class="px-1 py-0.5 rounded bg-[#006fcf] text-white text-[8px] font-bold tracking-tight">AMEX</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-3">
                                        <div>
                                            <label for="card_expiry" class="block text-[11px] text-slate-600 dark:text-slate-400 font-medium mb-1">
                                                Expiration date
                                            </label>
                                            <input
                                                type="text"
                                                id="card_expiry"
                                                name="card_expiry"
                                                placeholder="MM / YY"
                                                maxlength="7"
                                                autocomplete="cc-exp"
                                                inputmode="numeric"
                                                oninput="formatExpiry(this)"
                                                class="w-full px-4 py-2.5 rounded-full bg-white dark:bg-slate-900 border border-gray-300 dark:border-slate-700 text-sm font-mono text-slate-900 dark:text-white placeholder-slate-400 text-center focus:outline-none focus:ring-2 focus:ring-emerald-500 shadow-xs"
                                            >
                                        </div>
                                        <div>
                                            <label for="card_cvc" class="block text-[11px] text-slate-600 dark:text-slate-400 font-medium mb-1">
                                                Security code
                                            </label>
                                            <input
                                                type="text"
                                                id="card_cvc"
                                                name="card_cvc"
                                                placeholder="CVC"
                                                maxlength="4"
                                                autocomplete="cc-csc"
                                                inputmode="numeric"
                                                class="w-full px-4 py-2.5 rounded-full bg-white dark:bg-slate-900 border border-gray-300 dark:border-slate-700 text-sm font-mono text-slate-900 dark:text-white placeholder-slate-400 text-center focus:outline-none focus:ring-2 focus:ring-emerald-500 shadow-xs"
                                            >
                                        </div>
                                    </div>
                                    <p id="card-errors" class="hidden text-[11px] text-rose-600 font-medium" role="alert"></p>
                                </div>
                            </div>

                            <p class="text-[11px] text-slate-600 dark:text-slate-400 mt-4 leading-relaxed">
                                Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="{{ route('about') }}" class="text-rose-500 hover:underline">privacy policy</a>.
                            </p>

                            <button
                                type="button"
                                id="place-order-button"
                                onclick="payWithCard()"
                                {{ $isCartEmpty ? 'disabled' : '' }}
                                class="w-full mt-4 py-3.5 px-4 rounded-md bg-[#8ce358] hover:bg-[#7ed44d] text-slate-950 font-bold text-sm tracking-wide transition-all shadow-sm flex items-center justify-center gap-2 cursor-pointer active:scale-98 disabled:opacity-40 disabled:cursor-not-allowed"
                            >
                                <span id="place-order-label">Place order</span>
                                <svg id="place-order-spinner" class="hidden w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
</div>

{{-- Apple Pay QR modal --}}
<div id="apple-pay-qr-modal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeApplePayQr()"></div>
    <div class="relative w-full max-w-sm bg-white dark:bg-slate-900 rounded-3xl shadow-2xl border border-slate-200 dark:border-slate-700 p-6 text-center space-y-4">
        <button type="button" onclick="closeApplePayQr()" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 hover:text-slate-800 dark:hover:text-white text-lg leading-none cursor-pointer" aria-label="Close">&times;</button>
        <div class="w-12 h-12 mx-auto rounded-2xl bg-black text-white flex items-center justify-center">
            <svg class="w-6 h-6 fill-current" viewBox="0 0 170 170" aria-hidden="true">
                <path d="M150.37 130.25c-2.45 5.66-5.35 10.87-8.71 15.66-4.58 6.53-8.33 11.05-11.22 13.56-4.48 4.12-9.28 6.23-14.42 6.35-3.69 0-8.14-1.05-13.32-3.18-5.19-2.12-9.97-3.17-14.34-3.17-4.58 0-9.49 1.05-14.75 3.17-5.26 2.13-9.5 3.24-12.74 3.35-4.35.13-9.16-1.9-14.42-6.08-3.7-3.04-7.58-7.7-11.64-13.98-5.77-8.8-10.27-18.7-13.5-29.7-3.23-11.01-4.85-21.75-4.85-32.22 0-14.8 3.7-27.12 11.1-36.96 7.4-9.84 16.7-14.87 27.9-15.09 5.25 0 10.66 1.45 16.23 4.36 5.57 2.91 9.3 4.43 11.2 4.56 1.69 0 5.64-1.57 11.87-4.7 6.22-3.14 11.87-4.48 16.94-4.04 13.9.78 24.8 6.06 32.72 15.82-12.18 7.37-18.15 17.5-17.9 30.39.23 10.22 4.13 18.8 11.7 25.75 7.57 6.95 16.53 10.87 26.89 11.76-2.12 6.53-4.68 13.2-7.68 20.02z"/>
            </svg>
        </div>
        <h3 class="text-lg font-black text-slate-900 dark:text-white">Scan to pay with Apple Pay</h3>
        <p class="text-xs text-slate-500 dark:text-slate-400">Open your iPhone camera and scan this QR code to complete payment securely via Stripe.</p>
        <div class="mx-auto w-56 h-56 rounded-2xl bg-white border border-slate-200 p-3 flex items-center justify-center">
            <img id="apple-pay-qr-image" src="" alt="Apple Pay QR code" class="w-full h-full object-contain">
        </div>
        <p id="apple-pay-qr-amount" class="text-sm font-bold text-slate-800 dark:text-slate-200"></p>
        <a id="apple-pay-qr-link" href="#" target="_blank" rel="noopener" class="inline-block text-xs font-semibold text-indigo-600 hover:underline">Open payment link instead</a>
        <p class="text-[10px] text-slate-400">After paying on your phone, this page will update when you return — or refresh once payment succeeds.</p>
    </div>
</div>
@endsection

@section('scripts')
@if(!($stripeDemoMode ?? true) && !empty($stripeKey ?? ''))
<script src="https://js.stripe.com/v3/"></script>
@endif
<script>
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    let isUpdatingCart = false;

    /**
     * Increment, decrement, or remove an item in checkout
     */
    function updateCartItem(productId, action) {
        if (isUpdatingCart) return;
        isUpdatingCart = true;

        const row = document.getElementById(`cart-item-row-${productId}`);
        const btnDec = document.getElementById(`btn-decrease-${productId}`);
        const btnInc = document.getElementById(`btn-increase-${productId}`);
        const btnRem = document.getElementById(`btn-remove-${productId}`);

        if (btnDec) btnDec.disabled = true;
        if (btnInc) btnInc.disabled = true;
        if (btnRem) btnRem.disabled = true;
        if (row) row.classList.add('opacity-50');

        fetch('{{ route('cart.quantity') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                product_id: productId,
                action: action
            })
        })
        .then(res => res.json())
        .then(data => {
            if (!data.success) {
                alert(data.message || 'Error updating product in cart.');
                if (row) row.classList.remove('opacity-50');
                return;
            }

            // Find item in updated cart (key might be string or number)
            const cartItem = data.cart && (data.cart[productId] || data.cart[String(productId)]);

            if (cartItem && cartItem.quantity > 0) {
                // Update quantity display
                const qtyEl = document.getElementById(`item-qty-${productId}`);
                if (qtyEl) {
                    qtyEl.textContent = cartItem.quantity;
                }

                // Update line total
                const lineTotalEl = document.getElementById(`line-total-${productId}`);
                if (lineTotalEl) {
                    const itemTotal = (parseFloat(cartItem.price) || 0) * parseInt(cartItem.quantity);
                    lineTotalEl.textContent = '$' + itemTotal.toFixed(2);
                }

                if (row) row.classList.remove('opacity-50');
            } else {
                // Item removed from cart: animate removal
                if (row) {
                    row.style.transition = 'all 0.25s ease-out';
                    row.style.opacity = '0';
                    row.style.transform = 'translateX(16px)';
                    setTimeout(() => {
                        row.remove();
                        checkIfCartEmpty(data.total_items);
                    }, 250);
                } else {
                    checkIfCartEmpty(data.total_items);
                }
            }

            // Update subtotal, shipment, and grand total
            updateSummaryTotals(data);

            // Update cart item count badge inside "Your Order"
            const orderCountBadge = document.getElementById('cart-item-count-badge');
            if (orderCountBadge && data.total_items !== undefined) {
                orderCountBadge.textContent = data.total_items + (data.total_items === 1 ? ' item' : ' items');
            }

            // Update navbar cart count badges
            updateNavbarCartBadges(data.total_items);
        })
        .catch(err => {
            console.error('Cart update error:', err);
            if (row) row.classList.remove('opacity-50');
        })
        .finally(() => {
            isUpdatingCart = false;
            if (btnDec) btnDec.disabled = false;
            if (btnInc) btnInc.disabled = false;
            if (btnRem) btnRem.disabled = false;
        });
    }

    /**
     * Update order summary totals (subtotal, shipping, grand total)
     */
    function updateSummaryTotals(data) {
        const subtotalEl = document.getElementById('summary-subtotal');
        const shippingEl = document.getElementById('summary-shipping');
        const grandTotalEl = document.getElementById('summary-grand-total');

        if (subtotalEl && data.subtotal !== undefined) {
            subtotalEl.textContent = '$' + parseFloat(data.subtotal).toFixed(2);
        }

        if (shippingEl && data.shippingCost !== undefined) {
            if (data.total_items === 0 || parseFloat(data.subtotal) <= 0) {
                shippingEl.textContent = '$0.00';
            } else if (parseFloat(data.shippingCost) === 0) {
                shippingEl.innerHTML = '<span class="text-emerald-600 dark:text-emerald-400 font-semibold">Free Delivery</span>';
            } else {
                shippingEl.textContent = '$' + parseFloat(data.shippingCost).toFixed(2);
            }
        }

        if (grandTotalEl && data.grandTotal !== undefined) {
            grandTotalEl.textContent = '$' + parseFloat(data.grandTotal).toFixed(2);
        }
    }

    /**
     * Check if cart is empty and update UI elements
     */
    function checkIfCartEmpty(totalItems) {
        const container = document.getElementById('checkout-cart-items');
        if (!container) return;

        const remainingRows = container.querySelectorAll('[data-product-id]');
        if (remainingRows.length === 0 || totalItems === 0) {
            container.innerHTML = `
                <div id="empty-cart-message" class="py-8 text-center space-y-3">
                    <div class="w-12 h-12 mx-auto rounded-full bg-gray-100 dark:bg-slate-800 flex items-center justify-center text-slate-400">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <p class="text-slate-600 dark:text-slate-300 font-semibold text-xs sm:text-sm">Your cart is empty.</p>
                    <a href="{{ route('shop') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-500 shadow-sm transition-all">
                        <span>Browse Products &rarr;</span>
                    </a>
                </div>
            `;

            // Reset summary to $0.00
            const subtotalEl = document.getElementById('summary-subtotal');
            const shippingEl = document.getElementById('summary-shipping');
            const grandTotalEl = document.getElementById('summary-grand-total');
            if (subtotalEl) subtotalEl.textContent = '$0.00';
            if (shippingEl) shippingEl.textContent = '$0.00';
            if (grandTotalEl) grandTotalEl.textContent = '$0.00';

            // Show empty cart warning
            const warning = document.getElementById('empty-cart-warning');
            if (warning) warning.classList.remove('hidden');

            // Disable payment buttons
            const placeOrderBtn = document.getElementById('place-order-button');
            if (placeOrderBtn) {
                placeOrderBtn.disabled = true;
                placeOrderBtn.classList.add('opacity-40', 'cursor-not-allowed');
            }

            const applePayBtn = document.getElementById('apple-pay-btn');
            if (applePayBtn) {
                applePayBtn.disabled = true;
                applePayBtn.classList.add('opacity-40', 'cursor-not-allowed');
            }

            const stripePayBtn = document.getElementById('stripe-pay-btn');
            if (stripePayBtn) {
                stripePayBtn.disabled = true;
                stripePayBtn.classList.add('opacity-40', 'cursor-not-allowed');
            }
        }
    }

    /**
     * Update top navigation bar cart badges
     */
    function updateNavbarCartBadges(totalItems) {
        document.querySelectorAll('a[href="{{ route('checkout') }}"] span').forEach(badge => {
            if (totalItems !== undefined) {
                badge.textContent = totalItems;
            }
        });
    }

    /**
     * Card number spacing formatter (4242 4242 4242 4242)
     */
    function formatCardNumber(input) {
        let value = input.value.replace(/\D/g, '').substring(0, 16);
        let parts = [];
        for (let i = 0; i < value.length; i += 4) {
            parts.push(value.substring(i, i + 4));
        }
        input.value = parts.join(' ');
    }

    /**
     * Expiration date formatter (MM / YY)
     */
    function formatExpiry(input) {
        let value = input.value.replace(/\D/g, '').substring(0, 4);
        if (value.length >= 3) {
            input.value = value.substring(0, 2) + ' / ' + value.substring(2);
        } else {
            input.value = value;
        }
    }

    const PAYMENT_CONFIRM_URL = @json(route('payment.confirm'));
    const PAYMENT_INTENT_URL = @json(route('payment.intent'));
    const CHECKOUT_SESSION_URL = @json(route('payment.checkout.session'));
    const STRIPE_DEMO_MODE = @json($stripeDemoMode ?? true);
    const STRIPE_LIVE_MODE = @json($stripeLiveMode ?? false);
    const STRIPE_PUBLISHABLE_KEY = @json($stripeKey ?? '');
    const STRIPE_CURRENCY = @json($stripeCurrency ?? 'aud');
    const AMOUNT_CENTS = @json((int) ($amountCents ?? 0));
    const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}';

    let paymentBusy = false;
    let stripe = null;
    let paymentRequest = null;
    let nativeApplePayAvailable = false;

    function showPaymentStatus(message, type = 'info') {
        const el = document.getElementById('payment-status');
        if (!el) {
            if (type === 'error') alert(message);
            return;
        }
        el.classList.remove('hidden');
        el.className = 'mb-3 rounded-lg px-3 py-2 text-[11px] font-medium border';
        if (type === 'error') {
            el.classList.add('bg-rose-50', 'text-rose-700', 'border-rose-200');
        } else if (type === 'success') {
            el.classList.add('bg-emerald-50', 'text-emerald-700', 'border-emerald-200');
        } else {
            el.classList.add('bg-sky-50', 'text-sky-700', 'border-sky-200');
        }
        el.textContent = message;
    }

    function setCardError(message) {
        const el = document.getElementById('card-errors');
        if (!el) return;
        if (!message) {
            el.classList.add('hidden');
            el.textContent = '';
            return;
        }
        el.classList.remove('hidden');
        el.textContent = message;
    }

    function setPaymentBusy(busy) {
        paymentBusy = busy;
        const emptyWarning = document.getElementById('empty-cart-warning');
        const cartEmpty = emptyWarning && !emptyWarning.classList.contains('hidden');
        ['apple-pay-btn', 'stripe-pay-btn', 'place-order-button'].forEach((id) => {
            const btn = document.getElementById(id);
            if (btn) btn.disabled = busy || cartEmpty;
        });
        const spinner = document.getElementById('place-order-spinner');
        const label = document.getElementById('place-order-label');
        if (spinner) spinner.classList.toggle('hidden', !busy);
        if (label) label.textContent = busy ? 'Processing...' : 'Place order';
    }

    function readCheckoutDetails() {
        const first = document.getElementById('first_name')?.value?.trim() || '';
        const last = document.getElementById('last_name')?.value?.trim() || '';
        return {
            customer_name: (first + ' ' + last).trim(),
            customer_email: document.getElementById('customer_email')?.value?.trim() || '',
            customer_phone: document.getElementById('customer_phone')?.value?.trim() || '',
            shipping_address: document.getElementById('shipping_address')?.value?.trim() || '',
            shipping_address2: document.getElementById('shipping_address2')?.value?.trim() || '',
            shipping_city: document.getElementById('shipping_city')?.value?.trim() || '',
            shipping_state: document.getElementById('shipping_state')?.value?.trim() || '',
            shipping_postcode: document.getElementById('shipping_postcode')?.value?.trim() || '',
            shipping_country: document.getElementById('shipping_country')?.value?.trim() || 'Australia',
            notes: document.getElementById('notes')?.value?.trim() || '',
        };
    }

    function openApplePayQr(url, qrImageUrl, amount) {
        const modal = document.getElementById('apple-pay-qr-modal');
        const img = document.getElementById('apple-pay-qr-image');
        const link = document.getElementById('apple-pay-qr-link');
        const amountEl = document.getElementById('apple-pay-qr-amount');
        if (img) img.src = qrImageUrl || ('https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=' + encodeURIComponent(url));
        if (link) link.href = url;
        if (amountEl) amountEl.textContent = amount != null ? ('Amount: $' + Number(amount).toFixed(2) + ' AUD') : '';
        if (modal) modal.classList.remove('hidden');
    }

    function closeApplePayQr() {
        const modal = document.getElementById('apple-pay-qr-modal');
        if (modal) modal.classList.add('hidden');
        setPaymentBusy(false);
    }

    async function createPaymentIntent(email) {
        const res = await fetch(PAYMENT_INTENT_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': CSRF_TOKEN,
            },
            body: JSON.stringify({ email: email || '' }),
        });
        const data = await res.json();
        if (!res.ok || !data.success) {
            throw new Error(data.message || 'Unable to start payment.');
        }
        return data;
    }

    async function confirmOnServer(paymentIntentId, method, extra = {}) {
        const res = await fetch(PAYMENT_CONFIRM_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': CSRF_TOKEN,
            },
            body: JSON.stringify({
                payment_intent_id: paymentIntentId,
                payment_method: method,
                ...extra,
            }),
        });
        const data = await res.json();
        if (!res.ok || !data.success) {
            throw new Error(data.message || 'Payment verification failed.');
        }
        return data;
    }

    async function finishOrder(paymentIntentId, method) {
        const form = document.getElementById('checkout-form');
        const methodInput = document.getElementById('selected_payment_method');
        const intentInput = document.getElementById('payment_intent_id');
        if (methodInput) methodInput.value = method;
        if (intentInput) intentInput.value = paymentIntentId || '';
        showPaymentStatus('Payment succeeded. Placing order...', 'success');
        form.submit();
    }

    async function payWithStripeCard() {
        const form = document.getElementById('checkout-form');
        if (!form || paymentBusy) return;

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const number = document.getElementById('card_number')?.value?.trim() || '';
        const expiry = document.getElementById('card_expiry')?.value?.trim() || '';
        const cvc = document.getElementById('card_cvc')?.value?.trim() || '';
        if (!number || !expiry || !cvc) {
            showPaymentStatus('Enter card number, expiry, and CVC to complete payment.', 'error');
            document.getElementById('card_number')?.focus();
            return;
        }

        setPaymentBusy(true);
        setCardError('');

        try {
            const details = readCheckoutDetails();
            showPaymentStatus(
                STRIPE_DEMO_MODE ? 'Authorising demo payment...' : (STRIPE_LIVE_MODE ? 'Processing live payment...' : 'Processing test payment...'),
                'info'
            );

            const confirmed = await confirmOnServer('', 'card', {
                card_number: number,
                card_expiry: expiry,
                card_cvc: cvc,
                email: details.customer_email || '',
            });
            await finishOrder(confirmed.payment_intent_id, 'card');
        } catch (err) {
            setCardError(err.message || 'Payment failed.');
            showPaymentStatus(err.message || 'Payment failed.', 'error');
            setPaymentBusy(false);
        }
    }

    async function startCheckoutSession(channel) {
        const form = document.getElementById('checkout-form');
        if (!form) return;

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const details = readCheckoutDetails();
        if (!details.customer_name || !details.customer_email || !details.shipping_address) {
            showPaymentStatus('Please complete billing details before paying.', 'error');
            return;
        }

        const methodInput = document.getElementById('selected_payment_method');
        if (methodInput) methodInput.value = channel;

        setPaymentBusy(true);
        showPaymentStatus(
            channel === 'apple_pay'
                ? 'Preparing Apple Pay...'
                : 'Redirecting to Stripe Checkout...',
            'info'
        );

        try {
            const res = await fetch(CHECKOUT_SESSION_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN,
                },
                body: JSON.stringify({
                    channel: channel,
                    ...details,
                }),
            });

            const data = await res.json();
            if (!res.ok || !data.success || !data.url) {
                throw new Error(data.message || 'Unable to start payment.');
            }

            if (channel === 'apple_pay') {
                openApplePayQr(data.url, data.qr_image_url, data.amount);
                showPaymentStatus('Scan the QR code with your iPhone to pay with Apple Pay.', 'success');
                return;
            }

            window.location.href = data.url;
        } catch (err) {
            showPaymentStatus(err.message || 'Unable to start payment.', 'error');
            setPaymentBusy(false);
        }
    }

    // async function payWithNativeApplePay() {
    //     if (!paymentRequest || !nativeApplePayAvailable) {
    //         return false;
    //     }
    //     try {
    //         paymentRequest.show();
    //         return true;
    //     } catch (e) {
    //         return false;
    //     }
    // }

    function payWithNativeApplePay() {

if (!paymentRequest || !nativeApplePayAvailable) {
    return false;
}

try {

    const paymentPromise = paymentRequest.show();

    paymentPromise.catch((error) => {

        console.error('Apple Pay error:', error);

        showPaymentStatus(
            error.message || 'Unable to open Apple Pay.',
            'error'
        );

        setPaymentBusy(false);

    });

    return true;

} catch (error) {

    console.error('Apple Pay error:', error);

    showPaymentStatus(
        error.message || 'Apple Pay is unavailable.',
        'error'
    );

    return false;
}
}

    async function payWithWallet(method) {
        if (paymentBusy) return;

        if (method === 'apple_pay' && !STRIPE_DEMO_MODE) {
            const usedNative = await payWithNativeApplePay();
            if (usedNative) return;
        }

        startCheckoutSession(method === 'apple_pay' ? 'apple_pay' : 'stripe');
    }

    function payWithCard() {
        if (paymentBusy) return;
        payWithStripeCard();
    }

    async function initStripeWallet() {
        if (STRIPE_DEMO_MODE || !STRIPE_PUBLISHABLE_KEY || typeof Stripe === 'undefined' || AMOUNT_CENTS < 50) {
            return;
        }

        stripe = Stripe(STRIPE_PUBLISHABLE_KEY);
        const elements = stripe.elements();

        paymentRequest = stripe.paymentRequest({
            country: 'AU',
            currency: (STRIPE_CURRENCY || 'aud').toLowerCase(),
            total: {
                label: 'VXPS Order',
                amount: AMOUNT_CENTS,
            },
            requestPayerName: true,
            requestPayerEmail: true,
        });

        const canPay = await paymentRequest.canMakePayment();
        const prContainer = document.getElementById('payment-request-button');

        if (canPay && prContainer) {
            nativeApplePayAvailable = !!(canPay.applePay || canPay.googlePay);
            const prButton = elements.create('paymentRequestButton', {
                paymentRequest,
                style: {
                    paymentRequestButton: {
                        type: 'buy',
                        theme: 'dark',
                        height: '44px',
                    },
                },
            });
            prButton.mount('#payment-request-button');
            prContainer.classList.remove('hidden');

            const hint = document.getElementById('apple-pay-hint');
            if (hint && canPay.applePay) {
                hint.textContent = 'Use the button above for Apple Pay, or tap Pay for a QR code';
            }
        } else if (prContainer) {
            prContainer.classList.add('hidden');
        }

        const walletSupportsApple = !!(canPay && canPay.applePay);

        paymentRequest.on('paymentmethod', async (ev) => {
            setPaymentBusy(true);
            showPaymentStatus('Confirming Apple Pay / wallet payment...', 'info');
            try {
                const form = document.getElementById('checkout-form');
                if (form && !form.checkValidity()) {
                    form.reportValidity();
                    ev.complete('fail');
                    setPaymentBusy(false);
                    return;
                }

                const details = readCheckoutDetails();
                const intent = await createPaymentIntent(details.customer_email || ev.payerEmail || '');
                const { error, paymentIntent } = await stripe.confirmCardPayment(
                    intent.client_secret,
                    { payment_method: ev.paymentMethod.id },
                    { handleActions: false }
                );

                if (error) {
                    ev.complete('fail');
                    throw new Error(error.message || 'Wallet payment failed.');
                }

                ev.complete('success');

                if (paymentIntent.status === 'requires_action') {
                    const { error: actionError, paymentIntent: pi2 } = await stripe.confirmCardPayment(intent.client_secret);
                    if (actionError || !pi2 || pi2.status !== 'succeeded') {
                        throw new Error(actionError?.message || 'Authentication failed.');
                    }
                    const confirmed = await confirmOnServer(pi2.id, 'apple_pay');
                    await finishOrder(confirmed.payment_intent_id, 'apple_pay');
                    return;
                }

                if (paymentIntent.status !== 'succeeded') {
                    throw new Error('Payment was not completed.');
                }

                const methodLabel = walletSupportsApple ? 'apple_pay' : 'card';
                const confirmed = await confirmOnServer(paymentIntent.id, methodLabel);
                await finishOrder(confirmed.payment_intent_id, confirmed.payment_method || methodLabel);
            } catch (err) {
                try { ev.complete('fail'); } catch (_) {}
                showPaymentStatus(err.message || 'Wallet payment failed.', 'error');
                setPaymentBusy(false);
            }
        });
    }

    window.closeApplePayQr = closeApplePayQr;
    window.payWithCard = payWithCard;
    window.payWithWallet = payWithWallet;

    function bootStripeWallet() {
        initStripeWallet().catch((err) => console.error(err));
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', bootStripeWallet);
    } else {
        bootStripeWallet();
    }

    window.addEventListener('pageshow', function (event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
</script>
@endsection
