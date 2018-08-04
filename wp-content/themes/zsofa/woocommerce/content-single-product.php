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
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;
$columns = apply_filters('woocommerce_product_thumbnails_columns', 4);
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes = apply_filters('woocommerce_single_product_image_gallery_classes', array(
    'woocommerce-product-gallery',
    'woocommerce-product-gallery--' . (has_post_thumbnail() ? 'with-images' : 'without-images'),
    'woocommerce-product-gallery--columns-' . absint($columns),
    'images',
));
$dimensions = wc_format_dimensions($product->get_dimensions(false));
$sale_price = $product->get_sale_price();
$regular_price = $product->get_regular_price();
$saving_price = $regular_price - $sale_price;

?>
    <div class="order-online">
        <div class="order-close-bt">&nbsp;</div>
        <div class="order-main-cont">
            <div class="row">
                <div class="col-ssm-5">
                    <div class="product-image-wp">
                        <?php
                        if ( has_post_thumbnail() ) {
                            $html  = wc_get_gallery_image_html( $post_thumbnail_id, true );
                        } else {
                            $html  = '<div class="woocommerce-product-gallery__image--placeholder">';
                            $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
                            $html .= '</div>';
                        }

                        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );
                        ?>
                    </div>
                    <div class="product-name"><?php the_title('<h1 class="product_title entry-title">', '</h1>'); ?></div>
                    <div class="product-size"><span>Kích thước: </span><?php if ($product->has_dimensions()) {
                            echo $dimensions;
                        } else {
                            echo 'Liên hệ ( kích thước tùy chọn )';
                        }
                        ?></div>
                    <div class="col-ssmm-12 col-ssm-12 col-md-4">
                        <div class="product-warranty">
                            <span>Bảo hành: </span><?php echo get_field_details('bao_hanh'); ?></div>
                    </div>
                    <div class="col-ssmm-12 col-ssm-12 col-md-5">
                        <div class="product-status">
                            <span>Tình trạng: </span><?php echo ($product->is_in_stock()) ? 'Còn hàng' : 'Hết hàng' ?>
                        </div>
                    </div>
                    <div class="price-wrapper clearfix">
                        <div class="price col-ssmm-12 col-ssm-12 col-md-6"><span class="title">Giá bán: </span>
                            <span class="num">
                                <?php
                                $product_price = (!empty($sale_price))? $sale_price : $regular_price;
                                echo  wc_price($product_price);
                                ?>
                            </span>
                        </div>
                        <?php if(!empty($sale_price)):   ?>
                            <div class="old-price col-ssmm-6 col-ssm-6 col-md-6"><span class="title">Giá cũ: </span><span
                                        class="num"><?php echo wc_price($regular_price); ?></span></div>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($product_price)):?>
                    <div class="other-price"><span class="title">Hoặc mua trả góp với giá từ: <?php echo wc_price(round($product_price/12,-3));?> / tháng bằng thẻ tín dụng</span>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="col-ssm-7">
                    <div class="user-contact-form">
                        <h2>ĐẶT ONLINE NGHE TƯ VẤN MIỄN PHÍ</h2>
                        <?php echo do_shortcode('[contact-form-7 id="14209" title="Order online"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <div class="col-ssmm-12 col-ssm-12 col-md-7"><strong>Zsofa</strong> tiếp nối thành công của
                            thương hiệu <strong>rOsano</strong></div>
                        <div class="col-ssmm-5 col-ssm-5 col-md-5">
                            ĐẾN ĐÚNG NƠI - MUA ĐÚNG CHỖ
                        </div>
                    </div>
                    <div class="product-main-img <?php echo esc_attr(implode(' ', array_map('sanitize_html_class', $wrapper_classes))); ?>"
                         data-columns="<?php echo esc_attr($columns); ?>"
                         style="opacity: 0; transition: opacity .25s ease-in-out;">
                        <figure class="woocommerce-product-gallery__wrapper">
                            <?php
                            if (has_post_thumbnail()) {
//                                $html  = wc_get_gallery_image_html( $post_thumbnail_id, true );
                                echo get_the_post_thumbnail($page->ID, 'post-thumb-wide');
                            } else {
                                $html = '<div class="woocommerce-product-gallery__image--placeholder">';
                                $html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src()), esc_html__('Awaiting product image', 'woocommerce'));
                                $html .= '</div>';
                            }

                            echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id);

                            //                            do_action( 'woocommerce_product_thumbnails' );
                            ?>
                        </figure>
                    </div>
                    <div class="customers-purchase">
                        <h3>Khách hàng <span>đã mua</span></h3>
                        <ul>
                            <li><span class="name">Anh. Minh</span><span class="address"> - (09xxxx0291) đã mua 2 tháng trước (10/07/2015)</span>
                            </li>
                            <li><span class="name">Anh. Hoài</span><span class="address"> - tại Start city đã mua 2 ngày trước</span>
                            </li>
                            <li><span class="name">Chú. Lưu</span><span class="address"> - (09xxxx2656) đã mua 2 Tháng trước</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-ssmm-12 col-ssm-12 col-md-7 col-right">
                    <div class="ribbon-wrapper">
                        <div class="col-ssmm-12 col-ssm-12 col-md-7"><strong>zSOFA.vn</strong> đã đăng kí thương hiệu độc quyền tại <strong>VN</strong></div>
                        <div class="col-ssmm-5 col-ssm-5 col-md-5">
                            ĐẾN ĐÚNG NƠI - MUA ĐÚNG CHỖ
                        </div>
                    </div>
                    <div class="product-name"><?php the_title('<h1 class="product_title entry-title">', '</h1>'); ?></div>
                    <div class="product-size"><span>Kích thước: </span><?php if ($product->has_dimensions()) {
                            echo $dimensions;
                        } else {
                            echo 'Liên hệ ( kích thước tùy chọn )';
                        }
                        ?></div>
                    <div class="col-ssmm-12 col-ssm-12 col-md-3">
                        <div class="product-warranty">
                            <span>Bảo hành: </span><?php echo get_field_details('bao_hanh'); ?></div>
                    </div>
                    <div class="col-ssmm-12 col-ssm-12 col-md-5">
                        <div class="product-status">
                            <span>Tình trạng: </span><?php echo ($product->is_in_stock()) ? 'Còn hàng' : 'Hết hàng' ?>
                        </div>
                    </div>
                    <div class="price-wrapper clearfix">
                        <div class="price col-ssmm-12 col-ssm-12 col-md-5"><span class="title">Giá bán: </span>
                            <span class="num">
                                <?php
                                $product_price = (!empty($sale_price))? $sale_price : $regular_price;
                                echo  wc_price($product_price);
                                ?>
                            </span>
                        </div>
                        <?php if(!empty($sale_price)):   ?>
                        <div class="old-price col-ssmm-6 col-ssm-6 col-md-3"><span class="title">Giá cũ: </span><span
                                    class="num"><?php echo wc_price($regular_price); ?></span></div>
                        <div class="saving col-ssmm-6 col-ssm-6 col-md-3"><span class="title">Tiết kiệm:</span><span
                                    class="num"><?php echo wc_price($saving_price); ?></span></div>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($product_price)):?>
                    <div class="other-price"><span class="title">Hoặc mua trả góp với giá từ: <?php echo wc_price(round($product_price/12,-3));?> / tháng bằng thẻ tín dụng</span>
                    <?php endif; ?>
                    </div>
                    <div class="row promotion-wr">
                        <div class="col-ssm-8">
                            <div class="promotion">
                                <h3 class="promo-title">Khuyến mại</h3>
                                <?php echo get_field_details('khuyen_mai'); ?>
                            </div>
                        </div>
                        <div class="col-ssmm-12 col-ssm-12 col-md-4 applications">
                            <ul>
                                <li class="directions"><a href="/lien-he/">Chỉ đường đến Zsofa</a></li>
                                <li class="shopping-guide col-ssmm-6 col-ssm-6 col-md-12"><a href="/quy-trinh-tu-van-khach-hang-cua-zsofa-vn/">Hướng dẫn mua
                                        hàng</a></li>
                                <li class="delivery col-ssmm-6 col-ssm-6 col-md-12"><a href="/chinh-sach-van-chuyen/">Giao hàng toàn quốc</a>
                                </li>
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
                        $args = array('post_type' => 'product', 'posts_per_page' => 10, 'product_cat' => 'san-pham-ban-chay', 'orderby' => 'rand');
                        $loop = new WP_Query($args);
                        while ($loop->have_posts()) : $loop->the_post();
                            global $product; ?>
                            <li>
                                <div class="feature-product-wrapp">
                                    <div class="product-feature-title"><a
                                                href="<?php echo get_permalink($loop->post->ID) ?>"><?php the_title(); ?></a>
                                    </div>
                                    <a class="wrapper-link"
                                       href="<?php echo get_permalink($loop->post->ID) ?>"><?php if (has_post_thumbnail($loop->post->ID)) echo get_the_post_thumbnail($loop->post->ID, 'post-thumb'); else echo '<img src="' . woocommerce_placeholder_img_src() . '" width="300px" height="210px" />'; ?>
                                        <span class="feature-price-sale"><?php echo wc_price($product->get_sale_price()); ?></span></a>
                                    <div class="feature-price-real"><?php echo wc_price($product->get_regular_price()); ?></div>
                                    <div class="buy-now clearfix"><a
                                                href="<?php echo get_permalink($loop->post->ID) ?>">Mua ngay</a></div>

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
                            <?php the_content(); ?>

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
                            <?php echo get_field_details('tai_sao_chon_zsofa', 'default_value'); ?>

                            <!--End user's content-->
                        </li>
                        <li>
                            <h3 class="mobile-tab-title">Chương trình khuyến mại</h3>
                            <!--Begin user's content-->
                            <?php echo get_field_details('khuyen_mai_chung', 'default_value'); ?>

                            <!--End user's content-->
                        </li>
                        <li>
                            <h3 class="mobile-tab-title">Miễn phí vận chuyển</h3>
                            <!--Begin user's content-->
                            <?php echo get_field_details('mien_phi_van_chuyen', 'default_value'); ?>

                            <!--End user's content-->
                        </li>
                    </ul>
                    <a href="" class="bottom-small-banner"><img class="img-resonsive"
                                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/176.jpg"
                                                                alt=""></a>
                    <div class="facebook-sharing">
                        <a class="fb-share-bt" rel="nofollow"
                           href="https://www.facebook.com/sharer/sharer.php?u=http://erado.vn/sofa-da-that/sofa-da-that-ma-369.html&amp;p[images][0]=http://erado.vn//images/pro/sofa-da-that-ma-369_2033.jpg"
                           target="socialbookmark"></a>
                        <div style="margin-left:10px;" class="fb-like" data-send="false" data-layout="box_count"
                             data-width="60" data-show-faces="false"></div>
                        <div id="___plusone_0"
                             style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 50px; height: 24px;">
                            <iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0"
                                    scrolling="no"
                                    style="position: static; top: 0px; width: 50px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 24px;"
                                    tabindex="0" vspace="0" width="100%" id="I0_1529336553436" name="I0_1529336553436"
                                    src="https://apis.google.com/se/0/_/+1/fastbutton?usegapi=1&amp;size=tall&amp;hl=vi&amp;origin=http%3A%2F%2Ferado.vn&amp;url=http%3A%2F%2Ferado.vn%2Fsofa-da-that%2Fsofa-da-that-ma-369.html&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en_US.f5JujS1eFMY.O%2Fm%3D__features__%2Fam%3DQQE%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCNDI1_ftdVIpg6jNiygedEKTreQ2A#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1529336553436&amp;_gfid=I0_1529336553436&amp;parent=http%3A%2F%2Ferado.vn&amp;pfname=&amp;rpctoken=39995014"
                                    data-gapiattached="true" title="G+"></iframe>
                        </div>
                    </div>
                    <div class="fb-comments" data-href="http://erado.vn/sofa-da-that/sofa-da-that-ma-369.html"
                         data-width="100%" data-numposts="5"></div>
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
                            <?php
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 3,
                                'orderby' => 'rand',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_visibility',
                                        'field'    => 'name',
                                        'terms'    => 'featured',
                                    ),
                                ),
                            );
                            $loop_feature_products = new WP_Query( $args );
                            if ( $loop_feature_products->have_posts() ) {
                                while ( $loop_feature_products->have_posts() ) : $loop_feature_products->the_post();
                                global $product;
                                $regular_price = $product->get_regular_price();
                                $sale_price = $product->get_sale_price();
                                ?>
                                    <div class="new-product-item">
                                        <a class="img-feature-wrapper" href="<?php the_permalink() ?>"><span class="img-thumb-wrapper"><?php if (has_post_thumbnail($loop_feature_products->post->ID)) echo get_the_post_thumbnail($loop_feature_products->post->ID, 'medium'); else echo '<img src="' . woocommerce_placeholder_img_src() . '" width="300px" height="210px" />'; ?></span></a>
                                        <a class="product-name" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                        <div class="product-price"><span>Giá: </span><span class="num"><?php echo wc_price($regular_price); ?></span></div>
                                        <div class="sale-price"><span>Giá KM: </span><span class="num"><?php echo wc_price($sale_price); ?></span></div>
                                        <a href="<?php the_permalink() ?>" class="buy-now">Mua ngay</a>
                                    </div>


                                <?php
                                endwhile;
                            } else {
                                echo __( 'No products found' );
                            }
                            wp_reset_postdata();
                            ?>
                        </div>


                    </div>
                    <div class="feedback">
                        <a href=""><img class="img-responsive"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/173.jpg" alt=""></a>
                    </div>
                    <div class="online-support">
                        <h2 class="online-support-title">Hỗ trợ trực tuyến</h2>
                        <ul>
                            <li class="light">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dich-vu-bao-hanh.png" alt="">
                                <span>Hoàng Trắc</span>
                                <strong>0962.494.992</strong>
                            </li>
                            <li class="grey">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dich-vu-bao-hanh.png" alt="">
                                <span>Huỳnh Nhật</span>
                                <strong>0963.214.107</strong>
                            </li>
                            <li class="light">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dich-vu-bao-hanh.png" alt="">
                                <span>Đức Vũ</span>
                                <strong> 01674.669.060</strong>
                            </li>
                            <li class="grey">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dich-vu-bao-hanh.png" alt="">
                                <span>Văn Lợi</span>
                                <strong>0917.303.047</strong>
                            </li>
                            <li class="light">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dich-vu-bao-hanh.png" alt="">
                                <span>Thanh Toàn</span>
                                <strong>0916.898.738</strong>
                            </li>
                        </ul>
                    </div>
                    <div class="customer-purchased">
                        <h2>Khách hàng đã mua</h2>
                        <div class="customers-news">
                            <a href="https://www.facebook.com/pg/zsofa.vn1/photos/?tab=album&album_id=818838611627129"><?php echo do_shortcode('[rev_slider alias="products-purchased"]');?></a>
                            <a class="view-more" href="https://www.facebook.com/pg/zsofa.vn1/photos/?tab=album&album_id=818838611627129">Bộ sưu tập Sofa đã bàn giao tại zsofa.vn</a>
                        </div>

                    </div>
                    <div class="ext-banner">
                        <a href=""><img class="img-responsive"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/174.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="similar-products featured-category">
        <div class="container">
            <h1>Sản phẩm cùng loại</h1>
            <div class="row list-products" id="similar-products">
                <?php
                global $product;
                $args = array(
                    'posts_per_page' => 12,
                    'columns' => 4,
                    'orderby' => 'rand', // @codingStandardsIgnoreLine.
                );

                if (!$product) {
                    return;
                }

                $defaults = array(
                    'posts_per_page' => 2,
                    'columns' => 2,
                    'orderby' => 'rand', // @codingStandardsIgnoreLine.
                    'order' => 'desc',
                );

                $args = wp_parse_args($args, $defaults);

                // Get visible related products then sort them at random.
                $args['related_products'] = array_filter(array_map('wc_get_product', wc_get_related_products($product->get_id(), $args['posts_per_page'], $product->get_upsell_ids())), 'wc_products_array_filter_visible');

                // Handle orderby.
                $args['related_products'] = wc_products_array_orderby($args['related_products'], $args['orderby'], $args['order']);

                // Set global loop values.
                wc_set_loop_prop('name', 'related');
                wc_set_loop_prop('columns', apply_filters('woocommerce_related_products_columns', $args['columns']));

                wc_get_template('single-product/related.php', $args);
                ?>
            </div>
            <input type="hidden" value="<?php global $term; echo json_encode($term);?>" id="current-product-category">
        </div>
    </div>

<?php get_template_part('template-parts/product', 'promotion'); ?>
<?php get_template_part('template-parts/product', 'video'); ?>
<?php get_template_part('template-parts/store', 'services'); ?>
<?php get_template_part('template-parts/product', 'categories'); ?>
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
                        <?php dynamic_sidebar('zsofawidget-viewed-product'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_template_part('template-parts/news', 'letter'); ?>

<?php
get_footer();