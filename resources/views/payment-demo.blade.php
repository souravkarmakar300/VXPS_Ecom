@extends('layouts.app')

@section('title', 'Demo Payment | VXPS')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center px-4 py-16 bg-gray-50 dark:bg-slate-950">
    <div class="w-full max-w-md bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-3xl p-8 shadow-xl text-center space-y-5">
        <div class="w-14 h-14 mx-auto rounded-2xl bg-indigo-600 text-white flex items-center justify-center font-black text-xl">V</div>
        <h1 class="text-2xl font-black text-slate-900 dark:text-white">Demo Stripe Checkout</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400">
            Stripe demo mode is on. This page simulates the hosted Stripe login / pay screen for
            <strong class="text-slate-800 dark:text-slate-200">{{ str_replace('_', ' ', $channel) }}</strong>.
        </p>
        <form method="POST" action="{{ route('payment.demo.complete') }}" class="space-y-3">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <button type="submit" class="w-full py-3 rounded-xl bg-[#635BFF] hover:bg-[#544EE0] text-white font-bold text-sm cursor-pointer">
                Simulate successful payment
            </button>
        </form>
        <a href="{{ route('checkout') }}" class="inline-block text-xs font-semibold text-slate-500 hover:text-indigo-600">Cancel and return</a>
    </div>
</div>
@endsection
