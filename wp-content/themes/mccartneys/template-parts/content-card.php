<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mccartneys
 */

?>

<div class="col-md-4 post-card">
    <div class="card mb-4">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
        <?php endif; ?>
        <div class="card-body">
            <span class="badge bg-danger"><?php $category = get_the_category(); echo $category[0]->name; ?></span>
            <h5 class="card-title mt-2"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
            <p class="text-muted"><?php echo get_the_date(); ?></p>
        </div>
    </div>
</div>
