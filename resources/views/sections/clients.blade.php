<!-- CHAPTER 02: SELECTED CLIENTS (#F7F6F3 WARM OFF-WHITE) -->
<section id="clients" class="bg-[#F7F6F3] py-20 md:py-28 border-y border-slate-200/60 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Minimalist Section Header -->
        <div class="text-center mb-12">
            <span class="text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#8D91A8] block">
                ILS NOUS FONT CONFIANCE
            </span>
        </div>

        <!-- Clean Monochrome Infinite Logo Track (No heavy cards, elegant opacity) -->
        <div class="relative w-full overflow-hidden">
            <div class="animate-marquee flex items-center gap-16 py-4">
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

                @for($i = 0; $i < 3; $i++)
                    @foreach($clientsList as $client)
                        <div class="h-14 w-40 shrink-0 flex items-center justify-center grayscale opacity-60 hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer">
                            <img src="/uploads/{{ $client['file'] }}" alt="{{ $client['name'] }}" class="max-h-10 max-w-full object-contain">
                        </div>
                    @endforeach
                @endfor
            </div>
        </div>

    </div>
</section>
