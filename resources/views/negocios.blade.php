@extends('layouts.app')

@section('content')
<main class="negocios-page">
    <div class="negocios-pin-wrapper">
        <div class="negocios-sticky-stage">
            <!-- Background Images Layer -->
            <div class="visual-layer">
                <div class="visual-notched-frame">
                    <img src="/assets/negocios-hero-1.jpg" class="stage-img active" data-unit="1">
                    <img src="/assets/negocios-hero-2.jpg" class="stage-img" data-unit="2">
                    <img src="/assets/negocios-hero-3.jpg" class="stage-img" data-unit="3">
                    <img src="/assets/negocios-hero-4.jpg" class="stage-img" data-unit="4">
                </div>
            </div>

            <!-- Content Layer -->
            <div class="content-layer">
                <div class="indi-container">
                    <div class="unit-info-grid">
                        <!-- All texts stacked, cross-faded by GSAP -->
                        <div class="text-swap-container" id="title-swap">
                            <div class="text-unit active" data-unit="1">
                                <span class="unit-index">01/04</span>
                                <h2 class="unit-main-name">INDI<br><span class="highlight-unit-1">CONSTRUCCIÓN</span></h2>
                            </div>
                            <div class="text-unit" data-unit="2">
                                <span class="unit-index">02/04</span>
                                <h2 class="unit-main-name">INDI<br><span class="highlight-unit-2">INFRAESTRUCTURA</span></h2>
                            </div>
                            <div class="text-unit" data-unit="3">
                                <span class="unit-index">03/04</span>
                                <h2 class="unit-main-name">INDI<br><span class="highlight-unit-3">MARITIMO</span></h2>
                            </div>
                            <div class="text-unit" data-unit="4">
                                <span class="unit-index">04/04</span>
                                <h2 class="unit-main-name">INDI<br><span class="highlight-unit-4">FERROVIARIA</span></h2>
                            </div>
                        </div>

                        <div class="text-swap-container" id="desc-swap">
                            <div class="text-unit active" data-unit="1">
                                <p>Nos especializamos en cimentación profunda y en la ejecución de obras de alta complejidad para la construcción, modernización, rehabilitación y conservación de vialidades, puentes, edificaciones, puertos, muelles y escolleras. Cada uno de estos proyectos está respaldado por nuestra capacidad técnica y nuestro enfoque en la calidad, garantizando soluciones duraderas y eficientes.</p>
                            </div>
                            <div class="text-unit" data-unit="2">
                                <p>Somos inversionistas, constructores y operadores de proyectos clave en México, tales como autopistas, estacionamientos y sistemas de transporte público, desarrollados bajo el modelo de Asociación Público-Privada (APP). Este enfoque nos permite impulsar proyectos que mejoran la infraestructura nacional, generando soluciones que fortalecen la conectividad y movilidad en el país.</p>
                            </div>
                            <div class="text-unit" data-unit="3">
                                <p>Grupo INDI ha sido un actor clave en el desarrollo de la infraestructura marítima y portuaria en México, contribuyendo de manera significativa al crecimiento del comercio y la conectividad en el país. A lo largo de su trayectoria, ha ejecutado proyectos de alta complejidad técnica en diversos puertos estratégicos, que han fortalecido la capacidad operativa del sistema portuario mexicano.</p>
                            </div>
                            <div class="text-unit" data-unit="4">
                                <p>Nos especializamos en cimentación profunda y en la ejecución de obras de alta complejidad para la construcción, modernización, rehabilitación y conservación de vialidades, puentes, edificaciones, puertos, muelles y escolleras. Cada uno de estos proyectos está respaldado por nuestra capacidad técnica y nuestro enfoque en la calidad, garantizando soluciones duraderas y eficientes.</p>
                            </div>
                        </div>

                        <div class="text-swap-container" id="detail-swap">
                            <div class="text-unit active" data-unit="1">
                                <p>Entre sus obras más destacadas se incluyen la construcción y modernización de muelles, escolleras, terminales portuarias, y obras de dragado, todas diseñadas para mejorar el flujo de mercancías y garantizar la seguridad y eficiencia en las operaciones marítimas. Estos proyectos no solo impulsan el desarrollo del comercio exterior, sino que también contribuyen a dinamizar las economías regionales.</p>
                            </div>
                            <div class="text-unit" data-unit="2">
                                <p>Nos especializamos en la ejecución de obras de prestación de servicios y concesiones, tanto a nivel estatal como federal, con un profundo conocimiento de las necesidades del sector público. Nuestro objetivo es ofrecer proyectos sostenibles y de alta calidad que contribuyan al desarrollo económico y social de México, garantizando eficiencia y estabilidad a largo plazo.</p>
                            </div>
                            <div class="text-unit" data-unit="3">
                                <p>Entre sus obras más destacadas se incluyen la construcción y modernización de muelles, escolleras, terminales portuarias, y obras de dragado, todas diseñadas para mejorar el flujo de mercancías y garantizar la seguridad y eficiencia en las operaciones marítimas. Estos proyectos no solo impulsan el desarrollo del comercio exterior, sino que también contribuyen a dinamizar las economías regionales y a mejorar la infraestructura de transporte del país. El compromiso de Grupo INDI con la calidad y la innovación ha permitido que sus proyectos marítimos y portuarios cumplan con los más altos estándares internacionales, posicionando a México como un hub logístico competitivo en el contexto global.</p>
                            </div>
                            <div class="text-unit" data-unit="4">
                                <p>Entre sus obras más destacadas se incluyen la construcción y modernización de muelles, escolleras, terminales portuarias, y obras de dragado, todas diseñadas para mejorar el flujo de mercancías y garantizar la seguridad y eficiencia en las operaciones marítimas. Estos proyectos no solo impulsan el desarrollo del comercio exterior, sino que también contribuyen a dinamizar las economías regionales.</p>
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

/* Visual Layer */
.visual-layer {
    width: 100%;
    height: 65vh;
    background: #fff;
    z-index: 2;
}

.visual-notched-frame {
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
    clip-path: polygon(
        0% 0%, 100% 0%, 100% 92%, 
        82% 92%, 80% 100%, 20% 100%, 18% 92%,
        0% 92%
    );
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

/* Content Layer */
.content-layer {
    flex-grow: 1;
    display: flex;
    align-items: center;
    padding-bottom: 5vh;
    z-index: 1;
}

.negocios-page .indi-container {
    max-width: 85%;
    width: 85%;
    margin: 0 auto;
}

.unit-info-grid {
    display: grid;
    grid-template-columns: 1.2fr 1fr 1fr;
    gap: 3rem;
    align-items: flex-start;
    padding: 3rem 0;
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
    font-size: clamp(1.5rem, 4vw, 2.5rem);
    font-weight: 700;
    color: #ccc;
    line-height: 1;
    margin-bottom: 1rem;
    display: block;
}

.unit-main-name {
    font-family: 'Syncopate', sans-serif;
    font-size: clamp(2rem, 6vw, 4rem);
    font-weight: 700;
    color: #000;
    line-height: 1;
    text-transform: uppercase;
}

.highlight-unit-1 { color: #ffa608; }
.highlight-unit-2 { color: #64b032; }
.highlight-unit-3 { color: #0066f9; }
.highlight-unit-4 { color: #ff3000; }


.text-unit p {
    font-family: 'Inter', sans-serif;
    font-size: 1.15rem;
    line-height: 1.7;
    color: #333;
    font-weight: 300;
}

/* Scroll Trigger Areas */
.scroll-trigger-sections {
    width: 100%;
}

.trigger {
    height: 60vh; /* Reduced from 100vh for faster switching */
}

@media (max-width: 1024px) {
    .unit-info-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    .visual-layer {
        height: 50vh;
    }
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

        // Update Text
        textUnits.forEach(tu => {
            tu.classList.toggle('active', tu.dataset.unit == unit);
        });
    };

    // Using GSAP ScrollTrigger for snappy switching
    triggers.forEach((trigger, i) => {
        ScrollTrigger.create({
            trigger: trigger,
            start: "top 80%", // Trigger earlier (80% from top)
            end: "bottom 80%",
            onEnter: () => updateUnit(i + 1),
            onEnterBack: () => updateUnit(i + 1),
        });
    });
});
</script>
@endsection
