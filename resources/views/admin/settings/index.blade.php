@extends('admin.layouts.app')

@section('title', 'Paramètres de l\'Agence & SEO - SmartFilms Admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Paramètres & Référencement (SEO / GEO)</h1>
        <p class="text-sm text-gray-500">Configurez les coordonnées de l'agence à Casablanca, les balises de tracking et le SEO.</p>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl text-sm font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
            @csrf

            <!-- Coordonnées Générales -->
            <div>
                <h3 class="text-sm font-bold uppercase text-gray-900 tracking-wider mb-4 pb-2 border-b border-gray-100 flex items-center gap-2">
                    <i class="fas fa-building text-blue-500"></i> Coordonnées de l'Agence
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Nom de l'Agence</label>
                        <input type="text" name="site_name" value="{{ $settings['site_name'] ?? 'SmartFilms Prod' }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Téléphone Principal</label>
                        <input type="text" name="phone" value="{{ $settings['phone'] ?? '+212 6 17 20 23 45' }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Email de Contact</label>
                        <input type="email" name="email" value="{{ $settings['email'] ?? 'contact@smartfilmsprod.com' }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Numéro WhatsApp (Format international sans +)</label>
                        <input type="text" name="whatsapp" value="{{ $settings['whatsapp'] ?? '212617202345' }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Adresse du Studio à Casablanca</label>
                        <input type="text" name="address" value="{{ $settings['address'] ?? '130 Bv d\'Anfa, 20300 Casablanca, Maroc' }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                    </div>
                </div>
            </div>

            <!-- Réseaux Sociaux & Showreel -->
            <div>
                <h3 class="text-sm font-bold uppercase text-gray-900 tracking-wider mb-4 pb-2 border-b border-gray-100 flex items-center gap-2">
                    <i class="fas fa-share-alt text-blue-500"></i> Liens Sociaux & Showreel
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Lien Instagram</label>
                        <input type="url" name="instagram" value="{{ $settings['instagram'] ?? 'https://instagram.com/smartfilmsprod' }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Lien LinkedIn</label>
                        <input type="url" name="linkedin" value="{{ $settings['linkedin'] ?? 'https://linkedin.com/company/smartfilmsprod' }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                    </div>
                </div>
            </div>

            <!-- Tracking & Analytics -->
            <div>
                <h3 class="text-sm font-bold uppercase text-gray-900 tracking-wider mb-4 pb-2 border-b border-gray-100 flex items-center gap-2">
                    <i class="fas fa-chart-bar text-blue-500"></i> Tracking & Analytics
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Google Analytics 4 ID (GA4)</label>
                        <input type="text" name="ga4_id" value="{{ $settings['ga4_id'] ?? 'G-SF2026CASABLANCA' }}" placeholder="G-XXXXXXXXXX" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Microsoft Clarity / Heatmap ID</label>
                        <input type="text" name="clarity_id" value="{{ $settings['clarity_id'] ?? '' }}" placeholder="Ex: yg5lf99ki6" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-100 flex justify-end">
                <button type="submit" class="px-8 py-3.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-xs font-bold shadow-lg shadow-blue-500/20">
                    Enregistrer les Paramètres
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
