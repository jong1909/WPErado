<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the dashboard.
 *
 * @link       http://webuildtools.com
 * @since      1.0.0
 *
 * @package    Like Jacking Ninja
 * @subpackage Like Jacking Ninja/includes
 */

/**
 * The class responsible for actions done on activation
 */
require_once(plugin_dir_path(__FILE__) . 'activation-deactivation/LJNActivator.php');

/**
 * The class responsible for actions done on deactivation
 */
require_once(plugin_dir_path(__FILE__) . 'activation-deactivation/LJNDeactivator.php');


/**
 * The class responsible for defining all actions that occur in the Dashboard.
 */
require_once(plugin_dir_path(__FILE__) . 'admin/LJNAdmin.php');

/**
 * The class responsible for defining all actions that occur in the public-facing
 * side of the site.
 */
require_once(plugin_dir_path(__FILE__) . 'public/LJNPublic.php');

class LikeJackingNinja {

	/**
	 * @since    1.0.0
	 * @access   private
	 */
	private $activator;

	/**
	 * @since    1.0.0
	 * @access   private
	 */
	private $deactivator;

	/**
	 * The administration part of the plugin
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Like Jacking Ninja $admin
	 */
	protected $admin;

	/**
	 * The public part of the plugin
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Like Jacking Ninja $admin
	 */
	protected $public;

	/**
	 * The unique identifier of this plugin.
	 * @since    1.0.0
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	const PLUGIN_NAME = 'like_jacking_ninja';

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the Dashboard and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct()
	{
		$this->activator = new LJNActivator();
		$this->deactivator = new LJNDeactivator();
		$this->admin = new LJNAdmin();
		$this->public = new LJNPublic();
	}

    /**
     * @param LJNLicense $ljn_license
     */
	public function run(LJNLicense $ljn_license)
	{
        $is_active = $ljn_license->isLicenseActive();
		$this->admin->init($is_active);
		$this->public->init($is_active);
	}

    public function registerActivationDeactivationHooks($main_plugin_path)
    {
        $main_plugin_file = $main_plugin_path . 'like-jacking-ninja.php';
        register_activation_hook($main_plugin_file, array($this->activator, 'activate'));
        register_deactivation_hook($main_plugin_file, array($this->deactivator, 'deactivate'));
    }

}
