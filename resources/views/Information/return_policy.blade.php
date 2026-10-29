@extends('layouts.app')

@section('title', 'Refund & Return Policy | VXPS - Everyday Electronics & Smart Tech')

@section('meta')
    <meta name="description" content="Review the 30-day refund, return, and exchange policy for VX Power Semiconductor Pty Ltd (VXPS), compliant with Australian Consumer Law guarantees.">
@endsection

@section('content')
    <!-- 1. HERO HEADER -->
    <section class="relative py-16 lg:py-20 overflow-hidden bg-gradient-to-b from-slate-100 via-white to-white dark:from-slate-900 dark:via-slate-950 dark:to-slate-950 border-b border-gray-200 dark:border-slate-800/80 transition-colors">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(16,185,129,0.12),transparent_50%)] pointer-events-none"></div>

        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Breadcrumbs -->
            <nav class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 text-xs text-slate-600 dark:text-slate-400 mb-6 shadow-xs">
                <a href="{{ route('home') }}" class="hover:text-emerald-600 dark:hover:text-white transition-colors">Home</a>
                <span>/</span>
                <span class="text-slate-400">Information</span>
                <span>/</span>
                <span class="text-emerald-600 dark:text-emerald-400 font-semibold">Return &amp; Refund Policy</span>
            </nav>

            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-700 dark:text-emerald-400 text-xs font-bold uppercase tracking-wider mb-4">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>30-Day Money-Back Guarantee &bull; Hassle-Free Returns</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 dark:text-white tracking-tight uppercase max-w-3xl mx-auto leading-tight">
                Refund &amp; Returns Policy
            </h1>

            <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 max-w-2xl mx-auto mt-4 leading-relaxed font-normal">
                We take immense pride in our electronic craftsmanship. If your purchase doesn't exceed expectations, we offer a transparent <strong class="text-slate-900 dark:text-white">30-day return policy</strong>.
            </p>
        </div>
    </section>

    <!-- 2. MAIN POLICY CONTENT -->
    <section class="py-16 bg-white dark:bg-slate-950 transition-colors">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

            <!-- 30-Day Guarantee Card -->
            <div class="p-6 sm:p-8 rounded-3xl bg-slate-50 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-800 shadow-xs">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">1</span>
                        <span>30-Day Returns Overview</span>
                    </h2>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/10 text-emerald-600 dark:text-emerald-300 border border-emerald-500/20">
                        Standard Window
                    </span>
                </div>

                <div class="mt-4 text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed space-y-3 font-normal">
                    <p>
                        Our standard return policy covers <strong>30 calendar days</strong> from the date of parcel receipt. If 30 days have elapsed since your confirmed delivery, we unfortunately cannot offer a full refund or exchange under standard change-of-mind terms (your statutory Australian Consumer Law guarantees still apply).
                    </p>
                    <p>
                        To qualify for a valid return:
                    </p>
                    <ul class="space-y-2 pt-1">
                        <li class="flex items-center gap-2.5 text-slate-700 dark:text-slate-200">
                            <span class="w-4 h-4 rounded-full bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-[10px] font-bold shrink-0">✓</span>
                            <span>The item must be unused, in the identical condition received.</span>
                        </li>
                        <li class="flex items-center gap-2.5 text-slate-700 dark:text-slate-200">
                            <span class="w-4 h-4 rounded-full bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-[10px] font-bold shrink-0">✓</span>
                            <span>It must remain in its original manufacturer packaging with all cords, tags, and accessories intact.</span>
                        </li>
                        <li class="flex items-center gap-2.5 text-slate-700 dark:text-slate-200">
                            <span class="w-4 h-4 rounded-full bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-[10px] font-bold shrink-0">✓</span>
                            <span>A valid receipt or proof of purchase (such as your VXPS Order Confirmation) is required.</span>
                        </li>
                    </ul>
                    <p class="pt-2 text-xs text-slate-500 dark:text-slate-400 italic">
                        Please do not send your purchased items back directly to the manufacturer. All returns must be routed through our Adelaide fulfillment depot.
                    </p>
                </div>
            </div>

            <!-- Non-Returnable Items & Partial Refunds -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Non-Returnable -->
                <div class="p-6 rounded-3xl bg-white dark:bg-slate-900/40 border border-gray-200 dark:border-slate-800 shadow-xs space-y-3">
                    <h3 class="text-base font-bold text-slate-900 dark:text-white flex items-center gap-2">
                        <span class="w-6 h-6 rounded-lg bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-xs font-bold">2</span>
                        <span>Exempt / Non-Returnable Goods</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                        Certain classes of merchandise are exempt from return:
                    </p>
                    <ul class="space-y-1.5 text-xs text-slate-600 dark:text-slate-300 font-normal">
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">&bull;</span> Gift cards and vouchers</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">&bull;</span> Downloadable digital software or license keys</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">&bull;</span> Personal hygiene, intimate or sanitary items</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">&bull;</span> Flammable liquids, gases, or hazardous materials</li>
                    </ul>
                </div>

                <!-- Partial Refunds -->
                <div class="p-6 rounded-3xl bg-white dark:bg-slate-900/40 border border-gray-200 dark:border-slate-800 shadow-xs space-y-3">
                    <h3 class="text-base font-bold text-slate-900 dark:text-white flex items-center gap-2">
                        <span class="w-6 h-6 rounded-lg bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-xs font-bold">3</span>
                        <span>Conditional Partial Refunds</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                        Partial refunds may be granted in specific circumstances:
                    </p>
                    <ul class="space-y-1.5 text-xs text-slate-600 dark:text-slate-300 font-normal">
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">&bull;</span> Items showing obvious signs of physical use</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">&bull;</span> Opened software, games, media with broken seal</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">&bull;</span> Any product missing cables, adapters, or parts</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">&bull;</span> Items returned past 30 days without prior clearance</li>
                    </ul>
                </div>
            </div>

            <!-- Refund Process & Timelines -->
            <div class="p-6 sm:p-8 rounded-3xl bg-white dark:bg-slate-900/40 border border-gray-200 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">4</span>
                    <span>Refund Assessment &amp; Processing</span>
                </h2>
                <div class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed space-y-3 font-normal">
                    <p>
                        Once your returned parcel reaches our inspection warehouse, our technicians will examine the condition of the goods within <strong>2 business days</strong>. We will dispatch an automated email notifying you that your return has been logged and whether your refund is approved.
                    </p>
                    <p>
                        Upon approval, your refund is credited automatically back to your original payment method (Credit Card, Apple Pay, Google Pay, or Bank Transfer). Financial institutions typically process the credit within <strong>3 to 7 business days</strong>.
                    </p>
                </div>
            </div>

            <!-- Late or Missing Refunds Troubleshooting Guide -->
            <div class="p-6 sm:p-8 rounded-3xl bg-slate-50 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">5</span>
                    <span>Late or Missing Refunds Troubleshooting</span>
                </h2>
                <p class="text-sm text-slate-600 dark:text-slate-300 font-normal">
                    If you haven&rsquo;t spotted your approved credit after 7 business days, follow these standard steps:
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-4 gap-3 pt-1">
                    <div class="p-4 rounded-2xl bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 text-center">
                        <span class="text-xs font-mono font-bold text-emerald-600 dark:text-emerald-400 uppercase">Step 1</span>
                        <h4 class="text-xs font-bold text-slate-900 dark:text-white mt-1">Recheck Statement</h4>
                        <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-1 leading-snug">Review your banking app or transaction history again.</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 text-center">
                        <span class="text-xs font-mono font-bold text-emerald-600 dark:text-emerald-400 uppercase">Step 2</span>
                        <h4 class="text-xs font-bold text-slate-900 dark:text-white mt-1">Contact Card Issuer</h4>
                        <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-1 leading-snug">It may take time before pending refunds are officially posted.</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 text-center">
                        <span class="text-xs font-mono font-bold text-emerald-600 dark:text-emerald-400 uppercase">Step 3</span>
                        <h4 class="text-xs font-bold text-slate-900 dark:text-white mt-1">Consult Your Bank</h4>
                        <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-1 leading-snug">Some financial institutions require 2-3 days clearing time.</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 text-center">
                        <span class="text-xs font-mono font-bold text-emerald-600 dark:text-emerald-400 uppercase">Step 4</span>
                        <h4 class="text-xs font-bold text-slate-900 dark:text-white mt-1">Contact VXPS</h4>
                        <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-1 leading-snug">Email us with your order number for immediate tracing.</p>
                    </div>
                </div>
            </div>

            <!-- Exchanges, Sale Items & Gifts -->
            <div class="p-6 sm:p-8 rounded-3xl bg-white dark:bg-slate-900/40 border border-gray-200 dark:border-slate-800 shadow-xs space-y-5">
                <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">6</span>
                    <span>Exchanges, Gifts &amp; Clearance Items</span>
                </h2>

                <div class="space-y-4 text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                    <div>
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white">Defective or Damaged Replacements:</h4>
                        <p class="mt-0.5">We replace units immediately if they arrive defective or sustained transit damage. Email photographs of the damage alongside your order number to <a href="mailto:anthonyh@vxpwertech.com" class="text-emerald-600 dark:text-emerald-400 font-semibold underline">anthonyh@vxpwertech.com</a> for an immediate replacement dispatch.</p>
                    </div>

                    <div class="border-t border-gray-100 dark:border-slate-800 pt-3">
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white">Gifts:</h4>
                        <p class="mt-0.5">If the item was marked as a gift when purchased and shipped directly to you, you will receive a store credit certificate for the value of your return. If the gift giver had the order shipped to themselves, the refund must be returned to the purchaser&rsquo;s original payment method.</p>
                    </div>

                    <div class="border-t border-gray-100 dark:border-slate-800 pt-3">
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white">Sale &amp; Promotional Items:</h4>
                        <p class="mt-0.5">Only regular-priced merchandise qualifies for standard change-of-mind refunds. Final clearance or promotional flash-sale items cannot be refunded unless deemed faulty under consumer law.</p>
                    </div>
                </div>
            </div>

            <!-- Return Shipping Address Box -->
            <div class="p-6 sm:p-8 rounded-3xl bg-slate-50 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">7</span>
                    <span>Return Shipping Instructions &amp; Address</span>
                </h2>

                <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                    You are responsible for paying your own shipping postage when returning an item for change-of-mind. Initial delivery costs are non-refundable. If you are returning items valued over $75, we strongly recommend utilizing a trackable postal service (e.g., Australia Post Tracked eParcel) or acquiring postal insurance.
                </p>

                <!-- Return Address Card -->
                <div class="p-5 rounded-2xl bg-white dark:bg-slate-900 border border-emerald-500/30 flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs font-mono uppercase tracking-widest text-emerald-600 dark:text-emerald-400 font-bold">Authorized Return Depot</span>
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white mt-0.5">VX Power Semiconductor Pty Ltd</h4>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 mt-1">
                            1D, Kyle Street, Glenside, Adelaide, SA 5065, Australia
                        </p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                            Attn: Returns &amp; Warranty Department
                        </p>
                    </div>
                </div>
            </div>

            <!-- Direct Support Card -->
            <div class="p-6 sm:p-8 rounded-3xl bg-gradient-to-r from-emerald-950 via-slate-950 to-teal-950 text-white border border-emerald-800/40 shadow-xl flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <span class="text-xs font-mono uppercase tracking-widest text-emerald-400 font-bold">Need Return Assistance?</span>
                    <h3 class="text-xl font-black text-white mt-1">Ready to Initiate a Return or Exchange?</h3>
                    <p class="text-xs sm:text-sm text-slate-300 mt-1 max-w-xl">
                        Reach out to our customer care team with your order number and we will guide you through the process.
                    </p>
                </div>
                <div class="flex items-center gap-3 shrink-0">
                    <a href="{{ route('contact') }}" class="px-6 py-3 rounded-full bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold text-xs uppercase tracking-wider transition-all shadow-md">
                        Start Return
                    </a>
                    <a href="mailto:anthonyh@vxpwertech.com" class="px-6 py-3 rounded-full bg-white/10 hover:bg-white/20 text-white border border-white/20 font-bold text-xs uppercase tracking-wider transition-all">
                        Email Support
                    </a>
                </div>
            </div>

        </div>
    </section>
@endsection
