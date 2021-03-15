<?php

/**
 * faq Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'faq-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'faq';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text = get_field('headline') ?: 'Your faq here...';
$author = get_field('author') ?: 'Author name';
$role = get_field('role') ?: 'Author role';
$image = get_field('image') ?: 295;
$background_color = get_field('background_color');  
$text_color = get_field('text_color');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> faq-block-wrap">
        <div class="top-faq-section"></div>
        <h2 class="faq-headline"><?php echo $text; ?></h2>

        <?php if(have_rows('questions')): ?>
            <ul>
                <?php while(have_rows('questions')): the_row(); ?>
                    <li>
                        <h3 class="question"><?php the_sub_field('question'); ?></h3>
                        <span class="answer"><?php the_sub_field('answer'); ?></span>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
  
    <style type="text/css">
        #<?php echo $id; ?> {
            background: <?php echo $background_color; ?>;
            color: <?php echo $text_color; ?>;
        }
    </style>
</div>