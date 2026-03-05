<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // $posts = \App\Models\Post::where('is_published', true)->latest()->take(3)->get();
    $posts = [];
    return view('welcome', compact('posts'));
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');

Route::get('/proyectos', [ProjectController::class, 'index'])->name('proyectos.index');
