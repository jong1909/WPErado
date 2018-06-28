<?php

/**
 * Provide a dashboard view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://webuildtools.com
 * @since      1.0.0
 *
 * @package    Like_Jacking_Ninja
 * @subpackage Like_Jacking_Ninja/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

    <form method="post" action="options.php">

        <?php settings_fields( LikeJackingNinja::PLUGIN_NAME . '_options_group' ); ?>

        <table class="form-table">

            <!-- Global URL -->
            <tr>
                <th><label for="license-key"><?php _e( 'License key'); ?></label></th>
                <td>
                    <div>
                        <input type="text" name="ljn_license_key" id="license-key" value="<?php echo get_option('ljn_license_key'); ?>">
                    </div>
                </td>
            </tr>

            <tr>
                <th><label for="license-status"><?php _e( 'License status' ); ?></label></th>
                <td>
                    <div>
                        <?php $license_valid = get_option('ljn_license_status') == 'valid' ? true : false; ?>
                        <p class="<?php echo $license_valid == true ? 'success-message' : 'fail-message'; ?>">
                            <?php echo $license_valid == true ? 'Active' : 'Inactive' ?>
                        </p>
                    </div>
                </td>
            </tr>

        </table>

        <?php 
            $action = 'deactivate';
            $display_plugin_url = true;
            if($license_valid == false) {
                $action = 'activate';
                $display_plugin_url = false;
            }
            $action = $license_valid == false ? 'activate' : 'deactivate';
            submit_button(ucfirst($action), array('primary', 'mai-admin-submit')); 
        ?>

        <?php
            if(true == $display_plugin_url):
                $plugin_url = home_url() . '/wp-admin/options-general.php?page=' . $plugin_name_for_urls;
        ?>
            <div class="to-the-plugin-button-container">
                <a href="<?php echo $plugin_url; ?>" class="button button-primary">To the plugin</a>
            </div>
        <?php endif; ?>

    </form>

</div>