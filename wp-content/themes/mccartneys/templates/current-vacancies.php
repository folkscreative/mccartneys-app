<?php

/**
 * Template Name: Vacancies
 */

get_header(); ?>

<main class="vacancies page-wrap"> 
    <!-- Inner Banner -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
        <?php if( get_row_layout() == 'livestock_banner' ): ?>
           <?php
            $image_private = get_sub_field( 'livestock_background_image' );
            if ( !empty( $image_private ) ) { ?>
                <section class="inner-banner-wrapper rural vacancies" style="background-image:url('<?php echo $image_private['url']; ?>');">
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
    
<!-- current vacancies start here -->
<?php if( get_row_layout() == 'current_vacancies'): ?>
 <section class="current-vacancies">
    <div class="container">
        <div class="content">
        <h2><?php the_sub_field('current_vacancies_title'); ?></h2>
        <p><?php the_sub_field('current_vacancies_content'); ?></p>
        </div>
        <div class="row g-5">
        <?php if( have_rows('current_vacancies_detail') ):
                     while ( have_rows('current_vacancies_detail') ) : the_row();?>
            <div class="col-12 col-md-6">
                <div class="wrap">

                
                <div class="vacancies-content">
                    <div class="vacancy-img">
                    <?php
                    $vc_img = get_sub_field('vacancy_icon');
                    ?>
                    <?php if( !empty($vc_img) ):?>
                        <img src="<?php echo $vc_img['url']; ?>" alt="<?php echo $vc_img['alt']; ?>">
                    <?php endif; ?>
                    </div>
                    <div class="job-content">
                        <h4><?php the_sub_field('job_title'); ?></h4>
                        <span><?php the_sub_field('job_location_and_type'); ?></span>
                    </div>
                    
                </div>
                <div class="job-detail"><?php the_sub_field('job_description'); ?></div>
                </div>
            </div>
            <?php endwhile; ?><?php endif;?>
        </div>
    </div>
 </section>
 <?php endif; ?>
<!-- current vacancies ends here -->

    

   <!-- Livestock faqs -->
   <?php if( get_row_layout() == 'kington_livestock_market' ): ?>
    <section class="livestock-faqs">
        <div class="container">
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="col-left">
                         <h2><?php the_sub_field('kington_livestock_market_title'); ?></h2>
                         <p><?php the_sub_field('kington_livestock_market_description'); ?></p>
                         <?php 
                $contact_faq_button = get_sub_field('kington_livestock_market_button');
                if( $contact_faq_button ): 
                    $contact_faq_button_url = $contact_faq_button['url'];
                    $contact_faq_button_title = $contact_faq_button['title'];
                    $contact_faq_button_target = $contact_faq_button['target'] ? $contact_faq_button['target'] : '_self';
                    ?>
                    <a class="btn-cs-dark" href="<?php echo esc_url( $contact_faq_button_url ); ?>" target="<?php echo esc_attr( $contact_faq_button_target ); ?>"><?php echo esc_html( $contact_faq_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                <?php endif; ?>
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
</main>

<?php get_footer();?>