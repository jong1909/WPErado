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

if(!function_exists('pbr_create_type_brand')  ){
  function pbr_create_type_brand(){
    $labels = array(
      'name' => __( 'Brand', "pbrframework" ),
      'singular_name' => __( 'Brand', "pbrframework" ),
      'add_new' => __( 'Add New Brand', "pbrframework" ),
      'add_new_item' => __( 'Add New Brand', "pbrframework" ),
      'edit_item' => __( 'Edit Brand', "pbrframework" ),
      'new_item' => __( 'New Brand', "pbrframework" ),
      'view_item' => __( 'View Brand', "pbrframework" ),
      'search_items' => __( 'Search Brands', "pbrframework" ),
      'not_found' => __( 'No Brands found', "pbrframework" ),
      'not_found_in_trash' => __( 'No Brands found in Trash', "pbrframework" ),
      'parent_item_colon' => __( 'Parent Brand:', "pbrframework" ),
      'menu_name' => __( 'Opal Brands', "pbrframework" ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Brand',
        'supports' => array( 'title', 'thumbnail'),
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
    register_post_type( 'brands', $args );
    
      if( class_exists('PBR_MetaBox') && !file_exists(PBR_THEME_INC_DIR   . 'metabox_templates/brands.php')  ){
       //Post setting
        new PBR_MetaBox(array(
          'id'       => 'pbr_brandconfig',
          'title'    => __('Brands Configuration', "pbrframework"),
          'types'    => array('brands'),
          'priority' => 'high',
          'template' => PBR_PLUGIN_FRAMEWORK_TEMPLATE_DIR . 'brands.php'
        ));
      }

  }

  add_action('init','pbr_create_type_brand');
}