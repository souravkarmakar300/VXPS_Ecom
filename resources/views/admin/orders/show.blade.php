@extends('layouts.admin')

@php
    $title = 'Order ' . $order->order_number;
    $header = 'Order Details #' . $order->order_number;
    $itemsArray = is_array($order->items) ? $order->items : json_decode($order->items, true) ?? [];
    $totalItemCount = 0;
    $itemsSubtotal = 0;
    foreach ($itemsArray as $item) {
        $qty = (int)($item['quantity'] ?? 1);
        $pr = (float)($item['price'] ?? 0);
        $totalItemCount += $qty;
        $itemsSubtotal += ($pr * $qty);
    }
@endphp

@section('content')
<div class="space-y-6 max-w-7xl mx-auto">
    <!-- Breadcrumb & Top Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <nav class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-1">
                <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
                <span>/</span>
                <a href="{{ route('admin.orders.index') }}" class="hover:underline">Orders</a>
                <span>/</span>
                <span class="text-slate-900 dark:text-white font-mono font-semibold">{{ $order->order_number }}</span>
            </nav>
            <div class="flex items-center gap-3 flex-wrap">
                <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight font-mono">
                    {{ $order->order_number }}
                </h2>
                <!-- Status Badges -->
                @if(in_array($order->status, ['completed', 'delivered']))
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/30">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Delivered
                    </span>
                @elseif($order->status === 'dispatched')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-sky-500/10 text-sky-600 dark:text-sky-400 border border-sky-500/30">
                        <span class="w-2 h-2 rounded-full bg-sky-500 animate-pulse"></span> Dispatched
                    </span>
                @elseif($order->status === 'processing')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 border border-indigo-500/30">
                        <span class="w-2 h-2 rounded-full bg-indigo-500"></span> Processing
                    </span>
                @elseif($order->status === 'confirmed')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-teal-500/10 text-teal-600 dark:text-teal-400 border border-teal-500/30">
                        <span class="w-2 h-2 rounded-full bg-teal-500"></span> Confirmed
                    </span>
                @elseif($order->status === 'cancelled')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-500/10 text-rose-600 dark:text-rose-400 border border-rose-500/30">
                        <span class="w-2 h-2 rounded-full bg-rose-500"></span> Cancelled
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-600 dark:text-amber-400 border border-amber-500/30">
                        <span class="w-2 h-2 rounded-full bg-amber-500"></span> Pending
                    </span>
                @endif

                @if($order->payment_status === 'paid')
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Paid
                    </span>
                @else
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-600 dark:text-amber-400 border border-amber-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> {{ ucfirst($order->payment_status ?? 'Pending') }}
                    </span>
                @endif
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400 font-mono mt-1">
                Placed on {{ $order->created_at->format('l, F j, Y \a\t g:i A') }} ({{ $order->created_at->diffForHumans() }})
            </p>
        </div>

        <div class="flex items-center gap-2">
            <button 
                type="button" 
                onclick="window.print()" 
                class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-700/60 transition-colors shadow-2xs cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                <span>Print Order</span>
            </button>
            <a 
                href="{{ route('admin.orders.index') }}" 
                class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-700/60 transition-colors shadow-2xs"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Back to Orders</span>
            </a>
        </div>
    </div>

    <!-- Main 2-Column Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Left 2 Cols: Order Items & Notes -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Items Purchased Card -->
            <div class="bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80 rounded-2xl shadow-xs overflow-hidden">
                <div class="p-5 border-b border-gray-200 dark:border-slate-800 flex items-center justify-between">
                    <div>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white">Order Items</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">{{ $totalItemCount }} {{ Str::plural('product', $totalItemCount) }} in this order</p>
                    </div>
                    <span class="text-xs font-mono px-2.5 py-1 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 font-semibold border border-emerald-500/20">
                        {{ count($itemsArray) }} line {{ Str::plural('item', count($itemsArray)) }}
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs sm:text-sm text-slate-700 dark:text-slate-300">
                        <thead class="text-[11px] uppercase tracking-wider text-slate-500 dark:text-slate-400 bg-gray-50 dark:bg-slate-800/40 border-b border-gray-200 dark:border-slate-800">
                            <tr>
                                <th class="px-5 py-3 rounded-l-lg">Product</th>
                                <th class="px-4 py-3 text-right">Price</th>
                                <th class="px-4 py-3 text-center">Qty</th>
                                <th class="px-5 py-3 rounded-r-lg text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-slate-800/60">
                            @forelse($itemsArray as $item)
                                @php
                                    $itemPrice = (float)($item['price'] ?? 0);
                                    $itemQty = (int)($item['quantity'] ?? 1);
                                    $lineTotal = $itemPrice * $itemQty;
                                    $itemImage = $item['image'] ?? null;
                                    if ($itemImage && !str_starts_with($itemImage, 'http') && !str_starts_with($itemImage, '/')) {
                                        $itemImage = asset($itemImage);
                                    }
                                @endphp
                                <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-5 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-14 h-14 rounded-xl bg-gray-100 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 flex items-center justify-center overflow-hidden shrink-0">
                                                @if($itemImage)
                                                    <img src="{{ $itemImage }}" alt="{{ $item['name'] ?? 'Product' }}" class="w-full h-full object-contain p-1">
                                                @else
                                                    <svg class="w-6 h-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                                    </svg>
                                                @endif
                                            </div>
                                            <div class="min-w-0">
                                                <div class="font-bold text-slate-900 dark:text-white line-clamp-1">
                                                    {{ $item['name'] ?? 'Product Item' }}
                                                </div>
                                                <div class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">
                                                    Category: <span class="text-emerald-600 dark:text-emerald-400 font-medium">{{ $item['category'] ?? 'General' }}</span>
                                                </div>
                                                @if(!empty($item['slug']))
                                                    <a href="{{ route('product.show', $item['slug']) }}" target="_blank" class="text-[11px] text-slate-400 hover:text-emerald-500 hover:underline flex items-center gap-1 mt-0.5">
                                                        <span>View product page</span>
                                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                        </svg>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-right font-mono font-semibold text-slate-900 dark:text-white">
                                        ${{ number_format($itemPrice, 2) }}
                                    </td>
                                    <td class="px-4 py-4 text-center">
                                        <span class="inline-block px-2.5 py-1 rounded-lg bg-gray-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-mono font-bold text-xs border border-gray-200 dark:border-slate-700">
                                            x{{ $itemQty }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 text-right font-mono font-bold text-emerald-600 dark:text-emerald-400 text-sm">
                                        ${{ number_format($lineTotal, 2) }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-5 py-6 text-center text-slate-500">
                                        No item details available for this order.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Financial Calculation Summary -->
                <div class="p-5 bg-gray-50/70 dark:bg-slate-800/30 border-t border-gray-200 dark:border-slate-800">
                    <div class="max-w-xs ml-auto space-y-2 text-xs sm:text-sm">
                        <div class="flex items-center justify-between text-slate-600 dark:text-slate-400">
                            <span>Items Subtotal</span>
                            <span class="font-mono font-semibold text-slate-900 dark:text-white">${{ number_format($itemsSubtotal > 0 ? $itemsSubtotal : $order->total_amount, 2) }}</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-600 dark:text-slate-400">
                            <span>Shipping ({{ ucfirst($order->shipping_method ?? 'standard') }})</span>
                            <span class="font-mono font-semibold {{ (float)$order->shipping_cost > 0 ? 'text-slate-900 dark:text-white' : 'text-emerald-600 dark:text-emerald-400' }}">
                                {{ (float)$order->shipping_cost > 0 ? '$' . number_format($order->shipping_cost, 2) : 'Free ($0.00)' }}
                            </span>
                        </div>
                        @if((float)$order->discount_amount > 0)
                            <div class="flex items-center justify-between text-rose-600 dark:text-rose-400">
                                <span>Discount @if($order->discount_code)({{ $order->discount_code }})@endif</span>
                                <span class="font-mono font-semibold">-${{ number_format($order->discount_amount, 2) }}</span>
                            </div>
                        @endif
                        <div class="pt-3 border-t border-gray-300 dark:border-slate-700 flex items-center justify-between text-base font-black text-slate-900 dark:text-white">
                            <span>Total Paid (AUD)</span>
                            <span class="font-mono text-emerald-600 dark:text-emerald-400 text-lg">${{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customer Notes / Delivery Instructions -->
            @if(!empty($order->notes))
                <div class="bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80 rounded-2xl p-5 shadow-xs">
                    <div class="flex items-center gap-2 mb-2 text-slate-900 dark:text-white font-bold text-sm">
                        <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        <span>Customer Delivery Notes</span>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 bg-gray-50 dark:bg-slate-800/50 p-4 rounded-xl border border-gray-200 dark:border-slate-700 whitespace-pre-line leading-relaxed">
                        {{ $order->notes }}
                    </p>
                </div>
            @endif


        </div>

        <!-- Right 1 Col: Customer Details & Shipping Details -->
        <div class="space-y-6">
            
            <!-- Customer All Details Card -->
            <div class="bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80 rounded-2xl p-5 sm:p-6 shadow-xs">
                <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-slate-800">
                    <h3 class="text-base font-bold text-slate-900 dark:text-white">Customer Profile</h3>
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                </div>

                <div class="mt-4 flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-emerald-500 to-teal-500 text-white font-black text-lg flex items-center justify-center shrink-0 shadow-sm">
                        {{ strtoupper(substr($order->customer_name ?: 'C', 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <h4 class="font-bold text-slate-900 dark:text-white text-base truncate">
                            {{ $order->customer_name }}
                        </h4>
                        <span class="text-[11px] text-slate-400 font-mono">Store Customer</span>
                    </div>
                </div>

                <div class="mt-5 space-y-3 pt-4 border-t border-gray-200 dark:border-slate-800 text-xs sm:text-sm">
                    <!-- Email -->
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">Email Address</span>
                        <a href="mailto:{{ $order->customer_email }}" class="text-emerald-600 dark:text-emerald-400 hover:underline flex items-center gap-1.5 font-mono break-all font-semibold">
                            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>{{ $order->customer_email }}</span>
                        </a>
                    </div>

                    <!-- Phone -->
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">Phone Number</span>
                        @if($order->customer_phone)
                            <a href="tel:{{ $order->customer_phone }}" class="text-slate-900 dark:text-white hover:text-emerald-500 flex items-center gap-1.5 font-mono font-semibold">
                                <svg class="w-4 h-4 shrink-0 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span>{{ $order->customer_phone }}</span>
                            </a>
                        @else
                            <span class="text-slate-400 font-mono">Not provided</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Shipping & Delivery Address Card -->
            <div class="bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80 rounded-2xl p-5 sm:p-6 shadow-xs">
                <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-slate-800">
                    <h3 class="text-base font-bold text-slate-900 dark:text-white">Shipping & Delivery</h3>
                    <svg class="w-5 h-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>

                <div class="mt-4 space-y-3 text-xs sm:text-sm">
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">Recipient</span>
                        <p class="font-bold text-slate-900 dark:text-white">{{ $order->customer_name }}</p>
                    </div>

                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">Street Address</span>
                        <p class="text-slate-800 dark:text-slate-200 font-medium leading-relaxed">
                            {{ $order->shipping_address ?: 'No street address specified' }}
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">City / Suburb</span>
                            <p class="text-slate-800 dark:text-slate-200 font-medium">{{ $order->shipping_city ?: 'N/A' }}</p>
                        </div>
                        <div>
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">State & Postcode</span>
                            <p class="text-slate-800 dark:text-slate-200 font-medium font-mono">{{ $order->shipping_state ?: '' }} {{ $order->shipping_postcode ?: '' }}</p>
                        </div>
                    </div>

                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">Country</span>
                        <p class="text-slate-800 dark:text-slate-200 font-medium">{{ $order->shipping_country ?: 'Australia' }}</p>
                    </div>

                    <div class="pt-3 border-t border-gray-200 dark:border-slate-800 flex items-center justify-between">
                        <div>
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block">Shipping Method</span>
                            <span class="font-bold text-emerald-600 dark:text-emerald-400 uppercase text-xs">{{ $order->shipping_method ?: 'Standard' }}</span>
                        </div>
                        @php
                            $fullMapQuery = urlencode(trim($order->shipping_address . ', ' . $order->shipping_city . ' ' . $order->shipping_state . ' ' . $order->shipping_postcode . ' ' . $order->shipping_country));
                        @endphp
                        @if(!empty($order->shipping_address))
                            <a 
                                href="https://www.google.com/maps/search/?api=1&query={{ $fullMapQuery }}" 
                                target="_blank"
                                class="inline-flex items-center gap-1 text-[11px] font-bold text-slate-600 dark:text-slate-400 hover:text-emerald-500 hover:underline"
                            >
                                <span>Open Maps</span>
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Payment & Transaction Details Card -->
            <div class="bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80 rounded-2xl p-5 sm:p-6 shadow-xs">
                <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-slate-800">
                    <h3 class="text-base font-bold text-slate-900 dark:text-white">Payment Details</h3>
                    <span class="text-[10px] uppercase font-mono px-2 py-0.5 rounded bg-gray-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 border border-gray-200 dark:border-slate-700">
                        {{ $order->payment_method ?: 'Stripe' }}
                    </span>
                </div>

                <div class="mt-4 space-y-3 text-xs sm:text-sm">
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">Payment Status</span>
                        <div class="flex items-center gap-2">
                            @if($order->payment_status === 'paid')
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Paid in Full
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-600 dark:text-amber-400 border border-amber-500/20">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> {{ ucfirst($order->payment_status ?? 'Pending') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    @if(!empty($order->payment_reference))
                        <div>
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">Payment Reference</span>
                            <p class="font-mono text-slate-800 dark:text-slate-200 text-xs bg-gray-50 dark:bg-slate-800/60 p-2 rounded-lg border border-gray-200 dark:border-slate-700 select-all">
                                {{ $order->payment_reference }}
                            </p>
                        </div>
                    @endif

                    @if(!empty($order->stripe_payment_intent_id))
                        <div>
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">Stripe Intent ID</span>
                            <p class="font-mono text-slate-800 dark:text-slate-200 text-[11px] bg-gray-50 dark:bg-slate-800/60 p-2 rounded-lg border border-gray-200 dark:border-slate-700 select-all break-all">
                                {{ $order->stripe_payment_intent_id }}
                            </p>
                        </div>
                    @endif

                    <div class="pt-2 text-xs text-slate-400">
                        Total Amount Charged: <strong class="text-slate-900 dark:text-white font-mono">${{ number_format($order->total_amount, 2) }} AUD</strong>
                    </div>
                </div>
            </div>

            <!-- Danger Zone / Delete Order -->
            <div class="p-4 rounded-2xl bg-rose-50/50 dark:bg-rose-950/20 border border-rose-200/80 dark:border-rose-900/40">
                <h4 class="text-xs font-bold uppercase tracking-wider text-rose-700 dark:text-rose-400 mb-1">Danger Zone</h4>
                <p class="text-xs text-rose-600/80 dark:text-rose-300/80 mb-3">Permanently remove this order record from the store database.</p>
                
                <form 
                    action="{{ route('admin.orders.destroy', $order) }}" 
                    method="POST" 
                    onsubmit="return confirm('Are you sure you want to permanently delete order #{{ $order->order_number }}? This cannot be undone.')"
                >
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit" 
                        class="w-full flex items-center justify-center gap-1.5 px-3 py-2 rounded-xl text-xs font-bold text-rose-600 dark:text-rose-300 hover:text-white hover:bg-rose-600 dark:hover:bg-rose-600 border border-rose-300 dark:border-rose-800 transition-colors cursor-pointer"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        <span>Delete Order</span>
                    </button>
                </form>
            </div>

        </div>

    </div>
</div>
@endsection

