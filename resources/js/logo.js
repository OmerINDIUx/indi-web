import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

/*
 * Configuracion matematica del estado reducido por scroll.
 * El ancho objetivo crece con el viewport, pero clamp evita que el logo quede
 * demasiado pequeno en movil o demasiado grande en escritorio.
 */
const scrollLogoConfig = Object.freeze({
    targetWidthRatio: 0.045,
    minTargetWidth: 48,
    maxTargetWidth: 64,
    /* 0.75 significa que la reduccion nunca supera el 25%. */
    minScale: 0.75,
    maxScale: 0.85,
    shiftRatio: 0.85,
    minViewportGutter: 4,
    maxViewportGutter: 10,
    viewportGutterRatio: 0.005,
    verticalLiftRatio: 0.1,
    minVerticalLift: 6,
    maxVerticalLift: 14,
});

/* Limita cualquier valor al intervalo indicado. */
const clamp = (value, min, max) => Math.min(Math.max(value, min), max);

/*
 * Animacion y comportamiento del logo/menu principal.
 * Los estilos y breakpoints visuales viven en resources/css/logo-menu.css.
 */
document.addEventListener("DOMContentLoaded", () => {
    /* Elementos principales y estado interno del componente. */
    const logoMenu = document.getElementById("logoMenu");
    const menuLinks = document.getElementById("menuLinks");
    let isMenuOpen = false;
    let isCollided = false;

    if (logoMenu && menuLinks) {
        let autoCollapseTimer;
        let resizeFrame;
        const logoCanvas = logoMenu.querySelector(".logo-svg-wrapper");
        const logoFillTargets = logoMenu.querySelectorAll(".logo-svg-wrapper .cls-1, .logo-svg-wrapper .st1");
        const hasMechanicalLogo = Boolean(document.querySelector(".logo-part") && document.querySelector(".part-bottom"));

        const animateLogoFill = (fill) => {
            if (!logoFillTargets.length) return;

            gsap.to(logoFillTargets, { fill, duration: 0.3 });
        };

        /* Estado inicial para la variante mecanica, cuando existe en la vista. */
        if (hasMechanicalLogo) {
            gsap.set(".logo-part", { width: 100, height: 70 });
            gsap.set(".part-bottom", { marginLeft: -100, y: 80 });
            gsap.set(".part-bottom .logo-svg-wrapper", { y: -70 });
        }

        /*
         * Calcula el estado reducido usando las dimensiones que CSS resolvio
         * para el breakpoint actual.
         *
         * escala = ancho objetivo / ancho real
         * desplazamiento X = reduccion del ancho * proporcion de movimiento
         * desplazamiento Y = compensacion de escala + elevacion proporcional
         *
         * El desplazamiento se limita al espacio disponible entre el wrapper
         * y un margen seguro del viewport. Por eso nunca puede sacar el logo
         * por el borde izquierdo, incluso despues de un resize.
         */
        const getResponsiveCollisionTransform = () => {
            const viewportWidth = document.documentElement.clientWidth;
            const logoWidth = logoCanvas?.offsetWidth || 100;
            const logoHeight = logoCanvas?.offsetHeight || 140;
            const targetWidth = clamp(
                viewportWidth * scrollLogoConfig.targetWidthRatio,
                scrollLogoConfig.minTargetWidth,
                scrollLogoConfig.maxTargetWidth,
            );
            const scale = clamp(
                targetWidth / logoWidth,
                scrollLogoConfig.minScale,
                scrollLogoConfig.maxScale,
            );
            const safeGutter = clamp(
                viewportWidth * scrollLogoConfig.viewportGutterRatio,
                scrollLogoConfig.minViewportGutter,
                scrollLogoConfig.maxViewportGutter,
            );
            const desiredShift = logoWidth * (1 - scale) * scrollLogoConfig.shiftRatio;
            const availableShift = Math.max(0, logoMenu.offsetLeft - safeGutter);

            /*
             * Al escalar desde "left center", el borde superior baja la mitad
             * de la altura perdida. Esta compensacion neutraliza ese descenso.
             */
            const scaleTopCompensation = logoHeight * (1 - scale) * 0.5;
            const verticalLift = clamp(
                logoHeight * scrollLogoConfig.verticalLiftRatio,
                scrollLogoConfig.minVerticalLift,
                scrollLogoConfig.maxVerticalLift,
            );

            return {
                scale,
                x: -Math.min(desiredShift, availableShift),
                y: -(scaleTopCompensation + verticalLift),
            };
        };

        /* Aplica o revierte el estado reducido sin interferir con el menu abierto. */
        const updateLogoVisuals = (collisionRequested, duration = 0.4) => {
            isCollided = collisionRequested;

            if (isMenuOpen) return;

            const collisionTransform = collisionRequested
                ? getResponsiveCollisionTransform()
                : { scale: 1, x: 0, y: 0 };

            gsap.to(logoMenu, {
                opacity: collisionRequested ? 0.5 : 1,
                scale: collisionTransform.scale,
                x: collisionTransform.x,
                y: collisionTransform.y,
                transformOrigin: "left center",
                duration,
                overwrite: true,
                ease: "power2.out",
            });
        };

        /* Abre o cierra el menu y coordina las clases CSS con GSAP. */
        const toggleMenu = (forceState = null) => {
            if (forceState !== null) {
                if (isMenuOpen === forceState) return;
                isMenuOpen = forceState;
            } else {
                isMenuOpen = !isMenuOpen;
            }

            clearTimeout(autoCollapseTimer);
            window.dispatchEvent(new Event("scroll"));

            if (isMenuOpen) {
                /* Una nueva apertura vuelve a habilitar inmediatamente el hover. */
                logoMenu.classList.remove("logo-hover-locked");
                menuLinks.classList.add("active");
                logoMenu.classList.add("active");
                
                /* El menu siempre se abre con el logo en su escala normal. */
                gsap.to(logoMenu, { opacity: 1, scale: 1, x: 0, y: 0, duration: 0.4, overwrite: true });
                animateLogoFill("#0066FF");

                const tl = gsap.timeline();
                if (hasMechanicalLogo) {
                    tl.to(".logo-part", { width: 140, height: 100, duration: 0.8, ease: "expo.out" }, 0);
                    tl.to(".part-bottom .logo-svg-wrapper", { y: -100, duration: 0.8, ease: "expo.out" }, 0);
                    tl.to(".part-bottom", { marginLeft: 10, y: 0, duration: 0.9, ease: "elastic.out(1, 0.75)" }, 0.1);
                }

                /* Entrada escalonada de los enlaces y posicion inicial de la muesca. */
                tl.fromTo(".nav-link-item",
                    { opacity: 0, y: 30, rotateX: -45, filter: "blur(10px)" },
                    {
                        opacity: 1, y: 0, rotateX: 0, filter: "blur(0px)",
                        stagger: 0.05, ease: "expo.out", duration: 0.6,
                        onComplete: () => {
                            const activeLink = document.querySelector(".nav-link-item.active-page") || document.querySelector(".nav-link-item");
                            if (activeLink) updateNotch(activeLink);
                        }
                    }, 0.2
                );
            } else {
                /*
                 * El cursor puede seguir dentro despues del clic. Bloqueamos
                 * temporalmente :hover para permitir que IN y DI se replieguen.
                 */
                logoMenu.classList.add("logo-hover-locked");
                const tl = gsap.timeline({
                    onComplete: () => {
                        menuLinks.classList.remove("active");
                        logoMenu.classList.remove("active");
                        animateLogoFill("#ffffff");
                        /* Recupera la reduccion si el usuario sigue debajo del umbral. */
                        if (isCollided) updateLogoVisuals(true);
                    }
                });

                tl.to(".nav-link-item", { opacity: 0, y: -20, filter: "blur(5px)", duration: 0.3, ease: "power2.in" }, 0);
                if (hasMechanicalLogo) {
                    tl.to(".part-bottom", { marginLeft: -100, y: 80, duration: 0.6, ease: "power2.inOut" }, 0.1);
                    tl.to(".logo-part", { width: 100, height: 70, duration: 0.6, ease: "power2.inOut" }, 0.1);
                    tl.to(".part-bottom .logo-svg-wrapper", { y: -70, duration: 0.6, ease: "power2.inOut" }, 0.1);
                }
            }
        };

        /* Hover: CSS controla los tamanos responsive; GSAP anima color y estado. */
        logoMenu.addEventListener("mouseenter", () => {
            /* Una entrada nueva siempre comienza con hover habilitado. */
            logoMenu.classList.remove("logo-hover-locked");
            if (!isMenuOpen) {
                toggleMenu(true);
                gsap.to(logoMenu, { opacity: 1, scale: 1, x: 0, y: 0, duration: 0.3, overwrite: true });
                if (hasMechanicalLogo) {
                    gsap.to(".logo-part", { width: 140, height: 100, duration: 0.5, ease: "power2.out" });
                    gsap.to(".part-bottom .logo-svg-wrapper", { y: -100, duration: 0.5, ease: "power2.out" });
                    gsap.to(".part-bottom", { marginLeft: 10, y: 0, duration: 0.6, ease: "elastic.out(1, 0.8)" });
                }
                animateLogoFill("#0066FF");
            }
        });

        logoMenu.addEventListener("mouseleave", () => {
            /* Al salir del componente, el siguiente hover vuelve a ser valido. */
            logoMenu.classList.remove("logo-hover-locked");
            if (!isMenuOpen) {
                if (isCollided) updateLogoVisuals(true, 0.5);
                if (hasMechanicalLogo) {
                    gsap.to(".logo-part", { width: 100, height: 70, duration: 0.4, ease: "power2.inOut" });
                    gsap.to(".part-bottom .logo-svg-wrapper", { y: -70, duration: 0.4, ease: "power2.inOut" });
                    gsap.to(".part-bottom", { marginLeft: -100, y: 80, duration: 0.5, ease: "power2.inOut" });
                }
                animateLogoFill("#ffffff");
            } else {
                toggleMenu(false);
            }
        });

        /* Mueve la muesca al centro del enlace activo o bajo el cursor. */
        const navLinks = document.querySelectorAll(".nav-link-item");
        function updateNotch(element) {
            if (!element || !menuLinks.classList.contains("active")) return;
            const linkRect = element.getBoundingClientRect();
            const containerRect = menuLinks.getBoundingClientRect();
            const x = linkRect.left - containerRect.left + linkRect.width / 2;
            const xPercent = (x / containerRect.width) * 100;
            gsap.to(menuLinks, { "--notch-x": `${xPercent}%`, duration: 0.8, ease: "elastic.out(1, 0.75)" });
            gsap.to(navLinks, { scale: 1, opacity: 0.7, duration: 0.3 });
            gsap.to(element, { scale: 1.1, opacity: 1, duration: 0.3 });
        }
        navLinks.forEach((link) => { link.addEventListener("mouseenter", () => updateNotch(link)); });
        menuLinks.addEventListener("mouseleave", () => {
            const activeLink = document.querySelector(".nav-link-item.active-page") || document.querySelector(".nav-link-item");
            if (activeLink) updateNotch(activeLink);
        });

        /* Inicializacion comun para todas las paginas. */
        gsap.set(logoMenu, { opacity: 1, scale: 1, x: 0, y: 0 });

        /* En desktop el estado inicial permanece cerrado hasta el hover. */

        /* Umbrales de scroll: inicio reduce antes que las paginas interiores. */
        const isHomePage = window.location.pathname === "/" || window.location.pathname === "" || window.location.pathname.includes("/index");

        ScrollTrigger.create({
            trigger: "body",
            start: "top top",
            onUpdate: (self) => {
                const currentScrollY = self.scroll();
                
                /* Cierra automaticamente el menu al abandonar la parte superior. */
                if (currentScrollY > 100 && isMenuOpen) {
                    toggleMenu(false);
                }

                const collisionThreshold = isHomePage ? 160 : 350;

                if (currentScrollY > collisionThreshold && !isCollided) {
                    updateLogoVisuals(true);
                } else if (currentScrollY < (collisionThreshold - 50) && isCollided) {
                    updateLogoVisuals(false);
                }
            }
        });

        /*
         * Recalcula la transformacion cuando cambia el viewport. requestAnimationFrame
         * agrupa multiples eventos de resize en una sola actualizacion visual.
         */
        window.addEventListener("resize", () => {
            window.cancelAnimationFrame(resizeFrame);
            resizeFrame = window.requestAnimationFrame(() => {
                if (isCollided && !isMenuOpen) {
                    updateLogoVisuals(true, 0.2);
                }
                ScrollTrigger.refresh();
            });
        });
    }
});
