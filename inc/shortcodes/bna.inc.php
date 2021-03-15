<?php
/*
	RMGALLERY2 : at least V2.1.2
	example : [bnacase casecount="1" imageset="1" addtags="true" casebtn="true"]
*/

if(!is_admin()) { // dont run in Guttenberg Admin 
	add_shortcode('bnacase',function( $atts , $content = null ){
		extract( shortcode_atts( array(
				'category'	 => 0,
				'patient'	 => 1,
				'casecount'  => 1,
				'imageset'   => 1,
				'imagerow'  => '',
				'addtags'	 => false,
				'casebtn'    => false,
				'casebtntxt' => 'View Details',
				'catbtn'	 => false,
				'catbtntxt'	 => '',
				'galbtn'	 => false,
				'galbtntxt' => 'Gallery'
			), $atts , 'bnacase' ) );
		$addtags = filter_var($addtags, FILTER_VALIDATE_BOOLEAN);
		$casebtn = filter_var($casebtn, FILTER_VALIDATE_BOOLEAN);
		$catbtn  = filter_var($catbtn, FILTER_VALIDATE_BOOLEAN);
		$galbtn  = filter_var($galbtn, FILTER_VALIDATE_BOOLEAN);
		/**
		*	Query Setup
		*/
		global $post , $rmg_case;
		$metaCategory = get_post_meta( $post->ID , '_rmg2_page_categories' , true )?:array();
		if(!empty($metaCategory)):
			$category = array_pop($metaCategory);
		endif;
		/*
			QUERY
		*/
		if(!empty($patient) && $patient > 1):
			$casecount = '';
		endif;
		$casesResults  = rmg_model::find('in_sort_order' , array( 'for' => 'category' , 'select' => '*' ,'category_id' => $category , 'limit' => $casecount ));

		if(!empty($patient) && $patient > 1 && !empty($casesResults)):
			if(isset($casesResults[$patient-1])):
				$casesResults = array( $casesResults[$patient-1] );
			endif;
		endif;

		if( empty($casesResults) ) return;
		ob_start();
		foreach( $casesResults as $caseResult ):
			$imgsResults = rmg_img_model::find(NULL, array('case_id' => $caseResult['case_id'] ) );
			$imgsCounted = 1;

			$makeCaseLink	= $rmg_case::make_case_link( array( 'position' => $caseResult['position'] , 'category_id' => $category) );



			if(!empty($imagerow)):
				$imageset = 100;
				if(count($imgsResults) <= 1 ):
					$imagerow = 1;
				endif;

				$imagerow = ($imagerow-1);
				$imgsResults = array($imgsResults[$imagerow]);
			endif;

			foreach( $imgsResults as $imgsStack ):
				if($imgsCounted > $imageset ) continue;
				?>
				<div class="bnacase-imgset bncacase-<?=$caseResult['case_id'];?>">
					<div class="before">
						<a href="<?=$makeCaseLink; ?>"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?=$rmg_case::get_image($imgsStack['before_image_path'], 'large'); ?>" alt="bna-sample"  class="alignnone b-lazy size-full" /></a>
						<?php
						/**
						* Include tags : addtags="true" or addtags="false"
						*/
							if($addtags == true):?><span class="label">Before</span><?php endif;
						?>
					</div>
					<div class="after">
						<a href="<?=$makeCaseLink; ?>"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?=$rmg_case::get_image($imgsStack['after_image_path'], 'large'); ?>" alt="bna-sample"  class="alignnone b-lazy size-full" /></a>
						<?php
						/**
						* Include tags : addtags="true" or addtags="false"
						*/
							if($addtags == true):?><span class="label">After</span><?php endif;
						?>
					</div>
					<?php
						if( $catbtn == false ):
							if($casebtn == true):?><div><a href="<?=$makeCaseLink; ?>"><?=$casebtntxt;?></a></div><?php endif;
						else:
							$getCatPost = get_post($category);
							?> <div><a href="<?=get_permalink($getCatPost->ID);?>"><?=$getCatPost->post_title;?></a></div> <?php
						endif;
					?>
				</div>
			
			<?php
				$imgsCounted++;
			endforeach; /* END OF IMGS */

		endforeach; /* END OF CASE */
		if($galbtn == true):
			$gallerylinked = home_url( '/gallery/' );
			echo "<div><a href=\"{$gallerylinked}\">{$galbtntxt}</a></div>";
		endif;
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	});
}