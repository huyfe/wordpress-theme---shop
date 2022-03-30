<?php
/* Template Name: Homepage */

get_header();
global $post;
?>
<main id="homePage">

    <?php
    $getStared = get_field('introduction');
    if ($getStared['content']) :
    ?>
        <?php /*
     array(24) { ["ID"]=> int(2526) ["id"]=> int(2526) 
        ["title"]=> string(25) "Conecta Main Header Image" 
        ["filename"]=> string(18) "conecta_header.jpg" 
        ["filesize"]=> int(107781) 
        ["url"]=> string(66) "http://localhost:120/wp-content/uploads/2020/05/conecta_header.jpg" 
        ["link"]=> string(45) "http://localhost:120/homepage/conecta_header/" 
        ["alt"]=> string(59) "Construction project coordinator with skyline in background" 
        ["author"]=> string(1) "2" 
        ["description"]=> string(0) "" 
        ["caption"]=> string(68) "Construction project coordinator or engineer with a yellow hard hat." 
        ["name"]=> string(14) "conecta_header" 
        ["status"]=> string(7) "inherit" ["uploaded_to"]=> int(80) 
        ["date"]=> string(19) "2020-05-07 03:43:30" 
        ["modified"]=> string(19) "2021-07-12 02:26:36" 
        ["menu_order"]=> int(0) 
        ["mime_type"]=> string(10) "image/jpeg" 
        ["type"]=> string(5) "image" 
        ["subtype"]=> string(4) "jpeg" 
        ["icon"]=> string(57) "http://localhost:120/wp-includes/images/media/default.png" 
        ["width"]=> int(1185) ["height"]=> int(785) 
        ["sizes"]=> array(27) { ["thumbnail"]=> string(74) "http://localhost:120/wp-content/uploads/2020/05/conecta_header-150x150.jpg" 
            ["thumbnail-width"]=> int(150) ["thumbnail-height"]=> int(150) 
            ["medium"]=> string(74) "http://localhost:120/wp-content/uploads/2020/05/conecta_header-300x199.jpg" 
            ["medium-width"]=> int(300) ["medium-height"]=> int(199) 
            ["medium_large"]=> string(74) "http://localhost:120/wp-content/uploads/2020/05/conecta_header-768x509.jpg" 
            ["medium_large-width"]=> int(768) ["medium_large-height"]=> int(509) 
            ["large"]=> string(75) "http://localhost:120/wp-content/uploads/2020/05/conecta_header-1024x678.jpg" 
            ["large-width"]=> int(1024) ["large-height"]=> int(678) ["1536x1536"]=> string(66) "http://localhost:120/wp-content/uploads/2020/05/conecta_header.jpg" ["1536x1536-width"]=> int(1185) ["1536x1536-height"]=> int(785) ["2048x2048"]=> string(66) "http://localhost:120/wp-content/uploads/2020/05/conecta_header.jpg" ["2048x2048-width"]=> int(1185) ["2048x2048-height"]=> int(785) ["thumb-post-392x245"]=> string(74) "http://localhost:120/wp-content/uploads/2020/05/conecta_header-392x245.jpg" ["thumb-post-392x245-width"]=> int(392) ["thumb-post-392x245-height"]=> int(245) ["thumb-post-401x278"]=> string(74) "http://localhost:120/wp-content/uploads/2020/05/conecta_header-401x278.jpg" ["thumb-post-401x278-width"]=> int(401) ["thumb-post-401x278-height"]=> int(278) ["thumb-post-605x420"]=> string(74) "http://localhost:120/wp-content/uploads/2020/05/conecta_header-605x420.jpg" ["thumb-post-605x420-width"]=> int(605) ["thumb-post-605x420-height"]=> int(420) }
    */ ?>


        <section class="section-get-stared">
            <div class="container">
                <div class="row">
                    <div class="col-intro col-lg-5 col-12">
                        <?php echo $getStared['content'] ?>
                    </div>
                    <div class="col-img col-lg-7 col-12">
                        <?php if (isMobileDevice()) : ?>
                            <img src="<?php echo $getStared['image']['sizes']['medium'] ?>" alt="<?php echo $getStared['image']['alt'] ?>">
                        <?php else : ?>
                            <img src="<?php echo $getStared['image']['sizes']['large'] ?>" alt="<?php echo $getStared['image']['alt'] ?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php get_template_part('template-parts/featured-job'); ?>

    <?php do_action('logo_company'); ?>

    <?php
    $manage = get_field('manage');
    if ($manage['heading']) :
    ?>
        <section class="guiding container wow">
            <p class="f-38-medium guiding-title item-animation"><?php echo $manage['heading'] ?></p>
            <p class="f-16-normal guiding-description item-animation text-center"><?php echo $manage['description'] ?></p>
            <div class="guiding-group">
                <?php
                if ($manage['content_manage']) :
                    foreach ($manage['content_manage'] as $item) : ?>
                        <div class="guiding-box item-animation">
                            <div>
                                <img src="<?php echo $item['item']['image_icon']['url']; ?>" alt="<?php echo $item['item']['image_icon']['alt'] ?>">
                            </div>
                            <div class="content-box">
                                <p class="f-16-bold"><?php echo $item['item']['title'] ?></p>
                                <p class="f-16-normal"><?php echo $item['item']['description'] ?></p>
                            </div>
                        </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
            <a href="<?php echo $manage['cta']['url'] ?>" class="button f-14-bold item-animation"><?php echo $manage['cta']['title'] ?></a>
        </section>
    <?php endif; ?>

    <section class="section-list-partners">
        <div class="container wow">
            <?php if (get_field('our_partners')['title']) : ?>
                <h2 class="section-title text-center"><?php echo get_field('our_partners')['title']; ?></h2>
            <?php else : ?>
                <h2 class="section-title text-center">Our Partners</h2>
            <?php endif; ?>

            <?php
            $partners_posts = get_field('our_partners')['posts'];
            if ($partners_posts) : ?>
                <div class="list-partners">
                    <div class="row">
                        <?php foreach ($partners_posts as $post) :
                            // Setup this post for WP functions (variable must be named $post).
                            $img_thumb = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url($post->ID, 'thumb-post-401x278') : THEME_URI . '/assets/images/noimage_392x245.png';
                            setup_postdata($post); ?>
                            <div class="col-lg-4 col-md-6 col-12 item-animation">
                                <article class="post-item">
                                    <div class="post-thumb">
                                        <a href="<?php echo get_permalink() ?>">
                                            <img class="img-fluid" src="<?php echo $img_thumb; ?>" alt="<?php echo get_the_title() ?>">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="content-header">
                                            <?php $address = explode(' ', trim(get_field('address', $post->ID))); ?>
                                            <span class="post-address"><?php echo $address[0] ?></span>
                                        </div>
                                        <div class="content-body">
                                            <h3 class="post-title"><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></h3>
                                            <p class="post-excerpt"><?php echo wp_kses_post(wp_trim_words(get_field('summary', $post->ID), 20)) ?></p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="list-partners">
                    <div class="row">
                        <?php
                        $paged =  get_query_var('paged') ? get_query_var('paged') : 1;
                        $args = array(
                            'post_type' => 'partners',
                            'orderby'    => 'rand',
                            'post_status' => 'publish',
                            'posts_per_page' => 3
                        );
                        $result = new WP_Query($args);
                        if ($result->have_posts()) :
                            while ($result->have_posts()) : $result->the_post();
                                $img_thumb = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url($result->ID, 'thumb-post-401x278') : THEME_URI . '/assets/images/noimage_605x420.png';
                        ?>
                                <div class="col-lg-4 col-md-6 col-12 item-animation">
                                    <article class="post-item">
                                        <div class="post-thumb">
                                            <a href="<?php echo get_permalink() ?>">
                                                <img class="img-fluid" src="<?php echo $img_thumb; ?>" alt="<?php echo get_the_title() ?>">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <div class="content-header">
                                                <?php $address = explode(' ', trim(get_field('address', $result->ID))); ?>
                                                <span class="post-address"><?php echo $address[0] ?></span>
                                            </div>
                                            <div class="content-body">
                                                <h3 class="post-title"><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></h3>
                                                <p class="post-excerpt"><?php echo wp_kses_post(wp_trim_words(get_field('summary', $result->ID), 20)) ?></p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            // Reset the global post object so that the rest of the page works correctly.

            wp_reset_postdata(); ?>

            <div class="button-wrapper text-center mb-5">
                <a href="/partners" class="button item-animation">View All Partners </a>
            </div>
        </div>
    </section>
    <?php do_action('lastest_post'); ?>

    <?php do_action('contact_form'); ?>

    <?php do_action('sign_up'); ?>
</main>
<?php get_footer();
