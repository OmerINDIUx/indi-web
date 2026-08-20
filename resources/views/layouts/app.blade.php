@php
    $currentLocale = app()->getLocale();
    $nextLocale = $currentLocale === 'en' ? 'es' : 'en';
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'INDI')</title>
        <link rel="stylesheet" href="https://use.typekit.net/iyv7knh.css">
        @vite([
            'resources/css/app.css',
            'resources/css/logo-menu.css',
            'resources/js/logo.js',
            'resources/js/app.js',
        ])
        @stack('styles')
    </head>
    <body class="antialiased {{ request()->is('proyectos*') ? 'page-proyectos' : '' }}">
        <!-- High-Tech Mechanical Logo Menu -->
        <div class="logo-menu-wrapper" id="logoMenu">
            <div class="logo-group">
                <div class="logo-svg-wrapper single-logo">
                    {!! file_get_contents(public_path('assets/indi brand-01.svg')) !!}
                </div>
            </div>

            <div class="menu-container" id="menuLinks">
                <a href="/" class="nav-link-item {{ request()->is('/') ? 'active-page' : '' }}">INDI</a>
                <a href="/proyectos" class="nav-link-item {{ request()->is('proyectos*') ? 'active-page' : '' }}"><span>{{ \App\Support\CmsText::get('nav.projects', 'PROYECTOS') }}</span></a>
                <a href="/negocios" class="nav-link-item {{ request()->is('negocios*') ? 'active-page' : '' }}"><span>{{ \App\Support\CmsText::get('nav.business', 'NEGOCIOS') }}</span></a>
                <a href="/historia" class="nav-link-item {{ request()->is('historia*') ? 'active-page' : '' }}"><span>{{ \App\Support\CmsText::get('nav.history', 'HISTORIA') }}</span></a>
                <a href="/prensa" class="nav-link-item {{ request()->is('prensa*') ? 'active-page' : '' }}"><span>{{ \App\Support\CmsText::get('nav.press', 'PRENSA') }}</span></a>
                <a href="/social" class="nav-link-item {{ request()->is('social*') ? 'active-page' : '' }}"><span>{{ \App\Support\CmsText::get('nav.social', 'SOCIAL') }}</span></a>
                <a href="{{ route('locale.switch', $nextLocale) }}" class="nav-link-item language-switch-link" aria-label="{{ $nextLocale }}">{{ \App\Support\CmsText::get('language.switch_to_' . $nextLocale, strtoupper($nextLocale)) }}</a>
                
                <!-- The "guiño" selector notch -->
                <div class="menu-notch" id="menuNotch"></div>
            </div>
        </div>
        
        <main>
            @yield('content')
        </main>

        <footer class="indi-footer">
            <!-- Part 1: Full Corporate Contact Section (Copied exactly from Home Page) -->
            <section id="contacto" style="background: white; padding: 10rem 0; position: relative;">
                <div class="indi-container">
                    <div style="margin-bottom: 6rem;">
                        <h2 class="indi-heading" style="font-size: clamp(2.5rem, 6vw, 4rem); line-height: 1.1; margin: 0; color: #000; font-family: 'usual', sans-serif;">{{ \App\Support\CmsText::get('footer.cta', 'CONSTRUYAMOS EL FUTURO') }}</h2>
                        <div style="width: 150px; height: 5px; background: #0066f9; margin-top: 2rem;"></div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1.4fr 1fr; gap: 8rem; align-items: start;">
                        <!-- Left Column: Consciousness blocks -->
                        <div style="display: flex; flex-direction: column; gap: 6rem;">
                            <!-- Conciencia Empresarial -->
                            <div class="contact-info-block">
                                <h4 class="indi-heading" style="color: #0066f9; font-size: 0.9rem; margin-bottom: 2rem; letter-spacing: 0.4em; font-family: 'usual', sans-serif;">{{ \App\Support\CmsText::get('footer.business_awareness.title', 'CONCIENCIA EMPRESARIA') }}</h4>
                                <p style="color: #666; line-height: 1.8; font-size: 1.2rem; font-weight: 400; margin-bottom: 3rem; font-family: 'usual', sans-serif;">
                                    {{ \App\Support\CmsText::get('footer.business_awareness.text', 'Certificamos nuestros procesos con los mas altos estandares internacionales de calidad, para ofrecer a nuestros clientes la seguridad de una empresa altamente comprometida con cada proyecto.') }}
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
                                <h4 class="indi-heading" style="color: #0066f9; font-size: 0.9rem; margin-bottom: 2rem; letter-spacing: 0.4em; font-family: 'usual', sans-serif;">{{ \App\Support\CmsText::get('footer.environmental_awareness.title', 'CONCIENCIA AMBIENTAL') }}</h4>
                                <p style="color: #666; line-height: 1.8; font-size: 1.2rem; font-weight: 400; font-family: 'usual', sans-serif;">
                                    {{ \App\Support\CmsText::get('footer.environmental_awareness.text', 'INDI promueve activamente acciones que favorecen la conservacion y el cuidado del medio ambiente.') }}
                                </p>
                            </div>
                        </div>

                        <!-- Right Column: Contact info box with technical shape -->
                        <div style="background: #0066f9; color: white; padding: 6rem 5rem; position: relative; -webkit-mask-image: url('{{ asset('assets/stat-card-shape.svg') }}'); mask-image: url('{{ asset('assets/stat-card-shape.svg') }}'); -webkit-mask-size: contain; mask-size: contain; -webkit-mask-position: center; mask-position: center; -webkit-mask-repeat: no-repeat; mask-repeat: no-repeat; min-height: 650px; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
                            <h4 class="indi-heading" style="color: rgba(255,255,255,0.7); font-size: 1rem; margin-bottom: 4rem; letter-spacing: 0.4em; font-family: 'usual', sans-serif;">{{ \App\Support\CmsText::get('footer.contact', 'CONTACTO') }}</h4>
                            
                            <div style="font-family: 'usual', sans-serif;">
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
                            <div style="position: absolute; bottom: 0; right: 0; width: 100px; height: 100px; background: white; opacity: 0.15;"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Part 2: Dark Bottom Footer -->
            <div class="footer-lower">
                <div class="indi-container">
                    <div class="footer-lower-inner">

                        <!-- Documentation & Key Links -->
                        <nav class="footer-docs-grid" aria-label="Enlaces importantes">
                            <a href="{{ route('brochure') }}" class="footer-doc-btn footer-doc-btn--brochure">
                                <span class="doc-icon" aria-hidden="true">↗</span>
                                <div class="doc-meta">
                                    <span class="doc-label">{{ \App\Support\CmsText::get('footer.view', 'VER') }}</span>
                                    <span class="doc-name">{{ \App\Support\CmsText::get('footer.brochure', 'BROCHURE INTERACTIVO') }}</span>
                                </div>
                            </a>

                            <a href="{{ route('etica') }}" class="footer-doc-btn footer-doc-btn--ethics">
                                <span class="doc-icon" aria-hidden="true">↗</span>
                                <div class="doc-meta">
                                    <span class="doc-label">{{ \App\Support\CmsText::get('footer.view', 'VER') }}</span>
                                    <span class="doc-name">{{ \App\Support\CmsText::get('footer.ethics', 'CODIGO DE ETICA 2025') }}</span>
                                </div>
                            </a>

                            <a href="{{ route('talento.create') }}" class="footer-doc-btn footer-doc-btn--talent">
                                <span class="doc-icon" aria-hidden="true">↗</span>
                                <div class="doc-meta">
                                    <span class="doc-label">{{ \App\Support\CmsText::get('footer.hr', 'RECURSOS HUMANOS') }}</span>
                                    <span class="doc-name">{{ \App\Support\CmsText::get('footer.talent', 'BUSCAMOS TALENTO') }}</span>
                                </div>
                            </a>

                            <a href="{{ route('quejas.create') }}" class="footer-doc-btn footer-doc-btn--complaints">
                                <span class="doc-icon" aria-hidden="true">!</span>
                                <div class="doc-meta">
                                    <span class="doc-label">{{ \App\Support\CmsText::get('footer.transparency', 'TRANSPARENCIA') }}</span>
                                    <span class="doc-name">{{ \App\Support\CmsText::get('footer.complaints', 'QUEJAS Y DENUNCIAS') }}</span>
                                </div>
                            </a>
                        </nav>

                        <!-- Social Networks -->
                        <nav class="footer-social-row" aria-label="Redes sociales">
                            <a href="https://www.linkedin.com/company/grupoindi/posts/?feedView=all" target="_blank" rel="noopener noreferrer" class="social-link">LINKEDIN</a>
                            <a href="https://www.facebook.com/grupoindimexico" target="_blank" rel="noopener noreferrer" class="social-link">FACEBOOK</a>
                            <a href="https://www.instagram.com/grupo_indi/" target="_blank" rel="noopener noreferrer" class="social-link">INSTAGRAM</a>
                            <a href="https://x.com/GrupoIndi" target="_blank" rel="noopener noreferrer" class="social-link">X</a>
                        </nav>

                        <!-- Simplified Bottom Bar -->
                        <div class="footer-bottom-bar">
                            <span>&copy; {{ date('Y') }} INDI - By <a href="https://indi-lab.com/" target="_blank" rel="noopener noreferrer" class="social-link">INDI Lab</a> </span>
                            <div class="legal-links">
                                <a href="{{ route('login') }}">CMS LOGIN</a>
                                <a href="{{ route('privacy') }}">{{ \App\Support\CmsText::get('footer.privacy', 'AVISO DE PRIVACIDAD') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <style>
            .indi-footer {
                background: transparent;
                color: white;
                /* Removed padding and border that caused the black strip */
            }

            .footer-top-section {
                padding-bottom: 8rem;
                margin-bottom: 4rem;
                /* No border here as it transitions to docs */
            }

            .footer-mega-title {
                font-family: 'usual', sans-serif;
                font-size: clamp(3rem, 6vw, 4.5rem);
                line-height: 1.1;
                margin: 0;
            }

            .footer-corporate-grid {
                display: grid;
                grid-template-columns: 1.4fr 1fr;
                gap: 8rem;
                align-items: start;
            }

            .footer-pillars {
                display: flex;
                flex-direction: column;
                gap: 6rem;
            }

            .pill-title {
                font-family: 'usual', sans-serif;
                color: #0066f9;
                font-size: 0.9rem;
                margin-bottom: 2rem;
                letter-spacing: 0.4em;
            }

            .pill-text {
                color: #888;
                line-height: 1.8;
                font-size: 1.2rem;
                font-weight: 400;
                margin-bottom: 3rem;
            }

            .iso-logos {
                display: flex;
                gap: 5rem;
                align-items: center;
                flex-wrap: wrap;
            }

            .iso-logos img {
                height: 100px;
                width: auto;
                object-fit: contain;
                /* Removed inversion filter since background is now white */
            }

            /* Technical Box */
            .footer-contact-box {
                background: #0066f9;
                color: white;
                padding: 6rem 5rem;
                position: relative;
                -webkit-mask-image: url('/assets/stat-card-shape.svg');
                mask-image: url('/assets/stat-card-shape.svg');
                -webkit-mask-size: 100% 100%;
                mask-size: 100% 100%;
                -webkit-mask-repeat: no-repeat;
                mask-repeat: no-repeat;
                min-height: 650px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .contact-label {
                font-family: 'usual', sans-serif;
                color: rgba(255,255,255,0.7);
                font-size: 1rem;
                margin-bottom: 4rem;
                letter-spacing: 0.4em;
            }

            .contact-big-phone {
                display: block;
                font-family: 'usual', sans-serif;
                font-size: 2.5rem;
                color: white;
                text-decoration: none;
                margin-bottom: 3rem;
                font-weight: 700;
                letter-spacing: -0.02em;
            }

            .contact-emails {
                margin-bottom: 4rem;
            }

            .contact-emails a {
                display: block;
                color: white;
                text-decoration: none;
                margin-bottom: 1.2rem;
                font-size: 1.2rem;
                font-family: 'usual', sans-serif;
            }

            .contact-physical {
                font-family: 'usual', sans-serif;
                font-size: 1.1rem;
                color: rgba(255,255,255,0.4);
                line-height: 1.8;
                text-transform: uppercase;
                letter-spacing: 0.1em;
            }

            .tech-accent {
                position: absolute;
                bottom: 0;
                right: 0;
                width: 100px;
                height: 100px;
                background: white;
                opacity: 0.15;
            }

            /* ----- RESOLUCIONES RESPONSIVAS ----- */
            @media (max-width: 1080px) {
                .footer-corporate-grid { grid-template-columns: 1fr; gap: 4rem; }
                .footer-mega-title { font-size: clamp(2rem, 5vw, 3rem); }
                .footer-contact-box { padding: 4rem; min-height: auto; }
                .iso-logos { gap: 3rem; justify-content: flex-start; }
            }
            
            @media (max-width: 720px) {
                #contacto { padding: 6rem 0; }
                .contact-big-phone { font-size: 2rem; margin-bottom: 2rem; }
                .iso-logos img { height: 75px; }
            }
            
            @media (max-width: 500px) {
                #contacto { padding: 4rem 0; }
                .footer-contact-box { padding: 3rem 2rem; }
                .contact-big-phone { font-size: 1.5rem; }
                .contact-emails a { font-size: 1rem; }
                .iso-logos { justify-content: center; gap: 2rem; }
                .iso-logos img { height: 60px; }
                .footer-mega-title { font-size: clamp(1.5rem, 8vw, 2rem); }
                .contact-label, .pill-title { margin-bottom: 1.5rem; }
            }
        </style>
    </body>
</html>
