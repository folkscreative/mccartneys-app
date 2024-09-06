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
$website_logo = get_field('upload_logo', 'option');
$fine_country_logo = wp_get_attachment_url('325');
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





        <div class="container property-gallery d-none d-md-flex">

            <div class="wrapper-main-img">
                <a data-glightbox='gallery-images' class="glightbox"><img
                        src="<?php echo $property->get_main_photo_src( $size = 'property-square' ) ?>"
                        class="main-image property-featured-image" alt="<?php the_title(); ?>"></a>
                <div class=" gallery-count mcc-badge">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-icon.svg" alt=""
                        class="badge-icon">
                    <a id="galleryMedia">1/<?php echo $galleryAttachmentCount ?></a>
                </div>


            </div>

            <div class="side-images">
                <a data-glightbox='gallery-images' class="glightbox"><img
                        src="<?php echo wp_get_attachment_url($gallery_attachments[1], $size = 'property-square') ?>"
                        class="property-secondary-image" alt="><?php the_title(); ?>"></a>
                <a data-glightbox='gallery-images' class="glightbox"><img
                        src="<?php echo wp_get_attachment_url($gallery_attachments[2], $size = 'property-square') ?>"
                        class="property-secondary-image" alt="><?php the_title(); ?>"></a>
            </div>
        </div>

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
            <div class="number-indicator">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-icon.svg" alt=""
                    class="badge-icon">
                <span class="current-slide">1</span> / <span class="total-slides">4</span>
            </div>
        </div>

        <div class="agent-btns-mb d-flex d-md-none">
            <?php if ( $property->office_telephone_number != '' )
                        {	
                            echo '<a class="btn-cs-dark" href="tel:' . esc_attr($property->office_telephone_number) . '">';
                            echo 'Call agent <span><i class="fa-solid fa-angle-right"></i></span>';
                            echo '</a>';
                            }
                            ?>
            <a class="btn-bn-light" href="#" target="_self">Request A Viewing</a>

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
                <div class="col-12 col-md-8" style="position: relative; ">
                <a class="share-pop-btn"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                <g clip-path="url(#clip0_1547_48556)">
                    <path d="M11.6176 5.37422L11.7189 5.32094L11.6942 5.20917C11.6464 4.99216 11.6202 4.76879 11.6202 4.53958C11.6202 2.81559 13.0227 1.41367 14.7461 1.41367C16.4701 1.41367 17.872 2.81618 17.872 4.53958C17.872 6.26358 16.4695 7.66549 14.7461 7.66549C13.8139 7.66549 12.9776 7.25276 12.4041 6.60172L12.3261 6.5132L12.2217 6.56811L6.97632 9.32706L6.88056 9.37742L6.89814 9.48418C6.9262 9.65464 6.944 9.82532 6.944 9.99928C6.944 10.171 6.92621 10.3395 6.89883 10.5073L6.88143 10.614L6.97702 10.6642L11.825 13.2151L11.933 13.272L12.0106 13.1777C12.6179 12.4399 13.5377 11.9692 14.5647 11.9692C16.3881 11.9692 17.8719 13.453 17.8719 15.2765C17.8719 17.1 16.3881 18.5845 14.5647 18.5845C12.7413 18.5845 11.2574 17.1001 11.2574 15.2765C11.2574 15.0409 11.283 14.8113 11.3303 14.5891L11.3539 14.478L11.2534 14.4252L6.45256 11.8998L6.34259 11.8419L6.26529 11.9392C5.69195 12.6608 4.80915 13.1253 3.81888 13.1253C2.09489 13.1253 0.692969 11.7228 0.692969 9.99941C0.692969 8.27541 2.09548 6.8735 3.81888 6.8735C4.80629 6.8735 5.68703 7.33593 6.26046 8.05478L6.3378 8.15174L6.44756 8.094L11.6176 5.37422ZM5.60677 9.99968V9.99956C5.60677 9.0132 4.80433 8.21156 3.81878 8.21156C2.83242 8.21156 2.03079 9.01401 2.03079 9.99956C2.03079 10.9859 2.83323 11.7875 3.81878 11.7875C4.80448 11.7875 5.60598 10.9851 5.60677 9.99968ZM12.958 4.54009V4.54021C12.958 5.52657 13.7604 6.32821 14.746 6.32821C15.7323 6.32821 16.534 5.52576 16.534 4.54021C16.534 3.55385 15.7315 2.75222 14.746 2.75222C13.7603 2.75222 12.9588 3.55394 12.958 4.54009ZM16.5348 15.2768C16.5348 14.1904 15.6512 13.3068 14.5648 13.3068C13.4784 13.3068 12.5948 14.1904 12.5948 15.2768C12.5948 16.3632 13.4784 17.2468 14.5648 17.2468C15.6512 17.2468 16.5348 16.3632 16.5348 15.2768Z" fill="#707070" stroke="white" stroke-width="0.3"/>
                </g>
                <defs>
                    <clipPath id="clip0_1547_48556">
                    <rect width="18.5625" height="18.5625" fill="white" transform="translate(0 0.71875)"/>
                    </clipPath>
                </defs>
                </svg></a>
                <div class="branch-share-popup">
                    <h4>Share</h4>
                    <?php echo sharethis_inline_buttons(); ?>
                    <div class="background">
                    <p class="clipboard">Copy URL</p>
                    </div>
            <script>
                var $temp = $("<p>");
                var $url = $(location).attr('href');

                $('.clipboard').on('click', function() {
                $("body").append($temp);
                $temp.val($url).select();
                document.execCommand("copy");
                $temp.remove();
                $("p").text("URL copied!");
                })
                </script>
                </div>

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
                            <img class="badge-icon"
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/recep-room.png" alt="">
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
                                <img class="media-icon d-none d-md-block"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/floorplan-icon.svg"
                                    alt="">
                                <img class="media-icon d-block d-md-none"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/floor-plan-dark.svg"
                                    alt="">
                                <span>Floorplan</span>
                            </li>
                        </a>
                        <?php }
                        if ($virtual_tours) { ?>
                        <a id="virtualTourMedia">
                            <li class="property-media--virtual-tour">
                                <img class="media-icon d-none d-md-block"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/virtual-tour-icon.svg"
                                    alt="">
                                <img class="media-icon d-block d-md-none"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/virtual-tour-dark.svg"
                                    alt="">
                                <span>Virtual Tour</span>
                            </li>
                        </a>

                        <?php }
                        if ($brochures) { ?>
                        <a href="<?php echo wp_get_attachment_url($brochures[0]);  ?>" target="_blank"
                            id="brochureMedia">
                            <li class="property-media--brochure">
                                <img class="media-icon d-none d-md-block"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/brochure-icon.svg"
                                    alt="">
                                <img class="media-icon d-block d-md-none"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/brochure-dark.svg"
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
                        <button class="read-more btn-cs-dark">See More Description <span><i
                                    class="fa-solid fa-angle-down"></i></span></button>
                        </span>
                    </div>
                    <div class="branch-info mobile d-block d-md-none">
                        <div class="img-wrap">
                            <img src="<?php if ($property->department === "fine-and-country") {
                            echo $fine_country_logo;
                        } else {
                        echo $website_logo['url']; 
                        };?>" alt="<?php if ($property->department === "fine-and-country") {
                            echo 'Fine & Country Logo';
                        } else { echo $website_logo['alt']; };?>" class="negotiatior-profile">
                        </div>
                        <div class="content">
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
                        </div>
                    </div>
                    <div class="property-map-wrap">
                        <h4><?php echo $property->get_formatted_full_address( $separator = ', ' ); ?></h4>
                        <?php echo get_property_map() ?>
                    </div>
                    <?php if ( $property->council_tax_band || $property->tenure ) {
                        ?>

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
                    <?php } ?>

                    <!-- <div class="explore-info-wrap">
                        <h4>Explore the area</h4>
                        <div class="mcc-badge-group-key">
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing eli mattis sit phasellus mollis sit
                                aliquam sit nullam neque ultrices dipiscing eli mattis sit mattis sit phasellus
                                phasellus mollis sit aliquam sit neque.</p>
                            <img src="<?php echo $property->get_main_photo_src( $size = 'property-square' ) ?>"
                                class="main-image property-featured-image" alt=" ><?php the_title(); ?>">
                            <a class="btn-cs-dark" href="#" target="_self">Find out more<span><svg
                                        class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="angle-right" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z">
                                        </path>
                                    </svg></span></a>
                        </div>
                    </div> -->

                </div>

                <div class="col-12 col-md-4 branch-info-wrap d-none d-md-block">

                    <div class="branch-info">
                        <div class="negotiator-profile-wrap"><img src="<?php if ($property->department === "fine-and-country") {
                            echo $fine_country_logo;
                        } else {
                        echo $website_logo['url']; 
                        };?>" alt="<?php if ($property->department === "fine-and-country") {
                            echo 'Fine & Country Logo';
                        } else { echo $website_logo['alt']; };?>" class="negotiatior-profile"></div>
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

<div class=" virtual-tours glightbox" data-glightbox="video-tour">
    <?php
foreach ($virtual_tour_urls as $virtual_tour_url) {
    echo "<a href='" . $virtual_tour_url . "' class='glightbox'></a>";
}

?>
</div>


<div class="hidden epcs glightbox" data-glightbox="epc-media">
    <?php
foreach ($epcs as $epc) {
    echo "<a href='" . wp_get_attachment_url( $epc ) . "' class='glightbox'><img src='". wp_get_attachment_url($epc) ."'></a>";
}

?>
</div>

<div class="hidden floorplans glightbox" data-glightbox="floorplans">
    <?php
foreach ($floorplans as $floorplan) {
    echo "<a href='" . wp_get_attachment_url( $floorplan ) . "' class='glightbox'><img src='". wp_get_attachment_url($floorplan) ."'></a>";
}

?>
</div>

<div class="hidden galleryImages glightbox" data-glightbox="gallery-images">
    <?php
foreach ($gallery_attachments as $gallery_attachment) {
    echo "<a href='" . wp_get_attachment_url( $gallery_attachment ) . "' class='glightbox'><img src='". wp_get_attachment_url($gallery_attachment) ."'></a></a>";
}

?>

</div>

<div class="hidden brochures" data-glightbox="brochure">
    <?php
    foreach ($brochures as $brochure) {
        echo "<a href='" . wp_get_attachment_url( $brochure ) . "' class='glightbox'></a>";
    }
    ?>
</div>