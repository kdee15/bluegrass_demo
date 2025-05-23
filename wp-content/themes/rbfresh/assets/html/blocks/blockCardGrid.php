<?php
/**
 * Template part for displaying the card grid
 *
 * @package RB_Fresh
 */

// Query cards
$args = [
    'post_type'      => 'card_grid',
    'posts_per_page' => 6,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
];

$card_query = new WP_Query($args);
?>

<div class="card-grid">
    <div class="container">
        <div class="row">
            <h2 class="card-grid__title fntH2">What industry would you like to work in?</h2>
        </div>
        <div class="row card-grid__wrapper">
            <?php if ($card_query->have_posts()) : ?>
                <?php while ($card_query->have_posts()) : $card_query->the_post(); ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <?php if (get_field('isCta')) : ?>
                            <div class="grid-card grid-card--cta">
                                <div class="grid-card__content">
                                    <h3 class="grid-card__title fntH3"><?php the_title(); ?></h3>
                                    <div class="grid-card__text">
                                        <?php the_content(); ?>
                                    </div>
                                    <a href="<?php the_field('cta_url'); ?>" class="btn--small btn--white-hollow">
                                        <?php the_field('cta_label'); ?>
                                    </a>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="grid-card grid-card--image" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url()); ?>);">
                                <div class="grid-card__content">
                                    <h3 class="grid-card__title fnt18"><?php the_title(); ?></h3>
                                </div>
                                <div class="blur-overlay"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
</div>