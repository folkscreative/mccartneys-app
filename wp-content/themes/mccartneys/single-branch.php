<?php
get_header(); ?>
<main class="single-branch page-wrap"> 
<section class="branch-single">
    <div class="container">
        <div class="row g-0">
        <?php if ( has_post_thumbnail() ) {?>
        <div class="col-12 col-md-6">
            <div class="thumbnail-col">
                <?php  the_post_thumbnail( 'full', array( 'class' => 'img-fluid' ) );?>
            </div>
        </div>
        <?php }?>
            <div class="col-12 col-md-6">
                <div class="single-content-details">
                    <div class="content">
                    <div class="breadcrumb mc"><?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?></div>
                    <h1><?php the_title(); ?></h1>
                    <?php the_excerpt(); ?>
                    </div>

                    <div class="inner-wrapper">
                        <div class="col-left">
                            <?php the_field('branches_content_data_info'); ?>
                        <a href="<?php echo site_url('contact-us'); ?>" class="btn-cs-white">Contact us<span><i class="fa-solid fa-angle-right"></i></span></a>
                        </div>
                        <div class="col-right">
                            <h4>Services we provide:</h4>
                            <?php $properties_data=get_field('properties',get_the_ID());
								  $livestock_data=get_field('livestock',get_the_ID());
								 $planning_survey_data=get_field('planning_survey',get_the_ID());
								 $antiques_data=get_field('antiques',get_the_ID());
					             $equine_data=get_field('equine',get_the_ID());
								 $rural_data=get_field('rural',get_the_ID());
							?>

                <ul class="office-cat-wrap">
                    <?php if($properties_data=='True') { ?>
                    <li class="items-wrap">
                        <div class="icn-img">
                        <img
                        src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/properties-vector-1.svg">
                        </div>
                        <span>Properties</span>
                    </li>
                    <?Php }
							?>
                    <?php if($livestock_data=='True') { ?>
                    <li class="items-wrap">
                        <div class="icn-img">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/livestock-logo-1.svg">
                            </div>
                        <span>Livestock</span>
                    </li>
                    <?Php }?>

                    <?php if($planning_survey_data=='True') { ?>
                    <li class="items-wrap">
                    <div class="icn-img">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/planning-logo-1.svg">
                            </div>
                        <span>Planning & Survay</span>
                    </li>
                    <?Php }?>

                    <?php if($antiques_data=='True') { ?>
                    <li class="items-wrap">
                    <div class="icn-img">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/antiques-logo-1.svg">
                            </div>
                        <span>Antiques</span>
                    </li>
                    <?Php }?>


                    <?php if($equine_data=='True') { ?>
                    <li class="items-wrap">
                    <div class="icn-img">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/07/equine-icon.svg">
                            </div>
                        <span>Equine</span>
                    </li>
                    <?Php }?>

                    <?php if($rural_data=='True') { ?>
                    <li class="items-wrap">
                    <div class="icn-img">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/07/rural-icon.svg">
                            </div>
                        <span>Rural</span>
                    </li>
                    <?Php }?>
                    </ul>
                    <?php if( have_rows('office_share_buttons', 'option') ): ?>
                    <ul class="share-buttons-wrap d-flex">
                        <?php while( have_rows('office_share_buttons','option') ): the_row(); ?>

                        <li class="item">

                            <a href="<?php the_sub_field('location_share_button_link'); ?>">
                                <?php
										$share_logo = get_sub_field('location_share_image');
										if( !empty($share_logo) ):?>
                                <img src="<?php echo $share_logo['url']; ?>" alt="<?php echo $share_logo['alt']; ?>">
                                <?php endif; ?>
                            </a>
                        </li>

                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="branch-map">
        <?php if( get_field('branch_map') ): ?>
         <?php echo do_shortcode(get_field('branch_map')); ?>
        <?php endif; ?>
        </div>
    </div>
</section>

<?php if( have_rows('blocks') ): ?>
    <?php while( have_rows('blocks') ): the_row(); ?>
  <!-- recent property section start here -->
  <?php if( get_row_layout() == 'recent_property_section' ): ?>
   <section class="recent-property-wrapper">
        <div class="container">
    <?php echo do_shortcode(get_sub_field('recent_property'));?>
        <a href="#" class="btn-cs-dark">View all properties</a>
        </div>
     </section>
     <?php endif;?>
     <!-- recent property section ends here -->

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

   <!-- Cta banner -->
   <?php if( get_row_layout() == 'call_to_action' ): ?>
     <section class="cta-banner light">
          <div class="container">
            <div class="row g-0 align-items-center">
            
                <div class="col-12 col-md-5">
                    <div class="col-left">
                    <h2><?php the_sub_field('call_to_action_title'); ?></h2>
                    <p><?php the_sub_field('call_to_action_content'); ?></p>
                    <a class="btn-cs-white" href="<?php the_sub_field('call_to_action_link'); ?>"><?php the_sub_field('call_to_action_label'); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
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

        <!-- Our Marketer section start here -->
   <?php if( get_row_layout() == 'equine_app_content' ): ?>
    <section class="our-marketer equine rural branch">
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

<!-- Start Property section here -->
    <?php if( get_row_layout() == 'property_tabs_section' ): ?>
       <section class="property-wrapper branch">
        <div class="container">
            <h2 class="title"><?php the_sub_field('property_tab_title'); ?></h2>
            <p class="description"><?php the_sub_field('property_tab_description'); ?></p>
            <?php echo do_shortcode(get_sub_field('property_tab_shortcode_new'));?>
        </div>
     </section>
     <?php endif; ?>
    <!-- End Property section here -->



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



    <?php endwhile; ?><?php endif;?>
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
</main>
<?php get_footer();?>