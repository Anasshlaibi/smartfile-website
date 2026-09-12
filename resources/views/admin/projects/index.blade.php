@extends('admin.layouts.app')

@section('title', 'Gestion du Portfolio & Films - SmartFilms Admin')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Portfolio & Case Studies</h1>
            <p class="text-sm text-gray-500">Gérez les vidéos, films corporate et spots publicitaires affichés sur le site.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-xs flex items-center gap-2 shadow-lg shadow-blue-500/20">
            <i class="fas fa-plus"></i> Ajouter un Projet
        </a>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl text-sm font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($projects as $p)
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col justify-between group">
                <div>
                    <div class="relative aspect-video bg-gray-900 overflow-hidden">
                        <img src="{{ $p->thumbnail ?? '/uploads/cinema_corporate_film.png' }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-3 left-3 px-2.5 py-1 bg-black/70 text-white rounded-lg text-[10px] font-bold uppercase tracking-wider">
                            {{ $p->category }}
                        </span>
                        @if($p->duration)
                            <span class="absolute bottom-3 right-3 px-2 py-0.5 bg-black/70 text-white rounded text-[10px] font-mono">
                                {{ $p->duration }}
                            </span>
                        @endif
                    </div>
                    <div class="p-5 space-y-2">
                        <div class="text-xs uppercase font-bold text-blue-600 tracking-wider">{{ $p->client_name }}</div>
                        <h3 class="font-bold text-gray-900 text-base">{{ $p->title }}</h3>
                        <p class="text-xs text-gray-500 line-clamp-2">{{ $p->description }}</p>
                    </div>
                </div>

                <div class="p-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
                    <span class="text-[11px] text-gray-400 font-mono">{{ $p->year ?? '2026' }}</span>
                    <div class="space-x-2">
                        <a href="{{ route('admin.projects.edit', $p) }}" class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-xs font-semibold hover:bg-gray-100">
                            <i class="fas fa-edit mr-1"></i> Modifier
                        </a>
                        <form action="{{ route('admin.projects.destroy', $p) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer ce projet ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1.5 text-gray-400 hover:text-red-600">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-12 text-gray-400">
                Aucun projet dans le portfolio.
            </div>
        @endforelse
    </div>
</div>
@endsection
