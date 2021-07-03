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
      <h3 class="taglines-subtitle">Providing the San Diego Community with Truly Exceptional Dental Care for Over 25 Years. </h3>
  </div>
</div>

<section class="home-about">
  <div class="about-content">
    <h2>Let your dreams of a beautiful smile <strong>take flight!</strong></h2>
    <p>Dr. Steven J. Byers has been serving the San Diego community for over 25 years. At our Kensington, San Diego cosmetic and family dentistry practice, we are proud to provide patients with truly exceptional care. Those from Kensington, Normal Heights, North Park, and across San Diego, benefit from our many family and emergency dentistry procedures. </p>
    <p>We are committed to providing patients with beautiful, healthy smiles!</p>
    <span>Did you know Dr. Byers is also an avid pilot? When not serving patients at our busy dental practice, Dr. Byers is frequently enjoying the views of San Diego from thousands of feet up.</span>
  </div>
  <div class="about-image">
    <img class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php bloginfo('template_directory'); ?>/images/img-doc.jpg" alt="Picture of Steven J. Byers D.D.S">
    <span>Dr. Steven J. Byers</span>
  </div>
</section>

<div class="home-fly"></div>

<h2>Our Services</h2>

<div class="home-services">
  <div class="service"><a href="<?php bloginfo('url'); ?>/procedures/#Zoom-Whitening"><img class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php bloginfo('template_directory'); ?>/images/service-1.jpg" alt="Zoom Whitening"><h3>Zoom Whitening</h3></a></div>
  <div class="service"><a href="<?php bloginfo('url'); ?>/procedures/#Invisalign"><img class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php bloginfo('template_directory'); ?>/images/service-2.jpg" alt="Invisalign"><h3>Invisalign</h3></a></div>
  <div class="service"><a href="<?php bloginfo('url'); ?>/procedures/#In-House-Lab"><img class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php bloginfo('template_directory'); ?>/images/service-3.jpg" alt="In House Lab"><h3>In House Lab</h3></a></div>
  <div class="service"><a href="<?php bloginfo('url'); ?>/procedures/#Veneers"><img class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php bloginfo('template_directory'); ?>/images/service-4.jpg" alt="Veneers"><h3>Veneers</h3></a></div>
  <div class="service"><a href="<?php bloginfo('url'); ?>/procedures/#Implants"><img class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php bloginfo('template_directory'); ?>/images/service-5.jpg" alt="Implants"><h3>Implants</h3></a></div>
  <div class="service"><a href="<?php bloginfo('url'); ?>/procedures/#Metal-Free-Fillings"><img class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php bloginfo('template_directory'); ?>/images/service-6.jpg" alt="Metal-Free Fillings"><h3>Metal-Free Fillings</h3></a></div>
</div>

<section class="home-testis">
    <div class="home-testi_head">
      <div class="icon"> <?php echo inline_svg('icon-stars-2'); ?></div>
    </div>
    <div class="testi-splide splide">
        <div class="splide__track">
            <ul class="splide__list">
              <li class="splide__slide">
                <p>All it took was one visit and I haven’t gone to anyone since. It’s been so long now that I feel like part of the family instead of just another customer. They work with my schedule; something I truly appreciate especially with my job.
                <br>  
                <strong>~ Editha Q.</strong>
                </p>
              </li>
              <li class="splide__slide">
                <p>As a physician I look carefully at where I plan to obtain my healthcare. I have been a patient of Dr. Steven Byers for around 15 years, which indicates how I feel about the quality of care and the level of service delivered by Dr. Byers and his team.
                <br>  
                <strong>~ Judith S.</strong>
                </p>
              </li>
              <li class="splide__slide">
                <p>This is the best dental office in San Diego. The staff is professional and friendly at the same time.
                  The dental work is done with the skill of a jeweler in a fast efficient way. Their hygienists do great work and keep your smile beautiful and healthy.  
                <br>  
                <strong>~ Jim E.</strong>
                </p>
              </li>
            </ul>
        </div>
    </div>
    <a href="https://www.google.com/search?client=firefox-b-1-d&q=stevenbyersdds+#lrd=0x80d954464b5f322b:0x5db5a2c7d80e2cac,3,,," rel="noopener" class="button" target="_blank"> <?php echo inline_svg('icon-write'); ?> Write A Review</a>
</section>

<?php get_footer(); ?>