<?php
/**
 * zsofa Admin Class
 *
 * @author   WooThemes
 * @package  zsofa
 * @since    2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'zsofa_Admin' ) ) :
	/**
	 * The zsofa admin class
	 */
	class zsofa_Admin {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'admin_menu', 				array( $this, 'welcome_register_menu' ) );
			add_action( 'admin_enqueue_scripts', 	array( $this, 'welcome_style' ) );
		}

		/**
		 * Load welcome screen css
		 *
		 * @param string $hook_suffix the current page hook suffix.
		 * @return void
		 * @since  1.4.4
		 */
		public function welcome_style( $hook_suffix ) {
			global $zsofa_version;

			if ( 'appearance_page_zsofa-welcome' === $hook_suffix ) {
				wp_enqueue_style( 'zsofa-welcome-screen', get_template_directory_uri() . '/assets/css/admin/welcome-screen/welcome.css', $zsofa_version );
				wp_style_add_data( 'zsofa-welcome-screen', 'rtl', 'replace' );
			}
		}

		/**
		 * Creates the dashboard page
		 *
		 * @see  add_theme_page()
		 * @since 1.0.0
		 */
		public function welcome_register_menu() {
			add_theme_page( 'zsofa', 'zsofa', 'activate_plugins', 'zsofa-welcome', array( $this, 'zsofa_welcome_screen' ) );
		}

		/**
		 * The welcome screen
		 *
		 * @since 1.0.0
		 */
		public function zsofa_welcome_screen() {
			require_once( ABSPATH . 'wp-load.php' );
			require_once( ABSPATH . 'wp-admin/admin.php' );
			require_once( ABSPATH . 'wp-admin/admin-header.php' );

			global $zsofa_version;
			?>

			<div class="zsofa-wrap">
				<section class="zsofa-welcome-nav">
					<span class="zsofa-welcome-nav__version">zsofa <?php echo esc_attr( $zsofa_version ); ?></span>
					<ul>
						<li><a href="https://wordpress.org/support/theme/zsofa" target="_blank"><?php esc_attr_e( 'Support', 'zsofa' ); ?></a></li>
						<li><a href="https://docs.woocommerce.com/documentation/themes/zsofa/" target="_blank"><?php esc_attr_e( 'Documentation', 'zsofa' ); ?></a></li>
						<li><a href="https://woocommerce.wordpress.com/category/zsofa/" target="_blank"><?php esc_attr_e( 'Development blog', 'zsofa' ); ?></a></li>
					</ul>
				</section>

				<div class="zsofa-logo">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/admin/zsofa-icon.svg" alt="zsofa" />
				</div>

				<div class="zsofa-intro">
					<?php
					/**
					 * Display a different message when the user visits this page when returning from the guided tour
					 */
					$referrer = wp_get_referer();

					if ( strpos( $referrer, 'sf_starter_content' ) !== false ) {
						echo '<h1>' . sprintf( esc_attr__( 'Setup complete %sYour zsofa adventure begins now 🚀%s ', 'zsofa' ), '<span>', '</span>' ) . '</h1>';
						echo '<p>' . esc_attr__( 'One more thing... You might be interested in the following zsofa extensions and designs.', 'zsofa' ) . '</p>';
					} else {
						echo '<p>' . esc_attr__( 'Hello! You might be interested in the following zsofa extensions and designs.', 'zsofa' ) . '</p>';
					}
					?>
				</div>

				<div class="zsofa-enhance">
					<div class="zsofa-enhance__column zsofa-bundle">
						<h3><?php esc_attr_e( 'zsofa Extensions Bundle', 'zsofa' ); ?></h3>
						<span class="bundle-image">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/admin/welcome-screen/zsofa-bundle-hero.png" alt="zsofa Extensions Hero" />
						</span>

						<p>
							<?php esc_attr_e( 'All the tools you\'ll need to define your style and customize zsofa.', 'zsofa' ); ?>
						</p>

						<p>
							<?php esc_attr_e( 'Make it yours without touching code with the zsofa Extensions bundle. Express yourself, optimize conversions, delight customers.', 'zsofa' ); ?>
						</p>


						<p>
							<a href="https://woocommerce.com/products/zsofa-extensions-bundle/?utm_source=product&utm_medium=upsell&utm_campaign=zsofaaddons" class="zsofa-button" target="_blank"><?php esc_attr_e( 'Read more and purchase', 'zsofa' ); ?></a>
						</p>
					</div>
					<div class="zsofa-enhance__column zsofa-child-themes">
						<h3><?php esc_attr_e( 'Alternate designs', 'zsofa' ); ?></h3>
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/admin/welcome-screen/child-themes.jpg" alt="zsofa Powerpack" />

						<p>
							<?php esc_attr_e( 'Quickly and easily transform your shops appearance with zsofa child themes.', 'zsofa' ); ?>
						</p>

						<p>
							<?php esc_attr_e( 'Each has been designed to serve a different industry - from fashion to food.', 'zsofa' ); ?>
						</p>

						<p>
							<?php esc_attr_e( 'Of course they are all fully compatible with each zsofa extension.', 'zsofa' ); ?>
						</p>

						<p>
							<a href="https://woocommerce.com/product-category/themes/zsofa-child-theme-themes/?utm_source=product&utm_medium=upsell&utm_campaign=zsofaaddons" class="zsofa-button" target="_blank"><?php esc_attr_e( 'Check \'em out', 'zsofa' ); ?></a>
						</p>
					</div>
				</div>

				<div class="automattic">
					<p>
					<?php printf( esc_html__( 'An %s project', 'zsofa' ), '<a href="https://automattic.com/"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/admin/welcome-screen/automattic.png" alt="Automattic" /></a>' ); ?>
					</p>
				</div>
			</div>
			<?php
		}

		/**
		 * Welcome screen intro
		 *
		 * @since 1.0.0
		 */
		public function welcome_intro() {
			require_once( get_template_directory() . '/inc/admin/welcome-screen/component-intro.php' );
		}

		/**
		 * Output a button that will install or activate a plugin if it doesn't exist, or display a disabled button if the
		 * plugin is already activated.
		 *
		 * @param string $plugin_slug The plugin slug.
		 * @param string $plugin_file The plugin file.
		 */
		public function install_plugin_button( $plugin_slug, $plugin_file ) {
			if ( current_user_can( 'install_plugins' ) && current_user_can( 'activate_plugins' ) ) {
				if ( is_plugin_active( $plugin_slug . '/' . $plugin_file ) ) {
					/**
					 * The plugin is already active
					 */
					$button = array(
						'message' => esc_attr__( 'Activated', 'zsofa' ),
						'url'     => '#',
						'classes' => 'disabled',
					);
				} elseif ( $url = $this->_is_plugin_installed( $plugin_slug ) ) {
					/**
					 * The plugin exists but isn't activated yet.
					 */
					$button = array(
						'message' => esc_attr__( 'Activate', 'zsofa' ),
						'url'     => $url,
						'classes' => 'activate-now',
					);
				} else {
					/**
					 * The plugin doesn't exist.
					 */
					$url = wp_nonce_url( add_query_arg( array(
						'action' => 'install-plugin',
						'plugin' => $plugin_slug,
					), self_admin_url( 'update.php' ) ), 'install-plugin_' . $plugin_slug );
					$button = array(
						'message' => esc_attr__( 'Install now', 'zsofa' ),
						'url'     => $url,
						'classes' => ' install-now install-' . $plugin_slug,
					);
				}
				?>
				<a href="<?php echo esc_url( $button['url'] ); ?>" class="zsofa-button <?php echo esc_attr( $button['classes'] ); ?>" data-originaltext="<?php echo esc_attr( $button['message'] ); ?>" data-slug="<?php echo esc_attr( $plugin_slug ); ?>" aria-label="<?php echo esc_attr( $button['message'] ); ?>"><?php echo esc_attr( $button['message'] ); ?></a>
				<a href="https://wordpress.org/plugins/<?php echo esc_attr( $plugin_slug ); ?>" target="_blank"><?php esc_attr_e( 'Learn more', 'zsofa' ); ?></a>
				<?php
			}
		}

		/**
		 * Check if a plugin is installed and return the url to activate it if so.
		 *
		 * @param string $plugin_slug The plugin slug.
		 */
		public function _is_plugin_installed( $plugin_slug ) {
			if ( file_exists( WP_PLUGIN_DIR . '/' . $plugin_slug ) ) {
				$plugins = get_plugins( '/' . $plugin_slug );
				if ( ! empty( $plugins ) ) {
					$keys        = array_keys( $plugins );
					$plugin_file = $plugin_slug . '/' . $keys[0];
					$url         = wp_nonce_url( add_query_arg( array(
						'action' => 'activate',
						'plugin' => $plugin_file,
					), admin_url( 'plugins.php' ) ), 'activate-plugin_' . $plugin_file );
					return $url;
				}
			}
			return false;
		}
		/**
		 * Welcome screen enhance section
		 *
		 * @since 1.5.2
		 */
		public function welcome_enhance() {
			require_once( get_template_directory() . '/inc/admin/welcome-screen/component-enhance.php' );
		}

		/**
		 * Welcome screen contribute section
		 *
		 * @since 1.5.2
		 */
		public function welcome_contribute() {
			require_once( get_template_directory() . '/inc/admin/welcome-screen/component-contribute.php' );
		}

		/**
		 * Get product data from json
		 *
		 * @param  string $url       URL to the json file.
		 * @param  string $transient Name the transient.
		 * @return [type]            [description]
		 */
		public function get_zsofa_product_data( $url, $transient ) {
			$raw_products = wp_safe_remote_get( $url );
			$products     = json_decode( wp_remote_retrieve_body( $raw_products ) );

			if ( ! empty( $products ) ) {
				set_transient( $transient, $products, DAY_IN_SECONDS );
			}

			return $products;
		}
	}

endif;

return new zsofa_Admin();
