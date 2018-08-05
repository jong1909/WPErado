<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: News Details
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
			                <h3 class="news-main-title">Nội thất ERADO-Nhà tài trợ vàng liveshow nhạc tình muôn thuở</h3>
                            <div class="news-content-detail-wrapper">
                                <div class="news-short-desc">
                                    Thương hiệu nội thất ERADO vô cùng hân hạnh trở thành nhà tài trợ cho đêm liveshow "Nhạc tình muôn thuở" với sự góp mặt của các giọng ca vàng như Quang Lê, Như Quỳnh, Ngọc Sơn. Đêm diễn hứa hẹn mang đến quý khán giả những cảm xúc tuyệt vời nhất cùng các ca khúc đi vào lòng người.
                                </div>
                                <div class="news-main-content">
                                    <div class="intro"><div style="text-align: justify;">&nbsp;<span style="font-size: 16px;"><span style="font-family: &quot;Times New Roman&quot;;">Đêm Liveshow "Nhạc tình muôn thuở"&nbsp;<span style="color: rgb(51, 51, 51); text-align: justify;">sẽ diễn ra vào lúc 20h ngày 17/06/2018 tại Cung Văn hoá Lao động Hữu nghị Việt - Xô nằm tại 91 phố Trần Hưng Đạo, quận Hoàn Kiếm, Hà Nội. Với sự tham gia cuả những giọng ca đi vào lòng người qua nhiều thế hệ như&nbsp;</span></span></span><span style="color: rgb(51, 51, 51); font-family: &quot;Times New Roman&quot;; font-size: 16px;">Ông Hoàng Nhạc Sến NGỌC SƠN,&nbsp;</span><span style="color: rgb(51, 51, 51); font-family: &quot;Times New Roman&quot;; font-size: 16px;">Người Tình Cố Đô Bolero QUANG LÊ, ca sĩ NHƯ QUỲNH.&nbsp;<br>
                                    <br>
                                    Với sự góp mặt của các giọng ca đình đám cùng các ca khúc bất hủ đậm chất trữ tình, đêm diễn hứa hẹn mang đến khán giả Hà Thành những giây phút khó quên.&nbsp;<br>
                                    <br>
                                    <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/750.jpg" width="750" alt="Nội thất ERADo_Nhà tài trợ vàng liveshow nhạc tình muôn thuở"><br>
                                    <br>
                                    </span><span style="color: rgb(51, 51, 51); font-family: &quot;Times New Roman&quot;; font-size: 16px;">Thương hiệu&nbsp;</span><a href="http://erado.com.vn/" style="color: rgb(79, 79, 79); text-decoration-line: none; font-family: &quot;Times New Roman&quot;; font-size: 16px;"><strong>Nội thất ERADO</strong></a><span style="color: rgb(51, 51, 51); font-family: &quot;Times New Roman&quot;; font-size: 16px;">&nbsp;rất vinh hạnh và tự hào khi được là Nhà tài trợ Vàng của đêm Liveshow " Nhạc tình muôn thuở 6" lần này.&nbsp;</span></div><div class="cl"></div></div>
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
                                <div class="news-content-wrapper row">
                                    <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                        <div class="news-item-wr">
                                            <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/noi-that-erado-nha-tai-tro-vang-liveshow-nhac-tinh-muon-thuo.jpg" alt="" class="img-responsive news-image"></a>
                                            <a href="" class="news-title">Nội thất ERADO_Nhà tài trợ vàng liveshow nhạc tình muôn thuở</a>
                                            <span class="line-separator">&nbsp;</span>
                                            <div class="short-description">Thương hiệu nội thất ERADO vô cùng hân hạnh trở thành nhà tài trợ cho đêm</div>
                                            <a href="" class="news-view-more">Xem chi tiết</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                        <div class="news-item-wr">
                                            <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/5-ly-do-khien-giuong-boc-da-dang-tro-thanh-xu-huong-cua-noi-that-hien-dai.jpg" alt="" class="img-responsive news-image"></a>
                                            <a href="" class="news-title">5 lý do khiến giường bọc da đang trở thành xu hướng của nội thất hiện đại</a>
                                            <span class="line-separator">&nbsp;</span>
                                            <div class="short-description">Giường ngủ bọc da thật đang là xu hướng phổ biến trong các căn hộ hiện</div>
                                            <a href="" class="news-view-more">Xem chi tiết</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                        <div class="news-item-wr">
                                            <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/noi-that-erado-nha-tai-tro-vang-liveconcert-my-tam-jimmii-nguyen.jpg" alt="" class="img-responsive news-image"></a>
                                            <a href="" class="news-title">Nội thất ERADO - Nhà Tài Trợ Vàng LiveConcert "Mỹ Tâm - Jimmii</a>
                                            <span class="line-separator">&nbsp;</span>
                                            <div class="short-description">Thương hiệu nội thất ERADO vô cùng hân hạnh trở thành nhà tài trợ cho đêm </div>
                                            <a href="" class="news-view-more">Xem chi tiết</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                        <div class="news-item-wr">
                                            <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/noi-that-erado-nha-tai-tro-vang-liveshow-nhac-tinh-muon-thuo.jpg" alt="" class="img-responsive news-image"></a>
                                            <a href="" class="news-title">Nội thất ERADO_Nhà tài trợ vàng liveshow nhạc tình muôn thuở</a>
                                            <span class="line-separator">&nbsp;</span>
                                            <div class="short-description">Thương hiệu nội thất ERADO vô cùng hân hạnh trở thành nhà tài trợ cho đêm</div>
                                            <a href="" class="news-view-more">Xem chi tiết</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                        <div class="news-item-wr">
                                            <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/5-ly-do-khien-giuong-boc-da-dang-tro-thanh-xu-huong-cua-noi-that-hien-dai.jpg" alt="" class="img-responsive news-image"></a>
                                            <a href="" class="news-title">5 lý do khiến giường bọc da đang trở thành xu hướng của nội thất hiện đại</a>
                                            <span class="line-separator">&nbsp;</span>
                                            <div class="short-description">Giường ngủ bọc da thật đang là xu hướng phổ biến trong các căn hộ hiện</div>
                                            <a href="" class="news-view-more">Xem chi tiết</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                        <div class="news-item-wr">
                                            <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/noi-that-erado-nha-tai-tro-vang-liveconcert-my-tam-jimmii-nguyen.jpg" alt="" class="img-responsive news-image"></a>
                                            <a href="" class="news-title">Nội thất ERADO - Nhà Tài Trợ Vàng LiveConcert "Mỹ Tâm - Jimmii</a>
                                            <span class="line-separator">&nbsp;</span>
                                            <div class="short-description">Thương hiệu nội thất ERADO vô cùng hân hạnh trở thành nhà tài trợ cho đêm </div>
                                            <a href="" class="news-view-more">Xem chi tiết</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                        <div class="news-item-wr">
                                            <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/noi-that-erado-nha-tai-tro-vang-liveshow-nhac-tinh-muon-thuo.jpg" alt="" class="img-responsive news-image"></a>
                                            <a href="" class="news-title">Nội thất ERADO_Nhà tài trợ vàng liveshow nhạc tình muôn thuở</a>
                                            <span class="line-separator">&nbsp;</span>
                                            <div class="short-description">Thương hiệu nội thất ERADO vô cùng hân hạnh trở thành nhà tài trợ cho đêm</div>
                                            <a href="" class="news-view-more">Xem chi tiết</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                        <div class="news-item-wr">
                                            <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/5-ly-do-khien-giuong-boc-da-dang-tro-thanh-xu-huong-cua-noi-that-hien-dai.jpg" alt="" class="img-responsive news-image"></a>
                                            <a href="" class="news-title">5 lý do khiến giường bọc da đang trở thành xu hướng của nội thất hiện đại</a>
                                            <span class="line-separator">&nbsp;</span>
                                            <div class="short-description">Giường ngủ bọc da thật đang là xu hướng phổ biến trong các căn hộ hiện</div>
                                            <a href="" class="news-view-more">Xem chi tiết</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                        <div class="news-item-wr">
                                            <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/noi-that-erado-nha-tai-tro-vang-liveconcert-my-tam-jimmii-nguyen.jpg" alt="" class="img-responsive news-image"></a>
                                            <a href="" class="news-title">Nội thất ERADO - Nhà Tài Trợ Vàng LiveConcert "Mỹ Tâm - Jimmii</a>
                                            <span class="line-separator">&nbsp;</span>
                                            <div class="short-description">Thương hiệu nội thất ERADO vô cùng hân hạnh trở thành nhà tài trợ cho đêm </div>
                                            <a href="" class="news-view-more">Xem chi tiết</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                        <div class="news-item-wr">
                                            <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/noi-that-erado-nha-tai-tro-vang-liveconcert-my-tam-jimmii-nguyen.jpg" alt="" class="img-responsive news-image"></a>
                                            <a href="" class="news-title">Nội thất ERADO - Nhà Tài Trợ Vàng LiveConcert "Mỹ Tâm - Jimmii</a>
                                            <span class="line-separator">&nbsp;</span>
                                            <div class="short-description">Thương hiệu nội thất ERADO vô cùng hân hạnh trở thành nhà tài trợ cho đêm </div>
                                            <a href="" class="news-view-more">Xem chi tiết</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                        <div class="news-item-wr">
                                            <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/noi-that-erado-nha-tai-tro-vang-liveconcert-my-tam-jimmii-nguyen.jpg" alt="" class="img-responsive news-image"></a>
                                            <a href="" class="news-title">Nội thất ERADO - Nhà Tài Trợ Vàng LiveConcert "Mỹ Tâm - Jimmii</a>
                                            <span class="line-separator">&nbsp;</span>
                                            <div class="short-description">Thương hiệu nội thất ERADO vô cùng hân hạnh trở thành nhà tài trợ cho đêm </div>
                                            <a href="" class="news-view-more">Xem chi tiết</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                        <div class="news-item-wr">
                                            <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/noi-that-erado-nha-tai-tro-vang-liveconcert-my-tam-jimmii-nguyen.jpg" alt="" class="img-responsive news-image"></a>
                                            <a href="" class="news-title">Nội thất ERADO - Nhà Tài Trợ Vàng LiveConcert "Mỹ Tâm - Jimmii</a>
                                            <span class="line-separator">&nbsp;</span>
                                            <div class="short-description">Thương hiệu nội thất ERADO vô cùng hân hạnh trở thành nhà tài trợ cho đêm </div>
                                            <a href="" class="news-view-more">Xem chi tiết</a>
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