@extends('layouts.app')

@section('title', 'RESPONSABILIDAD SOCIAL | GRUPO INDI')

@section('content')
<div class="social-page">
    <!-- Hero Section -->
    <header class="indi-hero" style="background-image: url('{{ asset('assets/social/hero.png') }}');">
        <div class="indi-hero-content">
            <h1 class="indi-heading hero-typer-text" style="color: white; text-shadow: 0 10px 30px rgba(0,0,0,0.5); font-family: 'usual', sans-serif;">
                RESPONSΛBILIDΛD <br>SOCIΛL
            </h1>
            <p style="font-family: 'usual', sans-serif; font-size: 1.2rem; letter-spacing: 0.2em; max-width: 800px; margin: 0 auto; color: rgba(255,255,255,0.8);">
                CONSTRUYΞNDO ΞL FUTURO CON CONCIΞNCIΛ ΛMBIΞNTΛL, ΞNΞRGÉTICΛ Y SOCIΛL
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

        <!-- Intro Text Area -->
        <section style="padding: 10rem 0; background: white; color: var(--indi-text); position: relative; z-index: 20;">
            <div class="indi-container">
                <div style="max-width: 900px; margin: 0 auto; text-align: center;">
                    <h4 style="font-family: 'usual', sans-serif; color: var(--indi-blue); letter-spacing: 0.4em; margin-bottom: 2rem; font-weight: 700; font-size: 0.9rem;">WΞ INDI</h4>
                    <p style="font-size: 1.6rem; line-height: 1.8; color: #333; font-family: 'usual', sans-serif; font-weight: 300;">
                        Mediante esta división y con la trayectoria y formalidad que le caracterizan, Grupo Indi busca incidir con proyectos que contribuyan al desarrollo sostenible del país y que generen mejora en la calidad de vida de la sociedad.
                    </p>
                </div>
            </div>
        </section>

        <div class="indi-rule"></div>

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
                        <h2 class="indi-heading-large" style="font-size: clamp(1.8rem, 4vw, 3.2rem); color: #171717; line-height: 1.1; margin: 0 0 2rem; font-family: 'usual', sans-serif;">
                            COMPROMISO CON ΞL<br><span style="color: var(--indi-blue);">ΛCUΛRIO DΞL MUNDO</span>
                        </h2>
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
                        <span class="section-tag" style="color: #00ffcc; border-color: rgba(0, 255, 204, 0.3);">ΞNΞRGÍΛ LIMPÍΛ</span>
                        <h2 class="indi-heading-large" style="font-size: clamp(1.8rem, 4vw, 3.2rem); color: #ffffff; line-height: 1.1; margin: 0 0 2rem; font-family: 'usual', sans-serif;">
                            INNOVΛCIÓN<br><span style="color: #00ffcc;">ΞNΞRGÉTICΛ</span>
                        </h2>
                        <p>A través de las energías renovables y manejo de residuos, reiteramos nuestra alianza con el país en la lucha contra el cambio climático.</p>
                        <div class="highlight-box">
                            <h3>PLΛNTΛ FOTOVOLTÁICΛ PROTÓN PF</h3>
                            <p>Aportamos de manera innovadora al desarrollo de un ambiente más limpio y sustentable mediante infraestructura energética de vanguardia.</p>
                        </div>
                    </div>
                    <div class="block-visual animate-on-scroll">
                        <div class="notched-frame neon">
                            <div class="energy-visual-bg">
                                <div class="tech-hud-ring"></div>
                                <div class="tech-hud-dots"></div>
                            </div>
                            <div class="frame-label">NRG-X-002</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section: Apoyo Social -->
            <section class="social-block">
                <div class="indi-container grid-2">
                    <div class="block-visual animate-on-scroll">
                        <div class="notched-frame">
                            <img src="{{ asset('assets/social/support.png') }}" alt="Apoyo Social">
                            <div class="frame-label">SOC-S-003</div>
                        </div>
                    </div>
                    <div class="block-text">
                        <span class="section-tag">ΛPOYO SOCIΛL</span>
                        <h2 class="indi-heading-large" style="font-size: clamp(1.8rem, 4vw, 3.2rem); color: #171717; line-height: 1.1; margin: 0 0 2rem; font-family: 'usual', sans-serif;">
                            FOMΞNTO DΞPORTIVO<br><span style="color: var(--indi-blue);">Y SOCIΛL</span>
                        </h2>
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
                            <span class="section-tag" style="color: white; border-color: rgba(255, 255, 255, 0.4);">FUNDΛCIÓN MMC</span>
                            <h2 style="font-family: 'usual', sans-serif; font-size: clamp(2.2rem, 5vw, 3.8rem); line-height: 1.1; margin-top: 2rem;">HΞRΞNCIΛ DΞ BIΞNΞSTΛR</h2>
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
</div>

<style>
    .social-page {
        overflow-x: hidden;
    }

    .hero-typer-text .hero-line:nth-child(2),
    .hero-typer-text .hero-line:nth-child(2) * {
        color: var(--indi-blue) !important;
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
        font-size: 0.75rem;
        letter-spacing: 0.35em;
        color: var(--indi-blue);
        margin-bottom: 2rem;
        border: 1px solid rgba(0, 102, 249, 0.25);
        padding: 0.6rem 1.5rem;
        clip-path: polygon(0 0, calc(100% - 8px) 0, 100% 8px, 100% 100%, 0 100%);
        background: rgba(0, 102, 249, 0.02);
    }

    .dark-mode .section-tag {
        color: #00ffcc;
        border-color: rgba(0, 255, 204, 0.3);
        background: rgba(0, 255, 204, 0.02);
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
        z-index: 10;
    }

    .dark-mode .frame-label {
        background: #00ffcc;
        color: #000;
        font-weight: 700;
    }

    /* Mini Cards */
    .project-mini-cards {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        margin-top: 4rem;
    }

    .mini-card {
        background: #f8fafc;
        border-left: 3px solid var(--indi-blue);
        padding: 2.2rem;
        position: relative;
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        clip-path: polygon(0 0, 100% 0, 100% calc(100% - 16px), calc(100% - 16px) 100%, 0 100%);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
    }

    .mini-card::before {
        content: "";
        position: absolute;
        bottom: 0;
        right: 0;
        width: 16px;
        height: 16px;
        background: linear-gradient(135deg, transparent 50%, rgba(0, 102, 249, 0.15) 50%);
        pointer-events: none;
        transition: transform 0.4s ease;
    }

    .mini-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(0, 102, 249, 0.08);
    }

    .mini-card:hover::before {
        transform: scale(1.2);
    }

    .mini-card h3 {
        font-family: 'usual', sans-serif;
        font-size: 0.9rem;
        letter-spacing: 0.1em;
        font-weight: 700;
        margin-bottom: 1rem;
        color: #111;
    }

    .mini-card p {
        font-size: 0.95rem;
        line-height: 1.6;
        color: #555;
        margin: 0;
    }

    /* Highlight Box */
    .highlight-box {
        background: #0a0a0a;
        padding: 3rem;
        border: 1px solid rgba(0, 255, 204, 0.15);
        border-right: 4px solid #00ffcc;
        margin-top: 3.5rem;
        position: relative;
        overflow: hidden;
        clip-path: polygon(0 0, 100% 0, 100% calc(100% - 20px), calc(100% - 20px) 100%, 0 100%);
        transition: border-color 0.4s ease;
    }

    .highlight-box::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(0, 255, 204, 0.03) 0%, transparent 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
    }

    .highlight-box:hover {
        border-color: rgba(0, 255, 204, 0.4);
    }

    .highlight-box:hover::before {
        opacity: 1;
    }

    .highlight-box h3 {
        font-family: 'usual', sans-serif;
        font-size: 1.05rem;
        letter-spacing: 0.15em;
        color: #00ffcc;
        margin-bottom: 1.25rem;
        font-weight: 700;
    }

    .highlight-box p {
        font-size: 0.95rem;
        line-height: 1.6;
        color: #bbb;
        margin: 0;
    }

    /* Neon Notched Frame styling */
    .notched-frame.neon {
        border: 1px solid rgba(0, 255, 204, 0.2);
        box-shadow: 0 10px 40px rgba(0, 255, 204, 0.1);
    }

    .energy-visual-bg {
        width: 100%;
        height: 100%;
        min-height: 480px;
        background: radial-gradient(circle at center, #002222 0%, #000c0c 100%);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .energy-visual-bg::after {
        content: "";
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(0, 255, 204, 0.15) 1px, transparent 1px);
        background-size: 24px 24px;
        opacity: 0.4;
        pointer-events: none;
    }

    .tech-hud-ring {
        position: absolute;
        width: 280px;
        height: 280px;
        border: 2px dashed rgba(0, 255, 204, 0.3);
        border-radius: 50%;
        animation: rotateRing 25s linear infinite;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tech-hud-ring::before {
        content: "";
        position: absolute;
        width: 240px;
        height: 240px;
        border: 1px solid rgba(0, 255, 204, 0.15);
        border-radius: 50%;
        border-top: 3px solid #00ffcc;
        border-bottom: 3px solid #00ffcc;
        animation: rotateRingOpposite 12s linear infinite;
    }

    .tech-hud-dots {
        position: absolute;
        width: 160px;
        height: 160px;
        border: 4px double rgba(0, 255, 204, 0.5);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: pulseHud 4s ease-in-out infinite;
    }

    .tech-hud-dots::after {
        content: "";
        width: 24px;
        height: 24px;
        background: #00ffcc;
        border-radius: 50%;
        box-shadow: 0 0 20px #00ffcc, 0 0 45px rgba(0, 255, 204, 0.8);
    }

    @keyframes rotateRing {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    @keyframes rotateRingOpposite {
        0% { transform: rotate(360deg); }
        100% { transform: rotate(0deg); }
    }

    @keyframes pulseHud {
        0%, 100% {
            transform: scale(0.96);
            opacity: 0.7;
            box-shadow: 0 0 15px rgba(0, 255, 204, 0.2);
        }
        50% {
            transform: scale(1.04);
            opacity: 1;
            box-shadow: 0 0 35px rgba(0, 255, 204, 0.5);
        }
    }

    /* Stats */
    .stats-row {
        display: flex;
        gap: 4rem;
        margin-top: 4.5rem;
        border-top: 1px solid var(--indi-border);
        padding-top: 3rem;
    }

    .s-stat {
        position: relative;
        padding-left: 1.5rem;
    }

    .s-stat::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(180deg, var(--indi-blue) 0%, transparent 100%);
    }

    .s-stat .val {
        display: block;
        font-family: 'usual', sans-serif;
        font-size: 3.5rem;
        line-height: 1;
        font-weight: 700;
        color: var(--indi-blue);
        margin-bottom: 0.75rem;
        letter-spacing: -0.02em;
    }

    .s-stat .lab {
        display: block;
        font-family: 'usual', sans-serif;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.25em;
        color: #888;
        text-transform: uppercase;
    }

    /* Foundation Card */
    .foundation-block {
        background: radial-gradient(circle at center, #005ce6 0%, #003db3 100%);
        padding: 15rem 0;
        position: relative;
        overflow: hidden;
    }

    .foundation-block::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: linear-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                          linear-gradient(90deg, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
        background-size: 50px 50px;
        pointer-events: none;
    }

    .foundation-card {
        background: rgba(255, 255, 255, 0.04);
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        padding: 8rem 10%;
        color: white;
        clip-path: polygon(0 0, calc(100% - 40px) 0, 100% 40px, 100% 100%, 40px 100%, 0 calc(100% - 40px));
        transition: border-color 0.5s ease, background 0.5s ease;
    }

    .foundation-card:hover {
        border-color: rgba(255, 255, 255, 0.35);
        background: rgba(255, 255, 255, 0.07);
    }

    .foundation-body {
        max-width: 650px;
        margin-top: 4rem;
    }

    .foundation-body p {
        font-family: 'usual', sans-serif;
        font-size: 1.25rem;
        line-height: 1.7;
        margin-bottom: 4rem;
        color: rgba(255, 255, 255, 0.85);
        font-weight: 300;
    }

    .foundation-body .topic {
        margin-top: 3.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.15);
        padding-top: 2.5rem;
    }

    .foundation-body .topic h3 {
        font-family: 'usual', sans-serif;
        color: #fff;
        font-size: 1.3rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        margin-bottom: 1.25rem;
    }

    .foundation-body .topic p {
        font-size: 1.1rem;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.75);
        margin-bottom: 0;
    }

    .indi-btn-outline {
        display: inline-block;
        margin-top: 4.5rem;
        padding: 1.3rem 3.5rem;
        border: 2px solid white;
        color: white;
        text-decoration: none;
        font-family: 'usual', sans-serif;
        font-size: 0.85rem;
        letter-spacing: 0.2em;
        font-weight: 700;
        position: relative;
        overflow: hidden;
        z-index: 1;
        transition: color 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .indi-btn-outline::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: white;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        z-index: -1;
    }

    .indi-btn-outline:hover {
        color: var(--indi-blue) !important;
    }

    .indi-btn-outline:hover::before {
        transform: scaleX(1);
        transform-origin: left;
    }

    @media (max-width: 1080px) {
        .grid-2, .grid-2-rev { 
            grid-template-columns: 1fr; 
            gap: 4rem; 
        }
        .grid-2-rev .block-text { order: 2; }
        .grid-2-rev .block-visual { order: 1; }
        .social-block { padding: 6rem 0; }
        .stats-row { gap: 2.5rem; }
        .mini-card { padding: 1.8rem; }
        .project-mini-cards { gap: 1.5rem; }
    }

    @media (max-width: 720px) {
        .social-block { 
            padding: 5rem 0; 
        }
        .stats-row { 
            gap: 2rem; 
            flex-direction: column;
            padding-top: 2rem;
        }
        .s-stat .val {
            font-size: 2.8rem;
        }
        .project-mini-cards {
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin-top: 2.5rem;
        }
        .foundation-block {
            padding: 8rem 0;
        }
        .foundation-card {
            padding: 4rem 5%;
        }
    }

    @media (max-width: 500px) {
        .social-block { 
            padding: 4rem 0; 
        }
        .indi-heading-large {
            font-size: 2rem !important;
        }
        .mini-card {
            padding: 1.5rem;
        }
        .highlight-box {
            padding: 2rem;
            margin-top: 2rem;
        }
        .tech-hud-ring {
            width: 220px;
            height: 220px;
        }
        .tech-hud-ring::before {
            width: 180px;
            height: 180px;
        }
        .tech-hud-dots {
            width: 120px;
            height: 120px;
        }
        .energy-visual-bg {
            min-height: 360px;
        }
        .foundation-block {
            padding: 5rem 0;
        }
        .foundation-card {
            padding: 3rem 6%;
            clip-path: polygon(0 0, calc(100% - 20px) 0, 100% 20px, 100% 100%, 20px 100%, 0 calc(100% - 20px));
        }
        .foundation-body {
            margin-top: 2.5rem;
        }
        .foundation-body p {
            font-size: 1.1rem;
            margin-bottom: 2.5rem;
        }
        .indi-btn-outline {
            margin-top: 2.5rem;
            padding: 1rem 2.5rem;
            width: 100%;
            text-align: center;
        }
    }
</style>

@endsection
