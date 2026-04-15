<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Models\Ad;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Ana Sayfa (Vitrin)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    // Tüm ilanları en yeniye göre çekip ana sayfaya gönderir
    $ads = Ad::latest()->get();
    return view('welcome', compact('ads'));
})->name('home');

/*
|--------------------------------------------------------------------------
| Kullanıcı Paneli (Dashboard)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    // Giriş yapan kullanıcının kendi ilanlarını çekip dashboard'a gönderir
    $ads = auth()->user()->ads; 
    return view('dashboard', compact('ads'));
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Giriş Yapmış Kullanıcı İşlemleri
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    
    // İlan İşlemleri: index, create, store, show, edit, update, destroy
    Route::resource('ads', AdController::class);

    // Yorum İşlemleri: Belirli bir ilana yorum yapma
    Route::post('/ads/{ad}/comments', [CommentController::class, 'store'])->name('comments.store');

    // Profil Yönetimi
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |----------------------------------------------------------------------
    | Admin Özel Alanı
    |----------------------------------------------------------------------
    */
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/panel', [AdminController::class, 'index'])->name('panel');
        
        // Gelecekte ekleyeceğimiz kullanıcı/ilan yönetimi rotaları buraya gelecek
        // Route::get('/users', [AdminController::class, 'users'])->name('users');
    });
});

require __DIR__.'/auth.php';