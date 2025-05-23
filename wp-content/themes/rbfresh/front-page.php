<?php
/**
 * The template for displaying the front page
 *
 * @package RB_Fresh
 */

get_header(); ?>

<main id="primary" class="site-main">
	<?php get_template_part( 'assets/html/blocks/blockHeroBanner' ); ?>
	<?php get_template_part( 'assets/html/blocks/blockCardGrid' ); ?>
	<?php get_template_part( 'assets/html/blocks/blockTwoColumn' ); ?>
	<?php get_template_part( 'assets/html/blocks/blockTwoColumn' ); ?>
</main>

<?php
get_footer();
