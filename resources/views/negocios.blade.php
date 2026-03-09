@extends('layouts.app')

@section('content')
<main class="negocios-page">
    <div class="negocios-pin-wrapper">
        <div class="negocios-sticky-stage">
            <!-- Background Images Layer -->
            <div class="visual-layer">
                <div class="visual-notched-frame">
                    <video src="/videos_indi/Negocios/Indi_construccion.mp4" autoplay loop muted playsinline class="stage-img active" data-unit="1"></video>
                    <video src="/videos_indi/Negocios/Indi_infraestructura.mp4" autoplay loop muted playsinline class="stage-img" data-unit="2"></video>
                    <video src="/videos_indi/Negocios/Indi_maritimo.mp4" autoplay loop muted playsinline class="stage-img" data-unit="3"></video>
                    <video src="/videos_indi/Negocios/Indi_ferroviario.mp4" autoplay loop muted playsinline class="stage-img" data-unit="4"></video>
                    
                    <!-- Inverted SVG Notch: White wings that let the image protrude in the center -->
                    <div class="negocios-notch-divider">
                        <svg viewBox="0 0 1000 100" preserveAspectRatio="none">
                            <path d="M 0 0 H 150 C 180 0 190 60 200 60 H 800 C 810 60 820 0 850 0 H 1000 V 100 H 0 Z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Content Layer -->
            <div class="content-layer">
                <div class="indi-container">
                    <div class="unit-info-grid">
                        <!-- All texts stacked, cross-faded by GSAP -->
                        <div class="text-swap-container" id="title-swap">
                            <div class="text-unit" data-unit="1">
                                <span class="unit-index"><span class="num-roll">01</span>/04</span>
                                <h2 class="unit-main-name">INDI<br><span class="highlight-unit-1">CONSTRUCCIÓN</span></h2>
                            </div>
                            <div class="text-unit" data-unit="2">
                                <span class="unit-index"><span class="num-roll">02</span>/04</span>
                                <h2 class="unit-main-name">INDI<br><span class="highlight-unit-2">INFRAESTRUCTURA</span></h2>
                            </div>
                            <div class="text-unit" data-unit="3">
                                <span class="unit-index"><span class="num-roll">03</span>/04</span>
                                <h2 class="unit-main-name">INDI<br><span class="highlight-unit-3">MARITIMO</span></h2>
                            </div>
                            <div class="text-unit" data-unit="4">
                                <span class="unit-index"><span class="num-roll">04</span>/04</span>
                                <h2 class="unit-main-name">INDI<br><span class="highlight-unit-4">FERROVIARIA</span></h2>
                            </div>
                        </div>

                        <div class="text-swap-container" id="desc-swap">
                            <div class="text-unit" data-unit="1">
                                <p>Nos especializamos en cimentación profunda y en la ejecución de obras de alta complejidad para la construcción, modernización, rehabilitación y conservación de vialidades, puentes, edificaciones, puertos, muelles y escolleras. Cada uno de estos proyectos está respaldado por nuestra capacidad técnica y nuestro enfoque en la calidad, garantizando soluciones duraderas y eficientes.</p>
                            </div>
                            <div class="text-unit" data-unit="2">
                                <p>Somos inversionistas, constructores y operadores de proyectos clave en México, tales como autopistas, estacionamientos y sistemas de transporte público, desarrollados bajo el modelo de Asociación Público-Privada (APP). Este enfoque nos permite impulsar proyectos que mejoran la infraestructura nacional, generando soluciones que fortalecen la conectividad y movilidad en el país.</p>
                            </div>
                            <div class="text-unit" data-unit="3">
                                <p>Grupo INDI ha sido un actor clave en el desarrollo de la infraestructura marítima y portuaria en México, contribuyendo de manera significativa al crecimiento del comercio y la conectividad en el país. El compromiso con la calidad y la innovación ha permitido que sus proyectos marítimos y portuarios cumplan con los más altos estándares internacionales, posicionando a México como un hub logístico competitivo.</p>
                            </div>
                            <div class="text-unit" data-unit="4">
                                <p>Ingeniería ferroviaria avanzada para sistemas de transporte de carga y pasajeros a gran escala. Resolvemos retos logísticos y de orografía compleja, trazando rutas estratégicas que impulsan la competitividad nacional mediante infraestructura resiliente y de alto rendimiento técnico.</p>
                            </div>
                        </div>

                        <div class="text-swap-container" id="detail-swap">
                            <div class="text-unit" data-unit="1">
                                <p>Entre sus obras más destacadas se incluyen la construcción y modernización de muelles, escolleras, terminales portuarias, y obras de dragado, todas diseñadas para mejorar el flujo de mercancías y garantizar la seguridad y eficiencia en las operaciones marítimas. Estos proyectos no solo impulsan el desarrollo del comercio exterior, sino que también contribuyen a dinamizar las economías regionales.</p>
                            </div>
                            <div class="text-unit" data-unit="2">
                                <p>Nos especializamos en la ejecución de obras de prestación de servicios y concesiones, tanto a nivel estatal como federal, con un profundo conocimiento de las necesidades del sector público. Nuestro objetivo es ofrecer proyectos sostenibles y de alta calidad que contribuyan al desarrollo económico y social de México, garantizando eficiencia y estabilidad a largo plazo.</p>
                            </div>
                            <div class="text-unit" data-unit="3">
                                <p>A lo largo de su trayectoria, ha ejecutado proyectos de alta complejidad técnica en diversos puertos estratégicos, que han fortalecido la capacidad operativa del sistema portuario mexicano. Entre sus obras más destacadas se incluyen la construcción y modernización de muelles, escolleras, terminales portuarias, y obras de dragado, todas diseñadas para garantizar la seguridad operativa.</p>
                            </div>
                            <div class="text-unit" data-unit="4">
                                <p>Nuestra capacidad técnica nos permite participar en proyectos estratégicos de conectividad masiva y transporte de carga, integrando soluciones de movilidad que transforman la dinámica de las metrópolis. Cada proyecto está respaldado por un enfoque riguroso en la calidad y la seguridad estructural de gran escala.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Spacer to create scroll distance for Pinning -->
        <div class="scroll-trigger-sections">
            <div class="trigger" data-unit="1"></div>
            <div class="trigger" data-unit="2"></div>
            <div class="trigger" data-unit="3"></div>
            <div class="trigger" data-unit="4"></div>
        </div>
    </div>
</main>

<style>
:root {
    --indi-yellow: #FFB800;
}

.negocios-page {
    background: #fff;
    overflow: visible; /* Required for position: sticky to work */
}

.negocios-pin-wrapper {
    position: relative;
    width: 100%;
}

.negocios-sticky-stage {
    position: sticky;
    top: 0;
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

/* Visual Layer: Fixed 70% height */
.visual-layer {
    width: 100%;
    height: 70vh;
    background: #fff;
    z-index: 2;
}

.visual-notched-frame {
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
    border-bottom-left-radius: 40px; /* Rounded frame corners as requested */
    border-bottom-right-radius: 40px;
}

.negocios-notch-divider {
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 100%;
    height: 100px; /* Adjusted height for better fit */
    z-index: 20;
}

.negocios-notch-divider svg {
    width: 100%;
    height: 100%;
    fill: #fff; /* Matches the content background */
}

.stage-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0;
    transform: scale(1.1);
    transition: opacity 0.8s ease, transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
}

.stage-img.active {
    opacity: 1;
    transform: scale(1);
    z-index: 10;
}

/* Adjustments for Infraestructura & Ferroviario (15% larger, anchored to bottom) */
.stage-img[data-unit="2"], .stage-img[data-unit="4"] {
    object-position: bottom center;
    transform: scale(1.25);
}
.stage-img.active[data-unit="2"], .stage-img.active[data-unit="4"] {
    transform: scale(1.15);
}

/* Content Layer: Fixed 30% height (Exactly 30vh) */
.content-layer {
    height: 30vh;
    display: flex;
    align-items: center;
    z-index: 1;
    overflow: hidden; /* Ensure it stays at 30% without shifting */
}

.negocios-page .indi-container {
    max-width: 90%;
    width: 90%;
    margin: 0 auto;
}

.unit-info-grid {
    display: grid;
    grid-template-columns: 0.8fr 1.1fr 1.1fr; /* Optimized for symmetrical column height */
    gap: 4rem;
    align-items: center; /* Vertical alignment for a balanced look */
    padding: 2rem 0;
}

.text-swap-container {
    position: relative;
}

.text-unit {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    transform: translateY(20px);
    visibility: hidden;
    transition: all 0.6s ease;
}

.text-unit.active {
    position: relative;
    opacity: 1;
    transform: translateY(0);
    visibility: visible;
}

.unit-index {
    font-family: 'Syncopate', sans-serif;
    font-size: clamp(1.2rem, 3.5vw, 2.2rem);
    font-weight: 700;
    color: #ccc;
    line-height: 1;
    margin-bottom: 1rem;
    display: block;
    position: relative;
    overflow: hidden; /* Mask for rolling animation */
    height: 1.2em;
}

.unit-index span {
    display: inline-block;
    vertical-align: top;
}

.unit-index .num-roll {
    position: relative;
    display: inline-block;
}

.unit-main-name {
    font-family: 'Syncopate', sans-serif;
    font-size: clamp(1.8rem, 5vw, 3.5rem);
    font-weight: 700;
    color: #000;
    line-height: 1;
    text-transform: uppercase;
}

.highlight-unit-1 { color: #ffa608; --unit-color: #ffa608; }
.highlight-unit-2 { color: #64b032; --unit-color: #64b032; }
.highlight-unit-3 { color: #0066f9; --unit-color: #0066f9; }
.highlight-unit-4 { color: #ff3000; --unit-color: #ff3000; }

.char {
    display: inline-block;
    color: #ccc; /* Initial gray state */
    transition: color 0.1s ease;
}


.text-unit p {
    font-family: 'Inter', sans-serif;
    font-size: 1.1rem;
    line-height: 1.7;
    color: #333;
    font-weight: 300;
}

/* Scroll Trigger Areas: Balanced for fast response without skipping the first slide */
.scroll-trigger-sections {
    width: 100%;
    margin-top: -40vh; /* Pulled up slightly to eliminate the header gap, but keeping first trigger active */
    position: relative;
    pointer-events: none;
}

.trigger {
    height: 40vh; /* Keeps the quick-switching feel */
}

/* Tablets (1080px) */
@media (max-width: 1080px) {
    .unit-info-grid { grid-template-columns: 1fr; gap: 2rem; }
    .visual-layer { height: 50vh; }
    .content-layer { height: 50vh; }
}

/* Teléfonos Grandes (720px) */
@media (max-width: 720px) {
    .visual-layer { height: 45vh; }
    .content-layer { height: 55vh; }
    .unit-main-name { font-size: clamp(2rem, 5vw, 3rem); }
}

/* Teléfonos Pequeños (500px) */
@media (max-width: 500px) {
    .visual-layer { height: 40vh; }
    .content-layer { height: 60vh; }
    .negocios-notch-divider { height: 60px; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const triggers = document.querySelectorAll('.trigger');
    const images = document.querySelectorAll('.stage-img');
    const textUnits = document.querySelectorAll('.text-unit');

    const updateUnit = (unit) => {
        // Update Images
        images.forEach(img => {
            img.classList.toggle('active', img.dataset.unit == unit);
        });

        // Update Text Blocks
        textUnits.forEach(tu => {
            const isActive = tu.dataset.unit == unit;
            if (tu.classList.contains('active') && isActive) return; // Already active

            tu.classList.toggle('active', isActive);
            
            if (isActive) {
                // Trigger Rolling Number Animation
                const indexNum = tu.querySelector('.num-roll');
                if (indexNum) {
                    gsap.fromTo(indexNum, 
                        { y: '100%', opacity: 0, filter: 'grow(2px)' },
                        { y: '0%', opacity: 1, filter: 'blur(0px)', duration: 0.8, ease: "power4.out" }
                    );
                }

                // Find title and its highlight color
                const highlight = tu.querySelector('[class^="highlight-unit"]');
                const targetColor = highlight ? getComputedStyle(highlight).getPropertyValue('--unit-color').trim() : '#0066f9';
                const chars = tu.querySelectorAll('.unit-main-name .char');

                // GSAP Writing/Color Reveal
                gsap.killTweensOf(chars);
                gsap.fromTo(chars, 
                    { color: '#ccc', opacity: 0.2 },
                    { 
                        color: (i, target) => {
                            return target.closest('[class^="highlight-unit"]') ? targetColor : '#000';
                        },
                        opacity: 1,
                        duration: 0.3,
                        stagger: 0.02,
                        ease: "none"
                    }
                );
            }
        });
    };

    // Robust Non-destructive Character Wrapper
    const wrapChars = (container) => {
        const walker = document.createTreeWalker(container, NodeFilter.SHOW_TEXT, null, false);
        const nodes = [];
        let node;
        while(node = walker.nextNode()) nodes.push(node);

        nodes.forEach(textNode => {
            const chars = textNode.nodeValue.split('');
            const fragment = document.createDocumentFragment();
            chars.forEach(char => {
                const span = document.createElement('span');
                span.className = 'char';
                span.textContent = char;
                fragment.appendChild(span);
            });
            textNode.parentNode.replaceChild(fragment, textNode);
        });
    };

    // Initialize titles
    document.querySelectorAll('.unit-main-name').forEach(title => wrapChars(title));

    // Using GSAP ScrollTrigger
    triggers.forEach((trigger, i) => {
        ScrollTrigger.create({
            trigger: trigger,
            start: "top 95%", // Trigger as early as possible
            end: "bottom 95%",
            onEnter: () => updateUnit(i + 1),
            onEnterBack: () => updateUnit(i + 1),
        });
    });

    // Forced initial state for Unit 01
    updateUnit(1);
});
</script>
@endsection
