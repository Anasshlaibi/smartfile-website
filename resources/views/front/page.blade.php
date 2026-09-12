@php
    $menus = \App\Models\Menu::whereNull('parent_id')->orderBy('order')->with('children.children')->get();
    $projects = \App\Models\Project::orderBy('order')->get();
    $teamMembers = \App\Models\TeamMember::orderBy('order')->get();
    $categories = $projects->pluck('category')->unique()->filter()->values();
    $sitePhone = \App\Models\Setting::get('phone', '+212 6 17 20 23 45');
    $siteEmail = \App\Models\Setting::get('email', 'contact@smartfilmsprod.com');
    $siteAddress = \App\Models\Setting::get('address', '130 Bv d\'Anfa, 20300 Casablanca, Maroc');
    $siteWhatsApp = \App\Models\Setting::get('whatsapp', '212617202345');
@endphp
<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->meta_title ?? 'SmartFilms Prod | Maison de Production Audiovisuelle & Cinématographique Casablanca' }}</title>
    @if($page->meta_description)
        <meta name="description" content="{{ $page->meta_description }}">
    @endif
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- OpenGraph Metadata -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $page->meta_title ?? $page->title }} - SmartFilms Prod">
    <meta property="og:description" content="{{ $page->meta_description ?? 'Maison de production audiovisuelle à Casablanca. Films institutionnels, spots publicitaires, drone 4K et narration cinématographique au Maroc.' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('uploads/smartfilms_logo.png') }}">
    <meta name="twitter:card" content="summary_large_image">

    <!-- JSON-LD LocalBusiness Schema for Casablanca & Morocco GEO SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": ["LocalBusiness", "ProfessionalService"],
      "name": "SmartFilms Prod",
      "image": "{{ asset('uploads/smartfilms_logo.png') }}",
      "telephone": "{{ $sitePhone }}",
      "email": "{{ $siteEmail }}",
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
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
          "opens": "09:00",
          "closes": "19:00"
        }
      ],
      "areaServed": [
        {"@type": "City", "name": "Casablanca"},
        {"@type": "City", "name": "Rabat"},
        {"@type": "City", "name": "Tanger"},
        {"@type": "City", "name": "Marrakech"},
        {"@type": "Country", "name": "Maroc"}
      ],
      "priceRange": "MAD $$$$",
      "description": "SmartFilms Prod est une société de production audiovisuelle premium basée à Casablanca, spécialisée dans la réalisation de films d'entreprise 4K/8K, spots publicitaires, prises de vues aériennes par drone et stratégie de contenu vidéo."
    }
    </script>

    <!-- Tailwind CSS + Google Fonts + AOS Animation Library -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,400;1,500;1,600;1,700&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        :root {
            --brand-obsidian: #080914;
            --brand-navy: #101229;
            --brand-navy-card: #171936;
            --brand-coral: #FF4D42;
            --brand-coral-hover: #E03E33;
            --brand-bg: #F8F9FC;
        }
        body {
            font-family: "Outfit", sans-serif;
            background-color: var(--brand-bg);
            color: #101229;
            overflow-x: hidden;
        }
        .font-serif-italic {
            font-family: "Cormorant Garamond", serif;
            font-style: italic;
        }
        
        /* Smooth Infinite Marquee Animation */
        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 35s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }

        /* Glassmorphism Classes */
        .glass-dark {
            background: rgba(16, 18, 41, 0.78);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.12);
        }
        .glass-nav {
            background: rgba(8, 9, 20, 0.65);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Director's console active item */
        .console-nav-item.active {
            background: rgba(255, 77, 66, 0.12);
            border-color: #FF4D42;
        }
        .console-nav-item.active .item-num {
            color: #FF4D42;
        }
        .console-nav-item.active .item-title {
            color: #ffffff;
        }
        .console-nav-item.active .item-indicator {
            opacity: 1;
            transform: translateX(0);
        }

        /* Luxury Header Scroll Transition */
        #mainHeader {
            transition: background-color 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
        }
        #topInfoStrip {
            transition: max-height 0.35s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.25s ease, padding 0.35s ease;
        }
        #mainHeader.scrolled {
            background-color: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-bottom: 1px solid rgba(16, 18, 41, 0.08);
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.08);
        }
        #mainHeader.scrolled #topInfoStrip {
            max-height: 0;
            padding-top: 0;
            padding-bottom: 0;
            opacity: 0;
            overflow: hidden;
            border-bottom: none;
        }
        #mainHeader.scrolled .nav-link {
            color: #101229 !important;
            text-shadow: none !important;
        }
        #mainHeader.scrolled .nav-link:hover {
            color: #FF4D42 !important;
        }
        #mainHeader.scrolled #mobileMenuBtn {
            color: #101229 !important;
        }
        #mainHeader.scrolled .nav-dropdown {
            background: rgba(255, 255, 255, 0.98) !important;
            border-color: rgba(16, 18, 41, 0.1) !important;
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.15) !important;
        }
        #mainHeader.scrolled .nav-dropdown a {
            color: #101229 !important;
        }
        #mainHeader.scrolled .nav-dropdown a:hover {
            background: rgba(255, 77, 66, 0.08) !important;
            color: #FF4D42 !important;
        }
    </style>
</head>
<body class="bg-[#F8F9FC] text-[#101229] antialiased selection:bg-[#FF4D42] selection:text-white">

    <!-- Sticky Fullscreen Navbar with Seamless White Scroll Transition -->
    <header id="mainHeader" class="fixed top-0 left-0 w-full z-50 transition-all duration-300">
        
        <!-- Top Info Strip (Dark Luxury) -->
        <div id="topInfoStrip" class="bg-black/40 backdrop-blur-md text-white/80 text-[11px] py-2 px-6 border-b border-white/10 hidden md:block max-h-12 overflow-hidden">
            <div class="max-w-[96rem] mx-auto flex justify-between items-center tracking-wider">
                <div class="flex items-center gap-6">
                    <span class="flex items-center gap-2"><i class="bi bi-geo-alt-fill text-[#FF4D42]"></i> Casablanca &bull; 130 Bv d'Anfa</span>
                    <span class="flex items-center gap-2"><i class="bi bi-camera-reels-fill text-[#FF4D42]"></i> Production Cinématographique 8K & Drone FPV</span>
                </div>
                <div class="flex items-center gap-6">
                    <a href="tel:{{ str_replace(' ', '', $sitePhone) }}" class="hover:text-white transition-colors flex items-center gap-1.5 font-bold text-white"><i class="bi bi-telephone-fill text-[#FF4D42]"></i> {{ $sitePhone }}</a>
                    <span class="text-white/30">|</span>
                    <a href="mailto:{{ $siteEmail }}" class="hover:text-white transition-colors">{{ $siteEmail }}</a>
                </div>
            </div>
        </div>

        <!-- Main Nav Bar -->
        <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20 transition-all duration-300" id="navBarContainer">
                
                <!-- Logo -->
                <a href="/" class="flex items-center gap-3 group">
                    <img src="/uploads/smartfilms_logo.png" alt="SmartFilms Prod Logo" class="h-12 w-auto object-contain transition-transform duration-300 group-hover:scale-105 drop-shadow-md">
                </a>
                
                <!-- Navigation Links (Dynamic color on scroll) -->
                <nav class="hidden lg:flex items-center space-x-8 h-full">
                    @foreach($menus as $menu)
                        @if($menu->children->count() > 0)
                            <div class="relative group h-full flex items-center">
                                <a href="{{ $menu->url }}" class="nav-link text-white hover:text-[#FF4D42] font-bold text-xs uppercase tracking-widest flex items-center transition-colors drop-shadow">
                                    {{ $menu->title }} <i class="fas fa-chevron-down text-[8px] ml-1.5 opacity-70"></i>
                                </a>
                                <div class="nav-dropdown absolute left-0 top-full mt-0 w-64 bg-[#080914]/95 backdrop-blur-xl border border-white/10 shadow-2xl rounded-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 overflow-hidden p-2">
                                    @foreach($menu->children as $child)
                                        <a href="{{ $child->url }}" class="block px-4 py-2.5 text-xs font-semibold uppercase tracking-wider text-slate-200 hover:bg-white/10 hover:text-[#FF4D42] rounded-xl transition-colors">{{ $child->title }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a href="{{ $menu->url }}" class="nav-link text-white hover:text-[#FF4D42] font-bold text-xs uppercase tracking-widest transition-colors drop-shadow">{{ $menu->title }}</a>
                        @endif
                    @endforeach
                </nav>

                <!-- Header CTA Button -->
                <div class="hidden sm:flex items-center gap-3">
                    <a href="#estimateur" class="bg-[#FF4D42] hover:bg-[#E03E33] text-white px-7 py-3 rounded-full text-xs uppercase tracking-widest font-bold transition-all duration-300 shadow-xl shadow-rose-500/30 hover:scale-105 flex items-center gap-2 group">
                        <span>Lancer un projet</span>
                        <i class="fas fa-arrow-right text-[9px] transition-transform group-hover:translate-x-1"></i>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="lg:hidden text-white p-2 focus:outline-none text-2xl transition-colors" onclick="document.getElementById('mobileMenu').classList.toggle('hidden')">
                    <i class="bi bi-list"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobileMenu" class="hidden lg:hidden bg-white/98 text-[#101229] backdrop-blur-2xl border-t border-slate-200 shadow-2xl px-6 py-6 space-y-4">
            @foreach($menus as $menu)
                <a href="{{ $menu->url }}" onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="block text-sm font-bold uppercase tracking-wider text-[#101229] hover:text-[#FF4D42] py-2 border-b border-slate-100">{{ $menu->title }}</a>
            @endforeach
            <div class="pt-4">
                <a href="#estimateur" onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="block text-center bg-[#FF4D42] text-white py-3.5 rounded-full text-xs font-bold uppercase tracking-widest shadow-lg shadow-rose-500/30">
                    Estimer un Projet
                </a>
            </div>
        </div>
    </header>

    <main>
        @if($page->content && is_array($page->content) && count($page->content) > 0)
            @foreach($page->content as $sec)
                @php
                    $p = (object) ($sec['props'] ?? []);
                    $ptb = "padding-top:" . ($p->paddingTop ?? '80') . "px; padding-bottom:" . ($p->paddingBottom ?? '80') . "px;";
                @endphp

                <!-- 1. FULL-BLEED 100% SCREEN VIEWPORT HERO VIDEO (EDGE TO EDGE) -->
                @if($sec['type'] == 'rembrand_hero' || $sec['type'] == 'genesis_hero' || $sec['type'] == 'hero_video_cinema' || $sec['type'] == 'hero1')
                    <section class="relative w-full min-h-screen h-screen overflow-hidden bg-[#080914] flex items-end">
                        
                        <!-- Edge-to-Edge Fullscreen Video Layer -->
                        <div class="absolute inset-0 w-full h-full">
                            <video id="heroVideoEl" autoplay loop muted playsinline class="w-full h-full object-cover opacity-90 scale-105">
                                <source src="/uploads/hero_youtube.mp4" type="video/mp4">
                            </video>
                            
                            <!-- Master Cinematic Gradients -->
                            <div class="absolute inset-0 bg-gradient-to-t from-[#080914] via-[#080914]/40 to-transparent"></div>
                            <div class="absolute inset-0 bg-gradient-to-r from-[#080914]/85 via-[#080914]/25 to-[#080914]/40"></div>
                            <div class="absolute top-0 left-0 right-0 h-44 bg-gradient-to-b from-black/80 to-transparent"></div>
                        </div>

                        <!-- Audio Toggle Pill (Top Right Floating Control) -->
                        <button onclick="toggleHeroAudio()" id="audioToggleBtn" data-aos="fade-left" data-aos-delay="400" class="absolute top-28 right-6 sm:top-32 sm:right-12 z-20 glass-dark text-white/90 hover:text-white px-4 py-2.5 rounded-full text-xs font-medium tracking-wider flex items-center gap-2.5 transition-all hover:border-[#FF4D42] shadow-2xl">
                            <i id="audioIcon" class="bi bi-volume-mute-fill text-base text-[#FF4D42]"></i>
                            <span id="audioText" class="uppercase text-[10px] tracking-widest font-bold">Activer le son</span>
                        </button>

                        <!-- Live Specs Pill (Top Left) -->
                        <div data-aos="fade-right" data-aos-delay="400" class="absolute top-28 left-6 sm:top-32 sm:left-12 z-20 hidden md:flex items-center gap-3 glass-dark px-4 py-2 rounded-full border border-white/10 text-white/90 text-xs font-mono">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>RED V-RAPTOR 8K &bull; DRONE CINÉMA &bull; CASABLANCA</span>
                        </div>

                        <!-- Hero Content Overlay (Bottom Screen) -->
                        <div class="relative z-10 w-full max-w-[96rem] mx-auto px-6 sm:px-12 pb-16 md:pb-24">
                            <div class="max-w-4xl text-white space-y-7" data-aos="fade-right" data-aos-duration="1000">
                                
                                <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-[11px] tracking-widest uppercase font-semibold text-indigo-100">
                                    <span class="w-2 h-2 rounded-full bg-[#FF4D42] animate-ping"></span>
                                    <span>MAISON DE PRODUCTION AUDIOVISUELLE &bull; CASABLANCA</span>
                                </div>

                                <h1 class="text-4xl sm:text-6xl md:text-7xl lg:text-8xl tracking-tight leading-[0.93] text-white">
                                    <span class="font-serif-italic font-normal block lowercase text-3xl sm:text-5xl md:text-6xl mb-2 text-indigo-200/90">l'impact cinématographique au service des</span>
                                    <span class="font-black uppercase tracking-tight font-sans block drop-shadow-2xl">GRANDES MARQUES</span>
                                </h1>

                                <p class="text-indigo-100/90 text-base md:text-xl font-light max-w-2xl leading-relaxed">
                                    Nous sculptons des films d'entreprise, des spots publicitaires et des prises de vues aériennes spectaculaires qui imposent votre leadership et captivent vos audiences.
                                </p>

                                <!-- Action Buttons -->
                                <div class="pt-4 flex flex-wrap items-center gap-4">
                                    <a href="#estimateur" class="bg-[#FF4D42] hover:bg-[#E03E33] text-white px-8 py-4 rounded-full font-bold uppercase tracking-wider text-xs transition-all shadow-xl shadow-rose-500/30 hover:scale-105 flex items-center gap-2">
                                        <span>Estimer mon projet</span>
                                        <i class="fas fa-arrow-right text-[10px]"></i>
                                    </a>

                                    <button onclick="openVideoModal('https://www.youtube.com/embed/_yWLYCiW1Z8', 'Showreel Cinéma 2026 - SmartFilms Prod')" class="glass-dark hover:bg-white/20 text-white px-7 py-4 rounded-full font-bold uppercase tracking-wider text-xs transition-all flex items-center gap-3 border border-white/20 hover:scale-105">
                                        <span class="w-7 h-7 rounded-full bg-[#FF4D42] text-white flex items-center justify-center text-[10px]"><i class="fas fa-play ml-0.5"></i></span>
                                        <span>Visionner le Showreel 4K</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom Scroll Prompt -->
                        <div class="absolute bottom-6 right-8 hidden lg:flex items-center gap-2 text-white/50 text-[11px] font-mono tracking-widest uppercase">
                            <span>Faire défiler</span>
                            <i class="bi bi-chevron-down animate-bounce text-xs"></i>
                        </div>
                    </section>

                <!-- 2. INFINITE CLIENT LOGOS MARQUEE -->
                @elseif($sec['type'] == 'rembrand_client_logos')
                    <section style="background-color:{{ $p->bgColor ?? '#F8F9FC' }}; {{ $ptb }}" class="border-y border-indigo-950/10 overflow-hidden" data-aos="fade-up">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-8">
                            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white border border-indigo-950/10 text-[11px] font-bold uppercase tracking-widest text-[#101229] shadow-sm">
                                <i class="bi bi-shield-check text-[#FF4D42]"></i>
                                <span>PARTENAIRE DE PRODUCTION DES LEADERS NATIONAUX & INTERNATIONAUX</span>
                            </div>
                        </div>

                        <!-- Infinite Sliding Track -->
                        <div class="relative w-full overflow-hidden">
                            <div class="animate-marquee flex items-center gap-8 py-4">
                                @php
                                    $logos = [
                                        ['name' => 'DELL Technologies', 'file' => 'logo_dell.jpg'],
                                        ['name' => 'DANONE', 'file' => 'logo_danone.png'],
                                        ['name' => 'BCP International', 'file' => 'logo_bcp.png'],
                                        ['name' => 'Tanger Alliance', 'file' => 'logo_tanger_alliance.png'],
                                        ['name' => 'Ingelec', 'file' => 'logo_ingelec.png'],
                                        ['name' => 'FlowPipe Plastima', 'file' => 'logo_flowpipe.png'],
                                        ['name' => 'Loterie Nationale', 'file' => 'logo_loterie_nationale.png'],
                                        ['name' => 'Or Blanc', 'file' => 'logo_orblanc.png'],
                                        ['name' => 'Clermont', 'file' => 'logo_clermont.jpg'],
                                    ];
                                @endphp

                                @for($i = 0; $i < 3; $i++)
                                    @foreach($logos as $logo)
                                        <div class="w-48 h-24 shrink-0 rounded-2xl bg-white border border-indigo-950/5 shadow-sm hover:shadow-md transition-all flex items-center justify-center p-5 group hover:border-[#FF4D42]/30">
                                            <img src="/uploads/{{ $logo['file'] }}" alt="{{ $logo['name'] }}" class="max-h-12 max-w-full object-contain grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
                                        </div>
                                    @endforeach
                                @endfor
                            </div>
                        </div>
                    </section>

                <!-- 3. BESPOKE CONCEPT B: SPLIT-SCREEN DIRECTOR'S CONSOLE (4 EXPERTISES) -->
                @elseif($sec['type'] == 'rembrand_offres' || $sec['type'] == 'services_cards_1')
                    <section id="offres" style="background-color:{{ $p->bgColor ?? '#080914' }}; {{ $ptb }}" class="text-white relative overflow-hidden">
                        
                        <!-- Ambient Glow -->
                        <div class="absolute -top-40 -left-40 w-[30rem] h-[30rem] bg-[#FF4D42]/10 rounded-full blur-[120px] pointer-events-none"></div>
                        <div class="absolute -bottom-40 -right-40 w-[30rem] h-[30rem] bg-indigo-600/10 rounded-full blur-[120px] pointer-events-none"></div>

                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                            
                            <!-- Header -->
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6" data-aos="fade-right">
                                <div>
                                    <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 text-[#FF4D42] text-[11px] font-bold uppercase tracking-widest mb-3">
                                        <i class="bi bi-camera-reels-fill"></i> Savoir-Faire Cinématographique
                                    </div>
                                    <h2 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-white">
                                        NOS <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-indigo-200">expertises métiers</span>
                                    </h2>
                                    <p class="text-indigo-200/80 text-sm md:text-base font-light mt-2 max-w-xl">
                                        Sélectionnez un pôle pour explorer l'arsenal technique, les formats livrables et nos engagements de production.
                                    </p>
                                </div>
                                <a href="#estimateur" class="inline-flex items-center gap-2 bg-[#FF4D42] hover:bg-[#E03E33] text-white px-7 py-3.5 rounded-full text-xs font-bold uppercase tracking-widest transition-all shadow-lg shadow-rose-500/20 hover:scale-105">
                                    <span>Demander un devis détaillé</span> <i class="fas fa-arrow-right text-[10px]"></i>
                                </a>
                            </div>

                            <!-- The Split-Screen Console Layout (40% Left Navigation, 60% Right Monitor Screen) -->
                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                                
                                <!-- Left Column: 4 Interactive Pillars List (Sliding from Left) -->
                                <div class="lg:col-span-5 space-y-3 flex flex-col justify-between" data-aos="fade-right" data-aos-delay="200">
                                    @php
                                        $expertisesData = [
                                            [
                                                'id' => 'exp-1',
                                                'num' => '01',
                                                'title' => 'FILMS CORPORATE & INSTITUTIONNELS',
                                                'subtitle' => 'Valorisation d\'image & Marque Employeur',
                                                'tag' => 'Format 16:9 4K / Cinéma',
                                                'desc' => 'Des récits institutionnels puissants mettant en valeur vos équipes, vos sites industriels et votre leadership. Une qualité optique cinéma haut de gamme (RED, optiques primes, éclairage cinéma) pour asseoir votre autorité.',
                                                'turnaround' => '10 à 15 jours ouvrés',
                                                'equipment' => 'RED V-Raptor 8K &bull; Optiques Primes &bull; Éclairage Studio',
                                                'deliverables' => ['Scénarisation & Storyboarding', 'Tournage multi-sites au Maroc', 'Voix-off multilingue (FR, AR, EN)', 'Étalonnage DaVinci Studio'],
                                                'image' => '/uploads/cinema_corporate_film.png',
                                            ],
                                            [
                                                'id' => 'exp-2',
                                                'num' => '02',
                                                'title' => 'SPOTS PUBLICITAIRES & BRAND CONTENT',
                                                'subtitle' => 'Campagnes TV & Formats Réseaux 9:16',
                                                'tag' => 'TV & Multi-Plateforme',
                                                'desc' => 'Création de spots publicitaires percutants pour la télévision et les réseaux sociaux (Instagram, TikTok, YouTube Ads). Direction artistique soignée, casting, décors studio et post-production dynamique calibrée pour la conversion.',
                                                'turnaround' => '7 à 12 jours ouvrés',
                                                'equipment' => 'ARRI Alexa Mini &bull; Régie Décor Studio &bull; Sound Design TV',
                                                'deliverables' => ['Casting comédiens & voix-off', 'Déclinaisons 9:16, 16:9, 1:1', 'Motion Design & Habillage 3D', 'Sound Design & Mixage TV'],
                                                'image' => '/uploads/studio_commercial_spot.png',
                                            ],
                                            [
                                                'id' => 'exp-3',
                                                'num' => '03',
                                                'title' => 'CAPTATION PAR DRONE 4K & FPV',
                                                'subtitle' => 'Télépilotes Certifiés DGAC / Maroc',
                                                'tag' => 'Aérien 4K &bull; FPV One-Take',
                                                'desc' => 'Donnez de la hauteur à vos productions. Nous déployons des drones cinéma (DJI Inspire 3) et des drones FPV de course pour des plans séquences continus survolant vos usines, chantiers d\'envergure et complexes hôteliers partout au Maroc.',
                                                'turnaround' => '3 à 7 jours ouvrés',
                                                'equipment' => 'DJI Inspire 3 &bull; Drone FPV Cinéma &bull; ProRes RAW',
                                                'deliverables' => ['Autorisations de vol & Sécurité', 'Survol immersif FPV One-Take', 'Résolution ProRes 4K/8K', 'Stabilisation gyroscopique avancée'],
                                                'image' => '/uploads/cinema_corporate_film.png',
                                            ],
                                            [
                                                'id' => 'exp-4',
                                                'num' => '04',
                                                'title' => 'DOCUMENTAIRES DE MARQUE & RSE',
                                                'subtitle' => 'Storytelling Long & Événements Prestigieux',
                                                'tag' => 'Grand Format & Conférences',
                                                'desc' => 'Racontez vos engagements sociétaux et environnementaux avec authenticité. Nous couvrons également vos sommets, conférences internationales et lancements de produits avec régie multi-caméras et livraison d\'aftermovies express.',
                                                'turnaround' => '5 à 10 jours ouvrés',
                                                'equipment' => 'Multi-Caméras 4K &bull; Micros HF Broadcast &bull; Régie Live',
                                                'deliverables' => ['Interviews & Journalisme de marque', 'Régie multi-caméras Live 4K', 'Teasers express pour réseaux sociaux', 'Archivage master sécurisé'],
                                                'image' => '/uploads/studio_commercial_spot.png',
                                            ],
                                        ];
                                    @endphp

                                    @foreach($expertisesData as $index => $exp)
                                        <div onclick="selectConsoleExpertise({{ $index }})" onmouseenter="selectConsoleExpertise({{ $index }})" class="console-nav-item {{ $index === 0 ? 'active' : '' }} p-5 rounded-2xl border border-white/10 bg-white/5 hover:bg-white/10 cursor-pointer transition-all duration-300 flex items-center justify-between group" id="console-btn-{{ $index }}">
                                            <div class="flex items-center gap-4">
                                                <span class="item-num text-xl font-black font-mono text-slate-400 group-hover:text-[#FF4D42] transition-colors">
                                                    {{ $exp['num'] }}
                                                </span>
                                                <div>
                                                    <h4 class="item-title font-bold text-sm text-slate-200 group-hover:text-white uppercase tracking-wider transition-colors">
                                                        {{ $exp['title'] }}
                                                    </h4>
                                                    <p class="text-[11px] text-indigo-200/60 font-light">{{ $exp['subtitle'] }}</p>
                                                </div>
                                            </div>
                                            <div class="item-indicator opacity-0 -translate-x-2 transition-all text-[#FF4D42]">
                                                <i class="fas fa-chevron-right text-xs"></i>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Right Column: The Director's Cinema Display Console (Sliding from Right) -->
                                <div class="lg:col-span-7 bg-[#171936] rounded-3xl border border-white/15 p-8 md:p-10 shadow-2xl relative overflow-hidden flex flex-col justify-between min-h-[500px]" data-aos="fade-left" data-aos-delay="300">
                                    
                                    <!-- Dynamic Screen Backdrop Image -->
                                    <div class="absolute inset-0 z-0">
                                        <img id="consoleBgImg" src="/uploads/cinema_corporate_film.png" alt="Dispositif Cinéma" class="w-full h-full object-cover opacity-20 transition-all duration-700">
                                        <div class="absolute inset-0 bg-gradient-to-t from-[#171936] via-[#171936]/90 to-[#171936]/70"></div>
                                    </div>

                                    <!-- Content Layer -->
                                    <div class="relative z-10 space-y-6">
                                        
                                        <!-- Top Badge & Number -->
                                        <div class="flex justify-between items-center">
                                            <span id="consoleTag" class="px-3.5 py-1 rounded-full bg-[#FF4D42]/20 border border-[#FF4D42]/40 text-[#FF4D42] text-[11px] font-mono uppercase tracking-widest font-bold">
                                                Format 16:9 4K &bull; Cinéma
                                            </span>
                                            <span id="consoleNum" class="text-3xl font-black font-mono text-white/40">01</span>
                                        </div>

                                        <!-- Title & Subtitle -->
                                        <div>
                                            <h3 id="consoleTitle" class="text-2xl sm:text-3xl font-black tracking-tight text-white uppercase">
                                                FILMS CORPORATE & INSTITUTIONNELS
                                            </h3>
                                            <p id="consoleSubtitle" class="text-xs uppercase font-mono tracking-widest text-[#FF4D42] mt-1 font-semibold">
                                                Valorisation d'image & Marque Employeur
                                            </p>
                                        </div>

                                        <!-- Description -->
                                        <p id="consoleDesc" class="text-indigo-100/90 text-sm md:text-base font-light leading-relaxed">
                                            Des récits institutionnels puissants mettant en valeur vos équipes, vos sites industriels et votre leadership. Une qualité optique cinéma haut de gamme (RED, optiques primes, éclairage cinéma) pour asseoir votre autorité.
                                        </p>

                                        <!-- Tech Specs Box -->
                                        <div class="p-4 rounded-2xl bg-black/40 border border-white/10 space-y-2">
                                            <div class="flex items-center gap-2 text-xs font-mono text-slate-300">
                                                <i class="bi bi-camera-video-fill text-[#FF4D42]"></i>
                                                <span class="font-bold text-white uppercase">Matériel déployé :</span>
                                                <span id="consoleEquipment" class="text-indigo-200">RED V-Raptor 8K &bull; Optiques Primes &bull; Éclairage Studio</span>
                                            </div>
                                            <div class="flex items-center gap-2 text-xs font-mono text-slate-300">
                                                <i class="bi bi-clock-history text-amber-400"></i>
                                                <span class="font-bold text-white uppercase">Délai estimé :</span>
                                                <span id="consoleTurnaround" class="text-indigo-200">10 à 15 jours ouvrés</span>
                                            </div>
                                        </div>

                                        <!-- Deliverables Badges List -->
                                        <div id="consoleDeliverables" class="flex flex-wrap gap-2 pt-2">
                                            <span class="px-3 py-1 rounded-lg bg-white/10 text-[11px] font-mono text-white border border-white/10"><i class="bi bi-check2 text-[#FF4D42] mr-1"></i> Scénarisation & Storyboarding</span>
                                            <span class="px-3 py-1 rounded-lg bg-white/10 text-[11px] font-mono text-white border border-white/10"><i class="bi bi-check2 text-[#FF4D42] mr-1"></i> Tournage multi-sites au Maroc</span>
                                            <span class="px-3 py-1 rounded-lg bg-white/10 text-[11px] font-mono text-white border border-white/10"><i class="bi bi-check2 text-[#FF4D42] mr-1"></i> Voix-off multilingue (FR, AR, EN)</span>
                                            <span class="px-3 py-1 rounded-lg bg-white/10 text-[11px] font-mono text-white border border-white/10"><i class="bi bi-check2 text-[#FF4D42] mr-1"></i> Étalonnage DaVinci Studio</span>
                                        </div>
                                    </div>

                                    <!-- Bottom Action Bar -->
                                    <div class="relative z-10 pt-6 mt-6 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center gap-4">
                                        <span class="text-xs text-indigo-300 font-mono">Prise en charge intégrale à Casablanca & Maroc</span>
                                        <a href="#estimateur" class="w-full sm:w-auto text-center bg-[#FF4D42] hover:bg-[#E03E33] text-white px-7 py-3 rounded-full text-xs font-bold uppercase tracking-wider transition-all shadow-lg shadow-rose-500/30 hover:scale-105 flex items-center justify-center gap-2">
                                            <span>Estimer ce format</span>
                                            <i class="fas fa-arrow-right text-[10px]"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

                <!-- 4. FILTERABLE 4K VIDEO PORTFOLIO SHOWCASE -->
                @elseif($sec['type'] == 'video_portfolio_showcase')
                    <section id="portfolio" style="background-color:{{ $p->bgColor ?? '#080914' }}; {{ $ptb }}" class="text-white relative overflow-hidden">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            
                            <!-- Section Header (Sliding from Left) -->
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-6" data-aos="fade-right">
                                <div>
                                    <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 text-[#FF4D42] text-[11px] font-bold uppercase tracking-widest mb-3">
                                        <i class="bi bi-camera-reels"></i> Galerie des Œuvres Livrées
                                    </div>
                                    <h2 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-white">
                                        NOS <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-indigo-200">réalisations récentes</span>
                                    </h2>
                                    <p class="text-indigo-200/80 text-sm md:text-base font-light mt-3 max-w-xl">
                                        Chaque projet est pensé comme une pièce maîtresse. Découvrez nos productions pour les marques leaders au Maroc et à l'international.
                                    </p>
                                </div>

                                <a href="#estimateur" class="inline-flex items-center gap-2 bg-[#FF4D42] hover:bg-[#E03E33] text-white px-7 py-3 rounded-full text-xs font-bold uppercase tracking-widest transition-all shadow-lg shadow-rose-500/25 hover:scale-105">
                                    <span>Demander un projet similaire</span> <i class="fas fa-arrow-right text-[10px]"></i>
                                </a>
                            </div>

                            <!-- Category Filter Tabs -->
                            <div class="flex flex-wrap items-center gap-2.5 mb-10 pb-2 border-b border-white/10" data-aos="fade-up" data-aos-delay="100">
                                <button onclick="filterPortfolio('all')" class="portfolio-tab active px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all bg-[#FF4D42] text-white" data-cat="all">
                                    Tous les films ({{ $projects->count() }})
                                </button>
                                @foreach($categories as $cat)
                                    <button onclick="filterPortfolio('{{ Str::slug($cat) }}')" class="portfolio-tab px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all bg-white/5 hover:bg-white/15 text-indigo-200 hover:text-white" data-cat="{{ Str::slug($cat) }}">
                                        {{ $cat }}
                                    </button>
                                @endforeach
                            </div>

                            <!-- Projects Grid with Staggered Fade Up -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="projectsGrid">
                                @foreach($projects as $proj)
                                    <div class="project-card group rounded-3xl overflow-hidden bg-white/5 border border-white/10 hover:border-[#FF4D42]/50 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl flex flex-col justify-between" data-category="{{ Str::slug($proj->category) }}" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 150 }}">
                                        
                                        <!-- Thumbnail & Play Overlay -->
                                        <div class="relative aspect-video overflow-hidden bg-slate-900 cursor-pointer" onclick="openVideoModal('{{ $proj->video_url }}', '{{ $proj->title }} &bull; {{ $proj->client_name }}')">
                                            <img src="{{ $proj->thumbnail ?? '/uploads/cinema_corporate_film.png' }}" alt="{{ $proj->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-90 group-hover:opacity-100">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                                            
                                            <!-- Top Badges -->
                                            <div class="absolute top-4 left-4 right-4 flex justify-between items-center">
                                                <span class="px-3 py-1 rounded-full bg-[#080914]/80 backdrop-blur-md text-[10px] font-bold uppercase tracking-widest text-[#FF4D42] border border-white/10">
                                                    {{ $proj->category }}
                                                </span>
                                                @if($proj->duration)
                                                    <span class="px-2.5 py-0.5 rounded-full bg-black/60 backdrop-blur-md text-[10px] font-mono text-white/80">
                                                        <i class="bi bi-clock mr-1"></i>{{ $proj->duration }}
                                                    </span>
                                                @endif
                                            </div>

                                            <!-- Center Play Icon -->
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <div class="w-14 h-14 rounded-full bg-[#FF4D42] text-white flex items-center justify-center text-lg shadow-xl shadow-rose-500/40 transform transition-transform duration-300 group-hover:scale-115">
                                                    <i class="fas fa-play ml-0.5"></i>
                                                </div>
                                            </div>

                                            <!-- Bottom Client Pill -->
                                            <div class="absolute bottom-4 left-4">
                                                <span class="text-xs uppercase font-mono tracking-wider font-bold text-white/90 bg-black/50 px-3 py-1 rounded-lg backdrop-blur-sm">
                                                    {{ $proj->client_name }}
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Card Info -->
                                        <div class="p-6 space-y-3 flex-1 flex flex-col justify-between">
                                            <div>
                                                <h3 class="text-xl font-bold tracking-tight text-white group-hover:text-[#FF4D42] transition-colors">
                                                    {{ $proj->title }}
                                                </h3>
                                                <p class="text-indigo-200/70 text-xs leading-relaxed font-light mt-2 line-clamp-2">
                                                    {{ $proj->description }}
                                                </p>
                                            </div>

                                            @if($proj->metrics)
                                                <div class="pt-3 border-t border-white/10 flex items-center justify-between text-[11px] text-indigo-300 font-mono">
                                                    <span class="flex items-center gap-1.5"><i class="bi bi-trophy-fill text-amber-400"></i> {{ $proj->metrics }}</span>
                                                    <span class="text-[#FF4D42] group-hover:translate-x-1 transition-transform font-bold text-xs"><i class="fas fa-arrow-right"></i></span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>

                <!-- 5. INTERACTIVE MULTI-STEP PROJECT ESTIMATOR -->
                @elseif($sec['type'] == 'interactive_estimator')
                    <section id="estimateur" style="background-color:{{ $p->bgColor ?? '#F8F9FC' }}; {{ $ptb }}" class="border-t border-indigo-950/10">
                        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                            
                            <!-- Header -->
                            <div class="text-center max-w-2xl mx-auto mb-12" data-aos="fade-up">
                                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-indigo-50 text-[#FF4D42] text-[11px] font-bold uppercase tracking-widest mb-3 border border-indigo-100">
                                    <i class="bi bi-calculator"></i> Simulateur Instantané
                                </div>
                                <h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-[#101229]">
                                    ESTIMEZ VOTRE <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl text-slate-500">production</span>
                                </h2>
                                <p class="text-slate-600 text-sm md:text-base font-light mt-3">
                                    Calibrez votre dispositif de tournage en 4 étapes et recevez un chiffrage prévisionnel détaillé sous 24h.
                                </p>
                            </div>

                            <!-- Interactive Card (Zoom in) -->
                            <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-indigo-950/10 relative overflow-hidden" data-aos="zoom-in-up" data-aos-duration="900">
                                
                                <!-- Step Progress Bar -->
                                <div class="flex items-center justify-between mb-8 pb-6 border-b border-slate-100">
                                    <div class="flex items-center gap-2">
                                        <span id="stepIndicatorNumber" class="w-8 h-8 rounded-full bg-[#101229] text-white flex items-center justify-center font-bold text-xs">1</span>
                                        <span id="stepIndicatorTitle" class="text-xs font-bold uppercase tracking-wider text-[#101229]">Type de Projet</span>
                                    </div>
                                    <div class="text-xs text-slate-400 font-mono font-bold">Étape <span id="currentStepNum">1</span> / 4</div>
                                </div>

                                <form id="estimatorForm" onsubmit="submitEstimator(event)">
                                    @csrf

                                    <!-- Step 1: Type de Projet -->
                                    <div id="step-1" class="estimator-step space-y-6">
                                        <label class="block text-sm font-bold uppercase tracking-wider text-[#101229]">Quel type de production audiovisuelle souhaitez-vous réaliser ?</label>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                            @php
                                                $types = [
                                                    ['val' => 'Film d\'Entreprise & Institutionnel', 'icon' => 'bi-buildings', 'desc' => 'Présentation de société, usines, marque employeur'],
                                                    ['val' => 'Spot Publicitaire TV & Digital', 'icon' => 'bi-broadcast', 'desc' => 'Campagne publicitaire, TV, YouTube Ads, conversion'],
                                                    ['val' => 'Captation Aérienne par Drone 4K', 'icon' => 'bi-airplane', 'desc' => 'Survol de sites industriels, immobilier, paysages'],
                                                    ['val' => 'Couverture Événementielle & Aftermovie', 'icon' => 'bi-camera-video', 'desc' => 'Conférences, lancements, sommets, salons VIP'],
                                                    ['val' => 'Série Vidéos Réseaux Sociaux (9:16)', 'icon' => 'bi-phone', 'desc' => 'Packs de formats courts mensuels Instagram/TikTok'],
                                                    ['val' => 'Production Spécifique / Sur-Mesure', 'icon' => 'bi-gear-wide-connected', 'desc' => 'Brief personnalisé / Production déléguée'],
                                                ];
                                            @endphp
                                            @foreach($types as $t)
                                                <label class="p-5 rounded-2xl border-2 border-slate-100 hover:border-[#FF4D42] cursor-pointer transition-all flex flex-col justify-between group has-[:checked]:border-[#FF4D42] has-[:checked]:bg-rose-50/20">
                                                    <input type="radio" name="project_type" value="{{ $t['val'] }}" class="hidden" {{ $loop->first ? 'checked' : '' }}>
                                                    <div class="space-y-2">
                                                        <i class="bi {{ $t['icon'] }} text-2xl text-[#FF4D42] group-hover:scale-110 transition-transform block"></i>
                                                        <h4 class="font-bold text-xs uppercase text-[#101229]">{{ $t['val'] }}</h4>
                                                        <p class="text-[11px] text-slate-500 font-light">{{ $t['desc'] }}</p>
                                                    </div>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Step 2: Format & Durée -->
                                    <div id="step-2" class="estimator-step hidden space-y-6">
                                        <label class="block text-sm font-bold uppercase tracking-wider text-[#101229]">Quelle est la durée et le format recherché ?</label>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                            @php
                                                $durations = [
                                                    ['val' => 'Format Court (30s à 60s)', 'desc' => 'Idéal pour spot pub digital et teasers percutants'],
                                                    ['val' => 'Format Standard (1 à 3 minutes)', 'desc' => 'Format de référence pour film corporate institutionnel'],
                                                    ['val' => 'Format Long / Documentaire (3 à 7 minutes)', 'desc' => 'Storytelling approfondi, interviews et démonstrations'],
                                                    ['val' => 'Pack Multi-Vidéos (Plusieurs déclinaisons)', 'desc' => '1 film master + teasers verticaux 9:16 pour réseaux'],
                                                ];
                                            @endphp
                                            @foreach($durations as $d)
                                                <label class="p-5 rounded-2xl border-2 border-slate-100 hover:border-[#FF4D42] cursor-pointer transition-all flex flex-col justify-between has-[:checked]:border-[#FF4D42] has-[:checked]:bg-rose-50/20">
                                                    <input type="radio" name="timeline" value="{{ $d['val'] }}" class="hidden" {{ $loop->first ? 'checked' : '' }}>
                                                    <div>
                                                        <h4 class="font-bold text-xs uppercase text-[#101229] mb-1">{{ $d['val'] }}</h4>
                                                        <p class="text-xs text-slate-500 font-light">{{ $d['desc'] }}</p>
                                                    </div>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Step 3: Fourchette Budgétaire -->
                                    <div id="step-3" class="estimator-step hidden space-y-6">
                                        <label class="block text-sm font-bold uppercase tracking-wider text-[#101229]">Quelle est votre enveloppe budgétaire indicative ?</label>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                            @php
                                                $budgets = [
                                                    ['val' => '20 000 MAD à 50 000 MAD', 'desc' => 'Tournage compact, matériel 4K, montage dynamique'],
                                                    ['val' => '50 000 MAD à 100 000 MAD', 'desc' => 'Production complète, drone 4K, voix-off et mixage pro'],
                                                    ['val' => '100 000 MAD à 250 000 MAD', 'desc' => 'Tournage cinéma multi-jours, casting, drone FPV, colorimétrie'],
                                                    ['val' => 'Plus de 250 000 MAD', 'desc' => 'Grande campagne nationale, équipe cinéma 8K, diffusion 360'],
                                                ];
                                            @endphp
                                            @foreach($budgets as $b)
                                                <label class="p-5 rounded-2xl border-2 border-slate-100 hover:border-[#FF4D42] cursor-pointer transition-all flex flex-col justify-between has-[:checked]:border-[#FF4D42] has-[:checked]:bg-rose-50/20">
                                                    <input type="radio" name="budget_tier" value="{{ $b['val'] }}" class="hidden" {{ $loop->index == 1 ? 'checked' : '' }}>
                                                    <div>
                                                        <h4 class="font-bold text-sm text-[#101229] mb-1">{{ $b['val'] }}</h4>
                                                        <p class="text-xs text-slate-500 font-light">{{ $b['desc'] }}</p>
                                                    </div>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Step 4: Coordonnées & Envoi -->
                                    <div id="step-4" class="estimator-step hidden space-y-6">
                                        <label class="block text-sm font-bold uppercase tracking-wider text-[#101229]">Vos coordonnées pour l'envoi de la proposition</label>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-xs font-semibold uppercase text-slate-500 mb-1">Nom Complet *</label>
                                                <input type="text" name="name" required placeholder="Votre nom" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-[#FF4D42]">
                                            </div>
                                            <div>
                                                <label class="block text-xs font-semibold uppercase text-slate-500 mb-1">Téléphone *</label>
                                                <input type="tel" name="phone" required placeholder="06..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-[#FF4D42]">
                                            </div>
                                            <div>
                                                <label class="block text-xs font-semibold uppercase text-slate-500 mb-1">Entreprise</label>
                                                <input type="text" name="company" placeholder="Nom de votre société" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-[#FF4D42]">
                                            </div>
                                            <div>
                                                <label class="block text-xs font-semibold uppercase text-slate-500 mb-1">Email</label>
                                                <input type="email" name="email" placeholder="votre@email.com" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-[#FF4D42]">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-semibold uppercase text-slate-500 mb-1">Précisions supplémentaires (Optionnel)</label>
                                            <textarea name="message" rows="3" placeholder="Date de tournage souhaitée, lieu, objectifs spécifiques..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-[#FF4D42]"></textarea>
                                        </div>
                                    </div>

                                    <!-- Step Navigation Buttons -->
                                    <div class="flex justify-between items-center pt-8 border-t border-slate-100 mt-8">
                                        <button type="button" id="prevStepBtn" onclick="changeStep(-1)" class="px-6 py-2.5 rounded-full border border-slate-200 text-xs font-bold uppercase tracking-wider text-slate-500 hover:text-[#101229] hidden">
                                            <i class="fas fa-arrow-left mr-2"></i> Précédent
                                        </button>
                                        <div></div>
                                        <button type="button" id="nextStepBtn" onclick="changeStep(1)" class="bg-[#101229] hover:bg-[#FF4D42] text-white px-8 py-3.5 rounded-full text-xs font-bold uppercase tracking-widest transition-all shadow-lg">
                                            Suivant <i class="fas fa-arrow-right ml-2"></i>
                                        </button>
                                        <button type="submit" id="submitStepBtn" class="bg-[#FF4D42] hover:bg-[#E03E33] text-white px-10 py-3.5 rounded-full text-xs font-bold uppercase tracking-widest transition-all shadow-lg shadow-rose-500/30 hidden">
                                            Recevoir mon estimation <i class="fas fa-paper-plane ml-2"></i>
                                        </button>
                                    </div>
                                </form>

                                <!-- Success Box -->
                                <div id="estimatorSuccess" class="hidden text-center py-12 space-y-4">
                                    <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-3xl mx-auto shadow-md">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <h3 class="text-2xl font-bold text-[#101229]">Demande d'estimation transmise avec succès !</h3>
                                    <p class="text-slate-600 text-sm max-w-md mx-auto">
                                        Notre équipe de production analyse vos paramètres et vous transmettra un devis complet sous 24h ouvrées.
                                    </p>
                                    <a href="https://wa.me/{{ $siteWhatsApp }}?text={{ urlencode('Bonjour SmartFilms, je viens de remplir le formulaire d\'estimation de projet.') }}" target="_blank" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-full text-xs font-bold uppercase tracking-wider shadow-lg">
                                        <i class="bi bi-whatsapp text-sm"></i> Échanger directement sur WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>

                <!-- 6. NOTRE MANIFESTE & IMPACT (Left to Right / Right to Left) -->
                @elseif($sec['type'] == 'rembrand_mission' || $sec['type'] == 'genesis_statement')
                    <section style="background-color:{{ $p->bgColor ?? '#F8F9FC' }}; {{ $ptb }}" class="border-t border-indigo-950/10 overflow-hidden">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                                
                                <!-- Left Column (Slide from Left) -->
                                <div data-aos="fade-right">
                                    <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-indigo-50 text-[#FF4D42] text-[11px] font-bold uppercase tracking-widest mb-3 border border-indigo-100">
                                        <i class="bi bi-bullseye"></i> Raison d'Être
                                    </div>
                                    <h2 class="text-4xl sm:text-5xl md:text-6xl font-bold tracking-tight text-[#101229]">
                                        REFUSER LE <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-slate-500">banal.</span>
                                    </h2>
                                    
                                    <div class="mt-8 flex items-center gap-4 p-4 rounded-2xl bg-white border border-indigo-950/10 shadow-sm w-fit">
                                        <div class="flex -space-x-3">
                                            <span class="w-10 h-10 rounded-full bg-[#101229] text-white font-bold flex items-center justify-center text-xs border-2 border-white">SF</span>
                                            <span class="w-10 h-10 rounded-full bg-[#FF4D42] text-white font-bold flex items-center justify-center text-xs border-2 border-white">8K</span>
                                            <span class="w-10 h-10 rounded-full bg-indigo-900 text-white font-bold flex items-center justify-center text-xs border-2 border-white">PRO</span>
                                        </div>
                                        <div class="text-left">
                                            <span class="font-extrabold text-xl text-[#101229] block leading-none">+120 RÉALISATIONS</span>
                                            <span class="text-[11px] text-slate-500 uppercase tracking-wider font-medium">Films, Spots & Drones Livrés</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Column (Slide from Right) -->
                                <div class="bg-white p-8 md:p-12 rounded-3xl border border-indigo-950/10 shadow-sm space-y-6" data-aos="fade-left" data-aos-delay="200">
                                    <p class="text-[#101229] text-lg md:text-2xl font-light leading-relaxed">
                                        À l'ère de la surcharge visuelle, un contenu ordinaire est oublié en 3 secondes. Un film signé SmartFilms s'ancre dans les mémoires et érige votre marque en référence incontestable.
                                    </p>
                                    <p class="text-slate-500 text-sm font-normal">
                                        Studio de production basé à Casablanca (130 Bv d'Anfa), avec des équipes mobiles intervenant à Tanger, Rabat, Marrakech et à l'international.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                <!-- 7. CEUX QUI FONT SMARTFILMS (TEAM & GEAR) -->
                @elseif($sec['type'] == 'team_showcase')
                    <section id="equipe" style="background-color:{{ $p->bgColor ?? '#080914' }}; {{ $ptb }}" class="text-white border-t border-white/10">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            
                            <div class="text-center max-w-2xl mx-auto mb-16" data-aos="fade-up">
                                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 text-[#FF4D42] text-[11px] font-bold uppercase tracking-widest mb-3">
                                    <i class="bi bi-people-fill"></i> L'Équipe Créative & Technique
                                </div>
                                <h2 class="text-4xl sm:text-5xl md:text-6xl font-bold tracking-tight text-white">
                                    L'ÉQUIPE <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-indigo-200">smartfilms</span>
                                </h2>
                                <p class="text-indigo-200/80 text-sm font-light mt-3">
                                    Réalisateurs, directeurs de la photographie, cadreurs et télépilotes animés par l'exigence du détail.
                                </p>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                                @foreach($teamMembers as $m)
                                    <div class="group bg-white/5 rounded-3xl p-6 border border-white/10 hover:border-[#FF4D42]/50 transition-all duration-300 flex flex-col justify-between hover:-translate-y-2 shadow-xl" data-aos="fade-up" data-aos-delay="{{ $loop->index * 120 }}">
                                        <div class="space-y-4">
                                            <div class="aspect-square rounded-2xl overflow-hidden bg-slate-800 relative">
                                                <img src="{{ $m->photo ?? '/uploads/cinema_corporate_film.png' }}" alt="{{ $m->name }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 group-hover:scale-105">
                                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                                            </div>
                                            <div>
                                                <h3 class="font-bold text-lg text-white group-hover:text-[#FF4D42] transition-colors">{{ $m->name }}</h3>
                                                <p class="text-xs uppercase font-mono tracking-wider text-indigo-300">{{ $m->role }}</p>
                                            </div>
                                            <p class="text-xs text-indigo-200/70 font-light leading-relaxed">
                                                {{ $m->bio }}
                                            </p>
                                        </div>

                                        @if($m->linkedin)
                                            <div class="pt-4 border-t border-white/10 flex justify-end">
                                                <a href="{{ $m->linkedin }}" target="_blank" class="w-8 h-8 rounded-full bg-white/10 hover:bg-[#FF4D42] text-white flex items-center justify-center text-xs transition-colors">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>

                <!-- 8. FAQ ACCORDION -->
                @elseif($sec['type'] == 'rembrand_faq' || $sec['type'] == 'video_faq1')
                    <section id="faq" style="background-color:{{ $p->bgColor ?? '#101229' }}; {{ $ptb }}" class="text-white border-t border-white/5">
                        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="text-center mb-12" data-aos="fade-up">
                                <h2 class="text-4xl sm:text-5xl md:text-6xl font-bold tracking-tight text-white">
                                    QUESTIONS <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-indigo-200">fréquentes</span>
                                </h2>
                                <p class="text-indigo-200/80 text-sm font-light mt-3">
                                    Tout ce que vous devez savoir sur nos processus de tournage, de livraison et nos garanties.
                                </p>
                            </div>

                            <div class="space-y-4">
                                @php
                                    $faqs = [
                                        ['q' => 'Comment se déroule un projet de production avec SmartFilms ?', 'a' => 'Notre processus s\'articule en 4 phases : 1) Briefing & cadrage des objectifs, 2) Scénarisation, storyboarding et repérages, 3) Tournage avec équipe cinéma & drone, 4) Post-production (montage, sound design, étalonnage couleur) et livraison multi-formats.'],
                                        ['q' => 'Quel est le délai moyen pour recevoir la première version montée ?', 'a' => 'Généralement entre 7 et 12 jours ouvrés après le tournage. Nous incluons deux tours d\'ajustements pour vous garantir une satisfaction totale avant la livraison master.'],
                                        ['q' => 'Gérez-vous l\'ensemble des autorisations administratives au Maroc ?', 'a' => 'Oui, nous prenons en charge l\'intégralité des formalités administratives et autorisations de tournage au sol et par drone auprès du CCM (Centre Cinématographique Marocain) et des autorités locales.'],
                                        ['q' => 'Pouvez-vous adapter les films aux formats réseaux sociaux (9:16) ?', 'a' => 'Absolument. Chaque production peut être déclinée en formats courts verticaux (Reels, Shorts, TikTok) avec titrages et sous-titrages adaptés pour un taux d\'engagement maximal.'],
                                        ['q' => 'Comment obtenir un devis pour notre entreprise ?', 'a' => 'Vous pouvez utiliser notre simulateur en ligne en haut de page ou contacter directement notre régie au ' . $sitePhone . ' pour une étude personnalisée.'],
                                    ];
                                @endphp

                                @foreach($faqs as $faq)
                                    <details class="group bg-white/5 border border-white/10 rounded-2xl p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                                        <summary class="flex items-center justify-between font-bold text-base md:text-lg text-white">
                                            <span>{{ $faq['q'] }}</span>
                                            <span class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-xs group-open:rotate-180 transition-transform"><i class="fas fa-chevron-down"></i></span>
                                        </summary>
                                        <p class="mt-4 text-indigo-200/80 text-sm leading-relaxed font-light pl-3 border-l-2 border-[#FF4D42]">
                                            {{ $faq['a'] }}
                                        </p>
                                    </details>
                                @endforeach
                            </div>
                        </div>
                    </section>

                <!-- 9. CASABLANCA HEADQUARTERS & DIRECT CONTACT (Left / Right Animation) -->
                @elseif($sec['type'] == 'rembrand_contact' || $sec['type'] == 'cta_banner_1')
                    <section id="contact" style="background-color:{{ $p->bgColor ?? '#F8F9FC' }}; {{ $ptb }}" class="border-t border-indigo-950/10 overflow-hidden">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                                <h2 class="text-4xl sm:text-5xl md:text-6xl font-bold tracking-tight text-[#101229]">
                                    <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-slate-500 block mb-1">contactez</span>
                                    <span>SMART FILMS PROD</span>
                                </h2>
                                <p class="text-slate-600 text-base font-light mt-4">
                                    Rencontrons-nous à notre studio de Casablanca pour donner vie à votre prochaine production.
                                </p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                                
                                <!-- Contact Details Card with Map (Slide from Left) -->
                                <div class="lg:col-span-5 bg-white p-8 md:p-10 rounded-3xl border border-indigo-950/10 shadow-sm space-y-6" data-aos="fade-right">
                                    <div class="flex items-start gap-4">
                                        <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-[#FF4D42] flex items-center justify-center shrink-0 text-lg">
                                            <i class="bi bi-geo-alt-fill"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-xs uppercase font-mono tracking-widest text-slate-400 font-bold mb-1">ADRESSE DU STUDIO</h4>
                                            <p class="text-[#101229] font-semibold text-base leading-relaxed">
                                                {{ $siteAddress }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-4">
                                        <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-[#FF4D42] flex items-center justify-center shrink-0 text-lg">
                                            <i class="bi bi-telephone-fill"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-xs uppercase font-mono tracking-widest text-slate-400 font-bold mb-1">TÉLÉPHONE</h4>
                                            <a href="tel:{{ str_replace(' ', '', $sitePhone) }}" class="text-[#101229] font-extrabold text-lg hover:text-[#FF4D42] transition-colors">
                                                {{ $sitePhone }}
                                            </a>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-4">
                                        <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-[#FF4D42] flex items-center justify-center shrink-0 text-lg">
                                            <i class="bi bi-envelope-fill"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-xs uppercase font-mono tracking-widest text-slate-400 font-bold mb-1">EMAIL</h4>
                                            <a href="mailto:{{ $siteEmail }}" class="text-[#101229] font-semibold text-base hover:text-[#FF4D42] transition-colors">
                                                {{ $siteEmail }}
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Interactive Google Map Embed -->
                                    <div class="rounded-2xl overflow-hidden border border-slate-200 mt-4">
                                        <iframe class="w-full h-48 border-0" src="https://maps.google.com/maps?q=Boulevard+d+Anfa+Casablanca&t=&z=14&ie=UTF8&iwloc=&output=embed" loading="lazy"></iframe>
                                    </div>
                                </div>

                                <!-- Direct Form Card (Slide from Right) -->
                                <div class="lg:col-span-7 bg-white p-8 md:p-10 rounded-3xl border border-indigo-950/10 shadow-sm" data-aos="fade-left" data-aos-delay="200">
                                    <form action="{{ route('inquiry.submit') }}" method="POST" class="space-y-6">
                                        @csrf
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-xs font-semibold uppercase tracking-wider text-[#101229] mb-2">Nom Complet *</label>
                                                <input type="text" name="name" placeholder="Votre nom" required class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-[#101229] focus:outline-none focus:border-[#FF4D42]">
                                            </div>
                                            <div>
                                                <label class="block text-xs font-semibold uppercase tracking-wider text-[#101229] mb-2">Téléphone *</label>
                                                <input type="tel" name="phone" placeholder="06..." required class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-[#101229] focus:outline-none focus:border-[#FF4D42]">
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-xs font-semibold uppercase tracking-wider text-[#101229] mb-2">Email</label>
                                                <input type="email" name="email" placeholder="votre@email.com" class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-[#101229] focus:outline-none focus:border-[#FF4D42]">
                                            </div>
                                            <div>
                                                <label class="block text-xs font-semibold uppercase tracking-wider text-[#101229] mb-2">Budget Indicatif</label>
                                                <select name="budget_tier" class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-[#101229] focus:outline-none focus:border-[#FF4D42]">
                                                    <option value="Non spécifié">Sélectionner une fourchette</option>
                                                    <option value="20 000 - 50 000 MAD">20 000 - 50 000 MAD</option>
                                                    <option value="50 000 - 100 000 MAD">50 000 - 100 000 MAD</option>
                                                    <option value="100 000 - 250 000 MAD">100 000 - 250 000 MAD</option>
                                                    <option value="+250 000 MAD">+250 000 MAD</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#101229] mb-2">Message & Détails du projet</label>
                                            <textarea name="message" rows="4" placeholder="Parlez-nous de vos objectifs, du lieu de tournage et de vos attentes..." required class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-[#101229] focus:outline-none focus:border-[#FF4D42]"></textarea>
                                        </div>

                                        <div class="flex justify-end">
                                            <button type="submit" class="bg-[#FF4D42] hover:bg-[#E03E33] text-white px-10 py-4 rounded-full font-bold uppercase tracking-widest text-xs transition-all shadow-xl shadow-rose-500/20 hover:scale-105 flex items-center gap-2">
                                                <span>Envoyer le message</span> <i class="fas fa-paper-plane text-[10px]"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
                
            @endforeach
        @endif
    </main>

    <!-- Luxury Footer -->
    <footer class="bg-[#080914] text-indigo-200 border-t border-white/10 py-16 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="space-y-4">
                    <img src="/uploads/smartfilms_logo.png" alt="SmartFilms Prod" class="h-10 w-auto">
                    <p class="text-indigo-200/70 leading-relaxed text-xs">
                        Maison de production audiovisuelle à Casablanca. Films institutionnels, spots de marque et captation drone 4K d'envergure.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-white uppercase tracking-widest text-xs mb-4">NAVIGATION</h4>
                    <ul class="space-y-2.5 text-indigo-200/70">
                        <li><a href="/" class="hover:text-white transition-colors">Accueil</a></li>
                        <li><a href="#portfolio" class="hover:text-white transition-colors">Nos Réalisations</a></li>
                        <li><a href="#offres" class="hover:text-white transition-colors">Expertises Métiers</a></li>
                        <li><a href="#estimateur" class="hover:text-white transition-colors">Estimer un Projet</a></li>
                        <li><a href="#contact" class="hover:text-white transition-colors">Contact Casablanca</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white uppercase tracking-widest text-xs mb-4">CONTACT DIRECT</h4>
                    <ul class="space-y-2.5 text-indigo-200/70">
                        <li><i class="bi bi-telephone text-[#FF4D42] mr-2"></i> {{ $sitePhone }}</li>
                        <li><i class="bi bi-envelope text-[#FF4D42] mr-2"></i> {{ $siteEmail }}</li>
                        <li><i class="bi bi-geo-alt text-[#FF4D42] mr-2"></i> {{ $siteAddress }}</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white uppercase tracking-widest text-xs mb-4">HORAIRES DU STUDIO</h4>
                    <p class="text-indigo-200/70 leading-relaxed">
                        Lundi au Vendredi<br>
                        09:00 - 19:00
                    </p>
                </div>
            </div>
            
            <div class="pt-8 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center gap-4 text-indigo-300/60">
                <p>© {{ date('Y') }} SmartFilms Prod. Tous droits réservés.</p>
                <p>Casablanca, Maroc &bull; Société de Production Audiovisuelle & Cinématographique</p>
            </div>
        </div>
    </footer>

    <!-- Video Lightbox Modal (4K Theater Player) -->
    <div id="videoModal" class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md hidden flex items-center justify-center p-4 transition-opacity duration-300">
        <div class="relative w-full max-w-5xl bg-slate-950 rounded-3xl overflow-hidden border border-white/20 shadow-2xl">
            <div class="flex justify-between items-center px-6 py-4 border-b border-white/10 bg-slate-900">
                <span id="modalVideoTitle" class="font-bold text-sm uppercase tracking-wider text-white">SmartFilms Cinema Showcase</span>
                <button onclick="closeVideoModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-[#FF4D42] text-white flex items-center justify-center text-sm transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="aspect-video w-full bg-black">
                <iframe id="modalIframe" class="w-full h-full border-0" src="" allow="autoplay; fullscreen" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- Floating WhatsApp VIP Concierge Pill -->
    <a href="https://wa.me/{{ $siteWhatsApp }}?text={{ urlencode('Bonjour SmartFilms, j\'aimerais échanger sur un projet de production audiovisuelle pour mon entreprise.') }}" target="_blank" class="fixed bottom-6 right-6 z-40 bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-3.5 rounded-full shadow-2xl flex items-center gap-3 transition-all hover:scale-105 group border-2 border-white/20">
        <span class="relative flex h-3 w-3">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
        </span>
        <i class="bi bi-whatsapp text-lg"></i>
        <span class="text-xs uppercase font-bold tracking-wider hidden sm:inline">WhatsApp Concierge</span>
    </a>

    <!-- AOS Animation Library JS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <!-- Interactive Javascript Logic -->
    <script>
        // 0. Initialize AOS Scroll Animations
        AOS.init({
            duration: 850,
            once: true,
            offset: 80,
            easing: 'ease-out-cubic'
        });

        // 1. Sticky Luxury White Header on Scroll
        const headerEl = document.getElementById('mainHeader');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                headerEl.classList.add('scrolled');
            } else {
                headerEl.classList.remove('scrolled');
            }
        }, { passive: true });

        // Trigger on initial page load if already scrolled
        if (window.scrollY > 50) {
            headerEl.classList.add('scrolled');
        }

        // 2. Audio Toggle for Hero Looping Video
        function toggleHeroAudio() {
            const video = document.getElementById('heroVideoEl');
            const icon = document.getElementById('audioIcon');
            const text = document.getElementById('audioText');
            if (video) {
                video.muted = !video.muted;
                if (!video.muted) {
                    icon.className = 'bi bi-volume-up-fill text-base text-[#FF4D42]';
                    text.innerText = 'Couper le son';
                } else {
                    icon.className = 'bi bi-volume-mute-fill text-base text-[#FF4D42]';
                    text.innerText = 'Activer le son';
                }
            }
        }

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

        // 4. Portfolio Filter
        function filterPortfolio(category) {
            const cards = document.querySelectorAll('.project-card');
            const tabs = document.querySelectorAll('.portfolio-tab');
            
            tabs.forEach(tab => {
                if (tab.getAttribute('data-cat') === category) {
                    tab.className = 'portfolio-tab active px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all bg-[#FF4D42] text-white';
                } else {
                    tab.className = 'portfolio-tab px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all bg-white/5 hover:bg-white/15 text-indigo-200 hover:text-white';
                }
            });

            cards.forEach(card => {
                const cardCat = card.getAttribute('data-category');
                if (category === 'all' || cardCat === category) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }

        // 5. Split-Screen Director's Console Interactivity
        const expertisesList = @json($expertisesData);

        function selectConsoleExpertise(index) {
            const data = expertisesList[index];
            if (!data) return;

            // Update active state in left navigation list
            document.querySelectorAll('.console-nav-item').forEach((item, idx) => {
                if (idx === index) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });

            // Update right monitor display with smooth fade
            const rightScreen = document.querySelector('.lg\\:col-span-7');
            if (rightScreen) {
                document.getElementById('consoleTag').innerHTML = data.tag;
                document.getElementById('consoleNum').innerText = data.num;
                document.getElementById('consoleTitle').innerText = data.title;
                document.getElementById('consoleSubtitle').innerText = data.subtitle;
                document.getElementById('consoleDesc').innerText = data.desc;
                document.getElementById('consoleEquipment').innerHTML = data.equipment;
                document.getElementById('consoleTurnaround').innerText = data.turnaround;
                document.getElementById('consoleBgImg').src = data.image;

                // Update deliverables list
                let deliverablesHtml = '';
                data.deliverables.forEach(d => {
                    deliverablesHtml += `<span class="px-3 py-1 rounded-lg bg-white/10 text-[11px] font-mono text-white border border-white/10"><i class="bi bi-check2 text-[#FF4D42] mr-1"></i> ${d}</span> `;
                });
                document.getElementById('consoleDeliverables').innerHTML = deliverablesHtml;
            }
        }

        // 6. Interactive Project Cost Estimator Wizard
        let currentStep = 1;
        const totalSteps = 4;
        const stepTitles = ['Type de Projet', 'Format & Durée', 'Budget Indicatif', 'Coordonnées & Envoi'];

        function changeStep(direction) {
            const newStep = currentStep + direction;
            if (newStep >= 1 && newStep <= totalSteps) {
                document.getElementById('step-' + currentStep).classList.add('hidden');
                currentStep = newStep;
                document.getElementById('step-' + currentStep).classList.remove('hidden');

                document.getElementById('currentStepNum').innerText = currentStep;
                document.getElementById('stepIndicatorNumber').innerText = currentStep;
                document.getElementById('stepIndicatorTitle').innerText = stepTitles[currentStep - 1];

                const prevBtn = document.getElementById('prevStepBtn');
                const nextBtn = document.getElementById('nextStepBtn');
                const submitBtn = document.getElementById('submitStepBtn');

                if (currentStep === 1) {
                    prevBtn.classList.add('hidden');
                } else {
                    prevBtn.classList.remove('hidden');
                }

                if (currentStep === totalSteps) {
                    nextBtn.classList.add('hidden');
                    submitBtn.classList.remove('hidden');
                } else {
                    nextBtn.classList.remove('hidden');
                    submitBtn.classList.add('hidden');
                }
            }
        }

        async function submitEstimator(e) {
            e.preventDefault();
            const form = document.getElementById('estimatorForm');
            const formData = new FormData(form);
            const submitBtn = document.getElementById('submitStepBtn');
            submitBtn.disabled = true;
            submitBtn.innerText = 'Envoi en cours...';

            try {
                const response = await fetch('{{ route('inquiry.submit') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });

                if (response.ok) {
                    form.classList.add('hidden');
                    document.getElementById('estimatorSuccess').classList.remove('hidden');
                } else {
                    alert('Une erreur est survenue lors de l\'envoi. Veuillez vérifier vos informations ou nous contacter au {{ $sitePhone }}.');
                    submitBtn.disabled = false;
                    submitBtn.innerText = 'Recevoir mon estimation';
                }
            } catch (err) {
                alert('Erreur réseau. Veuillez nous contacter directement au {{ $sitePhone }}.');
                submitBtn.disabled = false;
                submitBtn.innerText = 'Recevoir mon estimation';
            }
        }
    </script>
</body>
</html>

