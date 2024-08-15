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
	define( '_S_VERSION', '1.2.0' );
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
    wp_enqueue_script( 'mccartneys-ph-search-features', get_template_directory_uri() . '/js/ph-search-features.js', array(), _S_VERSION, true );

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
    wp_enqueue_script('load-lightbox-script','https://mreq.github.io/slick-lightbox/dist/slick-lightbox.js');
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
            <?php the_content();?>
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

                <div class="sale-nmbr">
                    <img
                        src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/phone-icon-1.svg">
                    <span><strong>Sales </strong><?php the_field('sales_number');?></span>
                </div>

                <div class="sale-nmbr d-none d-md-flex">
                    <img
                        src="https://wordpress-1285863-4695980.cloudwaysapps.com/wp-content/uploads/2024/06/phone-icon-1.svg">
                    <span><strong>Lettings </strong><?php the_field('lettings_number');?></span>
                </div>

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
                        <span>Planning & Survay</span>
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
		?>
</div><?php
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
        $slugs_to_hide_editor = array('dairy-cattle-exchange', 'livestock-services', 'our-markets', 'pedigree-sales', 'primestock-sales', 'private-sales', 'show-dates', 'store-sales', 'agricultural-lettings', 'property-services', 'agricultural-sales', 'commercial-lettings', 'development-land', 'new-homes', 'residential-lettings', 'residential-sales'); // Replace with your page slugs

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
// add_action( 'pre_get_posts', 'remove_sold_stc_by_default' );
// function remove_sold_stc_by_default( $q ) 
// {
//     if (is_admin())
//         return;

//     if ( defined('DOING_CRON') && DOING_CRON )
//         return;

//     if (!$q->is_post_type_archive('property') && !$q->is_tax(get_object_taxonomies('property')))
//         return;

//     if (isset($_GET['shortlisted']))
//         return;

//     $tax_query = $q->get('tax_query');

//     if ( !isset($_REQUEST['include_sold_stc']) ) 
//     {
//         if (!is_array($tax_query)) { $tax_query = array(); }

//         // NOTE: change (10, 14) to the IDS of 'For Sale' and 'To Let'
//         // These can be found under 'Property Hive > Setting > Custom Fields'
//         $tax_query[] = array(
//             'taxonomy' => 'availability',
//             'field' => 'term_id',
//             'terms' => array(10, 14), 
//             'operator' => 'IN'
//         );
//     }

//     $q->set('tax_query', $tax_query);
// }

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
add_filter( 'query_vars', 'propertyhive_register_query_vars' );
function propertyhive_register_query_vars( $vars )
{
    $vars[] = 'property_search_criteria';
    return $vars;
}

add_action( 'init', 'propertyhive_add_rewrite_rules' );
function propertyhive_add_rewrite_rules()
{
    global $wp_rewrite;

    $post = get_post( ph_get_page_id('search_results') );

    if ( $post instanceof WP_Post )
    {
        add_rewrite_rule( $post->post_name . "/(.*)/{$wp_rewrite->pagination_base}/([0-9]{1,})/?$", 'index.php?post_type=property&property_search_criteria=$matches[1]&paged=$matches[2]', 'top' );
        add_rewrite_rule( $post->post_name . "/(.*)/?$", 'index.php?post_type=property&property_search_criteria=$matches[1]', 'top' );
    }
}

add_action( 'parse_request', 'propertyhive_parse_request' );
function propertyhive_parse_request($wp_query)
{
    // First we do redirect if on the search page and have received the standard query string parameters
    if ( !is_admin() && !isset($wp_query->query_vars['property']) && isset($wp_query->query_vars['post_type']) && $wp_query->query_vars['post_type'] == 'property' && !isset($wp_query->query_vars['p']) && !isset($wp_query->query_vars['name']) )
    {
        $new_url_segments = array();
        if ( !empty($_GET) )
        {
            foreach ( $_GET as $key => $value )
            {
                if ( is_array($value) )
                {
                    $value = 'multi-' . implode("|", $value);
		}
                if ( trim($value) != '' )
                {
                    $new_url_segments[] = $key . '/' . urlencode($value);
                }
            }
            if ( !empty($new_url_segments) )
            {
                wp_redirect( get_permalink( ph_get_page_id('search_results') ) . implode("/", $new_url_segments) . '/', 301 );
                exit();
            }
        }
    }

    // Now parse nice SEO URL back into $_GET
    foreach ($wp_query->query_vars as $name => $value)
    {
        if ($name == 'property_search_criteria' && $value != '')
        {
            // Split property search criteria into blocks:
            // department/X
            // minimum_price/X
            // etc
            $segments = array_map(
                function($value) {
                    return implode('/', $value);
                },
                 array_chunk(explode('/', $value), 2)
            );

            // Now turn these into $_GET and $_REQUEST
            foreach ($segments as $segment)
            {
                $explode_segment = explode('/', $segment);
                $_GET[$explode_segment[0]] = strpos(urldecode($explode_segment[1]), 'multi-') !== FALSE ? explode("|", str_replace("multi-", "", urldecode($explode_segment[1]))) : urldecode($explode_segment[1]);
                $_REQUEST[$explode_segment[0]] = strpos(urldecode($explode_segment[1]), 'multi-') !== FALSE ? explode("|", str_replace("multi-", "", urldecode($explode_segment[1]))) : urldecode($explode_segment[1]);
            }
        }
    }
}

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

// Assign parent department value depending on department
// If you're in residential lettings, set parent to Lettings
// Otherwise, set it to Sales
// function update_property_parent_department($post_id) {
//     // Ensure this only runs for 'property' post type in WordPress
//     if (get_post_type($post_id) !== 'property') {
//         return;
//     }

//     // Retrieve the department meta value
//     $department = get_post_meta($post_id, 'department', true);

//     // Conditional logic to set the _parent_department meta key
//     if ($department === 'residential-lettings') {
//         update_post_meta($post_id, '_parent_department', 'Lettings');
//     } else {
//         update_post_meta($post_id, '_parent_department', 'Sales');
//     }
// }

// // Hook into save_post to handle regular post saves
// add_action('save_post', 'update_property_parent_department');

// // Hook into Property Hive import process
// add_action('propertyhive_after_insert_property', 'update_property_parent_department');

add_action( "propertyhive_property_imported_reapit_foundations_json", 'mcc_ph_import_maps', 10, 2 );
function mcc_ph_import_maps($post_id, $property)
{
    // Properties arriving from branch codes BRE, HAY, LUD should be assigned to the department Fine and Country.
    if ( isset( $property['officeIds'] ) && is_array( $property['officeIds'] ) && count( $property['officeIds'] ) > 0 )
    {
        foreach ( $property['officeIds'] as $office_id )
        {
            if ( $office_id == 'BRE' || $office_id == 'HAY' || $office_id == 'LUD' )
            {
                update_post_meta( $post_id, '_department', 'fine-and-country' );
            }
        }
    }
    
    // Properties arriving with a disposal containing Auction should be assigned to the Property & Land department.
    if ( isset($property['selling']['disposal']) && strtolower($property['selling']['disposal']) == 'auction' )
    {
        update_post_meta( $post_id, '_department', 'property-and-land' );
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
    
    // Anything NOT IN Residential lettings OR that is a commercial that is for sale will be assigned to a parent department of Sales.
    // PROPERTY HIVE COMMENT: Ensure the 'commercial' department is deactivated and this should happen by default. No snippet needed
}


// PH MCC Search Form shortcode
function mcc_ph_search() {
    ?>
<form class="property-search"
    action="<?php echo apply_filters( 'propertyhive_search_form_action', get_post_type_archive_link( 'property' ) ); ?>"
    method="get" role="form">
    <div class="search-form-control search-form--radio-toggle">
        <input type="radio" id="_parent_department_sales" name="_parent_department" value="Sales" checked>
        <label for="_parent_department_sales">BUY</label>
        <input type="radio" id="_parent_department_lettings" name="_parent_department" value="Lettings">
        <label for="_parent_department_lettings">RENT</label>
    </div>
    <div class="search-form-control search-form--location">
        <input type="text" placeholder="Location" name="address_keyword" id="address_keyword">
    </div>
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
                    <input type="range" id="minPriceSales" name="minimum_price" min="0" max="1000000" value="0"
                        step="1000">
                    <input type="range" id="maxPriceSales" name="maximum_price" min="400000" max="10000000"
                        value="10000000" step="50000">
                    <div class="slider-track"></div>
                    <div class="range-values">
                        <div class="price-wrap minWrap">
                            <span class="price-title minTitle">Min. Price</span>
                            <span id="minValueSales">£0</span>
                        </div>

                        <div class="price-wrap maxWrap">
                            <span class="price-title maxTitle">Max. Price</span>
                            <span id="maxValueSales">£10,000,000</span>
                        </div>
                    </div>
                </div>
                <!-- Rental Pricing Slider -->
                <div class="range-slider lettings-only" style="display: none;">
                    <input type="range" id="minPriceLettings" name="minimum_rent" min="0" max="1000" value="0"
                        step="250">
                    <input type="range" id="maxPriceLettings" name="maximum_rent" min="1000" max="10000" value="10000"
                        step="250">
                    <div class="slider-track"></div>
                    <div class="range-values">
                        <div class="price-wrap minWrap">
                            <span class="price-title minTitle">Min. Rent</span>
                            <span id="minValueLettings">£0 pcm</span>
                        </div>

                        <div class="price-wrap maxWrap">
                            <span class="price-title maxTitle">Max. Rent</span>
                            <span id="maxValueLettings">£10,000 pcm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sales Pricing -->
    <!-- <div class="search-form-control search-form-control--dropdown search-form--price sales-only">
                    <div class="search-form-dropdown">
                        <div class="search-form-dropdown--trigger">Price</div>
                        <div class="search-form-dropdown--options">
                            <label class="search-form-dropdown--option selected">
                                <input type="radio" name="maximum_price" value="" checked>
                                <span>No Preference</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_price" value="50000">
                                <span>£50,000</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_price" value="60000">
                                <span>£60,000</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_price" value="70000">
                                <span>£70,000</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_price" value="80000">
                                <span>£80,000</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_price" value="90000">
                                <span>£90,000</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_price" value="100000">
                                <span>£100,000</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_price" value="110000">
                                <span>£110,000</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_price" value="120000">
                                <span>£120,000</span>
                            </label>
                        </div>
                    </div>
                </div> -->
    <!-- Rental Pricing -->
    <!-- <div class="search-form-control search-form-control--dropdown search-form--rent lettings-only">
                    <div class="search-form-dropdown">
                        <div class="search-form-dropdown--trigger">Price</div>
                        <div class="search-form-dropdown--options">
                            <label class="search-form-dropdown--option selected">
                                <input type="radio" name="maximum_rent" value="" checked>
                                <span>No Preference</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_rent" value="50000">
                                <span>£1,000 pcm</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_rent" value="60000">
                                <span>£1,500 pcm</span>
                            </label>
                            <label class="search-form-dropdown--option">
                                <input type="radio" name="maximum_rent" value="70000">
                                <span>£2,000 pcm</span>
                            </label>
                        </div>
                    </div>
                </div> -->


    <div class="search-form-control search-form-control--checkboxes search-form--type">
        <div class="search-form-dropdown">
            <div class="search-form-dropdown--trigger">Property Type</div>
            <div class="search-form-dropdown--options">
                <label class="search-form-checkboxes--option">
                    <input type="checkbox" name="property_type" checked value="">
                    <span class="search-form-checkboxes--checkbox-label"></span>
                    Show All
                </label>
                <label class="search-form-checkboxes--option">
                    <input type="checkbox" name="property_type" value="69">
                    <span class="search-form-checkboxes--checkbox-label"></span>
                    Bungalow
                </label>
                <label class="search-form-checkboxes--option">
                    <input type="checkbox" name="property_type" value="61">
                    <span class="search-form-checkboxes--checkbox-label"></span>
                    Detached
                </label>
                <hr>
                <label class="search-form-checkboxes--option">
                    <input type="checkbox" name="property_type" value="62">
                    <span class="search-form-checkboxes--checkbox-label"></span>
                    Semi-detached
                </label>
                <label class="search-form-checkboxes--option">
                    <input type="checkbox" name="property_type" value="63">
                    <span class="search-form-checkboxes--checkbox-label"></span>
                    Terraced
                </label>
                <label class="search-form-checkboxes--option">
                    <input type="checkbox" name="property_type" value="74">
                    <span class="search-form-checkboxes--checkbox-label"></span>
                    Flat/Apartment
                </label>
                <hr>
                <label class="search-form-checkboxes--option">
                    <input type="checkbox" name="property_type" value="93">
                    <span class="search-form-checkboxes--checkbox-label"></span>
                    Farms
                </label>
                <label class="search-form-checkboxes--option">
                    <input type="checkbox" name="property_type" value="83">
                    <span class="search-form-checkboxes--checkbox-label"></span>
                    Commercial
                </label>
            </div>
        </div>
    </div>
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

    <input type="submit" value="search" class="search-form-control search-form-control--submit">
</form>

<?php
};

add_shortcode('property_search', 'mcc_ph_search');


// Replace the default search on the properties archive
// Remove the original propertyhive_search_form function
remove_action( 'propertyhive_before_search_results_loop', 'propertyhive_search_form', 10 );