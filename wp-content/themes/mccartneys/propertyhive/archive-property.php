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
    <section class="search-outer d-none d-md-block">
        <div class="container">
            <?php echo do_shortcode('[property_search]') ?>

        </div>

    </section>
    <section class="search-outer filter d-block d-md-none">
        <div class="container">
            <div class="mobile-filter">
            <?php echo do_shortcode('[property_search]') ?>
            <a href="#" class="filter-btn">Filter <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none" class="open">
  <path d="M0.557314 2.90364H9.94183C10.1923 3.92033 11.0981 4.67725 12.1776 4.67725C13.2571 4.67725 14.1628 3.92033 14.4133 2.90364H17.2822C17.5898 2.90364 17.8395 2.65051 17.8395 2.33863C17.8395 2.02675 17.5898 1.77361 17.2822 1.77361H14.4133C14.1628 0.756925 13.2571 0 12.1776 0C11.098 0 10.1923 0.756925 9.94183 1.77361H0.557314C0.249684 1.77361 0 2.02675 0 2.33863C0 2.65051 0.24887 2.90364 0.557314 2.90364ZM12.1776 1.13003C12.8344 1.13003 13.3697 1.67188 13.3697 2.33863C13.3697 3.00538 12.8352 3.54723 12.1776 3.54723C11.5207 3.54723 10.9854 3.00538 10.9854 2.33863C10.9854 1.67188 11.5199 1.13003 12.1776 1.13003ZM17.2815 8.03177H6.96685C6.71635 7.01508 5.81061 6.25815 4.73111 6.25815C3.65162 6.25815 2.74586 7.01508 2.49538 8.03177H0.55746C0.24983 8.03177 0.000146221 8.2849 0.000146221 8.59678C0.000146221 8.90866 0.24983 9.1618 0.55746 9.1618H2.49538C2.74588 10.1785 3.65162 10.9354 4.73111 10.9354C5.81061 10.9354 6.71637 10.1785 6.96685 9.1618H17.2824C17.59 9.1618 17.8397 8.90866 17.8397 8.59678C17.8389 8.2849 17.59 8.03177 17.2815 8.03177ZM4.73111 9.80538C4.07426 9.80538 3.53899 9.26353 3.53899 8.59678C3.53899 7.93003 4.07345 7.38818 4.73111 7.38818C5.38796 7.38818 5.92242 7.93003 5.92324 8.59595V8.59678V8.59761C5.92242 9.26354 5.38796 9.80538 4.73111 9.80538ZM17.2815 14.0964H11.3804C11.1299 13.0797 10.2242 12.3227 9.14472 12.3227C8.06522 12.3227 7.15946 13.0797 6.90898 14.0964H0.557523C0.249893 14.0964 0.000208873 14.3495 0.000208873 14.6614C0.000208873 14.9733 0.249893 15.2264 0.557523 15.2264H6.90898C7.15948 16.2431 8.06522 17 9.14472 17C10.2242 17 11.13 16.2431 11.3804 15.2264H17.2824C17.59 15.2264 17.8397 14.9733 17.8397 14.6614C17.8389 14.3495 17.59 14.0964 17.2815 14.0964ZM9.14472 15.87C8.48787 15.87 7.95259 15.3281 7.95259 14.6614C7.95259 13.9954 8.48705 13.4528 9.14472 13.4528C9.80157 13.4528 10.336 13.9946 10.3368 14.6605V14.6614V14.6622C10.336 15.3281 9.80157 15.87 9.14472 15.87Z" fill="#7F1B4E"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none" class="close">
  <path d="M10.8118 9.12385C11.0627 9.35549 11.0627 9.73114 10.8118 9.96353C10.6887 10.0719 10.527 10.1343 10.3564 10.1373C10.1859 10.1373 10.0226 10.0749 9.90194 9.96353L5.5 5.90102L1.09806 9.96353C0.977397 10.0749 0.814096 10.1373 0.643558 10.1373C0.473016 10.1343 0.311317 10.0719 0.188248 9.96353C-0.0627494 9.73114 -0.0627494 9.35549 0.188248 9.12385L4.59018 5.06134L0.188248 0.998824C-0.0474482 0.764956 -0.0410229 0.400442 0.204337 0.174005C0.449698 -0.0524309 0.844683 -0.0583797 1.09807 0.159157L5.50001 4.22167L9.90194 0.159157C10.1553 -0.0583655 10.5503 -0.0524356 10.7957 0.174005C11.041 0.400447 11.0475 0.764975 10.8118 0.998824L6.40983 5.06134L10.8118 9.12385Z" fill="#7F1B4E"/>
</svg>
</a>
            </div>
            <div class="popup-filter">
            <?php echo do_shortcode('[property_search]') ?>
            </div>
            
        </div>

    </section>
    <section class="results-overview">
        <div class="container results-overview--info">
            <?php echo propertyhive_result_count(); ?>
            <div class="results-sorting">
                <form class="stc-checkbox">
                    <label><input type="checkbox" value="1" name="include_sold_stc" class="stc-checkbox-control"
                            <?php if (isset($_REQUEST['include_sold_stc'])) { echo ' checked'; } ?>> <span>Include Under
                            Offer, Sold STC</span></label>
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