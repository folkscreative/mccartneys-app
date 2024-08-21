<?php
/**
 * The template for displaying property content in the single-property.php template
 *
 * Override this template by copying it to yourtheme/propertyhive/content-single-property.php
 *
 * @author      PropertyHive
 * @package     PropertyHive/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $property;


$gallery_attachments = $property->get_gallery_attachment_ids();
$galleryAttachmentCount = count($gallery_attachments);
$floorplans = $property->get_floorplan_attachment_ids();
$brochures = $property->get_brochure_attachment_ids();
$epcs = $property->get_epc_attachment_ids();
$virtual_tours = $property->get_virtual_tours();
$virtual_tour_urls = $property->get_virtual_tour_urls();



?>

<?php
     if ( post_password_required() ) 
     {
        echo get_the_password_form();
        return;
     }
?>

<div id="property-<?php the_ID(); ?>" <?php post_class(); ?>>

    <section class="single-property--head">
        <div class="container breadcrumb-wrap">
            <?php
            if ( isset($_SESSION['last_search']) && $_SESSION['last_search'] != '' ) 
			{
				echo '<a href="' . $_SESSION['last_search'] . '" class="back-to-search">';
			}
			else
			{
				echo '<a href="' . get_permalink(ph_get_page_id( 'search_results' )) . '" class="back-to-search">';
			}

            ?>Back To Search Results
            </a>


            <div class="breadcrumb">
                <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
            </div>

        </div>





        <div class="container property-gallery">

            <div class="wrapper-main-img">
            <img src="<?php echo $property->get_main_photo_src( $size = 'property-square' ) ?>"
                class="main-image property-featured-image" alt="><?php the_title(); ?>">
            <div class="gallery-count mcc-badge">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-icon.svg" alt=""
                    class="badge-icon">
                <a id="galleryMedia">1/<?php echo $galleryAttachmentCount ?></a>
            </div>
            </div>

            <div class="side-images">
                <img src="<?php echo wp_get_attachment_url($gallery_attachments[1], $size = 'property-square') ?>"
                    class="property-secondary-image" alt="><?php the_title(); ?>">
                <img src="<?php echo wp_get_attachment_url($gallery_attachments[2], $size = 'property-square') ?>"
                    class="property-secondary-image" alt="><?php the_title(); ?>">
            </div>
        </div>

        <div class="asfasdf">
        <?php
// Example array of attachment IDs
$gallery_attachments = get_post_meta(get_the_ID(), 'gallery_attachments', true);

if ($gallery_attachments && is_array($gallery_attachments)) {
    foreach ($gallery_attachments as $attachment_id) {
        // Get the URL of the attachment image
        $image_url = wp_get_attachment_url($attachment_id, 'property-square');

        // Output the image
        if ($image_url) {
            echo '<img src="' . esc_url($image_url) . '" class="property-secondary-image" alt="' . esc_attr(get_the_title()) . '">';
        }
    }
} else {
    echo '<p>No images found in the gallery.</p>';
}
?>
        </div>
        <!-- <div class="container gallery-info">
            <div class="col col-lg-8">
                <div class="gallery-count mcc-badge">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-icon.svg" alt=""
                        class="badge-icon">
                    <span>1 / 22</span>
                </div>
            </div>
        </div> -->

    </section>
    <section class="single-property--info">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <span class="price-info price-qualifier"><?php echo $property->price_qualifier; ?></span>
                    <h2 class="price-info price"><?php echo $property->get_formatted_price(); ?></h2>
                    <h1 class="property-address">
                        <?php echo $property->get_formatted_full_address( $separator = ', ' ) ?></h1>
                    <p class="summary"><?php echo get_the_excerpt() ?></p>
                    <ul class="mcc-badge-group property-info">

                        <?php if (!is_null($property->property_type) && $property->property_type !== '' && trim($property->property_type) !== '') { ?>
                        <li class="mcc-badge">
                            <img class="badge-icon"
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-property-type.svg"
                                alt="">
                            <div class="feature-info">
                                <h6>Property Type</h6>
                                <span class=""><?php echo $property->property_type; ?></span>
                            </div>
                        </li>
                        <?php }?>
                        <?php if ( $property->bedrooms > 0 ): ?>
                        <li class="mcc-badge">
                            <img class="badge-icon"
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/bed-vector.svg" alt="">
                            <div class="feature-info">
                                <h6>Bedrooms</h6>
                                <span><?php echo $property->bedrooms; ?></span>
                            </div>
                        </li>
                        <?php endif; ?>

                        <?php if ( $property->bathrooms > 0 ): ?>
                        <li class="mcc-badge">
                            <img class="badge-icon"
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/bath-logo.svg" alt="">
                            <div class="feature-info">
                                <h6>Bathrooms</h6>
                                <span><?php echo $property->bathrooms; ?></span>
                            </div>
                        </li class="mcc-badge">
                        <?php endif; ?>

                        <?php if ( $property->reception_rooms > 0 )  { ?>


                        <li class="mcc-badge">
                            <img class="badge-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/recep-room.png"
                                alt="">
                            <div class="feature-info">
                                <h6>Reception Rooms</h6>
                                <span><?php echo $property->reception_rooms; ?></span>
                            </div>
                        </li>
                        <?php }?>



                    </ul>

                    <ul class="property-media">
                        <?php if ($floorplans) { ?>
                        <a id="floorplanMedia">
                            <li class="property-media--floorplan">
                                <img class="media-icon"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/floorplan-icon.svg"
                                    alt="">
                                <span>Floorplan</span>
                            </li>
                        </a>
                        <?php }
                        if ($virtual_tours) { ?>
                        <a id="virtualTourMedia">
                            <li class="property-media--virtual-tour">
                                <img class="media-icon"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/virtual-tour-icon.svg"
                                    alt="">
                                <span>Virtual Tour</span>
                            </li>
                        </a>
                        <?php }
                        if ($virtual_tours) { ?>
                        <a id="videoTourMedia">
                            <li class="property-media--video-tour">
                                <img class="media-icon"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/video-tour-icon.svg"
                                    alt="">
                                <span>Video Tour</span>
                            </li>
                        </a>
                        <? }
                        if ($brochures) { ?>
                        <a href="<?php echo wp_get_attachment_url($brochures[0]);  ?>" target="_blank"
                            id="brochureMedia">
                            <li class="property-media--brochure">
                                <img class="media-icon"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/brochure-icon.svg"
                                    alt="">
                                <span>Brochure</span>
                            </li>
                        </a>
                        <?php }
                        if ($epcs) { ?>
                        <a id="epcMedia">
                            <li class="property-media--epc">
                                <img class="media-icon"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/epc-icon.svg" alt="">
                                <span>EPC</span>
                            </li>
                        </a>
                        <?php } ?>
                    </ul>

                    <div class="property-description-wrap">
                        <div class="property-description collapsed">
                            <h3>Property Description</h3>
                            <?php echo $property->get_formatted_description() ?>
                        </div>
                        <button class="read-more btn-cs-dark">See More Description <span><i class="fa-solid fa-angle-down"></i></span></button>
                        </span>
                    </div>
                    <div class="property-map-wrap">
                        <h4><?php echo $property->get_formatted_full_address( $separator = ', ' ); ?></h4>
                        <?php echo get_property_map() ?>
                    </div>
                    <div class="key-info-wrap">
                        <h4>Key Information</h4>
                        <div class="mcc-badge-group-key">
                            <?php if ( $property->council_tax_band ) {?>
                            <div class="mcc-bdge">
                                <span>Council Tax - Council Tax Band <?php echo $property->council_tax_band; ?></span>
                            </div>
                            <?php } ?>
                            <?php if ( $property->council_tax_band ) {?>
                            <div class="mcc-bdge">
                                <span>Tenure - <?php echo $property->tenure; ?></span>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 branch-info-wrap">
                    
                    <div class="branch-info">
                    <img src="//placehold.it/300/300" alt="" class="negotiatior-profile">
                        <h5>Get In Touch</h5>
                        <?php if ( $property->office_telephone_number != '' )
                        {	
                            echo '<a class="telephone-number" href="tel:' . esc_attr($property->office_telephone_number) . '">';
                            echo $property->office_telephone_number;
                            echo '</a>';
                            }
                            ?>
                        <span
                            class="branch-name"><?php echo $property->get_office_address( $separator = ', ' ); ?></span>
                        <?php if ( $property->negotiator_name != '' )
		                    { ?>
                        <span class="negotiator-name"><?php echo $property->negotiator_name; ?></span>
                        <?php } ?>
                        <a class="btn-bn-light" href="#" target="_self">Request A Viewing<span><svg
                                    class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="angle-right" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z">
                                    </path>
                                </svg></span></a>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="recent-properties">
        <div class="container">
            <h2 class="title">Recent Properties</h2>
            <?php echo do_shortcode('[recent_properties]');?>
        </div>
    </section>



</div><!-- #property-<?php the_ID(); ?> -->

<div class="hidden virtual-tours">
    <?php
foreach ($virtual_tour_urls as $virtual_tour_url) {
    echo "<a href='" . wp_get_attachment_url( $virtual_tour_url ). "' data-lightbox='virtual-tour-images'></a>";
}

?>
</div>


<div class="hidden epcs">
    <?php
foreach ($epcs as $epc) {
    echo "<a href='" . wp_get_attachment_url( $epc ) . "' data-lightbox='epc-images'></a>";
}

?>
</div>

<div class="hidden floorplans">
    <?php
foreach ($floorplans as $floorplan) {
    echo "<a href='" . wp_get_attachment_url( $floorplan ) . "' data-lightbox='floorplan-images'></a>";
}

?>
</div>

<div class="hidden galleryImages">
    <?php
foreach ($gallery_attachments as $gallery_attachment) {
    echo "<a href='" . wp_get_attachment_url( $gallery_attachment ) . "' data-lightbox='gallery-images'></a>";
}

?>

</div>

<div class="hidden brochures">
    <?php
    foreach ($brochures as $brochure) {
        echo "<a href='" . wp_get_attachment_url( $brochure ) . "' data-lightbox='brochure-images'></a>";
    }
    ?>
</div>