<!-- CHAPTER 01: FULL-SCREEN CINEMATIC HERO (Editorial Left-Dominant Composition) -->
<section id="hero" class="relative w-full min-h-screen h-screen overflow-hidden bg-[#080914] flex items-center">
    
    <!-- 0ms: Full-Bleed Cinematic Background Video & High-Resolution Fallback Poster -->
    <div class="absolute inset-0 w-full h-full pointer-events-none">
        <video id="heroVideoEl" autoplay loop muted playsinline poster="/uploads/cinema_corporate_film.png" class="w-full h-full object-cover opacity-90 scale-105 transition-transform duration-1000">
            <source src="/uploads/hero_youtube.mp4" type="video/mp4">
        </video>
        
        <!-- Master Editorial Lighting & Atmospheric Gradients (Preserves Right Side Cleanliness) -->
        <div class="absolute inset-0 bg-gradient-to-t from-[#080914] via-[#080914]/40 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#080914]/90 via-[#080914]/50 to-transparent"></div>
        <div class="absolute top-0 left-0 right-0 h-44 bg-gradient-to-b from-black/70 to-transparent"></div>
    </div>

    <!-- Live Audio Toggle Control (Top Right) -->
    <button onclick="toggleHeroAudio()" id="audioToggleBtn" class="absolute top-24 right-6 sm:top-28 sm:right-10 z-20 glass-dark text-white/90 hover:text-white px-4 py-2 rounded-full text-xs font-medium tracking-wider flex items-center gap-2.5 transition-all duration-300 hover:border-[#FF4D42] shadow-2xl hover:scale-105">
        <i id="audioIcon" class="bi bi-volume-mute-fill text-base text-[#FF4D42]"></i>
        <span id="audioText" class="uppercase text-[10px] tracking-widest font-bold font-mono">Activer le son</span>
    </button>

    <!-- Editorial Hero Typography & Intentional Composition (Left 50–58%, Top ~30–38%) -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 sm:px-10 lg:px-12 pt-20 sm:pt-24 pb-12 flex flex-col justify-center">
        <div class="w-full max-w-3xl lg:max-w-[70%] text-white space-y-5 sm:space-y-6">
            
            <!-- 150ms: Small Eyebrow / Tag -->
            <div>
                <div class="hero-eyebrow inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-black/50 backdrop-blur-md border border-white/15 text-[10px] sm:text-[11px] font-mono tracking-widest uppercase font-semibold text-white/90 shadow-lg">
                    <span class="w-2 h-2 rounded-full bg-[#FF4D42] animate-pulse"></span>
                    <span>AGENCE DE PRODUCTION AUDIOVISUELLE & CONTENUS DE MARQUE</span>
                </div>
            </div>

            <!-- Main Title Hierarchy -->
            <div class="space-y-1">
                <!-- 250ms: Elegant Italic / Serif -->
                <div class="reveal-mask pr-4">
                    <span class="hero-serif font-serif-italic font-normal block lowercase text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-[#B8BDE0] drop-shadow-2xl">
                        agence de
                    </span>
                </div>

                <!-- 350ms & 450ms: Very Large Bold Sans-serif Stacked Title -->
                <h1 class="text-4xl sm:text-6xl md:text-7xl lg:text-[4.5rem] xl:text-[5.4rem] 2xl:text-[6.2rem] font-black uppercase tracking-tight text-white leading-[0.9] drop-shadow-2xl select-none">
                    <span class="reveal-mask block pr-6">
                        <span class="hero-title-line1 block font-black tracking-tight">
                            PRODUCTION
                        </span>
                    </span>
                    <span class="reveal-mask block mt-1 sm:mt-1.5 pr-6">
                        <span class="hero-title-line2 block font-black tracking-tight">
                            AUDIOVISUELLE
                        </span>
                    </span>
                </h1>
            </div>

            <!-- 700ms: Supporting Description (Lower-Left underneath Title) -->
            <div class="reveal-mask pt-1 sm:pt-2">
                <p class="hero-desc text-slate-300 text-sm sm:text-base md:text-lg font-light max-w-xl leading-relaxed">
                    Nous créons des récits cinématographiques à fort impact pour sublimer l'image de votre entreprise et captiver vos audiences à Casablanca et partout au Maroc.
                </p>
            </div>

            <!-- 850ms: Primary CTA -->
            <div class="pt-2 sm:pt-3">
                <a href="#estimateur" class="hero-cta inline-flex items-center gap-3 bg-[#FF4D42] hover:bg-[#E94239] text-white px-8 py-4 rounded-full font-bold uppercase tracking-wider text-xs transition-all duration-300 shadow-[0_0_35px_rgba(255,77,66,0.5)] hover:shadow-[0_0_50px_rgba(255,77,66,0.75)] hover:scale-105 group">
                    <span>Découvrir nos offres</span>
                    <i class="bi bi-arrow-right text-xs transform group-hover:translate-x-1.5 transition-transform duration-300"></i>
                </a>
            </div>

        </div>
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
