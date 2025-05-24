<section class="two-column">
    <div class="container">
        <div class="row">
            <?php
            $args = [
                'post_type' => 'two_column',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            ];
            
            $two_column = new WP_Query($args);
            
            if ($two_column->have_posts()) :
                while ($two_column->have_posts()) : $two_column->the_post(); ?>
                    <div class="col-12 offset-lg-1 col-lg-5 two-column__body">
                        <div class="two-column__content">
                            <h2 class="two-column__title fntH2">
                                <span class="two-column__title--first">
                                    <?php get_template_part('assets/html/elements/svg--learn'); ?>
                                </span>
                                <span class="two-column__title--second"><?php the_field('sub_text'); ?></span>
                            </h2>
                            <div class="two-column__copy">
                                <?php the_excerpt(); ?>
                                <?php the_content(); ?>
                                <a class="btn btn--red-hollow" href="<?php the_field('cta_url'); ?>">
                                    <?php the_field('cta_label'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 two-column__image"> 
                        <div class="two-column__wrapper">
                            <div class="two-column__skew--desk"></div>
                            <figure class="two-column__figure" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url()); ?>);">
                                <?php the_post_thumbnail(); ?>
                                <div class="two-column__skew--mobi"></div>
                            </figure>
                        </div>
                    </div>
                <?php endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>