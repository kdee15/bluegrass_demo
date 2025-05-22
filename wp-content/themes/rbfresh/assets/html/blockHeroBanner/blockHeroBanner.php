<?php
/**
 * Hero Banner Block with Swiper Carousel
 */

// Query carousel slides
$args = [
    'post_type'      => 'carousel',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
];

$carousel_query = new WP_Query($args);
?>

<div class="hero-banner">
    <?php if ($carousel_query->have_posts()) : ?>
        <!-- Swiper -->
        <div class="swiper hero-banner__swiper">
            <div class="swiper-wrapper">
                <?php while ($carousel_query->have_posts()) : $carousel_query->the_post(); ?> 
                    <div class="swiper-slide">
                        <div class="hero-banner__content">
                            <h1 class="hero-banner__title fntH1"><?php the_title(); ?></h1>
                            <div class="hero-banner__text fnt20">
                                <?php the_content(); ?>
                            </div>
                            <a class="btn btn--red fnt20" href="<?php the_field('cta_url') ?>">
                                <?php the_field('cta_label') ?>    
                            </a>
                        </div>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="hero-banner__image">
                                <svg class="hero-banner__svg--left svg__mobile" width="100%" height="100%" viewBox="0 0 768 71" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                    <path d="M0 70.9999V0.98291H768L0 70.9999Z" fill="#221F20"/>
                                </svg>
                                <?php the_post_thumbnail('full', ['class' => 'hero-banner__img']); ?>
                            </div>
                        <?php endif; ?>
                        <svg class="hero-banner__svg--left svg__desk" width="100%" height="100%" viewBox="0 0 728 680" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                            <path class="hero-banner__path" d="M-0.5 680H728L597 5.03583e-05L-0.5 0V680Z" fill="#221F20"/>
                        </svg>
                        <svg class="hero-banner__svg--skew svg__mobile" width="360" height="751" viewBox="0 0 360 751" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                            <path opacity="0.2" d="M0 0L360 751V0H144.211H0Z" fill="#221F20" fill-opacity="0.3"/>
                        </svg>
                        <svg class="hero-banner__svg--skew svg__desk" width="1059" height="682" viewBox="0 0 1059 682" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                            <path opacity="0.2" d="M1059 0L0 682V0H634.779H1059Z" fill="#221F20" fill-opacity="0.3"/>
                        </svg>
                        <svg class="hero-banner__svg--one" width="720" height="90" viewBox="0 0 720 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.77526e-06 0.000307085L1.56433e-05 90.0003L720 45.0002L7.77526e-06 0.000307085Z" fill="#31343D"/>
                        </svg>
                        <svg class="hero-banner__svg--two" width="720" height="90" viewBox="0 0 720 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.17093e-05 45.0003L720 90.0002L720 0.000244141L1.17093e-05 45.0003Z" fill="#221F20" fill-opacity="0.3"/>
                        </svg>
                        <svg class="hero-banner__svg--three" width="1440" height="45" viewBox="0 0 1440 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.94846e-05 45.0004L1440 45.0002L720 0.000307085L1.94846e-05 45.0004Z" fill="white"/>
                        </svg>
                    </div>
                <?php endwhile; ?>
            </div>
            <!-- Add Navigation -->
            <div class="hero-banner__nav hero-banner__nav--next swiper-button-next"></div>
            <div class="hero-banner__nav hero-banner__nav--prev swiper-button-prev"></div>
            <!-- Add Pagination -->
            <div class="hero-banner__pagination swiper-pagination"></div>
        </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const heroPath = document.querySelector('.hero-banner__path');
    let isAnimating = false;

    const swiper = new Swiper('.hero-banner__swiper', {
        loop: true,
        speed: 1000,
        navigation: {
            nextEl: '.hero-banner__nav--next',
            prevEl: '.hero-banner__nav--prev',
        },
        pagination: {
            el: '.hero-banner__pagination',
            clickable: true,
        },
        on: {
            slideChangeTransitionStart() {
                if (!isAnimating) {
                    isAnimating = true;
                    heroPath.style.animation = 'none';
                    heroPath.offsetHeight; // Trigger reflow
                    heroPath.style.animation = 'morphPath 1s ease-in-out forwards';
                }
            },
            slideChangeTransitionEnd() {
                setTimeout(() => {
                    isAnimating = false;
                }, 1000);
            },
        },
    });

    // Make navigation visible
    const navButtons = document.querySelectorAll('.hero-banner__nav');
    navButtons.forEach(button => {
        button.style.display = 'flex';
        button.style.opacity = '1';
    });
});
</script>