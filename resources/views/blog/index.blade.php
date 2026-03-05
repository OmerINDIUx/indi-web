@extends('layouts.app')

@section('title', 'Blog | WG-INDI')

@section('content')
<section class="section">
    <h1 class="reveal" style="font-size: 4rem; margin-bottom: 3rem;">Nuestro Blog</h1>
    
    <div class="grid">
        @foreach($posts as $post)
        <div class="feature-card glass reveal">
            <h3 style="margin-bottom: 1rem;">{{ $post->title }}</h3>
            <p style="color: var(--text-muted); margin-bottom: 1.5rem;">
                {{ Str::limit($post->content, 100) }}
            </p>
            <a href="{{ route('blog.show', $post->slug) }}" style="color: var(--primary); text-decoration: none; font-weight: 600;">Leer más →</a>
        </div>
        @endforeach
    </div>
</section>
@endsection
