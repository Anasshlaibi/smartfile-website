@extends('layouts.front')

@section('title', 'L\'Équipe & Réalisateurs du Studio | SmartFilms Prod Casablanca')
@section('meta_description', 'Découvrez les réalisateurs, directeurs de la photographie, cadreurs et télépilotes drone de SmartFilms Prod à Casablanca et au Maroc.')

@section('content')
<!-- TEAM HERO -->
<section class="pt-40 pb-20 bg-[#080914] text-white relative overflow-hidden border-b border-white/10">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(255,77,66,0.15),rgba(255,255,255,0))]"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-4xl space-y-6">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-[11px] tracking-widest uppercase font-semibold text-[#B8BDE0]">
                <span class="w-2 h-2 rounded-full bg-[#FF4D42]"></span>
                <span>TALENTS DU STUDIO</span>
            </div>

            <h1 class="text-4xl sm:text-6xl md:text-7xl font-bold tracking-tight leading-[1.05]">
                <span class="font-serif-italic font-normal block lowercase text-3xl sm:text-5xl md:text-6xl text-[#B8BDE0]">les artisans de l'image</span>
                <span class="uppercase font-sans block text-white">L'ÉQUIPE SMARTFILMS</span>
            </h1>

            <p class="text-[#B8BDE0] text-lg sm:text-xl font-light max-w-2xl leading-relaxed">
                Une équipe soudée de réalisateurs, chefs opérateurs, étalonneurs et pilotes de drone animés par la passion du cadre et l'amour du récit.
            </p>
        </div>
    </div>
</section>

<!-- TEAM SECTION CHAPTER -->
@include('sections.team')

<!-- STUDIO LIFE / VALUES -->
<section class="py-24 bg-[#101229] text-white border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-8 rounded-3xl bg-[#171936] border border-white/10 space-y-3">
                <span class="text-[#FF4D42] text-2xl font-bold font-mono">01</span>
                <h3 class="text-xl font-bold text-white uppercase">Regard d'Auteur</h3>
                <p class="text-[#B8BDE0] text-xs font-light leading-relaxed">
                    Chaque production bénéficie d'une vision artistique singulière, refusant les modèles préconçus pour révéler l'ADN profond de votre marque.
                </p>
            </div>

            <div class="p-8 rounded-3xl bg-[#171936] border border-white/10 space-y-3">
                <span class="text-[#FF4D42] text-2xl font-bold font-mono">02</span>
                <h3 class="text-xl font-bold text-white uppercase">Précision Technique</h3>
                <p class="text-[#B8BDE0] text-xs font-light leading-relaxed">
                    De la gestion colorimétrique ACES aux tournages haute vitesse, nous investissons en continu dans les outils cinéma les plus pointus.
                </p>
            </div>

            <div class="p-8 rounded-3xl bg-[#171936] border border-white/10 space-y-3">
                <span class="text-[#FF4D42] text-2xl font-bold font-mono">03</span>
                <h3 class="text-xl font-bold text-white uppercase">Engagement Total</h3>
                <p class="text-[#B8BDE0] text-xs font-light leading-relaxed">
                    Un accompagnement personnalisé de la première note d'intention jusqu'aux livraisons multi-formats et au reporting d'impact.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT CTA -->
<div id="estimateur">
    @include('sections.estimator')
</div>
@endsection
