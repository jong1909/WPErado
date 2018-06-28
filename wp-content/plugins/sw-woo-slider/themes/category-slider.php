<?php $ya_direction = ya_options()->getCpanelValue( 'direction' ); ?>
<div id="<?php echo $widget_id; ?>" class="responsive-slider sw-woo-container-slider loading"  data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>" data-rtl="<?php echo ( is_rtl() || $ya_direction == 'rtl' )? 'true' : 'false';?>" data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
		<div class="block-title">
			<span class="page-title-slider"><?php echo $title1; ?></span>
			<p class="pre-text"><?php echo $description1; ?></p>
		</div>
		<div class="resp-slider-container">
			<div class="slider responsive">
			<?php
				foreach( $category as $cat ){
					$term = get_term($cat, 'product_cat');							
					$thumbnail_id 	= absint( get_metadata( 'woocommerce_term', $cat, 'thumbnail_id', true ));
					$thumb = wp_get_attachment_image( $thumbnail_id, array(350, 230) );
			?>
				<div class="item item-product-cat">					
					<div class="item-image">
						<?php echo $thumb; ?>
						<h3><a href="<?php echo get_term_link( $cat, 'product_cat' ); ?>"><?php echo esc_html( $term->name ); ?></a></h3>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>		