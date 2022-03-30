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
 * Add ACF options page for acf pro version, not for free version :)
 */
if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page(__('Site Settings', 'huydev'));
}


/**
 * Fake site settings option page of acf pro version
 */
function hide_settings_page($query)
{
    if (!is_admin() && !$query->is_main_query()) {
        return;
    }
    global $typenow;
    if ($typenow === "page") {
        // Replace "site-settings" with the slug of your site settings page.
        $settings_page = get_page_by_path("site-settings", NULL, "page")->ID;
        $query->set('post__not_in', array($settings_page));
    }
    return;
}

add_action('pre_get_posts', 'hide_settings_page');


// Add the page to admin menu
function add_site_settings_to_menu()
{
    add_menu_page('Site Settings', 'Site Setttings', 'manage_options', 'post.php?post=' . get_page_by_path("site-settings", NULL, "page")->ID . '&action=edit', '', 'dashicons-admin-tools', 999);
}
add_action('admin_menu', 'add_site_settings_to_menu');

// Change the active menu item
add_filter('parent_file', 'higlight_custom_settings_page');

function higlight_custom_settings_page($file)
{
    global $parent_file;
    global $pagenow;
    global $typenow, $self;

    $settings_page = get_page_by_path("site-settings", NULL, "page")->ID;

    $post = (int)$_GET["post"];
    if ($pagenow === "post.php" && $post === $settings_page) {
        $file = "post.php?post=$settings_page&action=edit";
    }
    return $file;
}
function edit_site_settings_title()
{
    global $post, $title, $action, $current_screen;
    if (isset($current_screen->post_type) && $current_screen->post_type === 'page' && $action == 'edit' && $post->post_name === "site-settings") {
        $title = $post->post_title . ' - ' . get_bloginfo('name');
    }
    return $title;
}

add_action('admin_title', 'edit_site_settings_title');

function op($slug) // Fake string options to op('site-settings) in get_field method
{
    $page_url_id = get_page_by_path($slug);
    return $page_url_id->ID;
}

/**
 * End fake site setting
 */
