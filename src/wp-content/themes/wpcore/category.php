<?php
get_header();
$cate = get_queried_object();
$sttPage = 0;
if (isset($_GET['page'])) :
    if (is_numeric($_GET['page']))
        $sttPage = $_GET['page'];
endif;
?>

<main id="articlePage">
    <section class="section-all-news wow">
        <div class="container">

        </div>
    </section>
</main>
<?php
get_footer();
