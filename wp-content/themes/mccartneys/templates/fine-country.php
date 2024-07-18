<?php

/**
 * Template Name: Fine & Country Temp
 */

get_header(); ?>
<main class="commercial-sales page-wrap"> 
    <!-- Inner Banner -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
        <?php if( get_row_layout() == 'livestock_banner' ): ?>
           <?php
            $image_private = get_sub_field( 'livestock_background_image' );
if ( !empty( $image_private ) ) { ?>
    <section class="fine-country-banner-wrap inner-banner-wrapper sale" style="background-image:url('<?php echo $image_private['url']; ?>');">
<?php }?>
     <div class="container">
            <div class="content">
            <div class="breadcrumb"><?php get_breadcrumb(); ?></div>
            <h1><?php the_sub_field('livestock_banner_title'); ?></h1>
            <?php the_sub_field('livestock_banner_content'); ?>
            
            </div>
            <form class="inner">
                <div class="middle-col"> 
                    <div class="item">
                    <input type="search" placeholder="Location">
                    </div>
                    <div class="item">
                    <select>
                        <option>Search radius</option>
                        <option>Radius one</option>
                        <option>Radius two</option>
                    </select>
                    </div>
                    <div class="item">
                    <select>
                        <option>Price</option>
                        <option>$12865</option>
                        <option>$0000</option>
                    </select>
                    </div>
                </div>
                <div class="search-btn">
                    <a href="#" class="btn-cs-dark">Search</a>
                </div>
            </form>
        </div>
     </section>
    <!-- Inner Bnner ends -->
    <?php endif; ?>
        <!-- Pedigree Center -->
    <?php if( get_row_layout() == 'livestock_sales' ): ?>
    <section class="properties-center">
        <div class="container">
            <div class="align-items-lg-center align-items-start d-flex g-4 row">
                <div class="col-12 col-md-6">
                     <div class="col-left">
                     <h2 class="title d-block d-md-none"><?php the_sub_field('livestock_sales_title'); ?></h2>
                     <?php
                     $livestock_sale = get_sub_field('livestock_left_image');
                if( !empty($livestock_sale) ):?>
                <img src="<?php echo $livestock_sale['url']; ?>" alt="<?php echo $livestock_sale['alt']; ?>"  class="w-100">
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
                            <a class="btn-cs-dark" href="<?php echo esc_url( $pc_top_button_url ); ?>" target="<?php echo esc_attr( $pc_top_button_target ); ?>"><?php echo esc_html( $pc_top_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pedigree Center ends -->
    <?php endif; ?>

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



        <!-- properties-right -->
        <?php if( get_row_layout() == 'property_right_section' ): ?>
    <section class="properties-right">
        <div class="container">
            <div class="align-items-lg-center align-items-start d-flex g-4 row flex-column-reverse flex-md-row">
                
                <div class="col-12 col-md-6">
                    <div class="col-left">
                    <h2 class="title d-none d-md-block"><?php the_sub_field('property_title'); ?></h2>
                    <?php the_sub_field('property_left_content_area'); ?>
                    <?php 
                        $pc_top_button = get_sub_field('property_cta_link');
                        if( $pc_top_button ): 
                            $pc_top_button_url = $pc_top_button['url'];
                            $pc_top_button_title = $pc_top_button['title'];
                            $pc_top_button_target = $pc_top_button['target'] ? $pc_top_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $pc_top_button_url ); ?>" target="<?php echo esc_attr( $pc_top_button_target ); ?>"><?php echo esc_html( $pc_top_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
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
    <?php endif; ?>
   
  



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
                    <img src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/07/duck-swimming.png" alt="" class="w-100">
                    </div>
                </div>
            </div>
          </div>
        </section>
    <?php endif; ?>
    <!-- Cta banner ends -->

       <!-- Start Property section here -->
       <?php if( get_row_layout() == 'property_tabs_section' ): ?>
       <section class="property-wrapper fc-page">
        <div class="container">
            <h2 class="title"><?php the_sub_field('property_tab_title'); ?></h2>
            <p class="description"><?php the_sub_field('property_tab_description'); ?></p>
            <?php echo do_shortcode(get_sub_field('property_tab_shortcode_new'));?>
        </div>
     </section>
     <?php endif; ?>
    <!-- End Property section here -->
     


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