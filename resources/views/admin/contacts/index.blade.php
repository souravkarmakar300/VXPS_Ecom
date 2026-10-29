@extends('layouts.admin')

@php
    $title = 'Contacts';
    $header = 'Customer Inquiries';
@endphp

@section('content')
<div class="space-y-6 max-w-7xl mx-auto">
    <!-- Top Header & Breadcrumb -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Support Center
                </span>
                <span class="text-xs text-slate-400 font-mono">{{ $counts['total'] }} total inquiries</span>
            </div>
            <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Customer Inquiries</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-0.5">View and manage messages submitted via the Contact Us and Storefront forms.</p>
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

    <!-- Quick Counters Bar -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
        <a href="{{ route('admin.contacts.index', ['status' => 'all', 'q' => $query]) }}" class="p-4 rounded-2xl bg-white dark:bg-slate-900/80 border transition-all {{ $status === 'all' ? 'border-emerald-500 ring-2 ring-emerald-500/20' : 'border-gray-200 dark:border-slate-800/80 hover:border-gray-300' }}">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">All Messages</span>
            <p class="text-2xl font-black text-slate-900 dark:text-white mt-1">{{ $counts['total'] }}</p>
        </a>

        <a href="{{ route('admin.contacts.index', ['status' => 'unread', 'q' => $query]) }}" class="p-4 rounded-2xl bg-white dark:bg-slate-900/80 border transition-all {{ $status === 'unread' ? 'border-emerald-500 ring-2 ring-emerald-500/20' : 'border-gray-200 dark:border-slate-800/80 hover:border-gray-300' }}">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Unread</span>
                @if($counts['unread'] > 0)
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                @endif
            </div>
            <p class="text-2xl font-black text-emerald-600 dark:text-emerald-400 mt-1">{{ $counts['unread'] }}</p>
        </a>

        <a href="{{ route('admin.contacts.index', ['status' => 'read', 'q' => $query]) }}" class="p-4 rounded-2xl bg-white dark:bg-slate-900/80 border transition-all {{ $status === 'read' ? 'border-emerald-500 ring-2 ring-emerald-500/20' : 'border-gray-200 dark:border-slate-800/80 hover:border-gray-300' }}">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Read</span>
            <p class="text-2xl font-black text-slate-700 dark:text-slate-300 mt-1">{{ $counts['read'] }}</p>
        </a>

        <a href="{{ route('admin.contacts.index', ['status' => 'replied', 'q' => $query]) }}" class="p-4 rounded-2xl bg-white dark:bg-slate-900/80 border transition-all {{ $status === 'replied' ? 'border-emerald-500 ring-2 ring-emerald-500/20' : 'border-gray-200 dark:border-slate-800/80 hover:border-gray-300' }}">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Replied</span>
            <p class="text-2xl font-black text-emerald-600 dark:text-emerald-400 mt-1">{{ $counts['replied'] }}</p>
        </a>
    </div>

    <!-- Search & Filter Controls -->
    <div class="bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80 rounded-2xl p-4 shadow-xs">
        <form method="GET" action="{{ route('admin.contacts.index') }}" class="flex flex-col sm:flex-row gap-3 items-center justify-between">
            <input type="hidden" name="status" value="{{ $status }}">
            
            <div class="relative w-full sm:w-96">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input 
                    type="text" 
                    name="q" 
                    value="{{ $query }}" 
                    placeholder="Search by name, email, phone, or keyword..."
                    class="block w-full pl-10 pr-4 py-2 text-xs sm:text-sm rounded-xl border border-gray-300 dark:border-slate-700 bg-white dark:bg-slate-950 text-slate-900 dark:text-white placeholder:text-slate-400 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 transition-all"
                >
            </div>

            <div class="flex items-center gap-2 w-full sm:w-auto justify-end">
                <button type="submit" class="px-4 py-2 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-500 transition-colors shadow-xs">
                    Search
                </button>
                @if(!empty($query) || $status !== 'all')
                    <a href="{{ route('admin.contacts.index') }}" class="px-3 py-2 rounded-xl text-xs font-semibold text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white border border-gray-200 dark:border-slate-700 hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Contacts Table -->
    <div class="bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80 rounded-2xl overflow-hidden shadow-xs">
        <div class="px-5 py-4 border-b border-gray-200 dark:border-slate-800 flex items-center justify-between">
            <h3 class="text-sm font-bold text-slate-900 dark:text-white">All Inquiries</h3>
            <span class="text-xs text-slate-500 dark:text-slate-400 font-mono">{{ $contacts->total() }} recorded</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-700 dark:text-slate-300">
                <thead class="text-[11px] uppercase tracking-wider text-slate-500 dark:text-slate-400 bg-gray-50 dark:bg-slate-800/40 border-b border-gray-200 dark:border-slate-800">
                    <tr>
                        <th class="px-4 py-3.5">#</th>
                        <th class="px-4 py-3.5">Sender</th>
                        <th class="px-4 py-3.5">Subject</th>
                        <th class="px-4 py-3.5">Message Snippet</th>
                        <th class="px-4 py-3.5">Received Date</th>
                        <th class="px-4 py-3.5">Status</th>
                        <th class="px-4 py-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-slate-800/60">
                    @forelse ($contacts as $contact)
                        <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/30 transition-colors {{ $contact->status === 'unread' ? 'bg-emerald-50/30 dark:bg-emerald-950/20 font-medium' : '' }}">
                            <td class="px-4 py-4 font-mono text-slate-400 dark:text-slate-500">
                                {{ $contacts->firstItem() + $loop->index }}
                            </td>

                            <td class="px-4 py-4">
                                <div class="font-bold text-slate-900 dark:text-white flex items-center gap-1.5">
                                    <span>{{ $contact->name }}</span>
                                    @if($contact->status === 'unread')
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    @endif
                                </div>
                                <div class="text-[11px] text-slate-500 dark:text-slate-400 font-mono mt-0.5">
                                    <a href="mailto:{{ $contact->email }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 hover:underline">
                                        {{ $contact->email }}
                                    </a>
                                </div>
                                @if($contact->phone)
                                    <div class="text-[11px] text-slate-500 dark:text-slate-400 font-mono">
                                        <a href="tel:{{ $contact->phone }}" class="hover:underline">
                                            {{ $contact->phone }}
                                        </a>
                                    </div>
                                @endif
                            </td>

                            <td class="px-4 py-4">
                                <div class="font-semibold text-slate-900 dark:text-white max-w-xs truncate" title="{{ $contact->subject ?? 'General Inquiry' }}">
                                    {{ $contact->subject ?: 'General Inquiry' }}
                                </div>
                            </td>

                            <td class="px-4 py-4 max-w-sm">
                                <p class="text-slate-600 dark:text-slate-400 line-clamp-2 leading-relaxed" title="{{ $contact->message }}">
                                    {{ $contact->message }}
                                </p>
                            </td>

                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="text-slate-900 dark:text-white">{{ $contact->created_at->format('d M Y, h:i A') }}</div>
                                <div class="text-[10px] text-slate-400 mt-0.5">{{ $contact->created_at->diffForHumans() }}</div>
                            </td>

                            <td class="px-4 py-4 whitespace-nowrap">
                                @if($contact->status === 'unread')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/30">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Unread
                                    </span>
                                @elseif($contact->status === 'replied')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/30">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Replied
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-gray-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 border border-gray-200 dark:border-slate-700/60">
                                        Read
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-1.5">
                                    <!-- View Details Link -->
                                    <a 
                                        href="{{ route('admin.contacts.show', $contact) }}" 
                                        class="p-2 rounded-lg text-slate-600 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors"
                                        title="View Inquiry Details"
                                    >
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                    <!-- Quick Mailto Reply -->
                                    <a 
                                        href="mailto:{{ $contact->email }}?subject=Re:%20{{ rawurlencode($contact->subject ?: 'Inquiry with VXPS') }}"
                                        class="p-2 rounded-lg text-slate-600 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors"
                                        title="Reply via Email"
                                    >
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </a>

                                    <!-- Status Toggle Form -->
                                    <form action="{{ route('admin.contacts.update-status', $contact) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="{{ $contact->status === 'unread' ? 'read' : 'unread' }}">
                                        <button 
                                            type="submit" 
                                            class="p-2 rounded-lg text-slate-600 dark:text-slate-300 hover:text-amber-600 dark:hover:text-amber-400 hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors"
                                            title="Mark as {{ $contact->status === 'unread' ? 'Read' : 'Unread' }}"
                                        >
                                            @if($contact->status === 'unread')
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                </svg>
                                            @else
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            @endif
                                        </button>
                                    </form>

                                    <!-- Delete Inquiry Form -->
                                    <form 
                                        action="{{ route('admin.contacts.destroy', $contact) }}" 
                                        method="POST" 
                                        class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this inquiry from {{ $contact->name }}?');"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit" 
                                            class="p-2 rounded-lg text-slate-600 dark:text-slate-300 hover:text-rose-600 dark:hover:text-rose-400 hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors cursor-pointer"
                                            title="Delete Inquiry"
                                        >
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="max-w-sm mx-auto space-y-3">
                                    <div class="w-12 h-12 rounded-2xl bg-gray-100 dark:bg-slate-800 text-slate-400 flex items-center justify-center mx-auto">
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <h4 class="text-sm font-bold text-slate-900 dark:text-white">No inquiries found</h4>
                                    <p class="text-xs text-slate-500">
                                        @if(!empty($query))
                                            No messages match your search term "{{ $query }}". Try resetting your filters.
                                        @else
                                            No customer contact messages recorded under this category yet.
                                        @endif
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($contacts->hasPages())
            <div class="px-5 py-4 border-t border-gray-200 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-900/40">
                {{ $contacts->links('vendor.pagination.admin') }}
            </div>
        @endif
    </div>
</div>
@endsection

