<?php

/*
 * Define Variables
 */
if (!defined('THEME_DIR'))
    define('THEME_DIR', get_template_directory());
if (!defined('THEME_URL'))
    define('THEME_URL', get_template_directory_uri());
if (!defined('LIK_AUTHOR_URL'))
    define('LIK_AUTHOR_URL', 'https://portfolio-huyjunior.vercel.app/');
if (!defined('LIK_AUTHOR_NAME'))
    define('LIK_AUTHOR_NAME', 'Huy Dev');
/*
 * Add theme Support
 */
if (function_exists('add_theme_support')) {
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');

    add_theme_support('editor-styles');
    // add_editor_style( 'editor-styles.css' );
}

/**
 * Registers an editor stylesheet for the theme.
 */
function register_editor_stylesheet()
{
    add_editor_style('assets/main/main.css');
}
add_action('admin_init', 'register_editor_stylesheet');

/*
 * Add Image Size for Wordpress
 */
if (function_exists('add_image_size')) {
}


/*
 *  Add page slug to body class
 */
function huydev_add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

add_filter('body_class', 'huydev_add_slug_to_body_class');


/*
 *  Remove wp-logo on admin bar
 */

function huydev_wp_admin_bar_remove()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
}

add_action('wp_before_admin_bar_render', 'huydev_wp_admin_bar_remove', 0);


/*
 * Change Footer Text in Admin
 */

function namtech_change_footer_text()
{
    echo "Powered by <a href='" . LIK_AUTHOR_URL . "' target='_blank'>" . LIK_AUTHOR_NAME . "</a>";
}

add_filter('admin_footer_text', 'namtech_change_footer_text');


/*
 * Include framework files
 */
foreach (glob(THEME_DIR . "/includes/*.php") as $file_name) {
    require_once($file_name);
}
