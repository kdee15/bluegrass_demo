<?php
if (!defined('ABSPATH')) {
    exit;
}

// Debug: Check if ACF is active
if (!function_exists('acf_add_local_field_group')) {
    error_log('ACF is not active or not loaded properly');
    return;
}

// Debug: Log when fields are being registered
error_log('Registering Three Column ACF fields');

if (function_exists('acf_add_local_field_group')) {
    // Sidebar group for order
    acf_add_local_field_group(array(
        'key' => 'group_three_column_order',
        'title' => 'Column Order',
        'fields' => array(
            array(
                'key' => 'field_three_column_order',
                'label' => 'Display Order',
                'name' => 'three_column_order',
                'type' => 'number',
                'instructions' => 'Set the display order (1, 2, or 3)',
                'required' => 1,
                'min' => 1,
                'max' => 3,
                'default_value' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'three_column',
                ),
            ),
        ),
        'position' => 'side',
        'style' => 'default',
    ));

    // Main content group for all other fields
    acf_add_local_field_group(array(
        'key' => 'group_three_column_block',
        'title' => 'Three Column Block Settings',
        'fields' => array(
            array(
                'key' => 'field_three_column_header',
                'label' => 'Block Header',
                'name' => 'three_column_header',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_three_column_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_three_column_intro',
                'label' => 'Intro Content',
                'name' => 'three_column_intro',
                'type' => 'wysiwyg',
                'instructions' => 'Content that appears above the three columns',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),
            array(
                'key' => 'field_three_column_cta',
                'label' => 'Call to Action',
                'name' => 'three_column_cta',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_three_column_cta_text',
                        'label' => 'CTA Text',
                        'name' => 'text',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_three_column_cta_url',
                        'label' => 'CTA URL',
                        'name' => 'url',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'three_column',
                ),
            ),
        ),
        'position' => 'normal',
        'style' => 'default',
    ));
}

// Debug: Log when fields registration is complete
error_log('Three Column ACF fields registration complete'); 