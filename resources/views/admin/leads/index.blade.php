@extends('admin.layouts.app')

@section('title', 'Gestion des Leads & Demandes de Devis - SmartFilms CRM')

@section('content')
<div class="space-y-6">

    <!-- Top Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Leads & Demandes de Devis</h1>
            <p class="text-sm text-gray-500">Gérez les demandes de production audiovisuelle soumises depuis le site.</p>
        </div>
        <div class="flex gap-3">
            <span class="px-4 py-2 bg-rose-100 text-rose-700 rounded-xl text-xs font-bold flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-rose-500 animate-ping"></span>
                {{ $newLeads }} Nouveaux Leads
            </span>
            <span class="px-4 py-2 bg-blue-100 text-blue-700 rounded-xl text-xs font-bold">
                {{ $totalLeads }} Total Enregistrés
            </span>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl text-sm font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <!-- Leads Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50/75 border-b border-gray-100 text-xs font-bold uppercase text-gray-500 tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Client / Contact</th>
                        <th class="px-6 py-4">Type de Projet</th>
                        <th class="px-6 py-4">Budget Estimé</th>
                        <th class="px-6 py-4">Statut</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($leads as $lead)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-900">{{ $lead->name }}</div>
                                <div class="text-xs text-gray-500 flex items-center gap-2 mt-0.5">
                                    <i class="fas fa-phone text-gray-400"></i> {{ $lead->phone }}
                                    @if($lead->company)
                                        <span class="text-gray-300">|</span> <span class="font-medium text-gray-700">{{ $lead->company }}</span>
                                    @endif
                                </div>
                                @if($lead->email)
                                    <div class="text-xs text-blue-600 mt-0.5">{{ $lead->email }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-medium text-gray-800">{{ $lead->project_type ?? 'Non spécifié' }}</span>
                                @if($lead->message)
                                    <p class="text-xs text-gray-400 mt-1 line-clamp-1 italic">"{{ $lead->message }}"</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-mono font-semibold text-gray-900">
                                {{ $lead->budget_tier ?? 'Non spécifié' }}
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.leads.updateStatus', $lead) }}" method="POST" class="m-0">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="text-xs font-bold rounded-lg px-2.5 py-1.5 border focus:outline-none 
                                        @if($lead->status == 'new') bg-rose-50 text-rose-700 border-rose-200
                                        @elseif($lead->status == 'contacted') bg-amber-50 text-amber-700 border-amber-200
                                        @elseif($lead->status == 'proposal_sent') bg-blue-50 text-blue-700 border-blue-200
                                        @elseif($lead->status == 'won') bg-emerald-50 text-emerald-700 border-emerald-200
                                        @else bg-gray-50 text-gray-700 border-gray-200 @endif">
                                        <option value="new" {{ $lead->status == 'new' ? 'selected' : '' }}>🔴 Nouveau</option>
                                        <option value="contacted" {{ $lead->status == 'contacted' ? 'selected' : '' }}>🟡 Contacté</option>
                                        <option value="proposal_sent" {{ $lead->status == 'proposal_sent' ? 'selected' : '' }}>🔵 Devis Envoyé</option>
                                        <option value="won" {{ $lead->status == 'won' ? 'selected' : '' }}>🟢 Gagné (Signé)</option>
                                        <option value="lost" {{ $lead->status == 'lost' ? 'selected' : '' }}>⚪ Perdu</option>
                                    </select>
                                </form>
                            </td>
                            <td class="px-6 py-4 text-xs text-gray-500">
                                {{ $lead->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->phone) }}" target="_blank" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-colors" title="Contacter sur WhatsApp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="tel:{{ $lead->phone }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-colors" title="Appeler">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer ce lead ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-8 h-8 rounded-lg bg-gray-50 text-gray-400 hover:bg-red-50 hover:text-red-600 transition-colors" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                                <i class="fas fa-inbox text-4xl mb-3 text-gray-300 block"></i>
                                Aucun lead reçu pour le moment.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($leads->hasPages())
            <div class="p-4 border-t border-gray-100">
                {{ $leads->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
