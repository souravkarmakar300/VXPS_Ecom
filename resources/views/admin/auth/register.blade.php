@extends('layouts.admin-auth')

@php
    $title = 'Register Admin';
@endphp

@section('content')
<div class="relative bg-slate-900/90 backdrop-blur-xl border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-2xl shadow-emerald-950/50">
    <!-- Card Header -->
    <div class="text-center mb-6">
        <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-emerald-600/10 border border-emerald-500/20 text-emerald-400 mb-3 shadow-inner">
            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
        </div>
        <h1 class="text-2xl font-bold text-white tracking-tight">Register New Admin</h1>
        <p class="text-sm text-slate-400 mt-1">Create an authorized administrative account for VXPS</p>
    </div>

    <!-- Session Alerts -->
    @if (session('error'))
        <div class="mb-5">
            <x-admin.alert type="error">
                {{ session('error') }}
            </x-admin.alert>
        </div>
    @endif

    <!-- Registration Form -->
    <form action="{{ route('admin.register.submit') }}" method="POST" class="space-y-4" autocomplete="off">
        @csrf

        <!-- Name Field -->
        <x-admin.input
            type="text"
            name="name"
            label="Full Name"
            placeholder="e.g. John Doe"
            :value="old('name')"
            :required="true"
            :autofocus="true"
            autocomplete="name"
        >
            <x-slot:icon>
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </x-slot:icon>
        </x-admin.input>

        <!-- Email Field -->
        <x-admin.input
            type="email"
            name="email"
            label="Work Email Address"
            placeholder="admin@vxps.com"
            :value="old('email')"
            :required="true"
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
            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300">
                Password <span class="text-rose-500 font-bold">*</span>
            </label>

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
                    autocomplete="new-password"
                    placeholder="Minimum 8 characters"
                    class="block w-full rounded-xl border bg-slate-900/90 text-sm text-white placeholder:text-slate-500 py-2.5 pl-10.5 pr-11 transition-all duration-200 outline-none @error('password') border-rose-400 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 @else border-slate-700/80 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 @enderror"
                />

                <button
                    type="button"
                    onclick="togglePasswordVisibility('password', this)"
                    class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400 hover:text-white transition-colors cursor-pointer"
                    aria-label="Toggle password visibility"
                >
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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

        <!-- Confirm Password Field -->
        <div class="space-y-1.5">
            <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-slate-300">
                Confirm Password <span class="text-rose-500 font-bold">*</span>
            </label>

            <div class="relative rounded-xl shadow-xs">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-500">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>

                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Re-enter your password"
                    class="block w-full rounded-xl border border-slate-700/80 bg-slate-900/90 text-sm text-white placeholder:text-slate-500 py-2.5 pl-10.5 pr-11 transition-all duration-200 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20"
                />

                <button
                    type="button"
                    onclick="togglePasswordVisibility('password_confirmation', this)"
                    class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400 hover:text-white transition-colors cursor-pointer"
                    aria-label="Toggle password confirmation visibility"
                >
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Security Notice -->
        <div class="p-3 bg-slate-800/40 border border-slate-700/50 rounded-xl text-slate-400 text-xs flex items-start gap-2">
            <svg class="w-4 h-4 text-emerald-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Password must be at least 8 characters long and securely stored with bcrypt hashing.</span>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <x-admin.button type="submit" variant="primary" class="w-full justify-center text-sm font-semibold py-3">
                <x-slot:icon>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </x-slot:icon>
                Create Admin Account
            </x-admin.button>
        </div>
    </form>

    <!-- Footer Login Link -->
    <div class="mt-6 pt-5 border-t border-slate-800 text-center">
        <p class="text-xs text-slate-400">
            Already have an administrator account?
            <a href="{{ route('admin.login') }}" class="text-emerald-400 hover:text-emerald-300 font-semibold ml-1 transition-colors">
                Sign In &rarr;
            </a>
        </p>
    </div>
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
</script>
@endsection

