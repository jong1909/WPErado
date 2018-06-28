<?php
 /**
  * $Desc
  *
  * @version    $Id$
  * @package    wpbase
  * @author     Opal  Teacher <prestabrain@gmail.com >
  * @copyright  Copyright (C) 2015 prestabrain.com. All Rights Reserved.
  * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
  *
  * @website  http://www.prestabrain.com
  * @support  http://www.prestabrain.com/support/forum.html
  */

if(!function_exists('pbr_create_type_teacher')  && defined('IBEDUCATOR_PLUGIN_DIR')  ){
    
 
  if( is_admin() ){

      function pbr_get_teachers(){
          
          $teachers = get_users( 'orderby=nicename&role=pbr_teacher' );

          $output = array( 0=>__( 'Select A Teacher', 'pbrframework') );
          foreach( $teachers as $teacher ){
            $output[$teacher->ID] = $teacher->display_name; 
          }
          return $output;
      }

      function pbr_course_meta_box_add(){
        add_meta_box(
          'ib_educator_course_teacher_meta',
          __( 'Teacher Settings', 'ibeducator' ),
           'pbr_course_meta_box' ,
          'ib_educator_course'
        );
      } 

      add_action( 'add_meta_boxes', 'pbr_course_meta_box_add' );

      function pbr_course_meta_box(){
          global $post;
           // Setup form object.
          require_once IBEDUCATOR_PLUGIN_DIR . 'includes/ib-educator-form.php';
          $form = new IB_Educator_Form();
          $form->default_decorators();


        

          // echo '<Pre>'.print_r( $output ,1 );die; 
          // Registration.
          $form->set_value( '_ib_educator_teacher', get_post_meta( $post->ID, '_ib_educator_teacher', true ) );
          $form->add( array(
            'type'    => 'select',
            'name'    => '_ib_educator_teacher',
            'label'   => __( 'Teacher', 'pbrframework' ),
            'options' => pbr_get_teachers(),
            'default' => 'open',
          ) );
          $form->display();
      }
      
      function pbr_course_meta_box_save( $post_id, $post, $update ) {        
            if ( ! isset( $_POST['ib_educator_course_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['ib_educator_course_meta_box_nonce'], 'ib_educator_course_meta_box' ) ) {
              return;
            }

            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
              return;
            }

            if ( 'ib_educator_course' != $post->post_type || ! current_user_can( 'edit_ib_educator_course', $post_id ) ) {
              return;
            }
            $_ib_educator_teacher = 0;
            
         

                   // Categories.
            if ( isset( $_POST['_ib_educator_teacher'] ) &&  $_POST['_ib_educator_teacher']  ) {
              $_ib_educator_teacher  =   $_POST['_ib_educator_teacher']; 
            }

            update_post_meta( $post_id, '_ib_educator_teacher', $_ib_educator_teacher );

      }
      
      add_action( 'save_post', 'pbr_course_meta_box_save' , 10, 3  );

       _x('Teacher', 'User role');      

        add_role(
          'pbr_teacher',
          'Teacher',
          array()
        );
    }
    


    function pbr_create_type_teacher(){
      $labels = array(
        'name' => __( 'Teacher', "pbrframework" ),
        'singular_name' => __( 'Teacher', "pbrframework" ),
        'add_new' => __( 'Add New Teacher', "pbrframework" ),
        'add_new_item' => __( 'Add New Teacher', "pbrframework" ),
        'edit_item' => __( 'Edit Teacher', "pbrframework" ),
        'new_item' => __( 'New Teacher', "pbrframework" ),
        'view_item' => __( 'View Teacher', "pbrframework" ),
        'search_items' => __( 'Search Teachers', "pbrframework" ),
        'not_found' => __( 'No Teachers found', "pbrframework" ),
        'not_found_in_trash' => __( 'No Teachers found in Trash', "pbrframework" ),
        'parent_item_colon' => __( 'Parent Teacher:', "pbrframework" ),
        'menu_name' => __( 'Teachers', "pbrframework" ),
      );

      $args = array(
          'labels' => $labels,
          'hierarchical' => false,
          'description' => 'List Teacher',
          'supports' => array( 'title', 'editor', 'thumbnail','excerpt','comment'),
          'public' => true,
          'show_ui' => true,
          'show_in_menu' => true,
          'menu_position' => 5,
          'taxonomies' => array(   'category_teachers'),
          'show_in_nav_menus' => false,
          'publicly_queryable' => true,
          'exclude_from_search' => false,
          'has_archive'         => true,
          'query_var'           => true,
          'can_export'          => true,
          'rewrite'             => array('slug'=>'teacher'),
          'capability_type' => 'post'
      );
      register_post_type( 'teacher', $args );
    
       $labels = array(
        'name'              => __( 'Teacher Categories', "pbrframework" ),
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
      register_taxonomy('category_teachers',array('teacher'),
          array(
              'hierarchical'      => true,
              'labels'            => $labels,
              'show_ui'           => true,
              'show_admin_column' => true,
              'query_var'         => true,
              'show_in_nav_menus' =>true,
              'rewrite'           => array( 'slug' => 'teacher-category'
          ),
      ));


        if( class_exists('PBR_MetaBox') && !file_exists(PBR_THEME_INC_DIR   . 'metabox_templates/teacher.php')  ){
    
          $template =  PBR_PLUGIN_FRAMEWORK_TEMPLATE_DIR . 'teacher.php'; 
 

          new PBR_MetaBox(array(
            'id'       => 'pbr_teacher',
            'title'    => __('Teacher Options', "pbrframework"),
            'types'    => array('teacher'),
            'priority' => 'high',
            'template' => $template,
          ));
        }  
    }

   add_action( 'init','pbr_create_type_teacher' );


    // Save the Metabox Data

    function wpt_save_teacher_meta($post_id, $post) { 
      
    

      if( !isset($_POST['pbr_teacher_nonce']) ){
        return $post->ID;
      }
 
 
      // verify this came from the our screen and with proper authorization,
      // because save_post can be triggered at other times
      if ( !wp_verify_nonce( $_POST['pbr_teacher_nonce'],  'pbr_teacher' )) {
        return $post->ID;
      }

      // Is the user allowed to edit the post or page?
      if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;

 
      $teacher_meta = array();

      $teacher_meta['_relateduser'] = $_POST['pbr_teacher']['relateduser'];
      $teacher_meta['_skills']      = $_POST['skills'];
      $teacher_meta['_education']   = $_POST['education'];
      
 
  //   echo '<pre>'.print_r( $teacher_meta ,1 );die;
      // Add values of $teacher_meta as custom fields
      
      foreach ($teacher_meta as $key => $value) { // Cycle through the $teacher_meta array!
       
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
          update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
          add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
      }

    }

    add_action('save_post', 'wpt_save_teacher_meta', 1, 2); // save the custom fields



}