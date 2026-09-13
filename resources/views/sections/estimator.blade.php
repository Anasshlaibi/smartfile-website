<!-- CHAPTER 07: GUIDED PROJECT CONSULTATION & ESTIMATOR (#F8F6F1 WARM OFF-WHITE) -->
<section id="estimateur" class="bg-[#F8F6F1] text-[#252238] py-24 md:py-36 border-b border-[#2D2658]/10 relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header with Masked Text Reveal -->
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="reveal-fade-up text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF5A68] inline-block mb-3">
                07 &bull; CONSULTATION & CHIFFRAGE EN LIGNE
            </span>
            <h2 class="text-4xl sm:text-5xl font-black uppercase tracking-tight text-[#2D2658]">
                <span class="reveal-mask inline-block">
                    <span class="reveal-line inline-block font-black">ESTIMEZ VOTRE</span>
                </span>
                <span class="reveal-mask inline-block">
                    <span class="reveal-line delay-100 font-serif-italic font-normal lowercase text-4xl sm:text-5xl text-[#40376F] inline-block">
                        production
                    </span>
                </span>
            </h2>
            <p class="reveal-fade-up delay-200 text-[#726E8D] text-sm md:text-base font-light mt-3">
                Définissez les contours de votre projet en 6 étapes rapides et recevez une proposition chiffrée sous 24 heures ouvrées.
            </p>
        </div>

        <!-- Consultation Wizard Container -->
        <div class="bg-white rounded-[28px] p-8 md:p-12 border border-[#2D2658]/10 shadow-xl relative reveal-fade-up delay-300">
            
            <!-- Progress Bar -->
            <div class="flex items-center justify-between mb-8 pb-6 border-b border-[#2D2658]/10">
                <div class="flex items-center gap-3">
                    <span id="stepIndicatorNumber" class="w-8 h-8 rounded-full bg-[#2D2658] text-white flex items-center justify-center font-bold text-xs font-mono transition-transform duration-300">1</span>
                    <span id="stepIndicatorTitle" class="text-xs font-bold uppercase tracking-wider text-[#2D2658]">01 — Projet</span>
                </div>
                <div class="text-xs text-[#726E8D] font-mono">Étape <span id="currentStepNum" class="text-[#FF5A68] font-bold">1</span> / 6</div>
            </div>

            <form id="estimatorForm" onsubmit="submitEstimator(event)">
                @csrf

                <!-- Step 1: 01 — Projet -->
                <div id="step-1" class="estimator-step step-in space-y-6">
                    <label class="block text-xs font-mono font-bold uppercase tracking-wider text-[#2D2658]">01 &bull; Quel format audiovisuel souhaitez-vous concevoir ?</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @php
                            $types = [
                                ['val' => 'Brand Film / Manifeste de Marque', 'desc' => 'Film cinématographique de référence pour imposer votre autorité'],
                                ['val' => 'Spot Publicitaire TV & Digital', 'desc' => 'Campagne publicitaire à fort impact pour la télévision et le web'],
                                ['val' => 'Film Corporate & Leadership', 'desc' => 'Présentation d\'infrastructures industrielles, équipes & vision'],
                                ['val' => 'Captation Aérienne & Drone 4K/6K', 'desc' => 'Plans séquences immersifs par drone et FPV partout au Maroc'],
                            ];
                        @endphp
                        @foreach($types as $t)
                            <label class="p-5 rounded-2xl border border-[#2D2658]/10 hover:border-[#FF5A68] cursor-pointer transition-all flex flex-col justify-between bg-[#F8F6F1] has-[:checked]:border-[#FF5A68] has-[:checked]:bg-[#FADDE3]/30 hover:scale-[1.01]">
                                <input type="radio" name="project_type" value="{{ $t['val'] }}" class="hidden" {{ $loop->first ? 'checked' : '' }}>
                                <div>
                                    <h4 class="font-bold text-sm text-[#2D2658] mb-1 uppercase">{{ $t['val'] }}</h4>
                                    <p class="text-xs text-[#726E8D] font-light">{{ $t['desc'] }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Step 2: 02 — Objectif -->
                <div id="step-2" class="estimator-step hidden space-y-6">
                    <label class="block text-xs font-mono font-bold uppercase tracking-wider text-[#2D2658]">02 &bull; Quel est l'objectif prioritaire de cette production ?</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @php
                            $objectives = [
                                ['val' => 'Notoriété & Image de Marque', 'desc' => 'Sublimer l\'autorité et la réputation de l\'entreprise'],
                                ['val' => 'Génération de Leads & Ventes', 'desc' => 'Spot orienté conversion pour campagnes publicitaires'],
                                ['val' => 'Marque Employeur & Recrutement', 'desc' => 'Attirer les meilleurs talents et valoriser la culture d\'entreprise'],
                                ['val' => 'Événement & Sommet VIP', 'desc' => 'Couverture d\'un grand lancement ou congrès international'],
                            ];
                        @endphp
                        @foreach($objectives as $obj)
                            <label class="p-5 rounded-2xl border border-[#2D2658]/10 hover:border-[#FF5A68] cursor-pointer transition-all flex flex-col justify-between bg-[#F8F6F1] has-[:checked]:border-[#FF5A68] has-[:checked]:bg-[#FADDE3]/30 hover:scale-[1.01]">
                                <input type="radio" name="objective" value="{{ $obj['val'] }}" class="hidden" {{ $loop->first ? 'checked' : '' }}>
                                <div>
                                    <h4 class="font-bold text-sm text-[#2D2658] mb-1 uppercase">{{ $obj['val'] }}</h4>
                                    <p class="text-xs text-[#726E8D] font-light">{{ $obj['desc'] }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Step 3: 03 — Formats / livrables -->
                <div id="step-3" class="estimator-step hidden space-y-6">
                    <label class="block text-xs font-mono font-bold uppercase tracking-wider text-[#2D2658]">03 &bull; Quels sont les livrables attendus ?</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @php
                            $formats = [
                                ['val' => 'Film Master 4K Principal (1 à 3 min)', 'desc' => 'Version longue haute fidélité pour site web et présentations'],
                                ['val' => 'Pack Formats Sociaux 9:16 & 1:1', 'desc' => 'Déclinaisons courtes calibrées pour Instagram, LinkedIn et TikTok'],
                                ['val' => 'Interviews & Témoignages Collaborateurs', 'desc' => 'Modules vidéos dédiés aux prises de parole clés'],
                                ['val' => 'Dispositif Complet 360° (Master + Socials)', 'desc' => 'Écosystème global de diffusion multicanal'],
                            ];
                        @endphp
                        @foreach($formats as $f)
                            <label class="p-5 rounded-2xl border border-[#2D2658]/10 hover:border-[#FF5A68] cursor-pointer transition-all flex flex-col justify-between bg-[#F8F6F1] has-[:checked]:border-[#FF5A68] has-[:checked]:bg-[#FADDE3]/30 hover:scale-[1.01]">
                                <input type="radio" name="formats" value="{{ $f['val'] }}" class="hidden" {{ $loop->first ? 'checked' : '' }}>
                                <div>
                                    <h4 class="font-bold text-sm text-[#2D2658] mb-1 uppercase">{{ $f['val'] }}</h4>
                                    <p class="text-xs text-[#726E8D] font-light">{{ $f['desc'] }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Step 4: 04 — Budget -->
                <div id="step-4" class="estimator-step hidden space-y-6">
                    <label class="block text-xs font-mono font-bold uppercase tracking-wider text-[#2D2658]">04 &bull; Quelle est votre enveloppe budgétaire prévisionnelle ?</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @php
                            $budgets = [
                                ['val' => '< 30 000 MAD', 'desc' => 'Tournage compact ou captation ponctuelle'],
                                ['val' => '30 000 à 60 000 MAD', 'desc' => 'Production corporate soignée avec montage et sound design'],
                                ['val' => '60 000 à 120 000 MAD', 'desc' => 'Production cinéma complète, drone, voix-off et étalonnage HDR'],
                                ['val' => '120 000 à 250 000 MAD', 'desc' => 'Dispositif cinéma d\'envergure, casting, drone FPV & diffusion TV'],
                                ['val' => '+ 250 000 MAD', 'desc' => 'Grande campagne 360° nationale et internationale'],
                                ['val' => 'À définir ensemble', 'desc' => 'Selon les préconisations artistiques du studio'],
                            ];
                        @endphp
                        @foreach($budgets as $b)
                            <label class="p-5 rounded-2xl border border-[#2D2658]/10 hover:border-[#FF5A68] cursor-pointer transition-all flex flex-col justify-between bg-[#F8F6F1] has-[:checked]:border-[#FF5A68] has-[:checked]:bg-[#FADDE3]/30 hover:scale-[1.01]">
                                <input type="radio" name="budget_tier" value="{{ $b['val'] }}" class="hidden" {{ $loop->index == 1 ? 'checked' : '' }}>
                                <div>
                                    <h4 class="font-bold text-sm text-[#2D2658] mb-1">{{ $b['val'] }}</h4>
                                    <p class="text-xs text-[#726E8D] font-light">{{ $b['desc'] }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Step 5: 05 — Calendrier -->
                <div id="step-5" class="estimator-step hidden space-y-6">
                    <label class="block text-xs font-mono font-bold uppercase tracking-wider text-[#2D2658]">05 &bull; Quel est votre calendrier de livraison souhaité ?</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @php
                            $timelines = [
                                ['val' => 'Urgent (< 2 semaines)', 'desc' => 'Déploiement accéléré avec régie prioritaire'],
                                ['val' => 'Dans 1 mois', 'desc' => 'Délai standard recommandé pour un projet corporate'],
                                ['val' => 'Dans 2 à 3 mois', 'desc' => 'Idéal pour écriture approfondie et casting'],
                                ['val' => 'Planning flexible / En réflexion', 'desc' => 'Projet en phase de cadrage préliminaire'],
                            ];
                        @endphp
                        @foreach($timelines as $time)
                            <label class="p-5 rounded-2xl border border-[#2D2658]/10 hover:border-[#FF5A68] cursor-pointer transition-all flex flex-col justify-between bg-[#F8F6F1] has-[:checked]:border-[#FF5A68] has-[:checked]:bg-[#FADDE3]/30 hover:scale-[1.01]">
                                <input type="radio" name="timeline" value="{{ $time['val'] }}" class="hidden" {{ $loop->first ? 'checked' : '' }}>
                                <div>
                                    <h4 class="font-bold text-sm text-[#2D2658] mb-1 uppercase">{{ $time['val'] }}</h4>
                                    <p class="text-xs text-[#726E8D] font-light">{{ $time['desc'] }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Step 6: 06 — Contact -->
                <div id="step-6" class="estimator-step hidden space-y-6">
                    <label class="block text-xs font-mono font-bold uppercase tracking-wider text-[#2D2658]">06 &bull; Vos coordonnées pour l'envoi de l'estimation chiffrée</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-mono uppercase text-[#726E8D] mb-1">Nom & Prénom *</label>
                            <input type="text" name="name" required placeholder="Votre nom complet" class="w-full px-4 py-3 bg-[#F8F6F1] border border-[#2D2658]/15 rounded-xl text-sm text-[#252238] focus:outline-none focus:border-[#FF5A68]">
                        </div>
                        <div>
                            <label class="block text-[11px] font-mono uppercase text-[#726E8D] mb-1">Téléphone Direct *</label>
                            <input type="tel" name="phone" required placeholder="06..." class="w-full px-4 py-3 bg-[#F8F6F1] border border-[#2D2658]/15 rounded-xl text-sm text-[#252238] focus:outline-none focus:border-[#FF5A68]">
                        </div>
                        <div>
                            <label class="block text-[11px] font-mono uppercase text-[#726E8D] mb-1">Entreprise / Organisation</label>
                            <input type="text" name="company" placeholder="Nom de la société" class="w-full px-4 py-3 bg-[#F8F6F1] border border-[#2D2658]/15 rounded-xl text-sm text-[#252238] focus:outline-none focus:border-[#FF5A68]">
                        </div>
                        <div>
                            <label class="block text-[11px] font-mono uppercase text-[#726E8D] mb-1">Email Professionnel</label>
                            <input type="email" name="email" placeholder="contact@entreprise.com" class="w-full px-4 py-3 bg-[#F8F6F1] border border-[#2D2658]/15 rounded-xl text-sm text-[#252238] focus:outline-none focus:border-[#FF5A68]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] font-mono uppercase text-[#726E8D] mb-1">Précisions sur le tournage (Optionnel)</label>
                        <textarea name="message" rows="3" placeholder="Lieux envisagés, éléments clés à filmer, références visuelles..." class="w-full px-4 py-3 bg-[#F8F6F1] border border-[#2D2658]/15 rounded-xl text-sm text-[#252238] focus:outline-none focus:border-[#FF5A68]"></textarea>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between items-center pt-8 border-t border-[#2D2658]/10 mt-8">
                    <button type="button" id="prevStepBtn" onclick="changeStep(-1)" class="px-6 py-2.5 rounded-full border border-[#2D2658]/20 text-xs font-mono font-bold uppercase tracking-wider text-[#2D2658] hover:bg-[#F4F2F7] hidden">
                        <i class="bi bi-arrow-left mr-2"></i> Précédent
                    </button>
                    <div></div>
                    <button type="button" id="nextStepBtn" onclick="changeStep(1)" class="bg-[#2D2658] hover:bg-[#40376F] text-white px-8 py-3.5 rounded-full text-xs font-bold uppercase tracking-widest transition-all shadow-md">
                        Suivant <i class="bi bi-arrow-right ml-2"></i>
                    </button>
                    <button type="submit" id="submitStepBtn" class="bg-[#FF5A68] hover:bg-[#E84554] text-white px-10 py-3.5 rounded-full text-xs font-bold uppercase tracking-widest transition-all shadow-xl shadow-rose-500/30 hidden">
                        Recevoir mon chiffrage <i class="bi bi-send ml-2"></i>
                    </button>
                </div>
            </form>

            <!-- Success Box -->
            <div id="estimatorSuccess" class="hidden text-center py-12 space-y-4">
                <div class="w-16 h-16 bg-emerald-500/15 text-emerald-600 rounded-full flex items-center justify-center text-3xl mx-auto border border-emerald-500/30">
                    <i class="bi bi-check2"></i>
                </div>
                <h3 class="text-2xl font-bold text-[#2D2658]">Demande transmise à notre régie</h3>
                <p class="text-[#726E8D] text-sm max-w-md mx-auto font-light">
                    Nous étudions vos paramètres de production et reviendrons vers vous sous 24h ouvrées avec une proposition chiffrée détaillée.
                </p>
                <a href="https://wa.me/{{ $settings['whatsapp'] ?? '212617202345' }}?text={{ urlencode('Bonjour SmartFilms, je viens de soumettre mon estimation sur le site.') }}" target="_blank" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-full text-xs font-bold uppercase tracking-wider shadow-lg">
                    <i class="bi bi-whatsapp"></i> Échanger en direct sur WhatsApp
                </a>
            </div>

        </div>

    </div>
</section>

@push('scripts')
<script>
    let currentStep = 1;
    const totalSteps = 6;
    const stepTitles = [
        '01 — Projet',
        '02 — Objectif',
        '03 — Formats / livrables',
        '04 — Budget',
        '05 — Calendrier',
        '06 — Contact'
    ];

    function changeStep(direction) {
        const newStep = currentStep + direction;
        if (newStep >= 1 && newStep <= totalSteps) {
            const currentEl = document.getElementById('step-' + currentStep);
            const nextEl = document.getElementById('step-' + newStep);

            if (currentEl) {
                currentEl.classList.add('step-out');
                setTimeout(() => {
                    currentEl.classList.add('hidden');
                    currentEl.classList.remove('step-out', 'step-in');

                    currentStep = newStep;
                    if (nextEl) {
                        nextEl.classList.remove('hidden');
                        nextEl.classList.add('step-in');
                    }

                    document.getElementById('currentStepNum').innerText = currentStep;
                    document.getElementById('stepIndicatorNumber').innerText = currentStep;
                    document.getElementById('stepIndicatorTitle').innerText = stepTitles[currentStep - 1];

                    const prevBtn = document.getElementById('prevStepBtn');
                    const nextBtn = document.getElementById('nextStepBtn');
                    const submitBtn = document.getElementById('submitStepBtn');

                    if (currentStep === 1) {
                        prevBtn.classList.add('hidden');
                    } else {
                        prevBtn.classList.remove('hidden');
                    }

                    if (currentStep === totalSteps) {
                        nextBtn.classList.add('hidden');
                        submitBtn.classList.remove('hidden');
                    } else {
                        nextBtn.classList.remove('hidden');
                        submitBtn.classList.add('hidden');
                    }

                    if (window.trackEvent) {
                        window.trackEvent('estimator_step', { step: currentStep, title: stepTitles[currentStep - 1] });
                    }
                }, 180);
            }
        }
    }

    async function submitEstimator(e) {
        e.preventDefault();
        const form = document.getElementById('estimatorForm');
        const formData = new FormData(form);
        const submitBtn = document.getElementById('submitStepBtn');
        submitBtn.disabled = true;
        submitBtn.innerText = 'Transmission en cours...';

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
                document.getElementById('estimatorSuccess').classList.remove('hidden');
                if (window.trackEvent) {
                    window.trackEvent('generate_lead', { form: 'estimator' });
                }
            } else {
                alert('Une erreur est survenue lors de l\'envoi. Veuillez nous contacter au {{ $settings['phone'] ?? '+212 6 17 20 23 45' }}.');
                submitBtn.disabled = false;
                submitBtn.innerText = 'Recevoir mon chiffrage';
            }
        } catch (err) {
            alert('Erreur réseau. Veuillez nous contacter directement par téléphone ou WhatsApp.');
            submitBtn.disabled = false;
            submitBtn.innerText = 'Recevoir mon chiffrage';
        }
    }
</script>
@endpush
