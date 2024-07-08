<?php

/**
 * Template Name: Livestock Service
 */

get_header(); ?>

<main class="livestock page-wrap"> 
     <!-- Main Banner -->
        <section class="main-banner" style="background-image: url(http://localhost/mccartneys-app/wp-content/uploads/2024/07/livestock-bg.png);">
            <div class="container">
                <div class="breadcrumbs">
                    <ul>
                        <li>Home</li>
                        <li>Livestock</li>
                    </ul>
                </div>
                <div class="content">
                    <h1>Livestock Services</h1>
                    <p>Connecting Farmers and Markets for Generations</p>
                </div>
            </div>
        </section>
    <!-- Main Banner ends -->
    <section class="main-banner-sticky">
                <div class="banner-menu"> 
                    <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'Livestock-service-menu',
                            )
                        );
                        ?>
                </div>
        </section>
    <!-- Main Banner ends -->
    
    <!-- Department Services -->
    <section class="livestocks-departments">
        <div class="container">
            <div class="content">
                <h2>Our range of Livestock services</h2>
                <p>McCartneys provides comprehensive livestock services, including weekly primestock sales, store sales, pedigree sales, horse sales, and private dairy cattle exchanges. With a legacy of supporting the countryside economy, we operate in five main markets: Brecon, Kington, Knighton, Ludlow, and Worcester.</p>
            </div>
            
            <div class="slider-wrapper livestocks">
        
            <div class="slide-wrap">
                <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/prime-stock-img.png" alt="">
                <div class="inner-content">
                    <h4>Primestock Sale</h4>
                    <span class="divider"></span>
                    <div class="contex">
                    <p>lorem ipsum dolor sit amet dolor sit consectetur</p>
                    <a class="btn-rural" href="#">Read more</a>
                    </div>
                </div>
                </div>
                <div class="slide-wrap">
                <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/prime-stock-img.png" alt="">
                <div class="inner-content">
                    <h4>Store Sale</h4>
                    <span class="divider"></span>
                    <div class="contex">
                    <p>lorem ipsum dolor sit amet dolor sit consectetur</p>
                    <a class="btn-rural" href="#">Read more</a>
                    </div>
                </div>
                </div>
                <div class="slide-wrap">
                <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/prime-stock-img.png" alt="">
                <div class="inner-content">
                    <h4>Pedigree Sale</h4>
                    <span class="divider"></span>
                    <div class="contex">
                    <p>lorem ipsum dolor sit amet dolor sit consectetur</p>
                    <a class="btn-rural" href="#">Read more</a>
                    </div>
                </div>
                </div>
                <div class="slide-wrap">
                <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/prime-stock-img.png" alt="">
                <div class="inner-content">
                    <h4>Private Sale</h4>
                    <span class="divider"></span>
                    <div class="contex">
                    <p>lorem ipsum dolor sit amet dolor sit consectetur</p>
                    <a class="btn-rural" href="#">Read more</a>
                    </div>
                </div>
                </div>
                <div class="slide-wrap">
                <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/prime-stock-img.png" alt="">
                <div class="inner-content">
                    <h4>Primestock Sale</h4>
                    <span class="divider"></span>
                    <div class="contex">
                    <p>lorem ipsum dolor sit amet dolor sit consectetur</p>
                    <a class="btn-rural" href="#">Read more</a>
                    </div>
                </div>
                </div>
            </div>             
        </div>
     </section>
    <!-- Department Services -->

    <!-- Our Marketer section start here -->
    <section class="our-marketer">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="col-left">
                        <h2>About Our Markets</h2>
                        <p>At McCartneys, our livestock markets are the backbone of our agricultural services. We operate five main markets—Brecon, Kington, Knighton, Ludlow, and Worcester—providing robust platforms for weekly primestock sales, store sales,
                            pedigree sales, and horse sales. Our markets are not just transaction points but community hubs where farmers and buyers connect, ensuring the highest standards of animal welfare and market transparency.</p>
                            <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/farm-img.jpg" class="w-100 d-block d-md-none">
                        <div class="marketer-buttons">
                            <a href="#" class="btn-cs-dark">View more<span><i class="fa-solid fa-angle-right"></i></span></a>
                            <a href="#" class="btn-cs-white">LAA condtions of sale</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="col-right">
                        <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/farm-img.jpg" class="w-100 d-none d-md-block">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Marketer section ends here -->

    <!-- Cta banner -->
    <section class="cta-banner">
          <div class="container">
            <div class="row g-0 align-items-center" style="background-image: url(http://localhost/mccartneys-app/wp-content/uploads/2024/06/cta-bg.png);">
            
                <div class="col-12 col-md-5">
                    <div class="col-left">
                    <h2>Stay Updated with McCartneys</h2>
                    <p>Our newsletter delivers timely information on upcoming livestock auctions, market trends, and valuable insights directly to your inbox.</p>
                    <a class="btn-rural" href="#">Subscribe<span><i class="fa-solid fa-angle-right"></i></span></a>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="col-right">
                    <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/sheeps-image-hd.png" alt="" class="w-100 d-none d-md-block">
                    <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/sheep-image-mb.png" alt="" class="w-100 d-block d-md-none">
                    </div>
                </div>
            </div>
          </div>
        </section>
    <!-- Cta banner ends -->

    <!-- Livestock Auctioneers start here -->
    <section class="livestock-auctioneers d-none d-md-block">
        <div class="container">
            <div class="row g-4">
                <div class="col-4 col-lg-3">
                    <div class="livestock-auctioneers-content col-left">
                        <h2>Livestock Auctioneers</h2>
                        <p>Introducing the McCartneys team.</p>
                    </div>
                </div>
                <div class="col-4 col-lg-3">
                    <div class="livestock-auctioneers-content">
                        <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/man-with-cup-of-coffee.jpg" class="w-100">
                        <div class="team-content">
                            <h4>David Miller</h4>
                            <p>Partner & Auctioneer</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-lg-3">
                    <div class="livestock-auctioneers-content">
                        <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/man-with-cup-of-coffee.jpg" class="w-100">
                        <div class="team-content">
                            <h4>Sarah Jones</h4>
                            <p>Consultant</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-lg-3">
                    <div class="livestock-auctioneers-content">
                        <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/man-with-cup-of-coffee.jpg" class="w-100">
                        <div class="team-content">
                            <h4>Ethan Lee</h4>
                            <p>Consultant</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-lg-3">
                    <div class="livestock-auctioneers-content">
                        <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/man-with-cup-of-coffee.jpg" class="w-100">
                        <div class="team-content">
                            <h4>Zoe Wright</h4>
                            <p>Partner & Auctioneer</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-lg-3">
                    <div class="livestock-auctioneers-content">
                        <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/man-with-cup-of-coffee.jpg" class="w-100">
                        <div class="team-content">
                            <h4>Michael Thompson</h4>
                            <p>Partner & Auctioneer</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-lg-3">
                    <div class="livestock-auctioneers-content">
                        <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/man-with-cup-of-coffee.jpg" class="w-100">
                        <div class="team-content">
                            <h4>William Davis</h4>
                            <p>Consultant</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-lg-3">
                    <div class="livestock-auctioneers-content">
                        <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/man-with-cup-of-coffee.jpg" class="w-100">
                        <div class="team-content">
                            <h4>Madison Lee</h4>
                            <p>Associate Partner</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Livestock Auctioneers ends here -->

    <!-- Livestock Auctioneers for mobile start here -->
    <section class="livestock-auctioneers d-block d-md-none">
        <div class="container">
            <div class="row g-4">
                <div class="items">
                    <div class="livestock-auctioneers-content col-left">
                        <h2>Livestock Auctioneers</h2>
                        <p>Introducing the McCartneys team.</p>
                    </div>
                </div>
                </div>
                <div class="wrapp livestocks">
                <div class="items">
                    <div class="livestock-auctioneers-content">
                        <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/man-with-cup-of-coffee.jpg" class="w-100">
                        <div class="team-content">
                            <h4>David Miller</h4>
                            <p>Partner & Auctioneer</p>
                        </div>
                    </div>
                </div>
                <div class="items">
                    <div class="livestock-auctioneers-content">
                        <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/man-with-cup-of-coffee.jpg" class="w-100">
                        <div class="team-content">
                            <h4>Sarah Jones</h4>
                            <p>Consultant</p>
                        </div>
                    </div>
                </div>
                <div class="items">
                    <div class="livestock-auctioneers-content">
                        <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/07/man-with-cup-of-coffee.jpg" class="w-100">
                        <div class="team-content">
                            <h4>Ethan Lee</h4>
                            <p>Consultant</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Livestock Auctioneers for mobile ends here -->

    <!-- Livestock faqs -->
    <section class="livestock-faqs">
        <div class="container">
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="col-left">
                         <h2>Would you like to know more?</h2>
                         <p>For more information contact the relevant livestock market below.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                     <div class="faqs-wrapper">
                        <div class="faqs-item">
                             <div class="top-bar">
                                <h4>Brecon Livestock Market</h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                                 <h4>Kington Livestock Market</h4>
                                 <p>Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare.</p>
                                 <ul>
                                    <li><span>Love Lane, Kington, Herefordshire, HR5 3BT</span></li>
                                 </ul>
                                 <div class="phone">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#8CB85B" class="bi bi-telephone" viewBox="0 0 16 16">
                                 <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                </svg>
                                <a href="#">01544 231154</a>
                                 </div>
                             </div>
                             <span class="x-icon"><i class="fa-solid fa-xmark"></i></span>
                             </div>
                        </div>
                        <div class="faqs-item">
                             <div class="top-bar">
                                <h4>Brecon Livestock Market</h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                                 <h4>Kington Livestock Market</h4>
                                 <p>Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare.</p>
                                 <ul>
                                    <li><span>Love Lane, Kington, Herefordshire, HR5 3BT</span></li>
                                 </ul>
                                 <div class="phone">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#8CB85B" class="bi bi-telephone" viewBox="0 0 16 16">
                                 <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                </svg>
                                <a href="#">01544 231154</a>
                                 </div>
                             </div>
                             <span class="x-icon"><i class="fa-solid fa-xmark"></i></span>
                             </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Livestock faqs ends -->

    <!-- Events section start here -->
    <section class="events">
        <div class="container">

            <div class="wrapper" style="background-image: url('http://localhost/mccartneys-app/wp-content/uploads/2024/07/nature-beautiful-image.jpg')">
                
                    <div class="events-slider" style="background-image: url('http://localhost/mccartneys-app/wp-content/uploads/2024/07/events-bg-image.jpg')">
                        <div class="event-wrapper">
                            <h2>Next Event Name</h2>
                            <p>Lorem ipsum dolor sit amet <br>consectetur adipiscing eli mattis.</p>
                            <h3>21st July </h3>
                            <a class="btn-rural" href="#">View all events <span><i class="fa-solid fa-angle-right"></i></span></a>
                        </div>
                        <div class="event-wrapper">
                            <h2>Next Event Name</h2>
                            <p>Lorem ipsum dolor sit amet <br>consectetur adipiscing eli mattis.</p>
                            <h3>21st July </h3>
                            <a class="btn-rural" href="#">View all events <span><i class="fa-solid fa-angle-right"></i></span></a>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- Events section ends here -->

    <!-- Livestock faqs -->
    <section class="livestock-faqs faqs-wrap">
        <div class="container">
            <div class="row g-0">
                <div class="col-12">
                    <div class="col-left">
                         <h2>Frequently Asked Questions</h2>
                         <p>We're committed to providing clear and helpful information to ensure a seamless experience for all our clients. If you need further assistance, our dedicated team is always ready to help. Explore our FAQs to get started and make the most of McCartneys Livestock Services.</p>
                    </div>
                </div>
                <div class="col-12">
                     <div class="faqs-wrapper">
                        <div class="faqs-item">
                             <div class="top-bar">
                                <h4>Brecon Livestock Market</h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                                 <h4>Kington Livestock Market</h4>
                                 <p>Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare.</p>
                                 
                             </div>
                             <span class="x-icon"><i class="fa-solid fa-xmark"></i></span>
                             </div>
                        </div>
                        <div class="faqs-item">
                             <div class="top-bar">
                                <h4>Brecon Livestock Market</h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                                 <h4>Kington Livestock Market</h4>
                                 <p>Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare.</p>
                             </div>
                             <span class="x-icon"><i class="fa-solid fa-xmark"></i></span>
                             </div>
                        </div>
                        <div class="faqs-item">
                             <div class="top-bar">
                                <h4>Brecon Livestock Market</h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                                 <h4>Kington Livestock Market</h4>
                                 <p>Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare.</p>
                             </div>
                             <span class="x-icon"><i class="fa-solid fa-xmark"></i></span>
                             </div>
                        </div>
                        <div class="faqs-item">
                             <div class="top-bar">
                                <h4>Brecon Livestock Market</h4>
                                <span class="plus-icon"><i class="fa-solid fa-plus"></i></span>
                             </div>
                             <div class="bottom-bar">
                             <div class="content">
                                 <h4>Kington Livestock Market</h4>
                                 <p>Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare.</p>
                             </div>
                             <span class="x-icon"><i class="fa-solid fa-xmark"></i></span>
                             </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </section>
      
    <!-- Livestock faqs ends -->

    <!-- Testimonials -->
    <section class="testimonials">
         <div class="container"> 
            <div class="testimonial-box">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/icon-apostrophe.png" alt="">
            </div>
             <h2 class="title">Testimonial Title</h2>
            <div class="testimonial-slider wrapper">
            
            <div class="item">
            <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/06/review-rating-one.png" alt="">
                <p>“Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare”</p>
                <div class="inner-box">
                <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/06/author-img.png" alt="">
                <div class="position">
                <h4>Name</h4>
                <span>Position</span>
                </div>
                </div>
                </div>
                <div class="item">
            <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/06/review-rating-one.png" alt="">
                <p>“Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare”</p>
                <div class="inner-box">
                <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/06/author-img.png" alt="">
                <div class="position">
                <h4>Name</h4>
                <span>Position</span>
                </div>
                </div>
                </div>
                <div class="item">
            <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/06/review-rating-one.png" alt="">
                <p>“Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare”</p>
                <div class="inner-box">
                <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/06/author-img.png" alt="">
                <div class="position">
                <h4>Name</h4>
                <span>Position</span>
                </div>
                </div>
                </div>
                <div class="item">
            <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/06/review-rating-one.png" alt="">
                <p>“Lorem ipsum dolor sit amet dolor sit consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis volutpat onare”</p>
                <div class="inner-box">
                <img src="http://localhost/mccartneys-app/wp-content/uploads/2024/06/author-img.png" alt="">
                <div class="position">
                <h4>Name</h4>
                <span>Position</span>
                </div>
                </div>
                </div>
                </div>
         </div>
       </section>
        <!-- Testimonials ends -->

    <!-- Departments -->
    <section class="departments others">
        <div class="container">
            <div class="content">
                <?php if( get_field('our_departments_title', 'option') ): ?>
                        <h2><?php the_field('our_departments_title', 'option'); ?></h2>
                    <?php endif; ?>
                    <?php if( get_field('our_departments_description', 'option') ): ?>
                        <p><?php the_field('our_departments_description', 'option'); ?></p>
                    <?php endif; ?>
            </div>
            <?php if( have_rows('our_departments_slider', 'option') ): ?>
            <div class="depart-slider depar">
            <?php while( have_rows('our_departments_slider', 'option') ): the_row(); ?>
            <div class="slide-wrap">
            <?php
                $department_slider_bg_image = get_sub_field('our_departments_thumbnail', 'option');
                if( !empty($department_slider_bg_image) ):?>
                <img src="<?php echo $department_slider_bg_image['url']; ?>" alt="<?php echo $department_slider_bg_image['alt']; ?>">
                <?php endif; ?>
                <div class="inner-content">
                    <h3><?php the_sub_field('department_cart_title', 'option'); ?></h3>
                    <p><?php the_sub_field('department_cart_description', 'option'); ?></p>
                    <?php 
                        $department_cartneys_slider_link = get_sub_field('department_slider_button', 'option');
                        if( $department_cartneys_slider_link ): 
                            $department_cartneys_slider_link_url = $department_cartneys_slider_link['url'];
                            $department_cartneys_slider_link_title = $department_cartneys_slider_link['title'];
                            $department_cartneys_slider_link_target = $department_cartneys_slider_link['target'] ? $department_cartneys_slider_link['target'] : '_self';
                            ?>
                            <a class="btn-cs-light" href="<?php echo esc_url( $department_cartneys_slider_link_url ); ?>" target="<?php echo esc_attr( $department_cartneys_slider_link_target ); ?>"><?php echo esc_html( $department_cartneys_slider_link_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
                </div>
                </div>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>                     
        </div>
     </section>
     <!-- Departments ends -->

     <!-- Departments Insight -->
     <section class="departments insights-wrapper">
        <div class="container">
            <div class="content">
            <h2><?php the_field('insights_title', 'option'); ?></h2>
                <p><?php the_field('insights_description', 'option'); ?></p>
            </div>
            <div class="depart-slider insigh">
            <?php
                $args = array(
                    'post_type' => 'Insights',
                    'posts_per_page' => 10,
                );

                $insight_query = new WP_Query( $args );

                if ( $insight_query->have_posts() ) :
                    while ( $insight_query->have_posts() ) : $insight_query->the_post(); ?>
                        <div class="slide-wrap">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                            <div class="inner-content">
                                <h4><?php the_title(); ?></h4>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="btn-cs-light">Read more <span><i class="fa-solid fa-angle-right"></i></span></a>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No insights found.</p>';
                endif;
                ?>
            </div>
        </div>
     </section>
     <!-- Departments Insights ends -->





</main>

<?php get_footer();?>