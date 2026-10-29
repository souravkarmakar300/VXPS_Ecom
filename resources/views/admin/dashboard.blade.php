@extends('layouts.admin')

@php
    $title = 'Dashboard';
    $header = 'Dashboard Overview';
@endphp

@section('content')
<div class="space-y-6 max-w-7xl mx-auto">
    <!-- Hero Greeting Banner -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-emerald-950 via-slate-900 to-teal-950 border border-emerald-700/50 p-6 sm:p-8 shadow-xl">
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-emerald-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-200 text-xs font-semibold">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>VXPS eCommerce Control Center</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Welcome back, {{ $currentAdmin->name }}!
                </h2>
                <p class="text-emerald-200/90 text-sm max-w-2xl leading-relaxed">
                    Here is your store summary. Products catalog, orders processing, and customer contact inquiries are live and synced.
                </p>
            </div>

            <div class="flex items-center gap-2 text-xs text-emerald-200 bg-emerald-950/60 px-4 py-2.5 rounded-2xl border border-emerald-700/40">
                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                <span>Guard: <strong class="text-white font-mono">admin</strong></span>
                <span class="text-emerald-400">&bull;</span>
                <span>Session: <strong class="text-white">Active</strong></span>
            </div>
        </div>
    </div>

    <!-- Quick Stats Grid: Total Products, Total Orders, Contact -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        <!-- Stat 1: Total Products -->
        <a href="{{ url('admin/products') }}" class="block">
            <div class="p-5 rounded-2xl bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80 shadow-xs flex items-center justify-between hover:border-emerald-400 dark:hover:border-slate-700/80 transition-all cursor-pointer">
                <div class="space-y-1">
                    <span class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                        Total Products
                    </span>
        
                    <p class="text-3xl font-black text-slate-900 dark:text-white">
                        {{ $stats['total_products'] }}
                    </p>
        
                    <span class="text-[11px] text-emerald-600 dark:text-emerald-400 font-medium">
                        In Store Catalog
                    </span>
                </div>
        
                <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shadow-inner">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
            </div>
        </a>

        <!-- Stat 2: Total Orders -->
        <div class="p-5 rounded-2xl bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80 shadow-xs flex items-center justify-between hover:border-emerald-400 dark:hover:border-slate-700/80 transition-all">
            <div class="space-y-1">
                <span class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Total Orders</span>
                <p class="text-3xl font-black text-slate-900 dark:text-white">{{ $stats['total_orders'] }}</p>
                <span class="text-[11px] text-emerald-600 dark:text-emerald-400 font-medium">Processed Orders</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shadow-inner">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
        </div>

        <!-- Stat 3: Contact -->
        <a href="{{ route('admin.contacts.index') }}" class="block">
            <div class="p-5 rounded-2xl bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80 shadow-xs flex items-center justify-between hover:border-emerald-400 dark:hover:border-slate-700/80 transition-all cursor-pointer">
                <div class="space-y-1">
                    <span class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Contact</span>
                    <p class="text-3xl font-black text-slate-900 dark:text-white">{{ $stats['total_contacts'] }}</p>
                    <span class="text-[11px] text-emerald-600 dark:text-emerald-400 font-medium">Customer Inquiries</span>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shadow-inner">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </a>
    </div>

    <!-- Recent Orders Section -->
    <div class="bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80 rounded-2xl p-6 shadow-xs">
        <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-slate-800">
            <div>
                <h3 class="text-base font-bold text-slate-900 dark:text-white">Recent Orders</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Real-time orders placed on the VXPS store</p>
            </div>
            <span class="text-xs px-2.5 py-1 rounded-full bg-gray-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-gray-200 dark:border-slate-700 font-mono">
                Total: {{ $stats['total_orders'] }}
            </span>
        </div>

        <div class="overflow-x-auto mt-4">
            <table class="w-full text-left text-xs text-slate-700 dark:text-slate-300">
                <thead class="text-[11px] uppercase tracking-wider text-slate-500 dark:text-slate-400 bg-gray-50 dark:bg-slate-800/40 border-b border-gray-200 dark:border-slate-800">
                    <tr>
                        <th class="px-4 py-3 rounded-l-lg">Order #</th>
                        <th class="px-4 py-3">Customer</th>
                        <th class="px-4 py-3">Total Amount</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3 rounded-r-lg text-right">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-slate-800/60">
                    @forelse ($recentOrders as $order)
                        <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-4 py-3.5 font-mono font-semibold text-emerald-600 dark:text-emerald-400">{{ $order->order_number }}</td>
                            <td class="px-4 py-3.5">
                                <div class="font-semibold text-slate-900 dark:text-white">{{ $order->customer_name }}</div>
                                <div class="text-[11px] text-slate-500 font-mono">{{ $order->customer_email }}</div>
                            </td>
                            <td class="px-4 py-3.5 font-mono text-slate-900 dark:text-white font-semibold">${{ number_format($order->total_amount, 2) }}</td>
                            <td class="px-4 py-3.5 text-slate-600 dark:text-slate-400">{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="px-4 py-3.5 text-right">
                                @if($order->status === 'completed')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Completed
                                    </span>
                                @elseif($order->status === 'processing')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-sky-500/10 text-sky-600 dark:text-sky-400 border border-sky-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-sky-500"></span> Processing
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-amber-500/10 text-amber-600 dark:text-amber-400 border border-amber-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Pending
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-slate-500">
                                No orders recorded yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Contact Inquiries Section -->
    <div class="bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80 rounded-2xl p-6 shadow-xs">
        <div>
            <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-slate-800">
                <div>
                    <h3 class="text-base font-bold text-slate-900 dark:text-white">Recent Contact Messages</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Inquiries and messages sent by customers</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-xs px-2.5 py-1 rounded-full bg-gray-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-gray-200 dark:border-slate-700 font-mono">
                        {{ $stats['total_contacts'] }} {{ Str::plural('Inquiry', $stats['total_contacts']) }}
                    </span>
                    <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center gap-1 text-xs font-bold text-emerald-600 dark:text-emerald-400 hover:text-emerald-500 hover:underline">
                        <span>View All</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto mt-4">
                <table class="w-full text-left text-xs text-slate-700 dark:text-slate-300">
                    <thead class="text-[11px] uppercase tracking-wider text-slate-500 dark:text-slate-400 bg-gray-50 dark:bg-slate-800/40 border-b border-gray-200 dark:border-slate-800">
                        <tr>
                            <th class="px-4 py-3 rounded-l-lg">Contact</th>
                            <th class="px-4 py-3">Subject</th>
                            <th class="px-4 py-3">Message</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 rounded-r-lg text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-slate-800/60">
                        @forelse ($recentContacts as $contact)
                            <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/30 transition-colors">
                                <td class="px-4 py-3.5">
                                    <div class="font-semibold text-slate-900 dark:text-white">{{ $contact->name }}</div>
                                    <div class="text-[11px] text-slate-500 font-mono">{{ $contact->email }}</div>
                                </td>
                                <td class="px-4 py-3.5 text-slate-700 dark:text-slate-300 font-medium">{{ $contact->subject ?? 'General' }}</td>
                                <td class="px-4 py-3.5 text-slate-600 dark:text-slate-400 max-w-xs truncate" title="{{ $contact->message }}">
                                    {{ Str::limit($contact->message, 45) }}
                                </td>
                                <td class="px-4 py-3.5 text-slate-600 dark:text-slate-400">{{ $contact->created_at->format('M d, Y') }}</td>
                                <td class="px-4 py-3.5">
                                    @if($contact->status === 'unread')
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> New
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-gray-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 border border-gray-200 dark:border-slate-700/60">
                                            Read
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3.5 text-right">
                                    <a href="{{ route('admin.contacts.show', $contact) }}" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-xs font-semibold text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-950/50 border border-transparent hover:border-emerald-500/30 transition-all">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-slate-500">
                                    No contact inquiries yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pt-4 mt-4 border-t border-gray-200 dark:border-slate-800 flex items-center justify-between text-xs text-slate-500">
            <span>Showing {{ $recentContacts->count() }} of {{ $stats['total_contacts'] }} inquiries</span>
            <span class="text-emerald-600 dark:text-emerald-400 font-medium">Table: `contacts`</span>
        </div>
    </div>
</div>
@endsection
