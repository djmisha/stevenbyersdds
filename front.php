<?php
    // Template Name: Home
?>

<?php get_header(); ?>

<div id="skiptomaincontent"></div>

<div class="home-hero">

    <div class="splide-hero">
        <div class="splide__track">
            <ul class="splide__list">
                <div class="ken-burns-img splide__slide ken-burns-img-1 ken-burns-effect-1"></div>
                <div class="ken-burns-img splide__slide ken-burns-img-2 ken-burns-effect-2"></div>
                <div class="ken-burns-img splide__slide ken-burns-img-3 ken-burns-effect-3"></div>
                <div class="ken-burns-img splide__slide ken-burns-img-4 ken-burns-effect-4"></div>
                <div class="ken-burns-img splide__slide ken-burns-img-5 ken-burns-effect-5"></div>
            </ul>
        </div>
    </div>

    <div class="hero-bucket">
        <!-- <div class="hero-logo"> <?php echo inline_svg('logo-hero'); ?> </div> -->
        <div class="hero-split-line"></div>
        <div class="hero-drname">Dr. Larry Lickstein, MD</div>
        <div class="hero-split-line-small"></div>
        <div class="taglines-title"><?php the_field('headline'); ?></div>
        <a href="" class="button" rel="noreferrer noopener">Virtual Consults Available</a>
    </div>
    <div class="home-hero-buttons">
        <?php if(have_rows('home_procedures')): ?>
            <?php while(have_rows('home_procedures')): the_row(); ?>
                <a href="<?php the_sub_field('link'); ?>">
                   <img src="<?php the_sub_field('small_icon'); ?>" alt=" <?php the_sub_field('name'); ?> icon">
                </a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>



<div class="will-parallax parallax-home-wrapper b-lazy" data-src="<?php bloginfo('template_directory'); ?>/images/middle-wrap.jpg">
    

    <section class="home-welcome">
        <?php the_field('doctor_content'); ?>
        <!-- <div class="icon-welcome-flower"></div> -->
        <!-- <div class="icon-doctor-flower"></div> -->
    </section>


    <div class="home-about-wrap">
        <div class="home-about b-lazy" data-src="<?php bloginfo('template_directory'); ?>/images/bg-doctor.jpg">
            <div class="about-content">
                <div class="subheadline">
                    <div class="s-line"></div>
                    <div class="">&nbsp;&nbsp; MEET &nbsp;&nbsp;</div>
                    <div class="s-line"></div>
                </div>
                <h2>Dr. Lickstein</h2>
                <?php the_field('practice_content'); ?>
                <div class="butn-wrap">
                    <a href="<?php the_sub_field('doctor_link'); ?>">read more</a>
                    <div class="split-line"></div>
                </div>
            </div>
        </div>
    </div>


     <div class="the-home-tabs-shadow">
        <!-- <div class="icon-welcome-flower-2"></div> -->

         <div class="the-home-tabs-desktop">
             <?php if(have_rows('home_procedures')): ?>
                 <?php $counter = 1; ?>
                 <ul class="tab-choises" id="nav-tab">
                     <?php while(have_rows('home_procedures')): the_row(); ?>
                         <li class="tab-top"><a href="#tab-content-<?php echo $counter; ?>"></a><span>
                            <img src="<?php the_sub_field('icon'); ?>" alt="tab icon">
                            <?php the_sub_field('name'); ?></span>
                        </li>
                     <?php $counter ++ ; ?>
                     <?php endwhile; ?>
                 </ul>
             <?php endif; ?>


             <?php if(have_rows('home_procedures')): ?>
                 <?php $counter = 1; ?>
                 <div class="tab-content">
                     <?php while(have_rows('home_procedures')): the_row(); ?>
                         <div class="tab-pane" id="tab-content-<?php echo $counter; ?>">
                             <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('name'); ?>">
                             <span><?php the_sub_field('name'); ?></span>
                             <?php the_sub_field('content'); ?>
                             <a href="<?php the_sub_field('link'); ?>">read more</a>
                             <div class="split-line"></div>
                         </div>
                     <?php $counter ++ ; ?>
                     <?php endwhile; ?>
                 </div>
             <?php endif; ?>
         </div>  
    </div>




     <div class="the-home-tabs-mobile">
         <?php if(have_rows('home_procedures')): ?>
             <?php $counter = 1; ?>
             <div class="tab-content">
                <div class="mobile-splide splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                             <?php while(have_rows('home_procedures')): the_row(); ?>
                                <li class="splide__slide">
                                     <div class="single-tab">
                                         <div class="tab-top"></div>
                                         <img src="<?php the_sub_field('mobile_image'); ?>" alt="<?php the_sub_field('name'); ?>">
                                         <div class="tab-icon"> <img src="<?php the_sub_field('icon'); ?>" alt="tab icon"> </div>
                                         <strong><?php the_sub_field('name'); ?></strong>
                                         <?php the_sub_field('content'); ?>
                                         <a href="<?php the_sub_field('link'); ?>">read more</a>
                                         <div class="split-line"></div>
                                    </div>
                                </li>
                             <?php $counter ++ ; ?>
                             <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
                 
             </div>
         <?php endif; ?>
     </div>  


    <section class="home-testis">
        <img class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php bloginfo('template_directory'); ?>/images/icon-quote.png" alt="specials package image">
        <div class="testi-splide splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php if(have_rows('testimonials')): ?>
                        <?php while(have_rows('testimonials')): the_row(); ?>
                            <li class="splide__slide"><?php the_sub_field('testimonial'); ?></li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <a href="<?php the_field('read_more_reviews_button'); ?>" class="custom-butn">Read More Reviews</a>
        <div class="testi-split-line"></div>
    </section>



    <div class="home-ig-feed">
        <span><i class="fab fa-instagram"></i> Follow Us <a href="https://www.instagram.com/elleaestheticarts/" target="_blank" rel="nofollow noopener">@elleaestheticarts</a> </span> 
        <div class="the-ig-feedme">
            <?php echo do_shortcode('[wp_my_instagram username="elleaestheticarts" limit="5" layout="3" size="large" target="_blank" link=""]'); ?>
        </div>
    </div>

</div>



<?php get_footer(); ?>