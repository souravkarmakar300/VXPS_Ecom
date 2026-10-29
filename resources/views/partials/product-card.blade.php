@php
    $type = $type ?? 'regular';
    $hasOffer = ($type === 'special') || ($product->special_offer_price !== null && (float) $product->special_offer_price > 0);
    $originalPrice = (float) ($product->price ?? 0);
    $offerPrice = (float) ($product->special_offer_price ?? 0);
    $discountPercent = ($hasOffer && $originalPrice > 0 && $offerPrice < $originalPrice)
        ? (int) round((($originalPrice - $offerPrice) / $originalPrice) * 100)
        : null;

    $slug = strtolower($product->slug ?? '');
    $catSlug = strtolower($product->category->slug ?? '');
@endphp

<div class="group relative flex flex-col justify-between bg-white dark:bg-slate-900/90 rounded-3xl border border-gray-200/90 dark:border-slate-800/90 hover:border-indigo-500/60 dark:hover:border-indigo-500/60 shadow-xs hover:shadow-2xl hover:shadow-indigo-500/10 dark:hover:shadow-indigo-950/40 transition-all duration-300 p-4 sm:p-5">
    <div>
        {{-- Product Visual / Image Container (Click to view details) --}}
        <a 
            href="{{ route('product.show', $product->slug) }}" 
            class="block relative w-full aspect-square rounded-2xl bg-gradient-to-br from-slate-100 via-slate-50 to-slate-200/70 dark:from-slate-950 dark:via-slate-900/90 dark:to-slate-800/80 overflow-hidden border border-gray-200/80 dark:border-slate-800/90 group-hover:border-indigo-500/40 transition-all duration-300 cursor-pointer"
            title="View {{ $product->name }} details"
        >
            @if($product->primary_image)
                <img
                    src="{{ asset('storage/' . $product->primary_image) }}"
                    alt="{{ $product->name }}"
                    class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500 ease-out"
                >
            @else
                <div class="w-full h-full flex flex-col items-center justify-center p-4 relative group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-radial from-indigo-500/10 via-transparent to-transparent opacity-70 group-hover:opacity-100 transition-opacity"></div>

                    @if(str_contains($slug, 'headphone') || str_contains($catSlug, 'audio'))
                        {{-- Headphones Graphic --}}
                        <svg class="w-24 h-24 text-indigo-500 dark:text-indigo-400 drop-shadow-md" viewBox="0 0 64 64" fill="none" stroke="currentColor">
                            <path d="M12 36v-8a20 20 0 0140 0v8" stroke-width="3" stroke-linecap="round"/>
                            <rect x="8" y="32" width="10" height="18" rx="5" fill="currentColor" fill-opacity="0.15" stroke-width="2.5"/>
                            <rect x="46" y="32" width="10" height="18" rx="5" fill="currentColor" fill-opacity="0.15" stroke-width="2.5"/>
                            <circle cx="32" cy="12" r="2" fill="currentColor"/>
                            <path d="M24 40a8 8 0 0016 0" stroke-width="2" stroke-linecap="round" stroke-dasharray="2 2" stroke-opacity="0.6"/>
                        </svg>
                    @elseif(str_contains($slug, 'keyboard'))
                        {{-- Mechanical Keyboard Graphic --}}
                        <svg class="w-24 h-24 text-violet-500 dark:text-violet-400 drop-shadow-md" viewBox="0 0 64 64" fill="none" stroke="currentColor">
                            <rect x="8" y="20" width="48" height="26" rx="4" stroke-width="2.5" fill="currentColor" fill-opacity="0.1"/>
                            <rect x="14" y="26" width="6" height="4" rx="1" fill="currentColor"/>
                            <rect x="23" y="26" width="6" height="4" rx="1" fill="currentColor"/>
                            <rect x="32" y="26" width="6" height="4" rx="1" fill="currentColor"/>
                            <rect x="41" y="26" width="9" height="4" rx="1" fill="currentColor"/>
                            <rect x="14" y="34" width="8" height="4" rx="1" fill="currentColor"/>
                            <rect x="25" y="34" width="14" height="4" rx="1" fill="currentColor"/>
                            <rect x="42" y="34" width="8" height="4" rx="1" fill="currentColor"/>
                            <path d="M32 14v6" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    @elseif(str_contains($slug, 'mouse'))
                        {{-- Ergonomic Gaming Mouse Graphic --}}
                        <svg class="w-24 h-24 text-sky-500 dark:text-sky-400 drop-shadow-md" viewBox="0 0 64 64" fill="none" stroke="currentColor">
                            <rect x="20" y="12" width="24" height="40" rx="12" stroke-width="2.5" fill="currentColor" fill-opacity="0.1"/>
                            <line x1="32" y1="12" x2="32" y2="28" stroke-width="2"/>
                            <rect x="30" y="18" width="4" height="8" rx="2" fill="currentColor"/>
                            <path d="M18 28h4M18 34h4" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    @elseif(str_contains($slug, 'monitor') || str_contains($catSlug, 'display'))
                        {{-- 4K Monitor Graphic --}}
                        <svg class="w-24 h-24 text-cyan-500 dark:text-cyan-400 drop-shadow-md" viewBox="0 0 64 64" fill="none" stroke="currentColor">
                            <rect x="8" y="14" width="48" height="30" rx="3" stroke-width="2.5" fill="currentColor" fill-opacity="0.1"/>
                            <path d="M26 44l-2 8h16l-2-8" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <line x1="20" y1="52" x2="44" y2="52" stroke-width="2.5" stroke-linecap="round"/>
                            <circle cx="32" cy="27" r="4" fill="currentColor" fill-opacity="0.4"/>
                        </svg>
                    @elseif(str_contains($slug, 'watch') || str_contains($catSlug, 'wearable'))
                        {{-- Smartwatch Pro Graphic --}}
                        <svg class="w-24 h-24 text-emerald-500 dark:text-emerald-400 drop-shadow-md" viewBox="0 0 64 64" fill="none" stroke="currentColor">
                            <rect x="24" y="6" width="16" height="10" rx="2" fill="currentColor" fill-opacity="0.3"/>
                            <rect x="24" y="48" width="16" height="10" rx="2" fill="currentColor" fill-opacity="0.3"/>
                            <rect x="18" y="16" width="28" height="32" rx="9" stroke-width="2.5" fill="currentColor" fill-opacity="0.1"/>
                            <circle cx="32" cy="32" r="8" stroke-width="2" stroke-dasharray="3 3"/>
                            <polyline points="32 28 32 32 35 34" stroke-width="2" stroke-linecap="round"/>
                            <rect x="46" y="24" width="2" height="6" rx="1" fill="currentColor"/>
                        </svg>
                    @elseif(str_contains($slug, 'hub') || str_contains($slug, 'power') || str_contains($catSlug, 'charging'))
                        {{-- USB-C Hub / Power Bank Graphic --}}
                        <svg class="w-24 h-24 text-indigo-500 dark:text-indigo-400 drop-shadow-md" viewBox="0 0 64 64" fill="none" stroke="currentColor">
                            <rect x="14" y="22" width="36" height="20" rx="5" stroke-width="2.5" fill="currentColor" fill-opacity="0.1"/>
                            <circle cx="22" cy="32" r="2" fill="currentColor"/>
                            <line x1="28" y1="32" x2="34" y2="32" stroke-width="2.5" stroke-linecap="round"/>
                            <line x1="38" y1="32" x2="44" y2="32" stroke-width="2.5" stroke-linecap="round"/>
                            <path d="M42 22V14a2 2 0 00-2-2h-4" stroke-width="2" stroke-linecap="round"/>
                            <path d="M28 10l-3 4h6l-3 4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="currentColor"/>
                        </svg>
                    @elseif(str_contains($slug, 'stand'))
                        {{-- Aluminum Laptop Stand Graphic --}}
                        <svg class="w-24 h-24 text-slate-500 dark:text-slate-400 drop-shadow-md" viewBox="0 0 64 64" fill="none" stroke="currentColor">
                            <line x1="12" y1="48" x2="52" y2="48" stroke-width="3" stroke-linecap="round"/>
                            <path d="M16 48L32 20l16 28" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <line x1="24" y1="34" x2="40" y2="34" stroke-width="2" stroke-linecap="round"/>
                            <rect x="22" y="16" width="20" height="6" rx="2" fill="currentColor" fill-opacity="0.2"/>
                        </svg>
                    @elseif(str_contains($slug, 'cube') || str_contains($catSlug, 'education') || str_contains($slug, 'toy'))
                        {{-- STME Educational Magic Cube Graphic --}}
                        <svg class="w-24 h-24 text-amber-500 dark:text-amber-400 drop-shadow-md" viewBox="0 0 64 64" fill="none" stroke="currentColor">
                            <path d="M32 8l20 11.5v23L32 54 12 42.5v-23L32 8z" stroke-width="2.5" fill="currentColor" fill-opacity="0.1"/>
                            <line x1="32" y1="8" x2="32" y2="54" stroke-width="2"/>
                            <line x1="12" y1="19.5" x2="52" y2="42.5" stroke-width="2"/>
                            <line x1="52" y1="19.5" x2="12" y2="42.5" stroke-width="2"/>
                        </svg>
                    @else
                        {{-- Default High-Tech Power Graphic --}}
                        <svg class="w-24 h-24 text-indigo-500 dark:text-indigo-400 drop-shadow-md" viewBox="0 0 64 64" fill="none" stroke="currentColor">
                            <rect x="18" y="12" width="28" height="40" rx="6" stroke-width="2.5" fill="currentColor" fill-opacity="0.1"/>
                            <path d="M34 22l-6 10h8l-6 10" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" fill="currentColor"/>
                            <circle cx="32" cy="16" r="1.5" fill="currentColor"/>
                        </svg>
                    @endif

                    <span class="mt-2 text-[10px] uppercase font-extrabold tracking-widest text-slate-500 dark:text-slate-400">VXPS Hardware</span>
                </div>
            @endif

            {{-- Discount / Type Badge (Top-Left) --}}
            @if($discountPercent)
                <span class="absolute top-3 left-3 px-2.5 py-1 rounded-xl text-[10px] font-black uppercase tracking-wider bg-gradient-to-r from-rose-600 via-rose-500 to-pink-600 text-white shadow-lg shadow-rose-500/30 flex items-center gap-1">
                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.381z" clip-rule="evenodd" />
                    </svg>
                    <span>-{{ $discountPercent }}% OFF</span>
                </span>
            @elseif($type === 'special' || $hasOffer)
                <span class="absolute top-3 left-3 px-2.5 py-1 rounded-xl text-[10px] font-black uppercase tracking-wider bg-rose-600 text-white shadow-lg shadow-rose-600/30">
                    SPECIAL OFFER
                </span>
            @elseif($type === 'new')
                <span class="absolute top-3 left-3 px-2.5 py-1 rounded-xl text-[10px] font-black uppercase tracking-wider bg-emerald-600 text-white shadow-lg shadow-emerald-600/30">
                    NEW ARRIVAL
                </span>
            @endif

            {{-- Category Badge (Top-Right) --}}
            @if($product->category)
                <span class="absolute top-3 right-3 px-2.5 py-1 rounded-lg text-[10px] font-bold bg-white/95 dark:bg-slate-950/85 text-slate-800 dark:text-slate-200 border border-slate-200/80 dark:border-slate-700/80 shadow-xs backdrop-blur-md">
                    {{ $product->category->name }}
                </span>
            @endif
        </a>

        {{-- Meta & Title --}}
        <div class="mt-4">
            <div class="flex items-center justify-between text-xs mb-1.5">
                {{-- 5 Star Rating Social Proof --}}
                <div class="flex items-center gap-1 text-amber-400">
                    <div class="flex text-[11px] tracking-tight">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <span class="text-[11px] font-bold text-slate-700 dark:text-slate-300">4.9</span>
                    {{-- <span class="text-[10px] text-slate-400 dark:text-slate-500">(120+)</span> --}}
                </div>

                {{-- In Stock Indicator --}}
                <div class="flex items-center gap-1 text-[11px] font-semibold text-emerald-600 dark:text-emerald-400">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>In Stock</span>
                </div>
            </div>

            <a href="{{ route('product.show', $product->slug) }}" class="block group/title">
                <h3 class="text-base font-bold text-slate-900 dark:text-white group-hover/title:text-indigo-600 dark:group-hover/title:text-indigo-400 transition-colors line-clamp-1" title="{{ $product->name }}">
                    {{ $product->name }}
                </h3>
            </a>

            <p class="text-xs text-slate-600 dark:text-slate-400 mt-1 line-clamp-2 leading-relaxed min-h-[2rem]">
                {{ Str::limit(strip_tags($product->description ?? ''), 80) ?: 'High-performance engineering, fast charging protocols, and Australian safety compliance.' }}
            </p>
        </div>
    </div>

    {{-- Price & CTA Footer --}}
    <div class="mt-5 pt-3.5 border-t border-gray-100 dark:border-slate-800/80 flex items-center justify-between gap-3">
        <div class="flex flex-col min-w-0">
            @if($hasOffer && $offerPrice > 0)
                <span class="text-[10px] uppercase font-extrabold text-rose-600 dark:text-rose-400 tracking-wider flex items-center gap-1">
                    Special Price
                </span>
                <div class="flex items-baseline gap-2 flex-wrap">
                    <span class="text-xl font-black text-rose-600 dark:text-rose-400 font-mono tracking-tight">
                        ${{ number_format($offerPrice, 2) }}
                    </span>
                    @if($originalPrice > 0)
                        <span class="text-xs text-slate-400 line-through font-mono">
                            ${{ number_format($originalPrice, 2) }}
                        </span>
                    @endif
                </div>
            @else
                <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">
                    Price
                </span>
                <div class="flex items-baseline gap-2">
                    <span class="text-xl font-black text-slate-900 dark:text-white font-mono tracking-tight">
                        ${{ number_format($originalPrice > 0 ? $originalPrice : $offerPrice, 2) }}
                    </span>
                </div>
            @endif
        </div>

        <a
            href="{{ route('product.show', $product->slug) }}"
            class="px-4 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider
                text-slate-900 bg-yellow-200 hover:bg-yellow-300
                dark:text-slate-900 dark:bg-yellow-200 dark:hover:bg-yellow-300
                shadow-md hover:shadow-yellow-400/30
                transition-all duration-200 flex items-center gap-1.5
                cursor-pointer shrink-0 hover:scale-105 active:scale-95"
            aria-label="View {{ $product->name }} details"
        >
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <span>BUY</span>
        </a>
    </div>
</div>
