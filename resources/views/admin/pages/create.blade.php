@extends('admin.layouts.app')

@section('title', 'Ajouter une page - SmartFilms Prod')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-gray-800">Ajouter une nouvelle page</h2>
    <a href="{{ route('pages.index') }}" class="text-gray-500 hover:text-gray-700 transition-colors flex items-center">
        <i class="fas fa-arrow-left mr-2"></i> Retour
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
    <form action="{{ route('pages.store') }}" method="POST">
        @csrf

        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4"><i class="fas fa-info-circle text-blue-500 mr-2"></i>Informations Générales</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre de la page <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="Ex: À propos de nous"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-colors">
                    @error('title') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Lien personnalisé (Slug - Optionnel)</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug') }}" placeholder="Ex: a-propos-de-nous"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-colors">
                    <p class="text-xs text-gray-400 mt-1">Laissez vide pour le générer automatiquement à partir du titre.</p>
                </div>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Contenu de la page</label>
                <textarea id="content" name="content" rows="10" placeholder="Écrivez le contenu de votre page ici..."
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-colors">{{ old('content') }}</textarea>
            </div>
        </div>

        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4"><i class="fas fa-search text-green-500 mr-2"></i>Optimisation SEO</h3>
            
            <div class="mb-4">
                <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-1">Meta Titre (Optionnel)</label>
                <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title') }}" placeholder="Titre pour les moteurs de recherche"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-colors">
            </div>

            <div class="mb-4">
                <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-1">Meta Description (Optionnel)</label>
                <textarea id="meta_description" name="meta_description" rows="3" placeholder="Brève description pour les résultats Google"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-colors">{{ old('meta_description') }}</textarea>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center justify-between border-t pt-6">
            
            <label class="relative inline-flex items-center cursor-pointer mb-4 sm:mb-0">
                <input type="checkbox" name="is_active" value="1" class="sr-only peer" checked>
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                <span class="ml-3 text-sm font-medium text-gray-700">Page active (Visible en ligne)</span>
            </label>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg transition-colors flex items-center justify-center shadow-md">
                <i class="fas fa-save mr-2"></i> Enregistrer la page
            </button>
        </div>
    </form>
</div>
@endsection