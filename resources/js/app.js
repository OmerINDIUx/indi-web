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
        const hasMechanicalLogo = Boolean(document.querySelector(".logo-part") && document.querySelector(".part-bottom"));

        // Initialize Mechanical Baseline (Stacked small version)
        if (hasMechanicalLogo) {
            gsap.set(".logo-part", { width: 100, height: 70 });
            gsap.set(".part-bottom", { marginLeft: -100, y: 80 });
            gsap.set(".part-bottom .logo-svg-wrapper", { y: -70 });
        }
        gsap.set(".logo-svg-wrapper", { width: 100, height: 140 });

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
                if (hasMechanicalLogo) {
                    tl.to(".logo-part", { width: 140, height: 100, duration: 0.8, ease: "expo.out" }, 0);
                    tl.to(".part-bottom .logo-svg-wrapper", { y: -100, duration: 0.8, ease: "expo.out" }, 0);
                    tl.to(".part-bottom", { marginLeft: 10, y: 0, duration: 0.9, ease: "elastic.out(1, 0.75)" }, 0.1);
                }
                tl.to(".logo-svg-wrapper", { width: 140, height: 200, duration: 0.8, ease: "expo.out" }, 0);
                
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
                if (hasMechanicalLogo) {
                    tl.to(".part-bottom", { marginLeft: -100, y: 80, duration: 0.6, ease: "power2.inOut" }, 0.1);
                    tl.to(".logo-part", { width: 100, height: 70, duration: 0.6, ease: "power2.inOut" }, 0.1);
                    tl.to(".part-bottom .logo-svg-wrapper", { y: -70, duration: 0.6, ease: "power2.inOut" }, 0.1);
                }
                tl.to(".logo-svg-wrapper", { width: 100, height: 140, duration: 0.6, ease: "power2.inOut" }, 0.1);
            }
        };

        logoMenu.addEventListener("click", (e) => {
            if (!e.target.closest(".nav-link-item")) toggleMenu();
        });

        // Hover Handlers
        logoMenu.addEventListener("mouseenter", () => {
            if (!isMenuOpen) {
                gsap.to(logoMenu, { opacity: 1, scale: 1, x: 0, duration: 0.3, overwrite: true });
                if (hasMechanicalLogo) {
                    gsap.to(".logo-part", { width: 140, height: 100, duration: 0.5, ease: "power2.out" });
                    gsap.to(".part-bottom .logo-svg-wrapper", { y: -100, duration: 0.5, ease: "power2.out" });
                    gsap.to(".part-bottom", { marginLeft: 10, y: 0, duration: 0.6, ease: "elastic.out(1, 0.8)" });
                }
                gsap.to(".logo-svg-wrapper", { width: 140, height: 200, duration: 0.5, ease: "power2.out" });
                gsap.to(".logo-svg-wrapper .cls-1", { fill: "#0066FF", duration: 0.3 });
            }
        });

        logoMenu.addEventListener("mouseleave", () => {
            if (!isMenuOpen) {
                if (isCollided) updateLogoVisuals(true, 0.5);
                if (hasMechanicalLogo) {
                    gsap.to(".logo-part", { width: 100, height: 70, duration: 0.4, ease: "power2.inOut" });
                    gsap.to(".part-bottom .logo-svg-wrapper", { y: -70, duration: 0.4, ease: "power2.inOut" });
                    gsap.to(".part-bottom", { marginLeft: -100, y: 80, duration: 0.5, ease: "power2.inOut" });
                }
                gsap.to(".logo-svg-wrapper", { width: 100, height: 140, duration: 0.4, ease: "power2.inOut" });
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
            text.split(/(\s+)/).forEach((part) => {
                if (!part) return;

                if (/^\s+$/.test(part)) {
                    el.appendChild(document.createTextNode(" "));
                    return;
                }

                const wordSpan = document.createElement("span");
                wordSpan.classList.add("indi-scroll-word");

                part.split("").forEach((char) => {
                    const span = document.createElement("span");
                    span.innerText = char;
                    span.classList.add("char");
                    wordSpan.appendChild(span);
                });

                el.appendChild(wordSpan);
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
        const unitsMedia = gsap.matchMedia();
        unitsMedia.add("(min-width: 901px)", () => {
            if (! stage) {
                return;
            }

            const setStageState = (state) => {
                stage.classList.toggle("is-fixed", state === "fixed");
                stage.classList.toggle("is-bottom", state === "bottom");
            };

            ScrollTrigger.create({
                trigger: ".indi-units-module",
                start: "top top",
                end: "bottom bottom",
                onEnter: () => setStageState("fixed"),
                onEnterBack: () => setStageState("fixed"),
                onLeave: () => setStageState("bottom"),
                onLeaveBack: () => setStageState("top"),
                invalidateOnRefresh: true,
            });

            gsap.to(stage, {
                scrollTrigger: { trigger: ".units-layout-grid", start: "top top", end: "bottom bottom", scrub: 1, onUpdate: (self) => {
                    const progress = self.progress;
                    const yStart = 15 + progress * 55;
                    const yEnd = yStart + 15;
                    const notchPath = `polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%, 0% ${yEnd + 5}%, 40px ${yEnd}%, 40px ${yStart}%, 0% ${yStart - 5}%)`;
                    gsap.set(stage, { clipPath: notchPath });
                }},
            });
        });

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
    const mapStage = document.querySelector(".project-map-stage");
    const markers = document.querySelectorAll(".mexico-map-svg .project-marker");
    if (projectCards.length > 0) {
        let mm = gsap.matchMedia();
        mm.add("(min-width: 721px)", () => {
            const projectsLayout = document.querySelector(".projects-layout");
            const getProjectSnapPoints = () => {
                if (! projectsLayout || projectCards.length < 2) {
                    return [0];
                }

                const scrollDistance = Math.max(1, projectsLayout.offsetHeight - window.innerHeight);
                const fixedMapOffset = window.matchMedia("(max-width: 900px)").matches && mapStage
                    ? mapStage.offsetHeight + 20
                    : 0;

                return projectCards.map((card) => Math.min(1, Math.max(0, (card.offsetTop - fixedMapOffset) / scrollDistance)));
            };

            ScrollTrigger.create({
                trigger: ".projects-layout",
                start: "top top",
                end: "bottom bottom",
                snap: {
                    snapTo: (progress) => gsap.utils.snap(getProjectSnapPoints(), progress),
                    duration: { min: 0.28, max: 0.65 },
                    delay: 0.04,
                    ease: "power3.inOut",
                },
                invalidateOnRefresh: true,
            });
        });
        mm.add("(min-width: 721px)", () => {
            if (! mapStage) {
                return;
            }

            const setMapStageState = (state) => {
                mapStage.classList.toggle("is-fixed", state === "fixed");
                mapStage.classList.toggle("is-bottom", state === "bottom");
            };

            ScrollTrigger.create({
                trigger: ".projects-layout",
                start: "top top",
                end: () => window.matchMedia("(max-width: 900px)").matches ? "bottom top" : "bottom bottom",
                onEnter: () => setMapStageState("fixed"),
                onEnterBack: () => setMapStageState("fixed"),
                onLeave: () => setMapStageState(window.matchMedia("(max-width: 900px)").matches ? "top" : "bottom"),
                onLeaveBack: () => setMapStageState("top"),
                invalidateOnRefresh: true,
            });
        });
        splitTextIntoChars(".project-data-scroll .indi-scroll-text");
        const firstCard = projectCards[0];
        if (firstCard && mapSvg) {
            const firstMarker = mapSvg.querySelector(".marker-" + firstCard.dataset.state);
            firstMarker?.classList.add("highlighted");
        }
        projectCards.forEach((card, i) => {
            const markerClass = ".marker-" + card.dataset.state;
            ScrollTrigger.create({ trigger: card, start: "top center", end: "bottom center", onToggle: (self) => {
                if (self.isActive) {
                    card.classList.add("active");
                    if (mapSvg) {
                        markers.forEach((m) => {
                            m.classList.remove("highlighted");
                            m.classList.remove("is-pulsing");
                        });
                        const targetMarker = mapSvg.querySelector(markerClass);
                        if (targetMarker) {
                            targetMarker.classList.add("highlighted");
                            targetMarker.classList.add("is-pulsing");
                            window.setTimeout(() => targetMarker.classList.remove("is-pulsing"), 1200);
                        }
                        let mapOrigin = "center center";
                        if (targetMarker && mapSvg.viewBox.baseVal) {
                            const viewBox = mapSvg.viewBox.baseVal;
                            const markerX = Number(targetMarker.getAttribute("cx"));
                            const markerY = Number(targetMarker.getAttribute("cy"));
                            if (viewBox.width && viewBox.height && Number.isFinite(markerX) && Number.isFinite(markerY)) {
                                mapOrigin = `${(markerX / viewBox.width) * 100}% ${(markerY / viewBox.height) * 100}%`;
                            }
                        }
                        gsap.fromTo(
                            mapSvg,
                            { scale: 1.02, x: 0, y: 0 },
                            { scale: 1.16, x: 0, y: 0, duration: 0.9, ease: "power2.out", yoyo: true, repeat: 1, transformOrigin: mapOrigin }
                        );
                    }
                } else { card.classList.remove("active"); }
            }});
        });
        ScrollTrigger.create({ trigger: ".indi-interactive-projects", start: "top bottom", end: "bottom top", onLeave: () => { gsap.to(mapSvg, { scale: 1, x: 0, y: 0, duration: 1 }); }, onLeaveBack: () => { gsap.to(mapSvg, { scale: 1, x: 0, y: 0, duration: 1 }); } });
    }

    // 11. Historia image-sequence scroll
    const historySequence = document.querySelector(".history-scroll-sequence");
    if (historySequence) {
        const historyStage = historySequence.querySelector(".history-sticky-stage");
        const frameA = document.getElementById("historyFrameA");
        const frameB = document.getElementById("historyFrameB");
        const progressBar = document.getElementById("historyProgressBar");
        const loader = document.getElementById("historyLoader");
        const loaderBar = document.getElementById("historyLoaderBar");
        const loaderPercent = document.getElementById("historyLoaderPercent");
        const milestones = gsap.utils.toArray(".history-milestone");
        const frames = JSON.parse(historySequence.dataset.historyFrames || "[]");
        const frameCache = new Map();
        const frameLayers = [frameA, frameB].filter(Boolean);
        const preloadRadius = window.matchMedia("(max-width: 720px)").matches ? 6 : 10;
        const criticalFrameCount = Math.min(frames.length, window.matchMedia("(max-width: 720px)").matches ? 6 : 12);
        let currentFrame = 0;
        let desiredFrame = 0;
        let activeLayer = 0;
        let frameRequest = null;
        let pendingFrame = 0;
        let loadedCriticalFrames = 0;

        const updateLoader = () => {
            if (!loaderBar || !loaderPercent || criticalFrameCount === 0) return;

            const progress = Math.min(100, Math.round((loadedCriticalFrames / criticalFrameCount) * 100));
            loaderBar.style.width = `${progress}%`;
            loaderPercent.textContent = `${progress}%`;
        };

        const hideLoader = () => {
            loader?.classList.add("is-hidden");
        };

        const preloadFrame = (index) => {
            if (!frames[index]) return Promise.resolve();

            const cached = frameCache.get(index);
            if (cached) return cached.promise;

            const image = new Image();
            image.decoding = "async";
            image.loading = "eager";

            const promise = new Promise((resolve) => {
                const done = () => resolve(image);

                image.addEventListener("load", done, { once: true });
                image.addEventListener("error", done, { once: true });
            });

            image.src = frames[index];
            frameCache.set(index, { image, promise });

            return promise;
        };

        const showFrame = (index, source) => {
            if (!frameLayers.length || index === currentFrame || index !== desiredFrame) return;

            const nextLayer = activeLayer === 0 ? 1 : 0;
            const incoming = frameLayers[nextLayer];
            const outgoing = frameLayers[activeLayer];

            incoming.src = source;
            incoming.classList.add("is-active");
            outgoing.classList.remove("is-active");

            activeLayer = nextLayer;
            currentFrame = index;
        };

        const preloadNearbyFrames = (index) => {
            const schedule = (callback) => {
                if ("requestIdleCallback" in window) {
                    window.requestIdleCallback(callback, { timeout: 180 });
                } else {
                    window.setTimeout(callback, 32);
                }
            };

            schedule(() => {
                for (let offset = -preloadRadius; offset <= preloadRadius; offset += 1) {
                    preloadFrame(index + offset);
                }
            });
        };

        const setFrame = (index) => {
            const nextFrame = Math.max(0, Math.min(frames.length - 1, index));
            if (nextFrame === currentFrame || !frames[nextFrame]) return;
            desiredFrame = nextFrame;

            preloadFrame(nextFrame).then(() => showFrame(nextFrame, frames[nextFrame]));
            preloadNearbyFrames(nextFrame);
        };

        const queueFrame = (index) => {
            pendingFrame = index;
            if (frameRequest) return;

            frameRequest = window.requestAnimationFrame(() => {
                frameRequest = null;
                setFrame(pendingFrame);
            });
        };

        updateLoader();
        if (criticalFrameCount === 0) {
            hideLoader();
        }

        Promise.all(frames.slice(0, criticalFrameCount).map((_, index) => (
            preloadFrame(index).then(() => {
                loadedCriticalFrames += 1;
                updateLoader();
            })
        ))).then(() => {
            hideLoader();
            preloadNearbyFrames(0);
        });

        ScrollTrigger.create({
            trigger: historySequence,
            start: "top top",
            end: "bottom bottom",
            pin: historyStage,
            pinSpacing: false,
            anticipatePin: 1,
            invalidateOnRefresh: true,
            scrub: 0.35,
            onUpdate: (self) => {
                const index = Math.round(self.progress * (frames.length - 1));
                queueFrame(index);
                if (progressBar) {
                    progressBar.style.width = `${self.progress * 100}%`;
                }
            },
        });

        milestones.forEach((milestone) => {
            gsap.to(milestone, {
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: milestone,
                    start: "top 65%",
                    end: "bottom 42%",
                    toggleClass: "is-active",
                    scrub: 0.8,
                },
            });
        });
    }
});
