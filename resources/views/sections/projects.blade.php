<!-- CHAPTER 03: SELECTED WORKS / LES FILMS (#080914 OBSIDIAN) -->
<section id="films" class="bg-[#080914] text-white py-24 md:py-32 relative overflow-hidden border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 lg:mb-16 gap-6">
            <div>
                <span class="reveal-fade-up text-xs font-mono font-bold tracking-[0.25em] text-[#FF4D42] uppercase block mb-3">
                    03 • Portfolio Sélectionné
                </span>
                <h2 class="text-3xl sm:text-5xl lg:text-6xl font-black uppercase tracking-tight text-white">
                    Nos <span class="font-serif-italic font-normal lowercase text-[#B8BDE0]">réalisations phares</span>
                </h2>
            </div>
            
            <a href="{{ route('portfolio') }}" class="reveal-fade-up delay-200 group inline-flex items-center space-x-2 text-xs font-mono font-bold tracking-wider uppercase text-white/80 hover:text-white px-6 py-3.5 rounded-full bg-white/5 hover:bg-white/15 border border-white/10 backdrop-blur-md transition-all duration-300">
                <span>Explorer toutes les réalisations</span>
                <span class="text-[#FF4D42] transform group-hover:translate-x-1.5 transition-transform">&rarr;</span>
            </a>
        </div>

        @php
            $featuredProject = $projects->first();
            $gridProjects = $projects->slice(1, 4);
        @endphp

        <!-- Main Cinematic Hero Project Card ($20,000 Tier Design) -->
        @if($featuredProject)
            <div class="spotlight-card relative group rounded-3xl overflow-hidden cursor-pointer w-full bg-[#0c0c0e] border border-white/10 shadow-2xl transition-all duration-500 hover:border-[#FF4D42]/40 mb-12 reveal-scale-up">
              
              <!-- Thumbnail / Background Media with Smooth Parallax Zoom & Soft Feathering -->
              <div class="relative w-full aspect-[16/9] md:aspect-[21/9] min-h-[460px] md:min-h-[550px] overflow-hidden bg-[#080914]">
                  <img 
                      src="{{ $featuredProject->thumbnail ? asset($featuredProject->thumbnail) : asset('uploads/cinema_corporate_film.png') }}" 
                      alt="{{ $featuredProject->title }} - Smart Films" 
                      class="w-full h-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.22,1,0.36,1)] group-hover:scale-105 filter brightness-[0.88] contrast-[1.02]" 
                  />
                  
                  <!-- Deep Cinematic Multi-Stop Gradient Overlays (Smooth Feathering) -->
                  <div class="absolute inset-0 bg-gradient-to-t from-[#080914] via-[#080914]/50 to-transparent pointer-events-none"></div>
                  <div class="absolute inset-0 bg-gradient-to-r from-[#080914]/80 via-transparent to-[#080914]/50 pointer-events-none"></div>
                  <div class="absolute inset-0 bg-gradient-to-b from-[#080914]/50 via-transparent to-transparent pointer-events-none"></div>
                  <div class="absolute inset-0 shadow-[inset_0_0_40px_rgba(8,9,20,0.95)] pointer-events-none"></div>
              </div>

              <!-- Top Left: Category Tag -->
              <div class="absolute top-6 left-6 flex items-center space-x-2 z-10">
                <span class="bg-black/50 backdrop-blur-md text-[#FF4D42] text-[11px] font-mono font-semibold px-4 py-1.5 rounded-full uppercase tracking-wider border border-white/10 shadow-lg">
                  Film Vedette • {{ $featuredProject->category ?? 'Film Corporate' }}
                </span>
              </div>

              <!-- Top Right: Duration -->
              <div class="absolute top-6 right-6 z-10">
                <span class="bg-black/50 backdrop-blur-md text-white/90 font-mono text-xs font-semibold px-3.5 py-1.5 rounded-full border border-white/10 shadow-lg">
                  {{ $featuredProject->duration ?? '02:45' }}
                </span>
              </div>

              <!-- Center: Glowing Play Button with Scale Effect & Modal Trigger -->
              <div class="absolute inset-0 flex items-center justify-center z-20 pointer-events-auto">
                <button 
                  onclick="openVideoModal('{{ $featuredProject->video_url }}', '{{ addslashes($featuredProject->title) }} • {{ addslashes($featuredProject->client_name) }}'); if (window.trackEvent) trackEvent('showreel_play', { project: '{{ $featuredProject->slug }}' });"
                  aria-label="Lancer la vidéo {{ $featuredProject->title }}"
                  class="bg-[#FF4D42] text-white rounded-full p-6 md:p-7 transform transition-all duration-300 group-hover:scale-110 shadow-[0_0_35px_rgba(255,77,66,0.6)] hover:shadow-[0_0_55px_rgba(255,77,66,0.85)] flex items-center justify-center focus:outline-none"
                >
                  <svg class="w-8 h-8 md:w-9 md:h-9 ml-1 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                </button>
              </div>

              <!-- Bottom Content Grid -->
              <div class="absolute bottom-0 left-0 right-0 p-6 md:p-10 flex flex-col md:flex-row justify-between items-start md:items-end gap-6 z-10 bg-gradient-to-t from-[#080914] via-[#080914]/85 to-transparent">
                <div class="max-w-2xl">
                  <p class="text-[#FF4D42] text-xs font-mono uppercase tracking-widest font-semibold mb-2">
                    {{ $featuredProject->client_name ?? 'Dell Technologies' }} • {{ $featuredProject->year ?? date('Y') }}
                  </p>
                  <h3 class="text-white text-2xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight">
                    <a href="{{ route('project.show', $featuredProject->slug ?? Str::slug($featuredProject->title)) }}" class="hover:text-[#FF4D42] transition-colors">
                      {{ $featuredProject->title }}
                    </a>
                  </h3>
                  @if(!empty($featuredProject->short_description))
                    <p class="text-slate-300 text-sm md:text-base font-light mt-2 line-clamp-2 max-w-xl">
                      {{ $featuredProject->short_description }}
                    </p>
                  @endif
                </div>
                
                <!-- Action Button -->
                <a href="{{ route('project.show', $featuredProject->slug ?? Str::slug($featuredProject->title)) }}" class="inline-flex items-center space-x-2 text-white text-xs font-mono font-bold uppercase tracking-wider bg-white/10 hover:bg-white hover:text-black border border-white/20 px-6 py-3.5 rounded-full backdrop-blur-md transition-all duration-300 shrink-0">
                  <span>Voir le case study</span>
                  <svg class="w-4 h-4 transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17L17 7M17 7H7M17 7v10"/>
                  </svg>
                </a>
              </div>
              
            </div>
        @endif

        <!-- Secondary Projects Grid (2-Column Interactive Cards) -->
        @if($gridProjects->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-10">
                @foreach($gridProjects as $idx => $project)
                    <div class="spotlight-card group relative flex flex-col justify-between rounded-3xl bg-[#0c0c0e] border border-white/10 overflow-hidden hover:border-[#FF4D42]/40 transition-all duration-500 shadow-xl reveal-scale-up delay-{{ ($idx + 1) * 100 }}">
                        
                        <!-- Media Container with Smooth Parallax Zoom & Soft Vignette -->
                        <div class="relative aspect-[16/10] overflow-hidden bg-[#080914]">
                            <img 
                                src="{{ $project->thumbnail ? asset($project->thumbnail) : asset('uploads/cinema_corporate_film.png') }}" 
                                alt="{{ $project->title }} - SmartFilms Casablanca" 
                                class="w-full h-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.22,1,0.36,1)] group-hover:scale-105 filter brightness-[0.88] contrast-[1.02]" 
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#080914] via-[#080914]/40 to-transparent pointer-events-none"></div>
                            <div class="absolute inset-0 bg-gradient-to-b from-[#080914]/40 via-transparent to-transparent pointer-events-none"></div>
                            <div class="absolute inset-0 shadow-[inset_0_0_25px_rgba(8,9,20,0.85)] pointer-events-none"></div>

                            <!-- Category & Duration Pill -->
                            <div class="absolute top-4 left-4 right-4 flex justify-between items-center z-10">
                                <span class="bg-black/50 backdrop-blur-md text-slate-300 text-[10px] font-mono uppercase tracking-widest px-3 py-1 rounded-full border border-white/10">
                                    {{ $project->category ?? 'Production' }}
                                </span>
                                @if(!empty($project->duration))
                                    <span class="bg-black/50 backdrop-blur-md text-white/80 text-[10px] font-mono px-2.5 py-1 rounded-full border border-white/10">
                                        {{ $project->duration }}
                                    </span>
                                @endif
                            </div>

                            <!-- Center Play Button Overlay -->
                            <div class="absolute inset-0 flex items-center justify-center z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40 backdrop-blur-[2px]">
                                <button 
                                  onclick="openVideoModal('{{ $project->video_url }}', '{{ addslashes($project->title) }} • {{ addslashes($project->client_name) }}')"
                                  class="w-16 h-16 rounded-full bg-[#FF4D42] text-white flex items-center justify-center text-xl shadow-[0_0_30px_rgba(255,77,66,0.6)] transform transition-transform duration-300 hover:scale-110 focus:outline-none"
                                  aria-label="Lire la vidéo {{ $project->title }}"
                                >
                                  <svg class="w-6 h-6 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                  </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Card Meta Info -->
                        <div class="p-6 flex justify-between items-start gap-4">
                            <div>
                                <span class="text-[11px] font-mono uppercase tracking-wider text-[#FF4D42] font-semibold block mb-1">
                                    {{ $project->client_name }} • {{ $project->year ?? date('Y') }}
                                </span>
                                <h4 class="text-xl sm:text-2xl font-bold text-white group-hover:text-[#FF4D42] transition-colors leading-snug">
                                    <a href="{{ route('project.show', $project->slug ?? Str::slug($project->title)) }}">
                                        {{ $project->title }}
                                    </a>
                                </h4>
                            </div>

                            <a href="{{ route('project.show', $project->slug ?? Str::slug($project->title)) }}" aria-label="Voir le projet {{ $project->title }}" class="shrink-0 w-10 h-10 rounded-full border border-white/20 text-white/80 group-hover:text-white group-hover:border-[#FF4D42] group-hover:bg-[#FF4D42] flex items-center justify-center text-sm transition-all duration-300">
                                <svg class="w-4 h-4 transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17L17 7M17 7H7M17 7v10"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>
