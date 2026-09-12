@extends('layouts.front')

@section('title', 'Expertises & Savoir-Faire Audiovisuel | SmartFilms Prod Casablanca')
@section('meta_description', 'Découvrez les 4 piliers de production de SmartFilms Prod à Casablanca : Films Corporate, Spots Publicitaires, Captation Événementielle et Prises de Vues Aériennes par Drone au Maroc.')

@section('content')
<!-- HERO SECTION -->
<section class="pt-40 pb-20 bg-[#080914] text-white relative overflow-hidden border-b border-white/10">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(255,77,66,0.15),rgba(255,255,255,0))]"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-4xl space-y-6">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-[11px] tracking-widest uppercase font-semibold text-[#B8BDE0]">
                <span class="w-2 h-2 rounded-full bg-[#FF4D42]"></span>
                <span>DISCIPLINES & SAVOIR-FAIRE</span>
            </div>

            <h1 class="text-4xl sm:text-6xl md:text-7xl font-bold tracking-tight leading-[1.05]">
                <span class="font-serif-italic font-normal block lowercase text-3xl sm:text-5xl md:text-6xl text-[#B8BDE0]">l'art du cinéma pour</span>
                <span class="uppercase font-sans block text-white">NOS EXPERTISES</span>
            </h1>

            <p class="text-[#B8BDE0] text-lg sm:text-xl font-light max-w-2xl leading-relaxed">
                Quatre pôles d'excellence audiovisuelle pour concevoir, tourner et diffuser des films qui installent votre autorité sur le marché marocain et international.
            </p>
        </div>
    </div>
</section>

<!-- 4 POLES DETAILED SECTION -->
<section class="py-24 bg-[#080914] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-24">
        
        @php
            $pillars = [
                [
                    'num' => '01',
                    'slug' => 'film-corporate',
                    'title' => 'Film Corporate & Institutionnel',
                    'tagline' => 'Storytelling de marque & valorisation industrielle',
                    'desc' => 'Des films de référence pour présenter vos infrastructures, fédérer vos collaborateurs et incarner l\'ambition de votre groupe auprès de vos investisseurs et partenaires.',
                    'deliverables' => ['Film manifeste d\'entreprise', 'Reportages immersifs sur site', 'Portraits de dirigeants & experts', 'Teasers LinkedIn & relations presse'],
                    'image' => '/uploads/cinema_corporate_film.png'
                ],
                [
                    'num' => '02',
                    'slug' => 'spot-publicitaire',
                    'title' => 'Spot Publicitaire & Brand Films',
                    'tagline' => 'Campagnes TV, cinéma et activations digitales',
                    'desc' => 'Des créations percutantes pensées pour marquer les esprits en quelques secondes. Direction artistique soignée, casting sur-mesure et sound design immersif.',
                    'deliverables' => ['Spots TV & Cinéma 4K/8K', 'Campagnes social media 9:16', 'Films manifestes de marque', 'Déclinaisons publicitaires digitales'],
                    'image' => '/uploads/studio_commercial_spot.png'
                ],
                [
                    'num' => '03',
                    'slug' => 'production-evenementielle',
                    'title' => 'Captation & Événementiel',
                    'tagline' => 'Régie live multi-caméras & aftermovies de prestige',
                    'desc' => 'Immortalisez vos sommets internationaux, lancements de produits et conventions avec une régie de direct fluide et des aftermovies livrés en un temps record.',
                    'deliverables' => ['Aftermovie officiel dynamique', 'Same-Day Edit pour réseaux sociaux', 'Captation intégrale des keynotes', 'Live streaming sécurisé multi-flux'],
                    'image' => '/uploads/cinema_corporate_film.png'
                ],
                [
                    'num' => '04',
                    'slug' => 'drone-aerien',
                    'title' => 'Prise de Vue Drone & FPV',
                    'tagline' => 'Perspectives aériennes 8K & télépilotes agréés',
                    'desc' => 'Prenez de la hauteur avec des images aériennes d\'exception. Drones cinéma 8K et drones FPV agiles pour survoler des complexes industriels et des paysages grandioses au Maroc.',
                    'deliverables' => ['Plans aériens RAW & ProRes 8K', 'Vols FPV immersifs indoor/outdoor', 'Autorisations de vol CCM & autorités', 'Plans séquences haute vitesse'],
                    'image' => '/uploads/studio_commercial_spot.png'
                ]
            ];
        @endphp

        @foreach($pillars as $idx => $p)
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center {{ $idx % 2 == 1 ? 'lg:flex-row-reverse' : '' }}">
                <div class="lg:col-span-6 space-y-6 {{ $idx % 2 == 1 ? 'lg:order-2' : '' }}">
                    <div class="flex items-center gap-4">
                        <span class="text-3xl font-mono font-black text-[#FF4D42]">{{ $p['num'] }}</span>
                        <span class="h-px w-12 bg-white/20"></span>
                        <span class="text-xs uppercase font-mono tracking-widest text-[#B8BDE0]">{{ $p['tagline'] }}</span>
                    </div>

                    <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-white">
                        {{ $p['title'] }}
                    </h2>

                    <p class="text-[#B8BDE0] text-base font-light leading-relaxed">
                        {{ $p['desc'] }}
                    </p>

                    <div class="space-y-2 pt-2">
                        <span class="text-xs font-mono uppercase text-slate-400 font-bold block">Livrables Clés :</span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-slate-300">
                            @foreach($p['deliverables'] as $del)
                                <div class="flex items-center gap-2">
                                    <i class="bi bi-check2 text-[#FF4D42]"></i>
                                    <span>{{ $del }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-4 flex items-center gap-4">
                        <a href="{{ url('/expertises/' . $p['slug']) }}" class="bg-[#FF4D42] hover:bg-[#E94239] text-white px-7 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all shadow-lg hover:scale-105 flex items-center gap-2">
                            <span>Découvrir l'expertise</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                        <a href="{{ route('portfolio') }}" class="glass-dark hover:bg-white/15 text-white px-6 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all border border-white/10">
                            <span>Voir les films</span>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-6 {{ $idx % 2 == 1 ? 'lg:order-1' : '' }}">
                    <div class="relative aspect-[16/10] rounded-3xl overflow-hidden bg-[#171936] border border-white/10 shadow-2xl group">
                        <img src="{{ $p['image'] }}" alt="{{ $p['title'] }} — SmartFilms Prod Casablanca" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</section>

<!-- CALL TO ACTION ESTIMATOR -->
<section class="py-20 bg-[#101229] border-t border-white/10 text-center">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        <h3 class="text-3xl sm:text-4xl font-black text-white uppercase">UN PROJET AUDIOVISUEL EN VUE ?</h3>
        <p class="text-[#B8BDE0] text-base font-light max-w-xl mx-auto">
            Discutez de vos objectifs avec nos réalisateurs et recevez un chiffrage prévisionnel adapté sous 24h.
        </p>
        <div class="pt-4 flex flex-wrap items-center justify-center gap-4">
            <a href="{{ url('/#estimateur') }}" class="bg-[#FF4D42] hover:bg-[#E94239] text-white px-8 py-4 rounded-full text-xs font-bold uppercase tracking-wider transition-all shadow-xl hover:scale-105">
                Estimer mon projet
            </a>
            <a href="{{ url('/contact') }}" class="glass-dark text-white px-8 py-4 rounded-full text-xs font-bold uppercase tracking-wider transition-all border border-white/20 hover:bg-white/20">
                Nous contacter
            </a>
        </div>
    </div>
</section>
@endsection
