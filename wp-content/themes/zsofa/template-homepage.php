<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package zsofa
 */

get_header(); ?>
	<div id="wrapper">
		<div id="content-wrapper">
			<div class="section1 slider">
				<div id="main-slider">
				  <?php echo do_shortcode( '[rev_slider alias="home-page-slider"]' );  ?>
				</div>
			</div>
			<div class="section1 slider-mobile slider">
				<div id="main-mobile-slider" class="flexslider">
				  <ul class="slides">
				    <li>
				      <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/g159.jpg" />
				    </li>
				    <li>
				      <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/g155.jpg" />
				    </li>
				    <li>
				      <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/g144.jpg" />
				    </li>
				    <li>
				      <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/g127.jpg" />
				    </li>
				    <li>
				      <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/g128.jpg" />
				    </li>
				    <li>
				      <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/g125.jpg" />
				    </li>
				    <li>
				      <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/g126.jpg" />
				    </li>
				    <li>
				      <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/g130.jpg" />
				    </li>
				    <li>
				      <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/g129.jpg" />
				    </li>
				     <li>
				      <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/g131.jpg" />
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
            <?php get_template_part( 'template-parts/store', 'services' ); ?>
			<?php get_template_part( 'template-parts/product', 'video' ); ?>
			<div class="section4 featured-products">
				<div class="container">
					<div class="fea-title">Dòng sản phẩm nổi bật</div>
					<div class="fea-product-content row">
						<div class="col-md-3 col-ssmm-6 col-ssm-6 active">
							<a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ghe-thu-gian.png" alt=""></a>
							<div class="feature-cont-wrapper">
								<div class="catalog-title"><a href="/danh-muc/ghe-sofa-thu-gian/">Ghế Thư Giãn</a></div>
								<p class="fea-cata-content">
									Các dòng ghế thư giãn cao cấp nhập khẩu với thiết kế hiện đại mang đến vẻ đẹp cho không gian sống và sự trải nghiệm tối ưu khi sử dụng
								</p>
							</div>
							
						</div>
						<div class="col-md-3 col-ssmm-6 col-ssm-6">
							<a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ghe-sofa.jpg" alt=""></a>
							<div class="feature-cont-wrapper">
								<div class="catalog-title"><a href="/danh-muc/ghe-sofa/">Ghế Sofa</a></div>
								<p class="fea-cata-content">
									Điều gì khiến: Hoa hậu Kỳ Duyên và Á hậu Huyền My cùng nghệ sỹ Quang Tèo, đạo diễn Bình Trọng cùng hàng nghìn khách hàng đã chọn mua: nội thất, bàn ghế sofa Erado ? Bấm xem
								</p>
							</div>
							
						</div>
						<div class="col-md-3 col-ssmm-6 col-ssm-6">
							<a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/noi-that.jpg" alt=""></a>
							<div class="feature-cont-wrapper">
								<div class="catalog-title"><a href="/danh-muc/noi-that/">Nội thất</a></div>
								<p class="fea-cata-content">
									Bàn trà, Kệ tivi, Bàn ghế ăn, Giường da... với kiểu dáng thiết kế đẹp, hiện đại, sang trọng và tinh tế. Mầu sắc theo đúng xu hướng, không lo sợ bị lỗi mốt cùng chất liệu hạng sang
								</p>
							</div>
							
						</div>
						<div class="col-md-3 col-ssmm-6 col-ssm-6">
							<a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/giuong-ngu.png" alt=""></a>
							<div class="feature-cont-wrapper">
								<div class="catalog-title"><a href="/danh-muc/giuong-cao-cap/">Giường ngủ</a></div>
								<p class="fea-cata-content">
									Giường Ngủ da thật cao cấp mang đậm phong cách châu Âu
								</p>
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

<?php call_template_path('product','GHẾ SOFA',20,'ghe-sofa','rand','sofa'); ?>
<?php call_template_path('product','Nội thất',12,'noi-that','rand','furniture'); ?>
<?php call_template_path('product','Sofa giường',8,'sofa-giuong','rand','bed'); ?>
<?php call_template_path('product','Thảm thổ nhĩ kỳ',8,'tham-tho-nhi-ky','rand','decorations'); ?>
<?php call_template_path('product','Thảm trải sàn',8,'tham-sofa','rand','carpet'); ?>
			<div class="store-connect-mobile">
			    <h3>Kết nối với Zsofa</h3>
			</div>
			<div style="width:375px;margin:auto;"><div class="fb-page fb_iframe_widget fb_iframe_widget_fluid" data-href="https://www.facebook.com/sieuthinoithatrosano" data-adapt-container-width="true" data-tabs="timeline" data-show-facepile="true" data-width="375" data-height="300" data-colorscheme="light" data-show-faces="1" data-header="1" data-stream="1" data-show-border="1" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=&amp;color_scheme=light&amp;container_width=375&amp;height=300&amp;href=https%3A%2F%2Fwww.facebook.com%2Fsieuthinoithatrosano&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;tabs=timeline&amp;width=375"><span style="vertical-align: bottom; width: 375px; height: 300px;"><iframe name="fff68f6c7fd7ac" width="375px" height="300px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FmAiQUwlReIP.js%3Fversion%3D42%23cb%3Df880af12b2f314%26domain%3Derado.vn%26origin%3Dhttp%253A%252F%252Ferado.vn%252Ffad893aac5b54%26relation%3Dparent.parent&amp;color_scheme=light&amp;container_width=375&amp;height=300&amp;href=https%3A%2F%2Fwww.facebook.com%2Fsieuthinoithatrosano&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;tabs=timeline&amp;width=375" style="border: none; visibility: visible; width: 375px; height: 300px;" class=""></iframe></span></div></div>
    <?php get_template_part( 'template-parts/product','categories' ); ?>
    <?php get_template_part( 'template-parts/store','news' ); ?>
    <?php get_template_part( 'template-parts/news','letter' ); ?>
	<?php
get_footer();