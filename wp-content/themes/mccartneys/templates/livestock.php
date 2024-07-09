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
            $livestock_bg_main = get_sub_field('livestock_background_image');
            if( !empty($livestock_bg_main) ):?>
            <section class="main-banner" style="background-image: url(<?php echo $livestock_bg_main['url']; ?>);">
        <?php endif; ?>
            <div class="container">
                <div class="breadcrumbs">
                    <ul>
                        <li>Home</li>
                        <li>Livestock</li>
                    </ul>
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
                                'menu' => 'Livestock-service-menu',
                            )
                        );
                        ?>
                </div>
        </section>
    <!-- Main Banner ends -->
    <?php endif; endwhile; endif; ?>
    
    <!-- Department Services -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
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
                $sv_image = get_sub_field('inner_service_image');
                if( !empty($sv_image) ):?>
                <img src="<?php echo $sv_image['url']; ?>" alt="<?php echo $sv_image['alt']; ?>">
                <?php endif; ?>
                <div class="inner-content">
                    <h4><?php the_sub_field('inner_service_title'); ?></h4>
                    <span class="divider"></span>
                    <div class="contex">
                    <p><?php the_sub_field('inner_service_description'); ?></p>
                    <?php 
                        $sr_btn_link = get_sub_field('inner_service_button');
                        if( $sr_btn_link ): 
                            $sr_btn_link_url = $sr_btn_link['url'];
                            $sr_btn_link_title = $sr_btn_link['title'];
                            $sr_btn_link_target = $sr_btn_link['target'] ? $sr_btn_link['target'] : '_self';
                            ?>
                            <a class="btn-rural" href="<?php echo esc_url( $sr_btn_link_url ); ?>" target="<?php echo esc_attr( $sr_btn_link_target ); ?>"><?php echo esc_html( $sr_btn_link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                </div>
                <?php endwhile; ?>
            <?php endif;?>
            </div>             
        </div>
     </section>
     <?php endif; endwhile; endif; ?>
    <!-- Department Services -->

    <!-- Our Marketer section start here -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
    <?php if( get_row_layout() == 'about_markets_section' ): ?>
    <section class="our-marketer">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="col-left">
                        <h2><?php the_sub_field('about_our_market_title'); ?></h2>
                        <p><?php the_sub_field('about_our_market_description');?></p>
                        <?php    
                            $about_mr_image = get_sub_field('about_market_image');
                            if( !empty($about_mr_image) ):?>
                            <img src="<?php echo $about_mr_image['url']; ?>" alt="<?php echo $about_mr_image['alt']; ?>" class="w-100 d-block d-md-none">
                            <?php endif; ?>
                        
                        <div class="marketer-buttons">
                        <?php 
                        $view_btn_link = get_sub_field('about_market_view_button');
                        if( $view_btn_link ): 
                            $view_btn_link_url = $view_btn_link['url'];
                            $view_btn_link_title = $view_btn_link['title'];
                            $view_btn_link_target = $view_btn_link['target'] ? $view_btn_link['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $view_btn_link_url ); ?>" target="<?php echo esc_attr( $view_btn_link_target ); ?>"><?php echo esc_html( $view_btn_link_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                        <?php 
                        $condition_btn_link = get_sub_field('about_market_condition_button');
                        if( $condition_btn_link ): 
                            $condition_btn_link_url = $condition_btn_link['url'];
                            $condition_btn_link_title = $condition_btn_link['title'];
                            $condition_btn_link_target = $condition_btn_link['target'] ? $condition_btn_link['target'] : '_self';
                            ?>
                            <a class="btn-cs-white" href="<?php echo esc_url( $condition_btn_link_url ); ?>" target="<?php echo esc_attr( $condition_btn_link_target ); ?>"><?php echo esc_html( $condition_btn_link_title ); ?></a>
                        <?php endif; ?>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="col-right">
                    <?php    
                        $about_mr_image = get_sub_field('about_market_image');
                        if( !empty($about_mr_image) ):?>
                        <img src="<?php echo $about_mr_image['url']; ?>" alt="<?php echo $about_mr_image['alt']; ?>" class="w-100 d-none d-md-block">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; endwhile; endif; ?>
    <!-- Our Marketer section ends here -->

    <!-- Cta banner -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
    <?php if( get_row_layout() == 'call_to_action' ): ?>
    <section class="cta-banner light">
          <div class="container">
            <div class="row g-0 align-items-center">
                <div class="col-12 col-md-5">
                    <div class="col-left">
                    <h2><?php the_sub_field('call_to_action_title');?></h2>
                    <p><?php the_sub_field('call_to_action_content'); ?></p>
                    <?php 
                    $cta_btn_link = get_sub_field('call_to_action_link');
                    if( $cta_btn_link ): 
                        $cta_btn_link_url = $cta_btn_link['url'];
                        $cta_btn_link_title = $cta_btn_link['title'];
                        $cta_btn_link_target = $cta_btn_link['target'] ? $cta_btn_link['target'] : '_self';
                        ?>
                        <a class="btn-rural" href="<?php echo esc_url( $cta_btn_link_url ); ?>" target="<?php echo esc_attr( $cta_btn_link_target ); ?>"><?php echo esc_html( $cta_btn_link_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="col-right">
                    <?php    
                        $cta_image_dktp = get_sub_field('call_to_action_image');
                        if( !empty($cta_image_dktp) ):?>
                        <img src="<?php echo $cta_image_dktp['url']; ?>" alt="<?php echo $cta_image_dktp['alt']; ?>" class="w-100 d-none d-md-block">
                        <?php endif; ?>
                        <?php    
                        $cta_image_mb = get_sub_field('call_to_action_image_mb');
                        if( !empty($cta_image_mb) ):?>
                        <img src="<?php echo $cta_image_mb['url']; ?>" alt="<?php echo $cta_image_mb['alt']; ?>" class="w-100 d-block d-md-none">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <?php endif; endwhile; endif; ?>
    <!-- Cta banner ends -->

    <!-- Livestock Auctioneers start here -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
    <?php if( get_row_layout() == 'livestock_auctioneers' ): ?>
    <section class="livestock-auctioneers d-none d-md-block" id="livestock-action">
        <div class="container">
            <div class="row g-4">
                <div class="col-4 col-lg-3">
                    <div class="livestock-auctioneers-content col-left">
                        <h2><?php the_sub_field('livestock_auctioneers_title'); ?></h2>
                        <p><?php the_sub_field('livestock_auctioneers_description'); ?></p>
                    </div>
                </div>

                <?php if( have_rows('livestock_auctioneers_details') ): ?>
            
            <?php while( have_rows('livestock_auctioneers_details') ): the_row(); ?>
            <div class="col-4 col-lg-3">
                    <div class="livestock-auctioneers-content">
                    <?php    
                        $author_auctioneer_image = get_sub_field('livestock_auctioneers_image');
                        if( !empty($author_auctioneer_image) ):?>
                        <img src="<?php echo $author_auctioneer_image['url']; ?>" alt="<?php echo $author_auctioneer_image['alt']; ?>" class="w-100">
                        <?php endif; ?>
                        <div class="team-content">
                            <h4><?php the_sub_field('livestock_auctioneers_name'); ?></h4>
                            <p><?php the_sub_field('livestock_auctioneers_post_title'); ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?> 
            </div>
        </div>
    </section>
    <!-- Livestock Auctioneers ends here -->

    <!-- Livestock Auctioneers for mobile start here -->
    <section class="livestock-auctioneers d-block d-md-none">
        <div class="container">
            <div class="outer">
                <div class="items">
                    <div class="livestock-auctioneers-content col-left">
                    <h2><?php the_sub_field('livestock_auctioneers_title'); ?></h2>
                    <p><?php the_sub_field('livestock_auctioneers_description'); ?></p>
                    </div>
                </div>
                </div>
                <div class="wrapp livestocks">
                <?php if( have_rows('livestock_auctioneers_details') ): ?>
                <?php while( have_rows('livestock_auctioneers_details') ): the_row(); ?>
                <div class="items">
                    <div class="livestock-auctioneers-content">
                    <?php    
                        $author_auctioneer_image = get_sub_field('livestock_auctioneers_image');
                        if( !empty($author_auctioneer_image) ):?>
                        <img src="<?php echo $author_auctioneer_image['url']; ?>" alt="<?php echo $author_auctioneer_image['alt']; ?>" class="w-100">
                        <?php endif; ?>
                        <div class="team-content">
                            <h4><?php the_sub_field('livestock_auctioneers_name'); ?></h4>
                            <p><?php the_sub_field('livestock_auctioneers_post_title'); ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?> 
            </div>
        </div>
    </section>
    <?php endif; endwhile; endif; ?>
    <!-- Livestock Auctioneers for mobile ends here -->

    <!-- Livestock faqs -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
    <?php if( get_row_layout() == 'know_more_faqs' ): ?>
    <section class="livestock-faqs">
        <div class="container">
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="col-left">
                         <h2>Would you like to know more?</h2>
                         <p>For more information contact the relevant livestock market below.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">

                     <div class="faqs-wrapper">


                     <?php if( have_rows('livestock_auctioneers_details') ): ?>
            
            <?php while( have_rows('livestock_auctioneers_details') ): the_row(); ?>
            <div class="faqs-item">
                             <div class="top-bar">
                                <h4><?php the_sub_field('kington_livestock_market_question'); ?></h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                                 <h4>Kington Livestock Market</h4>
                                 <p>Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare.</p>
                                 <ul>
                                    <li>Love Lane, Kington, Herefordshire, HR5 3BT</li>
                                 </ul>
                                 <div class="phone">
                                 
                                <a href="#">01544 231154</a>
                                 </div>
                             </div>
                             <span class="x-icon"><i class="fa-solid fa-xmark"></i></span>
                             </div>
                        </div>
                <?php endwhile; ?>
                <?php endif; ?> 

                        <div class="faqs-item">
                             <div class="top-bar">
                                <h4>Brecon Livestock Market</h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                                 <h4>Kington Livestock Market</h4>
                                 <p>Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare.</p>
                                 <ul>
                                    <li>Love Lane, Kington, Herefordshire, HR5 3BT</li>
                                 </ul>
                                 <div class="phone">
                                 
                                <a href="#">01544 231154</a>
                                 </div>
                             </div>
                             <span class="x-icon"><i class="fa-solid fa-xmark"></i></span>
                             </div>
                        </div>
                        

                     </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; endwhile; endif; ?>
    <!-- Livestock faqs ends -->

    <!-- Events section start here -->
    <section class="events">
        <div class="container">

            <div class="wrapper" style="background-image: url('http://localhost/mccartneys-app/wp-content/uploads/2024/07/nature-beautiful-image.jpg')">
                
                    <div class="events-slider">
                        <div class="event-wrapper">
                            <h2>Next Event Name</h2>
                            <p>Lorem ipsum dolor sit amet <br>consectetur adipiscing eli mattis.</p>
                            <h3>21st July </h3>
                            <a class="btn-rural" href="#">View all events <span><i class="fa-solid fa-angle-right"></i></span></a>
                        </div>
                        <div class="event-wrapper">
                            <h2>Next Event Name</h2>
                            <p>Lorem ipsum dolor sit amet <br>consectetur adipiscing eli mattis.</p>
                            <h3>21st July </h3>
                            <a class="btn-rural" href="#">View all events <span><i class="fa-solid fa-angle-right"></i></span></a>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- Events section ends here -->

    <!-- Livestock faqs -->
    <section class="livestock-faqs faqs-wrap" id="faqs-action">
        <div class="container">
            <div class="row g-0">
                <div class="col-12">
                    <div class="col-left">
                         <h2>Frequently Asked Questions</h2>
                         <p>We're committed to providing clear and helpful information to ensure a seamless experience for all our clients. If you need further assistance, our dedicated team is always ready to help. Explore our FAQs to get started and make the most of McCartneys Livestock Services.</p>
                    </div>
                </div>
                <div class="col-12">
                     <div class="faqs-wrapper">
                        <div class="faqs-item">
                             <div class="top-bar">
                                <h4>Brecon Livestock Market</h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                                 <h4>Kington Livestock Market</h4>
                                 <p>Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare.</p>
                                 
                             </div>
                             <span class="x-icon"><i class="fa-solid fa-xmark"></i></span>
                             </div>
                        </div>
                        <div class="faqs-item">
                             <div class="top-bar">
                                <h4>Brecon Livestock Market</h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                                 <h4>Kington Livestock Market</h4>
                                 <p>Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare.</p>
                             </div>
                             <span class="x-icon"><i class="fa-solid fa-xmark"></i></span>
                             </div>
                        </div>
                        <div class="faqs-item">
                             <div class="top-bar">
                                <h4>Brecon Livestock Market</h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                                 <h4>Kington Livestock Market</h4>
                                 <p>Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare.</p>
                             </div>
                             <span class="x-icon"><i class="fa-solid fa-xmark"></i></span>
                             </div>
                        </div>
                        <div class="faqs-item">
                             <div class="top-bar">
                                <h4>Brecon Livestock Market</h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                                 <h4>Kington Livestock Market</h4>
                                 <p>Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare.</p>
                             </div>
                             <span class="x-icon"><i class="fa-solid fa-xmark"></i></span>
                             </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </section>
      
    <!-- Livestock faqs ends -->

    <!-- Testimonials -->
    <section class="testimonials">
         <div class="container"> 
            <div class="testimonial-box">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/icon-apostrophe.png" alt="">
            </div>
             <h2 class="title">Testimonial Title</h2>
            <div class="testimonial-slider wrapper">
            
            <div class="item">
            <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/06/review-rating-one.png" alt="">
                <p>“Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare”</p>
                <div class="inner-box">
                <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/06/author-img.png" alt="">
                <div class="position">
                <h4>Name</h4>
                <span>Position</span>
                </div>
                </div>
                </div>
                <div class="item">
            <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/06/review-rating-one.png" alt="">
                <p>“Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare”</p>
                <div class="inner-box">
                <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/06/author-img.png" alt="">
                <div class="position">
                <h4>Name</h4>
                <span>Position</span>
                </div>
                </div>
                </div>
                <div class="item">
            <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/06/review-rating-one.png" alt="">
                <p>“Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare”</p>
                <div class="inner-box">
                <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/06/author-img.png" alt="">
                <div class="position">
                <h4>Name</h4>
                <span>Position</span>
                </div>
                </div>
                </div>
                <div class="item">
            <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/06/review-rating-one.png" alt="">
                <p>“Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare”</p>
                <div class="inner-box">
                <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/06/author-img.png" alt="">
                <div class="position">
                <h4>Name</h4>
                <span>Position</span>
                </div>
                </div>
                </div>
                </div>
         </div>
       </section>
        <!-- Testimonials ends -->

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