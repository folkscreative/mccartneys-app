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
            <form class="inner property-search property-search--hero" action="/property-search/" method="get"
                role="form">
                <div class="search-form-control search-form--radio-toggle">
                    <input type="radio" id="_parent_department_sales" name="_parent_department" value="Sales" checked>
                    <label for="_parent_department_sales">BUY</label>
                    <input type="radio" id="_parent_department_lettings" name="_parent_department" value="Lettings">
                    <label for="_parent_department_lettings">RENT</label>
                </div>
                <div class="search-form-control search-form--location">
                    <input type="text" placeholder="Location" name="address_keyword" id="address_keyword">
                </div>
                <div class="search-form-control search-form-control--dropdown search-form--radius">
                    <div class="search-form-dropdown">
                        <div class="search-form-dropdown--trigger">Search Radius</div>
                        <div class="search-form-dropdown--options">
                            <label class="search-form-dropdown--option selected">
                                <input type="radio" name="radius" value="" checked>
                                <span>+ 0 miles</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="radius" value="0.25">
                                <span>+ 1/4 miles</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="radius" value="1">
                                <span>+ 1 miles</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="radius" value="3">
                                <span>+ 3 miles</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="radius" value="5">
                                <span>+ 5 miles</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="radius" value="10">
                                <span>+ 10 miles</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="radius" value="20">
                                <span>+ 20 miles</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="radius" value="30">
                                <span>+ 30 miles</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="radius" value="40">
                                <span>+ 40 miles</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Sales Pricing - Slider -->
                <div class="search-form-control search-form-control--dropdown search-form--price-slider sales-only">
                    <div class="search-form-dropdown">
                        <div class="search-form-dropdown--trigger">Price</div>
                        <div class="search-form-dropdown--options">
                            <div class="range-slider">
                                <input type="range" id="minPrice" name="minimum_price" min="0" max="1000000"
                                    value="300000" step="1000">
                                <input type="range" id="maxPrice" name="maximum_price" min="400000" max="10000000"
                                    value="10000000" step="50000">
                                <!-- <div class="slider-track"></div> -->
                                <div class="range-values">
                                    <span id="minValue">£100,000</span>
                                    <span id="maxValue">£10,000,000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sales Pricing -->
                <!-- <div class="search-form-control search-form-control--dropdown search-form--price sales-only">
                    <div class="search-form-dropdown">
                        <div class="search-form-dropdown--trigger">Price</div>
                        <div class="search-form-dropdown--options">
                            <label class="search-form-dropdown--option selected">
                                <input type="radio" name="maximum_price" value="" checked>
                                <span>No Preference</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_price" value="50000">
                                <span>£50,000</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_price" value="60000">
                                <span>£60,000</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_price" value="70000">
                                <span>£70,000</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_price" value="80000">
                                <span>£80,000</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_price" value="90000">
                                <span>£90,000</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_price" value="100000">
                                <span>£100,000</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_price" value="110000">
                                <span>£110,000</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_price" value="120000">
                                <span>£120,000</span>
                            </label>
                        </div>
                    </div>
                </div> -->
                <!-- Rental Pricing -->
                <!-- <div class="search-form-control search-form-control--dropdown search-form--rent lettings-only">
                    <div class="search-form-dropdown">
                        <div class="search-form-dropdown--trigger">Price</div>
                        <div class="search-form-dropdown--options">
                            <label class="search-form-dropdown--option selected">
                                <input type="radio" name="maximum_rent" value="" checked>
                                <span>No Preference</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_rent" value="50000">
                                <span>£1,000 pcm</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_rent" value="60000">
                                <span>£1,500 pcm</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_rent" value="70000">
                                <span>£2,000 pcm</span>
                            </label>
                        </div>
                    </div>
                </div> -->


                <div class="search-form-control search-form-control--checkboxes search-form--type">
                    <div class="search-form-dropdown">
                        <div class="search-form-dropdown--trigger">Property Type</div>
                        <div class="search-form-dropdown--options">
                            <label class="search-form-checkboxes--option">
                                <input type="checkbox" name="property_type" checked value="">
                                <span class="search-form-checkboxes--checkbox-label"></span>
                                Show All
                            </label>
                            <label class="search-form-checkboxes--option">
                                <input type="checkbox" name="property_type" value="69">
                                <span class="search-form-checkboxes--checkbox-label"></span>
                                Bungalow
                            </label>
                            <label class="search-form-checkboxes--option">
                                <input type="checkbox" name="property_type" value="61">
                                <span class="search-form-checkboxes--checkbox-label"></span>
                                Detached
                            </label>
                            <hr>
                            <label class="search-form-checkboxes--option">
                                <input type="checkbox" name="property_type" value="62">
                                <span class="search-form-checkboxes--checkbox-label"></span>
                                Semi-detached
                            </label>
                            <label class="search-form-checkboxes--option">
                                <input type="checkbox" name="property_type" value="63">
                                <span class="search-form-checkboxes--checkbox-label"></span>
                                Terraced
                            </label>
                            <label class="search-form-checkboxes--option">
                                <input type="checkbox" name="property_type" value="74">
                                <span class="search-form-checkboxes--checkbox-label"></span>
                                Flat/Apartment
                            </label>
                            <hr>
                            <label class="search-form-checkboxes--option">
                                <input type="checkbox" name="property_type" value="93">
                                <span class="search-form-checkboxes--checkbox-label"></span>
                                Farms
                            </label>
                            <label class="search-form-checkboxes--option">
                                <input type="checkbox" name="property_type" value="83">
                                <span class="search-form-checkboxes--checkbox-label"></span>
                                Commercial
                            </label>
                        </div>
                    </div>
                </div>
                <input type="submit" value="search" class="search-form-control search-form-control--submit">
            </form>
        </div>
    </section>
    <!-- filter ends -->
    <!-- Departments -->
    <section class="departments global">
        <div class="container">
            <div class="content">
                <h2><?php the_field('mccartneys_department_title'); ?></h2>
                <p><?php the_field('mccartneys_department_description'); ?></p>
            </div>
            <?php if( have_rows('our_departments_slider', 'option') ): ?>
            <div class="depart-slider depar">
                <?php while( have_rows('our_departments_slider', 'option') ): the_row(); ?>
                <div class="slide-wrap">
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


    <!-- recent property section start here -->
    <section class="recent-property-wrapper">
        <div class="container">
            <?php echo do_shortcode('[recent_properties]'); ?>
            <?php echo do_shortcode('[recent_property_tabs]'); ?>
            <a href="#" class="btn-cs-dark">View all properties</a>
        </div>
    </section>
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

    <!-- Showcase numbers -->
    <section class="showcase-numbers">
        <div class="container">
            <div class="row g-0">
                <div class="col-12">
                    <div class="box-title">
                        <h2><?php the_field('showcase_title'); ?></h2>
                    </div>
                    <p class="description d-none d-md-block"><?php the_field('showcase_description');?></p>
                </div>
            </div>
            <div class="numbers-wrap">
                <?php if( have_rows('numbers_repeater_showcase') ): ?>
                <div class="row g-4">
                    <?php while( have_rows('numbers_repeater_showcase') ): the_row(); ?>
                    <div class="col-12 col-md-6">
                        <div class="items-wrap">
                            <?php
                        $showcase_logo = get_sub_field('showcase_number_image');
                        if( !empty($showcase_logo) ):?>
                            <img src="<?php echo $showcase_logo['url']; ?>" alt="<?php echo $showcase_logo['alt']; ?>"
                                class="w-100">
                            <?php endif; ?>
                            <div class="col-right">
                                <h2><?php the_sub_field('showcase_number_title'); ?></h2>
                                <span><?php the_sub_field('showcase_number_tagline'); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Showcase numbers ends -->

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
                        <a href="<?php the_permalink(); ?>" class="btn-cs-light">Read more <span><i
                                    class="fa-solid fa-angle-right"></i></span></a>
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