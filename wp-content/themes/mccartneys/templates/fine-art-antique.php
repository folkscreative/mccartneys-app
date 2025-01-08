<?php

/**
 * Template Name: Fine art & antique
 */

get_header(); ?>

<main class="fine-art page-wrap"> 
    <!-- Inner Banner -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
        <?php if( get_row_layout() == 'livestock_banner' ): ?>
           <?php
            $image_private = get_sub_field( 'livestock_background_image' );
if ( !empty( $image_private ) ) { ?>
    <section class="inner-banner-wrapper art" style="background-image:url('<?php echo $image_private['url']; ?>');">
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
    <!-- Pedigree Center -->
    <?php if( get_row_layout() == 'livestock_sales' ): ?>
    <section class="pedigree-center">
        <div class="container">
        <h2 class="title"><?php the_sub_field('livestock_sales_title', '483'); ?></h2>
            <div class="row flex-column-reverse flex-md-row g-4">
                <div class="col-12 col-md-6">
                     <div class="col-left">
                        <?php
                     $livestock_sale = get_sub_field('livestock_left_image');
                if( !empty($livestock_sale) ):?>
                <img src="<?php echo $livestock_sale['url']; ?>" alt="<?php echo $livestock_sale['alt']; ?>"  class="w-100">
                <?php endif; ?>
                <?php 
                        $pc_top_button = get_sub_field('forthcoming_sales_&_catalogues_cta_link');
                        if( $pc_top_button ): 
                            $pc_top_button_url = $pc_top_button['url'];
                            $pc_top_button_title = $pc_top_button['title'];
                            $pc_top_button_target = $pc_top_button['target'] ? $pc_top_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $pc_top_button_url ); ?>" target="<?php echo esc_attr( $pc_top_button_target ); ?>"><?php echo esc_html( $pc_top_button_title ); ?></a>
                        <?php endif; ?>
                     <?php 
                        $pc_bottom_button = get_sub_field('forthcoming_sales_report_cta_link');
                        if( $pc_bottom_button ): 
                            $pc_bottom_button_url = $pc_bottom_button['url'];
                            $pc_bottom_button_title = $pc_bottom_button['title'];
                            $pc_bottom_button_target = $pc_bottom_button['target'] ? $pc_bottom_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-white" href="<?php echo esc_url( $pc_bottom_button_url ); ?>" target="<?php echo esc_attr( $pc_bottom_button_target ); ?>"><?php echo esc_html( $pc_bottom_button_title ); ?></a>
                        <?php endif; ?>
                     </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="col-right">
                    <?php the_sub_field('forthcoming_sales_right_content_area'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pedigree Center ends -->
    <?php endif; ?>

<!-- Auction Room start here -->
<?php if( get_row_layout() == 'auction_room_section' ): ?>
 <section class="auction-room">
    <div class="container">
        <div class="row g-0">
            <div class="col-12 col-md-6">
                <div class="col-left">
                    <h4><?php the_sub_field('auction_room_title'); ?></h4>
                    <ul>
            <?php if( have_rows('auction_room_social') ):
                     while ( have_rows('auction_room_social') ) : the_row();
                     $act_img = get_sub_field('auction_room_icon');
                     ?>
                        <li><a href="<?php the_sub_field('auction_room_link'); ?>">
                        <?php if( !empty($act_img) ):?>
                        <img src="<?php echo $act_img['url']; ?>" alt="<?php echo $act_img['alt']; ?>">
                    <?php endif; ?>
                     </a></li>
                        <?php endwhile; ?><?php endif; ?>
                    </ul>       
                    <?php the_sub_field('auction_room_address'); ?>
                    <div class="download-auction">
                        <a href="<?php the_sub_field('download_button_link'); ?>"><?php the_sub_field('download_button_label'); ?></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="col-right">
                    <?php the_sub_field('auction_right_area_description');?>
                    <div class="contact-info">
                        <ul>
                            <li><img src="<?php echo get_template_directory_uri()?>/assets/images/Icon - phone.svg" alt=""><a href="tel:<?php the_sub_field('auction_room_phone_number'); ?>"><?php the_sub_field('auction_room_phone_number'); ?></a></li>
                            <li><img src="<?php echo get_template_directory_uri()?>/assets/images/vector-email.svg" alt=""><a href="mailto:<?php the_sub_field('auction_room_email'); ?>"><?php the_sub_field('auction_room_email'); ?></a></li>
                        </ul>
                    </div>
                    <?php 
                        $events_cd_button = get_sub_field('auction_office_contact_cta');
                        if( $events_cd_button ): 
                            $events_cd_button_url = $events_cd_button['url'];
                            $events_cd_button_title = $events_cd_button['title'];
                            $events_cd_button_target = $events_cd_button['target'] ? $events_cd_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $events_cd_button_url ); ?>" target="<?php echo esc_attr( $events_cd_button_target ); ?>"><?php echo esc_html( $events_cd_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
 </section>
 <?php endif?>
 <!-- Auction Room ends here -->

<!-- Cta banner -->
<?php if( get_row_layout() == 'call_to_action' ): ?>
    <section class="cta-banner light">
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
    <section class="livestock-auctioneers d-none d-md-block" id="fine-auctioneer">
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

<!-- <section gallery start here -->
<?php if( get_row_layout() == 'auction_room_gallery' ): ?>
    <section class="auction-gallery art" id="gallery">
        <div class="container">
            <h2><?php the_sub_field('auction_gallery_title'); ?></h2>
            <p><?php the_sub_field('auction_gallery_description'); ?></p>
            <div class="row g-0">
                <div class="col-12">
                    <div class="gallery-detail">
                    <?php 
                    $images = get_sub_field('auction_room_gallery');
                    if( $images ): ?>
                        
                        <?php foreach( $images as $image ): ?>
                            
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    
                        <?php endforeach; ?>
                        
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Lightbox -->
        <div id="lightbox">
            <div class="close">x</div>
            <div class="prev"><i class="fa-solid fa-angle-left"></i></div>
            <div class="next"><i class="fa-solid fa-angle-right"></i></div>
            <img src="#">
        </div>            
    </section>
 <?php endif;?>
    <?php endwhile; ?>
    <?php endif; ?>
     <!-- section gallary ends here -->
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