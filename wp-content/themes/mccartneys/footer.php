<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mccartneys
 */

?>

	 <!-- Departments Insight -->
	 <?php if ( is_page( 'phipps-pritchard' ) ) { ?>
	 <section class="departments phipps insights-wrapper">
        <div class="container">
            <div class="content">
                <h2><?php the_field('insights_title', 'option'); ?></h2>
                <p><?php the_field('insights_description', 'option'); ?></p>
            </div>
            <div class="depart-slider insigh">
                <?php
                $args = array(
                    'post_type' => 'Post',
                    'posts_per_page' => 10,
                );

                $insight_query = new WP_Query( $args );

                if ( $insight_query->have_posts() ) :
                    while ( $insight_query->have_posts() ) : $insight_query->the_post(); ?>
                <div class="slide-wrap">
				<a href="<?php the_permalink(); ?>" class="btn-transparent">Read more</a>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                    <div class="inner-content">
                        <h4><?php the_title(); ?></h4>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="btn-cs-light">Read more <span><i
                        class="fa-solid fa-angle-right"></i></span></a>
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
	<?php } else { ?>


	 <!-- Departments Insight default -->
	 <section class="departments insights-wrapper">
        <div class="container">
            <div class="content">
                <h2><?php the_field('insights_title', 'option'); ?></h2>
                <p><?php the_field('insights_description', 'option'); ?></p>
            </div>
            <div class="depart-slider insigh">
                <?php
                $args = array(
                    'post_type' => 'Post',
                    'posts_per_page' => 10,
                );

                $insight_query = new WP_Query( $args );

                if ( $insight_query->have_posts() ) :
                    while ( $insight_query->have_posts() ) : $insight_query->the_post(); ?>
                <div class="slide-wrap">
				<a href="<?php the_permalink(); ?>" class="btn-transparent">Read more</a>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                    <div class="inner-content">
                        <h4><?php the_title(); ?></h4>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="btn-cs-light">Read more <span><i
                        class="fa-solid fa-angle-right"></i></span></a>
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
	<?php }?>
    <!-- Departments Insights ends -->



	<?php if ( is_page( 'phipps-pritchard' ) ) { ?>
	<footer class="footer-wrap phipps">
		<div class="container">
			<div class="row g-0">
				<div class="col-12 col-lg-6">
					<div class="col-left">
						<?php
						$ftr_logo = get_field('phipps_footer_logo', 'option');
						if( !empty($ftr_logo) ):?>
						<a href="<?php echo site_url(); ?>" class="footer-logo"><img src="<?php echo $ftr_logo['url']; ?>" alt="<?php echo $ftr_logo['alt']; ?>"></a>
					<?php endif; ?>
						<div class="connect-wrap">
							<?php if( get_field('connect_with_us', 'option') ): ?>
                        	<span><?php the_field('connect_with_us', 'option'); ?></span>
                    		<?php endif; ?>
							<?php if( have_rows('social_media_buttons', 'option') ): ?>
							<ul>
							<?php while( have_rows('social_media_buttons', 'option') ): the_row(); ?>
								<li><a href="<?php $social_link= the_sub_field('social_media_link'); 
								echo $echo;
								?>" target="_blank"><?php  $social_label = get_sub_field('social_media_label');
								echo $social_label;
								?></a></li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-6">
					<div class="col-right">
						<div class="links-wrapper">
							<div class="quick-links">
								<h3>Quick Links</h3>
								<?php
									wp_nav_menu(
										array(
											'menu' => 'Footer-quick-links',
										)
									);
									?>
							</div>
							<div class="depart-links">
								<h3>Departments</h3>
								<?php
									wp_nav_menu(
										array(
											'menu' => 'Departments',
										)
									);
									?>
							</div>
						</div>
					</div>
					<div class="mc-groups">
					<?php if( get_field('phipps_group_title', 'option') ): ?>
                        	<h3><?php the_field('phipps_group_title', 'option'); ?></h3>
                    		<?php endif; ?>
							
							
							<?php
								$ph_logo = get_field('phipps_group_image', 'option');
								if( !empty($ph_logo) ):?>
								<img src="<?php echo $ph_logo['url']; ?>" alt="<?php echo $ph_logo['alt']; ?>">
								<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="row g-0 align-items-center divider flex-column-reverse flex-lg-row">
				<div class="col-12 col-lg-9">
				<?php if( have_rows('footer_company_logos', 'option') ): ?>
							<div class="logos-wrap">
							<?php while( have_rows('footer_company_logos', 'option') ): the_row(); ?>
							<?php
								$partner_logo = get_sub_field('partners_logo_image', 'option');
								if( !empty($partner_logo) ):?>
								<img src="<?php echo $partner_logo['url']; ?>" alt="<?php echo $partner_logo['alt']; ?>">
								<?php endif; ?>
								<?php endwhile; ?>
								</div>
							<?php endif; ?>
				</div>
				<div class="col-12 col-lg-3">
					<div class="cookies-menu">
					<?php
						wp_nav_menu(
							array(
								'menu' => 'Privacy-Footer-Menu',
							)
						);
						?>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<?php } else { ?>


	<!-- default -->
	<footer class="footer-wrap">
		<div class="container">
			<div class="row g-0">
				<div class="col-12 col-lg-6">
					<div class="col-left">
						<?php
						$ftr_logo = get_field('upload_footer_logo', 'option');
						if( !empty($ftr_logo) ):?>
						<a href="<?php echo site_url(); ?>" class="footer-logo"><img src="<?php echo $ftr_logo['url']; ?>" alt="<?php echo $ftr_logo['alt']; ?>"></a>
					<?php endif; ?>
						<div class="connect-wrap">
							<?php if( get_field('connect_with_us', 'option') ): ?>
                        	<span><?php the_field('connect_with_us', 'option'); ?></span>
                    		<?php endif; ?>
							<?php if( have_rows('social_media_buttons', 'option') ): ?>
							<ul>
							<?php while( have_rows('social_media_buttons', 'option') ): the_row(); ?>
								<li><a href="<?php $social_link= the_sub_field('social_media_link'); 
								echo $echo;
								?>" target="_blank"><?php  $social_label = get_sub_field('social_media_label');
								echo $social_label;
								?></a></li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-6">
					<div class="col-right">
						<div class="links-wrapper">
							<div class="quick-links">
								<h3>Quick Links</h3>
								<?php
									wp_nav_menu(
										array(
											'menu' => 'Footer-quick-links',
										)
									);
									?>
							</div>
							<div class="depart-links">
								<h3>Departments</h3>
								<?php
									wp_nav_menu(
										array(
											'menu' => 'Departments',
										)
									);
									?>
							</div>
						</div>
					</div>
					<div class="mc-groups">
					<?php if( get_field('mc_group_title', 'option') ): ?>
                        	<h3><?php the_field('mc_group_title', 'option'); ?></h3>
                    		<?php endif; ?>
							<?php if( have_rows('social_media_buttons', 'option') ): ?>
							<div class="blocks">
							<?php while( have_rows('mc_group_images', 'option') ): the_row(); ?>
							<?php
								$mc_logo = get_sub_field('mc_group_image', 'option');
								if( !empty($mc_logo) ):?>
								<img src="<?php echo $mc_logo['url']; ?>" alt="<?php echo $mc_logo['alt']; ?>">
								<?php endif; ?>
								<?php endwhile; ?>
								</div>
							<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="row g-0 align-items-center divider flex-column-reverse flex-lg-row">
				<div class="col-12 col-lg-9">
				<?php if( have_rows('footer_company_logos', 'option') ): ?>
							<div class="logos-wrap">
							<?php while( have_rows('footer_company_logos', 'option') ): the_row(); ?>
							<?php
								$partner_logo = get_sub_field('partners_logo_image', 'option');
								if( !empty($partner_logo) ):?>
								<img src="<?php echo $partner_logo['url']; ?>" alt="<?php echo $partner_logo['alt']; ?>">
								<?php endif; ?>
								<?php endwhile; ?>
								</div>
							<?php endif; ?>
				</div>
				<div class="col-12 col-lg-3">
					<div class="cookies-menu">
					<?php
						wp_nav_menu(
							array(
								'menu' => 'Privacy-Footer-Menu',
							)
						);
						?>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<?php }?>

<?php wp_footer(); ?>

</body>
</html>



<script>
    document.getElementById('copyUrlButton').addEventListener('click', function() {
        // Get the current URL
        const url = window.location.href;
        
        // Create a temporary input element to hold the URL
        const tempInput = document.createElement('input');
        document.body.appendChild(tempInput);
        tempInput.value = url;

        // Select the text and copy it to the clipboard
        tempInput.select();
        document.execCommand('copy');

        // Remove the temporary input element
        document.body.removeChild(tempInput);

        // Update the status text to indicate the URL was copied
        document.getElementById('status').textContent = 'URL copied!';
    });
</script>
<!-- <button id="clickBtn">Click Me To See PopUp</button>
<div id="popup">
    <div class="popup-container">
        <div class="popup">
            <div class="close-popup" id="closeBtn"><a href="#">X</a></div>
            <h2>Custom Popup</h2>
            <p>
                This is a custom popup. You can just put any content behind it. Also you can apply any custom style in this popup.
            </p>
            <a href="#" class="popup-btn">View Details</a>
        </div>
    </div>
</div> -->

