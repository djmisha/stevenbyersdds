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
      <h1 class="taglines-pretitle">Steven J. Byers D.D.S</h1>
      <h2 class="taglines-title">Beautiful, Healthy <strong>Smiles</strong></h2>
      <h3 class="taglines-subtitle">Providing the San Diego Community with Truly Exceptional Dental Care for Over 25 Years. </div>
  </div>
</div>

<section class="home-about">
  <h2>Let your dreams of a beautiful smile take flight!</h2>
  <p>Dr. Steven J. Byers has been serving the San Diego community for over 25 years. At our Kensington, San Diego cosmetic and family dentistry practice, we are proud to provide patients with truly exceptional care. Those from Kensington, Normal Heights, North Park, and across San Diego, benefit from our many family and emergency dentistry procedures. </p>
  <p>We are committed to providing patients with beautiful, healthy smiles!</p>
  <span>Did you know Dr. Byers is also an avid pilot? When not serving patients at our busy dental practice, Dr. Byers is frequently enjoying the views of San Diego from thousands of feet up.</span>
</section>

<h2>Our Services</h2>
<div class="home-services">
  <div class="service"><a href="<?php bloginfo('url'); ?>/NEEDTOADDLINKHERE/"><img src="<?php bloginfo('template_directory'); ?>/images/service-1.jpg" alt="Zoom Whitening"><h3>Zoom Whitening</h3></a></div>
  <div class="service"><a href="<?php bloginfo('url'); ?>/NEEDTOADDLINKHERE/"><img src="<?php bloginfo('template_directory'); ?>/images/service-2.jpg" alt="Invisalign"><h3>Invisalign</h3></a></div>
  <div class="service"><a href="<?php bloginfo('url'); ?>/NEEDTOADDLINKHERE/"><img src="<?php bloginfo('template_directory'); ?>/images/service-3.jpg" alt="In House Lab"><h3>In House Lab</h3></a></div>
  <div class="service"><a href="<?php bloginfo('url'); ?>/NEEDTOADDLINKHERE/"><img src="<?php bloginfo('template_directory'); ?>/images/service-4.jpg" alt="Veneers"><h3>Veneers</h3></a></div>
  <div class="service"><a href="<?php bloginfo('url'); ?>/NEEDTOADDLINKHERE/"><img src="<?php bloginfo('template_directory'); ?>/images/service-5.jpg" alt="Implants"><h3>Implants</h3></a></div>
  <div class="service"><a href="<?php bloginfo('url'); ?>/NEEDTOADDLINKHERE/"><img src="<?php bloginfo('template_directory'); ?>/images/service-6.jpg" alt="Metal-Free Fillings"><h3>Metal-Free Fillings</h3></a></div>
</div>

    <!-- <section class="home-testis">
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
    </section> -->


</div>


<?php get_footer(); ?>