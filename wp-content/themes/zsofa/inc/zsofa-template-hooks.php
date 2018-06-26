<?php
/**
 * zsofa hooks
 *
 * @package zsofa
 */

/**
 * General
 *
 * @see  zsofa_header_widget_region()
 * @see  zsofa_get_sidebar()
 */
add_action( 'zsofa_before_content', 'zsofa_header_widget_region', 10 );
add_action( 'zsofa_sidebar',        'zsofa_get_sidebar',          10 );

/**
 * Header
 *
 * @see  zsofa_skip_links()
 * @see  zsofa_secondary_navigation()
 * @see  zsofa_site_branding()
 * @see  zsofa_primary_navigation()
 */
add_action( 'zsofa_header', 'zsofa_header_container',                 0 );
add_action( 'zsofa_header', 'zsofa_skip_links',                       5 );
add_action( 'zsofa_header', 'zsofa_site_branding',                    20 );
add_action( 'zsofa_header', 'zsofa_secondary_navigation',             30 );
add_action( 'zsofa_header', 'zsofa_header_container_close',           41 );
add_action( 'zsofa_header', 'zsofa_primary_navigation_wrapper',       42 );
add_action( 'zsofa_header', 'zsofa_primary_navigation',               50 );
add_action( 'zsofa_header', 'zsofa_primary_navigation_wrapper_close', 68 );

/**
 * Footer
 *
 * @see  zsofa_footer_widgets()
 * @see  zsofa_credit()
 */
add_action( 'zsofa_footer', 'zsofa_footer_widgets', 10 );
add_action( 'zsofa_footer', 'zsofa_credit',         20 );

/**
 * Homepage
 *
 * @see  zsofa_homepage_content()
 * @see  zsofa_product_categories()
 * @see  zsofa_recent_products()
 * @see  zsofa_featured_products()
 * @see  zsofa_popular_products()
 * @see  zsofa_on_sale_products()
 * @see  zsofa_best_selling_products()
 */
add_action( 'homepage', 'zsofa_homepage_content',      10 );
add_action( 'homepage', 'zsofa_product_categories',    20 );
add_action( 'homepage', 'zsofa_recent_products',       30 );
add_action( 'homepage', 'zsofa_featured_products',     40 );
add_action( 'homepage', 'zsofa_popular_products',      50 );
add_action( 'homepage', 'zsofa_on_sale_products',      60 );
add_action( 'homepage', 'zsofa_best_selling_products', 70 );

/**
 * Posts
 *
 * @see  zsofa_post_header()
 * @see  zsofa_post_meta()
 * @see  zsofa_post_content()
 * @see  zsofa_paging_nav()
 * @see  zsofa_single_post_header()
 * @see  zsofa_post_nav()
 * @see  zsofa_display_comments()
 */
add_action( 'zsofa_loop_post',           'zsofa_post_header',          10 );
add_action( 'zsofa_loop_post',           'zsofa_post_meta',            20 );
add_action( 'zsofa_loop_post',           'zsofa_post_content',         30 );
add_action( 'zsofa_loop_after',          'zsofa_paging_nav',           10 );
add_action( 'zsofa_single_post',         'zsofa_post_header',          10 );
add_action( 'zsofa_single_post',         'zsofa_post_meta',            20 );
add_action( 'zsofa_single_post',         'zsofa_post_content',         30 );
add_action( 'zsofa_single_post_bottom',  'zsofa_post_nav',             10 );
add_action( 'zsofa_single_post_bottom',  'zsofa_display_comments',     20 );
add_action( 'zsofa_post_content_before', 'zsofa_post_thumbnail',       10 );

/**
 * Pages
 *
 * @see  zsofa_page_header()
 * @see  zsofa_page_content()
 * @see  zsofa_display_comments()
 */
add_action( 'zsofa_page',       'zsofa_page_header',          10 );
add_action( 'zsofa_page',       'zsofa_page_content',         20 );
add_action( 'zsofa_page_after', 'zsofa_display_comments',     10 );

add_action( 'zsofa_homepage',       'zsofa_homepage_header',      10 );
add_action( 'zsofa_homepage',       'zsofa_page_content',         20 );
