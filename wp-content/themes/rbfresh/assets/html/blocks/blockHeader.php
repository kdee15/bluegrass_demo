<?php
/**
 * Header Block
 */
?>

<header class="header">
  <div class="header__container container">
    <div class="header__row row">
      <!-- Logo Column -->
      <div class="header__col col-12 col-lg-3">
        <div class="header__logo">
          <a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/elements/logo--rosebank.png" alt="Rosebank College Logo" />
          </a>
        </div>
      </div>

      <!-- Navigation Column -->
      <div class="header__col col-12 col-lg-9">
        <!-- Burger Menu Button -->
        <button class="header__burger" aria-label="Toggle Menu">
          <span></span>
          <span></span>
          <span></span>
        </button>

        <!-- Mobile Menu Overlay -->
        <div class="header__mobile-overlay"></div>

        <!-- Navigation Wrapper -->
        <div class="header__nav-wrapper">
          <!-- Upper Menu -->
          <nav class="header__nav header__nav--top">
            <ul class="header__menu header__menu--top">
              <li class="header__menu-item"><a href="#" class="fnt12">Payments & Fees</a></li>
              <li class="header__menu-item"><a href="#" class="fnt12">RC Assist</a></li>
              <li class="header__menu-item"><a href="#" class="fnt12">Student Portal</a></li>
              <li class="header__menu-item"><a href="#" class="fnt12">Alumni</a></li>
              <li class="header__menu-item"><a href="#" class="fnt12">Enquire</a></li>
              <li class="header__menu-item">
                <a href="#" class="header__menu-item--sol fnt12">Study Online <i class="fas fa-desktop"></i></a>
              </li>
            </ul>
          </nav>

          <!-- Lower Menu -->
          <nav class="header__nav header__nav--bottom">
            <ul class="header__menu header__menu--bottom">
              <li class="header__menu-item">
                <a href="#" class="fnt12">Faculties</a>
                <ul class="header__submenu">
                  <li><a href="#" class="fnt12">Faculty Item 1</a></li>
                  <li><a href="#" class="fnt12">Faculty Item 2</a></li>
                  <li><a href="#" class="fnt12">Faculty Item 3</a></li>
                </ul>
              </li>
              <li class="header__menu-item">
                <a href="#" class="fnt12">IIE Qualifications</a>
                <ul class="header__submenu">
                  <li><a href="#" class="fnt12">Qualification Item 1</a></li>
                  <li><a href="#" class="fnt12">Qualification Item 2</a></li>
                  <li><a href="#" class="fnt12">Qualification Item 3</a></li>
                </ul>
              </li>
              <li class="header__menu-item">
                <a href="#" class="fnt12">Admissions</a>
                <ul class="header__submenu">
                  <li><a href="#" class="fnt12">Admission Item 1</a></li>
                  <li><a href="#" class="fnt12">Admission Item 2</a></li>
                  <li><a href="#" class="fnt12">Admission Item 3</a></li>
                </ul>
              </li>
              <li class="header__menu-item">
                <a href="#" class="fnt12">About</a>
                <ul class="header__submenu">
                  <li><a href="#" class="fnt12">About Item 1</a></li>
                  <li><a href="#" class="fnt12">About Item 2</a></li>
                  <li><a href="#" class="fnt12">About Item 3</a></li>
                </ul>
              </li>
              <li class="header__menu-item">
                <a href="#" class="fnt12">Contact Us</a>
                <ul class="header__submenu">
                  <li><a href="#" class="fnt12">Contact Item 1</a></li>
                  <li><a href="#" class="fnt12">Contact Item 2</a></li>
                  <li><a href="#" class="fnt12">Contact Item 3</a></li>
                </ul>
              </li>
              <li class="header__menu-item--cta">
                <a href="#" class="btn">Apply Now</a>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
