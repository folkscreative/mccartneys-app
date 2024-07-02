$('.main-popup .sub-menu').prepend('<div class="outer-item"><p class="prepend"></p><span class="cross-icon"></span></div>');
$('.main-popup .menu-item-has-children').append('<span class="list-arrow"><i class="fa-solid fa-angle-right"></i>');

  $('.list-arrow').click(function(){
    var $anchortext = $(this).siblings('a').text();
    $('.main-popup .sub-menu .prepend').html($anchortext);
  });

  $('.main-popup .outer').click(function() {
    $(this).find('.sub-menu').addClass('show');
  });
// popup
$('.hamburger-icn').click(function() {
  $('.page').toggleClass('show');
  $('.main-popup').toggleClass('active');
});
$(document).on('click', '.cross-icon', function()  {
  $('.page').removeClass('show');
  $('.main-popup').removeClass('active');
  $(this).closest('ul.sub-menu').removeClass('show');
});
$(document).on('click', '.outer-item .prepend', function()  {
  $(this).closest('ul.sub-menu').removeClass('show');
});
// slick refresh
$(document).ready(function () {
  $('.nav-link').on('click', function () {
    $('.inner-tabs.pr').slick('refresh');
  });
});
// daper
$('.depar').slick({
    dots: true,
    arrows: true,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slideToScroll: 1,
    responsive: [
      {
        breakpoint: 991,
        settings: {
        slidesToShow: 2,
        centerMode: false, /* set centerMode to false to show complete slide instead of 3 */
        slidesToScroll: 1
        }
      }
     ]
  });
  // insigh
$('.insigh').slick({
  dots: true,
  arrows: true,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slideToScroll: 1,
  responsive: [
    {
      breakpoint: 991,
      settings: {
      slidesToShow: 2,
      centerMode: false, /* set centerMode to false to show complete slide instead of 3 */
      slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
      slidesToShow: 1,
      centerMode: false, /* set centerMode to false to show complete slide instead of 3 */
      slidesToScroll: 1
      }
    }
   ]
});
// Testimonials
  $('.testimonial-slider.wrapper').slick({
    dots: true,
    arrows: false,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slideToScroll: 1,
    responsive: [
      {
        breakpoint: 767,
        settings: {
        slidesToShow: 1,
        centerMode: false, /* set centerMode to false to show complete slide instead of 3 */
        slidesToScroll: 1
        }
      }
     ]
  });
  // Property slider
  $('.inner-tabs.pr').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    adaptiveHeight: true,
    slideToScroll: 1,
    responsive: [
      {
        breakpoint: 991,
        settings: {
        slidesToShow: 3,
        centerMode: false, /* set centerMode to false to show complete slide instead of 3 */
        slidesToScroll: 1
        }
      },
      {
        breakpoint: 767,
        settings: {
        arrows: false,
        dots: true,
        slidesToShow: 1,
        centerMode: false, /* set centerMode to false to show complete slide instead of 3 */
        slidesToScroll: 1
        }
      }
     ]
  });
  // btn
  $('.filter-btn a').click(function(){
    $('.filter-btn a').removeClass('active'); // Remove the class from all elements
    $(this).addClass('active'); // Add the class to the clicked element
});
