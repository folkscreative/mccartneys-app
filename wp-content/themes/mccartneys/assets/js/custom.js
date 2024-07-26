$('.main-popup .sub-menu').prepend('<div class="outer-item"><p class="prepend"></p><span class="cross-icon"></span></div>');
$('.main-popup .menu-item-has-children').append('<span class="list-arrow"><i class="fa-solid fa-angle-right"></i>');

  $('.list-arrow').click(function(){
    var $anchortext = $(this).siblings('a').text();
    $('.main-popup .sub-menu .prepend').html($anchortext);
  });

  $('.main-popup .outer .list-arrow').click(function() {
    $(this).siblings('.sub-menu').addClass('show');
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
// tabs
// $(document).on('click', '.top-bar', function()  {
//   $(this).siblings('.bottom-bar').slideToggle(350);
// });
// $(document).on('click', '.bottom-bar .x-icon', function()  {
//   $(this).parent().slideToggle(350);
// });
$(document).ready(function() {
  $('.faqs-wrapper .faqs-item:nth-child(2)').addClass('active');
});
$(document).ready(function() {
  $('.faqs-wrapper .faqs-item:nth-child(2) .bottom-bar').slideDown();
});
$('.faqs-wrapper .faqs-item').on('click', function()  {
  $(this).children('.bottom-bar').slideToggle(300);
  $(this).siblings().children('.bottom-bar').slideUp(300);
  $(this).siblings().removeClass('active');          
  $(this).toggleClass('active');
});



// daper
$('.depar').slick({
    dots: true,
    arrows: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2000,
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
  autoplay: true,
  autoplaySpeed: 2000,
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
// livestock service
 // insigh
 $('.livestocks').slick({
  dots: true,
  arrows: true,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 2000,
  slidesToShow: 4,
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
      slidesToShow: 2,
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
    autoplay: true,
    autoplaySpeed: 2000,
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
// entry forms slider
  $('.entry-form-slider.inner-wrapper').slick({
    dots: true,
    arrows: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 4,
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
  // entry forms slider store
  $('.entry-form-slider.inner-wrapper.store').slick({
    dots: true,
    arrows: true,
    infinite: true,
    speed: 300,
    slidesToShow: 2,
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
  // event slider
$('.events-slider').slick({
  dots: false,
  arrows: true,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 2000,
  centerMode: false,
  slidesToShow: 1,
  slideToScroll: 1,
});
$('.stud-slider').slick({
  dots: false,
  arrows: true,
  infinite: true,
  autoplay: false,
  autoplaySpeed: 2000,
  centerMode: false,
  slidesToShow: 2,
  slideToScroll: 1,
  responsive: [
    {
      breakpoint: 575,
      settings: {
      slidesToShow: 1,
      centerMode: false, /* set centerMode to false to show complete slide instead of 3 */
      slidesToScroll: 1
      }
    }
   ]
});
// on window scroll
$(window).scroll(function(){
  if ($(this).scrollTop() > 850) {
     $('.banner-menu').addClass('fixed');
  } else {
     $('.banner-menu').removeClass('fixed');
  }
});

document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tab');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');

            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));

            this.classList.add('active');
            document.getElementById(tabId).classList.add('active');
        });
    });

    // Activate the first tab and content by default
    if (tabs.length > 0) {
        tabs[0].classList.add('active');
        contents[0].classList.add('active');
    }
});

