<?php
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( !defined('__THEME__') ){
	// Define helper constants
	$get_theme_name = explode( '/wp-content/themes/', get_template_directory() );
	define( '__THEME__', next($get_theme_name) );
}
function at_remove_dup_canonical_link() { return false; } add_filter( 'wpseo_canonical', 'at_remove_dup_canonical_link' );
/**
 * Variables
 */
require_once locate_template('/lib/defines.php');

/**
 * Roots includes
 */
require_once locate_template('/lib/one-click-install/init.php');
require_once locate_template('/lib/classes.php');		// Utility functions
require_once locate_template('/lib/utils.php');			// Utility functions
require_once locate_template('/lib/init.php');			// Initial theme setup and constants
require_once locate_template('/lib/config.php');		// Configuration
require_once locate_template('/lib/activation.php');	// Theme activation
require_once locate_template('/lib/cleanup.php');		// Cleanup
require_once locate_template('/lib/nav.php');			// Custom nav modifications
require_once locate_template('/lib/rewrites.php');		// URL rewriting for assets
require_once locate_template('/lib/htaccess.php');		// HTML5 Boilerplate .htaccess
require_once locate_template('/lib/widgets.php');		// Sidebars and widgets
require_once locate_template('/lib/scripts.php');		// Scripts and stylesheets
require_once locate_template('/lib/customizer.php');	// Custom functions
require_once locate_template('/lib/shortcodes.php');	// Utility functions
require_once locate_template('/lib/woocommerce-hook.php');	// Utility functions
require_once locate_template('/lib/plugins/currency-converter/currency-converter.php'); // currency converter
require_once locate_template('/lib/less.php');			// Custom functions
require_once locate_template('/lib/plugin-requirement.php');			// Custom functions
require_once locate_template('/lib/visual-map.php');

register_nav_menus( array(
		'primary'   => __( 'TM Header Navigation', 'templatemela' ),
		'header-menu' => __('TM Header Top Links', 'templatemela'),
		'footer-menu' => __('TM Footer Navigation', 'templatemela'),
	) );

//add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 24;' ), 20 );
