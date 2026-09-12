@php
    $menus = \App\Models\Menu::whereNull('parent_id')->orderBy('order')->with('children.children')->get();
@endphp
<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KXGNMJVJ');</script>
    <!-- End Google Tag Manager -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->meta_title ?? $page->title }} - SmartFilms Prod</title>
    @if($page->meta_description)
        <meta name="description" content="{{ $page->meta_description }}">
    @endif
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,400;1,500;1,600;1,700&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style> 
        :root {
            --brand-navy: #1E2046;
            --brand-navy-dark: #141632;
            --brand-coral: #FF4D42;
            --brand-coral-hover: #E03E33;
            --brand-bg: #F8F9FC;
        }
        body { font-family: "Outfit", sans-serif; background-color: var(--brand-bg); color: #1E2046; } 
        .font-serif-italic { font-family: "Cormorant Garamond", serif; font-style: italic; }
        
        .group:hover .group-hover\:visible { visibility: visible; opacity: 1; margin-top: 0; }
        .group\/sub:hover .group-hover\/sub\:visible { visibility: visible; opacity: 1; }
    </style>
</head>
<body class="bg-[#F8F9FC] text-[#1E2046] antialiased">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KXGNMJVJ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Header with Official Smart Films Logo -->
    <header class="bg-[#F8F9FC]/95 backdrop-blur-md border-b border-indigo-950/10 sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <a href="/" class="flex items-center gap-3 group">
                    <img src="/uploads/smartfilms_logo.png" alt="Smart Films Prod Logo" class="h-12 w-auto object-contain transition-transform group-hover:scale-105">
                </a>
                
                <nav class="hidden md:flex items-center space-x-8 h-full">
                    @foreach($menus as $menu)
                        @if($menu->children->count() > 0)
                            <div class="relative group h-full flex items-center">
                                <a href="{{ $menu->url }}" class="text-[#1E2046] hover:text-[#FF4D42] font-semibold text-xs uppercase tracking-widest flex items-center transition-colors">
                                    {{ $menu->title }} <i class="fas fa-chevron-down text-[9px] ml-1.5 opacity-60"></i>
                                </a>
                                <div class="absolute left-0 top-full mt-0 w-64 bg-white border border-indigo-950/10 shadow-xl rounded-b-2xl opacity-0 invisible transition-all duration-200 z-50 overflow-hidden">
                                    @foreach($menu->children as $child)
                                        @if($child->children->count() > 0)
                                            <div class="relative group/sub">
                                                <a href="{{ $child->url }}" class="block px-5 py-3 text-xs uppercase tracking-wider text-[#1E2046] hover:bg-indigo-50 hover:text-[#FF4D42] border-b border-indigo-50 flex justify-between items-center transition-colors">
                                                    {{ $child->title }} <i class="fas fa-chevron-right text-[9px] opacity-60"></i>
                                                </a>
                                                <div class="absolute left-full top-0 ml-0 w-56 bg-white border border-indigo-950/10 shadow-xl rounded-r-2xl opacity-0 invisible transition-all duration-200 z-50">
                                                    @foreach($child->children as $subchild)
                                                        <a href="{{ $subchild->url }}" class="block px-5 py-3 text-xs uppercase tracking-wider text-slate-600 hover:bg-indigo-50 hover:text-[#FF4D42] border-b border-indigo-50 transition-colors">{{ $subchild->title }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <a href="{{ $child->url }}" class="block px-5 py-3 text-xs uppercase tracking-wider text-[#1E2046] hover:bg-indigo-50 hover:text-[#FF4D42] border-b border-indigo-50 transition-colors">{{ $child->title }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a href="{{ $menu->url }}" class="text-[#1E2046] hover:text-[#FF4D42] font-semibold text-xs uppercase tracking-widest transition-colors">{{ $menu->title }}</a>
                        @endif
                    @endforeach
                </nav>

                <div class="hidden md:flex items-center gap-4">
                    <a href="#contact" class="bg-[#FF4D42] hover:bg-[#E03E33] text-white px-7 py-3 rounded-full text-xs uppercase tracking-widest font-bold transition-all shadow-md shadow-rose-500/20 hover:scale-105 flex items-center gap-2">
                        <span>Contact</span> <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>

                <button id="mobileMenuBtn" class="md:hidden text-[#1E2046] focus:outline-none text-2xl" onclick="document.getElementById('mobileMenu').classList.toggle('hidden')">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>

        <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-indigo-950/10 absolute w-full left-0 shadow-2xl overflow-y-auto max-h-[80vh] z-50">
            <div class="px-4 py-4 space-y-2">
                @foreach($menus as $menu)
                    <a href="{{ $menu->url }}" class="block px-3 py-3 text-sm font-semibold text-[#1E2046] border-b border-slate-100 uppercase tracking-wider">{{ $menu->title }}</a>
                    @foreach($menu->children as $child)
                        <a href="{{ $child->url }}" class="block px-3 py-2 pl-8 text-xs font-medium text-slate-600 border-b border-slate-100 hover:text-[#FF4D42] uppercase tracking-wider"><i class="fas fa-angle-right text-[9px] mr-2 text-slate-400"></i> {{ $child->title }}</a>
                        @foreach($child->children as $subchild)
                            <a href="{{ $subchild->url }}" class="block px-3 py-2 pl-12 text-[11px] text-slate-500 hover:text-[#FF4D42] border-b border-slate-100 uppercase tracking-wider"><i class="fas fa-minus text-[9px] mr-2 text-slate-400"></i> {{ $subchild->title }}</a>
                        @endforeach
                    @endforeach
                @endforeach
            </div>
        </div>
    </header>

    <main class="min-h-screen">
        @if($page->content && is_array($page->content) && count($page->content) > 0)
            @foreach($page->content as $sec)
                @php
                    $p = (object) ($sec['props'] ?? []);
                    $ptb = "padding-top:" . ($p->paddingTop ?? '80') . "px; padding-bottom:" . ($p->paddingBottom ?? '80') . "px;";
                @endphp

                <!-- 1. Hero Section with Seamless Looping Video Player -->
                @if($sec['type'] == 'rembrand_hero' || $sec['type'] == 'genesis_hero' || $sec['type'] == 'hero_video_cinema' || $sec['type'] == 'hero1')
                    <section style="background-color:{{ $p->bgColor ?? '#F8F9FC' }}; {{ $ptb }}" class="relative overflow-hidden">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="relative rounded-[2.5rem] overflow-hidden bg-[#141632] min-h-[75vh] flex items-end p-8 md:p-16 shadow-2xl border border-indigo-950/20 group">
                                
                                <!-- Seamless Looping YouTube Video Background Container -->
                                <div class="absolute inset-0 w-full h-full pointer-events-none overflow-hidden scale-105">
                                    <video autoplay loop muted playsinline class="w-full h-full object-cover opacity-80">
                                        <source src="/uploads/hero_youtube.mp4" type="video/mp4">
                                        <source src="/uploads/hero_video.mp4" type="video/mp4">
                                    </video>
                                    <iframe src="https://www.youtube.com/embed/_yWLYCiW1Z8?autoplay=1&mute=1&loop=1&playlist=_yWLYCiW1Z8&controls=0&showinfo=0&rel=0&iv_load_policy=3&modestbranding=1&enablejsapi=1" class="w-[100vw] h-[56.25vw] min-h-[100vh] min-w-[177.77vh] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 opacity-70 border-0 pointer-events-none" allow="autoplay; fullscreen"></iframe>
                                </div>

                                <div class="absolute inset-0 bg-gradient-to-t from-[#141632] via-[#141632]/50 to-transparent"></div>

                                <div class="relative z-10 max-w-4xl text-white space-y-6">
                                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs tracking-widest uppercase font-medium">
                                        <span class="w-2.5 h-2.5 rounded-full bg-[#FF4D42] animate-pulse"></span>
                                        <span>{{ $p->subtitle ?? 'AGENCE DE PRODUCTION AUDIOVISUELLE & CONTENUS DE MARQUE' }}</span>
                                    </div>

                                    <h1 class="text-4xl sm:text-6xl md:text-7xl lg:text-8xl tracking-tight leading-[0.95] text-white">
                                        <span class="font-serif-italic font-normal block lowercase text-3xl sm:text-5xl md:text-6xl mb-2 text-indigo-200">{{ $p->prefixText ?? 'agence de' }}</span>
                                        <span class="font-extrabold uppercase tracking-tight font-sans block drop-shadow-lg">{{ $p->title ?? 'PRODUCTION AUDIOVISUELLE' }}</span>
                                    </h1>

                                    <p class="text-indigo-100 text-base md:text-xl font-light max-w-2xl leading-relaxed">
                                        {{ $p->description ?? 'Nous créons des récits cinématographiques à fort impact pour sublimer l\'image de votre entreprise et captiver vos audiences à Casablanca et partout au Maroc.' }}
                                    </p>

                                    @if(!empty($p->btnText))
                                        <div class="pt-4">
                                            <a href="{{ $p->btnLink ?? '#offres' }}" class="inline-flex items-center gap-3 bg-[#FF4D42] hover:bg-[#E03E33] text-white px-8 py-4 rounded-full font-bold uppercase tracking-wider text-xs transition-all shadow-xl shadow-rose-500/30 hover:scale-105">
                                                <span>{{ $p->btnText }}</span>
                                                <i class="fas fa-arrow-right text-[10px]"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>

                <!-- 2. Client Trust Logos (ILS NOUS FONT CONFIANCE) with 9 Real Logos -->
                @elseif($sec['type'] == 'rembrand_client_logos')
                    <section style="background-color:{{ $p->bgColor ?? '#F8F9FC' }}; {{ $ptb }}" class="border-y border-indigo-950/10 py-16">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                            <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-indigo-50 border border-indigo-100 text-[11px] font-bold uppercase tracking-widest text-[#1E2046] mb-10">
                                <i class="bi bi-shield-check text-[#FF4D42]"></i>
                                <span>{{ $p->title ?? 'ILS NOUS FONT CONFIANCE' }}</span>
                            </div>

                            <!-- Responsive Grid of 9 Real Client Logos -->
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-9 gap-6 items-center justify-items-center">
                                <div class="p-4 rounded-2xl bg-white border border-indigo-950/5 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 w-full h-24 flex items-center justify-center p-3 group">
                                    <img src="/uploads/logo_flowpipe.png" alt="FlowPipe Groupe Plastima" class="max-h-12 max-w-full object-contain grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all">
                                </div>

                                <div class="p-4 rounded-2xl bg-white border border-indigo-950/5 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 w-full h-24 flex items-center justify-center p-3 group">
                                    <img src="/uploads/logo_danone.png" alt="DANONE" class="max-h-12 max-w-full object-contain grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all">
                                </div>

                                <div class="p-4 rounded-2xl bg-white border border-indigo-950/5 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 w-full h-24 flex items-center justify-center p-3 group">
                                    <img src="/uploads/logo_ingelec.png" alt="ingelec" class="max-h-12 max-w-full object-contain grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all">
                                </div>

                                <div class="p-4 rounded-2xl bg-white border border-indigo-950/5 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 w-full h-24 flex items-center justify-center p-3 group">
                                    <img src="/uploads/logo_orblanc.png" alt="Or Blanc" class="max-h-12 max-w-full object-contain grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all">
                                </div>

                                <div class="p-4 rounded-2xl bg-white border border-indigo-950/5 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 w-full h-24 flex items-center justify-center p-3 group">
                                    <img src="/uploads/logo_dell.jpg" alt="DELL Technologies" class="max-h-12 max-w-full object-contain grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all">
                                </div>

                                <div class="p-4 rounded-2xl bg-white border border-indigo-950/5 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 w-full h-24 flex items-center justify-center p-3 group">
                                    <img src="/uploads/logo_bcp.png" alt="BCP International" class="max-h-12 max-w-full object-contain grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all">
                                </div>

                                <div class="p-4 rounded-2xl bg-white border border-indigo-950/5 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 w-full h-24 flex items-center justify-center p-3 group">
                                    <img src="/uploads/logo_tanger_alliance.png" alt="Tanger Alliance" class="max-h-12 max-w-full object-contain grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all">
                                </div>

                                <div class="p-4 rounded-2xl bg-white border border-indigo-950/5 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 w-full h-24 flex items-center justify-center p-3 group">
                                    <img src="/uploads/logo_loterie_nationale.png" alt="Loterie Nationale" class="max-h-12 max-w-full object-contain grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all">
                                </div>

                                <div class="p-4 rounded-2xl bg-white border border-indigo-950/5 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 w-full h-24 flex items-center justify-center p-3 group">
                                    <img src="/uploads/logo_clermont.jpg" alt="clermont" class="max-h-12 max-w-full object-contain grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all">
                                </div>
                            </div>
                        </div>
                    </section>

                <!-- 3. Rembrand Offres / Services (Deep Navy Section with Coral Accents) -->
                @elseif($sec['type'] == 'rembrand_offres' || $sec['type'] == 'services_cards_1')
                    <section id="offres" style="background-color:{{ $p->bgColor ?? '#1E2046' }}; {{ $ptb }}" class="text-[#F8F9FC] border-t border-black/10">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
                                <div>
                                    <h2 class="text-4xl sm:text-5xl md:text-6xl font-bold tracking-tight text-white">
                                        NOS <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-indigo-200">offres</span>
                                    </h2>
                                    <p class="text-indigo-200/80 text-sm md:text-base font-light mt-2 max-w-xl">
                                        {{ $p->subtitle ?? 'Des solutions sur-mesure de communication et de production cinématographique.' }}
                                    </p>
                                </div>
                                <a href="#contact" class="inline-flex items-center gap-2 bg-[#FF4D42] hover:bg-[#E03E33] text-white px-7 py-3 rounded-full text-xs font-bold uppercase tracking-widest transition-all shadow-lg shadow-rose-500/20 hover:scale-105">
                                    <span>Demander un devis</span> <i class="fas fa-arrow-right text-[10px]"></i>
                                </a>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="p-8 md:p-10 rounded-3xl border border-white/10 bg-white/5 backdrop-blur-sm hover:bg-white/10 transition-all duration-300 flex flex-col justify-between group">
                                    <div class="space-y-4">
                                        <div class="w-12 h-12 rounded-2xl bg-[#FF4D42]/20 text-[#FF4D42] flex items-center justify-center text-xl font-bold">01</div>
                                        <h3 class="text-xl md:text-2xl font-bold tracking-tight text-white uppercase">COMMUNICATION DE MARQUE</h3>
                                        <p class="text-indigo-200/80 text-sm font-light leading-relaxed">
                                            Stratégie de contenu visuel, direction artistique et campagnes publicitaires impactantes pour affirmer votre identité de marque.
                                        </p>
                                    </div>
                                    <div class="pt-8 flex justify-end">
                                        <span class="w-10 h-10 rounded-full bg-white/10 group-hover:bg-[#FF4D42] group-hover:text-white text-white flex items-center justify-center text-xs transition-all">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="p-8 md:p-10 rounded-3xl border border-white/10 bg-white/5 backdrop-blur-sm hover:bg-white/10 transition-all duration-300 flex flex-col justify-between group">
                                    <div class="space-y-4">
                                        <div class="w-12 h-12 rounded-2xl bg-[#FF4D42]/20 text-[#FF4D42] flex items-center justify-center text-xl font-bold">02</div>
                                        <h3 class="text-xl md:text-2xl font-bold tracking-tight text-white uppercase">COMMUNICATION RSE & IMPACT</h3>
                                        <p class="text-indigo-200/80 text-sm font-light leading-relaxed">
                                            Films à fort impact sociétal et environnemental. Mettez en lumière vos engagements RSE avec authenticité et émotion.
                                        </p>
                                    </div>
                                    <div class="pt-8 flex justify-end">
                                        <span class="w-10 h-10 rounded-full bg-white/10 group-hover:bg-[#FF4D42] group-hover:text-white text-white flex items-center justify-center text-xs transition-all">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="p-8 md:p-10 rounded-3xl border border-white/10 bg-white/5 backdrop-blur-sm hover:bg-white/10 transition-all duration-300 flex flex-col justify-between group">
                                    <div class="space-y-4">
                                        <div class="w-12 h-12 rounded-2xl bg-[#FF4D42]/20 text-[#FF4D42] flex items-center justify-center text-xl font-bold">03</div>
                                        <h3 class="text-xl md:text-2xl font-bold tracking-tight text-white uppercase">COMMUNICATION CORPORATE</h3>
                                        <p class="text-indigo-200/80 text-sm font-light leading-relaxed">
                                            Films d'entreprise, vidéos institutionnelles et reportages d'évènements pour renforcer votre crédibilité et votre notoriété.
                                        </p>
                                    </div>
                                    <div class="pt-8 flex justify-end">
                                        <span class="w-10 h-10 rounded-full bg-white/10 group-hover:bg-[#FF4D42] group-hover:text-white text-white flex items-center justify-center text-xs transition-all">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="p-8 md:p-10 rounded-3xl border border-white/10 bg-white/5 backdrop-blur-sm hover:bg-white/10 transition-all duration-300 flex flex-col justify-between group">
                                    <div class="space-y-4">
                                        <div class="w-12 h-12 rounded-2xl bg-[#FF4D42]/20 text-[#FF4D42] flex items-center justify-center text-xl font-bold">04</div>
                                        <h3 class="text-xl md:text-2xl font-bold tracking-tight text-white uppercase">PRODUCTION AUDIOVISUELLE</h3>
                                        <p class="text-indigo-200/80 text-sm font-light leading-relaxed">
                                            Tournages 4K/8K, prises de vues aériennes par drone certifié, étalonnage couleur cinéma et montage de niveau broadcast.
                                        </p>
                                    </div>
                                    <div class="pt-8 flex justify-end">
                                        <span class="w-10 h-10 rounded-full bg-white/10 group-hover:bg-[#FF4D42] group-hover:text-white text-white flex items-center justify-center text-xs transition-all">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                <!-- 4. Rembrand Mission Section -->
                @elseif($sec['type'] == 'rembrand_mission' || $sec['type'] == 'genesis_statement')
                    <section style="background-color:{{ $p->bgColor ?? '#F8F9FC' }}; {{ $ptb }}" class="border-t border-indigo-950/10">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                                <div>
                                    <h2 class="text-4xl sm:text-5xl md:text-6xl font-bold tracking-tight text-[#1E2046]">
                                        NOTRE <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-slate-500">mission</span>
                                    </h2>
                                    <div class="mt-8 flex items-center gap-4 p-4 rounded-2xl bg-white border border-indigo-950/10 shadow-sm w-fit">
                                        <div class="flex -space-x-3">
                                            <span class="w-10 h-10 rounded-full bg-[#1E2046] text-white font-bold flex items-center justify-center text-xs border-2 border-white">SF</span>
                                            <span class="w-10 h-10 rounded-full bg-[#FF4D42] text-white font-bold flex items-center justify-center text-xs border-2 border-white">4K</span>
                                            <span class="w-10 h-10 rounded-full bg-indigo-900 text-white font-bold flex items-center justify-center text-xs border-2 border-white">PRO</span>
                                        </div>
                                        <div class="text-left">
                                            <span class="font-extrabold text-xl text-[#1E2046] block leading-none">+120 PROJETS</span>
                                            <span class="text-[11px] text-slate-500 uppercase tracking-wider font-medium">Films & Vidéos Livrés</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-8 md:p-12 rounded-3xl border border-indigo-950/10 shadow-sm space-y-6">
                                    <p class="text-[#1E2046] text-lg md:text-xl font-light leading-relaxed">
                                        {{ $p->text ?? 'Les entreprises d\'aujourd\'hui ont besoin d\'histoires fortes. Chez SmartFilms Prod, nous combinons la rigueur technique du cinéma avec une compréhension stratégique des enjeux de votre marque pour créer du contenu mémorable.' }}
                                    </p>
                                    <p class="text-slate-500 text-sm font-normal">
                                        Basés à Casablanca, nous accompagnons les entreprises et institutions dans tout le Maroc.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                <!-- 5. Contact Section with Casablanca Address & Form -->
                @elseif($sec['type'] == 'rembrand_contact' || $sec['type'] == 'cta_banner_1')
                    <section id="contact" style="background-color:{{ $p->bgColor ?? '#F8F9FC' }}; {{ $ptb }}" class="border-t border-indigo-950/10">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="text-center max-w-3xl mx-auto mb-16">
                                <h2 class="text-4xl sm:text-5xl md:text-6xl font-bold tracking-tight text-[#1E2046]">
                                    <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-slate-500 block mb-1">contactez</span>
                                    <span>SMART FILMS PROD</span>
                                </h2>
                                <p class="text-slate-600 text-base font-light mt-4">
                                    Discutons de votre prochain projet audiovisuel autour d'un café ou par téléphone.
                                </p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                                <!-- Contact Details Card -->
                                <div class="lg:col-span-5 bg-white p-8 md:p-10 rounded-3xl border border-indigo-950/10 shadow-sm space-y-8">
                                    <div class="flex items-start gap-4">
                                        <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-[#FF4D42] flex items-center justify-center shrink-0 text-lg">
                                            <i class="bi bi-geo-alt-fill"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-xs uppercase font-mono tracking-widest text-slate-400 font-bold mb-1">ADRESSE</h4>
                                            <p class="text-[#1E2046] font-semibold text-base leading-relaxed">
                                                130 Bv Anfa 20300 Casablanca, Maroc
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-4">
                                        <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-[#FF4D42] flex items-center justify-center shrink-0 text-lg">
                                            <i class="bi bi-telephone-fill"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-xs uppercase font-mono tracking-widest text-slate-400 font-bold mb-1">TÉLÉPHONE</h4>
                                            <a href="tel:0617202345" class="text-[#1E2046] font-extrabold text-lg hover:text-[#FF4D42] transition-colors">
                                                06 17 20 23 45
                                            </a>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-4">
                                        <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-[#FF4D42] flex items-center justify-center shrink-0 text-lg">
                                            <i class="bi bi-envelope-fill"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-xs uppercase font-mono tracking-widest text-slate-400 font-bold mb-1">EMAIL</h4>
                                            <a href="mailto:contact@smartfilmsprod.com" class="text-[#1E2046] font-semibold text-base hover:text-[#FF4D42] transition-colors">
                                                contact@smartfilmsprod.com
                                            </a>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-4 pt-2 border-t border-slate-100">
                                        <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-[#FF4D42] flex items-center justify-center shrink-0 text-lg">
                                            <i class="bi bi-clock-fill"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-xs uppercase font-mono tracking-widest text-slate-400 font-bold mb-1">HORAIRES</h4>
                                            <p class="text-slate-700 font-medium text-sm">
                                                Lundi - Vendredi: 09:00 - 19:00
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Card -->
                                <div class="lg:col-span-7 bg-white p-8 md:p-10 rounded-3xl border border-indigo-950/10 shadow-sm">
                                    <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Merci! Votre message a bien été envoyé.');" class="space-y-6">
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-xs font-semibold uppercase tracking-wider text-[#1E2046] mb-2">Nom Complet</label>
                                                <input type="text" placeholder="Votre nom" required class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-[#1E2046] focus:outline-none focus:border-[#FF4D42] transition-colors">
                                            </div>
                                            <div>
                                                <label class="block text-xs font-semibold uppercase tracking-wider text-[#1E2046] mb-2">Téléphone</label>
                                                <input type="tel" placeholder="06..." required class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-[#1E2046] focus:outline-none focus:border-[#FF4D42] transition-colors">
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-xs font-semibold uppercase tracking-wider text-[#1E2046] mb-2">Email</label>
                                                <input type="email" placeholder="votre@email.com" required class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-[#1E2046] focus:outline-none focus:border-[#FF4D42] transition-colors">
                                            </div>
                                            <div>
                                                <label class="block text-xs font-semibold uppercase tracking-wider text-[#1E2046] mb-2">Budget Estimé</label>
                                                <input type="text" placeholder="Ex: 20 000 MAD" class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-[#1E2046] focus:outline-none focus:border-[#FF4D42] transition-colors">
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#1E2046] mb-2">Message & Détails du projet</label>
                                            <textarea rows="4" placeholder="Décrivez votre besoin audiovisuel..." required class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-[#1E2046] focus:outline-none focus:border-[#FF4D42] transition-colors"></textarea>
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

                <!-- 6. FAQ Section -->
                @elseif($sec['type'] == 'rembrand_faq' || $sec['type'] == 'video_faq1')
                    <section style="background-color:{{ $p->bgColor ?? '#1E2046' }}; {{ $ptb }}" class="text-white border-t border-black/10">
                        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="text-center mb-12">
                                <h2 class="text-4xl sm:text-5xl md:text-6xl font-bold tracking-tight text-white">
                                    QUESTIONS <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-indigo-200">fréquentes</span>
                                </h2>
                                <p class="text-indigo-200/80 text-sm font-light mt-3">
                                    Tout ce que vous devez savoir sur notre processus de production et nos tarifs.
                                </p>
                            </div>

                            <div class="space-y-4">
                                <details class="group bg-white/5 border border-white/10 rounded-2xl p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer transition-all duration-300">
                                    <summary class="flex items-center justify-between font-bold text-lg text-white">
                                        <span>Combien coûte la réalisation d'un film d'entreprise à Casablanca ?</span>
                                        <span class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-xs group-open:rotate-180 transition-transform"><i class="fas fa-chevron-down"></i></span>
                                    </summary>
                                    <p class="mt-4 text-indigo-200/80 text-sm leading-relaxed font-light pl-2 border-l border-[#FF4D42]">
                                        Chaque projet est unique. Le budget dépend de la durée du tournage, du matériel sollicité (drones, caméras 8K, éclairages studio), du nombre d'acteurs et de la complexité du montage. Contactez-nous pour recevoir un devis détaillé sous 24h.
                                    </p>
                                </details>

                                <details class="group bg-white/5 border border-white/10 rounded-2xl p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer transition-all duration-300">
                                    <summary class="flex items-center justify-between font-bold text-lg text-white">
                                        <span>Quel est le délai moyen de livraison d'une vidéo corporate ?</span>
                                        <span class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-xs group-open:rotate-180 transition-transform"><i class="fas fa-chevron-down"></i></span>
                                    </summary>
                                    <p class="mt-4 text-indigo-200/80 text-sm leading-relaxed font-light pl-2 border-l border-[#FF4D42]">
                                        En général, comptez entre 7 et 15 jours ouvrés après la fin du tournage pour recevoir la version finale étalonnée et mixée.
                                    </p>
                                </details>

                                <details class="group bg-white/5 border border-white/10 rounded-2xl p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer transition-all duration-300">
                                    <summary class="flex items-center justify-between font-bold text-lg text-white">
                                        <span>Proposez-vous des prises de vues aériennes par drone ?</span>
                                        <span class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-xs group-open:rotate-180 transition-transform"><i class="fas fa-chevron-down"></i></span>
                                    </summary>
                                    <p class="mt-4 text-indigo-200/80 text-sm leading-relaxed font-light pl-2 border-l border-[#FF4D42]">
                                        Oui, nous disposons de télépilotes certifiés pour des prises de vues aériennes spectaculaires et réglementées partout au Maroc.
                                    </p>
                                </details>

                                <details class="group bg-white/5 border border-white/10 rounded-2xl p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer transition-all duration-300">
                                    <summary class="flex items-center justify-between font-bold text-lg text-white">
                                        <span>Pouvez-vous intervenir en dehors de la ville de Casablanca ?</span>
                                        <span class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-xs group-open:rotate-180 transition-transform"><i class="fas fa-chevron-down"></i></span>
                                    </summary>
                                    <p class="mt-4 text-indigo-200/80 text-sm leading-relaxed font-light pl-2 border-l border-[#FF4D42]">
                                        Absolument. Nos équipes se déplacent régulièrement à Rabat, Tanger, Marrakech, Agadir et dans toutes les régions du Maroc.
                                    </p>
                                </details>
                            </div>
                        </div>
                    </section>
                @endif
                
            @endforeach
        @else
            <div class="min-h-[60vh] flex flex-col items-center justify-center text-slate-400 bg-[#F8F9FC]">
                <i class="bi bi-camera-reels text-5xl mb-4 text-slate-300"></i>
                <p class="text-sm uppercase tracking-widest">Contenu en cours de préparation...</p>
            </div>
        @endif
    </main>

    <!-- Deep Navy Official Footer with Smart Films Brand Logo -->
    <footer class="bg-[#141632] text-indigo-200 border-t border-white/10 py-16 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="space-y-4">
                    <img src="/uploads/smartfilms_logo.png" alt="Smart Films Prod" class="h-10 w-auto">
                    <p class="text-indigo-200/70 leading-relaxed">
                        Agence de production audiovisuelle & contenus de marque à Casablanca, Maroc.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-white uppercase tracking-widest text-xs mb-4">NAVIGATION</h4>
                    <ul class="space-y-2 text-indigo-200/70">
                        <li><a href="/" class="hover:text-white transition-colors">Accueil</a></li>
                        <li><a href="#offres" class="hover:text-white transition-colors">Nos Offres</a></li>
                        <li><a href="#contact" class="hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white uppercase tracking-widest text-xs mb-4">CONTACT DIRECT</h4>
                    <ul class="space-y-2 text-indigo-200/70">
                        <li>Tél: 06 17 20 23 45</li>
                        <li>Email: contact@smartfilmsprod.com</li>
                        <li>130 Bv Anfa 20300 Casablanca</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white uppercase tracking-widest text-xs mb-4">HORAIRES</h4>
                    <p class="text-indigo-200/70 leading-relaxed">
                        Du Lundi au Vendredi<br>
                        09:00 - 19:00
                    </p>
                </div>
            </div>
            
            <div class="pt-8 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center gap-4 text-indigo-300/60">
                <p>© {{ date('Y') }} SmartFilms Prod. Tous droits réservés.</p>
                <p>Casablanca, Maroc — Agence de Production Audiovisuelle</p>
            </div>
        </div>
    </footer>

</body>
</html>
