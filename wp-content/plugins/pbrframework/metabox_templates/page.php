<?php
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
global $wp_registered_sidebars;
$meta_tabs = array(
        array(
            'id'    => 'pbr-config',
            'icon'  => 'fa-wrench',
            'title' => 'General'
        ),
        array(
            'id'    => 'option',
            'icon'  => 'fa-cogs',
            'title' => 'Template Option'
        )
    );

?>
<div id="pbr-post" class="pbr-metabox">
<!-- Nav tabs -->
    <?php $mb->getTabsConfig($meta_tabs); ?>

    <!--Genaral config -->
    <div class="pbr-meta-content active" id="pbr-config">
	<?php
		$layout = array('id' => 'page_layout', 'title' => __('Page Layout',"pbrframework") );
		$mb->selectLayout($layout);
	?>
	<div style="clear:both;"></div>
		<!--Select left sidebar-->
		<p class="pbr_section left-sidebar for-leftmain for-leftmainright target-page-layout">
		    <?php $mb->the_field('left_sidebar'); ?>
    <?php 
    	$left_sidebars = array('id'=> 'left_sidebar','title'=> __('Left Sidebar',"pbrframework"),'data'=>$wp_registered_sidebars,'default'=>'sidebar-left');
        $mb->getSelectElement($left_sidebars);
    ?>
		</p>
		<!--Select right sidebar-->
		<p class="pbr_section right-sidebar for-mainright for-leftmainright target-page-layout">
    <?php 
        $right_sidebars = array('id'=> 'right_sidebar','title'=> 'Right Sidebar','data'=>$wp_registered_sidebars,'default'=>'sidebar-right');
        $mb->getSelectElement($right_sidebars); 
    ?>
		</p>

		<p class="pbr_section right-sidebar for-mainright for-leftmainright for-leftmain target-page-layout">
		    <?php 

		    	$columns = array();
		    	$columns[] = array(
		    		'id' => '', 'name' => __('Default',"pbrframework"),
		    	);
		    	$columns[] = array(
		    		'id' => '2', 'name' => __('2 Columns',"pbrframework"),
		    	);
		    	$columns[] = array(
		    		'id' => '3', 'name' => __('3 Columns',"pbrframework"),
		    	);
		    	$columns[] = array(
		    		'id' => '4', 'name' => __('4 Columns',"pbrframework"),
		    	);

		        $right_sidebars = array('id'=> 'sidebar_column','title'=> 'Sidebar Columns','data'=>$columns,'default'=>'');
		        $mb->getSelectElement($right_sidebars); 
		    ?>
		    <i><?php _e( 'Set number of column bootstrap for each sidebar', "pbrframework" );?></i>
		</p>


		<!--Select Layout-->
	    <p class="pbr_section">
			<?php
				$data_layout = array(
					array( 'id' => 'global', 'name' => 'Use Global'),
					array( 'id' => 'fullwidth', 'name' => 'Full width'),
					array( 'id' => 'boxed', 'name' => 'Boxed')
				);
				$layout = array(
		    		'id' => 'layout',
		    		'title' => 'Layout style',
		    		'data' => $data_layout,
		    		'default' => 'global'
				);
		    	$mb->getSelectElement( $layout );
			?><i><?php _e( 'Whether to set fullwidth for the page', "pbrframework" );?></i>
		</p>

		<!--Select skins-->

		<!--Select header skin-->
		<p class="pbr_section ">
    	<?php
	    	$header = pbr_cst_headerlayouts();
	    	$data = array(array( 'id' => 'global', 'name' => 'Use Global'));
	    	foreach ($header as $key => $value) {
	    		$data[] = array('id'=> $key,'name' => $value);
	    	}
	    	$header_skin = array(
	    		'id' => 'header_skin',
	    		'title' => 'Header Skin',
	    		'data' => $data,
	    		'default' => 'global'
			);
	    	$mb->getSelectElement( $header_skin );
    	?>
	    </p>

       <p class="pbr_section">
       <?php 
         $footer = get_footerbuilder_profiles();
         $data = array(array( 'id' => 'global', 'name' => 'Use Global'));
         foreach ($footer as $key => $value) {
            $data[] = array('id'=> $key,'name' => $value);
         }
         $footer_skin = array(
            'id' => 'footer_skin',
            'title' => 'Footer Skin',
            'data' => $data,
            'default' => 'global'
         );
         $mb->getSelectElement( $footer_skin );
       ?>
       </p>
	 		<!--show title config -->

		  <!--Show Breadcrumb config -->
        <p class="pbr_section show_breadcrumb">
        <?php
            $_show_breadcrumb = array('id'=>'breadcrumb', 'title'=>__('Show Breadcrumb', "pbrframework") );
            $mb->getCheckboxElement($_show_breadcrumb); 
        ?>
        </p>
        <p class="pbr_section background_breadcrumb" data-id="bg_color:bg_image" data-group="breadcrumb">
        <?php
        	$data_select = array(
        		array( 'id' => 'global', 'name' => 'Use Global'),
        		array( 'id' => 'bg_color', 'name' => 'Use Color'),
        		array( 'id' => 'bg_image', 'name' => 'Use Image' ));
        	$background = array('id'=>'background_breadcrumb', 'title'=>__('Select background breadcrumb', "pbrframework"), 'data' => $data_select, 'default'=>'bg_color' );
            $mb->getSelectElement($background); 
        ?>
        <p class="pbr_section bg_color breadcrumb">
    	<?php
    		$data_color = array(
    			'id' => 'bg_color',
    			'title' => __('Background color breadcrumb', "pbrframework")
			); 
    		$mb->addColorElement( $data_color ); 
		?>
        </p>

        <!-- Add image breadcrumb -->
        <p class="pbr_section bg_image breadcrumb">
	        <?php
	        	$_image_breadcrumbs = array(
	        		'id' => 'image_breadcrumb',
	        		'title' => __('Image breadcrumb', "pbrframework"),
	        		'description' => __(' Add image', "pbrframework")
	    		);
	    		$mb->pbr_image_upload( $_image_breadcrumbs );
	        ?>
        </p>
        <!--End add image-->
		
	</div>
	<div class="pbr-meta-content" id="option">
		<!--Blog config -->
		<p class="pbr_section pbr-check pbr-template-blog-template">
		<?php
			$number = array(
                'id'    => 'blog_number',
                'title' => 'Number post',
                'des'   => '(Number post per page)'
            );
			$mb->addNumberElement( $number );
		?>
		</p>
		<p class="pbr_section pbr-check pbr-template-blog-template" data-group="style_blog" data-id="default:list:masonry">
		<?php
			$path = PBR_THEME_DIR.'/templates/blog/blog-*.php';
			$file_name = 'blog-';
			$styles = pbr_get_styles($path, $file_name);
			foreach( $styles as $key=>$val){
				$data_styles[] = array('id'=> $key,'name' => $val);
			}
			$_styles = array(
		    		'id' => 'blog_style',
		    		'title' => 'Blog style',
		    		'data' => $data_styles,
		    		'default' => ''
				);
	    	$mb->getSelectElement( $_styles );
		?>
		</p>

		<p class="pbr_section pbr-check pbr-template-blog-template style_blog masonry">
		<?php 
			$column = array(
	    		'id' => 'blog_columns',
	    		'title' => 'Posts Show Columns',
	    		'data' => array(
	    			array('id' => 2, 'name' => '2 columns'),
	    			array('id' => 3, 'name' => '3 columns'),
	    			array('id' => 4, 'name' => '4 columns'),
    			),
	    		'default' => '2'
			);
	    	$mb->getSelectElement( $column );
	    	
    	?>
		</p>

		<!--Portfolio config -->
		<p class="pbr_section pbr-check pbr-template-template-portfolio">
		<?php
			$data_number = array(
                'id'    => 'portfolio_number',
                'title' => 'Number portfolio per page',
                'des'   => ''
            );
			$mb->addNumberElement( $data_number );
		?>
		</p>
		<p class="pbr_section pbr-check pbr-template-template-portfolio" data-group="style_portfolio" data-id="default:masonry">
		<?php
			$portfolio_path = PBR_THEME_DIR.'/templates/portfolio/portfolio-*.php';
			$portfolio_file = 'portfolio-';
			$portfolio_styles = pbr_get_styles($portfolio_path, $portfolio_file);
			$portfolio_data = array();
			foreach( $portfolio_styles as $_key=>$_val){
				$portfolio_data[] = array('id'=> $_key,'name' => $_val);
			}
			$styles_portfolio = array(
		    		'id' => 'portfolio_style',
		    		'title' => 'Portfolio style',
		    		'data' => $portfolio_data,
		    		'default' => ''
				);
	    	$mb->getSelectElement( $styles_portfolio );
		?>
		</p>

		<p class="pbr_section pbr-check pbr-template-template-portfolio">
		<?php 
			$_column = array(
	    		'id' => 'portfolio_columns',
	    		'title' => 'Portfolio Show Columns',
	    		'data' => array(
	    			array('id' => 2, 'name' => '2 columns'),
	    			array('id' => 3, 'name' => '3 columns'),
	    			array('id' => 4, 'name' => '4 columns'),
    			),
	    		'default' => '2'
			);
	    	$mb->getSelectElement( $_column );
    	?>
		</p>

	</div>
</div>