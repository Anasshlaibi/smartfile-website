<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visual Builder Studio - {{ $page->title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,500;1,700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Outfit', sans-serif; background-color: #0f172a; color: #f8fafc; }
        .sidebar-tab.active { border-bottom: 2px solid #3b82f6; color: #3b82f6; font-weight: 600; }
        .tab-pane { display: none; }
        .tab-pane.active { display: block; }
        
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #334155; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #475569; }
    </style>
</head>
<body class="h-screen flex flex-col overflow-hidden bg-slate-950 text-slate-100">

    <!-- Top Navigation Bar -->
    <header class="h-16 bg-slate-900 border-b border-slate-800 px-6 flex items-center justify-between shrink-0 z-30">
        <div class="flex items-center gap-4">
            <a href="{{ route('pages.index') }}" class="w-9 h-9 rounded-xl bg-slate-800 hover:bg-slate-700 flex items-center justify-center text-slate-300 transition-colors">
                <i class="bi bi-arrow-left text-lg"></i>
            </a>
            <div>
                <h1 class="font-bold text-base text-white flex items-center gap-2">
                    Visual Builder Studio
                    <span class="text-xs font-normal text-slate-400 border border-slate-700 px-2 py-0.5 rounded-full">/{{ $page->slug }}</span>
                </h1>
                <p class="text-xs text-slate-400">{{ $page->title }}</p>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <a href="/{{ $page->slug == 'accueil' ? '' : $page->slug }}" target="_blank" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-xl text-xs font-semibold flex items-center gap-2 transition-colors">
                <i class="bi bi-box-arrow-up-right"></i> View Live
            </a>
            <button id="save-btn" onclick="savePage()" class="px-6 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-xl text-xs font-bold flex items-center gap-2 transition-all shadow-lg shadow-blue-600/20">
                <i class="bi bi-cloud-check text-sm"></i> Save Page
            </button>
        </div>
    </header>

    <!-- Main Workspace Layout -->
    <div class="flex-1 flex overflow-hidden">

        <!-- Left Sidebar: Controls & Inspector -->
        <aside class="w-96 bg-slate-900 border-r border-slate-800 flex flex-col shrink-0 z-20">
            <!-- Sidebar Tabs -->
            <div class="flex border-b border-slate-800 bg-slate-900/50 text-xs font-medium">
                <button id="tab-btn-structure" onclick="switchTab('structure')" class="sidebar-tab active flex-1 py-3.5 text-center text-slate-400 hover:text-white transition-colors">
                    <i class="bi bi-layers me-1.5"></i> Page Structure
                </button>
                <button id="tab-btn-inspector" onclick="switchTab('inspector')" class="sidebar-tab flex-1 py-3.5 text-center text-slate-400 hover:text-white transition-colors">
                    <i class="bi bi-sliders me-1.5"></i> Edit Block
                </button>
            </div>

            <!-- Tab 1: Structure & Add Sections -->
            <div id="tab-structure" class="tab-pane active flex-1 overflow-y-auto p-4 space-y-4">
                <button onclick="openAddModal()" class="w-full py-3 px-4 border-2 border-dashed border-slate-700 hover:border-blue-500 rounded-2xl text-blue-400 hover:text-blue-300 text-xs font-bold flex items-center justify-center gap-2 transition-all bg-slate-800/30 hover:bg-blue-500/5">
                    <i class="bi bi-plus-circle text-base"></i> Add New Section
                </button>

                <div class="space-y-1">
                    <div class="flex justify-between items-center px-1 mb-2">
                        <span class="text-[10px] uppercase font-bold tracking-widest text-slate-400">Page Blocks List</span>
                        <span id="block-count" class="text-[10px] bg-slate-800 text-slate-400 px-2 py-0.5 rounded-full">0 blocks</span>
                    </div>
                    <div id="sections-list" class="space-y-2">
                        <!-- Rendered by JS -->
                    </div>
                </div>
            </div>

            <!-- Tab 2: Inspector / Block Editor -->
            <div id="tab-inspector" class="tab-pane flex-1 overflow-y-auto p-4">
                <div id="inspector-content">
                    <div class="h-full flex flex-col items-center justify-center text-slate-500 py-16 text-center">
                        <i class="bi bi-hand-index-thumb text-4xl mb-3 text-slate-600"></i>
                        <p class="text-xs font-medium">Select a section block from the structure list to edit its properties.</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Right Main Pane: Live Preview Canvas -->
        <main class="flex-1 bg-slate-950 flex flex-col overflow-hidden relative">
            <div class="bg-slate-900/60 border-b border-slate-800/80 px-4 py-2.5 flex items-center justify-between text-xs text-slate-400 shrink-0">
                <div class="flex items-center gap-2 font-mono text-[11px]">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Live Preview Engine</span>
                </div>
                <div class="flex items-center gap-2">
                    <button onclick="setCanvasWidth('100%')" class="px-2.5 py-1 rounded bg-slate-800 hover:bg-slate-700 text-slate-300">Desktop</button>
                    <button onclick="setCanvasWidth('768px')" class="px-2.5 py-1 rounded bg-slate-800 hover:bg-slate-700 text-slate-300">Tablet</button>
                    <button onclick="setCanvasWidth('390px')" class="px-2.5 py-1 rounded bg-slate-800 hover:bg-slate-700 text-slate-300">Mobile</button>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto p-4 md:p-8 flex justify-center bg-slate-950/80">
                <div id="canvas-container" class="w-full transition-all duration-300 bg-[#F8F9FC] rounded-2xl border border-slate-800 shadow-2xl overflow-hidden min-h-[85vh]">
                    <iframe id="live-iframe" class="w-full h-full min-h-[85vh] border-0" src="about:blank"></iframe>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal: Add New Section Block -->
    <div id="addModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-slate-900 border border-slate-800 rounded-3xl w-full max-w-4xl max-h-[85vh] flex flex-col shadow-2xl overflow-hidden">
            <div class="p-6 border-b border-slate-800 flex justify-between items-center">
                <div>
                    <h3 class="font-bold text-lg text-white">Add New Block Section</h3>
                    <p class="text-xs text-slate-400">Choose a pre-built section block template for your page</p>
                </div>
                <button onclick="closeAddModal()" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white flex items-center justify-center">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <div class="p-6 overflow-y-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4" id="templates-grid">
                <!-- Loaded by JS -->
            </div>
        </div>
    </div>

    <script>
        window.builderData = @json($page->content ?? []);
        if (!Array.isArray(window.builderData)) window.builderData = [];
        window.activeSectionId = null;

        // Rembrand Corporate Templates Registry
        const sectionTemplates = {
            'rembrand_hero': {
                name: 'Rembrand Hero Video Loop',
                category: 'Corporate Agency',
                icon: 'bi-film',
                defaultProps: {
                    subtitle: 'AGENCE DE PRODUCTION AUDIOVISUELLE & CONTENUS DE MARQUE',
                    prefixText: 'agence de',
                    title: 'PRODUCTION AUDIOVISUELLE',
                    description: 'Nous créons des récits cinématographiques à fort impact pour sublimer l\'image de votre entreprise.',
                    btnText: 'DÉCOUVRIR NOS OFFRES',
                    btnLink: '#offres',
                    videoUrl: 'https://drive.google.com/file/d/1J-9rCFYEvV598hW3GyBmZE9i1aXMrpRj/preview',
                    bgColor: '#F8F9FC',
                    paddingTop: '80',
                    paddingBottom: '80'
                }
            },
            'rembrand_client_logos': {
                name: 'Client Trust Logos Banner',
                category: 'Corporate Agency',
                icon: 'bi-award',
                defaultProps: {
                    title: 'ILS NOUS FONT CONFIANCE',
                    bgColor: '#F8F9FC',
                    paddingTop: '40',
                    paddingBottom: '40'
                }
            },
            'rembrand_offres': {
                name: 'Nos Offres / Services (Deep Navy)',
                category: 'Corporate Agency',
                icon: 'bi-grid-2x2',
                defaultProps: {
                    subtitle: 'Des solutions sur-mesure de communication et de production cinématographique.',
                    bgColor: '#1E2046',
                    paddingTop: '80',
                    paddingBottom: '80'
                }
            },
            'rembrand_mission': {
                name: 'Notre Mission & Chiffres',
                category: 'Corporate Agency',
                icon: 'bi-rocket-takeoff',
                defaultProps: {
                    text: 'Les entreprises d\'aujourd\'hui ont besoin d\'histoires fortes. Chez SmartFilms Prod, nous combinons la rigueur technique du cinéma avec une compréhension stratégique des enjeux de votre marque.',
                    bgColor: '#F8F9FC',
                    paddingTop: '80',
                    paddingBottom: '80'
                }
            },
            'rembrand_contact': {
                name: 'Contact & Formulaire Casablanca',
                category: 'Corporate Agency',
                icon: 'bi-envelope-at',
                defaultProps: {
                    bgColor: '#F8F9FC',
                    paddingTop: '80',
                    paddingBottom: '80'
                }
            },
            'rembrand_faq': {
                name: 'Questions Fréquentes (Accordion)',
                category: 'Corporate Agency',
                icon: 'bi-question-circle',
                defaultProps: {
                    bgColor: '#1E2046',
                    paddingTop: '80',
                    paddingBottom: '80'
                }
            },
            'genesis_hero': {
                name: 'Genesis Cinema Hero Header',
                category: 'Cinematic Studio',
                icon: 'bi-camera-video',
                defaultProps: {
                    subtitle: 'CASABLANCA CINEMA PRODUCTION STUDIO',
                    title: "GENESIS®\nWE MAKE VIDEOS",
                    btnText: 'DISCOVER OUR WORK',
                    btnLink: '#showcase',
                    videoUrl: 'https://player.vimeo.com/video/1198491731?background=1&autoplay=1',
                    bgColor: '#050505',
                    paddingTop: '40',
                    paddingBottom: '40'
                }
            }
        };

        document.addEventListener('DOMContentLoaded', function() {
            renderSidebar();
            renderLivePreview();
            if (window.builderData.length > 0) {
                selectSection(window.builderData[0].id);
            }
            populateModalTemplates();
        });

        function switchTab(tabName) {
            document.querySelectorAll('.sidebar-tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
            document.getElementById('tab-btn-' + tabName).classList.add('active');
            document.getElementById('tab-' + tabName).classList.add('active');
        }

        function setCanvasWidth(w) {
            document.getElementById('canvas-container').style.maxWidth = w;
        }

        function populateModalTemplates() {
            const grid = document.getElementById('templates-grid');
            let html = '';
            for (const [type, tmpl] of Object.entries(sectionTemplates)) {
                html += `
                    <div onclick="addSection('${type}')" class="p-5 rounded-2xl bg-slate-800/60 border border-slate-700 hover:border-blue-500 hover:bg-slate-800 transition-all cursor-pointer group flex flex-col justify-between">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-xl bg-blue-500/10 text-blue-400 flex items-center justify-center text-lg group-hover:scale-110 transition-transform">
                                <i class="bi ${tmpl.icon}"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-white group-hover:text-blue-400 transition-colors">${tmpl.name}</h4>
                                <span class="text-[10px] text-slate-400 uppercase font-mono">${tmpl.category}</span>
                            </div>
                        </div>
                        <span class="text-xs text-blue-400 font-semibold flex items-center gap-1 mt-2">
                            <i class="bi bi-plus-lg"></i> Add Block
                        </span>
                    </div>
                `;
            }
            grid.innerHTML = html;
        }

        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
        }

        function addSection(type) {
            closeAddModal();
            const tmpl = sectionTemplates[type] || { defaultProps: {} };
            const newId = 'sec_' + Date.now();
            const newSec = {
                id: newId,
                type: type,
                props: JSON.parse(JSON.stringify(tmpl.defaultProps))
            };
            window.builderData.push(newSec);
            renderSidebar();
            selectSection(newId);
            renderLivePreview();
        }

        function removeSection(id) {
            if (confirm('Are you sure you want to remove this section?')) {
                window.builderData = window.builderData.filter(s => s.id !== id);
                if (window.activeSectionId === id) window.activeSectionId = null;
                renderSidebar();
                renderInspector();
                renderLivePreview();
            }
        }

        function moveSection(id, dir) {
            const idx = window.builderData.findIndex(s => s.id === id);
            if (idx < 0) return;
            const targetIdx = idx + dir;
            if (targetIdx < 0 || targetIdx >= window.builderData.length) return;
            
            const temp = window.builderData[idx];
            window.builderData[idx] = window.builderData[targetIdx];
            window.builderData[targetIdx] = temp;

            renderSidebar();
            renderLivePreview();
        }

        function selectSection(id) {
            window.activeSectionId = id;
            document.querySelectorAll('.section-item').forEach(el => {
                el.classList.remove('border-blue-500', 'bg-blue-500/10');
            });
            const item = document.getElementById('item-' + id);
            if (item) item.classList.add('border-blue-500', 'bg-blue-500/10');

            renderInspector();
            switchTab('inspector');
        }

        function renderSidebar() {
            const list = document.getElementById('sections-list');
            document.getElementById('block-count').innerText = window.builderData.length + ' blocks';

            if (window.builderData.length === 0) {
                list.innerHTML = `
                    <div class="p-6 text-center text-slate-500 border border-slate-800 rounded-2xl bg-slate-900/40">
                        <i class="bi bi-layers text-3xl mb-2 text-slate-600 block"></i>
                        <p class="text-xs">No sections added yet.</p>
                    </div>
                `;
                return;
            }

            let html = '';
            window.builderData.forEach((sec, idx) => {
                const tmpl = sectionTemplates[sec.type] || { name: sec.type, icon: 'bi-box' };
                const isActive = sec.id === window.activeSectionId;
                html += `
                    <div id="item-${sec.id}" onclick="selectSection('${sec.id}')" class="section-item p-3.5 rounded-xl border ${isActive ? 'border-blue-500 bg-blue-500/10' : 'border-slate-800 bg-slate-900/60'} hover:border-slate-700 transition-all cursor-pointer flex items-center justify-between group">
                        <div class="flex items-center gap-3 overflow-hidden">
                            <span class="w-6 h-6 rounded-lg bg-slate-800 text-slate-400 flex items-center justify-center text-xs font-mono shrink-0">${idx + 1}</span>
                            <div class="truncate">
                                <h5 class="text-xs font-bold text-slate-200 truncate">${tmpl.name}</h5>
                                <span class="text-[10px] text-slate-500 font-mono">${sec.type}</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 opacity-80 group-hover:opacity-100 shrink-0" onclick="event.stopPropagation()">
                            <button onclick="moveSection('${sec.id}', -1)" class="w-7 h-7 rounded bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center text-xs" title="Move Up"><i class="bi bi-chevron-up"></i></button>
                            <button onclick="moveSection('${sec.id}', 1)" class="w-7 h-7 rounded bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center text-xs" title="Move Down"><i class="bi bi-chevron-down"></i></button>
                            <button onclick="removeSection('${sec.id}')" class="w-7 h-7 rounded bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 flex items-center justify-center text-xs ml-1" title="Delete"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                `;
            });
            list.innerHTML = html;
        }

        function renderInspector() {
            const container = document.getElementById('inspector-content');
            if (!window.activeSectionId) {
                container.innerHTML = `
                    <div class="h-full flex flex-col items-center justify-center text-slate-500 py-16 text-center">
                        <i class="bi bi-hand-index-thumb text-4xl mb-3 text-slate-600"></i>
                        <p class="text-xs font-medium">Select a section block from the structure list to edit its properties.</p>
                    </div>
                `;
                return;
            }

            const sec = window.builderData.find(s => s.id === window.activeSectionId);
            if (!sec) return;

            const tmpl = sectionTemplates[sec.type] || { name: sec.type };

            let html = `
                <div class="space-y-5">
                    <div class="pb-3 border-b border-slate-800 flex justify-between items-center">
                        <div>
                            <h4 class="font-bold text-sm text-white">${tmpl.name}</h4>
                            <span class="text-[10px] text-slate-500 font-mono">ID: ${sec.id}</span>
                        </div>
                        <span class="text-[10px] bg-blue-500/10 text-blue-400 border border-blue-500/20 px-2 py-0.5 rounded-full font-mono">${sec.type}</span>
                    </div>
                    <div class="space-y-4">
            `;

            for (const [key, val] of Object.entries(sec.props || {})) {
                const label = key.replace(/([A-Z])/g, ' $1').replace(/^./, str => str.toUpperCase());
                const keyLower = key.toLowerCase();
                const isMediaField = keyLower.includes('video') || keyLower.includes('image') || keyLower.includes('logo') || keyLower.includes('bg') || keyLower.includes('url');
                const isTextArea = typeof val === 'string' && (val.length > 60 || key === 'text' || key === 'description' || key === 'content');

                html += `<div class="space-y-1.5">
                    <label class="text-xs font-medium text-slate-300 flex justify-between">
                        <span>${label}</span>
                        <span class="text-[10px] text-slate-500 font-mono">${key}</span>
                    </label>`;

                if (isMediaField) {
                    const isVideoVal = typeof val === 'string' && (val.includes('.mp4') || val.includes('.webm') || val.includes('.mov') || keyLower.includes('video'));
                    html += `
                        <div class="space-y-2">
                            <div class="flex gap-2">
                                <input type="text" value="${escapeHtml(val || '')}" placeholder="Paste link or click Upload..." onchange="updateProp('${sec.id}', '${key}', this.value)" class="flex-1 px-3 py-2 bg-slate-800 border border-slate-700 rounded-xl text-xs text-slate-200 focus:outline-none focus:border-blue-500">
                                <label class="px-3 py-2 bg-rose-500 hover:bg-rose-600 text-white rounded-xl text-xs font-bold flex items-center gap-1 cursor-pointer transition-colors shrink-0 shadow-md">
                                    <i class="bi bi-upload"></i> Upload ${keyLower.includes('video') ? 'Video' : 'Media'}
                                    <input type="file" accept="${keyLower.includes('video') ? 'video/*,image/*' : 'image/*,video/*'}" class="hidden" onchange="uploadMediaFile(this, '${sec.id}', '${key}')">
                                </label>
                            </div>
                            ${val && isVideoVal ? `
                                <div class="relative w-full rounded-xl overflow-hidden border border-slate-700 bg-slate-950 p-2">
                                    <video src="${val}" controls class="w-full h-32 object-cover rounded-lg bg-black"></video>
                                </div>
                            ` : (val ? `<div class="relative w-full h-24 rounded-xl overflow-hidden border border-slate-700 bg-slate-900"><img src="${val}" class="w-full h-full object-cover"></div>` : '')}
                        </div>
                    `;
                } else if (isTextArea) {
                    html += `
                        <textarea rows="3" onchange="updateProp('${sec.id}', '${key}', this.value)" class="w-full px-3 py-2 bg-slate-800 border border-slate-700 rounded-xl text-xs text-slate-200 focus:outline-none focus:border-blue-500">${escapeHtml(val || '')}</textarea>
                    `;
                } else if (typeof val === 'object' && val !== null) {
                    html += `
                        <div class="p-3 bg-slate-800/40 border border-slate-800 rounded-xl text-xs text-slate-400 font-mono">
                            Sub-items list (${Array.isArray(val) ? val.length + ' items' : 'object'})
                        </div>
                    `;
                } else {
                    html += `
                        <input type="text" value="${escapeHtml(val || '')}" onchange="updateProp('${sec.id}', '${key}', this.value)" class="w-full px-3 py-2 bg-slate-800 border border-slate-700 rounded-xl text-xs text-slate-200 focus:outline-none focus:border-blue-500">
                    `;
                }

                html += `</div>`;
            }

            html += `</div></div>`;
            container.innerHTML = html;
        }

        function escapeHtml(str) {
            return String(str).replace(/"/g, '&quot;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
        }

        function updateProp(secId, key, val) {
            const sec = window.builderData.find(s => s.id === secId);
            if (sec) {
                sec.props[key] = val;
                renderLivePreview();
            }
        }

        function uploadMediaFile(fileInput, secId, key) {
            if (!fileInput.files || fileInput.files.length === 0) return;
            const file = fileInput.files[0];
            const formData = new FormData();
            formData.append('image', file);

            const btn = fileInput.parentElement;
            const origHTML = btn.innerHTML;
            btn.innerHTML = '<i class="bi bi-arrow-repeat animate-spin"></i> Uploading...';
            btn.style.pointerEvents = 'none';

            fetch("{{ route('admin.pages.uploadImage') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success && data.url) {
                    updateProp(secId, key, data.url);
                    renderInspector();
                } else {
                    alert(data.message || 'Media upload failed.');
                    btn.innerHTML = origHTML;
                    btn.style.pointerEvents = 'auto';
                }
            })
            .catch(err => {
                console.error(err);
                alert('Upload error.');
                btn.innerHTML = origHTML;
                btn.style.pointerEvents = 'auto';
            });
        }

        function renderLivePreview() {
            const iframe = document.getElementById('live-iframe');
            fetch('/{{ $page->slug == "accueil" ? "" : $page->slug }}?preview=1', { cache: 'no-cache' })
            .then(res => res.text())
            .then(html => {
                const doc = iframe.contentWindow.document;
                doc.open();
                doc.write(html);
                doc.close();
            })
            .catch(err => console.error('Live preview error:', err));
        }

        function savePage() {
            const btn = document.getElementById('save-btn');
            const originalHTML = btn.innerHTML;
            btn.innerHTML = '<i class="bi bi-arrow-repeat animate-spin me-2"></i> Saving...';
            btn.disabled = true;

            fetch("{{ route('admin.pages.builder.save', $page) }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ content: window.builderData })
            })
            .then(res => res.json())
            .then(data => { 
                if (data.success) {
                    btn.innerHTML = '<i class="bi bi-check2-circle me-2"></i> Saved';
                    btn.classList.replace('bg-blue-600', 'bg-emerald-600');
                    setTimeout(() => { 
                        btn.innerHTML = originalHTML; 
                        btn.classList.replace('bg-emerald-600', 'bg-blue-600'); 
                        btn.disabled = false; 
                    }, 2000);
                } else { 
                    alert('Error saving page.'); 
                    btn.innerHTML = originalHTML; 
                    btn.disabled = false; 
                }
            })
            .catch(err => { 
                console.error(err); 
                btn.innerHTML = originalHTML; 
                btn.disabled = false; 
            });
        }
    </script>
</body>
</html>
