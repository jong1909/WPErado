<?php $ya_direction = ya_options()->getCpanelValue( 'direction' ); ?>
<?php 
	//die('va day');
	global $product, $woocommerce, $woocommerce_loop;
	$upsells = $product->get_upsells();
	if( count($upsells) == 0 || is_archive() ) return ;	
	$default = array(
		'post_type' => 'product',
		'orderby' => $orderby,
		'post__in'   => $upsells,
		'order' => $order,
		'post_status' => 'publish',
		'showposts' => $numberposts
	);
	$list = new WP_Query( $default );
		global $yith_wcwl,$product;
		$yith_compare = new YITH_Woocompare_Frontend(); 	
	do_action( 'before' ); 
	if ( $list -> have_posts() ){
?>
	<div id="<?php echo $widget_id; ?>" class="sw-woo-container-slider upsells-products responsive-slider clearfix loading" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>" data-rtl="<?php echo ( is_rtl() || $ya_direction == 'rtl' )? 'true' : 'false';?>" data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
		<div class="resp-slider-container">
		
			<div class="block-title title1">
				   <h2>
					<span><?php echo esc_html( $title1 ) ?></span>
				   </h2>
	         </div>
			<div class="slider responsive">			
			<?php
				$i = 1;
				while($list->have_posts()): $list->the_post();global $product, $post, $wpdb, $average;
				?>
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
									<div class="star"><?php echo ( $average > 0 ) ?'<span style="width:'. ( $average*11 ).'px"></span>' : ''; ?></div>
								</div>	
								<!-- end rating  -->
								<?php if ( $price_html = $product->get_price_html() ){?>
									<div class="item-price">
										<span>
											<?php echo $price_html; ?>
										</span>
									</div>
									<?php } ?>
									<div class="item-bottom-grid clearfix">
										<?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
											sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s"  class="button  %s product_type_%s" title="add to cart">%s</a>',
												esc_url( $product->add_to_cart_url() ),
												esc_attr( $product->id ),
												esc_attr( $product->get_sku() ),
												$product->is_purchasable() ? 'add_to_cart_button' : '',
												esc_attr( $product->product_type ),
												esc_html( $product->add_to_cart_text() )
											),
										$product );
										if ( in_array( 'yith-woocommerce-compare/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
											if ( in_array( 'yith-woocommerce-compare/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
										?>
										    <div class="woocommerce product compare-button">
										    <a href="<?php echo esc_url($yith_compare->add_product_url( $product->id )) ?>" class="compare button" title="Add to Compare" data-product_id="<?php echo esc_attr($product->id) ?>"><?php echo esc_html('compare') ?></a>
											</div>
									       <?php
											}
											if ( in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
													echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
												}
										}
											$nonce = wp_create_nonce("ya_quickviewproduct_nonce");
											$link = admin_url('admin-ajax.php?ajax=true&amp;action=ya_quickviewproduct&amp;post_id='.$product->id.'&amp;nonce='.$nonce);
											$linkcontent ='<a href="'. esc_url( $link ) .'" data-fancybox-type="ajax" class="fancybox fancybox.ajax sm_quickview_handler" title="Quick View Product">'.apply_filters( 'out_of_stock_add_to_cart_text', __( 'Quick View', 'yatheme' ) ).'</a>';
											echo $linkcontent;
								?>
							        </div>
							</div>
								
						</div>
					</div>
				</div>
			<?php $i++; endwhile; wp_reset_query();?>
			</div>
		</div>					
	</div>
<?php
} 
?>