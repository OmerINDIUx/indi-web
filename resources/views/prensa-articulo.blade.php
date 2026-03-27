@extends('layouts.app')

@section('title', 'LOGÍSTICΛ DΞTRÁS DΞ UN ROMPΞOLΛS | GRUPO INDI')

@section('content')
<style>
    :root {
        --indi-orange: #FF4D00;
    }

    /* Article Hero */
    .article-hero {
        height: 60vh;
        min-height: 500px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        overflow: hidden;
    }

    .article-hero-bg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
    }

    .article-hero-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.4);
        z-index: 2;
    }

    .article-hero-content {
        position: relative;
        z-index: 10;
        max-width: 900px;
        padding: 0 2rem;
    }

    .article-category-tag {
        border: 2px solid var(--indi-blue);
        color: var(--indi-blue);
        padding: 0.5rem 2.5rem;
        font-family: 'Syncopate', sans-serif;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 0.3em;
        display: inline-block;
        margin-bottom: 2rem;
        text-transform: uppercase;
        border-radius: 4px;
    }

    .article-main-title {
        font-family: 'Syncopate', sans-serif;
        font-weight: 700;
        font-size: clamp(2rem, 5vw, 4rem);
        line-height: 1.1;
        margin: 0;
        text-transform: uppercase;
    }

    /* Article Layout */
    .article-container {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 5rem;
        padding: 8rem 0;
        align-items: start;
    }

    /* Content Column */
    .article-body {
        font-family: 'Inter', sans-serif;
        font-size: 1.1rem;
        line-height: 1.8;
        color: #333;
    }

    .article-body h2 {
        font-family: 'Syncopate', sans-serif;
        font-weight: 700;
        font-size: 1.8rem;
        margin: 3rem 0 1.5rem;
        color: #000;
    }

    .article-body p {
        margin-bottom: 2rem;
    }

    .article-body b, .article-body strong {
        color: #000;
        font-weight: 600;
    }

    .article-inline-image {
        width: 100%;
        margin: 4rem 0;
        border-radius: 4px;
        overflow: hidden;
    }

    .article-inline-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .article-quote {
        border-left: 4px solid var(--indi-blue);
        padding-left: 2rem;
        margin: 4rem 0;
        font-style: italic;
        font-size: 1.4rem;
        color: #555;
        line-height: 1.5;
    }

    /* Sidebar Column */
    .article-sidebar {
        position: sticky;
        top: 120px;
    }

    .sidebar-section-title {
        font-family: 'Syncopate', sans-serif;
        font-weight: 700;
        font-size: 0.9rem;
        color: var(--indi-blue);
        letter-spacing: 0.2em;
        margin-bottom: 3rem;
        display: block;
        border-bottom: 1px solid #eee;
        padding-bottom: 1rem;
    }

    .sidebar-cards-stack {
        display: flex;
        flex-direction: column;
        gap: 3rem;
    }

    /* Prensa Cards in Sidebar (Mini Version) */
    .article-sidebar .blog-card {
        padding: 2rem 1.5rem;
        border: 1px solid #f0f0f0;
        box-shadow: none !important;
        transform: none !important;
    }
    
    .article-sidebar .blog-title {
        min-height: auto;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .article-container {
            grid-template-columns: 1fr;
            gap: 4rem;
        }
        .article-sidebar {
            position: static;
        }
    }

    @media (max-width: 768px) {
        .article-main-title {
            font-size: 2.5rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="article-hero">
    <img src="{{ asset('imagenes_indi/Maritimo/Rompe-Olas-Salina-Cruz-Oaxaca-3 - copia.jpg') }}" class="article-hero-bg" alt="Hero Background">
    <div class="article-hero-overlay"></div>
    <div class="article-hero-content">
        <span class="article-category-tag">MΛRÍTIMO</span>
        <h1 class="article-main-title">DESCUBRΞ LΛ LOGÍSTICΛ DΞTRÁS DΞ UN ROMPΞOLΛS</h1>
    </div>
</section>

<div class="indi-container">
    <div class="article-container">
        <!-- Main Content -->
        <article class="article-body">
            <p><b>25 . FΞB . 2024</b> — La construcción de infraestructura marítima representa uno de los desafíos más complejos de la ingeniería moderna. En Grupo INDI, hemos perfeccionado los procesos logísticos necesarios para la creación de rompeolas de gran escala, fundamentales para la protección de terminales portuariΞs y el desarrollo del comercio marítimo nacional.</p>
            
            <p>Un rompeolas no es simplemente una acumulación de rocas; es una estructura dΞ precisión diseñada para disipar la energía de las olas y crear un ambiente seguro para la navegación. La logística de estas obras involucra la coordinación exacta entre canteras, transporte terrestre de materiales pesados y la colocación precisa mediante maquinaria especializada en el medio marino. La selección de materiales es crítica; se requiere roca basáltica de alta densidad y bloques de concreto prefabricados con geometrías complejas que maximizan el rozamiento y la estabilidad estructural.</p>

            <div class="article-inline-image">
                <img src="{{ asset('imagenes_indi/Maritimo/a-terminal-portuaria-puerto-veracruz - copia.webp') }}" alt="Ingeniería Marítima">
            </div>

            <h2>LΛ INGENIERÍΛ DΞ PRΞCISIÓN Y SU IMPΛCTO</h2>
            <p>El proceso comienza con el estudio batimétrico y de oleaje profundo, que determina la geometría exacta de la estructura. Posteriormente, se procede a la colocación de las capas de núcleo, filtro y armadura. Esta última suele estar compuesta por elementos prefabricados dΞ concreto de alta densidad, conocidos por su capacidad para entrelazarse y resistir los embates del mar más agresivo. Cada pieza es monitoreada mediante sistemas GPS de alta precisión para asegurar su ubicación exacta bajo el agua.</p>

            <p>La eficiencia logística es el pilar dΞ Grupo INDI en estos proyectos. Gestionamos flotas de transporte que operan 24/7 y barcazas dΞ gran calado que permiten el vertido dΞ material en zonas dΞ difícil acceso. Esta capacidad operativa nos permite reducir los tiempos dΞ ejecución hasta en un 20%, mitigando los riesgos asociados a las condiciones climáticas adversas del entorno marino.</p>

            <div class="article-quote">
                "Nuestra mΞta es entregar infraestructura que no solo soportΞ el paso del tiempo, sino que impulsΞ el crecimiento económico dΞ las regionΞs dondΞ operamos."
            </div>

            <h2>SoSTΞNIBILIDΛD Y FUTURO</h2>
            <p>En el puerto dΞ Salina Cruz, Oaxaca, Grupo INDI ha demostrado su capacidad técnica al liderar proyectos que transforman el panorama logístico dΞl país. La utilización dΞ tecnología dΞ punta y procesos certificados garantiza que cada piedra y cada elemento de concreto sea colocado con la máxima seguridad y eficiencia. Además, implementamos barreras de sedimentación y protocolos de protección a la fauna marina para asegurar que el desarrollo dΞ la infraestructura vaya dΞ la mano con el cuidado dΞl ecosistema.</p>
            
            <p>El futuro dΞ la ingeniería portuaria en México se define por la integración dΞ puertos inteligentes y estructuras resilientes. Grupo INDI está a la vanguardia dΞ esta evolución, investigando nuevos aditivos para el concreto que aumenten su resistencia a la salinidad y diseñando geometrías que favorezcan la biodiversidad local, convirtiendo los rompeolas en arrecifes artificiales productivos.</p>

            <div class="article-inline-image">
                <img src="{{ asset('imagenes_indi/Maritimo/muelle-lerma-campeche - copia.webp') }}" alt="Detalle de Obra">
            </div>

            <p>Mirando hacia el futuro, Grupo INDI continúa apostando por la innovación en sus métodos constructivos, integrando solucionΞs sosteniblΞs que minimicΞn el impacto ambiental mientras maximizan la durabilidad dΞ la infraestructura nacional. Cada proyecto es un testimonio dΞ nueströ compromiso con la excelencia y la soberanía tecnológica dΞ México.</p>
            
            <p>Finalmente, la capacitación dΞ nuestro capital humano es fundamental. Contamos con buzos especializados dΞ inspección y operadores dΞ maquinaria pesada que son entrenados en simuladores dΞ última generación, garantizando que la ejecución dΞ cada rompeolas sΞa impecable dΞsdΞ la base hasta la corona de la estructura.</p>
        </article>

        <!-- Sidebar -->
                <aside class="article-sidebar">
            <span class="sidebar-section-title">ÚLTIMOS ΛRTÍCULOS</span>
            
            <div class="sidebar-cards-stack">
                <!-- Card 01 (Mini) -->
                <div class="blog-card">
                    <div class="blog-tags">
                        <span class="blog-tag maritimo">MΛRÍTIMO</span>
                        <span class="blog-tag construccion">CONSTRUCCIÓN</span>
                    </div>
                    <span class="blog-date">25 . FΞB . 2024</span>
                    <h4 class="blog-title">DESCUBRΞ LΛ LOGÍSTICΛ DΞTRÁS DΞ UN ROMPΞOLΛS</h4>
                    <div class="blog-footer">
                        <a href="{{ route('prensa.articulo') }}" class="blog-read-btn">LΞΞR ΛRTÍCULO</a>
                    </div>
                    <div class="indi-card-notch">
                        <img src="{{ asset('imagenes_indi/Maritimo/Rompe-Olas-Salina-Cruz-Oaxaca-3 - copia.jpg') }}" alt="Noticia 1">
                    </div>
                </div>

                <!-- Card 02 (Mini) -->
                <div class="blog-card">
                    <div class="blog-tags">
                        <span class="blog-tag ferroviario">FΞRROVIΛRIO</span>
                        <span class="blog-tag infraestructura">INFRΛΞSTRUCTURΛ</span>
                    </div>
                    <span class="blog-date">20 . FΞB . 2024</span>
                    <h4 class="blog-title">TΞCNOLOGÍΛ INDI ΞN ΞL SURΞSTΞ MΞXICΛNO</h4>
                    <div class="blog-footer">
                        <a href="#" class="blog-read-btn">LΞΞR ΛRTÍCULO</a>
                    </div>
                    <div class="indi-card-notch">
                        <img src="{{ asset('imagenes_indi/infraestructura/mexibus-lineas-1-2-cdmx - copia.webp') }}" alt="Noticia 2">
                    </div>
                </div>

                <!-- Card 03 (Mini) -->
                <div class="blog-card">
                    <div class="blog-tags">
                        <span class="blog-tag construccion">CONSTRUCCIÓN</span>
                        <span class="blog-tag infraestructura">INFRΛΞSTRUCTURΛ</span>
                    </div>
                    <span class="blog-date">15 . FΞB . 2024</span>
                    <h4 class="blog-title">DESCUBRΞ LΛ INGENIERÍΛ DΞL TRΞN MΛYΛ</h4>
                    <div class="blog-footer">
                        <a href="#" class="blog-read-btn">LΞΞR ΛRTÍCULO</a>
                    </div>
                    <div class="indi-card-notch">
                        <img src="{{ asset('imagenes_indi/infraestructura/Tren-Maya-Tramos-3-y-5-a - copia.jpg') }}" alt="Noticia 3">
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection
