<!-- CHAPTER 06: THE TEAM / HUMAN SIDE (#F8F6F1 WARM OFF-WHITE) -->
<section id="equipe" class="bg-[#F8F6F1] text-[#252238] py-24 md:py-36 border-b border-[#2D2658]/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header with Masked Text Reveal -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
            <div>
                <span class="reveal-fade-up text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF5A68] block mb-3">
                    06 &bull; LES TALENTS DU STUDIO
                </span>
                <h2 class="text-4xl sm:text-5xl md:text-6xl font-black uppercase tracking-tight text-[#2D2658]">
                    <span class="reveal-mask">
                        <span class="reveal-line block">
                            L'ÉQUIPE <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-[#40376F]">smartfilms</span>
                        </span>
                    </span>
                </h2>
            </div>
            <p class="reveal-fade-up delay-200 text-[#726E8D] text-sm md:text-base font-light max-w-md">
                Réalisateurs, directeurs de la photographie, cadreurs et télépilotes animés par l'exigence du détail à Casablanca et au Maroc.
            </p>
        </div>

        <!-- Team Grid with Clean Portrait Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
            @foreach($teamMembers as $idx => $m)
                <div class="group bg-white rounded-3xl p-6 border border-[#2D2658]/10 shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col justify-between hover:border-[#FF5A68]/40 reveal-scale-up delay-{{ ($idx + 1) * 100 }}">
                    <div class="space-y-4">
                        <div class="aspect-square rounded-2xl overflow-hidden bg-[#F4F2F7] relative">
                            <img src="{{ $m->photo ?? '/uploads/cinema_corporate_film.png' }}" alt="{{ $m->name }} — {{ $m->role }} chez SmartFilms Prod Casablanca" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 group-hover:scale-105">
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-[#2D2658] group-hover:text-[#FF5A68] transition-colors">{{ $m->name }}</h3>
                            <p class="text-[11px] font-mono uppercase tracking-wider text-[#FF5A68] font-bold">{{ $m->role }}</p>
                        </div>
                        <p class="text-xs text-[#726E8D] font-light leading-relaxed">
                            {{ $m->bio }}
                        </p>
                    </div>

                    @if($m->linkedin)
                        <div class="pt-4 mt-4 border-t border-[#2D2658]/10 flex justify-end">
                            <a href="{{ $m->linkedin }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn de {{ $m->name }}" class="w-8 h-8 rounded-full bg-[#F4F2F7] hover:bg-[#FF5A68] text-[#2D2658] hover:text-white flex items-center justify-center text-xs transition-colors">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

    </div>
</section>
