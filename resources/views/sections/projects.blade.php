<!-- CHAPTER 03: SELECTED WORKS / LES FILMS (#080914 OBSIDIAN) -->
<section id="films" class="bg-[#080914] text-white py-24 md:py-32 relative overflow-hidden border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Chapter Header with Controls -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-6">
            <div>
                <span class="reveal-fade-up text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF4D42] block mb-3">
                    03 &bull; PORTFOLIO SÉLECTIONNÉ
                </span>
                <h2 class="text-4xl sm:text-5xl md:text-6xl font-black uppercase tracking-tight text-white">
                    <span class="reveal-mask">
                        <span class="reveal-line block">
                            FILMS & <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-[#B8BDE0]">réalisations</span>
                        </span>
                    </span>
                </h2>
            </div>

            <!-- Carousel Controls & View Toggle -->
            <div class="reveal-fade-up delay-200 flex flex-wrap items-center gap-3">
                
                <!-- Slide Number Indicator -->
                <div class="hidden sm:flex items-center px-4 py-2 rounded-full bg-white/5 border border-white/10 text-xs font-mono text-slate-300">
                    <span id="currentSlideDisplay" class="text-[#FF4D42] font-bold">01</span>
                    <span class="mx-1 text-slate-500">/</span>
                    <span id="totalSlidesDisplay">03</span>
                </div>

                <!-- Prev / Next Navigation Arrows -->
                <div class="flex items-center gap-2" id="carouselArrowControls">
                    <button type="button" onclick="prevFilmSlide(); resetCarouselTimer();" aria-label="Films précédents" class="w-11 h-11 rounded-full bg-white/10 hover:bg-[#FF4D42] text-white flex items-center justify-center transition-all border border-white/15 hover:scale-105 shadow-lg active:scale-95">
                        <i class="bi bi-chevron-left text-sm"></i>
                    </button>
                    <button type="button" onclick="nextFilmSlide(); resetCarouselTimer();" aria-label="Films suivants" class="w-11 h-11 rounded-full bg-white/10 hover:bg-[#FF4D42] text-white flex items-center justify-center transition-all border border-white/15 hover:scale-105 shadow-lg active:scale-95">
                        <i class="bi bi-chevron-right text-sm"></i>
                    </button>
                </div>

                <!-- Toggle Full Grid Button -->
                <button type="button" id="toggleGridBtn" onclick="toggleFilmViewMode()" class="px-5 py-2.5 rounded-full bg-white/10 hover:bg-white/20 text-white text-xs font-mono font-bold uppercase tracking-wider transition-all border border-white/15 flex items-center gap-2">
                    <i id="toggleGridIcon" class="bi bi-grid-fill text-[#FF4D42]"></i>
                    <span id="toggleGridText">Afficher tout</span>
                </button>

                <!-- Explorer All Link -->
                <a href="{{ route('portfolio') }}" class="text-xs uppercase font-mono tracking-widest text-[#B8BDE0] hover:text-white flex items-center gap-2 group transition-colors pl-2">
                    <span>Archives</span>
                    <i class="bi bi-arrow-right text-sm transition-transform group-hover:translate-x-1 text-[#FF4D42]"></i>
                </a>
            </div>
        </div>

        @php
            $chunkedProjects = $projects->chunk(2);
            $totalSlides = count($chunkedProjects);
        @endphp

        <!-- 1. AUTO-ANIMATED 2-BY-2 CAROUSEL CONTAINER (Slides smoothly right to left) -->
        <div id="filmsCarouselContainer" onmouseenter="pauseCarouselTimer()" onmouseleave="resumeCarouselTimer()" class="relative w-full overflow-hidden transition-all duration-500 reveal-scale-up">
            <div id="filmsTrack" class="flex transition-transform duration-700 ease-[cubic-bezier(0.22,1,0.36,1)] will-change-transform">
                
                @foreach($chunkedProjects as $slideIndex => $slideProjects)
                    <div class="w-full shrink-0 px-1">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-10">
                            @foreach($slideProjects as $project)
                                <div class="cinema-card group relative flex flex-col justify-between">
                                    
                                    <!-- Cinematic Thumbnail Container with Direct Links -->
                                    <div class="relative aspect-video rounded-2xl overflow-hidden bg-[#101229] border border-white/10 shadow-2xl transition-all duration-500 group-hover:border-[#FF4D42]/50 group-hover:shadow-[0_20px_50px_rgba(255,77,66,0.15)]">
                                        <img src="{{ $project->thumbnail ?? '/uploads/cinema_corporate_film.png' }}" alt="Film {{ $project->title }} pour {{ $project->client_name }} - SmartFilms Prod Casablanca" class="cinema-card-img w-full h-full object-cover opacity-90 group-hover:opacity-100">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                                        
                                        <!-- Top Meta Badges -->
                                        <div class="absolute top-4 left-4 right-4 flex justify-between items-center">
                                            <span class="px-3 py-1 rounded-full bg-[#080914]/80 backdrop-blur-md text-[10px] font-mono uppercase tracking-widest text-slate-300 border border-white/10">
                                                {{ $project->category ?? 'Film de Marque' }}
                                            </span>
                                            @if($project->duration)
                                                <span class="px-2.5 py-0.5 rounded-full bg-black/60 backdrop-blur-md text-[10px] font-mono text-white/80">
                                                    {{ $project->duration }}
                                                </span>
                                            @endif
                                        </div>

                                        <!-- Center Play Action Overlay -->
                                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                                            <button onclick="openVideoModal('{{ $project->video_url }}', '{{ $project->title }} &bull; {{ $project->client_name }}'); if (window.trackEvent) trackEvent('showreel_play', { project: '{{ $project->slug }}' });" class="w-16 h-16 rounded-full bg-[#FF4D42] text-white flex items-center justify-center text-xl shadow-2xl transform transition-transform duration-300 hover:scale-110">
                                                <i class="bi bi-play-fill ml-1"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Editorial Film Metadata (Client, Title, Year) -->
                                    <div class="pt-5 flex justify-between items-start gap-4 cinema-meta-shift">
                                        <div>
                                            <span class="text-[11px] font-mono uppercase tracking-wider text-[#FF4D42] font-semibold block mb-1">
                                                {{ $project->client_name }} &bull; {{ $project->year ?? '2026' }}
                                            </span>
                                            <h3 class="text-xl sm:text-2xl font-bold text-white group-hover:text-[#FF4D42] transition-colors leading-snug">
                                                <a href="{{ route('project.show', $project->slug ?? Str::slug($project->title)) }}">{{ $project->title }}</a>
                                            </h3>
                                        </div>

                                        <a href="{{ route('project.show', $project->slug ?? Str::slug($project->title)) }}" class="shrink-0 w-10 h-10 rounded-full border border-white/20 text-white/70 group-hover:text-white group-hover:border-[#FF4D42] flex items-center justify-center text-sm transition-all hover:bg-[#FF4D42]">
                                            <i class="bi bi-arrow-up-right"></i>
                                        </a>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <!-- 2. EXPANDED FULL GRID (Smoothly animated on click) -->
        <div id="filmsFullGrid" class="hidden grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-10 mt-6 transition-all duration-500">
            @foreach($projects as $project)
                <div class="cinema-card group relative flex flex-col justify-between reveal-scale-up">
                    <div class="relative aspect-video rounded-2xl overflow-hidden bg-[#101229] border border-white/10 shadow-2xl transition-all duration-500 group-hover:border-[#FF4D42]/50">
                        <img src="{{ $project->thumbnail ?? '/uploads/cinema_corporate_film.png' }}" alt="{{ $project->title }}" class="cinema-card-img w-full h-full object-cover opacity-90 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        
                        <div class="absolute top-4 left-4 right-4 flex justify-between items-center">
                            <span class="px-3 py-1 rounded-full bg-[#080914]/80 backdrop-blur-md text-[10px] font-mono uppercase tracking-widest text-slate-300 border border-white/10">
                                {{ $project->category ?? 'Film de Marque' }}
                            </span>
                            @if($project->duration)
                                <span class="px-2.5 py-0.5 rounded-full bg-black/60 backdrop-blur-md text-[10px] font-mono text-white/80">
                                    {{ $project->duration }}
                                </span>
                            @endif
                        </div>

                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                            <button onclick="openVideoModal('{{ $project->video_url }}', '{{ $project->title }} &bull; {{ $project->client_name }}')" class="w-16 h-16 rounded-full bg-[#FF4D42] text-white flex items-center justify-center text-xl shadow-2xl transform transition-transform duration-300 hover:scale-110">
                                <i class="bi bi-play-fill ml-1"></i>
                            </button>
                        </div>
                    </div>

                    <div class="pt-5 flex justify-between items-start gap-4 cinema-meta-shift">
                        <div>
                            <span class="text-[11px] font-mono uppercase tracking-wider text-[#FF4D42] font-semibold block mb-1">
                                {{ $project->client_name }} &bull; {{ $project->year ?? '2026' }}
                            </span>
                            <h3 class="text-xl sm:text-2xl font-bold text-white group-hover:text-[#FF4D42] transition-colors leading-snug">
                                <a href="{{ route('project.show', $project->slug ?? Str::slug($project->title)) }}">{{ $project->title }}</a>
                            </h3>
                        </div>

                        <a href="{{ route('project.show', $project->slug ?? Str::slug($project->title)) }}" class="shrink-0 w-10 h-10 rounded-full border border-white/20 text-white/70 group-hover:text-white group-hover:border-[#FF4D42] flex items-center justify-center text-sm transition-all hover:bg-[#FF4D42]">
                            <i class="bi bi-arrow-up-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Carousel Pagination Dots -->
        <div id="filmsDotsContainer" class="flex justify-center items-center gap-2 mt-12">
            @for($i = 0; $i < $totalSlides; $i++)
                <button onclick="goToFilmSlide({{ $i }}); resetCarouselTimer();" aria-label="Aller au slide {{ $i + 1 }}" class="film-dot w-3 h-3 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-[#FF4D42] w-8' : 'bg-white/20 hover:bg-white/40' }}"></button>
            @endfor
        </div>

    </div>
</section>

@push('scripts')
<script>
    let activeFilmSlide = 0;
    const totalFilmSlides = {{ $totalSlides }};
    let isFullGridMode = false;
    let carouselInterval = null;

    function updateFilmSlidePosition() {
        const track = document.getElementById('filmsTrack');
        const display = document.getElementById('currentSlideDisplay');
        const dots = document.querySelectorAll('.film-dot');

        if (track) {
            track.style.transform = `translate3d(-${activeFilmSlide * 100}%, 0, 0)`;
        }

        if (display) {
            display.innerText = String(activeFilmSlide + 1).padStart(2, '0');
        }

        dots.forEach((dot, index) => {
            if (index === activeFilmSlide) {
                dot.className = 'film-dot h-3 rounded-full transition-all duration-300 bg-[#FF4D42] w-8';
            } else {
                dot.className = 'film-dot w-3 h-3 rounded-full transition-all duration-300 bg-white/20 hover:bg-white/40';
            }
        });
    }

    function nextFilmSlide() {
        if (activeFilmSlide < totalFilmSlides - 1) {
            activeFilmSlide++;
        } else {
            activeFilmSlide = 0;
        }
        updateFilmSlidePosition();
    }

    function prevFilmSlide() {
        if (activeFilmSlide > 0) {
            activeFilmSlide--;
        } else {
            activeFilmSlide = totalFilmSlides - 1;
        }
        updateFilmSlidePosition();
    }

    function goToFilmSlide(index) {
        if (index >= 0 && index < totalFilmSlides) {
            activeFilmSlide = index;
            updateFilmSlidePosition();
        }
    }

    function startCarouselTimer() {
        if (!carouselInterval && !isFullGridMode) {
            carouselInterval = setInterval(() => {
                nextFilmSlide();
            }, 3800);
        }
    }

    function pauseCarouselTimer() {
        if (carouselInterval) {
            clearInterval(carouselInterval);
            carouselInterval = null;
        }
    }

    function resumeCarouselTimer() {
        if (!isFullGridMode) {
            startCarouselTimer();
        }
    }

    function resetCarouselTimer() {
        pauseCarouselTimer();
        resumeCarouselTimer();
    }

    function toggleFilmViewMode() {
        const carousel = document.getElementById('filmsCarouselContainer');
        const fullGrid = document.getElementById('filmsFullGrid');
        const dots = document.getElementById('filmsDotsContainer');
        const arrowControls = document.getElementById('carouselArrowControls');
        const toggleText = document.getElementById('toggleGridText');
        const toggleIcon = document.getElementById('toggleGridIcon');

        isFullGridMode = !isFullGridMode;

        if (isFullGridMode) {
            pauseCarouselTimer();
            carousel.classList.add('hidden');
            dots.classList.add('hidden');
            arrowControls.classList.add('hidden');
            fullGrid.classList.remove('hidden');
            toggleText.innerText = 'Mode 2x2 Slider';
            toggleIcon.className = 'bi bi-collection-play-fill text-[#FF4D42]';
            // Reveal full grid items
            document.querySelectorAll('#filmsFullGrid .reveal-scale-up').forEach(el => el.classList.add('revealed'));
        } else {
            fullGrid.classList.add('hidden');
            carousel.classList.remove('hidden');
            dots.classList.remove('hidden');
            arrowControls.classList.remove('hidden');
            toggleText.innerText = 'Afficher tout';
            toggleIcon.className = 'bi bi-grid-fill text-[#FF4D42]';
            startCarouselTimer();
        }
    }

    // Initialize Auto-Sliding on Load
    document.addEventListener('DOMContentLoaded', () => {
        startCarouselTimer();
    });
</script>
@endpush
