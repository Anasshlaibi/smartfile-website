<!-- CHAPTER 01: ROUNDED CINEMATIC HERO PANEL (Clean White Page Background & Natural Footage) -->
<section id="hero" class="relative w-full bg-[#FAF9F6] pt-24 sm:pt-28 pb-6 sm:pb-10 px-3 sm:px-6 lg:px-8 xl:px-10 overflow-hidden">
    
    <!-- Large Rounded Cinematic Hero Container (Matches Approved Reference) -->
    <div class="relative w-full max-w-[96rem] mx-auto min-h-[85vh] sm:min-h-[88vh] lg:min-h-[90vh] rounded-[26px] sm:rounded-[32px] lg:rounded-[36px] overflow-hidden shadow-[0_8px_30px_rgba(0,0,0,0.06)] bg-black flex items-center">
        
        <!-- 0ms: Cinematic Background Video & Fallback Poster (Exact Framing & Natural Colors Preserved) -->
        <div class="absolute inset-0 w-full h-full pointer-events-none">
            <video id="heroVideoEl" autoplay loop muted playsinline poster="/uploads/cinema_corporate_film.png" class="w-full h-full object-cover">
                <source src="/uploads/hero_youtube.mp4" type="video/mp4">
            </video>
            
            <!-- Neutral Contrast Overlays for Crisp Text Legibility (NO PURPLE, NO TINT, NATURAL FOOTAGE) -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/30 to-transparent pointer-events-none"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/45 via-transparent to-black/30 pointer-events-none"></div>
        </div>



        <!-- Editorial Hero Typography & Composition (Left Dominant, Right Open for Video) -->
        <div class="relative z-10 w-full px-6 sm:px-10 lg:px-14 py-16 sm:py-20 flex flex-col justify-center">
            <div class="w-full max-w-3xl lg:max-w-[65%] text-white space-y-5 sm:space-y-6">
                
                <!-- 150ms: Eyebrow / Tag -->
                <div>
                    <div class="hero-eyebrow inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-black/40 backdrop-blur-md border border-white/20 text-[10px] sm:text-[11px] font-mono tracking-widest uppercase font-semibold text-white/95 shadow-md">
                        <span class="w-2 h-2 rounded-full bg-[#FF5A68] animate-pulse"></span>
                        <span>AGENCE DE PRODUCTION AUDIOVISUELLE & CONTENUS DE MARQUE</span>
                    </div>
                </div>

                <!-- Main Title Hierarchy -->
                <div class="space-y-1">
                    <!-- 250ms: Elegant Italic / Serif -->
                    <div class="reveal-mask pr-4">
                        <span class="hero-serif font-serif-italic font-normal block lowercase text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-white/90 drop-shadow-lg">
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
                    <p class="hero-desc text-white/90 text-sm sm:text-base md:text-lg font-light max-w-xl leading-relaxed drop-shadow-md">
                        Nous créons des récits cinématographiques à fort impact pour sublimer l'image de votre entreprise et captiver vos audiences à Casablanca et partout au Maroc.
                    </p>
                </div>

                <!-- 850ms: Primary CTA -->
                <div class="pt-2 sm:pt-3">
                    <a href="#estimateur" class="hero-cta inline-flex items-center gap-3 bg-[#FF5A68] hover:bg-[#E84554] text-white px-8 py-4 rounded-full font-bold uppercase tracking-wider text-xs transition-all duration-300 shadow-[0_0_30px_rgba(255,90,104,0.5)] hover:shadow-[0_0_45px_rgba(255,90,104,0.75)] hover:scale-105 group">
                        <span>Découvrir nos offres</span>
                        <i class="bi bi-arrow-right text-xs transform group-hover:translate-x-1.5 transition-transform duration-300"></i>
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>


