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
if(!function_exists('pbr_create_type_portfolio')  ){
    function pbr_create_type_portfolio(){
      $labels = array(
          'name'               => __( 'Portfolios', "pbrframework" ),
          'singular_name'      => __( 'Portfolio', "pbrframework" ),
          'add_new'            => __( 'Add New Portfolio', "pbrframework" ),
          'add_new_item'       => __( 'Add New Portfolio', "pbrframework" ),
          'edit_item'          => __( 'Edit Portfolio', "pbrframework" ),
          'new_item'           => __( 'New Portfolio', "pbrframework" ),
          'view_item'          => __( 'View Portfolio', "pbrframework" ),
          'search_items'       => __( 'Search Portfolios', "pbrframework" ),
          'not_found'          => __( 'No Portfolios found', "pbrframework" ),
          'not_found_in_trash' => __( 'No Portfolios found in Trash', "pbrframework" ),
          'parent_item_colon'  => __( 'Parent Portfolio:', "pbrframework" ),
          'menu_name'          => __( 'Opal Portfolios', "pbrframework" ),
      );

      $args = array(
          'labels'              => $labels,
          'hierarchical'        => true,
          'description'         => 'List Portfolio',
          'supports'            => array( 'title', 'editor', 'author', 'thumbnail','excerpt','custom-fields' ), //page-attributes, post-formats
          'taxonomies'          => array( 'portfolio_category','gallery_category','post_tag' ),
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'menu_position'       => 5,
          'menu_icon'           => PBR_FRAMEWORK_ADMIN_IMAGE_URI.'icon/admin_ico_portfolio.png',
          'show_in_nav_menus'   => false,
          'publicly_queryable'  => true,
          'exclude_from_search' => false,
          'has_archive'         => true,
          'query_var'           => true,
          'can_export'          => true,
          'rewrite'             => true,
          'capability_type'     => 'post'
      );
      register_post_type( 'portfolio', $args );

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
      register_taxonomy('category_portfolio',array('portfolio'),
          array(
              'hierarchical'      => true,
              'labels'            => $labels,
              'show_ui'           => true,
              'show_admin_column' => true,
              'query_var'         => true,
              'show_in_nav_menus' =>false,
              'rewrite'           => array( 'slug' => 'category-portfolio'
          ),
      ));



      if( class_exists('PBR_MetaBox') && !file_exists(PBR_THEME_INC_DIR   . 'metabox_templates/portfolio.php')  ){
        new PBR_MetaBox(array(
          'id'       => 'pbr_portfolio',
          'title'    => __('Portfolio Options', "pbrframework"),
          'types'    => array('portfolio'),
          'priority' => 'high',
          'template' => PBR_PLUGIN_FRAMEWORK_TEMPLATE_DIR . 'portfolio.php',
        ));
      }   
  }
  add_action( 'init','pbr_create_type_portfolio' );
}