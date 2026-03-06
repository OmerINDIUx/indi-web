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

    if (logoMenu) {
        logoMenu.addEventListener("click", () => {
            isMenuOpen = !isMenuOpen;
            if (isMenuOpen) {
                menuLinks.classList.add("active");
                logoMenu.classList.add("active");

                // Advanced Mechanical Reveal for Links (Faster half-time)
                gsap.fromTo(
                    ".nav-link-item",
                    { opacity: 0, y: 30, rotateX: -45, filter: "blur(10px)" },
                    {
                        opacity: 1,
                        y: 0,
                        rotateX: 0,
                        filter: "blur(0px)",
                        stagger: 0.05,
                        ease: "expo.out",
                        duration: 0.6,
                        onComplete: () =>
                            updateNotch(
                                document.querySelector(".nav-link-item"),
                            ),
                    },
                );
            } else {
                menuLinks.classList.remove("active");
                logoMenu.classList.remove("active");
                gsap.to(".nav-link-item", {
                    opacity: 0,
                    y: -20,
                    filter: "blur(5px)",
                    duration: 0.4,
                    ease: "power2.in",
                });
            }
        });

        // Menu Notch Selector Logic - High Performance GSAP updates
        const navLinks = document.querySelectorAll(".nav-link-item");

        function updateNotch(element) {
            if (!element || !menuLinks.classList.contains("active")) return;
            const linkRect = element.getBoundingClientRect();
            const containerRect = menuLinks.getBoundingClientRect();
            const x = linkRect.left - containerRect.left + linkRect.width / 2;
            const xPercent = (x / containerRect.width) * 100;

            // Use GSAP for buttery smooth "guided" movement
            gsap.to(menuLinks, {
                "--notch-x": `${xPercent}%`,
                duration: 0.8,
                ease: "elastic.out(1, 0.75)", // Gives it a slight mechanical bounce
            });

            // Subtle highlight scale for the active link
            gsap.to(navLinks, { scale: 1, opacity: 0.7, duration: 0.3 });
            gsap.to(element, { scale: 1.1, opacity: 1, duration: 0.3 });
        }

        navLinks.forEach((link) => {
            link.addEventListener("mouseenter", () => updateNotch(link));
        });
    }

    // 2. Collapse expanded menu on Scroll Down
    let lastScrollY = window.scrollY;
    ScrollTrigger.create({
        onUpdate: (self) => {
            const currentScrollY = self.scroll();
            if (currentScrollY > lastScrollY && currentScrollY > 50) {
                // Scrolling down - collapse expanded menu only
                if (isMenuOpen) {
                    menuLinks.classList.remove("active");
                    logoMenu.classList.remove("active");
                    gsap.to(".nav-link-item", {
                        opacity: 0,
                        y: 10,
                        duration: 0.3,
                    });
                    isMenuOpen = false;
                }
            }
            lastScrollY = currentScrollY;
        },
    });

    // 3. High-Impact Hero Entry Animation
    const heroHeading = document.querySelector(".indi-hero h1");
    if (heroHeading) {
        // We wait a bit for the character split to be ready
        setTimeout(() => {
            const chars = heroHeading.querySelectorAll(".char");
            gsap.from(chars, {
                y: 100,
                opacity: 0,
                rotateX: -90,
                scale: 1.2,
                stagger: 0.03,
                duration: 2,
                ease: "expo.out",
                delay: 0.5,
            });
        }, 100);
    }

    // 4. Notched Frame Reveals
    gsap.utils.toArray(".notched-frame").forEach((frame) => {
        gsap.from(frame, {
            scrollTrigger: {
                trigger: frame,
                start: "top 85%",
            },
            clipPath: "polygon(0 0, 0 0, 0 0, 0 0, 0 0, 0 0)",
            duration: 2,
            ease: "expo.inOut",
        });

        const img = frame.querySelector("img");
        if (img) {
            gsap.to(img, {
                scrollTrigger: {
                    trigger: frame,
                    scrub: true,
                    start: "top bottom",
                    end: "bottom top",
                },
                y: 50,
                ease: "none",
            });
        }
    });

    // 5. Units Reveal
    gsap.utils.toArray(".unit-row").forEach((row) => {
        const title = row.querySelector(".unit-title");
        const num = row.querySelector(".unit-number");
        const img = row.querySelector(".unit-image");

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: row,
                start: "top 75%",
            },
        });

        if (num) tl.from(num, { x: -50, opacity: 0, duration: 1 });
        if (title)
            tl.from(
                title,
                { y: 100, opacity: 0, duration: 1.2, ease: "expo.out" },
                "-=0.8",
            );
        if (img)
            tl.from(
                img,
                {
                    clipPath:
                        "polygon(100% 0, 100% 0, 100% 0, 100% 0, 100% 0, 100% 0)",
                    duration: 1.5,
                    ease: "power4.out",
                },
                "-=1",
            );
    });

    // 6. Stats Counter - Robust Version
    gsap.utils.toArray(".stat-num").forEach((stat) => {
        const finalValue = parseInt(stat.innerText.replace(/\D/g, ""));
        const hasPlus = stat.innerText.includes("+");
        const counter = { val: 0 };

        gsap.to(counter, {
            val: finalValue,
            duration: 2.5,
            ease: "power3.out",
            scrollTrigger: {
                trigger: stat,
                start: "top 90%",
                toggleActions: "play none none none",
            },
            onUpdate: () => {
                stat.innerText =
                    (hasPlus ? "+" : "") +
                    Math.floor(counter.val).toLocaleString();
            },
        });
    });

    // ---------------------------------------------------------
    // 7. Global Text Color Animation (Gray -> Blue -> Black)
    // ---------------------------------------------------------

    function splitTextIntoChars(selector) {
        const elements = document.querySelectorAll(selector);
        elements.forEach((el) => {
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

    // Apply splitting
    splitTextIntoChars(".indi-scroll-text");

    // Animate characters (Gray -> Blue -> Black)
    gsap.utils.toArray(".indi-scroll-text").forEach((textBlock) => {
        const chars = textBlock.querySelectorAll(".char");
        const initialColor =
            getComputedStyle(textBlock)
                .getPropertyValue("--indi-scroll-initial")
                .trim() || "#ccc";

        gsap.to(chars, {
            scrollTrigger: {
                trigger: textBlock,
                start: "top 90%",
                end: "bottom 20%",
                scrub: 1, // Smoother cinematic transition
            },
            keyframes: {
                "0%": { color: initialColor },
                "50%": { color: "#0066FF" },
                "100%": { color: "#000000" },
            },
            stagger: {
                each: 0.02,
                from: "start",
            },
            ease: "none",
        });
    });

    // ---------------------------------------------------------
    // 8. Notch Morph Animation System
    // ---------------------------------------------------------

    // Hero Notch Morph
    const notchPath = document.getElementById("notchPath");
    if (notchPath) {
        const pathUp =
            "M 0 100 V 60 H 150 C 180 60 190 0 200 0 H 800 C 810 0 820 60 850 60 H 1000 V 100 Z";
        const pathDown =
            "M 0 100 V 0 H 150 C 180 0 190 60 200 60 H 800 C 810 60 820 0 850 0 H 1000 V 100 Z";

        gsap.to(notchPath, {
            scrollTrigger: {
                trigger: ".indi-hero",
                start: "top top",
                end: "bottom center",
                scrub: 1,
            },
            attr: { d: pathDown },
            ease: "none",
        });
    }

    // Units Section Notch Morph (Asymmetrical Left)
    const unitsNotch = document.getElementById("unitsNotchPath");
    if (unitsNotch) {
        const pathUp =
            "M 0 100 V 40 H 50 C 80 40 100 0 130 0 H 300 C 330 0 350 40 380 40 H 1000 V 100 Z";
        const pathDown =
            "M 0 100 V 0 H 50 C 80 0 100 40 130 40 H 300 C 330 40 350 0 380 0 H 1000 V 100 Z";

        gsap.to(unitsNotch, {
            scrollTrigger: {
                trigger: ".unit-section",
                start: "top bottom",
                end: "top center",
                scrub: 1,
            },
            attr: { d: pathDown },
            ease: "none",
        });
    }

    // ---------------------------------------------------------
    // 9. High-Tech Sticky Business Units Logic
    // ---------------------------------------------------------
    const boxes = gsap.utils.toArray(".unit-box-trigger");
    const stageImages = gsap.utils.toArray(".stage-img");
    const stage = document.querySelector(".units-sticky-stage");

    if (boxes.length > 0) {
        // Continuous Notch Glide (Scrubbed)
        if (stage) {
            gsap.to(stage, {
                scrollTrigger: {
                    trigger: ".units-layout-grid",
                    start: "top top",
                    end: "bottom bottom",
                    scrub: 1,
                    onUpdate: (self) => {
                        const progress = self.progress;
                        // Map progress (0-1) to the vertical range (15% - 85%)
                        const yStart = 15 + progress * 55;
                        const yEnd = yStart + 15;

                        const notchPath = `polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%, 0% ${yEnd + 5}%, 40px ${yEnd}%, 40px ${yStart}%, 0% ${yStart - 5}%)`;
                        gsap.set(stage, { clipPath: notchPath });
                    },
                },
            });
        }

        boxes.forEach((box, i) => {
            // Trigger image switch
            ScrollTrigger.create({
                trigger: box,
                start: "top center",
                end: "bottom center",
                onEnter: () => {
                    stageImages.forEach((img) =>
                        img.classList.remove("active"),
                    );
                    if (stageImages[i]) stageImages[i].classList.add("active");
                },
                onEnterBack: () => {
                    stageImages.forEach((img) =>
                        img.classList.remove("active"),
                    );
                    if (stageImages[i]) stageImages[i].classList.add("active");
                },
            });

            // Cinematic text animation (Fade in/up and then out/up)
            const content = box.querySelectorAll(".u-num, .u-title, .u-detail");

            gsap.fromTo(
                content,
                { opacity: 0, y: 100 },
                {
                    opacity: 1,
                    y: 0,
                    stagger: 0.1,
                    duration: 1.5,
                    ease: "power4.out",
                    scrollTrigger: {
                        trigger: box,
                        start: "top 80%",
                        end: "top 30%",
                        scrub: 1,
                    },
                },
            );

            gsap.to(content, {
                opacity: 0,
                y: -100,
                stagger: 0.1,
                scrollTrigger: {
                    trigger: box,
                    start: "bottom 70%",
                    end: "bottom 20%",
                    scrub: 1,
                },
            });
        });
    }
    // ---------------------------------------------------------
    // 10. Interactive Projects Map & Sheet Logic
    // ---------------------------------------------------------
    const projectCards = gsap.utils.toArray(".project-data-card");
    const mapSvg = document.getElementById("mexicoMap");
    const markers = document.querySelectorAll(
        ".mexico-map-svg .project-marker",
    );

    if (projectCards.length > 0) {
        // Ensure split text applies to new elements
        splitTextIntoChars(".project-data-scroll .indi-scroll-text");

        projectCards.forEach((card, i) => {
            const markerClass = ".marker-" + card.dataset.state;

            ScrollTrigger.create({
                trigger: card,
                start: "top 60%",
                end: "bottom 40%",
                onToggle: (self) => {
                    if (self.isActive) {
                        card.classList.add("active");
                        if (mapSvg) {
                            markers.forEach((m) =>
                                m.classList.remove("highlighted"),
                            );
                            const targetMarker =
                                mapSvg.querySelector(markerClass);
                            if (targetMarker)
                                targetMarker.classList.add("highlighted");

                            // Accurate Zoom/Pan settings for the 520x440 SVG
                            let zoomX = 0,
                                zoomY = 0,
                                scale = 1.2;
                            if (card.dataset.state === "cdmx") {
                                scale = 2.5;
                                zoomX = -80;
                                zoomY = -120;
                            }
                            if (card.dataset.state === "southeast") {
                                scale = 2.2;
                                zoomX = -320;
                                zoomY = -140;
                            }
                            if (card.dataset.state === "northeast") {
                                scale = 2.4;
                                zoomX = -120;
                                zoomY = 80;
                            }

                            gsap.to(mapSvg, {
                                scale: scale,
                                x: zoomX,
                                y: zoomY,
                                duration: 1.2,
                                ease: "power2.out",
                                transformOrigin: "center center",
                            });
                        }
                    } else {
                        card.classList.remove("active");
                    }
                },
            });
        });

        // Reset map when scrolling out of the section
        ScrollTrigger.create({
            trigger: ".indi-interactive-projects",
            start: "top bottom",
            end: "bottom top",
            onLeave: () => {
                gsap.to(mapSvg, { scale: 1, x: 0, y: 0, duration: 1 });
            },
            onLeaveBack: () => {
                gsap.to(mapSvg, { scale: 1, x: 0, y: 0, duration: 1 });
            },
        });
    }
});
