<?php

/**
 * Template Name: Contact Us
 */

get_header(); ?>
<main class="agriculture-sales page-wrap"> 
    <!-- Inner Banner -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
        <?php if( get_row_layout() == 'livestock_banner' ): ?>
           <?php
            $image_private = get_sub_field( 'livestock_background_image' );
        if ( !empty( $image_private ) ) { ?>
            <section class="contactus-banner" style="background-image:url('<?php echo $image_private['url']; ?>');">
        <?php }?>
     <div class="container">
            <div class="outer-wrap">
            <div class="content">
            
           <div class="contact-form">

           <iframe id="JotFormIFrame-242453847375061" title="Contact McCartneys" onload="window.parent.scrollTo(0,0)" allowtransparency="true" allow="geolocation; microphone; camera; fullscreen"
            src="https://form.jotform.com/242453847375061" frameborder="0" width="100%" height="1050px" scrolling="no">
            </iframe>
            <?php //echo do_shortcode('[contact-form-7 id="35180b3" title="Contact form 1"] '); ?>
           </div>
            
            <div class="connect-wrap">
            <?php if( have_rows('social_media_buttons', 'option') ): ?>
            <ul>
            <?php while( have_rows('social_media_buttons', 'option') ): the_row(); ?>
                <li><a href="<?php $social_link= the_sub_field('social_media_link'); 
                echo $echo;
                ?>"><?php  $social_label = get_sub_field('social_media_label');
                echo $social_label;
                ?></a></li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
			</div>
            </div>
            </div>
        </div>
     </section>
    <!-- Inner Bnner ends -->
    <?php endif; ?>
    

    <!-- Start Property section here -->
    <?php if( get_row_layout() == 'property_tabs_section' ): ?>
       <section class="property-wrapper contact about-us">
        <div class="container">
            <h2 class="title"><?php the_sub_field('property_tab_title'); ?></h2>
            <p class="description"><?php the_sub_field('property_tab_description'); ?></p>
            <?php echo do_shortcode(get_sub_field('property_tab_shortcode_new'));?>
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
                    <a class="btn-bn-light" href="<?php the_sub_field('call_to_action_link'); ?>"><?php the_sub_field('call_to_action_label'); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
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
    <?php endwhile; ?>
    <?php endif; ?>
    <!-- Livestock faqs ends -->

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