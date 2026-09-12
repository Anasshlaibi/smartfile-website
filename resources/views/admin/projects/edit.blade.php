@extends('admin.layouts.app')

@section('title', 'Modifier le Projet - SmartFilms Admin')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Modifier le Projet</h1>
            <p class="text-sm text-gray-500">{{ $project->title }}</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-xl text-xs font-bold">Retour</a>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Titre du Film *</label>
                    <input type="text" name="title" value="{{ $project->title }}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Client / Marque</label>
                    <input type="text" name="client_name" value="{{ $project->client_name }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Catégorie *</label>
                    <select name="category" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                        <option value="Film Corporate" {{ $project->category == 'Film Corporate' ? 'selected' : '' }}>Film Corporate</option>
                        <option value="Spot Publicitaire" {{ $project->category == 'Spot Publicitaire' ? 'selected' : '' }}>Spot Publicitaire</option>
                        <option value="Drone 4K" {{ $project->category == 'Drone 4K' ? 'selected' : '' }}>Drone 4K</option>
                        <option value="Documentaire & RSE" {{ $project->category == 'Documentaire & RSE' ? 'selected' : '' }}>Documentaire & RSE</option>
                        <option value="Événementiel" {{ $project->category == 'Événementiel' ? 'selected' : '' }}>Événementiel</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Durée</label>
                    <input type="text" name="duration" value="{{ $project->duration }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Année</label>
                    <input type="text" name="year" value="{{ $project->year }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-700 mb-2">URL Vidéo</label>
                    <input type="text" name="video_url" value="{{ $project->video_url }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Image Thumbnail</label>
                    <input type="text" name="thumbnail" value="{{ $project->thumbnail }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Badge Métrique / Résultat</label>
                <input type="text" name="metrics" value="{{ $project->metrics }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-gray-700 mb-2">Description du Projet</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-blue-500">{{ $project->description }}</textarea>
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ $project->is_featured ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded">
                <label for="is_featured" class="text-xs font-bold text-gray-700">Mettre en avant sur la page d'accueil</label>
            </div>

            <div class="pt-4 border-t border-gray-100 flex justify-end">
                <button type="submit" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-xs font-bold shadow-lg shadow-blue-500/20">
                    Mettre à Jour
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
