@extends('layouts.app')

@section('title', 'Secure Checkout | VXPS Australia')

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
                            <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mb-6 tracking-tight">Billing Details</h2>

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
                                <label class="flex items-center gap-2.5 pt-2 cursor-pointer select-none">
                                    <input
                                        type="checkbox"
                                        name="ship_to_different_address"
                                        id="ship_different"
                                        class="w-4 h-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500"
                                    >
                                    <span class="text-xs text-slate-700 dark:text-slate-300">Ship to a different address?</span>
                                </label>
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
                    <div class="lg:col-span-5 sticky top-24 space-y-4">
                        {{-- Your Order Card --}}
                        <div class="bg-white dark:bg-slate-900 rounded-lg border border-gray-200 dark:border-slate-800 p-6 shadow-xs">
                            <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Your Order</h2>

                            <div class="divide-y divide-gray-100 dark:divide-slate-800 text-xs">
                                {{-- Header --}}
                                <div class="flex items-center justify-between pb-3 font-medium text-slate-600 dark:text-slate-400">
                                    <span>Product</span>
                                    <span>Subtotal</span>
                                </div>

                                {{-- Items --}}
                                @forelse($items as $productId => $item)
                                    <div class="flex items-center justify-between py-3">
                                        <span class="text-slate-700 dark:text-slate-300 font-medium pr-3">
                                            {{ $item['name'] }} &times; {{ $item['quantity'] }}
                                        </span>
                                        <span class="font-medium text-slate-900 dark:text-white shrink-0 font-mono">
                                            ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                        </span>
                                    </div>
                                @empty
                                    <div class="py-4 text-center text-slate-400">Your cart is empty.</div>
                                @endforelse

                                {{-- Subtotal --}}
                                <div class="flex items-center justify-between py-3 font-semibold text-slate-800 dark:text-slate-200">
                                    <span>Subtotal</span>
                                    <span id="summary-subtotal" class="font-mono">${{ number_format($subtotal, 2) }}</span>
                                </div>

                                {{-- Shipment --}}
                                <div class="flex items-center justify-between py-3 font-semibold text-slate-800 dark:text-slate-200">
                                    <span>Shipment</span>
                                    <span id="summary-shipping" class="font-mono">
                                        {{ $shippingCost == 0 ? 'Free Delivery' : '$' . number_format($shippingCost, 2) }}
                                    </span>
                                </div>

                                {{-- Total --}}
                                <div class="flex items-center justify-between py-3 text-sm font-bold text-slate-900 dark:text-white">
                                    <span>Total</span>
                                    <span id="summary-grand-total" class="font-mono">${{ number_format($grandTotal, 2) }}</span>
                                </div>
                            </div>

                            <p class="text-[11px] font-bold text-slate-900 dark:text-slate-200 mt-2">
                                Delivery charges apply to orders below $70.
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
                                <strong>Demo mode (dummy Stripe keys).</strong> Payments are simulated locally.
                                Test card: <span class="font-mono">4242 4242 4242 4242</span> · Exp <span class="font-mono">12/34</span> · CVC <span class="font-mono">123</span>
                            </div>
                        @endif

                        {{-- 1. Apple Pay --}}
                        <button
                            type="button"
                            id="apple-pay-btn"
                            onclick="payWithWallet('apple_pay')"
                            class="w-full h-11 bg-black hover:bg-neutral-900 text-white rounded-md flex items-center justify-center gap-1.5 font-semibold text-base transition-colors shadow-sm cursor-pointer select-none disabled:opacity-60"
                        >
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 170 170" aria-hidden="true">
                                <path d="M150.37 130.25c-2.45 5.66-5.35 10.87-8.71 15.66-4.58 6.53-8.33 11.05-11.22 13.56-4.48 4.12-9.28 6.23-14.42 6.35-3.69 0-8.14-1.05-13.32-3.18-5.19-2.12-9.97-3.17-14.34-3.17-4.58 0-9.49 1.05-14.75 3.17-5.26 2.13-9.5 3.24-12.74 3.35-4.35.13-9.16-1.9-14.42-6.08-3.7-3.04-7.58-7.7-11.64-13.98-5.77-8.8-10.27-18.7-13.5-29.7-3.23-11.01-4.85-21.75-4.85-32.22 0-14.8 3.7-27.12 11.1-36.96 7.4-9.84 16.7-14.87 27.9-15.09 5.25 0 10.66 1.45 16.23 4.36 5.57 2.91 9.3 4.43 11.2 4.56 1.69 0 5.64-1.57 11.87-4.7 6.22-3.14 11.87-4.48 16.94-4.04 13.9.78 24.8 6.06 32.72 15.82-12.18 7.37-18.15 17.5-17.9 30.39.23 10.22 4.13 18.8 11.7 25.75 7.57 6.95 16.53 10.87 26.89 11.76-2.12 6.53-4.68 13.2-7.68 20.02zM119.22 31.85c0-7.39 2.66-14.35 7.98-20.89 5.32-6.53 11.75-10.45 19.3-11.76.22 1.09.33 2.18.33 3.27 0 7.39-2.73 14.51-8.18 21.36-5.46 6.85-11.94 10.8-19.43 11.85-.22-1.3-.33-2.5-.33-3.83z"/>
                            </svg>
                            <span class="tracking-tight text-lg font-medium">Pay</span>
                        </button>

                        {{-- 2. Stripe --}}
                        <button
                            type="button"
                            id="stripe-pay-btn"
                            onclick="payWithWallet('stripe')"
                            class="w-full h-11 bg-[#635BFF] hover:bg-[#544EE0] text-white rounded-md flex items-center justify-center gap-2 font-bold text-sm transition-colors shadow-sm cursor-pointer select-none disabled:opacity-60"
                        >
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M13.976 9.15c-2.172-.806-3.356-1.426-3.356-2.409 0-.831.683-1.305 1.901-1.305 2.227 0 4.515.858 6.09 1.631l.89-5.494C18.252.975 15.697 0 12.165 0 9.667 0 7.589.654 6.104 1.846 4.515 3.125 3.8 4.911 3.8 7.044c0 4.039 2.467 5.76 6.476 7.219 2.585.92 3.445 1.574 3.445 2.583 0 .98-.84 1.545-2.354 1.545-1.875 0-4.965-.921-6.99-2.109l-.9 5.555C5.175 22.99 8.385 24 11.714 24c2.641 0 4.843-.624 6.328-1.813 1.664-1.305 2.525-3.236 2.525-5.732 0-4.128-2.524-5.851-6.591-7.305h.001z"/>
                            </svg>
                            <span>Pay with Stripe</span>
                        </button>

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

                            {{-- Inner grey container --}}
                            <div class="bg-[#f3f4f6] dark:bg-slate-800/80 rounded-xl p-4 space-y-3">
                                <div class="flex items-center gap-1.5 text-xs text-[#0284c7] font-medium">
                                    <svg class="w-3.5 h-3.5 text-emerald-600 fill-current shrink-0" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>Secure card checkout (Visa / Mastercard / Amex)</span>
                                </div>

                                <div>
                                    <label for="card_number" class="block text-[11px] text-slate-600 dark:text-slate-400 font-medium mb-1">
                                        Card number
                                    </label>
                                    <div class="relative flex items-center">
                                        <input
                                            type="text"
                                            id="card_number"
                                            name="card_number"
                                            placeholder="4242 4242 4242 4242"
                                            maxlength="19"
                                            autocomplete="cc-number"
                                            oninput="formatCardNumber(this)"
                                            class="w-full px-4 py-2.5 rounded-full bg-white dark:bg-slate-900 border border-gray-300 dark:border-slate-700 text-xs font-mono text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 pr-24 shadow-xs"
                                        >
                                        <div class="absolute right-3 flex items-center gap-1 pointer-events-none select-none">
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
                                            maxlength="5"
                                            autocomplete="cc-exp"
                                            oninput="formatExpiry(this)"
                                            class="w-full px-4 py-2.5 rounded-full bg-white dark:bg-slate-900 border border-gray-300 dark:border-slate-700 text-xs font-mono text-slate-900 dark:text-white placeholder-slate-400 text-center focus:outline-none focus:ring-2 focus:ring-emerald-500 shadow-xs"
                                        >
                                    </div>
                                    <div>
                                        <label for="card_cvc" class="block text-[11px] text-slate-600 dark:text-slate-400 font-medium mb-1">
                                            Security code
                                        </label>
                                        <div class="relative">
                                            <input
                                                type="password"
                                                id="card_cvc"
                                                name="card_cvc"
                                                placeholder="CVC"
                                                maxlength="4"
                                                autocomplete="cc-csc"
                                                class="w-full px-4 py-2.5 rounded-full bg-white dark:bg-slate-900 border border-gray-300 dark:border-slate-700 text-xs font-mono text-slate-900 dark:text-white placeholder-slate-400 text-center focus:outline-none focus:ring-2 focus:ring-emerald-500 pr-10 shadow-xs"
                                            >
                                            <span class="absolute right-3 top-2.5 px-1 py-0.5 border border-slate-300 dark:border-slate-600 rounded text-[9px] font-mono text-slate-400">123</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="text-[11px] text-slate-600 dark:text-slate-400 mt-4 leading-relaxed">
                                Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="{{ route('about') }}" class="text-rose-500 hover:underline">privacy policy</a>.
                            </p>

                            <button
                                type="button"
                                id="place-order-button"
                                onclick="payWithCard()"
                                class="w-full mt-4 py-3.5 px-4 rounded-md bg-[#8ce358] hover:bg-[#7ed44d] text-slate-950 font-bold text-sm tracking-wide transition-all shadow-sm flex items-center justify-center gap-2 cursor-pointer active:scale-98 disabled:opacity-60"
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
@endsection

@push('scripts')
<script>
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
</script>
@endpush
