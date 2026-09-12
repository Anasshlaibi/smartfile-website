<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    // 1. عرض جميع الصفحات (Voir tous)
    public function index()
    {
        $pages = Page::latest()->get();
        return view('admin.pages.index', compact('pages'));
    }

    // 2. عرض واجهة إضافة صفحة جديدة (Ajouter)
    public function create()
    {
        return view('admin.pages.create');
    }

    // 3. حفظ الصفحة الجديدة فالباز دو دوني
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable',
        ]);

        $page = new Page();
        $page->title = $request->title;
        $page->slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
        $page->content = $request->content;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->is_active = $request->has('is_active');
        $page->save();

        return redirect()->route('pages.index')->with('success', 'Page ajoutée avec succès.');
    }

    // 4. عرض واجهة تعديل صفحة (Modifier)
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    // 5. حفظ التعديلات فالباز دو دوني
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $page->title = $request->title;
        $page->slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
        $page->content = $request->content;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->is_active = $request->has('is_active');
        $page->save();

        return redirect()->route('pages.index')->with('success', 'Page modifiée avec succès.');
    }

    // 6. مسح الصفحة (Supprimer)
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('pages.index')->with('success', 'Page supprimée avec succès.');
    }

    // 7. عرض واجهة Visual Builder
    public function builder(Page $page)
    {
        return view('admin.pages.builder', compact('page'));
    }

    // 8. حفظ بيانات Visual Builder عبر Ajax/Fetch
    public function saveBuilder(Request $request, Page $page)
    {
        $request->validate([
            'content' => 'required|array',
        ]);

        $page->content = $request->content;
        $page->save();

        return response()->json(['success' => true]);
    }

    // 9. رفع الفيديوهات والصور المباشر فـ Visual Builder
    public function uploadImage(Request $request)
    {
        // دعم رفع الصور والفيديوهات مباشرة من جهاز المستخدم
        $request->validate([
            'image' => 'required|file|mimes:jpeg,jpg,png,gif,webp,svg,mp4,webm,ogg,mov,m4v,avi|max:102400',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            
            $destinationPath = public_path('uploads');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $filename);

            return response()->json([
                'success' => true,
                'url' => '/uploads/' . $filename,
            ]);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded.'], 400);
    }
}
