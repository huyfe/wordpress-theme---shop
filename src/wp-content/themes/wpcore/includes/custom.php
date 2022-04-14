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
    wp_enqueue_script('main-scripts-js', get_stylesheet_directory_uri() . '/assets/main/main.js', array('jquery'), $version, true);
    wp_enqueue_script('script',  get_stylesheet_directory_uri() . '/assets/main/main.js');

    // wp_enqueue_script('ajax', THEME_URL . '/assets/js/ajax.js', array('jquery'), $version, true);
    // wp_localize_script('ajax', 'ajax_var', array('url' => admin_url('admin-ajax.php')));
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
 * Add ACF options page for acf pro version, not for free version :)
 */
if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page(__('Site Settings', 'huydev'));
}

// Remove margin top 32px of wordpress admin bar
add_theme_support('admin-bar', array('callback' => '__return_false'));
