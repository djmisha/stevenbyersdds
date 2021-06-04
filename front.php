<?php
    // Template Name: Home
?>

<?php get_header(); ?>

<div id="skiptomaincontent"></div>

<div class="home-hero">
  <div class="hero-logo">
    <a href="<?php bloginfo('url'); ?>" title="Go to Homepage">
      <?php echo inline_svg('logo'); ?>
    </a>
  </div>
  <div class="hero-bucket">
      <div class="taglines-pretitle">Steven J. Byers D.D.S</div>
      <div class="taglines-title">Beautiful, Healthy <strong>Smiles</strong></div>
      <div class="taglines-subtitle">Providing the San Diego Community with Truly Exceptional Dental Care for Over 25 Years. 
  </div>
</div>

<div class="will-parallax parallax-home-wrapper b-lazy" data-src="<?php bloginfo('template_directory'); ?>/images/middle-wrap.jpg">
    

    <section class="home-welcome">
        <h2><?php the_field('welcome_headline'); ?></h2>
        <span><?php the_field('welcome_subheadline'); ?></span>
        <?php the_field('welcome_content'); ?>
    </section>




    <div class="home-our-doctors-headline">
        <h2>Our Doctors</h2>
    </div>

    <div class="home-about-wrap">
        <div class="home-about b-lazy" data-src="<?php bloginfo('template_directory'); ?>/images/home-docs-bg.jpg"> </div>
        <div class="home-about-slideshow b-lazy" data-src="<?php bloginfo('template_directory'); ?>/images/bg-docs-slide.jpg">
           <div class="doctors-splide splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php if(have_rows('doctors')): ?>
                            <?php while(have_rows('doctors')): the_row(); ?>
                                <li class="splide__slide">
                                    <div class="doc-slides">
                                        <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('name'); ?>">
                                        <h2><?php the_sub_field('name'); ?></h2>
                                        <div class="clear"></div>
                                        <div class="intro"><?php the_sub_field('intro'); ?></div>
                                        <div class="bio"><?php the_sub_field('bio'); ?></div>
                                        <a href="<?php the_sub_field('link'); ?>" class="button button-light">View My Bio</a>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<!-- 
     <div class="the-home-tabs-shadow">

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
    </div> -->


<!-- 

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
     </div>   -->


    <section class="home-testis">
        <div class="home-testi_head">
            <span class="home-testi_head_stars">4.9 Star Average  out of 684 Reviews</span>
            <h2 class="home-testi_head_trusted">Trusted & Highly Recommended</h2>
        </div>
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
        <a href="<?php the_field('read_more_reviews_button'); ?>" class="button button-light">Read More Reviews</a>
    </section>


   

</div>


<div class="logos-memeberships">
    <?php if (have_rows('logos')): ?>
        <?php while (have_rows('logos')): the_row(); ?>
            <div class="single-logo">
                <img data-src="<?php the_sub_field('logo'); ?>" alt="Memeberships logo" class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>





<?php get_footer(); ?>