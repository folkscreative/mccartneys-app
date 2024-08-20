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


if (floorplanMedia) {
    floorplanMedia.addEventListener('click', function() {
        document.querySelector('a[data-lightbox="floorplan-images"]').click();
    });
}
if (virtualTourMedia) {
    virtualTourMedia.addEventListener('click', function() {
        document.querySelector('a[data-lightbox="virtual-tour-images"]').click();
    });
}
if (videoTourMedia) {
    videoTourMedia.addEventListener('click', function() {
        document.querySelector('a[data-lightbox="video-tour-images"]').click();
    });
}
if (epcMedia) {
    epcMedia.addEventListener('click', function() {
        document.querySelector('a[data-lightbox="epc-images"]').click();
    });
}
if (galleryMedia) {
    galleryMedia.addEventListener('click', function() {
        document.querySelector('a[data-lightbox="gallery-images"]').click();
    });
}