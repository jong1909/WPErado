<?php
/**
 * The template for displaying Archive pages.
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
                    <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/list-product-slide/g92.jpg" />
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/list-product-slide/g93.jpg" />
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/list-product-slide/g94.jpg" />
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/list-product-slide/g104.jpg" />
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/list-product-slide/g109.png" />
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/list-product-slide/g111.png" />
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/list-product-slide/g114.png" />
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/list-product-slide/g136.jpg" />
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/list-product-slide/g138.jpg" />
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/list-product-slide/g154.jpg" />
                </li>
            </ul>
        </div>
    </div>
    <div class="mobile-quick-menu">
        <div class="container">
            <div class="row">
                <div class="col-ssmm-4 col-ssm-2">
                    <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/ghe-sofa-7.png" alt=""><span class="title-quickmn">Ghế Sofa</span></a>
                </div>
                <div class="col-ssmm-4 col-ssm-2">
                    <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/noi-that-8.png" alt=""><span class="title-quickmn">Nội thất</span></a>
                </div>
                <div class="col-ssmm-4 col-ssm-2">
                    <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/tham-trai-san-9.png" alt=""><span class="title-quickmn">Thảm trải sàn</span></a>
                </div>
                <div class="col-ssmm-4 col-ssm-2">
                    <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/hang-trang-tri-10.png" alt=""><span class="title-quickmn">Hàng trang trí</span></a>
                </div>
                <div class="col-ssmm-4 col-ssm-2">
                    <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/giay-dan-tuong-11.png" alt=""><span class="title-quickmn">Giấy dán tường</span></a>
                </div>
                <div class="col-ssmm-4 col-ssm-2">
                    <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/thiet-ke-noi-that-12.png" alt=""><span class="title-quickmn">Thiết kế nội thất</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="news-main-content">
        <div class="row">
            <div class="container">
                <div class="col-ssmm-12 col-ssm-12 col-md-3 col-left-pr">
                    <div class="latest-news clearfix">
                        <h2 class="latest-news-title">Tin mới nhất</h2>
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
                        $categories = get_the_category(get_the_ID());
                        if ($categories){
                            $category_ids = array();
                            foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                            $args=array(
                                'category__in' => $category_ids,
                                'post__not_in' => array(get_the_ID()),
                                'posts_per_page' => 3
                            );
                            $my_query = new wp_query($args);
                            if( $my_query->have_posts() ):
                                echo '<ul>';
                                while ($my_query->have_posts()):$my_query->the_post();
                                    ?>
                                    <li class="clearfix"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a><a class="summary-content" href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
                                <?php
                                endwhile;
                                echo '</ul>';
                            endif; wp_reset_query();
                        }
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
                            <li><a href="">Tin mới nhất</a></li>
                        </ul>
                    </div>
                    <h3 class="general-introduction"><?php the_archive_title();?></h3>
                    <div class="news-content-wrapper row" id="archive-news">
                        <?php
                        $category = get_category( get_query_var( 'cat' ) );
                        $cat_id = $category->cat_ID;
                        $news = new WP_Query(array(
                            'post_type'         =>  'post',
                            'posts_per_page'    =>  18,
                            'category__in' => $cat_id,
                            'orderby' => 'ID'
                        ));

                        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

                        $args = array(
                            'posts_per_page' => 18,
                            'post_type'=>'post',
                            'post_status'=>'publish',
                            'orderby' => 'ID',
                            'order' => 'DESC',
                            'cat' => $cat_id,
                            'paged' => $paged
                        );

                        $zsofa_news = new WP_Query( $args );
                        ?>
                        <?php if ( $zsofa_news->have_posts() ) :
                            while ( $zsofa_news->have_posts() ) : $zsofa_news->the_post(); ?>
                            <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                <div class="news-item-wr">
                                    <?php if(has_post_thumbnail()):?>
                                        <a class="product-image image_blur" href="<?php the_permalink() ?>"><span class="img-thumb-wrapper"><?php echo get_the_post_thumbnail( $page->ID, 'post-thumb' );?></span></a>
                                    <?php else :?>
                                        <?php
                                        $html = '<div class="news-image-placeholder">';
                                        $html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src()), esc_html__('Awaiting product image', 'woocommerce'));
                                        $html .= '</div>';

                                        echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id);
                                        ?>
                                    <?php endif;?>
                                    <a href="<?php the_permalink(); ?>" class="news-title"><?php the_title(); ?></a>
                                    <span class="line-separator">&nbsp;</span>
                                    <div class="short-description">
                                        <?php if(the_excerpt()){
                                            the_excerpt();
                                        }
                                        else{
                                            echo 'Tin tức từ thương hiệu Zsofa nổi tiếng';
                                        }
                                        ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="news-view-more">Xem chi tiết</a>
                                </div>
                            </div>
                        <?php
                        endwhile;
                            //code pagination
                            $big = 999999999; // need an unlikely integer

                            echo paginate_links( array(
                                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                'format' => '?paged=%#%',
                                'current' => max( 1, get_query_var('paged') ),
                                'total' => $the_query->max_num_pages
                            ) );
                            if (function_exists('zsofa_archive_pagination')) zsofa_archive_pagination($zsofa_news);
//                        devvn_corenavi_ajax($news);
                        endif; wp_reset_query();
                        ?>
                    </div>
                    <input type="hidden" value="<?php echo json_encode($cat_id);?>" id="current-news-category">
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
        <h3>Kết nối với zSOFA</h3>
    </div>
    <div class="fb-page" data-href="https://www.facebook.com/zsofavn2/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/zsofavn2/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/zsofavn2/">zsofa.vn - Gò Vấp - Hệ thống bán sỉ và lẻ ghế sofa.</a></blockquote></div>
<?php get_template_part( 'template-parts/news','letter' ); ?>
<?php
get_footer();