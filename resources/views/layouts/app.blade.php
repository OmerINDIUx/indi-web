<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'GRUPO INDI')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <!-- High-Tech Mechanical Logo Menu -->
        <!-- High-Tech Mechanical Logo Menu -->
        <div class="logo-menu-wrapper" id="logoMenu">
            <div class="logo-part part-top">
                <div class="logo-svg-wrapper">
                    {!! file_get_contents(public_path('assets/logo_indi.svg')) !!}
                </div>
            </div>
            
            <div class="menu-container" id="menuLinks">
                <a href="/" class="nav-link-item">INDI</a>
                <a href="/proyectos" class="nav-link-item"><span>PRO</span><span>YECTOS</span></a>
                <a href="/negocios" class="nav-link-item"><span>NEGO</span><span>CIOS</span></a>
                <a href="/prensa" class="nav-link-item"><span>PREN</span><span>SA</span></a>
                <a href="/social" class="nav-link-item"><span>SO</span><span>CIAL</span></a>
                <!-- The "guiño" selector notch -->
                <div class="menu-notch" id="menuNotch"></div>
            </div>

            <div class="logo-part part-bottom">
                <div class="logo-svg-wrapper">
                    {!! file_get_contents(public_path('assets/logo_indi.svg')) !!}
                </div>
            </div>
        </div>
        
        <main>
            @yield('content')
        </main>

        <footer class="indi-footer">
            <!-- Part 1: Full Corporate Contact Section (Copied exactly from Home Page) -->
            <section id="contacto" style="background: white; padding: 10rem 0; position: relative;">
                <div class="indi-container" style="max-width: 1600px; margin: 0 auto; width: 90%;">
                    <div style="margin-bottom: 6rem;">
                        <h2 class="indi-heading" style="font-size: clamp(2.5rem, 6vw, 4rem); line-height: 1.1; margin: 0; color: #000; font-family: 'Syncopate', sans-serif;">CONSTRUYΛMOS<br>EL FUTURO</h2>
                        <div style="width: 150px; height: 5px; background: #0066f9; margin-top: 2rem;"></div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1.4fr 1fr; gap: 8rem; align-items: start;">
                        <!-- Left Column: Consciousness blocks -->
                        <div style="display: flex; flex-direction: column; gap: 6rem;">
                            <!-- Conciencia Empresarial -->
                            <div class="contact-info-block">
                                <h4 class="indi-heading" style="color: #0066f9; font-size: 0.9rem; margin-bottom: 2rem; letter-spacing: 0.4em; font-family: 'Syncopate', sans-serif;">CONCIENCIΛ EMPRESΛRIΛ</h4>
                                <p style="color: #666; line-height: 1.8; font-size: 1.2rem; font-weight: 400; margin-bottom: 3rem; font-family: 'Inter', sans-serif;">
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
                                <h4 class="indi-heading" style="color: #0066f9; font-size: 0.9rem; margin-bottom: 2rem; letter-spacing: 0.4em; font-family: 'Syncopate', sans-serif;">CONCIENCIΛ ΛMBIENTΛL</h4>
                                <p style="color: #666; line-height: 1.8; font-size: 1.2rem; font-weight: 400; font-family: 'Inter', sans-serif;">
                                    Grupo Indi promueve activamente acciones que favorecen la conservación y el cuidado del medio ambiente, comprometiéndose a utilizar de manera racional y eficiente los recursos naturales en todos sus proyectos. Como parte de sus iniciativas, el grupo implementa la recolección de equipos, materiales y accesorios electrónicos, los cuales son enviados a centros de acopio y reciclaje certificados.
                                </p>
                            </div>
                        </div>

                        <!-- Right Column: Contact info box with technical shape -->
                        <div style="background: #0066f9; color: white; padding: 6rem 5rem; position: relative; -webkit-mask-image: url('{{ asset('assets/stat-card-shape.svg') }}'); mask-image: url('{{ asset('assets/stat-card-shape.svg') }}'); -webkit-mask-size: 100% 100%; mask-size: 100% 100%; -webkit-mask-repeat: no-repeat; mask-repeat: no-repeat; min-height: 650px; display: flex; flex-direction: column; justify-content: center;">
                            <h4 class="indi-heading" style="color: rgba(255,255,255,0.7); font-size: 1rem; margin-bottom: 4rem; letter-spacing: 0.4em; font-family: 'Syncopate', sans-serif;">CONTΛCTO</h4>
                            
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
                            <div style="position: absolute; bottom: 0; right: 0; width: 100px; height: 100px; background: white; opacity: 0.15;"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Part 2: Dark Bottom Footer -->
            <div style="background: #000; padding: 10rem 0 4rem; border-top: 1px solid #1a1a1a;">
                <div class="indi-container" style="max-width: 1600px; margin: 0 auto; width: 90%;">
                    <div style="display: flex; flex-direction: column; align-items: center; text-align: center; gap: 6rem;">
                        
                        <!-- Documentation & Key Links -->
                        <div style="display: flex; gap: 3rem; flex-wrap: wrap; justify-content: center;">
                            <a href="{{ asset('assets/Brochure-Grupo-Indi.pdf') }}" target="_blank" class="footer-doc-btn">
                                <span class="doc-icon">↓</span>
                                <div class="doc-meta">
                                    <span class="doc-label">MΞDIA KIT</span>
                                    <span class="doc-name">BROCHURΞ CORPORΛTIVO</span>
                                </div>
                            </a>
                            
                            <a href="{{ asset('assets/codigo-de-etica-y-conducta-2025.pdf') }}" target="_blank" class="footer-doc-btn">
                                <span class="doc-icon">↓</span>
                                <div class="doc-meta">
                                    <span class="doc-label">COMPLIΛNCΞ</span>
                                    <span class="doc-name">CÓDIGO DΞ ÉTICΛ 2025</span>
                                </div>
                            </a>
                        </div>

                        <!-- Social Networks -->
                        <div style="display: flex; gap: 4rem; align-items: center;">
                            <a href="https://mx.linkedin.com/company/grupo-indi" target="_blank" class="social-link">LINΚΞDIN</a>
                            <a href="https://www.facebook.com/IndiGrupo" target="_blank" class="social-link">FΛCΞBOOΚ</a>
                            <a href="https://www.instagram.com/grupoindi" target="_blank" class="social-link">INSTΛGRΛM</a>
                        </div>

                        <!-- Simplified Bottom Bar -->
                        <div style="width: 100%; border-top: 1px solid #1a1a1a; padding-top: 4rem; margin-top: 4rem; display: flex; justify-content: space-between; align-items: center; color: #444; font-size: 0.8rem; font-family: 'Space Grotesk'; font-weight: 500;">
                            <span>&copy; {{ date('Y') }} GRUPO INDI — SISTEMΛS WG-INDI</span>
                            <div style="display: flex; gap: 2rem;">
                                <a href="#" style="color: inherit; text-decoration: none;">ΛVISO DΞ PRIVΛCIDΛD</a>
                                <a href="#" style="color: inherit; text-decoration: none;">TÉRMINOS</a>
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
                font-family: 'Syncopate', sans-serif;
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
                font-family: 'Syncopate', sans-serif;
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
                font-family: 'Syncopate', sans-serif;
                color: rgba(255,255,255,0.7);
                font-size: 1rem;
                margin-bottom: 4rem;
                letter-spacing: 0.4em;
            }

            .contact-big-phone {
                display: block;
                font-family: 'Space Grotesk', sans-serif;
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
                font-family: 'Space Grotesk', sans-serif;
            }

            .contact-physical {
                font-family: 'Space Grotesk', sans-serif;
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

            /* Previous styles updated for documentation row */
            .footer-docs-row {
                display: flex;
                gap: 3rem;
                flex-wrap: wrap;
                justify-content: center;
                padding-top: 6rem;
                border-top: 1px solid #1a1a1a;
                margin-bottom: 6rem;
            }

            .footer-doc-btn {
                display: flex;
                align-items: center;
                gap: 1.5rem;
                padding: 1.5rem 2.5rem;
                border: 1px solid #222;
                color: white;
                text-decoration: none;
                transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            }

            .footer-social-row {
                display: flex;
                gap: 4rem;
                align-items: center;
                justify-content: center;
                margin-bottom: 6rem;
            }

            .footer-bottom-bar {
                width: 100%;
                border-top: 1px solid #1a1a1a;
                padding-top: 4rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
                color: #444;
                font-size: 0.8rem;
                font-family: 'Space Grotesk';
                font-weight: 500;
            }

            .legal-links {
                display: flex;
                gap: 2rem;
            }

            .legal-links a { font-color: inherit; color: inherit; text-decoration: none; }

            .social-link {
                font-family: 'Syncopate', sans-serif;
                color: #666;
                text-decoration: none;
                font-size: 0.8rem;
                font-weight: 700;
                letter-spacing: 0.2em;
                transition: all 0.3s ease;
            }

            .footer-doc-btn:hover { background: white; color: black; border-color: white; transform: translateY(-5px); }
            .doc-label { font-family: 'Syncopate', sans-serif; font-size: 0.6rem; color: #0066f9; letter-spacing: 0.2em; margin-bottom: 0.2rem; }
            .doc-name { font-family: 'Syncopate', sans-serif; font-size: 0.8rem; font-weight: 700; letter-spacing: 0.1em; }
            .social-link:hover { color: white; letter-spacing: 0.3em; }

            /* ----- RESOLUCIONES RESPONSIVAS ----- */
            @media (max-width: 1080px) {
                .footer-corporate-grid { grid-template-columns: 1fr; gap: 4rem; }
                .footer-mega-title { font-size: clamp(2rem, 5vw, 3rem); }
                .footer-contact-box { padding: 4rem; min-height: auto; }
                .iso-logos { gap: 3rem; justify-content: flex-start; }
            }
            
            @media (max-width: 720px) {
                #contacto { padding: 6rem 0; }
                .footer-docs-row { flex-direction: column; align-items: stretch; gap: 1.5rem; padding-top: 4rem; margin-bottom: 4rem; }
                .footer-doc-btn { justify-content: center; }
                .footer-social-row { flex-wrap: wrap; gap: 2rem; }
                .contact-big-phone { font-size: 2rem; margin-bottom: 2rem; }
                .footer-bottom-bar { flex-direction: column; gap: 1.5rem; text-align: center; }
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
