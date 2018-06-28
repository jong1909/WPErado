<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
if ( ! $post->post_excerpt ) return;
?>
<div itemprop="description" class="product-description hide">
    <!--<h2 class="quick-overview"><?php echo _e('Chi tiết sản phẩm','yatheme')?></h2> -->	
	<?php // echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
</div>