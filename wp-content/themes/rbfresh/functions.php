<?php
/**
 * Theme functions and definitions
 */

// Prevent direct access
if (! defined('ABSPATH')) {
    exit;
}

// Theme setup
function rbfresh_setup()
{
    // Add theme support
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus([
        'primary' => esc_html__('Primary Menu', 'rbfresh'),
        'footer' => esc_html__('Footer Menu', 'rbfresh'),
    ]);

    // Enable HTML5 markup for specific elements
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ]);
}
add_action('after_setup_theme', 'rbfresh_setup');

// Enqueue scripts and styles
function rbfresh_scripts()
{
    // Deregister default WordPress jQuery and enqueue a newer version
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', [], '3.7.1', true);

    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', [], '5.3.3', 'all');

    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', ['jquery'], '5.3.3', true);

    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4', 'all');

    // Enqueue Swiper CSS
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '11.0.0', 'all');

    // Enqueue Swiper JS
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], '11.0.0', false);

    // Enqueue GSAP and ScrollTrigger
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', [], '3.12.5', false);
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', ['gsap'], '3.12.5', false);

    // Enqueue animation files
    $cardgrid_js = get_template_directory() . '/assets/js/cardgrid-animations.js';
    if (file_exists($cardgrid_js)) {
        wp_enqueue_script('cardgrid-animations', get_template_directory_uri() . '/assets/js/cardgrid-animations.js', ['gsap', 'gsap-scrolltrigger'], filemtime($cardgrid_js), false);
    }

    $twocolumn_js = get_template_directory() . '/assets/js/twocolumn-animations.js';
    if (file_exists($twocolumn_js)) {
        wp_enqueue_script('twocolumn-animations', get_template_directory_uri() . '/assets/js/twocolumn-animations.js', ['gsap', 'gsap-scrolltrigger'], filemtime($twocolumn_js), false);
    }

    $threecolumn_js = get_template_directory() . '/assets/js/threecolumn-animations.js';
    if (file_exists($threecolumn_js)) {
        wp_enqueue_script('threecolumn-animations', get_template_directory_uri() . '/assets/js/threecolumn-animations.js', ['gsap', 'gsap-scrolltrigger'], filemtime($threecolumn_js), false);
    }

    // Enqueue hero banner animations
    $hero_banner_js = get_template_directory() . '/assets/js/hero-banner.js';
    if (file_exists($hero_banner_js)) {
        wp_enqueue_script('rbfresh-hero-banner', get_template_directory_uri() . '/assets/js/hero-banner.js', ['jquery'], filemtime($hero_banner_js), true);
    }

    // Enqueue main stylesheet (style.css in theme root)
    wp_enqueue_style('rbfresh-style', get_stylesheet_uri());
    
    // Enqueue compiled SASS
    $css_file = get_template_directory() . '/assets/css/main.css';
    // Only enqueue if the file exists
    if (file_exists($css_file)) {
        wp_enqueue_style('rbfresh-main', get_template_directory_uri() . '/assets/css/main.css', [], filemtime($css_file));
    }
    
    // Enqueue JavaScript
    wp_enqueue_script('rbfresh-navigation', get_template_directory_uri() . '/assets/js/navigation.js', ['jquery'], '1.0', true);
    wp_enqueue_script('rbfresh-header', get_template_directory_uri() . '/assets/js/header.js', ['jquery'], '1.0', true);
    wp_enqueue_script('rbfresh-footer', get_template_directory_uri() . '/assets/js/footer.js', ['jquery'], '1.0', true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'rbfresh_scripts');

// Include required files
$required_files = [
    '/inc/dynamic-css.php',
    '/inc/acf-fields.php',
    '/inc/populate-footer.php',
    '/inc/plugin-config.php',
];

foreach ($required_files as $file) {
    $file_path = get_template_directory() . $file;
    if (file_exists($file_path)) {
        require_once $file_path;
    }
}

// Register ACF Options Page
if (function_exists('acf_add_options_page')) {
    try {
        // Create a custom admin page for theme settings
        add_action('admin_menu', 'rbfresh_add_theme_settings_page');
        function rbfresh_add_theme_settings_page()
        {
            add_menu_page(
                'Theme Settings',
                'Theme Settings',
                'manage_options',
                'theme-settings',
                'rbfresh_theme_settings_page',
                'dashicons-admin-customizer',
                59.3
            );
        }

        // Theme settings page content
        function rbfresh_theme_settings_page()
        {
            ?>
            <div class="wrap">
                <h1>Theme Settings</h1>
                <form method="post" action="options.php">
                    <?php
                    settings_fields('theme_settings');
            do_settings_sections('theme_settings');
            submit_button(); ?>
                </form>
            </div>
            <?php
        }

        // Register settings
        add_action('admin_init', 'rbfresh_register_theme_settings');
        function rbfresh_register_theme_settings()
        {
            register_setting('theme_settings', 'footer_logo');
            register_setting('theme_settings', 'social_links');
            register_setting('theme_settings', 'contact_details');
            register_setting('theme_settings', 'footer_columns');
            register_setting('theme_settings', 'footer_copy');
            register_setting('theme_settings', 'legal_links');
        }
    } catch (Exception $e) {
        error_log('Error adding theme settings page: ' . $e->getMessage());
    }
}

// Register widget area (sidebar)
function rbfresh_widgets_init()
{
    register_sidebar([
        'name' => esc_html__('Sidebar', 'rbfresh'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'rbfresh'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);
}
add_action('widgets_init', 'rbfresh_widgets_init');

// Register custom post types
function register_custom_post_types()
{
    // Carousel
    register_post_type('carousel', [
        'labels' => [
            'name' => _x('Carousel', 'post type general name'),
            'singular_name' => _x('Carousel Pic', 'post type singular name'),
            'add_new' => _x('Add New', 'Carousel Pic'),
            'add_new_item' => __('Add New Carousel Pic'),
            'edit_item' => __('Edit Carousel'),
            'new_item' => __('New Carousel Pic'),
            'all_items' => __('All Carousel Pics'),
            'view_item' => __('View Carousel'),
            'menu_name' => 'Carousel',
        ],
        'description' => 'A list of Carousel Pics',
        'public' => true,
        'menu_position' => 3,
        'supports' => ['title', 'editor', 'thumbnail', 'taxonomies', 'categories', 'media', 'content'],
        'has_archive' => true,
    ]);

    // Card Grid
    register_post_type('card_grid', [
        'labels' => [
            'name' => _x('Six Card Grid', 'post type general name'),
            'singular_name' => _x('Card', 'post type singular name'),
            'add_new' => _x('Add New', 'Card'),
            'add_new_item' => __('Add New Card'),
            'edit_item' => __('Edit Card'),
            'new_item' => __('New Card'),
            'all_items' => __('All Cards'),
            'view_item' => __('View Card'),
            'menu_name' => 'Six Card Grid',
        ],
        'description' => 'A list of Cards',
        'public' => true,
        'menu_position' => 4,
        'supports' => ['title', 'editor', 'thumbnail', 'taxonomies', 'categories', 'media', 'content'],
        'has_archive' => true,
    ]);

    // Two Column
    register_post_type('two_column', [
        'labels' => [
            'name' => _x('Two Column', 'post type general name'),
            'singular_name' => _x('Two Column', 'post type singular name'),
            'add_new' => _x('Add New', 'Two Column'),
            'add_new_item' => __('Add New Two Column'),
            'edit_item' => __('Edit Two Column'),
            'new_item' => __('New Two Column'),
            'all_items' => __('All Two Column'),
            'view_item' => __('View Two Column'),
            'menu_name' => 'Two Column',
        ],
        'description' => 'Two Column Layout',
        'public' => true,
        'menu_position' => 5,
        'supports' => ['title', 'editor', 'thumbnail', 'taxonomies', 'categories', 'excerpt', 'content'],
        'has_archive' => true,
    ]);

    // Three Column
    register_post_type('three_column', [
        'labels' => [
            'name' => _x('Three Column', 'post type general name'),
            'singular_name' => _x('Three Column', 'post type singular name'),
            'add_new' => _x('Add New', 'Three Column'),
            'add_new_item' => __('Add New Three Column'),
            'edit_item' => __('Edit Three Column'),
            'new_item' => __('New Three Column'),
            'all_items' => __('All Three Column'),
            'view_item' => __('View Three Column'),
            'menu_name' => 'Three Column',
        ],
        'description' => 'Three Column Layout',
        'public' => true,
        'menu_position' => 6,
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
        'has_archive' => true,
        'show_in_rest' => true,
        'show_in_admin_bar' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-grid-view',
        'capability_type' => 'post',
        'hierarchical' => false,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'three-column'],
    ]);
}
add_action('init', 'register_custom_post_types');
