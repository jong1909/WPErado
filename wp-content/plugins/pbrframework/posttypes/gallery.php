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
if(!function_exists('pbr_create_type_gallery')   ){
    function pbr_create_type_gallery(){
      $labels = array(
          'name'               => __( 'Gallerys', "pbrframework" ),
          'singular_name'      => __( 'Gallery', "pbrframework" ),
          'add_new'            => __( 'Add New Gallery', "pbrframework" ),
          'add_new_item'       => __( 'Add New Gallery', "pbrframework" ),
          'edit_item'          => __( 'Edit Gallery', "pbrframework" ),
          'new_item'           => __( 'New Gallery', "pbrframework" ),
          'view_item'          => __( 'View Gallery', "pbrframework" ),
          'search_items'       => __( 'Search Gallerys', "pbrframework" ),
          'not_found'          => __( 'No Gallerys found', "pbrframework" ),
          'not_found_in_trash' => __( 'No Gallerys found in Trash', "pbrframework" ),
          'parent_item_colon'  => __( 'Parent Gallery:', "pbrframework" ),
          'menu_name'          => __( 'Opal Gallerys', "pbrframework" ),
      );

      $args = array(
          'labels'              => $labels,
          'hierarchical'        => false,
          'description'         => 'List Gallery',
          'supports'            => array( 'title', 'editor', 'author', 'thumbnail','excerpt','custom-fields' ), //page-attributes, post-formats
          'taxonomies'          => array( 'gallery_category','skills','post_tag' ),
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'menu_position'       => 5,
          'menu_icon'           => PBR_FRAMEWORK_ADMIN_IMAGE_URI.'icon/admin_ico_gallery.png',
          'show_in_nav_menus'   => false,
          'publicly_queryable'  => true,
          'exclude_from_search' => false,
          'has_archive'         => true,
          'query_var'           => true,
          'can_export'          => true,
          'rewrite'             => array('slug'=>'gallery'),
          'capability_type'     => 'post',
      );
      register_post_type( 'gallery', $args );

      //Add Port folio Skill
      // Add new taxonomy, make it hierarchical like categories
      //first do the translations part for GUI
      $labels = array(
        'name'              => __( 'Categories', "pbrframework" ),
        'singular_name'     => __( 'Category', "pbrframework" ),
        'search_items'      => __( 'Search Category',"pbrframework" ),
        'all_items'         => __( 'All Categories',"pbrframework" ),
        'parent_item'       => __( 'Parent Category',"pbrframework" ),
        'parent_item_colon' => __( 'Parent Category:',"pbrframework" ),
        'edit_item'         => __( 'Edit Category',"pbrframework" ),
        'update_item'       => __( 'Update Category',"pbrframework" ),
        'add_new_item'      => __( 'Add New Category',"pbrframework" ),
        'new_item_name'     => __( 'New Category Name',"pbrframework" ),
        'menu_name'         => __( 'Categories',"pbrframework" ),
      );
      // Now register the taxonomy
      register_taxonomy('gallery_category',array('gallery'),
          array(
              'hierarchical'      => true,
              'labels'            => $labels,
              'show_ui'           => true,
              'show_admin_column' => true,
              'query_var'         => true,
              'show_in_nav_menus' => false,
              'rewrite'           => array( 'slug' => 'gallery-category'
          ),
      ));



      if( class_exists('PBR_MetaBox') && !file_exists(PBR_THEME_INC_DIR   . 'metabox_templates/gallery.php')  ){   //Gallery Setting.
        $aa = new PBR_MetaBox(array(
          'id'       => 'pbr_pageconfig',
          'title'    => __('Gallery Configuration', 'pbrframework'),
          'types'    => array('gallery'),
          'priority' => 'high',
          'template' => PBR_PLUGIN_FRAMEWORK_TEMPLATE_DIR . 'gallery.php',
        ));

      } 

  }
  add_action( 'init','pbr_create_type_gallery' );
}