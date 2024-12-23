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
        <div class="property-image-carousel">
            <?php
            $gallery_attachments = $property->gallery_attachments; // Fetch gallery attachments
            if (!empty($gallery_attachments)) :
                foreach ($gallery_attachments as $attachment_id) :
                    $image_url = wp_get_attachment_image_url($attachment_id, 'large'); // Get the image URL
                    if ($image_url) :
            ?>
                    <div class="carousel-slide">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" class="property-carousel-image">
                    </div>
            <?php
                    endif;
                endforeach;
            else :
            ?>
                <img src="<?php echo $property->get_main_photo_src( $size = 'large' ); ?>" class="property-featured-image" alt="<?php the_title(); ?>">
            <?php endif; ?>
        </div>
    </a>
</div>

<div class="col-right">
    <span class="price-info price-qualifier"><?php echo $property->price_qualifier; ?></span>
    <h3 class="price-info price"><?php echo $property->get_formatted_price(); ?></h3>

    <ul class="features">
        <?php if ( $property->bedrooms > 0 ): ?>
            <li>
                <img class="feature-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/bed-vector.svg" alt="">
                <span><?php echo $property->bedrooms; ?></span>
            </li>
        <?php endif; ?>
        <?php if ( $property->bathrooms > 0 ): ?>
            <li>
                <img class="feature-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/bath-logo.svg" alt="">
                <span><?php echo $property->bathrooms; ?></span>
            </li>
        <?php endif; ?>
        <?php if ( $property->reception_rooms > 0 ): ?>
            <li>
                <img class="feature-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/recep-room.png" alt="">
                <span><?php echo $property->reception_rooms; ?></span>
            </li>
        <?php endif; ?>
        <?php if (
            (!is_null($property->floor_area_to_sqft) && $property->floor_area_to_sqft !== '' && $property->floor_area_to_sqft != 0) ||
            (!is_null($property->floor_area_from_sqft) && $property->floor_area_from_sqft !== '' && $property->floor_area_from_sqft != 0)
        ) : ?>
            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sq-ft-logo.svg" alt="">
                <span><?php echo $property->get_formatted_floor_area(); ?></span>
            </li>
        <?php endif; ?>
    </ul>
    <h4 class="property-address"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <p><?php echo mb_strimwidth(get_the_excerpt(), 0, 250, "..."); ?></p>
</div>

<?php do_action( 'propertyhive_after_search_results_loop_item' ); ?>

</div>




<script>
jQuery(document).ready(function ($) {
    $('.property-image-carousel').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });
});
</script>