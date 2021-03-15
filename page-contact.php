<?php
	// Template Name: Contact
?>
<?php get_header(); ?>

<!-- <main class="interior"> -->

<?php if(have_posts()) : while (have_posts()) : the_post();?>



<div class="location-map">

	<span class="headline">LOCATION</span>
	<div class="subheadline">
		<div class="s-line"></div>
		<div class="">&nbsp;&nbsp;and Map&nbsp;&nbsp;</div>
		<div class="s-line"></div>
	</div>

		<?php if(have_rows('locations', 'option')): ?>
			<?php while(have_rows('locations', 'option')): the_row();
				$location = get_sub_field('location_name');
				$street = get_sub_field('street');
				$suite = get_sub_field('suite');
				$city = get_sub_field('city');
				$state = get_sub_field('state');
				$zip = get_sub_field('zip');
				$map = get_sub_field('map');
				$gmb = get_sub_field('gmb');
				$phone = get_sub_field('phone');
				$tel = str_replace(array('.', ',', ' ', '-', '(', ')'), '' , $phone);
			?>
			<?php //if( $map ) echo '<div class="gmaps">' . $map . "</div>"; ?>
			<div class="contact-information" id="hours-map">
				<address class="location-details">
					<?php
						//if( $location ) echo '<span class="practice">' . $location . '</span>'; // Practice Name
						if( $street ) {
							echo '<div class="directions"><a href="' . $gmb . '" target="_blank" rel="nofollow noopener">';
							echo '<span class="street">' . $street; // Street Address
							if ( $suite ) echo ', Suite #' . $suite; // Optional Suite Number
							echo '</span>';
						if( $city ) echo ' <span class="city">' . $city . ', ' . $state . ' ' . $zip . '</span>'; // City, State Zip
	                        echo '</a></div>'; 

						}
						//if( $phone ) echo '<a href="tel:+1' . $tel . '" class="loc-phone">' . $phone . '</a>'; // Phone Number
					?>
				</address>

				<?php echo '<div class="directions"><a href="' . $gmb . '" target="_blank" rel="nofollow noopener">'; ?>
						<img src="<?php bloginfo('template_directory'); ?>/images/map.jpg" alt="location map">

				<?php echo '</a></div>'; ?>


			</div>

			<?php endwhile; ?>
		<?php endif; // end Locations Repeater?>
</div>




<?php endwhile; endif;?>

<?php get_footer(); ?>