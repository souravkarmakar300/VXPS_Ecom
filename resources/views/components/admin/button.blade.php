@props([
    'type' => 'submit',
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
])

@php
    $variants = [
        'primary' => 'bg-emerald-600 hover:bg-emerald-500 active:bg-emerald-700 text-white shadow-xs hover:shadow-emerald-500/25 focus:ring-emerald-500/30',
        'secondary' => 'bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 hover:border-slate-300 dark:bg-slate-800 dark:hover:bg-slate-700 dark:text-slate-200 dark:border-slate-700 focus:ring-slate-400/20',
        'danger' => 'bg-rose-600 hover:bg-rose-700 active:bg-rose-800 text-white shadow-xs focus:ring-rose-500/30',
        'dark' => 'bg-slate-900 hover:bg-slate-800 active:bg-slate-950 text-white shadow-xs focus:ring-slate-700/30 dark:bg-slate-800 dark:hover:bg-slate-700',
    ][$variant] ?? 'bg-emerald-600 hover:bg-emerald-500 text-white focus:ring-emerald-500/30';

    $sizes = [
        'sm' => 'px-3 py-1.5 text-xs rounded-lg gap-1.5',
        'md' => 'px-4 py-2.5 text-sm rounded-xl gap-2',
        'lg' => 'px-5 py-3 text-base rounded-xl gap-2.5',
    ][$size] ?? 'px-4 py-2.5 text-sm rounded-xl gap-2';
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => "inline-flex items-center justify-center font-medium transition-all duration-200 focus:outline-none focus:ring-4 cursor-pointer select-none {$variants} {$sizes}"
    ]) }}
>
    @if ($icon)
        <span class="shrink-0">{{ $icon }}</span>
    @endif
    <span>{{ $slot }}</span>
</button>

