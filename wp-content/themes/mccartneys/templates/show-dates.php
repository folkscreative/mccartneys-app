<?php

/**
 * Template Name: Show Date
 */

get_header(); ?>

<main class="pedigree-sales page-wrap"> 
    <!-- Inner Banner -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
        <?php if( get_row_layout() == 'livestock_banner' ): ?>
           <?php
            $image_private = get_sub_field( 'livestock_background_image' );
if ( !empty( $image_private ) ) { ?>
    <section class="inner-banner-wrapper" style="background-image:url('<?php echo $image_private['url']; ?>');">
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
   
    <!-- Show Dates -->
    <?php if( get_row_layout() == 'show_dates_content_section' ): ?>
    <section class="show-dates">
        <div class="container">
            <div class="row g-0">
                <div class="col-12">
                <?php if( have_rows('show_dates_content') ): ?>
                        <?php while( have_rows('show_dates_content') ): the_row(); ?>
                            <div class="show-dates-content">
                                <h3><?php the_sub_field('show_dates_title'); ?></h3>
                                <?php if( have_rows('dates_content') ): ?>
                                    <ul>
                                        <?php while( have_rows('dates_content') ): the_row(); ?>
                                            <li><?php the_sub_field('dates_label'); ?></li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                                <?php 
                                $show_dt_button = get_sub_field('show_dates_download_button');
                                if( $show_dt_button ): 
                                    $show_dt_button_url = $show_dt_button['url'];
                                    $show_dt_button_title = $show_dt_button['title'];
                                    $show_dt_button_target = $show_dt_button['target'] ? $show_dt_button['target'] : '_self';
                                    ?>
                                    <a class="btn-cs-dark" href="<?php echo esc_url( $show_dt_button_url ); ?>" target="<?php echo esc_attr( $show_dt_button_target ); ?>"><?php echo esc_html( $show_dt_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                                <?php endif; ?>
                                <?php 
                                $sale_report_button = get_sub_field('livestock_sales_report_button');
                                if( $sale_report_button ): 
                                    $sale_report_button_url = $sale_report_button['url'];
                                    $sale_report_button_title = $sale_report_button['title'];
                                    $sale_report_button_target = $sale_report_button['target'] ? $sale_report_button['target'] : '_self';
                                    ?>
                                    <a class="btn-sale" href="<?php echo esc_url( $sale_report_button_url ); ?>" target="<?php echo esc_attr( $sale_report_button_target ); ?>"><?php echo esc_html( $sale_report_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Show Dates ends -->
    <?php endif; ?>

<!--  faqs -->
<?php if( get_row_layout() == 'frequently_asked_questions' ): ?>
    <section class="livestock-faqs faqs-wrap equine">
        <div class="container">
            <div class="row g-0">
                <div class="col-12">
                    <div class="col-left">
                         <h2><?php the_sub_field('frequently_asked_question_title'); ?></h2>
                         <p><?php the_sub_field('frequently_asked_question_description'); ?></p>
                    </div>
                </div>
                <div class="col-12">
                     <div class="faqs-wrapper">
                     <?php if( have_rows('frequently_asked_question_detail') ):
                             while ( have_rows('frequently_asked_question_detail') ) : the_row();?>
                        <div class="faqs-item">
                             <div class="top-bar">
                                <h4><?php the_sub_field('frequently_asked_questions_question'); ?></h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                             <?php the_sub_field('frequently_asked_questions_answers'); ?>
                                 
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