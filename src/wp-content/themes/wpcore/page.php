<?php
get_header();
?>
<main class="template-default-page">
    <section class="page-content">
        <div class="info-top">
            <h1 class="title-page text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"><?php echo get_the_title(); ?></h1>
        </div>
        <div class="container">
            <div class="post-content wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
                <?php
                if (have_posts()) {
                    the_post();
                    the_content();
                }
                ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>