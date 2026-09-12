@extends('layouts.front')

@section('title', 'Contact & Studio Casablanca | SmartFilms Prod Maroc')
@section('meta_description', 'Contactez SmartFilms Prod, maison de production audiovisuelle au 130 Bv d\'Anfa à Casablanca. Devis sous 24h pour vos films corporate, publicités et tournages drone.')

@section('content')
<!-- CONTACT HERO -->
<section class="pt-40 pb-20 bg-[#080914] text-white relative overflow-hidden border-b border-white/10">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(255,77,66,0.15),rgba(255,255,255,0))]"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-4xl space-y-6">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-[11px] tracking-widest uppercase font-semibold text-[#B8BDE0]">
                <span class="w-2 h-2 rounded-full bg-[#FF4D42]"></span>
                <span>STUDIO CASABLANCA &bull; MAROC</span>
            </div>

            <h1 class="text-4xl sm:text-6xl md:text-7xl font-bold tracking-tight leading-[1.05]">
                <span class="font-serif-italic font-normal block lowercase text-3xl sm:text-5xl md:text-6xl text-[#B8BDE0]">prenons contact pour</span>
                <span class="uppercase font-sans block text-white">LANCER VOTRE PROJET</span>
            </h1>

            <p class="text-[#B8BDE0] text-lg sm:text-xl font-light max-w-2xl leading-relaxed">
                Notre studio vous accueille à Casablanca pour concevoir votre prochain film. Échangez avec un producteur délégué dès aujourd'hui.
            </p>
        </div>
    </div>
</section>

<!-- MAIN CONTACT INFORMATION & STUDIO INTERACTION -->
<section class="py-24 bg-[#080914] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left Contact Info Details (NAP consistency) -->
            <div class="lg:col-span-5 space-y-10">
                <div class="space-y-4">
                    <span class="text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF4D42] block">
                        COORDINÉES DU STUDIO
                    </span>
                    <h2 class="text-3xl font-bold text-white uppercase">SmartFilms Prod</h2>
                    <p class="text-[#B8BDE0] text-sm font-light leading-relaxed">
                        Maison de production cinématographique et audiovisuelle agréée au Maroc.
                    </p>
                </div>

                <div class="space-y-6">
                    <div class="flex items-start gap-4 p-5 rounded-2xl bg-[#171936] border border-white/10">
                        <div class="w-10 h-10 rounded-full bg-[#FF4D42]/20 text-[#FF4D42] flex items-center justify-center shrink-0">
                            <i class="bi bi-geo-alt-fill text-lg"></i>
                        </div>
                        <div>
                            <span class="text-[11px] font-mono uppercase text-slate-400 block mb-1">Siège & Studio</span>
                            <span class="text-sm text-white font-medium block">{{ $settings['address'] }}</span>
                            <span class="text-xs text-[#B8BDE0] mt-1 block">Casablanca 20300, Maroc</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 rounded-2xl bg-[#171936] border border-white/10">
                        <div class="w-10 h-10 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
                            <i class="bi bi-whatsapp text-lg"></i>
                        </div>
                        <div>
                            <span class="text-[11px] font-mono uppercase text-slate-400 block mb-1">Ligne Directe & WhatsApp VIP</span>
                            <a href="https://wa.me/{{ $settings['whatsapp'] }}" target="_blank" class="text-sm text-white font-bold hover:text-[#FF4D42] transition-colors block">
                                {{ $settings['phone'] }}
                            </a>
                            <span class="text-xs text-[#B8BDE0] mt-1 block">Réponse immédiate aux demandes professionnelles</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 rounded-2xl bg-[#171936] border border-white/10">
                        <div class="w-10 h-10 rounded-full bg-indigo-500/20 text-indigo-400 flex items-center justify-center shrink-0">
                            <i class="bi bi-envelope-fill text-lg"></i>
                        </div>
                        <div>
                            <span class="text-[11px] font-mono uppercase text-slate-400 block mb-1">Courrier Électronique</span>
                            <a href="mailto:{{ $settings['email'] }}" class="text-sm text-white font-medium hover:text-[#FF4D42] transition-colors block">
                                {{ $settings['email'] }}
                            </a>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 rounded-2xl bg-[#171936] border border-white/10">
                        <div class="w-10 h-10 rounded-full bg-amber-500/20 text-amber-400 flex items-center justify-center shrink-0">
                            <i class="bi bi-clock-fill text-lg"></i>
                        </div>
                        <div>
                            <span class="text-[11px] font-mono uppercase text-slate-400 block mb-1">Horaires d'Ouverture</span>
                            <span class="text-sm text-white block">Du Lundi au Vendredi : 09h00 – 19h00</span>
                            <span class="text-xs text-[#B8BDE0] mt-1 block">Permanence tournage régie 24/7 sur contrat</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Interactive Form -->
            <div class="lg:col-span-7">
                <div class="bg-[#171936] rounded-3xl p-8 md:p-12 border border-white/10 shadow-2xl space-y-8">
                    <div>
                        <span class="text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF4D42] block mb-2">
                            TRANSMETTEZ VOTRE BRIEF
                        </span>
                        <h3 class="text-2xl font-bold text-white uppercase">Formulaire de Contact Direct</h3>
                        <p class="text-xs text-[#B8BDE0] font-light mt-1">
                            Remplissez les détails essentiels pour que notre équipe de production prépare notre premier rendez-vous.
                        </p>
                    </div>

                    <form id="directContactForm" onsubmit="submitContactForm(event)" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] font-mono uppercase text-slate-400 mb-1">Nom Complet *</label>
                                <input type="text" name="name" required placeholder="Votre nom" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-sm text-white focus:outline-none focus:border-[#FF4D42]">
                            </div>
                            <div>
                                <label class="block text-[11px] font-mono uppercase text-slate-400 mb-1">Téléphone *</label>
                                <input type="tel" name="phone" required placeholder="06..." class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-sm text-white focus:outline-none focus:border-[#FF4D42]">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] font-mono uppercase text-slate-400 mb-1">Entreprise</label>
                                <input type="text" name="company" placeholder="Nom de votre société" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-sm text-white focus:outline-none focus:border-[#FF4D42]">
                            </div>
                            <div>
                                <label class="block text-[11px] font-mono uppercase text-slate-400 mb-1">Email</label>
                                <input type="email" name="email" placeholder="votre@email.com" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-sm text-white focus:outline-none focus:border-[#FF4D42]">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] font-mono uppercase text-slate-400 mb-1">Type de Projet</label>
                            <select name="project_type" class="w-full px-4 py-3 bg-[#101229] border border-white/10 rounded-xl text-sm text-white focus:outline-none focus:border-[#FF4D42]">
                                <option value="Film Corporate & Institutionnel">Film Corporate & Institutionnel</option>
                                <option value="Spot Publicitaire & Commercial">Spot Publicitaire & Commercial</option>
                                <option value="Captation Événementielle & Aftermovie">Captation Événementielle & Aftermovie</option>
                                <option value="Prise de Vue Drone & Aérien 8K">Prise de Vue Drone & Aérien 8K</option>
                                <option value="Autre format sur-mesure">Autre format sur-mesure</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[11px] font-mono uppercase text-slate-400 mb-1">Message / Objectifs du projet</label>
                            <textarea name="message" rows="4" placeholder="Décrivez vos attentes, délais prévisionnels et contraintes de tournage..." class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-sm text-white focus:outline-none focus:border-[#FF4D42]"></textarea>
                        </div>

                        <button type="submit" id="contactSubmitBtn" class="w-full bg-[#FF4D42] hover:bg-[#E94239] text-white py-4 rounded-full text-xs font-bold uppercase tracking-widest transition-all shadow-xl shadow-rose-500/25">
                            Envoyer ma demande <i class="bi bi-send ml-2"></i>
                        </button>
                    </form>

                    <div id="contactSuccessMsg" class="hidden text-center py-8 space-y-3 bg-emerald-500/10 border border-emerald-500/30 rounded-2xl p-6">
                        <i class="bi bi-check-circle-fill text-3xl text-emerald-400"></i>
                        <h4 class="text-lg font-bold text-white">Message bien reçu !</h4>
                        <p class="text-xs text-[#B8BDE0] font-light">Notre équipe de régie vous recontactera dans les plus brefs délais.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- GOOGLE MAPS EMBED SECTION -->
<section class="w-full h-96 bg-[#101229] relative border-t border-white/10">
    <iframe 
        class="w-full h-full border-0 grayscale opacity-80 contrast-125" 
        src="https://maps.google.com/maps?q=130%20Boulevard%20d'Anfa%2C%20Casablanca%2020300&t=&z=15&ie=UTF8&iwloc=&output=embed" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade"
        title="SmartFilms Prod Casablanca Location">
    </iframe>
</section>

@push('scripts')
<script>
async function submitContactForm(e) {
    e.preventDefault();
    const form = document.getElementById('directContactForm');
    const formData = new FormData(form);
    const btn = document.getElementById('contactSubmitBtn');
    btn.disabled = true;
    btn.innerText = 'Envoi en cours...';

    try {
        const response = await fetch('{{ route('inquiry.submit') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
            form.classList.add('hidden');
            document.getElementById('contactSuccessMsg').classList.remove('hidden');
            if (window.trackEvent) {
                window.trackEvent('generate_lead', { form: 'contact_page' });
            }
        } else {
            alert('Une erreur est survenue. Veuillez nous joindre au {{ $settings['phone'] }}.');
            btn.disabled = false;
            btn.innerText = 'Envoyer ma demande';
        }
    } catch (err) {
        alert('Erreur réseau. Veuillez nous contacter via WhatsApp.');
        btn.disabled = false;
        btn.innerText = 'Envoyer ma demande';
    }
}
</script>
@endpush

@endsection
