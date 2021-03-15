<?php get_header();?>

	<!-- <section class="back-btn"><a href="<?php bloginfo('url'); ?>/gallery" class="button">Back to Gallery</a></section> -->

	<!-- <section>
		<?php $category_title =  get_the_title($post->in_cat_ID); ?>
		<h1 class="headline-gallery"><?php echo $category_title ?> Gallery</h1>
	</section> -->

	<section>
		<h2 class="headline-gallery">Featured Patients</h2>
	</section>

	<section class="gallery-cat-wrap">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
				<?php
				$limit = 0;// could probably set this as an wp option
				foreach ($post->cases as $key => $value) {
					$case_link = $rmg_case::make_case_link(array('position' => $value['position'] , 'category_id' => $post->ID));
					$case_name = $rmg_case::make_case_name(array('position' => $value['position']));
					//$case_content = $rmg_case::make_case_name(array('position' => $value['post_content']));



					//$case_content = str_replace('Patient ', '', $case_content);
					$case_content = $value['post_content'];
					$content = apply_filters( 'the_content', $case_content );

					echo '<div class="bna-group">';
					$i = 0;//required
					echo '<h3>'.  $case_name .'</h3>';

					echo '<div class="img-set">';
					foreach ($value['rmg_case_imgs'] as $img) {

						// if(!array_search('front', $img)){ continue; } // if the view_name does not equal 'front' then it will skip it till it finds one that does have that view_name


							if(!empty($img['before_image_path'])){
								echo '<a href="' . $case_link . '" class="before-link"><img class="before-img b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="'.$rmg_case::get_image($img['before_image_path'], 'medium') .'" alt=""><div class="bna-label">Before</div></a>';
							}

							if(!empty($img['after_image_path'])){
								echo '<a href="' . $case_link . '" class="after-link"><img class="after-img b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="'.$rmg_case::get_image($img['after_image_path'], 'medium') .'" alt=""><div class="bna-label">After</div></a>';
							}

							if($i == $limit) break; // if for whatever reason we have more than one front

							$i++;

					}//end of img loop
					echo '</div>';

					if (!empty($case_content)) {
						echo '<div class="patient-details">' .  $content . '</div>';
					}
					// hover overlay
					echo '<div class="patient-view-button"><a href="' . $case_link . '" class="button">More Views</a></div>';

				echo '</div>';
				}
				?>

		<?php endwhile; endif;?>
	</section>
<?php get_footer();?>