import { gsap, ScrollTrigger, tl, canAnimate } from "./gsap-boot.js";

export function initDirectives(root = document) {
  if (!canAnimate()) return;

  // [data-fade-up]
  root.querySelectorAll("[data-fade-up]").forEach((el) => {
    gsap.set(el, { y: 24, opacity: 0 });
    ScrollTrigger.create({
      trigger: el,
      start: "top 85%",
      once: false,
      onEnter: () => gsap.to(el, { y: 0, opacity: 1, duration: .6, ease: "power2.out" })
    });
  });

  // [data-stagger-child] + [data-i]
  root.querySelectorAll("[data-stagger-child]").forEach((wrap) => {
    const items = wrap.querySelectorAll("[data-i]");
    gsap.set(items, { y: 16, opacity: 0 });
    ScrollTrigger.create({
      trigger: wrap,
      start: "top 80%",
      once: true,
      onEnter: () =>
        tl().to(items, { y: 0, opacity: 1, stagger: .2 }, 0)
    });
  });

  // Parallax simple: [data-parallax=y:50]
  root.querySelectorAll("[data-parallax]").forEach((el) => {
    const y = +(el.dataset.parallax?.split(":")[1] || 40);
    gsap.to(el, {
      y,
      ease: "none",
      scrollTrigger: { trigger: el, scrub: 0.4 }
    });
  });
}
