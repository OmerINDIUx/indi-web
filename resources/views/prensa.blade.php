@extends('layouts.app')

@section('title', 'PRENSA | GRUPO INDI')

@section('content')
    <!-- Prensa Hero Section -->
    <section class="prensa-hero">
        <img src="{{ asset('imagenes_indi/Maritimo/a-terminal-portuaria-puerto-veracruz - copia.webp') }}" class="prensa-hero-bg" alt="Hero Background">
        <div class="indi-container prensa-hero-content">
            <h1 class="indi-heading" style="color: white; font-size: clamp(2.5rem, 5vw, 4.5rem); line-height: 1;">
                CONOCΞ LΛS ÚLTIMΛS<br>NOTICIΛS DΞ GRUPO INDI
            </h1>
        </div>
        
        <!-- Notched bottom divider -->
        <div class="indi-notch-divider" style="bottom: 0; top: auto; transform: translateY(1px);">
            <svg viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path fill="white" d="M 0 100 V 60 H 150 C 180 60 190 0 200 0 H 800 C 810 0 820 60 850 60 H 1000 V 100 Z" />
            </svg>
        </div>
    </section>

    <div class="prensa-page-wrap" style="background: white; position: relative; z-index: 20;">
        
        <!-- Featured Article Section -->
        <section class="prensa-featured-section">
            <div class="indi-container">
                <div class="featured-row">
                    <div class="featured-visual">
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
@endsection
