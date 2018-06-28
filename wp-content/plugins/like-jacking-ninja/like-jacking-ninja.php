<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://webuildtools.com
 * @since             1.0.0
 * @package           Like Jacking Ninja
 *
 * @wordpress-plugin
 * Plugin Name:       Like Jacking Ninja
 * Plugin URI:        http://webuildtools.com
 * Description:       Get Facebook likes from ninjas
 * Version:           4.0.0
 * Author:            We Build Tools
 * Author URI:        http://webuildtools.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       like-jacking-ninja
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Begins execution of the plugin.
 * @since    1.0.0
 */

$main_plugin_path = plugin_dir_path(__FILE__);
require_once($main_plugin_path . 'includes/LikeJackingNinja.php');
require_once($main_plugin_path . 'licensing/LJNLicense.php');

$like_jacking_ninja = new LikeJackingNinja();
$like_jacking_ninja->registerActivationDeactivationHooks($main_plugin_path);
$like_jacking_ninja->run(new LJNLicense(__FILE__));
