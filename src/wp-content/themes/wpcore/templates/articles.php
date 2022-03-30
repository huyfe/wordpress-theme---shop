<?php
/* 
    Template Name: Articles
*/
get_header();
?>
<main id="articlePage">
    <?php
    $args = array(
        'post_type' => 'post',
        'orderby'    => 'date',
        'post_status' => 'publish',
        "posts_per_page" => 2,
        'order'    => 'DESC',
        'tag' => 'featured-post'
    );
    $result = new WP_Query($args);
    $arrPost = array();
    if ($result->have_posts()) :
        $delay = 0.3;
        while ($result->have_posts()) : $result->the_post();
            array_push($arrPost, get_the_ID());
        endwhile;
    endif;
    wp_reset_postdata();
    ?>
    <section class="section-featured-video">
        <div class="container">

        </div>
    </section>

    <section class="section-all-news wow">
        <div class="container">
        </div>
    </section>

</main>
<?php
get_footer();
