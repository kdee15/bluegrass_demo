<?php
/**
 * Generate CSS custom properties from Customizer settings
 */
function rbfresh_generate_css_variables()
{
    $css_vars = [
        '--color-primary' => get_theme_mod('rbfresh_primary_color', '#0073aa'),
        '--color-secondary' => get_theme_mod('rbfresh_secondary_color', '#333333'),
        // Add more variables as needed
    ];
    
    $output = ':root {';
    foreach ($css_vars as $var => $value) {
        $output .= $var . ': ' . $value . ';';
    }
    $output .= '}';
    
    return $output;
}

/**
 * Output CSS variables to wp_head
 */
function rbfresh_output_css_variables()
{
    echo '<style id="rbfresh-css-variables">' . rbfresh_generate_css_variables() . '</style>';
}
add_action('wp_head', 'rbfresh_output_css_variables', 5); // Priority 5 ensures it loads before main.css

if (! defined('ABSPATH')) {
    exit;
}

function rbfresh_dynamic_css()
{
    // Add any dynamic CSS here
    return '';
}
