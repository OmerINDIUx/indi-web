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
                <a href="/nosotros" class="nav-link-item">NOSOTROS</a>
                <a href="/proyectos" class="nav-link-item">PROYECTOS</a>
                <a href="/negocios" class="nav-link-item">NEGOCIOS</a>
                <a href="/prensa" class="nav-link-item">PRENSA</a>
                <a href="/social" class="nav-link-item">SOCIAL</a>
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

        <footer class="indi-footer" style="background: #000; padding: 10rem 0 4rem; border-top: 1px solid #1a1a1a;">
            <div class="indi-container">
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
        </footer>

        <style>
            /* Premium Footer styles */
            .footer-doc-btn {
                display: flex;
                align-items: center;
                gap: 1.5rem;
                padding: 1.5rem 2.5rem;
                background: transparent;
                border: 1px solid #222;
                color: white;
                text-decoration: none;
                transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
                position: relative;
                overflow: hidden;
            }

            .footer-doc-btn:hover {
                background: white;
                color: black;
                border-color: white;
                transform: translateY(-5px);
            }

            .doc-icon {
                font-size: 1.4rem;
                font-weight: 700;
            }

            .doc-meta {
                display: flex;
                flex-direction: column;
                text-align: left;
            }

            .doc-label {
                font-family: 'Syncopate', sans-serif;
                font-size: 0.6rem;
                color: var(--indi-blue);
                letter-spacing: 0.2em;
                margin-bottom: 0.2rem;
            }

            .doc-name {
                font-family: 'Syncopate', sans-serif;
                font-size: 0.8rem;
                font-weight: 700;
                letter-spacing: 0.1em;
            }

            .social-link {
                font-family: 'Syncopate', sans-serif;
                color: #666;
                text-decoration: none;
                font-size: 0.8rem;
                font-weight: 700;
                letter-spacing: 0.2em;
                transition: all 0.3s ease;
            }

            .social-link:hover {
                color: white;
                letter-spacing: 0.3em;
            }
        </style>
    </body>
</html>
