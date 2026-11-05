
<!-- VXPS Primary Navigation Header -->
<header class="sticky top-0 z-50 w-full border-b border-gray-200 dark:border-slate-800/80 bg-white/90 dark:bg-slate-950/85 backdrop-blur-xl transition-all duration-200">

    <!-- Main Header -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between h-20">

            <!-- 1. VXPS Brand Logo -->
            <a href="{{ route('home') }}"
                class="flex items-center group cursor-pointer select-none"
                aria-label="VXPS Home">

                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="VXPS"
                    class="h-9 sm:h-15 w-auto object-contain transition-transform duration-200 group-hover:scale-105"
                >
            </a>


            <!-- 2. Navbar Links -->
            <nav class="hidden md:flex items-center gap-1 lg:gap-2 px-3 py-1.5 rounded-full bg-gray-100/90 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-800/80 backdrop-blur-md shadow-inner">

                <!-- Home -->
                <a
                    href="{{ route('home') }}"
                    class="px-4 py-2 rounded-full text-sm font-semibold transition-all duration-150 {{ request()->is('/') ? 'text-white bg-emerald-600 shadow-sm shadow-emerald-500/30' : 'text-slate-700 dark:text-slate-300 hover:text-slate-950 dark:hover:text-white hover:bg-white/80 dark:hover:bg-slate-800/60' }}"
                >
                    Home
                </a>

                <!-- About -->
                <a
                    href="{{ route('about') }}"
                    class="px-4 py-2 rounded-full text-sm font-semibold transition-all duration-150 {{ request()->is('about*') ? 'text-white bg-emerald-600 shadow-sm shadow-emerald-500/30' : 'text-slate-700 dark:text-slate-300 hover:text-slate-950 dark:hover:text-white hover:bg-white/80 dark:hover:bg-slate-800/60' }}"
                >
                    About
                </a>

                <!-- Contact -->
                <a
                    href="{{ route('contact') }}"
                    class="px-4 py-2 rounded-full text-sm font-semibold transition-all duration-150 {{ request()->is('contact*') ? 'text-white bg-emerald-600 shadow-sm shadow-emerald-500/30' : 'text-slate-700 dark:text-slate-300 hover:text-slate-950 dark:hover:text-white hover:bg-white/80 dark:hover:bg-slate-800/60' }}"
                >
                    Contact
                </a>

                <!-- Shop (No Dropdown) -->
                <a
                    href="{{ route('shop') }}"
                    class="px-4 py-2 rounded-full text-sm font-semibold transition-all duration-150 flex items-center gap-1.5 {{ request()->routeIs('shop*') ? 'text-white bg-emerald-600 shadow-sm shadow-emerald-500/30' : 'text-slate-700 dark:text-slate-300 hover:text-slate-950 dark:hover:text-white hover:bg-white/80 dark:hover:bg-slate-800/60' }}"
                >
                    Shop
                </a>

            </nav>


            <!-- 3. Header Right Actions -->
            <div class="flex items-center gap-2 sm:gap-3">

                <!-- Dark / Light Theme Toggle -->
                <button
                    type="button"
                    onclick="toggleTheme()"
                    class="p-2.5 rounded-xl text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-800/70 border border-gray-200 dark:border-slate-800 transition-all cursor-pointer focus:outline-none"
                    aria-label="Toggle Dark / Light Mode"
                    title="Toggle Dark / Light Mode"
                >

                    <!-- Sun -->
                    <svg
                        class="w-5 h-5 hidden dark:block text-amber-400 transition-transform hover:rotate-45"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"
                        />
                    </svg>

                    <!-- Moon -->
                    <svg
                        class="w-5 h-5 block dark:hidden text-slate-700 transition-transform hover:-rotate-12"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                        />
                    </svg>

                </button>


                <!-- Cart Icon Button -->
                <a
                    href="{{ route('checkout') }}"
                    class="relative p-2.5 rounded-xl text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-900 border border-transparent hover:border-gray-200 dark:hover:border-slate-800 transition-colors"
                    aria-label="Shopping Cart"
                >

                    <svg
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                        />
                    </svg>

                    <span class="absolute top-1 right-1 w-4 h-4 rounded-full bg-emerald-600 text-white font-bold text-[10px] flex items-center justify-center ring-2 ring-white dark:ring-slate-950">
                        {{ array_sum(array_column(session('cart', []), 'quantity')) }}
                    </span>

                </a>


                <!-- Mobile Hamburger Button -->
                <button
                    type="button"
                    onclick="toggleMobileMenu()"
                    class="md:hidden p-2.5 rounded-xl text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-900 border border-gray-200 dark:border-slate-800 transition-colors cursor-pointer"
                    aria-label="Toggle navigation menu"
                >

                    <svg
                        id="hamburger-icon"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>

                    <svg
                        id="close-icon"
                        class="w-6 h-6 hidden"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>

                </button>

            </div>

        </div>
    </div>


    <!-- ==========================================
         4. PERMANENT HORIZONTAL CATEGORY NAVIGATION
         Displayed directly below the main header
    =========================================== -->

    <div class="w-full border-t border-gray-200 dark:border-slate-800/80 bg-white/90 dark:bg-slate-950/95 backdrop-blur-xl">

        <nav
            aria-label="Product Categories"
            class="max-w-7xl mx-auto flex items-center justify-center lg:justify-center
                   gap-5 sm:gap-7 lg:gap-8
                   h-11 sm:h-12 px-4 sm:px-6 lg:px-8
                   overflow-x-auto whitespace-nowrap scroll-smooth
                   [scrollbar-width:none]
                   [&::-webkit-scrollbar]:hidden"
        >

            @if(isset($navCategories) && $navCategories->count())

                @foreach($navCategories as $cat)

                    <a
                        href="{{ $cat->nav_url }}"
                        class="shrink-0 text-xs sm:text-sm font-semibold transition-colors duration-200
                        {{ request()->url() === $cat->nav_url
                            ? 'text-emerald-500'
                            : 'text-slate-700 dark:text-white hover:text-emerald-500 dark:hover:text-emerald-400' }}"
                    >
                        {{ $cat->name }}
                    </a>

                @endforeach

            @endif

        </nav>

    </div>


    <!-- ==========================================
         5. MOBILE DROPDOWN MENU
    =========================================== -->

    <div
        id="mobile-menu"
        class="hidden md:hidden border-t border-gray-200 dark:border-slate-800/80 py-4 space-y-2 bg-white/95 dark:bg-slate-950/95 backdrop-blur-xl"
    >

        <!-- Home -->
        <a
            href="{{ route('home') }}"
            class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->is('/') ? 'text-white bg-emerald-600' : 'text-slate-700 dark:text-slate-300 hover:text-slate-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-900/60' }}"
            onclick="closeMobileMenu()"
        >
            Home
        </a>

        <!-- About -->
        <a
            href="{{ route('about') }}"
            onclick="closeMobileMenu()"
            class="block px-4 py-2.5 rounded-xl text-sm font-medium {{ request()->is('about*') ? 'text-white bg-emerald-600' : 'text-slate-700 dark:text-slate-300 hover:text-slate-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-900/60' }} transition-colors"
        >
            About
        </a>

        <!-- Contact -->
        <a
            href="{{ route('contact') }}"
            onclick="closeMobileMenu()"
            class="block px-4 py-2.5 rounded-xl text-sm font-medium {{ request()->is('contact*') ? 'text-white bg-emerald-600' : 'text-slate-700 dark:text-slate-300 hover:text-slate-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-900/60' }} transition-colors"
        >
            Contact
        </a>

        <!-- Shop -->
        <a
            href="{{ route('shop') }}"
            onclick="closeMobileMenu()"
            class="block px-4 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('shop*') ? 'text-white bg-emerald-600' : 'text-slate-700 dark:text-slate-300 hover:text-slate-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-900/60' }} transition-colors"
        >
            Shop
        </a>


        <!-- Mobile Categories -->
        @if(isset($navCategories) && $navCategories->count())

            <div class="pt-3 mt-3 border-t border-gray-200 dark:border-slate-800/80 text-center">

                <p class="px-4 mb-2 text-xs font-bold uppercase tracking-wider text-slate-400">
                    Shop by Category
                </p>

                @foreach($navCategories as $cat)

                    <a
                        href="{{ $cat->nav_url }}"
                        class="block px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-emerald-500 hover:bg-gray-100 dark:hover:bg-slate-900/60"
                    >
                        {{ $cat->name }}
                    </a>

                @endforeach

            </div>

        @endif


        <!-- Administrator Console -->
        <div class="pt-2 border-t border-gray-200 dark:border-slate-800/80 flex items-center justify-between px-4">

            <span class="text-xs text-slate-500">
                Administrator Console
            </span>

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

</header>


<!-- ==========================================
     6. MOBILE MENU JAVASCRIPT
=========================================== -->

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const hamburger = document.getElementById('hamburger-icon');
        const close = document.getElementById('close-icon');

        if (!menu || !hamburger || !close) return;

        menu.classList.toggle('hidden');
        hamburger.classList.toggle('hidden');
        close.classList.toggle('hidden');
    }

    function closeMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const hamburger = document.getElementById('hamburger-icon');
        const close = document.getElementById('close-icon');

        if (!menu || !hamburger || !close) return;

        menu.classList.add('hidden');
        hamburger.classList.remove('hidden');
        close.classList.add('hidden');
    }
</script>
