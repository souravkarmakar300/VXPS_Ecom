@extends('layouts.app')

@section('title', 'Order Confirmed • ' . $order->order_number . ' | VXPS Australia')

@section('meta')
    <meta name="description" content="Thank you for your order at VXPS Australia. Your hardware is being prepared for dispatch from our Adelaide facility.">
@endsection

@section('content')
<div class="py-10 sm:py-16 bg-gray-50/70 dark:bg-slate-950">
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- Hero Confirmation Card --}}
            <div class="bg-white dark:bg-slate-900 rounded-3xl border border-gray-200/90 dark:border-slate-800 p-6 sm:p-10 shadow-lg shadow-indigo-950/5 text-center relative overflow-hidden">
                <div class="absolute -top-24 -right-24 w-60 h-60 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

                {{-- Animated Checkmark --}}
                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-emerald-50 dark:bg-emerald-950/60 border-2 border-emerald-500/30 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mx-auto mb-5 shadow-lg shadow-emerald-500/20">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>

                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400 text-xs font-bold uppercase tracking-wider mb-3">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Order Confirmed &bull; Payment Received</span>
                </div>

                <h1 class="text-2xl sm:text-4xl font-black text-slate-900 dark:text-white tracking-tight">
                    Thank you for your order, {{ $order->customer_name }}!
                </h1>

                <p class="mt-2.5 text-xs sm:text-sm text-slate-500 dark:text-slate-400 max-w-lg mx-auto">
                    We've emailed your tax invoice to <strong class="text-slate-900 dark:text-white">{{ $order->customer_email }}</strong>. Your hardware is now queued for priority dispatch from our Adelaide warehouse.
                </p>

                {{-- Order Reference Pill --}}
                <div class="mt-6 inline-flex items-center gap-3 p-2.5 sm:p-3 rounded-2xl bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-slate-800">
                    <span class="text-xs text-slate-500 dark:text-slate-400">Order Number:</span>
                    <span class="font-mono text-sm sm:text-base font-black text-indigo-600 dark:text-indigo-400 select-all" id="order-no">{{ $order->order_number }}</span>
                    <button
                        type="button"
                        onclick="navigator.clipboard.writeText('{{ $order->order_number }}'); alert('Order number copied!')"
                        class="p-1.5 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-800 text-slate-500 text-xs cursor-pointer"
                        title="Copy Order Number"
                    >
                        📋
                    </button>
                </div>

                {{-- Dispatch Tracker Progress --}}
                <div class="mt-8 pt-8 border-t border-gray-100 dark:border-slate-800 max-w-2xl mx-auto">
                    <div class="grid grid-cols-3 gap-2 text-center text-xs">
                        <div class="flex flex-col items-center">
                            <div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center font-bold text-xs mb-1.5 shadow-md shadow-emerald-500/30">✓</div>
                            <span class="font-bold text-slate-900 dark:text-white text-xs">Order Placed</span>
                            <span class="text-[10px] text-slate-400 mt-0.5">Today</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 h-8 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold text-xs mb-1.5 shadow-md shadow-indigo-600/30 animate-pulse">📦</div>
                            <span class="font-bold text-indigo-600 dark:text-indigo-400 text-xs">Processing</span>
                            <span class="text-[10px] text-slate-400 mt-0.5">Adelaide Facility</span>
                        </div>
                        <div class="flex flex-col items-center opacity-60">
                            <div class="w-8 h-8 rounded-full bg-gray-200 dark:bg-slate-800 text-slate-500 flex items-center justify-center font-bold text-xs mb-1.5">🚚</div>
                            <span class="font-bold text-slate-600 dark:text-slate-400 text-xs">Out for Delivery</span>
                            <span class="text-[10px] text-slate-400 mt-0.5">2–4 Business Days</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2-Column Details: Shipping & Purchased Items --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Customer & Delivery Details --}}
                <div class="bg-white dark:bg-slate-900 rounded-3xl border border-gray-200/90 dark:border-slate-800 p-6 shadow-xs space-y-4">
                    <h3 class="text-sm font-black uppercase tracking-wider text-slate-900 dark:text-white flex items-center gap-2">
                        <span>📍</span>
                        <span>Delivery Information</span>
                    </h3>

                    <div class="space-y-3 text-xs divide-y divide-gray-100 dark:divide-slate-800">
                        <div class="pt-2">
                            <span class="text-slate-400 block text-[10px] uppercase font-bold">Recipient</span>
                            <span class="font-bold text-slate-900 dark:text-white text-sm">{{ $order->customer_name }}</span>
                            <span class="block text-slate-500">{{ $order->customer_email }} &bull; {{ $order->customer_phone }}</span>
                        </div>

                        <div class="pt-2.5">
                            <span class="text-slate-400 block text-[10px] uppercase font-bold">Shipping Address</span>
                            <span class="text-slate-900 dark:text-white font-medium block">
                                {{ $order->shipping_address }}
                            </span>
                            <span class="text-slate-600 dark:text-slate-400">
                                {{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_postcode }}
                            </span>
                            <span class="block text-slate-400 font-bold mt-0.5">{{ $order->shipping_country ?? 'Australia' }}</span>
                        </div>

                        <div class="pt-2.5 flex items-center justify-between">
                            <div>
                                <span class="text-slate-400 block text-[10px] uppercase font-bold">Shipping Method</span>
                                <span class="text-slate-900 dark:text-white font-bold">
                                    Australia Post Standard Tracked
                                </span>
                            </div>
                            <span class="font-mono font-bold text-slate-900 dark:text-white">
                                {{ (float)$order->shipping_cost == 0 ? 'FREE' : '$' . number_format($order->shipping_cost, 2) }}
                            </span>
                        </div>

                        @if($order->notes)
                            <div class="pt-2.5">
                                <span class="text-slate-400 block text-[10px] uppercase font-bold">Courier Instructions</span>
                                <p class="text-slate-600 dark:text-slate-400 italic">"{{ $order->notes }}"</p>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Purchased Items Summary --}}
                <div class="bg-white dark:bg-slate-900 rounded-3xl border border-gray-200/90 dark:border-slate-800 p-6 shadow-xs space-y-4">
                    <h3 class="text-sm font-black uppercase tracking-wider text-slate-900 dark:text-white flex items-center gap-2">
                        <span>📦</span>
                        <span>Items in this Order</span>
                    </h3>

                    <div class="divide-y divide-gray-100 dark:divide-slate-800 max-h-60 overflow-y-auto pr-1">
                        @if(is_array($order->items) && count($order->items))
                            @foreach($order->items as $item)
                                <div class="py-2.5 flex items-center justify-between gap-3 text-xs">
                                    <div class="flex items-center gap-2.5 min-w-0">
                                        <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-slate-950 flex items-center justify-center font-bold overflow-hidden shrink-0">
                                            @if(!empty($item['image']))
                                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                            @else
                                                ⚡
                                            @endif
                                        </div>
                                        <div class="min-w-0">
                                            <h4 class="font-bold text-slate-900 dark:text-white truncate">{{ $item['name'] }}</h4>
                                            <span class="text-[10px] text-slate-400">Qty: {{ $item['quantity'] }} &times; ${{ number_format($item['price'], 2) }}</span>
                                        </div>
                                    </div>
                                    <span class="font-mono font-bold text-slate-900 dark:text-white shrink-0">
                                        ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                    </span>
                                </div>
                            @endforeach
                        @else
                            <p class="text-xs text-slate-400">Hardware package.</p>
                        @endif
                    </div>

                    {{-- Totals --}}
                    <div class="pt-3 border-t border-gray-100 dark:border-slate-800 space-y-1.5 text-xs">
                        <div class="flex items-center justify-between text-slate-500">
                            <span>Delivery</span>
                            <span class="font-mono">{{ (float)$order->shipping_cost == 0 ? 'FREE' : '$' . number_format($order->shipping_cost, 2) }}</span>
                        </div>
                        <div class="pt-2 border-t border-gray-200 dark:border-slate-800 flex items-center justify-between text-sm font-black text-slate-900 dark:text-white">
                            <span>Total Paid (AUD)</span>
                            <span class="font-mono text-indigo-600 dark:text-indigo-400 text-lg">${{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Support & Return Guarantee Notice --}}
            <div class="p-5 rounded-3xl bg-indigo-50/60 dark:bg-slate-900/60 border border-indigo-100 dark:border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs">
                <div class="flex items-center gap-3 text-center sm:text-left">
                    <span class="text-3xl">🇦🇺</span>
                    <div>
                        <h4 class="font-bold text-slate-900 dark:text-white">Need help or want to modify your order?</h4>
                        <p class="text-slate-500 dark:text-slate-400 text-[11px] mt-0.5">Contact our Adelaide customer service team at <a href="mailto:support@vxps.com.au" class="font-bold text-indigo-600 hover:underline">support@vxps.com.au</a> or call 1300 00 VXPS.</p>
                    </div>
                </div>
                <a
                    href="{{ route('shop') }}"
                    class="px-5 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-md shrink-0"
                >
                    Back to Store
                </a>
            </div>

        </div>
</div>
@endsection
