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
        <div class="row">
            <?php if ($card_query->have_posts()) : ?>
                <?php while ($card_query->have_posts()) : $card_query->the_post(); ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <?php if (get_field('isCta')) : ?>
                            <div class="card-grid__card card__cta">
                                <div class="card-grid__content">
                                    <h3 class="card-grid__title"><?php the_title(); ?></h3>
                                    <div class="card-grid__text">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="card-grid__card" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
                                <div class="card-grid__content">
                                    <h3 class="card-grid__title"><?php the_title(); ?></h3>
                                    <div class="card-grid__text">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
</div>