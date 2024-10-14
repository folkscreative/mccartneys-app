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
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $all_posts = new WP_Query(array('posts_per_page' => 6, 'paged' => $paged));
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
            
            $posts_per_page = 6;

            // Get the current page number from the URL
            $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

            // Custom WP_Query for your custom post type
            $args = array(
                'post_type' => 'posts',
                'posts_per_page' => $posts_per_page,
                'paged' => $paged,
            );

            $custom_query = new WP_Query($args);

            if ($custom_query->have_posts()) {
                echo '<div class="custom-post-list">';
                
                while ($custom_query->have_posts()) {
                    $custom_query->the_post();
                    
                    // Output your custom post structure here
                    echo '<div class="custom-post-item">';
                    the_title('<h2>', '</h2>');
                    the_excerpt();
                    echo '</div>';
                }
                
                echo '</div>'; // End of custom-post-list
                
                // Pagination Links
                $total_pages = $custom_query->max_num_pages;

                if ($total_pages > 1) {
                    echo '<div class="pagination">';
                    echo paginate_links(array(
                        'current' => $paged,
                        'total' => $total_pages,
                        'prev_text' => __('« Prev'),
                        'next_text' => __('Next »'),
                        'mid_size' => 2,
                    ));
                    echo '</div>';
                }
                
                wp_reset_postdata(); // Reset the post data after custom query
            } else {
                // If no posts are found
                echo '<p>No posts found for this custom post type.</p>';
            }
            ?>

            </div>
        </div>
        


    </div>
</div>
</div>
<?php get_footer(); ?>




