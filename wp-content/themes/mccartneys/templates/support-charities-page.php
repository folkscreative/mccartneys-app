<?php

/**
 * Template Name: Support Charity Template
 */

get_header(); ?>

<main class="charity page-wrap"> 
     <!-- Inner Banner -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
        <?php if( get_row_layout() == 'livestock_banner' ): ?>
           <?php
            $image_private = get_sub_field( 'livestock_background_image' );
            if ( !empty( $image_private ) ) { ?>
            <section class="inner-banner-wrapper rural vacancies" style="background-image:url('<?php echo $image_private['url']; ?>');">
            <?php }?>
        <div class="container">
            <div class="content">
            <div class="breadcrumb"><?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?></div>
            <h1><?php the_sub_field('livestock_banner_title'); ?></h1>
            <p><?php the_sub_field('livestock_banner_content'); ?></p>
            </div>
        </div>
     </section>
    <!-- Inner Bnner ends -->
    <?php endif; ?>
    

    <!-- Support cancer -->
    <?php if( get_row_layout() == 'support_cancer' ): ?>
     <section class="support-cancer support" id="support-charities">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="col-left">
                        <h2><?php the_sub_field('support_cancer_title');?></h2>
                        <?php $prostate_image = get_sub_field('support_cancer_image');
                             if( !empty($prostate_image) ):?>
                            <img src="<?php echo $prostate_image['url']; ?>" alt="<?php echo $prostate_image['alt']; ?>" class="w-100">
                            <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="col-right">
                        <?php the_sub_field('support_cancer_content'); ?>
                    </div>
                </div>
            </div>
        </div>
     </section>
     <?php endif; ?>
    <!-- Support cancer ends -->

    <!-- Past charities -->
    <?php if( get_row_layout() == 'past_supported_charities' ): ?>
     <section class="past-charities">
        <div class="container">
            <div class="top-img">
            <?php $charity_top_image = get_sub_field('past_support_charities_image');
                    if( !empty($charity_top_image) ):?>
                    <img src="<?php echo $charity_top_image['url']; ?>" alt="<?php echo $charity_top_image['alt']; ?>" class="w-100">
                    <?php endif; ?>
            </div>
        <article class="timeline-wrapper">
            <div class="col-left">
                <div class="content">
                <h2><?php the_sub_field('past_support_charities_title'); ?></h2>
                <p><?php the_sub_field('past_support_charities_description'); ?></p>
                </div>
        <nav class="navigation">
        <?php if( have_rows('past_charities_repeater') ):
                        while ( have_rows('past_charities_repeater') ) : the_row();?>
            <a href="#" class="navigation__link"><?php the_sub_field('past_charity_name'); ?></a>
            <?php endwhile; ?><?php endif;?>
            </nav>
            </div>
            <div class="wrapper-time">
            <?php if( have_rows('past_charities_repeater') ):
                        while ( have_rows('past_charities_repeater') ) : the_row();?>
            <div class="iteml"> 
                <?php the_sub_field('past_charities_content'); ?>
            </div>
            <?php endwhile; ?><?php endif;?>
            </div>
        </article>
        </div>
     </section>
     <?php endif; ?>
    <!-- Past charities ends -->

    <!-- Support charities -->
    <?php if( get_row_layout() == 'support_charities' ): ?>
     <section class="charities-logos support">
        <div class="container">
            <div class="justify-content-center justify-content-md-between row">
            <?php if( have_rows('mc_charities_logos') ):
                while ( have_rows('mc_charities_logos') ) : the_row();?>
                <div class="col-6 col-sm-4 col-md-2 align-content-center">
                    <div class="item">
                    <?php $charity_logo = get_sub_field('charities_logo');
                    if( !empty($charity_logo) ):?>
                    <img src="<?php echo $charity_logo['url']; ?>" alt="<?php echo $charity_logo['alt']; ?>">
                    <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?><?php endif;?>
            </div>
            <?php 
            $charity_button = get_sub_field('support_charities_button');
            if( $charity_button ): 
                $charity_button_url = $charity_button['url'];
                $charity_button_title = $charity_button['title'];
                $charity_button_target = $charity_button['target'] ? $charity_button['target'] : '_self';
                ?>
                <a class="btn-cs-dark" href="<?php echo esc_url( $charity_button_url ); ?>" target="<?php echo esc_attr( $charity_button_target ); ?>"><?php echo esc_html( $charity_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
            <?php endif; ?>
        </div>
     </section>
     <?php endif; ?>
    <!-- Support charities ends -->
    <?php endwhile; ?>
<?php endif; ?>
    <!-- Livestock Auctioneers for mobile ends here -->

    <!-- Departments -->
    <section class="departments others">
        <div class="container">
            <div class="content">
                    <h2><?php the_field('our_departments_title', 'option'); ?></h2>
                    <p><?php the_field('our_departments_description', 'option'); ?></p>
            </div>
            <?php if( have_rows('our_departments_slider', 'option') ): ?>
            <div class="depart-slider depar">
            <?php while( have_rows('our_departments_slider', 'option') ): the_row(); ?>
            <div class="slide-wrap">
            <?php
                $department_slider_bg_image = get_sub_field('our_departments_thumbnail', 'option');
                if( !empty($department_slider_bg_image) ):?>
                <img src="<?php echo $department_slider_bg_image['url']; ?>" alt="<?php echo $department_slider_bg_image['alt']; ?>">
                <?php endif; ?>
                <div class="inner-content">
                    <h3><?php the_sub_field('department_cart_title', 'option'); ?></h3>
                    <p><?php the_sub_field('department_cart_description', 'option'); ?></p>
                    <?php 
                        $department_cartneys_slider_link = get_sub_field('department_slider_button', 'option');
                        if( $department_cartneys_slider_link ): 
                            $department_cartneys_slider_link_url = $department_cartneys_slider_link['url'];
                            $department_cartneys_slider_link_title = $department_cartneys_slider_link['title'];
                            $department_cartneys_slider_link_target = $department_cartneys_slider_link['target'] ? $department_cartneys_slider_link['target'] : '_self';
                            ?>
                            <a class="btn-cs-light" href="<?php echo esc_url( $department_cartneys_slider_link_url ); ?>" target="<?php echo esc_attr( $department_cartneys_slider_link_target ); ?>"><?php echo esc_html( $department_cartneys_slider_link_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                </div>
                </div>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>                     
        </div>
     </section>
     <!-- Departments ends -->
</main>

<?php get_footer();?>