<?php

/**
 * Template Name: Show Dates
 */

get_header(); ?>

<main class="pedigree-sales page-wrap"> 
    <!-- Inner Banner -->
     <section class="inner-banner-wrapper" style="background-image: url(http://localhost/mccartneys-app/wp-content/uploads/2024/07/show-dates-banner.jpg);">
        <div class="container">
            <div class="content">
            <div class="breadcrumb">
            <?php echo get_breadcrumb(); ?>
            </div>
                <h1>Show Dates</h1>
                <p>Each year McCartneys attends agricultural and livestock shows across the country, in an opportunity to meet new and old faces and provide direction on how McCartneys can help you.
                </p>
            </div>
        </div>
     </section>
    <!-- Inner Bnner ends -->
    
    <!-- Show Dates -->
    <section class="show-dates">
        <div class="container">
            <div class="row g-0">
                <div class="col-12">
                    <div class="show-dates-content">
                        <h3>Royal Three Counties Show</h3>
                        <ul>
                            <li>Friday 16th June - Sunday 18th June</li>
                            <li>Three Counties Showground, Malvern, Worcestershire, WR13 6NW</li>
                        </ul>
                    </div>
                    <div class="show-dates-content">
                        <h3>Royal Three Counties Show</h3>
                        <ul>
                            <li>Friday 16th June - Sunday 18th June</li>
                            <li>Three Counties Showground, Malvern, Worcestershire, WR13 6NW</li>
                        </ul>
                    </div>
                    <div class="show-dates-content">
                        <h3>Royal Three Counties Show</h3>
                        <ul>
                            <li>Friday 16th June - Sunday 18th June</li>
                            <li>Three Counties Showground, Malvern, Worcestershire, WR13 6NW</li>
                        </ul>
                    </div>
                    <div class="show-dates-content">
                        <h3>Royal Three Counties Show</h3>
                        <ul>
                            <li>Friday 16th June - Sunday 18th June</li>
                            <li>Three Counties Showground, Malvern, Worcestershire, WR13 6NW</li>
                        </ul>
                    </div>
                    <div class="show-dates-content">
                        <h3>Royal Three Counties Show</h3>
                        <ul>
                            <li>Friday 16th June - Sunday 18th June</li>
                            <li>Three Counties Showground, Malvern, Worcestershire, WR13 6NW</li>
                        </ul>
                    </div>
                    <div class="show-dates-content">
                        <h3>Royal Three Counties Show</h3>
                        <ul>
                            <li>Friday 16th June - Sunday 18th June</li>
                            <li>Three Counties Showground, Malvern, Worcestershire, WR13 6NW</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Show Dates ends -->
     
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