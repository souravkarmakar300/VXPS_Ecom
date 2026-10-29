@extends('layouts.admin-auth')

@php
    $title = 'Admin Sign In';
@endphp

@section('content')
<div class="relative bg-slate-900/90 backdrop-blur-xl border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-2xl shadow-emerald-950/50">
    <!-- Card Header -->
    <div class="text-center mb-6">
        <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-emerald-600/10 border border-emerald-500/20 text-emerald-400 mb-3 shadow-inner">
            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <h1 class="text-2xl font-bold text-white tracking-tight">Admin Sign In</h1>
        <p class="text-sm text-slate-400 mt-1">Authenticate to access the VXPS Control Center</p>
    </div>

    <!-- Session Alerts -->
    @if (session('success'))
        <div class="mb-5">
            <x-admin.alert type="success">
                {{ session('success') }}
            </x-admin.alert>
        </div>
    @endif

    @if (session('error'))
        <div class="mb-5">
            <x-admin.alert type="error">
                {{ session('error') }}
            </x-admin.alert>
        </div>
    @endif

    <!-- Local Development Helper Box -->
    <div class="mb-6 p-3.5 bg-emerald-950/40 border border-emerald-800/50 rounded-xl text-xs">
        <div class="flex items-center justify-between mb-1.5">
            <span class="font-semibold text-emerald-300 flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                Default Admin Credentials
            </span>
            <button 
                type="button" 
                onclick="fillAdminCredentials()" 
                class="text-emerald-400 hover:text-emerald-200 underline font-medium cursor-pointer transition-colors"
                title="Click to auto-fill the login form"
            >
                Auto Fill
            </button>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-1 text-slate-300 font-mono text-[11px]">
            <div>Email: <strong class="text-white select-all">admin@vxps.com</strong></div>
            <div>Password: <strong class="text-white select-all">admin@12345</strong></div>
        </div>
    </div>

    <!-- Login Form -->
    <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4.5" autocomplete="on">
        @csrf

        <!-- Email Field -->
        <x-admin.input
            type="email"
            name="email"
            label="Email Address"
            placeholder="admin@vxps.com"
            :value="old('email')"
            :required="true"
            :autofocus="true"
            autocomplete="email"
        >
            <x-slot:icon>
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                </svg>
            </x-slot:icon>
        </x-admin.input>

        <!-- Password Field -->
        <div class="space-y-1.5">
            <div class="flex items-center justify-between">
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300">
                    Password <span class="text-rose-500 font-bold">*</span>
                </label>
            </div>

            <div class="relative rounded-xl shadow-xs">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-500">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>

                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                    class="block w-full rounded-xl border bg-slate-900/90 text-sm text-white placeholder:text-slate-500 py-2.5 pl-10.5 pr-11 transition-all duration-200 outline-none @error('password') border-rose-400 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 @else border-slate-700/80 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 @enderror"
                />

                <button
                    type="button"
                    onclick="togglePasswordVisibility('password', this)"
                    class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400 hover:text-white transition-colors cursor-pointer"
                    aria-label="Toggle password visibility"
                >
                    <svg class="w-5 h-5 eye-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            @error('password')
                <p class="text-xs font-medium text-rose-400 flex items-center gap-1 mt-1">
                    <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ $message }}</span>
                </p>
            @enderror
        </div>

        <!-- Remember Me Checkbox -->
        <div class="flex items-center justify-between pt-1">
            <label class="flex items-center gap-2 cursor-pointer select-none">
                <input
                    type="checkbox"
                    name="remember"
                    id="remember"
                    class="w-4 h-4 rounded border-slate-700 bg-slate-900 text-emerald-600 focus:ring-emerald-500/30 focus:ring-offset-slate-900 cursor-pointer"
                />
                <span class="text-xs text-slate-300">Remember this device</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <x-admin.button type="submit" variant="primary" class="w-full justify-center text-sm font-semibold py-3">
                <x-slot:icon>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                </x-slot:icon>
                Sign In to Dashboard
            </x-admin.button>
        </div>
    </form>

    <!-- Footer Register Link -->
    {{-- <div class="mt-6 pt-5 border-t border-slate-800 text-center">
        <p class="text-xs text-slate-400">
            Need to add a new administrator?
            <a href="{{ route('admin.register') }}" class="text-emerald-400 hover:text-emerald-300 font-semibold ml-1 transition-colors">
                Register Admin &rarr;
            </a>
        </p>
    </div> --}}
</div>

<script>
    function togglePasswordVisibility(fieldId, button) {
        const field = document.getElementById(fieldId);
        if (field.type === 'password') {
            field.type = 'text';
            button.classList.add('text-emerald-400');
        } else {
            field.type = 'password';
            button.classList.remove('text-emerald-400');
        }
    }

    function fillAdminCredentials() {
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        if (emailInput && passwordInput) {
            emailInput.value = 'admin@vxps.com';
            passwordInput.value = 'admin@12345';
            emailInput.focus();
        }
    }
</script>
@endsection

