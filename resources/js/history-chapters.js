import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import "../css/history-chapters.css";

const HOLD = 1;
const CHANGE = 0.7;
const clamp = (value) => Math.max(0, Math.min(1, value));
const smooth = (value) => { const t = clamp(value); return t * t * (3 - 2 * t); };

export function initHistoryChapters() {
    document.querySelectorAll(".history-text-sequence").forEach((section, sectionIndex) => {
        const stage = section.querySelector(".history-text-stage");
        const panels = [...section.querySelectorAll(".history-text-panel")];
        if (!stage || !panels.length) return;

        const controls = document.createElement("div");
        controls.className = "history-chapter-controls";
        const meta = document.createElement("div");
        meta.className = "history-chapter-meta";
        const hint = document.createElement("span");
        hint.textContent = "Desliza para explorar";
        const counter = document.createElement("span");
        counter.setAttribute("aria-hidden", "true");
        meta.append(hint, counter);
        const rail = document.createElement("nav");
        rail.className = "history-chapter-rail";
        rail.setAttribute("aria-label", section.getAttribute("aria-label") || "Años de la historia");
        const items = panels.map((panel, index) => {
            const button = document.createElement("button");
            button.type = "button";
            button.textContent = panel.querySelector("h2").textContent;
            button.setAttribute("aria-label", `Ir a ${button.textContent}`);
            panel.id ||= `history-chapter-${sectionIndex}-${index}`;
            button.setAttribute("aria-controls", panel.id);
            rail.append(button);
            return { panel, button, copy: panel.querySelector(".history-text-panel__copy") };
        });
        controls.append(meta, rail);
        stage.append(controls);

        // Native sticky owns the stage. GSAP only smooths one scalar value, so
        // seeking, reverse scrolling and refresh all render exactly the same state.
        gsap.matchMedia().add("(prefers-reduced-motion: no-preference)", () => {
            section.classList.add("has-chapter-motion");
            const total = panels.length * HOLD + (panels.length - 1) * CHANGE;
            const playhead = { time: 0 };
            let active = -1;
            const layout = () => {
                const heading = stage.querySelector(".history-text-heading");
                const stacked = getComputedStyle(stage).getPropertyValue("--chapter-stacked").trim() === "1";
                const compact = stage.clientHeight < 650;
                const padding = compact ? 12 : 28;
                const contentTop = Math.max(heading.offsetTop + heading.offsetHeight + padding, compact && stacked ? 112 : 0);
                const contentBottom = stage.clientHeight - controls.offsetTop + (compact ? 12 : 24);
                const available = Math.max(0, stage.clientHeight - contentTop - contentBottom);
                const imageLimit = Math.min(
                    stage.querySelector(".history-text-track").clientWidth * (stacked ? 0.93 : 0.44),
                    stacked ? 360 : 540,
                    available,
                );
                // Set the actual desktop column width before measuring wrapped text.
                stage.style.setProperty("--chapter-image-size", `${imageLimit}px`);
                stage.style.removeProperty("--chapter-copy-height");
                const copyHeight = Math.ceil(Math.max(...items.map(({ copy }) => copy.offsetHeight)));
                const gap = parseFloat(getComputedStyle(panels[0]).rowGap) || 0;
                const imageSize = stacked ? Math.max(0, Math.min(imageLimit, available - copyHeight - gap)) : imageLimit;
                stage.style.setProperty("--chapter-content-top", `${contentTop}px`);
                stage.style.setProperty("--chapter-content-bottom", `${contentBottom}px`);
                stage.style.setProperty("--chapter-copy-height", `${copyHeight}px`);
                stage.style.setProperty("--chapter-image-size", `${imageSize}px`);
            };
            const render = () => {
                const time = Math.min(total, Math.max(0, playhead.time));
                const base = Math.min(panels.length - 1, Math.floor(time / (HOLD + CHANGE)));
                const local = time - base * (HOLD + CHANGE);
                const transition = base < panels.length - 1 ? clamp((local - HOLD) / CHANGE) : 0;
                const next = transition > 0 ? base + 1 : -1;
                const current = transition >= 0.5 ? next : base;
                items.forEach(({ panel, button }, index) => {
                    const visible = index === base || index === next;
                    panel.dataset.chapterVisible = String(visible);
                    if (visible) {
                        const incoming = index === next;
                        const reveal = smooth(transition);
                        panel.style.setProperty("--chapter-reveal", `${incoming ? (1 - reveal) * 100 : 0}%`);
                        // Change the complete caption at the midpoint: never slice a
                        // year or pair one chapter's date with another chapter's text.
                        panel.style.setProperty("--chapter-copy-opacity", index === current
                            ? 0.7 + 0.3 * Math.abs(2 * transition - 1)
                            : 0);
                        panel.style.setProperty("--chapter-image-scale", 1.055 - 0.055 * clamp((time - index * (HOLD + CHANGE) + CHANGE) / (HOLD + CHANGE * 2)));
                    }
                    const fill = clamp((time - index * (HOLD + CHANGE)) / HOLD);
                    button.style.setProperty("--chapter-fill", fill);
                    if (current !== active) {
                        panel.setAttribute("aria-hidden", String(index !== current));
                        if (index === current) button.setAttribute("aria-current", "step");
                        else button.removeAttribute("aria-current");
                    }
                });
                if (current !== active) {
                    active = current;
                    counter.textContent = `${String(active + 1).padStart(2, "0")} / ${String(panels.length).padStart(2, "0")}`;
                }
            };
            layout();
            render();
            const animation = gsap.to(playhead, {
                time: total,
                ease: "none",
                onUpdate: render,
                scrollTrigger: {
                    trigger: section,
                    start: "top top",
                    end: "bottom bottom",
                    scrub: 0.3,
                    onToggle: (self) => { section.dataset.chapterInView = String(self.isActive); },
                    onRefresh: (self) => {
                        section.dataset.chapterInView = String(self.isActive);
                        layout();
                        playhead.time = self.progress * total;
                        render();
                    },
                },
            });
            const handlers = items.map(({ button }, index) => {
                const navigate = () => {
                    const trigger = animation.scrollTrigger;
                    const position = (index * (HOLD + CHANGE) + HOLD * 0.45) / total;
                    window.scrollTo({ top: trigger.start + position * (trigger.end - trigger.start), behavior: "smooth" });
                };
                button.addEventListener("click", navigate);
                return navigate;
            });
            let disposed = false;
            document.fonts.ready.then(() => {
                if (!disposed) { layout(); ScrollTrigger.refresh(); }
            });
            return () => {
                disposed = true;
                section.classList.remove("has-chapter-motion");
                delete section.dataset.chapterInView;
                ["--chapter-content-top", "--chapter-content-bottom", "--chapter-copy-height", "--chapter-image-size"].forEach((name) => stage.style.removeProperty(name));
                items.forEach(({ panel, button }, index) => {
                    button.removeEventListener("click", handlers[index]);
                    button.removeAttribute("aria-current");
                    button.style.removeProperty("--chapter-fill");
                    panel.removeAttribute("aria-hidden");
                    delete panel.dataset.chapterVisible;
                    ["--chapter-reveal", "--chapter-copy-opacity", "--chapter-image-scale"].forEach((name) => panel.style.removeProperty(name));
                });
            };
        });
    });
}
