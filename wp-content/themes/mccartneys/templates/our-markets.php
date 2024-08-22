<?php

/**
 * Template Name: Our Markets
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
   <!-- our-marketers section start here -->
   <?php if( get_row_layout() == 'livestock_market_tabs' ): ?>
   <section class="our-marketers-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <?php if( have_rows('marketer_tab_detail') ): ?>
            <div class="our-marketers-wrapper-content">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <?php 
                    $tab_index = 0;
                    while( have_rows('marketer_tab_detail') ) : the_row(); 
                        $tab_title = get_sub_field('marketer_label');
                        $tab_id = sanitize_title($tab_title); // Create a unique ID based on the tab title
                    ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?php echo $tab_index === 0 ? 'active' : ''; ?>" 
                                    id="pills-<?php echo $tab_id; ?>-tab" 
                                    data-bs-toggle="pill" 
                                    data-bs-target="#pills-<?php echo $tab_id; ?>" 
                                    type="button" 
                                    role="tab" 
                                    aria-controls="pills-<?php echo $tab_id; ?>" 
                                    aria-selected="<?php echo $tab_index === 0 ? 'true' : 'false'; ?>">
                                <?php echo $tab_title; ?>
                            </button>
                                </li>
                            <?php $tab_index++; endwhile; ?>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <?php 
                            $tab_index = 0;
                            while( have_rows('marketer_tab_detail') ) : the_row(); 
                                $tab_title = get_sub_field('marketer_label');
                                $tab_content = get_sub_field('marketer_content');
                                $tab_id = sanitize_title($tab_title);
                            ?>
                                <div class="tab-pane fade <?php echo $tab_index === 0 ? 'show active' : ''; ?>" 
                                    id="pills-<?php echo $tab_id; ?>" 
                                    role="tabpanel" 
                                    aria-labelledby="pills-<?php echo $tab_id; ?>-tab" 
                                    tabindex="0">
                                    <?php echo $tab_content; ?>
                                </div>
                            <?php $tab_index++; endwhile; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- show dates section ends here -->
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