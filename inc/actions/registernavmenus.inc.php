<?php

/**
 * Register new Navigation menu
 */	
function register_my_menus() {
  register_nav_menus( array( 'header-menu' => __( 'Header Navigation' ) ) );
  register_nav_menus( array( 'footer-menu' => __( 'Footer Navigation' ) ) );
}

add_action( 'init', 'register_my_menus' );