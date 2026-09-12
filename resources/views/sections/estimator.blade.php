<!-- CHAPTER 07: GUIDED PROJECT CONSULTATION & ESTIMATOR (#101229 / #171936) -->
<section id="estimateur" class="bg-[#101229] text-white py-28 md:py-36 border-t border-white/10 relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header with Masked Text Reveal -->
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="reveal-fade-up text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-[#FF4D42] inline-block mb-3">
                07 &bull; CONSULTATION & CHIFFRAGE
            </span>
            <h2 class="text-4xl sm:text-5xl font-black uppercase tracking-tight text-white">
                <span class="reveal-mask">
                    <span class="reveal-line block">
                        ESTIMEZ VOTRE <span class="font-serif-italic font-normal lowercase text-4xl sm:text-5xl text-[#B8BDE0]">production</span>
                    </span>
                </span>
            </h2>
            <p class="reveal-fade-up delay-200 text-[#B8BDE0] text-sm md:text-base font-light mt-3">
                Définissez les contours de votre projet en quelques clics et recevez une proposition chiffrée sous 24 heures ouvrées.
            </p>
        </div>

        <!-- Consultation Wizard Container -->
        <div class="bg-[#171936] rounded-3xl p-8 md:p-12 border border-white/10 shadow-2xl relative reveal-fade-up delay-300">
            
            <!-- Progress Bar -->
            <div class="flex items-center justify-between mb-8 pb-6 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <span id="stepIndicatorNumber" class="w-8 h-8 rounded-full bg-[#FF4D42] text-white flex items-center justify-center font-bold text-xs font-mono transition-transform duration-300">1</span>
                    <span id="stepIndicatorTitle" class="text-xs font-bold uppercase tracking-wider text-white">Type de Projet</span>
                </div>
                <div class="text-xs text-slate-400 font-mono">Étape <span id="currentStepNum" class="text-[#FF4D42] font-bold">1</span> / 5</div>
            </div>

            <form id="estimatorForm" onsubmit="submitEstimator(event)">
                @csrf

                <!-- Step 1: Type de Projet -->
                <div id="step-1" class="estimator-step step-in space-y-6">
                    <label class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-300">Quel format audiovisuel souhaitez-vous concevoir ?</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @php
                            $types = [
                                ['val' => 'Brand Film / Manifeste de Marque', 'desc' => 'Film cinématographique de référence pour imposer votre identité'],
                                ['val' => 'Spot Publicitaire TV & Digital', 'desc' => 'Campagne publicitaire à fort impact pour la télévision et le web'],
                                ['val' => 'Film Corporate & Leadership', 'desc' => 'Présentation d\'infrastructures industrielles, équipes & vision'],
                                ['val' => 'Captation Aérienne & Drone 8K', 'desc' => 'Plans séquences immersifs par drone et FPV partout au Maroc'],
                            ];
                        @endphp
                        @foreach($types as $t)
                            <label class="p-5 rounded-2xl border border-white/10 hover:border-[#FF4D42] cursor-pointer transition-all flex flex-col justify-between bg-white/5 has-[:checked]:border-[#FF4D42] has-[:checked]:bg-[#FF4D42]/10 hover:scale-[1.01]">
                                <input type="radio" name="project_type" value="{{ $t['val'] }}" class="hidden" {{ $loop->first ? 'checked' : '' }}>
                                <div>
                                    <h4 class="font-bold text-sm text-white mb-1 uppercase">{{ $t['val'] }}</h4>
                                    <p class="text-xs text-[#B8BDE0] font-light">{{ $t['desc'] }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Step 2: Objectif Stratégique -->
                <div id="step-2" class="estimator-step hidden space-y-6">
                    <label class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-300">Quel est l'objectif prioritaire de cette production ?</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @php
                            $objectives = [
                                ['val' => 'Notoriété & Image de Marque', 'desc' => 'Sublimer l\'autorité et la réputation de l\'entreprise'],
                                ['val' => 'Génération de Leads & Ventes', 'desc' => 'Spot orienté conversion pour campagnes payantes'],
                                ['val' => 'Marque Employeur & Recrutement', 'desc' => 'Attirer les meilleurs talents et valoriser la culture d\'entreprise'],
                                ['val' => 'Événement & Sommet VIP', 'desc' => 'Couverture d\'un grand lancement ou conférence internationale'],
                            ];
                        @endphp
                        @foreach($objectives as $obj)
                            <label class="p-5 rounded-2xl border border-white/10 hover:border-[#FF4D42] cursor-pointer transition-all flex flex-col justify-between bg-white/5 has-[:checked]:border-[#FF4D42] has-[:checked]:bg-[#FF4D42]/10 hover:scale-[1.01]">
                                <input type="radio" name="objective" value="{{ $obj['val'] }}" class="hidden" {{ $loop->first ? 'checked' : '' }}>
                                <div>
                                    <h4 class="font-bold text-sm text-white mb-1 uppercase">{{ $obj['val'] }}</h4>
                                    <p class="text-xs text-[#B8BDE0] font-light">{{ $obj['desc'] }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Step 3: Format & Durée -->
                <div id="step-3" class="estimator-step hidden space-y-6">
                    <label class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-300">Quelle est la durée recherchée ?</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @php
                            $durations = [
                                ['val' => 'Format Court (30s à 60s)', 'desc' => 'Idéal pour spot pub digital et formats verticaux 9:16'],
                                ['val' => 'Format Standard (1 à 3 minutes)', 'desc' => 'Le format idéal pour un film corporate ou institutionnel'],
                                ['val' => 'Grand Format / Documentaire (3 à 7 min)', 'desc' => 'Storytelling approfondi, interviews et démonstrations'],
                                ['val' => 'Pack Global Multi-Formats', 'desc' => '1 film master + multiples déclinaisons réseaux sociaux'],
                            ];
                        @endphp
                        @foreach($durations as $d)
                            <label class="p-5 rounded-2xl border border-white/10 hover:border-[#FF4D42] cursor-pointer transition-all flex flex-col justify-between bg-white/5 has-[:checked]:border-[#FF4D42] has-[:checked]:bg-[#FF4D42]/10 hover:scale-[1.01]">
                                <input type="radio" name="timeline" value="{{ $d['val'] }}" class="hidden" {{ $loop->first ? 'checked' : '' }}>
                                <div>
                                    <h4 class="font-bold text-sm text-white mb-1 uppercase">{{ $d['val'] }}</h4>
                                    <p class="text-xs text-[#B8BDE0] font-light">{{ $d['desc'] }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Step 4: Budget Indicatif -->
                <div id="step-4" class="estimator-step hidden space-y-6">
                    <label class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-300">Quelle est votre enveloppe budgétaire prévisionnelle ?</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @php
                            $budgets = [
                                ['val' => '< 20 000 MAD', 'desc' => 'Production compacte ou captation ponctuelle'],
                                ['val' => '20 000 à 50 000 MAD', 'desc' => 'Tournage 4K professionnel avec montage dynamique'],
                                ['val' => '50 000 à 100 000 MAD', 'desc' => 'Production complète, drone 4K, voix-off et mixage pro'],
                                ['val' => '100 000 à 250 000 MAD', 'desc' => 'Dispositif cinéma multi-jours, casting, drone FPV & étalonnage'],
                                ['val' => '250 000 MAD +', 'desc' => 'Grande campagne nationale, équipe cinéma 8K, diffusion 360'],
                                ['val' => 'Je ne sais pas encore', 'desc' => 'À définir ensemble selon les recommandations du studio'],
                            ];
                        @endphp
                        @foreach($budgets as $b)
                            <label class="p-5 rounded-2xl border border-white/10 hover:border-[#FF4D42] cursor-pointer transition-all flex flex-col justify-between bg-white/5 has-[:checked]:border-[#FF4D42] has-[:checked]:bg-[#FF4D42]/10 hover:scale-[1.01]">
                                <input type="radio" name="budget_tier" value="{{ $b['val'] }}" class="hidden" {{ $loop->index == 2 ? 'checked' : '' }}>
                                <div>
                                    <h4 class="font-bold text-sm text-white mb-1">{{ $b['val'] }}</h4>
                                    <p class="text-xs text-[#B8BDE0] font-light">{{ $b['desc'] }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Step 5: Contact & Envoi -->
                <div id="step-5" class="estimator-step hidden space-y-6">
                    <label class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-300">Vos coordonnées pour la transmission du devis</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-mono uppercase text-slate-400 mb-1">Nom Complet *</label>
                            <input type="text" name="name" required placeholder="Votre nom" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-sm text-white focus:outline-none focus:border-[#FF4D42]">
                        </div>
                        <div>
                            <label class="block text-[11px] font-mono uppercase text-slate-400 mb-1">Téléphone *</label>
                            <input type="tel" name="phone" required placeholder="06..." class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-sm text-white focus:outline-none focus:border-[#FF4D42]">
                        </div>
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
                        <label class="block text-[11px] font-mono uppercase text-slate-400 mb-1">Détails ou précisions particulières (Optionnel)</label>
                        <textarea name="message" rows="3" placeholder="Lieu de tournage, délais impératifs, références visuelles..." class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-sm text-white focus:outline-none focus:border-[#FF4D42]"></textarea>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between items-center pt-8 border-t border-white/10 mt-8">
                    <button type="button" id="prevStepBtn" onclick="changeStep(-1)" class="px-6 py-2.5 rounded-full border border-white/20 text-xs font-mono font-bold uppercase tracking-wider text-slate-300 hover:text-white hidden">
                        <i class="bi bi-arrow-left mr-2"></i> Précédent
                    </button>
                    <div></div>
                    <button type="button" id="nextStepBtn" onclick="changeStep(1)" class="bg-[#FF4D42] hover:bg-[#E94239] text-white px-8 py-3.5 rounded-full text-xs font-bold uppercase tracking-widest transition-all shadow-xl shadow-rose-500/25">
                        Suivant <i class="bi bi-arrow-right ml-2"></i>
                    </button>
                    <button type="submit" id="submitStepBtn" class="bg-[#FF4D42] hover:bg-[#E94239] text-white px-10 py-3.5 rounded-full text-xs font-bold uppercase tracking-widest transition-all shadow-xl shadow-rose-500/30 hidden">
                        Recevoir mon chiffrage <i class="bi bi-send ml-2"></i>
                    </button>
                </div>
            </form>

            <!-- Success Box -->
            <div id="estimatorSuccess" class="hidden text-center py-12 space-y-4">
                <div class="w-16 h-16 bg-emerald-500/20 text-emerald-400 rounded-full flex items-center justify-center text-3xl mx-auto border border-emerald-500/40">
                    <i class="bi bi-check2"></i>
                </div>
                <h3 class="text-2xl font-bold text-white">Demande transmise à notre régie</h3>
                <p class="text-[#B8BDE0] text-sm max-w-md mx-auto font-light">
                    Nous étudions vos paramètres de tournage et reviendrons vers vous sous 24h ouvrées avec une proposition détaillée.
                </p>
                <a href="https://wa.me/{{ $settings['whatsapp'] ?? '212617202345' }}?text={{ urlencode('Bonjour SmartFilms, je viens d\'envoyer une demande d\'estimation.') }}" target="_blank" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-full text-xs font-bold uppercase tracking-wider shadow-lg">
                    <i class="bi bi-whatsapp"></i> Échanger en direct sur WhatsApp
                </a>
            </div>

        </div>

    </div>
</section>

@push('scripts')
<script>
    let currentStep = 1;
    const totalSteps = 5;
    const stepTitles = ['Type de Projet', 'Objectif Stratégique', 'Durée & Format', 'Enveloppe Budgétaire', 'Coordonnées & Envoi'];

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
        submitBtn.innerText = 'Transmission...';

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
