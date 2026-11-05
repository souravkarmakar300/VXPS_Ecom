@extends('layouts.app')

@section('title', 'Order Confirmed • ' . $order->order_number . ' | VXPS Australia')
@section('meta_description', '')
@section('meta_keywords', '')

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

                {{-- Download PDF & Print Receipt Action Buttons --}}
                <div class="mt-5 flex flex-wrap items-center justify-center gap-3">
                    <button
                        type="button"
                        id="btn-download-pdf"
                        onclick="downloadReceiptPdf()"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-black text-xs sm:text-sm tracking-wide shadow-lg shadow-emerald-600/25 active:scale-95 transition-all duration-200 cursor-pointer"
                    >
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span id="btn-download-text">Download Receipt (PDF)</span>
                    </button>

                    <button
                        type="button"
                        onclick="printReceipt()"
                        class="inline-flex items-center gap-2 px-4 py-2.5 sm:px-5 sm:py-3 rounded-2xl bg-gray-100 hover:bg-gray-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 font-bold text-xs sm:text-sm transition-all cursor-pointer border border-gray-200 dark:border-slate-700"
                    >
                        <svg class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                        <span>Print Receipt</span>
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
                <div class="flex items-center gap-2.5 shrink-0">
                    <button
                        type="button"
                        onclick="downloadReceiptPdf()"
                        class="px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-md flex items-center gap-1.5 cursor-pointer"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span>Receipt (PDF)</span>
                    </button>
                    <a
                        href="{{ route('shop') }}"
                        class="px-5 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-md"
                    >
                        Back to Store
                    </a>
                </div>
            </div>

        </div>
</div>

{{-- Off-Screen Dedicated High-Resolution Receipt for PDF Generation --}}
@php
    $itemsArray = is_array($order->items) ? $order->items : (json_decode($order->items, true) ?? []);
    $itemsSubtotal = 0;
    foreach ($itemsArray as $it) {
        $itemsSubtotal += ((float)($it['price'] ?? 0) * (int)($it['quantity'] ?? 1));
    }
    $shippingCost = (float)($order->shipping_cost ?? 0);
    $discountAmount = (float)($order->discount_amount ?? 0);
    $totalAmount = (float)($order->total_amount ?? ($itemsSubtotal + $shippingCost - $discountAmount));
    $gstIncluded = round($totalAmount / 11, 2);
@endphp

<div id="receipt-pdf-wrapper" style="position: absolute; left: -9999px; top: 0; width: 794px; background: #ffffff; color: #0f172a;">
    <div id="receipt-printable-content" style="padding: 36px 40px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background: #ffffff; color: #0f172a; line-height: 1.5; font-size: 13px;">
        
        <!-- Header -->
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 24px; border-bottom: 2px solid #059669; padding-bottom: 18px;">
            <tr>
                <td style="vertical-align: top; width: 55%;">
                    <div style="font-size: 26px; font-weight: 900; letter-spacing: -0.5px; color: #0f172a;">
                        VXPS <span style="color: #059669;">AUSTRALIA</span>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; color: #64748b; margin-top: 2px;">
                        Portable Power &amp; Smart Tech Essentials
                    </div>
                    <div style="font-size: 11px; color: #475569; margin-top: 8px; line-height: 1.45;">
                        <strong>VXPS Pty Ltd</strong> &bull; ABN: 82 641 982 104<br>
                        Adelaide, South Australia, Australia<br>
                        support@vxps.com.au &bull; www.vxps.com.au
                    </div>
                </td>
                <td style="vertical-align: top; text-align: right; width: 45%;">
                    <div style="display: inline-block; background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; font-size: 11px; font-weight: 800; padding: 4px 12px; border-radius: 20px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">
                        &bull; Official Tax Invoice &amp; Receipt
                    </div>
                    <div style="font-size: 13px; font-weight: 800; color: #0f172a;">
                        Order # <span style="font-family: monospace; font-size: 15px; color: #059669;">{{ $order->order_number }}</span>
                    </div>
                    <div style="font-size: 11px; color: #64748b; margin-top: 3px;">
                        Date: <strong>{{ $order->created_at->format('d M Y, h:i A') }}</strong>
                    </div>
                    <div style="font-size: 11px; color: #64748b; margin-top: 2px;">
                        Payment Method: <strong>{{ strtoupper($order->payment_method ?: 'Card') }}</strong>
                    </div>
                    @if(!empty($order->payment_reference))
                        <div style="font-size: 10px; font-family: monospace; color: #64748b; margin-top: 2px;">
                            Ref: {{ $order->payment_reference }}
                        </div>
                    @endif
                </td>
            </tr>
        </table>

        <!-- Customer & Delivery Info Grid -->
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 24px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px;">
            <tr>
                <td style="width: 50%; padding: 16px 20px; vertical-align: top; border-right: 1px solid #e2e8f0;">
                    <div style="font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; color: #64748b; margin-bottom: 6px;">
                        Customer Details
                    </div>
                    <div style="font-size: 14px; font-weight: 800; color: #0f172a;">
                        {{ $order->customer_name }}
                    </div>
                    <div style="font-size: 12px; color: #334155; margin-top: 2px;">
                        {{ $order->customer_email }}
                    </div>
                    @if($order->customer_phone)
                        <div style="font-size: 12px; color: #334155; margin-top: 1px;">
                            Phone: {{ $order->customer_phone }}
                        </div>
                    @endif
                </td>
                <td style="width: 50%; padding: 16px 20px; vertical-align: top;">
                    <div style="font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; color: #64748b; margin-bottom: 6px;">
                        Shipping &amp; Delivery Address
                    </div>
                    <div style="font-size: 12px; font-weight: 600; color: #0f172a; line-height: 1.45;">
                        {{ $order->shipping_address }}<br>
                        {{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_postcode }}<br>
                        {{ $order->shipping_country ?: 'Australia' }}
                    </div>
                    <div style="font-size: 11px; color: #059669; font-weight: 700; margin-top: 4px;">
                        Method: {{ ucfirst($order->shipping_method ?: 'Australia Post Standard Tracked') }}
                    </div>
                </td>
            </tr>
        </table>

        <!-- Purchased Items Table -->
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 22px;">
            <thead>
                <tr style="background: #0f172a; color: #ffffff;">
                    <th style="padding: 10px 14px; text-align: left; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; border-top-left-radius: 8px;">#</th>
                    <th style="padding: 10px 14px; text-align: left; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px;">Item Description</th>
                    <th style="padding: 10px 14px; text-align: left; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px;">Category</th>
                    <th style="padding: 10px 14px; text-align: right; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px;">Unit Price</th>
                    <th style="padding: 10px 14px; text-align: center; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px;">Qty</th>
                    <th style="padding: 10px 14px; text-align: right; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; border-top-right-radius: 8px;">Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse($itemsArray as $index => $item)
                    @php
                        $iPrice = (float)($item['price'] ?? 0);
                        $iQty = (int)($item['quantity'] ?? 1);
                        $iLineTotal = $iPrice * $iQty;
                    @endphp
                    <tr style="border-bottom: 1px solid #e2e8f0; background: {{ $index % 2 === 0 ? '#ffffff' : '#f8fafc' }};">
                        <td style="padding: 11px 14px; font-weight: 700; color: #64748b; font-size: 12px;">{{ $index + 1 }}</td>
                        <td style="padding: 11px 14px; font-weight: 700; color: #0f172a; font-size: 12.5px;">
                            {{ $item['name'] ?? 'Product' }}
                        </td>
                        <td style="padding: 11px 14px; color: #475569; font-size: 11.5px;">
                            {{ $item['category'] ?? 'Hardware' }}
                        </td>
                        <td style="padding: 11px 14px; text-align: right; font-family: monospace; font-weight: 600; color: #0f172a; font-size: 12.5px;">
                            ${{ number_format($iPrice, 2) }}
                        </td>
                        <td style="padding: 11px 14px; text-align: center; font-weight: 800; color: #0f172a; font-size: 12px;">
                            {{ $iQty }}
                        </td>
                        <td style="padding: 11px 14px; text-align: right; font-family: monospace; font-weight: 800; color: #059669; font-size: 13px;">
                            ${{ number_format($iLineTotal, 2) }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding: 16px; text-align: center; color: #64748b;">Hardware package items.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Summary Totals -->
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 24px;">
            <tr>
                <td style="width: 52%; vertical-align: top; padding-right: 24px;">
                    <div style="background: #ecfdf5; border: 1px dashed #059669; border-radius: 10px; padding: 14px;">
                        <div style="font-size: 11px; font-weight: 800; color: #065f46; text-transform: uppercase; letter-spacing: 0.5px;">
                            &check; PAYMENT CONFIRMED &bull; PAID IN FULL
                        </div>
                        <div style="font-size: 11px; color: #047857; margin-top: 4px; line-height: 1.4;">
                            Thank you for your payment. Your invoice is recorded under reference <strong>{{ $order->order_number }}</strong>.
                        </div>
                    </div>
                    @if(!empty($order->notes))
                        <div style="margin-top: 10px; font-size: 11px; color: #64748b; font-style: italic;">
                            Notes: "{{ $order->notes }}"
                        </div>
                    @endif
                </td>
                <td style="width: 48%; vertical-align: top;">
                    <table style="width: 100%; border-collapse: collapse; font-size: 12.5px;">
                        <tr>
                            <td style="padding: 5px 0; color: #64748b;">Items Subtotal:</td>
                            <td style="padding: 5px 0; text-align: right; font-family: monospace; font-weight: 600; color: #0f172a;">${{ number_format($itemsSubtotal > 0 ? $itemsSubtotal : $totalAmount, 2) }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 0; color: #64748b;">Shipping &amp; Delivery:</td>
                            <td style="padding: 5px 0; text-align: right; font-family: monospace; font-weight: 600; color: {{ $shippingCost > 0 ? '#0f172a' : '#059669' }};">
                                {{ $shippingCost > 0 ? '$' . number_format($shippingCost, 2) : 'FREE' }}
                            </td>
                        </tr>
                        @if($discountAmount > 0)
                            <tr>
                                <td style="padding: 5px 0; color: #dc2626;">Discount:</td>
                                <td style="padding: 5px 0; text-align: right; font-family: monospace; font-weight: 600; color: #dc2626;">-${{ number_format($discountAmount, 2) }}</td>
                            </tr>
                        @endif
                        {{-- <tr>
                            <td style="padding: 5px 0; color: #64748b; font-size: 11px;">Included GST (10%):</td>
                            <td style="padding: 5px 0; text-align: right; font-family: monospace; color: #64748b; font-size: 11px;">${{ number_format($gstIncluded, 2) }}</td>
                        </tr> --}}
                        <tr style="border-top: 2px solid #0f172a;">
                            <td style="padding: 10px 0; font-size: 15px; font-weight: 900; color: #0f172a;">Total Paid (AUD):</td>
                            <td style="padding: 10px 0; text-align: right; font-family: monospace; font-size: 18px; font-weight: 900; color: #059669;">
                                ${{ number_format($totalAmount, 2) }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Footer -->
        <div style="border-top: 1px solid #e2e8f0; padding-top: 16px; text-align: center; font-size: 11px; color: #64748b; line-height: 1.5;">
            This document serves as an official Australian Tax Invoice and Payment Confirmation. All hardware includes 12 months manufacturer warranty.<br>
            For support, delivery status, or warranty inquiries, email <strong>support@vxps.com.au</strong> or call 1300 00 VXPS quoting Order <strong>#{{ $order->order_number }}</strong>.<br>
            <span style="font-weight: 800; color: #059669; font-size: 11.5px;">Thank you for choosing VXPS Australia!</span>
        </div>

    </div>
</div>
@endsection

@push('styles')
<style>
    @media print {
        body * {
            visibility: hidden !important;
        }
        #receipt-pdf-wrapper, #receipt-printable-content, #receipt-printable-content * {
            visibility: visible !important;
        }
        #receipt-pdf-wrapper {
            position: fixed !important;
            left: 0 !important;
            top: 0 !important;
            width: 100% !important;
            background: #ffffff !important;
            color: #0f172a !important;
            margin: 0 !important;
            padding: 0 !important;
        }
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>
<script>
    // Ensure navbar cart badge reflects 0 on order completion
    document.querySelectorAll('a[href="{{ route('checkout') }}"] span').forEach(badge => {
        badge.textContent = '0';
    });

    function downloadReceiptPdf() {
        const btn = document.getElementById('btn-download-pdf');
        const btnText = document.getElementById('btn-download-text');
        const originalText = btnText ? btnText.textContent : 'Download Receipt (PDF)';

        if (btnText) {
            btnText.textContent = 'Generating PDF...';
        }
        if (btn) {
            btn.disabled = true;
        }

        const element = document.getElementById('receipt-printable-content');
        if (!element) {
            alert('Receipt content could not be located.');
            if (btnText) btnText.textContent = originalText;
            if (btn) btn.disabled = false;
            return;
        }

        const orderNo = '{{ $order->order_number }}' || 'VXPS-Receipt';
        const opt = {
            margin:       [8, 8, 8, 8],
            filename:     `Receipt-${orderNo}.pdf`,
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { 
                scale: 2, 
                useCORS: true,
                logging: false,
                backgroundColor: '#ffffff'
            },
            jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };

        if (typeof html2pdf !== 'undefined') {
            html2pdf().set(opt).from(element).save().then(() => {
                if (btnText) btnText.textContent = 'Receipt Downloaded!';
                setTimeout(() => {
                    if (btnText) btnText.textContent = originalText;
                    if (btn) btn.disabled = false;
                }, 3000);
            }).catch(err => {
                console.error('PDF error, triggering browser print instead:', err);
                window.print();
                if (btnText) btnText.textContent = originalText;
                if (btn) btn.disabled = false;
            });
        } else {
            // Fallback to browser print if html2pdf is unavailable
            window.print();
            if (btnText) btnText.textContent = originalText;
            if (btn) btn.disabled = false;
        }
    }

    function printReceipt() {
        window.print();
    }
</script>
@endpush
