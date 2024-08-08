<?php

/**
 * Template Name: Property Template
 */

get_header(); ?>

<main class="livestock page-wrap"> 
     <!-- Main Banner -->
    <?php if (have_rows('blocks')): ?>
    <?php while (have_rows('blocks')): the_row(); ?>
        <?php if (get_row_layout() == 'livestock_banner'): ?>
            <?php
            $livestock_bg_main = get_sub_field('livestock_background_image');
            ?>
            <?php if (!empty($livestock_bg_main)): ?>
                <section class="main-banner pro" style="background-image: url(<?php echo esc_url($livestock_bg_main['url']); ?>);">
            <?php else: ?>
                <section class="main-banner">
            <?php endif; ?>
                    <div class="container">
                        <div class="breadcrumb">
                            <?php echo get_breadcrumb(); ?>
                        </div>
                        <div class="content">
                            <h1><?php the_sub_field('livestock_banner_title'); ?></h1>
                            <?php the_sub_field('livestock_banner_content'); ?>
                        </div>
                    </div>
                </section>
            <!-- Main Banner ends -->
            <section class="main-banner-sticky">
                <div class="banner-menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'menu' => 'Property-service-menu',
                        )
                    );
                    ?>
                </div>
            </section>
            <!-- Main Banner Sticky ends -->
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>


    <!-- Department Services -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
    <?php if( get_row_layout() == 'livestock_services' ): ?>
    <section class="livestocks-departments property-page">
        <div class="container">
            <div class="content">
                <h2><?php the_sub_field('livestock_service_title'); ?></h2>
                <p><?php the_sub_field('livestock_service_title_copy'); ?></p>
            </div>
            <div class="slider-wrapper livestocks">
            <?php if( have_rows('services_details') ):
                while ( have_rows('services_details') ) : the_row();?>
            <div class="slide-wrap">
            <?php    
                $sv_image = get_sub_field('service_image');
                if( !empty($sv_image) ):?>
                <img src="<?php echo $sv_image['url']; ?>" alt="<?php echo $sv_image['alt']; ?>">
                <?php endif; ?>
                <div class="inner-content">
                    <h4><?php the_sub_field('service_image_copy'); ?></h4>
                    <div class="contex">
                    <?php if( get_sub_field('service_cta_label') ): ?>
                    <a href="<?php the_sub_field('service_cta_link');?>" class="btn-cs-light"><?php the_sub_field('service_cta_label');?></a>
                    <?php endif; ?>
                    <?php if( get_sub_field('service_cta_label_secondary') ): ?>
                    <a href="<?php the_sub_field('service_cta_link_secondary');?>" class="btn-cs-dark"><?php the_sub_field('service_cta_label_secondary');?></a>
                    <?php endif; ?>
                    </div>
                </div>
                </div>
                <?php endwhile; ?>
            <?php endif;?>
            </div>             
        </div>
     </section>
     <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
    <!-- Department Services -->

   <!-- recent property section start here -->
   <section class="recent-property-wrapper property-pg">
        <div class="container">
        <?php echo do_shortcode('[recent_property_tabs]'); ?>
        <a href="#" class="btn-cs-dark">View all properties</a>
        </div>
     </section>
     <!-- recent property section ends here -->

    <!-- Cta banner -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
    <?php if( get_row_layout() == 'call_to_action' ): ?>
    <section class="cta-banner light">
          <div class="container">
            <div class="row g-0 align-items-center">
            
                <div class="col-12 col-md-5">
                    <div class="col-left">
                    <h2><?php the_sub_field('call_to_action_title'); ?></h2>
                    <p><?php the_sub_field('call_to_action_content'); ?></p>
                    <a class="btn-rural" href="<?php the_sub_field('call_to_action_link'); ?>"><?php the_sub_field('call_to_action_label'); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
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
    <?php endwhile; ?>
<?php endif; ?>
    <!-- Cta banner ends -->
    
        <!-- Fine country -->
        <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
    <?php if( get_row_layout() == 'fine_country_section' ): ?>
        <section class="fine-country">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-12 col-md-6">
                    <?php
                        $fine_sec_title_img = get_sub_field('fine_country_title');
                        if( !empty($fine_sec_title_img) ):?>
                        <img src="<?php echo $fine_sec_title_img['url']; ?>" alt="<?php echo $fine_sec_title_img['alt']; ?>" class="title-img d-block d-md-none">
                        <?php endif; ?>
                    <?php
                    $fine_sec_col_left_img = get_sub_field('fine_country_section_image');
                    if( !empty($fine_sec_col_left_img) ):?>
                    <img src="<?php echo $fine_sec_col_left_img['url']; ?>" alt="<?php echo $fine_sec_col_left_img['alt']; ?>" class="w-100">
                    <?php endif; ?>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-end">
                        <div class="col-right">
                        <?php
                        $fine_sec_title_img = get_sub_field('fine_country_title');
                        if( !empty($fine_sec_title_img) ):?>
                        <img src="<?php echo $fine_sec_title_img['url']; ?>" alt="<?php echo $fine_sec_title_img['alt']; ?>" class="w-100 d-none d-md-block">
                        <?php endif; ?>
                        <p><?php the_sub_field('fine_country_section_description');?></p>
                        <?php 
                        $fine_sec_button = get_sub_field('fine_country_section_button');
                        if( $fine_sec_button ): 
                            $fine_sec_button_url = $fine_sec_button['url'];
                            $fine_sec_button_title = $fine_sec_button['title'];
                            $fine_sec_button_target = $fine_sec_button['target'] ? $fine_sec_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $fine_sec_button_url ); ?>" target="<?php echo esc_attr( $fine_sec_button_target ); ?>"><?php echo esc_html( $fine_sec_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
        <!-- Fine country ends -->
        
        <!-- Our Marketer section start here -->
        <?php if( have_rows('blocks') ): ?>
            <?php while( have_rows('blocks') ): the_row(); ?>
    <?php if( get_row_layout() == 'our_marketers' ): ?>
    <section class="our-marketer local-area-guide">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="col-left">
                        <h2><?php the_sub_field('our_marketer_title'); ?></h2>
                        <?php the_sub_field('our_marketer_content'); ?>
                            <?php $our_marketer_right = get_sub_field('our_marketer_image');
                             if( !empty($our_marketer_right) ):?>
                            <img src="<?php echo $our_marketer_right['url']; ?>" alt="<?php echo $our_marketer_right['alt']; ?>" class="w-100 d-block d-md-none" >
                            <?php endif; ?>
                        <div class="marketer-buttons">
                        <?php 
                        $local_guide_button = get_sub_field('view_more_button_link');
                        if( $local_guide_button ): 
                            $local_guide_button_url = $local_guide_button['url'];
                            $local_guide_button_title = $local_guide_button['title'];
                            $local_guide_button_target = $local_guide_button['target'] ? $local_guide_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $local_guide_button_url ); ?>" target="<?php echo esc_attr( $local_guide_button_target ); ?>"><?php echo esc_html( $local_guide_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="col-right">
                        <?php $our_marketer_right = get_sub_field('our_marketer_image');
                    if( !empty($our_marketer_right) ):?>
                    <img src="<?php echo $our_marketer_right['url']; ?>" alt="<?php echo $our_marketer_right['alt']; ?>" class="w-100 d-none d-md-block" >
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
    <!-- Our Marketer section ends here -->

    <!-- Livestock Auctioneers start here -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
    <?php if( get_row_layout() == 'livestock_auctioneers' ): ?>
    <section class="livestock-auctioneers d-none d-md-block" id="livestck-actioner">
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
                            <li>
                            <i class="fa-solid fa-phone"></i>
                            <a href="tel:<?php the_sub_field('livestock_auctioneers_number'); ?>"><?php the_sub_field('livestock_auctioneers_number'); ?></a>
                            </li>
                            <li>
                            <i class="fa-regular fa-envelope"></i>
                            <a href="mailto:<?php the_sub_field('livestock_auctioneers_email'); ?>"><?php the_sub_field('livestock_auctioneers_email'); ?></a>
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
    <?php endwhile; ?>
<?php endif; ?>
    <!-- Livestock Auctioneers ends here -->

    <!-- Livestock Auctioneers for mobile start here -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
    <?php if( get_row_layout() == 'livestock_auctioneers' ): ?>
    <section class="livestock-auctioneers d-block d-md-none">
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
                            <li>
                            <i class="fa-solid fa-phone"></i>
                            <a href="tel:<?php the_sub_field('livestock_auctioneers_number'); ?>"><?php the_sub_field('livestock_auctioneers_number'); ?></a>
                            </li>
                            <li>
                            <i class="fa-regular fa-envelope"></i>
                            <a href="mailto:<?php the_sub_field('livestock_auctioneers_email'); ?>"><?php the_sub_field('livestock_auctioneers_email'); ?></a>
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
    <?php endwhile; ?>
<?php endif; ?>
    <!-- Livestock Auctioneers for mobile ends here -->

    <!-- Livestock faqs -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
    <?php if( get_row_layout() == 'frequently_asked_questions' ): ?>
    <section class="livestock-faqs faqs-wrap property-pg" id="FAQs">
        <div class="container">
            <div class="row g-0">
                <div class="col-12">
                    <div class="col-left">
                         <h2><?php the_sub_field('frequently_asked_question_title'); ?></h2>
                         <p><?php the_sub_field('frequently_asked_question_description'); ?></p>
                    </div>
                </div>
                <div class="col-12">
                     <div class="faqs-wrapper">
                     <?php if( have_rows('frequently_asked_question_detail') ):
                             while ( have_rows('frequently_asked_question_detail') ) : the_row();?>
                        <div class="faqs-item">
                             <div class="top-bar">
                                <h4><?php the_sub_field('frequently_asked_questions_question'); ?></h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                             <?php the_sub_field('frequently_asked_questions_answers'); ?>
                                 
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
    <?php endwhile; ?>
<?php endif; ?>

    <!-- Livestock faqs ends -->


    <!-- Need more information -->
     <section class="need-more-info">
        <div class="container">
            <div class="content">
                <h2><?php the_field('need_info_title'); ?></h2>
                <p><?php the_field('need_info_description'); ?></p>
                <div class="btn">
                <?php 
                        $buy_auction_button = get_field('buy_action_button');
                        if( $buy_auction_button ): 
                            $buy_auction_button_url = $buy_auction_button['url'];
                            $buy_auction_button_title = $buy_auction_button['title'];
                            $buy_auction_button_target = $buy_auction_button['target'] ? $buy_auction_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $buy_auction_button_url ); ?>" target="<?php echo esc_attr( $buy_auction_button_target ); ?>"><?php echo esc_html( $buy_auction_button_title ); ?></a>
                        <?php endif; ?>
                     <?php 
                        $sell_auction_button = get_field('sell_auction_button');
                        if( $sell_auction_button ): 
                            $sell_auction_button_url = $sell_auction_button['url'];
                            $sell_auction_button_title = $sell_auction_button['title'];
                            $sell_auction_button_target = $sell_auction_button['target'] ? $sell_auction_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-white" href="<?php echo esc_url( $sell_auction_button_url ); ?>" target="<?php echo esc_attr( $sell_auction_button_target ); ?>"><?php echo esc_html( $sell_auction_button_title ); ?></a>
                        <?php endif; ?>
                </div>
            </div>
        </div>
     </section>
    <!-- Need more information -->

    <!-- Testimonials -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
    <?php if( get_row_layout() == 'testimonials' ): ?>
    <section class="testimonials property-pg">
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