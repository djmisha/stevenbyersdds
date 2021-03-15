<?php
    /*
        RMG Template: BMI SORT
    */
?>

<?php 
	if(function_exists('is_rmgallery')):
    	if(is_rmgallery()):
    		global $post;
    		$api_link = rmg_helpers::request_uri();
    		$category_path  = $api_link;
    		$category_path = preg_replace('/\/gallery\//i', '/', $category_path);
    		$category_path_api = preg_replace('/\/gallery\//i', '/category/', $api_link);

    		$output = array();

    		$output['category_url'] = rtrim( site_url($api_link) , '/');
    		$output['api_url'] = rtrim( site_url('rmg__api') , '/');
    		$output['category_path'] = rtrim($category_path , '/');
    		$output['category_path_api'] = rtrim($category_path_api , '/');
    		$category_path = rtrim($category_path , '/');
    		$output['case_path_api'] = "/case/?in_cat={$category_path}/";

    		// echo '<pre>';
    		// 	print_r($output);
    		// echo '</pre>';
    		
    		// return $output;
    endif;endif;
 ?>


<?php get_header(); ?>


<script>
		/* <![CDATA[ */
		var BbWhatsize = {
			"category_url":"<?php echo $output['category_url']; ?>",
			"api_url":"<?php echo $output['api_url']; ?>",
			"category_path":"<?php echo $output['category_path']; ?>",
			"category_path_api":"<?php echo $output['category_path_api']; ?>",
			"case_path_api":"<?php echo $output['case_path_api']; ?>"
		};
		/* ]]> */
</script>


<?php
function rmg_meta_unique($post_id = '' , $meta_key = ''){
	$pre_op = rmg_case_model::find_by( 'mata_key&&category' , array('category_id' => $post_id , 'meta_key' => $meta_key));
	foreach( $pre_op as $k => $v ): if(empty($v['meta_value'])) continue; $pre_op_arr[] = $v['meta_value']; endforeach;
	return array_unique($pre_op_arr);
}
?>


<section class="back-btn"><a href="<?php bloginfo('url'); ?>/gallery" class="button">Back to Gallery</a></section>

<section>
	<?php $category_title =  get_the_title($post->in_cat_ID); ?>
	<h1 class="headline-gallery"><?php echo $category_title ?> Gallery</h1>
	
</section>

<section class="gallery-cat-wrap">

		<script type="text/template" id="single-case">

			<div class="bna-group">
			    <h2><%= bna.new_title %></h2>
				<div class="img-set" data-caseid="<%= bna.case_id %>">
					<% limit = 1 %>
					<% _.each(bna.images, function(bd , i) { %>
						<% if(i == 0){ /* LIMIT ONE */%>
							<a class="img-before col-xs-6" href="<%= bna.case_url %><%= bna.position %>"><?php echo uri_imgs('watermark.png',array(true , 'attr'=>array('class'=>'watermark')));?><img class="image_slide before" src="<%= bd.before_image_path %>"></a>
							<a class="img-after col-xs-6" href="<%= bna.case_url %><%= bna.position %>"><?php echo uri_imgs('watermark.png',array(true , 'attr'=>array('class'=>'watermark')));?><img class="image_slide after" src="<%= bd.after_image_path %>"></a>
						<%}%>
					<% }); %>
				</div>
				<div class="hover-overlay">
					<a href="<%= bna.case_url %><%= bna.position %>" class="button">View Case</a>
				</div>
			</div>

		</script>
		
		<?php if(have_posts()) : while (have_posts()) : the_post();?>
			<div id="search" class="clearfix">

				<?php $filters = rmg_category_controller::get_filters($post->ID); ?>
				<form id="caseSort">
				<div class="row">
					<?php $caseFilters = rmg_category_controller::get_filters( $id );
					foreach ( $caseFilters as $filter ): ?>
						<div class="info-box" id="<?php echo $filter['field_name']; ?>">
							<label class="title-<?php echo $filter['field_name']; ?>"><?php echo str_ireplace('_', ' ', $filter['field_name']); ?></label>
							<select name="filter_<?php echo $filter['field_name']; ?>">
								<option class="first" value=""><?php echo str_ireplace('_', ' ', $filter['field_name']); ?></option>
								<?php $options = (isset($filter['filterable_by_range']) && $filter['filterable_by_range'] == true ) ? $filter['ranges'] : $filter['values'];
								$options = $options? explode(',', str_ireplace(' ', '', $options)): null;
								foreach( $options as $option ):

									$display = $option;	//we're going to modify what is displayed in the select box without changing the values

									$display = (preg_match('/-/', $display) != false ) ? explode('-', $display) : $display;

									if( is_array($display) ):
										foreach( $display as $i => $v ):
											$v = intval($v);
											if( $v == 0 ):
												$display[$i] = "&le;";
											elseif ( $v == 999 ):
												$display[$i] = "&ge;";
											else:
												switch($filter['field_name']) {

													case 'height':
														$display[$i] = floor($v / 12) . '\'' . ($v % 12) . '"';
														break;
													case 'weight':

														$display[$i] = $v . ' lbs.';
														break;
												}
											endif;
										endforeach;

										if( $display[0] == "&le;"):
											$output = $display[0] . " " . $display[1];
										elseif ( $display[1] == "&ge;"):
											$output = $display[1] . " " . $display[0];
										else:
											$output = $display[0] . " - " . $display[1];
										endif;
									else:
										$output = $display;
									endif;
									?>

									<option value="<?php echo $option; ?>"><?php echo $output; ?></option>
								<?php endforeach; //$options ?>
							</select>
		                </div>
						<?php endforeach; //$casefilters ?>
					</div>
				</form>
				<div class="my-bmi">
					<a href="#bmicalc" >Calculate My BMI</a>
				</div>
			</div>
			<div id="loadingDiv"></div><!-- hides after fetch -->
			<div id="cases" class="bkbone case-layout row">
			<!-- Loaded using backbone -->
			</div>

		<?php endwhile; endif;?>


	<?php //BMI CALCULATOR SHOWS ON ALL CURRENTLY 
		//if($post->ID == 499) {
	 ?>
		<div id="bmicalc" class="bmiclass">
				<div class="bmibody">
			        <div class="bmi-text">
			            <span>BMI Calculator </span>
			            <p>At Prince Plastic Surgery, we use your BMI index to help us evaluate if you are a candidate for surgery. The key is to have "maintainable" weight at the time of surgery.</p>
			        </div>
			        <div class="bmilabelwrap">
			            <p class="bmiLabel">Height</p>
			            <div class="rangeslider-wrap">
			                <input class="bmiheight" type="range" min="48" max="84" step="1">
			            </div>
			        </div>
			        <div class="bmilabelwrap">
			            <p class="bmiLabel">Weight</p>
			            <div class="rangeslider-wrap">
			                <input class="bmiweight" type="range" min="70" max="325" step="1">
			            </div>
			        </div>

			        <div class="bmicalculationswrap">
			            <p class="bmiLabel">BMI</p>
			            <div class="bmicircle">47</div>
			            <div class="bmigray">
			                <div class="bmbgimage"></div>
			                <div class="bmitextresult"><!--Normal--></div>
			            </div>
			        </div>
			    </div>
			    <div class="bmi-key">
				    <p>* If your BMI is greater than 35 you are at an increased risk for having complications during and after surgery, therefore Dr. Prince requires your BMI to be < 35 for your safety.</p>
			       
			    </div>
			</div>

			<?php //} ?>

</section>

<?php get_footer(); ?>


<!-- SCRIPTS FOR GALLERY SORTING  -->
<script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-includes/js/underscore.min.js?ver=1.8.3"></script>
<script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-includes/js/backbone.min.js?ver=1.4.0"></script>
<script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/themes/princeplasticsurgery/rmgallery-templates/js/rmg.whatsize.js?ver=1"></script>


