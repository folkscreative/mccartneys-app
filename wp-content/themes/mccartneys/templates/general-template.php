<?php

/**
 * Template Name: General Page Template
 */

get_header(); ?>

<main class="guide-pages page-wrap"> 
    <!-- Inner Banner -->
<?php if( have_rows('blocks') ): ?>
    <?php while( have_rows('blocks') ): the_row(); ?>
    <?php if( get_row_layout() == 'livestock_banner' ): ?>
        <?php
        $image_private = get_sub_field( 'livestock_background_image' );
        if ( !empty( $image_private ) ) { ?>
        <section class="box-banner" style="background-image:url('<?php echo $image_private['url']; ?>');">
        <?php }?>
    <div class="container">
        <div class="content">
        <div class="breadcrumb"><?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?></div>
        <h1><?php the_sub_field('livestock_banner_title'); ?></h1>
        </div>
    </div>
    </section>
<!-- Inner Bnner ends -->
<?php endif; ?>


<!-- boxes -->
<?php if( get_row_layout() == 'general-text' ): ?>
        
        <section class="general-page-outer">
           <div class="container">
               <div class="content">
                   <?php the_sub_field('general-content'); ?>
               </div>
        </div>
        </section>
        <!-- boxes ends -->
   <?php endif; ?>
    <?php endwhile; ?>
    <?php endif; ?> 

</main>

<?php get_footer();?>