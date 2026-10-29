@extends('layouts.app')

@section('title', 'About Us | VXPS - Everyday Electronics & Smart Tech')

@section('meta')
    <meta name="description" content="Learn about VXPS Australia, our philosophy, and our commitment to providing top-quality electronic gadgets, chargers, decorative lights, and educational toys.">
@endsection

@section('content')
<!-- 1. ABOUT HERO HEADER -->
        <section class="relative py-20 lg:py-24 overflow-hidden bg-gradient-to-b from-gray-100 via-white to-white dark:from-slate-900 dark:via-slate-950 dark:to-slate-950 border-b border-gray-200 dark:border-slate-800/80 transition-colors">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(99,102,241,0.15),transparent_50%)] pointer-events-none"></div>
            
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <!-- Breadcrumbs -->
                <nav class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800 text-xs text-slate-600 dark:text-slate-400 mb-6 shadow-xs">
                    <a href="{{ route('home') }}" class="hover:text-indigo-600 dark:hover:text-white transition-colors">Home</a>
                    <span>/</span>
                    <span class="text-indigo-600 dark:text-indigo-400 font-semibold">About Us</span>
                </nav>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 dark:text-white tracking-tight uppercase max-w-4xl mx-auto leading-tight">
                    Innovating Everyday Tech for Australian Families
                </h1>
                
                <p class="text-base sm:text-lg text-slate-600 dark:text-slate-300 max-w-2xl mx-auto mt-6 leading-relaxed font-normal">
                    From cutting-edge fast chargers to captivating ambient lights and educational puzzle toys, we deliver aesthetic excellence, safety, and long-term durability.
                </p>

                <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                    <a href="{{ route('shop') }}" class="px-8 py-3.5 rounded-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs uppercase tracking-wider transition-all duration-200 shadow-lg shadow-indigo-600/30">
                        Explore Our Products
                    </a>
                    <a href="{{ route('contact') }}" class="px-8 py-3.5 rounded-full bg-gray-100 hover:bg-gray-200 text-slate-800 border border-gray-300 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-slate-200 dark:border-slate-700 font-bold text-xs uppercase tracking-wider transition-all duration-200">
                        Contact Support
                    </a>
                </div>
            </div>
        </section>

        <!-- 2. ABOUT US & PHILOSOPHY SECTIONS -->
        <section class="py-20 bg-white dark:bg-slate-950 transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-24">
                
                <!-- Part 1: About Us Block -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
                    <div class="lg:col-span-7 space-y-5 text-left">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-600 dark:text-indigo-400 text-xs font-bold uppercase tracking-wider">
                            <span>WHO WE ARE</span>
                        </div>
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
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-600 dark:text-indigo-400 text-xs font-bold uppercase tracking-wider">
                            <span>OUR GUIDING PRINCIPLE</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                            Our Philosophy
                        </h2>
                        <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                            Our objective is to empower people with high-quality electronic gadgets and appealing products for everyday use. We combine innovative design with aesthetic appearances for each product. Our professionals take pride in helping children learn with fun through our high-quality educational toys and games. It's our expertise to deliver premium products that can boost your mood. Making your life easier with extra fun is our motto. We foster a community that focuses more on innovation and consumer satisfaction. We aim to enhance the daily living experience of people with high-quality electronic products. Found a new &ldquo;you&rdquo; with the best conveniences, fostering creativity and innovation.
                        </p>
                    </div>
                </div>

            </div>
        </section>

        <!-- 3. VALUE PROPOSITIONS & GUARANTEES (Matched to Design Screenshot) -->
        <section class="py-12 sm:py-16 bg-white dark:bg-slate-950 border-y border-gray-200 dark:border-slate-800/80 transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                    <!-- Card 1: Free Shipping -->
                    <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl p-5 sm:p-6 shadow-xs hover:shadow-md transition-all flex items-center gap-4">
                        <svg class="w-12 h-12 text-neutral-900 dark:text-white shrink-0" viewBox="0 0 50 50" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 18h7" />
                            <path d="M4 25h10" />
                            <path d="M7 32h7" />
                            <path d="M15 15h18v16H15z" />
                            <path d="M33 21h8l4 5v5h-12v-10z" />
                            <path d="M35 23.5h5l2.5 3H35z" />
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
                            <path d="M14 36 A15 15 0 1 0 10 23" />
                            <line x1="26" y1="10" x2="26" y2="13" />
                            <line x1="39" y1="23" x2="36" y2="23" />
                            <line x1="26" y1="36" x2="26" y2="33" />
                            <line x1="35.5" y1="13.5" x2="33.5" y2="15.5" />
                            <path d="M11 25.5 C9 27.5 9 30.5 11 32.5 C13 34.5 16 34.5 18 32.5 L19.5 31 L17 28.5 L16 29.5 C15.2 28.7 14.8 28.3 14 27.5 L15 26.5 L12.5 24 Z" />
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
                            <line x1="24" y1="4" x2="24" y2="7" />
                            <line x1="16" y1="7" x2="18.5" y2="9.5" />
                            <line x1="32" y1="7" x2="29.5" y2="9.5" />
                            <line x1="13" y1="14" x2="16" y2="14" />
                            <line x1="35" y1="14" x2="32" y2="14" />
                            <circle cx="24" cy="14" r="5" />
                            <polyline points="22 14 23.5 15.5 26.5 12.5" />
                            <path d="M12 24 L24 28 L36 24 L36 37 L24 41 L12 37 Z" />
                            <line x1="24" y1="28" x2="24" y2="41" />
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
                            <line x1="24" y1="4" x2="24" y2="7" />
                            <line x1="16" y1="7" x2="18.5" y2="9.5" />
                            <line x1="32" y1="7" x2="29.5" y2="9.5" />
                            <line x1="13" y1="14" x2="16" y2="14" />
                            <line x1="35" y1="14" x2="32" y2="14" />
                            <circle cx="24" cy="14" r="5" />
                            <polyline points="22 14 23.5 15.5 26.5 12.5" />
                            <path d="M12 24 L24 28 L36 24 L36 37 L24 41 L12 37 Z" />
                            <line x1="24" y1="28" x2="24" y2="41" />
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

        <!-- 5. TESTIMONIALS CAROUSEL -->
        <section class="py-20 bg-white dark:bg-slate-950 border-b border-gray-200 dark:border-slate-800/80 transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
        </section>

        <!-- 6. VIP EXCLUSIVE NEWSLETTER -->
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
@endsection
