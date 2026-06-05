@extends('layouts.app')

@section('title', 'PROYECTOS | INDI')

@section('content')
<!-- usual Font from Reference -->
<link href="https://fonts.googleapis.com/css2?family=usual:wght@300;400;600;700;900&display=swap" rel="stylesheet">

<div class="projects-page-wrapper">
    <script>
        window.ASSET_URL = "{{ asset('') }}".replace(/\/$/, "");
    </script>

    <!-- Map Section: Side-by-Side Layout -->
    <section class="map-section-premium">
        <!-- Left: Map Side -->
        <div class="map-side">
            <!-- Floating Titles Overlay -->
            <div class="map-titles-overlay">
                {{-- <div class="hero-pretitle">PORTAFOLIO FEDERAL & PRIVADO</div> --}}
                <h1 class="indi-heading-large hero-typer-text" style="color: #0066f9; font-family: 'usual', sans-serif;">{{ \App\Support\CmsText::get('projects.title', 'NUESTROS PROYECTOS') }}</h1>
                <p class="hero-subtitle">{{ \App\Support\CmsText::get('projects.subtitle', 'MAS DE 50 ANOS CONSTRUYENDO LA INFRAESTRUCTURA DE MEXICO') }}</p>
            </div>

            <div id="projectsMap"></div>
            <!-- Vignette effect for physical model look from ref -->
            <div class="vignette"></div>
            <div class="map-grid-overlay"></div>
            <div class="map-scanner-line"></div>
            
            <!-- Search and filters, aligned to the platform identity -->
            <div class="map-controls-overlay">
                <div class="project-search-container">
                    <div class="project-search-input-wrapper">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <input type="text" id="projectSearchInput" placeholder="{{ \App\Support\CmsText::get('projects.search', 'BUSCAR PROYECTO O UBICACION...') }}">
                    </div>
                </div>

                <div class="filter-bar-premium">
                    <div class="filter-container-blue" id="filterLinks">
                        <button class="filter-link active" data-category="all">
                            {{-- <span class="f-num">00</span> --}}
                            <span class="f-text">{{ \App\Support\CmsText::get('category.all', __('site.categories.all')) }}</span>
                        </button>
                        <button class="filter-link" data-category="2">
                            <span class="f-text">{{ \App\Support\CmsText::get('category.construccion', __('site.categories.construccion')) }}</span>
                        </button>
                        <button class="filter-link" data-category="1">
                            <span class="f-text">{{ \App\Support\CmsText::get('category.infraestructura', __('site.categories.infraestructura')) }}</span>
                        </button>
                        <button class="filter-link" data-category="3">
                            <span class="f-text">{{ \App\Support\CmsText::get('category.maritimo', __('site.categories.maritimo')) }}</span>
                        </button>
                        <button class="filter-link" data-category="4">
                            <span class="f-text">{{ \App\Support\CmsText::get('category.ferroviaria', __('site.categories.ferroviaria')) }}</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Tech HUD Elements -->
            
            <div class="map-hud hud-bottom-right">
                <div class="hud-label">COORDINATES: LAT/LONG</div>
                <div class="hud-line"></div>
            </div>
        </div>

        <!-- Right: Info Side (The Project Card) -->
        <div class="project-overlay-sidebar" id="projectOverlay">
            <div class="project-white-card">
                <button class="close-overlay" id="closeOverlay">&times;</button>
                
                <h2 class="project-name" id="overlayTitle">Project Title</h2>
                
                <div class="project-stats-grid">
                    <div class="stat-item">
                        <span class="stat-label">{{ \App\Support\CmsText::get('projects.location', 'UBICACION') }}</span>
                        <span class="stat-value" id="overlayAddress">Address</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">{{ \App\Support\CmsText::get('projects.status', 'ESTADO') }}</span>
                        <span class="stat-value" id="overlayStatus">COMPLETΛDO</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">{{ \App\Support\CmsText::get('projects.type', 'TIPO') }}</span>
                        <span class="stat-value" id="overlayType">INFRΛESTRUCTURΛ</span>
                    </div>
                </div>

                <p class="project-description" id="overlayDescription">
                    Desarrollo de infraestructura estratégica con los más altos estándares de calidad y tecnología, impulsando el progreso de México conforme a los objetivos de sostenibilidad y eficiencia.
                </p>

                <div class="project-visual-notched">
                    <img id="overlayImage" src="" alt="Project Image">
                </div>
            </div>
        </div>
    </section>

</div>

<!-- Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<style>
    :root {
        --map-bg: #e8ebf2; 
        --card-bg: #0a0a0a;
        --card-border: rgba(255, 255, 255, 0.08);
        --indi-blue: #0066f9;
        
        /* Category Colors */
        --color-construccion: #ffa608;
        --color-infraestructura: #64b032;
        --color-maritimo: #0066f9;
        --color-ferroviaria: #ff3000;
        
        --transition: cubic-bezier(0.16, 1, 0.3, 1);
    }

    /* Reference Style: Physical Model Vignette (Exact from reference) */
    .vignette {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 501;
        background: radial-gradient(
          circle at center,
          transparent 40%,
          rgba(10, 15, 30, 0.35) 130%
        );
    }

    .projects-page-wrapper {
        background: var(--map-bg);
        color: #fff;
        min-height: 100vh;
        overflow-x: hidden;
        overflow-y: hidden;
    }

    .hero-subtitle {
        font-family: 'usual', sans-serif;
        font-size: clamp(0.7rem, 1.5vw, 0.9rem);
        letter-spacing: 0.15em;
        color: rgba(0,0,0,0.6);
        max-width: 480px;
        line-height: 1.6;
        text-transform: uppercase;
        font-weight: 600;
    }

    /* Floating Titles Style */
    .map-titles-overlay {
        position: absolute;
        top: 260px;
        left: 5%;
        z-index: 1005;
        pointer-events: none;
        max-width: 600px;
    }

    .map-titles-overlay h1 {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        line-height: 0.95;
        margin-bottom: 1.5rem;
        color: #000;
        font-family: 'usual', sans-serif;
        font-weight: 700;
        text-shadow: 0 2px 10px rgba(255, 255, 255, 0.2);
    }

    .map-controls-overlay {
        position: absolute;
        bottom: 60px;
        left: 5%;
        z-index: 2100;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
        pointer-events: none;
        transition: all 1s var(--transition);
    }

    /* Search control aligned to INDI platform colors */
    .project-search-container {
        pointer-events: auto !important;
        background: var(--indi-gray);
        backdrop-filter: blur(10px);
        border: 1px solid var(--indi-border);
        clip-path: none;
        padding: 0 1.5rem;
        width: min(420px, 80vw);
        max-width: 420px;
        min-height: 56px;
        display: flex;
        align-items: center;
        transition: all 0.4s ease;
    }

    .project-search-container:focus-within {
        border-color: var(--indi-blue);
        box-shadow: 0 14px 35px rgba(0, 102, 255, 0.12);
    }

    .project-search-input-wrapper {
        display: flex;
        align-items: center;
        width: 100%;
        gap: 0.8rem;
    }

    .project-search-input-wrapper svg {
        color: var(--indi-blue);
        flex: 0 0 auto;
    }

    .project-search-input-wrapper input {
        background: transparent;
        border: none;
        color: var(--indi-dark);
        font-family: 'usual', sans-serif;
        font-size: 0.85rem;
        font-weight: 600;
        width: 100%;
        padding: 0.8rem 0;
        letter-spacing: 0.05em;
    }

    .project-search-input-wrapper input:focus {
        outline: none;
    }

    .project-search-input-wrapper input::placeholder {
        color: var(--indi-text-muted);
    }

    /* Map Styles */
    .map-section-premium {
        height: 100vh;
        width: 100%;
        display: flex;
        background: var(--map-bg);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        border-bottom: 2px solid var(--indi-blue);
        overflow: hidden;
        position: relative;
    }

    .map-side {
        flex: 1;
        position: relative;
        height: 100%;
        background: #f0f0f5;
        transition: all 0.6s var(--transition);
    }

    #projectsMap {
        height: 100%;
        width: 100%;
        min-height: 100%;
    }

    /* Technical Grid Overlay */
    .map-grid-overlay {
        position: absolute;
        inset: 0;
        pointer-events: none;
        z-index: 500;
        background-image: 
            linear-gradient(rgba(0,102,249,0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(0,102,249,0.03) 1px, transparent 1px);
        background-size: 80px 80px;
        opacity: 0.4;
    }

    .map-scanner-line {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 150px;
        background: linear-gradient(180deg, transparent, rgba(0,102,249,0.03), transparent);
        opacity: 1;
        z-index: 501;
        pointer-events: none;
        animation: scanLines 12s linear infinite;
    }

    @keyframes scanLines {
        from { top: 0; }
        to { top: 100%; }
    }

    .leaflet-container {
        background-color: var(--map-bg) !important;
    }

    .leaflet-tile {
        filter: brightness(1.05) contrast(1.05);
        transition: opacity 0.5s ease;
    }

    /* Premium Filter Bar (Inspired by Menu) */
    .filter-bar-premium {
        pointer-events: auto;
        transition: all 1s var(--transition);
        width: 100%;
        max-width: 100%;
        min-width: 0;
    }

    .filter-container-blue {
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--indi-blue);
        border: 0;
        box-shadow: none;
        padding: 0 2rem;
        height: 64px;
        position: relative;
        /* Notch logic */
        --notch-x: 10%;
        --notch-w: 60px;
        clip-path: polygon(
            0% 0%,
            100% 0%,
            100% 100%,
            calc(var(--notch-x) + (var(--notch-w) / 2) + 15px) 100%,
            calc(var(--notch-x) + (var(--notch-w) / 2)) 85%,
            calc(var(--notch-x) - (var(--notch-w) / 2)) 85%,
            calc(var(--notch-x) - (var(--notch-w) / 2) - 15px) 100%,
            0% 100%
        );
        transition: all 0.5s var(--transition);
    }

    .filter-link {
        background: transparent;
        border: none;
        color: rgba(255,255,255,0.68);
        padding: 0 1.5rem;
        font-family: 'usual', sans-serif;
        font-size: 0.75rem;
        font-weight: 700;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        position: relative;
        transition: all 0.4s ease;
        letter-spacing: 0.12em;
    }

    .filter-link:hover, .filter-link.active {
        color: #fff;
        text-shadow: none;
    }

    .filter-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%) scaleX(0);
        width: 60%;
        height: 2px;
        background: #fff;
        box-shadow: none;
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .filter-link.active::after {
        transform: translateX(-50%) scaleX(1);
    }

    .filter-link.active {
        transform: translateY(-1px);
    }

    .map-hud {
        position: absolute;
        z-index: 1000;
        pointer-events: none;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .hud-top-left { top: 40px; left: 5%; }
    .hud-bottom-right { bottom: 40px; right: 5%; align-items: flex-end; }

    .hud-line {
        width: 100px;
        height: 1px;
        background: var(--indi-blue);
        opacity: 0.5;
    }

    .hud-label {
        font-family: 'usual', sans-serif;
        font-size: 0.55rem;
        color: var(--indi-dark);
        opacity: 0.6;
        letter-spacing: 0.2em;
    }

    /* Selected Marker Highlighter: Ref Pulsating style */
    .marker-pin {
        width: 18px;
        height: 18px;
        background: #ffffff;
        border: 4px solid currentColor;
        border-radius: 50%;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        cursor: pointer;
        position: relative;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .marker-pin::after {
        content: '';
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        width: 100%; height: 100%;
        border-radius: 50%;
        box-shadow: 0 0 0 0 currentColor;
        animation: markerPulseRef 2.5s infinite cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes markerPulseRef {
        0% { box-shadow: 0 0 0 0 rgba(0, 102, 249, 0.8); }
        70% { box-shadow: 0 0 0 15px rgba(0, 102, 249, 0); }
        100% { box-shadow: 0 0 0 0 rgba(0, 102, 249, 0); }
    }

    .marker-pin.active {
        transform: scale(1.6);
        z-index: 9999;
        border-width: 5px;
        box-shadow: 0 15px 40px rgba(0, 102, 249, 0.4);
    }

    .marker-pin.active::before {
        content: '';
        position: absolute;
        inset: -12px;
        border: 1px solid currentColor;
        border-radius: 50%;
        opacity: 0.5;
        animation: rotateSelection 10s linear infinite;
    }

    @keyframes rotateSelection {
        0% { transform: rotate(0deg); border-style: dashed; }
        100% { transform: rotate(360deg); border-style: dashed; }
    }

    .custom-div-icon {
        background: none !important;
        border: none !important;
    }

    /* Marker Labels */
    .marker-label-container {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .marker-label {
        position: absolute;
        bottom: 25px;
        left: 50%;
        transform: translateX(-50%);
        font-family: 'usual', sans-serif;
        font-weight: 700;
        font-size: 0.7rem;
        text-transform: uppercase;
        white-space: nowrap;
        background: rgba(255, 255, 255, 0.95);
        padding: 4px 8px;
        border-radius: 4px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.4s ease, visibility 0.4s ease, transform 0.4s ease;
        pointer-events: none;
        letter-spacing: 0.05em;
    }
    
    .leaflet-container.zoomed-in .marker-label {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(-5px);
    }

    /* Project Sidebar */
    .project-overlay-sidebar {
        position: absolute;
        top: 0;
        right: 0;
        width: 450px;
        height: 100%;
        background: var(--indi-gray);
        z-index: 2105;
        transform: translateX(100%);
        transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        display: flex;
        flex-direction: column;
        border-left: 2px solid var(--indi-blue);
        box-shadow: -15px 0 35px rgba(0,0,0,0.18);
    }

    .project-overlay-sidebar.active {
        transform: translateX(0);
        width: 50vw !important;
    }

    .project-white-card {
        width: 100%;
        height: 100%;
        background: var(--indi-gray);
        padding: 4.5rem;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow-y: auto;
    }

    /* Custom scrollbar for overlay card */
    .project-white-card::-webkit-scrollbar {
        width: 6px;
    }
    .project-white-card::-webkit-scrollbar-track {
        background: rgba(0,0,0,0.04);
    }
    .project-white-card::-webkit-scrollbar-thumb {
        background: rgba(0,102,255,0.35);
        border-radius: 3px;
    }
    .project-white-card::-webkit-scrollbar-thumb:hover {
        background: var(--indi-blue);
    }

    .project-overlay-sidebar .project-name {
        font-family: 'usual', sans-serif;
        font-weight: 700;
        font-size: clamp(1.6rem, 3vw, 2.5rem);
        line-height: 1.1;
        margin-top: 1.5rem;
        margin-bottom: 2rem;
        color: var(--indi-dark);
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .project-overlay-sidebar .project-stats-grid {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        border-top: 1px solid var(--indi-border);
        border-bottom: 2px solid var(--indi-blue);
        margin-bottom: 2.5rem;
        padding: 1.5rem 0;
        gap: 1rem;
    }

    .project-overlay-sidebar .stat-item {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        border-right: 1px solid var(--indi-border);
        padding-left: 0.8rem;
    }

    .project-overlay-sidebar .stat-item:first-child {
        padding-left: 0;
    }

    .project-overlay-sidebar .stat-item:last-child {
        border-right: none;
    }

    .project-overlay-sidebar .stat-label {
        font-family: 'usual', sans-serif;
        font-size: 0.7rem;
        font-weight: 700;
        color: var(--indi-text-muted);
        margin-bottom: 0.6rem;
        text-transform: uppercase;
        letter-spacing: 0.2em;
    }

    .project-overlay-sidebar .stat-value {
        font-size: clamp(0.9rem, 1.8vw, 1.25rem);
        font-weight: 700;
        color: var(--indi-dark);
        font-family: 'usual', sans-serif;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        line-height: 1.2;
    }

    .project-overlay-sidebar .project-description {
        font-size: clamp(0.95rem, 1.8vw, 1.15rem);
        line-height: 1.7;
        color: #333;
        margin-bottom: 3rem;
        font-family: 'usual', sans-serif;
        font-weight: 400;
    }

    .project-overlay-sidebar .project-visual-notched {
        width: calc(100% + 9rem);
        margin: 0 -4.5rem;
        height: 45vh;
        margin-top: auto;
        clip-path: polygon(0 0, 30% 0, 36% 6%, 64% 6%, 70% 0, 100% 0, 100% 100%, 0 100%);
        overflow: hidden;
        border-top: 1px solid var(--indi-border);
    }

    .project-overlay-sidebar .project-visual-notched img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .close-overlay {
        position: absolute;
        top: 2rem;
        right: 2rem;
        background: #fff;
        border: 1px solid var(--indi-border);
        color: var(--indi-dark);
        width: 44px;
        height: 44px;
        border-radius: 0;
        clip-path: polygon(0 0, 75% 0, 100% 25%, 100% 100%, 25% 100%, 0 75%);
        font-size: 1.4rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        z-index: 110;
    }

    .close-overlay:hover {
        background: var(--indi-blue);
        border-color: var(--indi-blue);
        color: #fff;
        box-shadow: none;
        transform: rotate(90deg);
    }

    /* --- RESPONSIVE / BREAKPOINTS SYSTEM --- */
    
    /* BREAKPOINT: 1080px (Desktop Estándar / Tabletas Grandes) */
    @media (max-width: 1080px) {
        .map-titles-overlay {
            top: 180px;
        }
        
        .map-controls-overlay {
            bottom: 40px;
            left: 3%;
        }

        .project-search-container {
            width: min(360px, 78vw);
            max-width: 360px;
        }

        .filter-container-blue {
            padding: 0 1rem;
            height: 54px;
        }

        .filter-link {
            padding: 0 1rem;
            font-size: 0.68rem;
        }

        .project-overlay-sidebar.active {
            width: 50vw !important;
        }

        .project-white-card {
            padding: 3rem 2rem;
        }

        .project-overlay-sidebar .project-stats-grid {
            padding: 1rem 0;
            margin-bottom: 1.5rem;
        }

        .project-overlay-sidebar .stat-item {
            padding-left: 0.4rem;
        }

        .project-overlay-sidebar .stat-label {
            font-size: 0.6rem;
            letter-spacing: 0.12em;
        }

        .project-overlay-sidebar .stat-value {
            font-size: 0.95rem;
        }

        .project-overlay-sidebar .project-visual-notched {
            margin: 0 -2rem;
            width: calc(100% + 4rem);
            height: 38vh;
        }
    }

    /* BREAKPOINT: 900px (Tabletas en Vertical / Teléfonos en Horizontal) */
    @media (max-width: 900px) {
        .projects-page-wrapper {
            height: 100svh;
            min-height: 100svh;
            background: var(--map-bg);
            overflow: hidden;
        }

        .map-section-premium {
            flex-direction: column;
            height: 100svh !important;
            min-height: 100svh !important;
            overflow: hidden;
            border-bottom: 0;
        }

        .map-side {
            height: 100svh !important;
            min-height: 100svh !important;
            width: 100%;
            overflow: hidden;
        }

        #projectsMap {
            height: 100% !important;
            min-height: 100svh;
        }

        .map-titles-overlay {
            top: 8.2rem;
            left: 1rem;
            right: 1rem;
            width: auto;
            max-width: 20rem;
        }

        .map-titles-overlay h1 {
            font-size: clamp(1.65rem, 8vw, 2.15rem);
            line-height: 0.95;
            margin-bottom: 0.55rem;
            color: var(--indi-blue);
            text-shadow: 0 1px 0 rgba(255,255,255,0.75);
        }

        .hero-subtitle {
            font-size: 0.68rem;
            max-width: 15rem;
            line-height: 1.35;
            letter-spacing: 0.08em;
            color: rgba(0, 0, 0, 0.54);
        }

        .map-controls-overlay {
            bottom: calc(env(safe-area-inset-bottom, 0px) + 0.85rem);
            left: 1rem !important;
            right: 1rem !important;
            width: auto !important;
            gap: 0.65rem;
        }

        .project-search-container {
            width: 100%;
            max-width: none;
            min-height: 46px;
            padding: 0 1rem;
        }

        .project-search-input-wrapper input {
            padding: 0.6rem 0;
            font-size: 0.8rem;
        }

        .filter-container-blue {
            clip-path: none;
            border-radius: 0;
            display: flex;
            overflow-x: auto;
            overflow-y: hidden;
            white-space: nowrap;
            justify-content: flex-start;
            gap: 0.35rem;
            padding: 0 0.75rem;
            height: 46px;
            width: 100%;
            max-width: 100%;
            scroll-snap-type: x proximity;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            touch-action: pan-x;
        }

        .filter-container-blue::-webkit-scrollbar {
            display: none;
        }

        .filter-link {
            flex: 0 0 auto;
            min-width: clamp(86px, 27vw, 132px);
            max-width: 148px;
            padding: 0 0.7rem;
            font-size: 0.6rem;
            letter-spacing: 0.05em;
            display: inline-flex;
            height: 100%;
            text-align: center;
            line-height: 1.05;
            white-space: normal;
            overflow-wrap: normal;
            word-break: normal;
            scroll-snap-align: start;
        }

        .filter-link .f-text {
            display: block;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .hud-bottom-right,
        .map-scanner-line {
            display: none;
        }

        /* Sidebar Overlay transitions bottom-to-top */
        .project-overlay-sidebar {
            width: 100% !important;
            height: 80vh;
            top: auto;
            bottom: 0;
            left: 0;
            border-left: none;
            border-top: 2px solid var(--indi-blue);
            transform: translateY(100%);
            box-shadow: 0 -15px 35px rgba(0,0,0,0.18);
        }

        .project-overlay-sidebar.active {
            width: 100% !important;
            transform: translateY(0);
        }

        .project-white-card {
            padding: 3rem 1.5rem;
            display: block; /* Disables flex column to avoid layout conflicts */
        }

        .project-overlay-sidebar .project-stats-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 0.5rem;
        }

        .project-overlay-sidebar .project-visual-notched {
            margin: 2rem -1.5rem 0 -1.5rem;
            width: calc(100% + 3rem);
            height: 35vh;
        }

        .close-overlay {
            top: 1.5rem;
            right: 1.5rem;
            width: 38px;
            height: 38px;
            font-size: 1.2rem;
        }

    }

    /* BREAKPOINT: 500px (Teléfonos Móviles en Vertical) */
    @media (max-width: 500px) {
        .map-side {
            height: 100svh !important;
            min-height: 100svh !important;
        }

        #projectsMap {
            min-height: 100svh;
        }

        .map-titles-overlay {
            top: 8.75rem;
            max-width: 18rem;
        }

        .map-titles-overlay h1 {
            font-size: clamp(1.45rem, 9vw, 1.9rem);
            margin-bottom: 0;
        }

        .hero-subtitle {
            display: none;
        }

        .project-search-container {
            width: 100%;
            max-width: none;
        }

        .project-search-input-wrapper input {
            font-size: 0.7rem;
            letter-spacing: 0.02em;
        }

        .filter-link {
            min-width: clamp(78px, 31vw, 112px);
            max-width: 118px;
            font-size: 0.54rem;
            padding: 0 0.55rem;
            letter-spacing: 0.035em;
        }

        .filter-container-blue {
            height: 44px;
            gap: 0.25rem;
            padding: 0 0.55rem;
        }

        .project-overlay-sidebar {
            height: 85vh;
        }

        .project-overlay-sidebar .project-name {
            font-size: 1.4rem;
            margin-top: 1rem;
            margin-bottom: 1.5rem;
        }

        .project-overlay-sidebar .project-stats-grid {
            padding: 0.8rem 0;
            margin-bottom: 1.5rem;
        }

        .project-overlay-sidebar .stat-value {
            font-size: 0.8rem;
        }

        .project-overlay-sidebar .stat-label {
            font-size: 0.55rem;
            letter-spacing: 0.1em;
        }

        .project-overlay-sidebar .project-description {
            font-size: 0.88rem;
            margin-bottom: 2rem;
        }

        .project-overlay-sidebar .project-visual-notched {
            height: 30vh;
        }

        .close-overlay {
            top: 1rem;
            right: 1rem;
        }

    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const projects = @json($projects);
        const defaultMapCenter = [23.6345, -102.5528];
        const isCompactMap = () => window.matchMedia('(max-width: 900px)').matches;
        const getBaseZoom = () => isCompactMap() ? 4 : 5;
        
        // Initialize Map
        const map = L.map('projectsMap', {
            center: defaultMapCenter,
            zoom: getBaseZoom(),
            zoomSnap: 0.25,
            zoomControl: false,
            attributionControl: false
        });

        const invalidateProjectMap = () => {
            window.requestAnimationFrame(() => map.invalidateSize(false));
        };

        // Fix for Leaflet loading before responsive container dimensions settle.
        setTimeout(invalidateProjectMap, 100);
        setTimeout(invalidateProjectMap, 450);
        setTimeout(invalidateProjectMap, 900);
        window.addEventListener('resize', invalidateProjectMap);
        window.addEventListener('orientationchange', () => setTimeout(invalidateProjectMap, 300));

        // Custom attribution (minimalist)
        L.control.attribution({position: 'bottomleft'}).setPrefix('INDI OSINT-MAP').addTo(map);

        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; CartoDB',
            maxZoom: 19
        }).addTo(map);

        // Toggle labels based on zoom
        map.on('zoomend', function() {
            if (map.getZoom() >= 7) {
                map.getContainer().classList.add('zoomed-in');
            } else {
                map.getContainer().classList.remove('zoomed-in');
            }
        });

        const markerGroup = L.featureGroup().addTo(map);

        function getMapPaddingOptions(isOverlayActive = false) {
            if (isCompactMap()) {
                return isOverlayActive
                    ? { paddingTopLeft: [24, 130], paddingBottomRight: [24, Math.min(window.innerHeight * 0.48, 360)] }
                    : { paddingTopLeft: [24, 145], paddingBottomRight: [24, 180] };
            }

            return isOverlayActive
                ? { paddingTopLeft: [50, 50], paddingBottomRight: [window.innerWidth * 0.52, 50] }
                : { padding: [100, 100] };
        }

        function fitVisibleMarkers() {
            if (markerGroup.getLayers().length === 0) return;

            const isOverlayActive = document.getElementById('projectOverlay').classList.contains('active');

            try {
                map.fitBounds(markerGroup.getBounds(), getMapPaddingOptions(isOverlayActive));
            } catch(e) {}
        }

        function showProject(project) {
            const overlay = document.getElementById('projectOverlay');
            
            // Helper to tech-ify text (Disabled to maintain clean Usual font)
            const techify = (text) => text.toUpperCase();

            const categories = {
                1: { 
                    name: @json(\App\Support\CmsText::get('category.infraestructura', __('site.categories.infraestructura'))), 
                    color: '#64b032',
                    desc: 'Ingeniería de alta precisión en el desarrollo de sistemas de transporte masivo y vialidades urbanas complejas. Superamos desafíos técnicos en entornos de alta densidad poblacional, implementando soluciones de movilidad que transforman la dinámica de las metrópolis mexicanas.'
                },
                2: { 
                    name: @json(\App\Support\CmsText::get('category.construccion', __('site.categories.construccion'))), 
                    color: '#ffa608',
                    desc: 'Especialistas en ingeniería civil de alta complejidad y cimentación profunda. Nuestra capacidad técnica nos permite ejecutar obras monumentales enfrentando condiciones geológicas adversas, garantizando la integridad estructural y longevidad en edificaciones icónicas y centros de servicio estratégico.'
                },
                3: { 
                    name: @json(\App\Support\CmsText::get('category.maritimo', __('site.categories.maritimo'))), 
                    color: '#0066f9',
                    desc: 'Dominio técnico en ingeniería portuaria y obras de dragado especializado. Integramos tecnologías de vanguardia para la construcción de escolleras y terminales en entornos marítimos dinámicos, superando los retos de la hidrodinámica y el clima para conectar a México con el mundo.'
                },
                4: { 
                    name: @json(\App\Support\CmsText::get('category.ferroviaria', __('site.categories.ferroviaria'))), 
                    color: '#ff3000',
                    desc: 'Ingeniería ferroviaria avanzada para sistemas de transporte de carga y pasajeros a gran escala. Resolvemos retos logísticos y de orografía compleja, trazando rutas estratégicas que impulsan la competitividad nacional mediante infraestructura resiliente y de alto rendimiento.'
                }
            };

            const cat = categories[project.category] || categories[1];

            document.getElementById('overlayTitle').innerText = techify(project.title);
            document.getElementById('overlayAddress').innerText = techify(project.address);
            document.getElementById('overlayStatus').innerText = project.status == 1 ? @json(\App\Support\CmsText::get('projects.completed', 'COMPLETADO')) : @json(\App\Support\CmsText::get('projects.in_progress', 'EN PROCESO'));
            document.getElementById('overlayDescription').innerText = project.description || cat.desc;
            
            // Update HUD Coordinates dynamically
            const hudCoords = document.querySelector('.hud-bottom-right .hud-label');
            if(hudCoords) {
                hudCoords.innerText = `COORD: ${parseFloat(project.latitude).toFixed(4)}N / ${parseFloat(project.longitude).toFixed(4)}W`;
            }

            document.getElementById('overlayType').innerText = cat.name;

            // Use project image if available
            const imgPath = project.marker_image ? 
                (project.marker_image.startsWith('http') ? project.marker_image : window.ASSET_URL + '/' + project.marker_image) : 
                window.ASSET_URL + '/imagenes_indi/Maritimo/contenedores-muelle-lazaro-cardenas.webp';
            document.getElementById('overlayImage').src = imgPath;
            
            // Highlight Active Marker
            document.querySelectorAll('.marker-pin').forEach(pin => pin.classList.remove('active'));
            const marker = markerMap.get(project.id);
            if (marker && marker._icon) {
                const pin = marker._icon.querySelector('.marker-pin');
                if (pin) pin.classList.add('active');
            }

            overlay.classList.add('active');
            setTimeout(invalidateProjectMap, 120);
            
            // Map camera update: desktop offsets for side panel; mobile keeps the marker visible above bottom sheet.
            const zoom = isCompactMap() ? 8 : 12;
            const markerPoint = map.project([project.latitude, project.longitude], zoom);
            const overlayWidth = overlay.getBoundingClientRect().width || (window.innerWidth * 0.5);
            const targetPoint = isCompactMap()
                ? markerPoint
                : L.point(markerPoint.x + (overlayWidth / 2), markerPoint.y);
            const targetLatLng = map.unproject(targetPoint, zoom);

            map.flyTo(targetLatLng, zoom, {
                duration: 1.5,
                easeLinearity: 0.1
            });
        }

        document.getElementById('closeOverlay').addEventListener('click', () => {
            const overlay = document.getElementById('projectOverlay');
            overlay.classList.remove('active');
            setTimeout(() => {
                invalidateProjectMap();
                if (markerGroup.getLayers().length > 0) {
                    fitVisibleMarkers();
                } else {
                    map.setView(defaultMapCenter, getBaseZoom());
                }
            }, 600);
        });

        const markerMap = new Map();
        const categoryColors = {
            1: '#64b032',
            2: '#ffa608',
            3: '#0066f9',
            4: '#ff3000'
        };

        projects.forEach(project => {
            const color = categoryColors[project.category] || categoryColors[1];
            const icon = L.divIcon({
                className: 'custom-div-icon',
                html: `
                    <div class="marker-label-container">
                        <span class="marker-label" style="color: ${color}">${project.title}</span>
                        <div class="marker-pin" style="background: ${color}; box-shadow: 0 0 15px ${color};"></div>
                    </div>
                `,
                iconSize: [20, 20],
                iconAnchor: [10, 10]
            });

            const marker = L.marker([project.latitude, project.longitude], { icon: icon })
                .addTo(markerGroup)
                .on('click', () => showProject(project));
            
            markerMap.set(project.id, marker);
        });

        setTimeout(fitVisibleMarkers, 700);
        window.addEventListener('resize', () => {
            setTimeout(() => {
                invalidateProjectMap();
                if (!document.getElementById('projectOverlay').classList.contains('active')) {
                    fitVisibleMarkers();
                }
            }, 220);
        });

        // Filtering Logic with Notch Animation
        const filterLinks = document.getElementById('filterLinks');
        const filterBtns = document.querySelectorAll('.filter-link');

        function updateFilterNotch(btn) {
            if (!btn || !filterLinks) return;
            const btnRect = btn.getBoundingClientRect();
            const containerRect = filterLinks.getBoundingClientRect();
            const x = btnRect.left - containerRect.left + btnRect.width / 2;
            const xPercent = (x / containerRect.width) * 100;

            gsap.to(filterLinks, {
                '--notch-x': `${xPercent}%`,
                duration: 0.6,
                ease: "power2.out"
            });
        }

        // Set initial notch position
        setTimeout(() => {
            const activeBtn = document.querySelector('.filter-link.active');
            if(activeBtn) updateFilterNotch(activeBtn);
        }, 500);

        filterLinks.addEventListener('mouseleave', () => {
            const activeBtn = document.querySelector('.filter-link.active');
            if(activeBtn) updateFilterNotch(activeBtn);
        });

        const searchInput = document.getElementById('projectSearchInput');

        function normalizeSearchText(text) {
            if (!text) return '';

            return text
                .toString()
                .toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/ñ/g, 'n')
                .replace(/λ/g, 'a')
                .replace(/ξ/g, 'e')
                .trim();
        }

        function projectMatchesSearch(project, searchTerm) {
            if (!searchTerm) return true;

            return [
                project.title,
                project.address,
                project.category,
                project.description
            ].some(value => normalizeSearchText(value).includes(searchTerm));
        }

        function applyFilters() {
            const searchTerm = normalizeSearchText(searchInput.value);
            const activeCategoryBtn = document.querySelector('.filter-link.active');
            const category = activeCategoryBtn ? activeCategoryBtn.getAttribute('data-category') : 'all';

            let visibleCount = 0;

            // Filter Markers
            markerGroup.clearLayers();
            projects.forEach(p => {
                const matchesCategory = (category === 'all' || p.category == category);
                const matchesSearch = projectMatchesSearch(p, searchTerm);
                
                if (matchesCategory && matchesSearch) {
                    markerGroup.addLayer(markerMap.get(p.id));
                    visibleCount++;
                }
            });

            fitVisibleMarkers();
        }

        searchInput.addEventListener('input', applyFilters);

        filterBtns.forEach(btn => {
            btn.addEventListener('mouseenter', () => updateFilterNotch(btn));
            
            btn.addEventListener('click', () => {
                // Toggle active button
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                updateFilterNotch(btn);
                btn.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                
                applyFilters();
            });
        });

        // GSAP Animations
        if (typeof gsap !== 'undefined') {
            gsap.from(".reveal-text", {
                y: 100,
                opacity: 0,
                duration: 1.5,
                ease: "expo.out",
                stagger: 0.2
            });
        }
    });
</script>
@endsection
