<?php
 /**
  * $Desc
  *
  * @version    $Id$
  * @package    wpbase
  * @author     Opal  Team <prestabrain@gmail.com >
  * @copyright  Copyright (C) 2015 prestabrain.com. All Rights Reserved.
  * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
  *
  * @website  http://www.prestabrain.com
  * @support  http://www.prestabrain.com/support/forum.html
  */

if(!function_exists('pbr_create_type_testimonial')   ){
    function pbr_create_type_testimonial(){
      $labels = array(
        'name' => __( 'Testimonial', "pbrframework" ),
        'singular_name' => __( 'Testimonial', "pbrframework" ),
        'add_new' => __( 'Add New Testimonial', "pbrframework" ),
        'add_new_item' => __( 'Add New Testimonial', "pbrframework" ),
        'edit_item' => __( 'Edit Testimonial', "pbrframework" ),
        'new_item' => __( 'New Testimonial', "pbrframework" ),
        'view_item' => __( 'View Testimonial', "pbrframework" ),
        'search_items' => __( 'Search Testimonials', "pbrframework" ),
        'not_found' => __( 'No Testimonials found', "pbrframework" ),
        'not_found_in_trash' => __( 'No Testimonials found in Trash', "pbrframework" ),
        'parent_item_colon' => __( 'Parent Testimonial:', "pbrframework" ),
        'menu_name' => __( 'Opal Testimonials', "pbrframework" ),
      );

      $args = array(
          'labels' => $labels,
          'hierarchical' => true,
          'description' => 'List Testimonial',
          'supports' => array( 'title', 'editor', 'thumbnail','excerpt'),
          'public' => true,
          'show_ui' => true,
          'show_in_menu' => true,
          'menu_position' => 5,
          'show_in_nav_menus' => false,
          'publicly_queryable' => true,
          'exclude_from_search' => false,
          'has_archive' => true,
          'query_var' => true,
          'can_export' => true,
          'rewrite' => true,
          'capability_type' => 'post'
      );
      register_post_type( 'testimonial', $args );
    }

    add_action( 'init','pbr_create_type_testimonial' );
}


