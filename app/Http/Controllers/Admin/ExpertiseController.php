<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expertise;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExpertiseController extends Controller
{
    public function index()
    {
        $expertises = Expertise::orderBy('order')->get();
        return view('admin.expertises.index', compact('expertises'));
    }

    public function edit(Expertise $expertise)
    {
        return view('admin.expertises.edit', compact('expertise'));
    }

    public function update(Request $request, Expertise $expertise)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'hero_desc' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:5120',
            'image_url' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $expertise->title = $request->title;
        $expertise->subtitle = $request->subtitle;
        $expertise->hero_desc = $request->hero_desc;
        $expertise->order = $request->order ?? $expertise->order;
        $expertise->is_active = $request->has('is_active');

        // Handle uploaded image file
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'expertise_' . Str::slug($expertise->slug) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $expertise->image = '/uploads/' . $filename;
        } elseif ($request->filled('image_url')) {
            $expertise->image = $request->image_url;
        }

        $expertise->save();

        return redirect()->route('admin.expertises.index')->with('success', 'Expertise "' . $expertise->title . '" et son image ont été mises à jour avec succès.');
    }
}
