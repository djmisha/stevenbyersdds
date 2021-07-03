<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="maximum-scale=5.0, user-scalable=yes, width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <title><?php wp_title(""); ?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital@0;1&family=Sen:wght@400;700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <a href="#skiptomaincontent" style="display:none;">Skip to main content</a>
  
  <header class="site-header <?php echo is_front_page() ? 'front-header' : 'int-header'; ?>">
    <div class="masthead">
        <div class="mast-logo"> 
            <a href="<?php bloginfo('url'); ?>"><?php echo inline_svg('logo'); ?></a>
        </div>

        <div class="header-buttons">
          <a href="#contact-form"><div><?php echo inline_svg('icon-chat'); ?><span>Request an Appointment</span></div></a>
          <a href="tel:+16192827060"><div><?php echo inline_svg('icon-phone'); ?><span>(619) 282-7060</span></div></a>
        </div>

        <div class="menu-trigger" id="moby-button">
            <div class="nav-hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    
    <nav id="main-nav">
        <?php wp_nav_menu(array(
            'menu'      => 'Main Navigation'
        )); ?>
    </nav>
  </header>

  <?php if (!is_front_page()) { // Headers for inside pages  ?>
    <section class="internal-header-images">
        <div class="internal-logo"> 
            <a href="<?php bloginfo('url'); ?>"><?php echo inline_svg('logo'); ?></a>
        </div>
    </section>
    <div class="page-title">
        <?php if (is_search()): ?>
        <div class="headline">Search Results</div>
        <?php elseif (this_is('gallery-child')): ?>
        <?php $category_title =  get_the_title($post->in_cat_ID); ?>
        <div class="headline"><?php echo $category_title ?> Gallery</div>
        <?php elseif (this_is('gallery')): ?>
        <?php elseif (this_is('gallery-case')): ?>
        <?php $category_title =  get_the_title($post->in_cat_ID); ?>
        <div class="headline"><?php echo $category_title ?> - <span class="single-case-title"><?php the_title(); ?></span></div>
        <h1>Photo Gallery</h1>
        <?php elseif (is_home() or is_archive()): ?>
        <h1>Blog</h1>
        <?php elseif (is_single()): ?>
        <h1> <?php the_title();?></h1>
        <?php else: ?>
        <h1> <?php the_title();?></h1>
        <?php endif; ?>
    </div>
  <?php } ?>
