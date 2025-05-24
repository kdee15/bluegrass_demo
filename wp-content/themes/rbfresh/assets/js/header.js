document.addEventListener('DOMContentLoaded', function () {
  const header = document.querySelector('.header');
  const burger = document.querySelector('.header__burger');
  const overlay = document.querySelector('.header__mobile-overlay');
  const menuItems = document.querySelectorAll('.header__menu-item > a');

  // Toggle menu
  function toggleMenu() {
    header.classList.toggle('is-active');
    document.body.style.overflow = header.classList.contains('is-active') ? 'hidden' : '';
  }

  // Close menu
  function closeMenu() {
    header.classList.remove('is-active');
    document.body.style.overflow = '';
  }

  // Event listeners
  burger.addEventListener('click', toggleMenu);
  overlay.addEventListener('click', closeMenu);

  // Handle submenu toggles on mobile
  menuItems.forEach((item) => {
    if (item.nextElementSibling && item.nextElementSibling.classList.contains('header__submenu')) {
      item.addEventListener('click', function (e) {
        if (window.innerWidth < 992) {
          e.preventDefault();
          const submenu = this.nextElementSibling;
          const isVisible = submenu.style.display === 'block';

          // Close all other submenus
          document.querySelectorAll('.header__submenu').forEach((menu) => {
            menu.style.display = 'none';
          });

          // Toggle current submenu
          submenu.style.display = isVisible ? 'none' : 'block';
        }
      });
    }
  });

  // Handle window resize
  window.addEventListener('resize', function () {
    if (window.innerWidth >= 992) {
      closeMenu();
      document.querySelectorAll('.header__submenu').forEach((menu) => {
        menu.style.display = '';
      });
    }
  });
});
