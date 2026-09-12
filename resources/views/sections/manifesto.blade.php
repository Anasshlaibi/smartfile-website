<!-- CHAPTER 05: NARRATIVE MANIFESTO & PROCESS TRANSITION (#101229 CINEMATIC NAVY) -->
<section id="manifeste" class="bg-[#101229] text-white py-28 md:py-36 relative overflow-hidden border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Top Editorial Quote with Staggered Lines -->
        <div class="max-w-4xl mx-auto text-center space-y-8 mb-24">
            <span class="reveal-fade-up text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF4D42] inline-block">
                05 &bull; LE MANIFESTE
            </span>
            <h2 class="text-3xl sm:text-5xl md:text-6xl font-normal leading-tight">
                <span class="reveal-mask">
                    <span class="reveal-line font-serif-italic lowercase block text-4xl sm:text-6xl text-[#B8BDE0] mb-2">
                        à l'ère de la saturation visuelle,
                    </span>
                </span>
                <span class="reveal-mask">
                    <span class="reveal-line delay-100 font-black uppercase tracking-tight block">
                        NOUS CHOISISSONS L'EXIGENCE.
                    </span>
                </span>
            </h2>
            <p class="reveal-fade-up delay-200 text-[#B8BDE0] text-base md:text-lg font-light leading-relaxed max-w-2xl mx-auto">
                Chaque image que nous tournons répond à un impératif précis : captiver en quelques secondes, asseoir votre autorité et susciter une émotion durable.
            </p>
        </div>

        <!-- 4-Step Creative Process with Progressive Reveal -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
                $processSteps = [
                    ['step' => '01', 'title' => 'Direction Artistique', 'desc' => 'Scénarisation, note d\'intention visuelle, repérages de lieux et storyboarding précis.'],
                    ['step' => '02', 'title' => 'Tournage Cinéma', 'desc' => 'Équipes dédiées, optiques cinéma haut de gamme, éclairage studio et captations aériennes par drone.'],
                    ['step' => '03', 'title' => 'Post-Production', 'desc' => 'Montage dynamique, étalonnage DaVinci Studio, mixage sonore broadcast et sound design.'],
                    ['step' => '04', 'title' => 'Livraison Multi-Formats', 'desc' => 'Exports master 4K pour écrans géants et déclinaisons verticales 9:16 pour réseaux sociaux.'],
                ];
            @endphp

            @foreach($processSteps as $idx => $p)
                <div class="p-8 rounded-3xl bg-[#171936] border border-white/10 space-y-4 reveal-fade-up delay-{{ ($idx + 1) * 100 }} hover:border-[#FF4D42]/40 transition-colors">
                    <span class="text-3xl font-mono font-black text-[#FF4D42] block">{{ $p['step'] }}</span>
                    <h3 class="text-lg font-bold text-white uppercase tracking-wider">{{ $p['title'] }}</h3>
                    <p class="text-[#B8BDE0] text-xs font-light leading-relaxed">{{ $p['desc'] }}</p>
                </div>
            @endforeach
        </div>

    </div>
</section>
