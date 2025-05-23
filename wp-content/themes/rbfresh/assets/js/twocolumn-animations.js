document.addEventListener("DOMContentLoaded", function () {
  if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined")
    return;
  gsap.registerPlugin(ScrollTrigger);

  // Parallax effect for images
  gsap.utils.toArray(".two-column__figure").forEach((figure) => {
    gsap.to(figure, {
      yPercent: 30,
      ease: "none",
      scrollTrigger: {
        trigger: figure,
        start: "top bottom",
        end: "bottom top",
        scrub: true,
      },
    });
  });

  // Subtle fade and slide for titles
  gsap.utils.toArray(".two-column__title").forEach((title) => {
    gsap.from(title, {
      y: 20,
      opacity: 0,
      duration: 1,
      scrollTrigger: {
        trigger: title,
        start: "top 80%",
        toggleActions: "play none none reverse",
      },
    });
  });
});
