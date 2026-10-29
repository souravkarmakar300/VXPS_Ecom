@extends('layouts.app')

@section('title', 'Terms & Conditions | VXPS - Everyday Electronics & Smart Tech')

@section('meta')
    <meta name="description" content="Read the Terms and Conditions of use and sale for VX Power Semiconductor Pty Ltd (VXPS), covering orders, shipping, deliveries, and Australian legal warranties.">
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
                <span class="text-emerald-600 dark:text-emerald-400 font-semibold">Terms &amp; Conditions</span>
            </nav>

            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-700 dark:text-emerald-400 text-xs font-bold uppercase tracking-wider mb-4">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Legal Agreement &bull; Australian Consumer Law</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 dark:text-white tracking-tight uppercase max-w-3xl mx-auto leading-tight">
                Terms &amp; Conditions
            </h1>

            <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 max-w-2xl mx-auto mt-4 leading-relaxed font-normal">
                Please review these Terms &amp; Conditions carefully before purchasing or utilizing services provided by <strong class="text-slate-900 dark:text-white">VX Power Semiconductor Pty Ltd</strong>.
            </p>
        </div>
    </section>

    <!-- 2. MAIN TERMS CONTENT -->
    <section class="py-16 bg-white dark:bg-slate-950 transition-colors">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

            <!-- Introduction Card -->
            <div class="p-6 sm:p-8 rounded-3xl bg-slate-50 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-800 shadow-xs">
                <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">1</span>
                    <span>Acceptance of Terms</span>
                </h2>
                <div class="mt-4 text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed space-y-3 font-normal">
                    <p>
                        Welcome to <strong>VXPowerSemiconductor.com.au</strong> (operated by <strong>VX Power Semiconductor Pty Ltd</strong>, ABN / Registered Business in South Australia). If you continue to browse and use this website or place an order, you are agreeing to comply with and be bound by the following terms and conditions of use.
                    </p>
                    <p>
                        Together with our <a href="{{ route('privacy') }}" class="text-emerald-600 dark:text-emerald-400 font-semibold underline hover:text-emerald-500">Privacy Policy</a> and <a href="{{ route('returns') }}" class="text-emerald-600 dark:text-emerald-400 font-semibold underline hover:text-emerald-500">Refund &amp; Return Policy</a>, these terms govern our commercial relationship with you in relation to this website. If you disagree with any part of these terms and conditions, please discontinue use of our website immediately.
                    </p>
                </div>
            </div>

            <!-- Website Usage Rules -->
            <div class="p-6 sm:p-8 rounded-3xl bg-white dark:bg-slate-900/40 border border-gray-200 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">2</span>
                    <span>Terms of Website Use</span>
                </h2>

                <ul class="space-y-3 text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-500 font-bold shrink-0 mt-1">&bull;</span>
                        <span>The content of the pages of this website is for your general information and personal use only. It is subject to change without prior notice.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-500 font-bold shrink-0 mt-1">&bull;</span>
                        <span>Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness, or suitability of the information and materials found on this site. You acknowledge that inaccuracies or errors may occur, and we expressly exclude liability to the fullest extent permitted by Australian law.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-500 font-bold shrink-0 mt-1">&bull;</span>
                        <span>Your use of any information or materials on this website is entirely at your own risk. It remains your responsibility to verify that any products, specifications, or services available through this site meet your exact requirements.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-500 font-bold shrink-0 mt-1">&bull;</span>
                        <span>Unauthorized use of this website may give rise to a claim for civil damages and/or constitute a criminal offence.</span>
                    </li>
                </ul>
            </div>

            <!-- Intellectual Property -->
            <div class="p-6 sm:p-8 rounded-3xl bg-white dark:bg-slate-900/40 border border-gray-200 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">3</span>
                    <span>Copyright &amp; Intellectual Property</span>
                </h2>
                <div class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed space-y-3 font-normal">
                    <p>
                        This website contains proprietary material owned by or licensed to VX Power Semiconductor Pty Ltd. This material includes, but is not limited to, product designs, schematics, website layout, look, appearance, graphical assets, and brand trademarks.
                    </p>
                    <p>
                        Reproduction, scraping, duplication, or commercial exploitation is strictly prohibited other than in accordance with Australian copyright laws. All third-party trademarks and trade names reproduced on this site (such as Apple Find My&trade; or Android&trade;) are acknowledged and remain the property of their respective trademark holders.
                    </p>
                </div>
            </div>

            <!-- External Links & Order Refusal -->
            <div class="p-6 sm:p-8 rounded-3xl bg-white dark:bg-slate-900/40 border border-gray-200 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">4</span>
                    <span>External Links &amp; Right of Order Refusal</span>
                </h2>
                <div class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed space-y-3 font-normal">
                    <p>
                        From time to time, this website may include links to external websites for your convenience. These links do not signify that we endorse the website(s), and we bear no responsibility for third-party content.
                    </p>
                    <p>
                        We reserve the explicit right to refuse or cancel fulfillment of any order due to pricing errors, suspected fraudulent transactions, stock unavailability, or breach of these terms. In the event of a cancellation initiated by us, a full prompt refund will be issued to your original payment method.
                    </p>
                </div>
            </div>

            <!-- Shipping Information & Order Processing (Anchor #shipping) -->
            <div id="shipping" class="p-6 sm:p-8 rounded-3xl bg-slate-50 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-800 shadow-xs space-y-5 scroll-mt-24">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">5</span>
                        <span>Shipping Information &amp; Order Processing</span>
                    </h2>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/10 text-emerald-600 dark:text-emerald-300 border border-emerald-500/20">
                        Dispatch Guarantee
                    </span>
                </div>

                <div class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed space-y-3 font-normal">
                    <p>
                        Orders placed on weekends or outside operating hours are queued for processing the next business day at <strong>9:00 AM ACST</strong>. Orders received after 9:00 AM are processed on the subsequent business day. Standard dispatch is completed within <strong>1–2 business days</strong> depending on inventory staging.
                    </p>
                    <p>
                        Because we offer a wide catalogue of premium electronic accessories, occasional warehouse transfers may require extra time before dispatch. Estimated delivery timeframes provided at checkout are standard transit times supplied by our <strong>eParcel logistics partners</strong>. We do not guarantee exact third-party delivery dates as actual transit remains in the custody of third-party carriers.
                    </p>
                    <p>
                        All consignments require a <strong>physical signature upon delivery</strong> to safeguard against porch piracy and lost parcels. Customers may independently request an &ldquo;Authority to Leave&rdquo; (ATL) directly with the carrier; however, an ATL is an agreement between you and the carrier, and VX Power Semiconductor cannot accept liability for missing parcels once marked delivered under an ATL directive.
                    </p>
                </div>

                <!-- Warning Notice Callout -->
                <div class="p-4 sm:p-5 rounded-2xl bg-amber-500/10 border border-amber-500/30 text-amber-900 dark:text-amber-200 text-xs sm:text-sm leading-relaxed space-y-2">
                    <div class="flex items-center gap-2 font-bold uppercase tracking-wider text-amber-700 dark:text-amber-300">
                        <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span>Important Delivery Address Notice</span>
                    </div>
                    <p>
                        Any parcel returns resulting from an incomplete or inaccurate address, or items returned due to non-collection at the local post office depot, will incur a re-shipping / handling fee. Please double-check your complete delivery address (including Unit, Apartment, Suite, or Level number and Business name) prior to confirming payment.
                    </p>
                </div>
            </div>

            <!-- High Value Orders & Bulky Goods -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- High Value Orders -->
                <div class="p-6 rounded-3xl bg-white dark:bg-slate-900/40 border border-gray-200 dark:border-slate-800 shadow-xs space-y-3">
                    <h3 class="text-base font-bold text-slate-900 dark:text-white flex items-center gap-2">
                        <span class="w-6 h-6 rounded-lg bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-xs font-bold">6</span>
                        <span>High-Value Order Verification</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                        To protect our business and cardholders against credit fraud and unauthorized account misuse, we reserve the right to request proof of identity or card authorization for high-value orders prior to dispatch.
                    </p>
                </div>

                <!-- Bulky Items -->
                <div class="p-6 rounded-3xl bg-white dark:bg-slate-900/40 border border-gray-200 dark:border-slate-800 shadow-xs space-y-3">
                    <h3 class="text-base font-bold text-slate-900 dark:text-white flex items-center gap-2">
                        <span class="w-6 h-6 rounded-lg bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-xs font-bold">7</span>
                        <span>Bulky &amp; Heavy Freight Items</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                        In the case of oversized power banks, bulk electronics, or large parcels destined for remote/regional delivery zones, our customer service team will contact you should additional freight surcharges apply.
                    </p>
                </div>
            </div>

            <!-- Governing Law -->
            <div class="p-6 sm:p-8 rounded-3xl bg-slate-50 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-800 shadow-xs">
                <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm font-black shrink-0">8</span>
                    <span>Governing Law &amp; Jurisdiction</span>
                </h2>
                <p class="mt-3 text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                    Your use of this website, purchases made herein, and any legal disputes arising out of your relationship with VX Power Semiconductor Pty Ltd are governed by and construed under the laws of the State of South Australia and the Commonwealth of Australia.
                </p>
            </div>

            <!-- Contact & Inquiries Card -->
            <div class="p-6 sm:p-8 rounded-3xl bg-gradient-to-r from-emerald-950 via-slate-950 to-teal-950 text-white border border-emerald-800/40 shadow-xl flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <span class="text-xs font-mono uppercase tracking-widest text-emerald-400 font-bold">Direct Assistance</span>
                    <h3 class="text-xl font-black text-white mt-1">Have Questions Regarding Our Terms?</h3>
                    <p class="text-xs sm:text-sm text-slate-300 mt-1 max-w-xl">
                        Our Adelaide-based customer support team is available Monday to Friday, 9:00 AM &ndash; 6:00 PM ACST.
                    </p>
                </div>
                <div class="flex items-center gap-3 shrink-0">
                    <a href="{{ route('contact') }}" class="px-6 py-3 rounded-full bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold text-xs uppercase tracking-wider transition-all shadow-md">
                        Contact Support
                    </a>
                    <a href="mailto:anthonyh@vxpwertech.com" class="px-6 py-3 rounded-full bg-white/10 hover:bg-white/20 text-white border border-white/20 font-bold text-xs uppercase tracking-wider transition-all">
                        Email Legal
                    </a>
                </div>
            </div>

        </div>
    </section>
@endsection
