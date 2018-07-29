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
                    <div class="customer-purchased clearfix">
                        <h2>Khách hàng đã mua</h2>
                        <div class="customers-news">
                            <a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-giao-noi-that-cho-anh-long-o-flc-thanh-hoa.jpg" alt=""></a>
                            <a class="view-more" href="">Bàn giao nội thất cho anh Long ở FLC Thanh Hóa</a>
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
                        <a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/174.jpg" alt=""></a>
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
                                    <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $page->ID, 'post-thumb' );?></a>
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
        <h3>Kết nối với Erado</h3>
    </div>
    <div style="width:375px;margin:auto;"><div class="fb-page fb_iframe_widget fb_iframe_widget_fluid" data-href="https://www.facebook.com/sieuthinoithatrosano" data-adapt-container-width="true" data-tabs="timeline" data-show-facepile="true" data-width="375" data-height="300" data-colorscheme="light" data-show-faces="1" data-header="1" data-stream="1" data-show-border="1" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=&amp;color_scheme=light&amp;container_width=375&amp;height=300&amp;href=https%3A%2F%2Fwww.facebook.com%2Fsieuthinoithatrosano&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;tabs=timeline&amp;width=375"><span style="vertical-align: bottom; width: 375px; height: 300px;"><iframe name="fff68f6c7fd7ac" width="375px" height="300px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FmAiQUwlReIP.js%3Fversion%3D42%23cb%3Df880af12b2f314%26domain%3Derado.vn%26origin%3Dhttp%253A%252F%252Ferado.vn%252Ffad893aac5b54%26relation%3Dparent.parent&amp;color_scheme=light&amp;container_width=375&amp;height=300&amp;href=https%3A%2F%2Fwww.facebook.com%2Fsieuthinoithatrosano&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;tabs=timeline&amp;width=375" style="border: none; visibility: visible; width: 375px; height: 300px;" class=""></iframe></span></div></div>
<?php get_template_part( 'template-parts/news','letter' ); ?>
<?php
get_footer();