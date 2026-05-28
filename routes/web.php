<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TalentController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PrensaController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminProjectController;

Route::get('/', function () {
    // $posts = \App\Models\Post::where('is_published', true)->latest()->take(3)->get();
    $posts = [];
    return view('welcome', compact('posts'));
});

Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');

Route::get('/proyectos', [ProjectController::class, 'index'])->name('proyectos.index');

Route::get('/negocios', function () {
    return view('negocios');
})->name('negocios');

// Dynamic Prensa Routes
Route::get('/prensa', [PrensaController::class, 'index'])->name('prensa');
Route::get('/prensa/{slug}', [PrensaController::class, 'show'])->name('prensa.show');

Route::get('/social', function () {
    return view('social');
})->name('social');

Route::get('/brochure', function () {
    return view('viewer', ['pdf' => asset('assets/Brochure-Grupo-Indi.pdf'), 'title' => 'BROCHURE CORPORATIVO']);
})->name('brochure');

Route::get('/etica', function () {
    return view('viewer', ['pdf' => asset('assets/codigo-de-etica-y-conducta-2025.pdf'), 'title' => 'CÓDIGO DE ÉTICA 2025']);
})->name('etica');

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
    Route::resource('/proyectos', AdminProjectController::class)->except(['show']);
    
    // CRUD Prensa (Blogs)
    Route::get('/prensa', [AdminPostController::class, 'index'])->name('prensa.index');
    Route::get('/prensa/crear', [AdminPostController::class, 'create'])->name('prensa.create');
    Route::post('/prensa', [AdminPostController::class, 'store'])->name('prensa.store');
    Route::get('/prensa/{id}/editar', [AdminPostController::class, 'edit'])->name('prensa.edit');
    Route::put('/prensa/{id}', [AdminPostController::class, 'update'])->name('prensa.update');
    Route::delete('/prensa/{id}', [AdminPostController::class, 'destroy'])->name('prensa.destroy');
    Route::post('/prensa/{id}/toggle-publish', [AdminPostController::class, 'togglePublish'])->name('prensa.toggle-publish');
    
    // Secure downloads
    Route::get('/descargar-evidencia/{filename}', [AdminController::class, 'downloadEvidence'])->name('evidencia.download');
    Route::get('/descargar-cv/{filename}', [AdminController::class, 'downloadResume'])->name('cv.download');

    // Dynamic block image upload
    Route::post('/prensa/upload-image', [AdminPostController::class, 'uploadBlockImage'])->name('prensa.upload-image');
});
