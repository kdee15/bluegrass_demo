<?php
/**
 * Theme functions and definitions
 */

// Theme setup
function rbfresh_setup() {
    // Add theme support
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
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
    // Deregister default WordPress jQuery and enqueue a newer version
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), '3.7.1', true);

    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3', 'all');

    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.3', true);

    // Enqueue Swiper CSS
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0', 'all');

    // Enqueue Swiper JS
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);

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


// A.2 CUSTOM CONTENT TYPES +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// A.2.1. HOMEPAGE CAROUSEL ---------------------------------------------------------------------------------------

function carousel() {
  $labels = array(
    'Title'              => _x( 'Carousel', 'post type general name' ),
    'singular_name'      => _x( 'Carousel Pics', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Carousel Pic' ),
    'add_new_item'       => __( 'Add New Carousel Pic' ),
    'edit_item'          => __( 'Edit Carousel' ),
    'new_item'           => __( 'New Carousel Pic' ),
    'all_items'          => __( 'All Carousel Pics' ),
    'view_item'          => __( 'View Carousel' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Carousel'
  );

  $args = array(
    'labels'         => $labels,
    'description'   => 'A list of Carousel Pics',
    'public'        => true,
    'menu_position' => 3,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'taxonomies', 'categories', 'media', 'content' ),
    'has_archive'   => true,

  );

  register_post_type( 'carousel', $args );
}

add_action( 'init', 'carousel' );
  
// A.2.1. End -----------------------------------------------------------------------------------------------------

// A.2.2. SIX CARD GRID -------------------------------------------------------------------------------------------

function card_grid() {
    $labels = array(
      'Title'              => _x( 'Six Card Grid', 'post type general name' ),
      'singular_name'      => _x( 'Card', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'Card' ),
      'add_new_item'       => __( 'Add New Card' ),
      'edit_item'          => __( 'Edit Card' ),
      'new_item'           => __( 'New Card' ),
      'all_items'          => __( 'All Cards' ),
      'view_item'          => __( 'View Card' ),
      'parent_item_colon'  => '',
      'menu_name'          => 'Six Card Grid'
    );
  
    $args = array(
      'labels'         => $labels,
      'description'   => 'A list of Cards',
      'public'        => true,
      'menu_position' => 4,
      'supports'      => array( 'title', 'editor', 'thumbnail', 'taxonomies', 'categories', 'media', 'content' ),
      'has_archive'   => true,
  
    );
  
    register_post_type( 'card_grid', $args );
  }
  
  add_action( 'init', 'card_grid' );
  
// A.2.2. End -----------------------------------------------------------------------------------------------------

// A.2.2. SIX CARD GRID -------------------------------------------------------------------------------------------

function two_column() {
    $labels = array(
      'Title'              => _x( 'Two Column', 'post type general name' ),
      'singular_name'      => _x( 'Two Column', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'Two Column' ),
      'add_new_item'       => __( 'Add New Two Column' ),
      'edit_item'          => __( 'Edit Two Column' ),
      'new_item'           => __( 'New Two Column' ),
      'all_items'          => __( 'All Two Column' ),
      'view_item'          => __( 'View Two Column' ),
      'parent_item_colon'  => '',
      'menu_name'          => 'Two Column'
    );
  
    $args = array(
      'labels'         => $labels,
      'description'   => 'Two Column Layout',
      'public'        => true,
      'menu_position' => 5,
      'supports'      => array( 'title', 'editor', 'thumbnail', 'taxonomies', 'categories', 'excerpt', 'content' ),
      'has_archive'   => true,
  
    );
  
    register_post_type( 'two_column', $args );
  }
  
  add_action( 'init', 'two_column' );
  
// A.2.2. End -----------------------------------------------------------------------------------------------------


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