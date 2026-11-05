@extends('layouts.admin')

@php
    $title = 'Orders';
    $header = 'Customer Orders';
@endphp

@section('content')
<div class="space-y-6 max-w-7xl mx-auto">
    <!-- Top Header & Breadcrumb -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Order Processing
                </span>
                <span class="text-xs text-slate-400 font-mono">{{ $counts['total'] }} total orders</span>
            </div>
            <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Customer Orders</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-0.5">Manage placed customer orders, fulfillment workflows, and customer delivery details.</p>
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-700/60 transition-colors shadow-2xs">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Dashboard</span>
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
        <a href="{{ route('admin.orders.index', ['status' => 'all', 'q' => $query]) }}" class="p-4 rounded-2xl bg-white dark:bg-slate-900/80 border transition-all {{ $status === 'all' ? 'border-emerald-500 ring-2 ring-emerald-500/20' : 'border-gray-200 dark:border-slate-800/80 hover:border-gray-300' }}">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">All Orders</span>
            <p class="text-2xl font-black text-slate-900 dark:text-white mt-1">{{ $counts['total'] }}</p>
        </a>

        <a href="{{ route('admin.orders.index', ['status' => 'confirmed', 'q' => $query]) }}" class="p-4 rounded-2xl bg-white dark:bg-slate-900/80 border transition-all {{ $status === 'confirmed' ? 'border-emerald-500 ring-2 ring-emerald-500/20' : 'border-gray-200 dark:border-slate-800/80 hover:border-gray-300' }}">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Confirmed / Pending</span>
                @if(($counts['confirmed'] + $counts['pending']) > 0)
                    <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                @endif
            </div>
            <p class="text-2xl font-black text-amber-500 mt-1">{{ $counts['confirmed'] + $counts['pending'] }}</p>
        </a>

        <a href="{{ route('admin.orders.index', ['status' => 'dispatched', 'q' => $query]) }}" class="p-4 rounded-2xl bg-white dark:bg-slate-900/80 border transition-all {{ $status === 'dispatched' ? 'border-emerald-500 ring-2 ring-emerald-500/20' : 'border-gray-200 dark:border-slate-800/80 hover:border-gray-300' }}">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Dispatched</span>
            <p class="text-2xl font-black text-sky-500 mt-1">{{ $counts['dispatched'] }}</p>
        </a>

        <div class="p-4 rounded-2xl bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Paid Revenue</span>
            <p class="text-2xl font-black text-emerald-600 dark:text-emerald-400 mt-1">${{ number_format($counts['total_revenue'], 2) }}</p>
        </div>
    </div>

    <!-- Search & Filter Controls -->
    <div class="bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80 rounded-2xl p-4 shadow-xs">
        <form method="GET" action="{{ route('admin.orders.index') }}" class="flex flex-col md:flex-row gap-3 items-stretch md:items-center justify-between">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input 
                    type="text" 
                    name="q" 
                    value="{{ $query }}" 
                    placeholder="Search by order #, customer name, email, phone, city..."
                    class="block w-full pl-10 pr-4 py-2 text-xs sm:text-sm rounded-xl border border-gray-300 dark:border-slate-700 bg-white dark:bg-slate-950 text-slate-900 dark:text-white placeholder:text-slate-400 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 transition-all"
                >
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <!-- Status Filter -->
                <select 
                    name="status" 
                    class="px-3 py-2 text-xs sm:text-sm rounded-xl border border-gray-300 dark:border-slate-700 bg-white dark:bg-slate-950 text-slate-900 dark:text-white outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 transition-all"
                >
                    <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Order Statuses</option>
                    <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ $status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="processing" {{ $status === 'processing' ? 'selected' : '' }}>Processing</option>
                    {{-- <option value="dispatched" {{ $status === 'dispatched' ? 'selected' : '' }}>Dispatched</option>
                    <option value="delivered" {{ $status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="cancelled" {{ $status === 'cancelled' ? 'selected' : '' }}>Cancelled</option> --}}
                </select>

                <!-- Payment Status Filter -->
                <select 
                    name="payment_status" 
                    class="px-3 py-2 text-xs sm:text-sm rounded-xl border border-gray-300 dark:border-slate-700 bg-white dark:bg-slate-950 text-slate-900 dark:text-white outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 transition-all"
                >
                    <option value="all" {{ $paymentStatus === 'all' ? 'selected' : '' }}>All Payments</option>
                    <option value="paid" {{ $paymentStatus === 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="pending" {{ $paymentStatus === 'pending' ? 'selected' : '' }}>Pending Payment</option>
                    <option value="failed" {{ $paymentStatus === 'failed' ? 'selected' : '' }}>Failed</option>
                    <option value="refunded" {{ $paymentStatus === 'refunded' ? 'selected' : '' }}>Refunded</option>
                </select>

                <button type="submit" class="px-4 py-2 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-500 transition-colors shadow-xs">
                    Filter
                </button>

                @if(!empty($query) || $status !== 'all' || $paymentStatus !== 'all')
                    <a href="{{ route('admin.orders.index') }}" class="px-3 py-2 rounded-xl text-xs font-semibold text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white border border-gray-200 dark:border-slate-700 hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Orders Table Card -->
    <div class="bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80 rounded-2xl shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs sm:text-sm text-slate-700 dark:text-slate-300">
                <thead class="text-[11px] uppercase tracking-wider text-slate-500 dark:text-slate-400 bg-gray-50 dark:bg-slate-800/40 border-b border-gray-200 dark:border-slate-800">
                    <tr>
                        <th class="px-5 py-3.5">Order #</th>
                        <th class="px-5 py-3.5">Customer Details</th>
                        <th class="px-5 py-3.5">Items</th>
                        <th class="px-5 py-3.5">Total & Payment</th>
                        <th class="px-5 py-3.5 text-center">Fulfillment</th>
                        <th class="px-5 py-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-slate-800/60">
                    @forelse($orders as $order)
                        @php
                            $itemsArray = is_array($order->items) ? $order->items : json_decode($order->items, true) ?? [];
                            $totalQuantity = 0;
                            foreach ($itemsArray as $item) {
                                $totalQuantity += (int)($item['quantity'] ?? 1);
                            }
                        @endphp
                        <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/30 transition-colors">
                            <!-- Order Number & Date -->
                            <td class="px-5 py-4 align-top">
                                <a href="{{ route('admin.orders.show', $order) }}" class="font-mono font-bold text-emerald-600 dark:text-emerald-400 hover:underline block text-sm">
                                    {{ $order->order_number }}
                                </a>
                                <span class="text-[11px] text-slate-500 font-mono block mt-1">
                                    {{ $order->created_at->format('M d, Y') }}
                                </span>
                                <span class="text-[10px] text-slate-400 font-mono block">
                                    {{ $order->created_at->format('h:i A') }}
                                </span>
                            </td>

                            <!-- Customer All Details Snippet -->
                            <td class="px-5 py-4 align-top">
                                <div class="font-bold text-slate-900 dark:text-white flex items-center gap-1.5">
                                    <span>{{ $order->customer_name }}</span>
                                </div>
                                <div class="text-xs text-slate-500 dark:text-slate-400 font-mono mt-1 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <a href="mailto:{{ $order->customer_email }}" class="hover:underline hover:text-emerald-500 truncate max-w-[200px]">
                                        {{ $order->customer_email }}
                                    </a>
                                </div>
                                @if($order->customer_phone)
                                    <div class="text-xs text-slate-500 dark:text-slate-400 font-mono mt-0.5 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        <a href="tel:{{ $order->customer_phone }}" class="hover:underline">
                                            {{ $order->customer_phone }}
                                        </a>
                                    </div>
                                @endif
                                <div class="text-[11px] text-slate-500 dark:text-slate-400 mt-1 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="truncate max-w-[220px]">
                                        {{ $order->shipping_city ?: 'City' }}, {{ $order->shipping_state ?: '' }} {{ $order->shipping_postcode }}
                                    </span>
                                </div>
                            </td>

                            <!-- Items Summary -->
                            <td class="px-5 py-4 align-top">
                                <div class="font-semibold text-slate-900 dark:text-white">
                                    {{ $totalQuantity }} {{ Str::plural('item', $totalQuantity) }}
                                </div>
                                <div class="text-[11px] text-slate-500 dark:text-slate-400 mt-1 space-y-0.5">
                                    @foreach(array_slice($itemsArray, 0, 2) as $it)
                                        <div class="truncate max-w-[180px]">
                                            &bull; {{ $it['quantity'] ?? 1 }}x {{ $it['name'] ?? 'Product' }}
                                        </div>
                                    @endforeach
                                    @if(count($itemsArray) > 2)
                                        <div class="text-emerald-600 dark:text-emerald-400 font-semibold text-[10px]">
                                            +{{ count($itemsArray) - 2 }} more
                                        </div>
                                    @endif
                                </div>
                            </td>

                            <!-- Total & Payment Status -->
                            <td class="px-5 py-4 align-top">
                                <div class="font-mono font-black text-slate-900 dark:text-white text-base">
                                    ${{ number_format($order->total_amount, 2) }} <span class="text-[10px] text-slate-400 font-sans font-normal">AUD</span>
                                </div>
                                <div class="mt-1.5 flex items-center gap-1.5 flex-wrap">
                                    @if($order->payment_status === 'paid')
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Paid
                                        </span>
                                    @elseif($order->payment_status === 'pending')
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-amber-500/10 text-amber-600 dark:text-amber-400 border border-amber-500/20">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Unpaid
                                        </span>
                                    @elseif($order->payment_status === 'refunded')
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-purple-500/10 text-purple-600 dark:text-purple-400 border border-purple-500/20">
                                            <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span> Refunded
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-rose-500/10 text-rose-600 dark:text-rose-400 border border-rose-500/20">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> {{ ucfirst($order->payment_status ?? 'failed') }}
                                        </span>
                                    @endif

                                    <span class="text-[10px] uppercase font-mono px-1.5 py-0.5 rounded bg-gray-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 border border-gray-200 dark:border-slate-700">
                                        {{ $order->payment_method ?: 'Card' }}
                                    </span>
                                </div>
                            </td>

                            <!-- Fulfillment Status Badge -->
                            <td class="px-5 py-4 align-top text-center">
                                @if(in_array($order->status, ['completed', 'delivered']))
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Delivered
                                    </span>
                                @elseif($order->status === 'dispatched')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-sky-500/10 text-sky-600 dark:text-sky-400 border border-sky-500/20">
                                        <span class="w-2 h-2 rounded-full bg-sky-500 animate-pulse"></span> Dispatched
                                    </span>
                                @elseif($order->status === 'processing')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 border border-indigo-500/20">
                                        <span class="w-2 h-2 rounded-full bg-indigo-500"></span> Processing
                                    </span>
                                @elseif($order->status === 'confirmed')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-teal-500/10 text-teal-600 dark:text-teal-400 border border-teal-500/20">
                                        <span class="w-2 h-2 rounded-full bg-teal-500"></span> Confirmed
                                    </span>
                                @elseif($order->status === 'cancelled')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-500/10 text-rose-600 dark:text-rose-400 border border-rose-500/20">
                                        <span class="w-2 h-2 rounded-full bg-rose-500"></span> Cancelled
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-600 dark:text-amber-400 border border-amber-500/20">
                                        <span class="w-2 h-2 rounded-full bg-amber-500"></span> Pending
                                    </span>
                                @endif
                            </td>

                            <!-- Action Buttons -->
                            <td class="px-5 py-4 align-top text-right">
                                <a 
                                    href="{{ route('admin.orders.show', $order) }}" 
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-500 shadow-xs transition-colors"
                                >
                                    <span>Details</span>
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-12 text-center">
                                <div class="max-w-sm mx-auto text-center space-y-3">
                                    <div class="w-12 h-12 mx-auto rounded-2xl bg-gray-100 dark:bg-slate-800 text-slate-400 flex items-center justify-center">
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-base font-bold text-slate-900 dark:text-white">No Orders Found</h3>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">
                                        @if(!empty($query) || $status !== 'all' || $paymentStatus !== 'all')
                                            No orders match your filter criteria. Try clearing filters or search terms.
                                        @else
                                            No customer orders have been placed in the store yet.
                                        @endif
                                    </p>
                                    @if(!empty($query) || $status !== 'all' || $paymentStatus !== 'all')
                                        <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center gap-1 text-xs font-bold text-emerald-600 dark:text-emerald-400 hover:underline">
                                            <span>Clear All Filters</span>
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($orders->hasPages())
            <div class="p-4 border-t border-gray-200 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-900/40">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

