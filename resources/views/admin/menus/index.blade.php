@extends('admin.layouts.app')

@section('title', 'Menu Builder - SmartFilms Prod')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Menu Builder</h2>
    <p class="text-gray-500 text-sm mt-1">Gérez la navigation de votre site web (Jusqu'à 3 niveaux).</p>
</div>

@if(session('success'))
    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm">
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <div class="lg:col-span-1">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <h3 class="font-bold text-gray-800 mb-4 border-b pb-2">Ajouter un lien</h3>
            
            <form action="{{ route('menus.store') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Titre du lien</label>
                    <input type="text" name="title" required placeholder="Ex: Nos Services" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">URL / Lien</label>
                    <div class="flex items-center space-x-2 mb-2">
                        <select id="page_selector" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm bg-gray-50" onchange="document.getElementById('url_input').value = this.value">
                            <option value="">-- Choisir une page existante --</option>
                            <option value="/">/ (Accueil)</option>
                            @foreach($pages as $page)
                                <option value="/{{ $page->slug }}">/{{ $page->slug }} ({{ $page->title }})</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="text" id="url_input" name="url" required placeholder="Ex: /nos-services ou https://..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Parent (Sous-menu de...)</label>
                    <select name="parent_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-sm">
                        <option value="">-- Aucun (Lien principal) --</option>
                        @foreach($allMenus as $m)
                            <option value="{{ $m->id }}">{{ $m->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Ordre d'affichage</label>
                    <input type="number" name="order" value="0" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-sm">
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                    Ajouter au menu
                </button>
            </form>
        </div>
    </div>

    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 min-h-[400px]">
            <h3 class="font-bold text-gray-800 mb-4 border-b pb-2">Structure du Menu</h3>
            
            @if($menus->count() == 0)
                <div class="text-center text-gray-400 py-10">
                    <i class="fas fa-network-wired text-4xl mb-3 block"></i>
                    <p>Aucun lien n'a été ajouté au menu.</p>
                </div>
            @else
                <ul class="space-y-2">
                    @foreach($menus as $menu)
                        <li class="bg-gray-50 rounded-lg border border-gray-200">
                            <div class="flex items-center justify-between p-3">
                                <div class="font-semibold text-gray-800"><i class="fas fa-bars text-gray-400 mr-2 cursor-move"></i> {{ $menu->title }} <span class="text-xs text-blue-500 font-normal ml-2">{{ $menu->url }}</span></div>
                                <div class="flex space-x-3">
                                    <a href="{{ route('menus.edit', $menu->id) }}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Supprimer ce lien ?');" class="inline">@csrf @method('DELETE') <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button></form>
                                </div>
                            </div>
                            
                            @if($menu->children->count() > 0)
                                <ul class="pl-8 pb-3 pr-3 space-y-2">
                                    @foreach($menu->children as $child)
                                        <li class="bg-white rounded-md border border-gray-200">
                                            <div class="flex items-center justify-between p-2">
                                                <div class="text-sm font-medium text-gray-700"><i class="fas fa-level-up-alt fa-rotate-90 text-gray-300 mr-2"></i> {{ $child->title }} <span class="text-xs text-blue-400 ml-2">{{ $child->url }}</span></div>
                                                <div class="flex space-x-3 text-sm">
                                                    <a href="{{ route('menus.edit', $child->id) }}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('menus.destroy', $child->id) }}" method="POST" onsubmit="return confirm('Supprimer ce lien ?');" class="inline">@csrf @method('DELETE') <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button></form>
                                                </div>
                                            </div>

                                            @if($child->children->count() > 0)
                                                <ul class="pl-8 pb-2 pr-2 space-y-1 mt-1">
                                                    @foreach($child->children as $subchild)
                                                        <li class="bg-gray-50 rounded text-xs border border-gray-100 flex items-center justify-between p-2">
                                                            <div class="text-gray-600"><i class="fas fa-minus text-gray-300 mr-2"></i> {{ $subchild->title }}</div>
                                                            <div class="flex space-x-2">
                                                                <a href="{{ route('menus.edit', $subchild->id) }}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                                                <form action="{{ route('menus.destroy', $subchild->id) }}" method="POST" onsubmit="return confirm('Supprimer ?');" class="inline">@csrf @method('DELETE') <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button></form>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection