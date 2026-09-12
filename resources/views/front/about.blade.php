@extends('layouts.front')

@section('title', 'À Propos du Studio & Vision Cinéma | SmartFilms Prod Casablanca')
@section('meta_description', 'Découvrez l\'histoire, la vision et l\'exigence cinématographique de SmartFilms Prod, maison de production audiovisuelle de référence basée à Casablanca au Maroc.')

@section('content')
<!-- ABOUT HERO -->
<section class="pt-40 pb-20 bg-[#080914] text-white relative overflow-hidden border-b border-white/10">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(255,77,66,0.15),rgba(255,255,255,0))]"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-4xl space-y-6">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-[11px] tracking-widest uppercase font-semibold text-[#B8BDE0]">
                <span class="w-2 h-2 rounded-full bg-[#FF4D42]"></span>
                <span>MAISON DE PRODUCTION &bull; CASABLANCA</span>
            </div>

            <h1 class="text-4xl sm:text-6xl md:text-7xl font-bold tracking-tight leading-[1.05]">
                <span class="font-serif-italic font-normal block lowercase text-3xl sm:text-5xl md:text-6xl text-[#B8BDE0]">notre histoire &</span>
                <span class="uppercase font-sans block text-white">VISION DU CINÉMA</span>
            </h1>

            <p class="text-[#B8BDE0] text-lg sm:text-xl font-light max-w-2xl leading-relaxed">
                SmartFilms Prod est née d'une conviction fondamentale : à l'ère de la surinformation visuelle, seules les œuvres dotées d'une forte exigence narrative et esthétique parviennent à créer un attachement durable.
            </p>
        </div>
    </div>
</section>

<!-- THE MANIFESTO & PHILOSOPHY -->
<section class="py-24 bg-[#101229] text-white border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6 space-y-6">
                <span class="text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF4D42] block">
                    NOTRE MANIFESTE
                </span>
                <h2 class="text-3xl sm:text-4xl font-black uppercase text-white leading-tight">
                    NOUS NE PRODUISONS PAS DE SIMPLES VIDÉOS. NOUS FORGEONS VOTRE AUTORITÉ.
                </h2>
                <p class="text-[#B8BDE0] text-base font-light leading-relaxed">
                    Basés au cœur de Casablanca (Boulevard d'Anfa), nous combinons l'agilité d'une structure boutique à l'envergure technique d'un grand studio de cinéma. Chaque projet est piloté avec une rigueur absolue : écriture ciselée, optiques d'exception, étalonnage haute fidélité et mixage broadcast.
                </p>
                <div class="grid grid-cols-2 gap-6 pt-4 border-t border-white/10">
                    <div>
                        <span class="text-3xl font-mono font-black text-white block">4K / 8K</span>
                        <span class="text-xs text-[#B8BDE0] uppercase font-mono">Standards Master Cinema</span>
                    </div>
                    <div>
                        <span class="text-3xl font-mono font-black text-[#FF4D42] block">100%</span>
                        <span class="text-xs text-[#B8BDE0] uppercase font-mono">Couverture Maroc & Export</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="relative aspect-[4/3] rounded-3xl overflow-hidden bg-[#171936] border border-white/10 shadow-2xl">
                    <img src="/uploads/cinema_corporate_film.png" alt="Tournage cinéma SmartFilms Prod Casablanca" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 text-xs font-mono text-slate-300">
                        Plateau de tournage régie &bull; Casablanca, Maroc
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PRODUCTION PIPELINE -->
@include('sections.manifesto')

<!-- TEAM CHAPTER -->
@include('sections.team')

<!-- ESTIMATOR -->
<div id="estimateur">
    @include('sections.estimator')
</div>
@endsection
