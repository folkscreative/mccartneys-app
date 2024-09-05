<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mccartneys
 */

get_header();
?>

<section class="insight-content">
        <div class="container">
            <div class="content">
            <div class="breadcrumb mc"><?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?></div>
                <h1>Blog</h1>
                <p>We share our team's expertise across McCartneys' fields, including properties, livestock, fine art and antiques, and more.</p>
            </div>
 </section>

<div class="post-boxes">
<div class="container">
    
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
            $cat_paged = (isset($_GET['paged_' . $cat_slug])) ? absint($_GET['paged_' . $cat_slug]) : 1;
            echo '<div class="tab-pane fade" id="' . $cat_slug . '" role="tabpanel" aria-labelledby="' . $cat_slug . '-tab">';
            echo '<div class="row">';
            $cat_posts = new WP_Query(array(
                'cat' => $cat_id,
                'posts_per_page' => 6,
                'paged' => $cat_paged
            ));
            if ($cat_posts->have_posts()) {
                while ($cat_posts->have_posts()) {
                    $cat_posts->the_post();
                    get_template_part('template-parts/content', 'custom');
                }
            }
            echo '</div>';
            echo '<div class="pagination-container">';
            echo paginate_links(array(
                'total' => $cat_posts->max_num_pages,
                'prev_text' => __('<span><i class="fa-solid fa-angle-left"></i></span> Back'),
                'next_text' => __('Next <span><i class="fa-solid fa-angle-right"></i></span>'),
                'mid_size' => 2,
                'end_size' => 1,
                'current' => $cat_paged,
                'add_args' => array('paged_' . $cat_slug => '%#%'),
                'format' => '?paged_' . $cat_slug . '=%#%',
            ));
            echo '</div>';
            echo '</div>';
            wp_reset_postdata();
        }
        ?>
    </div>
	<?php
get_footer();
