<?php
/**
 * The template for displaying a single property within 'Recent Properties / New Instructions' section
 *
 * Override this template by copying it to yourtheme/propertyhive/content-property-recent.php
 *
 * @author 		PropertyHive
 * @package 	PropertyHive/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $property, $propertyhive_loop;




// Store loop count we're currently on
if ( empty( $propertyhive_loop['loop'] ) )
	$propertyhive_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $propertyhive_loop['columns'] ) )
	$propertyhive_loop['columns'] = apply_filters( 'loop_search_results_columns', 1 );

// Ensure visibility
if ( ! $property )
	return;

// Increase loop count
++$propertyhive_loop['loop'];

// Extra post classes
$classes = array('clear');
if ( 0 == ( $propertyhive_loop['loop'] - 1 ) % $propertyhive_loop['columns'] || 1 == $propertyhive_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $propertyhive_loop['loop'] % $propertyhive_loop['columns'] )
	$classes[] = 'last';
if ( $property->featured == 'yes' )
    $classes[] = 'featured';
?>

<div class="office-slider">
    <div class="col-left">
        <a href="<?php the_permalink(); ?>">
            <?php propertyhive_template_loop_property_thumbnail(); ?>
        </a>
    </div>
    <div class="col-right">
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <ul class="features">
            <?php if ( $property->bedrooms > 0 ): ?>
            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bed-vector.svg" alt="">
                <span><?php echo $property->bedrooms; ?></span>
            </li>
            <?php endif; ?>

            <?php if ( $property->bathrooms > 0 ): ?>
            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bath-logo.svg" alt="">
                <span><?php echo $property->bathrooms; ?></span>
            </li>
            <?php endif; ?>

            <?php if (
    (!is_null($property->floor_area_to_sqft) && $property->floor_area_to_sqft !== '' && $property->floor_area_to_sqft != 0) ||
    (!is_null($property->floor_area_from_sqft) && $property->floor_area_from_sqft !== '' && $property->floor_area_from_sqft != 0)
)  { ?>


            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sq-ft-logo.svg" alt="">
                <span><?php echo $property->get_formatted_floor_area(); ?></span>
            </li>
            <?php }?>

        </ul>
        <p class="price"><?php echo $property->get_formatted_price(); ?></p>
    </div>


</div>