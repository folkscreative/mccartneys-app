<?php

/**
 * Template Name: Rural Template
 */

get_header(); ?>

<main class="rural page-wrap"> 
     <!-- Main Banner -->
    <?php if (have_rows('blocks')): ?>
    <?php while (have_rows('blocks')): the_row(); ?>
        <?php if (get_row_layout() == 'livestock_banner'): ?>
            <?php
            $livestock_bg_main = get_sub_field('livestock_background_image');
            ?>
            <?php if (!empty($livestock_bg_main)): ?>
                <section class="main-banner rural" style="background-image: url(<?php echo esc_url($livestock_bg_main['url']); ?>);">
            <?php else: ?>
                <section class="main-banner">
            <?php endif; ?>
                    <div class="container">
                        <div class="breadcrumb">
                        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
                        </div>
                        <div class="content">
                            <h1><?php the_sub_field('livestock_banner_title'); ?></h1>
                            <?php the_sub_field('livestock_banner_content'); ?>
                        </div>
                    </div>
                </section>
            <!-- Main Banner ends -->
            <section class="main-banner-sticky rural">
                <div class="banner-menu">
                <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'Rural-Service-Menu',
                            )
                        );
                        ?>
                </div>
            </section>
            <!-- Main Banner Sticky ends -->
        <?php endif; ?>
    

<!-- Department Services -->
    <?php if( get_row_layout() == 'livestock_services' ): ?>
    <section class="livestocks-departments rural">
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
            <a class="btn-transparent" href="<?php the_sub_field('service_cta_link'); ?>"><?php the_sub_field('service_cta_label'); ?></a>
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

     
 <!-- properties-right -->
 <?php if( get_row_layout() == 'property_right_section' ): ?>
    <section class="properties-right rural">
        <div class="container">
            <div class="d-flex g-4 row flex-column-reverse flex-md-row">
                
                <div class="col-12 col-md-6 align-content-center">
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
                            <a class="btn-cs-dark" href="<?php echo esc_url( $buy_top_button_url ); ?>" target="<?php echo esc_attr( $buy_top_button_target ); ?>"><?php echo esc_html( $buy_top_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                        <?php 
                        $sell_top_button = get_sub_field('property_cta_main_link');
                        if( $sell_top_button ): 
                            $sell_top_button_url = $sell_top_button['url'];
                            $sell_top_button_title = $sell_top_button['title'];
                            $sell_top_button_target = $sell_top_button['target'] ? $sell_top_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-white" href="<?php echo esc_url( $sell_top_button_url ); ?>" target="<?php echo esc_attr( $sell_top_button_target ); ?>"><?php echo esc_html( $sell_top_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
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
                <img src="<?php echo $property_img['url']; ?>" alt="<?php echo $property_img['alt']; ?>"  class="w-100">
                <?php endif; ?>
                     </div>
                </div>
            </div>
        </div>
    </section>
    <!-- properties-right ends -->
    <?php endif;?>

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
    <!-- Cta banner ends -->
    <?php endif; ?>

    <!-- Departments -->
    <?php if( get_row_layout() == 'departments_sale_section' ): ?>
    <section class="departments equine rural">
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
                <div class="title-depar">
                <h3><?php the_sub_field('slider_sale_title'); ?></h3>
                </div>
                <div class="inner">
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


    

    
    <!-- Livestock Auctioneers start here -->
    
    <?php if( get_row_layout() == 'livestock_auctioneers' ): ?>
    <section class="livestock-auctioneers d-none d-md-block" id="rural-actioner">
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
        <button class="load-more btn-cs-dark toogle-expert">Load More</button>
        <button class="load-less btn-cs-dark toogle-expert" style="display:none;">Load Less</button>
    </section>
    <?php endif;?>
    
    <!-- Livestock Auctioneers ends here -->

    <!-- Livestock Auctioneers for mobile start here -->
    
    <?php if( get_row_layout() == 'livestock_auctioneers' ): ?>
    <section class="livestock-auctioneers d-block d-md-none" id="rural-actioner">
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

     <!--  faqs -->
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

    <!--  faqs ends -->


    <!-- Testimonials -->
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