@extends('admin.layouts.app')

@section('title', 'Tableau de bord CRM & Production - SmartFilms Prod')

@section('content')
<div class="space-y-8">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900">Espace Direction & CRM</h1>
            <p class="text-gray-500 text-sm mt-1">Supervisez les demandes de devis, les films du portfolio et le contenu du site.</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.projects.create') }}" class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-xs font-bold shadow-md flex items-center gap-2">
                <i class="fas fa-video"></i> Nouveau Film
            </a>
            <a href="{{ route('admin.leads.index') }}" class="px-4 py-2.5 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-bold shadow-md flex items-center gap-2">
                <i class="fas fa-bullhorn"></i> Voir les Leads
            </a>
        </div>
    </div>

    <!-- Live Metrics Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100 flex justify-between items-center group hover:border-rose-300 transition-all">
            <div>
                <p class="text-xs uppercase font-bold text-gray-400 tracking-wider">Nouveaux Leads</p>
                <h3 class="text-3xl font-black text-rose-600 mt-1">{{ $stats['new_leads'] ?? 0 }}</h3>
                <span class="text-[11px] text-gray-500">Demandes en attente</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center text-xl">
                <i class="fas fa-bell"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100 flex justify-between items-center group hover:border-blue-300 transition-all">
            <div>
                <p class="text-xs uppercase font-bold text-gray-400 tracking-wider">Total Demandes</p>
                <h3 class="text-3xl font-black text-gray-900 mt-1">{{ $stats['total_leads'] ?? 0 }}</h3>
                <span class="text-[11px] text-gray-500">Leads CRM enregistrés</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl">
                <i class="fas fa-bullhorn"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100 flex justify-between items-center group hover:border-indigo-300 transition-all">
            <div>
                <p class="text-xs uppercase font-bold text-gray-400 tracking-wider">Films Portfolio</p>
                <h3 class="text-3xl font-black text-gray-900 mt-1">{{ $stats['total_projects'] ?? 0 }}</h3>
                <span class="text-[11px] text-gray-500">Case studies en ligne</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl">
                <i class="fas fa-film"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100 flex justify-between items-center group hover:border-emerald-300 transition-all">
            <div>
                <p class="text-xs uppercase font-bold text-gray-400 tracking-wider">Pages Actives</p>
                <h3 class="text-3xl font-black text-gray-900 mt-1">{{ $stats['total_pages'] ?? 0 }}</h3>
                <span class="text-[11px] text-gray-500">Indexées & Builder</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
                <i class="fas fa-file-alt"></i>
            </div>
        </div>

    </div>

    <!-- Recent Leads Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <div>
                <h2 class="font-bold text-lg text-gray-900">Dernières Demandes de Devis (CRM)</h2>
                <p class="text-xs text-gray-500">Clients ayant configuré une demande d'estimation ou un message.</p>
            </div>
            <a href="{{ route('admin.leads.index') }}" class="text-xs font-bold text-blue-600 hover:text-blue-800">
                Voir tous les leads <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50/75 text-xs font-bold uppercase text-gray-500 tracking-wider border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-3.5">Client</th>
                        <th class="px-6 py-3.5">Type & Format</th>
                        <th class="px-6 py-3.5">Budget</th>
                        <th class="px-6 py-3.5">Statut</th>
                        <th class="px-6 py-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($stats['recent_leads'] ?? [] as $lead)
                        <tr class="hover:bg-gray-50/50">
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-900">{{ $lead->name }}</div>
                                <div class="text-xs text-gray-500">{{ $lead->phone }} @if($lead->company) — <span class="font-semibold text-gray-700">{{ $lead->company }}</span>@endif</div>
                            </td>
                            <td class="px-6 py-4 text-xs font-medium text-gray-800">
                                {{ $lead->project_type }}
                            </td>
                            <td class="px-6 py-4 font-mono text-xs font-bold text-gray-900">
                                {{ $lead->budget_tier }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
                                    @if($lead->status == 'new') bg-rose-100 text-rose-700
                                    @elseif($lead->status == 'contacted') bg-amber-100 text-amber-700
                                    @elseif($lead->status == 'won') bg-emerald-100 text-emerald-700
                                    @else bg-blue-100 text-blue-700 @endif">
                                    {{ $lead->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->phone) }}" target="_blank" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-colors">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="tel:{{ $lead->phone }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-colors">
                                    <i class="fas fa-phone"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                Aucun lead récent.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection