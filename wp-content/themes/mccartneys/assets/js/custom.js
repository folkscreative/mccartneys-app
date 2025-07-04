jQuery(document).ready(function ($) {
    $('.main-popup .sub-menu').prepend('<div class="outer-item"><p class="prepend"></p><span class="cross-icon"></span></div>');
    $('.main-popup .menu-item-has-children').append('<span class="list-arrow"><i class="fa-solid fa-angle-right"></i>');
    $('.page-id-1190 .our-marketer .marketer-buttons a').append('<span><i class="fa-solid fa-angle-right"></i>');
    $('.menu .outer').click(function () {
        var $anchortext = $(this).children('a:first-child').text();
        $('.main-popup .sub-menu .prepend').html($anchortext);
    });
    //   $(document).ready(function() {
    //     $(".menu .outer a:first-child").click(function(event) {
    //         event.preventDefault();
    //     });
    // });
    $('.main-popup .outer').click(function () {
        $(this).children('.sub-menu').addClass('show');
    });
    $('.livestock-auctioneers .livestock-auctioneers-content').click(function () {
        $(this).children('.pop-wr').addClass('active');
        $(this).closest('.slick-track').addClass('trans');
        $(this).parents('.slick-list').addClass('trans');
    });
    $(document).on('click', '.closed', function () {
        $(this).parent().parent('.pop-wr').removeClass('active');
        $(this).closest('.slick-track').removeClass('trans');
        $(this).parents('.slick-list').removeClass('trans');
    });
    $(".mobile-filter .filter-btn").click(function () {
        $(this).toggleClass("active");
        $(".popup-filter").toggleClass("active");
    });
    //   sharepopup
    $(".share-pop-btn").click(function () {
        $(".branch-share-popup").toggleClass("active");
    });
    // toogle on team
    $(".toogle-expert").click(function () {
        $(".livestock-auctioneers .container").toggleClass("collapsed");
    });
    // popup
    $('.hamburger-icn').click(function () {
        $('.page').toggleClass('show');
        $('.main-popup').toggleClass('active');
    });
    $(document).on('click', '.cross-icon', function () {
        $('.page').removeClass('show');
        $('.main-popup').removeClass('active');
        $(this).closest('ul.sub-menu').removeClass('show');
    });
    $(document).on('click', '.outer-item .prepend', function () {
        $(this).closest('ul.sub-menu').removeClass('show');
    });
    // slick refresh
    $(document).ready(function () {
        $('.nav-link').on('click', function () {
            $('ul.properties').slick('refresh');
        });
    });
    // tabs
    // $(document).on('click', '.top-bar', function()  {
    //   $(this).siblings('.bottom-bar').slideToggle(350);
    // });
    // $(document).on('click', '.bottom-bar .x-icon', function()  {
    //   $(this).parent().slideToggle(350);
    // });
    // $(document).ready(function() {
    //     $('.faqs-wrapper .faqs-item:nth-child(2)').addClass('active');
    // });
    // $(document).ready(function() {
    //     $('.faqs-wrapper .faqs-item:nth-child(2) .bottom-bar').slideDown();
    // });
    $('.faqs-wrapper .faqs-item').on('click', function () {
        $(this).children('.bottom-bar').slideToggle(300);
        $(this).siblings().children('.bottom-bar').slideUp(300);
        $(this).siblings().removeClass('active');
        $(this).toggleClass('active');
    });

    $('.navigation .navigation__link').on('click', function () {
        show_content($(this).index());
    });
    show_content(0);

    function show_content(index) {
        // Make the content visible
        $('.wrapper-time .iteml.visible').removeClass('visible');
        $('.wrapper-time .iteml:nth-of-type(' + (index + 1) + ')').addClass('visible');

        // Set the tab to selected
        $('.navigation .navigation__link.selected').removeClass('selected');
        $('.navigation .navigation__link:nth-of-type(' + (index + 1) + ')').addClass('selected');
        // How to remove the arrow and only show it on the selected tab?
    }


    // gallery slide
    $(document).ready(function () {
        var $slider = $('.gallery-thumbnail');
        var $currentSlide = $('.current-slide');
        var $totalSlides = $('.total-slides');

        // Initialize Slick Slider
        $slider.slick({
            arrows: true,
            dots: false,
            infinite: true,
        });

        // Update number indicator on initialization
        $totalSlides.text($slider.slick("getSlick").slideCount);

        // Update number indicator on after slide change
        $slider.on('afterChange', function (event, slick, currentSlide) {
            $currentSlide.text(currentSlide + 1);
        });
    });
    // charity
    $('.charit-wrap').slick({
        dots: true,
        arrows: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
        speed: 300,
        slidesToShow: 3,
        slideToScroll: 1,
        responsive: [{
            breakpoint: 576,
            settings: {
                slidesToShow: 2,
                centerMode: false,
                /* set centerMode to false to show complete slide instead of 3 */
                slidesToScroll: 1
            }
        }]
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
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                centerMode: false,
                /* set centerMode to false to show complete slide instead of 3 */
                slidesToScroll: 1
            }
        }]
    }); 
    // insigh
    $('.insigh').slick({
        dots: true,
        arrows: true,
        infinite: true,
        autoplay: false,
        autoplaySpeed: 2000,
        slidesToShow: 3,
        slideToScroll: 1,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                centerMode: false,
                /* set centerMode to false to show complete slide instead of 3 */
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                centerMode: false,
                /* set centerMode to false to show complete slide instead of 3 */
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
        autoplay: false,
        autoplaySpeed: 2000,
        slidesToShow: 4,
        slideToScroll: 1,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                centerMode: false,
                /* set centerMode to false to show complete slide instead of 3 */
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
                centerMode: false,
                /* set centerMode to false to show complete slide instead of 3 */
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
        responsive: [{
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                centerMode: false,
                /* set centerMode to false to show complete slide instead of 3 */
                slidesToScroll: 1
            }
        }]
    });
    // Property slider
    $('.inner-tabs.pr ul.properties').slick({
        dots: false,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        // adaptiveHeight: true,
        slideToScroll: 1,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
                centerMode: false,
                /* set centerMode to false to show complete slide instead of 3 */
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 767,
            settings: {
                arrows: false,
                dots: true,
                slidesToShow: 1,
                centerMode: false,
                /* set centerMode to false to show complete slide instead of 3 */
                slidesToScroll: 1
            }
        }
        ]
    });

    // Property slider
    $('.propertyhive-recent-properties-shortcode ul.properties').slick({
        dots: false,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        // adaptiveHeight: true,
        slideToScroll: 1,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
                centerMode: false,
                /* set centerMode to false to show complete slide instead of 3 */
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 767,
            settings: {
                arrows: false,
                dots: true,
                slidesToShow: 1,
                centerMode: false,
                /* set centerMode to false to show complete slide instead of 3 */
                slidesToScroll: 1
            }
        }
        ]
    });


    // btn
    $('.filter-btn a').click(function () {
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
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                centerMode: false,
                /* set centerMode to false to show complete slide instead of 3 */
                slidesToScroll: 1
            }
        }]
    });
    // entry forms slider store
    $('.entry-form-slider.inner-wrapper.store').slick({
        dots: true,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 2,
        slideToScroll: 1,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                centerMode: false,
                /* set centerMode to false to show complete slide instead of 3 */
                slidesToScroll: 1
            }
        }]
    });
    // event slider
    $('.events-slider').slick({
        dots: false,
        arrows: true,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 5000,
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
        responsive: [{
            breakpoint: 575,
            settings: {
                slidesToShow: 1,
                centerMode: false,
                /* set centerMode to false to show complete slide instead of 3 */
                slidesToScroll: 1
            }
        }]
    });
    $('.award-wrapper.slider').slick({
        dots: false,
        arrows: true,
        infinite: true,
        autoplay: false,
        autoplaySpeed: 2000,
        centerMode: false,
        slidesToShow: 2,
        slideToScroll: 1,
        responsive: [{
            breakpoint: 575,
            settings: {
                slidesToShow: 1,
                centerMode: false,
                /* set centerMode to false to show complete slide instead of 3 */
                slidesToScroll: 1
            }
        }]
    });
    // on window scroll
    $(window).scroll(function () {
        if ($(this).scrollTop() > 850) {
            $('.banner-menu').addClass('fixed');
        } else {
            $('.banner-menu').removeClass('fixed');
        }
    });
    // on window scroll
    $(window).scroll(function () {
        if ($(this).scrollTop() > 550) {
            $('.single-property--head .agent-btns-mb').addClass('fixed');
        } else {
            $('.single-property--head .agent-btns-mb').removeClass('fixed');
        }
    });

    // document.addEventListener('DOMContentLoaded', function() {
    //     const tabs = document.querySelectorAll('.tab');
    //     const contents = document.querySelectorAll('.tab-content');

    //     tabs.forEach(tab => {
    //         tab.addEventListener('click', function() {
    //             const tabId = this.getAttribute('data-tab');

    //             tabs.forEach(t => t.classList.remove('active'));
    //             contents.forEach(c => c.classList.remove('active'));

    //             this.classList.add('active');
    //             document.getElementById(tabId).classList.add('active');
    //         });
    //     });

    //     // Activate the first tab and content by default
    //     if (tabs.length > 0) {
    //         tabs[0].classList.add('active');
    //         contents[0].classList.add('active');
    //     }
    // });
    $(document).ready(function () {
        const $tabs = $('.tab');
        const $contents = $('.tab-content');

        $tabs.on('click', function () {
            const tabId = $(this).data('tab');

            $tabs.removeClass('active');
            $contents.removeClass('active');

            $(this).addClass('active');
            $('#' + tabId).addClass('active');
        });

        // Activate the first tab and content by default
        if ($tabs.length > 0) {
            $tabs.first().addClass('active');
            $contents.first().addClass('active');
        }
    });
    // branches
    $(function() {
        var isComplete = false; // a status class to check if all divs are visible or not
        $(".insight-content .branch-pst-wr").slice(0, 1).show();
        
        $(".insight-content #loadMore").on('click', function(e) {
          e.preventDefault();
      
          if (isComplete === true) {
            $(".insight-content .branch-pst-wr").hide();
            isComplete = false;
            $(".insight-content #loadMore").text('Load More');
          }
      
          $(".insight-content .branch-pst-wr:hidden").slice(0, 1).slideDown();
      
          if ($(".insight-content .branch-pst-wr:hidden").length == 0) {
            $(".insight-content #loadMore").text('Load less');
            isComplete = true;
          }
      
          $('html,body').animate({
            scrollTop: $(this).offset().top
          }, 1500);
        });
      });

    $(document).ready(function () {
	
        // Lightbox function
        var lightbox = function(){
            var src = $('.active').attr('src');
            $('#lightbox img').attr('src', src);
        }
    
        // Image is clicked
        $('.gallery-detail img').click(function(){
            $('#lightbox').css('display','flex');
            $(this).addClass('active');
            lightbox();
        });
    
        // Close button clicked
        $('.close').click(function(){
            $('img').removeClass('active');
            $('#lightbox').hide();
        });
    
        // Next button clicked
        $('.next').click(function(){
            if( $('.active').parent('.gallery-detail').children('img:last').hasClass('active') ) {
                $('.active').removeClass().parent('.gallery-detail').children('img:first').addClass('active');
                lightbox();
            } else {
                $('.active').removeClass().next('img').addClass('active');
                lightbox();
            }
        });
        
        // Prev button clicked
        $('.prev').click(function(){
            if( $('.active').parent('.gallery').children('img:first').hasClass('active') ) {
                $('.active').removeClass().parent('.gallery-detail').children('img:last').addClass('active');
                lightbox();
            } else {
                $('.active').removeClass().prev('img').addClass('active');
                lightbox();
            }
        });
        
    });


    //id to timeline

    $(document).ready(function () {
        var items = $('.iteml');

        // Assign IDs to the items based on their order
        items.each(function (index) {
            $(this).attr('id', (index + 1).toString());
        });
    });

    $(document).ready(function () {
        var items = $('.wrapper-time .iteml');
        var links = $('.navigation a');

        // Assign IDs to corresponding anchors
        items.each(function (index) {
            var itemId = $(this).attr('id');
            var link = links.eq(index); // Get the corresponding link

            // Set the href attribute to link to the item ID
            link.attr('href', '#' + itemId);
        });
    });

    $(document).ready(function() {
        if ($('body').hasClass('single-property')) {
            $('.availability-to-let .branch-info a.btn-bn-light').attr('href', 'https://eu.jotform.com/form/251773767756373');
        }
    });
    

    // timelineeeeeeeeeeeee
    jQuery(document).ready(function ($) {
        // Smooth scrolling
        $('.navigation__link').bind('click', function (e) {
            e.preventDefault(); // prevent hard jump, the default behavior

            var target = $(this).attr("href"); // Set the target as variable

            // perform animated scrolling by getting top-position of target-element and set it as scroll target
            $('.wrapper-time').stop().animate({
                scrollTop: $(target).offset().top + $('.wrapper-time').scrollTop() - $('.wrapper-time').offset().top
            }, 800, function () {
                // location.hash = target; //attach the hash (#jumptarget) to the pageurl
            });

            return false;
        });

        // Scroll event handler
        $('.wrapper-time').scroll(function () {
            var scrollDistance = $('.wrapper-time').scrollTop();

            // Assign active class to nav links while scrolling
            $('.iteml').each(function (i) {
                // Calculate the middle point of the .outer div
                var outerHeight = $('.wrapper-time').height();
                var sectionTop = $(this).offset().top - $('.wrapper-time').offset().top + scrollDistance;
                var sectionMid = sectionTop + $(this).height() / 2;

                if (sectionMid <= scrollDistance + outerHeight / 1) {
                    $('.navigation a.active').removeClass('active');
                    $('.navigation a').eq(i).addClass('active');
                }
            });
        }).scroll(); // Trigger scroll handler on page load
    });

    $(document).ready(function () {
        // Add 'active' class to the first child
        $('.navigation .navigation__link:first-child').addClass('active');
    });
    $('.our-branches .tabs-content .tab-content:first').addClass('active');

});

jQuery('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
    var target = jQuery(e.target).attr('href');
    var $slider = jQuery(target).find('.inner-tabs.pr ul.properties');

    if ($slider.length > 0) {
        $slider.slick('refresh');
    }
});



// insight category tab
document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const activeTab = urlParams.get('tab');
    if (activeTab) {
        const tab = document.querySelector(`#categoryTabs button[data-bs-target="#${activeTab}"]`);
        if (tab) {
            const tabInstance = new bootstrap.Tab(tab);
            tabInstance.show();
        }
    }

    document.querySelectorAll('#categoryTabs button').forEach(tab => {
        tab.addEventListener('click', function () {
            const target = this.getAttribute('data-bs-target').substring(1);
            const params = new URLSearchParams(window.location.search);
            params.set('tab', target);
            const newUrl = window.location.pathname + '?' + params.toString();
            window.history.replaceState({}, '', newUrl);
        });
    });
});


