<!-- Sticky Cinematic Header with Seamless White Scroll Morphing -->
<header id="mainHeader" class="fixed top-0 left-0 w-full z-50 transition-all duration-300">
    
    <!-- Top Contact Bar (Dark Luxury) -->
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
    <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20 transition-all duration-300">
            
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group" aria-label="SmartFilms Prod Accueil">
                <img src="/uploads/smartfilms_logo.png" alt="SmartFilms Prod — Production Audiovisuelle Casablanca" class="smartfilms-logo h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105 drop-shadow-md" style="height: 44px; max-height: 44px; width: auto;">
            </a>
            
            <!-- Navigation Links -->
            <nav class="hidden lg:flex items-center space-x-9 h-full">
                <a href="{{ route('portfolio') }}" class="nav-link text-white hover:text-[#FF4D42] font-bold text-xs uppercase tracking-widest transition-colors drop-shadow">RÉALISATIONS</a>
                <a href="{{ route('expertises') }}" class="nav-link text-white hover:text-[#FF4D42] font-bold text-xs uppercase tracking-widest transition-colors drop-shadow">EXPERTISE</a>
                <a href="{{ route('about') }}" class="nav-link text-white hover:text-[#FF4D42] font-bold text-xs uppercase tracking-widest transition-colors drop-shadow">À PROPOS</a>
                <a href="{{ route('team') }}" class="nav-link text-white hover:text-[#FF4D42] font-bold text-xs uppercase tracking-widest transition-colors drop-shadow">ÉQUIPE</a>
                <a href="{{ route('home') }}#estimateur" class="nav-link text-white hover:text-[#FF4D42] font-bold text-xs uppercase tracking-widest transition-colors drop-shadow">ESTIMER UN PROJET</a>
                <a href="{{ route('contact') }}" class="nav-link text-white hover:text-[#FF4D42] font-bold text-xs uppercase tracking-widest transition-colors drop-shadow">CONTACT</a>
            </nav>

            <!-- Header Action Button -->
            <div class="hidden sm:flex items-center gap-3">
                <a href="{{ route('home') }}#estimateur" class="bg-[#FF4D42] hover:bg-[#E94239] text-white px-7 py-3 rounded-full text-xs uppercase tracking-widest font-bold transition-all duration-300 shadow-xl shadow-rose-500/25 hover:scale-105 flex items-center gap-2 group">
                    <span>Lancer un projet</span>
                    <i class="bi bi-arrow-right text-xs transition-transform group-hover:translate-x-1"></i>
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button id="mobileMenuBtn" aria-label="Menu principal" class="lg:hidden text-white p-2 text-2xl transition-colors focus:outline-none" onclick="document.getElementById('mobileMenu').classList.toggle('hidden')">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Drawer -->
    <div id="mobileMenu" class="hidden lg:hidden bg-[#080914] text-white border-t border-white/10 shadow-2xl px-6 py-6 space-y-4">
        <a href="{{ route('portfolio') }}" onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="block text-sm font-bold uppercase tracking-wider text-white hover:text-[#FF4D42] py-2 border-b border-white/10">Réalisations</a>
        <a href="{{ route('expertises') }}" onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="block text-sm font-bold uppercase tracking-wider text-white hover:text-[#FF4D42] py-2 border-b border-white/10">Expertise</a>
        <a href="{{ route('about') }}" onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="block text-sm font-bold uppercase tracking-wider text-white hover:text-[#FF4D42] py-2 border-b border-white/10">À Propos</a>
        <a href="{{ route('team') }}" onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="block text-sm font-bold uppercase tracking-wider text-white hover:text-[#FF4D42] py-2 border-b border-white/10">L'Équipe</a>
        <a href="{{ route('contact') }}" onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="block text-sm font-bold uppercase tracking-wider text-white hover:text-[#FF4D42] py-2 border-b border-white/10">Contact</a>
        <div class="pt-4">
            <a href="{{ route('home') }}#estimateur" onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="block text-center bg-[#FF4D42] text-white py-3.5 rounded-full text-xs font-bold uppercase tracking-widest shadow-lg shadow-rose-500/30">
                Estimer un Projet
            </a>
        </div>
    </div>
</header>
