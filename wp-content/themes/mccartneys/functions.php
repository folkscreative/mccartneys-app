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
	define( '_S_VERSION', '1.0.1' );
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
    wp_enqueue_script( 'mccartneys-ph-search-features', get_template_directory_uri() . '/js/ph-search-features.js', array( 'jquery' ), _S_VERSION, true );
    wp_enqueue_script( 'jquery-ui-core', array( 'jquery' ), true );
    wp_enqueue_script( 'jquery-ui-slider', array( 'jquery' ), true );
    wp_enqueue_script( 'jquery-ui-touch-punch', get_template_directory_uri() . '/assets/js/jquery.ui.touch-punch.min.js', array('jquery', 'jquery-ui-core', 'jquery-ui-slider'), _S_VERSION, true );
    wp_enqueue_style( 'jquery-ui-css', get_template_directory_uri() . '/assets/css/jquery-ui.min.css', _S_VERSION );
    wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBA8L29YbEABF_9_LOdMzdoXt3gaLV3mWs&libraries=places', '', _S_VERSION , true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    if ( is_singular('property') ) {

        
        wp_enqueue_script( 'lightbox-js', get_template_directory_uri() . '/assets/js/glightbox.min.js', array( 'jquery' ), _S_VERSION, true );
        wp_enqueue_style( 'lightbox-css', get_template_directory_uri() . '/assets/css/glightbox.min.css', _S_VERSION );
        wp_enqueue_script(
            'single-property', 
            get_template_directory_uri() . '/js/single-property.js', 
            array('jquery'),
            _S_VERSION, 
            true 
        );
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
	// wp_enqueue_script('Jquery','https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery', true);
    wp_enqueue_script('load-lightbox-script','https://mreq.github.io/slick-lightbox/dist/slick-lightbox.js');
    wp_enqueue_script('load-fa-script','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js');
    wp_enqueue_script('load-zopla','https://api.zooplavaluations.co.uk/resource/widgetiframeloader?key=6c6f59de-0996-4851-8433-4da120b9a1e3');
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





// shortcode
function custom_list_shortcode() {
    ?>
<div class="news-wrapper-mega">
    <?php
		$args = array(
			'post_type' => 'post',
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


// case study shortcode
function custom_case_shortcode() {
    ?>
<div class="case-posts">
    <?php
$args = array(
    'post_type' => 'case-studies',
    'posts_per_page' => -1,
);

$case_query = new WP_Query( $args );

if ( $case_query->have_posts() ) :
    while ( $case_query->have_posts() ) : $case_query->the_post(); ?>
    <div class="outer row g-0">
        <div class="col-12 col-md-5 col-left">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
        </div>
        <div class="col-12 col-md-7 col-right-text align-content-center">
            <h4><strong><?php the_title(); ?>,</strong><?php the_field('case_study_sub_title');?></h4>
            <p><?php the_excerpt();?></p>
            <a href="<?php the_permalink(); ?>" class="btn-cs-dark">Read more<span><i
                        class="fa-solid fa-angle-right"></i></span></a>
        </div>
    </div>
    <?php endwhile;
    wp_reset_postdata();
else :
    echo '<p>No case study found.</p>';
endif;
?>
</div>
<?php
}
add_shortcode('custom_study_list', 'custom_case_shortcode');


// Register Custom Post Type
// Offices renamed to branches to avoid clash with PH inbuilt CPT
function create_branch_cpt() {
    $labels = array(
        'name' => _x( 'Branches', 'Post Type General Name', 'mccartneys' ),
        'singular_name' => _x( 'Branch', 'Post Type Singular Name', 'mccartneys' ),
        'menu_name' => _x( 'Branches', 'Admin Menu text', 'mccartneys' ),
        'name_admin_bar' => _x( 'Branches', 'Add New on Toolbar', 'mccartneys' ),
    );
    $args = array(
        'label' => __( 'Office', 'mccartneys' ),
        'description' => __( 'Office Description', 'mccartneys' ),
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
    register_post_type( 'branch', $args );
}
add_action( 'init', 'create_branch_cpt', 0 );

// Register Custom Taxonomy
function create_branch_taxonomy() {
    $labels = array(
        'name' => _x( 'Offices Location', 'Taxonomy General Name', 'mccartneys' ),
        'singular_name' => _x( 'Office Location', 'Taxonomy Singular Name', 'mccartneys' ),
        'menu_name' => __( 'Offices Location', 'mccartneys' ),
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
    register_taxonomy( 'office location', array( 'branch' ), $args );
}
add_action( 'init', 'create_branch_taxonomy', 0 );

// Register Custom Taxonomy FC office location
function create_fc_branch_taxonomy() {
    $labels = array(
        'name' => _x( 'Fc Offices Location', 'Taxonomy General Name', 'mccartneys' ),
        'singular_name' => _x( 'Fc Office Location', 'Taxonomy Singular Name', 'mccartneys' ),
        'menu_name' => __( 'Fc Offices Location', 'mccartneys' ),
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
    register_taxonomy( 'fc office location', array( 'branch' ), $args );
}
add_action( 'init', 'create_fc_branch_taxonomy', 0 );


// Register Custom Taxonomy
function create_property_type_taxonomy() {
    $labels = array(
        'name' => _x( 'Office Types', 'Taxonomy General Name', 'mccartneys' ),
        'singular_name' => _x( 'Office Type', 'Taxonomy Singular Name', 'mccartneys' ),
        'menu_name' => __( 'Office Types', 'mccartneys' ),
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
    register_taxonomy( 'office type', array( 'branch' ), $args );
}
add_action( 'init', 'create_property_type_taxonomy', 0 );

// office tabs
function property_tabs_shortcode() {
    // Get all office categories
    $terms = get_terms( array(
        'taxonomy' => 'office location',
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
                'post_type' => 'branch',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'office location',
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
                <h4 class="d-none d-md-block"><?php the_title();?></h4>
                <p><?php the_field('stree_no');?> <?php the_field('stree_name'); ?> <?php the_field('town'); ?>
                    <?php the_field('postcode'); ?></p>

                <?php if( get_field('sales_number') ): ?>
                <div class="sale-nmbr">
                    <img
                        src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/phone-icon-1.svg">
                    <span><strong>Sales </strong><a
                            href="tel:<?php the_field('sales_number');?>"><?php the_field('sales_number');?></a></span>
                </div>
                <?php endif;?>
                <?php if( get_field('lettings_number') ): ?>
                <div class="sale-nmbr d-none d-md-flex">
                    <img
                        src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/phone-icon-1.svg">
                    <span><strong>Lettings </strong><a
                            href="tel:<?php the_field('lettings_number');?>"><?php the_field('lettings_number');?></a></span>
                </div>
                <?php endif;?>
                <?php $properties_data=get_field('properties',get_the_ID());
								  $livestock_data=get_field('livestock',get_the_ID());
								 $planning_survey_data=get_field('planning_survey',get_the_ID());
								 $antiques_data=get_field('antiques',get_the_ID());
					             $equine_data=get_field('equine',get_the_ID());
								 $rural_data=get_field('rural',get_the_ID());
							?>

                <ul class="office-cat-wrap">
                    <?php if($properties_data=='True') { ?>
                    <li class="items-wrap">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/properties-vector-1.svg">
                        <span>Properties</span>
                    </li>
                    <?Php }
							?>
                    <?php if($livestock_data=='True') { ?>
                    <li class="items-wrap">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/livestock-logo-1.svg">
                        <span>Livestock</span>
                    </li>
                    <?Php }?>

                    <?php if($planning_survey_data=='True') { ?>
                    <li class="items-wrap">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/planning-logo-1.svg">
                        <span>Planning & Survey</span>
                    </li>
                    <?Php }?>

                    <?php if($antiques_data=='True') { ?>
                    <li class="items-wrap">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/antiques-logo-1.svg">
                        <span>Antiques</span>
                    </li>
                    <?Php }?>


                    <?php if($equine_data=='True') { ?>
                    <li class="items-wrap">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/07/equine-icon.svg">
                        <span>Equine</span>
                    </li>
                    <?Php }?>

                    <?php if($rural_data=='True') { ?>
                    <li class="items-wrap">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/07/rural-icon.svg">
                        <span>Rural</span>
                    </li>
                    <?Php }?>
                </ul>
                <div class="bottom-btn-wrap">
                    <a href="<?php the_permalink(); ?>" class="btn-cs-dark">View more <span><i
                                class="fa-solid fa-angle-right"></i></span></a>


                    <?php if( have_rows('office_share_buttons', 'option') ): ?>
                    <ul class="share-buttons-wrap d-none d-md-flex">
                        <?php while( have_rows('office_share_buttons','option') ): the_row(); ?>

                        <li class="item">

                            <a href="<?php the_sub_field('location_share_button_link'); ?>" target="_blank">
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
                <h4 class="d-block d-md-none"><?php the_title();?></h4>
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



// FC offices tabs
function Fc_property_tabs_shortcode() {
    // Get all office categories
    $terms = get_terms( array(
        'taxonomy' => 'fc office location',
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
                'post_type' => 'branch',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'fc office location',
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
                <h4 class="d-none d-md-block"><?php the_title();?></h4>
                <p><?php the_field('stree_no');?> <?php the_field('stree_name'); ?> <?php the_field('town'); ?>
                    <?php the_field('postcode'); ?></p>

                <?php if( get_field('sales_number') ): ?>
                <div class="sale-nmbr">
                    <img
                        src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/phone-icon-1.svg">
                    <span><strong>Sales </strong><a
                            href="tel:<?php the_field('sales_number');?>"><?php the_field('sales_number');?></a></span>
                </div>
                <?php endif;?>
                <?php if( get_field('lettings_number') ): ?>
                <div class="sale-nmbr d-none d-md-flex">
                    <img
                        src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/phone-icon-1.svg">
                    <span><strong>Lettings </strong><a
                            href="tel:<?php the_field('lettings_number');?>"><?php the_field('lettings_number');?></a></span>
                </div>
                <?php endif;?>
                <?php $properties_data=get_field('properties',get_the_ID());
								  $livestock_data=get_field('livestock',get_the_ID());
								 $planning_survey_data=get_field('planning_survey',get_the_ID());
								 $antiques_data=get_field('antiques',get_the_ID());
					             $equine_data=get_field('equine',get_the_ID());
								 $rural_data=get_field('rural',get_the_ID());
							?>

                <ul class="office-cat-wrap">
                    <?php if($properties_data=='True') { ?>
                    <li class="items-wrap">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/properties-vector-1.svg">
                        <span>Properties</span>
                    </li>
                    <?Php }
							?>
                    <?php if($livestock_data=='True') { ?>
                    <li class="items-wrap">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/livestock-logo-1.svg">
                        <span>Livestock</span>
                    </li>
                    <?Php }?>

                    <?php if($planning_survey_data=='True') { ?>
                    <li class="items-wrap">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/planning-logo-1.svg">
                        <span>Planning & Survey</span>
                    </li>
                    <?Php }?>

                    <?php if($antiques_data=='True') { ?>
                    <li class="items-wrap">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/antiques-logo-1.svg">
                        <span>Antiques</span>
                    </li>
                    <?Php }?>


                    <?php if($equine_data=='True') { ?>
                    <li class="items-wrap">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/07/equine-icon.svg">
                        <span>Equine</span>
                    </li>
                    <?Php }?>

                    <?php if($rural_data=='True') { ?>
                    <li class="items-wrap">
                        <img
                            src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/07/rural-icon.svg">
                        <span>Rural</span>
                    </li>
                    <?Php }?>
                </ul>
                <div class="bottom-btn-wrap">
                    <a href="<?php the_permalink(); ?>" class="btn-cs-dark">View more <span><i
                                class="fa-solid fa-angle-right"></i></span></a>


                    <?php if( have_rows('office_share_buttons', 'option') ): ?>
                    <ul class="share-buttons-wrap d-none d-md-flex">
                        <?php while( have_rows('office_share_buttons','option') ): the_row(); ?>

                        <li class="item">

                            <a href="<?php the_sub_field('location_share_button_link'); ?>" target="_blank">
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
                <h4 class="d-block d-md-none"><?php the_title();?></h4>
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
add_shortcode( 'fc_property_tabs', 'Fc_property_tabs_shortcode' );

// recent tabs
function recent_property_tabs_shortcode() {
    // Get all office categories
    $terms = get_terms( array(
        'taxonomy' => 'office type',
        'hide_empty' => false,
		'order'=>'DESC',
    ) );

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        ob_start(); // Start output buffering
		?>
<div class="outer-wrapper">
    <h2 class="title"><?php the_sub_field('recent_property_title'); ?></h2>
    <ul class="nav nav-tabs" id="propertyTab" role="tablist">
        <li class="nav-item" role="presentation"><a class="nav-link active" id="tab-sale" data-bs-toggle="tab"
                href="#sale" role="tab" aria-controls="sale" aria-selected="false" tabindex="-1">Sale</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link " id="tab-auction" data-bs-toggle="tab"
                href="#auction" role="tab" aria-controls="auction" aria-selected="true">Auction</a></li>

        <li class="nav-item" role="presentation"><a class="nav-link" id="tab-rent" data-bs-toggle="tab" href="#rent"
                role="tab" aria-controls="rent" aria-selected="false" tabindex="-1">Rent</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" id="tab-new-homes" data-bs-toggle="tab"
                href="#new-homes" role="tab" aria-controls="new-homes" aria-selected="false" tabindex="-1">New Homes</a>
        </li>
    </ul>
</div>
<div class="tab-content" id="propertyTabContent">

    <div class="tab-pane fade show active" id="sale" role="tabpanel" aria-labelledby="tab-sale">
        <!-- TAB CONTENT -->
    </div>

    <div class="tab-pane fade" id="auction" role="tabpanel" aria-labelledby="tab-auction">
        <!-- TAB CONTENT -->
    </div>

    <div class="tab-pane fade" id="rent" role="tabpanel" aria-labelledby="tab-rent">
        <!-- TAB CONTENT -->
    </div>
    <div class="tab-pane fade" id="new-homes" role="tabpanel" aria-labelledby="tab-new-homes">
        <!-- TAB CONTENT -->
    </div>

</div>



<?php
        echo '<div class="tab-content" id="propertyTabContent">';
        $first_tab = true;
        foreach ( $terms as $term ) {
            echo '<div class="tab-pane fade' . ( $first_tab ? ' show active' : '' ) . '" id="' . esc_attr( $term->slug ) . '" role="tabpanel" aria-labelledby="tab-' . esc_attr( $term->slug ) . '">';

            $query = new WP_Query( array(
                'post_type' => 'branch',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'office type',
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


// Hide Editor on Specific pages

function hide_editor_on_specific_pages() {
    global $pagenow;
    // Only do this check in the admin area and on post.php or post-new.php
    if (is_admin() && ($pagenow == 'post.php' || $pagenow == 'post-new.php')) {
        // Get the current post ID
        $post_id = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : '');

        // Get the post slug
        $post = get_post($post_id);
        $slug = $post ? $post->post_name : '';

        // Define an array of page slugs where you want to hide the editor
        $slugs_to_hide_editor = array('dairy-cattle-exchange', 'livestock-services', 'our-markets', 'pedigree-sales', 'primestock-sales', 'private-sales', 'show-dates', 'store-sales', 'agricultural-lettings', 'property-services', 'agricultural-sales', 'commercial-lettings', 'development-land', 'new-homes', 'residential-lettings', 'residential-sales', 'privacy-policy', 'terms', 'cookies', 'about-us', 'area-guides-bishops-castle', 'area-guides-brecon', 'area-guides-bridgnorth', 'area-guides-builth-wells', 'area-guides-church-stretton', 'area-guides-cleobury-mortimer', 'area-guides-cravern-arms', 'area-guides-hay-on-wye', 'area-guides-kidderminster', 'area-guides-kington', 'area-guides-knighton', 'area-guides-leominster', 'area-guides-llandrindod-wells', 'area-guides-ludlow', 'area-guides-newtown', 'area-guides-presteigne', 'area-guides-stourport-on-severn', 'area-guides-tenbury-wells', 'area-guides-welshpool', 'awards', 'buying-guide', 'career-opportunities', 'case-study', 'conditions-of-sale', 'contact-us', 'equine', 'e-brecon', 'equine-buy-auction', 'sales-dates', 'sales-reports', 'shetland-sales', 'society-sales', 'stud-reduction-sales', 'worcester', 'fine-art-antique', 'brecon', 'portcullis', 'insights', 'sales-report', 'phipps-pritchard', 'planning-service', 'architectural-services', 'diversification-schemes', 'house-survey', 'planning', 'planning-approvals', 'pre-planning-application', 'area-guide', 'commercial-sales', 'fine-country', 'property-land-for-auction', 'property-listing', 'property-search', 'rural-service', 'agricultural-mortgage-services', 'collective-machinery-sales', 'compulsory-purchase-compensation', 'entitlement-trading', 'farm-and-commercial-dispersal-sales', 'farm-subsidy-grant-schemes', 'grass-keep-fodder-standing-straw-sales', 'landlord-tennant-matters', 'renewable-energy', 'sale-lettings-of-land-and-farms', 'sales-auction', 'sales-dates', 'sales-private-treaty', 'sales-tender', 'valuations-rural-business', 'woodland-management', 'selling-guide', 'stamp-duty', 'supported-charities'); // Replace with your page slugs

        // Check if the current post slug is in the array
        if (in_array($slug, $slugs_to_hide_editor)) {
            // Remove the editor for this page
            remove_post_type_support('page', 'editor');
        }
    }
}
add_action('admin_head', 'hide_editor_on_specific_pages');


// create case studie post
function create_casestudy_posttype() {

    register_post_type( 'case-studies',
        // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Case Studies' ),
                'singular_name' => __( 'Case Study' ),
                'add_new' => __( 'Add New' ),
                'add_new_item' => __( 'Add New Case Study' ),
                'edit_item' => __( 'Edit Case Study' ),
                'new_item' => __( 'New Case Study' ),
                'view_item' => __( 'View Case Study' ),
                'search_items' => __( 'Search Case Studies' ),
                'not_found' => __( 'No Case Studies found' ),
                'not_found_in_trash' => __( 'No Case Studies found in Trash' ),
                'all_items' => __( 'All Case Studies' ),
                'archives' => __( 'Case Study Archives' ),
                'insert_into_item' => __( 'Insert into Case Study' ),
                'uploaded_to_this_item' => __( 'Uploaded to this Case Study' ),
                'featured_image' => __( 'Featured Image' ),
                'set_featured_image' => __( 'Set featured image' ),
                'remove_featured_image' => __( 'Remove featured image' ),
                'use_featured_image' => __( 'Use as featured image' ),
                'menu_name' => __( 'Case Studies' ),
                'filter_items_list' => __( 'Filter Case Studies list' ),
                'items_list_navigation' => __( 'Case Studies list navigation' ),
                'items_list' => __( 'Case Studies list' ),
            ),
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'case-studies' ),
            'show_in_rest' => true,
        )
    );
}

// Hooking up our function to theme setup
add_action( 'init', 'create_casestudy_posttype' );


// Extend PropertyHive with some features
// 1. Back to results feature
// Enable Sessions for WP PH Searches
// See Snippet here: https://docs.wp-property-hive.com/article/620-add-a-back-to-search-results-link-to-property-details-pages
add_action('init', 'my_start_session', 1);
function my_start_session()
{
    if (!session_id())
    {
        session_start();
    }
}

add_action('wp_logout', 'my_end_session');
add_action('wp_login', 'my_end_session');
function my_end_session()
{
    session_destroy();
}
// Store search query within session
add_action( 'init', 'set_last_search' );
function set_last_search()
{
    if ( !function_exists('ph_get_page_id') )
    {
        // Prevent fatal error, just in case Property Hive isn't active
        return false;
    }
    if ( !isset($_SESSION['last_search']) )
    {
        $_SESSION['last_search'] = '';
    }
    if (
        (strpos(
            "http://" . strtolower($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']),
            strtolower(get_permalink(ph_get_page_id( 'search_results' )))
        )
        !==
        FALSE)
        ||
        (strpos(
            "https://" . strtolower($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']),
            strtolower(get_permalink(ph_get_page_id( 'search_results' )))
        )
        !==
        FALSE)
    )
    {
        // if on the property search pages and a query string set
        $_SESSION['last_search'] = $_SERVER['REQUEST_URI'];
        if (strpos($_SERVER['REQUEST_URI'], '?') === FALSE)
        {
            $_SESSION['last_search'] = $_SERVER['REQUEST_URI'] . '?' . $_SERVER['QUERY_STRING'];
        }
    }
    session_write_close();
}

// 2. Include Sold STC
// See snippet here: https://docs.wp-property-hive.com/article/613-add-include-sold-stc-checkbox-to-search-forms
add_action( 'pre_get_posts', 'remove_sold_stc_by_default' );
function remove_sold_stc_by_default( $q ) 
{
    if (is_admin())
        return;

    if ( defined('DOING_CRON') && DOING_CRON )
        return;

    if (!$q->is_post_type_archive('property') && !$q->is_tax(get_object_taxonomies('property')))
        return;

    if (isset($_GET['shortlisted']))
        return;

    $tax_query = $q->get('tax_query');

    if ( !isset($_REQUEST['include_sold_stc']) ) 
    {
        if (!is_array($tax_query)) { $tax_query = array(); }

        // NOTE: change (10, 14) to the IDS of 'For Sale' and 'To Let'
        // These can be found under 'Property Hive > Setting > Custom Fields'
        $tax_query[] = array(
            'taxonomy' => 'availability',
            'field' => 'term_id',
            'terms' => array(103, 109), 
            'operator' => 'IN'
        );
    }

    $q->set('tax_query', $tax_query);
}

// add_filter( 'propertyhive_search_form_fields_after', 'remove_sold_stc_hidden', 10, 1 );
// function remove_sold_stc_hidden( $form_controls )
// {
//     if ( isset($form_controls['include_sold_stc']) ) 
//     {
//         unset($form_controls['include_sold_stc']);
//     }
//     return $form_controls;
// }

// 3. SEO Friendly Search Result URLs
// See snippet here: https://docs.wp-property-hive.com/article/618-creating-seo-friendly-search-results-urls
// add_filter( 'query_vars', 'propertyhive_register_query_vars' );
// function propertyhive_register_query_vars( $vars )
// {
//     $vars[] = 'property_search_criteria';
//     return $vars;
// }

// add_action( 'init', 'propertyhive_add_rewrite_rules' );
// function propertyhive_add_rewrite_rules()
// {
//     global $wp_rewrite;

//     $post = get_post( ph_get_page_id('search_results') );

//     if ( $post instanceof WP_Post )
//     {
//         add_rewrite_rule( $post->post_name . "/(.*)/{$wp_rewrite->pagination_base}/([0-9]{1,})/?$", 'index.php?post_type=property&property_search_criteria=$matches[1]&paged=$matches[2]', 'top' );
//         add_rewrite_rule( $post->post_name . "/(.*)/?$", 'index.php?post_type=property&property_search_criteria=$matches[1]', 'top' );
//     }
// }

// add_action( 'parse_request', 'propertyhive_parse_request' );
// function propertyhive_parse_request($wp_query)
// {
//     // First we do redirect if on the search page and have received the standard query string parameters
//     if ( !is_admin() && !isset($wp_query->query_vars['property']) && isset($wp_query->query_vars['post_type']) && $wp_query->query_vars['post_type'] == 'property' && !isset($wp_query->query_vars['p']) && !isset($wp_query->query_vars['name']) )
//     {
//         $new_url_segments = array();
//         if ( !empty($_GET) )
//         {
//             foreach ( $_GET as $key => $value )
//             {
//                 if ( is_array($value) )
//                 {
//                     $value = 'multi-' . implode("|", $value);
// 		}
//                 if ( trim($value) != '' )
//                 {
//                     $new_url_segments[] = $key . '/' . urlencode($value);
//                 }
//             }
//             if ( !empty($new_url_segments) )
//             {
//                 wp_redirect( get_permalink( ph_get_page_id('search_results') ) . implode("/", $new_url_segments) . '/', 301 );
//                 exit();
//             }
//         }
//     }

//     // Now parse nice SEO URL back into $_GET
//     foreach ($wp_query->query_vars as $name => $value)
//     {
//         if ($name == 'property_search_criteria' && $value != '')
//         {
//             // Split property search criteria into blocks:
//             // department/X
//             // minimum_price/X
//             // etc
//             $segments = array_map(
//                 function($value) {
//                     return implode('/', $value);
//                 },
//                  array_chunk(explode('/', $value), 2)
//             );

//             // Now turn these into $_GET and $_REQUEST
//             foreach ($segments as $segment)
//             {
//                 $explode_segment = explode('/', $segment);
//                 $_GET[$explode_segment[0]] = strpos(urldecode($explode_segment[1]), 'multi-') !== FALSE ? explode("|", str_replace("multi-", "", urldecode($explode_segment[1]))) : urldecode($explode_segment[1]);
//                 $_REQUEST[$explode_segment[0]] = strpos(urldecode($explode_segment[1]), 'multi-') !== FALSE ? explode("|", str_replace("multi-", "", urldecode($explode_segment[1]))) : urldecode($explode_segment[1]);
//             }
//         }
//     }
// }

// 4. SEO Friendly Property URLs
// See snippet here: https://docs.wp-property-hive.com/article/619-creating-seo-friendly-property-details-urls
add_filter( 'post_type_link', 'customise_property_post_type_link', 10, 4 );
function customise_property_post_type_link( $post_link, $post, $leavename, $sample )
{
    if ( get_post_type($post->ID) == 'property' )
    {
        $property = new PH_Property($post->ID);

        $suffix = 'for-sale';
        if ( $property->department == 'residential-lettings' )
        {
            $suffix = 'to-rent';
        }

        $area = $property->address_three;
        if ( $area == '' )
        {
            $area = $property->address_four;
        }
        if ( $area == '' )
        {
            $area = $property->address_two;
        }
        if ( $area == '' )
        {
            $area = 'property';
        }

        $post_link = str_replace("/property/", "/property-" . $suffix . "/" . sanitize_title($area) . "/", $post_link);
    }

    return $post_link;
}

add_action( 'init', 'rewrites_init' );
function rewrites_init()
{
    add_rewrite_rule(
        'property-for-sale/([^/]+)/([^/]+)/?$',
        'index.php?post_type=property&name=$matches[2]',
        'top' );
    add_rewrite_rule(
        'property-to-rent/([^/]+)/([^/]+)/?$',
        'index.php?post_type=property&name=$matches[2]',
        'top' );
}


add_action( "propertyhive_property_imported_reapit_foundations_json", 'mcc_ph_import_maps', 10, 2 );
function mcc_ph_import_maps($post_id, $property)
{
    // Properties arriving from branch codes BRF, HOW, FCL, FCM or WPL should be assigned to the department Fine and Country.
    if ( isset( $property['officeIds'] ) && is_array( $property['officeIds'] ) && count( $property['officeIds'] ) > 0 )
    {
        foreach ( $property['officeIds'] as $office_id )
        {
            if ( $office_id == 'BRF' || $office_id == 'HOW' || $office_id == 'FCL' || $office_id == 'FCM' || $office_id == 'WPL' )
            {
                update_post_meta( $post_id, '_department', 'fine-and-country' );
            }
        }
    }
    
    // Properties arriving with a disposal containing Auction should be assigned to the Property & Land department.
    if ( isset($property['selling']['disposal']) && strtolower($property['selling']['disposal']) == 'auction' )
    {
        update_post_meta( $post_id, '_department', 'property-land-auctions' );
    }
    
    // Anything arriving with a type of Farm or Agricultural should be assigned to the Agricultural department
    if ( isset($property['type']) && ( in_array('farm', $property['type']) || in_array('agricultural', $property['type']) ) )
    {
        update_post_meta( $post_id, '_department', 'agricultural' );
    }

    
    // Anything received with a type of developmentOpportunity should be assigned to the Development Land department
    if ( isset($property['type']) && ( in_array('developmentOpportunity', $property['type']) ) )
    {
        update_post_meta( $post_id, '_department', 'development-land' );
    }
    
    // Anything received with no type
    // AND
    // a bedroom count of 0
    // AND
    // a situation containing Land, Paddock or Land/Paddock should also be assigned to The Agricultural department
    if ( 
        ( !isset($property['type']) || empty($property['type']) ) 
        && 
        empty($property['bedrooms'])
        &&
        ( isset($property['situation']) && ( 
            in_array('land', $property['situation']) || 
            in_array('paddock', $property['situation']) ) || 
            in_array('land/paddock', $property['situation']) ) 
        )
    {
        update_post_meta( $post_id, '_department', 'agricultural' );
    }

    // Assign parent department value depending on department
    // If you're in residential lettings, set parent to Lettings
    // Otherwise, set it to Sales
    if ($department == 'residential-lettings' || !empty($property['letting']) || $property['marketingMode'] == 'letting' ) {
        update_post_meta($post_id, '_parent_department', 'Lettings');
    } else {
        update_post_meta($post_id, '_parent_department', 'Sales');
    }

    // New Homes - if age contains "New", let's stick it in New Homes
    // Check if 'age' contains 'new'
    if (isset($property['age'])) {
    if (is_array($property['age'])) {
        // Convert all elements of the array to lowercase and check if 'new' is in the array
        if (in_array('new', array_map('strtolower', $property['age']))) {
            update_post_meta($post_id, '_department', 'new-homes');
        }
    } elseif (strtolower($property['age']) == 'new') {
        update_post_meta($post_id, '_department', 'new-homes');
    }
}

    
    // Anything NOT IN Residential lettings OR that is a commercial that is for sale will be assigned to a parent department of Sales.
    // PROPERTY HIVE COMMENT: Ensure the 'commercial' department is deactivated and this should happen by default. No snippet needed
}


// Populate post types dropdown
function populate_property_types_dropdown() {
    global $wp_query;

    // Get all post IDs from the entire search query (not just the current page)
    $all_post_ids_query = new WP_Query(array(
        's'              => get_search_query(),
        'post_type'      => $wp_query->query_vars['post_type'], // Ensure we match the post type from the main query
        'posts_per_page' => -1, // Get all posts, no pagination
        'fields'         => 'ids', // Only retrieve post IDs
    ));

    $all_post_ids = $all_post_ids_query->posts;

    // Determine which taxonomy to use based on the 'department' parameter
    $taxonomy = isset($_GET['department']) && $_GET['department'] === 'commercial' ? 'commercial_property_type' : 'property_type';

    // Get the terms associated with these post IDs
    $terms = get_terms(array(
        'taxonomy'   => $taxonomy,
        'object_ids' => $all_post_ids,
        'orderby'    => 'name',
        'order'      => 'ASC',
        'fields'     => 'all',  // To get all term data
        'hide_empty' => true,   // Hide terms with no associated posts
    ));

    // Check if we got terms and there were no errors
    if (!is_wp_error($terms) && !empty($terms)) {
        echo '<div class="search-form-control search-form-control--checkboxes search-form--type">';
        echo ' <div class="search-form-dropdown">';
        echo '<div class="search-form-dropdown--trigger">Property Type</div>';
        echo '<div class="search-form-dropdown--options">';
        echo '<label class="search-form-checkboxes--option' . esc_attr( $term->slug ) . ' show-all">';
        echo '<input type="checkbox" name="' . esc_attr($taxonomy) . '[]" checked value="">';
        echo '<span class="search-form-checkboxes--checkbox-label"></span>';
        echo 'Show All';
        echo '</label>';

        foreach ($terms as $term) {
            echo '<label class="search-form-checkboxes--option ' . esc_attr( $term->slug ) . '">';
            echo '<input type="checkbox" name="' . esc_attr($taxonomy) . '[]" value="' . esc_attr($term->term_id) . '">';
            echo '<span class="search-form-checkboxes--checkbox-label"></span>';
            echo esc_html($term->name);
            echo '</label>';
        }

        echo '</div>';
        echo '</div>';
        echo '</div>';
    } else {
        // Fallback in case no terms were found or there's an error
        display_fallback_property_types();
    }
}

function display_fallback_property_types() {
    echo '<div class="search-form-control search-form-control--checkboxes search-form--type">';
    echo ' <div class="search-form-dropdown">';
    echo '<div class="search-form-dropdown--trigger">Property Type</div>';
    echo '<div class="search-form-dropdown--options">';
    echo '<label class="search-form-checkboxes--option">';
    echo '<input type="checkbox" name="property_type[]" checked value="">';
    echo '<span class="search-form-checkboxes--checkbox-label"></span>';
    echo 'Show All';
    echo '</label>';
    echo '<label class="search-form-checkboxes--option"><input type="checkbox" name="property_type[]" value="69"><span class="search-form-checkboxes--checkbox-label"></span>Bungalow</label>';
    echo '<label class="search-form-checkboxes--option"><input type="checkbox" name="property_type[]" value="60"><span class="search-form-checkboxes--checkbox-label"></span>House</label>';
    echo '<label class="search-form-checkboxes--option"><input type="checkbox" name="property_type[]" value="62"><span class="search-form-checkboxes--checkbox-label"></span>Semi-Detached House</label>';
    echo '<label class="search-form-checkboxes--option"><input type="checkbox" name="property_type[]" value="61"><span class="search-form-checkboxes--checkbox-label"></span>Detached House</label>';
    echo '<label class="search-form-checkboxes--option"><input type="checkbox" name="property_type[]" value="63"><span class="search-form-checkboxes--checkbox-label"></span>Terraced House</label>';
    echo '<label class="search-form-checkboxes--option"><input type="checkbox" name="property_type[]" value="74"><span class="search-form-checkboxes--checkbox-label"></span>Flat/Apartment</label>';
    echo '<label class="search-form-checkboxes--option"><input type="checkbox" name="property_type[]" value="93"><span class="search-form-checkboxes--checkbox-label"></span>Farm</label>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}




// PH MCC Search Form shortcode
function mcc_ph_search() {

    ?>

<form class="property-search"
    action="<?php echo apply_filters( 'propertyhive_search_form_action', get_post_type_archive_link( 'property' ) ); ?>"
    method="get" role="form">
    <div class="search-form-control search-form--radio-toggle">
        <input type="radio" id="_parent_department_sales" name="_parent_department" value="Sales">
        <label for="_parent_department_sales">BUY</label>
        <input type="radio" id="_parent_department_lettings" name="_parent_department" value="Lettings">
        <label for="_parent_department_lettings">RENT</label>
    </div>
    <div class="search-font-control search-form--filter-drawer-trigger">
        <span class="filter-draw-trigger">Filters <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17"
                viewBox="0 0 18 17" fill="none" class="icon_open">
                <path
                    d="M0.557314 2.90364H9.94183C10.1923 3.92033 11.0981 4.67725 12.1776 4.67725C13.2571 4.67725 14.1628 3.92033 14.4133 2.90364H17.2822C17.5898 2.90364 17.8395 2.65051 17.8395 2.33863C17.8395 2.02675 17.5898 1.77361 17.2822 1.77361H14.4133C14.1628 0.756925 13.2571 0 12.1776 0C11.098 0 10.1923 0.756925 9.94183 1.77361H0.557314C0.249684 1.77361 0 2.02675 0 2.33863C0 2.65051 0.24887 2.90364 0.557314 2.90364ZM12.1776 1.13003C12.8344 1.13003 13.3697 1.67188 13.3697 2.33863C13.3697 3.00538 12.8352 3.54723 12.1776 3.54723C11.5207 3.54723 10.9854 3.00538 10.9854 2.33863C10.9854 1.67188 11.5199 1.13003 12.1776 1.13003ZM17.2815 8.03177H6.96685C6.71635 7.01508 5.81061 6.25815 4.73111 6.25815C3.65162 6.25815 2.74586 7.01508 2.49538 8.03177H0.55746C0.24983 8.03177 0.000146221 8.2849 0.000146221 8.59678C0.000146221 8.90866 0.24983 9.1618 0.55746 9.1618H2.49538C2.74588 10.1785 3.65162 10.9354 4.73111 10.9354C5.81061 10.9354 6.71637 10.1785 6.96685 9.1618H17.2824C17.59 9.1618 17.8397 8.90866 17.8397 8.59678C17.8389 8.2849 17.59 8.03177 17.2815 8.03177ZM4.73111 9.80538C4.07426 9.80538 3.53899 9.26353 3.53899 8.59678C3.53899 7.93003 4.07345 7.38818 4.73111 7.38818C5.38796 7.38818 5.92242 7.93003 5.92324 8.59595V8.59678V8.59761C5.92242 9.26354 5.38796 9.80538 4.73111 9.80538ZM17.2815 14.0964H11.3804C11.1299 13.0797 10.2242 12.3227 9.14472 12.3227C8.06522 12.3227 7.15946 13.0797 6.90898 14.0964H0.557523C0.249893 14.0964 0.000208873 14.3495 0.000208873 14.6614C0.000208873 14.9733 0.249893 15.2264 0.557523 15.2264H6.90898C7.15948 16.2431 8.06522 17 9.14472 17C10.2242 17 11.13 16.2431 11.3804 15.2264H17.2824C17.59 15.2264 17.8397 14.9733 17.8397 14.6614C17.8389 14.3495 17.59 14.0964 17.2815 14.0964ZM9.14472 15.87C8.48787 15.87 7.95259 15.3281 7.95259 14.6614C7.95259 13.9954 8.48705 13.4528 9.14472 13.4528C9.80157 13.4528 10.336 13.9946 10.3368 14.6605V14.6614V14.6622C10.336 15.3281 9.80157 15.87 9.14472 15.87Z"
                    fill="#7F1B4E" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none"
                class="icon_close" ">
                <path
                    d=" M10.8118 9.12385C11.0627 9.35549 11.0627 9.73114 10.8118 9.96353C10.6887 10.0719 10.527 10.1343
                10.3564 10.1373C10.1859 10.1373 10.0226 10.0749 9.90194 9.96353L5.5 5.90102L1.09806 9.96353C0.977397
                10.0749 0.814096 10.1373 0.643558 10.1373C0.473016 10.1343 0.311317 10.0719 0.188248 9.96353C-0.0627494
                9.73114 -0.0627494 9.35549 0.188248 9.12385L4.59018 5.06134L0.188248 0.998824C-0.0474482 0.764956
                -0.0410229 0.400442 0.204337 0.174005C0.449698 -0.0524309 0.844683 -0.0583797 1.09807 0.159157L5.50001
                4.22167L9.90194 0.159157C10.1553 -0.0583655 10.5503 -0.0524356 10.7957 0.174005C11.041 0.400447 11.0475
                0.764975 10.8118 0.998824L6.40983 5.06134L10.8118 9.12385Z" fill="#7F1B4E" />
            </svg></span>
    </div>
    <div class="search-form-control search-form--location">
        <input type="text" placeholder="Location" name="address_keyword" id="address_keyword">
    </div>
    <div class="search-form-control search-form-control--filter-draw">
        <div class="search-form-control search-form-control--dropdown search-form--radius">
            <div class="search-form-dropdown">
                <div class="search-form-dropdown--trigger">Search Radius</div>
                <div class="search-form-dropdown--options">
                    <label class="search-form-dropdown--option selected">
                        <input type="radio" name="radius" value="" checked>
                        <span>+ 0 miles</span>
                    </label>
                    <label class="search-form-dropdown--option">
                        <input type="radio" name="radius" value="0.25">
                        <span>+ 1/4 miles</span>
                    </label>
                    <label class="search-form-dropdown--option">
                        <input type="radio" name="radius" value="1">
                        <span>+ 1 miles</span>
                    </label>
                    <label class="search-form-dropdown--option">
                        <input type="radio" name="radius" value="3">
                        <span>+ 3 miles</span>
                    </label>
                    <label class="search-form-dropdown--option">
                        <input type="radio" name="radius" value="5">
                        <span>+ 5 miles</span>
                    </label>
                    <label class="search-form-dropdown--option">
                        <input type="radio" name="radius" value="10">
                        <span>+ 10 miles</span>
                    </label>
                    <label class="search-form-dropdown--option">
                        <input type="radio" name="radius" value="20">
                        <span>+ 20 miles</span>
                    </label>
                    <label class="search-form-dropdown--option">
                        <input type="radio" name="radius" value="30">
                        <span>+ 30 miles</span>
                    </label>
                    <label class="search-form-dropdown--option">
                        <input type="radio" name="radius" value="40">
                        <span>+ 40 miles</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Sales Pricing - Slider -->
        <div class="search-form-control search-form-control--dropdown search-form--price-slider">
            <div class="search-form-dropdown">
                <div class="search-form-dropdown--trigger trigger--price">Price</div>
                <div class="search-form-dropdown--options">
                    <!-- Sales Pricing Slider -->
                    <div class="range-slider sales-only">
                        <div id="sales-slider-range"></div>
                        <div class="range-values">
                            <div class="price-wrap minWrap">
                                <span class="price-title minTitle">Min. Price</span>
                                <span id="minValueSales">£0</span>
                            </div>
                            <div class="price-wrap maxWrap">
                                <span class="price-title maxTitle">Max. Price</span>
                                <span id="maxValueSales">£3,500,000</span>
                            </div>
                        </div>
                        <input type="hidden" name="minimum_price" id="minimum_price_input">
                        <input type="hidden" name="maximum_price" id="maximum_price_input">
                        <input type="hidden" name="commercial_minimum_price" id="commercial_minimum_price_input">
                        <input type="hidden" name="commercial_maximum_price" id="commercial_maximum_price_input">
                    </div>

                    <!-- Rental Pricing Slider -->
                    <div class="range-slider lettings-only" style="display: none;">
                        <div id="lettings-slider-range"></div>
                        <div class="range-values">
                            <div class="price-wrap minWrap">
                                <span class="price-title minTitle">Min. Rent</span>
                                <span id="minValueLettings">£0 pcm</span>
                            </div>
                            <div class="price-wrap maxWrap">
                                <span class="price-title maxTitle">Max. Rent</span>
                                <span id="maxValueLettings">£5,000 pcm</span>
                            </div>
                        </div>
                        <input type="hidden" name="minimum_rent" id="minimum_rent_input">
                        <input type="hidden" name="maximum_rent" id="maximum_rent_input">
                        <input type="hidden" name="commercial_minimum_rent" id="commercial_minimum_rent_input">
                        <input type="hidden" name="commercial_maximum_rent" id="commercial_maximum_rent_input">
                    </div>

                </div>
            </div>
        </div>



        <?php 
        populate_property_types_dropdown(); ?>
        <div class="search-form-control search-form-control--checkboxes search-form--department">
            <div class="search-form-dropdown">
                <div class="search-form-dropdown--trigger">Department</div>
                <div class="search-form-dropdown--options">
                    <label class="search-form-checkboxes--option">
                        <input type="checkbox" name="department" checked value="">
                        <span class="search-form-checkboxes--checkbox-label"></span>
                        Show All
                    </label>
                    <label class="search-form-checkboxes--option">
                        <input type="checkbox" name="department" value="residential-sales">
                        <span class="search-form-checkboxes--checkbox-label"></span>
                        Residential Sales
                    </label>
                    <label class="search-form-checkboxes--option">
                        <input type="checkbox" name="department" value="residential-lettings">
                        <span class="search-form-checkboxes--checkbox-label"></span>
                        Residential Lettings
                    </label>
                    <hr>
                    <label class="search-form-checkboxes--option">
                        <input type="checkbox" name="department" value="commercial">
                        <span class="search-form-checkboxes--checkbox-label"></span>
                        Commercial
                    </label>
                    <label class="search-form-checkboxes--option">
                        <input type="checkbox" name="department" value="agricultural">
                        <span class="search-form-checkboxes--checkbox-label"></span>
                        Agricultural
                    </label>
                    <label class="search-form-checkboxes--option">
                        <input type="checkbox" name="department" value="new-homes">
                        <span class="search-form-checkboxes--checkbox-label"></span>
                        New Homes
                    </label>
                    <hr>
                    <label class="search-form-checkboxes--option">
                        <input type="checkbox" name="department" value="fine-and-country">
                        <span class="search-form-checkboxes--checkbox-label"></span>
                        Fine & Country
                    </label>
                    <label class="search-form-checkboxes--option">
                        <input type="checkbox" name="department" value="property-land-auctions">
                        <span class="search-form-checkboxes--checkbox-label"></span>
                        Property & Land Auctions
                    </label>
                    <label class="search-form-checkboxes--option">
                        <input type="checkbox" name="department" value="development-land">
                        <span class="search-form-checkboxes--checkbox-label"></span>
                        Development Land
                    </label>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="commercial_for_sale_to_rent" id="commercial_for_sale_to_rent" value="">
    <input type="submit" value="search" class="search-form-control search-form-control--submit">
</form>



<?php
};

add_shortcode('property_search', 'mcc_ph_search');


// Replace the default search on the properties archive
// Remove the original propertyhive_search_form function
remove_action( 'propertyhive_before_search_results_loop', 'propertyhive_search_form', 10 );


// Deregister PH Default Styles
function dereg_ph_styles() {
    wp_deregister_style( 'propertyhive-general' );
}
add_action( 'wp_enqueue_scripts', 'dereg_ph_styles', 100 );

// Add some image sizes
add_image_size( 'property-square', 1024, 1024, true );



// Allow iframes for admin users
function allow_iframes_for_admins($allowedposttags) {
    if (current_user_can('administrator')) {
        $allowedposttags['iframe'] = array(
            'src'             => true,
            'width'           => true,
            'height'          => true,
            'frameborder'     => true,
            'allowfullscreen' => true,
        );
    }
    return $allowedposttags;
}
add_filter('wp_kses_allowed_html', 'allow_iframes_for_admins', 1);



//Office Accordian for mobile

function property_mobile_tabs_shortcode() {
    // Get all office categories
    $terms = get_terms( array(
        'taxonomy' => 'office location',
        'hide_empty' => false,
    ) );

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        ob_start(); // Start output buffering

        echo '<div class="accordion" id="propertyAccordion">'; // Accordion wrapper
        $first_item = true;
        foreach ( $terms as $term ) {
            $term_slug = esc_attr( $term->slug );
            $term_name = esc_html( $term->name );

            // Accordion item
            echo '<div class="accordion-item">';
            echo '<h2 class="accordion-header" id="heading-' . $term_slug . '">';
            echo '<button class="accordion-button' . ( $first_item ? '' : ' collapsed' ) . '" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-' . $term_slug . '" aria-expanded="' . ( $first_item ? 'true' : 'false' ) . '" aria-controls="collapse-' . $term_slug . '">';
            echo $term_name;
            echo '</button>';
            echo '</h2>';

            // Accordion body
            echo '<div id="collapse-' . $term_slug . '" class="accordion-collapse collapse' . ( $first_item ? ' show' : '' ) . '" aria-labelledby="heading-' . $term_slug . '" data-bs-parent="#propertyAccordion">';
            echo '<div class="accordion-body">';

            $query = new WP_Query( array(
                'post_type' => 'branch',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'office location',
                        'field'    => 'slug',
                        'terms'    => $term->slug,
                    ),
                ),
            ) );

            if ( $query->have_posts() ) {
                echo '<div class="outer-wrap">';
                while ( $query->have_posts() ) {
                    $query->the_post();

                    // Accordion content for each post
                    echo '<div class="row g-0 flex-column-reverse flex-md-row">';
                    echo '<div class="col-12 col-md-7">';
                    echo '<div class="col-left">';
                    echo '<h4 class="d-none d-md-block">' . get_the_title() . '</h4>';
                    echo '<p>' . get_field('stree_no') . ' ' . get_field('stree_name') . ' ' . get_field('town') . ' ' . get_field('postcode') . '</p>';

                    // Sales number
                    echo '<div class="sale-nmbr">';
                    echo '<img src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/phone-icon-1.svg">';
                    echo '<span><strong>Sales </strong><a href="tel:' . get_field('sales_number') . '">' . get_field('sales_number') . '</a></span>';
                    echo '</div>';

                    // Lettings number (shown only on larger screens)
                    echo '<div class="sale-nmbr d-none d-md-flex">';
                    echo '<img src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/phone-icon-1.svg">';
                    echo '<span><strong>Lettings </strong><a href="tel:' . get_field('lettings_number') . '">' . get_field('lettings_number') . '</a></span>';
                    echo '</div>';

                    // Categories list
                    echo '<ul class="office-cat-wrap">';
                    if(get_field('properties') == 'True') {
                        echo '<li class="items-wrap"><img src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/properties-vector-1.svg"><span>Properties</span></li>';
                    }
                    if(get_field('livestock') == 'True') {
                        echo '<li class="items-wrap"><img src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/livestock-logo-1.svg"><span>Livestock</span></li>';
                    }
                    if(get_field('planning_survey') == 'True') {
                        echo '<li class="items-wrap"><img src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/planning-logo-1.svg"><span>Planning & Survay</span></li>';
                    }
                    if(get_field('antiques') == 'True') {
                        echo '<li class="items-wrap"><img src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/antiques-logo-1.svg"><span>Antiques</span></li>';
                    }
                    if(get_field('equine') == 'True') {
                        echo '<li class="items-wrap"><img src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/07/equine-icon.svg"><span>Equine</span></li>';
                    }
                    if(get_field('rural') == 'True') {
                        echo '<li class="items-wrap"><img src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/07/rural-icon.svg"><span>Rural</span></li>';
                    }
                    echo '</ul>';

                    // View more and share buttons
                    echo '<div class="bottom-btn-wrap">';
                    echo '<a href="' . get_permalink() . '" class="btn-cs-dark">View more <span><i class="fa-solid fa-angle-right"></i></span></a>';
                    if( have_rows('office_share_buttons', 'option') ) {
                        echo '<ul class="share-buttons-wrap d-none d-md-flex">';
                        while( have_rows('office_share_buttons', 'option') ): the_row();
                            $share_logo = get_sub_field('location_share_image');
                            echo '<li class="item"><a href="' . get_sub_field('location_share_button_link') . '" target="_blank">';
                            if( !empty($share_logo) ) {
                                echo '<img src="' . $share_logo['url'] . '" alt="' . $share_logo['alt'] . '">';
                            }
                            echo '</a></li>';
                        endwhile;
                        echo '</ul>';
                    }
                    echo '</div>'; // .bottom-btn-wrap
                    echo '</div>'; // .col-left
                    echo '</div>'; // .col-12.col-md-7

                    // Post thumbnail
                    if ( has_post_thumbnail() ) {
                        echo '<div class="col-12 col-md-5">';
                        echo '<div class="col-right">';
                        echo '<h4 class="d-block d-md-none">' . get_the_title() . '</h4>';
                        the_post_thumbnail( 'full', array( 'class' => 'img-fluid' ) );
                        echo '</div>'; // .col-right
                        echo '</div>'; // .col-12.col-md-5
                    }

                    echo '</div>'; // .row.g-0
                } // endwhile
                echo '</div>'; // .outer-wrap
            } else {
                echo '<p>No properties found in this category.</p>';
            }

            wp_reset_postdata();
            echo '</div>'; // .accordion-body
            echo '</div>'; // .accordion-collapse
            echo '</div>'; // .accordion-item

            $first_item = false;
        } // endforeach

        echo '</div>'; // #propertyAccordion

        return ob_get_clean();
    }
}
add_shortcode( 'property_mobile_tabs', 'property_mobile_tabs_shortcode' );


// JSON Load Path
function my_acf_json_load_point( $paths ) {
    // Remove the original path (optional).
    unset($paths[0]);

    // Append the new path and return it.
    $paths[] = get_stylesheet_directory() . '/acf-json';

    return $paths;
}
add_filter( 'acf/settings/load_json', 'my_acf_json_load_point' );

// JSON Save Path
function my_acf_json_save_point( $path ) {
    // Update the path where ACF saves JSON data.
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}
add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );




// Sales date CPT
function register_sales_dates_cpt() {
    $labels = array(
        'name'               => _x('Sales Dates', 'post type general name'),
        'singular_name'      => _x('Sales Date', 'post type singular name'),
        'menu_name'          => __('Sales Dates'),
        'name_admin_bar'     => __('Sales Date'),
        'add_new'            => __('Add New'),
        'add_new_item'       => __('Add New Sales Date'),
        'edit_item'          => __('Edit Sales Date'),
        'new_item'           => __('New Sales Date'),
        'view_item'          => __('View Sales Date'),
        'all_items'          => __('All Sales Dates'),
        'search_items'       => __('Search Sales Dates'),
        'not_found'          => __('No Sales Dates found.'),
        'not_found_in_trash' => __('No Sales Dates found in Trash.'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 20,
        'supports'           => array('title', 'custom-fields'),
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'sales-dates'),
    );

    register_post_type('sales_dates', $args);
}
add_action('init', 'register_sales_dates_cpt');



// add meta boxes

function sales_dates_meta_boxes() {
    add_meta_box(
        'sales_dates_meta_box',
        'Sales Date Details',
        'sales_dates_meta_box_callback',
        'sales_dates'
    );
}
add_action('add_meta_boxes', 'sales_dates_meta_boxes');

function sales_dates_meta_box_callback($post) {
    // Retrieve existing values
   
    $show_date = get_post_meta($post->ID, 'show_date', true);
    $end_date = get_post_meta($post->ID, 'end_date', true);
    $location = get_post_meta($post->ID, 'location', true);
    $additional_info = get_post_meta($post->ID, 'additional_info', true);
    $enter_now = get_post_meta($post->ID, 'enter_now', true);
    $download_url = get_post_meta($post->ID, 'download_url', true);

    // Fields
    ?>
    
    <p>
        <label for="show_date">Show Date</label><br>
        <input type="date" id="show_date" name="show_date" value="<?php echo esc_attr($show_date); ?>" style="width: 100%;">
    </p>

    <p>
        <label for="end_date">End Date</label><br>
        <input type="date" id="end_date" name="end_date" value="<?php echo esc_attr($end_date); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="location">Location</label><br>
        <input type="text" id="location" name="location" value="<?php echo esc_attr($location); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="additional_info">Additional Information</label><br>
        <textarea id="additional_info" name="additional_info" style="width: 100%;"><?php echo esc_textarea($additional_info); ?></textarea>
    </p>
    <p>
        <label for="enter_now">Enter Now (URL)</label><br>
        <input type="url" id="enter_now" name="enter_now" value="<?php echo esc_url($enter_now); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="download_url">Download URL</label><br>
        <input type="url" id="download_url" name="download_url" value="<?php echo esc_url($download_url); ?>" style="width: 100%;">
    </p>
    <?php
}

function save_sales_dates_meta($post_id) {
    // Save custom fields
  
    if (array_key_exists('show_date', $_POST)) {
        update_post_meta($post_id, 'show_date', sanitize_text_field($_POST['show_date']));
    }
    if (array_key_exists('end_date', $_POST)) {
        update_post_meta($post_id, 'end_date', sanitize_text_field($_POST['end_date']));
    }
    if (array_key_exists('location', $_POST)) {
        update_post_meta($post_id, 'location', sanitize_text_field($_POST['location']));
    }
    if (array_key_exists('additional_info', $_POST)) {
        update_post_meta($post_id, 'additional_info', sanitize_textarea_field($_POST['additional_info']));
    }
    if (array_key_exists('enter_now', $_POST)) {
        update_post_meta($post_id, 'enter_now', esc_url_raw($_POST['enter_now']));
    }
    if (array_key_exists('download_url', $_POST)) {
        update_post_meta($post_id, 'download_url', esc_url_raw($_POST['download_url']));
    }
}
add_action('save_post', 'save_sales_dates_meta');



function register_show_type_taxonomy() {
    $labels = array(
        'name'              => _x('Show Types', 'taxonomy general name'),
        'singular_name'     => _x('Show Type', 'taxonomy singular name'),
        'search_items'      => __('Search Show Types'),
        'all_items'         => __('All Show Types'),
        'edit_item'         => __('Edit Show Type'),
        'add_new_item'      => __('Add New Show Type'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'show-type'),
    );

    register_taxonomy('show_type', array('sales_dates'), $args);
}
add_action('init', 'register_show_type_taxonomy');

/* Function to create the negotiator id from the property id */
function get_negotiatorId($propertyId){

    $access_token = get_access_token();
    if (!$access_token) {
        return false;
    }

    $api_url = "https://platform.reapit.cloud/properties/$propertyId";
    $response = wp_remote_get($api_url, array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $access_token,
            'api-version' => '2020-01-31',
            'reapit-customer' => 'MCC'
        )
    ));

    if (is_wp_error($response)) {
        echo '<p>Error: ' . $response->get_error_message() . '</p>';
        return false;
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);
    return $data['negotiatorId'];
}
/* Function to get the negotiator information from its ID */
function get_negotiatorsInfo($negotiatorId){

    $access_token = get_access_token();
    $negotiators_url = "https://platform.reapit.cloud/negotiators/".$negotiatorId;
$responseNeg = wp_remote_get($negotiators_url, array(
    'headers' => array(
        'Authorization' => 'Bearer ' . $access_token,
        'api-version' => '2020-01-31',
        'reapit-customer' => 'MCC'
    )
));

if (is_wp_error($responseNeg)) {
    echo '<p>Error: ' . $responseNeg->get_error_message() . '</p>';
    return false;
}
$bodyNeg = wp_remote_retrieve_body($responseNeg);
return json_decode($bodyNeg, true);
}
/*Function to generate the required access token */
function get_access_token()
{
    $client_id = '4h1h83g37v2488nk3qnbc9dhin';
    $client_secret = '1s1n72ic94njnlqsbl433tpaaqdnkso6olj9bo7rpb3es9255dsk';
    $auth_url = 'https://connect.reapit.cloud/token';

    $response = wp_remote_post($auth_url, array(
        'headers' => array(
            'Authorization' => 'Basic ' . base64_encode($client_id . ':' . $client_secret),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ),
        'body' => array(
            'grant_type' => 'client_credentials'
        )
    ));

    if (is_wp_error($response)) {
        echo '<p>Error: ' . $response->get_error_message() . '</p>';
        return false;
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    if (isset($data->access_token)) {
        return $data->access_token;
    } else {
        echo '<p>Failed to obtain access token. Response: ' . $body . '</p>';
        return false;
    }
}