<?php
error_reporting(0);
@ini_set('display_errors', 0);
define('THEME_URI', get_template_directory_uri());
define('THEME_DIR', get_template_directory());
define('THEME_PART', THEME_DIR . '/template-part');
define('DF_IMAGE', THEME_URI . '/assets/images/default/');
define('DF_INDUSTRY', THEME_URI . '/assets/images/default/img-industry.png');
define('IMAGE', THEME_URI . '/assets/images/');
define('GOOGLE_CAPTCHA_SITE_KEY', '6LdhysYaAAAAAOlGcOHRipbm_6EmrI8bzhVm4ymv'); // production key
// define('GOOGLE_CAPTCHA_SITE_KEY', '6LfN0MYaAAAAAGirf7oS2P4Q2DO2jMlvj2r_8c3p'); // testing key

include TEMPLATEPATH . '/core/init.php';
include get_theme_file_path('acf-field/acf-field.php');

if (!function_exists('conecta_theme_setup')) {
    function conecta_theme_setup()
    {
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array(
            'image',
            'video',
            'gallery',
            'quote',
            'link'
        ));
        add_theme_support('title-tag');
    }
    add_action('init', 'conecta_theme_setup');
}


// Local JSON acf
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path)
{
    $path = get_stylesheet_directory() . '/acf-field';
    return $path;
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point($paths)
{
    // remove original path (optional)
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-field';
    return $paths;
}

// Acf add options page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'     => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));
}

// ADD CSS AND JS
function huy_dev_style()
{

    // $version = '1.1.0';
    $version = date("Hhis"); // FOR DEV ONLY 
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('css_slick', THEME_URI . '/assets/css/slick.css', array(), $version, 'screen');
    wp_enqueue_style('css_slick-theme', THEME_URI . '/assets/css/slick-theme.css', array(), $version, 'screen');
    wp_enqueue_style('css_bootstrap', THEME_URI . '/assets/css/bootstrap.min.css', array(), $version, 'screen');
    wp_enqueue_style('css_bootstrap-select', THEME_URI . '/assets/css/bootstrap-select.min.css', array(), $version, 'screen');
    wp_enqueue_style('css_animation', THEME_URI . '/assets/css/animate.css', array(), $version, 'screen');
    wp_enqueue_style('css_font-awesome', THEME_URI . '/assets/css/fontawesome.min.css', array(), $version, 'screen');
    wp_enqueue_style('css_fancybox-css', THEME_URI . '/assets/css/jquery.fancybox.min.css', array(), $version, 'screen');
    wp_enqueue_style('css_font', THEME_URI . '/assets/css/font.css', array(), $version, 'screen');
    wp_enqueue_style('css_main', THEME_URI . '/assets/css/main.css?', array(), $version, 'screen');
    wp_enqueue_style('css_custom', THEME_URI . '/assets/css/custom.css', array(), $version, 'screen');
    wp_enqueue_style('css_owl', THEME_URI . '/assets/css/owl.carousel.min.css', array(), $version, 'screen');
    wp_enqueue_style('css_owl-theme', THEME_URI . '/assets/css/owl.theme.default.min.css', array(), $version, 'screen');
    wp_enqueue_style('css_style-css', THEME_URI . '/assets/css/style.css', array(), $version, 'screen');

    //wp_enqueue_script( 'jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.1.0.js', '','' , true);
    wp_enqueue_script('jquery',  THEME_URI . '/assets/js/jquery-3.5.1.min.js', array('jquery'), $version, true);
    wp_enqueue_script('js_popper', THEME_URI . '/assets/js/popper.min.js', array('jquery'), $version, true);
    wp_enqueue_script('js_fancybox-js', THEME_URI . '/assets/js/jquery.fancybox.min.js', array('jquery'), $version, true);
    wp_enqueue_script('js_jquery-validate', THEME_URI . '/assets/js/jquery.validate.js?', array('jquery'), $version, true);
    wp_enqueue_script('js_bootstrap', THEME_URI . '/assets/js/bootstrap.min.js', array('jquery'), $version, true);
    wp_enqueue_script('js_bootstrap-select', THEME_URI . '/assets/js/bootstrap-select.min.js', array('jquery'), $version, true);
    wp_enqueue_script('js_slick', THEME_URI . '/assets/js/slick.min.js', array('jquery'), $version, true);
    wp_enqueue_script('js_owl', THEME_URI . '/assets/js/owl.carousel.min.js', array('jquery'), $version, true);
    wp_enqueue_script('js_animation', THEME_URI . '/assets/js/WOW.js', array('jquery'), $version, true);
    wp_enqueue_script('js_sticky', THEME_URI . '/assets/js/sticky.min.js', array('jquery'), $version, true);
    wp_enqueue_script('js_main', THEME_URI . '/assets/js/main.js?', array('jquery'), $version, true);

    wp_enqueue_script('ajax', THEME_URI . '/assets/js/ajax.js', array('jquery'), $version, true);
    wp_localize_script('ajax', 'ajax_var', array('url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'huy_dev_style');

// Menu
register_nav_menus(
    array(
        'header_menu' => __('Header menu'),
        'footer_menu' => __('Footer menu'),
        'copyright_menu' => __('Copyright menu'),
        'contact_menu' => __('Contact menu')
    )
);

// Add custom size images.
add_image_size('thumb-post-392x245', 392, 245, true);
add_image_size('thumb-post-401x278', 401, 278, true);
add_image_size('thumb-post-605x420', 605, 420, true);

/**
 * Add a custom admin settings
 */

function isMobileDevice()
{
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
