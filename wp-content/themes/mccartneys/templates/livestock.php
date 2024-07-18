<?php

/**
 * Template Name: Livestock Service
 */

get_header(); ?>

<main class="livestock page-wrap"> 
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
            <div class="breadcrumb"><?php get_breadcrumb(); ?></div>
                <div class="content">
                    <h1><?php the_sub_field('livestock_banner_title'); ?></h1>
                    <p><?php the_sub_field('livestock_banner_content'); ?></p>
                </div>
            </div>
        </section>
       
       
    <!-- Main Banner ends -->
    <section class="main-banner-sticky">
                <div class="banner-menu"> 
                    <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'Livestock-service-menu',
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
    
    <!-- Our Marketer section start here -->
    <?php if( get_row_layout() == 'our_marketers' ): ?>
    <section class="our-marketer" id="about-mkt">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="col-left">
                        <h2><?php the_sub_field('our_marketer_title'); ?></h2>
                        <p><?php the_sub_field('our_marketer_content'); ?></p>
                            <?php $our_marketer_right = get_sub_field('our_marketer_image');
                             if( !empty($our_marketer_right) ):?>
                            <img src="<?php echo $our_marketer_right['url']; ?>" alt="<?php echo $our_marketer_right['alt']; ?>" class="w-100 d-block d-md-none" >
                            <?php endif; ?>
                        <div class="marketer-buttons">
                        <?php 
                        $marketer_top_button = get_sub_field('view_more_button_link');
                        if( $marketer_top_button ): 
                            $marketer_top_button_url = $marketer_top_button['url'];
                            $marketer_top_button_title = $marketer_top_button['title'];
                            $marketer_top_button_target = $marketer_top_button['target'] ? $marketer_top_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $marketer_top_button_url ); ?>" target="<?php echo esc_attr( $marketer_top_button_target ); ?>"><?php echo esc_html( $marketer_top_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                     <?php 
                        $marketer_bottom_button = get_sub_field('laa_conditions_of_sale_link');
                        if( $marketer_bottom_button ): 
                            $marketer_bottom_button_url = $marketer_bottom_button['url'];
                            $marketer_bottom_button_title = $marketer_bottom_button['title'];
                            $marketer_bottom_button_target = $marketer_bottom_button['target'] ? $marketer_bottom_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-white" href="<?php echo esc_url( $marketer_bottom_button_url ); ?>" target="<?php echo esc_attr( $marketer_bottom_button_target ); ?>"><?php echo esc_html( $marketer_bottom_button_title ); ?></a>
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
    <!-- Our Marketer section ends here -->
   
    <!-- Cta banner -->
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
                    <img src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/07/sheeps-image-hd-1.png" alt="" class="w-100 d-none d-md-block">
                    <img src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/07/sheep-image-mb-1.png" alt="" class="w-100 d-block d-md-none">
                    </div>
                </div>
            </div>
          </div>
        </section>
    <?php endif; ?>
    <!-- Cta banner ends -->
    
    <!-- Livestock Auctioneers start here -->
 <?php if( get_row_layout() == 'livestock_auctioneers' ): ?>
    <section class="livestock-auctioneers d-none d-md-block">
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
    <?php endif; ?>
    <!-- Livestock Auctioneers ends here -->
     
<!-- Livestock Auctioneers mobile start here -->
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
    <?php endif;?>
    <!-- Livestock Auctioneers mobile ends here -->

    <!-- Livestock faqs -->
    <?php if( get_row_layout() == 'kington_livestock_market' ): ?>
    <section class="livestock-faqs">
        <div class="container">
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="col-left">
                         <h2><?php the_sub_field('kington_livestock_market_title'); ?></h2>
                         <p><?php the_sub_field('kington_livestock_market_description'); ?></p>
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
   
    <!-- Events section start here -->
    <?php if( get_row_layout() == 'livestock_events' ): ?>
    <section class="events">
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
    <section class="livestock-faqs faqs-wrap" id="FAQs">
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