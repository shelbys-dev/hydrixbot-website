import { gsap } from "./gsap-boot";

/**
 * Anime la valeur numérique d'un élément <span>.
 * @param {HTMLElement} el - élément DOM
 * @param {number} to - valeur cible
 * @param {number} dur - durée en secondes
 */
export function animateCounter(el, to = 0, dur = 1.4) {
  const start = parseInt((el.textContent || "0").replace(/\D/g, ""), 10) || 0;
  const obj = { val: start };

  gsap.to(obj, {
    val: to,
    duration: dur,
    ease: "power2.out",
    onUpdate: () => {
      el.textContent = Math.floor(obj.val).toLocaleString("fr-FR");
    },
    onComplete: () => {
      el.textContent = `${to.toLocaleString("fr-FR")} membres gérés 🤖`;
    },
  });
}