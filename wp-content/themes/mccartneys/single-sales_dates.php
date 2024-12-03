<?php
/**
 * Single Template for Sales Dates
 */
get_header();
?>

<div class="container">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>

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

            <div class="additional-info">
                <h2>Additional Information</h2>
                <p><?php echo nl2br(esc_html(get_post_meta(get_the_ID(), 'additional_info', true))); ?></p>
            </div>

            <p>
                <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'enter_now', true)); ?>" class="button">Enter Now</a>
            </p>
            <p>
                <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'download_url', true)); ?>" class="button">Download</a>
            </p>
        </article>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
