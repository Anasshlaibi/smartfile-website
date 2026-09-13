<!-- CHAPTER 04: PÔLES D'EXPERTISE (#080914 OBSIDIAN) -->
<section id="expertises" class="bg-[#080914] text-white py-24 md:py-32 relative overflow-hidden border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end mb-16 gap-8">
            <div class="max-w-2xl">
                <!-- Top Minimalist Bar Indicator -->
                <div class="w-12 h-[2px] bg-white mb-6 reveal-fade-up"></div>
                
                <h2 class="text-4xl sm:text-5xl md:text-6xl font-black uppercase tracking-tight text-white mb-4">
                    <span class="reveal-mask inline-block">
                        <span class="reveal-line inline-block">NOS</span>
                    </span>
                    <span class="reveal-mask inline-block ml-2">
                        <span class="reveal-line delay-100 font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-slate-300 inline-block">
                            expertises
                        </span>
                    </span>
                </h2>
                
                <p class="reveal-fade-up delay-200 text-white/70 text-sm sm:text-base font-light max-w-xl leading-relaxed">
                    De l'idée à la diffusion, nous créons des contenus qui donnent vie aux marques.
                </p>
            </div>

            <div class="reveal-fade-up delay-300 lg:text-right max-w-md">
                <p class="text-white/60 text-xs sm:text-sm font-light leading-relaxed">
                    Stratégie, création, production et diffusion :<br class="hidden sm:inline">
                    <span class="text-white font-medium">nos 6 expertises</span> pour vous accompagner à chaque étape de votre projet de communication.
                </p>
            </div>
        </div>

        @php
            $expertises = [
                [
                    'num' => '01',
                    'title' => 'STRATÉGIE & CONCEPTION',
                    'subtitle' => 'Donner du sens à chaque projet.',
                    'desc' => 'Nous imaginons des concepts créatifs, des stratégies de contenu et des lignes éditoriales adaptées à vos objectifs et à votre audience.',
                    'slug' => 'strategie-conception',
                    'image' => '/uploads/expertise_01_strategy.jpg',
                ],
                [
                    'num' => '02',
                    'title' => 'PRODUCTION AUDIOVISUELLE',
                    'subtitle' => 'Transformer une idée en image.',
                    'desc' => 'Films institutionnels, publicités, interviews, capsules, photographie, drone, multi-caméra... Nous produisons des contenus cinématographiques et authentiques, avec une exigence de qualité.',
                    'slug' => 'production-audiovisuelle',
                    'image' => '/uploads/expertise_02_production.jpg',
                ],
                [
                    'num' => '03',
                    'title' => 'CONTENUS SOCIAUX',
                    'subtitle' => 'Créer du contenu qui mérite d\'être regardé.',
                    'desc' => 'Reels, vidéos verticales, contenus éditoriaux, shootings photo et séries de contenus : nous adaptons vos messages aux codes des réseaux sociaux et aux usages de vos audiences.',
                    'slug' => 'contenus-sociaux',
                    'image' => '/uploads/expertise_03_social.jpg',
                ],
                [
                    'num' => '04',
                    'title' => 'COMMUNICATION CORPORATE',
                    'subtitle' => 'Faire rayonner ce qui fait votre entreprise.',
                    'desc' => 'Nous valorisons vos équipes, vos savoir-faire et vos engagements à travers des contenus qui renforcent votre image et votre crédibilité.',
                    'slug' => 'communication-corporate',
                    'image' => '/uploads/cinema_corporate_film.png',
                ],
                [
                    'num' => '05',
                    'title' => 'PUBLICITÉ & CAMPAGNES',
                    'subtitle' => 'Donner de l\'impact aux messages.',
                    'desc' => 'Une idée forte, une direction créative, des formats adaptés à chaque canal : nous développons des campagnes qui marquent les esprits et génèrent de la valeur.',
                    'slug' => 'publicite-campagnes',
                    'image' => '/uploads/studio_commercial_spot.png',
                ],
                [
                    'num' => '06',
                    'title' => 'ÉVÉNEMENT & LIVE',
                    'subtitle' => 'Capturer l\'instant. Le faire vivre. Le prolonger.',
                    'desc' => 'Photo & vidéo événementielle, aftermovies, captation multi-caméra, livestream, écran géant, régie et sonorisation : nous donnons une nouvelle dimension à vos événements.',
                    'slug' => 'evenement-live',
                    'image' => '/uploads/cinema_corporate_film.png',
                ],
            ];
        @endphp

        <!-- 6 Expertises Grid (3 Columns on Large Screens) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($expertises as $idx => $item)
                <div class="spotlight-card group relative bg-[#0c0d15]/90 rounded-2xl p-5 sm:p-6 border border-white/10 hover:border-white/25 transition-all duration-500 hover:shadow-[0_20px_45px_rgba(0,0,0,0.6)] flex flex-col justify-between overflow-hidden hover:-translate-y-1.5 reveal-scale-up delay-{{ ($idx % 3 + 1) * 100 }}">
                    
                    <div class="flex flex-col sm:flex-row gap-4 sm:gap-5 items-stretch h-full">
                        
                        <!-- Left Info Column -->
                        <div class="flex-1 flex flex-col justify-between min-w-0">
                            <div>
                                <!-- Number Label -->
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="text-white/60 font-mono text-xs tracking-wider font-semibold">{{ $item['num'] }}</span>
                                    <span class="w-4 h-[1px] bg-white/40"></span>
                                </div>

                                <!-- Title -->
                                <h3 class="text-white font-bold text-sm sm:text-base uppercase tracking-tight group-hover:text-white transition-colors mb-2 leading-snug">
                                    <a href="{{ url('/expertises/' . $item['slug']) }}" class="focus:outline-none">
                                        {{ $item['title'] }}
                                    </a>
                                </h3>

                                <!-- Subtitle / Catchphrase -->
                                <p class="text-white/90 text-xs font-medium mb-3 leading-relaxed">
                                    {{ $item['subtitle'] }}
                                </p>

                                <!-- Description Paragraph -->
                                <p class="text-white/50 text-[11px] sm:text-xs font-light leading-relaxed line-clamp-4">
                                    {{ $item['desc'] }}
                                </p>
                            </div>

                            <!-- Bottom Action Link -->
                            <div class="pt-5 mt-4">
                                <a href="{{ url('/expertises/' . $item['slug']) }}" class="inline-flex items-center gap-2.5 text-white/80 hover:text-white text-xs font-semibold group/btn transition-colors">
                                    <span>Découvrir</span>
                                    <span class="w-6 h-6 rounded-full border border-white/25 group-hover/btn:border-white group-hover/btn:bg-white group-hover/btn:text-black flex items-center justify-center text-[10px] transition-all duration-300 transform group-hover/btn:translate-x-1">
                                        <i class="bi bi-arrow-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- Right Media Thumbnail with Soft Feathered Edges & Smooth Blend -->
                        <div class="w-full sm:w-[44%] shrink-0 h-44 sm:h-auto min-h-[170px] rounded-2xl overflow-hidden bg-[#0c0d15] relative">
                            <img 
                                src="{{ asset($item['image']) }}" 
                                alt="{{ $item['title'] }} - SmartFilms Casablanca" 
                                class="w-full h-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.22,1,0.36,1)] group-hover:scale-108 filter brightness-[0.88] contrast-[1.02] group-hover:brightness-95"
                                loading="lazy"
                            />
                            
                            <!-- Soft Gradient Vignettes (Left Feathering, Bottom & Top Blends) -->
                            <div class="absolute inset-0 bg-gradient-to-r from-[#0c0d15] via-[#0c0d15]/20 to-transparent pointer-events-none"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0c0d15] via-transparent to-[#0c0d15]/40 pointer-events-none"></div>
                            <div class="absolute inset-0 bg-gradient-to-b from-[#0c0d15]/30 via-transparent to-transparent pointer-events-none"></div>
                            <!-- Soft Cinematic Inner Shadow -->
                            <div class="absolute inset-0 shadow-[inset_0_0_20px_rgba(12,13,21,0.9)] pointer-events-none"></div>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>
