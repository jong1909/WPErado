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
                                echo '<ul class="clearfix">';
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
                    <div class="facebook-sharing">
                        <a class="fb-share-bt" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u=http://erado.vn/sofa-da-that/sofa-da-that-ma-369.html&amp;p[images][0]=http://erado.vn//images/pro/sofa-da-that-ma-369_2033.jpg" target="socialbookmark"></a>
                        <div style="margin-left:10px;" class="fb-like" data-send="false" data-layout="box_count" data-width="60" data-show-faces="false"></div>
                        <div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 50px; height: 24px;"><iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 50px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 24px;" tabindex="0" vspace="0" width="100%" id="I0_1529336553436" name="I0_1529336553436" src="https://apis.google.com/se/0/_/+1/fastbutton?usegapi=1&amp;size=tall&amp;hl=vi&amp;origin=http%3A%2F%2Ferado.vn&amp;url=http%3A%2F%2Ferado.vn%2Fsofa-da-that%2Fsofa-da-that-ma-369.html&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en_US.f5JujS1eFMY.O%2Fm%3D__features__%2Fam%3DQQE%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCNDI1_ftdVIpg6jNiygedEKTreQ2A#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1529336553436&amp;_gfid=I0_1529336553436&amp;parent=http%3A%2F%2Ferado.vn&amp;pfname=&amp;rpctoken=39995014" data-gapiattached="true" title="G+"></iframe></div>
                    </div>
                    <div class="fb-comments" data-href="http://erado.vn/sofa-da-that/sofa-da-that-ma-369.html" data-width="100%" data-numposts="5"></div>
                    <div class="other-news-section">
                        <div class="title">CÁC TIN TỨC KHÁC</div>
                        <div class="news-content-wrapper row" id="news-post-detail">
                            <?php
                            $categories = get_the_category(get_the_ID());
                            if ($categories):
                                $category_ids = array();
                                foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                                $news = new WP_Query(array(
                                    'post_type'         =>  'post',
                                    'posts_per_page'    =>  9,
                                    'category__in' => $category_ids,
                                    'orderby' => 'date'
                                ));
                                $args=array(
                                    'category__in' => $category_ids,
                                    'post__not_in' => array(get_the_ID()),
                                    'posts_per_page' => 9,
                                    'orderby' => 'date'
                                );
                                $my_query = new wp_query($args);
                                if( $my_query->have_posts() ):
                                    while ($my_query->have_posts()):$my_query->the_post();
                                        ?>

                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="news-item-wr">
                                                <a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail( null, 'post-thumb' );?></a>
                                                <a href="<?php the_permalink() ?>" class="news-title"><?php the_title(); ?></a>
                                                <span class="line-separator">&nbsp;</span>
                                                <div class="short-description"><?php the_excerpt();?></div>
                                                <a href="<?php the_permalink() ?>" class="news-view-more">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    <?php
                                    endwhile;
                                    zsofa_pagination_ajax($news);
                                endif; wp_reset_query(); ?>
                            <?php endif; ?>
                        </div>
                        <input type="hidden" value="<?php echo json_encode($category_ids);?>" id="current-category">
                    </div>
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
   <div class="section8 store-news">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="store-news-title">
                        <a href="">CHUYÊN ĐỀ ERADO</a>
                    </h1>
                    <div class="more-link"><a href="">Bàn giao nội thất cho anh Long ở FLC Thanh Hóa</a></div>
                    <div class="news-content-wr">
                        <a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-giao-noi-that-cho-anh-long-o-flc-thanh-hoa.jpg" alt=""></a><p class="news-summary">Thương hiệu nội thất ERADO vô cùng vui mừng khi anh Long ở FLC Thanh Hóa đã quyết định chọn nội thất cho căn nhà của </p>
                    </div>
                    <div class="other-news">
                        <h5 class="other-news-title">Các tin khác</h5>
                        <ul>
                            <li><a href="">Bàn giao nội thất cho gia đình anh Dũng - P1013, Khu </a></li>
                            <li><a href="">Bàn giao sofa cho chị Thúy ở Lò Đúc</a></li>
                            <li><a href="">Bàn giao sofa cho Chị Tân ở KĐT Yên Hòa, Trung Yên </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <h1 class="store-news-title">
                        <a href="">Kinh nghiệm hay của erado</a>
                    </h1>
                    <div class="more-link"><a href="">Chọn ghế bàn ăn loại nào</a></div>
                    <div class="news-content-wr">
                        <a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/nen-mua-ban-ghe-an-loai-nao.jpg" alt=""></a><p class="news-summary">Ghế ăn hiện đại với khung thép cứng và được bọc da hoàn toàn vô cùng hiện đại và sang trọng cũng như tốt cho sức khỏe của gia đình. </p>
                    </div>
                    <div class="other-news">
                        <h5 class="other-news-title">Các tin khác</h5>
                        <ul>
                            <li><a href="">Chọn ghế ngồi ăn cho căn hộ nhỏ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <h1 class="store-news-title">
                        <a href="">Chuyên đề nội thất</a>
                    </h1>
                    <div class="more-link"><a href="">Sức hút từ bộ sưu tập sofa da thật phối gỗ của thương </a></div>
                    <div class="news-content-wr">
                        <a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-that-phoi-go-den-tu-thuong-hieu-noi-that-erado.png" alt=""></a><p class="news-summary">Thương hiệu nội thất ERADO giới thiệu đến quý khách hàng bộ sưu tập sofa da thật phối gỗ hiện đại đang được rất nhiều khách hàng </p>
                    </div>
                    <div class="other-news">
                        <h5 class="other-news-title">Các tin khác</h5>
                        <ul>
                            <li><a href="">Bàn giao nội thất cho gia đình anh Dũng - P1013, Khu </a></li>
                            <li><a href="">Bàn giao sofa cho chị Thúy ở Lò Đúc</a></li>
                            <li><a href="">Bàn giao sofa cho Chị Tân ở KĐT Yên Hòa, Trung Yên </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="store-connect-mobile">
        <h3>Kết nối với Erado</h3>
    </div>
    <div class="fb-page" data-href="https://www.facebook.com/zsofavn2/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/zsofavn2/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/zsofavn2/">zsofa.vn - Gò Vấp - Hệ thống bán sỉ và lẻ ghế sofa.</a></blockquote></div>
    <div class="section9 newsletter">
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