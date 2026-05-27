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

        return view('prensa', compact('posts', 'featured'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
        
        // Cargar los últimos 3 artículos excluyendo el actual para la barra lateral
        $latest = Post::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('prensa-articulo', compact('post', 'latest'));
    }
}
