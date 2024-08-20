<?php
/**
 * The Template for displaying property archives, also referred to as 'Search Results'
 *
 * Override this template by copying it to yourtheme/propertyhive/archive-property.php
 *
 * @author      PropertyHive
 * @package     PropertyHive/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'propertyhive' ); global $wpdb; ?>

<main class="property-search page-wrap">
    <section class="search-outer">
        <div class="container">
            <?php echo do_shortcode('[property_search]') ?>
        </div>

    </section>
    <section class="results-overview">
        <div class="container results-overview--info">
            <?php echo propertyhive_result_count(); ?>
            <div class="results-sorting">
                <form method="get" class="stc-checkbox">
                    <label><input type="checkbox" value="1" name="include_sold_stc"
                            <?php if (isset($_REQUEST['include_sold_stc'])) { echo ' checked'; } ?>> Include Sold
                        STC?</label>
                </form>
                <?php echo propertyhive_catalog_ordering(); ?>
            </div>

        </div>
    </section>
    <section class="results-options">
        <div class="container results-options--info">
            <div class="breadcrumb">
                <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
            </div>
            <div class="display-options">
                <a href="#" class="view view--list-view active">List View</a>
                <a href="#" class="view view--grid-view">Grid View</a>
            </div>
        </div>
    </section>

    <section class="results">
        <div class="container search-results list-view">
            <?php 
            // Output results. Filter allows us to not display the results whilst maintaining the main query. True by default
            // Used primarily by the Map Search add on - https://wp-property-hive.com/addons/map-search/
            if ( apply_filters( 'propertyhive_show_results', true ) ) : 
        ?>

            <?php if ( have_posts() ) : ?>

            <?php propertyhive_property_loop_start(); ?>

            <?php while ( have_posts() ) : the_post(); ?>

            <?php ph_get_template_part( 'content', 'property' ); ?>

            <?php endwhile; // end of the loop. ?>

            <?php propertyhive_property_loop_end(); ?>

            <?php else: ?>

            <?php ph_get_template( 'search/no-properties-found.php' ); ?>

            <?php endif; ?>

            <?php endif; ?>

            <?php
            /**
             * propertyhive_after_search_results_loop hook
             *
             * @hooked propertyhive_pagination - 10
             */
            do_action( 'propertyhive_after_search_results_loop' );
        ?>

            <?php
        /**
         * propertyhive_after_main_content hook
         *
         * @hooked propertyhive_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action( 'propertyhive_after_main_content' );
    ?>

            <?php get_footer( 'propertyhive' ); ?>
        </div>
    </section>



</main>