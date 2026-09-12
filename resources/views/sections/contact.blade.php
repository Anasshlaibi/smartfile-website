<!-- CHAPTER 08: STUDIO CONTACT & CASABLANCA HEADQUARTERS (#080914 OBSIDIAN) -->
<section id="contact" class="bg-[#080914] text-white py-28 md:py-36 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-20">
            <span class="reveal-fade-up text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF4D42] block mb-3">
                08 &bull; PRENDRE CONTACT
            </span>
            <h2 class="text-4xl sm:text-5xl md:text-6xl font-black uppercase tracking-tight text-white">
                <span class="reveal-mask">
                    <span class="reveal-line block">
                        LE STUDIO <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-[#B8BDE0]">casablanca</span>
                    </span>
                </span>
            </h2>
            <p class="reveal-fade-up delay-200 text-[#B8BDE0] text-sm md:text-base font-light mt-3">
                Rencontrons-nous à Casablanca pour concevoir votre prochaine production cinématographique.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
            
            <!-- Left Info Card & Google Map (Slides in from Left) -->
            <div class="lg:col-span-5 bg-[#101229] p-8 md:p-10 rounded-3xl border border-white/10 space-y-6 shadow-xl reveal-left">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 text-[#FF4D42] flex items-center justify-center shrink-0 text-lg">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <div>
                        <h4 class="text-[10px] uppercase font-mono tracking-widest text-slate-400 font-bold mb-1">ADRESSE</h4>
                        <p class="text-white font-semibold text-sm leading-relaxed">
                            {{ $settings['address'] ?? '130 Bv d\'Anfa, 20300 Casablanca, Maroc' }}
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 text-[#FF4D42] flex items-center justify-center shrink-0 text-lg">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <div>
                        <h4 class="text-[10px] uppercase font-mono tracking-widest text-slate-400 font-bold mb-1">TÉLÉPHONE</h4>
                        <a href="tel:{{ str_replace(' ', '', $settings['phone'] ?? '+212617202345') }}" class="text-white font-bold text-base hover:text-[#FF4D42] transition-colors">
                            {{ $settings['phone'] ?? '+212 6 17 20 23 45' }}
                        </a>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 text-[#FF4D42] flex items-center justify-center shrink-0 text-lg">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div>
                        <h4 class="text-[10px] uppercase font-mono tracking-widest text-slate-400 font-bold mb-1">EMAIL</h4>
                        <a href="mailto:{{ $settings['email'] ?? 'contact@smartfilmsprod.com' }}" class="text-white font-semibold text-sm hover:text-[#FF4D42] transition-colors">
                            {{ $settings['email'] ?? 'contact@smartfilmsprod.com' }}
                        </a>
                    </div>
                </div>

                <!-- Google Map Embed -->
                <div class="rounded-2xl overflow-hidden border border-white/10 mt-4">
                    <iframe class="w-full h-44 border-0 grayscale opacity-80 hover:opacity-100 hover:grayscale-0 transition-all duration-500" src="https://maps.google.com/maps?q=Boulevard+d+Anfa+Casablanca&t=&z=14&ie=UTF8&iwloc=&output=embed" loading="lazy" title="Casablanca Studio Map"></iframe>
                </div>
            </div>

            <!-- Right Direct Message Form (Slides in from Right) -->
            <div class="lg:col-span-7 bg-[#101229] p-8 md:p-10 rounded-3xl border border-white/10 shadow-xl reveal-right delay-200">
                <form action="{{ route('inquiry.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[11px] font-mono uppercase tracking-wider text-slate-400 mb-2">Nom & Prénom *</label>
                            <input type="text" name="name" placeholder="Votre nom" required class="w-full px-4 py-3.5 bg-white/5 border border-white/10 rounded-xl text-sm text-white focus:outline-none focus:border-[#FF4D42]">
                        </div>
                        <div>
                            <label class="block text-[11px] font-mono uppercase tracking-wider text-slate-400 mb-2">Téléphone *</label>
                            <input type="tel" name="phone" placeholder="06..." required class="w-full px-4 py-3.5 bg-white/5 border border-white/10 rounded-xl text-sm text-white focus:outline-none focus:border-[#FF4D42]">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[11px] font-mono uppercase tracking-wider text-slate-400 mb-2">Email</label>
                            <input type="email" name="email" placeholder="votre@email.com" class="w-full px-4 py-3.5 bg-white/5 border border-white/10 rounded-xl text-sm text-white focus:outline-none focus:border-[#FF4D42]">
                        </div>
                        <div>
                            <label class="block text-[11px] font-mono uppercase tracking-wider text-slate-400 mb-2">Budget Indicatif</label>
                            <select name="budget_tier" class="w-full px-4 py-3.5 bg-[#171936] border border-white/10 rounded-xl text-sm text-white focus:outline-none focus:border-[#FF4D42]">
                                <option value="Non spécifié">Sélectionner une fourchette</option>
                                <option value="< 20 000 MAD">< 20 000 MAD</option>
                                <option value="20 000 - 50 000 MAD">20 000 - 50 000 MAD</option>
                                <option value="50 000 - 100 000 MAD">50 000 - 100 000 MAD</option>
                                <option value="100 000 - 250 000 MAD">100 000 - 250 000 MAD</option>
                                <option value="250 000 MAD +">250 000 MAD +</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-mono uppercase tracking-wider text-slate-400 mb-2">Message & Vision du projet</label>
                        <textarea name="message" rows="4" placeholder="Parlez-nous de vos objectifs, dates clés et attentes visuelles..." required class="w-full px-4 py-3.5 bg-white/5 border border-white/10 rounded-xl text-sm text-white focus:outline-none focus:border-[#FF4D42]"></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-[#FF4D42] hover:bg-[#E94239] text-white px-9 py-4 rounded-full font-bold uppercase tracking-widest text-xs transition-all shadow-xl shadow-rose-500/20 hover:scale-105 flex items-center gap-2">
                            <span>Transmettre le message</span>
                            <i class="bi bi-send text-xs"></i>
                        </button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</section>
