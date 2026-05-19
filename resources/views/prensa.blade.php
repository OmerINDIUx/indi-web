@extends('layouts.app')

@section('title', 'PRENSA | GRUPO INDI')

@section('content')
    <!-- Prensa Hero Section -->
    <header class="indi-hero" style="background-image: url('{{ asset('imagenes_indi/Maritimo/a-terminal-portuaria-puerto-veracruz - copia.webp') }}');">
        <div class="indi-hero-content">
            <h1 class="indi-heading hero-typer-text" style="color: white; text-shadow: 0 10px 30px rgba(0,0,0,0.5); font-family: 'usual', sans-serif;">
                CONOCΞ LΛS ÚLTIMΛS<br>NOTICIΛS DΞ GRUPO INDI
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
        <section class="prensa-featured-section">
            <div class="indi-container">
                <div class="featured-row">
                    <div class="featured-visual notched-frame">
                        <img src="{{ asset('imagenes_indi/infraestructura/Tren-Maya-Tramos-3-y-5-a - copia.jpg') }}" alt="Tren Maya Featured">
                    </div>
                    <div class="featured-info">
                        <span class="featured-cat">CONSTRUCCIÓN</span>
                        <h2 class="featured-title">DESCUBRΞ LΛ INGENIERÍΛ ΛTRÁS DΞ TRΛMO 3 Y 5 DΞL TRΞN MΛYΛ</h2>
                        <div style="display: flex; gap: 10px; margin-bottom: 2rem;">
                            <span class="blog-tag ferroviario" style="border-radius: 4px;">FERROVIΛRIO</span>
                        </div>
                        <a href="#" class="blog-read-btn" style="border-radius: 50px; padding: 1rem 3rem;">LΞΞR ΛRTÍCULO</a>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="prensa-search-bar">
                    <input type="text" class="prensa-search-input" placeholder="BUSCΛ, NOSOTROS TΞ ΞXPLICΛMOS">
                </div>

                <!-- Filters -->
                <div class="prensa-filters">
                    <span class="filter-label">FILTRΛR POR UNIDΛDΞS DΞ NEGOCIO</span>
                    <div class="filter-group">
                        <button class="filter-pill active" data-filter="all">TODOS</button>
                        <button class="filter-pill maritimo" data-filter="maritimo">MΛRÍTIMO</button>
                        <button class="filter-pill construccion" data-filter="construccion">CONSTRUCCIÓN</button>
                        <button class="filter-pill infraestructura" data-filter="infraestructura">INFRΛΞSTRUCTURΛ</button>
                        <button class="filter-pill ferroviario" data-filter="ferroviario">FΞRROVIΛRIO</button>
                    </div>
                </div>

                <!-- News Grid -->
                <div id="newsGrid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 3rem; margin-top: 4rem; padding-bottom: 10rem;">
                    
                    <!-- Card 01 -->
                    <div class="blog-card" data-categories="maritimo construccion" style="border: 1px solid #f0f0f0;">
                        <div class="blog-tags">
                            <span class="blog-tag maritimo">MΛRÍTIMO</span>
                            <span class="blog-tag construccion">CONSTRUCCIÓN</span>
                        </div>
                        <span class="blog-date">25 . FΞB . 2024</span>
                        <h4 class="blog-title">DESCUBRΞ LΛ LOGÍSTICΛ DΞTRÁS DΞ UN ROMPΞOLΛS</h4>
                        <div class="blog-footer">
                            <a href="{{ route('prensa.articulo') }}" class="blog-read-btn">LΞΞR ΛRTÍCULO</a>
                        </div>
                        <div class="indi-card-notch">
                            <img src="{{ asset('imagenes_indi/Maritimo/Rompe-Olas-Salina-Cruz-Oaxaca-3 - copia.jpg') }}" alt="Noticia 1">
                        </div>
                    </div>

                    <!-- Card 02 -->
                    <div class="blog-card" data-categories="ferroviario infraestructura" style="border: 1px solid #f0f0f0;">
                        <div class="blog-tags">
                            <span class="blog-tag ferroviario">FΞRROVIΛRIO</span>
                            <span class="blog-tag infraestructura">INFRΛΞSTRUCTURΛ</span>
                        </div>
                        <span class="blog-date">20 . FΞB . 2024</span>
                        <h4 class="blog-title">TΞCNOLOGÍΛ INDI ΞN ΞL SURΞSTΞ MΞXICΛNO</h4>
                        <div class="blog-footer">
                            <a href="#" class="blog-read-btn">LΞΞR ΛRTÍCULO</a>
                        </div>
                        <div class="indi-card-notch">
                            <img src="{{ asset('imagenes_indi/infraestructura/mexibus-lineas-1-2-cdmx - copia.webp') }}" alt="Noticia 2">
                        </div>
                    </div>

                    <!-- Card 03 -->
                    <div class="blog-card" data-categories="construccion infraestructura" style="border: 1px solid #f0f0f0;">
                        <div class="blog-tags">
                            <span class="blog-tag construccion">CONSTRUCCIÓN</span>
                            <span class="blog-tag infraestructura">INFRΛΞSTRUCTURΛ</span>
                        </div>
                        <span class="blog-date">15 . FΞB . 2024</span>
                        <h4 class="blog-title">NUΞVΛS DRΛGΛS DΞ SUCCIÓN DΞ ΛLTΛ CΛPΛCIDΛD</h4>
                        <div class="blog-footer">
                            <a href="#" class="blog-read-btn">LΞΞR ΛRTÍCULO</a>
                        </div>
                        <div class="indi-card-notch">
                            <img src="{{ asset('imagenes_indi/Maritimo/muelle-lerma-campeche - copia.webp') }}" alt="Noticia 3">
                        </div>
                    </div>

                    <!-- Card 04 (Extra to show grid) -->
                    <div class="blog-card" data-categories="maritimo" style="border: 1px solid #f0f0f0;">
                        <div class="blog-tags">
                            <span class="blog-tag maritimo">MΛRÍTIMO</span>
                        </div>
                        <span class="blog-date">10 . FΞB . 2024</span>
                        <h4 class="blog-title">EXPΛNSIÓN PORTUΛRIΛ ΞN LÁZΛRO CÁRDΞNΛS</h4>
                        <div class="blog-footer">
                            <a href="#" class="blog-read-btn">LΞΞR ΛRTÍCULO</a>
                        </div>
                        <div class="indi-card-notch">
                            <img src="{{ asset('imagenes_indi/Maritimo/contenedores-muelle-lazaro-cardenas.webp') }}" alt="Noticia 4">
                        </div>
                    </div>

                     <!-- Card 05 -->
                     <div class="blog-card" data-categories="infraestructura" style="border: 1px solid #f0f0f0;">
                        <div class="blog-tags">
                            <span class="blog-tag infraestructura">INFRΛΞSTRUCTURΛ</span>
                        </div>
                        <span class="blog-date">05 . FΞB . 2024</span>
                        <h4 class="blog-title">MODΞRNIZΛCIÓN DΞ LΛ ΛDUΛNΛ DΞ RΞYNOSΛ</h4>
                        <div class="blog-footer">
                            <a href="#" class="blog-read-btn">LΞΞR ΛRTÍCULO</a>
                        </div>
                        <div class="indi-card-notch">
                            <img src="{{ asset('imagenes_indi/Construccion/Aduana-Modelo-Reynosa - copia.webp') }}" alt="Noticia 5">
                        </div>
                    </div>

                    <!-- Card 06 -->
                    <div class="blog-card" data-categories="construccion" style="border: 1px solid #f0f0f0;">
                        <div class="blog-tags">
                            <span class="blog-tag construccion">CONSTRUCCIÓN</span>
                        </div>
                        <span class="blog-date">01 . FΞB . 2024</span>
                        <h4 class="blog-title">ΛVΛNCΞS ΞN ΞL SΞNΛDO DΞ LΛ RΞPÚBLICΛ</h4>
                        <div class="blog-footer">
                            <a href="#" class="blog-read-btn">LΞΞR ΛRTÍCULO</a>
                        </div>
                        <div class="indi-card-notch">
                            <img src="{{ asset('imagenes_indi/Construccion/senado-de-la-republica-panoramica - copia.jpg') }}" alt="Noticia 6">
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-pill');
            const searchInput = document.querySelector('.prensa-search-input');
            const cards = document.querySelectorAll('.blog-card');
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
                    .replace(/λ/g, 'a') // Handles both cases if needed
                    .replace(/ξ/g, 'e')
                    .replace(/λ/g, 'a')
                    .replace(/Λ/g, 'a') // Real special chars
                    .replace(/Ξ/g, 'e')
                    .normalize("NFD").replace(/[\u0300-\u036f]/g, ""); // Remove other diacritics
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

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    filterButtons.forEach(b => b.classList.remove('active'));
                    button.classList.add('active');
                    activeFilter = button.getAttribute('data-filter');
                    filterNews();
                });
            });

            searchInput.addEventListener('input', filterNews);
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
        clip-path: polygon(10% 0, 100% 0, 100% 90%, 90% 100%, 0 100%, 0 10%) !important;
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

    /* Search Bar with Premium Glassmorphism */
    .prensa-search-bar {
        width: 100%;
        max-width: 800px;
        margin: 4rem auto;
        position: relative;
        padding: 2px;
        background: linear-gradient(90deg, rgba(0, 102, 249, 0.2) 0%, rgba(255, 184, 0, 0.2) 50%, rgba(0, 102, 249, 0.2) 100%);
        clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 15px, 100% 100%, 0 100%);
        transition: background 0.4s ease;
    }

    .prensa-search-bar:hover, .prensa-search-bar:focus-within {
        background: linear-gradient(90deg, #0066f9 0%, #ffa608 50%, #0066f9 100%);
    }

    .prensa-search-input {
        width: 100%;
        padding: 1.3rem 2.2rem;
        border: none !important;
        background: rgba(255, 255, 255, 0.8) !important;
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        font-family: 'usual', sans-serif;
        font-size: 1.05rem;
        color: #111;
        clip-path: polygon(0 0, calc(100% - 14px) 0, 100% 14px, 100% 100%, 0 100%);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
        transition: all 0.4s ease;
        letter-spacing: 0.1em;
    }

    .prensa-search-input:focus {
        outline: none;
        background: #ffffff !important;
        box-shadow: 0 20px 45px rgba(0, 102, 249, 0.1);
    }

    /* Filter Pills Redesign */
    .filter-group {
        display: flex;
        justify-content: center;
        gap: 1.2rem;
        flex-wrap: wrap;
    }

    .filter-pill {
        padding: 0.8rem 2.2rem;
        border: 1px solid rgba(229, 231, 235, 0.8) !important;
        border-radius: 0 !important; /* Remove generic pill curves */
        background: #fff;
        cursor: pointer;
        font-family: 'usual', sans-serif;
        font-weight: 700;
        font-size: 0.75rem;
        color: #444;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1) !important;
        clip-path: polygon(0 0, calc(100% - 8px) 0, 100% 8px, 100% 100%, 0 100%);
        position: relative;
        letter-spacing: 0.15em;
    }

    /* Hover effects with light neon glow corresponding to category colors */
    .filter-pill.maritimo:hover, .filter-pill.maritimo.active {
        border-color: #0066f9 !important;
        background: rgba(0, 102, 249, 0.05) !important;
        color: #0066f9 !important;
        box-shadow: 0 0 15px rgba(0, 102, 249, 0.2);
    }
    .filter-pill.construccion:hover, .filter-pill.construccion.active {
        border-color: #ffa608 !important;
        background: rgba(255, 166, 8, 0.05) !important;
        color: #ffa608 !important;
        box-shadow: 0 0 15px rgba(255, 166, 8, 0.2);
    }
    .filter-pill.infraestructura:hover, .filter-pill.infraestructura.active {
        border-color: #64b032 !important;
        background: rgba(100, 176, 50, 0.05) !important;
        color: #64b032 !important;
        box-shadow: 0 0 15px rgba(100, 176, 50, 0.2);
    }
    .filter-pill.ferroviario:hover, .filter-pill.ferroviario.active {
        border-color: #ff3000 !important;
        background: rgba(255, 48, 0, 0.05) !important;
        color: #ff3000 !important;
        box-shadow: 0 0 15px rgba(255, 48, 0, 0.2);
    }
    .filter-pill[data-filter="all"]:hover, .filter-pill[data-filter="all"].active {
        border-color: #0066f9 !important;
        background: rgba(0, 102, 249, 0.05) !important;
        color: #0066f9 !important;
        box-shadow: 0 0 15px rgba(0, 102, 249, 0.2);
    }

    /* Active solid accent strip on the bottom of active pills */
    .filter-pill.active::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: currentColor;
    }

    /* Grid & Cards Redesign */
    #newsGrid {
        display: grid !important;
        grid-template-columns: repeat(auto-fit, minmax(290px, 1fr)) !important;
        gap: 2.5rem !important;
    }

    .blog-card {
        background: #fff;
        padding: 2.5rem 2rem !important;
        border: 1px solid rgba(229, 231, 235, 0.7) !important;
        border-radius: 0 !important;
        border-left: 4px solid var(--indi-blue) !important; /* Left border corporate blue by default */
        clip-path: polygon(0 0, calc(100% - 20px) 0, 100% 20px, 100% 100%, 20px 100%, 0 calc(100% - 20px)) !important;
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1) !important;
        display: flex;
        flex-direction: column;
        height: 100%;
        position: relative;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.01) !important;
    }

    /* Category specific left border */
    .blog-card[data-categories*="maritimo"] { border-left-color: #0066f9 !important; }
    .blog-card[data-categories*="construccion"] { border-left-color: #ffa608 !important; }
    .blog-card[data-categories*="infraestructura"] { border-left-color: #64b032 !important; }
    .blog-card[data-categories*="ferroviario"] { border-left-color: #ff3000 !important; }

    .blog-card:hover {
        transform: translateY(-8px) !important;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.08) !important;
        border-color: rgba(0, 102, 249, 0.2) !important;
    }

    .blog-card .blog-title {
        font-family: 'usual', sans-serif !important;
        font-size: 1.35rem !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
        color: #171717 !important;
        margin-bottom: 1.5rem !important;
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

    .blog-card .blog-read-btn {
        background: transparent !important;
        color: var(--indi-blue) !important;
        border: 1px solid var(--indi-blue) !important;
        border-radius: 0 !important;
        padding: 0.6rem 1.6rem !important;
        font-size: 0.8rem !important;
        font-weight: 700 !important;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        clip-path: polygon(0 0, calc(100% - 6px) 0, 100% 6px, 100% 100%, 0 100%) !important;
        transition: all 0.3s ease !important;
        display: inline-block;
        text-decoration: none;
    }

    .blog-card:hover .blog-read-btn {
        background: var(--indi-blue) !important;
        color: #fff !important;
    }

    /* Customize the button borders based on category */
    .blog-card[data-categories*="construccion"] .blog-read-btn { border-color: #ffa608 !important; color: #ffa608 !important; }
    .blog-card[data-categories*="construccion"]:hover .blog-read-btn { background: #ffa608 !important; color: #fff !important; }

    .blog-card[data-categories*="infraestructura"] .blog-read-btn { border-color: #64b032 !important; color: #64b032 !important; }
    .blog-card[data-categories*="infraestructura"]:hover .blog-read-btn { background: #64b032 !important; color: #fff !important; }

    .blog-card[data-categories*="ferroviario"] .blog-read-btn { border-color: #ff3000 !important; color: #ff3000 !important; }
    .blog-card[data-categories*="ferroviario"]:hover .blog-read-btn { background: #ff3000 !important; color: #fff !important; }

    /* Image frame inside news card */
    .blog-card .indi-card-notch {
        margin-top: 1.5rem !important;
        clip-path: polygon(0 0, 90% 0, 100% 15%, 100% 100%, 10% 100%, 0 85%) !important;
        height: 220px !important;
        border-radius: 0 !important;
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
            gap: 0.8rem;
        }
        .filter-pill {
            padding: 0.6rem 1.5rem;
            font-size: 0.7rem;
        }
        #newsGrid {
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
    }
    </style>
@endsection
