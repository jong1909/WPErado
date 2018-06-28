<?php	$number    		= isset( $instance['numberposts'] ) ? intval($instance['numberposts']) : 8;	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly		global $product, $woocommerce_loop,$wp_query;	$related = $product->get_related( $number );	if ( sizeof( $related ) == 0 ) return;	$args = apply_filters( 'woocommerce_related_products_args', array(		'post_type'            => 'product',		'ignore_sticky_posts'  => 1,		'no_found_rows'        => 1,		'posts_per_page'       => $number,		'post__in'             => $related,		'post__not_in'         => array( $product->id )	) );	$num_post  = count($related);	$relate = new WP_Query( $args );	if ($relate->have_posts()) :	$i = 0;	$j = 0;	$k = 0;	$pf_id = 'relate-'.rand().time();?>		<div id="<?php echo esc_attr( $pf_id ) ?>" class="carousel slide sw-related-product block" data-ride="carousel" data-interval="0">	<div class="block-title title1">			<h2>				<span><?php echo esc_html( $title ) ?></span>			</h2>			<div class="customNavigation nav-left-product">				<a title="Previous" class="btn-bs prev-bs fa fa-angle-left"  href="#<?php echo esc_attr( $pf_id ) ?>" role="button" data-slide="prev"></a>				<a title="Next" class="btn-bs next-bs fa fa-angle-right" href="#<?php echo esc_attr( $pf_id ) ?>" role="button" data-slide="next"></a>			</div>		</div>		 <div class="carousel-inner">			<?php while ($relate->have_posts()) : $relate->the_post();			global $product, $post;			if( $i % 4 == 0 ){			?>			<div class="item <?php if( $i == 0 ){ echo 'active'; } ?>">			<?php } ?>			<div class="bs-item cf">	        <div class="bs-item-inner">			<div class="item-img">						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">							<?php if( has_post_thumbnail() ){  								echo (get_the_post_thumbnail( $relate->post->ID, 'shop_thumbnail')) ? get_the_post_thumbnail( $relate->post->ID, 'shop_thumbnail' ) : '<img src="'.get_template_directory_uri().'/assets/img/placeholder/shop_thumbnail.png" alt="No thumb"/>' ;							}else{ 								echo '<img src="'.get_template_directory_uri().'/assets/img/placeholder/shop_thumbnail.png" alt="No thumb"/>' ;							} ?>						</a>			</div>	           <div class="item-content">			            <?php $average      = $product->get_average_rating(); ?>						<div class="star"><?php echo ( $average > 0 ) ? '<span style="width: ' .( $average*14 ).'px"></span>' : ''; ?></div>												<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a></h4>												<p><?php echo $product->get_price_html(); ?></p>											</div>			  </div>			</div>			<?php if( ( $i+1 )%4==0 || ( $i+1 ) == $num_post  ){?> </div><?php } ?>			<?php $i++; endwhile; ?>		</div>	</div><?php	endif;	wp_reset_postdata();?>