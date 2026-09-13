<!-- CHAPTER 02: SELECTED CLIENTS & TRUST (#F8F6F1 WARM OFF-WHITE) -->
<section id="clients" class="bg-[#F8F6F1] py-16 md:py-24 border-b border-[#2D2658]/10 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Minimalist Section Header -->
        <div class="text-center mb-10">
            <span class="text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#2D2658]/60 block">
                ILS NOUS FONT CONFIANCE
            </span>
        </div>

        @php
            $clientsList = [
                ['name' => 'DELL Technologies', 'file' => 'logo_dell.jpg'],
                ['name' => 'DANONE', 'file' => 'logo_danone.png'],
                ['name' => 'BCP International', 'file' => 'logo_bcp.png'],
                ['name' => 'Tanger Alliance', 'file' => 'logo_tanger_alliance.png'],
                ['name' => 'Ingelec', 'file' => 'logo_ingelec.png'],
                ['name' => 'FlowPipe Plastima', 'file' => 'logo_flowpipe.png'],
                ['name' => 'Loterie Nationale', 'file' => 'logo_loterie_nationale.png'],
                ['name' => 'Or Blanc', 'file' => 'logo_orblanc.png'],
                ['name' => 'Clermont', 'file' => 'logo_clermont.jpg'],
            ];
        @endphp

        <!-- Smooth Infinite Moving Logo Marquee Track -->
        <div class="relative w-full overflow-hidden [mask-image:linear-gradient(to_right,transparent,black_10%,black_90%,transparent)]">
            <div class="client-marquee-track flex items-center gap-6 sm:gap-8 py-2">
                <!-- Set 1 (Original) -->
                @foreach($clientsList as $client)
                    <div class="h-16 w-44 shrink-0 bg-white rounded-2xl border border-[#2D2658]/10 flex items-center justify-center p-3.5 shadow-sm hover:shadow-md hover:border-[#FF5A68]/40 transition-all duration-300 group cursor-pointer">
                        <img src="/uploads/{{ $client['file'] }}" alt="{{ $client['name'] }}" class="max-h-9 max-w-full object-contain grayscale opacity-65 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
                    </div>
                @endforeach
                @foreach($clientsList as $client)
                    <div class="h-16 w-44 shrink-0 bg-white rounded-2xl border border-[#2D2658]/10 flex items-center justify-center p-3.5 shadow-sm hover:shadow-md hover:border-[#FF5A68]/40 transition-all duration-300 group cursor-pointer">
                        <img src="/uploads/{{ $client['file'] }}" alt="{{ $client['name'] }}" class="max-h-9 max-w-full object-contain grayscale opacity-65 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
                    </div>
                @endforeach

                <!-- Set 2 (Duplicate for Seamless Infinite Loop) -->
                @foreach($clientsList as $client)
                    <div class="h-16 w-44 shrink-0 bg-white rounded-2xl border border-[#2D2658]/10 flex items-center justify-center p-3.5 shadow-sm hover:shadow-md hover:border-[#FF5A68]/40 transition-all duration-300 group cursor-pointer">
                        <img src="/uploads/{{ $client['file'] }}" alt="{{ $client['name'] }}" class="max-h-9 max-w-full object-contain grayscale opacity-65 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
                    </div>
                @endforeach
                @foreach($clientsList as $client)
                    <div class="h-16 w-44 shrink-0 bg-white rounded-2xl border border-[#2D2658]/10 flex items-center justify-center p-3.5 shadow-sm hover:shadow-md hover:border-[#FF5A68]/40 transition-all duration-300 group cursor-pointer">
                        <img src="/uploads/{{ $client['file'] }}" alt="{{ $client['name'] }}" class="max-h-9 max-w-full object-contain grayscale opacity-65 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

<style>
    @keyframes smoothClientMarquee {
        0% {
            transform: translate3d(0, 0, 0);
        }
        100% {
            transform: translate3d(-50%, 0, 0);
        }
    }

    .client-marquee-track {
        display: flex;
        width: max-content;
        animation: smoothClientMarquee 32s linear infinite;
        will-change: transform;
    }

    .client-marquee-track:hover {
        animation-play-state: paused;
    }
</style>
