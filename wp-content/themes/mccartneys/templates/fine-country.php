<?php

/**
 * Template Name: Fine & Country Temp
 */

get_header(); ?>
<main class="commercial-sales property-sub-page page-wrap">
    <!-- Inner Banner -->
    <?php if( have_rows('blocks') ): ?>
    <?php while( have_rows('blocks') ): the_row(); ?>
    <?php if( get_row_layout() == 'livestock_banner' ): ?>
    <?php
            $image_private = get_sub_field( 'livestock_background_image' );
if ( !empty( $image_private ) ) { ?>
    <section class="fine-country-banner-wrap inner-banner-wrapper sale"
        style="background-image:url('<?php echo $image_private['url']; ?>');">
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
                        <div class="btn-wrap-csf">
                            <?php 
                        $center_buy_button = get_sub_field('forthcoming_sales_&_catalogues_cta_link');
                        if( $center_buy_button ): 
                            $center_buy_button_url = $center_buy_button['url'];
                            $center_buy_button_title = $center_buy_button['title'];
                            $center_buy_button_target = $center_buy_button['target'] ? $center_buy_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $center_buy_button_url ); ?>"
                                target="<?php echo esc_attr( $center_buy_button_target ); ?>"><?php echo esc_html( $center_buy_button_title ); ?><span><i
                                        class="fa-solid fa-angle-right"></i></span></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pedigree Center ends -->
    <?php endif; ?>

    <!-- recent property section start here -->
    <?php if( get_row_layout() == 'recent_property_section' ): ?>
    <section class="recent-property-wrapper">
        <div class="container">

            <div class="outer-wrapper">
                <h2 class="title"><?php the_sub_field('recent_property_title'); ?></h2>
                <ul class="nav nav-tabs" id="propertyTab" role="tablist">
               
                <li class="nav-item" role="presentation"><a class="nav-link active" id="tab-rent" data-bs-toggle="tab"
                            href="#rent" role="tab" aria-controls="rent" aria-selected="false" tabindex="-1">Rent</a>
                </li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="tab-sale" data-bs-toggle="tab"
                            href="#sale" role="tab" aria-controls="sale" aria-selected="false" tabindex="-1">Sale</a>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="tab-auction"
                            data-bs-toggle="tab" href="#auction" role="tab" aria-controls="auction"
                            aria-selected="true">Auction</a></li>
                   
                   
                    <li class="nav-item" role="presentation"><a class="nav-link" id="tab-new-homes" data-bs-toggle="tab"
                            href="#new-homes" role="tab" aria-controls="new-homes" aria-selected="false"
                            tabindex="-1">New Homes</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="propertyTabContent">
                <div class="tab-pane fade" id="auction" role="tabpanel" aria-labelledby="tab-auction">
                    <div class="inner-tabs pr">
                        <?php echo do_shortcode('[recent_properties department="property-land-auctions"  no_results_output="' . $no_results_message . '"]');?>
                    </div>
                    <a class="btn-cs-dark"
                        href="<?php echo apply_filters( 'propertyhive_search_form_action', get_post_type_archive_link( 'property' ) ); ?>?department=property-land-auctions">View
                        all properties</a>
                </div>



                <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="tab-sale">
                    <div class="inner-tabs pr">
                        <?php echo do_shortcode('[recent_properties department="fine-and-country"]');?>
                    </div>
            
                        <?php
                        // Check if the current slug exists in the map
                        if (array_key_exists($current_slug, $branch_ph_office_map)) {
                            // Get the office ID associated with the current slug
                            $office_id = $branch_ph_office_map[$current_slug];

                            // Output the desired shortcode with the mapped office ID
                           echo do_shortcode('[properties department="fine-and-country" office_id="' . $office_id . '" no_results_output="' . $no_results_message . '"]');
                        } else {
                            // Optionally handle cases where the slug isn't in the map
                            echo do_shortcode('[properties department="fine-and-country" no_results_output="' . $no_results_message . '"]');
                        }
                    ?>

                <a class="btn-cs-dark" href="<?php echo apply_filters( 'propertyhive_search_form_action', get_post_type_archive_link( 'property' ) ); ?>?department=residential-sales">View
                        all properties</a>
                </div>

                









                <div class="tab-pane fade show active" id="rent" role="tabpanel" aria-labelledby="tab-rent">
                    <div class="inner-tabs pr">
                        <?php echo do_shortcode('[recent_properties _parent_department="Lettings"]');?>
                    </div>
                    <a class="btn-cs-dark"
                        href="<?php echo apply_filters( 'propertyhive_search_form_action', get_post_type_archive_link( 'property' ) ); ?>?_parent_department=Lettings">View
                        all properties</a>
                </div>
                <div class="tab-pane fade" id="new-homes" role="tabpanel" aria-labelledby="tab-new-homes">
                    <div class="inner-tabs pr">
                        <?php echo do_shortcode('[recent_properties department="new-homes"]');?>
                    </div>
                    <a class="btn-cs-dark"
                        href="<?php echo apply_filters( 'propertyhive_search_form_action', get_post_type_archive_link( 'property' ) ); ?>?department=new-homes">View
                        all properties</a>
                </div>

            </div>
            
        </div>
    </section>
    <?php endif; ?>
    <!-- recent property section ends here -->



    <!-- properties-right -->
    <?php if( get_row_layout() == 'property_right_section' ): ?>
    <section class="properties-right">
        <div class="container">
            <div class="align-items-lg-center align-items-start d-flex g-4 row flex-column-reverse flex-md-row">

                <div class="col-12 col-md-6">
                    <div class="col-left">
                        <h2 class="title d-none d-md-block"><?php the_sub_field('property_title'); ?></h2>
                        <?php the_sub_field('property_left_content_area'); ?>
                        <div class="btn-wrap-csf">
                            <?php 
                        $but_top_button = get_sub_field('property_cta_link');
                        if( $but_top_button ): 
                            $but_top_button_url = $but_top_button['url'];
                            $but_top_button_title = $but_top_button['title'];
                            $but_top_button_target = $but_top_button['target'] ? $but_top_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $but_top_button_url ); ?>"
                                target="<?php echo esc_attr( $but_top_button_target ); ?>"><?php echo esc_html( $but_top_button_title ); ?><span><i
                                        class="fa-solid fa-angle-right"></i></span></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="col-right">
                        <h2 class="title d-block d-md-none"><?php the_sub_field('property_title'); ?></h2>
                        <?php
                     $property_img = get_sub_field('property_right_image');
                if( !empty($property_img) ):?>
                        <img src="<?php echo $property_img['url']; ?>" alt="<?php echo $property_img['alt']; ?>"
                            class="w-100">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- properties-right ends -->
    <?php endif; ?>





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

    <!-- Start Property section here -->
    <?php if( get_row_layout() == 'property_tabs_section' ): ?>
    <section class="property-wrapper fc-page">
        <div class="container">
            <h2 class="title"><?php the_sub_field('property_tab_title'); ?></h2>
            <p class="description"><?php the_sub_field('property_tab_description'); ?></p>
            <?php echo do_shortcode(get_sub_field('property_tab_shortcode_new'));?>
        </div>
    </section>
    <?php endif; ?>
    <!-- End Property section here -->



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
                        $department_cartneys_slider_link = get_sub_field('department_slider_button', 'option');
                        if( $department_cartneys_slider_link ): 
                            $department_cartneys_slider_link_url = $department_cartneys_slider_link['url'];
                            $department_cartneys_slider_link_title = $department_cartneys_slider_link['title'];
                            $department_cartneys_slider_link_target = $department_cartneys_slider_link['target'] ? $department_cartneys_slider_link['target'] : '_self';
                            ?>
                        <a class="btn-transparent" href="<?php echo esc_url( $department_cartneys_slider_link_url ); ?>"
                            target="<?php echo esc_attr( $department_cartneys_slider_link_target ); ?>"><?php echo esc_html( $department_cartneys_slider_link_title ); ?><span><i
                                    class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
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