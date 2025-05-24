<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="icon" href="<?php echo get_site_icon_url(); ?>" type="image/png">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <link href="https://db.onlinewebfonts.com/c/17539719b4e0eb2d54284f9ecce700e1?family=Amazing+Kids" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'rbfresh'); ?></a>

    <?php get_template_part('assets/html/blocks/blockHeader'); ?> 