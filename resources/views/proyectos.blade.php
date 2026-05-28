@extends('layouts.app')

@section('title', 'PROYECTOS | GRUPO INDI')

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
                <h1 class="indi-heading-large hero-typer-text" style="color: #0066f9; font-family: 'usual', sans-serif;">NUΞSTROS<br>PROYΞCTOS</h1>
                <p class="hero-subtitle">MÁS DΞ 50 ΛÑOS CONSTRUYΞNDO LΛ INFRΛESTRUCTURΛ DΞ MÉXICO</p>
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
                        <input type="text" id="projectSearchInput" placeholder="BUSCΛR PROYECTO O UBICΛCIÓN...">
                    </div>
                </div>

                <div class="filter-bar-premium">
                    <div class="filter-container-blue" id="filterLinks">
                        <button class="filter-link active" data-category="all">
                            {{-- <span class="f-num">00</span> --}}
                            <span class="f-text">TODOS</span>
                        </button>
                        <button class="filter-link" data-category="2">
                            <span class="f-text">CONS</span>
                            <span class="f-text">TRUCCIÓN</span>
                        </button>
                        <button class="filter-link" data-category="1">
                            <span class="f-text">INFRΛ</span>
                            <span class="f-text">ESTRUCTURΛ</span>
                        </button>
                        <button class="filter-link" data-category="3">
                            <span class="f-text">MΛRÍ</span>
                            <span class="f-text">TIMO</span>
                        </button>
                        <button class="filter-link" data-category="4">
                            <span class="f-text">FERRO</span>
                            <span class="f-text">VIΛRIΛ</span>
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
                        <span class="stat-label">UBICΛCIÓN</span>
                        <span class="stat-value" id="overlayAddress">Address</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">ESTΛDO</span>
                        <span class="stat-value" id="overlayStatus">COMPLETΛDO</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">TIPO</span>
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

    <!-- Project List / Filter Section -->
    <section class="projects-list-section" style="background: #050505;">
        <div class="indi-container">
            <div class="list-header" style="flex-wrap: wrap; gap: 2rem;">
                <div class="header-left">
                    <span class="u-num">ARCHIVE_01</span>
                    <h3 class="indi-heading">DOMINIO TÉCNICO</h3>
                </div>

                <div class="list-count">
                    <span class="count-num" id="projectCount">{{ count($projects) }}</span>
                    <span class="count-label">LOCALIZACIONES ACTIVA_S</span>
                </div>
            </div>
            
            <div class="projects-grid">
                @foreach($projects as $project)
                <div class="project-card-mini reveal-card" 
                     data-lat="{{ $project['latitude'] }}" 
                     data-lng="{{ $project['longitude'] }}" 
                     data-id="{{ $project['id'] }}"
                     data-category="{{ $project['category'] }}">
                    <div class="card-inner">
                        <div class="card-top">
                            <span class="project-id" style="color: var(--color-{{ 
                                [1=>'infraestructura', 2=>'construccion', 3=>'maritimo', 4=>'ferroviaria'][$project['category']] ?? 'infraestructura' 
                            }});">ID_{{ str_pad($project['id'], 2, '0', STR_PAD_LEFT) }}</span>
                            <div class="card-corner"></div>
                        </div>
                        <h4 class="project-title">{{ $project['title'] }}</h4>
                        <div class="card-footer">
                            <span class="project-loc">{{ $project['address'] }}</span>
                            <span class="view-btn">LOCΛLIZΛR +</span>
                        </div>
                    </div>
                    <div class="card-glow" style="background: radial-gradient(circle at center, var(--color-{{ 
                                [1=>'infraestructura', 2=>'construccion', 3=>'maritimo', 4=>'ferroviaria'][$project['category']] ?? 'infraestructura' 
                            }}), transparent);"></div>
                </div>
                @endforeach
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
        background: #000;
        color: #fff;
        height: 100vh;
        overflow: hidden;
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
        width: 40%;
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

    /* List Section */
    .projects-list-section {
        padding: 10rem 0;
    }

    .list-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 5rem;
    }

    .header-left .u-num {
        color: var(--indi-blue);
        letter-spacing: 0.4em;
        font-size: 0.8rem;
        margin-bottom: 1.5rem;
        display: block;
    }

    .list-count {
        text-align: right;
    }

    .count-num {
        display: block;
        font-family: 'usual', sans-serif;
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        color: #fff;
        line-height: 1;
    }

    .count-label {
        font-family: 'usual', sans-serif;
        font-size: 0.7rem;
        color: #666;
        letter-spacing: 0.2em;
    }

    /* Projects Grid with modern notched cards */
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 2rem;
    }

    .project-card-mini {
        background: rgba(10, 10, 10, 0.6);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        position: relative;
        padding: 3rem 2.5rem;
        cursor: pointer;
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        clip-path: polygon(0 0, calc(100% - 20px) 0, 100% 20px, 100% 100%, 0 100%);
        overflow: hidden;
        min-height: 280px;
    }

    .project-card-mini::before {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 4px; height: 100%;
        transform: scaleY(0);
        transform-origin: bottom;
        transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .project-card-mini:hover::before {
        transform: scaleY(1);
    }

    .project-card-mini[data-category="1"]::before { background: var(--color-infraestructura); }
    .project-card-mini[data-category="2"]::before { background: var(--color-construccion); }
    .project-card-mini[data-category="3"]::before { background: var(--color-maritimo); }
    .project-card-mini[data-category="4"]::before { background: var(--color-ferroviaria); }

    .project-card-mini:hover {
        transform: translateY(-8px);
        background: rgba(20, 20, 20, 0.85);
        z-index: 10;
    }

    .project-card-mini[data-category="1"]:hover { border-color: var(--color-infraestructura); box-shadow: 0 15px 30px rgba(100, 176, 50, 0.15); }
    .project-card-mini[data-category="2"]:hover { border-color: var(--color-construccion); box-shadow: 0 15px 30px rgba(255, 166, 8, 0.15); }
    .project-card-mini[data-category="3"]:hover { border-color: var(--color-maritimo); box-shadow: 0 15px 30px rgba(0, 102, 249, 0.15); }
    .project-card-mini[data-category="4"]:hover { border-color: var(--color-ferroviaria); box-shadow: 0 15px 30px rgba(255, 48, 0, 0.15); }

    .card-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem;
    }

    .project-id {
        font-family: 'usual', sans-serif;
        font-weight: 700;
        font-size: 0.75rem;
        letter-spacing: 0.1em;
    }

    .card-corner {
        width: 10px; height: 10px;
        border-top: 1px solid #333;
        border-right: 1px solid #333;
        transition: border-color 0.4s ease;
    }

    .project-card-mini:hover .card-corner {
        border-color: var(--indi-blue);
    }

    .project-title {
        font-family: 'usual', sans-serif;
        font-size: clamp(1rem, 2vw, 1.2rem);
        font-weight: 700;
        letter-spacing: 0.05em;
        line-height: 1.4;
        margin-bottom: 2.5rem;
        text-transform: uppercase;
        color: #fff;
        transition: color 0.3s ease;
    }

    .project-card-mini:hover .project-title {
        color: var(--indi-blue);
    }

    .card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .project-loc {
        font-family: 'usual', sans-serif;
        font-size: 0.75rem;
        color: #888;
        letter-spacing: 0.05em;
    }

    .view-btn {
        font-family: 'usual', sans-serif;
        font-size: 0.65rem;
        color: var(--indi-blue);
        font-weight: 700;
        letter-spacing: 0.08em;
        opacity: 0;
        transform: translateX(-10px);
        transition: all 0.4s ease;
    }

    .project-card-mini:hover .view-btn {
        opacity: 1;
        transform: translateX(0);
        text-shadow: none;
    }

    .card-glow {
        position: absolute;
        inset: 0;
        opacity: 0;
        transition: opacity 0.6s ease;
        pointer-events: none;
    }

    .project-card-mini:hover .card-glow {
        opacity: 0.08;
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
            width: 45% !important;
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

    /* BREAKPOINT: 720px (Tabletas en Vertical / Teléfonos en Horizontal) */
    @media (max-width: 720px) {
        .map-section-premium {
            flex-direction: column;
            height: auto;
            min-height: 100vh;
        }

        .map-side {
            height: 60vh;
            width: 100%;
        }

        .map-titles-overlay {
            top: 100px;
            left: 5%;
            width: 90%;
        }

        .map-titles-overlay h1 {
            font-size: 2.2rem;
            margin-bottom: 1rem;
            color: #fff;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.8);
        }

        .hero-subtitle {
            font-size: 0.75rem;
            max-width: 380px;
            color: rgba(255, 255, 255, 0.8);
        }

        .map-controls-overlay {
            bottom: 20px;
            left: 2%;
            width: 96%;
            gap: 0.75rem;
        }

        .project-search-container {
            width: 100%;
            max-width: none;
            min-height: 48px;
            padding: 0 1rem;
        }

        .project-search-input-wrapper input {
            padding: 0.6rem 0;
            font-size: 0.8rem;
        }

        .filter-container-blue {
            clip-path: none;
            border-radius: 4px;
            overflow-x: auto;
            white-space: nowrap;
            justify-content: flex-start;
            padding: 0 1rem;
            height: 48px;
            width: 100%;
        }

        .filter-link {
            padding: 0 0.8rem;
            font-size: 0.65rem;
            display: inline-flex;
            flex-shrink: 0;
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

        .projects-list-section {
            padding: 6rem 0;
        }

        .list-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .list-count {
            text-align: left;
        }

        .projects-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .project-card-mini {
            padding: 2.5rem 2rem;
            min-height: 220px;
        }
    }

    /* BREAKPOINT: 500px (Teléfonos Móviles en Vertical) */
    @media (max-width: 500px) {
        .map-side {
            height: 50vh;
        }

        .map-titles-overlay {
            top: 75px;
        }

        .map-titles-overlay h1 {
            font-size: 1.8rem;
        }

        .hero-subtitle {
            font-size: 0.65rem;
            max-width: 280px;
        }

        .project-search-container {
            width: 100%;
            max-width: none;
        }

        .project-search-input-wrapper input {
            font-size: 0.75rem;
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

        .count-num {
            font-size: 2.5rem;
        }

        .project-title {
            font-size: 1rem;
            margin-bottom: 2rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const projects = @json($projects);
        
        // Initialize Map
        const map = L.map('projectsMap', {
            center: [23.6345, -102.5528],
            zoom: 5,
            zoomControl: false,
            attributionControl: false
        });

        // Fix for Leaflet loading at a quarter size due to container CSS resolving late
        setTimeout(() => {
            map.invalidateSize();
        }, 400);

        // Custom attribution (minimalist)
        L.control.attribution({position: 'bottomleft'}).setPrefix('GRUPO INDI OSINT-MAP').addTo(map);

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

        function showProject(project) {
            const overlay = document.getElementById('projectOverlay');
            
            // Helper to tech-ify text (Disabled to maintain clean Usual font)
            const techify = (text) => text.toUpperCase();

            const categories = {
                1: { 
                    name: 'INFRΛESTRUCTURΛ', 
                    color: '#64b032',
                    desc: 'Ingeniería de alta precisión en el desarrollo de sistemas de transporte masivo y vialidades urbanas complejas. Superamos desafíos técnicos en entornos de alta densidad poblacional, implementando soluciones de movilidad que transforman la dinámica de las metrópolis mexicanas.'
                },
                2: { 
                    name: 'CONSTRUCCIÓN', 
                    color: '#ffa608',
                    desc: 'Especialistas en ingeniería civil de alta complejidad y cimentación profunda. Nuestra capacidad técnica nos permite ejecutar obras monumentales enfrentando condiciones geológicas adversas, garantizando la integridad estructural y longevidad en edificaciones icónicas y centros de servicio estratégico.'
                },
                3: { 
                    name: 'MΛRÍTIMO', 
                    color: '#0066f9',
                    desc: 'Dominio técnico en ingeniería portuaria y obras de dragado especializado. Integramos tecnologías de vanguardia para la construcción de escolleras y terminales en entornos marítimos dinámicos, superando los retos de la hidrodinámica y el clima para conectar a México con el mundo.'
                },
                4: { 
                    name: 'FERROVIΛRIΛ', 
                    color: '#ff3000',
                    desc: 'Ingeniería ferroviaria avanzada para sistemas de transporte de carga y pasajeros a gran escala. Resolvemos retos logísticos y de orografía compleja, trazando rutas estratégicas que impulsan la competitividad nacional mediante infraestructura resiliente y de alto rendimiento.'
                }
            };

            const cat = categories[project.category] || categories[1];

            document.getElementById('overlayTitle').innerText = techify(project.title);
            document.getElementById('overlayAddress').innerText = techify(project.address);
            document.getElementById('overlayStatus').innerText = project.status == 1 ? 'COMPLETΛDO' : 'ΞN PROCESO';
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
            
            // Map camera update: Offset marker to the left side
            const zoom = 12;
            const markerPoint = map.project([project.latitude, project.longitude], zoom);
            // Shift the center coordinates to the right, pushing the marker to the left
            const targetPoint = L.point(markerPoint.x + 225, markerPoint.y);
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
                map.invalidateSize();
                map.setZoom(5);
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

            // Filter Cards (mini grid)
            document.querySelectorAll('.project-card-mini').forEach(card => {
                const id = card.getAttribute('data-id');
                const project = projects.find(p => p.id == id);
                
                const matchesCategory = (category === 'all' || card.getAttribute('data-category') == category);
                const matchesSearch = project && projectMatchesSearch(project, searchTerm);

                if (matchesCategory && matchesSearch) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });

            // Update Counter
            const countEl = document.getElementById('projectCount');
            if(countEl) countEl.innerText = visibleCount;

            // Fit map bounds if there are markers
            if (markerGroup.getLayers().length > 0) {
                const isOverlayActive = document.getElementById('projectOverlay').classList.contains('active');
                const paddingOptions = isOverlayActive ? 
                    { paddingTopLeft: [50, 50], paddingBottomRight: [window.innerWidth * 0.45, 50] } : 
                    { padding: [100, 100] };
                
                try {
                    map.fitBounds(markerGroup.getBounds(), paddingOptions);
                } catch(e) {}
            }
        }

        searchInput.addEventListener('input', applyFilters);

        filterBtns.forEach(btn => {
            btn.addEventListener('mouseenter', () => updateFilterNotch(btn));
            
            btn.addEventListener('click', () => {
                // Toggle active button
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                updateFilterNotch(btn);
                
                applyFilters();
            });
        });

        // Card clicks
        document.querySelectorAll('.project-card-mini').forEach(card => {
            card.addEventListener('click', () => {
                const id = card.getAttribute('data-id');
                const project = projects.find(p => p.id == id);
                if (project) {
                    showProject(project);
                    window.scrollTo({ top: document.querySelector('.map-section-premium').offsetTop - 50, behavior: 'smooth' });
                }
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

            gsap.from(".reveal-card", {
                scrollTrigger: {
                    trigger: ".projects-grid",
                    start: "top 80%"
                },
                y: 50,
                opacity: 0,
                duration: 1,
                stagger: {
                    amount: 0.8,
                    grid: "auto",
                    from: "start"
                },
                ease: "power3.out"
            });
        }
    });
</script>
@endsection
