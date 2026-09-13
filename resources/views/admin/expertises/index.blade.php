@extends('admin.layouts.app')

@section('title', 'Gestion des Expertises & Photos - SmartFilms Prod')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Nos 6 Expertises</h1>
            <p class="text-sm text-gray-500 mt-1">Gérez les cartes de la section "NOS EXPERTISES", modifiez les photos, titres et descriptions.</p>
        </div>
        <a href="{{ url('/') }}#expertises" target="_blank" class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-xs font-bold px-4 py-2.5 rounded-xl transition-all">
            <i class="fas fa-eye"></i> Voir sur le site
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl flex items-center gap-3">
            <i class="fas fa-check-circle text-emerald-500 text-lg"></i>
            <p class="text-sm font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($expertises as $exp)
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-md transition-shadow">
                <!-- Image Preview -->
                <div class="relative h-48 bg-gray-900 overflow-hidden group">
                    <img src="{{ $exp->image }}" alt="{{ $exp->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-3 left-3 bg-black/70 backdrop-blur-sm text-white font-mono text-xs font-bold px-2.5 py-1 rounded-md">
                        {{ sprintf('%02d', $exp->order) }}
                    </div>
                    <div class="absolute top-3 right-3">
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold {{ $exp->is_active ? 'bg-emerald-500 text-white' : 'bg-gray-500 text-white' }}">
                            {{ $exp->is_active ? 'Actif' : 'Masqué' }}
                        </span>
                    </div>
                </div>

                <!-- Content Info -->
                <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                    <div>
                        <h3 class="font-bold text-gray-900 text-base leading-snug">{{ $exp->title }}</h3>
                        <p class="text-xs font-medium text-blue-600 mt-1">{{ $exp->subtitle }}</p>
                        <p class="text-xs text-gray-500 mt-2 line-clamp-3 leading-relaxed">{{ $exp->hero_desc }}</p>
                    </div>

                    <!-- Action Edit Button -->
                    <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-[11px] font-mono text-gray-400">/{{ $exp->slug }}</span>
                        <a href="{{ route('admin.expertises.edit', $exp->id) }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-4 py-2 rounded-lg transition-colors shadow-sm">
                            <i class="fas fa-edit"></i> Modifier & Changer la photo
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
