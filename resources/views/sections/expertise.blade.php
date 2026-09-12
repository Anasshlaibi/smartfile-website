<!-- CHAPTER 04: PÔLES D'EXPERTISE (#F7F6F3 WARM OFF-WHITE) -->
<section id="expertises" class="bg-[#F7F6F3] text-[#101229] py-28 md:py-36 border-t border-slate-200/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header with Masked Text Reveal -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-20 gap-6">
            <div>
                <span class="reveal-fade-up text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF4D42] block mb-3">
                    04 &bull; SAVOIR-FAIRE & DISCIPLINES
                </span>
                <h2 class="text-4xl sm:text-5xl md:text-6xl font-black uppercase tracking-tight text-[#101229]">
                    <span class="reveal-mask">
                        <span class="reveal-line block">
                            NOS <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-slate-500">expertises métiers</span>
                        </span>
                    </span>
                </h2>
            </div>
            <p class="reveal-fade-up delay-200 text-slate-600 text-sm md:text-base font-light max-w-md">
                De la conception éditoriale à la post-production avancée, nous concevons des œuvres visuelles pensées pour marquer les esprits.
            </p>
        </div>

        <!-- 4 Clear Disciplines (Editorial Staggered Grid with Left/Right Animation) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
            @php
                $disciplines = [
                    [
                        'num' => '01',
                        'title' => 'BRAND FILMS',
                        'slug' => 'spot-publicitaire',
                        'desc' => 'Des manifestes cinématographiques puissants qui forgent l\'identité et l\'autorité émotionnelle de votre marque.',
                        'image' => '/uploads/cinema_corporate_film.png',
                    ],
                    [
                        'num' => '02',
                        'title' => 'COMMERCIALS',
                        'slug' => 'spot-publicitaire',
                        'desc' => 'Spots publicitaires à fort impact pour la télévision et les canaux digitaux, calibrés pour captiver et convertir en quelques secondes.',
                        'image' => '/uploads/studio_commercial_spot.png',
                    ],
                    [
                        'num' => '03',
                        'title' => 'CORPORATE & LEADERSHIP',
                        'slug' => 'film-corporate',
                        'desc' => 'Mise en valeur de vos infrastructures industrielles, de vos équipes et de vos visions stratégiques au Maroc et à l\'international.',
                        'image' => '/uploads/cinema_corporate_film.png',
                    ],
                    [
                        'num' => '04',
                        'title' => 'EVENTS & AERIAL',
                        'slug' => 'drone-aerien',
                        'desc' => 'Captations aériennes par drone 8K, plans séquences FPV immersifs et couverture multi-caméras de sommets internationaux.',
                        'image' => '/uploads/studio_commercial_spot.png',
                    ],
                ];
            @endphp

            @foreach($disciplines as $idx => $disc)
                <div class="group bg-white rounded-3xl p-8 md:p-10 border border-slate-200/80 shadow-sm hover:shadow-2xl transition-all duration-500 flex flex-col justify-between hover:border-[#FF4D42]/40 {{ $idx % 2 == 0 ? 'reveal-left' : 'reveal-right' }} delay-{{ ($idx + 1) * 100 }}">
                    <div class="space-y-6">
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-mono font-black text-[#FF4D42]">{{ $disc['num'] }}</span>
                            <a href="{{ url('/expertises/' . $disc['slug']) }}" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 group-hover:text-[#FF4D42] group-hover:bg-rose-50 transition-colors">
                                <i class="bi bi-arrow-up-right text-xs"></i>
                            </a>
                        </div>

                        <a href="{{ url('/expertises/' . $disc['slug']) }}" class="block aspect-[16/9] rounded-2xl overflow-hidden bg-slate-100 relative">
                            <img src="{{ $disc['image'] }}" alt="{{ $disc['title'] }} - SmartFilms Prod Casablanca" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        </a>

                        <div>
                            <h3 class="text-2xl font-black tracking-tight text-[#101229] group-hover:text-[#FF4D42] transition-colors mb-2">
                                <a href="{{ url('/expertises/' . $disc['slug']) }}">{{ $disc['title'] }}</a>
                            </h3>
                            <p class="text-slate-600 text-sm font-light leading-relaxed">
                                {{ $disc['desc'] }}
                            </p>
                        </div>
                    </div>

                    <div class="pt-6 mt-6 border-t border-slate-100 flex items-center justify-between text-xs font-mono">
                        <a href="{{ url('/expertises/' . $disc['slug']) }}" class="font-bold text-[#FF4D42] hover:underline flex items-center gap-1.5">
                            <span>Découvrir l'expertise</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                        <span class="text-slate-400 uppercase">Casablanca & Maroc</span>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
