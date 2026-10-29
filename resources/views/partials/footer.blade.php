<!-- VXPS Storefront Footer -->
<footer class="w-full bg-slate-50 dark:bg-slate-950 text-slate-600 dark:text-slate-300 border-t border-gray-200 dark:border-slate-800/80 pt-16 pb-8 relative overflow-hidden transition-colors">
    <!-- Top Ambient Glow Line -->
    <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-emerald-500/50 to-transparent"></div>
    <!-- Bottom Radial Ambient Glow -->
    <div class="absolute -bottom-24 left-1/2 -translate-x-1/2 w-[700px] h-48 bg-emerald-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Top Guarantee & Trust Perks Bar -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 pb-12 mb-12 border-b border-gray-200 dark:border-slate-800/80">
            <!-- Perk 1 -->
            <div class="flex items-center gap-3.5">
                <div class="w-11 h-11 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                    </svg>
                </div>
                <div>
                    <h5 class="text-xs font-bold text-slate-900 dark:text-white uppercase tracking-wider">Free Delivery</h5>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">Orders over $79 in Australia</p>
                </div>
            </div>

            <!-- Perk 2 -->
            <div class="flex items-center gap-3.5">
                <div class="w-11 h-11 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <div>
                    <h5 class="text-xs font-bold text-slate-900 dark:text-white uppercase tracking-wider">Support 24/7</h5>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">
                        <a href="tel:+61426762285"
                        class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                            +61 426 762 285
                        </a>
                    </p>
                </div>
            </div>

            <!-- Perk 3 -->
            <div class="flex items-center gap-3.5">
                <div class="w-11 h-11 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </div>
                <div>
                    <h5 class="text-xs font-bold text-slate-900 dark:text-white uppercase tracking-wider">14-Day Returns</h5>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">Hassle-free refunds &amp; swap</p>
                </div>
            </div>

            <!-- Perk 4 -->
            <div class="flex items-center gap-3.5">
                <div class="w-11 h-11 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <div>
                    <h5 class="text-xs font-bold text-slate-900 dark:text-white uppercase tracking-wider">Secure Payment</h5>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">256-bit encrypted checkout</p>
                </div>
            </div>
        </div>

        <!-- Footer Main Columns -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-12 pb-12">

            <!-- Column 1: Brand & Mission (4 cols) -->
            <div class="lg:col-span-4 space-y-5">
                <a href="{{ route('home') }}" class="inline-flex items-center group" aria-label="VXPS Home">
                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="VXPS"
                        class="h-14 w-auto object-contain transition-transform duration-200 group-hover:scale-105"
                    >
                </a>

                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed font-normal max-w-sm">
                    Australia's trusted destination for high-performance electronic essentials, smart tracking devices, and next-generation power accessories direct from manufacturers.
                </p>

                <!-- Aussie Badge -->
                <div class="pt-1">
                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 text-xs font-medium text-slate-700 dark:text-slate-300 shadow-xs">
                        <span>🇦🇺</span>
                        <span>100% Australian Owned &amp; Operated</span>
                    </span>
                </div>

                <!-- Social Media Links -->
                <div class="flex items-center gap-2.5 pt-2">
                    <a href="https://www.facebook.com/people/VXPS/61589808869959/"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Facebook"
                       class="w-10 h-10 rounded-xl bg-white dark:bg-slate-900/90 border border-gray-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 hover:border-emerald-500/40 hover:bg-emerald-50 dark:hover:bg-slate-800/80 transition-all flex items-center justify-center shadow-xs">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.093 10.125 24v-8.438H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.236 2.686.236v2.953h-1.513c-1.49 0-1.956.93-1.956 1.884v2.264h3.328l-.532 3.49h-2.796V24C19.612 23.093 24 18.1 24 12.073z"/>
                        </svg>
                    </a>

                    <a href="https://www.instagram.com/vxpsemiconducto/"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Instagram"
                       class="w-10 h-10 rounded-xl bg-white dark:bg-slate-900/90 border border-gray-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 hover:border-emerald-500/40 hover:bg-emerald-50 dark:hover:bg-slate-800/80 transition-all flex items-center justify-center shadow-xs">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="5"/>
                            <circle cx="12" cy="12" r="4"/>
                            <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Column 2: Quick Links (2.5 cols) -->
            <div class="lg:col-span-2 space-y-4">
                <h4 class="text-xs font-black uppercase tracking-widest text-slate-900 dark:text-white flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 dark:bg-emerald-400"></span>
                    <span>Quick Links</span>
                </h4>

                <ul class="space-y-2.5 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 hover:translate-x-1 transition-all inline-flex items-center gap-1.5">
                            <span class="text-emerald-500 text-xs">&rsaquo;</span> Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('shop') }}" class="text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 hover:translate-x-1 transition-all inline-flex items-center gap-1.5">
                            <span class="text-emerald-500 text-xs">&rsaquo;</span> Shop Catalog
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 hover:translate-x-1 transition-all inline-flex items-center gap-1.5">
                            <span class="text-emerald-500 text-xs">&rsaquo;</span> About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 hover:translate-x-1 transition-all inline-flex items-center gap-1.5">
                            <span class="text-emerald-500 text-xs">&rsaquo;</span> Contact Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('checkout') }}" class="text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 hover:translate-x-1 transition-all inline-flex items-center gap-1.5">
                            <span class="text-emerald-500 text-xs">&rsaquo;</span> My Cart &amp; Checkout
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Column 3: Information & Policies (2.5 cols) -->
            <div class="lg:col-span-2 space-y-4">
                <h4 class="text-xs font-black uppercase tracking-widest text-slate-900 dark:text-white flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 dark:bg-emerald-400"></span>
                    <span>Information</span>
                </h4>

                <ul class="space-y-2.5 text-sm">
                    <li>
                        <a href="{{ route('terms') }}" class="text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 hover:translate-x-1 transition-all inline-flex items-center gap-1.5">
                            <span class="text-emerald-500 text-xs">&rsaquo;</span> Terms &amp; Conditions
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('privacy') }}" class="text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 hover:translate-x-1 transition-all inline-flex items-center gap-1.5">
                            <span class="text-emerald-500 text-xs">&rsaquo;</span> Privacy Policy
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('returns') }}" class="text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 hover:translate-x-1 transition-all inline-flex items-center gap-1.5">
                            <span class="text-emerald-500 text-xs">&rsaquo;</span> Return Policy
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('terms') }}#shipping" class="text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 hover:translate-x-1 transition-all inline-flex items-center gap-1.5">
                            <span class="text-emerald-500 text-xs">&rsaquo;</span> Shipping Information
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 hover:translate-x-1 transition-all inline-flex items-center gap-1.5">
                            <span class="text-emerald-500 text-xs">&rsaquo;</span> Customer Support
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Column 4: Contact Us (4 cols) -->
            <div class="lg:col-span-4 space-y-4">
                <h4 class="text-xs font-black uppercase tracking-widest text-slate-900 dark:text-white flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 dark:bg-emerald-400"></span>
                    <span>Direct Support</span>
                </h4>

                <ul class="space-y-3.5 text-sm">
                    <!-- Address -->
                    <li class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span class="text-xs text-slate-700 dark:text-slate-300 leading-relaxed">
                            1D, Kyle Street, Glenside, Adelaide, SA 5065, Australia
                        </span>
                    </li>

                    <!-- Phone -->
                    <li class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <a href="tel:+61426762285" class="text-xs text-slate-800 dark:text-slate-200 font-semibold hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors block">
                                +61 426 762 285
                            </a>
                            <span class="text-[10px] text-slate-500 dark:text-slate-400 block">Mon - Fri: 9:00 AM - 6:00 PM ACST</span>
                        </div>
                    </li>

                    <!-- Email -->
                    <li class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <a href="mailto:anthonyh@vxpwertech.com" class="text-xs text-slate-700 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors break-all">
                            anthonyh@vxpwertech.com
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Footer Bottom Bar -->
        <div class="pt-8 border-t border-gray-200 dark:border-slate-800/80 flex flex-col lg:flex-row items-center justify-between gap-5">
            <p class="text-xs text-slate-500 dark:text-slate-400 text-center lg:text-left">
                Copyright &copy; {{ date('Y') }} <span class="text-slate-900 dark:text-white font-medium">VX Power Semiconductor Pty Ltd</span>. All rights reserved. &bull;
                Designed &amp; Developed By
                <a href="https://webzoneexpertz.com.au/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="text-emerald-600 dark:text-emerald-400 hover:text-emerald-500 dark:hover:text-emerald-300 font-medium transition-colors">
                    Webzone Expertz
                </a>
            </p>

            <!-- Modern Payment Method Badges -->
            <div class="flex flex-wrap items-center justify-center gap-2">
                <!-- Apple Pay Badge -->
                <div class="h-7 px-2.5 rounded-md bg-white border border-gray-200 dark:border-transparent flex items-center justify-center shadow-xs" title="Apple Pay">
                    <svg class="h-4 w-auto" viewBox="0 0 100 40" fill="#000">
                        <path d="M19.98 17.57c-.12-2.82 2.3-4.17 2.4-4.24-1.31-1.92-3.34-2.18-4.06-2.22-1.73-.18-3.38 1.02-4.26 1.02-.88 0-2.24-1-3.69-.97-1.9.03-3.65 1.11-4.63 2.81-1.97 3.42-.51 8.48 1.41 11.25.94 1.36 2.06 2.87 3.53 2.82 1.41-.06 1.95-.91 3.65-.91 1.7 0 2.19.91 3.67.88 1.51-.03 2.47-1.36 3.4-2.72 1.08-1.58 1.52-3.11 1.55-3.19-.04-.02-2.96-1.14-2.97-4.53zM16.92 9.07c.78-.94 1.3-2.25 1.16-3.56-1.12.05-2.48.75-3.28 1.69-.7.81-1.32 2.13-1.15 3.4 1.25.1 2.53-.66 3.27-1.53zM34.8 19.34c0-3.63 2.76-5.87 6.64-5.87 2.19 0 3.73.69 4.49 1.4v-4.9h2.89v15.65h-2.73l-.15-1.32c-.8.95-2.27 1.56-4.29 1.56-3.83 0-6.85-2.49-6.85-6.52zm11.19-.24v-2.07c-.6-.62-1.77-1.07-3.23-1.07-2.58 0-4.38 1.38-4.38 3.51 0 2.09 1.77 3.53 4.38 3.53 1.54 0 2.68-.49 3.23-1.09v-2.81zM58.33 25.62v-4.63h-5.26v4.63h-2.97V13.72h8.23c3.48 0 5.6 1.83 5.6 4.7 0 2.88-2.12 4.72-5.6 4.72v2.48h0zM55.9 18.72h2.2c1.77 0 2.8-.75 2.8-2.3 0-1.54-1.03-2.28-2.8-2.28h-2.2v4.58zM68.5 25.62l-.24-1.52c-.8.99-2.27 1.76-4.29 1.76-2.9 0-5.18-1.87-5.18-4.78 0-3.08 2.5-4.82 7.02-4.82h2.51v-.53c0-1.46-1.12-2.3-2.95-2.3-1.43 0-2.6.46-3.17.95l-.76-1.74c.94-.75 2.56-1.28 4.39-1.28 3.4 0 5.43 1.7 5.43 4.88v9.38H68.5zm-.05-4.52v-1.79h-2.28c-2.6 0-4.04.83-4.04 2.55 0 1.51 1.25 2.45 2.87 2.45 1.83 0 3.14-.99 3.45-2.21v-.99zM76.9 29.83l.79-2.15c.6.21 1.3.36 1.95.36 1.54 0 2.22-.64 2.64-2.12l.37-1.31-6.19-10.89h3.2l4.47 8.52 4.34-8.52h3.14L84.9 26.04c-1.31 4.14-3.08 4.96-5.83 4.96-.8 0-1.55-.13-2.17-.37v-.8z"/>
                    </svg>
                </div>

                <!-- Google Pay Badge -->
                <div class="h-7 px-2.5 rounded-md bg-white border border-gray-200 dark:border-transparent flex items-center justify-center shadow-xs" title="Google Pay">
                    <svg class="h-3.5 w-auto" viewBox="0 0 80 32" fill="none">
                        <path d="M37.8 15.6v5.8h-1.9V5.1h5.1c1.3 0 2.5.5 3.4 1.3.9.9 1.4 2 1.4 3.2 0 1.3-.5 2.4-1.4 3.2-.9.9-2 1.3-3.4 1.3l-3.2.1v1.4zm0-8.8v6h3.3c.8 0 1.5-.3 2.1-.8.6-.6.9-1.3.9-2.1 0-.9-.3-1.6-.9-2.1-.6-.6-1.3-.9-2.1-.9l-3.3-.1zM48.7 17.5c0 1.2.5 2.2 1.4 3 .9.8 2 1.2 3.3 1.2 1.3 0 2.4-.4 3.3-1.1.9-.7 1.4-1.7 1.4-2.8v-7.1h-1.8v2.3c-.7-.8-1.7-1.2-2.9-1.2-1.2 0-2.3.4-3.2 1.2-.9.9-1.4 2-1.4 3.2v1.3zm1.9-.4c0-.9.3-1.6.9-2.2.6-.6 1.4-.9 2.3-.9s1.6.3 2.2.9v4.5c-.6.6-1.3.9-2.2.9-.9 0-1.7-.3-2.3-.9-.6-.6-.9-1.3-.9-2.3zM60.3 25.1l1.8-4.2-5.7-12.7h2l3.6 8.7 3.5-8.7h2l-7.2 16.9h-2z" fill="#5F6368"/>
                        <path d="M16.1 13.5c0-.8-.1-1.6-.2-2.3H8.3v4.4h4.4c-.2 1-.8 1.9-1.6 2.5v2.1h2.6c1.5-1.4 2.4-3.5 2.4-6.7z" fill="#4285F4"/>
                        <path d="M8.3 21.4c2.2 0 4.1-.7 5.5-2l-2.6-2.1c-.8.5-1.7.8-2.9.8-2.2 0-4-1.5-4.7-3.5H1v2.1c1.4 2.8 4.3 4.7 7.3 4.7z" fill="#34A853"/>
                        <path d="M3.6 14.6c-.2-.6-.3-1.3-.3-2s.1-1.4.3-2V8.5H1c-.6 1.2-1 2.6-1 4.1s.4 2.9 1 4.1l2.6-2.1z" fill="#FBBC05"/>
                        <path d="M8.3 5.8c1.2 0 2.3.4 3.2 1.2l2.4-2.4C12.4 3.3 10.5 2.5 8.3 2.5 5.3 2.5 2.4 4.4 1 7.2l2.6 2.1c.7-2 2.5-3.5 4.7-3.5z" fill="#EA4335"/>
                    </svg>
                </div>

                <!-- Visa Badge -->
                <div class="h-7 px-2.5 rounded-md bg-white border border-gray-200 dark:border-transparent flex items-center justify-center shadow-xs" title="Visa">
                    <span class="text-sm font-black italic tracking-tighter text-[#1A1F71] font-sans">VISA</span>
                </div>

                <!-- Mastercard Badge -->
                <div class="h-7 px-2.5 rounded-md bg-white border border-gray-200 dark:border-transparent flex items-center justify-center shadow-xs" title="Mastercard">
                    <svg class="h-4 w-auto" viewBox="0 0 36 24">
                        <circle cx="13" cy="12" r="9" fill="#EB001B"/>
                        <circle cx="23" cy="12" r="9" fill="#F79E1B"/>
                        <path d="M18 5.6a9 9 0 0 1 0 12.8 9 9 0 0 1 0-12.8z" fill="#FF5F00"/>
                    </svg>
                </div>

                <!-- American Express Badge -->
                <div class="h-7 px-2.5 rounded-md bg-[#006FCF] flex items-center justify-center shadow-xs" title="American Express">
                    <span class="text-[9px] font-black tracking-tighter text-white font-sans uppercase">AMEX</span>
                </div>

                <!-- Stripe 256-Bit SSL -->
                <div class="h-7 px-2.5 rounded-md bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-700/80 flex items-center gap-1.5 shadow-xs" title="256-Bit SSL Secured">
                    <svg class="w-3 h-3 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <span class="text-[9px] font-mono font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider">256-Bit SSL</span>
                </div>
            </div>
        </div>

    </div>
</footer>