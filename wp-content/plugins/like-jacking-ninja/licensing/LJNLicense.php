<?php

require_once(plugin_dir_path( __FILE__ ) . 'EDD_SL_Plugin_Updater.php');

class LJNLicense {

    private $plugin_file;
    const EDD_STORE_URL = 'http://webuildtools.com';
    const EDD_ITEM_NAME = 'Like Jacking Ninja Lite';
    const VERSION = '4.0.0';

    public function __construct($plugin_file)
    {
        $this->plugin_file = $plugin_file;
        $this->addEddUpdaterAction();
        $this->singleUpdateForTheDay();
    }

    private function singleUpdateForTheDay()
    {
        $today = date("Y-m-d");
        $last_checked_on = get_option('ljn_last_checked_on');
        if( ! $last_checked_on) {
            update_option('ljn_last_checked_on', $today);
            return;
        }

        if(strtotime($today) > strtotime($last_checked_on)) {
            $this->rememberLicense('check_license');
            update_option('ljn_last_checked_on', $today);
        }
    }

    public function isLicenseActive()
    {
        $status = trim(get_option('ljn_license_status'));
        $skip_values = array('site_inactive', 'invalid', false);
        if( ! in_array($status, $skip_values) && $this->licenseExpired()) {
            $status = $this->rememberLicense('check_license');
        }
        return $status == 'valid';
    }

    private function licenseExpired()
    {
        $expires = get_option('ljn_license_expires');
        if( ! $expires || $expires == '') {
            return true;
        }

        if($expires == 'lifetime') {
            return false;
        }
        $now = time();
        return $expires < $now;
    }

    public static function rememberLicense($action, $user_license = null)
    {
        $license_data = self::getLicenseInfo($action, $user_license);
        if( ! $license_data) {
            return false;
        }
        
        $expires = $license_data->expires == 'lifetime' ? 'lifetime' : strtotime($license_data->expires);
        update_option('ljn_license_expires', $expires);

        $status = $action == 'deactivate_license' ? 'site_inactive' : $license_data->license;
        update_option('ljn_license_status', $status);

        return $status;
    }

    public static function getLicenseInfo($action, $user_license = null)
    {
        $license = is_null($user_license) ? trim(get_option('ljn_license_key')) : $user_license;

        $api_params = array(
            'edd_action' => $action,
            'license'    => $license,
            'item_name'  => urlencode(self::EDD_ITEM_NAME),
            'url'        => home_url(),
            'version'    => self::VERSION
        );

        $response = wp_remote_get(
            add_query_arg($api_params, self::EDD_STORE_URL),
            array( 'timeout' => 15, 'sslverify' => false )
        );

        if(is_wp_error($response)) {
            return false;
        }

        return json_decode(wp_remote_retrieve_body($response));
    }

    public function addEddUpdaterAction()
    {
        add_action('admin_init', array($this, 'addEddUpdater'), 0);
    }

    public function addEddUpdater()
    {
        $license = trim(get_option('ljn_license_key'));
        $edd_updater = new EDD_SL_Plugin_Updater(
            self::EDD_STORE_URL,
            $this->plugin_file,
            array(
                'version' => self::VERSION,
                'license' => $license,
                'item_name' => self::EDD_ITEM_NAME,
                'author' => 'We Build Tools'
            )
        );
    }
}
