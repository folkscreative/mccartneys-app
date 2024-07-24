<?php

/**
 * Template Name: Fine Art & Main
 */

get_header(); ?>

<main class="fine-art page-wrap"> 
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
                            'menu' => 'Equine-Service-Menu',
                        )
                    );
                    ?>
                </div>
            </section>
            <!-- Main Banner Sticky ends -->
        <?php endif; ?>
    


    <!-- Department Services -->
    <?php if( get_row_layout() == 'livestock_services' ): ?>
        <section class="departments equine">
        <div class="container">
            <div class="content">
                    <h2><?php the_sub_field('livestock_service_title'); ?></h2>
                    <p><?php the_sub_field('livestock_service_title_copy'); ?></p>
            </div>
            <?php if( have_rows('services_details') ): ?>
            <div class="depart-slider depar">
            <?php while( have_rows('services_details') ): the_row(); ?>
            <div class="slide-wrap">
            <?php
                $sv_image = get_sub_field('service_image');
                if( !empty($sv_image) ):?>
                <img src="<?php echo $sv_image['url']; ?>" alt="<?php echo $sv_image['alt']; ?>">
                <?php endif; ?>
                <div class="inner-content">
                    <h3><?php the_sub_field('service_image_copy'); ?></h3>
                    <p><?php the_sub_field('service_content'); ?></p>
                    <?php if( get_sub_field('service_cta_label') ): ?>
                    <a href="<?php the_sub_field('service_cta_link');?>" class="btn-cs-light"><?php the_sub_field('service_cta_label');?><span><i class="fa-solid fa-angle-right"></i></span></a>
                    <?php endif; ?>
                </div>
                </div>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>                     
        </div>
     </section>
     <?php endif; ?>
    
    <!-- Department Services -->

    <!-- Cta banner -->
    
    <?php if( get_row_layout() == 'call_to_action' ): ?>
    <section class="cta-banner light equine">
          <div class="container">
            <div class="row g-0 align-items-center">
            
                <div class="col-12 col-md-5">
                    <div class="col-left">
                    <h2><?php the_sub_field('call_to_action_title'); ?></h2>
                    <p><?php the_sub_field('call_to_action_content'); ?></p>
                    <a class="btn-art" href="<?php the_sub_field('call_to_action_link'); ?>"><?php the_sub_field('call_to_action_label'); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="col-right">
                    <img src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/07/fine-art-clip-path.png" alt="" class="w-100">
                    </div>
                </div>
            </div>
          </div>
        </section>
    <?php endif; ?>
    
    <!-- Cta banner ends -->


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
    
    <!-- Livestock Auctioneers for mobile ends here -->

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
                            <a class="btn-art" href="<?php echo esc_url( $events_cf_button_url ); ?>" target="<?php echo esc_attr( $events_cf_button_target ); ?>"><?php echo esc_html( $events_cf_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
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

    <!-- <section gallery start here -->

    <?php if( get_row_layout() == 'auction_room_gallery' ): ?>
    <section class="auction-gallery">
        <div class="container">
            <h2><?php the_sub_field('auction_gallery_title'); ?></h2>
            <p><?php the_sub_field('auction_gallery_description'); ?></p>
            <div class="row">
                <div class="col-12">
                    <div class="gallery-detail">
                    <?php 
                    $images = get_sub_field('auction_room_gallery');
                    if( $images ): ?>
                        <ul>
                        <?php foreach( $images as $image ): ?>
                            <li>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <p><?php echo esc_html($image['caption']); ?></p>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>            
    </section>
    <?php endif;?>

    <!-- section gallary ends here -->
    

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

     <!-- Departments Insight -->
     <section class="departments insights-wrapper">
        <div class="container">
            <div class="content">
            <h2><?php the_field('insights_title', 'option'); ?></h2>
                <p><?php the_field('insights_description', 'option'); ?></p>
            </div>
            <div class="depart-slider insigh">
            <?php
                $args = array(
                    'post_type' => 'Insights',
                    'posts_per_page' => 10,
                );

                $insight_query = new WP_Query( $args );

                if ( $insight_query->have_posts() ) :
                    while ( $insight_query->have_posts() ) : $insight_query->the_post(); ?>
                        <div class="slide-wrap">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                            <div class="inner-content">
                                <h4><?php the_title(); ?></h4>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="btn-cs-light">Read more <span><i class="fa-solid fa-angle-right"></i></span></a>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No insights found.</p>';
                endif;
                ?>
            </div>
        </div>
     </section>
     <!-- Departments Insights ends -->
</main>

<?php get_footer();?>