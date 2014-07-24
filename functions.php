<?php

$edds_options = get_option('SS_THEME_settings');

/* Include plugin activation file to install plugins */
include get_template_directory() . '/includes/plugin-activation/plugin-details.php';

if (!class_exists('smartshop_SL_Theme_Updater')) {
    // Load our custom theme updater
    include( dirname(__FILE__) . '/includes/theme-updater.php' );
}

// configuration file for theme licensing 
// theme updater and licensing

include(get_stylesheet_directory() . '/includes/theme-updater-config.php');

/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/includes/custom-header.php' );

// customizer addition
require get_template_directory() . '/includes/customizer.php';

if (!function_exists('smartshop_theme_setup')) {

    /**
     * Make theme available for translation
     * Translations can be filed in the /languages/ directory
     * If you're building a theme based on Smartshop, use a find and replace
     * to change 'smartshop' to the name of your theme in all the template files
     */
    load_theme_textdomain('smartshop', trailingslashit(get_template_directory_uri()) . 'languages');

    function smartshop_theme_setup() {
        // Set content width 
        if (!isset($content_width))
            $content_width = 716;

        // This theme styles the visual editor with editor-style.css to match the theme style.
        add_editor_style();

        add_theme_support('automatic-feed-links');

        /*
         * This theme supports all available post formats by default.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
        ));


        // Enable support for Custom Backgrounds
        add_theme_support('custom-background', array(
            // Background color default
            'default-color' => 'fff',
            // Background image default
            'default-image' => '',
            'header-text' => 'true',
            'Flex-height' => 'true',
            'Flex-width' => 'true'
        )); 
        
        add_theme_support( 'woocommerce' );

        //adds post thumbnail support - new in Wordpress 2.9
        add_theme_support('post-thumbnails');

        set_post_thumbnail_size(716, 400, true); // default post thumbnail size
        add_image_size('product-image', 368, 200, true); // product thumbnail
        add_image_size('product-image-large', 716, 400, true); // main product image
        add_image_size('home-slider', 1140, 450, true); //home slider image size
        add_image_size('post-thumb', 220, 180, true); // custom thumbnail for post              
        
        // set up custom nav menus
        register_nav_menus( array( 'main_nav' => __('Main Navigation','smartshop') ));
        
    }

}
add_action('after_setup_theme', 'smartshop_theme_setup');

// Load Scripts for responsive navigation, media queries, comments and stheme stylesheet.
function smartshop_load_scripts() {

    if (is_singular()) {
        wp_enqueue_script('comment-reply');
    }
        wp_enqueue_script('smartshop-media-queries', get_template_directory_uri() . '/assets/js/css3-mediaqueries.js');
        

        // Adds JavaScript for handling the navigation menu hide-and-show behavior.
        wp_enqueue_script('smartshop-navigation', get_template_directory_uri() . '/assets/js/jquery.slicknav.min.js', array(), '1.0', true);

        // Enqueue the default WordPress stylesheet
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '1.5.1', 'all' );
        
         wp_enqueue_style( 'smartshop-woocommerce', trailingslashit( get_template_directory_uri() ) . 'assets/css/smartshop-woocommerce.css' , array(), '1.0', 'all' );
}

add_action('wp_enqueue_scripts', 'smartshop_load_scripts');


// Load Google Fonts
add_action('wp_enqueue_scripts', 'smartshop_load_fonts');

function smartshop_load_fonts() {
    
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,400,700', array(),'1.0','all');
    
    // Register and enqueue our icon font
    // We're using the awesome Font Awesome icon font. http://fortawesome.github.io/Font-Awesome
    wp_enqueue_style('font-awesome', trailingslashit(get_template_directory_uri()) . 'assets/css/font-awesome.min.css', array(), '4.0.3', 'all');
}

// Register Sidebars
if (function_exists('register_sidebar')) {

    register_sidebars(1, array(
        'name' => __('Sidebar Right', 'smartshop'),
        'id' => 'sidebar_right',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name' => __('Shop Sidebar', 'smartshop'),
        'id' => 'sidebar_shop',
        'description' => esc_html__('Appears in the sidebar on shop/product pages.', 'smartshop'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));


    register_sidebar(array(
        'name' => __('Header Widget', 'smartshop'),
        'id' => 'header_widget',
        'before_title' => '<h3 class="widget_title">',
        'description' => esc_html__('Appears in the top right section of header', 'smartshop'),
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="header-widget %2$s">',
        'after_widget' => '</div>'
    ));
    register_sidebar(array(
        'name' => __('Home Featured', 'smartshop'),
        'id' => 'home-featured',
        'description' => esc_html__('Appears on the front page below navigation. Apt for adding featured slider', 'smartshop'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => __('Home CTA', 'smartshop'),
        'id' => 'home_cta',
        'description' => esc_html__('Appears on the front page above featured posts and products listing', 'smartshop'),
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="home-cta-widget %2$s">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name' => __('Home Sidebar', 'smartshop'),
        'id' => 'home_sidebar',
        'description' => esc_html__('Appears on the right of featured posts on front page', 'smartshop'),
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name' => __('Home #1', 'smartshop'),
        'id' => 'home_one',
        'description' => esc_html__('Appears below the front page featured widget area.', 'smartshop'),
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="home-widget %2$s">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name' => __('Home #2', 'smartshop'),
        'id' => 'home_two',
        'description' => esc_html__('Appears below the front page featured widget area.', 'smartshop'),
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="home-widget %2$s">',
        'after_widget' => '</div>'
    ));
    register_sidebar(array(
        'name' => __('Home #3', 'smartshop'),
        'id' => 'home_three',
        'description' => esc_html__('Appears below the front page featured widget area.', 'smartshop'),
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="home-widget %2$s">',
        'after_widget' => '</div>'
    ));

    register_sidebars(1, array(
        'name' => __('Footer #1', 'smartshop'),
        'id' => 'footer_one',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>'
    ));
    register_sidebars(1, array(
        'name' => __('Footer #2', 'smartshop'),
        'id' => 'footer_two',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s"class="widget %2$s">',
        'after_widget' => '</div>'
    ));
    register_sidebars(1, array(
        'name' => __('Footer #3', 'smartshop'),
        'id' => 'footer_three',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>'
    ));
}

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since SmartShop 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function smartshop_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the blog name.
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'tatva' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'smartshop_wp_title', 10, 2 );

/*
 * 
 * Set excerpt length for products on front page
 * and post excerpts on rest of the pages.
 * 
 */
function smartshop_excerpt_length($length) {
    global $post;
    if ($post->post_type == 'post') {
        return 50;
    }
    else if (($post->post_type == 'download') && (is_front_page())) {
        return 15;
    }
    else if (($post->post_type == 'product')) {
        return 15;
    }
    else {
        return 50;
    }
}
add_filter('excerpt_length', 'smartshop_excerpt_length');

// Customize read more link
function smartshop_excerpt_more($more) {
    if (is_front_page()) {
        return '...';
    } else {
        return ' <a class="read-more" href="' . get_permalink(get_the_ID()) . '">' . __('Read More', 'smartshop') . '</a>';
    }
}

add_filter('excerpt_more', 'smartshop_excerpt_more');


/*
 * Check if the front page is set 
 * to display latest blog posts
 * or a static front page
 * 
 * If it's set to display blog posts
 * then ignore the front-page.php 
 * template and head over to index.php
 * 
 * @Credits Chip Bennett 
 * 
 * @since Flex 1.0
 */


function smartshop_filter_front_page_template( $template ) {
     return is_home() ? '' : $template ;
}
add_filter( 'frontpage_template', 'smartshop_filter_front_page_template' );


if (!function_exists('smartshop_footer_js')) {
    function smartshop_footer_js() { ?>
            <script>     

            jQuery(document).ready(function($) {   

            $('#main-nav #site-navigation ul').slicknav({prependTo:'#mobile-menu'});

            });
            </script>
        <?php }
}
add_action( 'wp_footer', 'smartshop_footer_js', 20, 1 );


// Add Envira License key
add_action( 'after_setup_theme', 'smartshop_envira_define_license_key' );
function smartshop_envira_define_license_key() {
    
    // If the key has not already been defined, define it now.
    if ( ! defined( 'ENVIRA_LICENSE_KEY' ) ) {
        define( 'ENVIRA_LICENSE_KEY', 'f21b503f7793be583daab680a7f8bda7' );
    }
    
}


// Add Soliloquy License key
add_action( 'after_setup_theme', 'smartshop_soliloquy_define_license_key' );
function smartshop_soliloquy_define_license_key() {
    
    // If the key has not already been defined, define it now.
    if ( ! defined( 'SOLILOQUY_LICENSE_KEY' ) ) {
        define( 'SOLILOQUY_LICENSE_KEY', '7IDtSRkIxJxuzXYz76Znyec7St2rpszP+Vp9t4GYv6k=' );
    }
    
}

// Remove default WooCommerce styles
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// Display 24 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9;' ), 20 );


// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}


/**
 * Hook in on activation
 */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'smartshop_woocommerce_image_dimensions', 1 );
 
/**
 * Define image sizes
 */
function smartshop_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '349',	// px
		'height'	=> '349',	// px
		'crop'		=> 1 		// true
	);
 
	$single = array(
		'width' 	=> '362',	// px
		'height'	=> '362',	// px
		'crop'		=> 1 		// true
	);
 
	$thumbnail = array(
		'width' 	=> '150',	// px
		'height'	=> '150',	// px
		'crop'		=> 0 		// false
	);
 
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );


function smartshop_admin_notice(){ 
     global $pagenow;
    if ( $pagenow == 'themes.php' || $pagenow == 'index.php') { ?>
            <div class="updated" style="background: #FDAF3E; ">
              <p style="font-size: 16px; color: #fff;">SmartShop comes with <a href="<?php echo admin_url('customize.php'); ?>" style="color:#fff; text-decoration: underline;">Live Theme Customizer</a> to configure theme options <br/> You can upgrade to <a href="http://ideaboxthemes.com/themes/smartshop-wordpress-theme/?ref=basic" style="color:#fff; text-decoration: underline;"><strong>Pro version</strong></a> for more features like unlimited color schemes, boxed and full width layout options, support and upgrades.</p>
         </div>
    <?php  }
}
add_action('admin_notices', 'smartshop_admin_notice');