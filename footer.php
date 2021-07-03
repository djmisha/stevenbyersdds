
<footer class="site-footer">

	<div class="upper-footer">

    <div class="footer-slideshow">
      <div class="footer-splide splide">
        <div class="splide__track">
            <ul class="splide__list">
              <li class="splide__slide"><img data-splide-lazy="<?php bloginfo('template_directory'); ?>/images/office-1.jpg" alt="<?bloginfo('title');?> office photo"></li>
              <li class="splide__slide"><img data-splide-lazy="<?php bloginfo('template_directory'); ?>/images/office-2.jpg" alt="<?bloginfo('title');?> office photo"></li>
              <li class="splide__slide"><img data-splide-lazy="<?php bloginfo('template_directory'); ?>/images/office-3.jpg" alt="<?bloginfo('title');?> office photo"></li>
            </ul>
        </div>
      </div>
      <div class="footer-logo">
        <a href="<?php bloginfo('url'); ?>" title="Go to Homepage">
          <?php echo inline_svg('logo'); ?>
        </a>
      </div>
    </div>

    <section class="footer-slogan">
      <span>We take pride in taking care of our patients just like family. </span>
      <span>Your <strong>dental home</strong> for Over 33 years</span>
    </section>

    <div class="footer-contact-form" id="contact-form">
      <span class="headline">Request an Appointment</span>
      <div class="contact-form">
        <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" ]'); ?>
      </div>		
    </div>
      
    <?php // Footer Contact Form - not shown on Homepage, Contact, Blog or Single Blogs
        if(!is_page(array('contact-us', 'contact' )) ):?>
    <?php endif; ?>  

	</div>	
	
	<section class="action-buttons">
		<div class="address">
			<a href="https://goo.gl/maps/yvLYjsbg3KJ1DfCH6" target="_blank" rel="noopener">
				<div class="icon">
					<?php echo inline_svg('icon-map'); ?>
				</div>
				<div class="i-text">
					<strong>Steven J. Byers, DDS</strong><br />
					4403 Marlborough Avenue<br />
					San Diego, CA 92116<br />
				</div>
			</a>
		</div>
		<div class="directions">
			<a href="https://goo.gl/maps/yvLYjsbg3KJ1DfCH6" target="_blank" rel="noopener">
				<div class="icon">
					<?php echo inline_svg('icon-direction'); ?>
				</div>
				<div class="i-text">Directions</div>
			</a>
		</div>
		<div class="phone">
			<a href="tel:+16192827060">
				<div class="icon">
					<?php echo inline_svg('icon-phone'); ?> 
				</div>
				<div class="i-text">
					(619) 282-7060
				</div>
			</a>
		</div>
		<div class="request">
			<a href="#contact-form">
				<div class="icon"> <?php echo inline_svg('icon-chat'); ?></div>
				<div class="i-text">Request an Appointment</div>
			</a>
		</div>
	</section>
  
	<section class="ratings-social">
    <div class="footer-ratings">
      <a href="https://goo.gl/maps/yvLYjsbg3KJ1DfCH6" target="_blank" rel="nofollow noopener">
        <div class="icon"><?php echo inline_svg('icon-stars'); ?></div>
        <p>5 Star Rating, Based on Patient Reviews</p>
      </a>
    </div>
		<div class="footer-social">
			<a href="https://goo.gl/maps/yvLYjsbg3KJ1DfCH6" aria-label="Google" rel="nofollow noopener" target="_blank"><span>Google</span><div class="icon"> <?php echo inline_svg('google-brands'); ?></div></a>
			<a href="https://www.yelp.com/biz/steven-j-byers-dds-san-diego" aria-label="Yelp" rel="nofollow noopener" target="_blank"><span>Yelp</span><div class="icon"> <?php echo inline_svg('yelp-brands'); ?></div></a>
			<a href="https://www.facebook.com/stevenjbyersdds/" aria-label="Facebook" rel="nofollow noopener" target="_blank"><span>Facebook</span><div class="icon"> <?php echo inline_svg('facebook-brands'); ?></div></a>
		</div>
	</section>

	<section class="lower-footer">
		<div class="copyright">
			Copyright &copy; <?php echo date("Y"); ?> <?bloginfo('title');?>. All rights reserved. <a href="<?php bloginfo('url'); ?>/sitemap/" title="Sitemap">Sitemap</a>
			<br>
			<a href="https://asburymediagroup.com/website-design-and-development/" target="_blank" rel="noopener" aria-label="Web Development" title="Web Development">Web Development</a>  by <a href="https://asburymediagroup.com/" target="_blank" rel="noopener" aria-label="Asbury Media Group" title="Asbury Media Group">Asbury Media Group </a>
		</div>
	</section>

</footer>

<?php wp_footer();?>

<?php if ($_SERVER['SERVER_NAME'] == 'stevenbyersdds.local'): ?>
	<script id="__bs_script__">
//<![CDATA[
document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.26.7'><\/script>".replace(
	"HOST", location.hostname));
//]]>
</script>
<?php endif; ?>

</body>

</html>