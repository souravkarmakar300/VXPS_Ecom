@extends('layouts.admin')

@php
    $title = 'Inquiry Details';
    $header = 'Customer Inquiry #' . $contact->id;
@endphp

@section('content')
<div class="space-y-6 max-w-4xl mx-auto">
    <!-- Breadcrumb & Top Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <nav class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-1">
                <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
                <span>/</span>
                <a href="{{ route('admin.contacts.index') }}" class="hover:underline">Contacts</a>
                <span>/</span>
                <span class="text-slate-900 dark:text-white font-semibold">Inquiry #{{ $contact->id }}</span>
            </nav>
            <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Inquiry from {{ $contact->name }}</h2>
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-700/60 transition-colors shadow-2xs">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Back to All Contacts</span>
            </a>
        </div>
    </div>

    <!-- Inquiry Details Card -->
    <div class="bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80 rounded-2xl overflow-hidden shadow-xs">
        <!-- Card Header Info -->
        <div class="p-6 border-b border-gray-200 dark:border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-gray-50/50 dark:bg-slate-800/20">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-emerald-600/10 border border-emerald-600/20 text-emerald-600 dark:text-emerald-400 font-black text-lg flex items-center justify-center shrink-0">
                    {{ strtoupper(substr($contact->name, 0, 1)) }}
                </div>
                <div>
                    <h3 class="text-base font-bold text-slate-900 dark:text-white">{{ $contact->name }}</h3>
                    <div class="flex items-center gap-3 text-xs text-slate-500 dark:text-slate-400 mt-0.5 flex-wrap">
                        <a href="mailto:{{ $contact->email }}" class="text-emerald-600 dark:text-emerald-400 hover:underline flex items-center gap-1 font-mono">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>{{ $contact->email }}</span>
                        </a>
                        @if($contact->phone)
                            <span>&bull;</span>
                            <a href="tel:{{ $contact->phone }}" class="hover:underline flex items-center gap-1 font-mono">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span>{{ $contact->phone }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <span class="text-xs text-slate-500 font-mono">{{ $contact->created_at->format('M d, Y h:i A') }}</span>
                @if($contact->status === 'unread')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/30">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Unread
                    </span>
                @elseif($contact->status === 'replied')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/30">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        Replied
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 border border-gray-200 dark:border-slate-700/60">
                        Read
                    </span>
                @endif
            </div>
        </div>

        <!-- Subject & Full Message Body -->
        <div class="p-6 sm:p-8 space-y-6">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Subject</span>
                <h4 class="text-lg font-extrabold text-slate-900 dark:text-white mt-1">
                    {{ $contact->subject ?: 'General Customer Inquiry' }}
                </h4>
            </div>

            <div class="pt-4 border-t border-gray-100 dark:border-slate-800">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-2">Message Body</span>
                <div class="p-5 rounded-2xl bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-slate-800/80 text-sm leading-relaxed text-slate-800 dark:text-slate-200 whitespace-pre-wrap font-sans">
{{ $contact->message }}
                </div>
            </div>
        </div>

        <!-- Action Bar -->
        <div class="px-6 py-4 bg-gray-50 dark:bg-slate-800/40 border-t border-gray-200 dark:border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-2 flex-wrap">
                <!-- Reply via email button -->
                <a 
                    href="mailto:{{ $contact->email }}?subject=Re:%20{{ rawurlencode($contact->subject ?: 'Your inquiry with VXPS Australia') }}" 
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-500 transition-colors shadow-sm"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>Reply via Email</span>
                </a>

                <!-- Change Status Forms -->
                @if($contact->status !== 'unread')
                    <form action="{{ route('admin.contacts.update-status', $contact) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="unread">
                        <button type="submit" class="px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors">
                            Mark as Unread
                        </button>
                    </form>
                @endif

                @if($contact->status !== 'replied')
                    <form action="{{ route('admin.contacts.update-status', $contact) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="replied">
                        <button type="submit" class="px-3.5 py-2 rounded-xl text-xs font-semibold text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-300 dark:border-emerald-800 hover:bg-emerald-100 transition-colors">
                            Mark as Replied
                        </button>
                    </form>
                @endif
            </div>

            <!-- Delete Button Form -->
            <form 
                action="{{ route('admin.contacts.destroy', $contact) }}" 
                method="POST"
                onsubmit="return confirm('Are you sure you want to delete this inquiry permanently?');"
            >
                @csrf
                @method('DELETE')
                <button 
                    type="submit" 
                    class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-semibold text-rose-600 hover:text-rose-700 hover:bg-rose-50 dark:hover:bg-rose-950/30 border border-rose-200 dark:border-rose-900/40 transition-colors cursor-pointer"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    <span>Delete Inquiry</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

