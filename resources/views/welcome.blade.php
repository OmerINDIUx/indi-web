@extends('layouts.app')

@section('title', 'INDI | Infraestructura y Tecnología')

@section('content')
    <!-- Hero Section -->
    <header class="indi-hero">
        <video autoplay muted loop playsinline id="heroVideo" class="hero-video">
            <source src="{{ asset('videos_indi/portada.mp4') }}" type="video/mp4">
        </video>
        <div class="indi-hero-content">
            <h1 class="indi-heading hero-typer-text" style="color: white; text-shadow: 0 10px 30px rgba(0,0,0,0.5); font-family: 'usual', sans-serif;">
              {{ \App\Support\CmsText::get('home.hero.title', 'PASION POR EL PROGRESO') }}
            </h1>
            <p class="indi-hero-subtitle">
                {{ \App\Support\CmsText::get('home.hero.subtitle', 'MÁS DE 50 AÑOS CONSTRUYENDO MÉXICO') }}
            </p>
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
            <div class="stats-solid-grid">
                
                <!-- 01: Años -->
                <div class="stat-box-solid" style="background: white; border-right: 1px solid #eee;">
                    <div class="stat-inner">
                        <span class="stat-num" style="color: var(--indi-blue);">+50</span>
                        <h4 class="stat-tit">{{ \App\Support\CmsText::get('home.stats.years.title', 'ANOS') }}</h4>
                        <p class="stat-txt">{{ \App\Support\CmsText::get('home.stats.years.text', 'CONSTRUYENDO EL FUTURO DE MEXICO') }}</p>
                    </div>
                </div>

                <!-- 02: Ciudades -->
                <div class="stat-box-solid stat-card-notched" style="background: var(--indi-blue);">
                    <div class="stat-inner">
                        <span class="stat-num" style="color: white; opacity: 0.9;">+25</span>
                        <h4 class="stat-tit">{{ \App\Support\CmsText::get('home.stats.cities.title', 'CIUDADES') }}</h4>
                        <p class="stat-txt">{{ \App\Support\CmsText::get('home.stats.cities.text', 'IMPULSADAS POR NUESTRA INNOVACION') }}</p>
                    </div>
                </div>

                <!-- 03: Proyectos -->
                <div class="stat-box-solid stat-card-notched" style="background: var(--indi-blue);">
                    <div class="stat-inner">
                        <span class="stat-num" style="color: white; opacity: 0.9;">+325</span>
                        <h4 class="stat-tit" style="color: white;">{{ \App\Support\CmsText::get('home.stats.projects.title', 'PROYECTOS') }}</h4>
                        <p class="stat-txt" style="color: rgba(255,255,255,0.7);">{{ \App\Support\CmsText::get('home.stats.projects.text', 'TERMINADOS CON LA MAS ALTA CALIDAD') }}</p>
                    </div>
                </div>

                <!-- 04: Familias -->
                <div class="stat-box-solid stat-card-notched" style="background: var(--indi-blue);">
                    <div class="stat-inner">
                        <span class="stat-num" style="color: white; opacity: 0.9;">+1500</span>
                        <h4 class="stat-tit" style="color: white;">{{ \App\Support\CmsText::get('home.stats.families.title', 'FAMILIAS INDI') }}</h4>
                        <p class="stat-txt" style="color: rgba(255,255,255,0.7);">{{ \App\Support\CmsText::get('home.stats.families.text', 'NUESTROS COLABORADORES SON NUESTRO MOTOR') }}</p>
                    </div>
                </div>

            </div>

            <style>
                .stats-solid-grid {
                    display: grid;
                    grid-template-columns: repeat(4, 1fr);
                }

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
                    font-family: 'usual', sans-serif;
                    font-size: clamp(3.5rem, 5vw, 6rem);
                    font-weight: 700;
                    line-height: 1;
                    margin-bottom: 2rem;
                    letter-spacing: -0.05em;
                    white-space: nowrap;
                }

                .stat-tit {
                    font-family: 'usual', sans-serif;
                    font-size: 0.8rem;
                    font-weight: 700;
                    letter-spacing: 0.4em;
                    color: var(--indi-dark);
                    margin-bottom: 1.5rem;
                }

                .stat-txt {
                    font-family: 'usual', sans-serif;
                    font-size: 0.85rem;
                    line-height: 1.6;
                    color: var(--indi-text-muted);
                    max-width: 200px;
                    margin: 0 auto;
                    font-weight: 500;
                    letter-spacing: 0.05em;
                }

                /* Premium Blog Card styling overrides local to Home page */
                .blog-card {
                    background: #ffffff !important;
                    border: 1px solid #e2e8f0 !important;
                    clip-path: polygon(0 0, calc(100% - 20px) 0, 100% 20px, 100% 100%, 0 100%) !important;
                    position: relative !important;
                    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1) !important;
                    padding: 2.5rem 2rem !important;
                }
                .blog-card:hover {
                    transform: translateY(-8px) !important;
                    border-color: #0066f9 !important;
                    box-shadow: 0 20px 40px rgba(0, 102, 249, 0.1) !important;
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
                .blog-card:hover::before {
                    transform: scaleY(1);
                }
                
                .blog-card:has(.maritimo):hover::before { background: #0066f9; }
                .blog-card:has(.construccion):hover::before { background: #ffa608; }
                .blog-card:has(.infraestructura):hover::before { background: #64b032; }
                .blog-card:has(.ferroviario):hover::before { background: #ff3000; }

                .blog-title {
                    color: #1a202c !important;
                    font-family: 'usual', sans-serif !important;
                    font-weight: 700 !important;
                    font-size: 1.3rem !important;
                    margin-bottom: 1.5rem !important;
                    letter-spacing: 0.05em !important;
                    line-height: 1.3 !important;
                }

                .blog-read-btn {
                    border-radius: 4px !important;
                    background: #0066f9 !important;
                    font-family: 'usual', sans-serif !important;
                    font-weight: 700 !important;
                    font-size: 0.8rem !important;
                    letter-spacing: 0.1em !important;
                    padding: 0.6rem 1.6rem !important;
                    transition: all 0.3s ease !important;
                }

                .blog-read-btn:hover {
                    background: #000000 !important;
                    box-shadow: 0 0 10px rgba(0, 102, 249, 0.5) !important;
                }

                /* Escritorio compacto: evita que la cifra de familias se corte. */
                @media (min-width: 1081px) and (max-width: 1280px) {
                    .stat-box-solid {
                        min-width: 0;
                        padding: 4rem 1.25rem;
                    }
                    .stat-num {
                        font-size: clamp(2.5rem, 4vw, 4rem);
                    }
                    .stat-tit {
                        letter-spacing: 0.25em;
                    }
                    .stat-txt {
                        max-width: 175px;
                        font-size: 0.75rem;
                    }
                }
                /* Mobile visuals and sticky layouts */
                .u-visual-mobile {
                    clip-path: polygon(0 0, 30% 0, 36% 6%, 64% 6%, 70% 0, 100% 0, 100% 100%, 0 100%) !important;
                    border: 2px solid var(--indi-unit-color) !important;
                    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1), 0 0 5px var(--indi-unit-color) !important;
                    border-radius: 0 !important;
                    overflow: hidden;
                    height: 280px !important;
                }

                @media (max-width: 1080px) {
                    .stats-solid-grid {
                        grid-template-columns: repeat(2, 1fr);
                    }
                    .stat-box-solid {
                        min-height: 350px;
                        padding: 4rem 2rem;
                    }
                    .stat-box-solid:hover {
                        padding-bottom: 4rem;
                    }
                    .stat-num {
                        font-size: 3.5rem;
                    }
                    .u-title {
                        font-size: 2.2rem !important;
                    }
                    .u-detail {
                        font-size: 0.95rem !important;
                    }
                    .unit-box-trigger {
                        padding: 0 5% !important;
                    }
                }

                @media (max-width: 900px) {
                    .unit-box-trigger {
                        justify-content: flex-start !important;
                        padding: 3.5rem 5% !important;
                        scroll-margin-top: 1rem !important;
                    }

                    .indi-units-module .unit-box-trigger:last-child {
                        padding-bottom: 5rem !important;
                    }

                    .u-visual-mobile {
                        height: clamp(300px, 44vh, 420px) !important;
                    }
                }

                @media (max-width: 720px) {
                    .stats-solid-grid {
                        grid-template-columns: 1fr;
                    }
                    .stat-box-solid {
                        min-height: 280px !important;
                        padding: 3rem 1.5rem !important;
                        border-right: none !important;
                        border-bottom: 1px solid #eee !important;
                    }
                    .project-visual-notched {
                        height: 30vh !important;
                        margin: 2rem -1.5rem 0 -1.5rem !important;
                        width: calc(100% + 3rem) !important;
                        clip-path: polygon(0 0, 30% 0, 36% 6%, 64% 6%, 70% 0, 100% 0, 100% 100%, 0 100%) !important;
                    }
                }
                
                @media (max-width: 500px) {
                    .stat-num {
                        font-size: 2.8rem !important;
                    }
                    .u-title {
                        font-size: 1.8rem !important;
                    }
                    .u-visual-mobile {
                        height: 200px !important;
                    }
                }
            </style>
        </section>

        <div class="indi-rule"></div>

        <!-- Sticky Business Units Design -->
        <section class="indi-units-module">
            <div class="units-layout-grid">
                <!-- Left: Cinematic Text Flow -->
                <div class="units-text-scroll">
                    <!-- Unit 01: Marítimo (Blue) -->
                    <div class="unit-box-trigger" data-unit="0" style="--indi-unit-color: #0066f9;">
                        <div class="unit-identity">
                            <h2 class="indi-heading u-title">{{ \App\Support\CmsText::get('home.unit.maritime.title', 'INDI MARÍTIMO') }}</h2>
                        </div>
                        <p class="u-detail indi-scroll-text">{{ \App\Support\CmsText::get('home.unit.maritime.text', 'Dominio técnico en ingeniería portuaria, escolleras monumentales y obras de dragado.') }}</p>
                        <div class="u-visual-mobile">
                            <img src="{{ \App\Support\CmsMedia::url('home.unit.maritime.image', 'imagenes_indi/Maritimo.png') }}" alt="Marítimo">
                        </div>
                    </div>

                    <!-- Unit 02: Infraestructura (Green) -->
                    <div class="unit-box-trigger" data-unit="1" style="--indi-unit-color: #64b032;">
                        <div class="unit-identity">
                            <h2 class="indi-heading u-title">{{ \App\Support\CmsText::get('home.unit.infrastructure.title', 'INDI INFRAESTRUCTURA') }}</h2>
                        </div>
                        <p class="u-detail indi-scroll-text">{{ \App\Support\CmsText::get('home.unit.infrastructure.text', 'Desarrollo de sistemas de movilidad urbana y transporte masivo de alta precisión técnica.') }}</p>
                        <div class="u-visual-mobile">
                            <img src="{{ \App\Support\CmsMedia::url('home.unit.infrastructure.image', 'imagenes_indi/Infraestructura.png') }}" alt="Infraestructura">
                        </div>
                    </div>

                    <!-- Unit 03: Construcción (Orange) -->
                    <div class="unit-box-trigger" data-unit="2" style="--indi-unit-color: #ffa608;">
                        <div class="unit-identity">
                            <h2 class="indi-heading u-title">{{ \App\Support\CmsText::get('home.unit.construction.title', 'INDI CONSTRUCCIÓN') }}</h2>
                        </div>
                        <p class="u-detail indi-scroll-text">{{ \App\Support\CmsText::get('home.unit.construction.text', 'Especialistas en ingeniería civil de alta complejidad y cimentación profunda.') }}</p>
                        <div class="u-visual-mobile">
                            <img src="{{ \App\Support\CmsMedia::url('home.unit.construction.image', 'imagenes_indi/Construccion/senado-de-la-republica-panoramica - copia.jpg') }}" alt="Construcción">
                        </div>
                    </div>

                    <!-- Unit 04: Ferroviaria (Red) -->
                    <div class="unit-box-trigger" data-unit="3" style="--indi-unit-color: #ff3000;">
                        <div class="unit-identity">
                            <h2 class="indi-heading u-title">{{ \App\Support\CmsText::get('home.unit.railway.title', 'INDI FERROVIARIA') }}</h2>
                        </div>
                        <p class="u-detail indi-scroll-text">{{ \App\Support\CmsText::get('home.unit.railway.text', 'Ingeniería avanzada para sistemas de transporte ferroviario de carga y pasajeros a gran escala.') }}</p>
                        <div class="u-visual-mobile">
                            <img src="{{ \App\Support\CmsMedia::url('home.unit.railway.image', 'imagenes_indi/Ferroviario.png') }}" alt="Ferroviaria">
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
                            <img src="{{ \App\Support\CmsMedia::url('home.unit.maritime.image', 'imagenes_indi/Maritimo.png') }}" class="stage-img active" alt="M">
                            <img src="{{ \App\Support\CmsMedia::url('home.unit.infrastructure.image', 'imagenes_indi/Infraestructura.png') }}" class="stage-img" alt="I">
                            <img src="{{ \App\Support\CmsMedia::url('home.unit.construction.image', 'imagenes_indi/Construccion/senado-de-la-republica-panoramica - copia.jpg') }}" class="stage-img" alt="C">
                            <img src="{{ \App\Support\CmsMedia::url('home.unit.railway.image', 'imagenes_indi/Ferroviario.png') }}" class="stage-img" alt="F">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Interactive Projects Map Section -->
        @php
            $homeProjects = ($featuredProjects ?? collect())->values();
            $useDynamicHomeProjects = $homeProjects->count() >= 3 && $homeProjects->count() <= 5;
            $projectCategoryKeys = [
                1 => 'infraestructura',
                2 => 'construccion',
                3 => 'maritimo',
                4 => 'ferroviaria',
            ];
            $mapWidth = 520;
            $mapHeight = 440;
            $minLat = 14.4;
            $maxLat = 32.8;
            $minLng = -118.6;
            $maxLng = -86.5;
            $projectPoint = function ($lat, $lng) use ($mapWidth, $mapHeight, $minLat, $maxLat, $minLng, $maxLng) {
                $xRatio = ((float) $lng - $minLng) / ($maxLng - $minLng);
                $yRatio = ($maxLat - (float) $lat) / ($maxLat - $minLat);

                return [
                    'x' => max(26, min($mapWidth - 18, round($xRatio * $mapWidth, 1))),
                    'y' => max(28, min($mapHeight - 24, round($yRatio * $mapHeight, 1))),
                ];
            };
        @endphp
        <section class="indi-interactive-projects">
            <div class="indi-notch-divider dark">
                <svg viewBox="0 0 1000 100" preserveAspectRatio="none">
                    <path d="M 0 100 V 60 H 150 C 180 60 190 0 200 0 H 800 C 810 0 820 60 850 60 H 1000 V 100 Z" />
                </svg>
            </div>

            <div class="projects-layout" style="--home-project-count: {{ $useDynamicHomeProjects ? $homeProjects->count() : 3 }};">
                <!-- Left: Sticky Map -->
                <div class="project-map-stage">
                    <div class="map-wrapper" id="mexicoMapContainer">
                        <!-- Accurate Geographically-Defined Mexico SVG Map -->
                        <svg viewBox="0 0 520 440" class="mexico-map-svg" id="mexicoMap">
                            <!-- Mexico Base Outline (Accurate Path) -->
                            <path class="state-base" d="M506.752,291.992 h-28.989 c-0.73,0-1.457,0.157-2.126,0.448 l-25.459,11.32 c-1.895,0.841-3.114,2.722-3.114,4.788 v17.583 c0,0.791-0.178,1.574-0.524,2.286 l-11.805,24.394 h-12.946 c-0.68,0-1.353,0.135-1.98,0.392 l-32.463,13.28 c-1.706,0.698-3.65,0.449-5.126-0.662 l-9.479-7.103 c-0.844-0.635-1.863-0.998-2.918-1.048 l-14.583-0.627 c-1.693-0.079-3.249-0.97-4.168-2.387 l-35.184-54.302 c-0.74-1.148-1.004-2.536-0.74-3.876 l13.522-67.596 c0.495-2.486-0.855-4.966-3.213-5.899 l-33.517-13.273 c-1.204-0.47-2.187-1.374-2.76-2.528 l-27.407-54.815 c-0.802-1.603-2.369-2.686-4.15-2.864 l-17.608-1.824 c-2.048-0.214-4.032,0.798-5.069,2.572 l-7.074,12.118 c-0.713,1.232-1.895,2.116-3.277,2.45 c-1.379,0.342-2.839,0.107-4.039-0.655 l-15.695-9.882 c-1.218-0.762-2.07-1.994-2.352-3.405 l-3.33-16.657 c-0.218-1.09-0.784-2.087-1.61-2.843 l-25.171-22.954 c-0.965-0.877-2.226-1.368-3.534-1.368 h-22.317 c-2.893,0-5.24,2.344-5.24,5.243 v2.978 h-34.87 c-0.851,0-1.692-0.206-2.444-0.606 L43.826,83.006 C43.07,82.607,42.23,82.4,41.378,82.4 H5.244 c-1.646,0-3.199,0.769-4.185,2.087 c-0.991,1.311-1.311,3.014-0.855,4.596 l14.167,49.592 c0.235,0.826,0.673,1.582,1.272,2.202 l18.719,19.392 c1.909,1.974,1.966,5.087,0.135,7.131 l-7.042,7.872 c-0.958,1.069-1.436,2.487-1.318,3.919 c0.118,1.438,0.819,2.757,1.941,3.662 l28.081,22.599 c0.851,0.691,1.47,1.631,1.763,2.678 l7.477,26.924 c0.193,0.691,0.524,1.332,0.972,1.888 l30.069,37.232 c0.95,1.183,2.365,1.888,3.879,1.945 c1.51,0.057,2.974-0.542,4.015-1.639 l6.946-7.36 c1.696-1.795,1.909-4.531,0.516-6.561 l-18.887-27.607 c-0.064-0.092-0.125-0.185-0.182-0.285 L75.074,202.98 c-0.228-0.384-0.406-0.798-0.531-1.226 l-8.595-29.708 c-0.172-0.577-0.442-1.126-0.798-1.624 l-25.152-34.575 c-0.399-0.555-0.692-1.183-0.855-1.845 l-7.15-29.409 l26.624,12.168 c1.361,0.628,2.394,1.803,2.832,3.235 l11.299,36.912 c0.225,0.734,0.606,1.403,1.118,1.974 l41.607,46.23 c1.24,1.382,1.66,3.306,1.107,5.072 l-2.322,7.438 c-0.556,1.774-0.128,3.705,1.118,5.087 l68.953,76.003 c0.877,0.969,1.361,2.223,1.361,3.527 v19.342 l-4.909,1.511 c-1.454,0.449-2.64,1.503-3.252,2.892 c-0.613,1.39-0.595,2.978,0.05,4.353 l9.775,20.768 c0.517,1.104,1.408,1.994,2.518,2.515 l152.764,71.608 c1.999,0.94,4.371,0.526,5.935-1.04 l17.234-17.226 c0.98-0.984,2.316-1.54,3.705-1.54 h12.582 c1.094,0,2.166,0.342,3.057,0.984 l30.969,22.214 c1.315,0.948,2.993,1.226,4.538,0.77 c1.553-0.449,2.804-1.604,3.398-3.106 l6.957-17.668 c0.766-1.938,2.604-3.242,4.688-3.32 l13.714-0.506 c2.818-0.106,5.051-2.422,5.051-5.236 v-4.538 c0-1.718-0.845-3.328-2.262-4.311 l-6.166-4.267 c-1.415-0.976-2.259-2.586-2.259-4.31 v-12.048 h28.326 c1.81,0,3.488-0.933,4.446-2.465 l34.653-55.442 c0.52-0.827,0.798-1.796,0.798-2.779 v-12.154 C512.0,294.336,509.649,291.992,506.752,291.992 z" />
                            
                            @if($useDynamicHomeProjects)
                                @foreach($homeProjects as $project)
                                    @php($point = $projectPoint($project->latitude, $project->longitude))
                                    <circle class="project-marker marker-project-{{ $project->id }}" cx="{{ $point['x'] }}" cy="{{ $point['y'] }}" r="8" data-state="project-{{ $project->id }}" />
                                @endforeach
                            @else
                                <circle class="project-marker marker-cdmx" cx="295" cy="310" r="8" data-state="cdmx" />
                                <circle class="project-marker marker-southeast" cx="295" cy="380" r="8" data-state="southeast" />
                                <circle class="project-marker marker-northeast" cx="320" cy="224" r="8" data-state="northeast" />
                            @endif
                        </svg>
                    </div>
                </div>

                <!-- Right: Project Scroll Info -->
                <div class="project-data-scroll">
                    @if($useDynamicHomeProjects)
                        @foreach($homeProjects as $project)
                            <div class="project-data-card" data-state="project-{{ $project->id }}">
                                <div class="project-white-card">
                                    <div class="projects-card-heading">{{ \App\Support\CmsText::get('home.projects.featured_title', 'PROYECTOS DESTACADOS') }}</div>
                                    <h2 class="project-name">{{ mb_strtoupper($project->localized_title) }}</h2>
                                    <div class="project-stats-grid">
                                        <div class="stat-item">
                                            <span class="stat-label">{{ \App\Support\CmsText::get('home.projects.location', 'Ubicacion') }}</span>
                                            <span class="stat-value indi-scroll-text">{{ mb_strtoupper($project->localized_address) }}</span>
                                        </div>
                                        <div class="stat-item">
                                            <span class="stat-label">{{ \App\Support\CmsText::get('projects.type', 'TIPO') }}</span>
                                            @php($projectCategoryKey = $projectCategoryKeys[$project->category] ?? 'infraestructura')
                                            <span class="stat-value indi-scroll-text">{{ mb_strtoupper(\App\Support\CmsText::get('category.' . $projectCategoryKey, __('site.categories.' . $projectCategoryKey))) }}</span>
                                        </div>
                                    </div>
                                    <p class="project-description">
                                        {{ $project->localized_description }}
                                    </p>
                                    <div class="project-visual-notched">
                                        @if($project->marker_image)
                                            <img src="{{ asset('storage/' . $project->marker_image) }}" alt="{{ $project->localized_title }}">
                                        @else
                                            <img src="{{ asset('imagenes_indi/infraestructura/primer-cablebus-cdmx-l1-estacion - copia.jpg') }}" alt="{{ $project->localized_title }}">
                                        @endif
                                    </div>
                                                    <a class="projects-all-link" href="/proyectos">{{ \App\Support\CmsText::get('home.projects.view_all', 'CONOCE TODOS NUESTROS PROYECTOS') }} <span aria-hidden="true">→</span></a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="project-data-card" data-state="southeast">
                            <div class="project-white-card">
                                    <div class="projects-card-heading">{{ \App\Support\CmsText::get('home.projects.featured_title', 'PROYECTOS DESTACADOS') }}</div>
                                <h2 class="project-name">ROMPE OLΛS SΛLINΛ CRUZ (OΛXΛCΛ)</h2>
                                <div class="project-stats-grid">
                                    <div class="stat-item">
                                        <span class="stat-label">{{ \App\Support\CmsText::get('home.projects.location', 'Ubicacion') }}</span>
                                        <span class="stat-value indi-scroll-text">OΛXΛCΛ</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">{{ \App\Support\CmsText::get('projects.type', 'TIPO') }}</span>
                                        <span class="stat-value indi-scroll-text">{{ \App\Support\CmsText::get('category.maritimo', __('site.categories.maritimo')) }}</span>
                                    </div>
                                </div>
                                <p class="project-description">
Rehabilitación estratégica de la vía férrea que conecta el Océano Pacífico con el Golfo de México. La obra implicó la modernización y estabilización de terracerías y puentes para soportar altas capacidades de carga comercial, consolidando una ruta logística fundamental para el país.                            </p>
                                <div class="project-visual-notched">
                                    <img src="{{ asset('imagenes_indi/Maritimo/Rompe-Olas-Salina-Cruz-Oaxaca-3 - copia.jpg') }}" alt="Rompe Olas">
                                </div>
                                                <a class="projects-all-link" href="/proyectos">{{ \App\Support\CmsText::get('home.projects.view_all', 'CONOCE TODOS NUESTROS PROYECTOS') }} <span aria-hidden="true">→</span></a>
                                </div>
                        </div>

                        <div class="project-data-card" data-state="cdmx">
                            <div class="project-white-card">
                                    <div class="projects-card-heading">{{ \App\Support\CmsText::get('home.projects.featured_title', 'PROYECTOS DESTACADOS') }}</div>
                                <h2 class="project-name">CΛBLΞBÚS LÍNΞΛ 1 (CDMX)</h2>
                                <div class="project-stats-grid">
                                    <div class="stat-item">
                                        <span class="stat-label">{{ \App\Support\CmsText::get('home.projects.location', 'Ubicacion') }}</span>
                                        <span class="stat-value indi-scroll-text">CIUDAD DE MÉXICO</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">{{ \App\Support\CmsText::get('projects.type', 'TIPO') }}</span>
                                        <span class="stat-value indi-scroll-text">{{ \App\Support\CmsText::get('category.infraestructura', __('site.categories.infraestructura')) }}</span>
                                    </div>
                                </div>
                                <p class="project-description">
Sistema de transporte público por teleférico urbano diseñado para zonas de alta densidad y topografía compleja. La ingeniería del proyecto se centró en la cimentación profunda de torres en terrenos irregulares y el montaje de sistemas electromecánicos de alta seguridad, mejorando drásticamente la conectividad de la zona.                            </p>
                                <div class="project-visual-notched">
                                    <img src="{{ asset('imagenes_indi/infraestructura/primer-cablebus-cdmx-l1-estacion - copia.jpg') }}" alt="Mexibus">
                                </div>
                                                <a class="projects-all-link" href="/proyectos">{{ \App\Support\CmsText::get('home.projects.view_all', 'CONOCE TODOS NUESTROS PROYECTOS') }} <span aria-hidden="true">→</span></a>
                                </div>
                        </div>

                        <div class="project-data-card" data-state="northeast">
                            <div class="project-white-card">
                                    <div class="projects-card-heading">{{ \App\Support\CmsText::get('home.projects.featured_title', 'PROYECTOS DESTACADOS') }}</div>
                                <h2 class="project-name">ΛDUΛNΛ MODELO (RΞYNOSΛ)</h2>
                                <div class="project-stats-grid">
                                    <div class="stat-item">
                                        <span class="stat-label">{{ \App\Support\CmsText::get('home.projects.location', 'Ubicacion') }}</span>
                                        <span class="stat-value indi-scroll-text">TΛMΛULIPΛS</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">{{ \App\Support\CmsText::get('projects.type', 'TIPO') }}</span>
                                        <span class="stat-value indi-scroll-text">{{ \App\Support\CmsText::get('category.ferroviaria', __('site.categories.ferroviaria')) }}</span>
                                    </div>
                                </div>
                                <p class="project-description">
                                    Infraestructura fronteriza de clase mundial diseñada para optimizar el comercio internacional y la seguridad logística.
                                </p>
                                <div class="project-visual-notched">
                                    <img src="{{ asset('imagenes_indi/Construccion/Aduana-Modelo-Reynosa - copia.webp') }}" alt="Aduana">
                                </div>
                                                <a class="projects-all-link" href="/proyectos">{{ \App\Support\CmsText::get('home.projects.view_all', 'CONOCE TODOS NUESTROS PROYECTOS') }} <span aria-hidden="true">→</span></a>
                                </div>
                        </div>
                    @endif
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
                <div class="blog-header-container" style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 5rem;">
                    <div>
                        {{-- <span class="u-num" style="font-size: 0.9rem; margin-bottom: 1rem;">NEWS & INSIGHTS</span> --}}
                        <h2 class="indi-heading-large" style="font-size: clamp(1.8rem, 4vw, 3.2rem); color: #222; margin: 0;">{{ \App\Support\CmsText::get('home.projects.thinking', 'PENSAMIENTO ESTRATEGICO') }}</h2>
                    </div>
                    <a href="/prensa" class="indi-heading" style="color: var(--indi-blue); font-size: 0.9rem; text-decoration: none; border-bottom: 2px solid var(--indi-blue); padding-bottom: 5px;">{{ \App\Support\CmsText::get('home.projects.visit_news', 'Visita las Noticias') }} ↓</a>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3rem;">
                    @forelse($posts ?? [] as $post)
                    <div class="blog-card">
                        <div class="blog-tags">
                            <span class="blog-tag {{ $post->category }}">
                                {{ \App\Support\CmsText::get('category.' . $post->category, __('site.categories.' . $post->category)) }}
                            </span>
                        </div>
                        <span class="blog-date">{{ $post->created_at->format('d . M . Y') }}</span>
                        <h4 class="blog-title">{{ $post->localized_title }}</h4>
                        <div class="blog-footer">
                            <a href="{{ route('prensa.show', $post->localized_slug) }}" class="blog-read-btn">{{ \App\Support\CmsText::get('home.blog.read', 'LEER ARTICULO') }}</a>
                        </div>
                        <div class="indi-card-notch">
                            @if($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->localized_title }}">
                            @elseif($post->category === 'maritimo')
                                <img src="{{ asset('imagenes_indi/Maritimo/Rompe-Olas-Salina-Cruz-Oaxaca-3 - copia.jpg') }}" alt="{{ $post->localized_title }}">
                            @elseif($post->category === 'ferroviario')
                                <img src="{{ asset('imagenes_indi/infraestructura/Tren-Maya-Tramos-3-y-5-a - copia.jpg') }}" alt="{{ $post->localized_title }}">
                            @elseif($post->category === 'infraestructura')
                                <img src="{{ asset('imagenes_indi/infraestructura/mexibus-lineas-1-2-cdmx - copia.webp') }}" alt="{{ $post->localized_title }}">
                            @else
                                <img src="{{ asset('imagenes_indi/Construccion/senado-de-la-republica-panoramica - copia.jpg') }}" alt="{{ $post->localized_title }}">
                            @endif
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
                            <a href="#" class="blog-read-btn">{{ \App\Support\CmsText::get('home.blog.read', 'LEER ARTICULO') }}</a>
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
                            <a href="#" class="blog-read-btn">{{ \App\Support\CmsText::get('home.blog.read', 'LEER ARTICULO') }}</a>
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
                            <a href="#" class="blog-read-btn">{{ \App\Support\CmsText::get('home.blog.read', 'LEER ARTICULO') }}</a>
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

    </div>
@endsection
