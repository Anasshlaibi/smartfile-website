@extends('layouts.front')

@section('title', $expertise['meta_title'])
@section('meta_description', $expertise['meta_description'])
@section('og_title', $expertise['meta_title'])
@section('og_description', $expertise['meta_description'])
@section('og_image', asset($expertise['image']))

@section('content')

<!-- JSON-LD Structured Data for Service & FAQ SEO -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Service",
      "serviceType": "{{ $expertise['title'] }}",
      "provider": {
        "@type": "LocalBusiness",
        "name": "SmartFilms Prod",
        "telephone": "{{ $settings['phone'] }}",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "130 Bv d'Anfa",
          "addressLocality": "Casablanca",
          "addressCountry": "MA"
        }
      },
      "areaServed": ["Casablanca", "Rabat", "Marrakech", "Tanger", "Maroc"],
      "description": "{{ $expertise['meta_description'] }}"
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Accueil",
          "item": "{{ url('/') }}"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Expertises",
          "item": "{{ url('/expertises') }}"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "{{ $expertise['title'] }}",
          "item": "{{ url()->current() }}"
        }
      ]
    }
    @if(!empty($expertise['faq']))
    ,{
      "@type": "FAQPage",
      "mainEntity": [
        @foreach($expertise['faq'] as $faqItem)
        {
          "@type": "Question",
          "name": "{{ $faqItem['q'] }}",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "{{ $faqItem['a'] }}"
          }
        }{{ !$loop->last ? ',' : '' }}
        @endforeach
      ]
    }
    @endif
  ]
}
</script>

<!-- EXPERTISE CINEMATIC HERO -->
<section class="relative pt-44 pb-24 bg-[#080914] text-white overflow-hidden border-b border-white/10">
    <div class="absolute inset-0 z-0">
        <img src="{{ $expertise['image'] }}" alt="{{ $expertise['title'] }} — SmartFilms Prod Casablanca" class="w-full h-full object-cover opacity-20 filter blur-sm scale-105">
        <div class="absolute inset-0 bg-gradient-to-t from-[#080914] via-[#080914]/80 to-transparent"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs font-mono text-[#B8BDE0] mb-8" aria-label="Breadcrumb">
            <a href="{{ url('/') }}" class="hover:text-white transition-colors">Accueil</a>
            <i class="bi bi-chevron-right text-[10px] text-slate-500"></i>
            <a href="{{ url('/expertises') }}" class="hover:text-white transition-colors">Expertises</a>
            <i class="bi bi-chevron-right text-[10px] text-slate-500"></i>
            <span class="text-[#FF4D42] font-semibold">{{ $expertise['title'] }}</span>
        </nav>

        <div class="max-w-4xl space-y-6">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-[11px] tracking-widest uppercase font-semibold text-[#B8BDE0]">
                <span class="w-2 h-2 rounded-full bg-[#FF4D42]"></span>
                <span>{{ $expertise['subtitle'] }}</span>
            </div>

            <h1 class="text-4xl sm:text-6xl md:text-7xl font-bold tracking-tight leading-[1.05]">
                <span class="font-serif-italic font-normal block lowercase text-3xl sm:text-5xl text-[#B8BDE0]">expertise & savoir-faire</span>
                <span class="uppercase font-sans block text-white">{{ $expertise['h1'] }}</span>
            </h1>

            <p class="text-[#B8BDE0] text-lg sm:text-xl font-light max-w-2xl leading-relaxed">
                {{ $expertise['hero_desc'] }}
            </p>

            <div class="pt-4 flex flex-wrap items-center gap-4">
                <a href="#estimateur" class="bg-[#FF4D42] hover:bg-[#E94239] text-white px-8 py-4 rounded-full font-bold uppercase tracking-wider text-xs transition-all shadow-xl shadow-rose-500/30 hover:scale-105">
                    Estimer ce format
                </a>
                <a href="#details" class="glass-dark hover:bg-white/20 text-white px-7 py-4 rounded-full font-bold uppercase tracking-wider text-xs transition-all border border-white/20">
                    Découvrir le dispositif
                </a>
            </div>
        </div>
    </div>
</section>

<!-- SERVICE DETAILS, DELIVERABLES & EQUIPMENT -->
<section id="details" class="py-24 bg-[#080914] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6 space-y-6">
                <span class="text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF4D42] block">
                    NOTRE APPROCHE DE PRODUCTION
                </span>
                <h2 class="text-3xl sm:text-4xl font-black tracking-tight text-white uppercase">
                    L'EXIGENCE DU DÉTAIL À CHAQUE ÉTAPE
                </h2>
                <p class="text-[#B8BDE0] text-base font-light leading-relaxed">
                    Nous combinons une réflexion stratégique pointue à une maîtrise technique totale. De l'écriture du script au calibrage colorimétrique sur DaVinci Studio, chaque séquence est ciselée pour servir vos objectifs d'image et de performance.
                </p>

                <div class="pt-4 space-y-3">
                    <span class="text-xs font-mono uppercase text-slate-400 font-bold block">Livrables Inclus :</span>
                    @foreach($expertise['deliverables'] as $del)
                        <div class="flex items-center gap-3 text-sm text-slate-200">
                            <span class="w-5 h-5 rounded-full bg-[#FF4D42]/20 text-[#FF4D42] flex items-center justify-center text-xs">
                                <i class="bi bi-check2"></i>
                            </span>
                            <span>{{ $del }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="p-8 md:p-10 rounded-3xl bg-[#171936] border border-white/10 space-y-6 shadow-2xl">
                    <div class="flex items-center gap-3">
                        <i class="bi bi-camera-reels text-2xl text-[#FF4D42]"></i>
                        <h3 class="text-xl font-bold uppercase tracking-wider text-white">Parc Technique Mobilisé</h3>
                    </div>
                    <p class="text-xs text-[#B8BDE0] font-light leading-relaxed">
                        Pour garantir une signature visuelle haut de gamme, nos tournages s'appuient sur un matériel cinématographique de référence internationale :
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        @foreach($expertise['equipment'] as $eq)
                            <div class="p-3.5 rounded-2xl bg-white/5 border border-white/5 text-xs text-slate-300 font-mono flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#FF4D42]"></span>
                                <span>{{ $eq }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- RELATED CASE STUDIES -->
@if($relatedProjects->isNotEmpty())
<section class="py-24 bg-[#101229] text-white border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
            <div>
                <span class="text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF4D42] block mb-2">
                    RÉFÉRENCES RÉCENTES
                </span>
                <h3 class="text-3xl font-black uppercase text-white">FILMS & RÉALISATIONS ASSOCIÉS</h3>
            </div>
            <a href="{{ route('portfolio') }}" class="text-xs uppercase font-mono tracking-widest text-[#B8BDE0] hover:text-white flex items-center gap-2">
                <span>Tous les films</span>
                <i class="bi bi-arrow-right text-[#FF4D42]"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($relatedProjects as $proj)
                <div class="group relative flex flex-col justify-between">
                    <div class="relative aspect-video rounded-2xl overflow-hidden bg-[#171936] border border-white/10 shadow-xl">
                        <img src="{{ $proj->thumbnail ?? '/uploads/cinema_corporate_film.png' }}" alt="{{ $proj->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity bg-black/40">
                            <button onclick="openVideoModal('{{ $proj->video_url }}', '{{ $proj->title }} &bull; {{ $proj->client_name }}')" class="w-14 h-14 rounded-full bg-[#FF4D42] text-white flex items-center justify-center text-lg shadow-2xl hover:scale-110 transition-transform">
                                <i class="bi bi-play-fill ml-0.5"></i>
                            </button>
                        </div>
                    </div>
                    <div class="pt-4 flex justify-between items-start">
                        <div>
                            <span class="text-[11px] font-mono uppercase text-[#FF4D42] font-semibold block mb-1">{{ $proj->client_name }}</span>
                            <h4 class="text-lg font-bold text-white group-hover:text-[#FF4D42] transition-colors">
                                <a href="{{ route('project.show', $proj->slug) }}">{{ $proj->title }}</a>
                            </h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- FREQUENTLY ASKED QUESTIONS (SEMANTIC FAQ SECTION) -->
@if(!empty($expertise['faq']))
<section class="py-24 bg-[#F7F6F3] text-[#101229] border-t border-slate-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-3">
            <span class="text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF4D42]">
                QUESTIONS FRÉQUENTES
            </span>
            <h3 class="text-3xl sm:text-4xl font-black uppercase tracking-tight text-[#101229]">
                TOUT CE QU'IL FAUT SAVOIR
            </h3>
        </div>

        <div class="space-y-4">
            @foreach($expertise['faq'] as $idx => $f)
                <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200 shadow-sm">
                    <h4 class="text-base sm:text-lg font-bold text-[#101229] mb-2 flex items-start gap-3">
                        <span class="text-[#FF4D42] font-mono">Q.</span>
                        <span>{{ $f['q'] }}</span>
                    </h4>
                    <p class="text-slate-600 text-sm font-light leading-relaxed pl-7">
                        {{ $f['a'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- ESTIMATOR INTEGRATION CHAPTER -->
<div id="estimateur">
    @include('sections.estimator')
</div>

@endsection
