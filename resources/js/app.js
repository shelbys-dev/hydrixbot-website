import './bootstrap';
import { animateCounter } from "./anim/counter";
import { initDirectives } from "./anim/directives";

document.addEventListener("DOMContentLoaded", () => {
  initDirectives(document);

  const el = document.getElementById("members-count");
  if (!el) return;

  fetch("/bot-stats")
    .then((res) => res.json())
    .then((data) => {
      if (!data.members) return (el.textContent = "—");
      el.textContent = "0"; // on repart de 0
      animateCounter(el, Number(data.members));
    })
    .catch(() => {
      el.textContent = "—";
    });
});