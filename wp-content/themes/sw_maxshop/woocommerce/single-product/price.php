<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;

$price = ($product->get_sale_price() == null) ? $product->get_regular_price() : $product->get_sale_price();
$save_money = $product->get_regular_price() - $price;
$save = ( $save_money / $product->get_regular_price() ) * 100;

if($price >= 2000000){
	$month = 36;
}else if($price == 399000){
	$month = 3;
}else{
	$month = 12;
}

?>
<div id="prices" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	<!--<p class="price"><ins><span class="amount">Giá: </span></ins> <?php // echo $product->get_price_html(); ?></p> -->
	
	<?php if($price != 399000): ?>
		<div><strong>Bảo hành <?php echo $month; ?> tháng </strong>online tại nhà <a href="http://zsofa.vn/kiem-tra-bao-hanh-online/">Xem thêm</a></div>
	<?php endif; ?>
	
	<?php if($price == 399000): ?>
		<div><strong><?php echo $month; ?> tháng </strong>Bảo hành online</a></div>
	<?php endif; ?>
	
	
	<div class="product-price"><?php echo number_format($price); ?> VNĐ </div>
	<div>Giá trước đây <span class="old-price"><?php echo number_format($product->get_regular_price()); ?> VNĐ </span></div>
	<div>Tiết kiệm <strong><?php echo number_format($save_money) ?>₫ ( <?php echo round($save) ?>% )</strong></div>
	<?php if($price >= 2000000): ?>
	<div class="tra-gop"><a href="http://zsofa.vn/tra-gop-khong-lai-suat/">Hoặc <strong>mua trả góp</strong> 0% bằng thẻ tín dụng chỉ <strong><?php echo number_format($price/12); ?>₫/tháng</strong> »</a></div>
	<?php endif; ?>
	<div style="padding:10px 0px">
		<button id="mua-ngay"  class="btn btn-default btn-mua-ngay" data-toggle="modal" data-target="#myModal">Mua ngay</button>
		<button id="tu-van"  class="btn btn-default btn-tu-van" data-toggle="modal" data-target="#myModal">Gọi lại tư vấn</button>
	</div>
	<div class="km"> 
		<div class="img"><img src="http://zsofa.vn/wp-content/uploads/detail/gilf.png"></div>
		<span>Khuyến mãi HOT</span> 
	</div>
	<div class="km box">
	
		<?php if($price >= 5000000): ?>
			<div class="checkbox">
				<label><input type="checkbox" value="" checked disabled><red>Tặng 4 gối ôm</red> trị giá <red>800.000đ<red></label>
			</div>
		<?php endif ?>
		
		<?php if($price >= 8000000): ?>
			<div class="checkbox">
				<label><input type="checkbox" value="" checked disabled><red>Tặng bàn kiếng cao cấp</red> trị giá <red>1.400.000đ<red></label>
			</div>
		<?php endif ?>
		
		<?php if($price >= 2000000): ?>
			<div class="checkbox">
				<label><input type="checkbox" value="" checked disabled><red>Giảm thêm 5%</red> khi đặt hàng online <red>từ 01/09 - 30/09/2017</red></label>
			</div>
			<div class="checkbox">
				<label><input type="checkbox" value="" checked disabled><red>Miễn phí vận chuyển</red> tất cả các quận, huyện TP.HCM</label>
			</div>
			<div class="checkbox">
				<label><input type="checkbox" value="" checked disabled><red>Trả góp lãi suất 0%</red>, áp dụng cho thẻ tín dụng các ngân hàng: SacomBank, VIBBank, HSBC, VPBank, ShinghanBank, ANZ</label>
			</div>
			<div class="checkbox">
				<label><input type="checkbox" value="" checked disabled><red>Miễn phí tư vấn tại nhà </red>về kích thước, hướng ghế, màu sắc...</label>
			</div>
			
		<?php endif ?>
		Gọi ngay <red>0975.488.488</red> để được tư vấn miễn phí
	</div>

	<meta itemprop="price" content="<?php echo $product->get_regular_price(); ?>" />
	<meta itemprop="price" content="<?php echo $product->get_sale_price(); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
</div>
