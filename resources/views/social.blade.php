@extends('layouts.app')

@section('title', 'RESPONSABILIDAD SOCIAL | INDI')

@section('content')
@php
    $socialImageSets = [
        'environment' => [
            'folder' => 'imagenes_social/Medio-Ambiente',
            'images' => [
                'ChatGPT Image 26 jun 2026, 11_19_02 a.m..png',
                'ChatGPT Image 26 jun 2026, 11_19_12 a.m..png',
                'high-angle-closeup-shot-of-a-baby-turtle-crawling-2026-03-18-08-07-28-utc.jpg',
            ],
        ],
        'energy' => [
            'folder' => 'imagenes_social/energia',
            'images' => [
                'engineers-walking-on-factory-roof-inspect-survey-a-2026-03-24-03-57-11-utc.jpg',
            ],
        ],
        'support' => [
            'folder' => 'imagenes_social/apoyo-social',
            'images' => [
                'ChatGPT Image 26 jun 2026, 11_18_31 a.m..png',
                'ChatGPT Image 26 jun 2026, 11_18_36 a.m..png',
                'ChatGPT Image 26 jun 2026, 11_18_48 a.m..png',
                'ChatGPT Image 26 jun 2026, 11_18_54 a.m..png',
                'ChatGPT Image 26 jun 2026, 11_19_09 a.m..png',
                'ChatGPT Image 26 jun 2026, 11_19_16 a.m..png',
                'ChatGPT Image 26 jun 2026, 11_19_21 a.m..png',
                'ChatGPT Image 26 jun 2026, 11_19_32 a.m..png',
                'ChatGPT Image 26 jun 2026, 11_26_26 a.m..png',
            ],
        ],
        'sports' => [
            'folder' => 'imagenes_social/ml nds',
            'images' => [
                '1.webp',
                '3.webp',
                '5.webp',
                '6.webp',
                '7.webp',
                '8.webp',
                'Automovilismo.jpg',
                'Baseball.jpg',
                'caracol10.webp',
                'Football-Americano.jpg',
                'Porsche.jpg',
            ],
        ],
    ];
@endphp
<div class="social-page">
    <!-- Hero Section -->
    <header class="indi-hero social-hero">
        <video class="hero-video" autoplay muted loop playsinline poster="{{ asset($socialImageSets['environment']['folder'] . '/' . $socialImageSets['environment']['images'][0]) }}">
            <source src="{{ asset('imagenes_social/video-portada.mp4') }}" type="video/mp4">
        </video>
        <div class="indi-hero-content">
            <h1 class="indi-heading hero-typer-text" style="color: white; text-shadow: 0 10px 30px rgba(0,0,0,0.5); font-family: 'usual', sans-serif;">
                {{ \App\Support\CmsText::get('social.title', 'RESPONSABILIDAD SOCIAL') }}
            </h1>
            <p style="font-family: 'usual', sans-serif; font-size: 1.2rem; letter-spacing: 0.2em; max-width: 800px; margin: 0 auto; color: rgba(255,255,255,0.8);">
                {{ \App\Support\CmsText::get('social.subtitle', 'CONSTRUYENDO EL FUTURO CON CONCIENCIA AMBIENTAL, ENERGETICA Y SOCIAL') }}
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
                    <img class="social-intro-logo" src="{{ asset('imagenes_social/weindi-Logo.png') }}" alt="{{ \App\Support\CmsText::get('social.intro_tag', 'WE INDI') }}">
                    <p style="font-size: 1.6rem; line-height: 1.8; color: #333; font-family: 'usual', sans-serif; font-weight: 300;">
                        {{ \App\Support\CmsText::get('social.intro_text', 'Mediante esta division y con la trayectoria y formalidad que le caracterizan, INDI busca incidir con proyectos que contribuyan al desarrollo sostenible del pais.') }}
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
                        @include('partials.social-carousel', ['imageSet' => $socialImageSets['environment'], 'alt' => 'Medio Ambiente'])
                    </div>
                    <div class="block-text">
                        <span class="section-tag">{{ \App\Support\CmsText::get('social.environment.tag', 'MEDIO AMBIENTE') }}</span>
                        <h2 class="indi-heading-large" style="font-size: clamp(1.8rem, 4vw, 3.2rem); color: #171717; line-height: 1.1; margin: 0 0 2rem; font-family: 'usual', sans-serif;">
                            {{ \App\Support\CmsText::get('social.environment.title', 'COMPROMISO CON EL ACUARIO DEL MUNDO') }}
                        </h2>
                        <p>{{ \App\Support\CmsText::get('social.environment.text', 'En INDI nos preocupa cada detalle por lo que una de nuestras principales metas es trabajar cada obra con conciencia ambiental.') }}</p>
                        
                        <div class="project-mini-cards">
                            <div class="mini-card">
                                <h3>{{ \App\Support\CmsText::get('social.snail.title', 'RESCATE DE CARACOL PURPURA') }}</h3>
                                <p>{{ \App\Support\CmsText::get('social.snail.text', 'Acciones para la conservacion del caracol Plicopurpura pansa en Salina Cruz.') }}</p>
                            </div>
                            <div class="mini-card">
                                <h3>{{ \App\Support\CmsText::get('social.island.title', 'ISLA SAN JOSE') }}</h3>
                                <p>{{ \App\Support\CmsText::get('social.island.text', 'Proyecto de investigacion en colaboracion con la UABC para evaluar impactos del cambio climatico.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section: Energia (Dark Mode) -->
            <section class="social-block dark-mode">
                <div class="indi-container grid-2-rev">
                    <div class="block-text">
                        <span class="section-tag" style="color: var(--indi-blue); border-color: rgba(0, 102, 249, 0.35);">{{ \App\Support\CmsText::get('social.energy.tag', 'ENERGIA LIMPIA') }}</span>
                        <h2 class="indi-heading-large" style="font-size: clamp(1.8rem, 4vw, 3.2rem); color: #ffffff; line-height: 1.1; margin: 0 0 2rem; font-family: 'usual', sans-serif;">
                            {{ \App\Support\CmsText::get('social.energy.title', 'INNOVACION ENERGETICA') }}
                        </h2>
                        <p>{{ \App\Support\CmsText::get('social.energy.text', 'A traves de las energias renovables y manejo de residuos, reiteramos nuestra alianza con el pais.') }}</p>
                        <div class="highlight-box">
                            <h3>{{ \App\Support\CmsText::get('social.energy.project_title', 'PLANTA FOTOVOLTAICA PROTON PF') }}</h3>
                            <p>{{ \App\Support\CmsText::get('social.energy.project_text', 'Aportamos de manera innovadora al desarrollo de un ambiente mas limpio y sustentable.') }}</p>
                        </div>
                    </div>
                    <div class="block-visual animate-on-scroll">
                        @include('partials.social-carousel', ['imageSet' => $socialImageSets['energy'], 'alt' => 'Energia limpia', 'variant' => 'neon'])
                    </div>
                </div>
            </section>

            <!-- Section: Apoyo Social -->
            <section class="social-block">
                <div class="indi-container grid-2">
                    <div class="block-visual animate-on-scroll">
                        @include('partials.social-carousel', ['imageSet' => $socialImageSets['support'], 'alt' => 'Apoyo Social'])
                    </div>
                    <div class="block-text">
                        <span class="section-tag">{{ \App\Support\CmsText::get('social.support.tag', 'APOYO SOCIAL') }}</span>
                        <h2 class="indi-heading-large" style="font-size: clamp(1.8rem, 4vw, 3.2rem); color: #171717; line-height: 1.1; margin: 0 0 2rem; font-family: 'usual', sans-serif;">
                            {{ \App\Support\CmsText::get('social.support.title', 'FOMENTO DEPORTIVO Y SOCIAL') }}
                        </h2>
                        <p>{{ \App\Support\CmsText::get('social.support.text', 'Creemos en el poder transformador del deporte para fortalecer comunidades.') }}</p>
                        <div class="stats-row">
                            <div class="s-stat">
                                <span class="val">+10</span>
                                <span class="lab">{{ \App\Support\CmsText::get('social.support.years', 'ANOS DE IMPACTO') }}</span>
                            </div>
                            <div class="s-stat">
                                <span class="val">LEED</span>
                                <span class="lab">{{ \App\Support\CmsText::get('social.support.certification', 'CERTIFICACION') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="indi-container social-sports-gallery">
                    @include('partials.social-carousel', ['imageSet' => $socialImageSets['sports'], 'alt' => 'Fomento Deportivo', 'variant' => 'wide'])
                </div>
            </section>

            <!-- Section: Fundación MMC -->
            <section class="social-block foundation-block">
                <div class="indi-container">
                    <div class="foundation-card animate-on-scroll">
                        <div class="foundation-header">
                            <span class="section-tag foundation-tag">{{ \App\Support\CmsText::get('social.foundation.tag', 'FUNDACION MMC') }}</span>
                            <h2 style="font-family: 'usual', sans-serif; font-size: clamp(2.2rem, 5vw, 3.8rem); line-height: 1.1; margin-top: 2rem;">{{ \App\Support\CmsText::get('social.foundation.title', 'HERENCIA DE BIENESTAR') }}</h2>
                        </div>
                        <div class="foundation-body">
                            <div class="foundation-logos" aria-label="Logotipos de programas sociales">
                                <img src="{{ asset('imagenes_social/Fundación_MMC-Logo.png') }}" alt="Fundacion MMC">
                            </div>
                            <p>{{ \App\Support\CmsText::get('social.foundation.text', 'Honramos la memoria del Ingeniero Manuel Ruben Munoz Cano Cardoso.') }}</p>
                            <div class="topic">
                                <h3>{{ \App\Support\CmsText::get('social.foundation.topic', 'SALUD MENTAL') }}</h3>
                                <p>{{ \App\Support\CmsText::get('social.foundation.topic_text', 'Actualmente orientamos nuestros esfuerzos en mejorar la salud mental en Mexico.') }}</p>
                            </div>
                            <a href="https://fundacionmmc.org.mx/" target="_blank" class="indi-btn-outline">{{ \App\Support\CmsText::get('social.learn_more', 'SABER MAS') }}</a>
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

    .social-intro-logo {
        display: block;
        width: min(150px, 42vw);
        height: auto;
        margin: 0 auto 2rem;
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
        color: var(--indi-blue);
        border-color: rgba(0, 102, 249, 0.35);
        background: rgba(0, 102, 249, 0.06);
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

    .social-carousel {
        position: relative;
        width: 100%;
        height: 60vh;
        min-height: 520px;
        overflow: hidden;
        clip-path: polygon(0 0, 34% 0, 42% 7.5%, 58% 7.5%, 66% 0, 100% 0, 100% 100%, 0 100%);
        background: #050505;
        box-shadow: 0 30px 70px rgba(0, 0, 0, 0.14);
        isolation: isolate;
    }

    .social-carousel::before {
        content: "";
        position: absolute;
        inset: 0;
        z-index: 4;
        pointer-events: none;
        background:
            linear-gradient(180deg, rgba(0, 0, 0, 0.08), transparent 38%, rgba(0, 0, 0, 0.28)),
            linear-gradient(90deg, rgba(0, 102, 249, 0.22), transparent 34%);
    }

    .social-carousel::after {
        content: "";
        position: absolute;
        inset: 18px;
        z-index: 5;
        pointer-events: none;
        border: 1px solid rgba(255, 255, 255, 0.18);
        clip-path: polygon(0 0, 34% 0, 42% 7.5%, 58% 7.5%, 66% 0, 100% 0, 100% 100%, 0 100%);
    }

    .social-carousel-track {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
    }

    .social-carousel-slide {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0;
        transform: scale(1.06);
        transition: opacity 0.9s ease, transform 5s ease;
    }

    .social-carousel-slide.is-active {
        opacity: 1;
        transform: scale(1);
        z-index: 2;
    }

    .social-carousel-dots {
        position: absolute;
        left: 24px;
        top: 24px;
        z-index: 7;
        display: flex;
        gap: 0.55rem;
        align-items: center;
    }

    .social-carousel-dots span {
        width: 22px;
        height: 3px;
        background: rgba(255, 255, 255, 0.42);
        transition: width 0.4s ease, background 0.4s ease;
    }

    .social-carousel-dots span.is-active {
        width: 42px;
        background: var(--indi-blue);
    }

    .social-carousel--neon {
        border: 1px solid rgba(0, 102, 249, 0.24);
        box-shadow: 0 20px 60px rgba(0, 102, 249, 0.14);
    }

    .social-carousel--neon::before {
        background:
            radial-gradient(circle at 72% 28%, rgba(0, 102, 249, 0.2), transparent 28%),
            linear-gradient(180deg, rgba(0, 0, 0, 0.02), rgba(0, 0, 0, 0.42));
    }

    .social-carousel--neon .social-carousel-dots span.is-active {
        background: var(--indi-blue);
    }

    .social-sports-gallery {
        margin-top: 6rem;
    }

    .social-carousel--wide {
        height: min(62vh, 620px);
        min-height: 420px;
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
        border: 1px solid rgba(0, 102, 249, 0.24);
        border-right: 4px solid var(--indi-blue);
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
        background: linear-gradient(90deg, rgba(0, 102, 249, 0.08) 0%, transparent 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
    }

    .highlight-box:hover {
        border-color: rgba(0, 102, 249, 0.45);
    }

    .highlight-box:hover::before {
        opacity: 1;
    }

    .highlight-box h3 {
        font-family: 'usual', sans-serif;
        font-size: 1.05rem;
        letter-spacing: 0.15em;
        color: var(--indi-blue);
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
        border: 1px solid rgba(0, 102, 249, 0.24);
        box-shadow: 0 10px 40px rgba(0, 102, 249, 0.12);
    }

    .energy-visual-bg {
        width: 100%;
        height: 100%;
        min-height: 480px;
        background: radial-gradient(circle at center, rgba(0, 102, 249, 0.22) 0%, #020611 100%);
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
        background-image: radial-gradient(rgba(0, 102, 249, 0.18) 1px, transparent 1px);
        background-size: 24px 24px;
        opacity: 0.4;
        pointer-events: none;
    }

    .tech-hud-ring {
        position: absolute;
        width: 280px;
        height: 280px;
        border: 2px dashed rgba(0, 102, 249, 0.35);
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
        border: 1px solid rgba(0, 102, 249, 0.2);
        border-radius: 50%;
        border-top: 3px solid var(--indi-blue);
        border-bottom: 3px solid var(--indi-blue);
        animation: rotateRingOpposite 12s linear infinite;
    }

    .tech-hud-dots {
        position: absolute;
        width: 160px;
        height: 160px;
        border: 4px double rgba(0, 102, 249, 0.55);
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
        background: var(--indi-blue);
        border-radius: 50%;
        box-shadow: 0 0 20px var(--indi-blue), 0 0 45px rgba(0, 102, 249, 0.65);
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
            box-shadow: 0 0 15px rgba(0, 102, 249, 0.22);
        }
        50% {
            transform: scale(1.04);
            opacity: 1;
            box-shadow: 0 0 35px rgba(0, 102, 249, 0.5);
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
        background: #f6f7f4;
        padding: 12rem 0;
        position: relative;
        overflow: hidden;
    }

    .foundation-block::before {
        content: none;
    }

    .foundation-card {
        display: grid;
        grid-template-columns: minmax(280px, 0.82fr) minmax(0, 1.18fr);
        gap: clamp(4rem, 7vw, 7rem);
        align-items: center;
        padding: 0;
        color: #171717;
        position: relative;
    }

    .foundation-header {
        align-self: stretch;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-right: clamp(2rem, 4vw, 4rem);
        border-right: 1px solid rgba(17, 17, 17, 0.12);
    }

    .foundation-tag {
        color: #6f7047;
        border-color: rgba(111, 112, 71, 0.32);
        background: rgba(111, 112, 71, 0.06);
    }

    .foundation-card h2 {
        color: #171717;
        max-width: 740px;
        margin-bottom: 0;
    }

    .foundation-body {
        max-width: 760px;
        margin-top: 0;
    }

    .foundation-logos {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin-bottom: 3.5rem;
        padding-bottom: 3rem;
        border-bottom: 1px solid rgba(111, 112, 71, 0.24);
    }

    .foundation-logos img {
        max-width: min(520px, 100%);
        max-height: 170px;
        width: auto;
        height: auto;
        object-fit: contain;
        filter: drop-shadow(0 18px 32px rgba(111, 112, 71, 0.18));
    }

    .foundation-body p {
        font-family: 'usual', sans-serif;
        font-size: 1.25rem;
        line-height: 1.7;
        margin-bottom: 3.5rem;
        color: #374151;
        font-weight: 300;
    }

    .foundation-body .topic {
        margin-top: 3.5rem;
        border-top: 1px solid rgba(17, 17, 17, 0.12);
        padding-top: 2.5rem;
    }

    .foundation-body .topic h3 {
        font-family: 'usual', sans-serif;
        color: #171717;
        font-size: 1.3rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        margin-bottom: 1.25rem;
    }

    .foundation-body .topic p {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #4b5563;
        margin-bottom: 0;
    }

    .indi-btn-outline {
        display: inline-block;
        margin-top: 4.5rem;
        padding: 1.3rem 3.5rem;
        border: 2px solid #6f7047;
        color: #6f7047;
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
        background: #6f7047;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        z-index: -1;
    }

    .indi-btn-outline:hover {
        color: #fff !important;
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
        .foundation-card {
            grid-template-columns: 1fr;
            gap: 3.5rem;
        }
        .foundation-header {
            padding-right: 0;
            padding-bottom: 3rem;
            border-right: 0;
            border-bottom: 1px solid rgba(17, 17, 17, 0.12);
        }
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
        .social-carousel {
            min-height: 380px;
        }
        .social-carousel--wide {
            height: 420px;
            min-height: 360px;
        }
        .foundation-block {
            padding: 8rem 0;
        }
        .foundation-card {
            padding: 0;
        }
        .foundation-logos {
            padding-bottom: 2.4rem;
            margin-bottom: 2.5rem;
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
        .social-carousel {
            min-height: 330px;
        }
        .social-carousel::after {
            inset: 12px;
        }
        .social-carousel-dots {
            left: 18px;
            top: 18px;
            gap: 0.4rem;
        }
        .social-carousel-dots span {
            width: 15px;
        }
        .social-carousel-dots span.is-active {
            width: 28px;
        }
        .foundation-block {
            padding: 5rem 0;
        }
        .foundation-card {
            padding: 0;
        }
        .foundation-body {
            margin-top: 2.5rem;
        }
        .foundation-logos img {
            max-height: 125px;
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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[data-social-carousel]').forEach((carousel) => {
            const slides = Array.from(carousel.querySelectorAll('.social-carousel-slide'));
            const dots = Array.from(carousel.querySelectorAll('.social-carousel-dots span'));

            if (slides.length <= 1) {
                return;
            }

            let activeIndex = 0;

            window.setInterval(() => {
                slides[activeIndex].classList.remove('is-active');
                dots[activeIndex]?.classList.remove('is-active');

                activeIndex = (activeIndex + 1) % slides.length;

                slides[activeIndex].classList.add('is-active');
                dots[activeIndex]?.classList.add('is-active');
            }, 3600);
        });
    });
</script>

@endsection
