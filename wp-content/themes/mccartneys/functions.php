<?php
/**
 * mccartneys functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mccartneys
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mccartneys_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on mccartneys, use a find and replace
		* to change 'mccartneys' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'mccartneys', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'mccartneys' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'mccartneys_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'mccartneys_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mccartneys_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mccartneys_content_width', 640 );
}
add_action( 'after_setup_theme', 'mccartneys_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mccartneys_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mccartneys' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mccartneys' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mccartneys_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mccartneys_scripts() {
	wp_enqueue_style( 'mccartneys-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'mccartneys-style', 'rtl', 'replace' );

	wp_enqueue_script( 'mccartneys-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mccartneys_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function mccartneys()
{
  
	// Register main stylesheet
	wp_enqueue_style( 'load-fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '', 'all');
	wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), '', 'all');
	wp_enqueue_style('style-cs', get_template_directory_uri() . '/assets/css/style.css','', 'all');

    // Adding scripts file in the footer
	wp_enqueue_script('Jquery','https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js', array('jquery'), '', true);
    wp_enqueue_script('load-fa-script','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js');
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '', 'all');
	wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array(), '', 'all');
	wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'mccartneys', 999);

// upload svg image
function enable_svg_upload( $upload_mimes ) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter( 'upload_mimes', 'enable_svg_upload', 10, 1 );

// hide editor
add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;
  $pagetitle = get_the_title($post_id);
  if($pagetitle == 'Home'){
    remove_post_type_support('page', 'editor');
  }
}


function register_my_menus() {
	register_nav_menus(
	  array('main-menu' => __( 'Main Menu' ) )
	);
  }
  
  add_action( 'init', 'register_my_menus' );
 

  function create_posttype() {
  
    register_post_type( 'insights',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Insights' ),
                'singular_name' => __( 'Insight' )
            ),
			'supports' => array('title','editor','author','thumbnail' ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'insights'),
            'show_in_rest' => true,
  
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


// shortcode
function custom_list_shortcode() {
    ?>
	<div class="news-wrapper-mega">
	<?php
		$args = array(
			'post_type' => 'Insights',
			'posts_per_page' => 1,
		);

		$insight_query = new WP_Query( $args );

		if ( $insight_query->have_posts() ) :
			while ( $insight_query->have_posts() ) : $insight_query->the_post(); ?>
				<div class="outer row gx-2 align-items-center">
					<div class="col-4 col-left"> 
					<img src="<?php the_post_thumbnail_url(); ?>" alt="">
					</div>
					<div class="col-6 col-right-text">
						<h4><?php the_title(); ?></h4>
						<a href="<?php the_permalink(); ?>"><span><i class="fa-solid fa-arrow-right"></i></span> Read more</a>
					</div>
				</div>
			<?php endwhile;
			wp_reset_postdata();
		else :
			echo '<p>No insights found.</p>';
		endif;
		?>
	</div>
	<?php
}
add_shortcode('custom_list', 'custom_list_shortcode');


// Register Custom Post Type
function create_property_cpt() {
    $labels = array(
        'name' => _x( 'Properties', 'Post Type General Name', 'textdomain' ),
        'singular_name' => _x( 'Property', 'Post Type Singular Name', 'textdomain' ),
        'menu_name' => _x( 'Properties', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar' => _x( 'Property', 'Add New on Toolbar', 'textdomain' ),
    );
    $args = array(
        'label' => __( 'Property', 'textdomain' ),
        'description' => __( 'Property Description', 'textdomain' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array( 'office' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type( 'property', $args );
}
add_action( 'init', 'create_property_cpt', 0 );

// Register Custom Taxonomy
function create_office_taxonomy() {
    $labels = array(
        'name' => _x( 'Offices', 'Taxonomy General Name', 'textdomain' ),
        'singular_name' => _x( 'Office', 'Taxonomy Singular Name', 'textdomain' ),
        'menu_name' => __( 'Offices', 'textdomain' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,

    );
    register_taxonomy( 'office', array( 'property' ), $args );
}
add_action( 'init', 'create_office_taxonomy', 0 );


// Register Custom Taxonomy
function create_property_type_taxonomy() {
    $labels = array(
        'name' => _x( 'Property Types', 'Taxonomy General Name', 'textdomain' ),
        'singular_name' => _x( 'Property Type', 'Taxonomy Singular Name', 'textdomain' ),
        'menu_name' => __( 'Property Types', 'textdomain' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy( 'property type', array( 'property' ), $args );
}
add_action( 'init', 'create_property_type_taxonomy', 0 );





// office tabs
function property_tabs_shortcode() {
    // Get all office categories
    $terms = get_terms( array(
        'taxonomy' => 'office',
        'hide_empty' => false,
    ) );

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        ob_start(); // Start output buffering

        echo '<ul class="nav nav-tabs" id="propertyTab" role="tablist">';
        $first_tab = true;
        foreach ( $terms as $term ) {
            echo '<li class="nav-item">';
            echo '<a class="nav-link' . ( $first_tab ? ' active' : '' ) . '" id="tab-' . esc_attr( $term->slug ) . '" data-bs-toggle="tab" href="#' . esc_attr( $term->slug ) . '" role="tab" aria-controls="' . esc_attr( $term->slug ) . '" aria-selected="' . ( $first_tab ? 'true' : 'false' ) . '">' . esc_html( $term->name ) . '</a>';
            echo '</li>';
            $first_tab = false;
        }
        echo '</ul>';

        echo '<div class="tab-content" id="propertyTabContent">';
        $first_tab = true;
        foreach ( $terms as $term ) {
            echo '<div class="tab-pane fade' . ( $first_tab ? ' show active' : '' ) . '" id="' . esc_attr( $term->slug ) . '" role="tabpanel" aria-labelledby="tab-' . esc_attr( $term->slug ) . '">';
            
            $query = new WP_Query( array(
                'post_type' => 'property',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'office',
                        'field'    => 'slug',
                        'terms'    => $term->slug,
                    ),
                ),
            ) );

if ( $query->have_posts() ) {?>
        <div class="outer-wrap">
			<?php
                while ( $query->have_posts() ) {
                    $query->the_post();?>

                    <div class="row g-0 flex-column-reverse flex-md-row">
						<div class="col-12 col-md-7">
						<div class="col-left">
							<h2 class="d-none d-md-block"><?php the_title();?></h2>
							<?php the_excerpt(); ?>
							
							<div class="sale-nmbr">
							<?php
							$sales_number_icon = get_field('sales_number_icon');
							if( !empty($sales_number_icon) ):?>
							<img src="<?php echo $sales_number_icon['url']; ?>" alt="<?php echo $sales_number_icon['alt']; ?>">
							<?php endif; ?>
							<span><?php the_field('sales_number');?></span>
							</div>
							
							<div class="sale-nmbr d-none d-md-block">
							<?php
							$letting_number_icon = get_field('lettings_number_icon');
							if( !empty($letting_number_icon) ):?>
							<img src="<?php echo $letting_number_icon['url']; ?>" alt="<?php echo $letting_number_icon['alt']; ?>">
							<?php endif; ?>
							<span><?php the_field('lettings_number');?></span>
							</div>
							<?php if( have_rows('office_category_location_home') ): ?>
							<ul class="office-cat-wrap">
							<?php while( have_rows('office_category_location_home') ): the_row(); ?>
								<li class="items-wrap">
								<?php
								$cat_pr_logo = get_sub_field('office_category_image');
								if( !empty($cat_pr_logo) ):?>
								<img src="<?php echo $cat_pr_logo['url']; ?>" alt="<?php echo $cat_pr_logo['alt']; ?>">
								<?php endif; ?>
								<span><?php the_sub_field('office_category_text'); ?></span>
								</li>
								<?php endwhile; ?>
								</ul>
								<?php endif; ?> 
								<div class="bottom-btn-wrap">
								<a href="<?php the_permalink(); ?>" class="btn-cs-dark">View more <span><i class="fa-solid fa-angle-right"></i></span></a>


								<?php if( have_rows('office_share_buttons') ): ?>
							<ul class="share-buttons-wrap d-none d-md-flex">
							<?php while( have_rows('office_share_buttons') ): the_row(); ?>
								
										<li class="item">

										<a href="<?php the_sub_field('location_share_button_link'); ?>">
										<?php
										$share_logo = get_sub_field('location_share_image');
										if( !empty($share_logo) ):?>
										<img src="<?php echo $share_logo['url']; ?>" alt="<?php echo $share_logo['alt']; ?>">
										<?php endif; ?>
										</a>
										</li>
									
								<?php endwhile; ?>
										</ul>
								<?php endif; ?>
								</div>
						</div>
						</div>
                    	
						<?php if ( has_post_thumbnail() ) {?>
                        <div class="col-12 col-md-5">
						<div class="col-right">
						<h2 class="d-block d-md-none"><?php the_title();?></h2>
                       <?php  the_post_thumbnail( 'full', array( 'class' => 'img-fluid' ) );?>   
					</div>
						</div>
                    <?php }?>
                </div>
                <?php }?>
                </div>
            <?php } else {?>
                <p>No properties found in this category.</p>
            <?php }

            wp_reset_postdata();?>
        </div>
            <?php $first_tab = false;
        }?>
        </div>

       <?php return ob_get_clean();
    }
}
add_shortcode( 'property_tabs', 'property_tabs_shortcode' );







// recent tabs
function recent_property_tabs_shortcode() {
    // Get all office categories
    $terms = get_terms( array(
        'taxonomy' => 'property type',
        'hide_empty' => false,
		'order'=>'DESC',
    ) );

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        ob_start(); // Start output buffering
		?>
		<div class="outer-wrapper">
		<h2 class="title">Recently Added Properties</h2>
		<?php
        echo '<ul class="nav nav-tabs" id="propertyTab" role="tablist">';
        $first_tab = true;
        foreach ( $terms as $term ) {
            echo '<li class="nav-item">';
            echo '<a class="nav-link' . ( $first_tab ? ' active' : '' ) . '" id="tab-' . esc_attr( $term->slug ) . '" data-bs-toggle="tab" href="#' . esc_attr( $term->slug ) . '" role="tab" aria-controls="' . esc_attr( $term->slug ) . '" aria-selected="' . ( $first_tab ? 'true' : 'false' ) . '">' . esc_html( $term->name ) . '</a>';
            echo '</li>';
            $first_tab = false;
        }
        echo '</ul>';
		?></div><?php
        echo '<div class="tab-content" id="propertyTabContent">';
        $first_tab = true;
        foreach ( $terms as $term ) {
            echo '<div class="tab-pane fade' . ( $first_tab ? ' show active' : '' ) . '" id="' . esc_attr( $term->slug ) . '" role="tabpanel" aria-labelledby="tab-' . esc_attr( $term->slug ) . '">';
            
            $query = new WP_Query( array(
                'post_type' => 'property',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'property type',
                        'field'    => 'slug',
                        'terms'    => $term->slug,
                    ),
                ),
            ) );

            if ( $query->have_posts() ) {?>
        <div class="inner-tabs pr">
			<?php
                while ( $query->have_posts() ) {
                    $query->the_post();?>

                    <div class="office-slider">
						<?php if ( has_post_thumbnail() ) {?>
						<div class="col-left">
                       <?php  the_post_thumbnail( 'full', array( 'class' => 'img-fluid' ) );?>   
					</div>
					<div class="col-right">
							<h4><?php the_title();?></h4>
							<?php the_excerpt(); ?>
							<ul class="features">
								<li>
								<img src="<?php echo get_template_directory_uri()?>/assets/images/bed-vector.svg" alt="">
								<span>0</span>
								</li> 
								<li>
								<img src="<?php echo get_template_directory_uri()?>/assets/images/bath-logo.svg" alt="">
								<span>0</span>
								</li> 
								<li>
								<img src="<?php echo get_template_directory_uri()?>/assets/images/sq-ft-logo.svg" alt="">
								<span>0 sq.ft</span>
								</li> 
						</ul>
						<p class="price">£000.000,00</p>
						</div>
                    <?php }?>
                </div>
                <?php }?>
                </div>
            <?php } else {?>
                <p style="margin: 25px 0;">No properties found in this category.</p>
            <?php }

            wp_reset_postdata();?>
        </div>
            <?php $first_tab = false;
        }?>
        </div>

       <?php return ob_get_clean();
    }
}
add_shortcode( 'recent_property_tabs', 'recent_property_tabs_shortcode' );