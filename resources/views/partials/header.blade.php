<!-- VXPS Primary Navigation Header -->
<header class="sticky top-0 z-50 w-full border-b border-gray-200 dark:border-slate-800/80 bg-white/90 dark:bg-slate-950/85 backdrop-blur-xl transition-all duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">

            <!-- 1. VXPS Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center group cursor-pointer select-none" aria-label="VXPS Home">
                <img 
                    src="{{ asset('images/logo.png') }}" 
                    alt="VXPS" 
                    class="h-9 sm:h-15 w-auto object-contain transition-transform duration-200 group-hover:scale-105"
                >
            </a>

            <!-- 2. Navbar Links (Home, About, Contact, Shop with Mega Dropdown) -->
            <nav class="hidden md:flex items-center gap-1 lg:gap-2 px-3 py-1.5 rounded-full bg-gray-100/90 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-800/80 backdrop-blur-md shadow-inner">
                <a 
                    href="{{ route('home') }}" 
                    class="px-4 py-2 rounded-full text-sm font-semibold transition-all duration-150 {{ request()->is('/') ? 'text-white bg-emerald-600 shadow-sm shadow-emerald-500/30' : 'text-slate-700 dark:text-slate-300 hover:text-slate-950 dark:hover:text-white hover:bg-white/80 dark:hover:bg-slate-800/60' }}"
                >
                    Home
                </a>

                <a 
                    href="{{ route('about') }}" 
                    class="px-4 py-2 rounded-full text-sm font-semibold transition-all duration-150 {{ request()->is('about*') ? 'text-white bg-emerald-600 shadow-sm shadow-emerald-500/30' : 'text-slate-700 dark:text-slate-300 hover:text-slate-950 dark:hover:text-white hover:bg-white/80 dark:hover:bg-slate-800/60' }}"
                >
                    About
                </a>

                <a 
                    href="{{ route('contact') }}" 
                    class="px-4 py-2 rounded-full text-sm font-semibold transition-all duration-150 {{ request()->is('contact*') ? 'text-white bg-emerald-600 shadow-sm shadow-emerald-500/30' : 'text-slate-700 dark:text-slate-300 hover:text-slate-950 dark:hover:text-white hover:bg-white/80 dark:hover:bg-slate-800/60' }}"
                >
                    Contact
                </a>

                {{-- Shop Menu Item with Horizontal Submenu Dropdown --}}
                <div class="relative group" id="shop-dropdown-wrapper" onmouseenter="typeof loadSubmenuCategories === 'function' && loadSubmenuCategories()">
                    <a 
                        href="{{ route('shop') }}" 
                        id="shop-nav-btn"
                        class="px-4 py-2 rounded-full text-sm font-semibold transition-all duration-150 flex items-center gap-1.5 {{ request()->routeIs('shop*') ? 'text-white bg-emerald-600 shadow-sm shadow-emerald-500/30' : 'text-slate-700 dark:text-slate-300 hover:text-slate-950 dark:hover:text-white hover:bg-white/80 dark:hover:bg-slate-800/60' }}"
                    >
                        <span>Shop</span>
                        <span class="w-1.5 h-1.5 rounded-full {{ request()->routeIs('shop*') ? 'bg-white' : 'bg-emerald-400' }} animate-pulse"></span>
                        <svg class="w-3.5 h-3.5 opacity-60 group-hover:rotate-180 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </a>

                    {{-- Horizontal Category Mega-Submenu (appears on hover) --}}
                    <div 
                        id="shop-category-submenu"
                        class="absolute left-1/2 -translate-x-1/2 top-full pt-2 opacity-0 invisible pointer-events-none group-hover:opacity-100 group-hover:visible group-hover:pointer-events-auto transition-all duration-200 z-50 w-[740px] max-w-[92vw] before:content-[''] before:absolute before:-top-3 before:left-0 before:right-0 before:h-4"
                    >
                        <div class="bg-white/95 dark:bg-slate-900/95 backdrop-blur-2xl border border-gray-200/90 dark:border-slate-800 rounded-3xl p-5 shadow-2xl shadow-emerald-950/20">
                            <div class="flex items-center justify-between pb-3 mb-3 border-b border-gray-100 dark:border-slate-800/80">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                                    <span class="text-xs font-black uppercase tracking-wider text-slate-900 dark:text-white">Shop by Category</span>
                                </div>
                                <a href="{{ route('shop') }}" class="text-xs font-bold text-emerald-600 dark:text-emerald-400 hover:underline flex items-center gap-1">
                                    <span>View all products &rarr;</span>
                                </a>
                            </div>

                            <div id="navbar-submenu-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-2.5">
                                @if(isset($navCategories) && $navCategories->count())
                                    @foreach($navCategories as $cat)
                                        <a href="{{ $cat->nav_url }}" class="group/item flex flex-col items-center p-2.5 sm:p-3 rounded-2xl bg-gray-50 dark:bg-slate-950/60 hover:bg-emerald-50 dark:hover:bg-slate-800/80 border border-gray-100 dark:border-slate-800/70 hover:border-emerald-400/50 transition-all text-center">
                                            <div class="w-11 h-11 rounded-xl bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-750 flex items-center justify-center mb-2 overflow-hidden shrink-0 group-hover/item:scale-110 shadow-xs transition-transform">
                                                <img src="{{ $cat->nav_image }}" alt="{{ $cat->name }}" class="w-full h-full object-cover">
                                            </div>
                                            <span class="text-xs font-bold text-slate-900 dark:text-white group-hover/item:text-emerald-600 dark:group-hover/item:text-emerald-400 line-clamp-1">
                                                {{ $cat->name }}
                                            </span>
                                            <span class="text-[10px] text-slate-400 dark:text-slate-500 mt-0.5">
                                                {{ $cat->products_count }} {{ Str::plural('item', $cat->products_count) }}
                                            </span>
                                        </a>
                                    @endforeach
                                @else
                                    <div class="col-span-full py-4 text-center text-xs text-slate-400 animate-pulse">Loading categories...</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- 3. Header Right Actions (Theme Toggle, Search, Cart, Admin Portal & Mobile Toggle) -->
            <div class="flex items-center gap-2 sm:gap-3">
                <!-- Dark / Light Theme Toggle Button -->
                <button 
                    type="button" 
                    onclick="toggleTheme()" 
                    class="p-2.5 rounded-xl text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-800/70 border border-gray-200 dark:border-slate-800 transition-all cursor-pointer focus:outline-none"
                    aria-label="Toggle Dark / Light Mode"
                    title="Toggle Dark / Light Mode"
                >
                    <!-- Sun (shown in Dark Mode) -->
                    <svg class="w-5 h-5 hidden dark:block text-amber-400 transition-transform hover:rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <!-- Moon (shown in Light Mode) -->
                    <svg class="w-5 h-5 block dark:hidden text-slate-700 transition-transform hover:-rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <!-- Search Link / Button -->
                {{-- <a 
                    href="{{ route('shop') }}"
                    class="p-2.5 rounded-xl text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-900 border border-transparent hover:border-gray-200 dark:hover:border-slate-800 transition-colors"
                    aria-label="Search store"
                    title="Search catalog"
                >
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a> --}}

                <!-- Cart Icon Button -->
                <a href="{{ route('checkout') }}" class="relative p-2.5 rounded-xl text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-900 border border-transparent hover:border-gray-200 dark:hover:border-slate-800 transition-colors" aria-label="Shopping Cart">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="absolute top-1 right-1 w-4 h-4 rounded-full bg-emerald-600 text-white font-bold text-[10px] flex items-center justify-center ring-2 ring-white dark:ring-slate-950">
                        {{ array_sum(array_column(session('cart', []), 'quantity')) }}
                    </span>
                </a>

                <!-- Admin Portal Button -->
                {{-- @if(Auth::guard('admin')->check())
                    <a 
                        href="{{ route('admin.dashboard') }}" 
                        target="_blank"
                        rel="noopener noreferrer"
                        class="hidden sm:inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-500 shadow-xs transition-all hover:scale-105"
                        title="Open Admin Dashboard in new tab"
                    >
                        <svg class="w-4 h-4 text-emerald-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                @else
                    <a 
                        href="{{ route('admin.login') }}" 
                        target="_blank"
                        rel="noopener noreferrer"
                        class="hidden sm:inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-bold text-slate-700 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 bg-gray-100 hover:bg-gray-200 dark:bg-slate-900 dark:hover:bg-slate-800 border border-gray-200 dark:border-slate-800 transition-all hover:scale-105"
                        title="Open Admin Portal in new tab"
                    >
                        <svg class="w-4 h-4 text-emerald-500 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <span>Admin Portal</span>
                    </a>
                @endif --}}

                <!-- Mobile Hamburger Button -->
                <button 
                    type="button" 
                    onclick="toggleMobileMenu()" 
                    class="md:hidden p-2.5 rounded-xl text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-900 border border-gray-200 dark:border-slate-800 transition-colors cursor-pointer"
                    aria-label="Toggle navigation menu"
                >
                    <svg id="hamburger-icon" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="close-icon" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200 dark:border-slate-800/80 py-4 space-y-2 bg-white/95 dark:bg-slate-950/95 backdrop-blur-xl">
            <a 
                href="{{ route('home') }}" 
                class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->is('/') ? 'text-white bg-emerald-600' : 'text-slate-700 dark:text-slate-300 hover:text-slate-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-900/60' }}"
            >
                Home
            </a>
            <a 
                href="{{ route('about') }}" 
                onclick="toggleMobileMenu()"
                class="block px-4 py-2.5 rounded-xl text-sm font-medium {{ request()->is('about*') ? 'text-white bg-emerald-600' : 'text-slate-700 dark:text-slate-300 hover:text-slate-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-900/60' }} transition-colors"
            >
                About
            </a>
            <a 
                href="{{ route('contact') }}" 
                onclick="toggleMobileMenu()"
                class="block px-4 py-2.5 rounded-xl text-sm font-medium {{ request()->is('contact*') ? 'text-white bg-emerald-600' : 'text-slate-700 dark:text-slate-300 hover:text-slate-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-900/60' }} transition-colors"
            >
                Contact
            </a>
            <a 
                href="{{ route('shop') }}" 
                onclick="toggleMobileMenu()"
                class="block px-4 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('shop*') ? 'text-white bg-emerald-600' : 'text-slate-700 dark:text-slate-300 hover:text-slate-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-900/60' }} transition-colors"
            >
                Shop
            </a>

            <div class="pt-2 border-t border-gray-200 dark:border-slate-800/80 flex items-center justify-between px-4">
                <span class="text-xs text-slate-500">Administrator Console</span>
                <a 
                    href="{{ Auth::guard('admin')->check() ? route('admin.dashboard') : route('admin.login') }}" 
                    target="_blank"
                    rel="noopener noreferrer"
                    class="text-xs font-semibold text-emerald-600 dark:text-emerald-400 hover:text-emerald-500 dark:hover:text-emerald-300"
                >
                    Admin Portal &rarr;
                </a>
            </div>
        </div>
    </div>
</header>

