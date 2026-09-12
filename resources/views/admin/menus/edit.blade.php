@extends('admin.layouts.app')

@section('title', 'Modifier le menu - SmartFilms Prod')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-gray-800">Modifier le lien : {{ $menu->title }}</h2>
    <a href="{{ route('menus.index') }}" class="text-gray-500 hover:text-gray-700 flex items-center">
        <i class="fas fa-arrow-left mr-2"></i> Retour
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 max-w-2xl">
    <form action="{{ route('menus.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-1">Titre du lien</label>
            <input type="text" name="title" value="{{ $menu->title }}" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-1">URL / Lien</label>
            <div class="flex items-center space-x-2 mb-2">
                <select id="page_selector" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm bg-gray-50" onchange="document.getElementById('url_input').value = this.value">
                    <option value="">-- Choisir une page pour remplacer l'URL --</option>
                    <option value="/">/ (Accueil)</option>
                    @foreach($pages as $page)
                        <option value="/{{ $page->slug }}">/{{ $page->slug }} ({{ $page->title }})</option>
                    @endforeach
                </select>
            </div>
            <input type="text" id="url_input" name="url" value="{{ $menu->url }}" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-1">Parent (Sous-menu de...)</label>
            <select name="parent_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Aucun (Lien principal) --</option>
                @foreach($allMenus as $m)
                    <option value="{{ $m->id }}" {{ $menu->parent_id == $m->id ? 'selected' : '' }}>{{ $m->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-1">Ordre d'affichage</label>
            <input type="number" name="order" value="{{ $menu->order }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg transition-colors shadow-md">
            Enregistrer les modifications
        </button>
    </form>
</div>
@endsection