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
                        <li><a href="">Tin mới nhất</a></li>
                    </ul>
                </div>
                <h3 class="news-main-title"><?php the_title(); ?></h3>
                <div class="news-content-detail-wrapper">
                    <div class="news-short-desc">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="news-main-content">
                        <div class="intro"><?php the_content(
                                sprintf(
                                    __( 'Continue reading %s', 'zsofa' ),
                                    '<span class="screen-reader-text">' . get_the_title() . '</span>'
                                )
                            ); ?></div>
                    </div>
                </div> <!--End news-content-detail-wrapper-->
                <div class="facebook-sharing clearfix">
                    <a class="fb-share-bt" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="socialbookmark"></a>
                    <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                </div>
                <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
            </div>
        </div>
    </div>
</div>
<?php get_template_part( 'template-parts/product','promotion' ); ?>
<figure class="banner-middle">
    <div class="container">
        <?php echo do_shortcode( '[rev_slider alias="banner-middle"]' ); ?>
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
<?php get_template_part('template-parts/news', 'letter'); ?>