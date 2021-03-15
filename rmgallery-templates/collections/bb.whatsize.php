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
		
		return $output;
endif;endif;
