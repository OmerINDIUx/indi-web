@extends('layouts.app')

@section('title', $post->title . ' | WG-INDI')

@section('content')
<article class="section">
    <div class="reveal" style="max-width: 800px; margin: 0 auto;">
        <p style="color: var(--primary); font-weight: 600; margin-bottom: 1rem;">{{ $post->created_at->format('d M, Y') }}</p>
        <h1 style="font-size: 3.5rem; margin-bottom: 2rem; line-height: 1.2;">{{ $post->title }}</h1>
        
        @if($post->thumbnail)
            <div class="glass" style="width: 100%; height: 400px; border-radius: 20px; margin-bottom: 3rem; overflow: hidden;">
                <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        @endif

        <div style="font-size: 1.25rem; line-height: 1.8; color: var(--text-muted);">
            {!! nl2br(e($post->content)) !!}
        </div>

        <div style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.1);">
            <a href="{{ route('blog.index') }}" style="color: white; text-decoration: none;">← Volver al Blog</a>
        </div>
    </div>
</article>
@endsection
