@extends('admin.layouts.app')

@section('title', 'Gestion des Pages - SmartFilms Prod')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Gestion des Pages</h2>
    <a href="{{ route('pages.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-sm flex items-center">
        <i class="fas fa-plus mr-2"></i> Ajouter une page
    </a>
</div>

@if(session('success'))
    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-sm text-gray-500 uppercase tracking-wider">
                    <th class="px-6 py-4 font-medium">Titre</th>
                    <th class="px-6 py-4 font-medium">Lien (Slug)</th>
                    <th class="px-6 py-4 font-medium">Statut</th>
                    <th class="px-6 py-4 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700 divide-y divide-gray-100">
                @forelse($pages as $page)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $page->title }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $page->slug }}</td>
                        <td class="px-6 py-4">
                            @if($page->is_active)
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span>
                            @else
                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium">Inactivé</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <a href="{{ route('admin.pages.builder', $page->id) }}" class="text-purple-500 hover:text-purple-700 transition-colors bg-purple-50 p-2 rounded-lg" title="Visual Builder">
                                <i class="fas fa-paint-roller"></i> Builder
                            </a>
                            
                            <a href="{{ route('pages.edit', $page->id) }}" class="text-blue-500 hover:text-blue-700 transition-colors ml-2" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                            
                            <form action="{{ route('pages.destroy', $page->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette page ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition-colors" title="Supprimer">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                            Aucune page n'a été trouvée. Commencez par en ajouter une !
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection