document.addEventListener('DOMContentLoaded', function () {
  // Mobile menu toggle
  const menuToggle = document.querySelector('.menu-toggle');
  const mainNav = document.querySelector('.main-navigation');

  if (menuToggle && mainNav) {
    menuToggle.addEventListener('click', function () {
      mainNav.classList.toggle('toggled');
      menuToggle.setAttribute(
        'aria-expanded',
        menuToggle.getAttribute('aria-expanded') === 'true' ? 'false' : 'true',
      );
    });
  }

  // Close mobile menu when clicking outside
  document.addEventListener('click', function (event) {
    if (mainNav && mainNav.classList.contains('toggled')) {
      if (!mainNav.contains(event.target) && !menuToggle.contains(event.target)) {
        mainNav.classList.remove('toggled');
        menuToggle.setAttribute('aria-expanded', 'false');
      }
    }
  });

  // Handle submenu toggles
  const subMenuToggles = document.querySelectorAll('.menu-item-has-children > a');

  subMenuToggles.forEach((toggle) => {
    toggle.addEventListener('click', function (e) {
      if (window.innerWidth < 768) {
        // Only on mobile
        e.preventDefault();
        const parent = this.parentElement;
        parent.classList.toggle('toggled');
      }
    });
  });
});
