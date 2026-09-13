<!-- CHAPTER 04: PÔLES D'EXPERTISE & SERVICES (#F8F6F1 WARM OFF-WHITE) -->
<section id="expertises" class="bg-[#F8F6F1] text-[#252238] py-24 md:py-36 relative overflow-hidden border-b border-[#2D2658]/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section with Editorial Typography & Link -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end mb-16 gap-8">
            <div class="max-w-2xl">
                <!-- Top Eyebrow -->
                <span class="text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF5A68] block mb-3 reveal-fade-up">
                    NOS SERVICES
                </span>
                
                <h2 class="text-4xl sm:text-5xl md:text-6xl font-black uppercase tracking-tight text-[#2D2658] mb-4">
                    <span class="reveal-mask inline-block">
                        <span class="reveal-line inline-block font-black">NOS</span>
                    </span>
                    <span class="reveal-mask inline-block ml-2">
                        <span class="reveal-line delay-100 font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-[#40376F] inline-block">
                            offres
                        </span>
                    </span>
                </h2>
                
                <p class="reveal-fade-up delay-200 text-[#726E8D] text-sm sm:text-base font-light max-w-xl leading-relaxed">
                    De l'idée à la diffusion, nous créons des contenus qui donnent vie aux marques.
                </p>
            </div>

            <div class="reveal-fade-up delay-300">
                <a href="{{ route('expertises') }}" class="inline-flex items-center gap-3 bg-white hover:bg-[#2D2658] text-[#2D2658] hover:text-white px-6 py-3.5 rounded-full border border-[#2D2658]/15 shadow-sm text-xs font-bold uppercase tracking-wider transition-all duration-300 group">
                    <span>Découvrir tous nos services</span>
                    <span class="w-6 h-6 rounded-full bg-[#2D2658] group-hover:bg-[#FF5A68] text-white flex items-center justify-center text-[10px] transition-colors">
                        <i class="bi bi-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>

        @php
            $expertises = [
                [
                    'num' => '01',
                    'icon' => 'bi-megaphone',
                    'title' => 'STRATÉGIE & CONCEPTION',
                    'subtitle' => 'Donner du sens à chaque projet.',
                    'desc' => 'Nous imaginons des concepts créatifs, des stratégies de contenu et des lignes éditoriales adaptées à vos objectifs et à votre audience.',
                    'slug' => 'strategie-conception',
                    'image' => '/uploads/expertise_01_strategy.jpg',
                ],
                [
                    'num' => '02',
                    'icon' => 'bi-camera-reels',
                    'title' => 'PRODUCTION AUDIOVISUELLE',
                    'subtitle' => 'Transformer une idée en image.',
                    'desc' => 'Films institutionnels, publicités, interviews, capsules, photographie, drone, multi-caméra... Nous produisons des contenus cinématographiques et authentiques.',
                    'slug' => 'production-audiovisuelle',
                    'image' => '/uploads/expertise_02_production.jpg',
                ],
                [
                    'num' => '03',
                    'icon' => 'bi-phone',
                    'title' => 'CONTENUS SOCIAUX',
                    'subtitle' => 'Créer du contenu qui mérite d\'être regardé.',
                    'desc' => 'Reels, vidéos verticales, contenus éditoriaux, shootings photo et séries de contenus : nous adaptons vos messages aux codes des réseaux sociaux.',
                    'slug' => 'contenus-sociaux',
                    'image' => '/uploads/expertise_03_social.jpg',
                ],
                [
                    'num' => '04',
                    'icon' => 'bi-building',
                    'title' => 'COMMUNICATION CORPORATE',
                    'subtitle' => 'Faire rayonner ce qui fait votre entreprise.',
                    'desc' => 'Nous valorisons vos équipes, vos savoir-faire et vos engagements à travers des contenus qui renforcent votre image et votre crédibilité.',
                    'slug' => 'communication-corporate',
                    'image' => '/uploads/cinema_corporate_film.png',
                ],
                [
                    'num' => '05',
                    'icon' => 'bi-lightbulb',
                    'title' => 'PUBLICITÉ & CAMPAGNES',
                    'subtitle' => 'Donner de l\'impact aux messages.',
                    'desc' => 'Une idée forte, une direction créative, des formats adaptés à chaque canal : nous développons des campagnes qui marquent les esprits.',
                    'slug' => 'publicite-campagnes',
                    'image' => '/uploads/studio_commercial_spot.png',
                ],
                [
                    'num' => '06',
                    'icon' => 'bi-broadcast',
                    'title' => 'ÉVÉNEMENT & LIVE',
                    'subtitle' => 'Capturer l\'instant. Le faire vivre. Le prolonger.',
                    'desc' => 'Photo & vidéo événementielle, aftermovies, captation multi-caméra, livestream, écran géant, régie et sonorisation.',
                    'slug' => 'evenement-live',
                    'image' => '/uploads/cinema_corporate_film.png',
                ],
            ];
        @endphp

        <!-- 6 Expertises Grid with Soft Pink Icons & White Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @foreach($expertises as $idx => $item)
                <div class="editorial-card group p-7 flex flex-col justify-between reveal-scale-up delay-{{ ($idx % 3 + 1) * 100 }}">
                    
                    <div class="space-y-5">
                        <!-- Top Row: Icon with Soft Pink Circle & Number -->
                        <div class="flex justify-between items-center">
                            <div class="editorial-icon-circle group-hover:scale-110 group-hover:bg-[#FF5A68] group-hover:text-white transition-all duration-300">
                                <i class="bi {{ $item['icon'] }}"></i>
                            </div>
                            <span class="font-mono text-xs font-bold text-[#2D2658]/40">{{ $item['num'] }}</span>
                        </div>

                        <div>
                            <!-- Title -->
                            <h3 class="text-base sm:text-lg font-bold text-[#2D2658] uppercase tracking-tight group-hover:text-[#FF5A68] transition-colors mb-2 leading-snug">
                                <a href="{{ url('/expertises/' . $item['slug']) }}">
                                    {{ $item['title'] }}
                                </a>
                            </h3>

                            <!-- Subtitle / Catchphrase -->
                            <p class="text-[#2D2658]/80 text-xs font-medium mb-3 leading-relaxed">
                                {{ $item['subtitle'] }}
                            </p>

                            <!-- Description Paragraph -->
                            <p class="text-[#726E8D] text-xs font-light leading-relaxed">
                                {{ $item['desc'] }}
                            </p>
                        </div>
                    </div>

                    <!-- Bottom Action Link -->
                    <div class="pt-6 mt-4 border-t border-[#2D2658]/10 flex items-center justify-between">
                        <a href="{{ url('/expertises/' . $item['slug']) }}" class="inline-flex items-center gap-2 text-xs font-bold text-[#2D2658] group-hover:text-[#FF5A68] transition-colors">
                            <span>En savoir plus</span>
                            <i class="bi bi-arrow-right text-xs transform group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>
