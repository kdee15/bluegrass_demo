<?php
/**
 * Theme functions and definitions
 */

// Theme setup
function rbfresh_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'rbfresh'),
        'footer' => esc_html__('Footer Menu', 'rbfresh'),
    ));

    // Enable HTML5 markup for specific elements
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'rbfresh_setup');

// Enqueue scripts and styles
function rbfresh_scripts() {
    // Enqueue main stylesheet (style.css in theme root)
    wp_enqueue_style('rbfresh-style', get_stylesheet_uri());
    
    // Enqueue compiled SASS
    $css_file = get_template_directory() . '/assets/css/main.css';
    // Only enqueue if the file exists
    if (file_exists($css_file)) {
        wp_enqueue_style('rbfresh-main', get_template_directory_uri() . '/assets/css/main.css', array(), filemtime($css_file));
    }
    
    // Enqueue JavaScript
    wp_enqueue_script('rbfresh-navigation', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0.0', true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'rbfresh_scripts');

/**
 * Include the dynamic CSS file
 */
require get_template_directory() . '/inc/dynamic-css.php';

// Register widget area (sidebar)
function rbfresh_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'rbfresh'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'rbfresh'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'rbfresh_widgets_init');