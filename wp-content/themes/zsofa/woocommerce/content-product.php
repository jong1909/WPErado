<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
?>
<div class="col-md-4 col-ssmm-6 col-ssm-6">
    <div class="product-wrapper">
        <a class="product-image image_blur" href="<?php echo esc_url( $link ) ?>"><span class="img-thumb-wrapper"><?php echo woocommerce_get_product_thumbnail(); ?></span></a>

    </div>
    <div class="product-title-info"><a href="<?php echo esc_url( $link ) ?>" class="product-link"><?php echo get_the_title() ?></a></div>
    <div class="product-price">
        <span class="tit-price">Giá: </span>
        <span class="value-price">
            <?php if ( $price_html = $product->get_price_html() ) : ?>
                <?php echo $price_html; ?>
            <?php endif; ?>
        </span>
    </div>
</div>
