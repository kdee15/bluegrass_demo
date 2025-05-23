function rbfresh_scripts() {
    // Debug log
    error_log('rbfresh_scripts function called');

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
    
    // Enqueue GSAP and ScrollTrigger
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', [], '3.12.5', true);
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', ['gsap'], '3.12.5', true);
    
    // Debug log for cardgrid-animations.js
    $cardgrid_js = get_template_directory() . '/assets/js/cardgrid-animations.js';
    error_log('Cardgrid JS path: ' . $cardgrid_js);
    error_log('Cardgrid JS exists: ' . (file_exists($cardgrid_js) ? 'yes' : 'no'));
    
    wp_enqueue_script('cardgrid-animations', get_template_directory_uri() . '/assets/js/cardgrid-animations.js', ['gsap', 'gsap-scrolltrigger'], filemtime($cardgrid_js), true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'rbfresh_scripts'); 