<?php
/**
 * Archive Template for Sales Dates with Filters
 */
get_header();
?>



<?php
// Define default background image
$background_image = 'https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/12/shutterstock_2157695963-scaled.jpg';

// Check for the 'filter_show_type' parameter in the URL
if (isset($_GET['filter_show_type'])) {
    $filter_show_type = sanitize_text_field($_GET['filter_show_type']);

    // Set different background images based on the query parameter value
    if ($filter_show_type === 'fine-art-antiques') {
        $background_image = 'https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/12/494.jpg';
    } elseif ($filter_show_type === 'equine') {
        $background_image = 'https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/12/shutterstock_2157695963-min-scaled.jpg';
    }
}
?>

<!-- Section with dynamic background image -->

<section class="inner-banner-wrapper" style="background-image: url('<?php echo esc_url($background_image); ?>');">
        <div class="container">
            <div class="content">
            <div class="breadcrumb"><?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?></div>
            <h1>Sales Dates</h1>
            <p>See below for forthcoming sales</p>
            </div>
        </div>
     </section>


<section class="archive-filter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="filter-content">

    <form method="GET" action="<?php echo get_post_type_archive_link('sales_date'); ?>" class="sales-filter filter-form">
        <select name="sale_type">
            <option value="">All Sale Types</option>
            <?php
            $terms = get_terms(array('taxonomy' => 'sale_type', 'hide_empty' => false));
            foreach ($terms as $term) {
                $selected = ($_GET['sale_type'] ?? '') === $term->slug ? 'selected' : '';
                echo "<option value='{$term->slug}' $selected>{$term->name}</option>";
            }
            ?>
        </select>

        <select name="sale_month">
            <option value="">All Months</option>
            <?php
            for ($m = 1; $m <= 12; $m++) {
                $month = str_pad($m, 2, '0', STR_PAD_LEFT);
                $selected = ($_GET['sale_month'] ?? '') === $month ? 'selected' : '';
                echo "<option value='$month' $selected>" . date('F', mktime(0, 0, 0, $m, 10)) . "</option>";
            }
            ?>
        </select>

        <button type="submit">Filter</button>
    </form>


        </div>
        </div>
        </div>
        </div>
</section>

    <!-- Sales Dates Loop -->
         <section class="show-dates archive-tem">
        
        <div class="container">
     
            <div class="row g-0">
                <div class="col-12">
    <div class="sales-list">
        <?php
        $args = array(
            'post_type' => 'sales_dates',
            'posts_per_page' => -1,
        );

        // Filter: Sale Type
        if (!empty($_GET['sale_type'])) {
            $args['tax_query'] = array(array(
                'taxonomy' => 'sale_type',
                'field' => 'slug',
                'terms' => sanitize_text_field($_GET['sale_type']),
            ));
        }

        // Filter: Month
        if (!empty($_GET['sale_month'])) {
            $month = $_GET['sale_month'];
            $args['meta_query'][] = array(
                'key' => 'sale_start_date',
                'value' => '-' . $month . '-',
                'compare' => 'LIKE'
            );
        }

        $sales_query = new WP_Query($args);

        if ($sales_query->have_posts()) :
            while ($sales_query->have_posts()) : $sales_query->the_post(); ?>
   <div class="show-dates-content">
                <div class="sale-item">
                    <h2><?php the_title(); ?></h2>
                    <p><strong>Sale Name:</strong> <?php the_field('sale_name'); ?></p>
                    <p><strong>Date:</strong>
                        <?php the_field('sale_start_date'); ?>
                        to
                        <?php the_field('sale_end_date'); ?>
                    </p>
                    <p><strong>Location:</strong> <?php the_field('sale_location'); ?></p>
                    <div><?php the_field('sale_additional_info'); ?></div>

                    <?php if (have_rows('attachments')): ?>
                        <div class="attachments">
                            <?php while (have_rows('attachments')): the_row();
                                $name = get_sub_field('attachment_name');
                                $file = get_sub_field('attachment_file');
                                if ($file): ?>
                                    <a class="btn" href="<?php echo esc_url($file['url']); ?>" target="_blank">
                                        <?php echo esc_html($name); ?>
                                    </a>
                                <?php endif;
                            endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
 </div>
            <?php endwhile;

// Pagination
                echo '<div class="pagination">';
                echo paginate_links(array(
                    'total' => $sales_query->max_num_pages,
                ));
                echo '</div>';
                echo '</div>';
                else :
                echo '<p>No results found for your filters.</p>';
                endif;
            wp_reset_postdata();
        ?>
</div>
    </div>
    </div>
    </div>
</section>

<?php get_footer();?>