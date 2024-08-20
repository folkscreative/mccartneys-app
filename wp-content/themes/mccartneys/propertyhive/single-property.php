<?php
/**
 * The Template for displaying a single property.
 *
 * Override this template by copying it to yourtheme/propertyhive/single-property.php
 *
 * @author      PropertyHive
 * @package     PropertyHive/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'propertyhive' ); ?>

<main class="single-property">



    <?php while ( have_posts() ) : the_post(); ?>
    <!-- The Main -->
    <?php ph_get_template_part( 'content', 'single-property' ); ?>

    <?php endwhile; // end of the loop. ?>


</main>

<?php get_footer( 'propertyhive' ); ?>