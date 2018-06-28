<?php 
/*
  Plugin Name: Framework For Prestabrain Themes
  Plugin URI: http://www.prestabrain.com/
  Description: implement rick functions for themes base on wpo framework and load widgets for theme used, this is required.
  Version: 0.1
  Author: WP_Opal
  Author URI: http://www.prestabrain.com
  License: GPLv2 or later
 */

 /**
  * $Desc
  *
  * @version    $Id$
  * @package    wpbase
  * @author     Prestabrain  Team <prestabrain@gmail.com, support@prestabrain.com>
  * @copyright  Copyright (C) 2015 prestabrain.com. All Rights Reserved.
  * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
  *
  * @website  http://www.prestabrain.com
  * @support  http://www.prestabrain.com/support/forum.html
  */

  define( 'PBR_PLUGIN_FRAMEWORK_URL', plugin_dir_url( __FILE__ ) );
  define( 'PBR_PLUGIN_FRAMEWORK_DIR', plugin_dir_path( __FILE__ ).'/' );
  define( 'PBR_PLUGIN_FRAMEWORK_TEMPLATE_DIR', PBR_PLUGIN_FRAMEWORK_DIR.'metabox_templates/' );


  /**
   * Loading Widgets
   */
  function pbr_fw_widgets_init(){
      if( !defined('PBR_THEME_DIR') ){
        return ;
      }  


      require( PBR_PLUGIN_FRAMEWORK_DIR.'setting.class.php' );
      require( PBR_PLUGIN_FRAMEWORK_DIR.'widget.class.php' );
      
      define( "PBR_PLUGIN_FRAMEWORK", true );
      define( 'PBR_PLUGIN_FRAMEWORK_WIDGET_TEMPLATES', PBR_THEME_TEMPLATE_DIR  );

      $widgets = apply_filters( 'pbr_fw_load_widgets', array( 'twitter','posts','featured_post','top_rate','sliders','recent_comment','recent_post','tabs','flickr', 'video', 'socials', 'menu_vertical', 'socials_siderbar') );


      if( !empty($widgets) ){
          foreach( $widgets as $opt => $key ){

              $file = str_replace( 'enable_', '', $key );
              $filepath = PBR_PLUGIN_FRAMEWORK_DIR.'widgets/'.$file.'.php'; 
              if( file_exists($filepath) ){ 
                  require_once( $filepath );
              }
          }  
      }
  }
  add_action( 'widgets_init', 'pbr_fw_widgets_init' );

    
  /**
   * Loading Post Types
   */
  function pbr_fw_load_posttypes_setup(){
      
      if( !defined('PBR_THEME_DIR') ){
        return ;
      }  

      $opts = apply_filters( 'pbr_fw_load_posttypes', get_option( 'pbr_themer_posttype' ) );
      if( !empty($opts) ){
          foreach( $opts as $opt => $key ){

              $file = str_replace( 'enable_', '', $opt );
              $filepath = PBR_PLUGIN_FRAMEWORK_DIR.'posttypes/'.$file.'.php'; 
              if( file_exists($filepath) ){
                  require_once( $filepath );
              }
          }  
      }
  }   
  add_action( 'init', 'pbr_fw_load_posttypes_setup', 1 );   
  
  ?>