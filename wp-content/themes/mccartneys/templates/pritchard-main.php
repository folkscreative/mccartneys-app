<?php

/**
 * Template Name: Phipps and pritchard Template
 */

get_header(); ?>

<main class="pritchard page-wrap"> 
     <!-- Main Banner -->
    <?php if (have_rows('blocks')): ?>
    <?php while (have_rows('blocks')): the_row(); ?>
        <?php if (get_row_layout() == 'livestock_banner'): ?>
            <?php
            $livestock_bg_main = get_sub_field('livestock_background_image');
            ?>
            <?php if (!empty($livestock_bg_main)): ?>
                <section class="main-phipps-banner" style="background-image: url(<?php echo esc_url($livestock_bg_main['url']); ?>);">
            <?php else: ?>
                <section class="main-banner">
            <?php endif; ?>
                    <div class="container">
                        <div class="content">
                            <h1><?php the_sub_field('livestock_banner_title'); ?></h1>
                            <?php the_sub_field('livestock_banner_content'); ?>
                            <?php
                            $pritvharad_logo = get_sub_field('livestock_banner_logo_pritchard');
                            if( !empty($pritvharad_logo) ):?>
                            <img src="<?php echo $pritvharad_logo['url']; ?>" alt="<?php echo $pritvharad_logo['alt']; ?>">
                            <?php endif; ?>
                        </div>
                        <!-- filter ends -->
                        <section class="home-filter-pr">
                
                                <?php echo do_shortcode('[property_search]'); ?>
                        
                        </section>
                        <!-- filter ends -->
                    </div>
                </section>
            <!-- Main Banner ends -->
        <?php endif; ?>

        <!-- Banner Tagline -->
        <?php if (get_row_layout() == 'phipps_banner_tagline'): ?>
         <section class="phipps-banner-tagline">
            <div class="container">
                <div class="outer">
                    <h5><?php the_sub_field('phipps_banner_title'); ?></h5>
                    <?php
                    $pritvharad_logo_mc = get_sub_field('phipps_banner_logo');
                    if( !empty($pritvharad_logo_mc) ):?>
                    <img src="<?php echo $pritvharad_logo_mc['url']; ?>" alt="<?php echo $pritvharad_logo_mc['alt']; ?>">
                    <?php endif; ?>
                </div>
            </div>
         </section>
         <?php endif; ?>
        <!-- Banner Tagline ends -->

    

    <!-- Department Services -->
    <?php if( get_row_layout() == 'livestock_services' ): ?>
    <section class="livestocks-departments property-page phipps-page">
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
    <!-- Department Services -->

   <!-- recent property section start here -->
   <?php if( get_row_layout() == 'recent_property_section' ): ?>
    <section class="recent-property-wrapper property-pg phip-page">
        <div class="container">
            <?php echo do_shortcode(get_sub_field('recent_property'));?>
            <?php 
            $recent_pr_button = get_sub_field('recent_property_button');
            if( $recent_pr_button ): 
                $recent_pr_button_url = $recent_pr_button['url'];
                $recent_pr_button_title = $recent_pr_button['title'];
                $recent_pr_button_target = $recent_pr_button['target'] ? $recent_pr_button['target'] : '_self';
                ?>
            <a class="btn-cs-dark orange" href="<?php echo esc_url( $recent_pr_button_url ); ?>"
                target="<?php echo esc_attr( $recent_pr_button_target ); ?>"><?php echo esc_html( $recent_pr_button_title ); ?></a>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

     <!-- recent property section ends here -->

    

     <!-- Pedigree Center -->
    <?php if( get_row_layout() == 'livestock_sales' ): ?>
    <section class="properties-center phip-page">
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
    <?php endif; ?>
    <!-- Pedigree Center ends -->

    <!-- Our Branches -->
    <?php if( get_row_layout() == 'our_branches' ): ?>
     <section class="our-branches">
        <div class="container">
            <div class="content">
                <h2><?php the_sub_field('our_branches_title'); ?></h2>
                <p><?php the_sub_field('our_branches_description'); ?></p>
            </div>

            <div class="tabs-wrapper">
                <div class="tabs-outer">
            <?php if( have_rows('phipps_branches_repeater') ): ?>
            <ul class="tabs">
                <?php while ( have_rows('phipps_branches_repeater') ) : the_row(); ?>
                    <li class="tab" data-tab="tab-<?php echo get_row_index(); ?>">
                        <?php the_sub_field('phipps_branches_title'); ?>
                    </li>
                <?php endwhile; ?>
            </ul>

            <?php 
                        $pcr_top_button = get_sub_field('our_branches_button');
                        if( $pcr_top_button ): 
                            $pcr_top_button_url = $pcr_top_button['url'];
                            $pcr_top_button_title = $pcr_top_button['title'];
                            $pcr_top_button_target = $pcr_top_button['target'] ? $pcr_top_button['target'] : '_self';
                            ?>
                        <a class="btn-cs-dark" href="<?php echo esc_url( $pcr_top_button_url ); ?>"
                            target="<?php echo esc_attr( $pcr_top_button_target ); ?>"><?php echo esc_html( $pcr_top_button_title ); ?><span><i
                                    class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                        </div>

            <div class="tabs-content">
                <?php while ( have_rows('phipps_branches_repeater') ) : the_row(); ?>
                    <div class="tab-content" id="tab-<?php echo get_row_index(); ?>">
                        
                    <div class="wrapper" style="display: flex;">
                    <div class="col-left">
                    <ul class="share">
                    <?php if( have_rows('phipps_branches_social_buttons') ):
                    
                    while ( have_rows('phipps_branches_social_buttons') ) : the_row();?>
                        
                            <li>
                                <a href="<?php the_sub_field('branches_social_media_link'); ?>"><?php the_sub_field('branches_social_media_label'); ?></a>
                            </li>
                        
                    <?php endwhile; ?>
                    
                    <?php endif;?>
                    </ul>
                        <div class="contex">
                        <?php the_sub_field('phipps_branches_content'); ?>
                        </div>
                        <ul class="contact">
                            <li>
                            <i class="fa-solid fa-phone"></i>
                                <a href="tel:<?php the_sub_field('phipps_branches_phone'); ?>"><?php the_sub_field('phipps_branches_phone'); ?></a>
                            </li>
                            <li>
                            <i class="fa-regular fa-envelope"></i>
                                <a href="mailto:<?php the_sub_field('phipps_branches_email'); ?>"><?php the_sub_field('phipps_branches_email'); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-right">
                    <?php
                     $branch_img = get_sub_field('phipps_branch_thumbnail');
                if( !empty($branch_img) ):?>
                        <img src="<?php echo $branch_img['url']; ?>" alt="<?php echo $branch_img['alt']; ?>"
                            class="w-100">
                        <?php endif; ?>
                    </div>
                    </div>

                    <h4 class="slider-title"><?php the_sub_field('branch_team_title');?></h4>


        <section class="livestock-auctioneers">
        <div class="container">
           
                <div class="wrapp livestocks">
                <?php if( have_rows('branches_team_repeater') ):
                     while ( have_rows('branches_team_repeater') ) : the_row();
                     $ac_image = get_sub_field('branch_team_image');
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
                            <a href="tel:<?php the_sub_field('branch_team_number'); ?>"><?php the_sub_field('branch_team_number'); ?></a>
                            </li>
                            <li>
                            <i class="fa-regular fa-envelope"></i>
                            <a href="mailto:<?php the_sub_field('branch_team_email'); ?>"><?php the_sub_field('branch_team_email'); ?></a>
                            </li>
                        </ul>
                        </div>
                        <div class="team-content">
                        <h4><?php the_sub_field('branch_team_name'); ?></h4>
                        <p><?php the_sub_field('branch_team_post_title'); ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?><?php endif;?>
            </div>
        </div>
    </section>

                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
            </div>





        </div>
     </section>
     <?php endif; ?>
    <!-- Our Branches ends -->

    <!-- Cta banner -->
    <?php if( get_row_layout() == 'call_to_action' ): ?>
        
    <section class="cta-phr">
    
          <div class="container">
          <?php
            $cta_clip_image = get_sub_field( 'call_to_action_right_image' );
            if ( !empty( $cta_clip_image ) ) { ?>
          <div class="col-left" style="background-image:url('<?php echo $cta_clip_image['url']; ?>');">
          <?php }?>        
                    <h2><?php the_sub_field('call_to_action_title'); ?></h2>
                    <p><?php the_sub_field('call_to_action_content'); ?></p>
                    <div class="btns">
                    <a class="btn-bn-light" href="<?php the_sub_field('call_to_action_link'); ?>"><?php the_sub_field('call_to_action_label'); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                    <?php 
                        $cta_sr_button = get_sub_field('cta_secondary_button');
                        if( $cta_sr_button ): 
                            $cta_sr_button_url = $cta_sr_button['url'];
                            $cta_sr_button_title = $cta_sr_button['title'];
                            $cta_sr_button_target = $cta_sr_button['target'] ? $cta_sr_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-light" href="<?php echo esc_url( $cta_sr_button_url ); ?>" target="<?php echo esc_attr( $cta_sr_button_target ); ?>"><?php echo esc_html( $cta_sr_button_title ); ?></a>
                        <?php endif; ?>
                    </div>
                    
                    
                </div>
          </div>
        </section>
    <?php endif; ?>
    <!-- Cta banner ends -->
    
        <!-- Fine country -->
    <?php if( get_row_layout() == 'fine_country_section' ): ?>
        <section class="fine-country phips-page">
            <div class="container">
                <div class="row g-4 align-items-center">
                <div class="col-12 col-md-6 d-flex">
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
                    
                </div>
            </div>
        </section>
        <?php endif; ?>
        <!-- Fine country ends -->
        
    <!-- Testimonials -->
   
    <?php if( get_row_layout() == 'testimonials' ): ?>
    <section class="testimonials phips">
         <div class="container"> 
            <div class="testimonial-box">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/apostrophe-orange.png" alt="">
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