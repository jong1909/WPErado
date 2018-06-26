<?php
/**
 * zsofa Jetpack Class
 *
 * @package  zsofa
 * @author   WooThemes
 * @since    2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'zsofa_Jetpack' ) ) :

	/**
	 * The zsofa Jetpack integration class
	 */
	class zsofa_Jetpack {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'init',                       array( $this, 'jetpack_setup' ) );
			add_action( 'wp_enqueue_scripts',         array( $this, 'jetpack_scripts' ), 10 );

			if ( zsofa_is_woocommerce_activated() ) {
				add_action( 'init', array( $this, 'jetpack_infinite_scroll_wrapper_columns' ) );
			}
		}

		/**
		 * Add theme support for Infinite Scroll.
		 * See: http://jetpack.me/support/infinite-scroll/
		 */
		public function jetpack_setup() {
			add_theme_support( 'infinite-scroll', apply_filters( 'zsofa_jetpack_infinite_scroll_args', array(
				'container'      => 'main',
				'footer'         => 'page',
				'render'         => array( $this, 'jetpack_infinite_scroll_loop' ),
				'footer_widgets' => array(
					'footer-1',
					'footer-2',
					'footer-3',
					'footer-4',
				),
			) ) );
		}

		/**
		 * A loop used to display content appended using Jetpack infinite scroll
		 * @return void
		 */
		public function jetpack_infinite_scroll_loop() {
			do_action( 'zsofa_jetpack_infinite_scroll_before' );

			if ( zsofa_is_product_archive() ) {
				do_action( 'zsofa_jetpack_product_infinite_scroll_before' );
				woocommerce_product_loop_start();
			}

			while ( have_posts() ) : the_post();
				if ( zsofa_is_product_archive() ) {
					wc_get_template_part( 'content', 'product' );
				} else {
					get_template_part( 'content', get_post_format() );
				}
			endwhile; // end of the loop.

			if ( zsofa_is_product_archive() ) {
				woocommerce_product_loop_end();
				do_action( 'zsofa_jetpack_product_infinite_scroll_after' );
			}

			do_action( 'zsofa_jetpack_infinite_scroll_after' );
		}

		/**
		 * Adds columns wrapper to content appended by Jetpack infinite scroll
		 * @return void
		 */
		public function jetpack_infinite_scroll_wrapper_columns() {
			add_action( 'zsofa_jetpack_product_infinite_scroll_before', 'zsofa_product_columns_wrapper' );
			add_action( 'zsofa_jetpack_product_infinite_scroll_after', 'zsofa_product_columns_wrapper_close' );
		}

		/**
		 * Enqueue jetpack styles.
		 *
		 * @since  1.6.1
		 */
		public function jetpack_scripts() {
			global $zsofa_version;

			wp_enqueue_style( 'zsofa-jetpack-style', get_template_directory_uri() . '/assets/css/jetpack/jetpack.css', '', $zsofa_version );
			wp_style_add_data( 'zsofa-jetpack-style', 'rtl', 'replace' );
		}
	}

endif;

return new zsofa_Jetpack();
