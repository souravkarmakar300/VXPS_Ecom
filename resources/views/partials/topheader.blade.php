<!-- Top Announcement Bar -->
<div class="w-full bg-gradient-to-r from-emerald-900 via-emerald-800 to-teal-900 text-white text-[11px] sm:text-xs font-semibold py-1.5 sm:py-2 px-4 shadow-xs relative z-50 border-b border-emerald-700/40">
    <div class="max-w-7xl mx-auto relative flex items-center justify-center min-h-[28px]">

        <!-- Announcements (Center) -->
        <div class="flex items-center justify-center gap-3 sm:gap-5 flex-wrap text-center">
            <span class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 text-amber-300 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.381z" clip-rule="evenodd" />
                </svg>
                <span>Free shipping on orders over $79</span>
            </span>

            <span class="hidden md:inline text-emerald-400/60">&bull;</span>

            <span class="hidden md:flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 text-emerald-300 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <span>100% Australian Owned</span>
            </span>

            <span class="hidden lg:inline text-emerald-400/60">&bull;</span>
            <span class="hidden lg:flex items-center gap-1.5 text-emerald-100">
                <svg class="w-3.5 h-3.5 text-amber-300 shrink-0"
                    fill="currentColor"
                    viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118l-2.8-2.034c-.784-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.068-3.292z"/>
                </svg>
                <span>Top Quality Products</span>
            </span>
        </div>

        <!-- Admin Portal (Right) -->
        <div class="absolute right-0 top-1/2 -translate-y-1/2 hidden sm:flex items-center gap-2 shrink-0">
            @if(Auth::guard('admin')->check())
                <a href="{{ route('admin.dashboard') }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/15 hover:bg-white/25 text-white text-[11px] font-bold border border-white/25 transition-all hover:scale-105 shadow-xs"
                   title="Open Admin Dashboard in new tab">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-300 animate-pulse"></span>
                    <span>Admin Portal</span>
                    <svg class="w-3 h-3 text-emerald-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            @else
                <a href="{{ route('admin.login') }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/15 hover:bg-white/25 text-white text-[11px] font-bold border border-white/25 transition-all hover:scale-105 shadow-xs"
                   title="Open Admin Portal in new tab">
                    <svg class="w-3 h-3 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <span>Admin Portal</span>
                    <svg class="w-3 h-3 text-emerald-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            @endif
        </div>

    </div>
</div>