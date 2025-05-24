document.addEventListener('DOMContentLoaded', function () {
  const footerTitles = document.querySelectorAll('.footer__title');

  function handleAccordion() {
    // Only apply accordion behavior below 992px
    const isMobile = window.innerWidth < 992;

    footerTitles.forEach((title) => {
      // Remove existing click listeners
      title.removeEventListener('click', toggleAccordion);

      if (isMobile) {
        // Add click listener only on mobile/tablet
        title.addEventListener('click', toggleAccordion);
      } else {
        // Reset classes on desktop
        title.classList.remove('active');
        const links = title.nextElementSibling;
        if (links) {
          links.classList.remove('active');
        }
      }
    });
  }

  function toggleAccordion() {
    // Collapse all other accordions
    footerTitles.forEach((otherTitle) => {
      if (otherTitle !== this) {
        otherTitle.classList.remove('active');
        const otherLinks = otherTitle.nextElementSibling;
        if (otherLinks) {
          otherLinks.classList.remove('active');
        }
      }
    });
    // Toggle current accordion
    this.classList.toggle('active');
    const links = this.nextElementSibling;
    if (links) {
      links.classList.toggle('active');
    }
  }

  // Initial setup
  handleAccordion();

  // Update on window resize
  window.addEventListener('resize', handleAccordion);
});
