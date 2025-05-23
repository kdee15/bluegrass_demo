document.addEventListener("DOMContentLoaded", function () {
  if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined")
    return;
  gsap.registerPlugin(ScrollTrigger);

  // Get all cards
  const cards = gsap.utils.toArray(".col-12.col-md-6.col-lg-4");

  // Create a timeline for staggered animation
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: ".card-grid__wrapper",
      start: "top 80%",
      end: "top 20%", // End point for the scrub
      scrub: 1, // Smooth scrubbing with 1 second of lag
      toggleActions: "play none none reverse",
    },
  });

  // Add staggered animation
  tl.from(cards, {
    y: 15,
    opacity: 0.4,
    duration: 0.8,
    stagger: 0.2, // 0.2 seconds between each card
    ease: "power2.out",
  });
});
