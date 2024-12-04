<?php

/**
 * Template Name: Property & Land Template
 */

get_header(); ?>
<main class="agricultural-letting property-sub-page page-wrap">
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
            <div class="align-items-lg-start align-items-start d-flex g-4 row">
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
                            <?php 
                        $center_sell_button = get_sub_field('forthcoming_sales_report_cta_link');
                        if( $center_sell_button ): 
                            $center_sell_button_url = $center_sell_button['url'];
                            $center_sell_button_title = $center_sell_button['title'];
                            $center_sell_button_target = $center_sell_button['target'] ? $center_sell_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-white" href="<?php echo esc_url( $center_sell_button_url ); ?>"
                                target="<?php echo esc_attr( $center_sell_button_target ); ?>"><?php echo esc_html( $center_sell_button_title ); ?><span><i
                                        class="fa-solid fa-angle-right"></i></span></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pedigree Center ends -->
    <?php endif;?>
    <!-- properties-right -->
    <?php if( get_row_layout() == 'property_right_section' ): ?>
    <section class="properties-right auction">
        <div class="container">
            <div class="align-items-lg-start align-items-start d-flex g-4 row flex-column-reverse flex-md-row">

                <div class="col-12 col-md-6">
                    <div class="col-left">
                        <h2 class="title d-none d-md-block"><?php the_sub_field('property_title'); ?></h2>
                        <?php the_sub_field('property_left_content_area'); ?>
                        <div class="btn-wrap-csf">
                            <?php 
                        $buy_top_button = get_sub_field('property_cta_link');
                        if( $buy_top_button ): 
                            $buy_top_button_url = $buy_top_button['url'];
                            $buy_top_button_title = $buy_top_button['title'];
                            $buy_top_button_target = $buy_top_button['target'] ? $buy_top_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $buy_top_button_url ); ?>"
                                target="<?php echo esc_attr( $buy_top_button_target ); ?>"><?php echo esc_html( $buy_top_button_title ); ?><span><i
                                        class="fa-solid fa-angle-right"></i></span></a>
                            <?php endif; ?>
                            <?php 
                        $sell_top_button = get_sub_field('property_cta_main_link');
                        if( $sell_top_button ): 
                            $sell_top_button_url = $sell_top_button['url'];
                            $sell_top_button_title = $sell_top_button['title'];
                            $sell_top_button_target = $sell_top_button['target'] ? $sell_top_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-white" href="<?php echo esc_url( $sell_top_button_url ); ?>"
                                target="<?php echo esc_attr( $sell_top_button_target ); ?>"><?php echo esc_html( $sell_top_button_title ); ?><span><i
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
    <?php endif;?>

    <!-- recent property section start here -->
    <?php if( get_row_layout() == 'recent_property_section' ): ?>
    <section class="recent-property-wrapper land">
        <div class="container">

            <div class="outer-wrapper">
                <h2 class="title"><?php the_sub_field('recent_property_title'); ?></h2>
                <ul class="nav nav-tabs" id="propertyTab" role="tablist">
                <li class="nav-item" role="presentation"><a class="nav-link active" id="tab-auction" data-bs-toggle="tab" href="#auction" role="tab" aria-controls="auction" aria-selected="true">Auction</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="tab-rent" data-bs-toggle="tab" href="#rent" role="tab" aria-controls="rent" aria-selected="false" tabindex="-1">Rent</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="tab-sale" data-bs-toggle="tab" href="#sale" role="tab" aria-controls="sale" aria-selected="false" tabindex="-1">Sale</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="tab-new-homes" data-bs-toggle="tab" href="#new-homes" role="tab" aria-controls="new-homes" aria-selected="false" tabindex="-1">New Homes</a></li>
                </ul>
            </div> 
            <div class="tab-content" id="propertyTabContent">
                <div class="tab-pane fade show active" id="auction" role="tabpanel" aria-labelledby="tab-auction">
                <?php
                        $department = "property-land-auctions"; // Set the department variable
                        $no_results_message = "No properties found"; // Set the message to display when no properties are available
                        ?>

                        <div class="inner-tabs pr">
                            <?php
                            echo do_shortcode('[recent_properties department="' . $department . '" no_results_output="' . $no_results_message . '"]');
                            ?>
                        </div>
                    <a class="btn-cs-dark"
                        href="<?php echo apply_filters( 'propertyhive_search_form_action', get_post_type_archive_link( 'property' ) ); ?>?department=property-land-auctions">View
                        all properties</a>
                </div>
                <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="tab-sale">
                    <div class="inner-tabs pr">
                        <?php echo do_shortcode('[recent_properties department="residential-sales"]');?>
                    </div>
                    <a class="btn-cs-dark"
                        href="<?php echo apply_filters( 'propertyhive_search_form_action', get_post_type_archive_link( 'property' ) ); ?>?department=residential-sales">View
                        all properties</a>
                </div>
                <div class="tab-pane fade" id="rent" role="tabpanel" aria-labelledby="tab-rent">
                    <div class="inner-tabs pr">
                    <?php echo do_shortcode('[recent_properties department="residential-lettings"]');?>
                    </div>
                    <a class="btn-cs-dark"
                        href="<?php echo apply_filters( 'propertyhive_search_form_action', get_post_type_archive_link( 'property' ) ); ?>?department=residential-lettings">View
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
        <div class="container collapsed">
            <div class="row g-4 action-trim">
                 <div class="col-4 col-lg-3 action-trim-item">
                    <div class="livestock-auctioneers-content col-left">
                        <h2><?php the_sub_field('livestock_auctioneer_heading'); ?></h2>
                        <p><?php the_sub_field('livestock_auctioneer_content'); ?></p>
                    </div>
                </div>
                <?php if( have_rows('livestock_auctioneers_details') ):
                     while ( have_rows('livestock_auctioneers_details') ) : the_row();?>
                     
                <div class="col-4 col-lg-3 action-trim-item repeat-team">
                    <div class="livestock-auctioneers-content">
                    <div class="info-wrapper">
                    <?php
                    $ac_image = get_sub_field('livestock_auctioneers_image');
                    ?>
                    <?php if( !empty($ac_image) ):?>
                        <img src="<?php echo $ac_image['url']; ?>" alt="<?php echo $ac_image['alt']; ?>" class="w-100">
                    <?php endif; ?>
                    <ul class="info-box">
                    <?php if( get_sub_field('livestock_auctioneers_number') ): ?>
                    <li>
                            <i class="fa-solid fa-phone"></i>
                            <a href="tel:<?php the_sub_field('livestock_auctioneers_number'); ?>"><?php the_sub_field('livestock_auctioneers_number'); ?></a>
                            </li>
                            <?php endif; ?>
                            <?php if( get_sub_field('livestock_auctioneers_second_number') ): ?>
                            <li>
                            <i class="fa-solid fa-phone"></i>
                            <a href="tel:<?php the_sub_field('livestock_auctioneers_second_number'); ?>"><?php the_sub_field('livestock_auctioneers_second_number'); ?></a>
                            </li>
							<?php endif; ?>

                            <?php if( get_sub_field('livestock_auctioneers_email') ): ?>
                            <li>
                            <i class="fa-regular fa-envelope"></i>
                            <a href="mailto:<?php the_sub_field('livestock_auctioneers_email'); ?>"><?php the_sub_field('livestock_auctioneers_email'); ?></a>
                            </li>
                            <?php endif; ?>
                        </ul>
                        </div>
                        <div class="team-content">
                            <h4><?php the_sub_field('livestock_auctioneers_name'); ?></h4>
                            <p><?php the_sub_field('livestock_auctioneers_post_title'); ?></p>
                        </div>
                        <?php if( get_sub_field('livestock_auctioneers_blurb') ): ?>
                        <div class="pop-wr">
                            <span class="closed">X</span>
                            <?php the_sub_field('livestock_auctioneers_blurb'); ?>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>      
                <?php endwhile; ?><?php endif;?>
            </div>
        </div>
        <button class="load-more btn-cs-dark toogle-expert">Load More</button>
        <button class="load-less btn-cs-dark toogle-expert" style="display:none;">Load Less</button>
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
                            <?php if( get_sub_field('livestock_auctioneers_number') ): ?>
                            <li>
                            <i class="fa-solid fa-phone"></i>
                            <a href="tel:<?php the_sub_field('livestock_auctioneers_number'); ?>"><?php the_sub_field('livestock_auctioneers_number'); ?></a>
                            </li>
                            <?php endif; ?>
                            <?php if( get_sub_field('livestock_auctioneers_second_number') ): ?>
                            <li>
                            <i class="fa-solid fa-phone"></i>
                            <a href="tel:<?php the_sub_field('livestock_auctioneers_second_number'); ?>"><?php the_sub_field('livestock_auctioneers_second_number'); ?></a>
                            </li>
							<?php endif; ?>

                            <?php if( get_sub_field('livestock_auctioneers_email') ): ?>
                            <li>
                            <i class="fa-regular fa-envelope"></i>
                            <a href="mailto:<?php the_sub_field('livestock_auctioneers_email'); ?>"><?php the_sub_field('livestock_auctioneers_email'); ?></a>
                            </li>
                            <?php endif; ?>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h4><?php the_sub_field('livestock_auctioneers_name'); ?></h4>
                            <p><?php the_sub_field('livestock_auctioneers_post_title'); ?></p>
                        </div>
                        <?php if( get_sub_field('livestock_auctioneers_blurb') ): ?>
                        <div class="pop-wr">
                            <span class="closed">X</span>
                            <?php the_sub_field('livestock_auctioneers_blurb'); ?>
                        </div>
                    <?php endif; ?>
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