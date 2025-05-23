document.addEventListener("DOMContentLoaded", function () {
  if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined")
    return;
  gsap.registerPlugin(ScrollTrigger);

  // Set initial state
  gsap.set(".three-column__wrapper", { opacity: 1, y: 0 });

  // Create a timeline for the entire block
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: ".three-column",
      start: "top 80%",
      end: "top 20%",
      scrub: 1,
      toggleActions: "play none none reverse",
    },
  });

  // Animate header
  tl.from(".three-column__title", {
    y: 30,
    opacity: 0,
    duration: 0.8,
  })
    .from(
      ".three-column__subtitle",
      {
        y: 20,
        opacity: 0,
        duration: 0.8,
      },
      "-=0.4"
    )
    // Animate intro content
    .from(
      ".three-column__intro",
      {
        y: 30,
        opacity: 0,
        duration: 0.8,
      },
      "-=0.4"
    )
    // Animate columns with stagger
    .from(
      ".three-column__wrapper",
      {
        opacity: 0,
        duration: 0.8,
        stagger: 0.2,
      },
      "-=0.4"
    )
    // Animate skew transforms
    .fromTo(
      ".three-column__skew",
      {
        "--skew-before": "0deg",
        "--skew-after": "0deg",
      },
      {
        "--skew-before": "3deg",
        "--skew-after": "-3deg",
        duration: 0.8,
      },
      "-=0.4"
    )
    // Animate CTA
    .from(
      ".three-column .btn",
      {
        y: 20,
        opacity: 0,
        duration: 0.8,
      },
      "-=0.4"
    );
});
