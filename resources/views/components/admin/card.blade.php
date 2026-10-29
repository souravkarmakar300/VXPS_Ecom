@props([
    'title' => null,
    'subtitle' => null,
    'footer' => null,
    'actions' => null,
])

<div {{ $attributes->merge(['class' => 'bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-2xl shadow-xs overflow-hidden transition-all duration-200']) }}>
    @if ($title || $actions || $subtitle)
        <div class="px-6 py-4.5 border-b border-slate-100 dark:border-slate-800/80 flex items-center justify-between gap-4">
            <div>
                @if ($title)
                    <h3 class="text-base font-semibold text-slate-900 dark:text-white tracking-tight">{{ $title }}</h3>
                @endif
                @if ($subtitle)
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">{{ $subtitle }}</p>
                @endif
            </div>
            @if ($actions)
                <div class="flex items-center gap-2">
                    {{ $actions }}
                </div>
            @endif
        </div>
    @endif

    <div class="p-6">
        {{ $slot }}
    </div>

    @if ($footer)
        <div class="px-6 py-3.5 bg-slate-50/70 dark:bg-slate-900/60 border-t border-slate-100 dark:border-slate-800/80">
            {{ $footer }}
        </div>
    @endif
</div>

