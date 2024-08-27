jQuery(document).ready(function($) {
    $('.main-popup .sub-menu').prepend('<div class="outer-item"><p class="prepend"></p><span class="cross-icon"></span></div>');
    $('.main-popup .menu-item-has-children').append('<span class="list-arrow"><i class="fa-solid fa-angle-right"></i>');
    $('.page-id-1190 .our-marketer .marketer-buttons a').append('<span><i class="fa-solid fa-angle-right"></i>');
    $('.menu .outer').click(function() {
        var $anchortext = $(this).children('a:first-child').text();
        $('.main-popup .sub-menu .prepend').html($anchortext);
    });
    //   $(document).ready(function() {
    //     $(".menu .outer a:first-child").click(function(event) {
    //         event.preventDefault();
    //     });
    // });
    $('.main-popup .outer').click(function() {
        $(this).children('.sub-menu').addClass('show');
    });
    // popup
    $('.hamburger-icn').click(function() {
        $('.page').toggleClass('show');
        $('.main-popup').toggleClass('active');
    });
    $(document).on('click', '.cross-icon', function() {
        $('.page').removeClass('show');
        $('.main-popup').removeClass('active');
        $(this).closest('ul.sub-menu').removeClass('show');
    });
    $(document).on('click', '.outer-item .prepend', function() {
        $(this).closest('ul.sub-menu').removeClass('show');
    });
    // slick refresh
    $(document).ready(function() {
        $('.nav-link').on('click', function() {
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
    $('.faqs-wrapper .faqs-item').on('click', function() {
        $(this).children('.bottom-bar').slideToggle(300);
        $(this).siblings().children('.bottom-bar').slideUp(300);
        $(this).siblings().removeClass('active');
        $(this).toggleClass('active');
    });


    // gallery slide
    $(document).ready(function() {
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
        $slider.on('afterChange', function(event, slick, currentSlide) {
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
    $('.filter-btn a').click(function() {
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
    $(window).scroll(function() {
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

    //id to timeline

    $(document).ready(function() {
        var items = $('.iteml');

        // Assign IDs to the items based on their order
        items.each(function(index) {
            $(this).attr('id', (index + 1).toString());
        });
    });

    $(document).ready(function() {
        var items = $('.wrapper-time .iteml');
        var links = $('.navigation a');

        // Assign IDs to corresponding anchors
        items.each(function(index) {
            var itemId = $(this).attr('id');
            var link = links.eq(index); // Get the corresponding link

            // Set the href attribute to link to the item ID
            link.attr('href', '#' + itemId);
        });
    });

    // timelineeeeeeeeeeeee
    jQuery(document).ready(function($) {
        // Smooth scrolling
        $('.navigation__link').bind('click', function(e) {
            e.preventDefault(); // prevent hard jump, the default behavior

            var target = $(this).attr("href"); // Set the target as variable

            // perform animated scrolling by getting top-position of target-element and set it as scroll target
            $('.wrapper-time').stop().animate({
                scrollTop: $(target).offset().top + $('.wrapper-time').scrollTop() - $('.wrapper-time').offset().top
            }, 800, function() {
                // location.hash = target; //attach the hash (#jumptarget) to the pageurl
            });

            return false;
        });

        // Scroll event handler
        $('.wrapper-time').scroll(function() {
            var scrollDistance = $('.wrapper-time').scrollTop();

            // Assign active class to nav links while scrolling
            $('.iteml').each(function(i) {
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

    $(document).ready(function() {
        // Add 'active' class to the first child
        $('.navigation .navigation__link:first-child').addClass('active');
    });
    $('.our-branches .tabs-content .tab-content:first').addClass('active');

});


// insight category tab
document.addEventListener('DOMContentLoaded', function() {
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
        tab.addEventListener('click', function() {
            const target = this.getAttribute('data-bs-target').substring(1);
            const params = new URLSearchParams(window.location.search);
            params.set('tab', target);
            const newUrl = window.location.pathname + '?' + params.toString();
            window.history.replaceState({}, '', newUrl);
        });
    });
});