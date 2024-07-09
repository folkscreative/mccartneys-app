<?php

/**
 * Template Name: Private Sales
 */

get_header(); ?>

<main class="pedigree-sales page-wrap"> 
    <!-- Inner Banner -->
    <section class="inner-banner-wrapper" style="background-image: url(http://localhost/mccartneys-app/wp-content/uploads/2024/07/private-sales-background.jpg);">
        <div class="container">
            <div class="content">
            <div class="breadcrumb d-none d-md-block">
                <?php echo get_breadcrumb(); ?>
            </div>
            <div class="back-btn d-block d-md-none">
                <a href="#">Back to Department</a>
            </div>
                <h1>Private Sales</h1>
                <p>Private sales of commercial and pedigree breeding stock, offering a flexible and convenient alternative to auctions.
                </p>
            </div>
        </div>
     </section>
    <!-- Inner Bnner ends -->
    
   <!-- Pedigree Center -->
   <section class="pedigree-center private">
        <div class="container">
        <h2 class="title">Exclusive Private Livestock Sales</h2>
            <div class="flex-column-reverse flex-md-row g-4 row">
                <div class="col-12 col-md-6">
                     <div class="col-left">
                     <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/cows-drinking-water.jpg" alt="" class="w-100">
                     </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="col-right">
                    <p>McCartneys offers a range of private sales for commercial and pedigree breeding stock. These sales provide a convenient and flexible option for purchasing high-quality livestock outside the auction setting. Detailed listings of available stock are regularly updated, allowing buyers to review and select animals that meet their specific needs. For more information and to view current offerings, contact the relevant office or market. Explore our private sales to find top-tier breeding stock tailored to your requirements.</p> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pedigree Center ends -->
    
   <!-- Livestock faqs -->
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
                                    <li><span>Love Lane, Kington, Herefordshire, HR5 3BT</span></li>
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