<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-950">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Admin Portal' }} - VXPS</title>

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
<body class="h-full antialiased text-slate-100 flex flex-col justify-between selection:bg-emerald-500 selection:text-white">
    <!-- Background glow decoration -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[720px] h-[480px] bg-gradient-to-tr from-emerald-600/20 via-teal-600/15 to-transparent blur-3xl rounded-full"></div>
        <div class="absolute -bottom-40 right-1/4 w-[500px] h-[400px] bg-gradient-to-bl from-teal-600/10 via-emerald-600/15 to-transparent blur-3xl rounded-full"></div>
    </div>

    <!-- Header / Branding Top Bar -->
    <header class="w-full px-6 py-5 flex items-center justify-between border-b border-slate-800/80 bg-slate-950/60 backdrop-blur-md">
        <a href="{{ route('home') }}" class="flex items-center gap-3 group">
            {{-- <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-500 flex items-center justify-center text-white font-black text-xl shadow-lg shadow-emerald-500/25 ring-1 ring-white/20 group-hover:scale-105 transition-transform duration-200">
                V
            </div> --}}

            <div class="flex flex-col">
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="VXPS Commerce Engine"
                    class="h-10 w-auto object-contain"
                />
            </div>

            {{-- <div class="flex flex-col">
                <span class="text-lg font-black tracking-wider text-white">VXPS</span>
                <span class="text-[10px] uppercase font-bold tracking-widest text-emerald-400">Commerce Engine</span>
            </div> --}}
        </a>

        <div class="flex items-center gap-3 text-xs">
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-500/10 text-emerald-300 border border-emerald-500/20">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                Admin Portal
            </span>
            <a href="{{ route('home') }}" class="text-slate-400 hover:text-white transition-colors duration-150 flex items-center gap-1">
                <span>Back to Store</span>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
            </a>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="flex-1 flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="w-full max-w-md">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full py-4 text-center text-xs text-slate-500 border-t border-slate-900 bg-slate-950/40">
        <p>&copy; {{ date('Y') }} VXPS eCommerce Platform. All rights reserved. Secure Administrator Access.</p>
    </footer>
</body>
</html>

