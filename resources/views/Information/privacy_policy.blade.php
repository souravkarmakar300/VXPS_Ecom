@extends('layouts.app')

@section('title', 'Privacy Policy | VXPS - Everyday Electronics & Smart Tech')

@section('meta')
    <meta name="description" content="Learn how VX Power Semiconductor Pty Ltd (VXPS) collects, protects, and manages your personal information in strict compliance with the Australian Privacy Principles.">
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
                <span class="text-emerald-600 dark:text-emerald-400 font-semibold">Privacy Policy</span>
            </nav>

            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-700 dark:text-emerald-400 text-xs font-bold uppercase tracking-wider mb-4">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Privacy &amp; Data Protection &bull; Privacy Act 1988</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 dark:text-white tracking-tight uppercase max-w-3xl mx-auto leading-tight">
                Privacy Policy
            </h1>

            <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 max-w-2xl mx-auto mt-4 leading-relaxed font-normal">
                Your privacy is paramount to <strong class="text-slate-900 dark:text-white">VX Power Semiconductor Pty Ltd</strong>. Read how we safeguard, use, and process your personal data.
            </p>
        </div>
    </section>

    <!-- 2. MAIN PRIVACY POLICY CONTENT -->
    <section class="py-16 bg-white dark:bg-slate-950 transition-colors">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

            <!-- Overview Card -->
            <div class="p-6 sm:p-8 rounded-3xl bg-slate-50 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-800 shadow-xs">
                <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">1</span>
                    <span>Commitment to Your Privacy</span>
                </h2>
                <div class="mt-4 text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed space-y-3 font-normal">
                    <p>
                        This Privacy Policy outlines how <strong>VX Power Semiconductor Pty Ltd</strong> (&ldquo;VXPS&rdquo;, &ldquo;we&rdquo;, &ldquo;us&rdquo;, or &ldquo;our&rdquo;) collects, handles, stores, and protects personal information provided by you while navigating or making transactions on <strong>VXPowerSemiconductor.com.au</strong>.
                    </p>
                    <p>
                        We are strictly committed to ensuring your privacy is protected in compliance with the <strong>Privacy Act 1988 (Cth)</strong> and the <strong>Australian Privacy Principles (APPs)</strong>. Should we request specific identifying information when you interact with this website, you can rest assured it will only ever be used in direct accordance with this policy.
                    </p>
                </div>
            </div>

            <!-- What We Collect -->
            <div class="p-6 sm:p-8 rounded-3xl bg-white dark:bg-slate-900/40 border border-gray-200 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">2</span>
                    <span>Information We Collect</span>
                </h2>
                <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                    During your customer journey, checkout, or support requests, we may collect the following categories of data:
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 pt-2">
                    <div class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-800 flex items-start gap-3">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0 mt-2"></span>
                        <div>
                            <h4 class="text-xs sm:text-sm font-bold text-slate-900 dark:text-white">Customer Identity &amp; Contact</h4>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Full name, billing and shipping delivery addresses, contact telephone numbers, and email address.</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-800 flex items-start gap-3">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0 mt-2"></span>
                        <div>
                            <h4 class="text-xs sm:text-sm font-bold text-slate-900 dark:text-white">Demographic &amp; Location</h4>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Postcode, Australian state, order destination, customer language, and product interest preferences.</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-800 flex items-start gap-3">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0 mt-2"></span>
                        <div>
                            <h4 class="text-xs sm:text-sm font-bold text-slate-900 dark:text-white">Commercial Transactions</h4>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Order histories, purchased items, invoices, payment authorization tokens (credit card data is never stored on our local servers).</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-800 flex items-start gap-3">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0 mt-2"></span>
                        <div>
                            <h4 class="text-xs sm:text-sm font-bold text-slate-900 dark:text-white">Surveys, Inquiries &amp; Feedback</h4>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Inquiry tickets, warranty claim notes, survey responses, and feedback regarding product quality.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- What We Do With Information -->
            <div class="p-6 sm:p-8 rounded-3xl bg-white dark:bg-slate-900/40 border border-gray-200 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">3</span>
                    <span>How We Use Your Information</span>
                </h2>
                <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                    We collect customer details to understand your needs, fulfill our legal warranties, and provide superior service, specifically for:
                </p>

                <ul class="space-y-3 text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-500 font-bold shrink-0 mt-1">&bull;</span>
                        <span><strong>Order Fulfillment &amp; Invoicing:</strong> Processing transactions, generating tax invoices, and organizing carrier dispatches with eParcel and couriers.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-500 font-bold shrink-0 mt-1">&bull;</span>
                        <span><strong>Product &amp; Hardware Improvement:</strong> Analyzing customer feedback to engineer safer, more resilient charging solutions and educational toys.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-500 font-bold shrink-0 mt-1">&bull;</span>
                        <span><strong>Direct Communications:</strong> Periodically distributing notifications regarding order tracking, warranty service, or occasional promotional discounts (with one-click unsubscribe links).</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-500 font-bold shrink-0 mt-1">&bull;</span>
                        <span><strong>Market Research:</strong> Reaching out to verified customers via email to evaluate service performance and adapt catalog offerings.</span>
                    </li>
                </ul>
            </div>

            <!-- Data Security -->
            <div class="p-6 sm:p-8 rounded-3xl bg-slate-50 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">4</span>
                    <span>Security &amp; Data Safeguards</span>
                </h2>
                <div class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed space-y-3 font-normal">
                    <p>
                        We are steadfast in maintaining the security of your data. To prevent unauthorized access, tampering, or disclosure, we have implemented modern physical, electronic, and managerial procedures.
                    </p>
                    <p>
                        All storefront transmissions and payment authorizations are secured through industry-standard <strong>256-Bit SSL/TLS Encryption</strong>. Card data is tokenized directly via PCI-DSS Level 1 certified payment gateways and never retained on unencrypted local drives.
                    </p>
                </div>
            </div>

            <!-- Cookies Policy -->
            <div class="p-6 sm:p-8 rounded-3xl bg-white dark:bg-slate-900/40 border border-gray-200 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">5</span>
                    <span>How We Use Cookies</span>
                </h2>
                <div class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed space-y-3 font-normal">
                    <p>
                        A cookie is a small file placed on your computer or device&rsquo;s storage. Cookies assist in analyzing web traffic, remembering shopping cart items, and maintaining theme preferences (such as your chosen Dark or Light mode state).
                    </p>
                    <p>
                        We utilize statistical traffic log cookies solely to identify visited pages and optimize navigation. This data is reviewed in aggregate and cleared periodically. Cookies in no way grant us access to your computer or confidential files. You may accept or decline cookies via your browser settings at any time; however, disabling essential session cookies may impede checkout operations.
                    </p>
                </div>
            </div>

            <!-- Controlling Your Information -->
            <div class="p-6 sm:p-8 rounded-3xl bg-white dark:bg-slate-900/40 border border-gray-200 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">6</span>
                    <span>Controlling &amp; Accessing Your Personal Information</span>
                </h2>
                <div class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed space-y-3 font-normal">
                    <p>
                        <strong>We will never sell, lease, or distribute your personal details to third parties</strong> unless we possess your explicit authorization or are compelled by Australian judicial authorities.
                    </p>
                    <p>
                        Under the <em>Privacy Act 1988</em>, you have the right to request a formal copy of any personal information we maintain concerning you, or request immediate correction of inaccurate or outdated records.
                    </p>
                    <p>
                        To request access, request data deletion, or update records, please lodge an inquiry with our Privacy Officer at <a href="mailto:anthonyh@vxpwertech.com" class="text-emerald-600 dark:text-emerald-400 font-semibold underline">anthonyh@vxpwertech.com</a>.
                    </p>
                </div>
            </div>

            <!-- Privacy Contact Card -->
            <div class="p-6 sm:p-8 rounded-3xl bg-gradient-to-r from-emerald-950 via-slate-950 to-teal-950 text-white border border-emerald-800/40 shadow-xl flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <span class="text-xs font-mono uppercase tracking-widest text-emerald-400 font-bold">Privacy Officer</span>
                    <h3 class="text-xl font-black text-white mt-1">Need Information Regarding Your Records?</h3>
                    <p class="text-xs sm:text-sm text-slate-300 mt-1 max-w-xl">
                        Contact our dedicated privacy compliance department in Adelaide, South Australia.
                    </p>
                </div>
                <div class="flex items-center gap-3 shrink-0">
                    <a href="{{ route('contact') }}" class="px-6 py-3 rounded-full bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold text-xs uppercase tracking-wider transition-all shadow-md">
                        Contact Support
                    </a>
                    <a href="mailto:anthonyh@vxpwertech.com" class="px-6 py-3 rounded-full bg-white/10 hover:bg-white/20 text-white border border-white/20 font-bold text-xs uppercase tracking-wider transition-all">
                        Email Privacy Team
                    </a>
                </div>
            </div>

        </div>
    </section>
@endsection
