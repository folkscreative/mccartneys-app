<?php

/**
 * Template Name: Tenants Page Template
 */

get_header(); ?>

<main class="tenant-page page-wrap"> 
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


<!-- Livestock faqs -->

    <?php if( get_row_layout() == 'information_tenant_faqs' ): ?>
    <section class="livestock-faqs">
        <div class="container">
            <div class="row g-0">
                <div class="col-12">
                    <div class="col-left">
                         <h2><?php the_sub_field('information_tenant_question_title'); ?></h2>
                         <p><?php the_sub_field('information_tenant_question_description'); ?></p>
                    </div>
                </div>
                <div class="col-12">
                     <div class="faqs-wrapper">
                     <?php if( have_rows('information_tenant_question_detail') ):
                             while ( have_rows('information_tenant_question_detail') ) : the_row();?>
                        <div class="faqs-item">
                             <div class="top-bar">
                                <h4><?php the_sub_field('information_tenant_question_questions'); ?></h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                             <?php the_sub_field('information_tenant_questions_answers'); ?>
                                 
                             </div>
                             <span class="x-icon"><i class="fa-solid fa-xmark"></i></span>
                             </div>
                        </div>
                        <?php endwhile; ?>
                        <?php endif; ?> 
                     </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- Livestock faqs ends -->

    <?php endwhile; ?>
    <?php endif; ?> 

</main>

<?php get_footer();?>