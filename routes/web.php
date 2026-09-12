<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\SitemapController;
use App\Models\Page;

// 1. Front Pages & Film Case Studies
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/realisations', [FrontController::class, 'portfolio'])->name('portfolio');
Route::get('/realisations/{slug}', [FrontController::class, 'projectShow'])->name('project.show');
Route::get('/expertises', [FrontController::class, 'expertises'])->name('expertises');
Route::get('/expertises/{slug}', [FrontController::class, 'expertiseDetail'])->name('expertises.show');
Route::get('/a-propos', [FrontController::class, 'about'])->name('about');
Route::get('/equipe', [FrontController::class, 'team'])->name('team');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');

// 2. Soumission Devis & Contact (CRM Leads avec Rate Limiting)
Route::post('/inquiry/submit', [InquiryController::class, 'submit'])
    ->middleware('throttle:10,1')
    ->name('inquiry.submit');

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

// 6. Routes dynamiques pour les autres pages CMS
Route::get('/{slug}', function ($slug) {
    $page = Page::where('slug', $slug)->where('is_active', true)->firstOrFail();
    $menus = \App\Models\Menu::whereNull('parent_id')->orderBy('order')->with('children.children')->get();
    $settings = [
        'phone' => \App\Models\Setting::get('phone', '+212 6 17 20 23 45'),
        'email' => \App\Models\Setting::get('email', 'contact@smartfilmsprod.com'),
        'address' => \App\Models\Setting::get('address', '130 Bv d\'Anfa, 20300 Casablanca, Maroc'),
        'whatsapp' => \App\Models\Setting::get('whatsapp', '212617202345'),
    ];
    return view('front.page', compact('page', 'menus', 'settings'));
})->name('page.show');
