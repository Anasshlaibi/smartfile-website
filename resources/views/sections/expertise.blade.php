<!-- CHAPTER 03: NOS EXPERTISES (#080914 CINEMATIC DARK EDITORIAL CANVAS) -->
<section id="expertises" class="bg-[#080914] text-white py-20 md:py-32 relative overflow-hidden border-t border-b border-white/10">
    
    <!-- Subtle Background Ambient Glow -->
    <div class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-[#2D2658]/20 rounded-full blur-[140px] pointer-events-none"></div>
    <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-[#FF5A68]/10 rounded-full blur-[130px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Top Editorial Indicator Dash -->
        <div class="w-12 h-1 bg-white/40 mb-6 rounded-full"></div>

        <!-- Section Header with Editorial Composition -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end mb-16 gap-8">
            <div class="max-w-2xl">
                <h2 class="text-4xl sm:text-5xl md:text-6xl font-black uppercase tracking-tight text-white mb-4">
                    <span class="font-black">NOS</span>
                    <span class="font-serif-italic font-normal lowercase italic text-white ml-2 text-4xl sm:text-5xl md:text-6xl">
                        expertises
                    </span>
                </h2>
                <p class="text-white/70 text-sm sm:text-base font-light max-w-xl leading-relaxed">
                    De l'idée à la diffusion, nous créons des contenus qui donnent vie aux marques.
                </p>
            </div>

            <div class="max-w-md lg:text-right">
                <p class="text-white/60 text-xs sm:text-sm font-light leading-relaxed">
                    Stratégie, création, production et diffusion :<br class="hidden sm:inline">
                    nos 6 expertises pour vous accompagner à chaque étape de votre projet de communication.
                </p>
            </div>
        </div>

        @php
            // Fetch dynamically from Database (editable via Admin Panel /admin/expertises)
            $dbExpertises = \App\Models\Expertise::where('is_active', true)->orderBy('order')->get();

            // Default fallback if database is not yet populated
            if ($dbExpertises->isEmpty()) {
                $expertisesList = [
                    [
                        'order' => 1,
                        'title' => 'STRATÉGIE & CONCEPTION',
                        'slug' => 'strategie-conception',
                        'subtitle' => 'Donner du sens à chaque projet.',
                        'hero_desc' => 'Nous imaginons des concepts créatifs, des stratégies de contenu et des lignes éditoriales adaptées à vos objectifs et à votre audience.',
                        'image' => '/uploads/expertise_01_strategy.jpg',
                    ],
                    [
                        'order' => 2,
                        'title' => 'PRODUCTION AUDIOVISUELLE',
                        'slug' => 'production-audiovisuelle',
                        'subtitle' => 'Transformer une idée en image.',
                        'hero_desc' => 'Films institutionnels, publicités, interviews, capsules, photographie, drone, multi-caméra... Nous produisons des contenus cinématographiques et authentiques, avec une exigence de qualité.',
                        'image' => '/uploads/expertise_02_production.jpg',
                    ],
                    [
                        'order' => 3,
                        'title' => 'CONTENUS SOCIAUX',
                        'slug' => 'contenus-sociaux',
                        'subtitle' => 'Créer du contenu qui mérite d\'être regardé.',
                        'hero_desc' => 'Reels, vidéos verticales, contenus éditoriaux, shootings photo et séries de contenus : nous adaptons vos messages aux codes des réseaux sociaux et aux usages de vos audiences.',
                        'image' => '/uploads/expertise_03_social.jpg',
                    ],
                    [
                        'order' => 4,
                        'title' => 'COMMUNICATION CORPORATE',
                        'slug' => 'communication-corporate',
                        'subtitle' => 'Faire rayonner ce qui fait votre entreprise.',
                        'hero_desc' => 'Nous valorisons vos équipes, vos savoir-faire et vos engagements à travers des contenus qui renforcent votre image et votre crédibilité.',
                        'image' => '/uploads/expertise_04_corporate.jpg',
                    ],
                    [
                        'order' => 5,
                        'title' => 'PUBLICITÉ & CAMPAGNES',
                        'slug' => 'publicite-campagnes',
                        'subtitle' => 'Donner de l\'impact aux messages.',
                        'hero_desc' => 'Une idée forte, une direction créative, des formats adaptés à chaque canal : nous développons des campagnes qui marquent les esprits et génèrent de la valeur.',
                        'image' => '/uploads/expertise_05_advertising.jpg',
                    ],
                    [
                        'order' => 6,
                        'title' => 'ÉVÉNEMENT & LIVE',
                        'slug' => 'evenement-live',
                        'subtitle' => 'Capturer l\'instant. Le faire vivre. Le prolonger.',
                        'hero_desc' => 'Photo & vidéo événementielle, aftermovies, captation multi-caméra, livestream, écran géant, régie et sonorisation : nous donnons une nouvelle dimension à vos événements.',
                        'image' => '/uploads/expertise_06_events.jpg',
                    ],
                ];
            } else {
                $expertisesList = $dbExpertises;
            }
        @endphp

        <!-- 6 Expertises Cards Grid (Matching the approved editorial dark card composition) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @foreach($expertisesList as $idx => $item)
                @php
                    $num = sprintf('%02d', is_object($item) ? $item->order : ($item['order'] ?? ($idx + 1)));
                    $title = is_object($item) ? $item->title : $item['title'];
                    $slug = is_object($item) ? $item->slug : $item['slug'];
                    $subtitle = is_object($item) ? $item->subtitle : $item['subtitle'];
                    $desc = is_object($item) ? $item->hero_desc : $item['hero_desc'];
                    $image = is_object($item) ? ($item->image ?? '/uploads/expertise_01_strategy.jpg') : ($item['image'] ?? '/uploads/expertise_01_strategy.jpg');
                @endphp

                <div class="group relative bg-[#101222] border border-white/10 rounded-2xl sm:rounded-3xl overflow-hidden flex flex-col justify-between hover:border-white/25 hover:shadow-2xl hover:shadow-[#2D2658]/30 transition-all duration-500">
                    
                    <!-- Background Visual Image Banner with Subtle Gradient Fade -->
                    <div class="relative w-full h-48 sm:h-52 overflow-hidden bg-[#0a0b16]">
                        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700 ease-out opacity-85 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#101222] via-[#101222]/40 to-transparent"></div>
                    </div>

                    <!-- Card Body Content -->
                    <div class="p-6 sm:p-7 pt-2 flex-1 flex flex-col justify-between space-y-6">
                        <div class="space-y-3">
                            <!-- Number Indicator -->
                            <span class="font-mono text-xs font-bold text-white/50 tracking-wider block">
                                {{ $num }} —
                            </span>

                            <!-- Title -->
                            <h3 class="text-lg sm:text-xl font-bold uppercase tracking-tight text-white group-hover:text-[#FF5A68] transition-colors leading-snug">
                                <a href="{{ url('/expertises/' . $slug) }}">
                                    {{ $title }}
                                </a>
                            </h3>

                            <!-- Subtitle / Catchphrase -->
                            @if($subtitle)
                                <p class="text-white/90 text-xs sm:text-sm font-medium leading-relaxed">
                                    {{ $subtitle }}
                                </p>
                            @endif

                            <!-- Description -->
                            <p class="text-white/60 text-xs sm:text-sm font-light leading-relaxed">
                                {{ $desc }}
                            </p>
                        </div>

                        <!-- Bottom Action Link with Circle Arrow -->
                        <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                            <a href="{{ url('/expertises/' . $slug) }}" class="inline-flex items-center gap-3 text-xs sm:text-sm font-bold text-white group-hover:text-[#FF5A68] transition-colors">
                                <span>Découvrir</span>
                                <span class="w-7 h-7 rounded-full border border-white/20 group-hover:border-[#FF5A68] group-hover:bg-[#FF5A68] group-hover:text-white flex items-center justify-center text-xs transition-all duration-300">
                                    <i class="bi bi-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>
