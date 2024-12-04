<?php

/**
 * Template Name: Rural Inner Template
 */

get_header(); ?>

<main class="rural-sub-pages page-wrap"> 
     <!-- Inner Banner -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
        <?php if( get_row_layout() == 'livestock_banner' ): ?>
           <?php
            $image_private = get_sub_field( 'livestock_background_image' );
            if ( !empty( $image_private ) ) { ?>
            <section class="inner-banner-wrapper rural" style="background-image:url('<?php echo $image_private['url']; ?>');">
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
    <section class="our-marketer equine rural">
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
                <div class="col-12 col-md-6">
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
                        <div class="mark-buttons">
                            <?php 
                            if ($eq_primary_button): 
                                $eq_primary_button_url = $eq_primary_button['url'];
                                $eq_primary_button_title = $eq_primary_button['title'];
                                $eq_primary_button_target = $eq_primary_button['target'] ? $eq_primary_button['target'] : '_self';
                                ?>
                                <a class="btn-cs-dark" href="<?php echo esc_url($eq_primary_button_url); ?>" target="<?php echo esc_attr($eq_primary_button_target); ?>"><?php echo esc_html($eq_primary_button_title); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
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
    <section class="our-marketer equine app rurals">
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
                        <div class="mark-buttons">
                        <?php 
                        $eq_primary_button = get_sub_field('equine_app_primary_button');
                        if( $eq_primary_button ): 
                            $eq_primary_button_url = $eq_primary_button['url'];
                            $eq_primary_button_title = $eq_primary_button['title'];
                            $eq_primary_button_target = $eq_primary_button['target'] ? $eq_primary_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $eq_primary_button_url ); ?>" target="<?php echo esc_attr( $eq_primary_button_target ); ?>"><?php echo esc_html( $eq_primary_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
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

    <!-- renewable energy -->
    <?php if( get_row_layout() == 'renewable_energy' ): ?>
     <section class="renewable-energy-wrapper">
        <div class="container">
            <div class="content">
                <h2><?php the_sub_field('renewable_energy_title'); ?></h2>
                <p><?php the_sub_field('renewable_energy_description'); ?></p>
                <?php 
                    $renewable_button = get_sub_field('renewable_energy_button');
                    if( $renewable_button ): 
                        $renewable_button_url = $renewable_button['url'];
                        $renewable_button_title = $renewable_button['title'];
                        $renewable_button_target = $renewable_button['target'] ? $renewable_button['target'] : '_self';
                        ?>
                        <a class="btn-cs-dark" href="<?php echo esc_url( $renewable_button_url ); ?>" target="<?php echo esc_attr( $renewable_button_target ); ?>"><?php echo esc_html( $renewable_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                    <?php endif; ?>
            </div>

            <div class="tabs-wrapper">
            <?php if( have_rows('renewable_energy_tabs') ): ?>
            <ul class="tabs">
                <?php while ( have_rows('renewable_energy_tabs') ) : the_row(); ?>
                    <li class="tab" data-tab="tab-<?php echo get_row_index(); ?>">
                        <?php the_sub_field('renewable_energy_tabs_title'); ?>
                    </li>
                <?php endwhile; ?>
            </ul>
            <div class="tabs-content">
                <?php while ( have_rows('renewable_energy_tabs') ) : the_row(); ?>
                    <div class="tab-content" id="tab-<?php echo get_row_index(); ?>">
                        <?php $tabs_energy_image = get_sub_field('renewable_energy_tabs_image'); ?>
                        <?php if( !empty($tabs_energy_image) ): ?>
                            <img src="<?php echo $tabs_energy_image['url']; ?>" alt="<?php echo $tabs_energy_image['alt']; ?>" class="w-100">
                        <?php endif; ?>
                        <?php the_sub_field('renewable_energy_tabs_description'); ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
            </div>

        </div>
     </section>
     <?php endif; ?>
    <!-- rebewable energy ends -->

    <!-- sale info box -->
    <?php if( get_row_layout() == 'sale_information_box' ): ?>
     <section class="sale-info-box">
        <div class="container">
            <div class="content">
            <h2><?php the_sub_field('sale_information_title'); ?></h2>
            <p><?php the_sub_field('sale_information_description'); ?></p> 
            </div>
            <div class="row g-4">
            <?php if( have_rows('information_sales_boxes') ): ?>
            <?php while ( have_rows('information_sales_boxes') ) : the_row(); ?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="box">
                        <h4><?php the_sub_field('information_sale_boxes_title');?></h4>
                        <?php 
                    $rensale_button = get_sub_field('information_sale_box_buttton');
                    if( $rensale_button ): 
                        $rensale_button_url = $rensale_button['url'];
                        $rensale_button_title = $rensale_button['title'];
                        $rensale_button_target = $rensale_button['target'] ? $rensale_button['target'] : '_self';
                        ?>
                        <a class="btn-rural" href="<?php echo esc_url( $rensale_button_url ); ?>" target="<?php echo esc_attr( $rensale_button_target ); ?>"><?php echo esc_html( $rensale_button_title ); ?></a>
                    <?php endif; ?>
                    </div>
                </div>
                   
            <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
     </section>
     <?php endif; ?>
     <!-- sale info box ends -->




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


    <!-- Livestock Auctioneers start here -->
    
    <?php if( get_row_layout() == 'livestock_auctioneers' ): ?>
        <section class="livestock-auctioneers d-none d-md-block" id="livestck-actioner">
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
    <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
    <!-- Livestock Auctioneers for mobile ends here -->

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