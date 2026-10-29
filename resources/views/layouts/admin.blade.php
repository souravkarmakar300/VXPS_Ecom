<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Website Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <title>{{ $title ?? 'Dashboard' }} - VXPS Admin</title>

    <!-- Theme Initialization Script (Prevents FOUC) -->
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
        }
    </style>
</head>
<body class="h-full antialiased bg-gray-100 text-slate-800 dark:bg-slate-950 dark:text-slate-200 selection:bg-emerald-500 selection:text-white flex overflow-hidden transition-colors">

    <!-- Mobile Sidebar Backdrop -->
    <div 
        id="mobile-backdrop"
        onclick="toggleSidebar(false)"
        class="fixed inset-0 bg-slate-950/80 backdrop-blur-xs z-40 hidden md:hidden transition-opacity"
        aria-hidden="true"
    ></div>

    <!-- Sidebar Container -->
    <aside 
        id="admin-sidebar"
        class="fixed inset-y-0 left-0 z-50 w-64 bg-white dark:bg-slate-900/95 border-r border-gray-200 dark:border-slate-800/80 flex flex-col justify-between -translate-x-full md:translate-x-0 md:static transition-transform duration-200 ease-in-out"
    >
        <!-- Sidebar Brand -->
        <div class="h-16 px-6 flex items-center justify-between border-b border-gray-200 dark:border-slate-800/80">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 group select-none">
                <img src="{{ asset('images/logo.png') }}" alt="VXPS" class="h-8 w-auto object-contain transition-transform duration-200 group-hover:scale-105">
                <span class="text-[9px] uppercase font-bold tracking-widest text-emerald-600 dark:text-emerald-400">Admin</span>
            </a>
            
            <button 
                type="button" 
                onclick="toggleSidebar(false)" 
                class="md:hidden text-slate-500 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white p-1 rounded-lg"
                aria-label="Close menu"
            >
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
            <div class="px-3 pb-2 text-[10px] font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Core Navigation</div>

            <a 
                href="{{ route('admin.dashboard') }}" 
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-150 {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white shadow-sm shadow-emerald-600/30' : 'text-slate-600 dark:text-slate-400 hover:bg-gray-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white' }}"
            >
                <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Dashboard</span>
            </a>

            <div class="px-3 pt-4 pb-2 text-[10px] font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">eCommerce Modules</div>

            <a 
                href="{{ route('admin.products.index') }}" 
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-150 {{ request()->routeIs('admin.products.*', 'admin.categories.*') ? 'bg-emerald-600 text-white shadow-sm shadow-emerald-600/30' : 'text-slate-600 dark:text-slate-400 hover:bg-gray-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white' }}"
            >
                <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <span>Products</span>
            </a>

            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:bg-gray-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white transition-all">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span>Orders</span>
                </div>
                <span class="text-[10px] px-2 py-0.5 rounded-full bg-gray-200 dark:bg-slate-800 text-slate-600 dark:text-slate-400 border border-gray-300 dark:border-slate-700/60">Ready</span>
            </a>

            @php
                $unreadContactsCount = \App\Models\Contact::where('status', 'unread')->count();
            @endphp
            <a 
                href="{{ route('admin.contacts.index') }}" 
                class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-150 {{ request()->routeIs('admin.contacts.*') ? 'bg-emerald-600 text-white shadow-sm shadow-emerald-600/30' : 'text-slate-600 dark:text-slate-400 hover:bg-gray-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white' }}"
            >
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>Contacts</span>
                </div>
                @if($unreadContactsCount > 0)
                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-emerald-500 text-white font-bold">
                        {{ $unreadContactsCount }}
                    </span>
                @else
                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-gray-200 dark:bg-slate-800 text-slate-500 dark:text-slate-400 border border-gray-300 dark:border-slate-700/60">
                        View
                    </span>
                @endif
            </a>
        </nav>

        <!-- Sidebar Footer / Current Admin Details -->
        <div class="p-3 border-t border-gray-200 dark:border-slate-800/80 bg-gray-50/70 dark:bg-slate-900/40">
            <div class="flex items-center gap-3 p-2 rounded-xl bg-white dark:bg-slate-800/50 border border-gray-200 dark:border-slate-800 shadow-2xs">
                <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-emerald-500 to-teal-500 flex items-center justify-center text-white font-bold text-sm shrink-0 shadow-sm">
                    {{ strtoupper(substr(Auth::guard('admin')->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-semibold text-slate-900 dark:text-white truncate">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</p>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 truncate">{{ Auth::guard('admin')->user()->email ?? '' }}</p>
                </div>
            </div>

            <!-- Logout Button Form -->
            <form action="{{ route('admin.logout') }}" method="POST" class="mt-2">
                @csrf
                <button 
                    type="submit" 
                    class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-xl text-xs font-semibold text-rose-600 dark:text-rose-300 hover:text-rose-700 dark:hover:text-rose-200 hover:bg-rose-50 dark:hover:bg-rose-950/40 border border-rose-200 dark:border-rose-900/40 transition-colors cursor-pointer"
                >
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Sign Out</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Viewport Content Area -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden bg-gray-50 dark:bg-slate-950">
        <!-- Top Navbar -->
        <header class="h-16 px-4 sm:px-6 flex items-center justify-between border-b border-gray-200 dark:border-slate-800/80 bg-white/80 dark:bg-slate-900/70 backdrop-blur-md shrink-0 transition-colors">
            <div class="flex items-center gap-3">
                <button 
                    type="button" 
                    onclick="toggleSidebar(true)" 
                    class="md:hidden p-2 rounded-xl text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors cursor-pointer"
                    aria-label="Open navigation sidebar"
                >
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <h1 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white tracking-tight">
                    {{ $header ?? 'Admin Dashboard' }}
                </h1>
            </div>

            <div class="flex items-center gap-3">
                <!-- Theme Toggle Button -->
                <button 
                    type="button" 
                    onclick="window.toggleTheme ? window.toggleTheme() : (document.documentElement.classList.toggle('dark'), localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light')" 
                    class="p-2 rounded-xl text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-800 border border-gray-200 dark:border-slate-800 transition-colors cursor-pointer"
                    title="Toggle Theme"
                    aria-label="Toggle Theme"
                >
                    <!-- Sun Icon (shown in dark mode) -->
                    <svg class="w-5 h-5 hidden dark:block text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <!-- Moon Icon (shown in light mode) -->
                    <svg class="w-5 h-5 block dark:hidden text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <!-- Status Pill -->
                <div class="hidden sm:inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 text-xs font-medium">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Admin Active</span>
                </div>

                <a 
                    href="{{ route('home') }}" 
                    target="_blank"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white bg-gray-100 hover:bg-gray-200 dark:bg-slate-800/80 dark:hover:bg-slate-800 border border-gray-300 dark:border-slate-700/70 transition-all"
                >
                    <span>View Store</span>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>

                <!-- Logout Quick Button -->
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button 
                        type="submit" 
                        class="p-2 rounded-xl text-slate-500 dark:text-slate-400 hover:text-rose-600 dark:hover:text-rose-400 hover:bg-rose-50 dark:hover:bg-rose-950/30 border border-transparent hover:border-rose-200 dark:hover:border-rose-900/40 transition-colors cursor-pointer"
                        title="Sign Out"
                    >
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </header>

        <!-- Main Scrollable Body -->
        <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
            <!-- Flash Message Banner -->
            @if (session('success'))
                <div class="mb-6">
                    <x-admin.alert type="success">
                        {{ session('success') }}
                    </x-admin.alert>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6">
                    <x-admin.alert type="error">
                        {{ session('error') }}
                    </x-admin.alert>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script>
        function toggleSidebar(open) {
            const sidebar = document.getElementById('admin-sidebar');
            const backdrop = document.getElementById('mobile-backdrop');
            if (open) {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
            }
        }
    </script>
    @stack('scripts')
</body>
</html>

