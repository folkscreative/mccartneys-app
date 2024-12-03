<?php
/**
 * Archive Template for Sales Dates with Filters
 */
get_header();
?>

<!-- <main class="pedigree-sales page-wrap">  -->
    <!-- Inner Banner -->
    <?php //if( have_rows('blocks') ): ?>
        <?php //while( have_rows('blocks') ): the_row(); ?>
        <?php //if( get_row_layout() == 'livestock_banner' ): ?>
           <?php
            //$image_private = get_sub_field( 'livestock_background_image' );
//if ( !empty( $image_private ) ) { ?>
    <!-- <section class="inner-banner-wrapper" style="background-image:url('<?php //echo $image_private['url']; ?>');"> -->
<?php// }?>
        <!-- <div class="container">
            <div class="content">
            <div class="breadcrumb"><?php //if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?></div>
            <h1><?php //the_sub_field('livestock_banner_title'); ?></h1>
            <p><?php //the_sub_field('livestock_banner_content'); ?></p>
            </div>
        </div> -->
     <!-- </section> -->
    <!-- Inner Bnner ends -->
    <?php //endif; ?>
   

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

    $filtered_query = new WP_Query($args);

    if ($filtered_query->have_posts()) :?>
       
    <section class="show-dates">
        <div class="container">
            <div class="row g-0">
                <div class="col-12">
                <?php while ($filtered_query->have_posts()) : $filtered_query->the_post(); ?>
  
                            <div class="show-dates-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><strong>Show Date:</strong> <?php echo get_post_meta(get_the_ID(), 'show_date', true); ?></p>
                                <p><strong>Location:</strong> <?php echo get_post_meta(get_the_ID(), 'location', true); ?></p>
                                <?php
                                $show_types = get_the_terms(get_the_ID(), 'show_type');
                                if ($show_types && !is_wp_error($show_types)) {
                                    echo '<p><strong>Show Type:</strong> ';
                                    $show_type_names = array();
                                    foreach ($show_types as $type) {
                                        $show_type_names[] = esc_html($type->name);
                                    }
                                    echo implode(', ', $show_type_names);
                                    echo '</p>';
                                }
                                ?>

                    <p><?php echo nl2br(esc_html(get_post_meta(get_the_ID(), 'additional_info', true))); ?></p>
                    <p>
                <a class="btn-cs-dark" href="<?php echo esc_url(get_post_meta(get_the_ID(), 'enter_now', true)); ?>" class="button">Enter Now</a>
            </p>
            <p>
                <a class="btn-sale" href="<?php echo esc_url(get_post_meta(get_the_ID(), 'download_url', true)); ?>" class="button">Download</a>
            </p>
                                      
            </div>
                        <?php endwhile; ?>

                       <?php // Pagination
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
    <?php endif; ?>



<?php get_footer();?>