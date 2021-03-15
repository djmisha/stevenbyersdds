<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="maximum-scale=5.0, user-scalable=yes, width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <title><?php wp_title(""); ?></title>

    <?php if (!is_404()): ?>

		<?php miniCSS::url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap'); ?>
        <!-- <link rel="stylesheet" href="https://use.typekit.net/aoz1zlk.css"> -->
        <script src="https://use.typekit.net/aoz1zlk.js"></script>
        <script>try{Typekit.load({ async: false });}catch(e){}</script>
        
    <?php endif; ?>


    <?php wp_head(); ?>

    <?php // Analytics and Tags : WP Admin Site settings > Admin
        $google_analytics = get_field("google_analytics", 'option');
        if (!empty($google_analytics)): echo $google_analytics;
        else: // Do nothing
        endif;
    ?>

</head>

<body <?php body_class(); ?>>

    <a href="#skiptomaincontent" style="display:none;">Skip to main content</a>
    
    <header class="site-header <?php echo is_front_page() ? 'front-header' : 'int-header'; ?>">
        <div class="masthead">
            <div class="menu-trigger" id="moby-button">
                <div class="nav-hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

          <?php if( have_rows('locations', 'option')): ?>
              <?php while( have_rows('locations', 'option')): the_row();
                $phone = get_sub_field('phone');
                $tel = str_replace(array('.', ',', '-', '(', ')', ' '), '' , $phone);
            ?>
              <?php
                if($phone) echo '<div class="mast-phone">
                <a href="tel:+1' . $tel . '">' . $phone . '</a></div>';
                ?>
              <?php endwhile; ?>
          <?php endif; ?>

        </div>
       
        <div class="sticky-trigger">
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
                'menu'      => 'Main Navigation',
                // 'container_class' => 'menu-wrap',
                // 'menu_id'   => 'menu-main',
                // 'menu_class' => 'main-menu',
            )); ?>
        </nav>


    <?php if (is_page_template('page-no-header.php')) { // Logo inside pages with No header ?>
        <!-- <div class="inside-logo"> <a href="<?php bloginfo('url'); ?>"><?php echo inline_svg('inside-logo'); ?> </a></div> -->
    <!-- <div class="inside-hero-buttons">
        <?php if(have_rows('home_procedures', 87)): ?>
            <?php while(have_rows('home_procedures', 87)): the_row(); ?>
                <a href="<?php the_sub_field('link'); ?>">
                   <img src="<?php the_sub_field('small_icon'); ?>" alt=" <?php the_sub_field('name'); ?> icon">
                </a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div> -->
    <?php } ?>


    </header>


<?php if (!is_front_page() && !is_page_template('page-no-header.php')) { // Headers for inside pages: Contact, Blog, Single, Gallery  ?>
        <section class="internal-header-images" <?php //header_images(); ?>>
            <div class="internal-logo"> <?php echo inline_svg('logo-inside'); ?> </div>
            <!-- <div class="breadcrumb-wrap">
                <div class="site-crumbs"><?php echo __salaciouscrumb(); ?></div>
            </div> -->
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


