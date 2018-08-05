<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Product List
 *
 * @package zsofa
 */

get_header(); ?>

    <div class="container">
        <div class="section1 slider">
            <div id="product-list-slider">
                <?php echo do_shortcode( '[rev_slider alias="list-page-slider"]' );  ?>
            </div>
        </div>
    </div>

    <div class="section1 slider-mobile slider">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/list-product-slide/g92.jpg"/>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/list-product-slide/g93.jpg"/>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/list-product-slide/g94.jpg"/>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/list-product-slide/g104.jpg"/>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/list-product-slide/g109.png"/>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/list-product-slide/g111.png"/>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/list-product-slide/g114.png"/>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/list-product-slide/g136.jpg"/>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/list-product-slide/g138.jpg"/>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/list-product-slide/g154.jpg"/>
                </li>
            </ul>
        </div>
    </div>
    <div class="mobile-quick-menu">
        <div class="container">
            <div class="row">
                <div class="col-ssmm-4 col-ssm-2">
                    <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ghe-sofa-7.png"
                                    alt=""><span class="title-quickmn">Ghế Sofa</span></a>
                </div>
                <div class="col-ssmm-4 col-ssm-2">
                    <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/images/noi-that-8.png"
                                    alt=""><span class="title-quickmn">Nội thất</span></a>
                </div>
                <div class="col-ssmm-4 col-ssm-2">
                    <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/images/tham-trai-san-9.png"
                                    alt=""><span class="title-quickmn">Thảm trải sàn</span></a>
                </div>
                <div class="col-ssmm-4 col-ssm-2">
                    <a href=""><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/hang-trang-tri-10.png"
                                alt=""><span class="title-quickmn">Hàng trang trí</span></a>
                </div>
                <div class="col-ssmm-4 col-ssm-2">
                    <a href=""><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/giay-dan-tuong-11.png"
                                alt=""><span class="title-quickmn">Giấy dán tường</span></a>
                </div>
                <div class="col-ssmm-4 col-ssm-2">
                    <a href=""><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/thiet-ke-noi-that-12.png"
                                alt=""><span class="title-quickmn">Thiết kế nội thất</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="products-list-content">
        <div class="row">
            <div class="container">
                <div class="col-ssmm-12 col-ssm-12 col-md-3 col-left-pr">
                    <div class="product-type">
                        <h2 class="product-type-title">Ghế sofa</h2>
                        <?php wp_nav_menu( array( 'menu' => 'Archive left menu' ) ); ?>
                    </div>
                    <div class="price-ranges clearfix">
                        <h2 class="price-ranges-tile">Chọn giá</h2>
                        <?php dynamic_sidebar('zsofawidget-filter-product-price'); ?>
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
                    <div class="customer-purchased clearfix">
                        <h2>Khách hàng đã mua</h2>
                        <div class="customers-news">
                            <a href="https://www.facebook.com/pg/zsofa.vn1/photos/?tab=album&album_id=818838611627129"><?php echo do_shortcode('[rev_slider alias="products-purchased"]');?></a>
                            <a class="view-more" href="https://www.facebook.com/pg/zsofa.vn1/photos/?tab=album&album_id=818838611627129">Bộ sưu tập Sofa đã bàn giao tại zsofa.vn</a>
                        </div>

                    </div>
                    <div class="related-news clearfix">
                        <h2>Bài viết liên quan</h2>
                        <?php
                            $args=array(
                                'post_type'=>'post',
                                'post_status'=>'publish',
                                'cat' => 1,
                                'orderby' => 'rand',
                                'order' => 'DESC',
                                'posts_per_page'=> 3
                            );
                            $my_query = new wp_query($args);
                            if( $my_query->have_posts() ):
                                echo '<ul class="clearfix">';
                                while ($my_query->have_posts()):$my_query->the_post();
                                    ?>
                                    <li class="clearfix"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a><a class="summary-content" href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
                                <?php
                                endwhile;
                                echo '</ul>';
                            endif; wp_reset_query();
                        ?>
                    </div>
                    <div class="ext-banner clearfix">
                        <?php dynamic_sidebar('zsofawidget-banner-right-column'); ?>
                    </div>
                </div>
                <div class="col-ssmm-12 col-ssm-12 col-md-9 col-right-pr">
                    <div class="bread-crumb-cat clearfix">
                        <ul>
                            <li><a href="">Home</a></li>
                            <li><a href=""><?php woocommerce_page_title(); ?></a></li>
                        </ul>
                    </div>
                    <h3 class="general-introduction">Điều gì khiến bạn lựa chọn <?php woocommerce_page_title(); ?> tại ZSOFA ?</h3>
                    <div class="cont-description">
                        <?php
                        $term_object = get_queried_object();
                        echo $term_object->description;
                        ?>
                    </div>
                    <div class="featured-category sofa clearfix">
                        <div class="row list-products">
                            <?php
                            if (woocommerce_product_loop()) {

                                /**
                                 * Hook: woocommerce_before_shop_loop.
                                 *
                                 * @hooked wc_print_notices - 10
                                 * @hooked woocommerce_result_count - 20
                                 * @hooked woocommerce_catalog_ordering - 30
                                 */
                                do_action('woocommerce_before_shop_loop');

                                woocommerce_product_loop_start();

                                if (wc_get_loop_prop('total')) {
                                    while (have_posts()) {
                                        the_post();

                                        /**
                                         * Hook: woocommerce_shop_loop.
                                         *
                                         * @hooked WC_Structured_Data::generate_product_data() - 10
                                         */
                                        do_action('woocommerce_shop_loop');

                                        wc_get_template_part('content', 'product');
                                    }
                                }

                                woocommerce_product_loop_end();

                                /**
                                 * Hook: woocommerce_after_shop_loop.
                                 *
                                 * @hooked woocommerce_pagination - 10
                                 */
                                do_action('woocommerce_after_shop_loop');
                            } else {
                                /**
                                 * Hook: woocommerce_no_products_found.
                                 *
                                 * @hooked wc_no_products_found - 10
                                 */
                                do_action('woocommerce_no_products_found');
                            }

                            /**
                             * Hook: woocommerce_after_main_content.
                             *
                             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                             */
//                            do_action('woocommerce_after_main_content');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_template_part( 'template-parts/product','promotion' ); ?>
    <figure class="banner-middle">
        <div class="container">
            <?php echo do_shortcode( '[rev_slider alias="banner-middle"]' );  ?>
        </div>
    </figure>
<?php get_template_part( 'template-parts/best','selling' ); ?>
<?php get_template_part( 'template-parts/product', 'video' ); ?>
<?php get_template_part( 'template-parts/store', 'services' ); ?>
<?php get_template_part( 'template-parts/product','categories' ); ?>
<?php get_template_part( 'template-parts/store','news' ); ?>
    <div class="store-connect-mobile">
        <h3>Kết nối với Erado</h3>
    </div>
    <div class="fb-page" data-href="https://www.facebook.com/zsofavn2/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/zsofavn2/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/zsofavn2/">zsofa.vn - Gò Vấp - Hệ thống bán sỉ và lẻ ghế sofa.</a></blockquote></div>
<?php get_template_part( 'template-parts/news','letter' ); ?>

<?php
get_footer();