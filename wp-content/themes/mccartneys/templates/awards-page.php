<?php

/**
 * Template Name: Awards Template
 */

get_header(); ?>

<main class="awards page-wrap"> 
     <!-- Main Banner -->
     <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
        <?php if( get_row_layout() == 'livestock_banner' ): ?>
            <?php
            $sale_banner = get_sub_field( 'livestock_background_image' );
if ( !empty( $sale_banner ) ) { ?>
    <section class="main-banner" style="background-image:url('<?php echo $sale_banner['url']; ?>');">
<?php }?>
            <div class="container">
            <div class="breadcrumb"></div>
                <div class="content">
                    <h1><?php the_sub_field('livestock_banner_title'); ?></h1>
                    <p><?php the_sub_field('livestock_banner_content'); ?></p>
                </div>
            </div>
        </section>

    <?php endif; ?>
    


    <!-- our awards -->
    <?php if( get_row_layout() == 'mccartneys_awards' ): ?>
        <section class="mc-awards" id="awards">
            <div class="container">
                <div class="content">
                <div class="breadcrumb"><?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?></div>
                     <h1><?php the_sub_field('mc_awards_title');?></h1>
                     <p><?php the_sub_field('mc_awards_description');?></p>
                </div>
                <div class="award-wrapper row g-5">
                <?php if( have_rows('mc_awards_boxes') ):
                     while ( have_rows('mc_awards_boxes') ) : the_row();?>
                        <div class="col-12 col-md-6">
                        <div class="box">
                        <?php $our_award_right = get_sub_field('award_box_main_image');
                             if( !empty($our_award_right) ):?>
                            <img src="<?php echo $our_award_right['url']; ?>" alt="<?php echo $our_award_right['alt']; ?>" class="w-100 main">
                            <?php endif; ?>
                            <div class="inner">
                            <h4><?php the_sub_field('award_box_title'); ?></h4>
                            <?php the_sub_field('award_box_description');?>
                            <?php $award_logo_img = get_sub_field('award_box_logo');
                             if( !empty($award_logo_img) ):?>
                            <img src="<?php echo $award_logo_img['url']; ?>" alt="<?php echo $award_logo_img['alt']; ?>" class="">
                            <?php endif; ?>
                            </div>
                        </div>
                        </div>
                <?php endwhile; ?><?php endif;?>
                </div>
                <?php 
                        $awards_button = get_sub_field('mc_awards_button');
                        if( $awards_button ): 
                            $awards_button_url = $awards_button['url'];
                            $awards_button_title = $awards_button['title'];
                            $awards_button_target = $awards_button['target'] ? $awards_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $awards_button_url ); ?>" target="<?php echo esc_attr( $awards_button_target ); ?>"><?php echo esc_html( $awards_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>
     <!-- our awards ends -->
        <?php endwhile; ?>
        <?php endif; ?>
    
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