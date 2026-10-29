@extends('layouts.app')

@section('title', $product->name . ' | VXPS Australia')

@section('meta')
    <meta name="description" content="{{ Str::limit(strip_tags($product->description ?? 'Explore ' . $product->name . ' at VXPS Australia. Engineered for high performance, reliability and safety.'), 155) }}">
@endsection

@section('content')
<div class="bg-gray-50/50 dark:bg-slate-950 py-8 sm:py-12">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Breadcrumb Navigation --}}
            <nav class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-6 flex-wrap">
                <a href="{{ route('home') }}" class="hover:text-indigo-600 dark:hover:text-white transition-colors">Home</a>
                <span>/</span>
                <a href="{{ route('shop') }}" class="hover:text-indigo-600 dark:hover:text-white transition-colors">Shop</a>
                @if($product->category)
                    <span>/</span>
                    <a href="{{ route('shop', ['category' => $product->category->slug]) }}" class="hover:text-indigo-600 dark:hover:text-white transition-colors">
                        {{ $product->category->name }}
                    </a>
                @endif
                <span>/</span>
                <span class="text-slate-900 dark:text-white font-semibold line-clamp-1">{{ $product->name }}</span>
            </nav>

            {{-- Product Main Showcase (2-Column Grid) --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start mb-16">

                {{-- Left Column: Interactive Product Gallery --}}
                <div class="lg:col-span-6 space-y-4">
                    {{-- Main Image Showcase Container --}}
                    <div class="relative w-full aspect-square rounded-3xl bg-white dark:bg-slate-900 border border-gray-200/90 dark:border-slate-800 overflow-hidden shadow-xl shadow-slate-900/5 dark:shadow-indigo-950/20 flex items-center justify-center p-4 sm:p-6 group">
                        <img 
                            id="main-product-image"
                            src="{{ $mainImage }}" 
                            alt="{{ $product->name }}" 
                            class="w-full h-full object-contain transition-all duration-300 ease-out group-hover:scale-105"
                        >

                        {{-- Floating Badges --}}
                        <div class="absolute top-4 left-4 flex flex-col gap-2">
                            @if($discountPercent)
                                <span class="px-3 py-1.5 rounded-xl text-xs font-black uppercase tracking-wider bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-lg shadow-rose-600/30">
                                    -{{ $discountPercent }}% OFF
                                </span>
                            @elseif($hasOffer)
                                <span class="px-3 py-1.5 rounded-xl text-xs font-black uppercase tracking-wider bg-rose-600 text-white shadow-lg shadow-rose-600/30">
                                    Special Offer
                                </span>
                            @endif

                            <span class="px-3 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20 backdrop-blur-md">
                                Australian Certified
                            </span>
                        </div>

                        {{-- In-Stock Floating Pill --}}
                        <div class="absolute top-4 right-4 px-3 py-1 rounded-full text-xs font-semibold bg-white/90 dark:bg-slate-950/90 text-slate-800 dark:text-slate-200 border border-gray-200/80 dark:border-slate-800 shadow-sm backdrop-blur-md flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span>In Stock</span>
                        </div>
                    </div>

                    {{-- Gallery Thumbnails Strip (if multiple images exist) --}}
                    @if(count($galleryImages) > 1)
                        <div class="flex items-center gap-3 overflow-x-auto pb-2 scrollbar-none">
                            @foreach($galleryImages as $index => $imgUrl)
                                <button
                                    type="button"
                                    onclick="switchMainImage('{{ $imgUrl }}', this)"
                                    class="gallery-thumb relative w-20 h-20 rounded-2xl bg-white dark:bg-slate-900 border-2 overflow-hidden shrink-0 transition-all p-1 cursor-pointer {{ $loop->first ? 'border-indigo-600 shadow-md ring-2 ring-indigo-500/20' : 'border-gray-200 dark:border-slate-800 hover:border-slate-400' }}"
                                    title="View image {{ $index + 1 }}"
                                >
                                    <img src="{{ $imgUrl }}" alt="Thumbnail {{ $index + 1 }}" class="w-full h-full object-contain">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Right Column: Product Details & Purchase Form --}}
                <div class="lg:col-span-6 flex flex-col justify-between">
                    <div>
                        {{-- Category Link --}}
                        @if($product->category)
                            <a href="{{ route('shop', ['category' => $product->category->slug]) }}" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-indigo-50 dark:bg-indigo-950/70 text-indigo-600 dark:text-indigo-400 text-xs font-bold uppercase tracking-wider mb-3 hover:underline">
                                <span>{{ $product->category->name }}</span>
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                            </a>
                        @endif

                        {{-- Product Heading --}}
                        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 dark:text-white tracking-tight leading-tight">
                            {{ $product->name }}
                        </h1>

                        {{-- Social Proof & SKU --}}
                        <div class="flex items-center gap-4 mt-3 pb-5 border-b border-gray-200 dark:border-slate-800 flex-wrap">
                            <div class="flex items-center gap-1 text-amber-400">
                                <span class="text-sm">★★★★★</span>
                                <span class="text-xs font-bold text-slate-700 dark:text-slate-300 ml-1">4.9</span>
                                {{-- <span class="text-xs text-slate-400 dark:text-slate-500">(128 Australian Reviews)</span> --}}
                            </div>
                            <span class="text-slate-300 dark:text-slate-700">&bull;</span>
                            <span class="text-xs font-mono text-slate-500 dark:text-slate-400">SKU: VXPS-{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</span>
                            <span class="text-slate-300 dark:text-slate-700">&bull;</span>
                            <span class="text-xs text-emerald-600 dark:text-emerald-400 font-semibold">Ready to Ship</span>
                        </div>

                        {{-- Price Block --}}
                        <div class="mt-6 p-5 rounded-2xl bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800/80 shadow-xs">
                            <div class="flex items-baseline gap-3 flex-wrap">
                                <span class="text-3xl sm:text-4xl font-black {{ $hasOffer ? 'text-rose-600 dark:text-rose-400' : 'text-slate-900 dark:text-white' }} font-mono tracking-tight">
                                    ${{ number_format($effectivePrice, 2) }}
                                </span>

                                @if($hasOffer && $originalPrice > 0)
                                    <span class="text-base text-slate-400 line-through font-mono">
                                        ${{ number_format($originalPrice, 2) }}
                                    </span>
                                    <span class="px-2.5 py-1 rounded-lg text-xs font-bold bg-rose-50 dark:bg-rose-950/80 text-rose-600 dark:text-rose-400 border border-rose-500/20">
                                        Save ${{ number_format($savingsAmount, 2) }} ({{ $discountPercent }}%)
                                    </span>
                                @endif
                            </div>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-2">
                                Price in Australian Dollars (AUD). Australian GST included. Free tracked shipping on orders over $79.
                            </p>
                        </div>

                        {{-- Short Description --}}
                        <div class="mt-6 text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                            {!! $product->description ?: '<p>Engineered for high performance, maximum durability, and seamless everyday use. Tested to Australian safety standards for complete reliability.</p>' !!}
                        </div>

                        {{-- Interactive Purchasing Controls (Quantity + CTAs) --}}
                        <div class="mt-8 space-y-4">
                            <div class="flex items-center gap-4">
                                {{-- Quantity Stepper --}}
                                <div class="flex items-center rounded-xl border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-900 p-1">
                                    <button 
                                        type="button" 
                                        onclick="changeQuantity(-1)" 
                                        class="w-9 h-9 rounded-lg flex items-center justify-center text-slate-600 dark:text-slate-300 hover:bg-gray-100 dark:hover:bg-slate-800 font-bold transition-colors cursor-pointer select-none"
                                        aria-label="Decrease quantity"
                                    >
                                        &minus;
                                    </button>
                                    <input 
                                        type="number" 
                                        id="product-quantity" 
                                        value="1" 
                                        min="1" 
                                        max="99" 
                                        class="w-12 text-center text-sm font-bold text-slate-900 dark:text-white bg-transparent outline-none tabular-nums"
                                        aria-label="Quantity"
                                        readonly
                                    >
                                    <button 
                                        type="button" 
                                        onclick="changeQuantity(1)" 
                                        class="w-9 h-9 rounded-lg flex items-center justify-center text-slate-600 dark:text-slate-300 hover:bg-gray-100 dark:hover:bg-slate-800 font-bold transition-colors cursor-pointer select-none"
                                        aria-label="Increase quantity"
                                    >
                                        +
                                    </button>
                                </div>

                                {{-- Subtotal Live Indicator --}}
                                <div class="text-xs text-slate-500 dark:text-slate-400">
                                    <span>Subtotal: </span>
                                    <span id="live-subtotal" class="font-black text-slate-900 dark:text-white font-mono text-sm">
                                        ${{ number_format($effectivePrice, 2) }}
                                    </span>
                                </div>
                            </div>

                            {{-- CTA Buttons --}}
                            <div class="flex flex-col sm:flex-row gap-3 pt-2">
                                {{-- Add to Cart --}}
                                <button
                                    type="button"
                                    onclick="triggerAddToCart({{ $product->id }}, '{{ addslashes($product->name) }}')"
                                    class="flex-1 py-3.5 px-6 rounded-2xl bg-gray-100 hover:bg-gray-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-slate-900 dark:text-white font-bold text-sm tracking-wide border border-gray-200 dark:border-slate-700 transition-all flex items-center justify-center gap-2 cursor-pointer active:scale-98"
                                >
                                    <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    <span>Add to Cart</span>
                                </button>

                                {{-- Buy Now / Instant Checkout --}}
                                <button
                                    type="button"
                                    onclick="instantCheckout('{{ $product->slug }}')"
                                    class="flex-1 py-3.5 px-6 rounded-2xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-sm tracking-wide shadow-lg shadow-indigo-600/30 hover:shadow-indigo-600/50 transition-all flex items-center justify-center gap-2 cursor-pointer active:scale-98"
                                >
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    <span>Buy Now</span>
                                </button>
                            </div>
                        </div>

                        {{-- Trust Badges 4-Grid --}}
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-8 pt-6 border-t border-gray-200 dark:border-slate-800">
                            <div class="flex flex-col items-center text-center p-3 rounded-2xl bg-white dark:bg-slate-900/60 border border-gray-200/60 dark:border-slate-800/60">
                                <span class="text-xl mb-1">🚚</span>
                                <span class="text-[11px] font-bold text-slate-800 dark:text-slate-200">Express Post</span>
                                <span class="text-[10px] text-slate-400">Fast AU delivery</span>
                            </div>
                            <div class="flex flex-col items-center text-center p-3 rounded-2xl bg-white dark:bg-slate-900/60 border border-gray-200/60 dark:border-slate-800/60">
                                <span class="text-xl mb-1">🛡️</span>
                                <span class="text-[11px] font-bold text-slate-800 dark:text-slate-200">2-Yr Warranty</span>
                                <span class="text-[10px] text-slate-400">Full replacement</span>
                            </div>
                            <div class="flex flex-col items-center text-center p-3 rounded-2xl bg-white dark:bg-slate-900/60 border border-gray-200/60 dark:border-slate-800/60">
                                <span class="text-xl mb-1">🔄</span>
                                <span class="text-[11px] font-bold text-slate-800 dark:text-slate-200">30-Day Return</span>
                                <span class="text-[10px] text-slate-400">Hassle free</span>
                            </div>
                            <div class="flex flex-col items-center text-center p-3 rounded-2xl bg-white dark:bg-slate-900/60 border border-gray-200/60 dark:border-slate-800/60">
                                <span class="text-xl mb-1">🇦🇺</span>
                                <span class="text-[11px] font-bold text-slate-800 dark:text-slate-200">AU Owned</span>
                                <span class="text-[10px] text-slate-400">Adelaide team</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

                        {{-- Comprehensive Total Details Section (Rich Tabbed Navigation) --}}
            @php
                $detailTabs = [];
                if (!empty(trim(strip_tags($product->features ?? '')))) {
                    $detailTabs['features'] = [
                        'label' => 'Features',
                        'title' => 'Engineered Hardware Features',
                        'content' => $product->features,
                    ];
                }
                if (!empty(trim(strip_tags($product->specification ?? '')))) {
                    $detailTabs['specs'] = [
                        'label' => 'Specifications',
                        'title' => 'Technical Specifications',
                        'content' => $product->specification,
                    ];
                }
                if (!empty(trim(strip_tags($product->whats_include ?? '')))) {
                    $detailTabs['includes'] = [
                        'label' => "What's Included",
                        'title' => 'Package Contents',
                        'content' => $product->whats_include,
                    ];
                }
                if (!empty(trim(strip_tags($product->compatibility ?? '')))) {
                    $detailTabs['compatibility'] = [
                        'label' => 'Compatibility',
                        'title' => 'Device & Protocol Compatibility',
                        'content' => $product->compatibility,
                    ];
                }
                if (!empty(trim(strip_tags($product->faq ?? '')))) {
                    $detailTabs['faq'] = [
                        'label' => 'FAQ & Warranty',
                        'title' => 'Frequently Asked Questions & Support',
                        'content' => $product->faq,
                    ];
                }
            @endphp

            @if(count($detailTabs) > 0)
                <section class="mt-16 pt-10 border-t border-gray-200 dark:border-slate-800">
                    <div class="flex items-center justify-between mb-8 flex-wrap gap-4">
                        <div>
                            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white tracking-tight">
                                Total Product Details
                            </h2>
                            <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1">
                                Complete technical specifications, engineered features, in-box contents &amp; compatibility.
                            </p>
                        </div>

                        {{-- Tab Buttons: Only for tabs with content --}}
                        <div class="flex items-center gap-1.5 p-1.5 rounded-2xl bg-gray-200/80 dark:bg-slate-900 border border-gray-300/60 dark:border-slate-800 overflow-x-auto max-w-full">
                            @foreach($detailTabs as $tabKey => $tab)
                                <button 
                                    type="button" 
                                    onclick="switchDetailTab('{{ $tabKey }}')" 
                                    id="tab-btn-{{ $tabKey }}"
                                    class="detail-tab-btn px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $loop->first ? 'bg-white dark:bg-slate-800 text-indigo-600 dark:text-indigo-400 shadow-xs' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white' }} cursor-pointer shrink-0"
                                >
                                    {{ $tab['label'] }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- Tab Panes: Only for tabs with content --}}
                    @foreach($detailTabs as $tabKey => $tab)
                        <div id="tab-pane-{{ $tabKey }}" class="detail-tab-pane {{ $loop->first ? '' : 'hidden' }} bg-white dark:bg-slate-900/90 rounded-3xl border border-gray-200 dark:border-slate-800 p-6 sm:p-8 shadow-xs">
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-indigo-500"></span>
                                <span>{{ $tab['title'] }}</span>
                            </h3>

                            <div class="prose dark:prose-invert max-w-none text-sm text-slate-700 dark:text-slate-300 leading-relaxed [&>ul]:list-disc [&>ul]:pl-5 [&>ul>li]:my-1.5 [&>ol]:list-decimal [&>ol]:pl-5">
                                {!! $tab['content'] !!}
                            </div>
                        </div>
                    @endforeach
                </section>
            @endif

            {{-- Related / Recommended Products Section --}}
            @if(isset($relatedProducts) && $relatedProducts->count())
                <section class="mt-20 pt-12 border-t border-gray-200 dark:border-slate-800">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black text-slate-900 dark:text-white tracking-tight">
                                Recommended Hardware
                            </h2>
                            <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1">
                                High-performance accessories to pair with your {{ $product->name }}.
                            </p>
                        </div>
                        <a href="{{ route('shop') }}" class="text-xs font-bold text-indigo-600 dark:text-indigo-400 hover:underline flex items-center gap-1">
                            <span>Browse All &rarr;</span>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($relatedProducts as $related)
                            @include('partials.product-card', [
                                'product' => $related,
                                'type' => $related->card_type ?? 'regular',
                            ])
                        @endforeach
                    </div>
                </section>
            @endif

        </div>
</div>
@endsection

