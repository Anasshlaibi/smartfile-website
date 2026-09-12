<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::latest()->paginate(20);
        $totalLeads = Lead::count();
        $newLeads = Lead::where('status', 'new')->count();
        $wonLeads = Lead::where('status', 'won')->count();

        return view('admin.leads.index', compact('leads', 'totalLeads', 'newLeads', 'wonLeads'));
    }

    public function updateStatus(Request $request, Lead $lead)
    {
        $request->validate([
            'status' => 'required|in:new,contacted,proposal_sent,won,lost',
            'admin_notes' => 'nullable|string',
        ]);

        $lead->status = $request->status;
        if ($request->has('admin_notes')) {
            $lead->admin_notes = $request->admin_notes;
        }
        $lead->save();

        return back()->with('success', 'Statut du lead mis à jour avec succès.');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        return back()->with('success', 'Lead supprimé.');
    }
}
