<!-- CHAPTER 03: SELECTED WORKS / LES FILMS (#080914 OBSIDIAN) -->
<section id="films" class="bg-[#080914] text-white py-24 md:py-32 relative overflow-hidden border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Chapter Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
            <div>
                <span class="reveal-fade-up text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF4D42] block mb-3">
                    03 &bull; PORTFOLIO SÉLECTIONNÉ
                </span>
                <h2 class="text-4xl sm:text-5xl md:text-6xl font-black uppercase tracking-tight text-white">
                    <span class="reveal-mask inline-block">
                        <span class="reveal-line inline-block">NOS</span>
                    </span>
                    <span class="reveal-mask inline-block">
                        <span class="reveal-line delay-100 font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-[#B8BDE0] inline-block">
                            réalisations récentes
                        </span>
                    </span>
                </h2>
            </div>

            <div class="reveal-fade-up delay-200 flex items-center gap-4">
                <a href="{{ route('portfolio') }}" class="px-6 py-3 rounded-full bg-white/10 hover:bg-white/20 text-white text-xs font-mono font-bold uppercase tracking-wider transition-all border border-white/15 flex items-center gap-2 group">
                    <span>Explorer toutes les réalisations</span>
                    <i class="bi bi-arrow-right text-xs transition-transform group-hover:translate-x-1 text-[#FF4D42]"></i>
                </a>
            </div>
        </div>

        @php
            $firstFeatured = $projects->first();
            $gridProjects = $projects->slice(1, 4);
            $secondFeatured = $projects->count() > 5 ? $projects->slice(5, 1)->first() : null;
        @endphp

        <div class="space-y-12 md:space-y-16">
            
            <!-- 1. FULL-WIDTH FEATURED FILM (Hero Star Project) -->
            @if($firstFeatured)
                <div class="cinema-card group relative rounded-3xl overflow-hidden bg-[#101229] border border-white/15 shadow-2xl reveal-scale-up">
                    <div class="relative aspect-[16/9] md:aspect-[21/9] w-full overflow-hidden">
                        <img src="{{ $firstFeatured->thumbnail ?? '/uploads/cinema_corporate_film.png' }}" alt="Film {{ $firstFeatured->title }} - SmartFilms Prod Casablanca" class="cinema-card-img w-full h-full object-cover opacity-90 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#080914] via-[#080914]/40 to-transparent"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-[#080914]/80 via-transparent to-transparent"></div>

                        <!-- Top Meta -->
                        <div class="absolute top-6 left-6 right-6 flex justify-between items-center z-10">
                            <span class="px-3.5 py-1.5 rounded-full bg-[#080914]/80 backdrop-blur-md text-[11px] font-mono uppercase tracking-widest text-[#FF4D42] border border-white/15 font-bold">
                                Film Vedette &bull; {{ $firstFeatured->category ?? 'Film de Marque' }}
                            </span>
                            @if($firstFeatured->duration)
                                <span class="px-3 py-1 rounded-full bg-black/60 backdrop-blur-md text-xs font-mono text-white/90">
                                    {{ $firstFeatured->duration }}
                                </span>
                            @endif
                        </div>

                        <!-- Center Play Trigger -->
                        <div class="absolute inset-0 flex items-center justify-center z-10">
                            <button onclick="openVideoModal('{{ $firstFeatured->video_url }}', '{{ $firstFeatured->title }} &bull; {{ $firstFeatured->client_name }}'); if (window.trackEvent) trackEvent('showreel_play', { project: '{{ $firstFeatured->slug }}' });" aria-label="Lancer la vidéo {{ $firstFeatured->title }}" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-[#FF4D42] text-white flex items-center justify-center text-2xl sm:text-3xl shadow-2xl transform transition-transform duration-300 hover:scale-110">
                                <i class="bi bi-play-fill ml-1"></i>
                            </button>
                        </div>

                        <!-- Bottom Content -->
                        <div class="absolute bottom-6 left-6 right-6 sm:bottom-10 sm:left-10 sm:right-10 flex flex-col md:flex-row justify-between items-start md:items-end gap-4 z-10">
                            <div class="max-w-2xl space-y-2">
                                <span class="text-xs font-mono uppercase tracking-wider text-[#FF4D42] font-bold block">
                                    {{ $firstFeatured->client_name }} &bull; {{ $firstFeatured->year ?? '2026' }}
                                </span>
                                <h3 class="text-2xl sm:text-4xl md:text-5xl font-black text-white leading-tight">
                                    <a href="{{ route('project.show', $firstFeatured->slug ?? Str::slug($firstFeatured->title)) }}" class="hover:text-[#FF4D42] transition-colors">{{ $firstFeatured->title }}</a>
                                </h3>
                                @if($firstFeatured->short_description)
                                    <p class="text-slate-300 text-sm md:text-base font-light line-clamp-2">
                                        {{ $firstFeatured->short_description }}
                                    </p>
                                @endif
                            </div>

                            <a href="{{ route('project.show', $firstFeatured->slug ?? Str::slug($firstFeatured->title)) }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-white/10 hover:bg-[#FF4D42] text-white text-xs font-mono font-bold uppercase tracking-wider transition-all border border-white/20">
                                <span>Voir le Case Study</span>
                                <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- 2. TWO-COLUMN EDITORIAL PROJECT GRID -->
            @if($gridProjects->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-10">
                    @foreach($gridProjects as $idx => $project)
                        <div class="cinema-card group relative flex flex-col justify-between reveal-scale-up delay-{{ ($idx + 1) * 100 }}">
                            
                            <!-- Card Media -->
                            <div class="relative aspect-[16/10] rounded-2xl overflow-hidden bg-[#101229] border border-white/10 shadow-2xl transition-all duration-500 group-hover:border-[#FF4D42]/50">
                                <img src="{{ $project->thumbnail ?? '/uploads/cinema_corporate_film.png' }}" alt="{{ $project->title }} - SmartFilms Prod Casablanca" class="cinema-card-img w-full h-full object-cover opacity-90 group-hover:opacity-100">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                                
                                <div class="absolute top-4 left-4 right-4 flex justify-between items-center z-10">
                                    <span class="px-3 py-1 rounded-full bg-[#080914]/80 backdrop-blur-md text-[10px] font-mono uppercase tracking-widest text-slate-300 border border-white/10">
                                        {{ $project->category ?? 'Film de Marque' }}
                                    </span>
                                    @if($project->duration)
                                        <span class="px-2.5 py-0.5 rounded-full bg-black/60 backdrop-blur-md text-[10px] font-mono text-white/80">
                                            {{ $project->duration }}
                                        </span>
                                    @endif
                                </div>

                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40 z-10">
                                    <button onclick="openVideoModal('{{ $project->video_url }}', '{{ $project->title }} &bull; {{ $project->client_name }}'); if (window.trackEvent) trackEvent('showreel_play', { project: '{{ $project->slug }}' });" aria-label="Lire la vidéo {{ $project->title }}" class="w-16 h-16 rounded-full bg-[#FF4D42] text-white flex items-center justify-center text-xl shadow-2xl transform transition-transform duration-300 hover:scale-110">
                                        <i class="bi bi-play-fill ml-1"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Metadata -->
                            <div class="pt-5 flex justify-between items-start gap-4 cinema-meta-shift">
                                <div>
                                    <span class="text-[11px] font-mono uppercase tracking-wider text-[#FF4D42] font-semibold block mb-1">
                                        {{ $project->client_name }} &bull; {{ $project->year ?? '2026' }}
                                    </span>
                                    <h3 class="text-xl sm:text-2xl font-bold text-white group-hover:text-[#FF4D42] transition-colors leading-snug">
                                        <a href="{{ route('project.show', $project->slug ?? Str::slug($project->title)) }}">{{ $project->title }}</a>
                                    </h3>
                                </div>

                                <a href="{{ route('project.show', $project->slug ?? Str::slug($project->title)) }}" aria-label="Découvrir le projet {{ $project->title }}" class="shrink-0 w-10 h-10 rounded-full border border-white/20 text-white/70 group-hover:text-white group-hover:border-[#FF4D42] flex items-center justify-center text-sm transition-all hover:bg-[#FF4D42]">
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
            @endif

            <!-- 3. SECOND FULL-WIDTH FEATURED FILM -->
            @if($secondFeatured)
                <div class="cinema-card group relative rounded-3xl overflow-hidden bg-[#101229] border border-white/15 shadow-2xl reveal-scale-up">
                    <div class="relative aspect-[16/9] md:aspect-[21/9] w-full overflow-hidden">
                        <img src="{{ $secondFeatured->thumbnail ?? '/uploads/studio_commercial_spot.png' }}" alt="Film {{ $secondFeatured->title }} - SmartFilms Prod Casablanca" class="cinema-card-img w-full h-full object-cover opacity-90 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#080914] via-[#080914]/40 to-transparent"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-[#080914]/80 via-transparent to-transparent"></div>

                        <div class="absolute top-6 left-6 right-6 flex justify-between items-center z-10">
                            <span class="px-3.5 py-1.5 rounded-full bg-[#080914]/80 backdrop-blur-md text-[11px] font-mono uppercase tracking-widest text-[#FF4D42] border border-white/15 font-bold">
                                {{ $secondFeatured->category ?? 'Publicité TV' }} &bull; Production Studio
                            </span>
                            @if($secondFeatured->duration)
                                <span class="px-3 py-1 rounded-full bg-black/60 backdrop-blur-md text-xs font-mono text-white/90">
                                    {{ $secondFeatured->duration }}
                                </span>
                            @endif
                        </div>

                        <div class="absolute inset-0 flex items-center justify-center z-10">
                            <button onclick="openVideoModal('{{ $secondFeatured->video_url }}', '{{ $secondFeatured->title }} &bull; {{ $secondFeatured->client_name }}'); if (window.trackEvent) trackEvent('showreel_play', { project: '{{ $secondFeatured->slug }}' });" aria-label="Lancer la vidéo {{ $secondFeatured->title }}" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-[#FF4D42] text-white flex items-center justify-center text-2xl sm:text-3xl shadow-2xl transform transition-transform duration-300 hover:scale-110">
                                <i class="bi bi-play-fill ml-1"></i>
                            </button>
                        </div>

                        <div class="absolute bottom-6 left-6 right-6 sm:bottom-10 sm:left-10 sm:right-10 flex flex-col md:flex-row justify-between items-start md:items-end gap-4 z-10">
                            <div class="max-w-2xl space-y-2">
                                <span class="text-xs font-mono uppercase tracking-wider text-[#FF4D42] font-bold block">
                                    {{ $secondFeatured->client_name }} &bull; {{ $secondFeatured->year ?? '2026' }}
                                </span>
                                <h3 class="text-2xl sm:text-4xl md:text-5xl font-black text-white leading-tight">
                                    <a href="{{ route('project.show', $secondFeatured->slug ?? Str::slug($secondFeatured->title)) }}" class="hover:text-[#FF4D42] transition-colors">{{ $secondFeatured->title }}</a>
                                </h3>
                                @if($secondFeatured->short_description)
                                    <p class="text-slate-300 text-sm md:text-base font-light line-clamp-2">
                                        {{ $secondFeatured->short_description }}
                                    </p>
                                @endif
                            </div>

                            <a href="{{ route('project.show', $secondFeatured->slug ?? Str::slug($secondFeatured->title)) }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-white/10 hover:bg-[#FF4D42] text-white text-xs font-mono font-bold uppercase tracking-wider transition-all border border-white/20">
                                <span>Voir le Case Study</span>
                                <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

        </div>

    </div>
</section>

