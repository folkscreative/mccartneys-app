<?php

/**
 * Template Name: About us
 */

get_header(); ?>

<main class="about page-wrap"> 
     <!-- Main Banner -->
     <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
        <?php if( get_row_layout() == 'livestock_banner' ): ?>
            <?php
            $sale_banner = get_sub_field( 'livestock_background_image' );
if ( !empty( $sale_banner ) ) { ?>
    <section class="main-banner" style="background-image:url('<?php echo $sale_banner['url']; ?>');">
<?php }?>
            <div class="container">
            <div class="breadcrumb"><?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?></div>
                <div class="content">
                    <h1><?php the_sub_field('livestock_banner_title'); ?></h1>
                    <p><?php the_sub_field('livestock_banner_content'); ?></p>
                </div>
            </div>
        </section>
       
       
    <!-- Main Banner ends -->
    <section class="main-banner-sticky about">
                <div class="banner-menu"> 
                    <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'About-menu',
                            )
                        );
                        ?>
                </div>
        </section>
    <!-- Main Banner ends -->
    <?php endif; ?>
    <!-- Department Services -->
    <?php if( get_row_layout() == 'livestock_services' ): ?>
    <section class="livestocks-departments">
        <div class="container">
            <div class="content">
                <h2><?php the_sub_field('livestock_service_title'); ?></h2>
                <p><?php the_sub_field('livestock_service_title_copy'); ?></p>
            </div>
            
            <div class="slider-wrapper livestocks">
        
            <?php if( have_rows('services_details') ):
                             while ( have_rows('services_details') ) : the_row();

                             $sv_image = get_sub_field('service_image');
                            ?>

            <div class="slide-wrap">
            <?php
                          
                if( !empty($sv_image) ):?>
                <img src="<?php echo $sv_image['url']; ?>" alt="<?php echo $sv_image['alt']; ?>">
                <?php endif; ?>
                <div class="inner-content">
                    <h4><?php the_sub_field('service_image_copy'); ?></h4>
                    <span class="divider"></span>
                    <div class="contex">
                    <p><?php the_sub_field('service_content'); ?></p>
                    <a class="btn-rural" href="<?php the_sub_field('service_cta_link'); ?>"><?php the_sub_field('service_cta_label'); ?></a>
                    </div>
                </div>
                </div>
                <?php endwhile; ?><?php endif;?>
            </div>             
        </div>
     </section>
     <?php endif; ?>
    <!-- Department Services -->
    
    <?php if( get_row_layout() == 'equine_sale_department' ): ?>
    <section class="our-marketer" id="equine-about">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="col-left">
                        <h2><?php the_sub_field('equine_sale_title'); ?></h2>
                        <?php the_sub_field('equine_sale_content'); ?>
                            <?php $equine_sale_image = get_sub_field('equine_sale_image');
                             if( !empty($equine_sale_image) ):?>
                            <img src="<?php echo $equine_sale_image['url']; ?>" alt="<?php echo $equine_sale_image['alt']; ?>" class="w-100 d-block d-md-none">
                            <?php endif; ?>
                        <div class="marketer-buttons">
                        <?php 
                        $eq_primary_button = get_sub_field('equine_primary_button');
                        if( $eq_primary_button ): 
                            $eq_primary_button_url = $eq_primary_button['url'];
                            $eq_primary_button_title = $eq_primary_button['title'];
                            $eq_primary_button_target = $eq_primary_button['target'] ? $eq_primary_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $eq_primary_button_url ); ?>" target="<?php echo esc_attr( $eq_primary_button_target ); ?>"><?php echo esc_html( $eq_primary_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                     <?php 
                        $eq_secondary_button = get_sub_field('equine_secondary_button');
                        if( $eq_secondary_button ): 
                            $eq_secondary_button_url = $eq_secondary_button['url'];
                            $eq_secondary_button_title = $eq_secondary_button['title'];
                            $eq_secondary_button_target = $eq_secondary_button['target'] ? $eq_secondary_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-white" href="<?php echo esc_url( $eq_secondary_button_url ); ?>" target="<?php echo esc_attr( $eq_secondary_button_target ); ?>"><?php echo esc_html( $eq_secondary_button_title ); ?></a>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-none d-md-block">
                    <div class="col-right">
                        <?php $equine_sale_image = get_sub_field('equine_sale_image');
                    if( !empty($equine_sale_image) ):?>
                    <img src="<?php echo $equine_sale_image['url']; ?>" alt="<?php echo $equine_sale_image['alt']; ?>" class="w-100 d-none d-md-block" >
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
   
    <?php if( get_row_layout() == 'equine_app_content' ): ?>
    <section class="our-marketer equine app about" id="why-us">
        <div class="container">
            <div class="row g-5">
                <div class="col-12 col-md-6 d-md-block d-none">
                    <div class="col-right">
                        <?php $equine_sale_image = get_sub_field('equine_app_image');
                        if( !empty($equine_sale_image) ):?>
                        <img src="<?php echo $equine_sale_image['url']; ?>" alt="<?php echo $equine_sale_image['alt']; ?>" class="w-100 d-none d-md-block" >
                        <?php endif; ?>
                        </div>
                    
                </div>
                <div class="col-12 col-md-6">
                    <div class="col-left">
                    <h2><?php the_sub_field('equine_app_title'); ?></h2>
                        <?php the_sub_field('equine_app_content'); ?>
                            <?php $equine_sale_image = get_sub_field('equine_app_image');
                             if( !empty($equine_sale_image) ):?>
                            <img src="<?php echo $equine_sale_image['url']; ?>" alt="<?php echo $equine_sale_image['alt']; ?>" class="w-100 d-block d-md-none">
                            <?php endif; ?>
                        <div class="marketer-button">
                        <?php 
                        $eq_primary_button = get_sub_field('equine_app_primary_button');
                        if( $eq_primary_button ): 
                            $eq_primary_button_url = $eq_primary_button['url'];
                            $eq_primary_button_title = $eq_primary_button['title'];
                            $eq_primary_button_target = $eq_primary_button['target'] ? $eq_primary_button['target'] : '_self';
                            ?>
                            <a class="app-store" href="<?php echo esc_url( $eq_primary_button_url ); ?>" target="<?php echo esc_attr( $eq_primary_button_target ); ?>"><?php echo esc_html( $eq_primary_button_title ); ?></a>
                        <?php endif; ?>
                     <?php 
                        $eq_secondary_button = get_sub_field('equine_app_secondary_button');
                        if( $eq_secondary_button ): 
                            $eq_secondary_button_url = $eq_secondary_button['url'];
                            $eq_secondary_button_title = $eq_secondary_button['title'];
                            $eq_secondary_button_target = $eq_secondary_button['target'] ? $eq_secondary_button['target'] : '_self';
                            ?>
                            <a class="google-store" href="<?php echo esc_url( $eq_secondary_button_url ); ?>" target="<?php echo esc_attr( $eq_secondary_button_target ); ?>"><?php echo esc_html( $eq_secondary_button_title ); ?></a>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Departments -->
    <?php if( get_row_layout() == 'departments_sale_section' ): ?>
    <section class="departments others" id="area-expert">
        <div class="container">
            <div class="content">
                    <h2><?php the_sub_field('department_sale_title'); ?></h2>
                    <p><?php the_sub_field('department_sale_description'); ?></p>
            </div>
            <?php if( have_rows('department_sale_slider') ): ?>
            <div class="depart-slider depar">
            <?php while( have_rows('department_sale_slider') ): the_row(); ?>
            <div class="slide-wrap">
            <?php 
                        $department_sale_slider_link = get_sub_field('department_sale_slider_button');
                        if( $department_sale_slider_link ): 
                            $department_sale_slider_link_url = $department_sale_slider_link['url'];
                            $department_sale_slider_link_title = $department_sale_slider_link['title'];
                            $department_sale_slider_link_target = $department_sale_slider_link['target'] ? $department_sale_slider_link['target'] : '_self';
                            ?>
                            <a class="btn-transparent" href="<?php echo esc_url( $department_sale_slider_link_url ); ?>" target="<?php echo esc_attr( $department_sale_slider_link_target ); ?>"><?php echo esc_html( $department_sale_slider_link_title ); ?></a>
                        <?php endif; ?>
            <?php
                $department_slider_sale_image = get_sub_field('department_sale_image');
                if( !empty($department_slider_sale_image) ):?>
                <img src="<?php echo $department_slider_sale_image['url']; ?>" alt="<?php echo $department_slider_sale_image['alt']; ?>">
                <?php endif; ?>
                <div class="inner-content">
                    <h3><?php the_sub_field('slider_sale_title'); ?></h3>
                    <p><?php the_sub_field('slider_sale_description'); ?></p>
                    <?php 
                        $department_sale_slider_link = get_sub_field('department_sale_slider_button');
                        if( $department_sale_slider_link ): 
                            $department_sale_slider_link_url = $department_sale_slider_link['url'];
                            $department_sale_slider_link_title = $department_sale_slider_link['title'];
                            $department_sale_slider_link_target = $department_sale_slider_link['target'] ? $department_sale_slider_link['target'] : '_self';
                            ?>
                            <a class="btn-cs-light" href="<?php echo esc_url( $department_sale_slider_link_url ); ?>" target="<?php echo esc_attr( $department_sale_slider_link_target ); ?>"><?php echo esc_html( $department_sale_slider_link_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                </div>
                </div>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>                     
        </div>
     </section>
     <!-- Departments ends -->
     <?php endif; ?>


    <!-- our awards -->
    <?php if( get_row_layout() == 'mccartneys_awards' ): ?>
        <section class="our-awards" id="awards">
            <div class="container">
                <div class="content">
                     <h2><?php the_sub_field('mc_awards_title');?></h2>
                     <p><?php the_sub_field('mc_awards_description');?></p>
                </div>
                <div class="award-wrapper slider">
                <?php if( have_rows('mc_awards_boxes') ):
                     while ( have_rows('mc_awards_boxes') ) : the_row();?>
                    
                        <div class="box">
                        <?php $our_award_right = get_sub_field('award_box_main_image');
                             if( !empty($our_award_right) ):?>
                            <img src="<?php echo $our_award_right['url']; ?>" alt="<?php echo $our_award_right['alt']; ?>" class="w-100">
                            <?php endif; ?>
                            <h4><?php the_sub_field('award_box_title'); ?></h4>
                            <?php the_sub_field('award_box_description');?>
                            
                        </div>
                <?php endwhile; ?><?php endif;?>
                </div>
                <?php 
                        $awards_button = get_sub_field('mc_awards_button');
                        if( $awards_button ): 
                            $awards_button_url = $awards_button['url'];
                            $awards_button_title = $awards_button['title'];
                            $awards_button_target = $awards_button['target'] ? $awards_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $awards_button_url ); ?>" target="<?php echo esc_attr( $awards_button_target ); ?>"><?php echo esc_html( $awards_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>
     <!-- our awards ends -->

    <!-- Support cancer -->
    <?php if( get_row_layout() == 'support_cancer' ): ?>
     <section class="support-cancer" id="support-charities">
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

    <!-- Support charities -->
    <?php if( get_row_layout() == 'support_charities' ): ?>
     <section class="charities-logos about d-none d-sm-block">
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
     
      <!-- Support charities -->
    <?php if( get_row_layout() == 'support_charities' ): ?>
     <section class="charities-logos about d-block d-sm-none">
        <div class="container">
            <div class="charit-wrap">
            <?php if( have_rows('mc_charities_logos') ):
                while ( have_rows('mc_charities_logos') ) : the_row();?>
                
                    <div class="logo-chr">
                    <?php $charity_logo = get_sub_field('charities_logo');
                    if( !empty($charity_logo) ):?>
                    <img src="<?php echo $charity_logo['url']; ?>" alt="<?php echo $charity_logo['alt']; ?>">
                    <?php endif; ?>
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

    <!-- Events section start here -->
    <?php if( get_row_layout() == 'livestock_events' ): ?>
    <section class="events about" id="careers">
        <div class="container">

        <?php $event_img = get_sub_field('livestock_event_background_image');
                    if( !empty($event_img) ):?>
            <div class="wrapper" style="background-image: url('<?php echo $event_img['url']; ?>')">
            <?php endif; ?>
                    <div class="events-slider">
                    <?php if( have_rows('event_detail') ):
                     while ( have_rows('event_detail') ) : the_row();?>
                    <div class="event-wrapper">
                            <h2><?php the_sub_field('event_title'); ?></h2>
                            <?php the_sub_field('event_description'); ?>
                            <h3> <?php echo esc_html ( get_sub_field( 'livestock_event_date' ) ); ?></h3>
                            <?php 
                        $events_cf_button = get_sub_field('event_detail_link');
                        if( $events_cf_button ): 
                            $events_cf_button_url = $events_cf_button['url'];
                            $events_cf_button_title = $events_cf_button['title'];
                            $events_cf_button_target = $events_cf_button['target'] ? $events_cf_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-white" href="<?php echo esc_url( $events_cf_button_url ); ?>" target="<?php echo esc_attr( $events_cf_button_target ); ?>"><?php echo esc_html( $events_cf_button_title ); ?></a>
                        <?php endif; ?>
                        </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
            </div>
        </div>
    </section>
    <!-- Events section ends here -->
    <?php endif; ?>

    <!-- Start Property section here -->
    <?php if( get_row_layout() == 'property_tabs_section' ): ?>
       <section class="property-wrapper about-us" id="locations-about">
        <div class="container">
            <h2 class="title"><?php the_sub_field('property_tab_title'); ?></h2>
            <p class="description"><?php the_sub_field('property_tab_description'); ?></p>
            <?php echo do_shortcode(get_sub_field('property_tab_shortcode_new'));?>
        </div>
     </section>
     <?php endif; ?>
    <!-- End Property section here -->

     <!-- Start Property section here -->
    <?php if( get_row_layout() == 'property_tabs_section' ): ?>
       <section class="property-wrapper mb about-us d-none" id="locations-about">
        <div class="container">
            <h2 class="title"><?php the_sub_field('property_tab_title'); ?></h2>
            <p class="description"><?php the_sub_field('property_tab_description'); ?></p>
            <?php echo do_shortcode('[property_mobile_tabs]'); ?>
        </div>
     </section>
     <?php endif; ?>
    <!-- End Property section here -->


    <!-- Cta banner -->
    <?php if( get_row_layout() == 'call_to_action' ): ?>
    <section class="cta-banner light">
          <div class="container">
            <div class="row g-0 align-items-center">
            
                <div class="col-12 col-md-5">
                    <div class="col-left">
                    <h2><?php the_sub_field('call_to_action_title'); ?></h2>
                    <p><?php the_sub_field('call_to_action_content'); ?></p>
                    <a class="btn-cs-white" href="<?php the_sub_field('call_to_action_link'); ?>"><?php the_sub_field('call_to_action_label'); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="col-right">
                    <?php
                     $cta_clip_img = get_sub_field('call_to_action_right_image');
                if( !empty($cta_clip_img) ):?>
                <img src="<?php echo $cta_clip_img['url']; ?>" alt="<?php echo $cta_clip_img['alt']; ?>"  class="w-100">
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
    <section class="livestock-auctioneers d-none d-md-block about" id="meet-director">
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
    <section class="livestock-auctioneers d-block d-md-none about" id="meet-director">
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
                    </div>
                </div>
                <?php endwhile; ?><?php endif;?>
            </div>
        </div>
    </section>
    <?php endif;?>
    <!-- Livestock Auctioneers mobile ends here -->

    <!-- Showcase numbers -->
    <?php if( get_row_layout() == 'showcase_number' ): ?>
    <section class="showcase-numbers">
        <div class="container">
            <div class="row g-0">
                <div class="col-12">
                    <div class="box-title">
                        <h2><?php the_sub_field('number_showcase_title'); ?></h2>
                    </div>
                    <p class="description d-none d-md-block"><?php the_field('number_showcase_description');?></p>
                </div>
            </div>
            <div class="numbers-wrap">
                <?php if( have_rows('number_showcase_repeat') ): ?>
                <div class="row g-4">
                    <?php while( have_rows('number_showcase_repeat') ): the_row(); ?>
                    <div class="col-12 col-md-6">
                        <div class="items-wrap">
                            <?php
                        $showcase_logo = get_sub_field('showcase_repeater_image');
                        if( !empty($showcase_logo) ):?>
                            <img src="<?php echo $showcase_logo['url']; ?>" alt="<?php echo $showcase_logo['alt']; ?>"
                                class="w-100">
                            <?php endif; ?>
                            <div class="col-right">
                                <h2><?php the_sub_field('showcase_repeater_title'); ?></h2>
                                <span><?php the_sub_field('showcase_repeater_tagline'); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif;?>
    <!-- Showcase numbers ends -->

    <!-- Testimonials -->
    <?php if( get_row_layout() == 'testimonials' ): ?>
    <section class="testimonials">
         <div class="container"> 
            <div class="testimonial-box">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/icon-apostrophe.png" alt="">
            </div>
             <h2 class="title"><?php the_sub_field('testimonials_title'); ?></h2>
            <div class="testimonial-slider wrapper">
            <?php if( have_rows('testimonials_detail') ):
                             while ( have_rows('testimonials_detail') ) : the_row();?>
            <div class="item">
                <?php 
                $st_image = get_sub_field('testimonials_star_image');
                if( !empty($st_image) ):?>
                        <img src="<?php echo $st_image['url']; ?>" alt="<?php echo $st_image['alt']; ?>">
                <?php endif; ?>

                <p><?php the_sub_field('testimonials_description'); ?></p>
                <div class="inner-box">
                <?php 
                 $pf_image = get_sub_field('testimonials_author_profile_picture');
                if( !empty($pf_image) ):?>
                        <img src="<?php echo $pf_image['url']; ?>" alt="<?php echo $pf_image['alt']; ?>">
                    <?php endif; ?>
                <div class="position">
                <h4><?php the_sub_field('testimonials_author_name'); ?></h4>
                <span><?php the_sub_field('testimonials_author_position'); ?></span>
                </div>
                </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?> 
                </div>
         </div>
       </section>
        <!-- Testimonials ends -->
        <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>
</main>

<?php get_footer();?>