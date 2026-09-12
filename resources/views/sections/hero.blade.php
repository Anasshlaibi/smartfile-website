<!-- CHAPTER 01: FULL-BLEED CINEMATIC SHOWREEL HERO (#080914) -->
<section id="hero" class="relative w-full min-h-screen h-screen overflow-hidden bg-[#080914] flex items-end">
    
    <!-- Edge-to-Edge Showreel Video Background -->
    <div class="absolute inset-0 w-full h-full">
        <video id="heroVideoEl" autoplay loop muted playsinline poster="/uploads/cinema_corporate_film.png" class="w-full h-full object-cover opacity-90 scale-105 transition-transform duration-1000">
            <source src="/uploads/hero_youtube.mp4" type="video/mp4">
        </video>
        
        <!-- Master Cinematic Atmospheric Gradients -->
        <div class="absolute inset-0 bg-gradient-to-t from-[#080914] via-[#080914]/40 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#080914]/85 via-[#080914]/25 to-[#080914]/40"></div>
        <div class="absolute top-0 left-0 right-0 h-44 bg-gradient-to-b from-black/80 to-transparent"></div>
    </div>

    <!-- Live Audio Toggle Control -->
    <button onclick="toggleHeroAudio()" id="audioToggleBtn" class="hero-badge-init absolute top-28 right-6 sm:top-32 sm:right-12 z-20 glass-dark text-white/90 hover:text-white px-4 py-2.5 rounded-full text-xs font-medium tracking-wider flex items-center gap-2.5 transition-all hover:border-[#FF4D42] shadow-2xl">
        <i id="audioIcon" class="bi bi-volume-mute-fill text-base text-[#FF4D42]"></i>
        <span id="audioText" class="uppercase text-[10px] tracking-widest font-bold">Activer le son</span>
    </button>

    <!-- Top Left Studio Badge -->
    <div class="hero-badge-init absolute top-28 left-6 sm:top-32 sm:left-12 z-20 hidden md:flex items-center gap-3 glass-dark px-4 py-2 rounded-full border border-white/10 text-white/90 text-xs font-mono">
        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
        <span>STUDIO CINÉMA &bull; CASABLANCA</span>
    </div>

    <!-- Editorial Hero Typography (Minimal, Confident, Layered Animation) -->
    <div class="relative z-10 w-full max-w-[96rem] mx-auto px-6 sm:px-12 pb-16 md:pb-24">
        <div class="max-w-4xl text-white space-y-6">
            
            <div class="hero-badge-init inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-[11px] tracking-widest uppercase font-semibold text-indigo-100">
                <span class="w-2 h-2 rounded-full bg-[#FF4D42]"></span>
                <span>PRODUCTION AUDIOVISUELLE &bull; CASABLANCA</span>
            </div>

            <h1 class="text-4xl sm:text-6xl md:text-7xl lg:text-8xl tracking-tight leading-[0.93] text-white">
                <span class="reveal-mask">
                    <span class="hero-serif font-serif-italic font-normal block lowercase text-3xl sm:text-5xl md:text-6xl mb-1 text-[#B8BDE0] reveal-line">
                        l'impact cinématographique au service des
                    </span>
                </span>
                <span class="reveal-mask">
                    <span class="hero-line-1 font-black uppercase tracking-tight font-sans block drop-shadow-2xl reveal-line">
                        GRANDES MARQUES
                    </span>
                </span>
            </h1>

            <div class="reveal-mask">
                <p class="hero-desc reveal-line text-[#B8BDE0] text-base md:text-xl font-light max-w-2xl leading-relaxed">
                    Films de marque, spots publicitaires et prises de vues aériennes spectaculaires pour imposer votre leadership au Maroc et à l'international.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 flex flex-wrap items-center gap-4">
                <button onclick="openVideoModal('https://www.youtube.com/embed/_yWLYCiW1Z8', 'Showreel Cinéma 2026 - SmartFilms Prod'); if (window.trackEvent) trackEvent('showreel_play', { source: 'hero' });" class="hero-btn-init bg-[#FF4D42] hover:bg-[#E94239] text-white px-8 py-4 rounded-full font-bold uppercase tracking-wider text-xs transition-all shadow-xl shadow-rose-500/30 hover:scale-105 flex items-center gap-3">
                    <span class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center text-[9px]"><i class="bi bi-play-fill ml-0.5"></i></span>
                    <span>Visionner le Showreel</span>
                </button>

                <a href="#estimateur" onclick="if (window.trackEvent) trackEvent('estimator_start', { source: 'hero' });" class="hero-btn-init glass-dark hover:bg-white/20 text-white px-7 py-4 rounded-full font-bold uppercase tracking-wider text-xs transition-all flex items-center gap-2 border border-white/20 hover:scale-105">
                    <span>Lancer un projet</span>
                    <i class="bi bi-arrow-right text-xs"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Bottom Scroll Indicator -->
    <div class="hero-badge-init absolute bottom-6 right-8 hidden lg:flex items-center gap-2 text-white/50 text-[11px] font-mono tracking-widest uppercase">
        <span>Faire défiler</span>
        <i class="bi bi-chevron-down animate-bounce text-xs"></i>
    </div>
</section>

@push('scripts')
<script>
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
</script>
@endpush
