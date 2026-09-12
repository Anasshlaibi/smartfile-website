<!-- CHAPTER 06: THE TEAM / HUMAN SIDE (#F7F6F3 WARM OFF-WHITE) -->
<section id="equipe" class="bg-[#F7F6F3] text-[#101229] py-28 md:py-36 border-t border-slate-200/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header with Masked Text Reveal -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-20 gap-6">
            <div>
                <span class="reveal-fade-up text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF4D42] block mb-3">
                    06 &bull; LES TALENTS DU STUDIO
                </span>
                <h2 class="text-4xl sm:text-5xl md:text-6xl font-black uppercase tracking-tight text-[#101229]">
                    <span class="reveal-mask">
                        <span class="reveal-line block">
                            L'ÉQUIPE <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-slate-500">smartfilms</span>
                        </span>
                    </span>
                </h2>
            </div>
            <p class="reveal-fade-up delay-200 text-slate-600 text-sm md:text-base font-light max-w-md">
                Réalisateurs, directeurs de la photographie, cadreurs et télépilotes animés par l'exigence du détail à Casablanca et au Maroc.
            </p>
        </div>

        <!-- Team Grid with Animated Staggered Scale-Up -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($teamMembers as $idx => $m)
                <div class="group bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm hover:shadow-2xl transition-all duration-500 flex flex-col justify-between hover:border-[#FF4D42]/40 reveal-scale-up delay-{{ ($idx + 1) * 100 }}">
                    <div class="space-y-4">
                        <div class="aspect-square rounded-2xl overflow-hidden bg-slate-100 relative">
                            <img src="{{ $m->photo ?? '/uploads/cinema_corporate_film.png' }}" alt="{{ $m->name }} — {{ $m->role }} chez SmartFilms Prod Casablanca" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 group-hover:scale-105">
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-[#101229] group-hover:text-[#FF4D42] transition-colors">{{ $m->name }}</h3>
                            <p class="text-[11px] font-mono uppercase tracking-wider text-[#FF4D42] font-semibold">{{ $m->role }}</p>
                        </div>
                        <p class="text-xs text-slate-600 font-light leading-relaxed">
                            {{ $m->bio }}
                        </p>
                    </div>

                    @if($m->linkedin)
                        <div class="pt-4 mt-4 border-t border-slate-100 flex justify-end">
                            <a href="{{ $m->linkedin }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn de {{ $m->name }}" class="w-8 h-8 rounded-full bg-slate-100 hover:bg-[#FF4D42] text-slate-500 hover:text-white flex items-center justify-center text-xs transition-colors">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

    </div>
</section>
