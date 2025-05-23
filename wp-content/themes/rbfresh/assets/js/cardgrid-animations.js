document.addEventListener("DOMContentLoaded", function () {
  if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined")
    return;
  gsap.registerPlugin(ScrollTrigger);

  // Get all cards
  const cards = gsap.utils.toArray(".col-12.col-md-6.col-lg-4");

  // Animate each card independently
  cards.forEach((card, index) => {
    gsap.from(card, {
      y: 50,
      opacity: 0,
      duration: 0.8,
      scrollTrigger: {
        trigger: card,
        start: "top 80%",
        toggleActions: "play none none reverse", // Only play once when entering, reverse when leaving
        once: false, // Allow the animation to repeat
      },
    });
  });
});
