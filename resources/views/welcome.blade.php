@extends('layouts.app')

@section('title', 'GRUPO INDI | Infraestructura y Tecnología')

@section('content')
    <!-- Hero Section -->
    <header class="indi-hero">
        <video autoplay muted loop playsinline id="heroVideo" class="hero-video">
            <source src="{{ asset('storage/video-indi.mp4') }}" type="video/mp4">
        </video>
        <div class="indi-hero-content">
            <h1 class="indi-heading indi-scroll-text" style="color: white; --indi-scroll-initial: white;">
                EMPRESΛ CON ΛLTΛ EXPERIENCIΛ EN<br>
                CONSTRUCCIÓN E INFRΛESTRUCTURΛ
            </h1>
        </div>
    </header>

    <div class="indi-section-wrap">
        <!-- Main Morphing Notch -->
        <div class="indi-notch-divider">
            <svg viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path id="notchPath" d="M 0 100 V 60 H 150 C 180 60 190 0 200 0 H 800 C 810 0 820 60 850 60 H 1000 V 100 Z" />
            </svg>
        </div>

        <!-- Stats Section: Premium Bold Blocks -->
        <section class="indi-stats-premium" style="background: white; position: relative; z-index: 20;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
                
                <!-- 01: Años -->
                <div class="stat-box-solid" style="background: white; border-right: 1px solid #eee;">
                    <div class="stat-inner">
                        <span class="stat-num" style="color: var(--indi-blue);">+50</span>
                        <h4 class="stat-tit">ΛÑOS</h4>
                        <p class="stat-txt">CONSTRUYΞNDO ΞL FUTURO DΞ MÉXICO</p>
                    </div>
                </div>

                <!-- 02: Ciudades -->
                <div class="stat-box-solid" style="background: white; border-right: 1px solid #eee;">
                    <div class="stat-inner">
                        <span class="stat-num" style="color: var(--indi-blue);">+25</span>
                        <h4 class="stat-tit">CIUDΛDΞS</h4>
                        <p class="stat-txt">IMPULSΛDΛS POR NUΞSTRΛ INNOVΛCIÓN</p>
                    </div>
                </div>

                <!-- 03: Proyectos -->
                <div class="stat-box-solid stat-card-notched" style="background: var(--indi-blue);">
                    <div class="stat-inner">
                        <span class="stat-num" style="color: white; opacity: 0.9;">+325</span>
                        <h4 class="stat-tit" style="color: white;">PROYΞCTOS</h4>
                        <p class="stat-txt" style="color: rgba(255,255,255,0.7);">TΞRMINΛDOS CON LΛ MÁS ΛLTΛ CΛLIDΛD</p>
                    </div>
                </div>

                <!-- 04: Familias -->
                <div class="stat-box-solid stat-card-notched" style="background: var(--indi-blue);">
                    <div class="stat-inner">
                        <span class="stat-num" style="color: white; opacity: 0.9;">+1500</span>
                        <h4 class="stat-tit" style="color: white;">FΛMILIΛS INDI</h4>
                        <p class="stat-txt" style="color: rgba(255,255,255,0.7);">NUΞSTROS COLΛBORΛDORΞS SON NUΞSTRO MOTOR</p>
                    </div>
                </div>

            </div>

            <style>
                .stat-box-solid {
                    padding: 6rem 3rem;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    text-align: center;
                    transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
                    min-height: 480px;
                }

                .stat-box-solid:hover {
                    padding-bottom: 8rem;
                }

                .stat-card-notched {
                    -webkit-mask-image: url("{{ asset('assets/stat-card-shape.svg') }}");
                    mask-image: url("{{ asset('assets/stat-card-shape.svg') }}");
                    -webkit-mask-size: 100% 100%;
                    mask-size: 100% 100%;
                    -webkit-mask-repeat: no-repeat;
                    mask-repeat: no-repeat;
                    border: none !important;
                    margin: 10px; /* Space between rounded cards */
                }

                .stat-inner {
                    width: 100%;
                }

                .stat-num {
                    display: block;
                    font-family: 'Syncopate', sans-serif;
                    font-size: clamp(3.5rem, 5vw, 6rem);
                    font-weight: 700;
                    line-height: 1;
                    margin-bottom: 2rem;
                    letter-spacing: -0.05em;
                }

                .stat-tit {
                    font-family: 'Syncopate', sans-serif;
                    font-size: 0.8rem;
                    font-weight: 700;
                    letter-spacing: 0.4em;
                    color: var(--indi-dark);
                    margin-bottom: 1.5rem;
                }

                .stat-txt {
                    font-family: 'Space Grotesk', sans-serif;
                    font-size: 0.85rem;
                    line-height: 1.6;
                    color: var(--indi-text-muted);
                    max-width: 200px;
                    margin: 0 auto;
                    font-weight: 500;
                    letter-spacing: 0.05em;
                }
            </style>
        </section>

        <div class="indi-rule"></div>

        <!-- Sticky Business Units Design -->
        <section class="indi-units-module">
            <div class="units-layout-grid">
                <!-- Left: Cinematic Text Flow -->
                <div class="units-text-scroll">
                    <!-- Unit 01 -->
                    <div class="unit-box-trigger" data-unit="0">
                        <div class="unit-identity">
                            <span class="u-num">01</span>
                            <h2 class="indi-heading u-title indi-scroll-text">INDI MΛRÍTIMO</h2>
                        </div>
                        <p class="u-detail indi-scroll-text">Ingeniería de vanguardia en infraestructura portuaria y dragado especializado, conectando a México con el mundo.</p>
                        <div class="u-visual-mobile">
                            <img src="{{ asset('imagenes_indi/Maritimo/contenedores-muelle-lazaro-cardenas.webp') }}" alt="Maritimo">
                        </div>
                    </div>

                    <!-- Unit 02 -->
                    <div class="unit-box-trigger" data-unit="1">
                        <div class="unit-identity">
                            <span class="u-num">02</span>
                            <h2 class="indi-heading u-title indi-scroll-text">INDI INFRΛESTRUCTURΛ</h2>
                        </div>
                        <p class="u-detail indi-scroll-text">Desarrollo de sistemas de transporte masivo como el Mexibús Línea 1, mejorando la movilidad urbana del Estado de México.</p>
                        <div class="u-visual-mobile">
                            <img src="{{ asset('imagenes_indi/infraestructura/mexibus-lineas-1-2-cdmx - copia.webp') }}" alt="Infraestructura">
                        </div>
                    </div>

                    <!-- Unit 03 -->
                    <div class="unit-box-trigger" data-unit="2">
                        <div class="unit-identity">
                            <span class="u-num">03</span>
                            <h2 class="indi-heading u-title indi-scroll-text">INDI CONSTRUCCIÓN</h2>
                        </div>
                        <p class="u-detail indi-scroll-text">Edificación de obras icónicas como el Senado de la República, integrando funcionalidad y diseño arquitectónico de primer nivel.</p>
                        <div class="u-visual-mobile">
                            <img src="{{ asset('imagenes_indi/Construccion/senado-de-la-republica-panoramica - copia.webp') }}" alt="Construccion">
                        </div>
                    </div>

                    <!-- Unit 04 -->
                    <div class="unit-box-trigger" data-unit="3">
                        <div class="unit-identity">
                            <span class="u-num">04</span>
                            <h2 class="indi-heading u-title indi-scroll-text">INDI FERROVIΛRIΛ</h2>
                        </div>
                        <p class="u-detail indi-scroll-text">Infraestructura fronteriza estratégica diseñada para optimizar el comercio internacional y la seguridad logística en Reynosa.</p>
                        <div class="u-visual-mobile">
                            <img src="{{ asset('imagenes_indi/infraestructura/Tren-Maya-Tramos-3-y-5-a - copia.jpg') }}" alt="Aduana">
                        </div>
                    </div>
                </div>

                <!-- Right: High-Tech Sticky Stage -->
                <div class="units-sticky-stage">
                    <div class="sticky-visual-wrapper">
                        <!-- Technical Overlays -->
                        <div class="tech-grid-overlay"></div>
                        <div class="tech-corners">
                            <span></span><span></span><span></span><span></span>
                        </div>
                        
                        <div class="unit-images-stack">
                            <img src="{{ asset('imagenes_indi/Maritimo/contenedores-muelle-lazaro-cardenas.webp') }}" class="stage-img active" alt="M">
                            <img src="{{ asset('imagenes_indi/infraestructura/mexibus-lineas-1-2-cdmx - copia.webp') }}" class="stage-img" alt="I">
                            <img src="{{ asset('imagenes_indi/Construccion/senado-de-la-republica-panoramica - copia.webp') }}" class="stage-img" alt="C">
                            <img src="{{ asset('imagenes_indi/Construccion/Aduana-Modelo-Reynosa - copia.webp') }}" class="stage-img" alt="F">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Interactive Projects Map Section -->
        <section class="indi-interactive-projects">
            <div class="indi-notch-divider dark">
                <svg viewBox="0 0 1000 100" preserveAspectRatio="none">
                    <path d="M 0 100 V 60 H 150 C 180 60 190 0 200 0 H 800 C 810 0 820 60 850 60 H 1000 V 100 Z" />
                </svg>
            </div>

            <div class="projects-layout">
                <!-- Left: Sticky Map -->
                <div class="project-map-stage">
                    <div class="map-wrapper" id="mexicoMapContainer">
                        <!-- Accurate Geographically-Defined Mexico SVG Map -->
                        <svg viewBox="0 0 520 440" class="mexico-map-svg" id="mexicoMap">
                            <!-- Mexico Base Outline (Accurate Path) -->
                            <path class="state-base" d="M506.752,291.992 h-28.989 c-0.73,0-1.457,0.157-2.126,0.448 l-25.459,11.32 c-1.895,0.841-3.114,2.722-3.114,4.788 v17.583 c0,0.791-0.178,1.574-0.524,2.286 l-11.805,24.394 h-12.946 c-0.68,0-1.353,0.135-1.98,0.392 l-32.463,13.28 c-1.706,0.698-3.65,0.449-5.126-0.662 l-9.479-7.103 c-0.844-0.635-1.863-0.998-2.918-1.048 l-14.583-0.627 c-1.693-0.079-3.249-0.97-4.168-2.387 l-35.184-54.302 c-0.74-1.148-1.004-2.536-0.74-3.876 l13.522-67.596 c0.495-2.486-0.855-4.966-3.213-5.899 l-33.517-13.273 c-1.204-0.47-2.187-1.374-2.76-2.528 l-27.407-54.815 c-0.802-1.603-2.369-2.686-4.15-2.864 l-17.608-1.824 c-2.048-0.214-4.032,0.798-5.069,2.572 l-7.074,12.118 c-0.713,1.232-1.895,2.116-3.277,2.45 c-1.379,0.342-2.839,0.107-4.039-0.655 l-15.695-9.882 c-1.218-0.762-2.07-1.994-2.352-3.405 l-3.33-16.657 c-0.218-1.09-0.784-2.087-1.61-2.843 l-25.171-22.954 c-0.965-0.877-2.226-1.368-3.534-1.368 h-22.317 c-2.893,0-5.24,2.344-5.24,5.243 v2.978 h-34.87 c-0.851,0-1.692-0.206-2.444-0.606 L43.826,83.006 C43.07,82.607,42.23,82.4,41.378,82.4 H5.244 c-1.646,0-3.199,0.769-4.185,2.087 c-0.991,1.311-1.311,3.014-0.855,4.596 l14.167,49.592 c0.235,0.826,0.673,1.582,1.272,2.202 l18.719,19.392 c1.909,1.974,1.966,5.087,0.135,7.131 l-7.042,7.872 c-0.958,1.069-1.436,2.487-1.318,3.919 c0.118,1.438,0.819,2.757,1.941,3.662 l28.081,22.599 c0.851,0.691,1.47,1.631,1.763,2.678 l7.477,26.924 c0.193,0.691,0.524,1.332,0.972,1.888 l30.069,37.232 c0.95,1.183,2.365,1.888,3.879,1.945 c1.51,0.057,2.974-0.542,4.015-1.639 l6.946-7.36 c1.696-1.795,1.909-4.531,0.516-6.561 l-18.887-27.607 c-0.064-0.092-0.125-0.185-0.182-0.285 L75.074,202.98 c-0.228-0.384-0.406-0.798-0.531-1.226 l-8.595-29.708 c-0.172-0.577-0.442-1.126-0.798-1.624 l-25.152-34.575 c-0.399-0.555-0.692-1.183-0.855-1.845 l-7.15-29.409 l26.624,12.168 c1.361,0.628,2.394,1.803,2.832,3.235 l11.299,36.912 c0.225,0.734,0.606,1.403,1.118,1.974 l41.607,46.23 c1.24,1.382,1.66,3.306,1.107,5.072 l-2.322,7.438 c-0.556,1.774-0.128,3.705,1.118,5.087 l68.953,76.003 c0.877,0.969,1.361,2.223,1.361,3.527 v19.342 l-4.909,1.511 c-1.454,0.449-2.64,1.503-3.252,2.892 c-0.613,1.39-0.595,2.978,0.05,4.353 l9.775,20.768 c0.517,1.104,1.408,1.994,2.518,2.515 l152.764,71.608 c1.999,0.94,4.371,0.526,5.935-1.04 l17.234-17.226 c0.98-0.984,2.316-1.54,3.705-1.54 h12.582 c1.094,0,2.166,0.342,3.057,0.984 l30.969,22.214 c1.315,0.948,2.993,1.226,4.538,0.77 c1.553-0.449,2.804-1.604,3.398-3.106 l6.957-17.668 c0.766-1.938,2.604-3.242,4.688-3.32 l13.714-0.506 c2.818-0.106,5.051-2.422,5.051-5.236 v-4.538 c0-1.718-0.845-3.328-2.262-4.311 l-6.166-4.267 c-1.415-0.976-2.259-2.586-2.259-4.31 v-12.048 h28.326 c1.81,0,3.488-0.933,4.446-2.465 l34.653-55.442 c0.52-0.827,0.798-1.796,0.798-2.779 v-12.154 C512.0,294.336,509.649,291.992,506.752,291.992 z" />
                            
                            <!-- Location Markers -->
                            <!-- Edomex/CDMX -->
                            <circle class="project-marker marker-cdmx" cx="295" cy="310" r="8" data-state="cdmx" />
                            <!-- Oaxaca (Salina Cruz) -->
                            <circle class="project-marker marker-southeast" cx="295" cy="380" r="8" data-state="southeast" />
                            <!-- Reynosa (Tamaulipas) -->
                            <circle class="project-marker marker-northeast" cx="320" cy="224" r="8" data-state="northeast" />
                        </svg>
                    </div>
                </div>

                <!-- Right: Project Scroll Info -->
                <div class="project-data-scroll">
                    <!-- Project 01: Rompe Olas -->
                    <div class="project-data-card" data-state="southeast">
                        <div class="project-white-card">
                            <h2 class="project-name">ROMPE OLΛS SΛLINΛ CRUZ (OΛXΛCΛ)</h2>
                            <div class="project-stats-grid">
                                <div class="stat-item">
                                    <span class="stat-label">Ubicación</span>
                                    <span class="stat-value indi-scroll-text">OΛXΛCΛ</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-label">Año</span>
                                    <span class="stat-value indi-scroll-text">2024</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-label">Tiempo</span>
                                    <span class="stat-value indi-scroll-text">3 ΛÑOS</span>
                                </div>
                            </div>
                            <p class="project-description">
                                Construcción del rompeolas oeste en el puerto de Salina Cruz, una obra monumental de ingeniería marítima diseñada para potenciar el corredor interoceánico.
                            </p>
                            <div class="project-visual-notched">
                                <img src="{{ asset('imagenes_indi/Maritimo/Rompe-Olas-Salina-Cruz-Oaxaca-3 - copia.jpg') }}" alt="Rompe Olas">
                            </div>
                        </div>
                    </div>

                    <!-- Project 02: Mexibus -->
                    <div class="project-data-card" data-state="cdmx">
                        <div class="project-white-card">
                            <h2 class="project-name">MEXIBÚS LÍNEΛ 1 (ΞDOMΞX)</h2>
                            <div class="project-stats-grid">
                                <div class="stat-item">
                                    <span class="stat-label">Ubicación</span>
                                    <span class="stat-value indi-scroll-text">ESTΛDO DE MÉXICO</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-label">Año</span>
                                    <span class="stat-value indi-scroll-text">2024</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-label">Tiempo</span>
                                    <span class="stat-value indi-scroll-text">18 MESES</span>
                                </div>
                            </div>
                            <p class="project-description">
                                Modernización del sistema de transporte masivo conectando el Estado de México, mejorando la movilidad de miles de usuarios diariamente.
                            </p>
                            <div class="project-visual-notched">
                                <img src="{{ asset('imagenes_indi/infraestructura/mexibus-lineas-1-2-cdmx - copia.webp') }}" alt="Mexibus">
                            </div>
                        </div>
                    </div>

                   

                    <!-- Project 04: Aduana Reynosa -->
                    <div class="project-data-card" data-state="northeast">
                        <div class="project-white-card">
                            <h2 class="project-name">ΛDUΛNΛ MODELO (RΞYNOSΛ)</h2>
                            <div class="project-stats-grid">
                                <div class="stat-item">
                                    <span class="stat-label">Ubicación</span>
                                    <span class="stat-value indi-scroll-text">TΛMΛULIPΛS</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-label">Año</span>
                                    <span class="stat-value indi-scroll-text">2023</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-label">Tiempo</span>
                                    <span class="stat-value indi-scroll-text">24 MESES</span>
                                </div>
                            </div>
                            <p class="project-description">
                                Infraestructura fronteriza de clase mundial diseñada para optimizar el comercio internacional y la seguridad logística.
                            </p>
                            <div class="project-visual-notched">
                                <img src="{{ asset('imagenes_indi/Construccion/Aduana-Modelo-Reynosa - copia.webp') }}" alt="Aduana">
                            </div>
                        </div>
                    </div>

                 
                   
                </div>
            </div>
        </section>

        <!-- Blog Section with Gray Background -->
        <section style="background: var(--indi-gray); padding: 10rem 0; position: relative;">
            <div class="indi-notch-divider gray">
                <svg viewBox="0 0 1000 100" preserveAspectRatio="none">
                    <path d="M 0 100 V 40 H 420 L 450 0 H 550 L 580 40 H 1000 V 100 Z" />
                </svg>
            </div>

            <div class="indi-container">
                <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 5rem;">
                    <div>
                        <span class="u-num" style="font-size: 0.9rem; margin-bottom: 1rem;">NEWS & INSIGHTS</span>
                        <h2 class="indi-heading-large" style="font-size: clamp(2rem, 4vw, 3.5rem); color: #222; margin: 0;">PENSΛMIENTO<br>ESTRΛTÉGICO</h2>
                    </div>
                    <a href="/blog" class="indi-heading" style="color: var(--indi-blue); font-size: 0.9rem; text-decoration: none; border-bottom: 2px solid var(--indi-blue); padding-bottom: 5px;">VER TODO EL BLOG ↓</a>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3rem;">
                    @forelse($posts ?? [] as $post)
                    <div class="blog-card">
                        <div class="blog-tags">
                            <span class="blog-tag maritimo">Marítimo</span>
                            <span class="blog-tag infraestructura">Infraestructura</span>
                        </div>
                        <span class="blog-date">{{ $post->created_at->format('d . M . Y') }}</span>
                        <h4 class="blog-title">{{ $post->title }}</h4>
                        <div class="blog-footer">
                            <a href="{{ route('blog.show', $post->slug) }}" class="blog-read-btn">Leer Artículo</a>
                        </div>
                        <div class="indi-card-notch">
                            <img src="{{ $post->thumbnail ?? asset('imagenes_indi/Maritimo/contenedores-muelle-lazaro-cardenas.webp') }}" alt="{{ $post->title }}">
                        </div>
                    </div>
                    @empty
                    <!-- Fallback Static Cards based on User Reference -->
                    <div class="blog-card">
                        <div class="blog-tags">
                            <span class="blog-tag maritimo">MΛRÍTIMO</span>
                            <span class="blog-tag construccion">CONSTRUCCIÓN</span>
                        </div>
                        <span class="blog-date">25 . FEB . 2024</span>
                        <h4 class="blog-title">DESCUBRE LΛ LOGÍSTICΛ DETRÁS DE UN ROMPEOLΛS</h4>
                        <div class="blog-footer">
                            <a href="#" class="blog-read-btn">LEER ΛRTÍCULO</a>
                        </div>
                        <div class="indi-card-notch">
                            <img src="{{ asset('imagenes_indi/Maritimo/a-terminal-portuaria-puerto-veracruz - copia.webp') }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>

                    <div class="blog-card">
                        <div class="blog-tags">
                            <span class="blog-tag ferroviario">FERROVIΛRIO</span>
                            <span class="blog-tag infraestructura">INFRΛESTRUCTURΛ</span>
                        </div>
                        <span class="blog-date">20 . FEB . 2024</span>
                        <h4 class="blog-title">TECNOLOGÍΛ INDI EN EL SURESTE MEXICΛNO</h4>
                        <div class="blog-footer">
                            <a href="#" class="blog-read-btn">LEER ΛRTÍCULO</a>
                        </div>
                        <div class="indi-card-notch">
                            <img src="{{ asset('imagenes_indi/infraestructura/Tren-Maya-Tramos-3-y-5-a - copia.jpg') }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>

                    <div class="blog-card">
                        <div class="blog-tags">
                            <span class="blog-tag construccion">CONSTRUCCIÓN</span>
                            <span class="blog-tag infraestructura">INFRΛESTRUCTURΛ</span>
                        </div>
                        <span class="blog-date">15 . FEB . 2024</span>
                        <h4 class="blog-title">NUEVΛS DRΛGΛS DE SUCCIÓN DE ΛLTΛ CΛPΛCIDΛD</h4>
                        <div class="blog-footer">
                            <a href="#" class="blog-read-btn">LEER ΛRTÍCULO</a>
                        </div>
                        <div class="indi-card-notch">
                            <img src="{{ asset('imagenes_indi/Maritimo/muelle-lerma-campeche - copia.webp') }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contacto" style="background: white; padding: 10rem 0; position: relative;">
            <div class="indi-container" style="max-width: 1600px;">
                <div style="margin-bottom: 6rem;">
                    <h2 class="indi-heading indi-scroll-text" style="font-size: clamp(3rem, 6vw, 4.5rem); line-height: 1.1; margin: 0;">CONSTRUYΛMOS<br>EL FUTURO</h2>
                    <div style="width: 150px; height: 5px; background: var(--indi-blue); margin-top: 2rem;"></div>
                </div>

                <div style="display: grid; grid-template-columns: 1.4fr 1fr; gap: 8rem; align-items: start;">
                    <!-- Left Column: Consciousness blocks -->
                    <div style="display: flex; flex-direction: column; gap: 6rem;">
                        <!-- Conciencia Empresarial -->
                        <div class="contact-info-block">
                            <h4 class="indi-heading" style="color: var(--indi-blue); font-size: 0.9rem; margin-bottom: 2rem; letter-spacing: 0.4em;">CONCIENCIΛ EMPRESΛRIΛ</h4>
                            <p style="color: var(--indi-text-muted); line-height: 1.8; font-size: 1.2rem; font-weight: 400; margin-bottom: 3rem;">
                                Certificamos nuestros procesos con los más altos estándares internacionales de calidad, para ofrecer a nuestros clientes la seguridad de una empresa altamente comprometida con cada proyecto.
                            </p>
                            
                            <!-- Certification Logos -->
                            <div style="display: flex; gap: 5rem; align-items: center; flex-wrap: wrap;">
                                <img src="{{ asset('assets/9001.png') }}" alt="ISO 9001" style="height: 100px; width: auto; object-fit: contain;">
                                <img src="{{ asset('assets/14001.png') }}" alt="ISO 14001" style="height: 100px; width: auto; object-fit: contain;">
                                <img src="{{ asset('assets/45001.png') }}" alt="ISO 45001" style="height: 100px; width: auto; object-fit: contain;">
                            </div>
                        </div>

                        <!-- Conciencia Ambiental -->
                        <div class="contact-info-block">
                            <h4 class="indi-heading" style="color: var(--indi-blue); font-size: 0.9rem; margin-bottom: 2rem; letter-spacing: 0.4em;">CONCIENCIΛ ΛMBIENTΛL</h4>
                            <p style="color: var(--indi-text-muted); line-height: 1.8; font-size: 1.2rem; font-weight: 400;">
                                Grupo Indi promueve activamente acciones que favorecen la conservación y el cuidado del medio ambiente, comprometiéndose a utilizar de manera racional y eficiente los recursos naturales en todos sus proyectos. Como parte de sus iniciativas, el grupo implementa la recolección de equipos, materiales y accesorios electrónicos, los cuales son enviados a centros de acopio y reciclaje certificados.
                            </p>
                        </div>
                    </div>

                    <!-- Right Column: Contact info box -->
                    <div style="background: #050505; color: white; padding: 5rem; position: relative; overflow: hidden; clip-path: polygon(0 0, 100% 0, 100% 88%, 88% 100%, 0 100%); min-height: 600px; display: flex; flex-direction: column; justify-content: center;">
                        <h4 class="indi-heading" style="color: var(--indi-blue); font-size: 1rem; margin-bottom: 4rem; letter-spacing: 0.4em;">CONTΛCTO</h4>
                        
                        <div style="font-family: 'Space Grotesk';">
                            <a href="tel:+525555406750" style="display: block; font-size: 2.5rem; color: white; text-decoration: none; margin-bottom: 3rem; font-weight: 700; letter-spacing: -0.02em;">+52 55 5540 6750</a>
                            
                            <div style="margin-bottom: 4rem;">
                                <a href="mailto:denuncias@grupoindi.com" style="display: block; color: rgba(255,255,255,1); text-decoration: none; margin-bottom: 1.2rem; font-size: 1.2rem; transition: color 0.3s ease;">denuncias@grupoindi.com</a>
                                <a href="mailto:comunicacion@grupoindi.com" style="display: block; color: rgba(255,255,255,1); text-decoration: none; font-size: 1.2rem; transition: color 0.3s ease;">comunicacion@grupoindi.com</a>
                            </div>
                            
                            <p style="font-size: 1.1rem; color: rgba(255,255,255,0.4); line-height: 1.8; text-transform: uppercase; letter-spacing: 0.1em;">
                                Zapotecas 17 PB<br>
                                Col. Santa Cruz Acatlán
                            </p>
                        </div>

                        <!-- Technical corner accent -->
                        <div style="position: absolute; bottom: 0; right: 0; width: 100px; height: 100px; background: var(--indi-blue); opacity: 0.15;"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
