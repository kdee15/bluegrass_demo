document.addEventListener("DOMContentLoaded", function () {
  if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined")
    return;
  gsap.registerPlugin(ScrollTrigger);

  // Set initial state
  gsap.set(".two-column__skew--desk", {
    transform: "rotate(0deg)",
  });

  // Create a timeline for the entire block
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: ".two-column",
      start: "top 80%",
      end: "top 20%",
      scrub: 1,
      toggleActions: "play none none reverse",
    },
  });

  // Animate skew transform
  tl.to(".two-column__skew--desk", {
    transform: "rotate(-5deg)",
    duration: 0.8,
  });

  // Animate skew transform
  tl.from(".two-column__figure", {
    transform: "scale(1.01)",
    opacity: 0.8,
    duration: 0.8,
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
