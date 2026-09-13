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
      "image": "{{ asset('uploads/smartfilms_logo_white.png') }}",
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

    <!-- Rich Motion, Hero Entrance & Navbar Smooth Transition Styles -->
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
            --ease-premium: cubic-bezier(0.16, 1, 0.3, 1);
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

        /* Hero Sequential Entrance Keyframes & Classes */
        .hero-eyebrow {
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 800ms var(--ease-premium), transform 800ms var(--ease-premium);
            will-change: opacity, transform;
        }
        .hero-eyebrow.revealed {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }

        .hero-serif {
            opacity: 0;
            transform: translateY(14px);
            transition: opacity 850ms var(--ease-premium), transform 850ms var(--ease-premium);
            will-change: opacity, transform;
        }
        .hero-serif.revealed {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }

        .hero-title-line1,
        .hero-title-line2 {
            transform: translate3d(0, 105%, 0);
            opacity: 0;
            transition: transform 900ms var(--ease-premium), opacity 900ms var(--ease-premium);
            will-change: transform, opacity;
        }
        .hero-title-line1.revealed,
        .hero-title-line2.revealed {
            transform: translate3d(0, 0, 0) !important;
            opacity: 1 !important;
        }

        .hero-desc {
            opacity: 0;
            transform: translateY(14px);
            transition: opacity 850ms var(--ease-premium), transform 850ms var(--ease-premium);
            will-change: opacity, transform;
        }
        .hero-desc.revealed {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }

        .hero-cta {
            opacity: 0;
            transform: translateY(12px);
            transition: opacity 850ms var(--ease-premium), transform 850ms var(--ease-premium), background-color 300ms ease, box-shadow 300ms ease;
            will-change: opacity, transform;
        }
        .hero-cta.revealed {
            opacity: 1 !important;
            transform: translateY(0) !important;
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
            transform: translate3d(0, 0, 0) !important;
            opacity: 1 !important;
        }
        .reveal-fade-up {
            opacity: 0;
            transform: translate3d(0, 32px, 0);
            transition: opacity 0.85s var(--ease-premium), transform 0.85s var(--ease-premium);
            will-change: opacity, transform;
        }
        .reveal-fade-up.revealed {
            opacity: 1 !important;
            transform: translate3d(0, 0, 0) !important;
        }
        .reveal-left {
            opacity: 0;
            transform: translate3d(-50px, 0, 0);
            transition: opacity 0.85s var(--ease-premium), transform 0.85s var(--ease-premium);
            will-change: opacity, transform;
        }
        .reveal-left.revealed {
            opacity: 1 !important;
            transform: translate3d(0, 0, 0) !important;
        }
        .reveal-right {
            opacity: 0;
            transform: translate3d(50px, 0, 0);
            transition: opacity 0.85s var(--ease-premium), transform 0.85s var(--ease-premium);
            will-change: opacity, transform;
        }
        .reveal-right.revealed {
            opacity: 1 !important;
            transform: translate3d(0, 0, 0) !important;
        }
        .reveal-scale-up {
            opacity: 0;
            transform: scale(0.92) translate3d(0, 25px, 0);
            transition: opacity 0.85s var(--ease-premium), transform 0.85s var(--ease-premium);
            will-change: opacity, transform;
        }
        .reveal-scale-up.revealed {
            opacity: 1 !important;
            transform: scale(1) translate3d(0, 0, 0) !important;
        }

        /* Navbar & Two-Logo Crossfade */
        #mainHeader {
            background-color: transparent;
            border-bottom: 1px solid transparent;
            box-shadow: none;
            transition:
                background-color 500ms var(--ease-premium),
                color 400ms ease,
                box-shadow 500ms ease,
                border-color 500ms ease,
                padding 450ms var(--ease-premium);
        }
        #navInner {
            height: 80px;
            transition: height 450ms var(--ease-premium);
        }
        .logo-white,
        .logo-black {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%) scale(1);
            transition:
                opacity 400ms var(--ease-premium),
                transform 500ms var(--ease-premium);
            pointer-events: none;
        }
        .logo-white {
            opacity: 1;
        }
        .logo-black {
            opacity: 0;
            transform: translateY(-50%) scale(0.97);
        }
        .nav-link {
            color: rgba(255, 255, 255, 0.85);
            position: relative;
            transition: color 400ms ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0%;
            height: 2px;
            background-color: #FF4D42;
            transition: width 300ms var(--ease-premium);
        }
        .nav-link:hover {
            color: #ffffff;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .nav-link.active-link::after {
            width: 100%;
            background-color: rgba(255, 255, 255, 0.7);
        }
        .header-cta {
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.4);
            background-color: transparent;
            transition: color 400ms ease, border-color 400ms ease, background-color 400ms ease, transform 300ms ease;
        }
        .header-cta:hover {
            background-color: #ffffff;
            color: #111111;
            border-color: #ffffff;
            transform: scale(1.02);
        }
        #mobileMenuBtn {
            color: #ffffff;
            transition: color 400ms ease;
        }

        /* Scrolled Navbar Theme */
        #mainHeader.is-scrolled,
        #mainHeader.scrolled {
            background-color: rgba(255, 255, 255, 0.94) !important;
            backdrop-filter: blur(14px) !important;
            -webkit-backdrop-filter: blur(14px) !important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.06) !important;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06) !important;
        }
        #mainHeader.is-scrolled #navInner,
        #mainHeader.scrolled #navInner {
            height: 68px !important;
        }
        #mainHeader.is-scrolled .logo-white,
        #mainHeader.scrolled .logo-white {
            opacity: 0 !important;
            transform: translateY(-50%) scale(0.97) !important;
        }
        #mainHeader.is-scrolled .logo-black,
        #mainHeader.scrolled .logo-black {
            opacity: 1 !important;
            transform: translateY(-50%) scale(1) !important;
        }
        #mainHeader.is-scrolled .nav-link,
        #mainHeader.scrolled .nav-link {
            color: #111111 !important;
        }
        #mainHeader.is-scrolled .nav-link:hover,
        #mainHeader.scrolled .nav-link:hover {
            color: #FF4D42 !important;
        }
        #mainHeader.is-scrolled .nav-link.active-link::after,
        #mainHeader.scrolled .nav-link.active-link::after {
            background-color: #111111 !important;
        }
        #mainHeader.is-scrolled .header-cta,
        #mainHeader.scrolled .header-cta {
            color: #111111 !important;
            border-color: rgba(0, 0, 0, 0.25) !important;
            background-color: transparent !important;
        }
        #mainHeader.is-scrolled .header-cta:hover,
        #mainHeader.scrolled .header-cta:hover {
            background-color: #111111 !important;
            color: #ffffff !important;
            border-color: #111111 !important;
        }
        #mainHeader.is-scrolled #mobileMenuBtn,
        #mainHeader.scrolled #mobileMenuBtn {
            color: #111111 !important;
        }
        #mainHeader.is-scrolled #topInfoStrip,
        #mainHeader.scrolled #topInfoStrip {
            max-height: 0 !important;
            padding: 0 !important;
            opacity: 0 !important;
            overflow: hidden !important;
            border-bottom: none !important;
        }

        /* Reduced Motion */
        @media (prefers-reduced-motion: reduce) {
            *, ::before, ::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
            .hero-eyebrow, .hero-serif, .hero-title-line1, .hero-title-line2, .hero-desc, .hero-cta,
            .reveal-line, .reveal-fade-up, .reveal-left, .reveal-right, .reveal-scale-up {
                transform: none !important;
                opacity: 1 !important;
            }
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
            // Smooth Scroll Navbar Transition
            const headerEl = document.getElementById('mainHeader');
            if (headerEl) {
                const onScroll = () => {
                    if (window.scrollY > 60) {
                        headerEl.classList.add('is-scrolled', 'scrolled');
                    } else {
                        headerEl.classList.remove('is-scrolled', 'scrolled');
                    }
                };
                window.addEventListener('scroll', onScroll, { passive: true });
                onScroll();
            }
        });

        // Video Modal Lightbox
        function openVideoModal(url, title) {
            const modal = document.getElementById('videoModal');
            const iframe = document.getElementById('modalIframe');
            const titleEl = document.getElementById('modalVideoTitle');
            if (modal && iframe) {
                titleEl.innerText = title || 'SmartFilms Cinema Player';
                let embedUrl = url;
                if (url && url.includes('youtube.com/watch?v=')) {
                    embedUrl = url.replace('watch?v=', 'embed/');
                }
                if (embedUrl && !embedUrl.includes('autoplay=1')) {
                    embedUrl += (embedUrl.includes('?') ? '&' : '?') + 'autoplay=1';
                }
                iframe.src = embedUrl || '';
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
