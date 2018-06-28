<?php
/***** Active Plugin ********/
require_once( get_template_directory().'/lib/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'ya_register_required_plugins' );
function ya_register_required_plugins() {
    $plugins = array(
		array(
            'name'               => 'Woocommerce', 
            'slug'               => 'woocommerce', 
            'required'           => true, 
			'version'			 => '2.4.8'
        ),
        array(
            'name'               => 'SW Woocommerce Slider', 
            'slug'               => 'sw-woo-slider', 
            'source'             => get_stylesheet_directory() . '/lib/plugins/sw-woo-slider.zip', 
            'required'           => true, 
        ),
		
		array(
            'name'               => 'SW Testimonial Slider', 
            'slug'               => 'sw-testimonial-slider', 
            'source'             => get_stylesheet_directory() . '/lib/plugins/sw-testimonial-slider.zip', 
            'required'           => true, 
        ),
		array(
            'name'               => 'SW Partner Slider', 
            'slug'               => 'sw-partner-slider', 
            'source'             => get_stylesheet_directory() . '/lib/plugins/sw-partner-slider.zip', 
            'required'           => true, 
        ),
		array(
            'name'               => 'Visual Composer', 
            'slug'               => 'js_composer', 
            'source'             => get_stylesheet_directory() . '/lib/plugins/js_composer.zip', 
            'required'           => true, 
        ),
		array(
            'name'               => 'Revolution Slider', 
            'slug'               => 'revslider', 
            'source'             => get_stylesheet_directory() . '/lib/plugins/revslider.zip', 
            'required'           => true, 
        ),
		array(
            'name'               => 'SW Our Team', 
            'slug'               => 'sw_ourteam', 
            'source'             => get_stylesheet_directory() . '/lib/plugins/sw_ourteam.zip', 
            'required'           => true, 
        ),		
		array(
            'name'     			 => 'MailChimp for WordPress Lite',
            'slug'      		 => 'mailchimp-for-wp',
            'required' 			 => true,
        ), 
		array(
            'name'      		 => 'Contact Form 7',
            'slug'     			 => 'contact-form-7',
            'required' 			 => false,
        ),
		 array(
            'name'      		 => 'YITH Woocommerce Compare',
            'slug'      		 => 'yith-woocommerce-compare',
            'required'			 => false,			
        ),
		 array(
            'name'     			 => 'YITH Woocommerce Wishlist',
            'slug'      		 => 'yith-woocommerce-wishlist',
            'required' 			 => false,
        ), 
		array(
            'name'     			 => 'Wordpress Seo',
            'slug'      		 => 'wordpress-seo',
            'required'  		 => true,
        ),

    );
    $config = array();

    tgmpa( $plugins, $config );

}
add_action( 'vc_before_init', 'Ya_vcSetAsTheme' );
function Ya_vcSetAsTheme() {
    vc_set_as_theme();
}	