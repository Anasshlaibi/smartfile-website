<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
            'company' => 'nullable|string|max:255',
            'project_type' => 'nullable|string|max:255',
            'budget_tier' => 'nullable|string|max:255',
            'timeline' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:3000',
        ]);

        $lead = Lead::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'company' => $validated['company'] ?? null,
            'project_type' => $validated['project_type'] ?? 'Non spécifié',
            'budget_tier' => $validated['budget_tier'] ?? 'Non spécifié',
            'timeline' => $validated['timeline'] ?? 'Dès que possible',
            'message' => $validated['message'] ?? 'Demande d\'estimation via configurateur en ligne',
            'status' => 'new',
            'ip_address' => $request->ip(),
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Votre demande a bien été enregistrée. Notre équipe de production vous contactera sous 24h ouvrées.',
                'lead_id' => $lead->id,
            ]);
        }

        return back()->with('success', 'Merci ! Votre demande a bien été envoyée. Nous reviendrons vers vous sous 24h.');
    }
}
