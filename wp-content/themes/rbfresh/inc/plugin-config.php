<?php
/**
 * Plugin Configuration
 * Best practices for WordPress plugins
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Wordfence Security Configuration
function rbfresh_configure_wordfence() {
    if (class_exists('wfConfig')) {
        // Firewall settings
        wfConfig::set('firewallEnabled', true);
        wfConfig::set('wafStatus', 'enabled');
        wfConfig::set('blockFakeBots', true);
        wfConfig::set('scanType', 'full');
        
        // Real-time traffic monitoring
        wfConfig::set('liveTrafficEnabled', true);
        wfConfig::set('liveTraf_ignorePublishers', true);
        wfConfig::set('liveTraf_ignoreUsers', true);
        
        // Email alerts
        wfConfig::set('alertEmails', get_option('admin_email'));
        wfConfig::set('alertOn_warnings', true);
        wfConfig::set('alertOn_block', true);
        wfConfig::set('alertOn_critical', true);
        
        // Scan settings
        wfConfig::set('scheduledScansEnabled', true);
        wfConfig::set('schedMode', 'manual');
        wfConfig::set('scan_exclude', array());
        wfConfig::set('scan_include_extra', array());
        
        // Advanced settings
        wfConfig::set('disableCodeExecutionUploads', true);
        wfConfig::set('disableCookies', false);
        wfConfig::set('disableWAFIPBlocking', false);
    }
}

// Yoast SEO Configuration
function rbfresh_configure_yoast() {
    if (class_exists('WPSEO_Options')) {
        // General settings
        WPSEO_Options::set('enable_xml_sitemap', true);
        WPSEO_Options::set('enable_admin_bar_menu', true);
        WPSEO_Options::set('enable_cornerstone_content', true);
        
        // Social media
        WPSEO_Options::set('opengraph', true);
        WPSEO_Options::set('twitter', true);
        WPSEO_Options::set('og_default_image', get_template_directory_uri() . '/assets/images/default-social.jpg');
        
        // Breadcrumbs
        WPSEO_Options::set('breadcrumbs-enable', true);
        WPSEO_Options::set('breadcrumbs-sep', '»');
        WPSEO_Options::set('breadcrumbs-home', 'Home');
        
        // Advanced settings
        WPSEO_Options::set('disableadvanced_meta', false);
        WPSEO_Options::set('enable_headless_rest_endpoints', true);
        WPSEO_Options::set('tracking', true);
    }
}

// WP Rocket Configuration
function rbfresh_configure_wprocket() {
    if (function_exists('get_rocket_option')) {
        $settings = array(
            // Cache settings
            'cache_mobile' => 1,
            'cache_logged_user' => 0,
            'cache_ssl' => 1,
            'cache_reject_uri' => array(),
            'cache_reject_cookies' => array(),
            'cache_reject_ua' => array(),
            
            // Minification
            'minify_css' => 1,
            'minify_js' => 1,
            'minify_html' => 1,
            'minify_google_fonts' => 1,
            'combine_google_fonts' => 1,
            'remove_query_strings' => 1,
            
            // JavaScript
            'defer_all_js' => 1,
            'defer_all_js_safe' => 1,
            'exclude_js' => array(),
            'exclude_inline_js' => array(),
            
            // CSS
            'async_css' => 1,
            'critical_css' => '',
            'exclude_css' => array(),
            
            // Media
            'lazyload' => 1,
            'lazyload_iframes' => 1,
            'lazyload_youtube' => 1,
            'lazyload_googlemaps' => 1,
            
            // Preload
            'preload_fonts' => array(),
            'preload_links' => 1,
            'sitemap_preload' => 1,
            'sitemap_preload_url_crawl' => 500000,
            
            // Database
            'database_revisions' => 1,
            'database_auto_drafts' => 1,
            'database_trashed_posts' => 1,
            'database_spam_comments' => 1,
            'database_trashed_comments' => 1,
            'database_expired_transients' => 1,
            'database_all_transients' => 1,
            'database_optimize_tables' => 1,
            
            // CDN
            'cdn' => 0,
            'cdn_cnames' => array(),
            'cdn_zone' => array(),
            'cdn_reject_files' => array(),
        );
        
        update_option('wp_rocket_settings', $settings);
    }
}

// Autoptimize Configuration
function rbfresh_configure_autoptimize() {
    if (class_exists('autoptimizeConfig')) {
        // CSS optimization
        update_option('autoptimize_css', 'on');
        update_option('autoptimize_css_defer', 'on');
        update_option('autoptimize_css_defer_inline', 'on');
        update_option('autoptimize_css_include_inline', 'on');
        update_option('autoptimize_css_exclude', 'wp-includes/css/dist/, admin-bar.min.css, dashicons.min.css');
        
        // JavaScript optimization
        update_option('autoptimize_js', 'on');
        update_option('autoptimize_js_defer_not_aggregate', 'on');
        update_option('autoptimize_js_include_inline', 'on');
        update_option('autoptimize_js_exclude', 'wp-includes/js/dist/, wp-includes/js/tinymce/, js/jquery/jquery.js');
        
        // HTML optimization
        update_option('autoptimize_html', 'on');
        update_option('autoptimize_html_keepcomments', 'off');
        
        // Advanced settings
        update_option('autoptimize_optimize_logged', 'off');
        update_option('autoptimize_optimize_checkout', 'off');
        update_option('autoptimize_show_adv', 'on');
    }
}

// UpdraftPlus Configuration
function rbfresh_configure_updraftplus() {
    if (class_exists('UpdraftPlus_Options')) {
        // Backup schedule
        UpdraftPlus_Options::update_updraft_option('updraft_interval', 'daily');
        UpdraftPlus_Options::update_updraft_option('updraft_interval_database', 'daily');
        UpdraftPlus_Options::update_updraft_option('updraft_interval_increments', 6);
        
        // Retention
        UpdraftPlus_Options::update_updraft_option('updraft_retain', 7);
        UpdraftPlus_Options::update_updraft_option('updraft_retain_db', 7);
        
        // Backup contents
        UpdraftPlus_Options::update_updraft_option('updraft_backupdb_nonwp', true);
        UpdraftPlus_Options::update_updraft_option('updraft_backupdb_encrypted', true);
        UpdraftPlus_Options::update_updraft_option('updraft_encryptionphrase', wp_generate_password(32, true, true));
        
        // Storage
        UpdraftPlus_Options::update_updraft_option('updraft_service', '');
        UpdraftPlus_Options::update_updraft_option('updraft_s3', array());
        UpdraftPlus_Options::update_updraft_option('updraft_googlecloud', array());
    }
}

// ShortPixel Configuration
function rbfresh_configure_shortpixel() {
    if (class_exists('ShortPixel')) {
        // Compression settings
        update_option('wp-short-pixel-compression', 2); // Lossy compression
        update_option('wp-short-pixel-backup-images', 1);
        update_option('wp-short-pixel-create-webp', 1);
        update_option('wp-short-pixel-create-avif', 1);
        
        // Optimization settings
        update_option('wp-short-pixel-optimize-uploads', 1);
        update_option('wp-short-pixel-optimize-retina', 1);
        update_option('wp-short-pixel-optimize-pdfs', 1);
        
        // Advanced settings
        update_option('wp-short-pixel-keep-exif', 0);
        update_option('wp-short-pixel-optimize-unlisted', 0);
        update_option('wp-short-pixel-optimize-media-library', 1);
    }
}

// Initialize plugin configurations
function rbfresh_init_plugin_configs() {
    rbfresh_configure_wordfence();
    rbfresh_configure_yoast();
    rbfresh_configure_wprocket();
    rbfresh_configure_autoptimize();
    rbfresh_configure_updraftplus();
    rbfresh_configure_shortpixel();
}
add_action('admin_init', 'rbfresh_init_plugin_configs');

// Add plugin recommendations to the admin notice
function rbfresh_plugin_recommendations() {
    $recommended_plugins = array(
        'wordfence/wordfence.php' => 'Wordfence Security',
        'wordpress-seo/wp-seo.php' => 'Yoast SEO',
        'wp-rocket/wp-rocket.php' => 'WP Rocket',
        'autoptimize/autoptimize.php' => 'Autoptimize',
        'updraftplus/updraftplus.php' => 'UpdraftPlus',
        'shortpixel-image-optimiser/wp-shortpixel.php' => 'ShortPixel',
        'redirection/redirection.php' => 'Redirection',
        'query-monitor/query-monitor.php' => 'Query Monitor',
        'wp-mail-smtp/wp-mail-smtp.php' => 'WP Mail SMTP',
        'really-simple-ssl/rlrsssl-really-simple-ssl.php' => 'Really Simple SSL'
    );

    $missing_plugins = array();
    foreach ($recommended_plugins as $plugin_path => $plugin_name) {
        if (!is_plugin_active($plugin_path)) {
            $missing_plugins[] = $plugin_name;
        }
    }

    if (!empty($missing_plugins)) {
        ?>
        <div class="notice notice-warning">
            <p><strong>Recommended Plugins:</strong> The following plugins are recommended for optimal site performance and security:</p>
            <ul>
                <?php foreach ($missing_plugins as $plugin) : ?>
                    <li><?php echo esc_html($plugin); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
    }
}
add_action('admin_notices', 'rbfresh_plugin_recommendations'); 