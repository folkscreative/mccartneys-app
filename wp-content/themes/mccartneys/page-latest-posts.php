<?php
/*
Template Name: Latest Posts by Category
*/
get_header(); ?>


<section class="insight-content">
        <div class="container">
            <div class="content">
            <div class="breadcrumb mc"><?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?></div>
                <h1>McCartneys Insights</h1>
                <p>We share our team's expertise across McCartneys' fields, including properties, livestock, fine art and antiques, and more.</p>
            </div>
        
    
     <?php
global $post;
$current_post_id = $post->ID;
// The query to get the specific post
$query = new WP_Query(array(
    'posts_per_page' => 1, 
    'order' => 'DESC' )); 
if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post(); ?>
        <div class="post d-none d-md-flex">
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <a class="btn-transparent" href="<?php the_permalink(); ?>">Link</a>
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>
            <div class="post-content">
                <div class="category-date">
                    <div class="ca-post-badge">
                        <?php $category = get_the_category(); echo $category[0]->cat_name; ?>
                    </div>
                    <div class="date">
                        <?php echo get_the_date('M d, Y'); ?>
                    </div>
                </div>
                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                <div class="contex"><?php the_content(); ?></div>
                <p class="author"><?php the_author(); ?></p>
            </div>
        </div>
    <?php endwhile;
endif;

// Reset Post Data
wp_reset_postdata();?>
</div>
 </section>

<div class="post-boxes">
<div class="container">
    <div class="category-nav">
    <h2>Latest Articles</h2>

    <!-- Tabs navigation -->
    <ul class="nav nav-tabs" id="categoryTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
        </li>
        <?php
        $categories = get_categories();
        foreach ($categories as $category) {
            echo '<li class="nav-item" role="presentation">';
            echo '<button class="nav-link" id="' . $category->slug . '-tab" data-bs-toggle="tab" data-bs-target="#' . $category->slug . '" type="button" role="tab" aria-controls="' . $category->slug . '" aria-selected="false">' . $category->name . '</button>';
            echo '</li>';
        }
        ?>
    </ul>
    </div>
    
    
    <div class="tab-content" id="categoryTabsContent">
        <!-- All Posts Tab -->
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="row g-3">
                <?php
                $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
                $all_posts = new WP_Query(array(
                    'posts_per_page' => 6,
                    'paged' => $paged,
                ));
                if ($all_posts->have_posts()) {
                    while ($all_posts->have_posts()) {
                        $all_posts->the_post();
                        get_template_part('template-parts/content', 'custom');
                    }
                }
                ?>
            </div>
            <div class="pagination-container">
                <?php
                 echo paginate_links(array(
                    'total' => $all_posts->max_num_pages,
                    'prev_text' => __('<span><i class="fa-solid fa-angle-left"></i></span> Back'),
                    'next_text' => __('Next <span><i class="fa-solid fa-angle-right"></i></span>'),
                    'mid_size' => 2,
                    'end_size' => 1,
                    'current' => $paged,
                ));
                ?>
            </div>
        </div>
        <?php
foreach ($categories as $category) {
    $cat_slug = $category->slug;
    $cat_id = $category->term_id;
    
    // Retrieve the current page number for each category
    $cat_paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
    
    echo '<div class="tab-pane fade" id="' . $cat_slug . '" role="tabpanel" aria-labelledby="' . $cat_slug . '-tab">';
    echo '<div class="row">';

    // WP Query for each category
    $cat_posts = new WP_Query(array(
        'cat' => $cat_id,
        'posts_per_page' => 6,
        'paged' => $cat_paged,
    ));
    
    if ($cat_posts->have_posts()) {
        while ($cat_posts->have_posts()) {
            $cat_posts->the_post();
            get_template_part('template-parts/content', 'custom');
        }
    } else {
        echo '<p>No posts found in this category.</p>';
    }

    echo '</div>'; // End of row

    // Pagination for category
    echo '<div class="pagination-container">';
    echo paginate_links(array(
        'total' => $cat_posts->max_num_pages,
        'prev_text' => __('<span><i class="fa-solid fa-angle-left"></i></span> Back'),
        'next_text' => __('Next <span><i class="fa-solid fa-angle-right"></i></span>'),
        'mid_size' => 2,
        'end_size' => 1,
        'current' => $cat_paged,
        'format' => '?paged=%#%', // Standard pagination format
        'add_args' => array('tab' => $cat_slug), // Add tab parameter to pagination links
    ));
    echo '</div>'; // End of pagination container

    echo '</div>'; // End of tab-pane
    wp_reset_postdata();
}
?>

    </div>
</div>
</div>
<?php get_footer(); ?>




<script>
    // Preserve the active tab on page reload
$(function () {
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('#categoryTabs a[href="' + activeTab + '"]').tab('show');
    }

    // Save the active tab in local storage
    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        var href = $(e.target).attr('href');
        localStorage.setItem('activeTab', href);
    });
});
</script>