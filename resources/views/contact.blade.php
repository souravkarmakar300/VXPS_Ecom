@extends('layouts.app')

@section('title', 'Contact Us | VXPS - Everyday Electronics Australia')

@section('meta')
    <meta name="description" content="Stay in touch with VXPS Australia. Contact our customer care team via phone (+61 426 762 285), email (anthonyh@vxpowertech.com), or our Adelaide headquarters.">
@endsection

@section('content')
<!-- 1. HERO HEADER -->
        <section class="relative py-16 lg:py-20 overflow-hidden bg-gradient-to-b from-gray-100 via-white to-white dark:from-slate-900 dark:via-slate-950 dark:to-slate-950 border-b border-gray-200 dark:border-slate-800/80 transition-colors">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(16,185,129,0.12),transparent_50%)] pointer-events-none"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <!-- Breadcrumbs -->
                <nav class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-gray-100/80 dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800 text-xs text-slate-600 dark:text-slate-400 mb-6">
                    <a href="{{ route('home') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">Home</a>
                    <span>/</span>
                    <span class="text-emerald-600 dark:text-emerald-400 font-semibold">Contact Us</span>
                </nav>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 dark:text-white tracking-tight uppercase max-w-4xl mx-auto leading-tight">
                    Stay in Touch with VXPS
                </h1>

                <p class="text-base sm:text-lg text-slate-600 dark:text-slate-300 max-w-2xl mx-auto mt-4 leading-relaxed font-normal">
                    Have questions regarding orders, wholesale quotes, or technical support? Our local Australian customer team is ready to help 24/7.
                </p>
            </div>
        </section>

        <!-- 2. MAIN CONTACT SECTION (Matched to Design Screenshot) -->
        <section class="py-16 sm:py-20 bg-white dark:bg-slate-950 transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                    
                    <!-- Left Column: "Stay in Touch with us" (3 Green Cards Exact Image Match) -->
                    <div class="lg:col-span-5 space-y-6">
                        <div>
                            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                                Stay in Touch with us
                            </h2>
                            <p class="text-sm text-slate-600 dark:text-slate-400 mt-2">
                                We are always accessible via phone, direct email, or at our Australian branch.
                            </p>
                        </div>

                        <div class="space-y-4 pt-2">
                            <!-- Card 1: Phone -->
                            <a 
                                href="tel:+61426762285" 
                                class="group block bg-[#00a844] hover:bg-[#00963d] rounded-2xl p-5 sm:p-6 text-white shadow-md hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5"
                            >
                                <div class="flex items-center gap-4 sm:gap-5">
                                    <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center shrink-0 shadow-sm group-hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6 text-[#00a844]" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xl sm:text-2xl font-bold text-white tracking-tight leading-tight">
                                            Phone
                                        </h3>
                                        <p class="text-sm sm:text-base font-semibold text-white/95 mt-1 tracking-wide">
                                            +61 426 762 285
                                        </p>
                                    </div>
                                </div>
                            </a>

                            <!-- Card 2: Email -->
                            <a 
                                href="mailto:anthonyh@vxpowertech.com" 
                                class="group block bg-[#00a844] hover:bg-[#00963d] rounded-2xl p-5 sm:p-6 text-white shadow-md hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5"
                            >
                                <div class="flex items-center gap-4 sm:gap-5">
                                    <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center shrink-0 shadow-sm group-hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6 text-[#00a844]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="text-xl sm:text-2xl font-bold text-white tracking-tight leading-tight">
                                            Email
                                        </h3>
                                        <p class="text-sm sm:text-base font-semibold text-white/95 mt-1 tracking-wide truncate">
                                            anthonyh@vxpowertech.com
                                        </p>
                                    </div>
                                </div>
                            </a>

                            <!-- Card 3: Address -->
                            <a 
                                href="#map" 
                                class="group block bg-[#00a844] hover:bg-[#00963d] rounded-2xl p-5 sm:p-6 text-white shadow-md hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5 cursor-pointer"
                            >
                                <div class="flex items-start gap-4 sm:gap-5">
                                    <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center shrink-0 shadow-sm mt-0.5 group-hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6 text-[#00a844]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between gap-2">
                                            <h3 class="text-xl sm:text-2xl font-bold text-white tracking-tight leading-tight">
                                                Address
                                            </h3>
                                            <span class="text-[11px] font-semibold text-white/80 bg-white/20 px-2 py-0.5 rounded-full group-hover:bg-white group-hover:text-[#00a844] transition-colors">
                                                View Map ↓
                                            </span>
                                        </div>
                                        <p class="text-sm sm:text-base font-semibold text-white/95 mt-1 leading-relaxed">
                                            1D, Kyle Street, Glenside, Adelaide, SA 5065, Australia
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Local Operation Support Note -->
                        <div class="p-5 rounded-2xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-xs text-slate-600 dark:text-slate-400 space-y-1.5">
                            <div class="flex items-center gap-2 font-bold text-slate-900 dark:text-white">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                                <span>Support Desk Operating Status: Online</span>
                            </div>
                            <p>Customer inquiries are monitored 24 hours a day, 7 days a week. Response time is typically under 2 hours.</p>
                        </div>
                    </div>

                    <!-- Right Column: Interactive Contact Form -->
                    <div class="lg:col-span-7">
                        <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-3xl p-6 sm:p-10 shadow-lg">
                            <div class="mb-8">
                                <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                                    Send Us a Message
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mt-1.5">
                                    Have an inquiry? Fill in the details below and we will get back to you shortly.
                                </p>
                            </div>

                            <!-- Success Banner -->
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

                            <!-- Error Alert -->
                            @if ($errors->any())
                                <div class="mb-6 p-4 rounded-2xl bg-rose-500/10 border border-rose-500/30 text-rose-500 text-xs space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <p>&bull; {{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                                @csrf

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                    <div>
                                        <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">
                                            Your Name <span class="text-rose-500">*</span>
                                        </label>
                                        <input 
                                            type="text" 
                                            id="name" 
                                            name="name" 
                                            value="{{ old('name') }}"
                                            required 
                                            placeholder="e.g. John Doe" 
                                            class="w-full rounded-xl border border-gray-300 dark:border-slate-800 bg-gray-50 dark:bg-slate-950 px-4 py-3 text-sm text-slate-900 dark:text-white placeholder:text-slate-400 outline-none focus:border-[#00a844] focus:ring-4 focus:ring-[#00a844]/20 transition-all"
                                        >
                                    </div>

                                    <div>
                                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">
                                            Email Address <span class="text-rose-500">*</span>
                                        </label>
                                        <input 
                                            type="email" 
                                            id="email" 
                                            name="email" 
                                            value="{{ old('email') }}"
                                            required 
                                            placeholder="e.g. john@example.com" 
                                            class="w-full rounded-xl border border-gray-300 dark:border-slate-800 bg-gray-50 dark:bg-slate-950 px-4 py-3 text-sm text-slate-900 dark:text-white placeholder:text-slate-400 outline-none focus:border-[#00a844] focus:ring-4 focus:ring-[#00a844]/20 transition-all"
                                        >
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                    <div>
                                        <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">
                                            Phone Number
                                        </label>
                                        <input 
                                            type="tel" 
                                            id="phone" 
                                            name="phone" 
                                            value="{{ old('phone') }}"
                                            placeholder="e.g. +61 400 000 000" 
                                            class="w-full rounded-xl border border-gray-300 dark:border-slate-800 bg-gray-50 dark:bg-slate-950 px-4 py-3 text-sm text-slate-900 dark:text-white placeholder:text-slate-400 outline-none focus:border-[#00a844] focus:ring-4 focus:ring-[#00a844]/20 transition-all"
                                        >
                                    </div>

                                    <div>
                                        <label for="subject" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">
                                            Subject
                                        </label>
                                        <input 
                                            type="text" 
                                            id="subject" 
                                            name="subject" 
                                            value="{{ old('subject') }}"
                                            placeholder="e.g. General Inquiry" 
                                            class="w-full rounded-xl border border-gray-300 dark:border-slate-800 bg-gray-50 dark:bg-slate-950 px-4 py-3 text-sm text-slate-900 dark:text-white placeholder:text-slate-400 outline-none focus:border-[#00a844] focus:ring-4 focus:ring-[#00a844]/20 transition-all"
                                        >
                                    </div>
                                </div>

                                <div>
                                    <label for="message" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">
                                        Your Message <span class="text-rose-500">*</span>
                                    </label>
                                    <textarea 
                                        id="message" 
                                        name="message" 
                                        rows="5" 
                                        required 
                                        placeholder="Please provide details regarding your inquiry..." 
                                        class="w-full rounded-xl border border-gray-300 dark:border-slate-800 bg-gray-50 dark:bg-slate-950 px-4 py-3 text-sm text-slate-900 dark:text-white placeholder:text-slate-400 outline-none focus:border-[#00a844] focus:ring-4 focus:ring-[#00a844]/20 transition-all resize-y"
                                    >{{ old('message') }}</textarea>
                                </div>

                                <div>
                                    <button 
                                        type="submit" 
                                        class="w-full sm:w-auto px-8 py-3.5 rounded-full bg-[#00a844] hover:bg-[#00963d] text-white font-bold text-xs uppercase tracking-widest transition-all duration-200 shadow-md hover:shadow-lg active:scale-95 cursor-pointer flex items-center justify-center gap-2"
                                    >
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                        </svg>
                                        <span>Send Message</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- 3. INTERACTIVE GOOGLE MAP SECTION -->
        <section id="map" class="pb-16 sm:pb-20 bg-white dark:bg-slate-950 transition-colors scroll-mt-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-3xl overflow-hidden shadow-lg transition-colors">
                    
                    <!-- Header Info Bar -->
                    <div class="p-6 sm:p-8 flex flex-col md:flex-row md:items-center md:justify-between gap-6 border-b border-gray-200 dark:border-slate-800 bg-gray-50/70 dark:bg-slate-900/50">
                        <div class="flex items-start sm:items-center gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-[#00a844]/10 border border-[#00a844]/20 flex items-center justify-center text-[#00a844] shrink-0 shadow-xs">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs font-bold uppercase tracking-wider text-[#00a844]">Location &amp; Showroom</span>
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    <span class="text-[11px] text-slate-500 dark:text-slate-400 font-medium">South Australia</span>
                                </div>
                                <h3 class="text-xl sm:text-2xl font-black text-slate-900 dark:text-white tracking-tight mt-0.5">
                                    Visit Us in Glenside, Adelaide
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 mt-1 font-medium">
                                    1D Kyle St, Glenside SA 5065, Australia
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 shrink-0">
                            <a 
                                href="https://maps.google.com/?q=1D+Kyle+St,+Glenside+SA+5065,+Australia" 
                                target="_blank" 
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-[#00a844] hover:bg-[#00963d] text-white text-xs font-bold uppercase tracking-wider transition-all duration-200 shadow-md hover:shadow-lg transform active:scale-95"
                            >
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                                <span>Get Directions</span>
                            </a>
                        </div>
                    </div>

                    <!-- Map Iframe Container -->
                    <div class="relative w-full h-[400px] sm:h-[480px] bg-gray-100 dark:bg-slate-800">
                        <iframe
                            title="VXPS Glenside Adelaide Location Map"
                            class="w-full h-full border-0"
                            loading="lazy"
                            allowfullscreen
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://maps.google.com/maps?q=1D+Kyle+St,+Glenside+SA+5065,+Australia&t=&z=16&ie=UTF8&iwloc=&output=embed"
                        ></iframe>
                    </div>

                </div>
            </div>
        </section>

        <!-- 4. VALUE PROPOSITIONS & GUARANTEES (Image Match) -->
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
                            <h3 class="text-base sm:text-lg font-bold text-gray-900 dark:text-white mt-0.5 tracking-tight">+61 426 762 285</h3>
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
@endsection
