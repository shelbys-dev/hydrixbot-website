import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { Flip } from "gsap/Flip";

gsap.registerPlugin(ScrollTrigger, Flip);

// Respect du prefers-reduced-motion
export const canAnimate = () =>
  !window.matchMedia("(prefers-reduced-motion: reduce)").matches;

// Timeline standard
export const tl = (opts = {}) =>
  gsap.timeline({ defaults: { duration: 0.7, ease: "power3.out" }, ...opts });

export { gsap, ScrollTrigger, Flip };
