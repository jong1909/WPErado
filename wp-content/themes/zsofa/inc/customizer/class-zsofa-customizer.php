<?php
/**
 * zsofa Customizer Class
 *
 * @author   WooThemes
 * @package  zsofa
 * @since    2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'zsofa_Customizer' ) ) :

	/**
	 * The zsofa Customizer class
	 */
	class zsofa_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'customize_register',              array( $this, 'customize_register' ), 10 );
			add_filter( 'body_class',                      array( $this, 'layout_class' ) );
			add_action( 'wp_enqueue_scripts',              array( $this, 'add_customizer_css' ), 130 );
			add_action( 'after_setup_theme',               array( $this, 'custom_header_setup' ) );
			add_action( 'customize_controls_print_styles', array( $this, 'customizer_custom_control_css' ) );
			add_action( 'customize_register',              array( $this, 'edit_default_customizer_settings' ), 99 );
			add_action( 'init',                            array( $this, 'default_theme_mod_values' ), 10 );
		}

		/**
		 * Returns an array of the desired default zsofa Options
		 *
		 * @return array
		 */
		public static function get_zsofa_default_setting_values() {
			return apply_filters( 'zsofa_setting_default_values', $args = array(
				'zsofa_heading_color'               => '#333333',
				'zsofa_text_color'                  => '#6d6d6d',
				'zsofa_accent_color'                => '#96588a',
				'zsofa_hero_heading_color'          => '#000000',
				'zsofa_hero_text_color'             => '#000000',
				'zsofa_header_background_color'     => '#ffffff',
				'zsofa_header_text_color'           => '#404040',
				'zsofa_header_link_color'           => '#333333',
				'zsofa_footer_background_color'     => '#f0f0f0',
				'zsofa_footer_heading_color'        => '#333333',
				'zsofa_footer_text_color'           => '#6d6d6d',
				'zsofa_footer_link_color'           => '#333333',
				'zsofa_button_background_color'     => '#eeeeee',
				'zsofa_button_text_color'           => '#333333',
				'zsofa_button_alt_background_color' => '#333333',
				'zsofa_button_alt_text_color'       => '#ffffff',
				'zsofa_layout'                      => 'right',
				'zsofa_sticky_add_to_cart'          => true,
				'zsofa_product_pagination'          => true,
				'background_color'                       => 'ffffff',
			) );
		}

		/**
		 * Adds a value to each zsofa setting if one isn't already present.
		 *
		 * @uses get_zsofa_default_setting_values()
		 */
		public function default_theme_mod_values() {
			foreach ( self::get_zsofa_default_setting_values() as $mod => $val ) {
				add_filter( 'theme_mod_' . $mod, array( $this, 'get_theme_mod_value' ), 10 );
			}
		}

		/**
		 * Get theme mod value.
		 *
		 * @param string $value
		 * @return string
		 */
		public function get_theme_mod_value( $value ) {
			$key = substr( current_filter(), 10 );

			$set_theme_mods = get_theme_mods();

			if ( isset( $set_theme_mods[ $key ] ) ) {
				return $value;
			}

			$values = $this->get_zsofa_default_setting_values();

			return isset( $values[ $key ] ) ? $values[ $key ] : $value;
		}

		/**
		 * Set Customizer setting defaults.
		 * These defaults need to be applied separately as child themes can filter zsofa_setting_default_values
		 *
		 * @param  array $wp_customize the Customizer object.
		 * @uses   get_zsofa_default_setting_values()
		 */
		public function edit_default_customizer_settings( $wp_customize ) {
			foreach ( self::get_zsofa_default_setting_values() as $mod => $val ) {
				$wp_customize->get_setting( $mod )->default = $val;
			}
		}

		/**
		 * Setup the WordPress core custom header feature.
		 *
		 * @uses zsofa_header_style()
		 * @uses zsofa_admin_header_style()
		 * @uses zsofa_admin_header_image()
		 */
		public function custom_header_setup() {
			add_theme_support( 'custom-header', apply_filters( 'zsofa_custom_header_args', array(
				'default-image' => '',
				'header-text'   => false,
				'width'         => 1950,
				'height'        => 500,
				'flex-width'    => true,
				'flex-height'   => true,
			) ) );
		}

		/**
		 * Add postMessage support for site title and description for the Theme Customizer along with several other settings.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 * @since  1.0.0
		 */
		public function customize_register( $wp_customize ) {

			// Move background color setting alongside background image.
			$wp_customize->get_control( 'background_color' )->section   = 'background_image';
			$wp_customize->get_control( 'background_color' )->priority  = 20;

			// Change background image section title & priority.
			$wp_customize->get_section( 'background_image' )->title     = __( 'Background', 'zsofa' );
			$wp_customize->get_section( 'background_image' )->priority  = 30;

			// Change header image section title & priority.
			$wp_customize->get_section( 'header_image' )->title         = __( 'Header', 'zsofa' );
			$wp_customize->get_section( 'header_image' )->priority      = 25;

			// Selective refresh.
			if ( function_exists( 'add_partial' ) ) {
				$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
				$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

				$wp_customize->selective_refresh->add_partial( 'custom_logo', array(
					'selector'        => '.site-branding',
					'render_callback' => array( $this, 'get_site_logo' ),
				) );

				$wp_customize->selective_refresh->add_partial( 'blogname', array(
					'selector'        => '.site-title.beta a',
					'render_callback' => array( $this, 'get_site_name' ),
				) );

				$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
					'selector'        => '.site-description',
					'render_callback' => array( $this, 'get_site_description' ),
				) );
			}

			/**
			 * Custom controls
			 */
			require_once dirname( __FILE__ ) . '/class-zsofa-customizer-control-radio-image.php';
			require_once dirname( __FILE__ ) . '/class-zsofa-customizer-control-arbitrary.php';

			if ( apply_filters( 'zsofa_customizer_more', true ) ) {
				require_once dirname( __FILE__ ) . '/class-zsofa-customizer-control-more.php';
			}

			/**
			 * Add the typography section
			 */
			$wp_customize->add_section( 'zsofa_typography' , array(
				'title'      			=> __( 'Typography', 'zsofa' ),
				'priority'   			=> 45,
			) );

			/**
			 * Heading color
			 */
			$wp_customize->add_setting( 'zsofa_heading_color', array(
				'default'           	=> apply_filters( 'zsofa_default_heading_color', '#484c51' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zsofa_heading_color', array(
				'label'	   				=> __( 'Heading color', 'zsofa' ),
				'section'  				=> 'zsofa_typography',
				'settings' 				=> 'zsofa_heading_color',
				'priority' 				=> 20,
			) ) );

			/**
			 * Text Color
			 */
			$wp_customize->add_setting( 'zsofa_text_color', array(
				'default'           	=> apply_filters( 'zsofa_default_text_color', '#43454b' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zsofa_text_color', array(
				'label'					=> __( 'Text color', 'zsofa' ),
				'section'				=> 'zsofa_typography',
				'settings'				=> 'zsofa_text_color',
				'priority'				=> 30,
			) ) );

			/**
			 * Accent Color
			 */
			$wp_customize->add_setting( 'zsofa_accent_color', array(
				'default'           	=> apply_filters( 'zsofa_default_accent_color', '#96588a' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zsofa_accent_color', array(
				'label'	   				=> __( 'Link / accent color', 'zsofa' ),
				'section'  				=> 'zsofa_typography',
				'settings' 				=> 'zsofa_accent_color',
				'priority' 				=> 40,
			) ) );

			/**
			 * Hero Heading Color
			 */
			$wp_customize->add_setting( 'zsofa_hero_heading_color', array(
				'default'           	=> apply_filters( 'zsofa_default_hero_heading_color', '#000000' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zsofa_hero_heading_color', array(
				'label'	   				=> __( 'Hero heading color', 'zsofa' ),
				'section'  				=> 'zsofa_typography',
				'settings' 				=> 'zsofa_hero_heading_color',
				'priority' 				=> 50,
				'active_callback'       => array( $this, 'is_homepage_template' ),
			) ) );

			/**
			 * Hero Text Color
			 */
			$wp_customize->add_setting( 'zsofa_hero_text_color', array(
				'default'           	=> apply_filters( 'zsofa_default_hero_text_color', '#000000' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zsofa_hero_text_color', array(
				'label'	   				=> __( 'Hero text color', 'zsofa' ),
				'section'  				=> 'zsofa_typography',
				'settings' 				=> 'zsofa_hero_text_color',
				'priority' 				=> 60,
				'active_callback'       => array( $this, 'is_homepage_template' ),
			) ) );

			$wp_customize->add_control( new Arbitrary_zsofa_Control( $wp_customize, 'zsofa_header_image_heading', array(
				'section'  				=> 'header_image',
				'type' 					=> 'heading',
				'label'					=> __( 'Header background image', 'zsofa' ),
				'priority' 				=> 6,
			) ) );

			/**
			 * Header Background
			 */
			$wp_customize->add_setting( 'zsofa_header_background_color', array(
				'default'           	=> apply_filters( 'zsofa_default_header_background_color', '#2c2d33' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zsofa_header_background_color', array(
				'label'	   				=> __( 'Background color', 'zsofa' ),
				'section'  				=> 'header_image',
				'settings' 				=> 'zsofa_header_background_color',
				'priority' 				=> 15,
			) ) );

			/**
			 * Header text color
			 */
			$wp_customize->add_setting( 'zsofa_header_text_color', array(
				'default'           	=> apply_filters( 'zsofa_default_header_text_color', '#9aa0a7' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zsofa_header_text_color', array(
				'label'	   				=> __( 'Text color', 'zsofa' ),
				'section'  				=> 'header_image',
				'settings' 				=> 'zsofa_header_text_color',
				'priority' 				=> 20,
			) ) );

			/**
			 * Header link color
			 */
			$wp_customize->add_setting( 'zsofa_header_link_color', array(
				'default'           	=> apply_filters( 'zsofa_default_header_link_color', '#d5d9db' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zsofa_header_link_color', array(
				'label'	   				=> __( 'Link color', 'zsofa' ),
				'section'  				=> 'header_image',
				'settings' 				=> 'zsofa_header_link_color',
				'priority' 				=> 30,
			) ) );

			/**
			 * Footer section
			 */
			$wp_customize->add_section( 'zsofa_footer' , array(
				'title'      			=> __( 'Footer', 'zsofa' ),
				'priority'   			=> 28,
				'description' 			=> __( 'Customize the look & feel of your website footer.', 'zsofa' ),
			) );

			/**
			 * Footer Background
			 */
			$wp_customize->add_setting( 'zsofa_footer_background_color', array(
				'default'           	=> apply_filters( 'zsofa_default_footer_background_color', '#f0f0f0' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zsofa_footer_background_color', array(
				'label'	   				=> __( 'Background color', 'zsofa' ),
				'section'  				=> 'zsofa_footer',
				'settings' 				=> 'zsofa_footer_background_color',
				'priority'				=> 10,
			) ) );

			/**
			 * Footer heading color
			 */
			$wp_customize->add_setting( 'zsofa_footer_heading_color', array(
				'default'           	=> apply_filters( 'zsofa_default_footer_heading_color', '#494c50' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zsofa_footer_heading_color', array(
				'label'	   				=> __( 'Heading color', 'zsofa' ),
				'section'  				=> 'zsofa_footer',
				'settings' 				=> 'zsofa_footer_heading_color',
				'priority'				=> 20,
			) ) );

			/**
			 * Footer text color
			 */
			$wp_customize->add_setting( 'zsofa_footer_text_color', array(
				'default'           	=> apply_filters( 'zsofa_default_footer_text_color', '#61656b' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zsofa_footer_text_color', array(
				'label'	   				=> __( 'Text color', 'zsofa' ),
				'section'  				=> 'zsofa_footer',
				'settings' 				=> 'zsofa_footer_text_color',
				'priority'				=> 30,
			) ) );

			/**
			 * Footer link color
			 */
			$wp_customize->add_setting( 'zsofa_footer_link_color', array(
				'default'           	=> apply_filters( 'zsofa_default_footer_link_color', '#2c2d33' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zsofa_footer_link_color', array(
				'label'	   				=> __( 'Link color', 'zsofa' ),
				'section'  				=> 'zsofa_footer',
				'settings' 				=> 'zsofa_footer_link_color',
				'priority'				=> 40,
			) ) );

			/**
			 * Buttons section
			 */
			$wp_customize->add_section( 'zsofa_buttons' , array(
				'title'      			=> __( 'Buttons', 'zsofa' ),
				'priority'   			=> 45,
				'description' 			=> __( 'Customize the look & feel of your website buttons.', 'zsofa' ),
			) );

			/**
			 * Button background color
			 */
			$wp_customize->add_setting( 'zsofa_button_background_color', array(
				'default'           	=> apply_filters( 'zsofa_default_button_background_color', '#96588a' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zsofa_button_background_color', array(
				'label'	   				=> __( 'Background color', 'zsofa' ),
				'section'  				=> 'zsofa_buttons',
				'settings' 				=> 'zsofa_button_background_color',
				'priority' 				=> 10,
			) ) );

			/**
			 * Button text color
			 */
			$wp_customize->add_setting( 'zsofa_button_text_color', array(
				'default'           	=> apply_filters( 'zsofa_default_button_text_color', '#ffffff' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zsofa_button_text_color', array(
				'label'	   				=> __( 'Text color', 'zsofa' ),
				'section'  				=> 'zsofa_buttons',
				'settings' 				=> 'zsofa_button_text_color',
				'priority' 				=> 20,
			) ) );

			/**
			 * Button alt background color
			 */
			$wp_customize->add_setting( 'zsofa_button_alt_background_color', array(
				'default'           	=> apply_filters( 'zsofa_default_button_alt_background_color', '#2c2d33' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zsofa_button_alt_background_color', array(
				'label'	   				=> __( 'Alternate button background color', 'zsofa' ),
				'section'  				=> 'zsofa_buttons',
				'settings' 				=> 'zsofa_button_alt_background_color',
				'priority' 				=> 30,
			) ) );

			/**
			 * Button alt text color
			 */
			$wp_customize->add_setting( 'zsofa_button_alt_text_color', array(
				'default'           	=> apply_filters( 'zsofa_default_button_alt_text_color', '#ffffff' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zsofa_button_alt_text_color', array(
				'label'	   				=> __( 'Alternate button text color', 'zsofa' ),
				'section'  				=> 'zsofa_buttons',
				'settings' 				=> 'zsofa_button_alt_text_color',
				'priority' 				=> 40,
			) ) );

			/**
			 * Layout
			 */
			$wp_customize->add_section( 'zsofa_layout' , array(
				'title'      			=> __( 'Layout', 'zsofa' ),
				'priority'   			=> 50,
			) );

			$wp_customize->add_setting( 'zsofa_layout', array(
				'default'    			=> apply_filters( 'zsofa_default_layout', $layout = is_rtl() ? 'left' : 'right' ),
				'sanitize_callback' 	=> 'zsofa_sanitize_choices',
			) );

			$wp_customize->add_control( new zsofa_Custom_Radio_Image_Control( $wp_customize, 'zsofa_layout', array(
				'settings'				=> 'zsofa_layout',
				'section'				=> 'zsofa_layout',
				'label'					=> __( 'General Layout', 'zsofa' ),
				'priority'				=> 1,
				'choices'				=> array(
											'right' => get_template_directory_uri() . '/assets/images/customizer/controls/2cr.png',
											'left'  => get_template_directory_uri() . '/assets/images/customizer/controls/2cl.png',
				),
			) ) );

			/**
			 * Product Page
			 */
			$wp_customize->add_section( 'zsofa_single_product_page' , array(
				'title'                 => __( 'Product Page', 'zsofa' ),
				'priority'              => 60,
			) );

			$wp_customize->add_setting( 'zsofa_product_pagination', array(
				'default'               => apply_filters( 'zsofa_default_product_pagination', true ),
				'sanitize_callback'     => 'wp_validate_boolean',
			) );

			$wp_customize->add_setting( 'zsofa_sticky_add_to_cart', array(
				'default'               => apply_filters( 'zsofa_default_sticky_add_to_cart', true ),
				'sanitize_callback'     => 'wp_validate_boolean',
			) );

			$wp_customize->add_control( 'zsofa_sticky_add_to_cart', array(
				'type'                  => 'checkbox',
				'section'               => 'zsofa_single_product_page',
				'label'                 => __( 'Sticky Add-To-Cart', 'zsofa' ),
				'description'           => __( 'A small content bar at the top of the browser window which includes relevant product information and an add-to-cart button. It slides into view once the standard add-to-cart button has scrolled out of view.', 'zsofa' ),
				'priority' 				=> 10,
			) );

			$wp_customize->add_control( 'zsofa_product_pagination', array(
				'type'                  => 'checkbox',
				'section'               => 'zsofa_single_product_page',
				'label'                 => __( 'Product Pagination', 'zsofa' ),
				'description'           => __( 'Displays next and previous links on product pages. A product thumbnail is displayed with the title revealed on hover.', 'zsofa' ),
				'priority' 				=> 20,
			) );

			/**
			 * More
			 */
			if ( apply_filters( 'zsofa_customizer_more', true ) ) {
				$wp_customize->add_section( 'zsofa_more' , array(
					'title'      		=> __( 'More', 'zsofa' ),
					'priority'   		=> 999,
				) );

				$wp_customize->add_setting( 'zsofa_more', array(
					'default'    		=> null,
					'sanitize_callback' => 'sanitize_text_field',
				) );

				$wp_customize->add_control( new More_zsofa_Control( $wp_customize, 'zsofa_more', array(
					'label'    			=> __( 'Looking for more options?', 'zsofa' ),
					'section'  			=> 'zsofa_more',
					'settings' 			=> 'zsofa_more',
					'priority' 			=> 1,
				) ) );
			}
		}

		/**
		 * Get all of the zsofa theme mods.
		 *
		 * @return array $zsofa_theme_mods The zsofa Theme Mods.
		 */
		public function get_zsofa_theme_mods() {
			$zsofa_theme_mods = array(
				'background_color'            => zsofa_get_content_background_color(),
				'accent_color'                => get_theme_mod( 'zsofa_accent_color' ),
				'hero_heading_color'          => get_theme_mod( 'zsofa_hero_heading_color' ),
				'hero_text_color'             => get_theme_mod( 'zsofa_hero_text_color' ),
				'header_background_color'     => get_theme_mod( 'zsofa_header_background_color' ),
				'header_link_color'           => get_theme_mod( 'zsofa_header_link_color' ),
				'header_text_color'           => get_theme_mod( 'zsofa_header_text_color' ),
				'footer_background_color'     => get_theme_mod( 'zsofa_footer_background_color' ),
				'footer_link_color'           => get_theme_mod( 'zsofa_footer_link_color' ),
				'footer_heading_color'        => get_theme_mod( 'zsofa_footer_heading_color' ),
				'footer_text_color'           => get_theme_mod( 'zsofa_footer_text_color' ),
				'text_color'                  => get_theme_mod( 'zsofa_text_color' ),
				'heading_color'               => get_theme_mod( 'zsofa_heading_color' ),
				'button_background_color'     => get_theme_mod( 'zsofa_button_background_color' ),
				'button_text_color'           => get_theme_mod( 'zsofa_button_text_color' ),
				'button_alt_background_color' => get_theme_mod( 'zsofa_button_alt_background_color' ),
				'button_alt_text_color'       => get_theme_mod( 'zsofa_button_alt_text_color' ),
			);

			return apply_filters( 'zsofa_theme_mods', $zsofa_theme_mods );
		}

		/**
		 * Get Customizer css.
		 *
		 * @see get_zsofa_theme_mods()
		 * @return array $styles the css
		 */
		public function get_css() {
			$zsofa_theme_mods = $this->get_zsofa_theme_mods();
			$brighten_factor       = apply_filters( 'zsofa_brighten_factor', 25 );
			$darken_factor         = apply_filters( 'zsofa_darken_factor', -25 );

			$styles                = '
			.main-navigation ul li a,
			.site-title a,
			ul.menu li a,
			.site-branding h1 a,
			.site-footer .zsofa-handheld-footer-bar a:not(.button),
			button.menu-toggle,
			button.menu-toggle:hover {
				color: ' . $zsofa_theme_mods['header_link_color'] . ';
			}

			button.menu-toggle,
			button.menu-toggle:hover {
				border-color: ' . $zsofa_theme_mods['header_link_color'] . ';
			}

			.main-navigation ul li a:hover,
			.main-navigation ul li:hover > a,
			.site-title a:hover,
			a.cart-contents:hover,
			.site-header-cart .widget_shopping_cart a:hover,
			.site-header-cart:hover > li > a,
			.site-header ul.menu li.current-menu-item > a {
				color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['header_link_color'], 65 ) . ';
			}

			table th {
				background-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['background_color'], -7 ) . ';
			}

			table tbody td {
				background-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['background_color'], -2 ) . ';
			}

			table tbody tr:nth-child(2n) td,
			fieldset,
			fieldset legend {
				background-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['background_color'], -4 ) . ';
			}

			.site-header,
			.secondary-navigation ul ul,
			.main-navigation ul.menu > li.menu-item-has-children:after,
			.secondary-navigation ul.menu ul,
			.zsofa-handheld-footer-bar,
			.zsofa-handheld-footer-bar ul li > a,
			.zsofa-handheld-footer-bar ul li.search .site-search,
			button.menu-toggle,
			button.menu-toggle:hover {
				background-color: ' . $zsofa_theme_mods['header_background_color'] . ';
			}

			p.site-description,
			.site-header,
			.zsofa-handheld-footer-bar {
				color: ' . $zsofa_theme_mods['header_text_color'] . ';
			}

			.zsofa-handheld-footer-bar ul li.cart .count,
			button.menu-toggle:after,
			button.menu-toggle:before,
			button.menu-toggle span:before {
				background-color: ' . $zsofa_theme_mods['header_link_color'] . ';
			}

			.zsofa-handheld-footer-bar ul li.cart .count {
				color: ' . $zsofa_theme_mods['header_background_color'] . ';
			}

			.zsofa-handheld-footer-bar ul li.cart .count {
				border-color: ' . $zsofa_theme_mods['header_background_color'] . ';
			}

			.widget h1 {
				border-bottom-color: ' . $zsofa_theme_mods['heading_color'] . ';
			}

			body,
			.secondary-navigation a,
			.onsale,
			.pagination .page-numbers li .page-numbers:not(.current), .woocommerce-pagination .page-numbers li .page-numbers:not(.current) {
				color: ' . $zsofa_theme_mods['text_color'] . ';
			}

			.widget-area .widget a,
			.hentry .entry-header .posted-on a,
			.hentry .entry-header .byline a {
				color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['text_color'], 5 ) . ';
			}

			a  {
				color: ' . $zsofa_theme_mods['accent_color'] . ';
			}

			a:focus,
			.button:focus,
			.button.alt:focus,
			.button.added_to_cart:focus,
			.button.wc-forward:focus,
			button:focus,
			input[type="button"]:focus,
			input[type="reset"]:focus,
			input[type="submit"]:focus {
				outline-color: ' . $zsofa_theme_mods['accent_color'] . ';
			}

			button, input[type="button"], input[type="reset"], input[type="submit"], .button, .added_to_cart, .widget a.button, .site-header-cart .widget_shopping_cart a.button {
				background-color: ' . $zsofa_theme_mods['button_background_color'] . ';
				border-color: ' . $zsofa_theme_mods['button_background_color'] . ';
				color: ' . $zsofa_theme_mods['button_text_color'] . ';
			}

			button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .button:hover, .added_to_cart:hover, .widget a.button:hover, .site-header-cart .widget_shopping_cart a.button:hover {
				background-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['button_background_color'], $darken_factor ) . ';
				border-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['button_background_color'], $darken_factor ) . ';
				color: ' . $zsofa_theme_mods['button_text_color'] . ';
			}

			button.alt, input[type="button"].alt, input[type="reset"].alt, input[type="submit"].alt, .button.alt, .added_to_cart.alt, .widget-area .widget a.button.alt, .added_to_cart, .widget a.button.checkout {
				background-color: ' . $zsofa_theme_mods['button_alt_background_color'] . ';
				border-color: ' . $zsofa_theme_mods['button_alt_background_color'] . ';
				color: ' . $zsofa_theme_mods['button_alt_text_color'] . ';
			}

			button.alt:hover, input[type="button"].alt:hover, input[type="reset"].alt:hover, input[type="submit"].alt:hover, .button.alt:hover, .added_to_cart.alt:hover, .widget-area .widget a.button.alt:hover, .added_to_cart:hover, .widget a.button.checkout:hover {
				background-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['button_alt_background_color'], $darken_factor ) . ';
				border-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['button_alt_background_color'], $darken_factor ) . ';
				color: ' . $zsofa_theme_mods['button_alt_text_color'] . ';
			}

			.pagination .page-numbers li .page-numbers.current, .woocommerce-pagination .page-numbers li .page-numbers.current {
				background-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['background_color'], $darken_factor ) . ';
				color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['text_color'], -10 ) . ';
			}

			#comments .comment-list .comment-content .comment-text {
				background-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['background_color'], -7 ) . ';
			}

			.site-footer {
				background-color: ' . $zsofa_theme_mods['footer_background_color'] . ';
				color: ' . $zsofa_theme_mods['footer_text_color'] . ';
			}

			.site-footer a:not(.button) {
				color: ' . $zsofa_theme_mods['footer_link_color'] . ';
			}

			.site-footer h1, .site-footer h2, .site-footer h3, .site-footer h4, .site-footer h5, .site-footer h6 {
				color: ' . $zsofa_theme_mods['footer_heading_color'] . ';
			}

			.page-template-template-homepage.has-post-thumbnail .type-page.has-post-thumbnail .entry-title {
				color: ' . $zsofa_theme_mods['hero_heading_color'] . ';
			}

			.page-template-template-homepage.has-post-thumbnail .type-page.has-post-thumbnail .entry-content {
				color: ' . $zsofa_theme_mods['hero_text_color'] . ';
			}

			#order_review {
				background-color: ' . $zsofa_theme_mods['background_color'] . ';
			}

			#payment .payment_methods > li .payment_box,
			#payment .place-order {
				background-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['background_color'], -5 ) . ';
			}

			#payment .payment_methods > li:not(.woocommerce-notice) {
				background-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['background_color'], -10 ) . ';
			}

			#payment .payment_methods > li:not(.woocommerce-notice):hover {
				background-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['background_color'], -15 ) . ';
			}

			@media screen and ( min-width: 768px ) {
				.secondary-navigation ul.menu a:hover {
					color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['header_text_color'], $brighten_factor ) . ';
				}

				.secondary-navigation ul.menu a {
					color: ' . $zsofa_theme_mods['header_text_color'] . ';
				}

				.site-header-cart .widget_shopping_cart,
				.main-navigation ul.menu ul.sub-menu,
				.main-navigation ul.nav-menu ul.children {
					background-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['header_background_color'], -15 ) . ';
				}

				.site-header-cart .widget_shopping_cart .buttons,
				.site-header-cart .widget_shopping_cart .total {
					background-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['header_background_color'], -10 ) . ';
				}

				.site-header {
					border-bottom-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['header_background_color'], -15 ) . ';
				}
			}';

			if ( ! class_exists( 'zsofa_Product_Pagination' ) ) {
				$styles .= '.zsofa-product-pagination a {
					color: ' . $zsofa_theme_mods['text_color'] . ';
					background-color: ' . $zsofa_theme_mods['background_color'] . ';
				}';
			}

			if ( ! class_exists( 'zsofa_Sticky_Add_to_Cart' ) ) {
				$styles .= '
				.zsofa-sticky-add-to-cart {
					color: ' . $zsofa_theme_mods['text_color'] . ';
					background-color: ' . $zsofa_theme_mods['background_color'] . ';
				}

				.zsofa-sticky-add-to-cart a:not(.button) {
					color: ' . $zsofa_theme_mods['header_link_color'] . ';
				}';
			}

			return apply_filters( 'zsofa_customizer_css', $styles );
		}

		/**
		 * Get Customizer css associated with WooCommerce.
		 *
		 * @see get_zsofa_theme_mods()
		 * @return array $woocommerce_styles the WooCommerce css
		 */
		public function get_woocommerce_css() {
			$zsofa_theme_mods = $this->get_zsofa_theme_mods();
			$brighten_factor       = apply_filters( 'zsofa_brighten_factor', 25 );
			$darken_factor         = apply_filters( 'zsofa_darken_factor', -25 );

			$woocommerce_styles    = '
			a.cart-contents,
			.site-header-cart .widget_shopping_cart a {
				color: ' . $zsofa_theme_mods['header_link_color'] . ';
			}

			table.cart td.product-remove,
			table.cart td.actions {
				border-top-color: ' . $zsofa_theme_mods['background_color'] . ';
			}

			.woocommerce-tabs ul.tabs li.active a,
			ul.products li.product .price,
			.onsale,
			.widget_search form:before,
			.widget_product_search form:before {
				color: ' . $zsofa_theme_mods['text_color'] . ';
			}

			.woocommerce-breadcrumb a,
			a.woocommerce-review-link,
			.product_meta a {
				color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['text_color'], 5 ) . ';
			}

			.onsale {
				border-color: ' . $zsofa_theme_mods['text_color'] . ';
			}

			.star-rating span:before,
			.quantity .plus, .quantity .minus,
			p.stars a:hover:after,
			p.stars a:after,
			.star-rating span:before,
			#payment .payment_methods li input[type=radio]:first-child:checked+label:before {
				color: ' . $zsofa_theme_mods['accent_color'] . ';
			}

			.widget_price_filter .ui-slider .ui-slider-range,
			.widget_price_filter .ui-slider .ui-slider-handle {
				background-color: ' . $zsofa_theme_mods['accent_color'] . ';
			}

			.order_details {
				background-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['background_color'], -7 ) . ';
			}

			.order_details > li {
				border-bottom: 1px dotted ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['background_color'], -28 ) . ';
			}

			.order_details:before,
			.order_details:after {
				background: -webkit-linear-gradient(transparent 0,transparent 0),-webkit-linear-gradient(135deg,' . zsofa_adjust_color_brightness( $zsofa_theme_mods['background_color'], -7 ) . ' 33.33%,transparent 33.33%),-webkit-linear-gradient(45deg,' . zsofa_adjust_color_brightness( $zsofa_theme_mods['background_color'], -7 ) . ' 33.33%,transparent 33.33%)
			}

			p.stars a:before,
			p.stars a:hover~a:before,
			p.stars.selected a.active~a:before {
				color: ' . $zsofa_theme_mods['text_color'] . ';
			}

			p.stars.selected a.active:before,
			p.stars:hover a:before,
			p.stars.selected a:not(.active):before,
			p.stars.selected a.active:before {
				color: ' . $zsofa_theme_mods['accent_color'] . ';
			}

			.single-product div.product .woocommerce-product-gallery .woocommerce-product-gallery__trigger {
				background-color: ' . $zsofa_theme_mods['button_background_color'] . ';
				color: ' . $zsofa_theme_mods['button_text_color'] . ';
			}

			.single-product div.product .woocommerce-product-gallery .woocommerce-product-gallery__trigger:hover {
				background-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['button_background_color'], $darken_factor ) . ';
				border-color: ' . zsofa_adjust_color_brightness( $zsofa_theme_mods['button_background_color'], $darken_factor ) . ';
				color: ' . $zsofa_theme_mods['button_text_color'] . ';
			}

			.button.loading {
				color: ' . $zsofa_theme_mods['button_background_color'] . ';
			}

			.button.loading:hover {
				background-color: ' . $zsofa_theme_mods['button_background_color'] . ';
			}

			.button.loading:after {
				color: ' . $zsofa_theme_mods['button_text_color'] . ';
			}

			@media screen and ( min-width: 768px ) {
				.site-header-cart .widget_shopping_cart,
				.site-header .product_list_widget li .quantity {
					color: ' . $zsofa_theme_mods['header_text_color'] . ';
				}
			}';

			return apply_filters( 'zsofa_customizer_woocommerce_css', $woocommerce_styles );
		}

		/**
		 * Assign zsofa styles to individual theme mods.
		 *
		 * @deprecated 2.3.1
		 * @return void
		 */
		public function set_zsofa_style_theme_mods() {
			if ( function_exists( 'wc_deprecated_function' ) ) {
				wc_deprecated_function( __FUNCTION__, '2.3.1' );
			} else {
				_deprecated_function( __FUNCTION__, '2.3.1' );
			}
		}

		/**
		 * Add CSS in <head> for styles handled by the theme customizer
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function add_customizer_css() {
			wp_add_inline_style( 'zsofa-style', $this->get_css() );
			wp_add_inline_style( 'zsofa-woocommerce-style', $this->get_woocommerce_css() );
		}

		/**
		 * Layout classes
		 * Adds 'right-sidebar' and 'left-sidebar' classes to the body tag
		 *
		 * @param  array $classes current body classes.
		 * @return string[]          modified body classes
		 * @since  1.0.0
		 */
		public function layout_class( $classes ) {
			$left_or_right = get_theme_mod( 'zsofa_layout' );

			$classes[] = $left_or_right . '-sidebar';

			return $classes;
		}

		/**
		 * Add CSS for custom controls
		 *
		 * This function incorporates CSS from the Kirki Customizer Framework
		 *
		 * The Kirki Customizer Framework, Copyright Aristeides Stathopoulos (@aristath),
		 * is licensed under the terms of the GNU GPL, Version 2 (or later)
		 *
		 * @link https://github.com/reduxframework/kirki/
		 * @since  1.5.0
		 */
		public function customizer_custom_control_css() {
			?>
			<style>
			.customize-control-radio-image input[type=radio] {
				display: none;
			}

			.customize-control-radio-image label {
				display: block;
				width: 48%;
				float: left;
				margin-right: 4%;
			}

			.customize-control-radio-image label:nth-of-type(2n) {
				margin-right: 0;
			}

			.customize-control-radio-image img {
				opacity: .5;
			}

			.customize-control-radio-image input[type=radio]:checked + label img,
			.customize-control-radio-image img:hover {
				opacity: 1;
			}

			</style>
			<?php
		}

		/**
		 * Get site logo.
		 *
		 * @since 2.1.5
		 * @return string
		 */
		public function get_site_logo() {
			return zsofa_site_title_or_logo( false );
		}

		/**
		 * Get site name.
		 *
		 * @since 2.1.5
		 * @return string
		 */
		public function get_site_name() {
			return get_bloginfo( 'name', 'display' );
		}

		/**
		 * Get site description.
		 *
		 * @since 2.1.5
		 * @return string
		 */
		public function get_site_description() {
			return get_bloginfo( 'description', 'display' );
		}

		/**
		 * Check if current page is using the Homepage template.
		 *
		 * @since 2.3.0
		 * @return bool
		 */
		public function is_homepage_template() {
			$template = get_post_meta( get_the_ID(), '_wp_page_template', true );

			if ( ! $template || 'template-homepage.php' !== $template || ! has_post_thumbnail( get_the_ID() ) ) {
				return false;
			}

			return true;
		}
	}

endif;

return new zsofa_Customizer();
