<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * @package    Like_Jacking_Ninja
 * @author     We Build Tools
 */
class LJNAdmin {

    private $is_active = false;

	public function init($is_active) 
    {
        $this->is_active = $is_active;
        $this->addAdminActions();
	}

	private function addAdminActions()
	{
        add_action('admin_init', array($this, 'addFilters'));
		add_action('admin_enqueue_scripts', array($this, 'enqueueAssets'));
		add_action('admin_init', array($this, 'registerSettings'));
		add_action('admin_menu', array($this, 'adminMenu'));
        add_action('add_meta_boxes', array($this, 'addMetaBox'));
        add_action('save_post', array($this, 'saveMetaBoxData'));
        add_action('wp_ajax_flush_db', array($this, 'flushDatabase'));
	}

    public function addFilters()
    {
        add_filter('pre_update_option_ljn_license_key', array($this, 'ljnLicenseUpdate'), 10, 2);
        add_filter('pre_update_option_ljn_urls', array($this, 'ljnArrayUpdate'), 10, 2);
        add_filter('pre_update_option_ljn_blocked_locations', array($this, 'ljnArrayUpdate'), 10, 2);
        add_filter('pre_update_option_ljn_blocked_refs', array($this, 'ljnArrayUpdate'), 10, 2);
        add_filter('style_loader_src', array($this, 'removeVersionTag'), 10, 2);
        add_filter('script_loader_src', array($this, 'removeVersionTag'), 10, 2);
    }

    public function removeVersionTag($src)
    {
        if(strpos($src, '?ver=')) {
            $src = remove_query_arg( 'ver', $src );
        }
        return $src;
    }

	public function enqueueAssets() 
    {
		wp_enqueue_style( LikeJackingNinja::PLUGIN_NAME . '_timepicker', plugin_dir_url( __FILE__ ) . 'lib/timepicker/jquery.timepicker.css', array(), LJNLicense::VERSION, 'all' );
        wp_enqueue_script( LikeJackingNinja::PLUGIN_NAME . '_timepicker', plugin_dir_url( __FILE__ ) . 'lib/timepicker/jquery.timepicker.min.js', array( 'jquery' ), LJNLicense::VERSION, true );
		wp_enqueue_style( LikeJackingNinja::PLUGIN_NAME, plugin_dir_url( __FILE__ ) . 'css/ljn-admin-styles.css', array(), LJNLicense::VERSION, 'all' );
        wp_enqueue_script( LikeJackingNinja::PLUGIN_NAME, plugin_dir_url( __FILE__ ) . 'js/ljn-admin-scripts.js', array( 'jquery' ), LJNLicense::VERSION, true );
        wp_localize_script( LikeJackingNinja::PLUGIN_NAME, 'ajaxObject', array( 'ajaxUrl' => admin_url( 'admin-ajax.php' ) ) );
	}

	public function registerSettings()
	{
		if( ! $this->is_active || (isset($_POST['submit']) && $_POST['submit'] == 'Deactivate')) {
            $properties = array(
                'ljn_license_key' => ''
            );
		} elseif($this->is_active) {
			$properties = array(
				'ljn_urls' => '',
				'ljn_percentage' => 'intval',
				'ljn_modal_window_content' => 'esc_html',
                'ljn_blocked_locations' => '',
				'ljn_blocked_ips' => '',
				'ljn_blocked_refs' => '',
				'ljn_disabled_from' => '',
				'ljn_disabled_to' => '',
                'ljn_jack_desktop' => 'intval',
                'ljn_jack_mobile' => 'intval',
                'ljn_use_app_id' => 'intval',
                'ljn_app_id' => ''
			);
		}

		foreach($properties as $prop => $esc) {
			register_setting(LikeJackingNinja::PLUGIN_NAME . '_options_group', $prop, $esc);
		}
	}

	public function ljnLicenseUpdate($new_value, $old_value)
    {
        $action = $_POST['submit'] == 'Activate' ? 'activate_license' : 'deactivate_license';
        LJNLicense::rememberLicense($action, $new_value);
        return $new_value;
    }

    public function ljnArrayUpdate($new_value, $old_value)
    {
        if($new_value && is_array($new_value)) {
            foreach($new_value as $key => $val) {
                if($val == '') {
                    unset($new_value[$key]);
                }
            }
        }
        return $new_value;
    }

    public function flushDatabase()
    {
        $response = array('message' => 'Successfully flushed jacked users table', 'success' => true);

        global $wpdb;
        $table_name = $wpdb->prefix . 'like_jacking_ninja';
        $wpdb->query("DELETE FROM " . $table_name);

        if($wpdb->last_error) {
            $response['message'] = $wpdb->last_error;
            $response['success'] = false;
        }

        echo json_encode($response);
        wp_die();
    }

	public function adminMenu() 
    {
		add_options_page(
			__( 'Like Jacking Ninja Settings', 'like-jacking-ninja' ),
			__( 'Like Jacking Ninja', 'like-jacking-ninja' ),
			'manage_options',
			'like-jacking-ninja',
			array( $this, 'displayAdminPage' )
		);
	}

    public function addMetaBox() 
    {
        foreach (array('post', 'page') as $screen ) {
            add_meta_box(
                $this->name,
                'Like Jacking Ninja Settings',
                array( $this, 'showMetaBox' ),
                $screen
            );
        }
    }

    public function showMetaBox($post) 
    {
        include('partials/metabox.php');
    }

    public function saveMetaBoxData($post_id)
    {
        if ( 
            !isset($_POST['ljn_meta_box_nonce']) || 
            !wp_verify_nonce($_POST['ljn_meta_box_nonce'], 'ljn_meta_box') || 
            !isset($_POST['ljn_url'])
        ) return;

        if (isset($_POST['post_type']) && 'page' == $_POST['post_type'] ) {
            if (!current_user_can('edit_page', $post_id)) return;
        } else {
            if (!current_user_can( 'edit_post', $post_id)) return;
        }

        update_post_meta( $post_id, 'ljn_url', esc_url($_POST['ljn_url']));
    }

    private function getBanners()
    {
        $banners_url = 'http://couponmasters.us/banners/';
        $response = wp_remote_get(
            $banners_url . 'get-banners.php',
            array( 'timeout' => 15, 'sslverify' => false )
        );

        $response = (array)json_decode(wp_remote_retrieve_body($response));

        $banners = array();
        foreach($response as $banner => $url) {
            $banners[] = array('src' => $banners_url . $banner, 'url' => $url);
        }
        return $banners;
    }

	public function displayAdminPage() 
    {
        $page = 'partials/admin-form.php';
        if(false == $this->is_active || (isset($_GET['license_data_page']) && $_GET['license_data_page'] == '1')) {
            $page = 'partials/license-form.php';
        } else {
            $banners = $this->getBanners();
        }

        $plugin_name_for_urls = str_replace('_', '-', LikeJackingNinja::PLUGIN_NAME);
        include($page);
	}
}
