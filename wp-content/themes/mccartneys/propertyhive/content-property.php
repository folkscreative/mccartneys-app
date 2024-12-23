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

$gallery_attachments = $property->get_gallery_attachment_ids();
$galleryAttachmentCount = count($gallery_attachments);

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

    <div class="col-left">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $property->get_main_photo_src( $size = 'large' ) ?>" class="property-featured-image"
                alt="><?php the_title(); ?>">
        </a>

        <div class="container property-gallery-mb d-block d-md-none">

<div class="gallery-thumbnail">
    <?php 
if ($gallery_attachments && is_array($gallery_attachments)) {
foreach ($gallery_attachments as $attachment_id) {
// Get the URL of the attachment image
$image_url = wp_get_attachment_url($attachment_id);

// Output the image
if ($image_url) {
    echo '<div class="gallery-slide-item">';
    echo '<img src="' . esc_url($image_url) . '" class="property-primary-image" alt="' . esc_attr(get_the_title()) . '">';
    echo '</div>';
}            
}
} else {
echo '<p>No images found in the gallery.</p>';
}
?>
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