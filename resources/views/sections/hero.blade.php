<!-- CHAPTER 01: ROUNDED CINEMATIC HERO PANEL (Fits Fully on Screen with White Framing) -->
<section id="hero" class="relative w-full h-screen min-h-[620px] max-h-[1080px] bg-[#FAF9F6] pt-20 sm:pt-24 pb-4 sm:pb-6 px-3 sm:px-6 lg:px-8 xl:px-10 overflow-hidden flex flex-col justify-center">
    
    <!-- Large Rounded Cinematic Hero Container (Fully Visible Inside Viewport) -->
    <div class="relative w-full h-full max-w-[96rem] mx-auto rounded-[24px] sm:rounded-[30px] lg:rounded-[34px] overflow-hidden shadow-[0_8px_30px_rgba(0,0,0,0.06)] bg-black flex items-center">
        
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
        <div class="relative z-10 w-full px-6 sm:px-10 lg:px-14 py-8 sm:py-12 flex flex-col justify-center">
            <div class="w-full max-w-3xl lg:max-w-[65%] text-white space-y-4 sm:space-y-5">
                
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
                        <span class="hero-serif font-serif-italic font-normal block lowercase text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-white/90 drop-shadow-lg">
                            agence de
                        </span>
                    </div>

                    <!-- 350ms & 450ms: Very Large Bold Sans-serif Stacked Title -->
                    <h1 class="text-3xl sm:text-5xl md:text-6xl lg:text-[4rem] xl:text-[4.8rem] 2xl:text-[5.5rem] font-black uppercase tracking-tight text-white leading-[0.9] drop-shadow-2xl select-none">
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
                <div class="reveal-mask pt-0.5">
                    <p class="hero-desc text-white/90 text-xs sm:text-sm md:text-base font-light max-w-xl leading-relaxed drop-shadow-md">
                        Nous créons des récits cinématographiques à fort impact pour sublimer l'image de votre entreprise et captiver vos audiences à Casablanca et partout au Maroc.
                    </p>
                </div>

                <!-- 850ms: Primary CTA -->
                <div class="pt-1 sm:pt-2">
                    <a href="#estimateur" class="hero-cta inline-flex items-center gap-3 bg-[#FF5A68] hover:bg-[#E84554] text-white px-7 py-3.5 rounded-full font-bold uppercase tracking-wider text-xs transition-all duration-300 shadow-[0_0_30px_rgba(255,90,104,0.5)] hover:shadow-[0_0_45px_rgba(255,90,104,0.75)] hover:scale-105 group">
                        <span>Découvrir nos offres</span>
                        <i class="bi bi-arrow-right text-xs transform group-hover:translate-x-1.5 transition-transform duration-300"></i>
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>
