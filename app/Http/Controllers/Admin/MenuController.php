<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // عرض واجهة Menu Builder
    public function index()
    {
        $menus = Menu::whereNull('parent_id')->orderBy('order')->with('children.children')->get();
        $allMenus = Menu::orderBy('title')->get();
        $pages = Page::where('is_active', true)->get();
        
        return view('admin.menus.index', compact('menus', 'allMenus', 'pages'));
    }

    // حفظ رابط جديد
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'url'   => 'required|max:255',
        ]);

        Menu::create($request->all());

        return back()->with('success', 'Le lien a été ajouté au menu avec succès.');
    }

    // عرض واجهة التعديل
    public function edit(Menu $menu)
    {
        // كنجيبو كاع الروابط باش نقدرو نختارو ليهم الأب (parent)، باستثناء الرابط الحالي باش مايوليش أب ديال راسو
        $allMenus = Menu::where('id', '!=', $menu->id)->orderBy('title')->get();
        $pages = Page::where('is_active', true)->get();

        return view('admin.menus.edit', compact('menu', 'allMenus', 'pages'));
    }

    // حفظ التعديلات
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'title' => 'required|max:255',
            'url'   => 'required|max:255',
        ]);

        $menu->update($request->all());

        return redirect()->route('menus.index')->with('success', 'Le lien a été modifié avec succès.');
    }

    // حذف الرابط
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return back()->with('success', 'Le lien a été supprimé.');
    }
}