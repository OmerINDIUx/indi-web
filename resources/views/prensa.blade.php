@extends('layouts.app')

@section('title', 'PRENSA | INDI')

@section('content')
    <!-- Prensa Hero Section -->
    <header class="indi-hero prensa-main-hero" style="background-image: url('{{ \App\Support\CmsMedia::url('press.hero.image', 'imagenes_indi/Maritimo/a-terminal-portuaria-puerto-veracruz - copia.webp') }}');">
        <div class="indi-hero-content">
            <h1 class="indi-heading hero-typer-text" style="color: white; text-shadow: 0 10px 30px rgba(0,0,0,0.5); font-family: 'usual', sans-serif;">
                {{ \App\Support\CmsText::get('press.title', 'CONOCE LAS ULTIMAS NOTICIAS DE INDI') }}
            </h1>
        </div>
        
        <!-- Notched bottom divider -->
        <div class="indi-notch-divider" style="bottom: 0; top: auto; transform: translateY(1px);">
            <svg viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path fill="white" d="M 0 100 V 60 H 150 C 180 60 190 0 200 0 H 800 C 810 0 820 60 850 60 H 1000 V 100 Z" />
            </svg>
        </div>
    </header>

    <div class="prensa-page-wrap" style="background: white; position: relative; z-index: 20;">
        
        <!-- Featured Article Section -->
        @if($featured)
        <section class="prensa-featured-section">
            <div class="indi-container">
                <div class="featured-row">
                    <div class="featured-visual notched-frame">
                        @if($featured->thumbnail)
                            <img src="{{ asset('storage/' . $featured->thumbnail) }}" alt="{{ $featured->localized_title }}">
                        @else
                            <img src="{{ asset('imagenes_indi/infraestructura/Tren-Maya-Tramos-3-y-5-a - copia.jpg') }}" alt="{{ $featured->localized_title }}">
                        @endif
                    </div>
                    <div class="featured-info">
                        <span class="featured-cat" style="text-transform: uppercase;">
                            {{ \App\Support\CmsText::get('category.' . $featured->category, __('site.categories.' . $featured->category)) }}
                        </span>
                        <h2 class="featured-title">{{ $featured->localized_title }}</h2>
                        <div style="display: flex; gap: 10px; margin-bottom: 2rem;">
                            <span class="blog-tag {{ $featured->category }}" style="border-radius: 4px; text-transform: uppercase;">
                                {{ \App\Support\CmsText::get('category.' . $featured->category, __('site.categories.' . $featured->category)) }}
                            </span>
                        </div>
                        <a href="{{ route('prensa.show', $featured->localized_slug) }}" class="blog-read-btn" style="border-radius: 50px; padding: 1rem 3rem;">{{ \App\Support\CmsText::get('press.read', 'LEER ARTICULO') }}</a>
                    </div>
                </div>
            </div>
        </section>
        @endif

        <div class="indi-container" style="padding-top: 2rem;">
            <!-- Search Bar -->
            <div class="prensa-search-bar">
                <input type="text" class="prensa-search-input" placeholder="{{ \App\Support\CmsText::get('press.search', 'BUSCA, NOSOTROS TE EXPLICAMOS') }}">
            </div>

            <!-- Filters -->
            <div class="prensa-filters" style="text-align: center; margin-bottom: 4rem;">
                <span class="filter-label" style="display: block; font-family: 'usual', sans-serif; font-weight: 700; font-size: 0.8rem; color: #888; letter-spacing: 0.2em; margin-bottom: 1.5rem;">{{ \App\Support\CmsText::get('press.filter', 'FILTRAR POR UNIDADES DE NEGOCIO') }}</span>
                <div class="filter-group" id="filterLinks">
                    <button class="filter-pill active" data-filter="all">{{ \App\Support\CmsText::get('category.all', __('site.categories.all')) }}</button>
                    <button class="filter-pill maritimo" data-filter="maritimo">{{ \App\Support\CmsText::get('category.maritimo', __('site.categories.maritimo')) }}</button>
                    <button class="filter-pill construccion" data-filter="construccion">{{ \App\Support\CmsText::get('category.construccion', __('site.categories.construccion')) }}</button>
                    <button class="filter-pill infraestructura" data-filter="infraestructura">{{ \App\Support\CmsText::get('category.infraestructura', __('site.categories.infraestructura')) }}</button>
                    <button class="filter-pill ferroviario" data-filter="ferroviario">{{ \App\Support\CmsText::get('category.ferroviario', __('site.categories.ferroviario')) }}</button>
                </div>
            </div>

            <!-- News Grid -->
            <div id="newsGrid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 3rem; margin-top: 4rem; padding-bottom: 10rem;">
                @forelse($posts ?? [] as $post)
                    <!-- Card Dynamic -->
                    <div class="blog-card" data-categories="{{ $post->category }}" style="border: 1px solid #f0f0f0;">
                        <div class="blog-tags">
                            <span class="blog-tag {{ $post->category }}">
                                {{ \App\Support\CmsText::get('category.' . $post->category, __('site.categories.' . $post->category)) }}
                            </span>
                        </div>
                        <span class="blog-date">{{ $post->created_at->format('d . M . Y') }}</span>
                        <h4 class="blog-title">{{ $post->localized_title }}</h4>
                        <div class="blog-footer">
                            <a href="{{ route('prensa.show', $post->localized_slug) }}" class="blog-read-btn">{{ \App\Support\CmsText::get('press.read', 'LEER ARTICULO') }}</a>
                        </div>
                        <div class="indi-card-notch">
                            @if($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->localized_title }}">
                            @else
                                @if($post->category === 'maritimo')
                                    <img src="{{ asset('imagenes_indi/Maritimo/Rompe-Olas-Salina-Cruz-Oaxaca-3 - copia.jpg') }}" alt="{{ $post->localized_title }}">
                                @elseif($post->category === 'ferroviario')
                                    <img src="{{ asset('imagenes_indi/infraestructura/Tren-Maya-Tramos-3-y-5-a - copia.jpg') }}" alt="{{ $post->localized_title }}">
                                @elseif($post->category === 'infraestructura')
                                    <img src="{{ asset('imagenes_indi/infraestructura/mexibus-lineas-1-2-cdmx - copia.webp') }}" alt="{{ $post->localized_title }}">
                                @else
                                    <img src="{{ asset('imagenes_indi/Construccion/senado-de-la-republica-panoramica - copia.jpg') }}" alt="{{ $post->localized_title }}">
                                @endif
                            @endif
                        </div>
                    </div>
                @empty
                    @if(!$featured)
                        <div style="grid-column: 1 / -1; text-align: center; padding: 8rem 0; font-family: 'usual', sans-serif; color: #666; width: 100%;">
                            <h3>{{ \App\Support\CmsText::get('press.coming_soon_title', 'PROXIMAMENTE MAS NOTICIAS') }}</h3>
                            <p style="margin-top: 1rem;">{{ \App\Support\CmsText::get('press.coming_soon_text', 'Estamos preparando nuevos articulos y novedades de INDI.') }}</p>
                        </div>
                    @endif
                @endforelse
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-pill');
            const searchInput = document.querySelector('.prensa-search-input');
            const cards = document.querySelectorAll('.blog-card');
            const filterLinks = document.getElementById('filterLinks');
            let activeFilter = 'all';

            // Helper to remove accents and normalize special characters (Λ -> A, Ξ -> E)
            function normalizeText(text) {
                if (!text) return '';
                return text.toLowerCase()
                    .replace(/[áäâà]/g, 'a')
                    .replace(/[éëêè]/g, 'e')
                    .replace(/[íïîì]/g, 'i')
                    .replace(/[óöôò]/g, 'o')
                    .replace(/[úüûù]/g, 'u')
                    .replace(/λ/g, 'a') 
                    .replace(/ξ/g, 'e')
                    .replace(/λ/g, 'a')
                    .replace(/Λ/g, 'a') 
                    .replace(/Ξ/g, 'e')
                    .normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            }

            function filterNews() {
                const searchTerm = normalizeText(searchInput.value);
                
                cards.forEach(card => {
                    const categories = card.getAttribute('data-categories');
                    const titleElement = card.querySelector('.blog-title');
                    const titleText = normalizeText(titleElement.innerText);
                    
                    const matchesFilter = activeFilter === 'all' || categories.includes(activeFilter);
                    const matchesSearch = searchTerm === '' || titleText.includes(searchTerm);

                    if (matchesFilter && matchesSearch) {
                        card.style.display = 'flex';
                        card.style.opacity = '1';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            function setFilterNotchX(value) {
                if (!filterLinks) return;

                if (typeof gsap !== 'undefined') {
                    gsap.to(filterLinks, {
                        '--notch-x': value,
                        duration: 0.6,
                        ease: "power2.out"
                    });
                    return;
                }

                filterLinks.style.setProperty('--notch-x', value);
            }

            function updateFilterNotch(button) {
                if (!button || !filterLinks || window.innerWidth <= 720) return;

                const buttonRect = button.getBoundingClientRect();
                const containerRect = filterLinks.getBoundingClientRect();
                const x = buttonRect.left - containerRect.left + buttonRect.width / 2;
                const xPercent = (x / containerRect.width) * 100;

                setFilterNotchX(`${xPercent}%`);
            }

            filterButtons.forEach(button => {
                button.addEventListener('mouseenter', () => updateFilterNotch(button));

                button.addEventListener('click', () => {
                    filterButtons.forEach(b => b.classList.remove('active'));
                    button.classList.add('active');
                    activeFilter = button.getAttribute('data-filter');
                    updateFilterNotch(button);
                    filterNews();
                });
            });

            if (filterLinks) {
                filterLinks.addEventListener('mouseleave', () => {
                    const activeButton = document.querySelector('.filter-pill.active');
                    if (activeButton) updateFilterNotch(activeButton);
                });
            }

            if (searchInput) {
                searchInput.addEventListener('input', filterNews);
            }

            setTimeout(() => {
                const activeButton = document.querySelector('.filter-pill.active');
                if (activeButton) updateFilterNotch(activeButton);
            }, 250);

            window.addEventListener('resize', () => {
                const activeButton = document.querySelector('.filter-pill.active');
                if (activeButton) updateFilterNotch(activeButton);
            });
        });
    </script>

    <!-- Insert premium styled overrides for Prensa -->
    <style>
    /* Hero Typography */
    .hero-typer-text .hero-line:nth-child(2),
    .hero-typer-text .hero-line:nth-child(2) * {
        color: var(--indi-blue) !important;
    }

    /* Featured Article Section overrides */
    .prensa-featured-section {
        padding: 8rem 0;
        background: #fff;
    }

    .featured-row {
        display: flex;
        gap: 4rem;
        align-items: center;
    }

    .featured-visual {
        flex: 1.2;
        height: 500px;
        position: relative;
        overflow: hidden;
    }

    .featured-visual.notched-frame {
        clip-path: polygon(0 0, 22% 0, 30% 5%, 58% 5%, 66% 0, 100% 0, 100% 100%, 0 100%) !important;
    }

    .featured-visual img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 1s ease;
    }

    .featured-visual:hover img {
        transform: scale(1.05);
    }

    .featured-info {
        flex: 1;
    }

    .featured-cat {
        font-family: 'usual', sans-serif;
        font-weight: 700;
        font-size: 0.8rem;
        color: var(--indi-blue);
        margin-bottom: 1.5rem;
        display: block;
        letter-spacing: 0.2rem;
    }

    .featured-title {
        font-family: 'usual', sans-serif;
        font-size: clamp(2rem, 4vw, 3.2rem);
        line-height: 1.1;
        font-weight: 700;
        margin-bottom: 2rem;
        color: #000;
    }

    /* Search bar aligned to platform identity */
    .prensa-search-bar {
        width: 100%;
        max-width: 800px;
        margin: 4rem auto;
        position: relative;
        padding: 0;
        background: #fff;
        border: 1px solid var(--indi-border);
        clip-path: none;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.04);
        transition: border-color 0.4s ease, box-shadow 0.4s ease;
    }

    .prensa-search-bar:hover, .prensa-search-bar:focus-within {
        border-color: rgba(0, 102, 255, 0.35);
        box-shadow: 0 16px 34px rgba(0, 102, 255, 0.08);
    }

    .prensa-search-input {
        width: 100%;
        padding: 1.3rem 2.2rem;
        border: none !important;
        background: #fff !important;
        font-family: 'usual', sans-serif;
        font-size: 1.05rem;
        color: #111;
        clip-path: none;
        box-shadow: none;
        transition: all 0.4s ease;
        letter-spacing: 0.1em;
    }

    .prensa-search-input:focus {
        outline: none;
        background: #ffffff !important;
        box-shadow: none;
    }

    .prensa-search-input::placeholder {
        color: var(--indi-text-muted);
    }

    /* Filters aligned to menu identity */
    .filter-group {
        display: flex;
        justify-content: center;
        align-items: stretch;
        gap: 0;
        flex-wrap: nowrap;
        width: min(100%, 988px);
        margin: 0 auto;
        padding: 0 1.75rem;
        min-height: 64px;
        background: var(--indi-blue);
        --notch-x: 50%;
        --notch-w: 80px;
        clip-path: polygon(
            0% 0%,
            100% 0%,
            100% 100%,
            calc(var(--notch-x) + (var(--notch-w) / 2) + 20px) 100%,
            calc(var(--notch-x) + (var(--notch-w) / 2)) 88%,
            calc(var(--notch-x) - (var(--notch-w) / 2)) 88%,
            calc(var(--notch-x) - (var(--notch-w) / 2) - 20px) 100%,
            0% 100%
        );
        overflow-x: auto;
        overflow-y: hidden;
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .filter-group::-webkit-scrollbar {
        display: none;
    }

    .filter-pill {
        min-width: 150px;
        padding: 0 1.5rem;
        border: none !important;
        border-radius: 0 !important;
        background: transparent !important;
        cursor: pointer;
        font-family: 'usual', sans-serif;
        font-weight: 700;
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.7) !important;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1) !important;
        clip-path: none;
        position: relative;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        height: 64px;
        flex: 1 0 auto;
    }

    .filter-pill:hover,
    .filter-pill.active,
    .filter-pill.maritimo:hover,
    .filter-pill.maritimo.active,
    .filter-pill.construccion:hover,
    .filter-pill.construccion.active,
    .filter-pill.infraestructura:hover,
    .filter-pill.infraestructura.active,
    .filter-pill.ferroviario:hover,
    .filter-pill.ferroviario.active,
    .filter-pill[data-filter="all"]:hover,
    .filter-pill[data-filter="all"].active {
        background: transparent !important;
        color: #fff !important;
        box-shadow: none !important;
        border-color: transparent !important;
    }

    .filter-pill.active::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 58px;
        height: 3px;
        background: #fff;
    }

    /* Grid & Cards Redesign */
    #newsGrid {
        display: grid !important;
        grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
        gap: 2.5rem !important;
        align-items: start;
    }

    /* Keep the press heading clear of the compact logo on medium desktops. */
    @media (min-width: 1081px) and (max-width: 1280px) {
        .prensa-page-wrap .indi-container {
            width: auto;
            max-width: none;
            margin-left: 6.75rem;
            margin-right: 3rem;
        }

        .prensa-main-hero .indi-hero-content {
            align-self: stretch;
            width: auto;
            padding-left: 6.75rem;
            padding-right: 4rem;
            box-sizing: border-box;
        }

        .prensa-main-hero h1 {
            font-size: clamp(2.8rem, 5vw, 4rem);
            max-width: 60rem;
        }
    }

    .blog-card {
        background: #ffffff;
        padding: 2.5rem 2rem !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 0 !important;
        border-left: none !important;
        clip-path: polygon(0 0, calc(100% - 20px) 0, 100% 20px, 100% 100%, 0 100%) !important;
        position: relative !important;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1) !important;
        display: flex;
        flex-direction: column;
        height: 100%;
        box-shadow: none !important;
        overflow: hidden;
    }

    .blog-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: #0066f9;
        transform: scaleY(0);
        transform-origin: bottom;
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .blog-card:hover {
        transform: translateY(-8px) !important;
        border-color: #0066f9 !important;
        box-shadow: 0 20px 40px rgba(0, 102, 249, 0.1) !important;
    }

    .blog-card:hover::before {
        transform: scaleY(1);
    }

    .blog-card[data-categories*="maritimo"]:hover::before { background: #0066f9; }
    .blog-card[data-categories*="construccion"]:hover::before { background: #ffa608; }
    .blog-card[data-categories*="infraestructura"]:hover::before { background: #64b032; }
    .blog-card[data-categories*="ferroviario"]:hover::before { background: #ff3000; }

    .blog-card .blog-title {
        color: #1a202c !important;
        font-family: 'usual', sans-serif !important;
        font-weight: 700 !important;
        font-size: 1.3rem !important;
        margin-bottom: 1.5rem !important;
        letter-spacing: 0.05em !important;
        line-height: 1.3 !important;
        min-height: 3.6rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .blog-card .blog-date {
        font-family: 'usual', sans-serif !important;
        font-size: 0.8rem !important;
        color: #888 !important;
        letter-spacing: 0.1em;
        margin-bottom: 0.8rem !important;
    }

    .blog-card .blog-footer {
        display: flex;
        justify-content: flex-end;
        margin-top: auto;
        margin-bottom: 1.5rem;
    }

    .blog-card .blog-read-btn {
        border-radius: 4px !important;
        background: #0066f9 !important;
        color: #fff !important;
        border: none !important;
        padding: 0.6rem 1.6rem !important;
        font-size: 0.8rem !important;
        font-weight: 700 !important;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        clip-path: none !important;
        transition: all 0.3s ease !important;
        display: inline-block;
        text-decoration: none;
    }

    .blog-card:hover .blog-read-btn {
        background: #000000 !important;
        box-shadow: 0 0 10px rgba(0, 102, 249, 0.5) !important;
    }

    /* Image frame inside news card */
    .blog-card .indi-card-notch {
        width: calc(100% + 4rem) !important;
        max-width: none !important;
        margin-left: -2rem !important;
        margin-right: -2rem !important;
        margin-top: 1.5rem !important;
        clip-path: polygon(0 0, 30% 0, 36% 6%, 64% 6%, 70% 0, 100% 0, 100% 100%, 0 100%) !important;
        height: 220px !important;
        border-radius: 0 !important;
    }

    .blog-card .indi-card-notch img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Responsive adjustments */
    @media (max-width: 1080px) {
        .featured-row {
            flex-direction: column;
            gap: 3rem;
            align-items: center;
            text-align: center;
        }
        .featured-visual {
            width: 100%;
            max-width: 600px;
            height: 380px !important;
        }
        #newsGrid {
            grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
        }
        .featured-info {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    }

    @media (max-width: 720px) {
        .prensa-featured-section {
            padding: 5rem 0;
        }
        .featured-visual {
            height: 280px !important;
        }
        .filter-group {
            justify-content: flex-start;
            width: 100%;
            min-height: 56px;
            padding: 0 1rem;
            clip-path: none;
        }
        .filter-pill {
            min-width: 138px;
            padding: 0 1rem;
            font-size: 0.7rem;
            height: 56px;
        }
        #newsGrid {
            grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            gap: 1.5rem !important;
        }
    }

    @media (max-width: 500px) {
        .prensa-featured-section {
            padding: 3rem 0;
        }
        .featured-title {
            font-size: 1.8rem;
        }
        .featured-visual {
            height: 200px !important;
        }
        .prensa-search-input {
            padding: 1.1rem 1.6rem;
            font-size: 0.95rem;
        }
        #newsGrid {
            grid-template-columns: minmax(0, 1fr) !important;
        }
    }

    /* Carril seguro permanente para el logotipo fijo en toda la portada. */
    @media (min-width: 821px) {
        .prensa-page-wrap .indi-container {
            width: auto;
            max-width: 1440px;
            margin-left: max(7.5rem, calc((100vw - 1440px) / 2));
            margin-right: max(5vw, calc((100vw - 1440px) / 2));
        }

        .prensa-main-hero .indi-hero-content {
            align-self: stretch;
            width: auto;
            padding-left: max(0px, calc(7.5rem - 5vw));
            padding-right: 0;
            box-sizing: border-box;
        }
    }

    @media (max-width: 820px) {
        .prensa-page-wrap .indi-container {
            width: auto;
            margin-left: 6rem;
            margin-right: 4vw;
        }

        .prensa-main-hero .indi-hero-content {
            align-self: stretch;
            width: auto;
            padding-left: max(0px, calc(6rem - 5vw));
            padding-right: 0;
            box-sizing: border-box;
        }
    }
    </style>
@endsection
