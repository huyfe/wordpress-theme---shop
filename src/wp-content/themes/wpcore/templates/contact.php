<?php
/* 
    Template Name: Contact 
*/
get_header();
global $post;
?>
<main id="contactPage">
    <section class="contact-page">
        <div class="container">
            <div class="group-intro">
                <p class="title-contact f-16-bold"><?php the_title(); ?></p>
                <div class="description-contact">
                    <?php echo $post->post_content; ?>
                </div>
            </div>
            <div class="row row-info">
            <div class="col-form col-lg-7 col-12">
                <div class="tab2">
                    <button class="tablinks2 f-14-bold active" onclick="openForm(event,'candidate')">Candidate</button>
                    <button class="tablinks2 f-14-bold" onclick="openForm(event,'client')">Partner</button>
                    <button class="tablinks2 f-14-bold" onclick="openForm(event,'general')">General</button>
                </div>
                 <div id="candidate" class="tabcontent2 active">
                 <?php echo do_shortcode(get_field('candidate'));?>
                </div>
                <div id="client" class="tabcontent2">
                    <?php echo do_shortcode(get_field('client'));?>
                </div>
                <div id="general" class="tabcontent2">
                <?php echo do_shortcode(get_field('general'));?>
               </div>
            </div>
            <div class="col-map col-lg-5 col-12 wow fadeInUp" data-wow-delay="0.5s">
                <!---<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.3020975516856!2d144.99014731531923!3d-37.82981297974955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642904dd32e39%3A0xb196f389f9dc7397!2s29%20Balmain%20St%2C%20Cremorne%20VIC%203121%2C%20%C3%9Ac!5e0!3m2!1svi!2s!4v1567588910207!5m2!1svi!2s&language=en-AU" width="100%" height="335" frameborder="0" style="border:0;" allowfullscreen=""></iframe>!--->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3150.845358620794!2d145.0056473153196!3d-37.84050597974758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad6427db5080bef%3A0x8818ecd4f153354e!2s10%2F443-449%20Toorak%20Rd%2C%20Toorak%20VIC%203142%2C%20Australia!5e0!3m2!1sen!2s!4v1611907625235!5m2!1sen!2s" width="100%" height="335" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                <div class="menu-map">
                    <div class="f-24-normal mb-4">Our details</div>
                    <div class="contact-info">
                        <div class="info-box">
                            <p class="f-16-normal"><?php echo get_field('footer','option')['address'] ?></p>
                            <p class="f-16-normal"><?php echo get_field('footer','option')['email'] ?></p>
                        </div>      
                        <?php 
                            wp_nav_menu( 
                                array( 
                                    'theme_location' => 'contact_menu', 
                                    'menu_class' => 'contact-menu f-16',
                                ) 
                            );
                        ?>
                    </div>
                </div>
            </div>
        </div>    
        </div>       
    </section>
</main>
<?php do_action('logo_company');?>
<?php
get_footer();