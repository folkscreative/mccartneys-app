jQuery(document).ready(function() {
    jQuery('.read-more').click(function() {
        jQuery('.property-description').toggleClass('collapsed');

        if (jQuery('.property-description').hasClass('collapsed')) {
            jQuery(this).text('See More Description');
        } else {
            jQuery(this).text('See Less Description');
        }
    });
});


var floorplanMedia = document.getElementById('floorplanMedia');
var virtualTourMedia = document.getElementById('virtualTourMedia');
var videoTourMedia = document.getElementById('videoTourMedia');
var brochureMedia = document.getElementById('brochureMedia');
var epcMedia = document.getElementById('epcMedia');
var galleryMedia = document.getElementById('galleryMedia');
var propMainImg = document.querySelector('.glightbox .main-image');
var galleryThumbs = document.querySelectorAll('.glightbox .property-secondary-image');


if (floorplanMedia) {
    // Initialize GLightbox
    const floorPlanLightbox = GLightbox({
        selector: 'div.floorplans.glightbox a'
    });
    // External trigger to open lightbox
    floorplanMedia.addEventListener('click', function() {
        floorPlanLightbox.open();
    });

}
if (virtualTourMedia) {
    // Initialize GLightbox
    const vTourLightbox = GLightbox({
        selector: 'div.virtual-tours.glightbox a'
    });
    // External trigger to open lightbox
    virtualTourMedia.addEventListener('click', function() {
        vTourLightbox.open();
    });

}

if (epcMedia) {
    // Initialize GLightbox
    const epcLightbox = GLightbox({
        selector: 'div.epcs.glightbox a'
    });
    // External trigger to open lightbox
    epcMedia.addEventListener('click', function() {
        epcLightbox.open();
    });

}
if (galleryMedia) {
    // Initialize GLightbox
    const galleryLightbox = GLightbox({
        selector: 'div.galleryImages.glightbox a'
    });
    // External trigger to open lightbox
    galleryMedia.addEventListener('click', function() {
        galleryLightbox.open();
    });
    propMainImg.addEventListener('click', function() {
        galleryLightbox.open();
    });
    galleryThumbs.forEach(function(thumb, index) {
        thumb.addEventListener('click', function() {
            // Open the GLightbox at the specific index
            galleryLightbox.openAt(index + 1);
        });
    });
}

// Initialize GLightbox
const enquiryModal = GLightbox({
    elements: [{
        content: document.getElementById('enquiryModal').innerHTML,
        width: '80vw', // Optional: Set width of the lightbox
        height: 'auto'
    }]
});

// External trigger to open lightbox
document.getElementById('enquiryTrigger').addEventListener('click', function() {
    enquiryModal.open();
});