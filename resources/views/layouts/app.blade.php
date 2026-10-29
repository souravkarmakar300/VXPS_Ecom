<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Website Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <title>@yield('title', 'VXPS - Everyday Electronics & Smart Tech')</title>

    @hasSection('meta')
        @yield('meta')
    @else
        <meta name="description" content="Discover portable chargers, fast charging power banks, and modern lifestyle tech essentials engineered for reliable daily performance at VXPS Australia.">
    @endif

    <!-- Dark/Light theme initializer before DOM paints to prevent FOUC -->
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }
    </style>

    @stack('styles')
    @yield('styles')
</head>
<body class="min-h-full flex flex-col bg-white text-slate-900 dark:bg-slate-950 dark:text-slate-100 selection:bg-indigo-500 selection:text-white antialiased transition-colors duration-200">

    {{-- Top Announcement Bar --}}
    @hasSection('topheader')
        @yield('topheader')
    @else
        @include('partials.topheader')
    @endif

    {{-- Primary Header Navigation --}}
    @hasSection('header')
        @yield('header')
    @else
        @include('partials.header')
    @endif

    {{-- Main Page Content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    @hasSection('footer')
        @yield('footer')
    @else
        @include('partials.footer')
    @endif

    <!-- Global Layout Scripts -->
    <script>
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
        }

        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const hamburger = document.getElementById('hamburger-icon');
            const close = document.getElementById('close-icon');

            if (!menu) return;

            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                if (hamburger) hamburger.classList.add('hidden');
                if (close) close.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
                if (hamburger) hamburger.classList.remove('hidden');
                if (close) close.classList.add('hidden');
            }
        }

        // Dynamic category fetch & navbar submenu initialization
        let categoriesLoaded = false;
        function renderNavbarCategories(data) {
            if (!Array.isArray(data) || data.length === 0) return;
            const grid = document.getElementById('navbar-submenu-grid');
            if (!grid) return;

            grid.innerHTML = data.map(cat => {
                const imgHtml = cat.image
                    ? `<img src="${cat.image}" alt="${cat.name}" class="w-full h-full object-cover" onerror="this.src='/images/categories/jump.png'">`
                    : `<svg class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>`;

                return `
                    <a href="${cat.url}" class="group/item flex flex-col items-center p-2.5 sm:p-3 rounded-2xl bg-gray-50 dark:bg-slate-950/60 hover:bg-indigo-50 dark:hover:bg-slate-800/80 border border-gray-100 dark:border-slate-800/70 hover:border-indigo-400/50 transition-all text-center">
                        <div class="w-11 h-11 rounded-xl bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-750 flex items-center justify-center mb-2 overflow-hidden shrink-0 group-hover/item:scale-110 shadow-xs transition-transform">
                            ${imgHtml}
                        </div>
                        <span class="text-xs font-bold text-slate-900 dark:text-white group-hover/item:text-indigo-600 dark:group-hover/item:text-indigo-400 line-clamp-1">
                            ${cat.name}
                        </span>
                        <span class="text-[10px] text-slate-400 dark:text-slate-500 mt-0.5">
                            ${cat.products_count} ${cat.products_count === 1 ? 'item' : 'items'}
                        </span>
                    </a>
                `;
            }).join('');
        }

        function loadSubmenuCategories() {
            if (categoriesLoaded) return;
            categoriesLoaded = true;

            fetch('{{ route("api.categories") }}')
                .then(res => res.json())
                .then(data => renderNavbarCategories(data))
                .catch(err => console.error('Error loading submenu categories:', err));
        }

        document.addEventListener('DOMContentLoaded', () => {
            loadSubmenuCategories();

            const wrapper = document.getElementById('shop-dropdown-wrapper');
            const menu = document.getElementById('shop-category-submenu');
            if (wrapper && menu) {
                let closeTimeout = null;
                const openMenu = () => {
                    clearTimeout(closeTimeout);
                    menu.classList.remove('invisible', 'opacity-0', 'pointer-events-none');
                    menu.classList.add('visible', 'opacity-100', 'pointer-events-auto');
                };
                const closeMenu = () => {
                    closeTimeout = setTimeout(() => {
                        menu.classList.remove('visible', 'opacity-100', 'pointer-events-auto');
                        menu.classList.add('invisible', 'opacity-0', 'pointer-events-none');
                    }, 150);
                };

                wrapper.addEventListener('mouseenter', openMenu);
                wrapper.addEventListener('mouseleave', closeMenu);
                menu.addEventListener('mouseenter', openMenu);
                menu.addEventListener('mouseleave', closeMenu);
            }
        });
    </script>

    <!-- Testimonials Carousel Controller (Shared across Welcome, About, and store pages) -->
    <script>
        (function() {
            let testimonialsAutoplayTimer = null;
            let isUserInteracting = false;

            function getTestimonialsStep() {
                const track = document.getElementById('testimonialsTrack');
                if (!track) return 360;
                const card = track.querySelector('.testimonial-card');
                if (!card) return 360;
                const style = window.getComputedStyle(track);
                const gap = parseFloat(style.columnGap || style.gap) || 24;
                return card.offsetWidth + gap;
            }

            window.scrollTestimonials = function(direction) {
                const track = document.getElementById('testimonialsTrack');
                if (!track) return;

                const step = getTestimonialsStep();
                const maxScroll = track.scrollWidth - track.clientWidth;
                if (maxScroll <= 0) return;

                if (direction > 0) {
                    // Next: if near or at the end, loop smoothly back to start
                    if (track.scrollLeft >= maxScroll - 15) {
                        track.scrollTo({ left: 0, behavior: 'smooth' });
                    } else {
                        const target = Math.min(maxScroll, track.scrollLeft + step);
                        track.scrollTo({ left: target, behavior: 'smooth' });
                    }
                } else {
                    // Prev: if near or at the start, loop smoothly to end
                    if (track.scrollLeft <= 15) {
                        track.scrollTo({ left: maxScroll, behavior: 'smooth' });
                    } else {
                        const target = Math.max(0, track.scrollLeft - step);
                        track.scrollTo({ left: target, behavior: 'smooth' });
                    }
                }

                resetAutoplay();
            };

            window.goToTestimonial = function(index) {
                const track = document.getElementById('testimonialsTrack');
                const dotsContainer = document.getElementById('testimonialsDots');
                if (!track) return;

                const dots = dotsContainer ? dotsContainer.querySelectorAll('.t-dot') : [];
                const totalDots = dots.length || 6;
                const maxScroll = track.scrollWidth - track.clientWidth;
                if (maxScroll <= 0) return;

                const targetScroll = totalDots > 1 ? (index / (totalDots - 1)) * maxScroll : 0;
                track.scrollTo({ left: targetScroll, behavior: 'smooth' });

                resetAutoplay();
            };

            window.updateTestimonialDots = function() {
                const track = document.getElementById('testimonialsTrack');
                const dotsContainer = document.getElementById('testimonialsDots');
                if (!track || !dotsContainer) return;

                const dots = dotsContainer.querySelectorAll('.t-dot');
                if (!dots.length) return;

                const maxScroll = track.scrollWidth - track.clientWidth;
                let activeIndex = 0;
                if (maxScroll > 0) {
                    const ratio = Math.max(0, Math.min(1, track.scrollLeft / maxScroll));
                    activeIndex = Math.min(dots.length - 1, Math.round(ratio * (dots.length - 1)));
                }

                dots.forEach((dot, idx) => {
                    if (idx === activeIndex) {
                        dot.classList.remove('w-2.5', 'bg-gray-300', 'dark:bg-slate-700', 'hover:bg-gray-400');
                        dot.classList.add('w-8', 'bg-emerald-500');
                        dot.setAttribute('aria-current', 'true');
                    } else {
                        dot.classList.remove('w-8', 'bg-emerald-500');
                        dot.classList.add('w-2.5', 'bg-gray-300', 'dark:bg-slate-700', 'hover:bg-gray-400');
                        dot.removeAttribute('aria-current');
                    }
                });
            };

            function startAutoplay() {
                stopAutoplay();
                const track = document.getElementById('testimonialsTrack');
                if (!track) return;
                testimonialsAutoplayTimer = setInterval(() => {
                    if (!isUserInteracting) {
                        window.scrollTestimonials(1);
                    }
                }, 3000);
            }

            function stopAutoplay() {
                if (testimonialsAutoplayTimer) {
                    clearInterval(testimonialsAutoplayTimer);
                    testimonialsAutoplayTimer = null;
                }
            }

            function resetAutoplay() {
                stopAutoplay();
                startAutoplay();
            }

            function initTestimonials() {
                const track = document.getElementById('testimonialsTrack');
                if (!track) return;

                // Initial dot synchronization
                window.updateTestimonialDots();

                // Listen to scroll events on track with debounce
                let scrollTimeout;
                track.addEventListener('scroll', () => {
                    clearTimeout(scrollTimeout);
                    scrollTimeout = setTimeout(window.updateTestimonialDots, 35);
                }, { passive: true });

                // Recalculate dots on window resize
                window.addEventListener('resize', () => {
                    window.updateTestimonialDots();
                });

                // Autoplay setup
                startAutoplay();

                // Pause on hover or touch
                const wrapper = track.closest('.testimonials-carousel-wrapper') || track.parentElement;
                if (wrapper) {
                    wrapper.addEventListener('mouseenter', () => { isUserInteracting = true; stopAutoplay(); });
                    wrapper.addEventListener('mouseleave', () => { isUserInteracting = false; startAutoplay(); });
                    wrapper.addEventListener('touchstart', () => { isUserInteracting = true; stopAutoplay(); }, { passive: true });
                    wrapper.addEventListener('touchend', () => { isUserInteracting = false; startAutoplay(); }, { passive: true });
                }

                // Mouse drag-to-scroll support for desktop
                let isMouseDown = false;
                let startX = 0;
                let scrollLeftStart = 0;
                let hasDragged = false;

                track.addEventListener('mousedown', (e) => {
                    isMouseDown = true;
                    hasDragged = false;
                    startX = e.pageX - track.offsetLeft;
                    scrollLeftStart = track.scrollLeft;
                    track.classList.remove('scroll-smooth', 'snap-x', 'snap-mandatory');
                    track.style.cursor = 'grabbing';
                    track.style.userSelect = 'none';
                    isUserInteracting = true;
                    stopAutoplay();
                });

                window.addEventListener('mouseup', () => {
                    if (!isMouseDown) return;
                    isMouseDown = false;
                    track.style.cursor = '';
                    track.style.removeProperty('user-select');
                    track.classList.add('scroll-smooth', 'snap-x', 'snap-mandatory');
                    isUserInteracting = false;
                    startAutoplay();
                });

                track.addEventListener('mousemove', (e) => {
                    if (!isMouseDown) return;
                    e.preventDefault();
                    const x = e.pageX - track.offsetLeft;
                    const walk = (x - startX) * 1.25;
                    if (Math.abs(walk) > 5) hasDragged = true;
                    track.scrollLeft = scrollLeftStart - walk;
                });

                track.addEventListener('click', (e) => {
                    if (hasDragged) {
                        e.preventDefault();
                        e.stopPropagation();
                    }
                }, true);
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initTestimonials);
            } else {
                initTestimonials();
            }
        })();
    </script>

    @stack('scripts')
    @yield('scripts')
</body>
</html>

