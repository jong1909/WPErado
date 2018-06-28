<?php $ya_direction = ya_options()->getCpanelValue( 'direction' ); ?>
<?php
    if( is_array( $category ) && count( $category ) > 1 ){
        include( plugin_dir_path( __FILE__ ).'category-slider.php' );
    }else{
        if( count( $category ) == 1 && $category[0] != 0 ){
        $default = array(
            'post_type' => 'product',
            'tax_query' => array(
            array(
                'taxonomy'  => 'product_cat',
                'field'     => 'term_id',
                'terms'     => $category[0])),
            'orderby' => $orderby,
            'order' => $order,
            'post_status' => 'publish',
            'showposts' => $numberposts
        );
        }else{
            $default = array(
                'post_type' => 'product',
                'orderby' => $orderby,
                'order' => $order,
                'post_status' => 'publish',
                'showposts' => $numberposts
            );
        }
        $list = new WP_Query( $default );
        do_action( 'before' ); 
        if ( $list -> have_posts() ){
 ?>

        <div id="<?php echo $widget_id; ?>" class="sw-woo-container-slider responsive-slider woo-slider-default loading" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>" data-rtl="<?php echo ( is_rtl() || $ya_direction == 'rtl' )? 'true' : 'false';?>" data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
			<div class="block-title">
				<span class="page-title-slider"><?php echo $title1; ?></span>
			</div>          
			<div class="resp-slider-container">
				<div class="slider responsive">	
				<?php while($list->have_posts()): $list->the_post();global $product, $post, $wpdb, $average; ?>
					<div class="item">
						<div class="item-wrap">
							<div class="item-detail">										
								<div class="item-img products-thumb">											
									<!-- quickview & thumbnail  -->
									<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
								</div>										
								<div class="item-content">
									<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a></h4>								
																				
									<!-- rating  -->
									<?php 
										$rating_count = $product->get_rating_count();
										$review_count = $product->get_review_count();
										$average      = $product->get_average_rating();
									?>
									<div class="reviews-content">
										<div class="star"><?php echo ( $average > 0 ) ?'<span style="width:'. ( $average*13 ).'px"></span>' : ''; ?></div>
										<div class="item-number-rating">
											<?php echo $review_count; _e(' Review(s)', 'yatheme');?>
										</div>
									</div>	
									<!-- end rating  -->
									<?php if ( $price_html = $product->get_price_html() ){?>
									<div class="item-price">
										<span>
											<?php echo $price_html; ?>
										</span>
									</div>
									<?php } ?>
								</div>											
							</div>
						</div>
					</div>
				<?php endwhile; wp_reset_query();?>
				</div>
			</div>            
        </div>
    <?php
    } 
}
?>