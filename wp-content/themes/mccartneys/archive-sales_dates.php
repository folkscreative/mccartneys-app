<?php
/**
 * Archive Template for Sales Dates
 */
get_header();
?>

<div class="container">
    <h1>Sales Dates</h1>

    <?php if (have_posts()) : ?>
        <div class="sales-dates-list">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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

                    <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                </article>
            <?php endwhile; ?>

            <div class="pagination">
                <?php
                // Default pagination
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('&laquo; Previous', 'textdomain'),
                    'next_text' => __('Next &raquo;', 'textdomain'),
                ));
                ?>
            </div>
        </div>
    <?php else : ?>
        <p>No Sales Dates found.</p>
    <?php endif; ?>
</div>



<?php
// Get all terms from 'post_type_category'
$categories = get_terms(array(
    'taxonomy'   => 'post_type_category',
    'hide_empty' => false,
));

// Display filter dropdown
if (!empty($categories)) {
    echo '<form method="get">';
    echo '<select name="post_type_category_filter" onchange="this.form.submit()">';
    echo '<option value="">Filter by Category</option>';
    foreach ($categories as $category) {
        $selected = (isset($_GET['post_type_category_filter']) && $_GET['post_type_category_filter'] === $category->slug) ? 'selected' : '';
        echo '<option value="' . esc_attr($category->slug) . '" ' . $selected . '>' . esc_html($category->name) . '</option>';
    }
    echo '</select>';
    echo '</form>';
}

// Modify the query to filter by the selected category
if (isset($_GET['post_type_category_filter']) && !empty($_GET['post_type_category_filter'])) {
    $query->set('tax_query', array(
        array(
            'taxonomy' => 'post_type_category',
            'field'    => 'slug',
            'terms'    => $_GET['post_type_category_filter'],
        ),
    ));
}
?>

<?php get_footer(); ?>
