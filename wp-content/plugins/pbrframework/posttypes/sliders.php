<?php

if(!function_exists('pbr_create_type_sliders')   ){
    function pbr_create_type_sliders(){
        $labels = array(
            'name' => __( 'Sliders', "pbrframework" ),
            'singular_name' => __( 'Slider', "pbrframework"),
            'add_new' => __( 'Add New Slider', "pbrframework" ),
            'add_new_item' => __( 'Add New Slider', "pbrframework" ),
            'edit_item' => __( 'Edit Slider', "pbrframework" ),
            'new_item' => __( 'New Slider', "pbrframework" ),
            'view_item' => __( 'View Slider', "pbrframework" ),
            'search_items' => __( 'Search Slider', "pbrframework" ),
            'not_found' => __( 'No Slider found', "pbrframework" ),
            'not_found_in_trash' => __( 'No Slider found in Trash', "pbrframework" ),
            'parent_item_colon' => __( 'Parent Slider:', "pbrframework" ),
            'menu_name' => __( 'Opal Sliders', "pbrframework" )
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'description' => 'List Slider',
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies' => array('slider_group' ),
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
        register_post_type( 'sliders', $args );


        $labels = array(
            'name' => __( 'Slider groups', "pbrframework" ),
            'singular_name' => __( 'Slider group', "pbrframework" ),
            'search_items' =>  __( 'Search Slider groups',"pbrframework" ),
            'all_items' => __( 'All Slider groups',"pbrframework" ),
            'parent_item' => __( 'Parent Slider group',"pbrframework" ),
            'parent_item_colon' => __( 'Parent Slider group:',"pbrframework" ),
            'edit_item' => __( 'Edit Slider group',"pbrframework" ),
            'update_item' => __( 'Update Slider group',"pbrframework" ),
            'add_new_item' => __( 'Add New Slider group',"pbrframework" ),
            'new_item_name' => __( 'New Slider group',"pbrframework" ),
            'menu_name' => __( 'Slider groups',"pbrframework" ),
        );

        register_taxonomy('slider_group',array('sliders'), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'slider_group' ),
            'show_in_nav_menus'=>false
        ));
    }
    add_action( 'init','pbr_create_type_sliders' );
}