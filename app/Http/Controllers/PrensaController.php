<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PrensaController extends Controller
{
    public function index()
    {
        $allPosts = Post::where('is_published', true)->orderBy('created_at', 'desc')->get();
        
        $featured = $allPosts->first();
        $posts = $allPosts->skip(1);
        $categoryOrder = ['maritimo', 'construccion', 'infraestructura', 'ferroviario'];
        $availableCategories = collect($categoryOrder)
            ->filter(fn (string $category) => $posts->contains('category', $category))
            ->values();

        return view('prensa', compact('posts', 'featured', 'availableCategories'));
    }

    public function show($slug)
    {
        $post = Post::where('is_published', true)
            ->where(function ($query) use ($slug) {
                $query->where('slug', $slug)->orWhere('slug_en', $slug);
            })
            ->firstOrFail();
        
        // Cargar los últimos 3 artículos excluyendo el actual para la barra lateral
        $latest = Post::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('prensa-articulo', compact('post', 'latest'));
    }
}
