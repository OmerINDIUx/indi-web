@extends('layouts.app')

@section('content')
<main class="negocios-page">
    <div class="negocios-pin-wrapper">
        <div class="negocios-sticky-stage">
            <!-- Background Images Layer -->
            <div class="visual-layer">
                <div class="visual-notched-frame">
                    <video src="/videos_indi/Construccion.mp4" loop muted playsinline class="stage-img active" data-unit="1"></video>
                    <video src="/videos_indi/Negocios/Indi_infraestructura.mp4" loop muted playsinline class="stage-img" data-unit="2"></video>
                    <video src="/videos_indi/maritimo.mp4" loop muted playsinline class="stage-img" data-unit="3"></video>
                    <video src="/videos_indi/Negocios/Indi_ferroviario.mp4" loop muted playsinline class="stage-img" data-unit="4"></video>
                    
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
                                <h2 class="unit-main-name">{{ \App\Support\CmsText::get('business.construction.title', 'INDI CONSTRUCCION') }}</h2>
                            </div>
                            <div class="text-unit" data-unit="2">
                                <span class="unit-index"><span class="num-roll">02</span>/04</span>
                                <h2 class="unit-main-name">{{ \App\Support\CmsText::get('business.infrastructure.title', 'INDI INFRAESTRUCTURA') }}</h2>
                            </div>
                            <div class="text-unit" data-unit="3">
                                <span class="unit-index"><span class="num-roll">03</span>/04</span>
                                <h2 class="unit-main-name">{{ \App\Support\CmsText::get('business.maritime.title', 'INDI MARITIMO') }}</h2>
                            </div>
                            <div class="text-unit" data-unit="4">
                                <span class="unit-index"><span class="num-roll">04</span>/04</span>
                                <h2 class="unit-main-name">{{ \App\Support\CmsText::get('business.railway.title', 'INDI FERROVIARIA') }}</h2>
                            </div>
                        </div>

                        <div class="text-swap-container" id="desc-swap">
                            <div class="text-unit" data-unit="1">
                                <p>{{ \App\Support\CmsText::get('business.construction.desc', 'Nos especializamos en cimentacion profunda y en la ejecucion de obras de alta complejidad.') }}</p>
                            </div>
                            <div class="text-unit" data-unit="2">
                                <p>{{ \App\Support\CmsText::get('business.infrastructure.desc', 'Somos inversionistas, constructores y operadores de proyectos clave en Mexico.') }}</p>
                            </div>
                            <div class="text-unit" data-unit="3">
                                <p>{{ \App\Support\CmsText::get('business.maritime.desc', 'INDI ha sido un actor clave en el desarrollo de la infraestructura maritima y portuaria en Mexico.') }}</p>
                            </div>
                            <div class="text-unit" data-unit="4">
                                <p>{{ \App\Support\CmsText::get('business.railway.desc', 'Ingenieria ferroviaria avanzada para sistemas de transporte de carga y pasajeros a gran escala.') }}</p>
                            </div>
                        </div>

                        <div class="text-swap-container" id="detail-swap">
                            <div class="text-unit" data-unit="1">
                                <p>{{ \App\Support\CmsText::get('business.construction.detail', 'Entre sus obras mas destacadas se incluyen la construccion y modernizacion de muelles, escolleras, terminales portuarias, y obras de dragado.') }}</p>
                            </div>
                            <div class="text-unit" data-unit="2">
                                <p>{{ \App\Support\CmsText::get('business.infrastructure.detail', 'Nos especializamos en la ejecucion de obras de prestacion de servicios y concesiones.') }}</p>
                            </div>
                            <div class="text-unit" data-unit="3">
                                <p>{{ \App\Support\CmsText::get('business.maritime.detail', 'A lo largo de su trayectoria, ha ejecutado proyectos de alta complejidad tecnica en diversos puertos estrategicos.') }}</p>
                            </div>
                            <div class="text-unit" data-unit="4">
                                <p>{{ \App\Support\CmsText::get('business.railway.detail', 'Nuestra capacidad tecnica nos permite participar en proyectos estrategicos de conectividad masiva y transporte de carga.') }}</p>
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
    --negocios-vh: 100vh;
}

.negocios-page {
    background: #fff;
    overflow: visible;
}

.negocios-pin-wrapper {
    position: relative;
    width: 100%;
    height: calc(var(--negocios-vh) * 5);
}

.negocios-sticky-stage {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: var(--negocios-vh);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    background: #fff;
    z-index: 5;
}

.negocios-pin-wrapper.is-fixed .negocios-sticky-stage {
    position: fixed !important;
    top: 0 !important;
    left: 0;
    right: 0;
}

.negocios-pin-wrapper.is-after .negocios-sticky-stage {
    position: absolute !important;
    top: auto !important;
    bottom: 0;
    left: 0;
    right: 0;
}

/* Visual Layer: Fixed 70% height */
.visual-layer {
    width: 100%;
    height: 66vh;
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
    height: 34vh;
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
    grid-template-columns: minmax(380px, 1.18fr) minmax(260px, 0.91fr) minmax(260px, 0.91fr) !important;
    gap: clamp(2rem, 4vw, 4rem);
    align-items: center; /* Vertical alignment for a balanced look */
    padding: 2rem 0;
}

.text-swap-container {
    position: relative;
    min-width: 0;
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
    font-family: 'usual', sans-serif;
    font-size: clamp(0.9rem, 2.5vw, 1.2rem);
    font-weight: 700;
    color: #ccc;
    line-height: 1;
    margin-bottom: 1.5rem;
    display: inline-flex;
    align-items: center;
    position: relative;
    overflow: hidden; /* Mask for rolling animation */
    height: auto;
    padding: 0.5rem 1.2rem;
    border: 1px solid rgba(200, 200, 200, 0.3);
    background: rgba(200, 200, 200, 0.05);
    clip-path: polygon(0 0, calc(100% - 6px) 0, 100% 6px, 100% 100%, 0 100%);
    transition: all 0.6s ease;
    letter-spacing: 0.1em;
}

/* Category-specific unit index accents */
.text-unit[data-unit="1"] .unit-index {
    color: #ffa608;
    border-color: rgba(254, 166, 8, 0.3);
    background: rgba(254, 166, 8, 0.05);
}
.text-unit[data-unit="2"] .unit-index {
    color: #64b032;
    border-color: rgba(100, 176, 50, 0.3);
    background: rgba(100, 176, 50, 0.05);
}
.text-unit[data-unit="3"] .unit-index {
    color: #0066f9;
    border-color: rgba(0, 102, 249, 0.3);
    background: rgba(0, 102, 249, 0.05);
}
.text-unit[data-unit="4"] .unit-index {
    color: #ff3000;
    border-color: rgba(255, 48, 0, 0.3);
    background: rgba(255, 48, 0, 0.05);
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
    font-family: 'usual', sans-serif;
    font-size: clamp(2rem, 3.45vw, 3.35rem);
    font-weight: 700;
    color: #000;
    line-height: 1;
    text-transform: uppercase;
    overflow-wrap: normal;
    word-break: normal;
    hyphens: none;
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

.unit-word {
    display: inline-block;
    white-space: nowrap;
}


.text-unit p {
    font-family: 'usual', sans-serif;
    font-size: clamp(0.95rem, 1.2vw, 1.1rem);
    line-height: 1.7;
    color: #333;
    font-weight: 300;
}

/* Scroll Trigger Areas: one full viewport per business unit while the stage remains pinned */
.scroll-trigger-sections {
    display: none;
}

.trigger {
    height: 0;
}

/* Tablets (1080px) */
@media (max-width: 1080px) {
    .negocios-page .negocios-sticky-stage {
        height: var(--negocios-vh) !important;
        min-height: var(--negocios-vh);
        overflow: hidden !important;
    }

    .unit-info-grid { 
        grid-template-columns: minmax(0, 1fr) !important;
        grid-template-areas:
            "title"
            "desc"
            "detail";
        gap: 1.25rem; 
        padding: 1.5rem 0;
        align-items: start;
    }
    .negocios-page .visual-layer {
        height: clamp(300px, 44svh, 480px) !important;
        min-height: 300px;
        flex: 0 0 auto;
    }
    .negocios-page .content-layer { 
        height: auto !important;
        flex: 1 1 auto;
        min-height: 0 !important;
        align-items: flex-start;
        padding: 2.5rem 0 4rem !important;
        overflow: hidden !important;
    }
    .negocios-page .indi-container {
        width: min(86%, 860px);
        max-width: min(86%, 860px);
    }
    #title-swap {
        grid-area: title;
    }
    #desc-swap {
        grid-area: desc;
    }
    #detail-swap {
        grid-area: detail;
    }
    .negocios-page .unit-main-name {
        font-size: clamp(2rem, 4.2vw, 2.8rem) !important;
        line-height: 0.98;
    }
    .text-unit p {
        font-size: clamp(0.9rem, 1.5vw, 1.05rem);
        line-height: 1.6;
    }

    .scroll-trigger-sections {
        display: none;
    }

    .trigger {
        height: 0;
    }
}

/* Tablet vertical / 900px: preserve the original stage, only arrange text better */
@media (min-width: 721px) and (max-width: 900px) {
    .negocios-page .content-layer {
        flex: 1 1 auto;
        align-items: flex-start;
        padding: clamp(2rem, 4vw, 3rem) 0 3.5rem !important;
        overflow: hidden !important;
    }

    .negocios-page .indi-container {
        width: min(86%, 860px);
        max-width: min(86%, 860px);
    }

    .negocios-page .unit-info-grid {
        display: grid;
        grid-template-columns: minmax(0, 0.92fr) minmax(0, 1.08fr) !important;
        grid-template-areas:
            "title title"
            "desc detail";
        column-gap: clamp(1.4rem, 3vw, 2.4rem);
        row-gap: 1.1rem;
        align-items: start;
        padding: 0;
    }

    .negocios-page .unit-index {
        margin-bottom: 1rem;
    }

    .negocios-page .unit-main-name {
        font-size: clamp(2rem, 4.1vw, 2.7rem) !important;
        line-height: 1;
        max-width: 760px;
    }

    .negocios-page .text-unit p {
        font-size: clamp(0.86rem, 1.35vw, 0.98rem);
        line-height: 1.55;
        max-width: 100%;
    }
}

/* Teléfonos Grandes (720px) */
@media (max-width: 720px) {
    .negocios-page .negocios-sticky-stage {
        height: var(--negocios-vh) !important;
        min-height: var(--negocios-vh);
    }

    .negocios-page .visual-layer {
        height: clamp(245px, 40svh, 340px) !important;
        min-height: 260px;
    }
    .negocios-page .content-layer { 
        height: auto !important;
        flex: 1 1 auto;
        min-height: 0 !important;
        padding: 1.65rem 0 2rem !important;
        overflow: hidden !important;
    }
    .negocios-page .unit-main-name {
        font-size: clamp(1.65rem, 6.9vw, 2.15rem) !important;
        line-height: 1;
        overflow-wrap: normal;
        word-break: normal;
    }
    .negocios-page .unit-info-grid {
        grid-template-columns: minmax(0, 1fr) !important;
        grid-template-areas:
            "title"
            "desc"
            "detail";
        gap: 1rem;
        padding: 0;
    }

    .negocios-page .text-swap-container {
        min-height: auto;
        width: 100%;
    }

    .negocios-page .text-unit.active {
        position: relative;
    }

    .negocios-page .text-unit p {
        font-size: clamp(0.92rem, 4.2vw, 1rem);
        line-height: 1.55;
    }
}

/* Teléfonos Pequeños (500px) */
@media (max-width: 500px) {
    .negocios-page .visual-layer {
        height: clamp(140px, 24svh, 210px) !important;
        min-height: 140px;
    }
    .negocios-page .content-layer { 
        height: auto !important;
        flex: 1 1 auto;
        min-height: 0 !important;
        padding: 0.8rem 0 1.1rem !important;
        overflow: hidden !important;
    }
    .negocios-page .negocios-notch-divider {
        height: 44px;
    }
    .negocios-page .visual-notched-frame {
        border-bottom-left-radius: 24px;
        border-bottom-right-radius: 24px;
    }
    .negocios-page .unit-index {
        margin-bottom: 0.65rem;
        font-size: 0.9rem;
        padding: 0.42rem 0.9rem;
    }
    .negocios-page .unit-main-name {
        font-size: clamp(1.55rem, 7.6vw, 1.95rem) !important;
        line-height: 1.04;
    }

    .negocios-page .unit-info-grid {
        gap: 0.48rem;
    }

    .negocios-page .text-unit p {
        font-size: clamp(0.9rem, 3.9vw, 1rem);
        line-height: 1.42;
    }

    #detail-swap {
        display: block !important;
    }

}

@media (max-width: 420px) {
    .negocios-page .unit-index {
        font-size: 0.86rem;
    }

    .negocios-page .unit-main-name {
        font-size: clamp(1.5rem, 8.2vw, 1.8rem) !important;
    }

    .negocios-page .text-unit p {
        font-size: clamp(0.88rem, 4.1vw, 0.96rem);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    document.documentElement.classList.add('negocios-js-ready');

    const images = document.querySelectorAll('.stage-img');
    const textUnits = document.querySelectorAll('.text-unit');

    const getViewportHeight = () => {
        return Math.round(window.visualViewport?.height || window.innerHeight);
    };

    const setResponsiveViewportHeight = () => {
        document.documentElement.style.setProperty('--negocios-vh', `${getViewportHeight()}px`);
    };

    setResponsiveViewportHeight();

    images.forEach(video => {
        video.muted = true;
        video.playsInline = true;
        video.play().catch(() => {});
    });

    const updateUnit = (unit) => {
        document.documentElement.setAttribute('data-negocios-unit', unit);

        // Update Images (Videos)
        images.forEach(img => {
            const isActive = img.dataset.unit == unit;
            img.classList.toggle('active', isActive);
            
            if (isActive && img.paused) {
                img.play().catch(() => {});
            }
        });

        // Update Text Blocks
        textUnits.forEach(tu => {
            const isActive = tu.dataset.unit == unit;
            if (tu.classList.contains('active') && isActive) return; // Already active

            tu.classList.toggle('active', isActive);
            
            if (isActive) {
                const gsapApi = window.gsap;

                // Trigger Rolling Number Animation
                const indexNum = tu.querySelector('.num-roll');
                if (indexNum && gsapApi) {
                    gsapApi.fromTo(indexNum, 
                        { y: '100%', opacity: 0, filter: 'grow(2px)' },
                        { y: '0%', opacity: 1, filter: 'blur(0px)', duration: 0.8, ease: "power4.out" }
                    );
                }

                // Find title and its highlight color
                const highlight = tu.querySelector('[class^="highlight-unit"]');
                const targetColor = highlight ? getComputedStyle(highlight).getPropertyValue('--unit-color').trim() : '#0066f9';
                const chars = tu.querySelectorAll('.unit-main-name .char');

                // GSAP Writing/Color Reveal
                if (chars.length === 0) {
                    return;
                }

                if (gsapApi) {
                    gsapApi.killTweensOf(chars);
                    gsapApi.fromTo(chars, 
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
                } else {
                    chars.forEach(char => {
                        char.style.color = char.closest('[class^="highlight-unit"]') ? targetColor : '#000';
                        char.style.opacity = '1';
                    });
                }
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
            const fragment = document.createDocumentFragment();

            textNode.nodeValue.split(/(\s+)/).forEach(part => {
                if (!part) return;

                if (/^\s+$/.test(part)) {
                    fragment.appendChild(document.createTextNode(part));
                    return;
                }

                const word = document.createElement('span');
                word.className = 'unit-word';

                part.split('').forEach(char => {
                    const span = document.createElement('span');
                    span.className = 'char';
                    span.textContent = char;
                    word.appendChild(span);
                });

                fragment.appendChild(word);
            });

            textNode.parentNode.replaceChild(fragment, textNode);
        });
    };

    // Initialize titles
    document.querySelectorAll('.unit-main-name').forEach(title => wrapChars(title));

    // Forced initial state for Unit 01
    updateUnit(1);

    const pinWrapper = document.querySelector('.negocios-pin-wrapper');
    let activeUnit = 1;
    let ticking = false;

    const syncUnitFromScroll = () => {
        if (!pinWrapper) return;

        const pageTop = window.scrollY || window.pageYOffset;
        const wrapperTop = pinWrapper.getBoundingClientRect().top + pageTop;
        const viewportHeight = getViewportHeight();
        const wrapperHeight = pinWrapper.offsetHeight;
        const scrollableDistance = Math.max(1, wrapperHeight - viewportHeight);
        const localScroll = pageTop - wrapperTop;
        const progress = Math.min(1, Math.max(0, localScroll / scrollableDistance));
        const nextUnit = Math.min(4, Math.max(1, Math.floor(progress * 4) + 1));

        pinWrapper.classList.toggle('is-fixed', localScroll >= 0 && localScroll < scrollableDistance);
        pinWrapper.classList.toggle('is-after', localScroll >= scrollableDistance);

        if (nextUnit !== activeUnit) {
            activeUnit = nextUnit;
            updateUnit(activeUnit);
        }
    };

    const requestSync = () => {
        if (ticking) return;

        ticking = true;
        window.requestAnimationFrame(() => {
            syncUnitFromScroll();
            ticking = false;
        });
    };

    window.addEventListener('scroll', requestSync, { passive: true });
    window.addEventListener('resize', () => {
        setResponsiveViewportHeight();
        requestSync();
    });
    window.addEventListener('orientationchange', () => {
        setTimeout(() => {
            setResponsiveViewportHeight();
            requestSync();
        }, 300);
    });

    requestSync();
});
</script>
@endsection
