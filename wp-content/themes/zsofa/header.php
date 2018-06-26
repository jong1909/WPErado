<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Home Page</title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ; ?>/assets/images/template/fav.ico.png">
    <link rel="apple-touch-icon image_src" href="<?php echo get_template_directory_uri() ; ?>/assets/images/template/fav.ico.png">
    <?php wp_head(); ?>
</head>
<body>
<?php do_action( 'zsofa_before_site' ); ?>
<!-- Begin Header -->
<div id="overlay-region"></div>
<div class="main-site">
	<header id="header" class="clearfix">
		<div class="top-nav">
			<div class="container">
				<div class="top-nar-wraper row">
					<div class="col-md-4 face-book-link">
						<ul class="clearfix">
							<li class="famous-people"><a href="">Người nổi tiếng chọn Erado</a></li>
							<li class="facebook-like"><script type="text/javascript">document.write('<div class="fb-like" data-send="false" data-layout="button_count" data-width="30" data-show-faces="false"></div>');</script></li>
						</ul>
					</div>
					<div class="col-md-6 about-us-info">
						<ul>
							<li><a href="">Lịch sử phát triển Erado</a></li>
							<li><a href="">Tầm nhìn, sứ mệnh</a></li>
							<li><a href="">Tuyển Dụng</a></li>
							<li><a href="">Góc báo Chí</a></li>
							<li><a href="">Tin mới nhất</a></li>
						</ul>
					</div>
					<div class="col-md-2 sell-with-us">
						<a href="">Bán hàng cùng Erado</a>
					</div>
				</div>

			</div>
			
		</div>
		<div class="header-middle">
			<div class="container">
				<div class="header-middle-wrapper row">
					<div class="col-md-3 col-ssmm-7 col-ssm-7 shop-logo">
						<a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/logo.jpg" class="img-responsive" alt=""></a>
					</div>
					<div class="col-md-5 col-ssmm-12 col-ssm-12 main-search-box">
						<form action="" id="search-product">
							<input type="text" placeholder="Nhập từ khóa tìm kiếm">
							<input type="submit" alt="search">
						</form>

					</div>
					<div class="col-md-4 store-support">
						<div class="col-md-6 hotline">
							<div class="hotline-tilte">Hotline :</div>
							<div class="hotline-num">0976.529.529</div>
						</div>
						<div class="col-md-6 user-login">
							<div class="float-right user-login-wrapper">
								<div class="login"><a href="">Đăng nhập</a></div>
								<div class="register"><a href="">Đăng ký tài khoản</a></div>
							</div>							
						</div>
					</div>
				</div>
				
				<div class="search-box-mobile col-ssmm-12 col-ssm-12 main-search-box">
                    <form action="" id="search-product">
                        <input type="text" placeholder="Nhập từ khóa tìm kiếm">
                        <input type="submit" alt="search">
                    </form>

                </div>				
			</div>
			<div class="header-middle-wrapper row menu-mobile-wrapper">
                <div class="col-ssmm-3 col-ssm-3 mega-menu-mobile">
                    <div class="mobile-menu-icon">
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <ul class="sub-menu">
                        <li class="user-register">                        
                            <a class="register" href="">Đăng ký tài khoản</a><a class="login" href="">Đăng nhập</a></li>
                        <li class="home-link"><a href="">Trang chủ</a></li>
                        <li class="special-subject-link"><a href="">Chuyên đề ERADO</a></li>
                        <li class="chairs-link"><a href="">Ghế sofa</a></li>
                        <li class="furniture-link"><a href="">Chuyên đề nội thất</a></li>
                        <li class="special-link"><a href="">Nội thất</a></li>
                        <li class="bed-link"><a href="">Giường ngủ</a></li>
                        <li class="decor-link"><a href="">Trang trí nhà đẹp</a></li>
                        <li class="decorating-goods-link"><a href="">Hàng trang trí</a></li>
                        <li class="carpet-link"><a href="">Thảm trải sàn</a></li>
                        <li class="promotion-link"><a href="">Khuyến mãi</a></li>
                        <li class="video-link"><a href="">Video</a></li>
                    </ul>
                </div>
                <div class="mobile-top-hotline">
                    <div class="hotline-num">0976.529.529</div>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6 shop-logo">
                    <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/logo.jpg" class="img-responsive" alt=""></a>
                </div>
                <div class="col-ssmm-3 col-ssm-3 show-destop-screen">
                    <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/pc.png" alt=""></a>
                </div>

            </div>		
		</div>
		<div class="main-magemenu">
			<div class="container">
				<ul class="cont-megamenu">
					<li class="homepage"><a href="">Trang chủ</a></li>
					<li><a href="">Ghế sofa</a>
					    <div class="sub-menu">
                            <div class="row">
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa nỉ</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa da</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa vải</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa góc</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa đẹp</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa cafe</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa văng</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa giường</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa hà nội</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa cổ điển</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa da thật</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa cao cấp</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa karaoke</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa gia đình</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa hàn quốc</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa văn phòng</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa phòng ngủ</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa phòng khách</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Bàn kính sofa</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Sofa chung cư</a></div>
                            </div>
                        </div>
					</li>
					<li><a href="">Giường ngủ</a></li>
					<li><a href="">Nội thất</a>
					    <div class="sub-menu">
                            <div class="row">
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Ghế thư giãn</a>
                                    <ul>
                                        <li><a href="">Ghế Thư Giãn Jula</a></li>
                                        <li><a href="">Ghế Thư Giãn Ceri</a></li>
                                        <li><a href="">Ghế Thư Giãn Label</a></li>
                                        <li><a href="">Ghế thư giãn Metropolitan</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Nội thất phòng khách</a>
                                
                                    <ul>
                                        <li><a href="">Bàn Trà - Kệ Ti vi</a></li>
                                        <li><a href="">Bàn Trà Bruno</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Nội thất phòng bếp</a>
                                    <ul>
                                        <li><a href="">Bàn Ghế Ăn</a></li>
                                        <li><a href="">Bát đĩa gốm sứ cao cấp</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Nội thất phòng ngủ</a>
                                    <ul>
                                        <li><a href="">Giường ngủ ERADO</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
					</li>
					<li><a href="">Hàng trang trí</a>
					    <div class="sub-menu">
                            <div class="row">
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Gối trang trí</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Lọ Hoa Để Bàn</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Trang trí tường</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Đồ trang trí nội thất</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Đôn trang trí</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Đồng hồ trang trí</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Tranh treo tường</a></div>                                
                            </div>
                        </div>
					</li>
					<li><a href="">Thảm trải sàn</a>
					    <div class="sub-menu">
                            <div class="row">
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Thảm Trang Trí</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Thảm lông cừu</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Thảm trải sàn tấm ghép</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Thảm trải sàn Bỉ</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Thảm trải sàn Mỹ</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Thảm trải sàn thái lan</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Thảm trải sàn Trung Quốc</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Thảm trải sàn Indonesia</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Thảm trải sàn khách sạn</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Thảm trải sàn Malaysia</a></div>                                
                            </div>
                        </div>
					</li>
					<li><a href="">Sự khác biệt Erado</a></li>
					<li class="hot-deal"><a href="">Khuyến mãi</a></li>
					<li><a href="">Video</a>
					    <div class="sub-menu">
                            <div class="row">
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Video sản phẩm sofa</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Video sản phẩm bàn ăn</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Video sản phẩm bàn kệ tivi</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Video sản phẩm giường ngủ</a></div>
                                <div class="col-md-3 col-ssm-4 col-ssmm-6"><a href="">Video sản phẩm ghế thư giãn</a></div>                               
                            </div>
                        </div>
					</li>					
				</ul>
			</div>			
		</div>

	</header><!-- End header -->
		<div id="wrapper" class="listing-page-wrapper products-list-page product-detail-page listing-page-wrapper news-page news-detail-page">
            <div id="content-wrapper">