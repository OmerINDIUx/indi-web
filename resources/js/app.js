import "./bootstrap";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

document.addEventListener("DOMContentLoaded", () => {
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
        // Keep the same map-above-cards experience at every responsive width.
        // CSS owns the fluid dimensions; the scroll behavior no longer changes
        // at the nearby 720/560/500/420px breakpoints.
        mm.add("(min-width: 0px)", () => {
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
        mm.add("(min-width: 0px)", () => {
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
    const historySequences = gsap.utils.toArray(".history-scroll-sequence");
    if (historySequences.length) {
        const historyPageProgress = document.querySelector(".history-page-progress span");
        const orientationNotice = document.getElementById("historyOrientationNotice");
        const orientationNoticeClose = document.getElementById("historyOrientationNoticeClose");
        const portraitDevice = window.matchMedia("(max-width: 1024px) and (orientation: portrait)");
        let orientationNoticeDismissed = false;
        let orientationNoticeTimer = null;

        if (historyPageProgress) {
            ScrollTrigger.create({
                start: 0,
                end: () => ScrollTrigger.maxScroll(window),
                invalidateOnRefresh: true,
                onUpdate: (self) => {
                    historyPageProgress.style.width = `${self.progress * 100}%`;
                },
            });
        }

        const hideOrientationNotice = () => {
            if (!orientationNotice) return;

            orientationNotice.classList.remove("is-visible");
            window.setTimeout(() => {
                orientationNotice.hidden = true;
            }, 300);
        };

        const dismissOrientationNotice = () => {
            orientationNoticeDismissed = true;
            window.clearTimeout(orientationNoticeTimer);
            hideOrientationNotice();
        };

        const syncOrientationNotice = () => {
            if (!orientationNotice || orientationNoticeDismissed) return;

            if (!portraitDevice.matches) {
                orientationNotice.hidden = true;
                orientationNotice.classList.remove("is-visible");
                return;
            }

            orientationNotice.hidden = false;
            window.requestAnimationFrame(() => orientationNotice.classList.add("is-visible"));
            window.clearTimeout(orientationNoticeTimer);
            orientationNoticeTimer = window.setTimeout(dismissOrientationNotice, 5000);
        };

        orientationNoticeClose?.addEventListener("click", dismissOrientationNotice);
        portraitDevice.addEventListener("change", syncOrientationNotice);
        syncOrientationNotice();
    }

    historySequences.forEach((historySequence) => {
        const historyStage = historySequence.querySelector(".history-sticky-stage");
        const loader = historySequence.querySelector(".history-loader");
        const loaderBar = historySequence.querySelector(".history-loader-line span");
        const loaderPercent = historySequence.querySelector(".history-loader-meta strong");
        const milestones = gsap.utils.toArray(historySequence.querySelectorAll(".history-milestone"));
        const frames = JSON.parse(historySequence.dataset.historyFrames || "[]");
        const frameCache = new Map();
        const frameLayers = gsap.utils.toArray(historySequence.querySelectorAll(".history-frame-image"));
        const totalFrameCount = frames.length;
        let currentFrame = 0;
        let desiredFrame = 0;
        let activeLayer = 0;
        let frameRequest = null;
        let pendingFrame = 0;
        let loadedFrames = 0;

        const updateLoader = () => {
            if (!loaderBar || !loaderPercent || totalFrameCount === 0) return;

            const progress = Math.min(100, Math.round((loadedFrames / totalFrameCount) * 100));
            loaderBar.style.width = `${progress}%`;
            loaderPercent.textContent = `${progress}%`;
        };

        const hideLoader = () => {
            loader?.classList.add("is-hidden");
        };

        const decodeImage = async (image) => {
            if (!image || !image.complete || !image.naturalWidth) return image;

            if (typeof image.decode === "function") {
                await image.decode().catch(() => {});
            }

            return image;
        };

        const preloadFrame = (index) => {
            if (!frames[index]) return Promise.resolve();

            const cached = frameCache.get(index);
            if (cached) return cached.promise;

            const image = new Image();
            image.decoding = "async";
            image.loading = "eager";

            const promise = new Promise((resolve) => {
                const done = () => resolve(decodeImage(image));

                image.addEventListener("load", done, { once: true });
                image.addEventListener("error", done, { once: true });
            });

            image.src = frames[index];
            frameCache.set(index, { image, promise });

            return promise;
        };

        const showFrame = async (index, source) => {
            if (!frameLayers.length || index === currentFrame || index !== desiredFrame) return;

            const nextLayer = activeLayer === 0 ? 1 : 0;
            const incoming = frameLayers[nextLayer];
            const outgoing = frameLayers[activeLayer];

            incoming.src = source;
            await decodeImage(incoming);
            if (index !== desiredFrame || !incoming.complete || !incoming.naturalWidth) return;

            incoming.classList.add("is-active");
            outgoing.classList.remove("is-active");

            activeLayer = nextLayer;
            currentFrame = index;
        };

        const setFrame = (index) => {
            const nextFrame = Math.max(0, Math.min(frames.length - 1, index));
            if (nextFrame === currentFrame || !frames[nextFrame]) return;
            desiredFrame = nextFrame;

            preloadFrame(nextFrame).then((image) => {
                if (image?.naturalWidth) {
                    showFrame(nextFrame, frames[nextFrame]);
                }
            });
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
        if (totalFrameCount === 0) {
            hideLoader();
        }

        const startHistoryAnimation = () => {
            const syncMilestonePositions = () => {
                const scrollRange = Math.max(0, historySequence.offsetHeight - window.innerHeight);
                const frameStep = frames.length > 1 ? scrollRange / (frames.length - 1) : 0;
                const lastTextFrame = historySequence.dataset.historyLastTextFrame;
                const lastTextFrameIndex = lastTextFrame
                    ? frames.findIndex((frame) => frame.includes(lastTextFrame))
                    : -1;
                const lastTextFrameOffset = lastTextFrameIndex >= 0
                    ? lastTextFrameIndex * frameStep
                    : scrollRange;

                milestones.forEach((milestone, index) => {
                    const progress = milestones.length > 1 ? index / (milestones.length - 1) : 0;
                    const top = lastTextFrameOffset * progress;
                    milestone.style.setProperty("--history-milestone-top", `${top}px`);
                });
            };

            syncMilestonePositions();

            ScrollTrigger.create({
                trigger: historySequence,
                start: "top top",
                end: "bottom bottom",
                pin: historyStage,
                pinSpacing: false,
                anticipatePin: 1,
                invalidateOnRefresh: true,
                scrub: 0.7,
                onUpdate: (self) => {
                    const index = Math.round(self.progress * (frames.length - 1));
                    queueFrame(index);
                },
            });

            ScrollTrigger.addEventListener("refreshInit", syncMilestonePositions);

            milestones.forEach((milestone) => {
                gsap.to(milestone, {
                    opacity: 1,
                    y: 0,
                    duration: 0.8,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: milestone,
                    start: "top 45%",
                    end: "top top",
                    toggleClass: "is-active",
                    scrub: 0.8,
                },
                });
            });
        };

        const preloadAllFrames = async () => {
            const concurrency = window.matchMedia("(max-width: 720px)").matches ? 3 : 5;
            let nextFrameIndex = 0;

            const preloadNext = async () => {
                while (nextFrameIndex < frames.length) {
                    const frameIndex = nextFrameIndex;
                    nextFrameIndex += 1;
                    await preloadFrame(frameIndex);
                    loadedFrames += 1;
                    updateLoader();
                }
            };

            await Promise.all(Array.from({ length: Math.min(concurrency, frames.length) }, preloadNext));
        };

        preloadAllFrames().then(() => {
            hideLoader();
            startHistoryAnimation();
            ScrollTrigger.refresh();
        });
    });

    const historyTextSequences = gsap.utils.toArray(".history-text-sequence");
    historyTextSequences.forEach((textSequence) => {
        const textStage = textSequence.querySelector(".history-text-stage");
        const textPanels = gsap.utils.toArray(textSequence.querySelectorAll(".history-text-panel"));

        if (!textStage || !textPanels.length) return;

        const renderTimeline = (progress) => {
            const activeIndex = progress * Math.max(0, textPanels.length - 1);
            const spacing = window.matchMedia("(max-width: 720px)").matches ? window.innerWidth * 0.78 : window.innerWidth * 0.36;

            textPanels.forEach((panel, index) => {
                const distance = index - activeIndex;
                const opacity = Math.max(0.12, 1 - (Math.abs(distance) * 0.86));
                const scale = Math.max(0.86, 1 - (Math.abs(distance) * 0.08));

                panel.classList.toggle("is-active", Math.abs(distance) < 0.5);
                gsap.set(panel, {
                    x: distance * spacing,
                    yPercent: -50,
                    xPercent: -50,
                    opacity,
                    scale,
                    zIndex: Math.round(100 - Math.abs(distance) * 10),
                });
            });
        };

        renderTimeline(0);

        ScrollTrigger.create({
            trigger: textSequence,
            start: "top top",
            end: "bottom bottom",
            pin: textStage,
            pinSpacing: false,
            anticipatePin: 1,
            invalidateOnRefresh: true,
            scrub: 0.6,
            onUpdate: (self) => {
                renderTimeline(self.progress);
            },
            onRefresh: (self) => renderTimeline(self.progress),
        });
    });
});
