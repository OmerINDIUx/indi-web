<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TalentController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    // $posts = \App\Models\Post::where('is_published', true)->latest()->take(3)->get();
    $posts = [];
    return view('welcome', compact('posts'));
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');

Route::get('/proyectos', [ProjectController::class, 'index'])->name('proyectos.index');

Route::get('/negocios', function () {
    return view('negocios');
})->name('negocios');

// Forms for Talent & Quejas
Route::get('/talento', [TalentController::class, 'create'])->name('talento.create');
Route::post('/talento', [TalentController::class, 'store'])->name('talento.store');

Route::get('/quejas', [ComplaintController::class, 'create'])->name('quejas.create');
Route::post('/quejas', [ComplaintController::class, 'store'])->name('quejas.store');

// Custom Authentication and CMS Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/talento', [AdminController::class, 'talents'])->name('talento.index');
    Route::get('/quejas', [AdminController::class, 'complaints'])->name('quejas.index');
    
    // Secure downloads
    Route::get('/descargar-evidencia/{filename}', [AdminController::class, 'downloadEvidence'])->name('evidencia.download');
    Route::get('/descargar-cv/{filename}', [AdminController::class, 'downloadResume'])->name('cv.download');
});
