import "./bootstrap";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

document.addEventListener("DOMContentLoaded", () => {
    // 1. Interactive Logo Menu Toggle
    const logoMenu = document.getElementById("logoMenu");
    const menuLinks = document.getElementById("menuLinks");
    let isMenuOpen = false;
    let isCollided = false; // Tracks the "tiny-shifted" state (miniature collision look)

    if (logoMenu) {
        let autoCollapseTimer;

        // Initialize Mechanical Baseline (Stacked small version)
        gsap.set(".logo-part", { width: 100, height: 70 });
        gsap.set(".part-bottom", { marginLeft: -100, y: 80 });
        gsap.set(".logo-svg-wrapper", { width: 100, height: 140 });
        gsap.set(".part-bottom .logo-svg-wrapper", { y: -70 });

        // Unified state applier to prevent "trabado" (collisions) between animations
        const updateLogoVisuals = (collisionRequested, duration = 0.4) => {
            isCollided = collisionRequested;
            
            // If menu is open, we don't apply the tiny collision shift visually, 
            // but we store the state for when it closes.
            if (isMenuOpen) return;

            gsap.to(logoMenu, {
                opacity: collisionRequested ? 0.5 : 1,
                scale: collisionRequested ? 0.6 : 1,
                x: collisionRequested ? -70 : 0,
                transformOrigin: "left center",
                duration: duration,
                overwrite: true,
                ease: "power2.out"
            });
        };

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
                menuLinks.classList.add("active");
                logoMenu.classList.add("active");
                
                // Force return to normal scale/pos when menu is active
                gsap.to(logoMenu, { opacity: 1, scale: 1, x: 0, duration: 0.4, overwrite: true });

                const tl = gsap.timeline();
                tl.to(".logo-part", { width: 140, height: 100, duration: 0.8, ease: "expo.out" }, 0);
                tl.to(".logo-svg-wrapper", { width: 140, height: 200, duration: 0.8, ease: "expo.out" }, 0);
                tl.to(".part-bottom .logo-svg-wrapper", { y: -100, duration: 0.8, ease: "expo.out" }, 0);
                tl.to(".part-bottom", { marginLeft: 10, y: 0, duration: 0.9, ease: "elastic.out(1, 0.75)" }, 0.1);
                
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
                const tl = gsap.timeline({
                    onComplete: () => {
                        menuLinks.classList.remove("active");
                        logoMenu.classList.remove("active");
                        // If we should be collided (tiny), apply it now that menu is closed
                        if (isCollided) updateLogoVisuals(true);
                    }
                });

                tl.to(".nav-link-item", { opacity: 0, y: -20, filter: "blur(5px)", duration: 0.3, ease: "power2.in" }, 0);
                tl.to(".part-bottom", { marginLeft: -100, y: 80, duration: 0.6, ease: "power2.inOut" }, 0.1);
                tl.to(".logo-part", { width: 100, height: 70, duration: 0.6, ease: "power2.inOut" }, 0.1);
                tl.to(".logo-svg-wrapper", { width: 100, height: 140, duration: 0.6, ease: "power2.inOut" }, 0.1);
                tl.to(".part-bottom .logo-svg-wrapper", { y: -70, duration: 0.6, ease: "power2.inOut" }, 0.1);
            }
        };

        logoMenu.addEventListener("click", (e) => {
            if (!e.target.closest(".nav-link-item")) toggleMenu();
        });

        // Hover Handlers
        logoMenu.addEventListener("mouseenter", () => {
            if (!isMenuOpen) {
                gsap.to(logoMenu, { opacity: 1, scale: 1, x: 0, duration: 0.3, overwrite: true });
                gsap.to(".logo-part", { width: 140, height: 100, duration: 0.5, ease: "power2.out" });
                gsap.to(".logo-svg-wrapper", { width: 140, height: 200, duration: 0.5, ease: "power2.out" });
                gsap.to(".part-bottom .logo-svg-wrapper", { y: -100, duration: 0.5, ease: "power2.out" });
                gsap.to(".part-bottom", { marginLeft: 10, y: 0, duration: 0.6, ease: "elastic.out(1, 0.8)" });
                gsap.to(".logo-svg-wrapper .cls-1", { fill: "#0066FF", duration: 0.3 });
            }
        });

        logoMenu.addEventListener("mouseleave", () => {
            if (!isMenuOpen) {
                if (isCollided) updateLogoVisuals(true, 0.5);
                gsap.to(".logo-part", { width: 100, height: 70, duration: 0.4, ease: "power2.inOut" });
                gsap.to(".logo-svg-wrapper", { width: 100, height: 140, duration: 0.4, ease: "power2.inOut" });
                gsap.to(".part-bottom .logo-svg-wrapper", { y: -70, duration: 0.4, ease: "power2.inOut" });
                gsap.to(".part-bottom", { marginLeft: -100, y: 80, duration: 0.5, ease: "power2.inOut" });
                gsap.to(".logo-svg-wrapper .cls-1", { fill: "#ffffff", duration: 0.3 });
            }
        });

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

        // --- UNIVERSAL INITIALIZATION (ALL PAGES) ---
        // 1. Force start Large
        gsap.set(logoMenu, { opacity: 1, scale: 1, x: 0 });
        
        // 2. Initial Expansion for 3 seconds on EVERY page entry
        if (window.scrollY < 100) {
            toggleMenu(true);
            setTimeout(() => {
                // Collapse only if still near the top and menu was auto-opened
                if (window.scrollY < 150) {
                    toggleMenu(false);
                }
            }, 3000);
        }

        // --- UNIVERSAL SCROLL TRIGGER ---
        const isHomePage = window.location.pathname === "/" || window.location.pathname === "" || window.location.pathname.includes("/index");
        
        ScrollTrigger.create({
            trigger: "body",
            start: "top top",
            onUpdate: (self) => {
                const currentScrollY = self.scroll();
                
                // On scroll down, auto-close menu if open
                if (currentScrollY > 100 && isMenuOpen) {
                    toggleMenu(false);
                }

                // A. COLLISION STATE (Tiny/Miniature look)
                // Threshold is higher (250px) to prevent premature shrinking on pages like /negocios
                const collisionThreshold = isHomePage ? 160 : 350; 
                
                if (currentScrollY > collisionThreshold && !isCollided) {
                    updateLogoVisuals(true);
                } 
                else if (currentScrollY < (collisionThreshold - 50) && isCollided) {
                    updateLogoVisuals(false);
                }
            }
        });
    }

    // 3. Hero Entry Animation (No changes)
    const heroAutoText = document.querySelector(".hero-typer-text");
    if (heroAutoText) {
        const splitText = (el) => {
            const html = el.innerHTML;
            const lines = html.split(/<br\s*\/?>/i);
            el.innerHTML = "";
            lines.forEach((line) => {
                const lineWrapper = document.createElement("div");
                lineWrapper.classList.add("hero-line");
                lineWrapper.style.overflow = "hidden";
                const words = line.trim().split(/\s+/);
                words.forEach((word, wordIdx) => {
                    const wordSpan = document.createElement("span");
                    wordSpan.classList.add("hero-word");
                    wordSpan.style.display = "inline-block";
                    word.split("").forEach((char) => {
                        const charSpan = document.createElement("span");
                        charSpan.innerText = char;
                        charSpan.classList.add("hero-char");
                        charSpan.style.display = "inline-block";
                        wordSpan.appendChild(charSpan);
                    });
                    lineWrapper.appendChild(wordSpan);
                    if (wordIdx < words.length - 1) {
                        const space = document.createElement("span");
                        space.innerHTML = "&nbsp;";
                        space.style.display = "inline-block";
                        lineWrapper.appendChild(space);
                    }
                });
                el.appendChild(lineWrapper);
            });
        };
        splitText(heroAutoText);
        const chars = heroAutoText.querySelectorAll(".hero-char");
        const words = heroAutoText.querySelectorAll(".hero-word");
        const tl = gsap.timeline({ delay: 0.8 });
        tl.from(chars, { opacity: 0, y: 30, rotateX: -90, scale: 1.3, filter: "blur(10px)", stagger: 0.03, duration: 1.5, ease: "expo.out" })
          .to(words, { textShadow: "0 0 15px rgba(0, 102, 255, 0.6)", color: "#fff", duration: 0.4, stagger: 0.1, repeat: 1, yoyo: true, ease: "sine.inOut" }, "-=0.8");
    }

    // 4. Notched Frame Reveals (No changes)
    gsap.utils.toArray(".notched-frame").forEach((frame) => {
        gsap.from(frame, { scrollTrigger: { trigger: frame, start: "top 85%" }, clipPath: "polygon(0 0, 0 0, 0 0, 0 0, 0 0, 0 0)", duration: 2, ease: "expo.inOut" });
        const img = frame.querySelector("img");
        if (img) gsap.to(img, { scrollTrigger: { trigger: frame, scrub: true, start: "top bottom", end: "bottom top" }, y: 50, ease: "none" });
    });

    // 5. Units Reveal (No changes)
    gsap.utils.toArray(".unit-row").forEach((row) => {
        const title = row.querySelector(".unit-title");
        const num = row.querySelector(".unit-number");
        const img = row.querySelector(".unit-image");
        const tl = gsap.timeline({ scrollTrigger: { trigger: row, start: "top 75%" } });
        if (num) tl.from(num, { x: -50, opacity: 0, duration: 1 });
        if (title) tl.from(title, { y: 100, opacity: 0, duration: 1.2, ease: "expo.out" }, "-=0.8");
        if (img) tl.from(img, { clipPath: "polygon(100% 0, 100% 0, 100% 0, 100% 0, 100% 0, 100% 0)", duration: 1.5, ease: "power4.out" }, "-=1");
    });

    // 6. Stats Counter (No changes)
    gsap.utils.toArray(".stat-num").forEach((stat) => {
        const targetText = stat.innerText;
        const finalValue = parseInt(targetText.replace(/\D/g, ""));
        const hasPlus = targetText.includes("+");
        const counter = { val: 0 };
        const anim = gsap.to(counter, { val: finalValue, duration: 2, ease: "expo.out", paused: true, onUpdate: () => { stat.innerText = (hasPlus ? "+" : "") + Math.floor(counter.val).toLocaleString(); } });
        ScrollTrigger.create({ trigger: stat, start: "top 90%", onEnter: () => { counter.val = 0; anim.restart(); }, onEnterBack: () => { counter.val = 0; anim.restart(); } });
    });

    // 7. Global Text Color Animation (No changes)
    function splitTextIntoChars(selector) {
        document.querySelectorAll(selector).forEach((el) => {
            const text = el.innerText;
            el.innerHTML = "";
            text.split("").forEach((char) => {
                const span = document.createElement("span");
                span.innerText = char === " " ? "\u00A0" : char;
                span.classList.add("char");
                el.appendChild(span);
            });
        });
    }
    splitTextIntoChars(".indi-scroll-text:not(.hero-typer-text)");
    gsap.utils.toArray(".indi-scroll-text").forEach((textBlock) => {
        const chars = textBlock.querySelectorAll(".char");
        const initialColor = getComputedStyle(textBlock).getPropertyValue("--indi-scroll-initial").trim() || "#ccc";
        const accentColor = getComputedStyle(textBlock).getPropertyValue("--indi-unit-color").trim() || "#0066FF";
        gsap.to(chars, {
            scrollTrigger: { trigger: textBlock, start: "top 90%", end: "bottom 20%", scrub: 1 },
            keyframes: { "0%": { color: initialColor }, "50%": { color: accentColor }, "100%": { color: "#000000" } },
            stagger: 0.02,
            ease: "none",
        });
    });

    // 8. Notch Morph Animation System (No changes)
    const notchPath = document.getElementById("notchPath");
    if (notchPath) {
        const pathDown = "M 0 100 V 0 H 150 C 180 0 190 60 200 60 H 800 C 810 60 820 0 850 0 H 1000 V 100 Z";
        gsap.to(notchPath, { scrollTrigger: { trigger: ".indi-hero", start: "top top", end: "bottom center", scrub: 1 }, attr: { d: pathDown }, ease: "none" });
    }
    const unitsNotch = document.getElementById("unitsNotchPath");
    if (unitsNotch) {
        const pathDown = "M 0 100 V 0 H 50 C 80 0 100 40 130 40 H 300 C 330 40 350 0 380 0 H 1000 V 100 Z";
        gsap.to(unitsNotch, { scrollTrigger: { trigger: ".unit-section", start: "top bottom", end: "top center", scrub: 1 }, attr: { d: pathDown }, ease: "none" });
    }

    // 9. Sticky Business Units (No changes)
    const boxes = gsap.utils.toArray(".unit-box-trigger");
    const stageImages = gsap.utils.toArray(".stage-img");
    const stage = document.querySelector(".units-sticky-stage");
    if (boxes.length > 0) {
        if (stage) {
            gsap.to(stage, {
                scrollTrigger: { trigger: ".units-layout-grid", start: "top top", end: "bottom bottom", scrub: 1, onUpdate: (self) => {
                    const progress = self.progress;
                    const yStart = 15 + progress * 55;
                    const yEnd = yStart + 15;
                    const notchPath = `polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%, 0% ${yEnd + 5}%, 40px ${yEnd}%, 40px ${yStart}%, 0% ${yStart - 5}%)`;
                    gsap.set(stage, { clipPath: notchPath });
                }},
            });
        }
        boxes.forEach((box, i) => {
            ScrollTrigger.create({ trigger: box, start: "top center", end: "bottom center", onEnter: () => { stageImages.forEach((img) => img.classList.remove("active")); if (stageImages[i]) stageImages[i].classList.add("active"); }, onEnterBack: () => { stageImages.forEach((img) => img.classList.remove("active")); if (stageImages[i]) stageImages[i].classList.add("active"); } });
            const content = box.querySelectorAll(".u-num, .u-title, .u-detail");
            gsap.fromTo(content, { opacity: 0, y: 100 }, { opacity: 1, y: 0, stagger: 0.1, duration: 1.5, ease: "power4.out", scrollTrigger: { trigger: box, start: "top 80%", end: "top 30%", scrub: 1 } });
            gsap.to(content, { opacity: 0, y: -100, stagger: 0.1, scrollTrigger: { trigger: box, start: "bottom 70%", end: "bottom 20%", scrub: 1 } });
        });
    }

    // 10. Interactive Projects Map (No changes)
    const projectCards = gsap.utils.toArray(".project-data-card");
    const mapSvg = document.getElementById("mexicoMap");
    const markers = document.querySelectorAll(".mexico-map-svg .project-marker");
    if (projectCards.length > 0) {
        let mm = gsap.matchMedia();
        mm.add("(min-width: 721px)", () => {
            ScrollTrigger.create({ trigger: ".projects-layout", start: "top top", end: "bottom bottom", snap: { snapTo: 1 / (projectCards.length - 1), duration: { min: 0.1, max: 0.3 }, delay: 0, ease: "power1.inOut" } });
        });
        splitTextIntoChars(".project-data-scroll .indi-scroll-text");
        projectCards.forEach((card, i) => {
            const markerClass = ".marker-" + card.dataset.state;
            ScrollTrigger.create({ trigger: card, start: "top center", end: "bottom center", onToggle: (self) => {
                if (self.isActive) {
                    card.classList.add("active");
                    if (mapSvg) {
                        markers.forEach((m) => m.classList.remove("highlighted"));
                        const targetMarker = mapSvg.querySelector(markerClass);
                        if (targetMarker) targetMarker.classList.add("highlighted");
                        let zoomX = 0, zoomY = 0, scale = 1.2;
                        if (targetMarker) {
                            const viewBox = mapSvg.viewBox.baseVal;
                            const markerX = Number(targetMarker.getAttribute("cx"));
                            const markerY = Number(targetMarker.getAttribute("cy"));

                            if (viewBox && Number.isFinite(markerX) && Number.isFinite(markerY)) {
                                scale = 2.15;
                                zoomX = (viewBox.width / 2) - (markerX * scale);
                                zoomY = (viewBox.height / 2) - (markerY * scale);
                            }
                        }
                        gsap.to(mapSvg, { scale: scale, x: zoomX, y: zoomY, duration: 1, ease: "power2.out", transformOrigin: "center center" });
                    }
                } else { card.classList.remove("active"); }
            }});
        });
        ScrollTrigger.create({ trigger: ".indi-interactive-projects", start: "top bottom", end: "bottom top", onLeave: () => { gsap.to(mapSvg, { scale: 1, x: 0, y: 0, duration: 1 }); }, onLeaveBack: () => { gsap.to(mapSvg, { scale: 1, x: 0, y: 0, duration: 1 }); } });
    }
});
