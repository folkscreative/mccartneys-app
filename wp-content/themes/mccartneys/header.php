<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mccartneys
 */
// test

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

<!-- color change -->

<?php if ( is_page( 'phipps-pritchard' ) ) { ?>
<header class="site-header phipps-head d-none d-lg-block">
		<div class="top-nav">
		<div class="container">
			<div class="inner-wrap">
			<?php
			wp_nav_menu(
				array(
					'menu' => 'Header-top-menu',
				)
			);
			?>
			
			</div>
		</div>
		</div>

	<div class="main-header">
	<div class="container">
		<div class="header-inner-wrap">
		<?php
    	$website_logo = get_field('upload_logo', 'option');
		if( !empty($website_logo) ):?>
		<a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo $website_logo['url']; ?>" alt="<?php echo $website_logo['alt']; ?>"></a>
	<?php endif; ?>
		<div class="col-right">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			<?php 
				$header_main_btn = get_field('header_main_button', 'option');
				if( $header_main_btn ): 
					$header_main_btn_url = $header_main_btn['url'];
					$header_main_btn_title = $header_main_btn['title'];
					$header_main_btn_target = $header_main_btn['target'] ? $header_main_btn['target'] : '_self';
					?>
					<a class="btn-cs-darker zt-ovt-button" href="#"><?php echo esc_html( $header_main_btn_title ); ?></a>
				<?php endif; ?>
		</div>
		</div>
	</div>
	</header>

	<?php } else { ?>

<!-- default header -->
<header class="site-header d-none d-lg-block">
		<div class="top-nav">
		<div class="container">
			<div class="inner-wrap">
			<?php
			wp_nav_menu(
				array(
					'menu' => 'Header-top-menu',
				)
			);
			?>
			
			</div>
		</div>
		</div>

	<div class="main-header">
	<div class="container">
		<div class="header-inner-wrap">
		<?php
    	$website_logo = get_field('upload_logo', 'option');
		if( !empty($website_logo) ):?>
		<a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo $website_logo['url']; ?>" alt="<?php echo $website_logo['alt']; ?>"></a>
	<?php endif; ?>
		<div class="col-right">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			<?php 
				$header_main_btn = get_field('header_main_button', 'option');
				if( $header_main_btn ): 
					$header_main_btn_url = $header_main_btn['url'];
					$header_main_btn_title = $header_main_btn['title'];
					$header_main_btn_target = $header_main_btn['target'] ? $header_main_btn['target'] : '_self';
					?>
					<a class="btn-cs-darker zt-ovt-button" href="#"><?php echo esc_html( $header_main_btn_title ); ?></a>
				<?php endif; ?>
		</div>
		</div>
	</div>
	</header>
<?php }?>


	<!-- For Mobile -->
	<header class="header-mb-wrapper d-block d-lg-none">
		<div class="container">
			<div class="wrapper home">
				<a href="#" class="hamburger-icn">
				<img src="<?php echo get_template_directory_uri()?>/assets/images/hamburger-icon.svg" alt="">
				</a>
				<a href="<?php echo site_url(); ?>">
				<img src="<?php echo get_template_directory_uri()?>/assets/images/mask-group-home.svg" alt="" class="site-logo">
				</a>
					<a href="<?php echo site_url(); ?>/contact-us/"><img src="<?php echo get_template_directory_uri()?>/assets/images/call-home-btn.svg" alt="" class="search-icn"></a>
				

			</div>
			<div class="wrapper">
				<a href="#" class="hamburger-icn">
				<img src="<?php echo get_template_directory_uri()?>/assets/images/ham-icon-dark-mb.svg" alt="">
				</a>
				<a href="<?php echo site_url(); ?>">
				<img src="<?php echo get_template_directory_uri()?>/assets/images/site-logo-dark-mb.svg" alt="" class="site-logo">
				</a>
				<a href="<?php echo site_url(); ?>/contact-us/"><img src="<?php echo get_template_directory_uri()?>/assets/images/call-dark-btn.svg" alt="" class="search-icn"></a>
				
			</div>
		</div>
	</header>
<!-- Popup menu -->
 <div class="main-popup">
	<div class="container">
		<div class="menu-mb-top">
			<a href="<?php echo site_url(); ?>" class="site-logo">
			<img src="<?php echo get_template_directory_uri()?>/assets/images/Logo full colour.svg" alt="">
			</a>
			<img src="<?php echo get_template_directory_uri()?>/assets/images/cross-icon.svg" alt="" class="hamburger-icn">
		</div>
		<div class="inner">
			<div class="main-menu-header">
			<?php
			wp_nav_menu(
				array(
					'menu' => 'Header-menu-mobile',
				)
			);
			?>
			</div>
			<div class="top-menu-header">
			<?php
			wp_nav_menu(
				array(
					'menu' => 'Header-top-menu',
				)
			);
			?>
			<div class="valuation-btn zt-ovt-button"> 
				<?php 
				$header_main_btn = get_field('header_main_button', 'option');
				if( $header_main_btn ): 
					$header_main_btn_url = $header_main_btn['url'];
					$header_main_btn_title = $header_main_btn['title'];
					$header_main_btn_target = $header_main_btn['target'] ? $header_main_btn['target'] : '_self';
					?>
					<a href="<?php echo esc_url( $header_main_btn_url ); ?>" target="<?php echo esc_attr( $header_main_btn_target ); ?>"><?php echo esc_html( $header_main_btn_title ); ?></a>
				<?php endif; ?>
				<!-- <img src="<?php echo get_template_directory_uri()?>/assets/images/instant-valuation-icn.svg" alt=""> -->
			</div>
			</div>
		</div>
	</div>
 </div>
