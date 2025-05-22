<?php
/**
 * Template part for displaying the hero banner
 *
 * @package RB_Fresh
 */
?>

<section class="hero">
    <div class="hero__container">
        <div class="hero__content">
            <h1 class="hero__title">cardGrid</h1>

    </div>
    </div>
</section>

<?php
/**
 * Card Grid Block
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
    <?php if ($card_query->have_posts()) : ?>
        <div class="card-grid__container">
            <?php while ($card_query->have_posts()) : $card_query->the_post(); 
                $cardColor = get_field('cardColor') ?: '#ffffff';
                $cardIcon = get_field('cardIcon');
                $ctaLabel = get_field('ctaLabel');
                $ctaLink = get_field('ctaLink');

                // Debug output
                error_log('Card ID: ' . get_the_ID());
                error_log('Card Color: ' . print_r($cardColor, true));
                error_log('Card Icon: ' . print_r($cardIcon, true));
                error_log('CTA Label: ' . print_r($ctaLabel, true));
                error_log('CTA Link: ' . print_r($ctaLink, true));
            ?>
                <div class="card-grid__card" style="background-color: <?php echo esc_attr($cardColor); ?>">
                    <?php if ($cardIcon) : ?>
                        <div class="card-grid__icon">
                            <img src="<?php echo esc_url($cardIcon['url']); ?>" 
                                 alt="<?php echo esc_attr($cardIcon['alt']); ?>" 
                                 class="card-grid__icon-img">
                        </div>
                    <?php endif; ?>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="card-grid__image">
                            <?php the_post_thumbnail('full', ['class' => 'card-grid__img']); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-grid__content">
                        <h3 class="card-grid__title"><?php the_title(); ?></h3>
                        <div class="card-grid__text">
                            <?php the_content(); ?>
                        </div>
                        <?php if ($ctaLabel && $ctaLink) : ?>
                            <a href="<?php echo esc_url($ctaLink); ?>" class="card-grid__cta">
                                <?php echo esc_html($ctaLabel); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</div>