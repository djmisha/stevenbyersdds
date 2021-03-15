<?php get_header();?>


<section class="single-case-content">
	<!-- <?php $category_title =  get_the_title($post->in_cat_ID); ?>
	<h1 class="headline-gallery"><?php echo $category_title ?> Gallery</h1> -->
	<!-- <div class="gallery-navigation"> -->
		<!-- <a href="<?php bloginfo('url'); ?>/gallery" class="">Back to Gallery</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
		
	<!-- </div> -->

	<!-- <h2 class="single-case-title"><?php the_title(); ?></h2> -->
	<section class="case-wrap">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
			<div class="img-wrap">
				<?php foreach ( $post->rmg_case_imgs as $img ): ?>
					<div class="before-img img-frame"><img class="first" src="<?php echo $rmg_case::get_image($img['before_image_path'], 'large'); ?>" alt="" />
						<div class="bna-label">Before</div>
					</div>
					<div class="after-img img-frame"><img src="<?php echo $rmg_case::get_image($img['after_image_path'], 'large'); ?>" alt="" />
						<div class="bna-label">After</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="details-holder">
				<div class="gallery-nav">
					<a href="<?php bloginfo('url'); ?>/gallery" class="back-gallery-button">Back to Gallery</a> 
					<div class="btns-g">
					<?php

					/**
					* accepts an array
					* keys : 'class' , 'title' , 'hash'
					* if 'title' key is not present then default will be
					* - prev : &laquo; Previous
					* - next : Next &raquo;
					*/

				$rmg_case::prev( array(
					'class' => 'button-gallery-nav button-gallery-prev case-prev' ,
					'title'  => '<i class="fas fa-chevron-left"></i>') );

				$rmg_case::next( array(
					'class' => 'button-gallery-nav button-gallery-next case-next' ,
					'title' => '<i class="fas fa-chevron-right"></i>') );
					?>
					</div>
						
				</div>
				<div class="patient-details"><?php the_content();?></div>
				
			</div>
		<?php endwhile; endif;?>

	</section>
</section>


<?php get_footer();?>