<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Product Details
 *
 * @package zsofa
 */

get_header(); ?>
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product;
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
    'woocommerce-product-gallery',
    'woocommerce-product-gallery--' . ( has_post_thumbnail() ? 'with-images' : 'without-images' ),
    'woocommerce-product-gallery--columns-' . absint( $columns ),
    'images',
) );
$dimensions = wc_format_dimensions($product->get_dimensions(false));

?>
    <div class="product-breadcrumb">
        <div class="container">
            <ul>
                <li class="home"><a href="">Home</a></li>
                <li><a href="">Ghế sofa</a></li>
                <li><a href="">Sofa da thật</a></li>
            </ul>
        </div>
    </div>
    <div class="product-info-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-ssmm-12 col-ssmm-12 col-md-5 col-left">
                    <div class="ribbon-wrapper ribbon-mobile">
                        <div class="col-ssmm-12 col-ssm-12 col-md-7"><strong>Zsofa</strong> tiếp nối thành công của thương hiệu <strong>rOsano</strong></div>
                        <div class="col-ssmm-5 col-ssm-5 col-md-5">
                            ĐẾN ĐÚNG NƠI - MUA ĐÚNG CHỖ
                        </div>
                    </div>
                    <div class="product-main-img <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
                        <figure class="woocommerce-product-gallery__wrapper">
                            <?php
                            if ( has_post_thumbnail() ) {
//                                $html  = wc_get_gallery_image_html( $post_thumbnail_id, true );
                                  echo get_the_post_thumbnail( $page->ID, 'post-thumb-wide' );
                            } else {
                                $html  = '<div class="woocommerce-product-gallery__image--placeholder">';
                                $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
                                $html .= '</div>';
                            }

                            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );

//                            do_action( 'woocommerce_product_thumbnails' );
                            ?>
                        </figure>
                    </div>
                    <div class="customers-purchase">
                        <h3>Khách hàng <span>đã mua</span></h3>
                        <ul>
                            <li><span class="name">Anh. Minh</span><span class="address"> - (09xxxx0291) đã mua 2 tháng trước (10/07/2015)</span></li>
                            <li><span class="name">Anh. Hoài</span><span class="address"> - tại Start city đã mua 2 ngày trước</span></li>
                            <li><span class="name">Chú. Lưu</span><span class="address"> - (09xxxx2656) đã mua 2 Tháng trước</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-ssmm-12 col-ssm-12 col-md-7 col-right">
                    <div class="ribbon-wrapper">
                        <div class="col-ssmm-12 col-ssm-12 col-md-7"><strong>ZSOFA</strong> tiếp nối thành công của thương hiệu <strong>rOsano</strong></div>
                        <div class="col-ssmm-5 col-ssm-5 col-md-5">
                            ĐẾN ĐÚNG NƠI - MUA ĐÚNG CHỖ
                        </div>
                    </div>
                    <div class="product-name"><?php the_title( '<h1 class="product_title entry-title">', '</h1>' ); ?></div>
                    <div class="product-size"><span>Kích thước: </span><?php if ( $product->has_dimensions() ) {
                            echo $dimensions ;
                        }
                        else{
                            echo 'Liên hệ ( kích thước tùy chọn )';
                        }
                        ?></div>
                    <div class="col-ssmm-12 col-ssm-12 col-md-3"><div class="product-warranty"><span>Bảo hành: </span><?php the_field('bao_hanh'); ?></div></div>
                    <div class="col-ssmm-12 col-ssm-12 col-md-5"><div class="product-status"><span>Tình trạng: </span><?php echo ($product->is_in_stock())? 'Còn hàng' : 'Hết hàng'?></div></div>
                    <div class="price-wrapper clearfix">
                        <div class="price col-ssmm-12 col-ssm-12 col-md-5"><span class="title">Giá bán: </span><span class="num"><?php echo $product->get_price_html(); ?></span></div>
                        <div class="old-price col-ssmm-6 col-ssm-6 col-md-3"><span class="title">Giá cũ: </span><span class="num">45,000,000</span><span class="currency"> đ</span></div>
                        <div class="saving col-ssmm-6 col-ssm-6 col-md-3"><span class="title">Tiết kiệm:</span><span class="num">2,000,000</span><span class="currency"> đ</span></div>
                    </div>
                    <div class="other-price"><span class="title">Hoặc mua với giá:</span><div class="price"></div></div>
                    <div class="row promotion-wr">
                        <div class="col-ssm-8">
                            <div class="promotion">
                                <h3 class="promo-title">Khuyến mại</h3>
                                <?php the_field('khuyen_mai'); ?>
                            </div>
                        </div>
                        <div class="col-ssmm-12 col-ssm-12 col-md-4 applications">
                            <ul>
                                <li class="directions"><a href="">Chỉ đường đến Zsofa</a></li>
                                <li class="shopping-guide col-ssmm-6 col-ssm-6 col-md-12"><a href="">Hướng dẫn mua hàng</a></li>
                                <li class="delivery col-ssmm-6 col-ssm-6 col-md-12"><a href="">Giao hàng toàn quốc</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row more-actions">
                        <div class="col-ssmm-12 col-ssm-12 col-md-4">
                            <div class="buy-now">
                                <div class="title">Mua ngay</div>
                                <span><em>&#40;</em>Giao hàng tận nơi toàn quốc<em>&#41;</em></span>
                            </div>
                        </div>
                        <div class="col-ssmm-12 col-ssm-12 col-md-4">
                            <div class="buy-online">
                                <div class="title">Mua online</div>
                                <span><em>&#40;</em>Thêm nhiều ưu đãi hấp dẫn<em>&#41;</em></span>
                            </div>
                        </div>
                        <div class="col-ssmm-12 col-ssm-12 col-md-4">
                            <div class="appointment">
                                <div class="title">Hẹn lịch đến xem</div>
                                <div class="title title-mobile">Đặt lịch</div>
                                <span><em>&#40;</em>Để được đón tiếp tận tình hơn<em>&#41;</em></span>
                            </div>
                        </div>
                    </div>
                    <div class="working-hours">Giờ làm việc: 8h00-20h00 (Tất cả các ngày)</div>
                    <div class="store-addresses clearfix">
                        <div class="sub-title">Địa chỉ mua hàng</div>
                        <ul>
                            <li><span>Showroom Q7</span>- 981 Huỳnh Tấn Phát, P. Phú Thuận, Quận 7, TP.HCM</li>
                            <li><span>Showroom GV</span>- 687 Phan Văn Trị P. 7, Q. Gò Vấp, TP.HCM</li>
                            <li><span>Showroom TĐ</span>- 209 Tô Ngọc Vân, P. Linh Đông, Thủ Đức, TP.HCM</li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="best-selling-products slider-product">
        <div class="container">
            <h1>SẢN PHẨM ĐANG BÁN CHẠY NHẤT</h1>
            <div class="row">
                <div id="product-detail-slider" class="flexslider carousel">
                    <ul class="slides">
                        <?php
                        $args = array( 'post_type' => 'product', 'posts_per_page' => 10, 'product_cat' => 'san-pham-ban-chay', 'orderby' => 'rand' );
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                            <li>
                                <div class="feature-product-wrapp">
                                    <div class="product-feature-title"><a href="<?php echo get_permalink( $loop->post->ID ) ?>"><?php the_title(); ?></a></div>
                                    <a class="wrapper-link" href="<?php echo get_permalink( $loop->post->ID ) ?>"><?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'post-thumb'); else echo '<img src="'.woocommerce_placeholder_img_src().'" width="300px" height="210px" />'; ?><span class="feature-price-sale"><?php echo wc_price($product->get_sale_price()); ?></span></a>
                                    <div class="feature-price-real"><?php echo wc_price($product->get_regular_price()); ?></div>
                                    <div class="buy-now clearfix"><a href="<?php echo get_permalink( $loop->post->ID ) ?>">Mua ngay</a></div>

                                </div>
                            </li>
                        <?php endwhile; ?>
                        <?php wp_reset_query(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="product-description">
        <div class="container">
            <div class="row">
                <div class="col-ssmm-12 col-ssm-12 col-md-9">
                    <ul class="tab-links clearfix">
                        <li class="product-info active">Thông tin</li>
                        <li class="product-price">Quy trình bán hàng</li>
                        <li class="reason">Tại sao chọn Zsofa?</li>
                        <li class="promo">Khuyến mại</li>
                        <li class="free-delivery">Miễn phí vận chuyển</li>
                    </ul>
                    <ul class="tab-contents clearfix">
                        <li class="show">
                            <h3 class="mobile-tab-title">Thông tin sản phẩm</h3>
                            <!--begin item info-->
                            <?php echo $product->get_description(); ?>

                            <!--End item-info -->
                        </li>
                        <li class="clearfix">
                            <h3 class="mobile-tab-title">Quy trình bán hàng</h3>
                            <!--Begin user's content-->
                            <?php echo get_field_details('quy_trinh_ban_hang', 'default_value'); ?>

                            <!--End user's content-->

                        </li>
                        <li>
                            <h3 class="mobile-tab-title">Tại sao chọn Zsofa</h3>
                            <!--Begin user's content-->
                            <span style="font-size: 18px;"><span style="font-family: 'Times New Roman';"><span style="color: rgb(255, 0, 0);">12 Lý do vượt trội của sofa ERADO so với các nơi khác khiến hàng nghìn khách hàng chọn mua:</span></span></span><span style="font-family: 'Times New Roman';"><span style="font-size: 17px;"><span style="color: rgb(255, 0, 0);"><br>
</span></span></span>
                            <ul>
                                <li style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: 'Times New Roman';">Mẫu sofa thiết kế theo phong cách châu âu: sang trọng và lịch lãm</span></span></li>
                                <li style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: 'Times New Roman';">Vật liệu hạng sang nhập khẩu bọc sofa được ERADO&nbsp;nghiên cứu và lưạ chọn rất kĩ càng.</span></span></li>
                                <li style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: 'Times New Roman';">Gam mầu thời trang không lỗi mốt, theo kịp với xu hướng nội thất.</span></span></li>
                                <li style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: 'Times New Roman';">Độ thẩm mỹ hoàn hảo, rất nhiều khách hàng đi xem nhiều nơi khác đến chia sẻ lại&nbsp;</span></span></li>
                                <li style="text-align: justify;"><span style="font-family: 'Times New Roman'; font-size: 16px;">Cấu tạo bên trong sofa theo tiêu chuẩn xuất khẩu châu âu</span></li>
                                <li style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: 'Times New Roman';">(Kiểm chứng kết cấu: Có mẫu thực tế để quý khách xem bên trong và bên ngoài)</span></span></li>
                                <li style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: 'Times New Roman';">Cực nhiều sản phẩm sofa bán sẵn ở showroom để cho khách hàng lựa chọn</span></span></li>
                                <li style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: 'Times New Roman';">Thời gian bảo hành sản phẩm sofa ở Erado lên đến 12 năm, lâu nhất trên thị trường</span></span></li>
                                <li style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: 'Times New Roman';">Sofa Erado gia công trong nước đạt chất lượng là hàng Việt Nam Xuất Khẩu</span></span></li>
                                <li style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: 'Times New Roman';">Dòng sản phẩm sofa được nhập khẩu từ những thương hiệu có uy tín và danh tiếng.&nbsp;</span></span></li>
                                <li style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: 'Times New Roman';">Cơ sở vật chất rộng rãi sang trọng, đúng như thương hiệu công khai về cơ sở vật chất</span></span></li>
                                <li style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: 'Times New Roman';">Tính năng chăm sóc sức khoẻ tích hợp trên sofa là giá trị vượt trội hơn các nơi khác ở hai góc độ: các điểm phần ngồi được tính toán theo các đốt trên cột sống người dùng ngả lưng và sofa ERADOđã chạm được các điểm trên cột sống và giảm mệt mỏi cho người dùng.&nbsp;</span>&nbsp;</span></li>
                                <li style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: 'Times New Roman';">Sofa ZSOFA&nbsp;nối tiếp nối thành công của thương hiệu cũ rOsano, được hàng trăm nghìn khách hàng trên toàn quốc tin dùng</span></span><span style="font-size: 16px;"><span style="font-family: 'Times New Roman';"> .</span></span></li>
                            </ul>
                            <div style="text-align: right;">
                                <div style="text-align: left;"><span style="font-size: 10px;"> <br>
<br>
<br>
</span></div>
                                <div style="text-align: center;"><span style="font-size: 10px;"><br>
<br>
</span><span style="font-family: 'Times New Roman'; text-align: start; font-size: 10px;">.........</span><span style="font-family: 'Times New Roman'; font-size: 18px; text-align: start; color: rgb(255, 0, 0);"><strong>NGƯỜI NỔI TIẾNG CHỌN ERADO</strong></span><span style="font-family: 'Times New Roman'; text-align: start; font-size: 10px;">.............</span></div>
                                <div style="text-align: justify;"><span style="font-size: 10px;"> <br>
</span><font style="text-align: start;" face="Times New Roman"><span style="font-size: 18px;">Thương hiệu nội thất&nbsp;</span></font><span style="color: rgb(255, 0, 0);"><span style="font-family: &quot;Times New Roman&quot;; font-size: 16px; text-align: right;">ERADO</span></span><font style="text-align: start;" face="Times New Roman"><span style="font-size: 18px;">&nbsp;được rất nhiều sao việt chọn mua đồ nội thất cho không gian sống, bởi những yếu tố khác biệt về mẫu và giá trị thật của sản phẩm mà họ nhận được (điều này thật dễ hiểu bởi họ đi diễn ở khắp nơi trong và ngoài nước lên có những cách nhìn sâu sắc về thẩm mỹ hay giá trị thực của sản phẩm)</span><br>
                                        <br>
                                        <span style="font-size: 18px;"> Quyết định chọn mua nội thất của sao việt ở thương hiệu Erado.... là đã trải qua rất nhiều sự tham khảo ở các showroom hay cửa hàng nội thất khác và quyết định chọn ở Erado là nơi có niềm tin sáng giá nhất.</span><br>
                                        <br>
                                        <span style="font-size: 18px;"> Cảm kích trước sự lựa chọn và niềm tin được đặt đúng chỗ của người nổi tiếng với thương hiệu nội thất&nbsp;</span></font><span style="font-family: &quot;Times New Roman&quot;; font-size: 16px; text-align: right;">ERADO</span><font style="text-align: start;" face="Times New Roman"><span style="font-size: 18px;">, chủ thương hiệu&nbsp;</span></font><span style="color: rgb(255, 0, 0);"><span style="font-family: &quot;Times New Roman&quot;; font-size: 16px; text-align: right;">ERADO</span><font style="text-align: start;" face="Times New Roman"><span style="font-size: 18px;">:</span></font></span><font style="text-align: start;" face="Times New Roman"><span style="font-size: 18px;">&nbsp;Ông Đỗ Văn Đức đã mời diễn viên: Quang Tèo và Á Hậu Huyền My đại diện hình ảnh cho thương hiệu nội thất&nbsp;</span></font><span style="font-family: &quot;Times New Roman&quot;; font-size: 16px; text-align: right;">ERADO</span><font style="text-align: start;" face="Times New Roman"><span style="font-size: 18px;">. Dưới đây là những khách hàng tiêu biểu được&nbsp;</span></font><span style="font-family: &quot;Times New Roman&quot;; font-size: 16px; text-align: right;">ERADO</span><font style="text-align: start;" face="Times New Roman"><span style="font-size: 18px;">&nbsp;ghi lại hình ảnh:</span><br>
                                    </font><strong style="font-family: 'Times New Roman'; text-align: start;"><font color="#333399"><span style="font-size: 18px;"><br>
<br>
</span></font></strong><strong style="color: rgb(51, 51, 153); font-family: 'Times New Roman'; font-size: 18px;">Giáo sư: Đặng Hữu&nbsp;</strong><strong style="color: rgb(51, 51, 153); font-family: 'Times New Roman'; font-size: 18px;">- Nguyên bộ trưởng bộ khoa học công nghệ và môi trường.<br>
                                        <br>
                                        <img src="http://erado.vn/Images/image/%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20bac-huu/banner%20bo%20sung-05.png" alt="" width="733"><br>
                                        <br>
                                        <br>
                                        <br>
                                    </strong><strong style="font-family: 'Times New Roman'; text-align: start;"><font color="#333399"><span style="font-size: 18px;">Danh Hài: Chiến Thắng</span></font></strong><strong style="color: rgb(51, 51, 153); font-family: 'Times New Roman'; font-size: 18px;"><br>
                                    </strong><font style="text-align: start;" face="Times New Roman"><strong><br>
                                            <img src="http://erado.vn/Images/image/%20!sofada853/Untitled-1-15.jpg" alt="" width="733"><br style="color: rgb(51, 51, 153); font-size: 18px;">
                                        </strong></font><span style="font-family: 'Times New Roman'; text-align: start; font-size: 18px;"><br>
</span><span style="font-family: 'Times New Roman'; font-size: 11px; text-align: start;">...................................................<br>
<br>
<br>
</span><strong style="color: rgb(51, 51, 153); font-family: 'Times New Roman'; text-align: start;"><span style="font-size: 18px;">Hoa Hậu: Kỳ Duyên<br>
<img src="http://erado.vn/Images/image/!24h/anh-trong-web.png" alt="" width="733"><br>
</span></strong><span style="font-family: 'Times New Roman'; text-align: start; font-size: 18px;"><br>
<span style="font-size: 11px;">...................................................</span><br>
</span><span style="font-family: 'Times New Roman'; text-align: start; color: rgb(51, 51, 153);"><strong><span style="font-size: 18px;"><br>
Á Hậu: Huyền My</span></strong></span><span style="font-family: 'Times New Roman'; text-align: start; color: rgb(255, 0, 0);"><span style="font-size: 18px;"><br>
<img src="http://erado.vn/Images/image/%20!sofada853/Huyen-My-3.jpg" alt="" width="733"><br>
</span></span><font style="text-align: start;" face="Times New Roman"><strong><font color="#333399"><span style="font-size: 18px;">  </span></font></strong><span style="font-size: 16px;"><br>
....................................................</span><strong><font color="#333399"><span style="font-size: 18px;"><br>
<br>
Diễn Viên, Đạo Diễn: Bình Trọng&nbsp;</span></font></strong><span style="font-size: 18px; color: rgb(255, 0, 0);"><br>
</span><span style="font-size: 18px;"><img alt="Người nổi tiếng chọn Erado" src="http://erado.vn/Images/image/%20!sofada853/Untitled-1-10%20(1).png" width="733"></span><br>
                                    </font></div>
                                <div style="text-align: left;"><font style="text-align: start;" face="Times New Roman"><span style="color: rgb(255, 0, 0);"><span style="font-size: 18px;"><br>
</span></span></font><span style="text-align: start; font-size: 10px;">..............................................................<br>
</span><font style="text-align: start;" face="Times New Roman"><span style="color: rgb(255, 0, 0);"><span style="font-size: 18px;"><strong><br>
</strong><span style="color: rgb(51, 51, 153);"><strong>Nghệ Sĩ: Quang Tèo</strong></span><br>
<img alt="Người nổi tiếng chọn Erado" src="http://erado.vn/Images/image/%20!sofada853/Untitled-1-11%20(1).png" width="733"><br>
<br>
</span></span></font><span style="text-align: start; font-size: 10px;">..............................................................<br>
<br>
</span><br style="text-align: start; font-size: 10px;">
                                    <font style="text-align: start;" face="Times New Roman"><span style="color: rgb(255, 0, 0);"><span style="font-size: 18px;"><span style="color: rgb(51, 51, 153);"><strong>&nbsp;Diễn Viên Vân Dung:<br>
<img alt="Người nổi tiếng chọn Erado" src="http://erado.vn/Images/image/!dantri/giadinhVanDung.png" width="733"><br>
</strong></span><br>
</span></span></font><strong style="text-align: start; color: rgb(51, 51, 153); font-family: 'Times New Roman'; font-size: 18px;"><br>
                                        Sao Mai Huyền Trang:<br>
                                        <img src="http://erado.vn/Images/image/%20!sofada853/nguoi-noi-tieng-Huyen-Trang.png" alt=""><br>
                                    </strong></div>
                                <div style="text-align: left;">&nbsp;</div>
                                <div style="text-align: left;"><a href="http://erado.vn/lich-su-phat-trien-erado.html"><br>
                                    </a></div>
                                <div style="text-align: right;"><a href="http://erado.vn/lich-su-phat-trien-erado.html"><img style="color: rgb(255, 0, 0);" alt="Lịch sử phát triển Erado" src="http://erado.vn/Images/image/!24h/new_gif.gif" width="63" height="14"><span style="color: rgb(51, 51, 153);">&nbsp;<span style="color: rgb(0, 51, 102);">X<span style="font-size: 16px;"><span style="font-family: 'Times New Roman';">em thêm : Lịch sử phát triển thương hiệu nội thất Erado<br>
</span></span></span></span></a></div>
                            </div>
                            <!--End user's content-->
                        </li>
                        <li>
                            <h3 class="mobile-tab-title">Chương trình khuyến mại</h3>
                            <!--Begin user's content-->
                            <h2>
                                <div style="font-family: Arial; font-size: 12px; font-weight: normal; text-align: justify;">
                                    <p style="text-align: start; margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px;"><span style="color: rgb(51, 51, 51); font-family: &quot;Times New Roman&quot;; font-size: 16px; text-align: justify;">Để chọn mua đồ nội thất cho gia đình với tiêu chí: “bền - đẹp - không lỗi mốt" giữa vô vàn nơi bán, trong khi bạn thực sự không phải là một chuyên gia và không hiểu biết sâu sắc về sản phẩm thì hãy chọn một nơi - một thương hiệu uy tín để mua.</span><br style="color: rgb(51, 51, 51); font-family: &quot;Times New Roman&quot;; font-size: 16px; text-align: justify;">
                                        <br style="color: rgb(51, 51, 51); font-family: &quot;Times New Roman&quot;; font-size: 16px; text-align: justify;">
                                        <span style="color: rgb(51, 51, 51); font-family: &quot;Times New Roman&quot;; font-size: 16px; text-align: justify;">Một trong những địa chỉ danh tiếng&nbsp;và tín được người tiêu dùng nhắc đến khi chọn mua các sản phẩm nội thất cho căn hộ chung cư và gia đình&nbsp;tại Hà Nội là thương hiệu ERADO, thương hiệu này phát triển nối tiếp giá trị thành công của thương hiệu cũ rOsano được hàng triệu khách hàng trên toàn quốc tin dùng.</span><span style="color: rgb(51, 51, 51); font-family: &quot;Times New Roman&quot;; font-size: 16px; text-align: justify;"><br>
<br>
</span></p>
                                </div>
                            </h2>
                            <h2 style="padding: 10px 0px 5px; margin: 0px; font-size: 12px; color: rgb(51, 51, 51); font-family: Arial; text-align: center;"><span style="color: rgb(0, 0, 128);"><span style="font-size: 23px;"><span style="font-family: &quot;Times New Roman&quot;;">"</span></span></span><span style="font-size: 23px;"><span style="font-family: &quot;Times New Roman&quot;;"><span style="color: rgb(255, 0, 0);">&nbsp;VUI MUA SẮM NHẬN ƯU ĐÃI HẤP DẪN</span>&nbsp;<span style="color: rgb(0, 0, 128);">"</span></span></span></h2>
                            <h2>
                                <div style="font-family: Arial; font-size: 12px; font-weight: normal; text-align: justify;"><span style="font-family: Arial, Verdana, sans-serif; text-align: start; font-size: 16px;"><strong><span style="font-size: 18px;"><span style="color: rgb(51, 51, 153);"><span style="font-family: &quot;Times New Roman&quot;;">1. Mua sofa Giảm TRỰC TIẾP vào hóa đơn mua hàng từ <span style="color: rgb(255, 0, 0);">1.600.000đ</span> đến <span style="color: rgb(255, 0, 0);">2.000.000đ<br>
<br>
</span></span></span></span></strong></span><span style="color: rgb(51, 51, 51); font-family: &quot;Times New Roman&quot;; font-size: 16px;">&nbsp; &nbsp;Ưu đãi được áp dụng khi Quý khách MUA SẴN hoặc ĐẶT HÀNG các sản phẩm Ghế sofa góc (chất liệu da hoặc vải) và Ghế sofa Văng bộ từ 2 văng trở lên. <br>
<br>
&nbsp; &nbsp;Quý khách được giảm trừ trực tiếp <strong><span style="color: rgb(255, 0, 0);">1.600.000đ</span></strong> khi mua sofa Vải hoặc sofa Giả da - Giảm ngay <span style="color: rgb(255, 0, 0);"><strong>2.000.000đ</strong></span> khi mua Sofa da thật (Lưu ý: Không áp dụng kèm ưu đãi giảm giá nào khác)<br>
</span><span style="font-family: Arial, Verdana, sans-serif; text-align: start; font-size: 16px;"><strong><span style="font-size: 18px;"><span style="color: rgb(51, 51, 153);"><span style="font-family: &quot;Times New Roman&quot;;"><br>
2. Được giảm ngay&nbsp;<span style="color: rgb(255, 0, 0);">1.800.000đ&nbsp;</span>khi mua bàn trà – kệ tivi&nbsp;</span></span></span></strong><br>
</span>
                                    <p style="font-family: Arial, Verdana, sans-serif;">&nbsp;<span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">Sản phẩm bàn trà – kệ tivi mang nhiều phong cách khác nhau, dù sở hữu mặt đá marble sang trọng hay mặt kính temper cao cấp và bền bỉ… cũng đều là những lựa chọn tuyệt vời cho nội thất phòng khách. Tuyệt vời hơn khi ERADO dành tặng khách hàng&nbsp;<strong><span style="color: rgb(255, 0, 0);">1.800.000đ</span></strong>&nbsp;cho set bàn trà - kệ tivi với những mẫu mới nhất.</span></span></p>
                                    <p style="font-family: Arial, Verdana, sans-serif; text-align: start;"><span style="color: rgb(51, 51, 153);"><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">&nbsp;</span></span><strong><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">3.</span></span><span style="font-size: 18px;"><span style="font-family: &quot;Times New Roman&quot;;">&nbsp;Giảm thêm</span></span></strong></span><strong><span style="color: rgb(51, 51, 153);"><span style="font-size: 18px;"><span style="font-family: &quot;Times New Roman&quot;;">&nbsp;<span style="color: rgb(255, 0, 0);">2.000.000đ&nbsp;</span>cho mỗi bộ bàn ghế ăn</span></span></span></strong></p>
                                    <div style="font-family: Arial, Verdana, sans-serif;"><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">Bàn ghế ăn thế hệ mới với sơn men 4k - điều chỉnh kích thước linh hoạt theo mong muốn, mặt kính temper chịu va đập mạnh và chịu nhiệt độ cao, tích hợp&nbsp;<a href="http://erado.vn/ban-ghe-an/ban-an-tich-hop-bep-tu-ma-l113b.html">bếp từ</a>&nbsp;tiện dụng… Quý khách sẽ được nhận ngay&nbsp;<span style="color: rgb(255, 0, 0);"><strong>2.000.000đ</strong></span>&nbsp;cho mỗi bộ bàn ghế ăn cao cấp đến từ thương hiệu ERADO danh tiếng</span></span></div>
                                    <div style="font-family: Arial, Verdana, sans-serif; text-align: start;"><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">&nbsp;</span></span><br>
                                        <span style="color: rgb(51, 51, 153);"><span style="font-size: 18px;"><strong><span style="font-family: &quot;Times New Roman&quot;;">4. Giảm trực tiếp&nbsp;<span style="color: rgb(255, 0, 0);">500.000đ</span>/tấm khi mua thảm trang trí</span></strong></span></span></div>
                                    <div style="font-family: Arial, Verdana, sans-serif; text-align: start;"><br>
                                        <img src="http://erado.vn/Images/image/aaaaaamuanoithatsangtrungvangtailoceradovn/Untitled-1-03.jpg" width="750" alt="Đặc Quyền Ưu Đãi Cho Cư Dân Goldmark Khi Mua Nội Thất ERADO"></div>
                                    <div style="font-family: Arial, Verdana, sans-serif;"><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;"><br>
</span></span><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">Thảm trang trí phòng khách, phòng ngủ được nhập khẩu chính hãng từ Dubai, Thổ nhĩ kì, Bỉ. Tất cả có CO &amp; CQ chứng thực hàng hoá nhập khẩu và chất lượng sản phẩm từ phía nhà sản xuất.<br>
<br type="_moz">
</span></span></div>
                                    <div style="font-family: Arial, Verdana, sans-serif; text-align: start;"><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">&nbsp;</span></span><strong><span style="color: rgb(51, 51, 153);"><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">5</span></span><span style="font-size: 18px;"><span style="font-family: &quot;Times New Roman&quot;;">.&nbsp;Giảm</span></span></span></strong><span style="color: rgb(51, 51, 153);"><span style="font-size: 18px;"><strong><span style="font-family: &quot;Times New Roman&quot;;"> trừ&nbsp;<span style="color: rgb(255, 0, 0);">5%</span>&nbsp;tổng hóa đơn cho đơn hàng Giấy dán tường<br>
<br type="_moz">
</span></strong></span></span></div>
                                    <div style="font-family: Arial, Verdana, sans-serif; text-align: start;"><img src="http://erado.vn/Images/image/aaaaaamuanoithatsangtrungvangtailoceradovn/Untitled-1-05.jpg" width="750" alt="Đặc Quyền Ưu Đãi Cho Cư Dân Goldmark Khi Mua Nội Thất ERADO"><br>
                                        &nbsp;<br>
                                        <span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">Hơn 10.000 mẫu giấy dán tường với hoa văn phong phú luôn có sẵn hàng, thợ thi công chuyên nghiệp vô cùng nhanh chóng, gọn gàng, không bị bong rộp…</span></span></div>
                                </div>
                            </h2>
                            <h2>
                                <div style="font-family: Arial; font-size: 12px; font-weight: normal; text-align: justify;">&nbsp;</div>
                            </h2>
                            <!--End user's content-->
                        </li>
                        <li>
                            <h3 class="mobile-tab-title">Miễn phí vận chuyển</h3>
                            <!--Begin user's content-->
                            &nbsp;<br>
                            <strong style="text-align: justify;"><span style="font-size: 16px;"><span style="color: rgb(255, 0, 0); font-family: &quot;Times New Roman&quot;;">CHÍNH SÁCH VẬN CHUYỂN&nbsp;<span style="color: rgb(0, 0, 128);">"</span>MIỄN PHÍ</span><span style="font-family: &quot;Times New Roman&quot;;"><font color="#000080">" </font><font color="#ff0000">TỚI NHÀ KHÁCH HÀNG:</font></span></span></strong>
                            <div style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;"><br>
</span></span></div>
                            <div style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">Nhằm đem lại sự tiện ích cho khách hàng ở xa mong muốn mua nội thất tại thương hiệu ERADO,&nbsp;</span></span><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">chúng tôi áp dụng chính sách "miễn phí vận chuyển" đối với các thành phố sau:<br>
<br>
<br>
</span></span><span style="color: rgb(255, 0, 0);"><span style="font-size: 17px;"><span style="font-family: &quot;Times New Roman&quot;;">►</span></span></span><span style="color: rgb(0, 0, 128);"><span style="font-size: 17px;"><span style="font-family: &quot;Times New Roman&quot;;">&nbsp;</span><span style="font-family: &quot;Times New Roman&quot;;">Hà Nội - Hồ Chí Minh - Đà Nẵng.<br>
<br>
</span><span style="color: rgb(255, 0, 0);"><span style="font-family: &quot;Times New Roman&quot;;">►</span></span><span style="font-family: &quot;Times New Roman&quot;;">&nbsp;</span><span style="font-family: &quot;Times New Roman&quot;;">Hải Phòng - Hưng Yên - Quảng Ninh - Hải Dương - Hoà Bình - Bắc Ninh - Bắc Giang - Vĩnh Phúc - Thái Bình - Ninh Bình - Nam Định - Hoà Bình - Thái Nguyên - Việt Trì (Phú Thọ)<br>
<br>
</span><span style="color: rgb(255, 0, 0);"><span style="font-family: &quot;Times New Roman&quot;;">►</span></span><span style="font-family: &quot;Times New Roman&quot;;">&nbsp;</span><span style="font-family: &quot;Times New Roman&quot;;">Thanh Hoá - &nbsp;Nghệ An - Hà Tĩnh - Vinh.</span></span></span><span style="font-family: &quot;Times New Roman&quot;; font-size: 16px;"><br>
</span><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;"><br>
<img src="http://erado.vn/Images/image/%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20ba015/Untitled-3-01.jpg" alt="" width="750"><br>
</span></span></div>
                            <div style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;"><br>
</span></span></div>
                            <div style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">B. Thời gian giao hàng tại tỉnh, thành phố:</span></span></div>
                            <ul>
                                <li><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">Thời gian các tỉnh lân cận Hà Nội: Giao ngay, sau thời gian đặt hàng là: 24h hoặc 48h<br>
    </span></span></li>
                                <li><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">Thời gian các thành phố: Hồ Chí Minh - Đà Nẵng - Vinh - Nghệ An - Hà Tĩnh, thời gian từ&nbsp;<span style="color: rgb(255, 0, 0);">3</span>&nbsp;đến&nbsp;<span style="color: rgb(255, 0, 0);">5</span>&nbsp;ngày .</span></span></li>
                            </ul>
                            <ul>
                                <li>
                                    <p><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">Thời gian phụ thuộc vào phí của hãng vận chuyển đối với từng địa phương. Chúng tôi sẽ trao đổi trực tiếp với quý khách khi nhận được thông tin đặt hàng.</span></span></p>
                                </li>
                            </ul>
                            <div style="text-align: justify;"><span style="color: rgb(255, 0, 0);"><u><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">Lưu ý</span></span></u></span><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">: Tuy nhiên vào thời điểm lễ, tết... hoặc tùy theo một số điều kiện khách quan như thiên tai, hỏng hóc phương tiện... chúng tôi không thể giao hàng ngay nên sẽ thỏa thuận thời gian giao hàng cụ thể cho khách hàng khi mua hàng. <br>
</span></span></div>
                            <div style="text-align: justify;"><span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">&nbsp;</span></span></div>
                            <!--End user's content-->
                        </li>
                    </ul>
                    <a href="" class="bottom-small-banner"><img class="img-resonsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/176.jpg" alt=""></a>
                    <div class="facebook-sharing">
                        <a class="fb-share-bt" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u=http://erado.vn/sofa-da-that/sofa-da-that-ma-369.html&amp;p[images][0]=http://erado.vn//images/pro/sofa-da-that-ma-369_2033.jpg" target="socialbookmark"></a>
                        <div style="margin-left:10px;" class="fb-like" data-send="false" data-layout="box_count" data-width="60" data-show-faces="false"></div>
                        <div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 50px; height: 24px;"><iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 50px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 24px;" tabindex="0" vspace="0" width="100%" id="I0_1529336553436" name="I0_1529336553436" src="https://apis.google.com/se/0/_/+1/fastbutton?usegapi=1&amp;size=tall&amp;hl=vi&amp;origin=http%3A%2F%2Ferado.vn&amp;url=http%3A%2F%2Ferado.vn%2Fsofa-da-that%2Fsofa-da-that-ma-369.html&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en_US.f5JujS1eFMY.O%2Fm%3D__features__%2Fam%3DQQE%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCNDI1_ftdVIpg6jNiygedEKTreQ2A#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1529336553436&amp;_gfid=I0_1529336553436&amp;parent=http%3A%2F%2Ferado.vn&amp;pfname=&amp;rpctoken=39995014" data-gapiattached="true" title="G+"></iframe></div>
                    </div>
                    <div class="fb-comments" data-href="http://erado.vn/sofa-da-that/sofa-da-that-ma-369.html" data-width="100%" data-numposts="5"></div>
                </div>
                <!--End left column-->
                <div class="col-ssmm-12 col-ssm-12 col-md-3">
                    <div class="schedule">
                        <h3>Đặt lịch đến nhà tư vấn</h3>
                        <span>(Mang mẫu đến nhà đo, thiết kế miễn phí.)</span>
                        <form action="">
                            <input class="phone" type="text" placeholder="Nhập số điện thoại">
                            <input class="submit" type="submit" value="Gửi">
                        </form>
                    </div>
                    <div class="new-products">
                        <h3>Sản phẩm mới ra mắt</h3>
                        <div class="new-products-wrapper">
                            <div class="new-product-item">
                                <a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-an-8-ghe-ma-t1723-8270.jpg" alt=""></a>
                                <a class="product-name" href="">Bàn ăn 8 ghế mã T1723</a>
                                <div class="product-price"><span>Giá: </span><span class="num">35,000,000</span><span class="currency">đ</span></div>
                                <div class="sale-price"><span>Giá KM: </span><span class="num">33,000,000</span><span class="currency"> đ</span></div>
                                <a href="" class="buy-now">Mua ngay</a>
                            </div>
                            <div class="new-product-item">
                                <a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-an-8-ghe-ma-t1723-8270.jpg" alt=""></a>
                                <a class="product-name" href="">Bàn ăn 8 ghế mã T1723</a>
                                <div class="product-price"><span>Giá: </span><span class="num">35,000,000</span><span class="currency">đ</span></div>
                                <div class="sale-price"><span>Giá KM: </span><span class="num">33,000,000</span><span class="currency"> đ</span></div>
                                <a href="" class="buy-now">Mua ngay</a>
                            </div>
                            <div class="new-product-item">
                                <a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-an-8-ghe-ma-t1723-8270.jpg" alt=""></a>
                                <a class="product-name" href="">Bàn ăn 8 ghế mã T1723</a>
                                <div class="product-price"><span>Giá: </span><span class="num">35,000,000</span><span class="currency">đ</span></div>
                                <div class="sale-price"><span>Giá KM: </span><span class="num">33,000,000</span><span class="currency"> đ</span></div>
                                <a href="" class="buy-now">Mua ngay</a>
                            </div>
                        </div>


                    </div>
                    <div class="feedback">
                        <a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/173.jpg" alt=""></a>
                    </div>
                    <div class="online-support">
                        <h2 class="online-support-title">Hỗ trợ trực tuyến</h2>
                        <ul>
                            <li class="light">
                                <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/62.png" alt="">
                                <span>Hà Quỳnh</span><strong>0905.356.356</strong>
                            </li>
                            <li class="grey">
                                <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/72.png" alt="">
                                <span>Mai Hoa</span>
                                <strong>0905.356.356</strong>
                            </li>
                            <li class="light">
                                <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/100.png" alt="">
                                <span>Thu Hằng</span><strong>0905.356.356</strong>
                            </li>
                            <li class="grey">
                                <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/101.png" alt="">
                                <span>Nguyễn Long</span><strong>0905.356.356</strong>
                            </li>
                            <li class="light">
                                <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/83.png" alt="">
                                <span>Mạnh Hoàng</span><strong>0905.356.356</strong>
                            </li>
                            <li class="grey">
                                <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/102.png" alt="">
                                <span>Phạm Cường</span><strong>0905.356.356</strong>
                            </li>
                            <li class="light">
                                <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/94.png" alt="">
                                <span>Bích Ngọc</span><strong>0905.356.356</strong>
                            </li>
                            <li class="grey">
                                <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/95.png" alt="">
                                <span>Hoàng Ngân</span><strong>0905.356.356</strong>
                            </li>
                            <li class="light">
                                <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/103.png" alt="">
                                <span>Nguyễn Vân</span><strong>0905.356.356</strong>
                            </li>
                        </ul>
                    </div>
                    <div class="customer-purchased">
                        <h2>Khách hàng đã mua</h2>
                        <div class="customers-news">
                            <a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-giao-noi-that-cho-anh-long-o-flc-thanh-hoa.jpg" alt=""></a>
                            <a class="view-more" href="">Bàn giao nội thất cho anh Long ở FLC Thanh Hóa</a>
                        </div>

                    </div>
                    <div class="ext-banner">
                        <a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/174.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="similar-products featured-category">
        <div class="container">
            <h1>Sản phẩm cùng loại</h1>
            <div class="row list-products">
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6">
                    <div class="product-wrapper">
                        <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                    </div>
                    <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                    <div class="product-price">
                        <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                    </div>
                </div>
            </div>
            <ul class="pagination float-right">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a class="next" href="#">Tiếp</a></li>
                <li><a class="previous" href="#">Cuối</a></li>
            </ul>
        </div>
    </div>

    <div class="section5 promotions-reviews clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-7 promotion-products">
                    <h3 class="promotion-title">SẢN PHẨM <strong>KHUYẾN MÃI</strong></h3>
                    <div class="row">
                        <div class="col-md-6 col-ssmm-6 col-ssm-6 feature-product-wrapp">
                            <div class="product-feature-title"><a href="">Ghế thư giãn Ceri mã 05</a></div>
                            <a class="wrapper-link" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-phong-khach-ma-242-2261.jpg" alt=""><span class="feature-price-sale">21.900</span></a>
                            <div class="feature-price-real">25,000,000 <span class="currency">đ</span></div>

                        </div>
                        <div class="col-md-6 col-ssmm-6 col-ssm-6 feature-product-wrapp">
                            <div class="product-feature-title"><a href="">Sofa da thật mã 352</a></div>
                            <a class="wrapper-link" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-phong-khach-ma-242-2261.jpg" alt=""><span class="feature-price-sale">21.900</span></a>
                            <div class="feature-price-real">25,000,000 <span class="currency">đ</span></div>

                        </div>
                        <div class="col-md-6 col-ssmm-6 col-ssm-6 feature-product-wrapp">
                            <div class="product-feature-title"><a href="">Sofa phòng khách mã 242</a></div>
                            <a class="wrapper-link" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-phong-khach-ma-242-2261.jpg" alt=""><span class="feature-price-sale">21.900</span></a>
                            <div class="feature-price-real">25,000,000 <span class="currency">đ</span></div>

                        </div>
                        <div class="col-md-6 col-ssmm-6 col-ssm-6 feature-product-wrapp">
                            <div class="product-feature-title"><a href="">Sofa đẹp mã 564</a></div>
                            <a class="wrapper-link" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-phong-khach-ma-242-2261.jpg" alt=""><span class="feature-price-sale">21.900</span></a>
                            <div class="feature-price-real">25,000,000 <span class="currency">đ</span></div>

                        </div>
                    </div>

                </div>
                <div class="col-md-5 customer-reviews">
                    <div class="reviews-wrapper">
                        <h3 class="reviews-title">
                            KHÁCH HÀNG <strong>NÓI VỀ ERADO</strong>
                        </h3>
                        <div class="cus-review-slide">
                            <div class="customer-reviews-slider flexslider">
                                <ul class="slides">
                                    <li>
                                        <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/2018-06-10_19-59-25.png" />
                                    </li>
                                    <li>
                                        <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/2018-06-10_19-59-25.png" />
                                    </li>
                                    <li>
                                        <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/2018-06-10_19-59-25.png" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="section3 real-videos">
        <div class="container">
            <h1>Sản phẩm <strong>video thực tế</strong></h1>
            <div class="row videos-content">
                <div class="col-md-6">
                    <div class="videos-main-product">
                        <a class="img-wrapper" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-an-8-ghe-ma-t1723_8270.jpg" alt=""></a>
                        <a href="" class="view-more">Xem video</a>
                        <div class="video-product-title"><a href="">Bàn ăn 8 ghế mã T1723</a></div>
                        <div class="video-product-price">33,000,000 <span class="currency">vnđ</span></div>
                        <div class="views">5 lượt xem</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 col-ssmm-6 col-ssm-6">
                            <div class="videos-sub-product">
                                <a class="img-wrapper" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-an-8-ghe-ma-t1723_8270.jpg" alt=""></a>
                                <a href="" class="view-more">Xem video</a>
                                <div class="video-product-title"><a href="">Bàn ăn 8 ghế mã T1723</a></div>
                                <div class="video-product-price">33,000,000 <span class="currency">vnđ</span></div>
                                <div class="views">5 lượt xem</div>
                            </div>
                        </div>
                        <div class="col-md-6 col-ssmm-6 col-ssm-6">
                            <div class="videos-sub-product">
                                <a class="img-wrapper" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-an-8-ghe-ma-t1723_8270.jpg" alt=""></a>
                                <a href="" class="view-more">Xem video</a>
                                <div class="video-product-title"><a href="">Bàn ăn 8 ghế mã T1723</a></div>
                                <div class="video-product-price">33,000,000 <span class="currency">vnđ</span></div>
                                <div class="views">5 lượt xem</div>
                            </div>
                        </div>
                        <div class="col-md-6 col-ssmm-6 col-ssm-6">
                            <div class="videos-sub-product">
                                <a class="img-wrapper" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-an-8-ghe-ma-t1723_8270.jpg" alt=""></a>
                                <a href="" class="view-more">Xem video</a>
                                <div class="video-product-title"><a href="">Bàn ăn 8 ghế mã T1723</a></div>
                                <div class="video-product-price">33,000,000 <span class="currency">vnđ</span></div>
                                <div class="views">5 lượt xem</div>
                            </div>
                        </div>
                        <div class="col-md-6 col-ssmm-6 col-ssm-6">
                            <div class="videos-sub-product">
                                <a class="img-wrapper" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-an-8-ghe-ma-t1723_8270.jpg" alt=""></a>
                                <a href="" class="view-more">Xem video</a>
                                <div class="video-product-title"><a href="">Bàn ăn 8 ghế mã T1723</a></div>
                                <div class="video-product-price">33,000,000 <span class="currency">vnđ</span></div>
                                <div class="views">5 lượt xem</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-2 store-services clearfix">
        <div class="container">
            <div class="title-customer">
                "Nghệ sỹ Quang Tèo và Á hậu Huyền My"
            </div>
            <h2 class="why-choose-us">CÙNG HÀNG NGHÌN KHÁCH HÀNG <strong>ĐÃ CHỌN ERADO</strong> BỞI :</h2>
            <div class="store-services-content row">
                <div class="col-md-3 phy-facilities">
                    <h3>Cơ sở vật chất sang trọng</h3>
                    <p class="item-desc">
                        Showroom rộng lớn, thiết kế hiện đại sang trọng theo tiêu chuẩn 3S, phục vụ tốt nhất cho khách hàng
                    </p>
                </div>
                <div class="col-md-3 exquisite-product">
                    <h3>Sản phẩm tinh xảo</h3>
                    <p class="item-desc">
                        Mẫu sản phẩm được thiết kế hoàn mỹ, sắc nét vượt trội, vật liệu hạng sang, nguồn gốc rõ ràng!
                    </p>
                </div>
                <div class="col-md-3 professional-human">
                    <h3>Nhân lực chuyên nghiệp</h3>
                    <p class="item-desc">
                        Nhân sự Erado được đào tạo chuẩn quốc tế, quy trình lắp đặt được thực hiện an toàn chuyên nghiệp
                    </p>
                </div>
                <div class="col-md-3 product-warranty">
                    <h3>Bảo hành sản phẩm</h3>
                    <p class="item-desc">
                        Dịch vụ bảo hành tận nơi. Cam kết chế độ bảo hành chu đáo, tận tâm, linh hoạt. Ghét chậm trễ
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="section7 product-categories">
        <div class="container">
            <h2 class="product-cate-title">
                Danh mục <strong>sản phẩm</strong>
            </h2>
            <div class="row product-cate-wrapper">
                <div class="col-md-2">
                    <h3 class="cate-subtitle">Ghế sofa</h3>
                    <ul>
                        <li><a href="">Sofa da</a></li>
                        <li><a href="">Sofa góc</a></li>
                        <li><a href="">Sofa đẹp</a></li>
                        <li><a href="">Sofa phòng khách</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h3 class="cate-subtitle">Nội thất</h3>
                    <ul>
                        <li><a href="">Sofa da</a></li>
                        <li><a href="">Sofa góc</a></li>
                        <li><a href="">Sofa đẹp</a></li>
                        <li><a href="">Sofa phòng khách</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h3 class="cate-subtitle">Hàng Trang Trí</h3>
                    <ul>
                        <li><a href="">Sofa da</a></li>
                        <li><a href="">Sofa góc</a></li>
                        <li><a href="">Sofa đẹp</a></li>
                        <li><a href="">Sofa phòng khách</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h3 class="cate-subtitle">Thảm trải sàn</h3>
                    <ul>
                        <li><a href="">Sofa da</a></li>
                        <li><a href="">Sofa góc</a></li>
                        <li><a href="">Sofa đẹp</a></li>
                        <li><a href="">Sofa phòng khách</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="viewed-products clearfix">
        <div class="container">
            <div class="row">
                <div class="col-ssm-3">
                    <h3>Sản phẩm <strong>đã xem</strong></h3>
                    <div class="view-more">
                        Bạn có thể xem thêm tất cả các sản phẩm cũng như các dịch vụ khác <a href="">tại đây</a>
                    </div>
                </div>
                <div class="col-ssm-9">
                    <div id="viewed-product-slider" class="flexslider">
                        <ul class="slides">
                            <li>
                                <div class="item-wrapper">
                                    <a class="product-image" href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-that-ma-369-2033.jpg" alt="" class="img-responsive"></a>
                                    <div class="item-name"><a href="">Sofa da thật mã 369</a></div>
                                    <div class="item-price">
                                        <span class="price-title">Giá: </span><span class="value">43,000,000 </span><span class="currency">VNĐ</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-wrapper">
                                    <a class="product-image" href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-that-ma-369-2033.jpg" alt="" class="img-responsive"></a>
                                    <div class="item-name"><a href="">Sofa da thật mã 369</a></div>
                                    <div class="item-price">
                                        <span class="price-title">Giá: </span><span class="value">43,000,000 </span><span class="currency">VNĐ</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-wrapper">
                                    <a class="product-image" href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-that-ma-369-2033.jpg" alt="" class="img-responsive"></a>
                                    <div class="item-name"><a href="">Sofa da thật mã 369</a></div>
                                    <div class="item-price">
                                        <span class="price-title">Giá: </span><span class="value">43,000,000 </span><span class="currency">VNĐ</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-wrapper">
                                    <a class="product-image" href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-that-ma-369-2033.jpg" alt="" class="img-responsive"></a>
                                    <div class="item-name"><a href="">Sofa da thật mã 369</a></div>
                                    <div class="item-price">
                                        <span class="price-title">Giá: </span><span class="value">43,000,000 </span><span class="currency">VNĐ</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-wrapper">
                                    <a class="product-image" href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-that-ma-369-2033.jpg" alt="" class="img-responsive"></a>
                                    <div class="item-name"><a href="">Sofa da thật mã 369</a></div>
                                    <div class="item-price">
                                        <span class="price-title">Giá: </span><span class="value">43,000,000 </span><span class="currency">VNĐ</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section9 newsletter clearfix">
        <div class="mobile-newsletter">
            <form action="" class="newsletter-form">
                <img src="" alt="" class="img-responsive">
                <input type="email" placeholder="Nhập địa chỉ email của bạn">
                <input class="mobile-submit" type="submit" value="Đăng ký">
            </form>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <form action="" class="newsletter-form">
                        <img src="" alt="" class="img-responsive">
                        <input type="email" placeholder="Nhập địa chỉ email của bạn vào đây">
                        <input class="desktop-submit" type="submit" value="Đăng ký">
                    </form>

                </div>
                <div class="col-md-7">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/169.jpg" alt="" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();