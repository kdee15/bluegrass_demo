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

  // Create a timeline for the entire block
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: threeColumnElement,
      start: 'top 80%',
      end: 'top 20%',
      scrub: 1,
      toggleActions: 'play none none reverse',
    },
  });

  // Animate header if it exists
  const title = document.querySelector('.three-column__title');
  if (title) {
    tl.from(title, {
      y: 30,
      opacity: 0,
      duration: 0.8,
    });
  }

  // Animate subtitle if it exists
  const subtitle = document.querySelector('.three-column__subtitle');
  if (subtitle) {
    tl.from(
      subtitle,
      {
        y: 20,
        opacity: 0,
        duration: 0.8,
      },
      '-=0.4',
    );
  }

  // Animate intro content if it exists
  const intro = document.querySelector('.three-column__intro');
  if (intro) {
    tl.from(
      intro,
      {
        y: 30,
        opacity: 0,
        duration: 0.8,
      },
      '-=0.4',
    );
  }

  // Animate columns with stagger if they exist
  const columns = document.querySelectorAll('.three-column__wrapper');
  if (columns.length > 0) {
    tl.from(
      columns,
      {
        opacity: 0,
        duration: 0.8,
        stagger: 0.2,
      },
      '-=0.4',
    );
  }

  // Animate skew transforms if they exist
  const skews = document.querySelectorAll('.three-column__skew');
  if (skews.length > 0) {
    tl.fromTo(
      skews,
      {
        '--skew-before': '0deg',
        '--skew-after': '0deg',
      },
      {
        '--skew-before': '3deg',
        '--skew-after': '-3deg',
        duration: 0.8,
      },
      '-=0.4',
    );
  }

  // Animate CTA if it exists
  const cta = document.querySelector('.three-column .btn');
  if (cta) {
    tl.from(
      cta,
      {
        y: 20,
        opacity: 0,
        duration: 0.8,
      },
      '-=0.4',
    );
  }
});
