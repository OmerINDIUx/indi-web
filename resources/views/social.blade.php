@extends('layouts.app')

@section('title', 'RESPONSABILIDAD SOCIAL | GRUPO INDI')

@section('content')
<div class="social-page">
    <!-- Hero Section -->
    <section class="indi-hero" style="background-image: url('{{ asset('assets/social/hero.png') }}');">
        <div class="indi-hero-content">
            <h1 class="indi-scroll-text" style="color: white; font-family: 'usual', sans-serif;">
                RESPONSΛBILIDΛD <br> <span class="blue">SOCIΛL</span>
            </h1>
            <p style="font-family: 'usual', sans-serif; font-size: 1.2rem; letter-spacing: 0.2em; max-width: 800px; margin: 0 auto; color: rgba(255,255,255,0.8);">
                CONSTRUYΞNDO ΞL FUTURO CON CONCIΞNCIΛ ΛMBIΞNTΛL, ΞNΞRGÉTICΛ Y SOCIΛL
            </p>
        </div>
        <div class="indi-notch-divider bottom dark">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,104.5,23.6,35.74,15.1,71.13,31.9,110.39,35.13,54.46,4.48,103.37-30.23,155-45.74,24.54-7.37,49.17-15.54,74-21.77,72.41-18.17,147.23,45.31,217-12V0Z" opacity=".5" class="shape-fill"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <!-- Intro Text Area -->
    <section class="indi-section-wrap" style="padding: 10rem 0; background: #0a0a0a; color: white;">
        <div class="indi-container">
            <div style="max-width: 900px; margin: 0 auto; text-align: center;">
                <h4 style="font-family: 'usual', sans-serif; color: #0066f9; letter-spacing: 0.4em; margin-bottom: 2rem;">WΞ INDI</h4>
                <p style="font-size: 1.5rem; line-height: 1.8; color: #ccc; font-family: 'usual', sans-serif;">
                    Mediante esta división y con la trayectoria y formalidad que le caracterizan, Grupo Indi busca incidir con proyectos que contribuyan al desarrollo sostenible del país y que generen mejora en la calidad de vida de la sociedad.
                </p>
            </div>
        </div>
    </section>

    <!-- Content Sections Matrix -->
    <div class="social-content-matrix">
        
        <!-- Section: Medio Ambiente -->
        <section class="social-block">
            <div class="indi-container grid-2">
                <div class="block-visual animate-on-scroll">
                    <div class="notched-frame">
                        <img src="{{ asset('assets/social/environment.png') }}" alt="Medio Ambiente">
                        <div class="frame-label">ENV-M-001</div>
                    </div>
                </div>
                <div class="block-text">
                    <span class="section-tag">MΞDIO ΛMBIΞNTΞ</span>
                    <h2 class="indi-heading">CONPRΞMISO CON EL ΛCUΛRIO DΞL MUNDO</h2>
                    <p>En Grupo Indi nos preocupa cada detalle por lo que una de nuestras principales metas es trabajar cada obra con conciencia ambiental y de preservación animal.</p>
                    
                    <div class="project-mini-cards">
                        <div class="mini-card">
                            <h3>RΞSCΛTΞ DΞ CΛRΛCOL PÚRPURΛ</h3>
                            <p>Acciones para la conservación del caracol Plicopurpura pansa en Salina Cruz, preservando una cultura textil y ecológica milenaria.</p>
                        </div>
                        <div class="mini-card">
                            <h3>ISLΛ SΛN JOSÉ</h3>
                            <p>Proyecto de investigación en colaboración con la UABC para evaluar impactos del cambio climático en la biodiversidad marina del Golfo de California.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Energia (Dark Mode) -->
        <section class="social-block dark-mode">
            <div class="indi-container grid-2-rev">
                <div class="block-text">
                    <span class="section-tag" style="color: #00ffcc;">ΞNΞRGÍΛ LIMPÍΛ</span>
                    <h2 class="indi-heading">INNODΛCIÓN ΞNΞRGÉTICΛ</h2>
                    <p>A través de las energías renovables y manejo de residuos, reiteramos nuestra alianza con el país en la lucha contra el cambio climático.</p>
                    <div class="highlight-box">
                        <h3>PLΛNTΛ FOTOVOLTÁICΛ PROTÓN PF</h3>
                        <p>Aportamos de manera innovadora al desarrollo de un ambiente más limpio y sustentable mediante infraestructura energética de vanguardia.</p>
                    </div>
                </div>
                <div class="block-visual animate-on-scroll">
                    <div class="notched-frame neon">
                        <!-- Using the same hero or generic if solar failed, but let's assume we have a high-tech visual feel -->
                        <div class="energy-visual-bg"></div>
                        <div class="frame-label">NRG-X-002</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Apoyo Social -->
        <section class="social-block">
            <div class="indi-container grid-2">
                <div class="block-visual">
                    <div class="notched-frame">
                        <img src="{{ asset('assets/social/support.png') }}" alt="Apoyo Social">
                        <div class="frame-label">SOC-S-003</div>
                    </div>
                </div>
                <div class="block-text">
                    <span class="section-tag">ΛPOYO SOCIΛL</span>
                    <h2 class="indi-heading">FOMΞNTO DΞPORTIVO Y SOCIΛL</h2>
                    <p>Creemos en el poder transformador del deporte para fortalecer comunidades, promover la salud y difundir valores de disciplina y perseverancia.</p>
                    <div class="stats-row">
                        <div class="s-stat">
                            <span class="val">+10</span>
                            <span class="lab">AÑOS DΞ IMPACTO</span>
                        </div>
                        <div class="s-stat">
                            <span class="val">LEED</span>
                            <span class="lab">CERTIFICΛCIÓN</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Fundación MMC -->
        <section class="social-block foundation-block">
            <div class="indi-container">
                <div class="foundation-card animate-on-scroll">
                    <div class="foundation-header">
                        <span class="section-tag" style="color: white; border-color: white;">FUNDΛCIÓN MMC</span>
                        <h2 style="font-family: 'usual', sans-serif; font-size: 3rem; margin-top: 2rem;">HΞRΞNCIΛ DΞ BIΞNΞSTΛR</h2>
                    </div>
                    <div class="foundation-body">
                        <p>Honramos la memoria del Ingeniero Manuel Rubén Muñoz Cano Cardoso, buscando un México más equitativo y próspero.</p>
                        <div class="topic">
                            <h3>SΛLUD MΞNTΛL</h3>
                            <p>Actualmente orientamos nuestros esfuerzos en mejorar la salud mental en México, rompiendo tabúes y brindando apoyo a quienes más lo necesitan.</p>
                        </div>
                        <a href="https://fundacionmmc.org.mx/" target="_blank" class="indi-btn-outline">SΛBΞR MÁS</a>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

<style>
    .social-page {
        overflow-x: hidden;
    }

    .social-block {
        padding: 10rem 0;
        position: relative;
    }

    .social-block.dark-mode {
        background: #000;
        color: white;
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 6rem;
        align-items: center;
    }

    .grid-2-rev {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 6rem;
        align-items: center;
    }

    .block-text {
        max-width: 550px;
    }

    .section-tag {
        display: inline-block;
        font-family: 'usual', sans-serif;
        font-weight: 700;
        font-size: 0.7rem;
        letter-spacing: 0.4em;
        color: #0066f9;
        margin-bottom: 2rem;
        border: 1px solid rgba(0,102,249,0.3);
        padding: 0.5rem 1.2rem;
    }

    .indi-heading {
        font-family: 'usual', sans-serif;
        font-size: clamp(2rem, 4vw, 3.5rem);
        line-height: 1;
        margin-bottom: 2rem;
        font-weight: 700;
    }

    .block-text p {
        font-family: 'usual', sans-serif;
        font-size: 1.1rem;
        line-height: 1.6;
        color: #666;
        margin-bottom: 3rem;
    }

    .dark-mode .block-text p {
        color: #aaa;
    }

    /* Tech Frame */
    .tech-frame {
        position: relative;
        overflow: hidden;
        clip-path: polygon(10% 0, 100% 0, 100% 90%, 90% 100%, 0 100%, 0 10%);
        box-shadow: 0 30px 60px rgba(0,0,0,0.1);
    }

    .tech-frame img {
        width: 100%;
        height: 100%;
        display: block;
        transition: transform 1s ease;
    }

    .tech-frame:hover img {
        transform: scale(1.05);
    }

    .frame-label {
        position: absolute;
        bottom: 20px;
        right: 20px;
        font-family: 'usual', sans-serif;
        font-size: 10px;
        color: white;
        background: #0066f9;
        padding: 5px 10px;
        letter-spacing: 2px;
    }

    /* Mini Cards */
    .project-mini-cards {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        margin-top: 4rem;
    }

    .mini-card h3 {
        font-family: 'usual', sans-serif;
        font-size: 0.8rem;
        margin-bottom: 1rem;
        color: #000;
    }

    .mini-card p {
        font-size: 0.9rem;
        margin: 0;
    }

    /* Highlight Box */
    .highlight-box {
        background: #111;
        padding: 3rem;
        border-right: 4px solid #00ffcc;
        margin-top: 3rem;
    }

    .highlight-box h3 {
        font-family: 'usual', sans-serif;
        font-size: 1rem;
        color: #00ffcc;
        margin-bottom: 1.5rem;
    }

    .energy-visual-bg {
        width: 100%;
        height: 600px;
        background: linear-gradient(45deg, #001a1a, #003333);
        position: relative;
    }

    .energy-visual-bg::after {
        content: "";
        position: absolute;
        inset: 0;
        background-image: radial-gradient(#00ffcc 1px, transparent 1px);
        background-size: 30px 30px;
        opacity: 0.2;
    }

    /* Stats */
    .stats-row {
        display: flex;
        gap: 4rem;
        margin-top: 4rem;
    }

    .s-stat .val {
        display: block;
        font-family: 'usual', sans-serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: #0066f9;
    }

    .s-stat .lab {
        font-family: 'usual', sans-serif;
        font-size: 0.6rem;
        letter-spacing: 0.2em;
        color: #999;
    }

    /* Foundation Card */
    .foundation-block {
        background: #0066f9;
        padding: 15rem 0;
    }

    .foundation-card {
        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255,255,255,0.1);
        padding: 8rem 10%;
        color: white;
        clip-path: polygon(0 0, 95% 0, 100% 5%, 100% 100%, 5% 100%, 0 95%);
    }

    .foundation-body {
        max-width: 600px;
        margin-top: 4rem;
    }

    .foundation-body p {
        font-family: 'usual', sans-serif;
        font-size: 1.4rem;
        line-height: 1.6;
        margin-bottom: 4rem;
        color: rgba(255,255,255,0.8);
    }

    .foundation-body h3 {
        font-family: 'usual', sans-serif;
        color: #fff;
        font-size: 1.2rem;
        margin-bottom: 1.5rem;
    }

    .indi-btn-outline {
        display: inline-block;
        margin-top: 4rem;
        padding: 1.2rem 3rem;
        border: 1px solid white;
        color: white;
        text-decoration: none;
        font-family: 'usual', sans-serif;
        font-size: 0.8rem;
        font-weight: 700;
        transition: all 0.4s ease;
    }

    .indi-btn-outline:hover {
        background: white;
        color: #0066f9;
    }

    @media (max-width: 1024px) {
        .grid-2, .grid-2-rev { grid-template-columns: 1fr; gap: 4rem; }
        .grid-2-rev .block-text { order: 2; }
        .grid-2-rev .block-visual { order: 1; }
        .social-block { padding: 6rem 0; }
    }
</style>

@endsection
