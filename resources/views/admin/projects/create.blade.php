@extends('admin.layouts.app')

@section('title', 'Ajouter un Projet au Portfolio - SmartFilms')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Ajouter un Projet</h1>
            <p class="text-sm text-gray-500">Ajoutez un nouveau film d'entreprise ou spot publicitaire au portfolio.</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-xl text-xs font-bold">Retour</a>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <form action="{{ route('admin.projects.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Titre du Film *</label>
                    <input type="text" name="title" required placeholder="Ex: Empowering Digital Leaders" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Client / Marque</label>
                    <input type="text" name="client_name" placeholder="Ex: DELL Technologies" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Catégorie *</label>
                    <select name="category" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                        <option value="Film Corporate">Film Corporate</option>
                        <option value="Spot Publicitaire">Spot Publicitaire</option>
                        <option value="Drone 4K">Drone 4K</option>
                        <option value="Documentaire & RSE">Documentaire & RSE</option>
                        <option value="Événementiel">Événementiel</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Durée (Ex: 02:30)</label>
                    <input type="text" name="duration" placeholder="02:30" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Année</label>
                    <input type="text" name="year" value="2026" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-700 mb-2">URL Vidéo (YouTube / Vimeo / MP4)</label>
                    <input type="text" name="video_url" placeholder="https://www.youtube.com/embed/..." class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Image Thumbnail (Chemin ou URL)</label>
                    <input type="text" name="thumbnail" value="/uploads/cinema_corporate_film.png" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Badge Métrique / Résultat</label>
                <input type="text" name="metrics" placeholder="Ex: +3.8M Vues Digitales & TV" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Description du Projet</label>
                <textarea name="description" rows="3" placeholder="Contexte, concept créatif et objectifs du film..." class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500"></textarea>
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" checked class="w-4 h-4 text-blue-600 rounded">
                <label for="is_featured" class="text-xs font-bold text-gray-700">Mettre en avant sur la page d'accueil</label>
            </div>

            <div class="pt-4 border-t border-gray-100 flex justify-end">
                <button type="submit" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-xs font-bold shadow-lg shadow-blue-500/20">
                    Enregistrer le Projet
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
