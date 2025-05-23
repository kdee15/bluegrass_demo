<?php
/**
 * Template part for displaying the three column block
 *
 * @package RB_Fresh
 */

// Get the first three_column post to access the block header and CTA
$block_post = get_posts(array(
    'post_type' => 'three_column',
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'DESC'
));

if ($block_post) {
    $header = get_field('three_column_header', $block_post[0]->ID);
    $intro = get_field('three_column_intro', $block_post[0]->ID);
    $cta = get_field('three_column_cta', $block_post[0]->ID);
}

// Get all three column posts and sort by order
$args = array(
    'post_type' => 'three_column',
    'posts_per_page' => -1,
    'meta_key' => 'three_column_order',
    'orderby' => 'meta_value_num',
    'order' => 'ASC'
);

$query = new WP_Query($args);
?>

<section class="three-column">
    <div class="container">
        <?php if ($header) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="three-column__header">
                        <?php if ($header['title']) : ?>
                            <h2 class="three-column__title fntH2"><?php echo esc_html($header['title']); ?></h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($intro) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="three-column__intro">
                        <?php echo wp_kses_post($intro); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row three-column__grid">
            <?php
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="col-12 col-md-4">
                        <div class="three-column__item">
                            <div class="three-column__skew">
                                <div class="three-column__wrapper">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="three-column__image">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="three-column__content">
                                        <h3 class="three-column__title fntH3"><?php the_title(); ?></h3>
                                        <div class="three-column__text">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>

        <?php if ($cta && $cta['text'] && $cta['url']) : ?>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="<?php echo esc_url($cta['url']); ?>" class="btn btn--red-hollow">
                        <?php echo esc_html($cta['text']); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section> 