

<div class="footer-logo">
	<a href="<?php bloginfo('url'); ?>" title="Go to Homepage">
		<!-- <?php echo inline_svg('logo-footer'); ?> -->
	</a>
</div>

<footer class="site-footer">

	<div class="upper-footer b-lazy will-parallax parallax-home-footer" data-src="<?php bloginfo('template_directory'); ?>/images/bg-contact.jpg">
		
		<div class="top-polygon"></div>

		<span class="headline">Schedule</span>
		<div class="subheadline">
			<div class="s-line"></div>
			<div class="">&nbsp;&nbsp;A Consultation&nbsp;&nbsp;</div>
			<div class="s-line"></div>
		</div>
		

		<div class="footer-locations-wrapper">
			<?php if (have_rows('locations', 'option')): ?>
				<ul class="footer-locations">
					<?php while (have_rows('locations', 'option')): the_row();
						$locationName = get_sub_field('location_name');
						$tag = get_sub_field('location_tag');
						$street = get_sub_field('street');
						$suite = get_sub_field('suite');
						$city = get_sub_field('city');
						$state = get_sub_field('state');
						$zip = get_sub_field('zip');
						$phone = get_sub_field('phone');
						$fax = get_sub_field('fax');
						$tel = str_replace(array('.', ',', '-', '(', ')', ' '), '', $phone);
						$map = get_sub_field('map');
						$gmb = get_sub_field('gmb');
						// $applink = Get_bloginfo('url') .'/contact/';
						?>
						<li>
						<?php
							// Tag or Contact Page CTA
							// if($tag) echo '<div class="tag"><a href="' . $applink . '">' . $tag . '</a></div>';
							
							// Phone Number
							if ($phone) {echo '<div class="phone"><a href="tel:+1' . $tel . '">' . $phone . '</a> | <a href="#aform-86">Email Us</a></div> '; }                        

							// Fax Number
							// if ($fax) {echo '<div class="fax">Fax: ' . $fax . '</div>'; }
							// Location Name
							// if ($locationName) {echo '<div class="name">' . $locationName . '</div>'; }
							// Directions wrap open
							// Address
							if ($gmb) {echo '<div class="directions"><a href="' . $gmb . '" target="_blank" rel="nofollow noopener" data-label="Footer Contact - Address" class="track-outbound">'; }
							// Street
							if ($street) {echo '<div class="street">' . $street; if ($suite) {echo ', ' . $suite; } echo '</div>'; }
							// City, State Zip
							if ($city) {echo ' <div class="city">' . $city . ', ' . $state . ' ' . $zip . '</div>'; }
							// End Address

							if ($gmb) {echo '</a></div>'; }
							
							if ($tag) {echo '<div class="tag">' . $tag . '</div>'; } // Directions wrap close

						?>
					</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
		

		<?php // Footer Contact Form - not shown on Homepage, Contact, Blog or Single Blogs
			 if(!is_page(array('contact-us', 'contact' )) ): ?>
		<?php endif; ?>  

		<div class="footer-contact-form">
			<div class="contact-form">
				<?php echo do_shortcode('[aform name="contact-us"]'); ?>
			</div>		
		</div>


	</div>	
	
	<section class="lower-footer">
		<div class="footer-flex">
			
			<div class="footer-sign-up">
				<span>Sign up for specials and updates</span>
				<?php echo do_shortcode('[aform name="email-sign-up"]'); ?>
			</div>
			<div class="social-copyright">
				<?php if (have_rows('social_buttons', 'option')): ?>
					<div class="footer-social">

						<?php
						while (have_rows('social_buttons', 'option')): the_row();
							$icon = get_sub_field('social_icon');
							$name = get_sub_field('social_name');
							$link = get_sub_field('social_link');

							if ($name) {
								echo '<a href="' . $link . '" aria-label="' . $name . '" rel="nofollow noopener" target="_blank">' . $icon . '<span>' . $name . '</span></a>';
							}

						endwhile;
						?>
					</div>
				<?php endif; ?>

				<!-- <div class="copyright">
					Copyright &copy; <?php echo date("Y"); ?> <?bloginfo('title');?>. All rights reserved.
					<a href="<?php bloginfo('url'); ?>/privacy-policy/">Privacy Policy</a>  |
					<a href="<?php bloginfo('url'); ?>/sitemap/" title="Sitemap">Sitemap</a>
				</div> -->
			</div>

		</div>

		<div class="sig">
			<!-- <div class="disclaimer">*Individual Results May Vary</div>
			<a href="https://www.silvragency.com/website-design-and-development/" target="_blank"
			rel="nofollow noopener" aria-label="Design" title="Design">Design</a> and
			<a href="https://www.silvragency.com/digital-marketing/" target="_blank"
			rel="nofollow noopener" aria-label="Marketing" title="Marketing">Marketing</a>
			by
			<a href="https://www.silvragency.com/" target="_blank" rel="nofollow noopener"
			aria-label="Silvr Agency" title="Silvr Agency">SILVR <?php echo inline_svg('sig-logo'); ?></a> -->
		</div>
	</section>

	<!-- <?php // Sticky CTA Button
	if (!is_page(array('contact', 'contact-us', 'find-your-treatment'))) { ?>
			<a href="<?php bloginfo('url'); ?>/contact/" rel="noopener nofollow">
				<div class="sticky-contact-cta">
				<?php echo inline_svg('icon-find-treatment'); ?>
					Find Your Treatment
				</div>
			</a>
	<?php } ?> -->

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