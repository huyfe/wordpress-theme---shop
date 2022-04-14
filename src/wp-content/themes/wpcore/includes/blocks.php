<?php
/*
 * Create blocks for site
 */

function huydev_block_category($categories, $post)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'huy-dev-blocks',
                'title' => __('Huy Dev Blocks', 'huy-dev-blocks'),
            ),
        )
    );
}
add_filter('block_categories', 'huydev_block_category', 10, 2);

add_action('acf/init', 'huydev_acf_init_block_types');
function huydev_acf_init_block_types()
{
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'HeroSection',
            'title'             => __('Hero Section'),
            'description'       => __('A custom Hero Section block.'),
            'render_template'   => 'template-parts/blocks/heroSection.php',
            'icon'              => 'admin-customizer',
            'mode'              => 'auto', // auto, preview, edit
        ));
        acf_register_block_type(array(
            'name'              => 'BlockSample',
            'title'             => __('Block Sample'),
            'description'       => __('A custom block sample.'),
            'render_template'   => 'template-parts/blocks/blockSample.php',
            'icon'              => 'admin-customizer',
            'mode'              => 'auto', // auto, preview, edit
        ));
    }
}
