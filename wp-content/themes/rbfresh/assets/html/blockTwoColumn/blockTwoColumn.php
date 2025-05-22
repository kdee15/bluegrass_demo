<section class="two-column">
    <div class="container">
        <div class="row">
            <?php
            $args = [
                'post_type'      => 'two_column',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ];
            
            $two_column = new WP_Query($args);
            
            if ($two_column->have_posts()) :
                while ($two_column->have_posts()) : $two_column->the_post(); ?>
                    <div class="col-12 col-lg-6 two-column__body">
                        <div class="two-column__content">
                            <h2 class="two-column__title">
                                <span class="two-column__title--first"><?php the_title(); ?></span>
                                <span class="two-column__title--second"><?php the_field('sub_text'); ?></span>
                            </h2>
                            <div class="two-column__copy">
                            <?php the_content(); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 two-column__image">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>