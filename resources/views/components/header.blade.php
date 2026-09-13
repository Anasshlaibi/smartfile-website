<!-- Sticky Cinematic Header with Progressive Smooth Transition & Two-Logo Crossfade -->
<header id="mainHeader" class="fixed top-0 left-0 w-full z-50">
    
    <!-- Top Contact Bar (Dark Luxury, smoothly collapses on scroll) -->
    <div id="topInfoStrip" class="bg-black/40 backdrop-blur-md text-white/80 text-[11px] py-2 px-6 border-b border-white/10 hidden md:block max-h-12 overflow-hidden">
        <div class="max-w-[96rem] mx-auto flex justify-between items-center tracking-wider font-mono">
            <div class="flex items-center gap-6">
                <span class="flex items-center gap-2"><i class="bi bi-geo-alt text-[#FF4D42]"></i> Casablanca &bull; 130 Bv d'Anfa</span>
                <span class="flex items-center gap-2 text-white/60"><i class="bi bi-camera-reels text-[#FF4D42]"></i> Studio Cinéma 8K & Drone FPV</span>
            </div>
            <div class="flex items-center gap-6">
                <a href="tel:{{ str_replace(' ', '', $settings['phone'] ?? '+212617202345') }}" class="hover:text-white transition-colors flex items-center gap-1.5 font-bold text-white"><i class="bi bi-telephone text-[#FF4D42]"></i> {{ $settings['phone'] ?? '+212 6 17 20 23 45' }}</a>
                <span class="text-white/30">|</span>
                <a href="mailto:{{ $settings['email'] ?? 'contact@smartfilmsprod.com' }}" class="hover:text-white transition-colors">{{ $settings['email'] ?? 'contact@smartfilmsprod.com' }}</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <div id="navContainer" class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div id="navInner" class="flex justify-between items-center h-20 transition-all duration-500">
            
            <!-- Two-Logo Stack (Seamless Crossfade without Layout Shift) -->
            <a href="{{ route('home') }}" class="relative inline-flex items-center group logo-container" aria-label="SmartFilms Prod Accueil">
                <div class="relative h-11 w-44 flex items-center">
                    <img src="/uploads/smartfilms_logo_white.png" alt="SmartFilms Prod (Blanc)" class="logo-white h-11 max-h-[44px] w-auto object-contain transition-all" style="height: 44px; max-height: 44px; width: auto;">
                    <img src="/uploads/smartfilms_logo_black.png" alt="SmartFilms Prod (Noir)" class="logo-black h-11 max-h-[44px] w-auto object-contain transition-all" style="height: 44px; max-height: 44px; width: auto;">
                </div>
            </a>
            
            <!-- Navigation Links -->
            <nav class="hidden lg:flex items-center space-x-8 h-full">
                <a href="{{ route('home') }}" class="nav-link text-xs uppercase tracking-widest font-semibold py-1 active-link">Accueil</a>
                <a href="{{ route('home') }}#manifesto" class="nav-link text-xs uppercase tracking-widest font-semibold py-1">Notre agence</a>
                <a href="{{ route('home') }}#expertises" class="nav-link text-xs uppercase tracking-widest font-semibold py-1">Nos expertises</a>
                <a href="{{ route('home') }}#films" class="nav-link text-xs uppercase tracking-widest font-semibold py-1">Nos réalisations</a>
                <a href="{{ route('home') }}#estimateur" class="nav-link text-xs uppercase tracking-widest font-semibold py-1">Estimer un projet</a>
                <a href="{{ route('contact') }}" class="nav-link text-xs uppercase tracking-widest font-semibold py-1">Contact</a>
            </nav>

            <!-- Header Action Button (Adapts Smoothly to Navbar Theme) -->
            <div class="hidden sm:flex items-center gap-3">
                <a href="{{ route('contact') }}" id="headerCtaBtn" class="header-cta inline-flex items-center gap-2 px-6 py-2.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all duration-400 group">
                    <span>Nous contacter</span>
                    <i class="bi bi-arrow-right text-xs transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button id="mobileMenuBtn" aria-label="Menu principal" class="lg:hidden p-2 text-2xl transition-colors focus:outline-none" onclick="document.getElementById('mobileMenu').classList.toggle('hidden')">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Drawer -->
    <div id="mobileMenu" class="hidden lg:hidden bg-[#080914] text-white border-t border-white/10 shadow-2xl px-6 py-6 space-y-4">
        <a href="{{ route('home') }}" onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="block text-sm font-bold uppercase tracking-wider text-white hover:text-[#FF4D42] py-2 border-b border-white/10">Accueil</a>
        <a href="{{ route('home') }}#manifesto" onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="block text-sm font-bold uppercase tracking-wider text-white hover:text-[#FF4D42] py-2 border-b border-white/10">Notre agence</a>
        <a href="{{ route('home') }}#expertises" onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="block text-sm font-bold uppercase tracking-wider text-white hover:text-[#FF4D42] py-2 border-b border-white/10">Nos expertises</a>
        <a href="{{ route('home') }}#films" onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="block text-sm font-bold uppercase tracking-wider text-white hover:text-[#FF4D42] py-2 border-b border-white/10">Nos réalisations</a>
        <a href="{{ route('home') }}#estimateur" onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="block text-sm font-bold uppercase tracking-wider text-white hover:text-[#FF4D42] py-2 border-b border-white/10">Estimer un projet</a>
        <a href="{{ route('contact') }}" onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="block text-sm font-bold uppercase tracking-wider text-white hover:text-[#FF4D42] py-2 border-b border-white/10">Contact</a>
        <div class="pt-4">
            <a href="{{ route('contact') }}" onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="block text-center border border-white/40 text-white hover:bg-white hover:text-black py-3 rounded-full text-xs font-semibold uppercase tracking-wider transition-all">
                Nous contacter &rarr;
            </a>
        </div>
    </div>
</header>
