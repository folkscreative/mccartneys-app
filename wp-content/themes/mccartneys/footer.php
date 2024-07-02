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
								<li><a href="<?php $social_link= get_sub_field('social_media_link'); 
								echo $echo;
								?>"><?php  $social_label = get_sub_field('social_media_label');
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
</div>

<?php wp_footer(); ?>

</body>
</html>




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

