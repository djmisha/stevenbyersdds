<?php

// This extends the Guttenberg Admin add a stylesheet.  The stylesheet makes the width of the editor 1080px
// This help with adding content in the back end.  WordPress leaves it up to theme developers to changes this
// the defailt width is 580px

function admin_theme_style()
{
  wp_enqueue_style( 'admin-theme', get_stylesheet_directory_uri() . '/inc/blockeditor/guttenberg-styles.css' );
}
add_action('admin_enqueue_scripts', 'admin_theme_style');
add_action('login_enqueue_scripts', 'admin_theme_style');