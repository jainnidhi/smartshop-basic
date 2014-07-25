<?php
/**
 * SmartShop Theme Customizer
 *
 * @package SmartShop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function smartshop_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    // reorganize background settings in customizer
    $wp_customize->get_control( 'background_color'  )->section   = 'background_image';
    $wp_customize->get_section( 'background_image'  )->title     = __('Background Settings','smartshop');
    $wp_customize->get_section( 'background_image' )->description = __('Please note that background color and image settings work only for Boxed Layout','smartshop'); 
    
    // reorganize header settings in cusotmizer
    $wp_customize->get_control( 'header_textcolor'  )->section   = 'header_image';
    $wp_customize->get_control( 'display_header_text' )->section = 'header_image'; 
    $wp_customize->get_section( 'header_image'  )->title     = __('Header Settings','smartshop');
    
    $wp_customize->get_section( 'header_image'  )->priority     = 30;
    $wp_customize->get_section( 'background_image' )->priority  = 30; 
}

add_action('customize_register', 'smartshop_customize_register', 12);

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function smartshop_customize_preview_js() {
    wp_enqueue_script('smartshop_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20130508', true);
}

add_action('customize_preview_init', 'smartshop_customize_preview_js');

function smartshop_customizer($wp_customize) {

    class smartshop_customize_textarea_control extends WP_Customize_Control {

        public $type = 'textarea';

        public function render_content() {
            ?>

            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5" style="width:98%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>

            <?php
        }

    }
    
    
    // Add new section for slider settings
    $wp_customize->add_section('home_slider_setting', array(
        'title' => __('Home Slider', 'smartshop'),
        'priority' => 37,
    ));

    $wp_customize->add_setting('slider_one', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_one', array(
        'label' => 'Slider 1',
        'section' => 'home_slider_setting',
        'settings' => 'slider_one',
        'priority' => 1,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_one', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_one', array(
        'label' => __('Slider One Title', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_one',
        'priority' => 2,
    ));

    $wp_customize->add_setting('slider_one_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new smartshop_customize_textarea_control($wp_customize, 'slider_one_description', array(
        'label' => __('Description', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_description',
        'priority' => 3,
    )));

    // link text
    $wp_customize->add_setting('slider_one_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_one_link_text', array(
        'label' => __('Slider One Link Text', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_link_text',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('slider_one_link_url', array('default' => __('', 'smartshop'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_one_link_url', array(
        'label' => __('Slider One Link URL', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_link_url',
        'priority' => 5,
    ));

    $wp_customize->add_setting('slider_two', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_two', array(
        'label' => 'Slider 2',
        'section' => 'home_slider_setting',
        'settings' => 'slider_two',
        'priority' => 6,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_two', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_two', array(
        'label' => __('Slider Two Title', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_two',
        'priority' => 7,
    ));

    $wp_customize->add_setting('slider_two_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new smartshop_customize_textarea_control($wp_customize, 'slider_two_description', array(
        'label' => __('Description', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_description',
        'priority' => 8,
    )));

    // link text
    $wp_customize->add_setting('slider_two_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_two_link_text', array(
        'label' => __('Slider Two Link Text', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_link_text',
        'priority' => 9,
    ));

    // link url
    $wp_customize->add_setting('slider_two_link_url', array('default' => __('', 'smartshop'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_two_link_url', array(
        'label' => __('Slider Two Link URL', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_link_url',
        'priority' => 10,
    ));


    $wp_customize->add_setting('slider_three', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_three', array(
        'label' => 'Slider 3',
        'section' => 'home_slider_setting',
        'settings' => 'slider_three',
        'priority' => 11,
            )
            )
    );


    // slider Title
    $wp_customize->add_setting('slider_title_three', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_three', array(
        'label' => __('Slider Three Title', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_three',
        'priority' => 12,
    ));

    $wp_customize->add_setting('slider_three_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new smartshop_customize_textarea_control($wp_customize, 'slider_three_description', array(
        'label' => __('Description', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_three_description',
        'priority' => 13,
    )));

    // link text
    $wp_customize->add_setting('slider_three_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_three_link_text', array(
        'label' => __('Slider Three Link Text', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_three_link_text',
        'priority' => 14,
    ));

    // link url
    $wp_customize->add_setting('slider_three_link_url', array('default' => __('', 'smartshop'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_three_link_url', array(
        'label' => __('Slider Three Link URL', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_three_link_url',
        'priority' => 15,
    ));

    $wp_customize->add_setting('slider_four', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_four', array(
        'label' => 'Slider 4',
        'section' => 'home_slider_setting',
        'settings' => 'slider_four',
        'priority' => 16,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_four', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_four', array(
        'label' => __('Slider Four Title', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_four',
        'priority' => 17,
    ));

    $wp_customize->add_setting('slider_four_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new smartshop_customize_textarea_control($wp_customize, 'slider_four_description', array(
        'label' => __('Description', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_four_description',
        'priority' => 18,
    )));


    // link text
    $wp_customize->add_setting('slider_four_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_four_link_text', array(
        'label' => __('Slider Four Link Text', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_four_link_text',
        'priority' => 19,
    ));

    // link url
    $wp_customize->add_setting('slider_four_link_url', array('default' => __('', 'smartshop'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_four_link_url', array(
        'label' => __('Slider Four Link URL', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_four_link_url',
        'priority' => 20,
    ));

    $wp_customize->add_setting('slider_five', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_five', array(
        'label' => 'Slider 5',
        'section' => 'home_slider_setting',
        'settings' => 'slider_five',
        'priority' => 21,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_five', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_five', array(
        'label' => __('Slider Five Title', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_five',
        'priority' => 22,
    ));

    $wp_customize->add_setting('slider_five_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new smartshop_customize_textarea_control($wp_customize, 'slider_five_description', array(
        'label' => __('Description', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_five_description',
        'priority' => 23,
    )));

    // link text
    $wp_customize->add_setting('slider_five_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_five_link_text', array(
        'label' => __('Slider Five Link Text', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_five_link_text',
        'priority' => 24,
    ));

    // link url
    $wp_customize->add_setting('slider_five_link_url', array('default' => __('', 'smartshop'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_five_link_url', array(
        'label' => __('Slider Five Link URL', 'smartshop'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_five_link_url',
        'priority' => 25,
    ));
    
    // Add new section for Home Featured One settings
    $wp_customize->add_section('home_featured_one_setting', array(
        'title' => __('Home Featured #1', 'smartshop'),
        'priority' => 40,
    ));


    $wp_customize->add_setting('home_featured_one', array(
        'sanitize_callback' => 'smartshop_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_featured_one', array(
        'label' => __('Featured One Icon', 'smartshop'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_featured_one',
        'priority' => 1,
    ));

    // home Title
    $wp_customize->add_setting('home_title_one', array(
        'sanitize_callback' => 'smartshop_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_one', array(
        'label' => __('Title', 'smartshop'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_title_one',
        'priority' => 2,
    ));

   
    // Add new section for Home Featured Two settings
    $wp_customize->add_section('home_featured_two_setting', array(
        'title' => __('Home Featured #2', 'smartshop'),
        'priority' => 45,
    ));


   $wp_customize->add_setting('home_featured_two', array(
        'sanitize_callback' => 'smartshop_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_featured_two', array(
        'label' => __('Featured Two Icon', 'smartshop'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_featured_two',
        'priority' => 1,
    ));

    // home Title
    $wp_customize->add_setting('home_title_two', array(
        'sanitize_callback' => 'smartshop_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_two', array(
        'label' => __('Title', 'smartshop'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_title_two',
        'priority' => 2,
    ));

    
    // Add new section for Home Featured Three settings
    $wp_customize->add_section('home_featured_three_setting', array(
        'title' => __('Home Featured #3', 'smartshop'),
        'priority' => 50,
    ));


    $wp_customize->add_setting('home_featured_three', array(
        'sanitize_callback' => 'smartshop_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_featured_three', array(
        'label' => __('Featured Three Icon', 'smartshop'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_featured_three',
        'priority' => 1,
    ));

    // home Title
    $wp_customize->add_setting('home_title_three', array(
        'sanitize_callback' => 'smartshop_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_three', array(
        'label' => __('Title', 'smartshop'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_title_three',
        'priority' => 2,
    ));
    
             // Add new section for Home CTA settings
        $wp_customize->add_section('home_cta_setting', array(
            'title' => __('Home CTA', 'smartshop'),
            'priority' => 55,
        ));

        $wp_customize->add_setting('cta_title', array(
                'sanitize_callback' => 'sanitize_text_field',
                'transport'=> 'postMessage',
                ));
        
        $wp_customize->add_control('cta_title', array(
            'label' => __('Title', 'smartshop'),
            'section' => 'home_cta_setting',
            'settings' => 'cta_title',
            'priority' => 1,
           
        ));
    
         $wp_customize->add_setting('cta_text', array('default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        'transport'=> 'postMessage',
            ));
        
        $wp_customize->add_control(new smartshop_customize_textarea_control($wp_customize, 'cta_text', array(
            'label' => __('CTA Text', 'smartshop'),
            'section' => 'home_cta_setting',
            'settings' => 'cta_text',
            'priority' => 2,
        )));
        
        
         // link text
        $wp_customize->add_setting('home_cta_link_text', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'=> 'postMessage',
            ));
        
        $wp_customize->add_control('home_cta_link_text', array(
            'label' => __('Link Text', 'smartshop'),
            'section' => 'home_cta_setting',
            'settings' => 'home_cta_link_text',
            'priority' => 3,
            
        ));
        
        // link url
        $wp_customize->add_setting('home_cta_link_url', array('default' => __('', 'smartshop'),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'=> 'postMessage',
            ));
        
        $wp_customize->add_control('home_cta_link_url', array(
            'label' => __('Link URL', 'smartshop'),
            'section' => 'home_cta_setting',
            'settings' => 'home_cta_link_url',
            'priority' => 4,
            
        ));

    
    if (class_exists('Easy_Digital_Downloads')) {
        $wp_customize->add_section('smartshop_edd_options', array(
            'title' => __('Easy Digital Downloads', 'smartshop'),
            'description' => __('All other EDD options are under Dashboard => Downloads.', 'smartshop'),
            'priority' => 70,
        ));

        // enable featured products on front page?
        $wp_customize->add_setting('smartshop_edd_front_featured_products',array (
            'default' => 0, 
            'sanitize_callback' => 'smartshop_sanitize_checkbox',
        ));
        $wp_customize->add_control('smartshop_edd_front_featured_products', array(
            'label' => __('Show featured products on Front Page', 'smartshop'),
            'section' => 'smartshop_edd_options',
            'priority' => 10,
            'type' => 'checkbox',
        ));

        // store front/archive item count
        $wp_customize->add_setting('smartshop_store_front_featured_count', array (
            'default' => 3,
            'sanitize_callback' => 'smartshop_sanitize_integer',
        ));
        $wp_customize->add_control('smartshop_store_front_featured_count', array(
            'label' => __('Number of Featured Products', 'smartshop'),
            'section' => 'smartshop_edd_options',
            'settings' => 'smartshop_store_front_featured_count',
            'priority' => 20,
        ));

        // store front/downloads archive headline
        $wp_customize->add_setting('smartshop_edd_store_archives_title', array(
            'default' => __('Latest Products','smartshop'),
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('smartshop_edd_store_archives_title', array(
            'label' => __('Featured Products Title', 'smartshop'),
            'section' => 'smartshop_edd_options',
            'settings' => 'smartshop_edd_store_archives_title',
            'priority' => 30,
        ));
        // store front/downloads archive description
        $wp_customize->add_setting('smartshop_edd_store_archives_description', array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control(new smartshop_customize_textarea_control($wp_customize, 'smartshop_edd_store_archives_description', array(
            'label' => __('Featured Products Description', 'smartshop'),
            'section' => 'smartshop_edd_options',
            'settings' => 'smartshop_edd_store_archives_description',
            'priority' => 40, 
        )));
        // read more link
        $wp_customize->add_setting('smartshop_edd_view_details', array(
            'default' => __('View Details', 'smartshop'),
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('smartshop_edd_view_details', array(
            'label' => __('Product Details Text', 'smartshop'),
            'section' => 'smartshop_edd_options',
            'settings' => 'smartshop_edd_view_details',
            'priority' => 50,
        ));
        // store front/archive item count
        $wp_customize->add_setting('smartshop_store_front_count', array(
            'default' => 9,
            'sanitize_callback' => 'smartshop_sanitize_integer',
        ));
        $wp_customize->add_control('smartshop_store_front_count', array(
            'label' => __('Store Item Count', 'smartshop'),
            'section' => 'smartshop_edd_options',
            'settings' => 'smartshop_store_front_count',
            'priority' => 60,
        ));
    }
	
	
	/* ========================================================= */
        // Add new section for Woocommerce featured products on Front Page
        /* ========================================================= */
        $wp_customize->add_section('smartshop_woo_front_page_options', array(
            'title' => __('Product On Front Page', 'smartshop'),
            'description' => __('Settings for displaying featured products on Front Page', 'smartshop'),
            'priority' => 60,
        ));
        // enable featured products on front page?
        $wp_customize->add_setting('smartshop_woo_front_featured_products', array('default' => 0,
             'sanitize_callback' => 'smartshop_sanitize_checkbox',
            ));
        
        $wp_customize->add_control('smartshop_woo_front_featured_products', array(
            'label' => __('Show featured products on Front Page', 'smartshop'),
            'section' => 'smartshop_woo_front_page_options',
            'priority' => 10,
            'type' => 'checkbox',
        ));
        // Front featured products section headline
        $wp_customize->add_setting('smartshop_woo_front_featured_title', array('default' => __('Latest Products', 'smartshop'),
             'sanitize_callback' => 'sanitize_text_field',
            ));
        $wp_customize->add_control('smartshop_woo_front_featured_title', array(
            'label' => __('Main Title', 'smartshop'),
            'section' => 'smartshop_woo_front_page_options',
            'settings' => 'smartshop_woo_front_featured_title',
            'priority' => 10,
        ));
        
        // store front/products archive description
        $wp_customize->add_setting('smartshop_woo_store_archives_description', array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control(new smartshop_customize_textarea_control($wp_customize, 'smartshop_woo_store_archives_description', array(
            'label' => __('Featured Products Description', 'smartshop'),
            'section' => 'smartshop_woo_front_page_options',
            'settings' => 'smartshop_woo_store_archives_description',
            'priority' => 40, 
        )));
        
        // read more link
        $wp_customize->add_setting('smartshop_woo_view_details', array(
            'default' => __('View Details', 'smartshop'),
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('smartshop_woo_view_details', array(
            'label' => __('Product Details Text', 'smartshop'),
            'section' => 'smartshop_woo_front_page_options',
            'settings' => 'smartshop_woo_view_details',
            'priority' => 50,
        ));

        // store front item count
        $wp_customize->add_setting('smartshop_woo_store_front_count', array('default' => 3,
            'sanitize_callback' => 'smartshop_sanitize_integer',
            ));
        $wp_customize->add_control('smartshop_woo_store_front_count', array(
            'label' => __('Number of products to display', 'smartshop'),
            'section' => 'smartshop_woo_front_page_options',
            'settings' => 'smartshop_woo_store_front_count',
            'priority' => 20,
        ));
       
        


    // Add new section for displaying Featured Posts on Front Page
    $wp_customize->add_section('smartshop_front_page_post_options', array(
        'title' => __('Front Page Featured Posts', 'smartshop'),
        'description' => __('Settings for displaying featured posts on Front Page', 'smartshop'),
        'priority' => 60,
    ));
    // enable featured posts on front page?
    $wp_customize->add_setting('smartshop_front_featured_posts_check', array(
        'default' => 1, 
        'sanitize_callback' => 'smartshop_sanitize_checkbox',
    ));
    $wp_customize->add_control('smartshop_front_featured_posts_check', array(
        'label' => __('Show featured posts on Front Page', 'smartshop'),
        'section' => 'smartshop_front_page_post_options',
        'priority' => 10,
        'type' => 'checkbox',
    ));

    // Front featured posts section headline
    $wp_customize->add_setting('smartshop_front_featured_posts_title', array(
        'default' => __('Latest Posts', 'smartshop'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('smartshop_front_featured_posts_title', array(
        'label' => __('Featured Section Title', 'smartshop'),
        'section' => 'smartshop_front_page_post_options',
        'settings' => 'smartshop_front_featured_posts_title',
        'priority' => 10,
    ));

    // select number of posts for featured posts on front page
    $wp_customize->add_setting('smartshop_front_featured_posts_count', array(
        'default' => 3,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('smartshop_front_featured_posts_count', array(
        'label' => __('Number of posts to display', 'smartshop'),
        'section' => 'smartshop_front_page_post_options',
        'settings' => 'smartshop_front_featured_posts_count',
        'priority' => 20,
    ));


    // featured post read more link
    $wp_customize->add_setting('smartshop_front_featured_link_text', array(
        'default' => __('Read more', 'smartshop'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('smartshop_front_featured_link_text', array(
        'label' => __('Posts Read More Link Text', 'smartshop'),
        'section' => 'smartshop_front_page_post_options',
        'settings' => 'smartshop_front_featured_link_text',
        'priority' => 30,
    ));

    // Add footer text section
    $wp_customize->add_section('smartshop_footer', array(
        'title' => 'Footer Text', // The title of section
        'priority' => 75,
    ));

    $wp_customize->add_setting('smartshop_footer_footer_text', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control(new smartshop_customize_textarea_control($wp_customize, 'smartshop_footer_footer_text', array(
        'section' => 'smartshop_footer', // id of section to which the setting belongs
        'settings' => 'smartshop_footer_footer_text',
    )));
    
    // Add custom CSS section 
    $wp_customize->add_section(
        'smartshop_custom_css_section', array(
        'title' => __('Custom CSS', 'smartshop'),
        'priority' => 80,
    ));

    $wp_customize->add_setting(
        'smartshop_custom_css', array(
        'default' => '',
        'sanitize_callback' => 'smartshop_sanitize_custom_css',
        'sanitize_js_callback' => 'smartshop_sanitize_escaping',
    ));

    $wp_customize->add_control(
        new smartshop_customize_textarea_control(
        $wp_customize, 'smartshop_custom_css', array(
        'label' => __('Add your custom css here and design live! (for advanced users)', 'smartshop'),
        'section' => 'smartshop_custom_css_section',
        'settings' => 'smartshop_custom_css'
    )));
}

add_action('customize_register', 'smartshop_customizer', 11);


/*
 * 
 * sanitize Text field
 * 
 * @since Smartshop 1.4
 * 
 */

function smartshop_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}


/* 
 * Sanitize Hex Color for 
 * Primary and Secondary Color options
 * 
 * @since SmartShop 1.4
 */
function smartshop_sanitize_hex_color( $color ) {
    if ( $unhashed = sanitize_hex_color_no_hash( $color ) ) {
        return '#' . $unhashed;
    }
    return $color;
}

/* 
 * Sanitize Custom CSS 
 * 
 * @since SmartShop 1.4
 */

function smartshop_sanitize_custom_css( $input) {
    $input = wp_kses_stripslashes( $input);
    return $input;
}	

/* 
 * Sanitize numeric values 
 * 
 * @since SmartShop 1.4
 */
function smartshop_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
    return intval( $input );
    }
}

/*
 * Escaping for input values
 * 
 * @since SmartShop 1.4
 */
function smartshop_sanitize_escaping( $input) {
    $input = esc_attr( $input);
    return $input;
}


/*
 * Sanitize Checkbox input values
 * 
 * @since Flex 1.0
 */
function smartshop_sanitize_checkbox( $input ) {
    if ( $input ) {
            $output = '1';
    } else {
            $output = false;
    }
    return $output;
}

/*
 * Sanitize layout options 
 * 
 * @since SmartShop 1.4
 */
function smartshop_sanitize_layout_option($layout_option){
    if ( ! in_array( $layout_option, array( 'full-width','boxed' ) ) ) {
		$layout_option = 'boxed';
	}

	return $layout_option;
}

/**
 * Change theme colors based on theme options from customizer.
 *
 * @since SmartShop 1.0
 */
function smartshop_color_style() {
	$primary_color = get_theme_mod('smartshop_theme_primary_color');
        $secondary_color = get_theme_mod('smartshop_theme_secondary_color'); 

	// If no custom options for text are set, let's bail
	if ( $primary_color == '#F84545' || $primary_color == '#f84545' ) {
            return;
        }
	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="smartshop-colorscheme-css">

                .header-widget .smartshop-call,
                #footer,
                #featured-products .product-info,
                #page-header-container,
                .pagination a:hover, 
                 .pagination span.current,
                .page-pagination a:hover,
                .edd-submit.button.blue:hover,
                .main-navigation li ul li a,
                .nav-menu > li > a:hover,
                #home-cta-area,
                .sidebar .wpcf7 .wpcf7-form input[type="submit"],
                .sidebar .gform_footer input[type="submit"],
                #commentsubmit,
                .hentry #edd_login_form input[type="submit"],
                #commentsubmit, .form-submit input[type="submit"],
                .woocommerce ul.products li.product .onsale,
                .woocommerce a.button:hover,
                .woocommerce-page a.button:hover,
                .woocommerce span.onsale,
                .woocommerce .woocommerce-message:before,
                .woocommerce-page input.button.alt:hover,
                .woocommerce .woocommerce-info:before,
                .woocommerce .woocommerce-error:before,
                .woocommerce button.button.alt,
                 li a:hover.page-numbers,
                 .woocommerce #review_form #respond .form-submit input:hover,
                 ins,
                 table.cart td.product-remove a:hover,
                 .woocommerce-cart .button:hover{
                    background: <?php echo $primary_color; ?> !important;
                    color: <?php echo $secondary_color; ?> !important; 
                }

                .gform_footer input[type=submit]:hover,
                #commentsubmit,
                .hentry #edd_login_form input[type="submit"] {
                    color:<?php echo $secondary_color; ?> !important;
                }
                
                .woocommerce .woocommerce-message,
                .woocommerce .woocommerce-info,
                .woocommerce .woocommerce-error{
                    border-top:2px solid <?php echo $primary_color; ?> !important;
                }
                 #home-widgets .fa, 
                .hentry .read-more,
                .product .title:hover,
                .sidebar li.widget ul a:hover,
                #logo-wrap h1 a,
                .gform_wrapper .gfield_required,
                .hentry a:hover,
                .woocommerce form .form-row .required,
                .sidebar .widget ul a:hover,
                #edd_checkout_form_wrap span.edd-required-indicator,
                .product h2:hover,
                .star-rating span:before,
                #header .cart-contents:after,
                .fa-shopping-cart:before,
                .required{
                    color:<?php echo $primary_color; ?> !important;
                }

                ::selection {
                    background:<?php echo $primary_color; ?> !important;
                    color:<?php echo $secondary_color; ?> !important;
                }

	</style>
        <style type="text/css" id="smartshop-custom-css">
            <?php echo trim( get_theme_mod( 'smartshop_custom_css' ) ); ?>
        </style>
	<?php
}
add_action('wp_head','smartshop_color_style');