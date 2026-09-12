@extends('layouts.front')

@section('title', ($project->seo_title ?? $project->title) . ' | SmartFilms Prod Casablanca')
@section('meta_description', $project->seo_description ?? $project->description ?? 'Production cinématographique réalisée par SmartFilms Prod à Casablanca, Maroc.')
@section('og_title', $project->title . ' — ' . $project->client_name . ' | SmartFilms Prod')
@section('og_description', $project->description)
@section('og_image', asset($project->thumbnail ?? 'uploads/cinema_corporate_film.png'))

@push('head')
<!-- VideoObject Structured Data for Film Case Study -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "VideoObject",
  "name": "{{ $project->title }}",
  "description": "{{ $project->description ?? $project->title }}",
  "thumbnailUrl": [
    "{{ asset($project->thumbnail ?? 'uploads/cinema_corporate_film.png') }}"
  ],
  "uploadDate": "{{ $project->created_at ? $project->created_at->toIso8601String() : '2026-01-01T00:00:00+00:00' }}",
  "duration": "PT2M30S",
  "embedUrl": "{{ $project->video_url }}",
  "publisher": {
    "@type": "Organization",
    "name": "SmartFilms Prod",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ asset('uploads/smartfilms_logo.png') }}"
    }
  }
}
</script>
@endpush

@section('content')
<!-- CINEMATIC CASE STUDY VIEW -->
<article class="bg-[#080914] text-white">

    <!-- 1. Hero Header -->
    <header class="relative w-full min-h-[70vh] flex items-end overflow-hidden pb-16 pt-36">
        <div class="absolute inset-0">
            <img src="{{ $project->thumbnail ?? '/uploads/cinema_corporate_film.png' }}" alt="{{ $project->title }} - SmartFilms Prod Casablanca" class="w-full h-full object-cover opacity-35 scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080914] via-[#080914]/70 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full space-y-6">
            <div class="flex items-center gap-3 text-xs font-mono uppercase tracking-widest text-[#FF4D42]">
                <a href="{{ route('portfolio') }}" class="hover:underline flex items-center gap-1.5"><i class="bi bi-arrow-left"></i> Filmographie</a>
                <span>&bull;</span>
                <span>{{ $project->category ?? 'Film de Marque' }}</span>
                <span>&bull;</span>
                <span>{{ $project->year ?? '2026' }}</span>
            </div>

            <h1 class="text-4xl sm:text-6xl md:text-7xl font-black uppercase tracking-tight text-white max-w-5xl leading-[0.95]">
                {{ $project->title }}
            </h1>

            <!-- Project Metadata Bar -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 pt-6 border-t border-white/10 text-xs font-mono">
                <div>
                    <span class="text-slate-500 uppercase block mb-1">CLIENT</span>
                    <span class="font-bold text-white">{{ $project->client_name }}</span>
                </div>
                <div>
                    <span class="text-slate-500 uppercase block mb-1">DISCIPLINE</span>
                    <span class="font-bold text-white">{{ $project->category ?? 'Brand Film' }}</span>
                </div>
                <div>
                    <span class="text-slate-500 uppercase block mb-1">LOCALISATION</span>
                    <span class="font-bold text-white">{{ $project->location ?? 'Casablanca, Maroc' }}</span>
                </div>
                <div>
                    <span class="text-slate-500 uppercase block mb-1">RÉALISATION & REGIE</span>
                    <span class="font-bold text-white">SmartFilms Studio</span>
                </div>
            </div>
        </div>
    </header>

    <!-- 2. Master Film Player Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6 relative z-20">
        <div class="aspect-video w-full rounded-3xl overflow-hidden bg-black border border-white/15 shadow-2xl relative group">
            @if($project->video_url)
                @php
                    $embedUrl = $project->video_url;
                    if(str_contains($embedUrl, 'youtube.com/watch?v=')) {
                        $embedUrl = str_replace('watch?v=', 'embed/', $embedUrl);
                    } elseif(str_contains($embedUrl, 'youtu.be/')) {
                        $embedUrl = str_replace('youtu.be/', 'www.youtube.com/embed/', $embedUrl);
                    }
                @endphp
                <iframe class="w-full h-full border-0" src="{{ $embedUrl }}" allow="autoplay; fullscreen" allowfullscreen></iframe>
            @else
                <img src="{{ $project->thumbnail ?? '/uploads/cinema_corporate_film.png' }}" class="w-full h-full object-cover" alt="{{ $project->title }}">
            @endif
        </div>
    </section>

    <!-- 3. Editorial Overview & Creative Approach -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20 space-y-16">
        
        <!-- Synopsis / Le Défi -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
            <div class="md:col-span-4">
                <span class="text-[11px] font-mono font-bold uppercase tracking-[0.2em] text-[#FF4D42]">LE DÉFI CRÉATIF</span>
                <h2 class="text-2xl font-bold uppercase text-white mt-2">Vision & Objectifs</h2>
            </div>
            <div class="md:col-span-8 text-base text-[#B8BDE0] font-light leading-relaxed space-y-4">
                <p>
                    {{ $project->description }}
                </p>
                <p class="text-sm text-slate-400">
                    Concevoir un film à l'esthétique cinématographique internationale, valorisant la puissance des équipes et le leadership de la marque au Maroc et à l'export.
                </p>
            </div>
        </div>

        <!-- Dispositif & Livrables -->
        <div class="p-8 md:p-10 rounded-3xl bg-[#101229] border border-white/10 space-y-6">
            <h3 class="text-xs font-mono font-bold uppercase tracking-widest text-[#FF4D42]">DISPOSITIF TECHNIQUE & LIVRABLES</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-xs font-mono">
                <div class="space-y-1">
                    <span class="text-slate-400 uppercase block">Caméras & Optiques</span>
                    <span class="font-bold text-white">Caméras Cinéma &bull; Séries Prime</span>
                </div>
                <div class="space-y-1">
                    <span class="text-slate-400 uppercase block">Prises de Vues Aériennes</span>
                    <span class="font-bold text-white">Drone 4K Stabilisé &bull; FPV</span>
                </div>
                <div class="space-y-1">
                    <span class="text-slate-400 uppercase block">Post-Production</span>
                    <span class="font-bold text-white">Étalonnage HDR &bull; Mix Broadcast</span>
                </div>
            </div>
        </div>

        <!-- Studio Credits -->
        <div class="border-t border-white/10 pt-10 flex flex-wrap justify-between items-center gap-6 text-xs font-mono text-slate-400">
            <div>
                <span class="text-white font-bold block">Production : SmartFilms Prod Casablanca</span>
                <span>Boulevard d'Anfa &bull; Maroc</span>
            </div>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-[#FF4D42] hover:underline font-bold">
                <span>Discuter d'un projet similaire</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

    </section>

    <!-- 4. Next Project Navigation -->
    @if(isset($nextProject) && $nextProject->id !== $project->id)
        <nav class="border-t border-white/10 bg-[#101229] py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-6">
                <div>
                    <span class="text-xs font-mono uppercase tracking-widest text-slate-400 block mb-1">PROJET SUIVANT</span>
                    <h4 class="text-2xl font-bold text-white uppercase">{{ $nextProject->title }}</h4>
                    <span class="text-xs text-[#FF4D42] font-mono">{{ $nextProject->client_name }}</span>
                </div>

                <a href="{{ route('project.show', $nextProject->slug ?? Str::slug($nextProject->title)) }}" class="bg-[#FF4D42] hover:bg-[#E94239] text-white px-8 py-3.5 rounded-full text-xs font-bold uppercase tracking-widest transition-all shadow-lg hover:scale-105 flex items-center gap-2">
                    <span>Découvrir</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </nav>
    @endif

</article>
@endsection
