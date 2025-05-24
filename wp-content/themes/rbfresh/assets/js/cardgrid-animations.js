// Wait for both DOM and GSAP to be ready
function initCardGridAnimations() {
  if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
    console.warn('GSAP or ScrollTrigger not loaded yet, retrying in 100ms...');
    setTimeout(initCardGridAnimations, 100);
    return;
  }

  gsap.registerPlugin(ScrollTrigger);

  // Get all cards
  const cards = gsap.utils.toArray('.col-12.col-md-6.col-lg-4');

  // Create a timeline for staggered animation
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: '.card-grid__wrapper',
      start: 'top 80%',
      end: 'top 20%',
      scrub: 1,
      toggleActions: 'play none none reverse',
    },
  });

  // Add staggered animation
  tl.from(cards, {
    y: 15,
    opacity: 0.4,
    duration: 0.8,
    stagger: 0.2,
    ease: 'power2.out',
  });

  // Initialize text shadow animations for CTA elements
  initTextShadowAnimations();
}

function initTextShadowAnimations() {
  // Get all CTA elements
  const ctaElements = document.querySelectorAll('.grid-card--cta');

  ctaElements.forEach((element) => {
    // Create a GSAP timeline for this element
    const shadowTimeline = gsap.timeline({ paused: true });

    element.addEventListener('mousemove', function (e) {
      // Get the bounding rectangle of the element
      const rect = element.getBoundingClientRect();

      // Calculate mouse position relative to the element
      const mouseX = e.clientX - rect.left;
      const mouseY = e.clientY - rect.top;

      // Calculate shadow offset based on mouse position
      // Reduced range from 30 to 15 for smaller movement
      const shadowX = -((mouseX / rect.width) * 15 - 7.5);
      const shadowY = -((mouseY / rect.height) * 15 - 7.5);

      // Calculate 3D rotation based on mouse position
      const rotateX = (mouseY / rect.height) * 10 - 5; // -5 to 5 degrees
      const rotateY = -((mouseX / rect.width) * 10 - 5); // -5 to 5 degrees

      // Kill any existing animation
      shadowTimeline.kill();

      // Create new animation with no easing for instant response
      gsap.to(element, {
        duration: 0.1,
        textShadow: `${shadowX}px ${shadowY}px 2px rgba(0, 0, 0, 0.3)`,
        rotateX: rotateX,
        rotateY: rotateY,
        transformPerspective: 1000,
        ease: 'none',
      });
    });

    // Reset shadow and transform when mouse leaves
    element.addEventListener('mouseleave', function () {
      gsap.to(element, {
        duration: 0.1,
        textShadow: 'none',
        rotateX: 0,
        rotateY: 0,
        ease: 'none',
      });
    });
  });
}

// Start the initialization process when DOM is ready
document.addEventListener('DOMContentLoaded', initCardGridAnimations);
