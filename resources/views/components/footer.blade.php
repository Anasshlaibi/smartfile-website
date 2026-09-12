<!-- Chapter 08: Deep Obsidian Studio Footer -->
<footer class="bg-[#080914] text-[#B8BDE0] border-t border-white/10 py-16 text-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
            
            <!-- Col 1: Studio Brand -->
            <div class="space-y-4">
                <a href="{{ route('home') }}">
                    <img src="/uploads/smartfilms_logo.png" alt="SmartFilms Prod Casablanca" class="smartfilms-logo h-10 w-auto" style="height: 40px; max-height: 40px; width: auto;">
                </a>
                <p class="text-[#8D91A8] leading-relaxed text-xs max-w-xs">
                    Maison de production audiovisuelle à Casablanca. Films de marque, spots publicitaires et prises de vues aériennes par drone 8K.
                </p>
                <div class="flex items-center gap-3 pt-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="text-[11px] font-mono uppercase tracking-widest text-slate-400">Studio Ouvert &bull; Casablanca</span>
                </div>
            </div>

            <!-- Col 2: Navigation & Expertises -->
            <div>
                <h4 class="font-bold text-white uppercase tracking-widest text-xs mb-4">EXPERTISES</h4>
                <ul class="space-y-2.5 text-[#8D91A8]">
                    <li><a href="{{ url('/expertises/film-corporate') }}" class="hover:text-white transition-colors">Film Corporate & Institutionnel</a></li>
                    <li><a href="{{ url('/expertises/spot-publicitaire') }}" class="hover:text-white transition-colors">Spot Publicitaire TV & Digital</a></li>
                    <li><a href="{{ url('/expertises/production-evenementielle') }}" class="hover:text-white transition-colors">Captation Événementielle 4K</a></li>
                    <li><a href="{{ url('/expertises/drone-aerien') }}" class="hover:text-white transition-colors">Prise de Vue Drone 8K & FPV</a></li>
                    <li><a href="{{ route('portfolio') }}" class="hover:text-white transition-colors">Filmographie Complète</a></li>
                </ul>
            </div>

            <!-- Col 3: Direct Contact -->
            <div>
                <h4 class="font-bold text-white uppercase tracking-widest text-xs mb-4">STUDIO CASABLANCA</h4>
                <ul class="space-y-2.5 text-[#8D91A8]">
                    <li><i class="bi bi-geo-alt text-[#FF4D42] mr-2"></i> {{ $settings['address'] ?? '130 Bv d\'Anfa, Casablanca' }}</li>
                    <li><i class="bi bi-telephone text-[#FF4D42] mr-2"></i> <a href="tel:{{ str_replace(' ', '', $settings['phone'] ?? '+212617202345') }}" class="hover:text-white">{{ $settings['phone'] ?? '+212 6 17 20 23 45' }}</a></li>
                    <li><i class="bi bi-envelope text-[#FF4D42] mr-2"></i> <a href="mailto:{{ $settings['email'] ?? 'contact@smartfilmsprod.com' }}" class="hover:text-white">{{ $settings['email'] ?? 'contact@smartfilmsprod.com' }}</a></li>
                    <li><i class="bi bi-person-badge text-[#FF4D42] mr-2"></i> <a href="{{ route('team') }}" class="hover:text-white">L'Équipe du Studio</a></li>
                </ul>
            </div>

            <!-- Col 4: Studio Hours & Legal -->
            <div>
                <h4 class="font-bold text-white uppercase tracking-widest text-xs mb-4">HORAIRES DU STUDIO</h4>
                <p class="text-[#8D91A8] leading-relaxed">
                    Lundi au Vendredi<br>
                    09:00 — 19:00 (GMT+1)
                </p>
                <div class="mt-4 pt-4 border-t border-white/10">
                    <a href="https://wa.me/{{ $settings['whatsapp'] ?? '212617202345' }}" target="_blank" class="inline-flex items-center gap-2 text-emerald-400 hover:text-emerald-300 font-mono text-[11px] uppercase tracking-wider">
                        <i class="bi bi-whatsapp"></i> Ligne WhatsApp Directe
                    </a>
                </div>
            </div>
        </div>
        
        <div class="pt-8 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center gap-4 text-slate-500 text-[11px] font-mono">
            <p>© {{ date('Y') }} SmartFilms Prod. Tous droits réservés.</p>
            <p>Casablanca, Maroc &bull; Société de Production Audiovisuelle & Cinématographique</p>
        </div>
    </div>
</footer>
