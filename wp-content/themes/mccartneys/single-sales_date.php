<?php
/**
 * Single Template for Sales Dates
 */
get_header();
?>
<div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="sales-date-single">
            <h1><?php the_title(); ?></h1>

            <p><strong>Sale Name:</strong> <?php the_field('sale_name'); ?></p>

            <p><strong>Start Date:</strong> <?php the_field('sale_start_date'); ?></p>
            <p><strong>End Date:</strong> <?php the_field('sale_end_date'); ?></p>

            <p><strong>Location:</strong> <?php the_field('sale_location'); ?></p>

            <div class="additional-info">
                <strong>Additional Information:</strong>
                <?php the_field('sale_additional_info'); ?>
            </div>

            <?php
            $terms = get_the_terms(get_the_ID(), 'sale_type');
            if ($terms && !is_wp_error($terms)) : ?>
                <p><strong>Sale Type:</strong>
                    <?php
                    $sale_types = array();
                    foreach ($terms as $term) {
                        $sale_types[] = esc_html($term->name);
                    }
                    echo implode(', ', $sale_types);
                    ?>
                </p>
            <?php endif; ?>

            <?php if (have_rows('attachments')) : ?>
                <div class="attachments">
                    <h3>Attachments:</h3>
                    <?php while (have_rows('attachments')) : the_row();
                        $name = get_sub_field('attachment_name');
                        $file = get_sub_field('attachment_file');
                        if ($file) : ?>
                            <a class="btn" href="<?php echo esc_url($file['url']); ?>" target="_blank">
                                <?php echo esc_html($name); ?>
                            </a>
                        <?php endif;
                    endwhile; ?>
                </div>
            <?php endif; ?>

        </article>

        <div class="back-link">
            <a href="<?php echo get_post_type_archive_link('sales_date'); ?>">&larr; Back to Sales Dates</a>
        </div>

    <?php endwhile; endif; ?>
</div>



<?php get_footer(); ?>
