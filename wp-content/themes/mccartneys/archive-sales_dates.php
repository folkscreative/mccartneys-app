<?php
/**
 * Archive Template for Sales Dates with Filters
 */
get_header();
?>

<section class="inner-banner-wrapper" style="background-image:url('https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/07/show-dates-banner-1.jpg');">
        <div class="container">
            <div class="content">
            <div class="breadcrumb"><nav aria-label="breadcrumbs" class="rank-math-breadcrumb"><p><a href="https://wordpress-1285863-4695980.cloudwaysapps.com">Home</a><span class="separator"> - </span><a href="https://wordpress-1285863-4695980.cloudwaysapps.com/livestock-services/">Livestock Services</a><span class="separator"> - </span><span class="last">Sales Dates</span></p></nav></div>
            <h1>Sales Dates</h1>
            <p></p><p>Each year McCartneys attends agricultural and livestock shows across the country, in an opportunity to meet new and old faces and provide direction on how McCartneys can help you.</p>
<p></p>
            </div>
        </div>
     </section>


<section class="archive-filter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="filter-content">
     <!-- Filter Form -->
    <form method="GET" action="" class="filter-form">
        <!-- Filter by Date -->
        <label for="filter_date">Show Date:</label>
        <input type="date" name="filter_date" id="filter_date" value="<?php echo isset($_GET['filter_date']) ? esc_attr($_GET['filter_date']) : ''; ?>">

        <!-- Filter by Show Type -->
        <label for="filter_show_type">Show Type:</label>
        <select name="filter_show_type" id="filter_show_type">
            <option value="">All Show Types</option>
            <?php
            $show_types = get_terms(array(
                'taxonomy'   => 'show_type',
                'hide_empty' => false,
            ));
            if (!empty($show_types)) {
                foreach ($show_types as $show_type) {
                    $selected = (isset($_GET['filter_show_type']) && $_GET['filter_show_type'] === $show_type->slug) ? 'selected' : '';
                    echo '<option value="' . esc_attr($show_type->slug) . '" ' . $selected . '>' . esc_html($show_type->name) . '</option>';
                }
            }
            ?>
        </select>

        <!-- Filter by Location -->
        <label for="filter_location">Location:</label>
        <input type="text" name="filter_location" id="filter_location" value="<?php echo isset($_GET['filter_location']) ? esc_attr($_GET['filter_location']) : ''; ?>" placeholder="Enter location">

        <!-- Submit Button -->
        <button type="submit">Filter</button>
    </form>

    <!-- Filtered Posts -->
    <?php
    // Modify Query Based on Filters
    $meta_query = array('relation' => 'AND');
    $tax_query  = array();

    // Filter by Date
    if (isset($_GET['filter_date']) && !empty($_GET['filter_date'])) {
        $meta_query[] = array(
            'key'     => 'show_date',
            'value'   => $_GET['filter_date'],
            'compare' => '=',
            'type'    => 'DATE',
        );
    }

    // Filter by Show Type
    if (isset($_GET['filter_show_type']) && !empty($_GET['filter_show_type'])) {
        $tax_query[] = array(
            'taxonomy' => 'show_type',
            'field'    => 'slug',
            'terms'    => $_GET['filter_show_type'],
        );
    }

    // Filter by Location
    if (isset($_GET['filter_location']) && !empty($_GET['filter_location'])) {
        $meta_query[] = array(
            'key'     => 'location',
            'value'   => $_GET['filter_location'],
            'compare' => 'LIKE',
        );
    }

    // Custom Query
    $args = array(
        'post_type'      => 'sales_dates',
        'posts_per_page' => 10,
        'meta_query'     => $meta_query,
        'tax_query'      => $tax_query,
        'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
    );

    $filtered_query = new WP_Query($args);?>
                </div>
            </div>
        </div>
    </div>
</section>
    
       
    <section class="show-dates archive-tem">
        
        <div class="container">
     
            <div class="row g-0">
                <div class="col-12">
                <?php if ($filtered_query->have_posts()) :
                while ($filtered_query->have_posts()) : $filtered_query->the_post(); ?>
  
                <div class="show-dates-content">
                    <h3><?php the_title(); ?></h3>
                <p><?php
                    $show_date = get_post_meta(get_the_ID(), 'show_date', true);
                    if ($show_date) {
                        // Convert the date to the desired format
                        $formatted_date = date('l jS F Y', strtotime($show_date));
                        echo esc_html($formatted_date);
                    } 
                ?></p>
                     <p><?php
                    $end_date = get_post_meta(get_the_ID(), 'end_date', true);
                    if ($end_date) {
                        // Convert the date to the desired format
                        $formatted_date = date('l jS F Y', strtotime($end_date));
                        echo esc_html($formatted_date);
                    } 
                ?></p>
                    <p><?php echo get_post_meta(get_the_ID(), 'location', true); ?></p>
                    

                   <p> <?php echo nl2br(esc_html(get_post_meta(get_the_ID(), 'additional_info', true))); ?></p>

                    <?php
                    // Check and display 'Enter Now' button
                    $enter_now_url = get_post_meta(get_the_ID(), 'enter_now', true);
                    if (!empty($enter_now_url)) : ?>
                        <a class="btn-cs-dark" href="<?php echo esc_url($enter_now_url); ?>" class="button">Enter Now </a>
                    <?php endif; ?>

                    <?php
                    // Check and display 'Download' button
                    $download_url = get_post_meta(get_the_ID(), 'download_url', true);
                    if (!empty($download_url)) : ?>
                        <a class="btn-cs-dark" href="<?php echo esc_url($download_url); ?>" class="button">Download Calendar </a>
                    <?php endif; ?>
                </div>
                    <?php endwhile;

                // Pagination
                echo '<div class="pagination">';
                echo paginate_links(array(
                    'total' => $filtered_query->max_num_pages,
                ));
                echo '</div>';
                echo '</div>';
                else :
                echo '<p>No results found for your filters.</p>';
                endif;

    // Reset post data
    wp_reset_postdata();
    ?>
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


<?php get_footer();?>