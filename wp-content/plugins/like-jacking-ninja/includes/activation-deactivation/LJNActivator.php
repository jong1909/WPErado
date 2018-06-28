<?php

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Like_Jacking_Ninja
 * @subpackage Like_Jacking_Ninja/includes
 * @author     We Build Tools
 */
class LJNActivator {

	/**
	 * @since    1.0.0
	 */
	public function activate() 
	{
		add_option('ljn_license_key');
		add_option('ljn_license_status', 'site_inactive');
		add_option('ljn_license_expires', '');
		add_option('ljn_last_checked_on', date("Y-m-d"));
		
		add_option('ljn_urls');
		add_option('ljn_percentage', 100);
		add_option('ljn_modal_window_content');
        add_option('ljn_blocked_locations');
		add_option('ljn_blocked_ips');
		add_option('ljn_blocked_refs');
		add_option('ljn_disabled_from');
		add_option('ljn_disabled_to');
		add_option('ljn_jack_desktop', 1);
		add_option('ljn_jack_mobile', 1);
		add_option('ljn_use_app_id', 0);
		add_option('ljn_app_id');

		$this->addTableToDatabase();
	}

	public function addTableToDatabase()
	{
	    global $wpdb;
	    $table_name = $wpdb->prefix . 'like_jacking_ninja';
	    $like_jacking_ninja_db_version = 1.0;

	    $charset_collate = '';

	    if ( ! empty( $wpdb->charset ) ) {
	    	$charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
	    }

	    if ( ! empty( $wpdb->collate ) ) {
	    	$charset_collate .= " COLLATE {$wpdb->collate}";
	    }

	    if ( floatval( get_option( 'like_jacking_ninja_db_version' ) ) < $like_jacking_ninja_db_version) {
	    	$sql = "DROP TABLE IF EXISTS $table_name;";
	    	$e = $wpdb->query( $sql );
	    }

	    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
	    	id mediumint(9) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	    	date timestamp DEFAULT CURRENT_TIMESTAMP,
	    	ip varchar(255) NULL
	    ) $charset_collate;";

	    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	    dbDelta( $sql );

	    update_option( 'like_jacking_ninja_db_version', $like_jacking_ninja_db_version );
	}

}
