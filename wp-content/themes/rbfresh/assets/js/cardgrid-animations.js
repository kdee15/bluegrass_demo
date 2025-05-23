// Wait for both DOM and GSAP to be ready
function initCardGridAnimations() {
  if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined") {
    console.warn("GSAP or ScrollTrigger not loaded yet, retrying in 100ms...");
    setTimeout(initCardGridAnimations, 100);
    return;
  }

  gsap.registerPlugin(ScrollTrigger);

  // Get all cards
  const cards = gsap.utils.toArray(".col-12.col-md-6.col-lg-4");

  // Create a timeline for staggered animation
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: ".card-grid__wrapper",
      start: "top 80%",
      end: "top 20%",
      scrub: 1,
      toggleActions: "play none none reverse",
    },
  });

  // Add staggered animation
  tl.from(cards, {
    y: 15,
    opacity: 0.4,
    duration: 0.8,
    stagger: 0.2,
    ease: "power2.out",
  });
}

// Start the initialization process when DOM is ready
document.addEventListener("DOMContentLoaded", initCardGridAnimations);
