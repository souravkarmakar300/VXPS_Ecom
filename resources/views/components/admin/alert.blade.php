@props([
    'type' => 'info',
    'dismissible' => true,
])

@php
    $typeClasses = [
        'success' => 'bg-emerald-50 text-emerald-800 border-emerald-200 dark:bg-emerald-950/40 dark:text-emerald-300 dark:border-emerald-800/60',
        'error' => 'bg-rose-50 text-rose-800 border-rose-200 dark:bg-rose-950/40 dark:text-rose-300 dark:border-rose-800/60',
        'warning' => 'bg-amber-50 text-amber-800 border-amber-200 dark:bg-amber-950/40 dark:text-amber-300 dark:border-amber-800/60',
        'info' => 'bg-sky-50 text-sky-800 border-sky-200 dark:bg-sky-950/40 dark:text-sky-300 dark:border-sky-800/60',
    ][$type] ?? 'bg-slate-50 text-slate-800 border-slate-200 dark:bg-slate-900 dark:text-slate-200 dark:border-slate-800';

    $iconColors = [
        'success' => 'text-emerald-500',
        'error' => 'text-rose-500',
        'warning' => 'text-amber-500',
        'info' => 'text-sky-500',
    ][$type] ?? 'text-slate-500';
@endphp

<div {{ $attributes->merge(['class' => "flex items-start gap-3 p-4 border rounded-xl shadow-xs transition-all duration-200 {$typeClasses}"]) }} role="alert">
    <div class="shrink-0 mt-0.5 {{ $iconColors }}">
        @if ($type === 'success')
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        @elseif ($type === 'error')
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        @elseif ($type === 'warning')
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        @else
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        @endif
    </div>
    
    <div class="flex-1 text-sm font-medium leading-relaxed">
        {{ $slot }}
    </div>

    @if ($dismissible)
        <button type="button" onclick="this.closest('[role=alert]').remove()" class="shrink-0 -mr-1 -mt-1 p-1 rounded-lg text-current opacity-60 hover:opacity-100 hover:bg-black/5 dark:hover:bg-white/10 transition-colors" aria-label="Dismiss alert">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    @endif
</div>

