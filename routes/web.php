<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\SitemapController;
use App\Models\Page; 

// 1. Page d'Accueil dynamique
Route::get('/', function () {
    $page = Page::where('slug', 'accueil')->where('is_active', true)->first();
    if (!$page) { abort(404, 'La page d\'accueil est indisponible.'); }
    return view('front.page', compact('page'));
})->name('home');

// 2. Soumission Devis & Contact (CRM Leads)
Route::post('/inquiry/submit', [InquiryController::class, 'submit'])->name('inquiry.submit');

// 3. XML Sitemap pour le référencement SEO
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// 4. Authentification Admin
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 5. Administration & CRM
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', function () {
        $stats = [
            'total_leads' => \App\Models\Lead::count(),
            'new_leads' => \App\Models\Lead::where('status', 'new')->count(),
            'total_pages' => \App\Models\Page::count(),
            'total_projects' => \App\Models\Project::count(),
            'recent_leads' => \App\Models\Lead::latest()->take(5)->get(),
        ];
        return view('admin.dashboard', compact('stats'));
    })->name('admin.dashboard');

    // Pages & Visual Builder
    Route::post('pages/upload-image', [PageController::class, 'uploadImage'])->name('admin.pages.uploadImage');
    Route::resource('pages', PageController::class);
    Route::get('pages/{page}/builder', [PageController::class, 'builder'])->name('admin.pages.builder');
    Route::post('pages/{page}/builder', [PageController::class, 'saveBuilder'])->name('admin.pages.builder.save');

    // Projets & Portfolio (Case Studies)
    Route::resource('projects', AdminProjectController::class, ['as' => 'admin']);

    // Leads & Demandes de Devis (CRM)
    Route::get('leads', [LeadController::class, 'index'])->name('admin.leads.index');
    Route::patch('leads/{lead}/status', [LeadController::class, 'updateStatus'])->name('admin.leads.updateStatus');
    Route::delete('leads/{lead}', [LeadController::class, 'destroy'])->name('admin.leads.destroy');

    // Menus
    Route::resource('menus', MenuController::class);

    // Paramètres & SEO
    Route::get('settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('admin.settings.update');
});

// 6. Routes dynamiques pour les autres pages
Route::get('/{slug}', function ($slug) {
    $page = Page::where('slug', $slug)->where('is_active', true)->firstOrFail();
    return view('front.page', compact('page'));
})->name('page.show');

