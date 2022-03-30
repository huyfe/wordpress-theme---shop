<?php
/*
 *  Load the site scripts
 */
function huydev_scripts()
{

    $version = '1.0.0';

    // Load CSS
    wp_enqueue_style('main-style-css', THEME_URL . '/assets/main/main.css', array(), $version, 'screen');

    // Load JS
    wp_enqueue_script('main-scripts-js', THEME_URL . '/assets/main/main.js', array('jquery'), $version, true);
}
add_action('wp_enqueue_scripts', 'huydev_scripts');

/**
 * Menu Register
 */
register_nav_menus(
    array(
        "primary"    => __("Primary Menu"),
        "footer"     => __("Footer Menu")
    )
);

function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

/**
 * Allow upload svg
 */
function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

/**
 * Add ACF options page
 */
if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page(__('Site Settings', 'huydev'));
}
