@extends('layouts.front')

@section('title', 'Réalisations & Portfolio Cinéma | SmartFilms Prod Casablanca')
@section('meta_description', 'Découvrez toutes les productions audiovisuelles, films de marque et spots publicitaires réalisés par SmartFilms Prod à Casablanca et au Maroc.')

@section('content')
<!-- PORTFOLIO HERO (CHAPTER: CINEMATIC DARK) -->
<section class="pt-40 pb-20 bg-[#080914] text-white relative overflow-hidden border-b border-white/10">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(255,77,66,0.15),rgba(255,255,255,0))]"></div>
    
    <div class="max-w-[96rem] mx-auto px-6 sm:px-12 relative z-10">
        <div class="max-w-4xl space-y-6">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-[11px] tracking-widest uppercase font-semibold text-[#B8BDE0]">
                <span class="w-2 h-2 rounded-full bg-[#FF4D42]"></span>
                <span>FILMOGRAPHY &bull; ARCHIVES</span>
            </div>

            <h1 class="text-4xl sm:text-6xl md:text-7xl font-bold tracking-tight leading-[1.05]">
                <span class="font-serif-italic font-normal block lowercase text-3xl sm:text-5xl md:text-6xl text-[#B8BDE0]">nos productions</span>
                <span class="uppercase font-sans block text-white">RÉALISATIONS CINÉMA</span>
            </h1>

            <p class="text-[#B8BDE0] text-lg sm:text-xl font-light max-w-2xl leading-relaxed">
                Une sélection rigoureuse de films de marque, spots publicitaires, documentaires d'entreprise et captations aériennes réalisés pour des organisations exigeantes.
            </p>
        </div>
    </div>
</section>

<!-- PORTFOLIO GRID & CATEGORY FILTER -->
<section class="py-24 bg-[#080914] text-white min-h-screen">
    <div class="max-w-[96rem] mx-auto px-6 sm:px-12">
        
        <!-- Filter Tabs -->
        <div class="flex flex-wrap items-center gap-3 pb-16 border-b border-white/10">
            <button onclick="filterPortfolio('all')" class="portfolio-filter-btn active px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all bg-[#FF4D42] text-white shadow-lg shadow-rose-500/20">
                Tous les films ({{ $projects->count() }})
            </button>
            @foreach($categories as $category)
                <button onclick="filterPortfolio('{{ Str::slug($category) }}')" class="portfolio-filter-btn px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all bg-white/5 hover:bg-white/15 text-[#B8BDE0] hover:text-white border border-white/10">
                    {{ $category }}
                </button>
            @endforeach
        </div>

        <!-- 2-Column Editorial Grid -->
        <div id="portfolioGrid" class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 mt-16">
            @forelse($projects as $project)
                <div class="project-item group" data-category="{{ Str::slug($project->category) }}">
                    <a href="{{ route('project.show', $project->slug ?? 'dell-empowering-digital-leaders') }}" class="block">
                        <div class="relative aspect-[16/10] rounded-3xl overflow-hidden bg-[#171936] border border-white/10 shadow-2xl transition-all duration-700 group-hover:border-[#FF4D42]/50 group-hover:shadow-[0_20px_50px_rgba(255,77,66,0.2)]">
                            
                            @if($project->thumbnail)
                                <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}" loading="lazy" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-[#101229] to-[#171936] flex items-center justify-center">
                                    <i class="bi bi-film text-5xl text-white/20"></i>
                                </div>
                            @endif

                            <div class="absolute inset-0 bg-gradient-to-t from-[#080914] via-[#080914]/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity"></div>

                            <!-- Play Overlay Badge -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-16 h-16 rounded-full bg-black/60 backdrop-blur-md border border-white/30 text-white flex items-center justify-center transform scale-90 opacity-0 group-hover:scale-100 group-hover:opacity-100 transition-all duration-500 shadow-2xl group-hover:bg-[#FF4D42] group-hover:border-transparent">
                                    <i class="bi bi-play-fill text-2xl ml-1"></i>
                                </div>
                            </div>

                            <!-- Category Badge -->
                            <div class="absolute top-6 left-6">
                                <span class="px-3.5 py-1.5 rounded-full bg-black/60 backdrop-blur-md border border-white/20 text-[10px] uppercase font-bold tracking-widest text-[#B8BDE0]">
                                    {{ $project->category ?? 'Film de Marque' }}
                                </span>
                            </div>

                            <!-- Year / Specs Badge -->
                            <div class="absolute top-6 right-6">
                                <span class="px-3 py-1 rounded-full bg-black/40 backdrop-blur-md border border-white/10 text-[10px] font-mono text-white/80">
                                    {{ $project->year ?? '2026' }}
                                </span>
                            </div>
                        </div>

                        <!-- Card Metadata -->
                        <div class="mt-6 flex items-baseline justify-between">
                            <div>
                                <span class="text-xs font-mono uppercase tracking-widest text-[#FF4D42] font-semibold block mb-1">
                                    {{ $project->client_name ?? $project->client ?? 'Client Studio' }}
                                </span>
                                <h3 class="text-xl sm:text-2xl font-bold tracking-tight text-white group-hover:text-[#FF4D42] transition-colors">
                                    {{ $project->title }}
                                </h3>
                            </div>
                            <span class="text-xs font-bold uppercase tracking-widest text-[#B8BDE0] group-hover:text-white group-hover:translate-x-1 transition-all flex items-center gap-1.5">
                                Voir le film <i class="bi bi-arrow-right"></i>
                            </span>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-span-2 text-center py-20">
                    <p class="text-[#B8BDE0] text-lg">Aucun projet disponible pour le moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@push('scripts')
<script>
function filterPortfolio(cat) {
    const items = document.querySelectorAll('.project-item');
    const buttons = document.querySelectorAll('.portfolio-filter-btn');

    buttons.forEach(btn => {
        btn.classList.remove('active', 'bg-[#FF4D42]', 'text-white');
        btn.classList.add('bg-white/5', 'text-[#B8BDE0]');
    });
    event.target.classList.add('active', 'bg-[#FF4D42]', 'text-white');
    event.target.classList.remove('bg-white/5', 'text-[#B8BDE0]');

    items.forEach(item => {
        if (cat === 'all' || item.getAttribute('data-category') === cat) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}
</script>
@endpush
@endsection
