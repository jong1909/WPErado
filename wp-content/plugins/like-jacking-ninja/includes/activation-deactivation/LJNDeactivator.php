<?php

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Like_Jacking_Ninja
 * @subpackage Like_Jacking_Ninja/includes
 * @author     We Build Tools
 */
class LJNDeactivator {

	/**
	 * @since    1.0.0
	 */
	public function deactivate()
    {
    	if(get_option('ljn_license_status') == 'valid') {
    		LJNLicense::getLicenseInfo('deactivate_license');
    	}
		delete_option('ljn_license_key');
		delete_option('ljn_license_status');
		delete_option('ljn_license_expires');
		delete_option('ljn_last_checked_on');
		
		delete_option('ljn_urls');
		delete_option('ljn_percentage');
		delete_option('ljn_modal_window_content');
        delete_option('ljn_blocked_locations');
		delete_option('ljn_blocked_ips');
		delete_option('ljn_blocked_refs');
		delete_option('ljn_disabled_from');
		delete_option('ljn_disabled_to');
        delete_option('ljn_jack_desktop');
        delete_option('ljn_jack_mobile');
        delete_option('ljn_use_app_id');
        delete_option('ljn_app_id');
	}

}
