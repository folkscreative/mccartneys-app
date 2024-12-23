<?php
/**
 * The template for displaying a single property within search results loops.
 *
 * Override this template by copying it to yourtheme/propertyhive/content-property.php
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
<div <?php post_class( $classes ); ?>>

    <!-- <div class="col-left">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $property->get_main_photo_src( $size = 'large' ) ?>" class="property-featured-image"
                alt="><?php the_title(); ?>">
        </a>
    </div> -->

    <div class="col-left">
    <div class="swiper-container property-carousel">
        <div class="swiper-wrapper">
            <?php foreach ( $property->get_gallery_images() as $image ) : ?>
                <div class="swiper-slide">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url( $image['src'] ); ?>" class="property-featured-image" alt="<?php the_title(); ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Add Pagination and Navigation -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>



    <div class="col-right">
        <span class="price-info price-qualifier"><?php echo $property->price_qualifier; ?></span>
        <h3 class="price-info price"><?php echo $property->get_formatted_price(); ?></h3>

        <ul class="features">

            <?php if (!is_null($property->property_type) && $property->property_type !== '' && trim($property->property_type) !== '') { ?>
            <!-- <li>
                <img class="feature-icon"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-property-type.svg" alt="">
                <span class=""><?php echo $property->property_type; ?></span>
            </li> -->
            <?php }?>
            <?php if ( $property->bedrooms > 0 ): ?>
            <li>
                <img class="feature-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/bed-vector.svg"
                    alt="">
                <span><?php echo $property->bedrooms; ?></span>
            </li>
            <?php endif; ?>

            <?php if ( $property->bathrooms > 0 ): ?>
            <li>
                <img class="feature-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/bath-logo.svg"
                    alt="">
                <span><?php echo $property->bathrooms; ?></span>
            </li>
            <?php endif; ?>
            <?php if ( $property->reception_rooms > 0 ): ?>
            <li>
                <img class="feature-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/recep-room.png"
                    alt="">
                <span><?php echo $property->reception_rooms; ?></span>
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
        <h4 class="property-address"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <p><?php echo mb_strimwidth(get_the_excerpt(), 0, 250, "..."); ?></p>

    </div>

    <?php do_action( 'propertyhive_after_search_results_loop_item' ); ?>

</div>