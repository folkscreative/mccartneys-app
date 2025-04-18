<?php

/**
 * Template Name: Equine Inner Template
 */

get_header(); ?>

<main class="equine-sub-pages page-wrap"> 
     <!-- Inner Banner -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
        <?php if( get_row_layout() == 'livestock_banner' ): ?>
           <?php
            $image_private = get_sub_field( 'livestock_background_image' );
            if ( !empty( $image_private ) ) { ?>
            <section class="inner-banner-wrapper equine" style="background-image:url('<?php echo $image_private['url']; ?>');">
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
    
   <!-- Our Marketer section start here -->
   
   <?php if( get_row_layout() == 'equine_sale_department' ): ?>
    <section class="our-marketer equine">
        <div class="container">
            <div class="row g-5">
                <div class="col-12 col-md-6 d-none d-md-block">
                    <div class="col-right">
                    <?php $equine_sale_image = get_sub_field('equine_sale_image');
                    if( !empty($equine_sale_image) ):?>
                    <img src="<?php echo $equine_sale_image['url']; ?>" alt="<?php echo $equine_sale_image['alt']; ?>" class="w-100 d-none d-md-block" >
                    <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-md-6 align-content-center">
                    <div class="col-left">
                        <?php if (get_sub_field('equine_sale_title')): ?>
                            <h2><?php the_sub_field('equine_sale_title'); ?></h2>
                        <?php endif; ?>
                        <?php the_sub_field('equine_sale_content'); ?>
                            <?php $equine_sale_image = get_sub_field('equine_sale_image');
                             if( !empty($equine_sale_image) ):?>
                            <img src="<?php echo $equine_sale_image['url']; ?>" alt="<?php echo $equine_sale_image['alt']; ?>" class="w-100 d-block d-md-none">
                            <?php endif; ?>
                        <?php 
                    $eq_primary_button = get_sub_field('equine_primary_button');
                    $eq_secondary_button = get_sub_field('equine_secondary_button');

                    if ($eq_primary_button || $eq_secondary_button): ?>
                        <div class="marketer-buttons">
                            <?php 
                            if ($eq_primary_button): 
                                $eq_primary_button_url = $eq_primary_button['url'];
                                $eq_primary_button_title = $eq_primary_button['title'];
                                $eq_primary_button_target = $eq_primary_button['target'] ? $eq_primary_button['target'] : '_self';
                                ?>
                                <a class="btn-cs-dark" href="<?php echo esc_url($eq_primary_button_url); ?>" target="<?php echo esc_attr($eq_primary_button_target); ?>"><?php echo esc_html($eq_primary_button_title); ?></a>
                            <?php endif; ?>

                            <?php 
                            if ($eq_secondary_button): 
                                $eq_secondary_button_url = $eq_secondary_button['url'];
                                $eq_secondary_button_title = $eq_secondary_button['title'];
                                $eq_secondary_button_target = $eq_secondary_button['target'] ? $eq_secondary_button['target'] : '_self';
                                ?>
                                <a class="btn-cs-white" href="<?php echo esc_url($eq_secondary_button_url); ?>" target="<?php echo esc_attr($eq_secondary_button_target); ?>"><?php echo esc_html($eq_secondary_button_title); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
   
    <!-- Our Marketer section ends here -->

    


   <!-- Our Marketer section start here -->
   <?php if( get_row_layout() == 'equine_app_content' ): ?>
    <section class="our-marketer equine app">
        <div class="container">
            <div class="row g-5">
                <div class="col-12 col-md-6 align-content-center">
                    <div class="col-left">
                        <?php if (get_sub_field('equine_app_title')): ?>
                            <h2><?php the_sub_field('equine_app_title'); ?></h2>
                        <?php endif; ?>
                        <?php the_sub_field('equine_app_content'); ?>
                            <?php $equine_sale_image = get_sub_field('equine_app_image');
                             if( !empty($equine_sale_image) ):?>
                            <img src="<?php echo $equine_sale_image['url']; ?>" alt="<?php echo $equine_sale_image['alt']; ?>" class="w-100 d-block d-md-none">
                            <?php endif; ?>
                        <div class="marketer-buttons">
                        <?php 
                        $eq_secondary_button = get_sub_field('equine_app_secondary_button');
                        if( $eq_secondary_button ): 
                            $eq_secondary_button_url = $eq_secondary_button['url'];
                            $eq_secondary_button_title = $eq_secondary_button['title'];
                            $eq_secondary_button_target = $eq_secondary_button['target'] ? $eq_secondary_button['target'] : '_self';
                            ?>
                            <a class="google-store" href="<?php echo esc_url( $eq_secondary_button_url ); ?>" target="<?php echo esc_attr( $eq_secondary_button_target ); ?>"><?php echo esc_html( $eq_secondary_button_title ); ?></a>
                        <?php endif; ?>
                        <?php 
                        $eq_primary_button = get_sub_field('equine_app_primary_button');
                        if( $eq_primary_button ): 
                            $eq_primary_button_url = $eq_primary_button['url'];
                            $eq_primary_button_title = $eq_primary_button['title'];
                            $eq_primary_button_target = $eq_primary_button['target'] ? $eq_primary_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $eq_primary_button_url ); ?>" target="<?php echo esc_attr( $eq_primary_button_target ); ?>"><?php echo esc_html( $eq_primary_button_title ); ?></a>
                        <?php endif; ?>
                     
                        </div>
                        </div>
                </div>
                <div class="col-12 col-md-6 d-none d-md-block">
                    <div class="col-right">
                    <?php $equine_sale_image = get_sub_field('equine_app_image');
                        if( !empty($equine_sale_image) ):?>
                        <img src="<?php echo $equine_sale_image['url']; ?>" alt="<?php echo $equine_sale_image['alt']; ?>" class="w-100 d-none d-md-block" >
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    
    <!-- Our Marketer section ends here -->

    <!-- society sale -->
    <?php if( get_row_layout() == 'society_sale_section' ): ?>
    <section class="society-sale-wrapper">
        <div class="container">
            <div class="row gx-0 gy-0">
            <?php if( have_rows('society_sale_box') ):
                     while ( have_rows('society_sale_box') ) : the_row();?> 
                <div class="wrapper">
                    <div class="justify-content-center align-items-center row">
                        <div class="col-12 col-md-4"> 
                        <?php
                        $soc_image = get_sub_field('sale_box_image');?>
                        <?php if( !empty($soc_image) ):?>
                            <img src="<?php echo $soc_image['url']; ?>" alt="<?php echo $soc_image['alt']; ?>" class="w-100">
                        <?php endif; ?> 
                        </div>
                        <div class="col-12 col-md-7">
                           <div class="col-right">
                           <h2><?php the_sub_field('sale_box_title'); ?></h2>
                            <p><?php the_sub_field('sale_box_description'); ?></p>
                            <?php 
                        $society_sale_button = get_sub_field('sale_box_button');
                        if( $society_sale_button ): 
                            $society_sale_button_url = $society_sale_button['url'];
                            $society_sale_button_title = $society_sale_button['title'];
                            $society_sale_button_target = $society_sale_button['target'] ? $society_sale_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $society_sale_button_url ); ?>" target="<?php echo esc_attr( $society_sale_button_target ); ?>"><?php echo esc_html( $society_sale_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                           </div>
                        </div>
                    </div>
                </div>      
                <?php endwhile; ?><?php endif;?>
            </div>
        </div>
    </section>
<!-- society sale ends -->
<?php endif; ?>
     <!-- stud catalog -->
     <?php if( get_row_layout() == 'stud_sale_catalog' ): ?>
      <section class="stud-catalog">
         <div class="container">
            <div class="content">
                <h2><?php the_sub_field('stud_sale_catalog_title');?></h2>
                <p><?php the_sub_field('stud_sale_catalog_description'); ?></p>
            </div>
            <?php if( have_rows('stud_sale_images') ): ?>
            <div class="stud stud-slider">
            <?php while( have_rows('stud_sale_images') ): the_row(); ?>
            <div class="slide-wrap">
            <?php
                $department_slider_bg_image = get_sub_field('stud_catalog_image');
                if( !empty($department_slider_bg_image) ):?>
                <img src="<?php echo $department_slider_bg_image['url']; ?>" alt="<?php echo $department_slider_bg_image['alt']; ?>">
                <?php endif; ?>
                
                </div>
                <?php endwhile; ?>
                <?php endif;?>
                </div>
         </div>
      </section>
      <?php endif; ?>
    <!-- stud catalog ends -->

     <!-- Events section start here -->
     <?php if( get_row_layout() == 'livestock_events' ): ?>
    <section class="events equine">
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
                            <a class="btn-rural" href="<?php echo esc_url( $events_cf_button_url ); ?>" target="<?php echo esc_attr( $events_cf_button_target ); ?>"><?php echo esc_html( $events_cf_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
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

    <!-- Livestock faqs -->
    <?php if( get_row_layout() == 'frequently_asked_questions' ): ?>
    <section class="livestock-faqs faqs-wrap">
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

    <!-- Livestock faqs ends -->

    <!-- Need more information -->
    <?php if( get_row_layout() == 'need_info_box' ): ?>
    <section class="need-more-info equine">
        <div class="container">
            <div class="content">
                <h2><?php the_sub_field('info_box_title'); ?></h2>
                <p><?php the_sub_field('info_box_description'); ?></p>
                <div class="btn">
                <?php 
                        $buy_box_button = get_sub_field('info_box_primary_button');
                        if( $buy_box_button ): 
                            $buy_box_button_url = $buy_box_button['url'];
                            $buy_box_button_title = $buy_box_button['title'];
                            $buy_box_button_target = $buy_box_button['target'] ? $buy_box_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $buy_box_button_url ); ?>" target="<?php echo esc_attr( $buy_box_button_target ); ?>"><?php echo esc_html( $buy_box_button_title ); ?></a>
                        <?php endif; ?>
                     <?php 
                        $sell_box_button = get_sub_field('info_box_secondary_button');
                        if( $sell_box_button ): 
                            $sell_box_button_url = $sell_box_button['url'];
                            $sell_box_button_title = $sell_box_button['title'];
                            $sell_box_button_target = $sell_box_button['target'] ? $sell_box_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-white" href="<?php echo esc_url( $sell_box_button_url ); ?>" target="<?php echo esc_attr( $sell_box_button_target ); ?>"><?php echo esc_html( $sell_box_button_title ); ?></a>
                        <?php endif; ?>
                </div>
            </div>
        </div>
     </section>
     <?php endif; ?>
    <!-- Need more information -->
    

    <!-- Livestock Auctioneers start here -->
    
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

                        </ul>
                        </div>
                        <div class="team-content">
                            <h4><?php the_sub_field('livestock_auctioneers_name'); ?></h4>
                            <p><?php the_sub_field('livestock_auctioneers_post_title'); ?></p>
                        </div>
                        <?php if( get_sub_field('livestock_auctioneers_blurb') ): ?>
                            <div class="pop-wr">
                            <div class="inner-wrap">
                            <span class="closed">X</span>
                                <div class="col-left">
                                <?php
                                $ac_image = get_sub_field('livestock_auctioneers_image');
                                ?>
                                <?php if( !empty($ac_image) ):?>
                                    <img src="<?php echo $ac_image['url']; ?>" alt="<?php echo $ac_image['alt']; ?>" class="w-100">
                                <?php endif; ?>
                                <div class="left-content">
                                <h4><?php the_sub_field('livestock_auctioneers_name'); ?></h4>
                                <ul>
                                <li>
                                    <?php the_sub_field('livestock_auctioneers_office'); ?>
                                </li>
                                <li>
                                <?php the_sub_field('livestock_auctioneers_post_title'); ?>
                                </li>
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
                                </div>
                                <div class="col-right">
                                <?php the_sub_field('livestock_auctioneers_blurb'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>      
                <?php endwhile; ?><?php endif;?>
            </div>
        </div>
    </section>
    <?php endif;?>
    
    <!-- Livestock Auctioneers ends here -->

    <!-- Livestock Auctioneers for mobile start here -->
    
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

                        </ul>
                        </div>
                        <div class="team-content">
                        <h4><?php the_sub_field('livestock_auctioneers_name'); ?></h4>
                        <p><?php the_sub_field('livestock_auctioneers_post_title'); ?></p>
                        </div>
                        <?php if( get_sub_field('livestock_auctioneers_blurb') ): ?>
                            <div class="pop-wr">
                            <div class="inner-wrap">
                            <span class="closed">X</span>
                                <div class="col-left">
                                <?php
                                $ac_image = get_sub_field('livestock_auctioneers_image');
                                ?>
                                <?php if( !empty($ac_image) ):?>
                                    <img src="<?php echo $ac_image['url']; ?>" alt="<?php echo $ac_image['alt']; ?>" class="w-100">
                                <?php endif; ?>
                                <div class="left-content">
                                <h4><?php the_sub_field('livestock_auctioneers_name'); ?></h4>
                                <ul>
                                <li>
                                    <?php the_sub_field('livestock_auctioneers_office'); ?>
                                </li>
                                <li>
                                <?php the_sub_field('livestock_auctioneers_post_title'); ?>
                                </li>
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
                                </div>
                                <div class="col-right">
                                <?php the_sub_field('livestock_auctioneers_blurb'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
                <?php endwhile; ?><?php endif;?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    
    <!-- Livestock Auctioneers for mobile ends here -->


    <!-- Livestock faqs -->
    <?php if( get_row_layout() == 'kington_livestock_market' ): ?>
    <section class="livestock-faqs">
        <div class="container">
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="col-left">
                         <h2><?php the_sub_field('kington_livestock_market_title'); ?></h2>
                         <p><?php the_sub_field('kington_livestock_market_description'); ?></p>
                         <?php 
                        $market_contact_button = get_sub_field('kington_livestock_market_button');
                        if( $market_contact_button ): 
                            $market_contact_button_url = $market_contact_button['url'];
                            $market_contact_button_title = $market_contact_button['title'];
                            $market_contact_button_target = $market_contact_button['target'] ? $market_contact_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $market_contact_button_url ); ?>" target="<?php echo esc_attr( $market_contact_button_target ); ?>"><?php echo esc_html( $market_contact_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                     <div class="faqs-wrapper">
                     <?php if( have_rows('kington_livestock_market_detail') ):
                     while ( have_rows('kington_livestock_market_detail') ) : the_row();?>
                        <div class="faqs-item">
                             <div class="top-bar">
                                <h4><?php the_sub_field('kington_livestock_market_question'); ?></h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                             <?php the_sub_field('kington_livestock_market_answer'); ?>
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
    <!-- Livestock faqs ends -->
    <?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

    <!-- Departments -->
    <section class="departments other">
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
                        $department_cartneys_slider_link = get_sub_field('department_slider_button', 'option');
                        if( $department_cartneys_slider_link ): 
                            $department_cartneys_slider_link_url = $department_cartneys_slider_link['url'];
                            $department_cartneys_slider_link_title = $department_cartneys_slider_link['title'];
                            $department_cartneys_slider_link_target = $department_cartneys_slider_link['target'] ? $department_cartneys_slider_link['target'] : '_self';
                            ?>
                            <a class="btn-transparent" href="<?php echo esc_url( $department_cartneys_slider_link_url ); ?>" target="<?php echo esc_attr( $department_cartneys_slider_link_target ); ?>"><?php echo esc_html( $department_cartneys_slider_link_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
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