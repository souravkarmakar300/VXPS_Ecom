@extends('layouts.app')

@section('title', $activeCategory ? $activeCategory->name . ' | VXPS Shop' : 'All Products | VXPS Shop')

@section('meta')
    <meta name="description" content="Shop portable chargers, power banks, cables and smart tech essentials at VXPS Australia. 4-column catalog.">
@endsection

@push('styles')
<style>
body { font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif; }
        
        /* Dual Range Slider Thumbs */
        .range-slider-input::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            pointer-events: auto;
            width: 20px;
            height: 20px;
            border-radius: 9999px;
            background-color: #4f46e5;
            border: 3px solid #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.28);
            cursor: grab;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }
        .dark .range-slider-input::-webkit-slider-thumb {
            border-color: #0f172a;
            background-color: #6366f1;
        }
        .range-slider-input::-webkit-slider-thumb:hover {
            transform: scale(1.18);
            box-shadow: 0 0 0 6px rgba(99, 102, 241, 0.25);
        }
        .range-slider-input::-webkit-slider-thumb:active {
            cursor: grabbing;
            transform: scale(1.25);
        }
        .range-slider-input::-moz-range-thumb {
            pointer-events: auto;
            width: 20px;
            height: 20px;
            border-radius: 9999px;
            background-color: #4f46e5;
            border: 3px solid #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.28);
            cursor: grab;
        }
        .dark .range-slider-input::-moz-range-thumb {
            border-color: #0f172a;
            background-color: #6366f1;
        }
        .range-slider-input::-moz-range-thumb:hover {
            transform: scale(1.18);
            box-shadow: 0 0 0 6px rgba(99, 102, 241, 0.25);
        }
        .range-slider-input::-moz-range-track {
            background: transparent;
            border: none;
        }
</style>
@endpush

@section('content')
{{-- Hero Catalog Banner --}}
        <section class="relative w-full overflow-hidden bg-slate-950">
            <div class="relative h-[250px] sm:h-[300px] lg:h-[340px]">
                <img src="{{ asset('Modern Kids’ Gadgets Studio Showcase.png') }}" alt="VXPS All Products" class="absolute inset-0 w-full h-full object-cover object-center">
                <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-950/80 to-slate-950/45"></div>
                <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center">
                    <nav class="inline-flex items-center gap-2 text-xs text-slate-300 mb-3">
                        <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                        <span class="text-slate-500">/</span>
                        <a href="{{ route('shop') }}" class="hover:text-white transition-colors">Shop</a>
                        @if($activeCategory)
                            <span class="text-slate-500">/</span>
                            <span class="text-indigo-400 font-semibold">{{ $activeCategory->name }}</span>
                        @else
                            <span class="text-slate-500">/</span>
                            <span class="text-white font-semibold">All Products</span>
                        @endif
                    </nav>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
                        {{ $activeCategory ? $activeCategory->name : 'All Products Catalog' }}
                    </h1>
                    <p class="mt-2.5 max-w-2xl text-xs sm:text-sm text-slate-300 leading-relaxed">
                        Explore Australian-engineered power banks, high-speed charging hubs, audio gear &amp; smart tech essentials. Built for reliability, safety, and modern performance.
                    </p>
                </div>
            </div>
        </section>

        {{-- Categories Horizontal Carousel / Strip --}}
        @if($categories->count())
            <section class="py-10 sm:py-12 border-b border-gray-200/80 dark:border-slate-800/80 bg-white dark:bg-slate-950">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    {{-- Section Header --}}
                    <div class="flex items-center justify-between mb-5 sm:mb-6">
                        <div class="flex items-center gap-3">
                            <h2 class="text-xl sm:text-2xl font-normal text-slate-800 dark:text-slate-100 tracking-tight">
                                Shop by Product
                            </h2>
                            @if(($filters['category'] ?? null) || ($filters['offer'] ?? null) || ($filters['min_price'] ?? null) || ($filters['max_price'] ?? null))
                                <a href="{{ route('shop') }}" class="text-xs font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                                    Show All
                                </a>
                            @endif
                        </div>

                        {{-- Carousel Arrows (Mobile/Scroll controls) --}}
                        {{-- <div class="flex items-center gap-1.5">
                            <button
                                type="button"
                                onclick="scrollCategoryCarousel(-1)"
                                class="p-2 rounded-lg border border-gray-200 dark:border-slate-800 text-slate-600 dark:text-slate-300 hover:bg-gray-100 dark:hover:bg-slate-900 transition-colors cursor-pointer"
                                aria-label="Scroll left"
                            >
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button
                                type="button"
                                onclick="scrollCategoryCarousel(1)"
                                class="p-2 rounded-lg border border-gray-200 dark:border-slate-800 text-slate-600 dark:text-slate-300 hover:bg-gray-100 dark:hover:bg-slate-900 transition-colors cursor-pointer"
                                aria-label="Scroll right"
                            >
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div> --}}
                    </div>

                    {{-- Carousel Track / 6-Column Grid: Same size image on all cards --}}
                    <div
                        id="categoryCarouselTrack"
                        class="flex lg:grid lg:grid-cols-6 gap-3.5 sm:gap-4 overflow-x-auto lg:overflow-visible snap-x snap-mandatory pb-3 lg:pb-0 scrollbar-none scroll-smooth"
                    >
                        @foreach($categories as $category)
                            @php
                                $isActive = ($filters['category'] ?? '') === $category->slug;
                                $slug = strtolower($category->slug);
                                $imgSrc = null;

                                if ($category->image) {
                                    $imgSrc = asset('storage/' . $category->image);
                                } elseif (str_contains($slug, 'charging') || str_contains($slug, 'power')) {
                                    $imgSrc = asset('images/categories/jump.png');
                                } elseif (str_contains($slug, 'display') || str_contains($slug, 'tech')) {
                                    $imgSrc = asset('images/categories/discovery.png');
                                } elseif (str_contains($slug, 'wearable') || str_contains($slug, 'watch')) {
                                    $imgSrc = asset('images/categories/infinity-luxe.png');
                                } elseif (str_contains($slug, 'audio') || str_contains($slug, 'sound')) {
                                    $imgSrc = asset('images/categories/audio-sound.png');
                                } elseif (str_contains($slug, 'gaming') || str_contains($slug, 'gear')) {
                                    $imgSrc = asset('images/categories/gaming-gear.png');
                                } elseif (str_contains($slug, 'burn') || str_contains($slug, 'medical')) {
                                    $imgSrc = asset('images/categories/apollo.png');
                                } else {
                                    $imgSrc = asset('images/categories/jump.png');
                                }
                            @endphp

                            <a
                                href="{{ route('shop', array_filter(array_merge($filters, ['category' => $isActive ? null : $category->slug, 'page' => null]))) }}"
                                class="group relative aspect-square w-[150px] sm:w-[175px] lg:w-auto shrink-0 snap-start rounded-xl overflow-hidden bg-slate-900 border border-gray-200/40 dark:border-slate-800 transition-all duration-300 select-none block shadow-sm {{ $isActive ? 'ring-3 ring-indigo-500 shadow-xl' : 'hover:shadow-lg hover:border-slate-400' }}"
                                title="{{ $category->name }}"
                            >
                                {{-- Full Bleed Uniform Image (same size looking on all cards) --}}
                                <img
                                    src="{{ $imgSrc }}"
                                    alt="{{ $category->name }}"
                                    class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500 ease-out"
                                    loading="lazy"
                                >

                                {{-- Dark Vignette Gradient Overlay at Bottom --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-transparent pointer-events-none"></div>

                                {{-- Overlaid Title at Bottom-Left --}}
                                <div class="absolute bottom-3 left-3 sm:bottom-4 sm:left-4 right-3 z-10 text-left pointer-events-none">
                                    <h3 class="text-white font-bold text-sm sm:text-base leading-snug drop-shadow-md group-hover:underline underline-offset-4 decoration-2 decoration-white/90 line-clamp-1">
                                        {{ $category->name }}
                                    </h3>
                                    <span class="inline-block text-[10px] text-slate-300 font-medium mt-0.5 opacity-90 drop-shadow-sm">
                                        {{ $category->products_count }} {{ Str::plural('product', $category->products_count) }}
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- Main Storefront Section: 4 Cards at a Row --}}
        <section class="py-10 sm:py-14 bg-gray-50/70 dark:bg-slate-950/70">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                {{-- Toolbar & Filter Controls Bar --}}
                <div class="bg-white dark:bg-slate-900/90 border border-gray-200 dark:border-slate-800/90 rounded-2xl p-4 sm:p-5 mb-8 shadow-xs">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        {{-- Heading & Total count --}}
                        <div class="flex items-center gap-3">
                            <h2 class="text-lg font-black text-slate-900 dark:text-white">
                                {{ $activeCategory?->name ?? 'All Products' }}
                            </h2>
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-indigo-50 dark:bg-indigo-950/80 text-indigo-600 dark:text-indigo-400 border border-indigo-500/20">
                                {{ $products->total() }} {{ Str::plural('Product', $products->total()) }}
                            </span>
                        </div>

                        {{-- Quick Controls (Offer Toggle, Drawer Toggle, Sort) --}}
                        <div class="flex items-center gap-3 flex-wrap">
                            {{-- Quick Special Offer Chip --}}
                            <a
                                href="{{ route('shop', array_filter(array_merge($filters, ['offer' => ($filters['offer'] ?? null) === 'special' ? null : 'special', 'page' => null]))) }}"
                                class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all border flex items-center gap-1.5 {{ ($filters['offer'] ?? null) === 'special' ? 'bg-rose-600 text-white border-rose-600 shadow-sm shadow-rose-500/30' : 'bg-gray-100 dark:bg-slate-800/80 text-slate-700 dark:text-slate-300 border-gray-200 dark:border-slate-700 hover:border-rose-400' }}"
                            >
                                <svg class="w-3.5 h-3.5 {{ ($filters['offer'] ?? null) === 'special' ? 'text-white' : 'text-rose-500' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.527.82-1.17 1.95-1.78 3.32a30.82 30.82 0 00-1.528 4.39A8.04 8.04 0 006 13c0 3.866 3.134 7 7 7s7-3.134 7-7a7.99 7.99 0 00-1.854-5.074c-.45-.558-.99-1.04-1.546-1.472a1 1 0 00-1.488.384c-.43.83-1.008 1.57-1.717 2.162z" clip-rule="evenodd"/>
                                </svg>
                                <span>Special Offers</span>
                            </a>

                            @php
                                $sliderLimit = $priceSliderMax ?? 400;
                                $currentMin = (isset($filters['min_price']) && is_numeric($filters['min_price'])) ? (float) $filters['min_price'] : 0;
                                $currentMax = (isset($filters['max_price']) && is_numeric($filters['max_price'])) ? (float) $filters['max_price'] : $sliderLimit;
                                $isFilterActive = ($filters['min_price'] ?? null) || ($filters['max_price'] ?? null) || ($filters['offer'] ?? null);
                            @endphp

                            {{-- Filter Drawer Toggle Button --}}
                            <button
                                type="button"
                                onclick="toggleFilterDrawer()"
                                class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all border {{ $isFilterActive ? 'bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400 border-indigo-300 dark:border-indigo-800' : 'bg-gray-100 dark:bg-slate-800/80 text-slate-700 dark:text-slate-300 border-gray-200 dark:border-slate-700 hover:border-indigo-400' }} flex items-center gap-1.5 cursor-pointer"
                            >
                                <svg class="w-3.5 h-3.5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                </svg>
                                <span>Price &amp; Filters</span>
                                @if($isFilterActive)
                                    <span class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"></span>
                                @endif
                            </button>

                            {{-- Sort Selector --}}
                            <form method="GET" action="{{ route('shop') }}" class="flex items-center gap-1.5">
                                @foreach(array_filter([
                                    'category' => $filters['category'] ?? null,
                                    'offer' => $filters['offer'] ?? null,
                                    'min_price' => $filters['min_price'] ?? null,
                                    'max_price' => $filters['max_price'] ?? null,
                                ]) as $key => $value)
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endforeach

                                <label for="sort-desktop" class="sr-only">Sort By</label>
                                <select
                                    name="sort"
                                    id="sort-desktop"
                                    onchange="this.form.submit()"
                                    class="rounded-xl border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-xs font-semibold text-slate-800 dark:text-slate-200 px-3 py-2 outline-none focus:border-indigo-500 cursor-pointer"
                                >
                                    <option value="featured" @selected(($filters['sort'] ?? '') === 'featured')>Featured</option>
                                    <option value="best-selling" @selected(($filters['sort'] ?? '') === 'best-selling')>Best Selling</option>
                                    <option value="price-asc" @selected(($filters['sort'] ?? '') === 'price-asc')>Price: Low to High</option>
                                    <option value="price-desc" @selected(($filters['sort'] ?? '') === 'price-desc')>Price: High to Low</option>
                                    <option value="title-asc" @selected(($filters['sort'] ?? '') === 'title-asc')>Alphabetically, A-Z</option>
                                    <option value="title-desc" @selected(($filters['sort'] ?? '') === 'title-desc')>Alphabetically, Z-A</option>
                                    <option value="date-desc" @selected(($filters['sort'] ?? '') === 'date-desc')>Date, Newest</option>
                                </select>
                            </form>
                        </div>
                    </div>

                    {{-- Collapsible Filter Drawer with Dual Range Slider --}}
                    <div id="filter-drawer" class="{{ $isFilterActive ? '' : 'hidden' }} mt-4 pt-4 border-t border-gray-100 dark:border-slate-800/80">
                        <form method="GET" action="{{ route('shop') }}" id="price-filter-form">
                            @if($filters['category'] ?? null)
                                <input type="hidden" name="category" value="{{ $filters['category'] }}">
                            @endif
                            <input type="hidden" name="sort" value="{{ $filters['sort'] ?? 'featured' }}">

                            <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-center">
                                {{-- 1. Deals & Offers Dropdown (3 cols) --}}
                                <div class="md:col-span-3">
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-1.5">Special Deals</label>
                                    <div class="relative">
                                        <select name="offer" class="w-full rounded-xl border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-950 text-xs font-semibold text-slate-900 dark:text-white px-3.5 py-2.5 outline-none focus:border-indigo-500 transition-colors cursor-pointer appearance-none">
                                            <option value="" @selected(empty($filters['offer']))>All Products</option>
                                            <option value="special" @selected(($filters['offer'] ?? '') === 'special')>Special Offers Only</option>
                                        </select>
                                        <svg class="w-4 h-4 text-slate-400 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>

                                {{-- 2. Interactive Dual Range Slider & Inputs (6 cols) --}}
                                <div class="md:col-span-6 bg-gray-50/90 dark:bg-slate-950/60 p-4 rounded-2xl border border-gray-200/80 dark:border-slate-800/80">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                            </svg>
                                            <span>Price Range</span>
                                        </span>
                                        <span class="px-2.5 py-0.5 rounded-lg text-xs font-bold bg-indigo-50 dark:bg-indigo-950/80 text-indigo-600 dark:text-indigo-400 border border-indigo-500/20 tabular-nums">
                                            $<span id="slider-min-label">{{ round($currentMin) }}</span> &ndash; $<span id="slider-max-label">{{ round($currentMax) }}</span> AUD
                                        </span>
                                    </div>

                                    {{-- Interactive Dual Slider Track --}}
                                    <div class="relative w-full h-6 flex items-center my-1 select-none">
                                        {{-- Base Track --}}
                                        <div class="absolute w-full h-2 rounded-full bg-gray-200 dark:bg-slate-800"></div>
                                        
                                        {{-- Active Colored Bar --}}
                                        <div id="slider-highlight-bar" class="absolute h-2 rounded-full bg-gradient-to-r from-indigo-500 to-indigo-600 transition-all duration-75"></div>

                                        {{-- Min Range Input --}}
                                        <input 
                                            type="range" 
                                            id="price-range-min" 
                                            min="0" 
                                            max="{{ $sliderLimit }}" 
                                            step="1" 
                                            value="{{ $currentMin }}"
                                            class="range-slider-input absolute w-full appearance-none bg-transparent pointer-events-none z-20 cursor-pointer h-2"
                                            aria-label="Minimum price"
                                        >

                                        {{-- Max Range Input --}}
                                        <input 
                                            type="range" 
                                            id="price-range-max" 
                                            min="0" 
                                            max="{{ $sliderLimit }}" 
                                            step="1" 
                                            value="{{ $currentMax }}"
                                            class="range-slider-input absolute w-full appearance-none bg-transparent pointer-events-none z-20 cursor-pointer h-2"
                                            aria-label="Maximum price"
                                        >
                                    </div>

                                    {{-- Min & Max Direct Input Fields --}}
                                    <div class="flex items-center justify-between gap-3 pt-2.5 mt-1 border-t border-gray-200/60 dark:border-slate-800/60">
                                        <div class="flex items-center gap-1.5 flex-1">
                                            <span class="text-[11px] font-medium text-slate-400">Min:</span>
                                            <div class="relative flex-1">
                                                <span class="absolute left-2.5 top-1/2 -translate-y-1/2 text-xs font-bold text-slate-400">$</span>
                                                <input
                                                    type="number"
                                                    name="min_price"
                                                    id="min_price_input"
                                                    min="0"
                                                    max="{{ $sliderLimit }}"
                                                    step="1"
                                                    value="{{ $filters['min_price'] ?? '' }}"
                                                    placeholder="0"
                                                    class="w-full pl-6 pr-2 py-1 rounded-lg border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-xs font-bold text-slate-900 dark:text-white outline-none focus:border-indigo-500 tabular-nums"
                                                >
                                            </div>
                                        </div>

                                        <span class="text-xs text-slate-400 font-bold">&ndash;</span>

                                        <div class="flex items-center gap-1.5 flex-1">
                                            <span class="text-[11px] font-medium text-slate-400">Max:</span>
                                            <div class="relative flex-1">
                                                <span class="absolute left-2.5 top-1/2 -translate-y-1/2 text-xs font-bold text-slate-400">$</span>
                                                <input
                                                    type="number"
                                                    name="max_price"
                                                    id="max_price_input"
                                                    min="0"
                                                    max="{{ $sliderLimit }}"
                                                    step="1"
                                                    value="{{ $filters['max_price'] ?? '' }}"
                                                    placeholder="{{ $sliderLimit }}"
                                                    class="w-full pl-6 pr-2 py-1 rounded-lg border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-xs font-bold text-slate-900 dark:text-white outline-none focus:border-indigo-500 tabular-nums"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- 3. Action Buttons (3 cols) --}}
                                <div class="md:col-span-3 flex items-center gap-2">
                                    <button
                                        type="submit"
                                        class="flex-1 py-3 px-4 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-bold uppercase tracking-wider transition-all shadow-sm shadow-indigo-600/30 hover:shadow-indigo-600/50 cursor-pointer text-center flex items-center justify-center gap-1.5"
                                    >
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Apply Filter</span>
                                    </button>
                                    <a
                                        href="{{ route('shop') }}"
                                        class="px-3.5 py-3 rounded-xl border border-gray-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 text-xs font-semibold hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors text-center"
                                        title="Clear all filters"
                                    >
                                        Reset
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- Active Filter Tags Strip --}}
                    @if(($filters['category'] ?? null) || ($filters['offer'] ?? null) || ($filters['min_price'] ?? null) || ($filters['max_price'] ?? null))
                        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-slate-800/80 flex items-center gap-2 flex-wrap text-xs">
                            <span class="text-slate-400 font-semibold text-[11px] uppercase tracking-wider">Active:</span>

                            @if($activeCategory)
                                <a href="{{ route('shop', array_filter(array_merge($filters, ['category' => null, 'page' => null]))) }}" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-indigo-50 dark:bg-slate-800 text-indigo-600 dark:text-indigo-400 font-medium hover:bg-indigo-100 transition-colors">
                                    <span>Category: {{ $activeCategory->name }}</span>
                                    <span class="font-bold">&times;</span>
                                </a>
                            @endif

                            @if(($filters['offer'] ?? null) === 'special')
                                <a href="{{ route('shop', array_filter(array_merge($filters, ['offer' => null, 'page' => null]))) }}" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-rose-50 dark:bg-rose-950/60 text-rose-600 dark:text-rose-400 font-medium hover:bg-rose-100 transition-colors">
                                    <span>Special Offers</span>
                                    <span class="font-bold">&times;</span>
                                </a>
                            @endif

                            @if(($filters['min_price'] ?? null) || ($filters['max_price'] ?? null))
                                <a href="{{ route('shop', array_filter(array_merge($filters, ['min_price' => null, 'max_price' => null, 'page' => null]))) }}" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-indigo-50 dark:bg-slate-800 text-indigo-600 dark:text-indigo-400 font-medium hover:bg-indigo-100 transition-colors" title="Remove price filter">
                                    <span>Price: ${{ $filters['min_price'] ?? '0' }} &ndash; ${{ $filters['max_price'] ?? $sliderLimit }}</span>
                                    <span class="font-bold text-sm leading-none">&times;</span>
                                </a>
                            @endif

                            <a href="{{ route('shop') }}" class="text-[11px] text-slate-400 hover:text-rose-500 underline ml-1">
                                Clear all
                            </a>
                        </div>
                    @endif
                </div>

                {{-- Products Grid: Exactly 4 Cards at a Row on Desktop --}}
                @if($products->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($products as $product)
                            @include('partials.product-card', [
                                'product' => $product,
                                'type' => $product->card_type ?? 'regular',
                            ])
                        @endforeach
                    </div>

                    {{-- Storefront Pagination --}}
                    <div class="mt-12 pt-6 border-t border-gray-200 dark:border-slate-800">
                        {{ $products->links('vendor.pagination.storefront') }}
                    </div>
                @else
                    {{-- Empty State --}}
                    <div class="text-center py-20 bg-white dark:bg-slate-900/60 rounded-3xl border border-gray-200 dark:border-slate-800 px-4">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-indigo-50 dark:bg-slate-800 text-indigo-500 flex items-center justify-center">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">No products found</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-xs sm:text-sm mt-1 max-w-md mx-auto">
                            No products match your selected filters. Try clearing your search or exploring our other collections.
                        </p>
                        <a href="{{ route('shop') }}" class="mt-5 inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-white bg-indigo-600 hover:bg-indigo-500 transition-colors shadow-md">
                            <span>View All Products</span>
                        </a>
                    </div>
                @endif
            </div>
        </section>
@endsection

@push('scripts')
<script>
// Interactive Dual Range Slider with 2-way sync
        function initPriceRangeSlider() {
            const rangeMin = document.getElementById('price-range-min');
            const rangeMax = document.getElementById('price-range-max');
            const highlight = document.getElementById('slider-highlight-bar');
            const labelMin = document.getElementById('slider-min-label');
            const labelMax = document.getElementById('slider-max-label');
            const inputMin = document.getElementById('min_price_input');
            const inputMax = document.getElementById('max_price_input');

            if (!rangeMin || !rangeMax || !highlight) return;

            const maxLimit = parseFloat(rangeMin.max) || 400;
            const minGap = 5;

            function updateUI(minVal, maxVal, fromSlider) {
                // Keep min/max order
                if (minVal > maxVal - minGap) {
                    if (fromSlider === 'min') {
                        minVal = maxVal - minGap;
                        rangeMin.value = minVal;
                    } else if (fromSlider === 'max') {
                        maxVal = minVal + minGap;
                        rangeMax.value = maxVal;
                    }
                }

                // Bounds
                minVal = Math.max(0, Math.min(minVal, maxLimit - minGap));
                maxVal = Math.min(maxLimit, Math.max(maxVal, minVal + minGap));

                // Position highlight bar
                const minPercent = (minVal / maxLimit) * 100;
                const maxPercent = (maxVal / maxLimit) * 100;
                highlight.style.left = minPercent + '%';
                highlight.style.width = Math.max(0, maxPercent - minPercent) + '%';

                // Update text readout
                if (labelMin) labelMin.textContent = Math.round(minVal);
                if (labelMax) labelMax.textContent = Math.round(maxVal);

                // Update input boxes
                if (inputMin && fromSlider) {
                    inputMin.value = minVal > 0 ? Math.round(minVal) : '';
                }
                if (inputMax && fromSlider) {
                    inputMax.value = maxVal < maxLimit ? Math.round(maxVal) : '';
                }
            }

            rangeMin.addEventListener('input', () => {
                updateUI(parseFloat(rangeMin.value), parseFloat(rangeMax.value), 'min');
            });

            rangeMax.addEventListener('input', () => {
                updateUI(parseFloat(rangeMin.value), parseFloat(rangeMax.value), 'max');
            });

            if (inputMin) {
                const handleMinInput = () => {
                    let v = inputMin.value !== '' ? parseFloat(inputMin.value) : 0;
                    if (isNaN(v) || v < 0) v = 0;
                    let maxV = rangeMax.value !== '' ? parseFloat(rangeMax.value) : maxLimit;
                    if (v > maxV - minGap) v = Math.max(0, maxV - minGap);
                    rangeMin.value = v;
                    updateUI(v, maxV, null);
                };
                inputMin.addEventListener('input', handleMinInput);
                inputMin.addEventListener('change', handleMinInput);
            }

            if (inputMax) {
                const handleMaxInput = () => {
                    let v = inputMax.value !== '' ? parseFloat(inputMax.value) : maxLimit;
                    if (isNaN(v) || v > maxLimit) v = maxLimit;
                    let minV = rangeMin.value !== '' ? parseFloat(rangeMin.value) : 0;
                    if (v < minV + minGap) v = Math.min(maxLimit, minV + minGap);
                    rangeMax.value = v;
                    updateUI(minV, v, null);
                };
                inputMax.addEventListener('input', handleMaxInput);
                inputMax.addEventListener('change', handleMaxInput);
            }

            // Initial paint
            updateUI(parseFloat(rangeMin.value), parseFloat(rangeMax.value), null);
        }

        // Horizontal smooth scroll for Category Carousel
        function scrollCategoryCarousel(direction) {
            const track = document.getElementById('categoryCarouselTrack');
            if (track) {
                const scrollAmount = (track.clientWidth * 0.75) * direction;
                track.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            }
        }
</script>
@endpush
