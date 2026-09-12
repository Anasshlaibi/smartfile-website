<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\MenuController;
use App\Models\Page; 

// الصفحة الرئيسية ديال الموقع (Front-end)
Route::get('/', function () {
    $page = Page::where('slug', 'accueil')->where('is_active', true)->first();
    if (!$page) { abort(404, 'الصفحة الرئيسية غير موجودة أو معطلة.'); }
    return view('front.page', compact('page'));
});

// مسارات تسجيل الدخول والخروج
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// مسارات لوحة التحكم
Route::middleware('auth')->prefix('admin')->group(function () {
    
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // مسارات الصفحات والرفع
    Route::post('pages/upload-image', [PageController::class, 'uploadImage'])->name('admin.pages.uploadImage');
    Route::resource('pages', PageController::class);
    Route::get('pages/{page}/builder', [PageController::class, 'builder'])->name('admin.pages.builder');
    Route::post('pages/{page}/builder', [PageController::class, 'saveBuilder'])->name('admin.pages.builder.save');

    // مسارات إدارة القوائم (Menu Builder)
    Route::resource('menus', MenuController::class);
});

// مسار دايناميكي لعرض باقي الصفحات
Route::get('/{slug}', function ($slug) {
    $page = Page::where('slug', $slug)->where('is_active', true)->firstOrFail();
    return view('front.page', compact('page'));
});
