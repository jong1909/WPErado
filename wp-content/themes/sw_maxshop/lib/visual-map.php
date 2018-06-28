<?php 
add_action( 'vc_before_init', 'my_shortcodeVC' );
function my_shortcodeVC(){
$target_arr = array(
	__( 'Same window', 'yatheme' ) => '_self',
	__( 'New window', 'yatheme' ) => "_blank"
);
$link_category = array( __( 'All Categories', 'yatheme' ) => '' );
$link_cats     = get_categories();
if ( is_array( $link_cats ) ) {
	foreach ( $link_cats as $link_cat ) {
		$link_category[ $link_cat->name ] = $link_cat->term_id;
	}
}		
$args = array(
			'type' => 'post',
			'child_of' => 0,
			'parent' => 0,
			'orderby' => 'name',
			'order' => 'ASC',
			'hide_empty' => false,
			'hierarchical' => 1,
			'exclude' => '',
			'include' => '',
			'number' => '',
			'taxonomy' => 'product_cat',
			'pad_counts' => false,

		);
		$product_categories_dropdown = array();
		$categories = get_categories( $args );
		foreach($categories as $category){
			$product_categories_dropdown[$category->name] = $category -> term_id;
		}
$menu_locations_array = array( __( 'All Categories', 'yatheme' ) => '' );
$menu_locations = wp_get_nav_menus();	
foreach ($menu_locations as $menu_location){
	$menu_locations_array[$menu_location->name] = $menu_location -> term_id;
}

/* YTC VC */
//YTC post
vc_map( array(
	'name' => 'Ya_' . __( 'POSTS', 'yatheme' ),
	'base' => 'ya_post',
    'icon' => get_template_directory_uri() . "/assets/img/icon_vc.png",
	'category' => __( 'Ya Shortcode', 'yatheme' ),
	'class' => 'wpb_vc_wp_widget',
	'weight' => - 50,
	'description' => __( 'Display posts-seclect category', 'yatheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'yatheme' ),
			'param_name' => 'title',
			'description' => __( 'Select style for widget title. Leave blank to use default widget title.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Style title', 'yatheme' ),
			'param_name' => 'style_title',
			'description' =>__( 'Select style for title. Leave blank to use default style title.', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Layout post style', 'yatheme' ),
			'param_name' => 'type',
			'value' => array(
				'Select type',
				__( 'The blog', 'yatheme' ) => 'the_blog',
				__( '2 column', 'yatheme' ) => '2_column',
				__( 'Slideshow', 'yatheme' ) => 'slide_show',
				__( 'Middle right', 'yatheme' ) => 'middle_right',
				__( 'Our Member', 'yatheme' ) => 'indicators'
			),
			'description' => sprintf( __( 'Select different style posts.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		array(
			'param_name'    => 'category_id',
			'type'          => 'dropdown',
			'value'         => $link_category, // here I'm stuck
			'heading'       => __('Category filter:', 'yatheme'),
			'description'   => '',
			'holder'        => 'div',
			'class'         => ''
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of posts to show', 'yatheme' ),
			'param_name' => 'number',
			'admin_label' => true
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Excerpt length (in words)', 'yatheme' ),
			'param_name' => 'length',
			'description' => __( 'Excerpt length (in words).', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'yatheme' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'yatheme' )
		),
			

		array(
			'type' => 'dropdown',
			'heading' => __( 'Order way', 'yatheme' ),
			'param_name' => 'order',
			'value' => array(
				__( 'Descending', 'yatheme' ) => 'DESC',
				__( 'Ascending', 'yatheme' ) => 'ASC'
			),
			'description' => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
				
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order by', 'yatheme' ),
			'param_name' => 'orderby',
			'value' => array(
				'Select orderby',
				__( 'Date', 'yatheme' ) => 'date',
				__( 'ID', 'yatheme' ) => 'ID',
				__( 'Author', 'yatheme' ) => 'author',
				__( 'Title', 'yatheme' ) => 'title',
				__( 'Modified', 'yatheme' ) => 'modified',
				__( 'Random', 'yatheme' ) => 'rand',
				__( 'Comment count', 'yatheme' ) => 'comment_count',
				__( 'Menu order', 'yatheme' ) => 'menu_order'
			),
			'description' => sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
			
	)
) );

// ytc tesminial

vc_map( array(
	'name' => 'Ya_ ' . __( 'Testimonial Slide', 'yatheme' ),
	'base' => 'testimonial_slide',
	'icon' => get_template_directory_uri() . "/assets/img/icon_vc.png",
	'category' => __( 'Ya Shortcode', 'yatheme' ),
	'class' => 'wpb_vc_wp_widget',
	'weight' => - 50,
	'description' => __( 'The tesminial on your site', 'yatheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'yatheme' ),
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style title', 'yatheme' ),
			'param_name' => 'style_title',
			'value' => array(
				'Select type',
				__( 'Style title 1', 'yatheme' ) => 'title1',
				__( 'Style title 2', 'yatheme' ) => 'title2',
				__( 'Style title 3', 'yatheme' ) => 'title3',
				__( 'Style title 4', 'yatheme' ) => 'title4'
			),
			'description' =>__( 'What text use as a style title. Leave blank to use default style title.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of posts to show', 'yatheme' ),
			'param_name' => 'numberposts',
			'admin_label' => true
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Excerpt length (in words)', 'yatheme' ),
			'param_name' => 'length',
			'description' => __( 'Excerpt length (in words).', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Template', 'yatheme' ),
			'param_name' => 'type',
			'value' => array(
			    __('Indicators Up','yatheme') => 'indicators_up',
				__( 'indicators', 'yatheme' ) => 'indicators',
				__( 'Slide Style 1', 'yatheme' ) => 'slide1',
				__('Slide Style 2','yatheme') => 'slide2'
			),
			'description' => sprintf( __( 'Chose template for testimonial', 'yatheme' ) )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order way', 'yatheme' ),
			'param_name' => 'order',
			'value' => array(
				__( 'Descending', 'yatheme' ) => 'DESC',
				__( 'Ascending', 'yatheme' ) => 'ASC'
			),
			'description' => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
				
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order by', 'yatheme' ),
			'param_name' => 'orderby',
			'value' => array(
				'Select orderby',
				__( 'Date', 'yatheme' ) => 'date',
				__( 'ID', 'yatheme' ) => 'ID',
				__( 'Author', 'yatheme' ) => 'author',
				__( 'Title', 'yatheme' ) => 'title',
				__( 'Modified', 'yatheme' ) => 'modified',
				__( 'Random', 'yatheme' ) => 'rand',
				__( 'Comment count', 'yatheme' ) => 'comment_count',
				__( 'Menu order', 'yatheme' ) => 'menu_order'
			),
			'description' => sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
			
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'yatheme' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'yatheme' )
		)
	)
) );
//ytc our brand
vc_map( array(
	'name' => 'Ya_ ' . __( 'Brand', 'yatheme' ),
	'base' => 'OurBrand',
	'icon' => get_template_directory_uri() . "/assets/img/icon_vc.png",
	'category' => __( 'Ya Shortcode', 'yatheme' ),
	'class' => 'wpb_vc_wp_widget',
	'weight' => - 50,
	'description' => __( 'The best sale  product on your site', 'yatheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'yatheme' ),
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style title', 'yatheme' ),
			'param_name' => 'style_title',
			'value' => array(
				'Select type',
				__( 'Style title 1', 'yatheme' ) => 'title1',
				__( 'Style title 2', 'yatheme' ) => 'title2',
				__( 'Style title 3', 'yatheme' ) => 'title3',
				__( 'Style title 4', 'yatheme' ) => 'title4'
			),
			'description' =>__( 'What text use as a style title. Leave blank to use default style title.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of posts to show', 'yatheme' ),
			'param_name' => 'numberposts',
			'admin_label' => true
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order way', 'yatheme' ),
			'param_name' => 'order',
			'value' => array(
				__( 'Descending', 'yatheme' ) => 'DESC',
				__( 'Ascending', 'yatheme' ) => 'ASC'
			),
			'description' => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
				
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order by', 'yatheme' ),
			'param_name' => 'orderby',
			'value' => array(
				'Select orderby',
				__( 'Date', 'yatheme' ) => 'date',
				__( 'ID', 'yatheme' ) => 'ID',
				__( 'Author', 'yatheme' ) => 'author',
				__( 'Title', 'yatheme' ) => 'title',
				__( 'Modified', 'yatheme' ) => 'modified',
				__( 'Random', 'yatheme' ) => 'rand',
				__( 'Comment count', 'yatheme' ) => 'comment_count',
				__( 'Menu order', 'yatheme' ) => 'menu_order'
			),
			'description' => sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Speed slide', 'yatheme' ),
			'param_name' => 'interval',
			'description' => __( 'Speed for slide', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
		    'heading' => __( 'Effect slide', 'yatheme' ),
			'param_name' => 'effect',
			'value' => array(
				__( 'Slide', 'yatheme' ) => 'slide',
				__( 'Fade', 'yatheme' ) => 'fade',
			),
				'description' => __( 'Effect for slide', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
		    'heading' => __( 'Hover slide', 'yatheme' ),
			'param_name' => 'hover',
			'value' => array(
				__( 'Yes', 'yatheme' ) => 'hover',
				__( 'No', 'yatheme' ) => '',
			),
				'description' => __( 'Hover for slide', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
		    'heading' => __( 'Swipe slide', 'yatheme' ),
			'param_name' => 'swipe',
			'value' => array(
				__( 'Yes', 'yatheme' ) => 'yes',
				__( 'No', 'yatheme' ) => 'no',
			),
				'description' => __( 'Swipe for slide', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns >1200px:', 'yatheme' ),
			'param_name' => 'columns',
			'description' => __( 'Number colums you want display  > 1200px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 768px to 1199px:', 'yatheme' ),
			'param_name' => 'columns1',
			'description' => __( 'Number colums you want display  on 768px to 1199px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 480px to 767px:', 'yatheme' ),
			'param_name' => 'columns2',
			'description' => __( 'Number colums you want display  on 480px to 767px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 321px to 479px:', 'yatheme' ),
			'param_name' => 'columns3',
			'description' => __( 'Number colums you want display  on 321px to 479px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns in 320px or less than:', 'yatheme' ),
			'param_name' => 'columns4',
			'description' => __( 'Number colums you want display  in 320px or less than.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'yatheme' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'yatheme' )
		)
	)
) );
// ytc post slide
vc_map( array(
	'name' => 'Ya_' . __( 'SLIDE POSTS', 'yatheme' ),
	'base' => 'postslide',
	'icon' => get_template_directory_uri() . "/assets/img/icon_vc.png",
	'category' => __( 'Ya Shortcode', 'yatheme' ),
	'class' => 'wpb_vc_wp_widget',
	'weight' => - 50,
	'description' => __( 'Display posts-seclect category', 'yatheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'yatheme' ),
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style title', 'yatheme' ),
			'param_name' => 'style_title',
			'value' => array(
				'Select type',
				__( 'Style title 1', 'yatheme' ) => 'title1',
				__( 'Style title 2', 'yatheme' ) => 'title2',
				__( 'Style title 3', 'yatheme' ) => 'title3',
				__( 'Style title 4', 'yatheme' ) => 'title4'
			),
			'description' =>__( 'What text use as a style title. Leave blank to use default style title.', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Type post', 'yatheme' ),
			'param_name' => 'type',
			'value' => array(
				'Select type',
				__( 'bottom', 'yatheme' ) => 'bottom',
				__( 'right', 'yatheme' ) => 'right',
				__( 'left', 'yatheme' ) => 'left',
				__( 'out', 'yatheme' ) => 'out'
			),
			'description' => sprintf( __( 'Select different style posts.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		array(
			'param_name'    => 'categories',
			'type'          => 'dropdown',
			'value'         => $link_category, // here I'm stuck
			'heading'       => __('Category filter:', 'overmax'),
			'description'   => '',
			'holder'        => 'div',
			'class'         => ''
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of posts to show', 'yatheme' ),
			'param_name' => 'limit',
			'admin_label' => true
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Excerpt length (in words)', 'yatheme' ),
			'param_name' => 'length',
			'description' => __( 'Excerpt length (in words).', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Speed slide', 'yatheme' ),
			'param_name' => 'interval',
			'description' => __( 'Speed slide', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'yatheme' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'yatheme' )
		),
			

			
	)
) );
//// vertical mega menu
vc_map( array(
	'name' => 'Ya' . __( 'vertical mega menu', 'yatheme' ),
	'base' => 'ya_mega_menu',
	'icon' => get_template_directory_uri() . "/assets/img/icon_vc.png",
	'category' => __( 'Ya Shortcode', 'yatheme' ),
	'class' => 'wpb_vc_wp_widget',
	'weight' => - 50,
	'description' => __( 'Display vertical mega menu', 'yatheme' ),
	'params' => array(
	    array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'yatheme' ),
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'yatheme' )
		),
	    array(
			'param_name'    => 'menu_locate',
			'type'          => 'dropdown',
			'value'         => $menu_locations_array, // here I'm stuck
			'heading'       => __('Category menu:', 'overmax'),
			'description'   => '',
			'holder'        => 'div',
			'class'         => ''
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Theme shortcode want display', 'yatheme' ),
			'param_name' => 'widget_template',
			'value' => array(
				__( 'default', 'yatheme' ) => 'default',
			),
			'description' => sprintf( __( 'Select different style menu.', 'yatheme' ) )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'yatheme' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'yatheme' )
		),			
	)
));
///// Gallery 
vc_map( array(
	'name' => __( 'Ya_Gallery', 'yatheme' ),
	'base' => 'gallerys',
	'icon' => get_template_directory_uri() . "/assets/img/icon_vc.png",
	'category' => __( 'Ya Shortcode', 'yatheme' ),
	'description' => __( 'Animated carousel with images', 'yatheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'yatheme' ),
			'param_name' => 'title',
			'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'yatheme' )
		),
		array(
			'type' => 'attach_images',
			'heading' => __( 'Images', 'yatheme' ),
			'param_name' => 'ids',
			'value' => '',
			'description' => __( 'Select images from media library.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Gallery size', 'yatheme' ),
			'param_name' => 'size',
			'description' => __( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size. If used slides per view, this will be used to define carousel wrapper size.', 'yatheme' )
		),
		
		array(
			'type' => 'dropdown',
			'heading' => __( 'Gallery caption', 'yatheme' ),
			'param_name' => 'caption',
			'value' => array(
				__( 'true', 'yatheme' ) => 'true',
				__( 'false', 'yatheme' ) => 'false'
			),
			'description' => __( 'Images display caption true or false', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Gallery type', 'yatheme' ),
			'param_name' => 'type',
			'value' => array(
				__( 'column', 'yatheme' ) => 'column',
				__( 'slide', 'yatheme' ) => 'slide',
				__( 'flex', 'yatheme' ) => 'flex'
			),
			'description' => __( 'Images display type', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Gallery columns', 'yatheme' ),
			'param_name' => 'columns',
			'description' => __( 'Enter gallery columns. Example: 1,2,3,4 ... Only use gallery type="column".', 'yatheme' ),
		    'dependency' => array(
				'element' => 'type',
				'value' => 'column',
			)),
		
		array(
			'type' => 'textfield',
			'heading' => __( 'Slider speed', 'yatheme' ),
			'param_name' => 'interval',
			'value' => '5000',
			'description' => __( 'Duration of animation between slides (in ms)', 'yatheme' ),
		    'dependency' => array(
				'element' => 'type',
				'value' => array('slide','flex')
			)),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Gallery event', 'yatheme' ),
			'param_name' => 'event',
			'value' => array(
				__( 'slide', 'yatheme' ) => 'slide',
			),
			'description' => __( 'event slide images', 'yatheme' ),
		 'dependency' => array(
				'element' => 'type',
				'value' => array('slide','flex')
			)),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'yatheme' ),
			'param_name' => 'class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'yatheme' )
		)
		)
) );
/////////////////// best sale /////////////////////
vc_map( array(
	'name' => 'Ya_' . __( 'Best Sale', 'yatheme' ),
	'base' => 'BestSale',
	'icon' => get_template_directory_uri() . "/assets/img/icon_vc.png",
	'category' => __( 'Ya Shortcode', 'yatheme' ),
	'class' => 'wpb_vc_wp_widget',
	'weight' => - 50,
	'description' => __( 'Display bestseller', 'yatheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'yatheme' ),
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Style title', 'yatheme' ),
			'param_name' => 'style_title',
			'description' =>__( 'What text use as a style title. Leave blank to use default style title.', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Template', 'yatheme' ),
			'param_name' => 'template',
			'value' => array(
				'Select type',
				__( 'Default', 'yatheme' ) => 'default',
				__( 'Slide', 'yatheme' ) => 'slide',
			),
			'description' => sprintf( __( 'Select different style best sale.', 'yatheme' ) )
		),
		
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of posts to show', 'yatheme' ),
			'param_name' => 'number',
			'admin_label' => true
		),
		
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'yatheme' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'yatheme' )
		),	
	)
) );
/////////////////// ya woocommerce slider/////////////////////
vc_map( array(
	'name' => 'Ya_' . __( 'Woocommerce Slider', 'yatheme' ),
	'base' => 'ya_woocommerce_slider',
	'icon' => get_template_directory_uri() . "/assets/img/icon_vc.png",
	'category' => __( 'Ya Shortcode', 'yatheme' ),
	'class' => 'wpb_vc_wp_widget',
	'weight' => - 50,
	'description' => __( 'Display slider product', 'yatheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Title', 'yatheme' ),
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style title', 'yatheme' ),
			'param_name' => 'style_title',
			'value' => array(
				'Select type',
				__( 'Style title 1', 'yatheme' ) => 'title1',
				__( 'Style title 2', 'yatheme' ) => 'title2',
				__( 'Style title 3', 'yatheme' ) => 'title3',
				__( 'Style title 4', 'yatheme' ) => 'title4'
			),
			'description' =>__( 'What text use as a style title. Leave blank to use default style title.', 'yatheme' )
		),
		array(
		"type" => "4k_icon",
			"class" => "",
			"heading" => __("Select Icon:", 'bcgteam'),
			"param_name" => "icon",
			"admin_label" => true,
			"value" => "android",
			"description" => __("Select the icon from the list.", 'bcgteam'),		
			'dependency' => array(
				'element' => 'style_title',
				'value' => 'title4',
			),
		),
		array(
			'type' => 'attach_image',
			'heading' => __( 'Image', 'yatheme' ),
			'param_name' => 'image',
			'value' => '',
			'description' => __( 'Select image from media library.', 'yatheme' )
		),
		array(
			'param_name'    => 'category_id',
			'type'          => 'dropdown',
			'value'         => $product_categories_dropdown, // here I'm stuck
			'heading'       => __('Category filter:', 'overmax'),
			'description'   => '',
			'holder'        => 'div',
			'class'         => ''
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of product to show', 'yatheme' ),
			'param_name' => 'numberposts',
			'admin_label' => true
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns >1200px:', 'yatheme' ),
			'param_name' => 'col_lg',
			'description' => __( 'Number colums you want display  > 1200px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 768px to 1199px:', 'yatheme' ),
			'param_name' => 'col_md',
			'description' => __( 'Number colums you want display  on 768px to 1199px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 480px to 767px:', 'yatheme' ),
			'param_name' => 'col_sm',
			'description' => __( 'Number colums you want display  on 480px to 767px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 321px to 479px:', 'yatheme' ),
			'param_name' => 'col_xs',
			'description' => __( 'Number colums you want display  on 321px to 479px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns in 320px or less than:', 'yatheme' ),
			'param_name' => 'col_moble',
			'description' => __( 'Number colums you want display  in 320px or less than.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Speed slide', 'yatheme' ),
			'param_name' => 'speed',
			'description' => __( 'Speed for slide', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Interval slide', 'yatheme' ),
			'param_name' => 'interval',
			'description' => __( 'Interval for slide', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Autoplay for slider', 'yatheme' ),
			'param_name' => 'autoplay',
			'value' => array(
				'Select type',
				__( 'Yes', 'yatheme' ) => 'true',
				__( 'No', 'yatheme' ) => 'false',
			),
			'description' => sprintf( __( 'Select autoplay slider or not autoplay slider.', 'yatheme' ) )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number Slider', 'yatheme' ),
			'param_name' => 'number_slided',
			'description' => __( 'Number Slided for slide', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Layout Style', 'yatheme' ),
			'param_name' => 'layout',
			'value' => array(
				'Select layout',
				__( 'Default', 'yatheme' ) => 'default',
				__( 'Child categories product', 'yatheme' ) => 'child-cate',
				__('Left Child Cat','yatheme' )             => 'child-cate-left',
			),
			'description' => sprintf( __( 'Select different style posts.', 'yatheme' ) )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order way', 'yatheme' ),
			'param_name' => 'order',
			'value' => array(
				__( 'Descending', 'yatheme' ) => 'DESC',
				__( 'Ascending', 'yatheme' ) => 'ASC'
			),
			'description' => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
				
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order by', 'yatheme' ),
			'param_name' => 'orderby',
			'value' => array(
				'Select orderby',
				__( 'Date', 'yatheme' ) => 'date',
				__( 'ID', 'yatheme' ) => 'ID',
				__( 'Author', 'yatheme' ) => 'author',
				__( 'Title', 'yatheme' ) => 'title',
				__( 'Modified', 'yatheme' ) => 'modified',
				__( 'Random', 'yatheme' ) => 'rand',
				__( 'Comment count', 'yatheme' ) => 'comment_count',
				__( 'Menu order', 'yatheme' ) => 'menu_order'
			),
			'description' => sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'yatheme' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'yatheme' )
		),	
	)
) );
/////////////////// Woocommerce Countdown Slider/////////////////////
vc_map( array(
	'name' => 'Ya_' . __( 'Woocommerce Countdown Slider', 'yatheme' ),
	'base' => 'ya_countdown_slider',
	'icon' => get_template_directory_uri() . "/assets/img/icon_vc.png",
	'category' => __( 'Ya Shortcode', 'yatheme' ),
	'class' => 'wpb_vc_wp_widget',
	'weight' => - 50,
	'description' => __( 'Woocommerce Countdown Slider', 'yatheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Title', 'yatheme' ),
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style title', 'yatheme' ),
			'param_name' => 'style_title',
			'value' => array(
				'Select type',
				__( 'Style title 1', 'yatheme' ) => 'title1',
				__( 'Style title 2', 'yatheme' ) => 'title2',
				__( 'Style title 3', 'yatheme' ) => 'title3',
				__( 'Style title 4', 'yatheme' ) => 'title4'
			),
			'description' =>__( 'What text use as a style title. Leave blank to use default style title.', 'yatheme' )
		),
		array(
		"type" => "4k_icon",
			"class" => "",
			"heading" => __("Select Icon:", 'bcgteam'),
			"param_name" => "icon",
			"admin_label" => true,
			"value" => "android",
			"description" => __("Select the icon from the list.", 'bcgteam'),		
			'dependency' => array(
				'element' => 'style_title',
				'value' => 'title4',
			),
		),
		array(
			'param_name'    => 'category_id',
			'type'          => 'dropdown',
			'value'         => $product_categories_dropdown, // here I'm stuck
			'heading'       => __('Category filter:', 'overmax'),
			'description'   => '',
			'holder'        => 'div',
			'class'         => ''
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of product to show', 'yatheme' ),
			'param_name' => 'numberposts',
			'admin_label' => true
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns >1200px:', 'yatheme' ),
			'param_name' => 'col_lg',
			'description' => __( 'Number colums you want display  > 1200px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 768px to 1199px:', 'yatheme' ),
			'param_name' => 'col_md',
			'description' => __( 'Number colums you want display  on 768px to 1199px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 480px to 767px:', 'yatheme' ),
			'param_name' => 'col_sm',
			'description' => __( 'Number colums you want display  on 480px to 767px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 321px to 479px:', 'yatheme' ),
			'param_name' => 'col_xs',
			'description' => __( 'Number colums you want display  on 321px to 479px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns in 320px or less than:', 'yatheme' ),
			'param_name' => 'col_moble',
			'description' => __( 'Number colums you want display  in 320px or less than.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Speed slide', 'yatheme' ),
			'param_name' => 'speed',
			'description' => __( 'Speed for slide', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Interval slide', 'yatheme' ),
			'param_name' => 'interval',
			'description' => __( 'Interval for slide', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Autoplay for slider', 'yatheme' ),
			'param_name' => 'autoplay',
			'value' => array(
				'Select type',
				__( 'True', 'yatheme' ) => 'true',
				__( 'False', 'yatheme' ) => 'false',
			),
			'description' => sprintf( __( 'Select autoplay slider or not autoplay slider.', 'yatheme' ) )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number Slided', 'yatheme' ),
			'param_name' => 'number_slided',
			'description' => __( 'Number Slided for slide', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order way', 'yatheme' ),
			'param_name' => 'order',
			'value' => array(
				__( 'Descending', 'yatheme' ) => 'DESC',
				__( 'Ascending', 'yatheme' ) => 'ASC'
			),
			'description' => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
				
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order by', 'yatheme' ),
			'param_name' => 'orderby',
			'value' => array(
				'Select orderby',
				__( 'Date', 'yatheme' ) => 'date',
				__( 'ID', 'yatheme' ) => 'ID',
				__( 'Author', 'yatheme' ) => 'author',
				__( 'Title', 'yatheme' ) => 'title',
				__( 'Modified', 'yatheme' ) => 'modified',
				__( 'Random', 'yatheme' ) => 'rand',
				__( 'Comment count', 'yatheme' ) => 'comment_count',
				__( 'Menu order', 'yatheme' ) => 'menu_order'
			),
			'description' => sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'yatheme' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'yatheme' )
		),	
	)
) );
/////////////////// ya uspell product slider/////////////////////
vc_map( array(
	'name' => 'Ya_' . __( 'Upsell product slider', 'yatheme' ),
	'base' => 'uspell_product_slider',
	'icon' => get_template_directory_uri() . "/assets/img/icon_vc.png",
	'category' => __( 'Ya Shortcode', 'yatheme' ),
	'class' => 'wpb_vc_wp_widget',
	'weight' => - 50,
	'description' => __( 'Upsell product slider', 'yatheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Title', 'yatheme' ),
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'yatheme' )
		),
		array(
			'type' => 'attach_image',
			'heading' => __( 'Image', 'yatheme' ),
			'param_name' => 'image',
			'value' => '',
			'description' => __( 'Select image from media library.', 'yatheme' )
		),
		
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of product to show', 'yatheme' ),
			'param_name' => 'numberposts',
			'admin_label' => true
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns >1200px:', 'yatheme' ),
			'param_name' => 'col_lg',
			'description' => __( 'Number colums you want display  > 1200px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 768px to 1199px:', 'yatheme' ),
			'param_name' => 'col_md',
			'description' => __( 'Number colums you want display  on 768px to 1199px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 480px to 767px:', 'yatheme' ),
			'param_name' => 'col_sm',
			'description' => __( 'Number colums you want display  on 480px to 767px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 321px to 479px:', 'yatheme' ),
			'param_name' => 'col_xs',
			'description' => __( 'Number colums you want display  on 321px to 479px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns in 320px or less than:', 'yatheme' ),
			'param_name' => 'col_moble',
			'description' => __( 'Number colums you want display  in 320px or less than.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Speed slide', 'yatheme' ),
			'param_name' => 'speed',
			'description' => __( 'Speed for slide', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Interval slide', 'yatheme' ),
			'param_name' => 'interval',
			'description' => __( 'Interval for slide', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Autoplay for slider', 'yatheme' ),
			'param_name' => 'autoplay',
			'value' => array(
				'Select type',
				__( 'True', 'yatheme' ) => 'true',
				__( 'False', 'yatheme' ) => 'false',
			),
			'description' => sprintf( __( 'Select autoplay slider or not autoplay slider.', 'yatheme' ) )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number Slided', 'yatheme' ),
			'param_name' => 'number_slided',
			'description' => __( 'Number Slided for slide', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order by', 'yatheme' ),
			'param_name' => 'orderby',
			'value' => array(
				'Select orderby',
				__( 'Date', 'yatheme' ) => 'date',
				__( 'ID', 'yatheme' ) => 'ID',
				__( 'Author', 'yatheme' ) => 'author',
				__( 'Title', 'yatheme' ) => 'title',
				__( 'Modified', 'yatheme' ) => 'modified',
				__( 'Random', 'yatheme' ) => 'rand',
				__( 'Comment count', 'yatheme' ) => 'comment_count',
				__( 'Menu order', 'yatheme' ) => 'menu_order'
			),
			'description' => sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'yatheme' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'yatheme' )
		),	
	)
) );
/////////////////// ya related_product_slider/////////////////////
vc_map( array(
	'name' => 'Ya_' . __( 'Related Product Slider', 'yatheme' ),
	'base' => 'related_product_slider',
	'icon' => get_template_directory_uri() . "/assets/img/icon_vc.png",
	'category' => __( 'Ya Shortcode', 'yatheme' ),
	'class' => 'wpb_vc_wp_widget',
	'weight' => - 50,
	'description' => __( 'Related Product Slider', 'yatheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Title', 'yatheme' ),
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'yatheme' )
		),
		array(
			'type' => 'attach_image',
			'heading' => __( 'Image', 'yatheme' ),
			'param_name' => 'image',
			'value' => '',
			'description' => __( 'Select image from media library.', 'yatheme' )
		),
		
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of product to show', 'yatheme' ),
			'param_name' => 'numberposts',
			'admin_label' => true
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns >1200px:', 'yatheme' ),
			'param_name' => 'col_lg',
			'description' => __( 'Number colums you want display  > 1200px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 768px to 1199px:', 'yatheme' ),
			'param_name' => 'col_md',
			'description' => __( 'Number colums you want display  on 768px to 1199px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 480px to 767px:', 'yatheme' ),
			'param_name' => 'col_sm',
			'description' => __( 'Number colums you want display  on 480px to 767px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 321px to 479px:', 'yatheme' ),
			'param_name' => 'col_xs',
			'description' => __( 'Number colums you want display  on 321px to 479px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns in 320px or less than:', 'yatheme' ),
			'param_name' => 'col_moble',
			'description' => __( 'Number colums you want display  in 320px or less than.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Speed slide', 'yatheme' ),
			'param_name' => 'speed',
			'description' => __( 'Speed for slide', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Interval slide', 'yatheme' ),
			'param_name' => 'interval',
			'description' => __( 'Interval for slide', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Autoplay for slider', 'yatheme' ),
			'param_name' => 'autoplay',
			'value' => array(
				'Select type',
				__( 'True', 'yatheme' ) => 'true',
				__( 'False', 'yatheme' ) => 'false',
			),
			'description' => sprintf( __( 'Select autoplay slider or not autoplay slider.', 'yatheme' ) )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number Slided', 'yatheme' ),
			'param_name' => 'number_slided',
			'description' => __( 'Number Slided for slide', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order by', 'yatheme' ),
			'param_name' => 'orderby',
			'value' => array(
				'Select orderby',
				__( 'Date', 'yatheme' ) => 'date',
				__( 'ID', 'yatheme' ) => 'ID',
				__( 'Author', 'yatheme' ) => 'author',
				__( 'Title', 'yatheme' ) => 'title',
				__( 'Modified', 'yatheme' ) => 'modified',
				__( 'Random', 'yatheme' ) => 'rand',
				__( 'Comment count', 'yatheme' ) => 'comment_count',
				__( 'Menu order', 'yatheme' ) => 'menu_order'
			),
			'description' => sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'yatheme' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'yatheme' )
		),	
	)
) );
/////////////////// ya post slider/////////////////////
vc_map( array(
	'name' => 'Ya_' . __( 'Post Slider', 'yatheme' ),
	'base' => 'ya_post_slider',
	'icon' => get_template_directory_uri() . "/assets/img/icon_vc.png",
	'category' => __( 'Ya Shortcode', 'yatheme' ),
	'class' => 'wpb_vc_wp_widget',
	'weight' => - 50,
	'description' => __( 'Ya Post Slider', 'yatheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Title', 'yatheme' ),
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'yatheme' )
		),
		array(
			'param_name'    => 'category_id',
			'type'          => 'dropdown',
			'value'         => $product_categories_dropdown, // here I'm stuck
			'heading'       => __('Category filter:', 'overmax'),
			'description'   => '',
			'holder'        => 'div',
			'class'         => ''
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of post to show', 'yatheme' ),
			'param_name' => 'numberposts',
			'admin_label' => true
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Excerpt length (in words)', 'yatheme' ),
			'param_name' => 'length',
			'description' => __( 'Excerpt length (in words).', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns >1200px:', 'yatheme' ),
			'param_name' => 'col_lg',
			'description' => __( 'Number colums you want display  > 1200px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 768px to 1199px:', 'yatheme' ),
			'param_name' => 'col_md',
			'description' => __( 'Number colums you want display  on 768px to 1199px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 480px to 767px:', 'yatheme' ),
			'param_name' => 'col_sm',
			'description' => __( 'Number colums you want display  on 480px to 767px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 321px to 479px:', 'yatheme' ),
			'param_name' => 'col_xs',
			'description' => __( 'Number colums you want display  on 321px to 479px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns in 320px or less than:', 'yatheme' ),
			'param_name' => 'col_moble',
			'description' => __( 'Number colums you want display  in 320px or less than.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Speed slide', 'yatheme' ),
			'param_name' => 'speed',
			'description' => __( 'Speed for slide', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Interval slide', 'yatheme' ),
			'param_name' => 'interval',
			'description' => __( 'Interval for slide', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Autoplay for slider', 'yatheme' ),
			'param_name' => 'autoplay',
			'value' => array(
				'Select type',
				__( 'True', 'yatheme' ) => 'true',
				__( 'False', 'yatheme' ) => 'false',
			),
			'description' => sprintf( __( 'Select autoplay slider or not autoplay slider.', 'yatheme' ) )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number Slided', 'yatheme' ),
			'param_name' => 'number_slided',
			'description' => __( 'Number Slided for slide', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Layout post style', 'yatheme' ),
			'param_name' => 'layout',
			'value' => array(
				'Select layout',
				__( 'Default', 'yatheme' ) => 'default',
			),
			'description' => sprintf( __( 'Select different style posts.', 'yatheme' ) )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order way', 'yatheme' ),
			'param_name' => 'order',
			'value' => array(
				__( 'Descending', 'yatheme' ) => 'DESC',
				__( 'Ascending', 'yatheme' ) => 'ASC'
			),
			'description' => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
				
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order by', 'yatheme' ),
			'param_name' => 'orderby',
			'value' => array(
				'Select orderby',
				__( 'Date', 'yatheme' ) => 'date',
				__( 'ID', 'yatheme' ) => 'ID',
				__( 'Author', 'yatheme' ) => 'author',
				__( 'Title', 'yatheme' ) => 'title',
				__( 'Modified', 'yatheme' ) => 'modified',
				__( 'Random', 'yatheme' ) => 'rand',
				__( 'Comment count', 'yatheme' ) => 'comment_count',
				__( 'Menu order', 'yatheme' ) => 'menu_order'
			),
			'description' => sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'yatheme' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'yatheme' )
		),	
	)
) );
/////////////////// Our Brand slider/////////////////////
vc_map( array(
	'name' => 'Ya_' . __( 'Our Brand Slider', 'yatheme' ),
	'base' => 'our_brand_slider',
	'icon' => get_template_directory_uri() . "/assets/img/icon_vc.png",
	'category' => __( 'Ya Shortcode', 'yatheme' ),
	'class' => 'wpb_vc_wp_widget',
	'weight' => - 50,
	'description' => __( 'Our Brand Slider', 'yatheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Title', 'yatheme' ),
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style title', 'yatheme' ),
			'param_name' => 'style_title',
			'value' => array(
				'Select type',
				__( 'Style title 1', 'yatheme' ) => 'title1',
				__( 'Style title 2', 'yatheme' ) => 'title2',
				__( 'Style title 3', 'yatheme' ) => 'title3',
				__( 'Style title 4', 'yatheme' ) => 'title4'
			),
			'description' =>__( 'What text use as a style title. Leave blank to use default style title.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of post to show', 'yatheme' ),
			'param_name' => 'numberposts',
			'admin_label' => true
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns >1200px:', 'yatheme' ),
			'param_name' => 'col_lg',
			'description' => __( 'Number colums you want display  > 1200px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 768px to 1199px:', 'yatheme' ),
			'param_name' => 'col_md',
			'description' => __( 'Number colums you want display  on 768px to 1199px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 480px to 767px:', 'yatheme' ),
			'param_name' => 'col_sm',
			'description' => __( 'Number colums you want display  on 480px to 767px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns on 321px to 479px:', 'yatheme' ),
			'param_name' => 'col_xs',
			'description' => __( 'Number colums you want display  on 321px to 479px.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of Columns in 320px or less than:', 'yatheme' ),
			'param_name' => 'col_moble',
			'description' => __( 'Number colums you want display  in 320px or less than.', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Speed slide', 'yatheme' ),
			'param_name' => 'speed',
			'description' => __( 'Speed for slide', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Interval slide', 'yatheme' ),
			'param_name' => 'interval',
			'description' => __( 'Interval for slide', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Autoplay for slider', 'yatheme' ),
			'param_name' => 'autoplay',
			'value' => array(
				'Select type',
				__( 'True', 'yatheme' ) => 'true',
				__( 'False', 'yatheme' ) => 'false',
			),
			'description' => sprintf( __( 'Select autoplay slider or not autoplay slider.', 'yatheme' ) )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number Slided', 'yatheme' ),
			'param_name' => 'number_slided',
			'description' => __( 'Number Slided for slide', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Layout shortcode want display', 'yatheme' ),
			'param_name' => 'layout',
			'value' => array(
				'Select layout',
				__( 'Default', 'yatheme' ) => 'default',
			),
			'description' => sprintf( __( 'Select different style posts.', 'yatheme' ) )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order way', 'yatheme' ),
			'param_name' => 'order',
			'value' => array(
				__( 'Descending', 'yatheme' ) => 'DESC',
				__( 'Ascending', 'yatheme' ) => 'ASC'
			),
			'description' => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
				
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order by', 'yatheme' ),
			'param_name' => 'orderby',
			'value' => array(
				'Select orderby',
				__( 'Date', 'yatheme' ) => 'date',
				__( 'ID', 'yatheme' ) => 'ID',
				__( 'Author', 'yatheme' ) => 'author',
				__( 'Title', 'yatheme' ) => 'title',
				__( 'Modified', 'yatheme' ) => 'modified',
				__( 'Random', 'yatheme' ) => 'rand',
				__( 'Comment count', 'yatheme' ) => 'comment_count',
				__( 'Menu order', 'yatheme' ) => 'menu_order'
			),
			'description' => sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'yatheme' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'yatheme' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'yatheme' )
		),	
	)
) );
/////////////////// Pricing Table/////////////////////
vc_map( array(
	'name' => 'Ya_' . __( 'Pricing Table', 'yatheme' ),
	'base' => 'pricing',
	'icon' => get_template_directory_uri() . "/assets/img/icon_vc.png",
	'category' => __( 'Ya Shortcode', 'yatheme' ),
	'class' => 'wpb_vc_wp_widget',
	'weight' => - 50,
	'description' => __( 'Display Pricing Table', 'yatheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Title', 'yatheme' ),
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style title', 'yatheme' ),
			'param_name' => 'style_title',
			'value' => array(
				'Select type',
				__( 'Style title 1', 'yatheme' ) => 'title1',
				__( 'Style title 2', 'yatheme' ) => 'title2',
				__( 'Style title 3', 'yatheme' ) => 'title3',
				__( 'Style title 4', 'yatheme' ) => 'title4'
			),
			'description' =>__( 'What text use as a style title. Leave blank to use default style title.', 'yatheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'style for table', 'yatheme' ),
			'param_name' => 'style',
			'value' => array(
				'Select style',
				__('Pricing table','yatheme') => 'vprice'
			),
			'description' => sprintf( __( 'Select style for table.', 'yatheme' ) )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Description for table', 'yatheme' ),
			'param_name' => 'description',
			'admin_label' => true
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Plan or title', 'yatheme' ),
			'param_name' => 'plan',
			'description' => __( 'Plan or title of table', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Cost', 'yatheme' ),
			'param_name' => 'cost',
			'description' => __( 'Cost of table', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Currency', 'yatheme' ),
			'param_name' => 'currency',
			'description' => __( 'Currency of cost on table', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Percent of MONTH', 'yatheme' ),
			'param_name' => 'per',
			'description' => __( 'Percent of MONTH', 'yatheme' )
		),
		array(
		    'type'=>'textarea_html',
			'heading' => __('Content need show','yatheme'),
			'param_name' => 'content',
			'description' => __( 'Display content', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Button link', 'yatheme' ),
			'param_name' => 'button_url',
			'description' => __( 'Button link', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'button text', 'yatheme' ),
			'param_name' => 'button_text',
			'description' => __( 'Button text', 'yatheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'button target', 'yatheme' ),
			'param_name' => 'button_target',
			'description' => __( 'Display button target', 'yatheme' )
		),
		
		array(
			'type' => 'textfield',
			'heading' => __( 'button rel', 'yatheme' ),
			'param_name' => 'button_rel',
			'description' => __( 'button rel', 'yatheme' )
		),
			
	)
) );
}
?>