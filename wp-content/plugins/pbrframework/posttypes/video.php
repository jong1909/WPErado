<?php
 /**
  * $Desc
  *
  * @version    $Id$
  * @package    wpbase
  * @author     Opal  Team <prestabrain@gmail.com >
  * @copyright  Copyright (C) 2015  prestabrain.com. All Rights Reserved.
  * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
  *
  * @website  http://www.prestabrain.com
  * @support  http://www.prestabrain.com/support/forum.html
  */

if(!function_exists('pbr_create_type_video')   ){
  function pbr_create_type_video(){
    $labels = array(
      'name' => __( 'Video', "pbrframework" ),
      'singular_name' => __( 'Video', "pbrframework" ),
      'add_new' => __( 'Add New Video', "pbrframework" ),
      'add_new_item' => __( 'Add New Video', "pbrframework" ),
      'edit_item' => __( 'Edit Video', "pbrframework" ),
      'new_item' => __( 'New Video', "pbrframework" ),
      'view_item' => __( 'View Video', "pbrframework" ),
      'search_items' => __( 'Search Videos', "pbrframework" ),
      'not_found' => __( 'No Videos found', "pbrframework" ),
      'not_found_in_trash' => __( 'No Videos found in Trash', "pbrframework" ),
      'parent_item_colon' => __( 'Parent Video:', "pbrframework" ),
      'menu_name' => __( 'Opal Videos', "pbrframework" ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Video',
        'supports' => array( 'title', 'editor', 'thumbnail','comments', 'excerpt' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'video', $args );

    $labels = array(
        'name'              => __( 'Categories Video', "pbrframework" ),
        'singular_name'     => __( 'Category', "pbrframework" ),
        'search_items'      => __( 'Search Category',"pbrframework" ),
        'all_items'         => __( 'All Categories',"pbrframework" ),
        'parent_item'       => __( 'Parent Category',"pbrframework" ),
        'parent_item_colon' => __( 'Parent Category:',"pbrframework" ),
        'edit_item'         => __( 'Edit Category',"pbrframework" ),
        'update_item'       => __( 'Update Category',"pbrframework" ),
        'add_new_item'      => __( 'Add New Category',"pbrframework" ),
        'new_item_name'     => __( 'New Category Name',"pbrframework" ),
        'menu_name'         => __( 'Categories Video',"pbrframework" ),
      );
      // Now register the taxonomy
      register_taxonomy('category_video',array('video'),
          array(
              'hierarchical'      => true,
              'labels'            => $labels,
              'show_ui'           => true,
              'show_admin_column' => true,
              'query_var'         => true,
              'rewrite'           => array( 'slug' => 'video'
          ),
      ));

      if( class_exists('PBR_MetaBox') && !file_exists(PBR_THEME_INC_DIR   . 'metabox_templates/video.php') ){
          new PBR_MetaBox(array(
            'id'       => 'pbr_formatvideo',
            'title'    => __('Embed Options', 'pbrframework' ),
            'types'    => array('video'),
            'priority' => 'high',
            'template' => PBR_PLUGIN_FRAMEWORK_TEMPLATE_DIR . 'video.php',
          ));

      }  
  }
  add_action( 'init', 'pbr_create_type_video' );
}


