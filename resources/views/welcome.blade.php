@extends('layouts.app')

{{-- Keywords --}}
@section('title', 'VXPS - Portable Power & Smart Tech Essentials')
@section('meta_description', 'Discover VXPS: Your destination for portable power solutions, smart tech accessories, and essential electronics. Explore our range of car jump starters, power banks, charging cables, and more.')
@section('meta_keywords', 'VXPS, portable power, smart tech, car jump starters, power banks, charging cables, electronics, tech accessories, reliable performance, automotive solutions')

@section('content')
        <!-- 1. HERO BANNER CAROUSEL (PulseCharge Style Slideshow) -->
        <section id="home" class="relative w-full overflow-hidden bg-slate-950 group">
            <div id="hero-carousel" class="relative w-full h-[430px] sm:h-[480px] lg:h-[540px] xl:h-[620px] overflow-hidden">
                
                <!-- Slide 1: Jump 3 -->
                <div class="carousel-slide absolute inset-0 w-full h-full opacity-100 transition-opacity duration-700 ease-in-out pointer-events-auto">
                    <!-- Banner Background Image -->
                    <img 
                        src="{{ asset('Home-Banner-1.jpg') }}" 
                        alt="Jump 3 Car Jump Starter" 
                        class="absolute inset-0 w-full h-full object-cover object-center"
                    >
                    <!-- Dark Gradient Overlay for optimal readability -->
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-950/85 sm:via-slate-950/70 to-slate-950/50 sm:to-transparent"></div>

                    <!-- Inner Floating Content -->
                    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 h-full flex flex-col justify-center items-start pt-2 pb-10 sm:py-0">
                        <div class="max-w-2xl space-y-2 sm:space-y-4 md:space-y-6">

                            <h1 class="text-2xl xs:text-3xl sm:text-5xl lg:text-6xl xl:text-7xl font-black text-white tracking-tight leading-[1.15] drop-shadow-md">
                                Power Up Every Journey
                            </h1>

                            <p class="text-xs sm:text-base lg:text-lg text-slate-200 leading-relaxed font-medium drop-shadow-sm max-w-xl line-clamp-3 sm:line-clamp-none">
                                Discover reliable car jump starters and automotive power solutions designed to keep you moving. Get dependable performance and peace of mind wherever the road takes you.
                            </p>

                            <!-- BUY NOW Button -->
                            <div class="pt-2 sm:pt-3">
                                <a 
                                    href="{{ route('shop') }}" 
                                    class="inline-flex items-center gap-2 px-6 py-2.5 sm:px-8 sm:py-3.5 rounded-full bg-white text-slate-950 hover:bg-slate-200 font-black text-xs sm:text-sm tracking-wider uppercase shadow-2xl hover:scale-105 transition-all duration-200 cursor-pointer"
                                >
                                    <span>BUY NOW</span>
                                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-slate-950" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: Infinity Luxe -->
                <div class="carousel-slide absolute inset-0 w-full h-full opacity-0 pointer-events-none transition-opacity duration-700 ease-in-out">
                    <!-- Banner Background Image -->
                    <img 
                        src="{{ asset('Home-Banner-2.jpg') }}" 
                        alt="Infinity Luxe MagSafe Portable Charger" 
                        class="absolute inset-0 w-full h-full object-cover object-center"
                    >
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-950/85 sm:via-slate-950/70 to-slate-950/50 sm:to-transparent"></div>

                    <!-- Inner Floating Content -->
                    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 h-full flex flex-col justify-center items-start pt-2 pb-10 sm:py-0">
                        <div class="max-w-2xl space-y-2 sm:space-y-4 md:space-y-6">

                            <h2 class="text-2xl xs:text-3xl sm:text-5xl lg:text-6xl xl:text-7xl font-black text-white tracking-tight leading-[1.15] drop-shadow-md">
                                Capture Every Moment, Anywhere
                            </h2>

                            <p class="text-xs sm:text-base lg:text-lg text-slate-200 leading-relaxed font-medium drop-shadow-sm max-w-xl line-clamp-3 sm:line-clamp-none">
                                Discover compact pocket cameras designed to capture life's special moments with ease. Enjoy portability, convenience, and stunning memories wherever your adventures take you.
                            </p>

                            <!-- BUY NOW Button -->
                            <div class="pt-2 sm:pt-3">
                                <a 
                                    href="{{ route('shop') }}" 
                                    class="inline-flex items-center gap-2 px-6 py-2.5 sm:px-8 sm:py-3.5 rounded-full bg-white text-slate-950 hover:bg-slate-200 font-black text-xs sm:text-sm tracking-wider uppercase shadow-2xl hover:scale-105 transition-all duration-200 cursor-pointer"
                                >
                                    <span>BUY NOW</span>
                                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-slate-950" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3: Discovery Pro -->
                <div class="carousel-slide absolute inset-0 w-full h-full opacity-0 pointer-events-none transition-opacity duration-700 ease-in-out">
                    <!-- Banner Background Image -->
                    <img 
                        src="{{ asset('Home-Banner-3.jpg') }}" 
                        alt="Discovery Multi-Port High-Capacity Power Bank" 
                        class="absolute inset-0 w-full h-full object-cover object-center"
                    >
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-950/85 sm:via-slate-950/70 to-slate-950/50 sm:to-transparent"></div>

                    <!-- Inner Floating Content -->
                    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 h-full flex flex-col justify-center items-start pt-2 pb-10 sm:py-0">
                        <div class="max-w-2xl space-y-2 sm:space-y-4 md:space-y-6">

                            <h2 class="text-2xl xs:text-3xl sm:text-5xl lg:text-6xl xl:text-7xl font-black text-white tracking-tight leading-[1.15] drop-shadow-md">
                                Smart Tech Accessories
                            </h2>

                            <p class="text-xs sm:text-base lg:text-lg text-slate-200 leading-relaxed font-medium drop-shadow-sm max-w-xl line-clamp-3 sm:line-clamp-none">
                                Upgrade your everyday experience with practical, modern tech accessories that combine convenience, performance, and quality at budget-friendly prices.
                            </p>

                            <!-- BUY NOW Button -->
                            <div class="pt-2 sm:pt-3">
                                <a 
                                    href="{{ route('shop') }}" 
                                    class="inline-flex items-center gap-2 px-6 py-2.5 sm:px-8 sm:py-3.5 rounded-full bg-white text-slate-950 hover:bg-slate-200 font-black text-xs sm:text-sm tracking-wider uppercase shadow-2xl hover:scale-105 transition-all duration-200 cursor-pointer"
                                >
                                    <span>BUY NOW</span>
                                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-slate-950" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Chevrons (Hidden on mobile to avoid covering text, visible from md up) -->
                <button 
                    type="button" 
                    onclick="prevSlide(); resetCarouselTimer();" 
                    class="hidden md:flex absolute left-4 sm:left-8 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-13 sm:h-13 rounded-full bg-slate-950/60 hover:bg-slate-950 border border-white/20 text-white items-center justify-center transition-all duration-200 backdrop-blur-md cursor-pointer hover:scale-110 shadow-lg"
                    aria-label="Previous slide"
                >
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <button 
                    type="button" 
                    onclick="nextSlide(); resetCarouselTimer();" 
                    class="hidden md:flex absolute right-4 sm:right-8 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-13 sm:h-13 rounded-full bg-slate-950/60 hover:bg-slate-950 border border-white/20 text-white items-center justify-center transition-all duration-200 backdrop-blur-md cursor-pointer hover:scale-110 shadow-lg"
                    aria-label="Next slide"
                >
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Indicator Dots / Pills -->
                <div class="absolute bottom-3 sm:bottom-6 left-1/2 -translate-x-1/2 z-20 flex items-center gap-2">
                    <button 
                        type="button" 
                        onclick="goToSlide(0)" 
                        class="carousel-dot h-2 sm:h-2.5 rounded-full transition-all duration-300 w-6 sm:w-8 bg-white cursor-pointer"
                        aria-label="Go to slide 1"
                    ></button>
                    <button 
                        type="button" 
                        onclick="goToSlide(1)" 
                        class="carousel-dot h-2 sm:h-2.5 rounded-full transition-all duration-300 w-2 sm:w-2.5 bg-white/40 hover:bg-white/70 cursor-pointer"
                        aria-label="Go to slide 2"
                    ></button>
                    <button 
                        type="button" 
                        onclick="goToSlide(2)" 
                        class="carousel-dot h-2 sm:h-2.5 rounded-full transition-all duration-300 w-2 sm:w-2.5 bg-white/40 hover:bg-white/70 cursor-pointer"
                        aria-label="Go to slide 3"
                    ></button>
                </div>
            </div>

        </section>

        <!-- 2. GUARANTEES & TRUST BAR (Matched to Design Screenshot) -->
        <section class="py-10 sm:py-12 bg-white dark:bg-slate-950 border-b border-gray-200 dark:border-slate-800/80 transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                    <!-- Card 1: Free Shipping -->
                    <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl p-5 sm:p-6 shadow-xs hover:shadow-md transition-all flex items-center gap-4">
                        <svg class="w-12 h-12 text-neutral-900 dark:text-white shrink-0" viewBox="0 0 50 50" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <!-- 3 Motion speed lines -->
                            <path d="M6 18h7" />
                            <path d="M4 25h10" />
                            <path d="M7 32h7" />
                            <!-- Truck Container -->
                            <path d="M15 15h18v16H15z" />
                            <!-- Truck Cab -->
                            <path d="M33 21h8l4 5v5h-12v-10z" />
                            <!-- Window -->
                            <path d="M35 23.5h5l2.5 3H35z" />
                            <!-- Wheels -->
                            <circle cx="22" cy="33" r="3.5" />
                            <circle cx="39" cy="33" r="3.5" />
                            <path d="M25.5 31h10" />
                            <path d="M15 31h3.5" />
                        </svg>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-slate-400 font-medium">Free Shipping</p>
                            <h3 class="text-base sm:text-lg font-bold text-gray-900 dark:text-white mt-0.5 tracking-tight">Order on $79</h3>
                        </div>
                    </div>

                    <!-- Card 2: Support 24/7 -->
                    <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl p-5 sm:p-6 shadow-xs hover:shadow-md transition-all flex items-center gap-4">
                        <svg class="w-12 h-12 text-neutral-900 dark:text-white shrink-0" viewBox="0 0 50 50" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <!-- Clock Circle (with gap for phone) -->
                            <path d="M14 36 A15 15 0 1 0 10 23" />
                            <!-- Clock ticks -->
                            <line x1="26" y1="10" x2="26" y2="13" />
                            <line x1="39" y1="23" x2="36" y2="23" />
                            <line x1="26" y1="36" x2="26" y2="33" />
                            <line x1="35.5" y1="13.5" x2="33.5" y2="15.5" />
                            <!-- Phone Handset -->
                            <path d="M11 25.5 C9 27.5 9 30.5 11 32.5 C13 34.5 16 34.5 18 32.5 L19.5 31 L17 28.5 L16 29.5 C15.2 28.7 14.8 28.3 14 27.5 L15 26.5 L12.5 24 Z" />
                            <!-- Number 24 -->
                            <text x="25" y="27" font-size="12" font-weight="700" font-family="system-ui, -apple-system, sans-serif" text-anchor="middle" fill="currentColor" stroke="none">24</text>
                        </svg>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-slate-400 font-medium">Support 24/7</p>
                            <h3 class="text-base sm:text-lg font-bold text-gray-900 dark:text-white mt-0.5 tracking-tight">
                                <a href="tel:+61426762285" class="hover:text-yellow-400 transition-colors">
                                    +61 426 762 285
                                </a>
                            </h3>
                        </div>
                    </div>

                    <!-- Card 3: Quality Prime Products -->
                    <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl p-5 sm:p-6 shadow-xs hover:shadow-md transition-all flex items-center gap-4">
                        <svg class="w-12 h-12 text-neutral-900 dark:text-white shrink-0" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <!-- Sparkle rays above badge -->
                            <line x1="24" y1="4" x2="24" y2="7" />
                            <line x1="16" y1="7" x2="18.5" y2="9.5" />
                            <line x1="32" y1="7" x2="29.5" y2="9.5" />
                            <line x1="13" y1="14" x2="16" y2="14" />
                            <line x1="35" y1="14" x2="32" y2="14" />
                            <!-- Badge with checkmark -->
                            <circle cx="24" cy="14" r="5" />
                            <polyline points="22 14 23.5 15.5 26.5 12.5" />
                            <!-- Open box body -->
                            <path d="M12 24 L24 28 L36 24 L36 37 L24 41 L12 37 Z" />
                            <line x1="24" y1="28" x2="24" y2="41" />
                            <!-- Box open flaps -->
                            <path d="M12 24 L7 19 L19 16 L24 21" />
                            <path d="M36 24 L41 19 L29 16 L24 21" />
                        </svg>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-slate-400 font-medium">Quality</p>
                            <h3 class="text-base sm:text-lg font-bold text-gray-900 dark:text-white mt-0.5 tracking-tight">Prime Products</h3>
                        </div>
                    </div>

                    <!-- Card 4: Return & Refund Easy 14 Day Return -->
                    <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl p-5 sm:p-6 shadow-xs hover:shadow-md transition-all flex items-center gap-4">
                        <svg class="w-12 h-12 text-neutral-900 dark:text-white shrink-0" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <!-- Sparkle rays above badge -->
                            <line x1="24" y1="4" x2="24" y2="7" />
                            <line x1="16" y1="7" x2="18.5" y2="9.5" />
                            <line x1="32" y1="7" x2="29.5" y2="9.5" />
                            <line x1="13" y1="14" x2="16" y2="14" />
                            <line x1="35" y1="14" x2="32" y2="14" />
                            <!-- Badge with checkmark -->
                            <circle cx="24" cy="14" r="5" />
                            <polyline points="22 14 23.5 15.5 26.5 12.5" />
                            <!-- Open box body -->
                            <path d="M12 24 L24 28 L36 24 L36 37 L24 41 L12 37 Z" />
                            <line x1="24" y1="28" x2="24" y2="41" />
                            <!-- Box open flaps -->
                            <path d="M12 24 L7 19 L19 16 L24 21" />
                            <path d="M36 24 L41 19 L29 16 L24 21" />
                        </svg>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-slate-400 font-medium">Return &amp; Refund</p>
                            <h3 class="text-base sm:text-lg font-bold text-gray-900 dark:text-white mt-0.5 tracking-tight leading-snug">Easy 14 Day<br class="hidden xl:inline"> Return</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. FAST CHARGING CABLES - VIDEO SHOWCASE SECTION (Matched to Design Screenshot) -->
        <section class="relative w-full overflow-hidden bg-neutral-100 min-h-[500px] sm:min-h-[580px] lg:min-h-[660px] flex items-center">
            <!-- Background Video -->
            <div class="absolute inset-0 w-full h-full overflow-hidden">
                <video 
                    playsinline 
                    autoplay 
                    loop 
                    muted 
                    preload="metadata"
                    poster="{{ asset('videos/fast_charging_cables_poster.jpg') }}"
                    class="w-full h-full object-cover object-center"
                >
                    <source src="{{ asset('videos/Robot Multi-Function Magnetic Wireless Charger_2.mp4') }}" type="video/mp4">
                    {{-- <source src="https://www.pulsecharge.com.au/cdn/shop/videos/c/vp/95cec4bcf94e42c19705c4d0465f2fff/95cec4bcf94e42c19705c4d0465f2fff.HD-1080p-2.5Mbps-92169599.mp4?v=0" type="video/mp4"> --}}
                </video>
                <!-- Directional gradient overlay to ensure text contrast while keeping cable and phone clearly visible -->
                <div class="absolute inset-0 bg-gradient-to-r from-neutral-100/90 via-neutral-100/50 to-transparent sm:from-neutral-100/80 sm:via-neutral-100/20 sm:to-transparent dark:from-slate-950/90 dark:via-slate-950/50 dark:to-transparent pointer-events-none"></div>
            </div>

            <!-- Content Overlay (Bottom-Left / Mid-Left) -->
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-16 sm:py-20 lg:py-24 ">
                <div class="max-w-xl text-left">

                <!-- Eyebrow -->
                <p class="text-xs sm:text-sm font-semibold tracking-widest uppercase text-neutral-600 dark:text-neutral-400 mb-2 sm:mb-3">
                    NEW!
                </p>

                <!-- Main Heading -->
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-normal tracking-tight text-neutral-900 dark:text-white leading-tight mb-4 sm:mb-5">
                    SMART CHARGING. SIMPLIFIED.
                </h2>

                <!-- Description -->
                <p class="text-sm sm:text-base text-neutral-600 dark:text-neutral-300 leading-relaxed max-w-md mb-5 sm:mb-6">
                    Experience the future of wireless charging with the Robot Multi-Function Magnetic Wireless Charger. Enjoy effortless charging, versatile functionality, and a smarter way to power your everyday devices.
                </p>

                <!-- Marketing Tagline -->
                <p class="text-xs sm:text-sm font-extrabold tracking-[0.18em] uppercase text-emerald-700 dark:text-emerald-400 mb-6 sm:mb-8">
                    POWER MORE. CARRY LESS.
                </p>

                <!-- CTA Button -->
                <div>
                    <a
                        href="{{ route('shop') }}"
                        class="inline-block px-8 py-3.5 bg-green-900 hover:bg-yellow-500 text-white text-xs font-bold tracking-widest uppercase transition-all duration-200 shadow-md hover:shadow-lg active:scale-95"
                    >
                        SHOP NOW
                    </a>
                </div>

            </div>
            </div>
        </section>

        <!-- 4. TV EXCLUSIVES & FEATURED PRODUCTS (Shop Section) -->
        <section id="shop" class="py-20 bg-gray-50 dark:bg-slate-950 transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-12">
                    <div>
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 text-xs font-bold uppercase tracking-wider mb-2">
                            <span>BESTSELLERS</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white tracking-tight">Our Exclusives Products</h2>
                        <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">High-demand electronics engineered for safety, speed, and long-term endurance.</p>
                    </div>

                    <a href="{{ route('shop') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-emerald-600 px-5 py-2.5 text-sm font-bold text-white shadow-md transition-all duration-300 hover:bg-yellow-700 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                        <span>Browse All Products</span>
                        <span>&rarr;</span>
                    </a>
                </div>

                @if(isset($products) && $products->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($products as $product)
                            @include('partials.product-card', [
                                'product' => $product,
                                'type' => $product->card_type ?? 'regular',
                            ])
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16 bg-white dark:bg-slate-900/40 rounded-3xl border border-gray-200 dark:border-slate-800">
                        <p class="text-slate-600 dark:text-slate-400 text-sm">Product catalog is being updated. Explore more items soon!</p>
                    </div>
                @endif
            </div>
        </section>

        <!-- 5. ESSENTIAL CHARGERS FOR EVERYDAY (Category Showcase Cards) -->
        <section class="py-20 border-t border-gray-200 dark:border-slate-800/80 bg-gradient-to-b from-gray-50/70 via-white to-gray-50/40 dark:from-slate-950 dark:via-slate-900/40 dark:to-slate-950 transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-14">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20 text-xs font-bold uppercase tracking-widest mb-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        FEATURED FINDS
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white tracking-tight">Discover More. Experience Better.</h2>
                    <p class="text-sm sm:text-base text-slate-600 dark:text-slate-400 mt-2">From smart technology to everyday essentials, explore a handpicked selection of products designed to make work, travel, and everyday life smarter and easier.</p>
                </div>

                <!-- 3 Distinct Cards (Custom Attachment Design with White Image Box & Yellow BUY button) -->
                @php
                    $showcaseProducts = (isset($essentialProducts) && $essentialProducts->count()) 
                        ? $essentialProducts 
                        : ((isset($products) && $products->count()) ? $products->take(3) : collect());
                @endphp

                @if($showcaseProducts->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                        @foreach($showcaseProducts as $item)
                            @php
                                $displayPrice = ($item->special_offer_price !== null && (float)$item->special_offer_price > 0)
                                    ? (float)$item->special_offer_price
                                    : (float)$item->price;
                            @endphp
                            <div class="group relative flex flex-col justify-between bg-[#0B1222] dark:bg-[#070c18] border border-blue-900/50 hover:border-blue-500/60 rounded-[28px] p-4 sm:p-5 shadow-xl shadow-blue-950/30 transition-all duration-300 hover:-translate-y-1">
                                <div>
                                    <!-- Inner White Card for Product Image -->
                                    <div class="relative w-full aspect-4/3 sm:aspect-square bg-white rounded-2xl p-4 sm:p-6 flex items-center justify-center overflow-hidden">
                                        <a href="{{ route('product.show', $item->slug) }}" class="w-full h-full flex items-center justify-center">
                                            <img 
                                                src="{{ $item->display_image }}" 
                                                alt="{{ $item->name }}" 
                                                class="max-w-full max-h-full object-contain group-hover:scale-105 transition-transform duration-300"
                                            >
                                        </a>

                                        <!-- Category Pill Badge on top-right -->
                                        <span class="absolute top-3 right-3 px-3 py-1 rounded-xl bg-slate-900/90 text-white text-[11px] font-bold tracking-wide shadow-sm backdrop-blur-xs pointer-events-none">
                                            {{ $item->category->name ?? 'Technology' }}
                                        </span>
                                    </div>

                                    <!-- Rating & Stock Status -->
                                    <div class="mt-4 flex items-center justify-between text-xs">
                                        <div class="flex items-center gap-1.5">
                                            <div class="flex items-center text-amber-400">
                                                @for($s = 0; $s < 5; $s++)
                                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                @endfor
                                            </div>
                                            <span class="text-amber-400 font-bold text-xs">4.9</span>
                                        </div>

                                        <div class="flex items-center gap-1.5 text-emerald-400 font-bold text-xs">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                            <span>In Stock</span>
                                        </div>
                                    </div>

                                    <!-- Title -->
                                    <h3 class="mt-2.5 font-black text-white text-lg sm:text-xl line-clamp-1 group-hover:text-amber-300 transition-colors">
                                        <a href="{{ route('product.show', $item->slug) }}">
                                            {{ $item->name }}
                                        </a>
                                    </h3>

                                    <!-- Description -->
                                    <p class="text-xs sm:text-sm text-slate-400 line-clamp-2 mt-1 leading-relaxed">
                                        {{ Str::limit(strip_tags($item->description), 85) }}
                                    </p>
                                </div>

                                <!-- Bottom Row: PRICE and Yellow BUY Button -->
                                <div class="mt-5 pt-3.5 border-t border-slate-800/80 flex items-center justify-between gap-3">
                                    <div>
                                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block leading-none mb-1">PRICE</span>
                                        <div class="text-xl sm:text-2xl font-black text-white tracking-tight font-mono">
                                            ${{ number_format($displayPrice, 2) }}
                                        </div>
                                    </div>

                                    <form action="{{ route('cart.add') }}" method="POST" class="shrink-0">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button 
                                            type="submit" 
                                            class="px-5 py-2.5 rounded-xl bg-[#FFE566] hover:bg-[#fed634] active:scale-95 text-slate-950 font-black text-xs sm:text-sm tracking-wider uppercase transition-all duration-200 flex items-center gap-2 shadow-md hover:shadow-yellow-500/20 cursor-pointer"
                                        >
                                            <svg class="w-4 h-4 text-slate-950 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                            <span>BUY</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        <!-- 6. FEATURE SPOTLIGHT 2: SMART ECOSYSTEM (Hubble Pro Style - High-Tech Radar Dashboard - No Images) -->

        <section class="relative w-full overflow-hidden bg-neutral-100 min-h-[500px] sm:min-h-[580px] lg:min-h-[660px] flex items-center">
            <!-- Background Video -->
            <div class="absolute inset-0 w-full h-full overflow-hidden">
                <video 
                    playsinline 
                    autoplay 
                    loop 
                    muted 
                    preload="metadata"
                    poster="{{ asset('videos/fast_charging_cables_poster.jpg') }}"
                    class="w-full h-full object-cover object-center"
                >
                    <source src="{{ asset('videos/Digital Display Data Cable_VXPS_1.mp4') }}" type="video/mp4">
                    {{-- <source src="https://www.pulsecharge.com.au/cdn/shop/videos/c/vp/95cec4bcf94e42c19705c4d0465f2fff/95cec4bcf94e42c19705c4d0465f2fff.HD-1080p-2.5Mbps-92169599.mp4?v=0" type="video/mp4"> --}}
                </video>
                <!-- Directional gradient overlay to ensure text contrast while keeping cable and phone clearly visible -->
                <div class="absolute inset-0 bg-gradient-to-r from-neutral-100/90 via-neutral-100/50 to-transparent sm:from-neutral-100/80 sm:via-neutral-100/20 sm:to-transparent dark:from-slate-950/90 dark:via-slate-950/50 dark:to-transparent pointer-events-none"></div>
            </div>

            <!-- Content Overlay (Bottom-Left / Mid-Left) -->
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-16 sm:py-20 lg:py-24 ">
                <div class="max-w-xl text-left">
                    <p class="text-xs sm:text-sm font-semibold tracking-widest uppercase text-neutral-600 dark:text-neutral-400 mb-2 sm:mb-3">
                        NEW!
                    </p>
                    <h2 class="text-2xl uppercase sm:text-3xl md:text-4xl lg:text-5xl font-normal tracking-tight text-neutral-900 dark:text-white uppercase leading-tight mb-4 sm:mb-5">
                        Fast Charging. Reliable Connection.
                    </h2>
                    <p class="text-sm sm:text-base text-neutral-600 dark:text-neutral-300 leading-relaxed max-w-md mb-6 sm:mb-8">
                        Power your devices with high-quality charging cables designed for fast, reliable performance and everyday durability. Enjoy seamless connectivity and dependable charging wherever life takes you.
                    </p>
                    <div>
                        <a 
                            href="{{ route('shop') }}" 
                            class="inline-block px-8 py-3.5 bg-green-900 hover:bg-yellow-500 text-white text-xs font-bold tracking-widest uppercase transition-all duration-200 shadow-md hover:shadow-lg active:scale-95"
                        >
                            SHOP NOW
                        </a>
                    </div>
                </div>
            </div>
        </section>










        {{-- <section class="py-20 border-t border-gray-200 dark:border-slate-800/80 bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-white relative overflow-hidden transition-colors">
            <!-- Ambient High-Tech Glows -->
            <div class="absolute -top-32 left-1/4 w-96 h-96 bg-emerald-500/10 dark:bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-32 right-1/4 w-96 h-96 bg-teal-500/10 dark:bg-teal-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                    <!-- Left Copy & Tech Pillars -->
                    <div class="lg:col-span-7 space-y-6">
                        <!-- Pill Badge -->
                        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-600 dark:text-emerald-400 text-xs font-bold uppercase tracking-wider">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 dark:bg-emerald-400 animate-ping"></span>
                            <span>SMART TRACKING ECOSYSTEM</span>
                        </div>

                        <!-- Headline -->
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 dark:text-white tracking-tight leading-tight">
                            Never Lose Your Essentials Again.
                        </h2>

                        <!-- Subhead -->
                        <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed max-w-2xl font-normal">
                            Credit-card sized precision smart trackers engineered with certified global Apple Find My™ &amp; Android crowd networks. Keep real-time track of your wallet, luggage, passport, keys, and backpack with pinpoint precision and zero subscription fees.
                        </p>

                        <!-- 4 Tech Spec Cards -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 pt-2">
                            <div class="p-3.5 rounded-2xl bg-white dark:bg-slate-900/90 border border-gray-200 dark:border-slate-800 shadow-xs flex items-start gap-3">
                                <div class="w-8 h-8 rounded-xl bg-emerald-500/10 dark:bg-emerald-500/15 border border-emerald-500/20 dark:border-emerald-500/30 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0 text-sm font-bold font-mono">
                                    1.8
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900 dark:text-white">Ultra-Thin 1.8mm Profile</h4>
                                    <p class="text-[11px] text-slate-600 dark:text-slate-400 mt-0.5 leading-snug">Slides invisibly into any standard credit card slot or money clip.</p>
                                </div>
                            </div>

                            <div class="p-3.5 rounded-2xl bg-white dark:bg-slate-900/90 border border-gray-200 dark:border-slate-800 shadow-xs flex items-start gap-3">
                                <div class="w-8 h-8 rounded-xl bg-emerald-500/10 dark:bg-emerald-500/15 border border-emerald-500/20 dark:border-emerald-500/30 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900 dark:text-white">Worldwide Find My™</h4>
                                    <p class="text-[11px] text-slate-600 dark:text-slate-400 mt-0.5 leading-snug">Encrypted location updates through billions of global Apple &amp; Android devices.</p>
                                </div>
                            </div>

                            <div class="p-3.5 rounded-2xl bg-white dark:bg-slate-900/90 border border-gray-200 dark:border-slate-800 shadow-xs flex items-start gap-3">
                                <div class="w-8 h-8 rounded-xl bg-emerald-500/10 dark:bg-emerald-500/15 border border-emerald-500/20 dark:border-emerald-500/30 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900 dark:text-white">5-Month Wireless Qi Battery</h4>
                                    <p class="text-[11px] text-slate-600 dark:text-slate-400 mt-0.5 leading-snug">Recharge effortlessly on any wireless charging pad. Zero disposable waste.</p>
                                </div>
                            </div>

                            <div class="p-3.5 rounded-2xl bg-white dark:bg-slate-900/90 border border-gray-200 dark:border-slate-800 shadow-xs flex items-start gap-3">
                                <div class="w-8 h-8 rounded-xl bg-emerald-500/10 dark:bg-emerald-500/15 border border-emerald-500/20 dark:border-emerald-500/30 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900 dark:text-white">95dB Audio Chime &amp; Alert</h4>
                                    <p class="text-[11px] text-slate-600 dark:text-slate-400 mt-0.5 leading-snug">Loud buzzer sound alert and instant left-behind notifications on your phone.</p>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Row -->
                        <div class="pt-4 flex flex-col sm:flex-row sm:items-center gap-4">
                            <a 
                                href="{{ route('shop') }}" 
                                class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-full bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-xs uppercase tracking-wider transition-all duration-200 shadow-lg shadow-emerald-500/25 hover:shadow-emerald-500/40 active:scale-95"
                            >
                                <span>Explore Hubble Pro Tracker</span>
                                <span>&rarr;</span>
                            </a>

                            <div class="flex items-center gap-3 text-xs text-slate-500 dark:text-slate-400">
                                <span class="flex items-center gap-1.5"><span class="text-emerald-600 dark:text-emerald-400 font-bold">✓</span> No Monthly Fees</span>
                                <span>&bull;</span>
                                <span class="flex items-center gap-1.5"><span class="text-emerald-600 dark:text-emerald-400 font-bold">✓</span> IP67 Waterproof</span>
                                <span>&bull;</span>
                                <span class="flex items-center gap-1.5"><span class="text-emerald-600 dark:text-emerald-400 font-bold">✓</span> 2-Year Warranty</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Interactive Find My Radar Console (Pure CSS / SVG - No Image) -->
                    <div class="lg:col-span-5">
                        <div class="relative rounded-3xl bg-gradient-to-b from-white via-slate-50 to-slate-100 dark:from-slate-900 dark:via-slate-900/90 dark:to-slate-950 border border-gray-200 dark:border-slate-800 p-6 sm:p-8 shadow-xl dark:shadow-2xl group overflow-hidden">
                            <!-- Background Subtle Radar Pulse Rings -->
                            <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-emerald-500/10 blur-2xl pointer-events-none"></div>

                            <!-- Top Status Console -->
                            <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-slate-800">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 dark:bg-emerald-400 animate-pulse"></span>
                                    <span class="text-xs font-mono font-bold text-slate-900 dark:text-white uppercase tracking-wider">Online &bull; Connected</span>
                                </div>
                                <span class="text-[10px] font-mono uppercase text-emerald-600 dark:text-emerald-400 px-2 py-0.5 rounded-full bg-emerald-500/10 border border-emerald-500/20">
                                    Signal: Strong (-42 dBm)
                                </span>
                            </div>

                            <!-- Stylized CSS / SVG Card Mockup (No Image) -->
                            <div class="my-6">
                                <div class="relative w-full aspect-[1.586/1] rounded-2xl bg-gradient-to-tr from-slate-950 via-slate-900 to-slate-800 border border-emerald-500/30 p-5 shadow-2xl flex flex-col justify-between overflow-hidden group-hover:border-emerald-500/50 transition-colors">
                                    <!-- Subtle ambient card circuit shine -->
                                    <div class="absolute inset-0 bg-gradient-to-tr from-emerald-500/5 via-transparent to-teal-500/10 pointer-events-none"></div>

                                    <!-- Card Header: Brand & Gold Chip -->
                                    <div class="relative z-10 flex items-start justify-between">
                                        <div>
                                            <div class="flex items-center gap-2">
                                                <span class="font-mono font-black tracking-widest text-base text-white">VXPS</span>
                                                <span class="text-[10px] font-mono uppercase px-1.5 py-0.5 rounded-sm bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-500/40">TAG PRO</span>
                                            </div>
                                            <span class="text-[10px] font-mono text-slate-400 tracking-wider">HUBBLE SMART EDITION</span>
                                        </div>

                                        <!-- Realistic Gold Contact Chip -->
                                        <div class="w-9 h-7 rounded-md bg-gradient-to-br from-amber-200 via-amber-400 to-amber-600 border border-amber-300/60 p-1 flex items-center justify-center shadow-xs">
                                            <div class="w-full h-full border border-amber-800/40 rounded-xs grid grid-cols-2 grid-rows-2 gap-0.5">
                                                <div class="border-r border-b border-amber-800/30"></div>
                                                <div class="border-b border-amber-800/30"></div>
                                                <div class="border-r border-amber-800/30"></div>
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card Center: Radar Wave Sensor Graphic -->
                                    <div class="relative z-10 my-auto py-2 flex items-center justify-between">
                                        <div class="space-y-0.5">
                                            <span class="text-[11px] font-bold text-white flex items-center gap-1.5">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                                Apple Find My™ &bull; Android
                                            </span>
                                            <p class="text-[10px] font-mono text-slate-400">Encrypted Worldwide Mesh</p>
                                        </div>

                                        <!-- Concentric Wave Rings SVG -->
                                        <div class="w-10 h-10 rounded-full bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400">
                                            <svg class="w-5 h-5 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.393 9.393c5.857-5.857 15.355-5.857 21.213 0" />
                                            </svg>
                                        </div>
                                    </div>

                                    <!-- Card Bottom Specs -->
                                    <div class="relative z-10 flex items-center justify-between text-[10px] font-mono text-slate-400 border-t border-slate-800 pt-2.5">
                                        <span>1.8mm ULTRA-THIN</span>
                                        <span class="text-emerald-400 font-bold">QI RECHARGEABLE</span>
                                        <span>IP67 WATERPROOF</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Live Sound Chime & Location Simulation Box -->
                            <div class="p-3.5 rounded-2xl bg-slate-100 dark:bg-slate-800/50 border border-gray-200 dark:border-slate-700/60 flex items-center justify-between gap-3 text-xs">
                                <div class="flex items-center gap-2 text-slate-700 dark:text-slate-300">
                                    <span class="text-emerald-600 dark:text-emerald-400 text-base">🔊</span>
                                    <span class="font-medium">Built-in 95dB Chime Buzzer</span>
                                </div>
                                <span class="px-2.5 py-1 rounded-lg bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20 font-mono font-bold text-[10px]">
                                    One-Tap Ping Ready
                                </span>
                            </div>

                            <!-- Floating Spec Bar Bottom -->
                            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-slate-800/80 grid grid-cols-3 gap-2 text-center">
                                <div class="p-2.5 rounded-xl bg-white dark:bg-slate-800/40 border border-gray-200 dark:border-slate-700/40 shadow-xs">
                                    <span class="text-sm sm:text-base font-black text-slate-900 dark:text-white font-mono block">1.8 mm</span>
                                    <span class="text-[10px] text-slate-500 dark:text-slate-400 uppercase tracking-wider block mt-0.5">Card-Thin</span>
                                </div>
                                <div class="p-2.5 rounded-xl bg-white dark:bg-slate-800/40 border border-gray-200 dark:border-slate-700/40 shadow-xs">
                                    <span class="text-sm sm:text-base font-black text-emerald-600 dark:text-emerald-400 font-mono block">5 Mo.</span>
                                    <span class="text-[10px] text-slate-500 dark:text-slate-400 uppercase tracking-wider block mt-0.5">Battery</span>
                                </div>
                                <div class="p-2.5 rounded-xl bg-white dark:bg-slate-800/40 border border-gray-200 dark:border-slate-700/40 shadow-xs">
                                    <span class="text-sm sm:text-base font-black text-teal-600 dark:text-teal-300 font-mono block">$0</span>
                                    <span class="text-[10px] text-slate-500 dark:text-slate-400 uppercase tracking-wider block mt-0.5">Subscription</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- 7. ABOUT US, PHILOSOPHY & CLIENT REVIEWS (Matched to Design Screenshots) -->
        <section id="about" class="py-20 bg-white dark:bg-slate-950 border-t border-gray-200 dark:border-slate-800/80 transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-24">
                
                <!-- Part 1: About Us Block -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
                    <div class="lg:col-span-7 space-y-5 text-left">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                            About Us
                        </h2>
                        <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                            We aim to help Australian families with the best electronics products for everyday use. From premium quality chargers for electronic devices to decorative lights, we blend aesthetics with functionality. We provide the highest-quality, long durable electronic gadgets with a wide range of models and colour options for each product.
                        </p>
                        <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                            We understand the modern necessity of your kids with several electronic products designed just for them. Make your kids smarter with our best educational toys or puzzle games, and accelerate their learning progress with added fun. Nurture their creativity and boost enthusiasm with a kids' camera. Choose the best products and make life easier, smarter, and more convenient than ever.
                        </p>
                    </div>

                    <div class="lg:col-span-5 flex justify-center">
                        <div class="relative group">
                            <img 
                                src="{{ asset('images/about-us--img.jpg') }}" 
                                alt="VXPS Electronic Puzzle Game" 
                                class="w-full max-w-sm sm:max-w-md object-contain rounded-2xl drop-shadow-xl transition-transform duration-300 group-hover:scale-105"
                            >
                        </div>
                    </div>
                </div>

                <!-- Part 2: Our Philosophy Block -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
                    <div class="lg:col-span-5 flex justify-center order-2 lg:order-1">
                        <div class="relative group">
                            <img 
                                src="{{ asset('images/Philosophy-Image.jpg') }}" 
                                alt="VXPS Ambient Night Lamp Philosophy" 
                                class="w-full max-w-sm sm:max-w-md object-contain rounded-3xl drop-shadow-xl transition-transform duration-300 group-hover:scale-105"
                            >
                        </div>
                    </div>

                    <div class="lg:col-span-7 space-y-5 text-left order-1 lg:order-2">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                            Our Philosophy
                        </h2>
                        <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                            Our objective is to empower people with high-quality electronic gadgets and appealing products for everyday use. We combine innovative design with aesthetic appearances for each product. Our professionals take pride in helping children learn with fun through our high-quality educational toys and games. It's our expertise to deliver premium products that can boost your mood. Making your life easier with extra fun is our motto. We foster a community that focuses more on innovation and consumer satisfaction. We aim to enhance the daily living experience of people with high-quality electronic products. Found a new &ldquo;you&rdquo; with the best conveniences, fostering creativity and innovation.
                        </p>
                    </div>
                </div>

                <!-- Part 3: Let Our Clients Certify Us (Interactive Testimonials Carousel) -->
                <div class="pt-8">
                    <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-serif sm:font-bold text-slate-900 dark:text-white tracking-tight">
                            Let Our Clients Certify Us
                        </h2>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-3 font-normal">
                            Trusted by thousands of families and tech enthusiasts across Australia.
                        </p>
                    </div>

                    <!-- Testimonials Carousel Container -->
                    <div class="testimonials-carousel-wrapper max-w-7xl mx-auto px-2 sm:px-6">
                        <div class="relative">
                            <!-- Navigation Chevrons -->
                            <button 
                                type="button" 
                                onclick="scrollTestimonials(-1)" 
                                class="absolute -left-2 sm:-left-3 lg:-left-6 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 shadow-lg hover:shadow-xl hover:border-emerald-500 hover:text-emerald-600 dark:hover:text-emerald-400 hover:scale-105 active:scale-95 text-slate-700 dark:text-white flex items-center justify-center transition-all cursor-pointer focus:outline-none"
                                aria-label="Previous Testimonials"
                            >
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>

                            <button 
                                type="button" 
                                onclick="scrollTestimonials(1)" 
                                class="absolute -right-2 sm:-right-3 lg:-right-6 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 shadow-lg hover:shadow-xl hover:border-emerald-500 hover:text-emerald-600 dark:hover:text-emerald-400 hover:scale-105 active:scale-95 text-slate-700 dark:text-white flex items-center justify-center transition-all cursor-pointer focus:outline-none"
                                aria-label="Next Testimonials"
                            >
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>

                            <!-- Testimonials Track -->
                            <div 
                                id="testimonialsTrack" 
                                class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory py-4 px-1 [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden cursor-grab active:cursor-grabbing"
                            >
                            <!-- Testimonial 1: Emily -->
                            <div class="testimonial-card w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] shrink-0 snap-start bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-2xl p-6 sm:p-7 shadow-xs hover:shadow-md transition-all flex flex-col justify-between select-none">
                                <div>
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h3 class="text-base sm:text-lg font-bold text-emerald-600 dark:text-emerald-400">Emily</h3>
                                            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Our Customer</p>
                                        </div>
                                        <span class="text-4xl font-serif text-slate-300 dark:text-slate-600 leading-none select-none">&rdquo;</span>
                                    </div>
                                    
                                    <div class="flex items-center gap-1 text-amber-400 text-sm mt-3">
                                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                    </div>

                                    <div class="border-t border-gray-100 dark:border-slate-800 my-4"></div>

                                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                                        I bought these toys for my child, and guess what, he loves them the most. Now he is busy with these toys, and I am satisfied that he is learning while playing. Highly recommend for both home and classroom learning.
                                    </p>
                                </div>
                            </div>

                            <!-- Testimonial 2: Ronnel Watson -->
                            <div class="testimonial-card w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] shrink-0 snap-start bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-2xl p-6 sm:p-7 shadow-xs hover:shadow-md transition-all flex flex-col justify-between select-none">
                                <div>
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h3 class="text-base sm:text-lg font-bold text-emerald-600 dark:text-emerald-400">Ronnel Watson</h3>
                                            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Our Customer</p>
                                        </div>
                                        <span class="text-4xl font-serif text-slate-300 dark:text-slate-600 leading-none select-none">&rdquo;</span>
                                    </div>
                                    
                                    <div class="flex items-center gap-1 text-amber-400 text-sm mt-3">
                                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                    </div>

                                    <div class="border-t border-gray-100 dark:border-slate-800 my-4"></div>

                                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                                        I just received this lovely power bank yesterday. It's fast charging with long battery life. You can put multiple devices at the same time. The best power bank for long travelling and a value-for-money purchase.
                                    </p>
                                </div>
                            </div>

                            <!-- Testimonial 3: Janet McCanville -->
                            <div class="testimonial-card w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] shrink-0 snap-start bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-2xl p-6 sm:p-7 shadow-xs hover:shadow-md transition-all flex flex-col justify-between select-none">
                                <div>
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h3 class="text-base sm:text-lg font-bold text-emerald-600 dark:text-emerald-400">Janet McCanville</h3>
                                            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Our Customer</p>
                                        </div>
                                        <span class="text-4xl font-serif text-slate-300 dark:text-slate-600 leading-none select-none">&rdquo;</span>
                                    </div>
                                    
                                    <div class="flex items-center gap-1 text-amber-400 text-sm mt-3">
                                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                    </div>

                                    <div class="border-t border-gray-100 dark:border-slate-800 my-4"></div>

                                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                                        It is a stunning night lamp that I have ever bought. It's perfect for bedroom nights, bright yet gentle to the eyes. Now I can add a special magical charm to any space. Best for gift purposes and personal use.
                                    </p>
                                </div>
                            </div>

                            <!-- Testimonial 4: David Harrison -->
                            <div class="testimonial-card w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] shrink-0 snap-start bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-2xl p-6 sm:p-7 shadow-xs hover:shadow-md transition-all flex flex-col justify-between select-none">
                                <div>
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h3 class="text-base sm:text-lg font-bold text-emerald-600 dark:text-emerald-400">David Harrison</h3>
                                            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Our Customer</p>
                                        </div>
                                        <span class="text-4xl font-serif text-slate-300 dark:text-slate-600 leading-none select-none">&rdquo;</span>
                                    </div>
                                    
                                    <div class="flex items-center gap-1 text-amber-400 text-sm mt-3">
                                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                    </div>

                                    <div class="border-t border-gray-100 dark:border-slate-800 my-4"></div>

                                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                                        The fast charging braided cable is an absolute game changer. It powers my phone and tablet in record time without getting warm. Build quality is exceptional and far superior to standard cords.
                                    </p>
                                </div>
                            </div>

                            <!-- Testimonial 5: Sarah Jenkins -->
                            <div class="testimonial-card w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] shrink-0 snap-start bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-2xl p-6 sm:p-7 shadow-xs hover:shadow-md transition-all flex flex-col justify-between select-none">
                                <div>
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h3 class="text-base sm:text-lg font-bold text-emerald-600 dark:text-emerald-400">Sarah Jenkins</h3>
                                            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Our Customer</p>
                                        </div>
                                        <span class="text-4xl font-serif text-slate-300 dark:text-slate-600 leading-none select-none">&rdquo;</span>
                                    </div>
                                    
                                    <div class="flex items-center gap-1 text-amber-400 text-sm mt-3">
                                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                    </div>

                                    <div class="border-t border-gray-100 dark:border-slate-800 my-4"></div>

                                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                                        Super quick delivery across NSW and the packaging was immaculate. The kids' camera and puzzle game keep my grandchildren engaged for hours without screen fatigue. Wonderful customer care!
                                    </p>
                                </div>
                            </div>

                            <!-- Testimonial 6: Liam O'Connor -->
                            <div class="testimonial-card w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] shrink-0 snap-start bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-2xl p-6 sm:p-7 shadow-xs hover:shadow-md transition-all flex flex-col justify-between select-none">
                                <div>
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h3 class="text-base sm:text-lg font-bold text-emerald-600 dark:text-emerald-400">Liam O&apos;Connor</h3>
                                            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Our Customer</p>
                                        </div>
                                        <span class="text-4xl font-serif text-slate-300 dark:text-slate-600 leading-none select-none">&rdquo;</span>
                                    </div>
                                    
                                    <div class="flex items-center gap-1 text-amber-400 text-sm mt-3">
                                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                    </div>

                                    <div class="border-t border-gray-100 dark:border-slate-800 my-4"></div>

                                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                                        Had a query about model compatibility and the 24/7 support replied within minutes. The Jump 3 portable power station started our SUV on the first crank during camping. Truly top-tier gear.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Carousel Pagination Dots -->
                    <div id="testimonialsDots" class="flex justify-center items-center gap-2 mt-8">
                            <button type="button" onclick="goToTestimonial(0)" class="t-dot h-2.5 rounded-full transition-all duration-300 w-8 bg-emerald-500 cursor-pointer" aria-label="Go to review 1"></button>
                            <button type="button" onclick="goToTestimonial(1)" class="t-dot h-2.5 rounded-full transition-all duration-300 w-2.5 bg-gray-300 dark:bg-slate-700 hover:bg-gray-400 cursor-pointer" aria-label="Go to review 2"></button>
                            <button type="button" onclick="goToTestimonial(2)" class="t-dot h-2.5 rounded-full transition-all duration-300 w-2.5 bg-gray-300 dark:bg-slate-700 hover:bg-gray-400 cursor-pointer" aria-label="Go to review 3"></button>
                            <button type="button" onclick="goToTestimonial(3)" class="t-dot h-2.5 rounded-full transition-all duration-300 w-2.5 bg-gray-300 dark:bg-slate-700 hover:bg-gray-400 cursor-pointer" aria-label="Go to review 4"></button>
                            <button type="button" onclick="goToTestimonial(4)" class="t-dot h-2.5 rounded-full transition-all duration-300 w-2.5 bg-gray-300 dark:bg-slate-700 hover:bg-gray-400 cursor-pointer" aria-label="Go to review 5"></button>
                            <button type="button" onclick="goToTestimonial(5)" class="t-dot h-2.5 rounded-full transition-all duration-300 w-2.5 bg-gray-300 dark:bg-slate-700 hover:bg-gray-400 cursor-pointer" aria-label="Go to review 6"></button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- 8. VIP EXCLUSIVE NEWSLETTER (PulseCharge Style) -->
        {{-- <section class="py-16 border-t border-slate-800/80 bg-slate-950">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <span class="text-xs font-bold uppercase tracking-widest text-indigo-400">JOIN THE VIP COMMUNITY</span>
                <h2 class="text-3xl sm:text-4xl font-black text-white tracking-tight mt-1">Sign Up For Exclusives</h2>
                <p class="text-sm text-slate-400 mt-2 max-w-xl mx-auto">
                    Receive exclusive promo discounts, early bird VIP access to brand-new product releases, and limited flash sales.
                </p>

                <form onsubmit="event.preventDefault(); alert('Welcome to the VIP Club! Check your inbox for your 10% welcome discount.');" class="mt-8 flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                    <input 
                        type="email" 
                        required 
                        placeholder="Enter your email address" 
                        class="flex-1 rounded-full border border-slate-800 bg-slate-900 px-5 py-3.5 text-sm text-white placeholder:text-slate-500 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20"
                    >
                    <button 
                        type="submit" 
                        class="px-8 py-3.5 rounded-full bg-white hover:bg-slate-200 text-slate-950 font-black text-xs uppercase tracking-wider transition-all duration-200 cursor-pointer shrink-0"
                    >
                        SUBSCRIBE
                    </button>
                </form>
            </div>
        </section> --}}

        <!-- 9. CONTACT SECTION -->
        <section id="contact" class="py-20 border-t border-gray-200 dark:border-slate-800/80 bg-white dark:bg-slate-900/30 transition-colors">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <span class="text-xs font-bold uppercase tracking-widest text-emerald-600 dark:text-emerald-400">GET IN TOUCH</span>
                <h2 class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white tracking-tight mt-1">Contact Our Customer Team</h2>
                <p class="text-sm text-slate-600 dark:text-slate-400 mt-2 max-w-xl mx-auto">
                    Have questions regarding delivery, product specifications, or wholesale orders? We are here to help.
                </p>

                <div class="mt-10 p-6 sm:p-8 bg-gray-50 dark:bg-slate-900/90 border border-gray-200 dark:border-slate-800/80 rounded-3xl text-left shadow-xl">
                    @if (session('success'))
                        <div class="mb-6 p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-600 dark:text-emerald-400 flex items-start gap-3">
                            <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            <div class="text-sm font-semibold">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Full Name <span class="text-rose-500">*</span></label>
                                <input type="text" name="name" required placeholder="John Doe" class="w-full rounded-xl border border-gray-300 dark:border-slate-800 bg-white dark:bg-slate-950 px-4 py-2.5 text-sm text-slate-900 dark:text-white placeholder:text-slate-400 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Email Address <span class="text-rose-500">*</span></label>
                                <input type="email" name="email" required placeholder="john@example.com" class="w-full rounded-xl border border-gray-300 dark:border-slate-800 bg-white dark:bg-slate-950 px-4 py-2.5 text-sm text-slate-900 dark:text-white placeholder:text-slate-400 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Subject</label>
                            <input type="text" name="subject" required placeholder="Order Inquiry / Product Question" class="w-full rounded-xl border border-gray-300 dark:border-slate-800 bg-white dark:bg-slate-950 px-4 py-2.5 text-sm text-slate-900 dark:text-white placeholder:text-slate-400 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Message <span class="text-rose-500">*</span></label>
                            <textarea name="message" rows="4" required placeholder="How can our support team assist you?" class="w-full rounded-xl border border-gray-300 dark:border-slate-800 bg-white dark:bg-slate-950 px-4 py-2.5 text-sm text-slate-900 dark:text-white placeholder:text-slate-400 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 resize-none"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm shadow-md shadow-emerald-600/30 transition-all cursor-pointer">
                            Send Inquiry
                        </button>
                    </form>
                </div>
            </div>
        </section>
@endsection

@push('scripts')
<script>
    // Hero Banner Carousel Logic
    let currentSlideIndex = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    let carouselInterval = null;

    function showSlide(index) {
        if (!slides || slides.length === 0) return;

        currentSlideIndex = (index + slides.length) % slides.length;

        slides.forEach((slide, i) => {
            if (i === currentSlideIndex) {
                slide.classList.remove('opacity-0', 'pointer-events-none');
                slide.classList.add('opacity-100', 'pointer-events-auto');
            } else {
                slide.classList.remove('opacity-100', 'pointer-events-auto');
                slide.classList.add('opacity-0', 'pointer-events-none');
            }
        });

        dots.forEach((dot, i) => {
            if (i === currentSlideIndex) {
                dot.classList.remove('w-2.5', 'bg-white/40');
                dot.classList.add('w-8', 'bg-white');
            } else {
                dot.classList.remove('w-8', 'bg-white');
                dot.classList.add('w-2.5', 'bg-white/40');
            }
        });
    }

    function nextSlide() {
        showSlide(currentSlideIndex + 1);
    }

    function prevSlide() {
        showSlide(currentSlideIndex - 1);
    }

    function goToSlide(index) {
        showSlide(index);
        resetCarouselTimer();
    }

    function startCarouselTimer() {
        if (carouselInterval) clearInterval(carouselInterval);
        carouselInterval = setInterval(nextSlide, 3000);
    }

    function resetCarouselTimer() {
        clearInterval(carouselInterval);
        startCarouselTimer();
    }

    document.addEventListener('DOMContentLoaded', () => {
        const carouselEl = document.getElementById('hero-carousel');
        if (carouselEl) {
            carouselEl.addEventListener('mouseenter', () => clearInterval(carouselInterval));
            carouselEl.addEventListener('mouseleave', () => startCarouselTimer());

            // Touch swipe gesture support for mobile phones
            let touchStartX = 0;
            let touchEndX = 0;

            carouselEl.addEventListener('touchstart', (e) => {
                clearInterval(carouselInterval);
                if (e.touches && e.touches.length > 0) {
                    touchStartX = e.touches[0].clientX;
                }
            }, { passive: true });

            carouselEl.addEventListener('touchend', (e) => {
                if (e.changedTouches && e.changedTouches.length > 0) {
                    touchEndX = e.changedTouches[0].clientX;
                    const diffX = touchStartX - touchEndX;
                    if (Math.abs(diffX) > 40) {
                        if (diffX > 0) {
                            nextSlide();
                        } else {
                            prevSlide();
                        }
                    }
                }
                startCarouselTimer();
            }, { passive: true });

            startCarouselTimer();
        }
    });
</script>
@endpush
