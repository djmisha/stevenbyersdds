<?php get_header(); ?>
<main class="interior">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
        <article class="content">
            <div class="meta-data"><?php the_time('M');?> <?php the_time('j');?>, <?php the_time('Y'); ?> in <?php the_category(', '); ?><?php //the_author(); ?></div>
            <?php the_content();?>
            <?php edit_post_link( $link = __('<< EDIT >>'), $before = "<p>", $after ="</p>", $id ); ?>
        </article>
    <?php endwhile; endif;?>

    <div class="next-prev">
        <?php
        prevnext__modify( get_previous_post_link('%link', '<i class="fa fa-chevron-left" aria-hidden="true"></i> Previous') ,
            $attributes = array(
                'class' => 'button prev-blog-button',
            ));
            ?>
            <?php
            prevnext__modify( get_next_post_link('%link', 'Next <i class="fa fa-chevron-right" aria-hidden="true"></i>') ,
                $attributes = array(
                    'class' => 'button alignright next-blog-button',
                ));
            ?>
    </div>

    
</main>
<?php get_footer(); ?>