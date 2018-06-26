<?php
/**
 * zsofa engine room
 *
 * @package zsofa
 */

/**
 * Assign the zsofa version to a var
 */
$theme              = wp_get_theme( 'zsofa' );
$zsofa_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$zsofa = (object) array(
	'version' => $zsofa_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-zsofa.php',
	'customizer' => require 'inc/customizer/class-zsofa-customizer.php',
);

require 'inc/zsofa-functions.php';
require 'inc/zsofa-template-hooks.php';
require 'inc/zsofa-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$zsofa->jetpack = require 'inc/jetpack/class-zsofa-jetpack.php';
}

if ( zsofa_is_woocommerce_activated() ) {
	$zsofa->woocommerce = require 'inc/woocommerce/class-zsofa-woocommerce.php';

	require 'inc/woocommerce/zsofa-woocommerce-template-hooks.php';
	require 'inc/woocommerce/zsofa-woocommerce-template-functions.php';
}

if ( is_admin() ) {
	$zsofa->admin = require 'inc/admin/class-zsofa-admin.php';

	require 'inc/admin/class-zsofa-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-zsofa-nux-admin.php';
	require 'inc/nux/class-zsofa-nux-guided-tour.php';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		require 'inc/nux/class-zsofa-nux-starter-content.php';
	}
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */
