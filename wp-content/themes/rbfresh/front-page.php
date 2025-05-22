<?php
/**
 * The template for displaying the front page
 *
 * @package RB_Fresh
 */

get_header(); ?>

<main id="primary" class="site-main">
	<?php get_template_part( 'assets/html/blockHeroBanner/blockHeroBanner' ); ?>
	<?php get_template_part( 'assets/html/blockCardGrid/blockCardGrid' ); ?>
	<?php get_template_part( 'assets/html/blockTwoColumn/blockTwoColumn' ); ?>
</main>

<?php
get_footer();
