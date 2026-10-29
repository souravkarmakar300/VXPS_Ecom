@props([
    'name',
    'label' => null,
    'type' => 'text',
    'placeholder' => '',
    'value' => null,
    'required' => false,
    'autofocus' => false,
    'autocomplete' => null,
    'icon' => null,
    'hint' => null,
])

@php
    $hasError = $errors->has($name);
    $inputValue = old($name, $value);
@endphp

<div class="space-y-1.5">
    @if ($label)
        <label for="{{ $name }}" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 dark:text-slate-300">
            {{ $label }}
            @if ($required)
                <span class="text-rose-500 font-bold ml-0.5">*</span>
            @endif
        </label>
    @endif

    <div class="relative rounded-xl shadow-xs">
        @if ($icon)
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400 dark:text-slate-500">
                {{ $icon }}
            </div>
        @endif

        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ $inputValue }}"
            placeholder="{{ $placeholder }}"
            @if($required) required @endif
            @if($autofocus) autofocus @endif
            @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
            {{ $attributes->merge([
                'class' => 'block w-full rounded-xl border bg-white dark:bg-slate-900/90 text-sm text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 py-2.5 transition-all duration-200 outline-none ' .
                    ($icon ? 'pl-10.5 pr-4 ' : 'px-4 ') .
                    ($hasError
                        ? 'border-rose-400 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10'
                        : 'border-slate-200 dark:border-slate-700/80 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 dark:focus:ring-emerald-500/20')
            ]) }}
        />
    </div>

    @if ($hint && ! $hasError)
        <p class="text-xs text-slate-500 dark:text-slate-400">{{ $hint }}</p>
    @endif

    @error($name)
        <p class="text-xs font-medium text-rose-600 dark:text-rose-400 flex items-center gap-1 mt-1">
            <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ $message }}</span>
        </p>
    @enderror
</div>

