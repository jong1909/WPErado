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
				<div id="product-list-slider" class="flexslider">
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
			<div class="products-list-content">
			    <div class="row">
			        <div class="container">
			            <div class="col-ssmm-12 col-ssm-12 col-md-3 col-left-pr">
                            <div class="product-type">
                                <h2 class="product-type-title">Ghế sofa</h2>
                                <ul>
                                    <li><a href="">Sofa nỉ</a></li>
                                    <li><a href="">Sofa da</a></li>
                                    <li><a href="">Sofa vải</a></li>
                                    <li><a href="">Sofa góc</a></li>
                                    <li><a href="">Sofa đẹp</a></li>
                                    <li><a href="">Sofa cafe</a></li>
                                    <li><a href="">Sofa văng</a></li>
                                    <li><a href="">Sofa giường</a></li>
                                    <li><a href="">Sofa hà nội</a></li>
                                    <li><a href="">Sofa cổ điển</a></li>
                                    <li><a href="">Sofa da thật</a></li>
                                    <li><a href="">Sofa cao cấp</a></li>
                                    <li><a href="">Sofa karaoke</a></li>
                                    <li><a href="">Sofa gia đình</a></li>
                                    <li><a href="">Sofa hàn quốc</a></li>
                                    <li><a href="">Sofa văn phòng</a></li>
                                    <li><a href="">Sofa phòng ngủ</a></li>
                                    <li><a href="">Sofa phòng khách</a></li>
                                    <li><a href="">Bàn kính sofa</a></li>
                                    <li><a href="">Sofa chung cư</a></li>
                                </ul>
                            </div>
			                <div class="price-ranges clearfix">
			                    <h2 class="price-ranges-tile">Chọn giá</h2>
			                    <ul>
			                        <li><a href="">Dưới 10 triệu</a></li>
			                        <li><a href="">Từ 10 - 20 triệu</a></li>
			                        <li><a href="">Từ 20 - 30 triệu</a></li>
			                        <li><a href="">Từ 30 - 40 triệu</a></li>
			                        <li><a href="">Từ 40 - 55 triệu</a></li>
			                    </ul>
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
			                    <ul class="clearfix">
			                        <li><a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-that-phoi-go-den-tu-thuong-hieu-noi-that-erado.png" alt=""></a><a class="summary-content" href="">Sức hút từ bộ sưu tập sofa da thật phối gỗ của thương hiệu nội thất </a></li>
			                        <li><a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ghe-sofa-thong-minh-voi-ngan-keo-ra-thanh-giuong.png" alt=""></a><a class="summary-content" href="">Ghế sofa thông minh với ngăn kéo ra thành giường</a></li>
			                        <li><a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/me-man-voi-nhung-mau-ghe-sofa-cho-chung-cu-nho.png" alt=""></a><a class="summary-content" href="">Mê mẩn với những mẫu ghế sofa cho chung cư nhỏ</a></li>
			                    </ul>
			                </div>
			                <div class="ext-banner clearfix">
                                <?php dynamic_sidebar('zsofawidget-banner-right-column'); ?>
			                </div>
			            </div>
			            <div class="col-ssmm-12 col-ssm-12 col-md-9 col-right-pr">
			                <div class="bread-crumb-cat clearfix">
			                    <ul>
			                        <li><a href="">Home</a></li>
			                        <li><a href="">Ghế sofa</a></li>
			                    </ul>			                    
			                </div>
			                <h3 class="general-introduction">Điều gì khiến Á hậu Huyền My Chọn Mua Sofa Erado ?</h3>
                            <div class="cont-description">
                                <p>
                                    Á hậu Huyền My chia sẻ khi chọn mua nội thất gia đình: <i>"Ba mẹ giao cho Huyền My lựa chọn nội thất cho căn hộ mới mua, My đã đi xem ở nhiều nơi, nhiều showroom nội thất tại Hà Nội và My đã quyết định chọn mua nội thất Erado"</i>.
                                </p>
                                <img class="category-banner img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/banner-danhmuc-ghesofa.jpg" alt="">
                                <h5>VỚI SOFA ERADO MY CHỌN</h5>
                                <ul class="list-choice">
                                    <li>Mẫu sofa da thiết kế theo phong cách châu âu: sang trọng và lịch lãm</li>
                                    <li>Vật liệu hạng sang nhập khẩu bọc sofa được ERADO nghiên cứu và lưạ chọn rất kĩ càng.</li>
                                    <li>Gam mầu thời trang không lỗi mốt, theo kịp với xu hướng nội thất.</li>
                                    <li>Độ thẩm mỹ hoàn hảo, vì My đã đi xem nhiều nơi và nhận thấy. </li>
                                    <li>Rõ ràng với kết cấu bên trong, ở ERADO được kiểm chứng và xác thực ngay tại showroom</li>
                                    <li>Rất nhiều sản phẩm sofa phòng khách ở showroom để cho khách hàng lựa chọn</li>
                                    <li>Thời gian bảo hành sản phẩm sofa ở đây lên đến 12 năm, lâu nhất trên thị trường</li>
                                    <li>Cơ sở vật chất rộng rãi sang trọng, đúng như thương hiệu công khai về cơ sở vật chất</li>
                                    <li>Tính năng chăm sóc sức khoẻ tích hợp trên sofa là giá trị vượt trội hơn các nơi khác ở hai góc độ: các điểm phần ngồi được tính toán theo các đốt trên cột sống người dùng ngả lưng và sofa ERADO đã chạm được các điểm trên cột sống và giảm mệt mỏi cho người dùng. </li>
                                </ul>
                                <div class="thanks-erado float-right">Cảm ơn nội thất ERADO!</div>
                            </div>
			                <div class="featured-category sofa clearfix">
                                    <div class="row list-products">
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-ssmm-6 col-ssm-6">
                                            <div class="product-wrapper">
                                                <a class="product-image image_blur" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/sofa-da-ma-569-8290.jpg" alt=""></a>

                                            </div>
                                            <div class="product-title-info"><a href="" class="product-link">Sofa da mã 569</a></div>
                                            <div class="product-price">
                                                <span class="tit-price">Giá: </span><span class="value-price">20,500,000</span><span class="currency-price"> VNĐ</span>
                                            </div>
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
			<div class="section5 promotions-reviews">
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
			<figure class="banner-middle">
				<div class="container">
                    <?php echo do_shortcode( '[rev_slider alias="banner-middle"]' ); ?>
				</div>
			</figure>
			<div class="section6 best-selling-products">
				<div class="container">
					<div class="best-sell-title">
						<h1>SẢN PHẨM <strong>ĐANG BÁN RẤT CHẠY</strong></h1>
					</div>
					<div class="mobile-best-sell-title hot-product-title">
						<h1>SẢN PHẨM BÁN CHẠY</h1>
					</div>
					<div class="row">
						<div class="col-md-4 col-ssmm-6 col-ssm-6 feature-product-wrapp">
							<div class="product-feature-title"><a href="">Ghế thư giãn Jula mã 01</a></div>
							<a class="wrapper-link" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-an-ma-t1608-6935.jpg" alt=""><span class="feature-price-sale">21.900</span></a>
							<div class="feature-price-real">25,000,000 <span class="currency">đ</span></div>
							
						</div>
						<div class="col-md-4 col-ssmm-6 col-ssm-6 feature-product-wrapp">
							<div class="product-feature-title"><a href="">Ghế thư giãn Jula mã 01</a></div>
							<a class="wrapper-link" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-an-ma-t1608-6935.jpg" alt=""><span class="feature-price-sale">21.900</span></a>
							<div class="feature-price-real">25,000,000 <span class="currency">đ</span></div>
							
						</div>
						<div class="col-md-4 col-ssmm-6 col-ssm-6 feature-product-wrapp">
							<div class="product-feature-title"><a href="">Ghế thư giãn Jula mã 01</a></div>
							<a class="wrapper-link" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-an-ma-t1608-6935.jpg" alt=""><span class="feature-price-sale">21.900</span></a>
							<div class="feature-price-real">25,000,000 <span class="currency">đ</span></div>
							
						</div>
						<div class="col-md-4 col-ssmm-6 col-ssm-6 feature-product-wrapp">
							<div class="product-feature-title"><a href="">Ghế thư giãn Jula mã 01</a></div>
							<a class="wrapper-link" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-an-ma-t1608-6935.jpg" alt=""><span class="feature-price-sale">21.900</span></a>
							<div class="feature-price-real">25,000,000 <span class="currency">đ</span></div>
							
						</div>
						<div class="col-md-4 col-ssmm-6 col-ssm-6 feature-product-wrapp">
							<div class="product-feature-title"><a href="">Ghế thư giãn Jula mã 01</a></div>
							<a class="wrapper-link" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-an-ma-t1608-6935.jpg" alt=""><span class="feature-price-sale">21.900</span></a>
							<div class="feature-price-real">25,000,000 <span class="currency">đ</span></div>
							
						</div>
						<div class="col-md-4 col-ssmm-6 col-ssm-6 feature-product-wrapp">
							<div class="product-feature-title"><a href="">Ghế thư giãn Jula mã 01</a></div>
							<a class="wrapper-link" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/ban-an-ma-t1608-6935.jpg" alt=""><span class="feature-price-sale">21.900</span></a>
							<div class="feature-price-real">25,000,000 <span class="currency">đ</span></div>
							
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
    <?php get_template_part('template-parts/news', 'letter'); ?>
		
	<?php
get_footer();