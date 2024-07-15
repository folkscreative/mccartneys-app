<?php

/**
 * Template Name: Dairy Cattle Exchanges 
 */

get_header(); ?>

<main class="pedigree-sales page-wrap"> 
    <!-- Inner Banner -->
     <!-- Inner Banner -->
     <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
        <?php if( get_row_layout() == 'livestock_banner' ): ?>

           <?php
            $img = get_sub_field( 'livestock_background_image' );
if ( !empty( $img ) ) { ?>
    <section class="inner-banner-wrapper" style="background-image:url('<?php echo $img['url']; ?>');">
<?php }?>

        <div class="container">
            <div class="content">
            <div class="breadcrumb"><?php get_breadcrumb(); ?></div>
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
        <h2 class="title"><?php the_sub_field('livestock_sales_title'); ?></h2>
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
    
    <!-- Livestock faqs -->
    <?php if( get_row_layout() == 'kington_livestock_market' ): ?>
    <section class="livestock-faqs">
        <div class="container">
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="col-left">
                         <h2><?php the_sub_field('kington_livestock_market_title'); ?></h2>
                         <p><?php the_sub_field('kington_livestock_market_description'); ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                     <div class="faqs-wrapper">
                     <?php if( have_rows('kington_livestock_market_detail') ):
                     while ( have_rows('kington_livestock_market_detail') ) : the_row();?>
                        <div class="faqs-item">
                             <div class="top-bar">
                                <h4><?php the_sub_field('kington_livestock_market_question'); ?></h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                             <?php the_sub_field('kington_livestock_market_answer'); ?>
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
    <!-- Livestock faqs ends -->
    <?php endif; ?>
    <?php endwhile; ?>
    <?php endif; ?>

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