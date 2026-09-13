<!-- CHAPTER 08: STUDIO CONTACT & CASABLANCA HEADQUARTERS (#F8F6F1 WARM OFF-WHITE) -->
<section id="contact" class="bg-[#F8F6F1] text-[#252238] py-24 md:py-36 border-b border-[#2D2658]/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="reveal-fade-up text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF5A68] block mb-3">
                08 &bull; PRENDRE CONTACT
            </span>
            <h2 class="text-4xl sm:text-5xl md:text-6xl font-black uppercase tracking-tight text-[#2D2658]">
                <span class="reveal-mask">
                    <span class="reveal-line block">
                        LE STUDIO <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl md:text-6xl text-[#40376F]">casablanca</span>
                    </span>
                </span>
            </h2>
            <p class="reveal-fade-up delay-200 text-[#726E8D] text-sm md:text-base font-light mt-3">
                Rencontrons-nous à Casablanca pour concevoir votre prochaine production cinématographique.
            </p>
        </div>

        <!-- Split Editorial Card Container with Brand Gradient (Left) and Crisp White Form (Right) -->
        <div class="bg-white rounded-[30px] border border-[#2D2658]/10 shadow-xl overflow-hidden grid grid-cols-1 lg:grid-cols-12 items-stretch">
            
            <!-- Left Info Panel with Signature Purple-to-Coral Gradient -->
            <div class="lg:col-span-5 p-8 sm:p-10 md:p-12 text-white flex flex-col justify-between space-y-8" style="background: linear-gradient(135deg, #2D2658 0%, #3B306B 55%, #FF5A68 100%);">
                <div class="space-y-6">
                    <div>
                        <span class="text-[10px] font-mono uppercase tracking-widest text-[#FADDE3] font-bold block mb-1">CONTACT</span>
                        <h3 class="text-2xl sm:text-3xl font-normal leading-tight">
                            <span class="font-serif-italic block lowercase">contactez</span>
                            <span class="font-black uppercase tracking-tight">SMART FILMS</span>
                        </h3>
                        <p class="text-[#FADDE3] text-xs sm:text-sm font-light mt-2 leading-relaxed">
                            Parlons de votre projet. Notre équipe est là pour vous accompagner et donner vie à vos idées.
                        </p>
                    </div>

                    <div class="space-y-4 pt-2">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-white/10 text-white flex items-center justify-center shrink-0 text-base">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div>
                                <h4 class="text-[10px] uppercase font-mono tracking-widest text-[#FADDE3] font-bold mb-0.5">ADRESSE</h4>
                                <p class="text-white text-xs sm:text-sm font-medium leading-relaxed">
                                    {{ $settings['address'] ?? '130 Bv d\'Anfa, 20300 Casablanca, Maroc' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-white/10 text-white flex items-center justify-center shrink-0 text-base">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div>
                                <h4 class="text-[10px] uppercase font-mono tracking-widest text-[#FADDE3] font-bold mb-0.5">TÉLÉPHONE</h4>
                                <a href="tel:{{ str_replace(' ', '', $settings['phone'] ?? '+212617202345') }}" class="text-white font-bold text-sm sm:text-base hover:text-[#FADDE3] transition-colors">
                                    {{ $settings['phone'] ?? '+212 6 17 20 23 45' }}
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-white/10 text-white flex items-center justify-center shrink-0 text-base">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div>
                                <h4 class="text-[10px] uppercase font-mono tracking-widest text-[#FADDE3] font-bold mb-0.5">EMAIL</h4>
                                <a href="mailto:{{ $settings['email'] ?? 'contact@smartfilmsprod.com' }}" class="text-white text-xs sm:text-sm hover:text-[#FADDE3] transition-colors">
                                    {{ $settings['email'] ?? 'contact@smartfilmsprod.com' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Google Map Embed -->
                <div class="rounded-2xl overflow-hidden border border-white/20 shadow-md">
                    <iframe class="w-full h-36 border-0 opacity-90 hover:opacity-100 transition-opacity" src="https://maps.google.com/maps?q=Boulevard+d+Anfa+Casablanca&t=&z=14&ie=UTF8&iwloc=&output=embed" loading="lazy" title="Casablanca Studio Map"></iframe>
                </div>
            </div>

            <!-- Right Direct Message Form -->
            <div class="lg:col-span-7 p-8 sm:p-10 md:p-12 bg-white flex flex-col justify-center">
                <form action="{{ route('inquiry.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[11px] font-mono uppercase tracking-wider text-[#726E8D] mb-2">Nom & Prénom *</label>
                            <input type="text" name="name" placeholder="Votre nom" required class="w-full px-4 py-3.5 bg-[#F8F6F1] border border-[#2D2658]/15 rounded-xl text-sm text-[#252238] focus:outline-none focus:border-[#FF5A68]">
                        </div>
                        <div>
                            <label class="block text-[11px] font-mono uppercase tracking-wider text-[#726E8D] mb-2">Téléphone *</label>
                            <input type="tel" name="phone" placeholder="06..." required class="w-full px-4 py-3.5 bg-[#F8F6F1] border border-[#2D2658]/15 rounded-xl text-sm text-[#252238] focus:outline-none focus:border-[#FF5A68]">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[11px] font-mono uppercase tracking-wider text-[#726E8D] mb-2">Email</label>
                            <input type="email" name="email" placeholder="votre@email.com" class="w-full px-4 py-3.5 bg-[#F8F6F1] border border-[#2D2658]/15 rounded-xl text-sm text-[#252238] focus:outline-none focus:border-[#FF5A68]">
                        </div>
                        <div>
                            <label class="block text-[11px] font-mono uppercase tracking-wider text-[#726E8D] mb-2">Type de projet</label>
                            <select name="budget_tier" class="w-full px-4 py-3.5 bg-[#F8F6F1] border border-[#2D2658]/15 rounded-xl text-sm text-[#252238] focus:outline-none focus:border-[#FF5A68]">
                                <option value="Non spécifié">Sélectionner un type de projet</option>
                                <option value="Film Corporate & Institutionnel">Film Corporate & Institutionnel</option>
                                <option value="Spot Publicitaire TV & Digital">Spot Publicitaire TV & Digital</option>
                                <option value="Contenus Sociaux & Reels">Contenus Sociaux & Reels</option>
                                <option value="Captation Événementielle">Captation Événementielle</option>
                                <option value="Prises de Vues par Drone">Prises de Vues par Drone</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-mono uppercase tracking-wider text-[#726E8D] mb-2">Message & Vision du projet</label>
                        <textarea name="message" rows="4" placeholder="Parlez-nous de vos objectifs, dates clés et attentes visuelles..." required class="w-full px-4 py-3.5 bg-[#F8F6F1] border border-[#2D2658]/15 rounded-xl text-sm text-[#252238] focus:outline-none focus:border-[#FF5A68]"></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-[#FF5A68] hover:bg-[#E84554] text-white px-9 py-4 rounded-full font-bold uppercase tracking-widest text-xs transition-all shadow-lg shadow-rose-500/20 hover:scale-105 flex items-center gap-2">
                            <span>Envoyer le message</span>
                            <i class="bi bi-arrow-right text-xs"></i>
                        </button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</section>
