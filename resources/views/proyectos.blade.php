@extends('layouts.app')

@section('title', 'PROYECTOS | GRUPO INDI')

@section('content')
<!-- Outfit Font from Reference -->
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap" rel="stylesheet">

<div class="projects-page-wrapper">
    <!-- Hero Section -->
    <header class="projects-hero">
        <div class="indi-container">
            <div class="hero-pretitle">PORTAFOLIO FEDERAL & PRIVADO</div>
            <h1 class="indi-heading-large reveal-text">NUΞSTROS<br><span class="blue">PROYΞCTOS</span></h1>
            <div class="hero-bottom">
                <p class="hero-subtitle">MÁS DΞ 50 ΛÑOS CONSTRUYΞNDO LΛ INFRΛESTRUCTURΛ DΞ MÉXICO</p>
                <div class="scroll-indicator">
                    <span class="mouse"></span>
                </div>
            </div>
        </div>
    </header>

    <!-- Map Section: Side-by-Side Layout -->
    <section class="map-section-premium">
        <!-- Left: Map Side -->
        <div class="map-side">
            <div id="projectsMap"></div>
            <!-- Vignette effect for physical model look from ref -->
            <div class="vignette"></div>
            <div class="map-grid-overlay"></div>
            <div class="map-scanner-line"></div>
            
            <!-- Technical Category Filter (Refined as Ref HUD Panel) -->
            <div class="map-filter-hud">
                <div class="filter-header">
                    <span class="filter-title">DISPLAY_MODE</span>
                    <span class="filter-status">ON_SYNC</span>
                </div>
                <div class="filter-options">
                    <button class="filter-btn active" data-category="all">
                        <span class="f-index">00</span> ALL_SYSTEMS
                    </button>
                    <button class="filter-btn" data-category="2">
                        <span class="f-index">01</span>
                        <span class="filter-dot" style="background: var(--color-construccion);"></span> CONSTRUCCIÓN
                    </button>
                    <button class="filter-btn" data-category="1">
                        <span class="f-index">02</span>
                        <span class="filter-dot" style="background: var(--color-infraestructura);"></span> INFRΛESTRUCTURΛ
                    </button>
                    <button class="filter-btn" data-category="3">
                        <span class="f-index">03</span>
                        <span class="filter-dot" style="background: var(--color-maritimo);"></span> MΛRÍTIMO
                    </button>
                    <button class="filter-btn" data-category="4">
                        <span class="f-index">04</span>
                        <span class="filter-dot" style="background: var(--color-ferroviaria);"></span> FERROVIΛRIΛ
                    </button>
                </div>
            </div>
            
            <!-- Tech HUD Elements -->
            <div class="map-hud hud-top-left">
                <div class="hud-line"></div>
                <div class="hud-label">SATELLITE_LINK: ACTIVE</div>
            </div>
            <div class="map-hud hud-bottom-right">
                <div class="hud-label">COORDINATES: LAT/LONG</div>
                <div class="hud-line"></div>
            </div>
        </div>

        <!-- Right: Info Side (The Project Card) -->
        <div class="project-overlay-sidebar" id="projectOverlay">
            <div class="project-white-card">
                <button class="close-overlay" id="closeOverlay">&times;</button>
                
                <div id="overlayCategoryTag" class="category-pill">CATEGORÍΛ</div>
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
                        <span class="stat-value">INFRΛESTRUCTURΛ</span>
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
            <div class="list-header">
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
        --card-border: #1a1a1a;
        --indi-blue: #0066f9;
        
        /* Category Colors */
        --color-construccion: #ffa608;
        --color-infraestructura: #64b032;
        --color-maritimo: #0066f9;
        --color-ferroviaria: #ff3000;
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
        padding-top: 8rem;
        overflow-x: hidden;
    }

    .projects-hero {
        padding: 10rem 0 6rem;
        text-align: left;
    }

    .hero-pretitle {
        font-family: 'Syncopate', sans-serif;
        font-size: 0.7rem;
        color: var(--indi-blue);
        letter-spacing: 0.5em;
        margin-bottom: 2rem;
    }

    .projects-hero h1 {
        font-size: clamp(3.5rem, 10vw, 8.5rem);
        line-height: 0.85;
        margin-bottom: 4rem;
        letter-spacing: -0.02em;
    }

    .projects-hero .blue {
        color: var(--indi-blue);
    }

    .hero-bottom {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
    }

    .hero-subtitle {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.1rem;
        letter-spacing: 0.05em;
        color: #666;
        max-width: 400px;
        line-height: 1.6;
    }

    /* Map Styles */
    /* Premium Side-by-Side Layout */
    .map-section-premium {
        height: 100vh;
        width: 100%;
        display: flex;
        background: var(--map-bg);
        border-top: 1px solid #ddd;
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
        height: 150px; /* Thicker for more 'life' */
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

    /* Map Customization */
    .leaflet-container {
        background-color: var(--map-bg) !important;
    }
    
    .leaflet-tile {
        /* Preserving the natural pale colors of Positron (Blue water/Green vegetation) */
        filter: brightness(1.05) contrast(1.05);
        transition: opacity 0.5s ease;
    }

    /* HUD Elements */
    /* HUD: Technical Solid Look (Reverted) */
    .map-filter-hud {
        position: absolute;
        bottom: 50px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1001;
        background: #000;
        border: 1px solid #111;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
        transition: all 0.5s ease;
    }

    .filter-header {
        background: #080808;
        padding: 0.8rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #1a1a1a;
    }

    .filter-title {
        font-family: 'Syncopate', sans-serif;
        font-size: 0.5rem;
        font-weight: 700;
        color: #444;
        letter-spacing: 0.2em;
    }

    .filter-options {
        display: flex;
    }

    .filter-btn {
        background: transparent;
        border: none;
        border-right: 1px solid #111;
        color: #666;
        padding: 1.5rem 2rem;
        font-family: 'Syncopate', sans-serif;
        font-size: 0.6rem;
        font-weight: 700;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.8rem;
        transition: all 0.3s ease;
        text-transform: uppercase;
    }

    .filter-btn:hover {
        background: #111;
        color: #fff;
    }

    .filter-btn.active {
        background: #fff;
        color: #000 !important;
    }

    .filter-btn .f-index {
        font-size: 0.5rem;
        opacity: 0.4;
    }

    .filter-dot {
        width: 12px;
        height: 2px;
        background: currentColor;
    }

    .filter-btn:hover {
        background: #080808;
        color: #fff;
    }

    .filter-btn.active {
        background: #fff;
        color: #000;
        border-bottom: 3px solid var(--indi-blue);
    }

    .filter-btn.active .f-index {
        color: var(--indi-blue);
    }

    .filter-btn.active .filter-dot {
        opacity: 1;
        width: 100%;
        height: 2px;
    }

    .hud-top-left { top: 40px; left: 40px; }
    .hud-bottom-right { bottom: 40px; right: 40px; align-items: flex-end; }

    .hud-line {
        width: 100px;
        height: 1px;
        background: var(--indi-blue);
        opacity: 0.5;
    }

    .hud-label {
        font-family: 'Syncopate', sans-serif;
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

    /* Project Sidebar - Solid Technical Side Card */
    .project-overlay-sidebar {
        position: absolute;
        top: 0;
        right: 0;
        width: 450px;
        height: 100%;
        background: #fff; /* Keeping white for content legibility as requested before */
        z-index: 2005;
        transform: translateX(100%);
        transition: transform 0.6s cubic-bezier(0.77, 0, 0.175, 1);
        display: flex;
        flex-direction: column;
        color: #000;
        box-shadow: -20px 0 50px rgba(0,0,0,0.2);
    }

    .project-overlay-sidebar.active {
        transform: translateX(0);
    }

    .project-white-card {
        padding: 4rem;
        height: 100%;
        overflow-y: auto;
    }

    .project-overlay-sidebar h2 {
        font-family: 'Syncopate', sans-serif;
        font-weight: 700;
        color: #000 !important;
        margin-bottom: 2rem;
    }

    .project-overlay-sidebar p {
        color: #444 !important;
        line-height: 1.6;
    }

    .category-pill {
        display: inline-block;
        padding: 0.4rem 1.2rem;
        font-family: 'Syncopate', sans-serif;
        font-size: 0.6rem;
        font-weight: 700;
        color: #fff;
        background: var(--indi-blue);
        margin-bottom: 2rem;
        letter-spacing: 0.2em;
    }

    .project-overlay-sidebar.active {
        width: 45%;
    }

    .project-white-card {
        width: 100%;
        height: 100%;
        background: #ffffff;
        padding: 4rem;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow-y: auto;
    }

    .project-overlay-sidebar .project-name {
        font-family: 'Syncopate', sans-serif;
        font-weight: 700;
        font-size: clamp(1.5rem, 2.5vw, 2.2rem);
        line-height: 1.1;
        margin-top: 1rem;
        margin-bottom: 2rem;
        color: #000;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }

    .project-overlay-sidebar .project-stats-grid {
        width: 100%;
        display: flex;
        justify-content: space-between;
        border-top: 1px solid var(--indi-blue);
        border-bottom: 2px solid var(--indi-blue);
        margin-bottom: 2rem;
        padding: 1.5rem 0;
    }

    .project-overlay-sidebar .stat-item {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        border-right: 1px solid rgba(0, 102, 255, 0.1);
        padding-left: 1.5rem;
    }

    .project-overlay-sidebar .stat-item:last-child {
        border-right: none;
    }

    .project-overlay-sidebar .stat-label {
        font-family: 'Syncopate', sans-serif;
        font-size: 0.65rem;
        font-weight: 700;
        color: var(--indi-blue);
        margin-bottom: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.3em;
    }

    .project-overlay-sidebar .stat-value {
        font-size: 1.1rem;
        font-weight: 700;
        color: #000;
        font-family: 'Space Grotesk', sans-serif;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .project-overlay-sidebar .project-description {
        font-size: 1rem;
        line-height: 1.7;
        color: #444;
        margin-bottom: 3rem;
        font-family: 'Inter', sans-serif;
    }

    .project-overlay-sidebar .project-visual-notched {
        width: calc(100% + 8rem);
        margin: 0 -4rem;
        height: 350px;
        margin-top: auto;
        clip-path: polygon(0 0, 30% 0, 36% 6%, 64% 6%, 70% 0, 100% 0, 100% 100%, 0 100%);
        overflow: hidden;
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
        background: #f8f8f8;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: none;
        color: #000;
        font-size: 1.4rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        z-index: 100;
    }

    .close-overlay:hover {
        background: var(--indi-blue);
        color: #fff;
        transform: rotate(90deg);
    }

    /* List Section */
    .projects-list-section {
        padding: 12rem 0;
    }

    .list-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 6rem;
    }

    .header-left .u-num {
        color: var(--indi-blue);
        letter-spacing: 0.4em;
        font-size: 0.8rem;
        margin-bottom: 1.5rem;
    }

    .list-count {
        text-align: right;
    }

    .count-num {
        display: block;
        font-family: 'Syncopate', sans-serif;
        font-size: 3rem;
        font-weight: 700;
        color: #fff;
        line-height: 1;
    }

    .count-label {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 0.7rem;
        color: #444;
        letter-spacing: 0.2em;
    }

    /* Projects Grid */
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 0;
        border: 1px solid #111;
    }

    .project-card-mini {
        background: #000;
        padding: 4rem 3rem;
        border: 0.5px solid #111;
        cursor: pointer;
        position: relative;
        transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .project-card-mini:hover {
        background: #080808;
        transform: translateY(-10px);
        z-index: 10;
        border-color: #222;
    }

    .card-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 3rem;
    }

    .card-corner {
        width: 10px; height: 10px;
        border-top: 1px solid #333;
        border-right: 1px solid #333;
    }

    .project-card-mini:hover .card-corner {
        border-color: var(--indi-blue);
    }

    .project-title {
        font-family: 'Syncopate', sans-serif;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        line-height: 1.4;
        margin-bottom: 3rem;
        height: 3em;
        text-transform: uppercase;
    }

    .card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .view-btn {
        font-family: 'Syncopate', sans-serif;
        font-size: 0.6rem;
        color: var(--indi-blue);
        opacity: 0;
        transform: translateX(-10px);
        transition: all 0.4s ease;
    }

    .project-card-mini:hover .view-btn {
        opacity: 1;
        transform: translateX(0);
    }

    .card-glow {
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at center, var(--indi-blue), transparent);
        opacity: 0;
        transition: opacity 0.6s ease;
        pointer-events: none;
    }

    .project-card-mini:hover .card-glow {
        opacity: 0.05;
    }

    @media (max-width: 768px) {
        .project-overlay {
            width: 90%;
            left: 5%;
            bottom: 2rem;
        }
        
        .hero-bottom {
            flex-direction: column;
            align-items: flex-start;
            gap: 2rem;
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

        // Custom attribution (minimalist)
        L.control.attribution({position: 'bottomleft'}).setPrefix('GRUPO INDI OSINT-MAP').addTo(map);

        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; CartoDB',
            maxZoom: 19
        }).addTo(map);

        const markerGroup = L.featureGroup().addTo(map);

        function showProject(project) {
            const overlay = document.getElementById('projectOverlay');
            
            // Helper to tech-ify text (simple replace for demo/consistency)
            const techify = (text) => text.toUpperCase().replace(/A/g, 'Λ').replace(/E/g, 'Ξ');

            const categories = {
                1: { 
                    name: 'INFRΛESTRUCTURΛ', 
                    color: '#64b032',
                    desc: 'Carreteras, puentes, distribuidores viales y ahora también infraestructura aeroportuaria e hidráulica.'
                },
                2: { 
                    name: 'CONSTRUCCIÓN', 
                    color: '#ffa608',
                    desc: 'Edificación de centros de servicio, salud, educación y gobierno.'
                },
                3: { 
                    name: 'MΛRÍTIMO', 
                    color: '#0066f9',
                    desc: 'Proyectos portuarios, muelles, rompeolas y obras costeras de gran magnitud.'
                },
                4: { 
                    name: 'FERROVIΛRIΛ', 
                    color: '#ff3000',
                    desc: 'Infraestructura de trenes y transporte tipo metro.'
                }
            };

            const cat = categories[project.category] || categories[1];

            document.getElementById('overlayTitle').innerText = techify(project.title);
            document.getElementById('overlayAddress').innerText = techify(project.address);
            document.getElementById('overlayStatus').innerText = project.status == 1 ? 'COMPLETΛDO' : 'ΞN PROCESO';
            document.getElementById('overlayDescription').innerText = cat.desc;
            
            // Update HUD Coordinates dynamically
            const hudCoords = document.querySelector('.hud-bottom-right .hud-label');
            if(hudCoords) {
                hudCoords.innerText = `COORD: ${parseFloat(project.latitude).toFixed(4)}N / ${parseFloat(project.longitude).toFixed(4)}W`;
            }

            const categoryTag = document.getElementById('overlayCategoryTag');
            categoryTag.innerText = cat.name;
            categoryTag.style.backgroundColor = cat.color;

            // Use project image if available
            const imgPath = project.marker_image ? '/' + project.marker_image : 'https://images.unsplash.com/photo-1541888946425-d81bb19480c5?auto=format&fit=crop&q=80&w=800';
            document.getElementById('overlayImage').src = imgPath;
            
            // Highlight Active Marker
            document.querySelectorAll('.marker-pin').forEach(pin => pin.classList.remove('active'));
            const marker = markerMap.get(project.id);
            if (marker && marker._icon) {
                const pin = marker._icon.querySelector('.marker-pin');
                if (pin) pin.classList.add('active');
            }

            overlay.classList.add('active');
            
            // Map camera update
            map.flyTo([project.latitude, project.longitude], 12, {
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
                html: `<div class="marker-pin" style="background: ${color}; box-shadow: 0 0 15px ${color};"></div>`,
                iconSize: [20, 20],
                iconAnchor: [10, 10]
            });

            const marker = L.marker([project.latitude, project.longitude], { icon: icon })
                .addTo(markerGroup)
                .on('click', () => showProject(project));
            
            markerMap.set(project.id, marker);
        });

        // Filtering Logic
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const category = btn.getAttribute('data-category');
                
                // Toggle active button
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                // Filter Markers
                markerGroup.clearLayers();
                projects.forEach(p => {
                    if (category === 'all' || p.category == category) {
                        markerGroup.addLayer(markerMap.get(p.id));
                    }
                });

                // Filter Cards
                document.querySelectorAll('.project-card-mini').forEach(card => {
                    if (category === 'all' || card.getAttribute('data-category') == category) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });

                if (markerGroup.getLayers().length > 0) {
                    map.fitBounds(markerGroup.getBounds(), { padding: [100, 100] });
                }
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
