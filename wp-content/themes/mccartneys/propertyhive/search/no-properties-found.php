<?php
/**
 * Displayed when no property are found matching the current query.
 *
 * Override this template by copying it to yourtheme/propertyhive/search/no-properties-found.php
 *
 * @author 		PropertyHive
 * @package 	PropertyHive/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<p class="propertyhive-info no-results-message">No properties were found matching your criteria. Change your fields or
    <a href="<?php echo get_post_type_archive_link( 'property' ); ?>">clear all filters and try again?</a>
</p>