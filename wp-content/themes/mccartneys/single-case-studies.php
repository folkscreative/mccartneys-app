<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mccartneys
 */

get_header();
?>

<main class="area-guide-sub-pages page-wrap"> 
     <!-- Inner Banner -->
    <?php if( have_rows('blocks') ): ?>
        <?php while( have_rows('blocks') ): the_row(); ?>
        <?php if( get_row_layout() == 'livestock_banner' ): ?>
           <?php
            $image_private = get_sub_field( 'livestock_background_image' );
            if ( !empty( $image_private ) ) { ?>
            <section class="box-banner single" style="background-image:url('<?php echo $image_private['url']; ?>');">
            <?php }?>
        <div class="container">
            <div class="content">
            <div class="breadcrumb"><?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?></div>
            <h2><?php the_sub_field('livestock_banner_title'); ?></h2>
            <p class="date">
                        <?php echo get_the_date('M/d/Y'); ?>
            </p>
            </div>
        </div>
     </section>
    <!-- Inner Bnner ends -->
    <?php endif; ?>
	<?Php endwhile;
	endif;?>

<section class="posts-single-data"> 
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-6">
				<div class="col-left">
					<h4>Summary</h4>
					<ul>
						<li>Lorem ipsum dolor</li>
						<li>Lorem ipsum dolor</li>
						<li>Lorem ipsum dolor</li>
					</ul>
					<p><strong><?php echo get_the_date('M d, Y'); ?></strong></p>
                    <p><strong>Created by <?php the_author(); ?></strong></p>
                    <p><?php $category = get_the_category(); echo $category[0]->cat_name; ?></p>
                    <h4>Share</h4>
                    <?php
                    // Facebook share URL
                    $facebookShareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url);

                    // LinkedIn share URL
                    $linkedinShareUrl = 'https://www.linkedin.com/sharing/share-offsite/?url=' . urlencode($url);

                    // Instagram profile URL
                    $instagramProfileUrl = 'https://www.instagram.com/your_username';
                    ?>

                    <a href="<?php echo $facebookShareUrl; ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/facebook-grey.svg" alt="">
                    </a>
                    
                    <!-- LinkedIn Share Button -->
                    <a href="<?php echo $linkedinShareUrl; ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/linkedin-grey.svg" alt="">
                    </a>
                    
                    <!-- Instagram Profile Button -->
                    <a href="<?php echo $instagramProfileUrl; ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/instagram-grey.svg" alt="">
                    </a>
                    
				</div>
			</div>
			<div class="col-12 col-sm-6">
				<div class="col-right">
					<?php the_content(); ?>
                    <div class="pagination">
					<?php previous_post_link('%link', '<span><i class="fa-solid fa-angle-left"></i></span> Back'); ?>
					<?php next_post_link('%link', 'Next <span><i class="fa-solid fa-angle-right"></i></span>'); ?>
				</div>
				</div>
			</div>
		</div>
		
	</div>
</section>

  <!-- Departments -->
  <section class="departments others">
        <div class="container">
            <div class="content">
                    <h2><?php the_field('our_departments_title', 'option'); ?></h2>
                    <p><?php the_field('our_departments_description', 'option'); ?></p>
            </div>
            <?php if( have_rows('our_departments_slider', 'option') ): ?>
            <div class="depart-slider depar">
            <?php while( have_rows('our_departments_slider', 'option') ): the_row(); ?>
            <div class="slide-wrap">
            <?php 
                        $department_cartneys_slider_link = get_sub_field('department_slider_button', 'option');
                        if( $department_cartneys_slider_link ): 
                            $department_cartneys_slider_link_url = $department_cartneys_slider_link['url'];
                            $department_cartneys_slider_link_title = $department_cartneys_slider_link['title'];
                            $department_cartneys_slider_link_target = $department_cartneys_slider_link['target'] ? $department_cartneys_slider_link['target'] : '_self';
                            ?>
                            <a class="btn-transparent" href="<?php echo esc_url( $department_cartneys_slider_link_url ); ?>" target="<?php echo esc_attr( $department_cartneys_slider_link_target ); ?>"><?php echo esc_html( $department_cartneys_slider_link_title ); ?><span><i class="fa-solid fa-angle-right"></i></span></a>
                        <?php endif; ?>
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
<?php
get_footer();
