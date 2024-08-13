<?php

/**
 * Template Name: Residential Letting Template
 */

get_header(); ?>
<main class="residential-letting page-wrap">
    <!-- Inner Banner -->
    <?php if( have_rows('blocks') ): ?>
    <?php while( have_rows('blocks') ): the_row(); ?>
    <?php if( get_row_layout() == 'livestock_banner' ): ?>
    <?php
            $image_private = get_sub_field( 'livestock_background_image' );
if ( !empty( $image_private ) ) { ?>
    <section class="inner-banner-wrapper sale" style="background-image:url('<?php echo $image_private['url']; ?>');">
        <?php }?>
        <div class="container">
            <div class="content">
                <div class="breadcrumb">
                    <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?></div>
                <h1><?php the_sub_field('livestock_banner_title'); ?></h1>
                <?php the_sub_field('livestock_banner_content'); ?>

            </div>
            <div class="inner">
                <div class="middle-col">
                    <?php echo do_shortcode('[property_search]'); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Bnner ends -->
    <?php endif; ?>
    <!-- Pedigree Center -->
    <?php if( get_row_layout() == 'livestock_sales' ): ?>
    <section class="properties-center">
        <div class="container">
            <div class="align-items-lg-center align-items-start d-flex g-4 row">
                <div class="col-12 col-md-6">
                    <div class="col-left">
                        <h2 class="title d-block d-md-none"><?php the_sub_field('livestock_sales_title'); ?></h2>
                        <?php
                     $livestock_sale = get_sub_field('livestock_left_image');
                if( !empty($livestock_sale) ):?>
                        <img src="<?php echo $livestock_sale['url']; ?>" alt="<?php echo $livestock_sale['alt']; ?>"
                            class="w-100">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="col-right">
                        <h2 class="title d-none d-md-block"><?php the_sub_field('livestock_sales_title'); ?></h2>
                        <?php the_sub_field('forthcoming_sales_right_content_area'); ?>
                        <?php 
                        $pc_top_button = get_sub_field('forthcoming_sales_&_catalogues_cta_link');
                        if( $pc_top_button ): 
                            $pc_top_button_url = $pc_top_button['url'];
                            $pc_top_button_title = $pc_top_button['title'];
                            $pc_top_button_target = $pc_top_button['target'] ? $pc_top_button['target'] : '_self';
                            ?>
                        <a class="btn-cs-dark" href="<?php echo esc_url( $pc_top_button_url ); ?>"
                            target="<?php echo esc_attr( $pc_top_button_target ); ?>"><?php echo esc_html( $pc_top_button_title ); ?><span><i
                                    class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pedigree Center ends -->

    <!-- recent property section start here -->
    <section class="recent-property-wrapper">
        <div class="container">
            <?php echo do_shortcode('[recent_property_tabs]'); ?>
            <a href="#" class="btn-cs-dark">View all properties</a>
        </div>
    </section>
    <!-- recent property section ends here -->
    <?php endif; ?>

    <!-- Sell Properties Blocks -->
    <?php if( get_row_layout() == 'property_sell_blocks' ): ?>
    <section class="sell-properties-blocks">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-sm-4">
                    <div class="contex">
                        <h2><?php the_sub_field('property_sell_title'); ?></h2>
                        <p><?php the_sub_field('property_sell_description'); ?></p>
                    </div>
                </div>
                <?php if( have_rows('property_blocks_section_repeater') ): ?>

                <?php while( have_rows('property_blocks_section_repeater') ): the_row(); ?>
                <div class="col-12 col-sm-4">
                    <div class="blocks">
                        <h4><?php the_sub_field('block_repeater_title'); ?></h4>
                        <p><?php the_sub_field('block_repeater_description'); ?></p>
                    </div>
                </div>
                <?php endwhile; ?>

                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- Sell Properties Blocks ends -->


    <!-- Cta banner -->
    <?php if( get_row_layout() == 'call_to_action' ): ?>
    <section class="cta-banner light">
        <div class="container">
            <div class="row g-0 align-items-center">

                <div class="col-12 col-md-5">
                    <div class="col-left">
                        <h2><?php the_sub_field('call_to_action_title'); ?></h2>
                        <p><?php the_sub_field('call_to_action_content'); ?></p>
                        <a class="btn-bn-light"
                            href="<?php the_sub_field('call_to_action_link'); ?>"><?php the_sub_field('call_to_action_label'); ?><span><i
                                    class="fa-solid fa-angle-right"></i></span></a>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="col-right">
                        <?php
                     $cta_clip_img = get_sub_field('call_to_action_right_image');
                if( !empty($cta_clip_img) ):?>
                        <img src="<?php echo $cta_clip_img['url']; ?>" alt="<?php echo $cta_clip_img['alt']; ?>"
                            class="w-100">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- Cta banner ends -->

    <!-- Livestock Auctioneers start here -->
    <?php if( get_row_layout() == 'livestock_auctioneers' ): ?>
    <section class="livestock-auctioneers sale d-none d-md-block">
        <div class="container">
            <div class="row g-4">
                <div class="col-4 col-lg-3">
                    <div class="livestock-auctioneers-content col-left">
                        <h2><?php the_sub_field('livestock_auctioneer_heading'); ?></h2>
                        <p><?php the_sub_field('livestock_auctioneer_content'); ?></p>
                    </div>
                </div>
                <?php if( have_rows('livestock_auctioneers_details') ):
                     while ( have_rows('livestock_auctioneers_details') ) : the_row();?>

                <div class="col-4 col-lg-3">
                    <div class="livestock-auctioneers-content">
                        <div class="info-wrapper">
                            <?php
                    $ac_image = get_sub_field('livestock_auctioneers_image');
                    ?>
                            <?php if( !empty($ac_image) ):?>
                            <img src="<?php echo $ac_image['url']; ?>" alt="<?php echo $ac_image['alt']; ?>"
                                class="w-100">
                            <?php endif; ?>
                            <ul class="info-box">
                                <li>
                                    <i class="fa-solid fa-phone"></i>
                                    <a
                                        href="tel:<?php the_sub_field('livestock_auctioneers_number'); ?>"><?php the_sub_field('livestock_auctioneers_number'); ?></a>
                                </li>
                                <li>
                                    <i class="fa-regular fa-envelope"></i>
                                    <a
                                        href="mailto:<?php the_sub_field('livestock_auctioneers_email'); ?>"><?php the_sub_field('livestock_auctioneers_email'); ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h4><?php the_sub_field('livestock_auctioneers_name'); ?></h4>
                            <p><?php the_sub_field('livestock_auctioneers_post_title'); ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?><?php endif;?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- Livestock Auctioneers ends here -->

    <!-- Livestock Auctioneers mobile start here -->
    <?php if( get_row_layout() == 'livestock_auctioneers' ): ?>
    <section class="livestock-auctioneers sale d-block d-md-none">
        <div class="container">
            <div class="row g-4">
                <div class="items">
                    <div class="livestock-auctioneers-content col-left">
                        <h2><?php the_sub_field('livestock_auctioneer_heading'); ?></h2>
                        <p><?php the_sub_field('livestock_auctioneer_content'); ?></p>
                    </div>
                </div>
            </div>
            <div class="wrapp livestocks">
                <?php if( have_rows('livestock_auctioneers_details') ):
                     while ( have_rows('livestock_auctioneers_details') ) : the_row();
                     $ac_image = get_sub_field('livestock_auctioneers_image');
                     ?>
                <div class="items">
                    <div class="livestock-auctioneers-content">
                        <div class="info-wrapper">
                            <?php if( !empty($ac_image) ):?>
                            <img src="<?php echo $ac_image['url']; ?>" alt="<?php echo $ac_image['alt']; ?>"
                                class="w-100">
                            <?php endif; ?>
                            <ul class="info-box">
                                <li>
                                    <i class="fa-solid fa-phone"></i>
                                    <a
                                        href="tel:<?php the_sub_field('livestock_auctioneers_number'); ?>"><?php the_sub_field('livestock_auctioneers_number'); ?></a>
                                </li>
                                <li>
                                    <i class="fa-regular fa-envelope"></i>
                                    <a
                                        href="mailto:<?php the_sub_field('livestock_auctioneers_email'); ?>"><?php the_sub_field('livestock_auctioneers_email'); ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h4><?php the_sub_field('livestock_auctioneers_name'); ?></h4>
                            <p><?php the_sub_field('livestock_auctioneers_post_title'); ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?><?php endif;?>
            </div>
        </div>
    </section>
    <?php endif;?>
    <!-- Livestock Auctioneers mobile ends here -->

    <?php endwhile; ?>
    <?php endif; ?>
    <!-- Livestock faqs ends -->

    <!-- Departments -->
    <section class="departments other">
        <div class="container">
            <div class="content">
                <?php if( get_field('our_departments_title', 'option') ): ?>
                <h2><?php the_field('our_departments_title', 'option'); ?></h2>
                <?php endif; ?>
                <?php if( get_field('our_departments_description', 'option') ): ?>
                <p><?php the_field('our_departments_description', 'option'); ?></p>
                <?php endif; ?>
            </div>
            <?php if( have_rows('our_departments_slider', 'option') ): ?>
            <div class="depart-slider depar">
                <?php while( have_rows('our_departments_slider', 'option') ): the_row(); ?>
                <div class="slide-wrap">
                    <?php
                $department_slider_bg_image = get_sub_field('our_departments_thumbnail', 'option');
                if( !empty($department_slider_bg_image) ):?>
                    <img src="<?php echo $department_slider_bg_image['url']; ?>"
                        alt="<?php echo $department_slider_bg_image['alt']; ?>">
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
                        <a class="btn-cs-light" href="<?php echo esc_url( $department_cartneys_slider_link_url ); ?>"
                            target="<?php echo esc_attr( $department_cartneys_slider_link_target ); ?>"><?php echo esc_html( $department_cartneys_slider_link_title ); ?><span><i
                                    class="fa-solid fa-angle-right"></i></span></a>
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