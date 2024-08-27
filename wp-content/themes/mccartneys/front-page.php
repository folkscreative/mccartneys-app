<?php get_header();?>
<main class="home page-wrap">
    <!-- Banner -->
    <section class="banner">
        <div class="container">
            <div class="row g-0 align-items-center">
                <div class="col-12 col-lg-5">
                    <div class="col-left">
                        <?php if( get_field('banner_main_title') ): ?>
                        <h1><?php the_field('banner_main_title'); ?></h1>
                        <?php endif; ?>
                        <?php if( get_field('banner_description') ): ?>
                        <p><?php the_field('banner_description'); ?></p>
                        <?php endif; ?>
                        <?php 
                        $link = get_field('home_banner_button');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                        <a class="btn-bn-light" href="<?php echo esc_url( $link_url ); ?>"
                            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><span><i
                                    class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="col-right">
                        <?php 
                $banner_img = get_field('main_banner_image');
                if( !empty($banner_img) ): ?>
                        <img src="<?php echo $banner_img['url']; ?>" alt="<?php echo $banner_img['alt']; ?>" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner ends -->

    <!-- filter ends -->
    <section class="home-filter-cs">
        <div class="container">
            <?php echo do_shortcode('[property_search]'); ?>
        </div>
    </section>
    <!-- filter ends -->
    <!-- Departments -->
    <section class="departments global">
        <div class="container">
            <div class="content">
                <h2><?php the_field('mccartneys_department_title'); ?>
                </h2>
                <p><?php the_field('mccartneys_department_description'); ?></p>
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
                        <a class="btn-transparent" href="<?php echo esc_url( $department_cartneys_slider_link_url ); ?>"
                            target="<?php echo esc_attr( $department_cartneys_slider_link_target ); ?>">sdfsd</a>
                        <?php endif; ?>
                    <?php
                $department_slider_bg_image = get_sub_field('our_departments_thumbnail', 'option');
                if( !empty($department_slider_bg_image) ):?>
                    <img src="<?php echo $department_slider_bg_image['url']; ?>"
                        alt="<?php echo $department_slider_bg_image['alt']; ?>">
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
                        <a class="btn-cs-light" href="<?php echo esc_url( $department_cartneys_slider_link_url ); ?>"
                            target="<?php echo esc_attr( $department_cartneys_slider_link_target ); ?>"><?php echo esc_html( $department_cartneys_slider_link_title ); ?><span><i
                                    class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- Departments ends -->

    <!-- Start Property section here -->
    <section class="property-wrapper">
        <div class="container">
            <h2 class="title"><?php the_field('our_locatinos_title'); ?></h2>
            <p class="description"><?php the_field('our_location_description'); ?></p>
            <?php echo do_shortcode('[property_tabs]'); ?>
        </div>
    </section>
    <!-- End Property section here -->


        <!-- Start Property section here -->
        <section class="property-wrapper">
        <div class="container">
            <h2 class="title"><?php the_field('our_locatinos_title'); ?></h2>
            <p class="description"><?php the_field('our_location_description'); ?></p>
            <?php echo do_shortcode('[property_mobile_tabs]'); ?>
        </div>
    </section>
    <!-- End Property section here -->


    <!-- recent property section start here -->
    <?php if( have_rows('blocks') ): ?>
    <?php while( have_rows('blocks') ): the_row(); ?>
    <?php if( get_row_layout() == 'recent_property_section' ): ?>
    <section class="recent-property-wrapper">
        <div class="container">

            <div class="outer-wrapper">
                <h2 class="title"><?php the_sub_field('recent_property_title'); ?></h2>
                <ul class="nav nav-tabs" id="propertyTab" role="tablist">
                    <li class="nav-item" role="presentation"><a class="nav-link active" id="tab-auction"
                            data-bs-toggle="tab" href="#auction" role="tab" aria-controls="auction"
                            aria-selected="true">Auction</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="tab-sale" data-bs-toggle="tab"
                            href="#sale" role="tab" aria-controls="sale" aria-selected="false" tabindex="-1">Sale</a>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="tab-rent" data-bs-toggle="tab"
                            href="#rent" role="tab" aria-controls="rent" aria-selected="false" tabindex="-1">Rent</a>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="tab-new-homes" data-bs-toggle="tab"
                            href="#new-homes" role="tab" aria-controls="new-homes" aria-selected="false"
                            tabindex="-1">New Homes</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="propertyTabContent">
                <div class="tab-pane fade show active" id="auction" role="tabpanel" aria-labelledby="tab-auction">
                    <div class="inner-tabs pr">
                        <?php echo do_shortcode('[recent_properties department="property-land-auctions"]');?>
                    </div>
                    <a class="btn-cs-dark"
                        href="<?php echo apply_filters( 'propertyhive_search_form_action', get_post_type_archive_link( 'property' ) ); ?>?department=property-land-auctions">View
                        all properties</a>
                </div>
                <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="tab-sale">
                    <div class="inner-tabs pr">
                        <?php echo do_shortcode('[recent_properties department="residential-sales"]');?>
                    </div>
                    <a class="btn-cs-dark"
                        href="<?php echo apply_filters( 'propertyhive_search_form_action', get_post_type_archive_link( 'property' ) ); ?>?department=residential-sales">View
                        all properties</a>
                </div>
                <div class="tab-pane fade" id="rent" role="tabpanel" aria-labelledby="tab-rent">
                    <div class="inner-tabs pr">
                        <?php echo do_shortcode('[recent_properties _parent_department="Lettings"]');?>
                    </div>
                    <a class="btn-cs-dark"
                        href="<?php echo apply_filters( 'propertyhive_search_form_action', get_post_type_archive_link( 'property' ) ); ?>?_parent_department=Lettings">View
                        all properties</a>
                </div>
                <div class="tab-pane fade" id="new-homes" role="tabpanel" aria-labelledby="tab-new-homes">
                    <div class="inner-tabs pr">
                        <?php echo do_shortcode('[recent_properties department="new-homes"]');?>
                    </div>
                    <a class="btn-cs-dark"
                        href="<?php echo apply_filters( 'propertyhive_search_form_action', get_post_type_archive_link( 'property' ) ); ?>?department=new-homes">View
                        all properties</a>
                </div>

            </div>
            <!-- <?php 
            $recent_pr_button = get_sub_field('recent_property_button');
            if( $recent_pr_button ): 
                $recent_pr_button_url = $recent_pr_button['url'];
                $recent_pr_button_title = $recent_pr_button['title'];
                $recent_pr_button_target = $recent_pr_button['target'] ? $recent_pr_button['target'] : '_self';
                ?>
            <a class="btn-cs-dark" href="<?php echo esc_url( $recent_pr_button_url ); ?>"
                target="<?php echo esc_attr( $recent_pr_button_target ); ?>"><?php echo esc_html( $recent_pr_button_title ); ?></a>
            <?php endif; ?> -->
        </div>
    </section>
    <?php endif; ?>
    <?php endwhile; ?>
    <?php endif; ?>
    <!-- recent property section ends here -->

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="testimonial-box">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/icon-apostrophe.png" alt="">
            </div>
            <?php if( get_field('home_testimonial_title') ): ?>
            <h2 class="title"><?php the_field('home_testimonial_title'); ?></h2>
            <?php endif; ?>

            <?php if( have_rows('home_testimonial_slider') ): ?>
            <div class="testimonial-slider wrapper">
                <?php while( have_rows('home_testimonial_slider') ): the_row(); ?>
                <div class="item">
                    <?php
                $rating_img = get_sub_field('testimonial_rating_image');
                if( !empty($rating_img) ):?>
                    <img src="<?php echo $rating_img['url']; ?>" alt="<?php echo $rating_img['alt']; ?>">
                    <?php endif; ?>
                    <p><?php the_sub_field('home_testimonial_description'); ?></p>
                    <div class="inner-box">
                        <?php
                $author_img = get_sub_field('home_testimonial_author_image');
                if( !empty($author_img) ):?>
                        <img src="<?php echo $author_img['url']; ?>" alt="<?php echo $author_img['alt']; ?>">
                        <?php endif; ?>
                        <div class="position">
                            <h4><?php the_sub_field('home_testimonial_author_title'); ?></h4>
                            <span><?php the_sub_field('home_testimonial_author_designation');?></span>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- Testimonials ends -->

    <!-- Cta banner -->
    <section class="cta-banner">
        <div class="container">
            <?php
            $cta_box_bg = get_field('cta_home_background_image');
            if( !empty($cta_box_bg) ):?>
            <div class="row g-0 align-items-center" style="background-image: url(<?php echo $cta_box_bg['url']; ?>);">
                <?php endif; ?>
                <div class="col-12 col-md-5">
                    <div class="col-left">
                        <h2><?php the_field('cta_box_title');?></h2>
                        <p><?php the_field('cta_box_description'); ?></p>
                        <?php 
                        $cta_box_link = get_field('cta_box_button');
                        if( $cta_box_link ): 
                            $cta_box_link_url = $cta_box_link['url'];
                            $cta_box_link_title = $cta_box_link['title'];
                            $cta_box_link_target = $cta_box_link['target'] ? $cta_box_link['target'] : '_self';
                            ?>
                        <a class="btn-bn-light" href="<?php echo esc_url( $cta_box_link_url ); ?>"
                            target="<?php echo esc_attr( $cta_box_link_target ); ?>"><?php echo esc_html( $cta_box_link_title ); ?><span><i
                                    class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="col-right">
                        <?php
                    $cta_box_img = get_field('cta_box_image');
                    if( !empty($cta_box_img) ):?>
                        <img src="<?php echo $cta_box_img['url']; ?>" alt="<?php echo $cta_box_img['alt']; ?>"
                            class="w-100">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cta banner ends -->

    <!-- Fine country -->
    <section class="fine-country">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-12 col-md-6">
                    <?php
                        $fine_title_img = get_field('fine_title_image');
                        if( !empty($fine_title_img) ):?>
                    <img src="<?php echo $fine_title_img['url']; ?>" alt="<?php echo $fine_title_img['alt']; ?>"
                        class="title-img d-block d-md-none">
                    <?php endif; ?>
                    <?php
                    $fine_col_left_img = get_field('fine_country_image');
                    if( !empty($fine_col_left_img) ):?>
                    <img src="<?php echo $fine_col_left_img['url']; ?>" alt="<?php echo $fine_col_left_img['alt']; ?>"
                        class="w-100">
                    <?php endif; ?>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-end">
                    <div class="col-right">
                        <?php
                        $fine_title_img = get_field('fine_title_image');
                        if( !empty($fine_title_img) ):?>
                        <img src="<?php echo $fine_title_img['url']; ?>" alt="<?php echo $fine_title_img['alt']; ?>"
                            class="w-100 d-none d-md-block">
                        <?php endif; ?>
                        <p><?php the_field('fine_country_description');?></p>
                        <?php 
                        $fine_button = get_field('fine_country_button');
                        if( $fine_button ): 
                            $fine_button_url = $fine_button['url'];
                            $fine_button_title = $fine_button['title'];
                            $fine_button_target = $fine_button['target'] ? $fine_button['target'] : '_self';
                            ?>
                        <a class="btn-cs-dark" href="<?php echo esc_url( $fine_button_url ); ?>"
                            target="<?php echo esc_attr( $fine_button_target ); ?>"><?php echo esc_html( $fine_button_title ); ?><span><i
                                    class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fine country ends -->


</main>
<?php get_footer();?>