jQuery(document).ready(function ($) {
  const heroBanner = $('.hero-banner');
  if (!heroBanner.length) return;

  heroBanner.on('mousemove', function (e) {
    const rect = this.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    // Calculate mouse position relative to center of hero banner
    const centerX = rect.width / 2;
    const centerY = rect.height / 2;

    // Calculate the movement values (negative for reverse movement)
    const moveX = -(x - centerX);
    const moveY = -(y - centerY);

    // Set CSS variables for mouse position
    $(this).css({
      '--mouse-x': moveX,
      '--mouse-y': moveY,
    });
  });

  // Reset position when mouse leaves
  heroBanner.on('mouseleave', function () {
    $(this).css({
      '--mouse-x': 0,
      '--mouse-y': 0,
    });
  });
});
