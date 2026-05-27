@extends('layouts.app')

@section('title', $post->title . ' | GRUPO INDI')

@section('content')
<style>
    :root {
        --indi-orange: #FF4D00;
    }

    /* Article Hero */
    .article-hero {
        height: 60vh;
        min-height: 500px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        overflow: hidden;
    }

    .article-hero-bg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
    }

    .article-hero-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.4);
        z-index: 2;
    }

    .article-hero-content {
        position: relative;
        z-index: 10;
        max-width: 900px;
        padding: 0 2rem;
    }

    .article-category-tag {
        border: 2px solid var(--indi-blue);
        color: var(--indi-blue);
        padding: 0.5rem 2.5rem;
        font-family: 'usual', sans-serif;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 0.3em;
        display: inline-block;
        margin-bottom: 2rem;
        text-transform: uppercase;
        border-radius: 4px;
        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(5px);
    }

    .article-main-title {
        font-family: 'usual', sans-serif;
        font-weight: 700;
        font-size: clamp(2rem, 5vw, 4rem);
        line-height: 1.1;
        margin: 0;
        text-transform: uppercase;
    }

    /* Article Layout */
    .article-container {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 5rem;
        padding: 8rem 0;
        align-items: start;
    }

    /* Content Column */
    .article-body {
        font-family: 'usual', sans-serif;
        font-size: 1.1rem;
        line-height: 1.8;
        color: #333;
    }

    .article-body h2 {
        font-family: 'usual', sans-serif;
        font-weight: 700;
        font-size: 1.8rem;
        margin: 3rem 0 1.5rem;
        color: #000;
    }

    .article-body p {
        margin-bottom: 2rem;
    }

    .article-body b, .article-body strong {
        color: #000;
        font-weight: 600;
    }

    .article-inline-image {
        width: 100%;
        margin: 4rem 0;
        border-radius: 4px;
        overflow: hidden;
    }

    .article-inline-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .article-quote, .article-body blockquote {
        border-left: 4px solid var(--indi-blue);
        padding-left: 2rem;
        margin: 4rem 0;
        font-style: italic;
        font-size: 1.4rem;
        color: #555;
        line-height: 1.5;
    }

    /* Sidebar Column */
    .article-sidebar {
        position: sticky;
        top: 120px;
    }

    .sidebar-section-title {
        font-family: 'usual', sans-serif;
        font-weight: 700;
        font-size: 0.9rem;
        color: var(--indi-blue);
        letter-spacing: 0.2em;
        margin-bottom: 3rem;
        display: block;
        border-bottom: 1px solid #eee;
        padding-bottom: 1rem;
    }

    .sidebar-cards-stack {
        display: flex;
        flex-direction: column;
        gap: 3rem;
    }

    /* Prensa Cards in Sidebar (Mini Version) */
    .article-sidebar .blog-card {
        padding: 2rem 1.5rem;
        border: 1px solid #f0f0f0;
        box-shadow: none !important;
        transform: none !important;
        background: #fff;
    }
    
    .article-sidebar .blog-title {
        min-height: auto;
        font-family: 'usual', sans-serif !important;
        font-size: 1.15rem !important;
        font-weight: 700 !important;
        color: #111 !important;
        margin-bottom: 1rem !important;
    }

    .article-sidebar .blog-tag {
        font-size: 0.7rem !important;
        padding: 0.3rem 0.6rem !important;
    }

    .article-sidebar .blog-read-btn {
        padding: 0.4rem 1rem !important;
        font-size: 0.75rem !important;
    }

    .article-sidebar .indi-card-notch {
        height: 130px !important;
        margin-top: 1rem !important;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .article-container {
            grid-template-columns: 1fr;
            gap: 4rem;
        }
        .article-sidebar {
            position: static;
        }
    }

    @media (max-width: 768px) {
        .article-main-title {
            font-size: 2.5rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="article-hero">
    @if($post->thumbnail)
        <img src="{{ asset('storage/' . $post->thumbnail) }}" class="article-hero-bg" alt="{{ $post->title }}">
    @else
        @if($post->category === 'maritimo')
            <img src="{{ asset('imagenes_indi/Maritimo/Rompe-Olas-Salina-Cruz-Oaxaca-3 - copia.jpg') }}" class="article-hero-bg" alt="{{ $post->title }}">
        @elseif($post->category === 'ferroviario')
            <img src="{{ asset('imagenes_indi/infraestructura/Tren-Maya-Tramos-3-y-5-a - copia.jpg') }}" class="article-hero-bg" alt="{{ $post->title }}">
        @elseif($post->category === 'infraestructura')
            <img src="{{ asset('imagenes_indi/infraestructura/mexibus-lineas-1-2-cdmx - copia.webp') }}" class="article-hero-bg" alt="{{ $post->title }}">
        @else
            <img src="{{ asset('imagenes_indi/Construccion/senado-de-la-republica-panoramica - copia.jpg') }}" class="article-hero-bg" alt="{{ $post->title }}">
        @endif
    @endif
    <div class="article-hero-overlay"></div>
    <div class="article-hero-content">
        <span class="article-category-tag">
            @if($post->category === 'maritimo') MΛRÍTIMO @elseif($post->category === 'construccion') CONSTRUCCIÓN @elseif($post->category === 'infraestructura') INFRΛΞSTRUCTURΛ @elseif($post->category === 'ferroviario') FΞRROVIΛRIO @else {{ $post->category }} @endif
        </span>
        <h1 class="article-main-title">{{ $post->title }}</h1>
    </div>
</section>

<div class="indi-container">
    <div class="article-container">
        <!-- Main Content -->
        <article class="article-body">
            <p><b>{{ $post->created_at->format('d . M . Y') }}</b> — {!! $post->content !!}</p>
        </article>

        <!-- Sidebar -->
        <aside class="article-sidebar">
            <span class="sidebar-section-title">ÚLTIMOS ΛRTÍCULOS</span>
            
            <div class="sidebar-cards-stack">
                @forelse($latest ?? [] as $late)
                    <!-- Card Mini Dynamic -->
                    <div class="blog-card" data-categories="{{ $late->category }}">
                        <div class="blog-tags" style="margin-bottom: 0.8rem;">
                            <span class="blog-tag {{ $late->category }}">
                                @if($late->category === 'maritimo') MΛRÍTIMO @elseif($late->category === 'construccion') CONSTRUCCIÓN @elseif($late->category === 'infraestructura') INFRΛΞSTRUCTURΛ @elseif($late->category === 'ferroviario') FΞRROVIΛRIO @else {{ $late->category }} @endif
                            </span>
                        </div>
                        <span class="blog-date" style="font-size: 0.75rem; color: #888;">{{ $late->created_at->format('d . M . Y') }}</span>
                        <h4 class="blog-title">{{ $late->title }}</h4>
                        <div class="blog-footer">
                            <a href="{{ route('prensa.show', $late->slug) }}" class="blog-read-btn">LΞΞR ΛRTÍCULO</a>
                        </div>
                        <div class="indi-card-notch">
                            @if($late->thumbnail)
                                <img src="{{ asset('storage/' . $late->thumbnail) }}" alt="{{ $late->title }}">
                            @else
                                @if($late->category === 'maritimo')
                                    <img src="{{ asset('imagenes_indi/Maritimo/Rompe-Olas-Salina-Cruz-Oaxaca-3 - copia.jpg') }}" alt="{{ $late->title }}">
                                @elseif($late->category === 'ferroviario')
                                    <img src="{{ asset('imagenes_indi/infraestructura/Tren-Maya-Tramos-3-y-5-a - copia.jpg') }}" alt="{{ $late->title }}">
                                @elseif($late->category === 'infraestructura')
                                    <img src="{{ asset('imagenes_indi/infraestructura/mexibus-lineas-1-2-cdmx - copia.webp') }}" alt="{{ $late->title }}">
                                @else
                                    <img src="{{ asset('imagenes_indi/Construccion/senado-de-la-republica-panoramica - copia.jpg') }}" alt="{{ $late->title }}">
                                @endif
                            @endif
                        </div>
                    </div>
                @empty
                    <p style="font-family: 'usual', sans-serif; font-size: 0.9em; color: #888; text-align: center;">No hay otros artículos recientes.</p>
                @endforelse
            </div>
        </aside>
    </div>
</div>
@endsection
