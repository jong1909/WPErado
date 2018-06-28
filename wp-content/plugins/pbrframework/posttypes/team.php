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

if(!function_exists('pbr_create_type_team')   ){
    function pbr_create_type_team(){
      $labels = array(
        'name' => __( 'Opal Team', "pbrframework" ),
        'singular_name' => __( 'Team', "pbrframework" ),
        'add_new' => __( 'Add New Team', "pbrframework" ),
        'add_new_item' => __( 'Add New Team', "pbrframework" ),
        'edit_item' => __( 'Edit Team', "pbrframework" ),
        'new_item' => __( 'New Team', "pbrframework" ),
        'view_item' => __( 'View Team', "pbrframework" ),
        'search_items' => __( 'Search Teams', "pbrframework" ),
        'not_found' => __( 'No Teams found', "pbrframework" ),
        'not_found_in_trash' => __( 'No Teams found in Trash', "pbrframework" ),
        'parent_item_colon' => __( 'Parent Team:', "pbrframework" ),
        'menu_name' => __( 'Opal Teams', "pbrframework" ),
      );

      $args = array(
          'labels' => $labels,
          'hierarchical' => false,
          'description' => 'List Team',
          'supports' => array( 'title', 'editor', 'thumbnail','excerpt'),
          'public' => true,
          'show_ui' => true,
          'show_in_menu' => true,
          'menu_position' => 5,
          'show_in_nav_menus' => false,
          'publicly_queryable' => true,
          'exclude_from_search' => true,
          'has_archive' => true,
          'query_var' => true,
          'can_export' => true,
          'rewrite' => false,
          'capability_type' => 'post'
      );
      register_post_type( 'team', $args );

        if( class_exists('PBR_MetaBox') && !file_exists(PBR_THEME_INC_DIR   . 'metabox_templates/team.php')  ){
          new PBR_MetaBox(array(
            'id'       => 'pbr_team',
            'title'    => __('Team Options', "pbrframework"),
            'types'    => array('team'),
            'priority' => 'high',
            'template' => PBR_PLUGIN_FRAMEWORK_TEMPLATE_DIR . 'team.php',
          ));
        }  
    }

   add_action( 'init','pbr_create_type_team' );
}


