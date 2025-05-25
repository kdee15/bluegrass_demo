document.addEventListener('DOMContentLoaded', function () {
  if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
    console.warn('GSAP or ScrollTrigger not loaded yet');
    return;
  }
  gsap.registerPlugin(ScrollTrigger);

  // Check if we're on a page with three-column content
  const threeColumnElement = document.querySelector('.three-column');
  if (!threeColumnElement) {
    return; // Exit if no three-column element exists
  }

  // Set initial state
  const wrapper = document.querySelector('.three-column__wrapper');
  if (wrapper) {
    gsap.set(wrapper, { opacity: 1, y: 0 });
  }

  // Animate columns with stagger if they exist
  const columns = document.querySelectorAll('.three-column__wrapper');
  if (columns.length > 0) {
    gsap.from(columns, {
      opacity: 0,
      duration: 0.8,
      stagger: 0.2,
      scrollTrigger: {
        trigger: threeColumnElement,
        start: 'top 80%',
        end: 'top 20%',
        toggleActions: 'play none none reverse',
      },
    });
  }

  // Animate skew transforms if they exist
  const skews = document.querySelectorAll('.three-column__skew');
  if (skews.length > 0) {
    skews.forEach((skew) => {
      gsap.fromTo(
        skew,
        {
          '--skew-before': '0deg',
          '--skew-after': '0deg',
        },
        {
          '--skew-before': '3deg',
          '--skew-after': '-3deg',
          duration: 0.5,
          scrollTrigger: {
            trigger: skew,
            start: 'top 85%',
            end: 'top 50%',
            scrub: 1,
            toggleActions: 'play none none reverse',
          },
        },
      );
    });
  }
});
