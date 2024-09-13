<?php

/**
 * Template Name: Primestock Sale
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
                            <a class="btn-cs-darker" href="<?php echo esc_url( $pc_bottom_button_url ); ?>" target="<?php echo esc_attr( $pc_bottom_button_target ); ?>"><?php echo esc_html( $pc_bottom_button_title ); ?></a>
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
  
    <!-- Entry Forms -->
    <!-- Entry Forms -->
    <?php if( get_row_layout() == 'entry_forms' ): ?>
    <section class="entry-forms store-page">
        <div class="container">
            <div class="content">
                <h2><?php the_sub_field('entry_forms_title'); ?></h2>
                <p><?php the_sub_field('entry_forms_description'); ?></p>
            </div>
            <div class="entry-form-slider inner-wrapper store">
            <?php if( have_rows('entry_forms_details') ):
                     while ( have_rows('entry_forms_details') ) : the_row();?>
                <div class="item">
                    <h3><?php the_sub_field('form_description'); ?></h3>
                    <span class="divider"></span>
                    <span class="info"><?php the_sub_field('form_name'); ?></span>
                    <?php 
                                $show_pdf = get_sub_field('form_cta_link');
                                if( $show_pdf ): 
                                    $show_pdf_url = $show_pdf['url'];
                                    $show_pdf_title = $show_pdf['title'];
                                    $show_pdf_target = $show_pdf['target'] ? $show_pdf['target'] : '_blank';
                                    ?>
                                    <a class="btn-rural" href="<?php echo esc_url( $show_pdf_url ); ?>" target="<?php echo esc_attr( $show_pdf_target ); ?>"><?php echo esc_html( $show_pdf_title ); ?></a>
                                <?php endif; ?>
                </div>
                <?php endwhile; ?><?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Entry Forms ends -->
    <?php endif; ?>

    <!-- Cta banner -->
<?php if( get_row_layout() == 'call_to_action' ): ?>
     <section class="cta-banner dark">
          <div class="container">
            <div class="row g-0 align-items-center">
            
                <div class="col-12 col-md-5">
                    <div class="col-left">
                    <h2><?php the_sub_field('call_to_action_title'); ?></h2>
                    <p><?php the_sub_field('call_to_action_content'); ?></p>
                    <?php 
                        $cta_box_link = get_sub_field('cta_secondary_button');
                        if( $cta_box_link ): 
                            $cta_box_link_url = $cta_box_link['url'];
                            $cta_box_link_title = $cta_box_link['title'];
                            $cta_box_link_target = $cta_box_link['target'] ? $cta_box_link['target'] : '_self';
                            ?>
                        <a class="btn-rural" href="<?php echo esc_url( $cta_box_link_url ); ?>"
                            target="<?php echo esc_attr( $cta_box_link_target ); ?>"><?php echo esc_html( $cta_box_link_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
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
    <section class="livestock-auctioneers  d-none d-md-block">
        <div class="container collapsed">
            <div class="row g-4 action-trim">
                 <div class="col-4 col-lg-3 action-trim-item">
                    <div class="livestock-auctioneers-content col-left">
                        <h2><?php the_sub_field('livestock_auctioneer_heading'); ?></h2>
                        <p><?php the_sub_field('livestock_auctioneer_content'); ?></p>
                    </div>
                </div>
                <?php if( have_rows('livestock_auctioneers_details') ):
                     while ( have_rows('livestock_auctioneers_details') ) : the_row();?>
                     
                <div class="col-4 col-lg-3 action-trim-item repeat-team">
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

                            <?php if( get_sub_field('livestock_auctioneers_email') ): ?>
                            <li>
                            <i class="fa-regular fa-envelope"></i>
                            <a href="mailto:<?php the_sub_field('livestock_auctioneers_email'); ?>"><?php the_sub_field('livestock_auctioneers_email'); ?></a>
                            </li>
                            <?php endif; ?>
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
        <button class="load-more btn-cs-dark toogle-expert">Load More</button>
        <button class="load-less btn-cs-dark toogle-expert" style="display:none;">Load Less</button>
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

                            <?php if( get_sub_field('livestock_auctioneers_email') ): ?>
                            <li>
                            <i class="fa-regular fa-envelope"></i>
                            <a href="mailto:<?php the_sub_field('livestock_auctioneers_email'); ?>"><?php the_sub_field('livestock_auctioneers_email'); ?></a>
                            </li>
                            <?php endif; ?>
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
    <!-- Livestock Auctioneers mobile ends here -->

     
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
                        $market_contact_button = get_sub_field('kington_livestock_market_button');
                        if( $market_contact_button ): 
                            $market_contact_button_url = $market_contact_button['url'];
                            $market_contact_button_title = $market_contact_button['title'];
                            $market_contact_button_target = $market_contact_button['target'] ? $market_contact_button['target'] : '_self';
                            ?>
                            <a class="btn-cs-dark" href="<?php echo esc_url( $market_contact_button_url ); ?>" target="<?php echo esc_attr( $market_contact_button_target ); ?>"><?php echo esc_html( $market_contact_button_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
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