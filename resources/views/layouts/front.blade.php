<!DOCTYPE html>
<html lang="fr" class="scroll-smooth bg-[#080914]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SmartFilms Prod | Maison de Production Audiovisuelle & Cinématographique Casablanca')</title>
    <meta name="description" content="@yield('meta_description', 'Maison de production audiovisuelle à Casablanca. Films de marque, spots publicitaires, prises de vues par drone 4K et narration cinématographique au Maroc.')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- OpenGraph Metadata -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', 'SmartFilms Prod | Production Cinématographique Haute Fidélité')">
    <meta property="og:description" content="@yield('og_description', 'Films de marque, spots publicitaires et prises de vues par drone pour les leaders à Casablanca et à l\'international.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('uploads/cinema_corporate_film.png') }}">
    <meta name="twitter:card" content="summary_large_image">

    <!-- JSON-LD LocalBusiness Schema for Casablanca & Morocco GEO SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": ["LocalBusiness", "ProfessionalService"],
      "name": "SmartFilms Prod",
      "image": "{{ asset('uploads/smartfilms_logo.png') }}",
      "telephone": "{{ $settings['phone'] ?? '+212 6 17 20 23 45' }}",
      "email": "{{ $settings['email'] ?? 'contact@smartfilmsprod.com' }}",
      "url": "{{ url('/') }}",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "130 Bv d'Anfa",
        "addressLocality": "Casablanca",
        "postalCode": "20300",
        "addressCountry": "MA"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 33.5875787,
        "longitude": -7.6329473
      },
      "areaServed": ["Casablanca", "Rabat", "Tanger", "Marrakech", "Maroc"],
      "priceRange": "MAD $$$$"
    }
    </script>

    <!-- Google Fonts + Feather / Modern Vector Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,400;1,500;1,600;1,700&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Tailwind CSS Script CDN + Full Custom Configuration -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            obsidian: '#080914',
                            navy: '#101229',
                            surface: '#171936',
                            warmWhite: '#F7F6F3',
                            coral: '#FF4D42',
                            coralHover: '#E94239',
                            lavender: '#B8BDE0',
                            muted: '#8D91A8',
                        }
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        serif: ['"Cormorant Garamond"', 'serif'],
                    }
                }
            }
        }
    </script>

    <!-- Rich Motion & Scroll Animation Styles -->
    <style>
        :root {
            --brand-obsidian: #080914;
            --brand-navy: #101229;
            --brand-surface: #171936;
            --brand-warm-white: #F7F6F3;
            --brand-coral: #FF4D42;
            --brand-coral-hover: #E94239;
            --brand-lavender: #B8BDE0;
            --brand-muted: #8D91A8;
            --ease-premium: cubic-bezier(0.22, 1, 0.36, 1);
            --ease-soft: cubic-bezier(0.16, 1, 0.3, 1);
        }
        body {
            background-color: #080914;
            color: #101229;
            font-family: 'Outfit', sans-serif;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }
        .smartfilms-logo {
            height: 44px !important;
            max-height: 44px !important;
            width: auto !important;
            object-fit: contain !important;
            display: inline-block !important;
        }
        .font-serif-italic {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
        }
        .glass-dark {
            background: rgba(16, 18, 41, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Scroll Animations */
        .reveal-mask {
            overflow: hidden;
            display: block;
        }
        .reveal-line {
            transform: translate3d(0, 115%, 0);
            opacity: 0;
            transition: transform 0.85s var(--ease-premium), opacity 0.85s var(--ease-premium);
            will-change: transform, opacity;
        }
        .reveal-line.revealed {
            transform: translate3d(0, 0, 0);
            opacity: 1;
        }
        .reveal-fade-up {
            opacity: 0;
            transform: translate3d(0, 32px, 0);
            transition: opacity 0.85s var(--ease-premium), transform 0.85s var(--ease-premium);
            will-change: opacity, transform;
        }
        .reveal-fade-up.revealed {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
        .reveal-left {
            opacity: 0;
            transform: translate3d(-50px, 0, 0);
            transition: opacity 0.85s var(--ease-premium), transform 0.85s var(--ease-premium);
            will-change: opacity, transform;
        }
        .reveal-left.revealed {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
        .reveal-right {
            opacity: 0;
            transform: translate3d(50px, 0, 0);
            transition: opacity 0.85s var(--ease-premium), transform 0.85s var(--ease-premium);
            will-change: opacity, transform;
        }
        .reveal-right.revealed {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
        .reveal-scale-up {
            opacity: 0;
            transform: scale(0.92) translate3d(0, 25px, 0);
            transition: opacity 0.85s var(--ease-premium), transform 0.85s var(--ease-premium);
            will-change: opacity, transform;
        }
        .reveal-scale-up.revealed {
            opacity: 1;
            transform: scale(1) translate3d(0, 0, 0);
        }

        .delay-100 { transition-delay: 100ms; }
        .delay-200 { transition-delay: 200ms; }
        .delay-300 { transition-delay: 300ms; }
        .delay-400 { transition-delay: 400ms; }
        .delay-500 { transition-delay: 500ms; }

        .cinema-card {
            transition: transform 0.35s var(--ease-premium), border-color 0.35s var(--ease-premium), box-shadow 0.35s var(--ease-premium);
        }
        .cinema-card:hover {
            transform: translate3d(0, -6px, 0);
        }
        .cinema-card-img {
            transition: transform 0.9s var(--ease-soft);
            will-change: transform;
        }
        .cinema-card:hover .cinema-card-img {
            transform: scale(1.04);
        }
        .cinema-meta-shift {
            transition: transform 0.35s var(--ease-premium), color 0.35s var(--ease-premium);
        }
        .cinema-card:hover .cinema-meta-shift {
            transform: translate3d(5px, 0, 0);
        }

        #mainHeader.scrolled {
            background-color: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(16, 18, 41, 0.08);
            box-shadow: 0 12px 32px -10px rgba(0, 0, 0, 0.08);
        }
        #mainHeader.scrolled .nav-link {
            color: #101229 !important;
        }
        #mainHeader.scrolled #mobileMenuBtn {
            color: #101229 !important;
        }
        #mainHeader.scrolled #topInfoStrip {
            max-height: 0;
            padding: 0;
            opacity: 0;
            overflow: hidden;
            border-bottom: none;
        }

        @keyframes marquee {
            0% { transform: translate3d(0, 0, 0); }
            100% { transform: translate3d(-50%, 0, 0); }
        }
        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 35s linear infinite;
            will-change: transform;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>

    <!-- Compiled Vite Assets (when available) -->
    @php
        $manifestPath = public_path('build/manifest.json');
        $manifest = file_exists($manifestPath) ? json_decode(file_get_contents($manifestPath), true) : null;
        $cssFile = $manifest['resources/css/app.css']['file'] ?? null;
        $jsFile = $manifest['resources/js/app.js']['file'] ?? null;
    @endphp
    @if($cssFile)
        <link rel="stylesheet" href="{{ asset('build/' . $cssFile) }}">
    @endif
    @if($jsFile)
        <script type="module" src="{{ asset('build/' . $jsFile) }}"></script>
    @endif
</head>
<body class="bg-[#080914] text-[#101229] antialiased selection:bg-[#FF4D42] selection:text-white">

    <!-- Shared Header -->
    @include('components.header')

    <!-- Main Content Flow -->
    <main>
        @yield('content')
    </main>

    <!-- Shared Studio Footer -->
    @include('components.footer')

    <!-- 4K Cinema Video Lightbox Modal -->
    <div id="videoModal" class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl hidden flex items-center justify-center p-4 transition-opacity duration-300">
        <div class="relative w-full max-w-5xl bg-[#080914] rounded-3xl overflow-hidden border border-white/15 shadow-2xl">
            <div class="flex justify-between items-center px-6 py-4 border-b border-white/10 bg-[#101229]">
                <span id="modalVideoTitle" class="font-bold text-xs uppercase tracking-widest text-white/90 font-mono">SmartFilms Cinema Player</span>
                <button onclick="closeVideoModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-[#FF4D42] text-white flex items-center justify-center text-xs transition-colors">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="aspect-video w-full bg-black">
                <iframe id="modalIframe" class="w-full h-full border-0" src="" allow="autoplay; fullscreen" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- WhatsApp VIP Concierge Button -->
    <a href="https://wa.me/{{ $settings['whatsapp'] ?? '212617202345' }}?text={{ urlencode('Bonjour SmartFilms, j\'aimerais échanger sur un projet de production audiovisuelle.') }}" target="_blank" class="fixed bottom-6 right-6 z-40 bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-3.5 rounded-full shadow-2xl flex items-center gap-3 transition-all hover:scale-105 group border-2 border-white/20">
        <span class="relative flex h-3 w-3">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
        </span>
        <i class="bi bi-whatsapp text-lg"></i>
        <span class="text-xs uppercase font-bold tracking-wider hidden sm:inline">WhatsApp Studio</span>
    </a>

    <!-- Core Motion, Scroll Animation & Interactive Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // 1. Sticky Luxury White Header on Scroll
            const headerEl = document.getElementById('mainHeader');
            if (headerEl) {
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 40) {
                        headerEl.classList.add('scrolled');
                    } else {
                        headerEl.classList.remove('scrolled');
                    }
                }, { passive: true });

                if (window.scrollY > 40) {
                    headerEl.classList.add('scrolled');
                }
            }

            // 2. Global IntersectionObserver Scroll Animation System
            const revealElements = document.querySelectorAll('.reveal-line, .reveal-fade-up, .reveal-left, .reveal-right, .reveal-scale-up');
            
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('revealed');
                            obs.unobserve(entry.target);
                        }
                    });
                }, {
                    root: null,
                    threshold: 0.12,
                    rootMargin: '0px 0px -50px 0px'
                });

                revealElements.forEach(el => observer.observe(el));
            } else {
                revealElements.forEach(el => el.classList.add('revealed'));
            }

            // Fallback trigger for elements already in viewport
            setTimeout(() => {
                revealElements.forEach(el => {
                    const rect = el.getBoundingClientRect();
                    if (rect.top < window.innerHeight) {
                        el.classList.add('revealed');
                    }
                });
            }, 100);
        });

        // 3. Video Modal Lightbox
        function openVideoModal(url, title) {
            const modal = document.getElementById('videoModal');
            const iframe = document.getElementById('modalIframe');
            const titleEl = document.getElementById('modalVideoTitle');
            if (modal && iframe) {
                titleEl.innerText = title || 'SmartFilms Cinema Player';
                let embedUrl = url;
                if (url.includes('youtube.com/watch?v=')) {
                    embedUrl = url.replace('watch?v=', 'embed/');
                }
                if (!embedUrl.includes('autoplay=1')) {
                    embedUrl += (embedUrl.includes('?') ? '&' : '?') + 'autoplay=1';
                }
                iframe.src = embedUrl;
                modal.classList.remove('hidden');
            }
        }

        function closeVideoModal() {
            const modal = document.getElementById('videoModal');
            const iframe = document.getElementById('modalIframe');
            if (modal && iframe) {
                iframe.src = '';
                modal.classList.add('hidden');
            }
        }
    </script>
    @stack('scripts')
</body>
</html>
