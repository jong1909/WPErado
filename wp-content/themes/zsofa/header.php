<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri() ; ?>/assets/images/template/fav.ico.png?v=2">
    <link rel="apple-touch-icon image_src" type="image/png" href="<?php echo get_template_directory_uri() ; ?>/assets/images/template/fav.ico.png?v=2">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'zsofa_before_site' ); ?>
<!-- Begin Header -->
<div id="overlay-region"></div>
<div id="overlay-region-pr"></div>
<div class="main-site">
	<header id="header" class="clearfix">
		<div class="top-nav">
			<div class="container">
				<div class="top-nar-wraper row">
					<div class="col-md-4 face-book-link">
						<ul class="clearfix">
							<li class="famous-people"><a href="">Người nổi tiếng chọn Zsofa</a></li>
							<li class="facebook-like"><div class="fb-like" data-href="https://www.facebook.com/zsofavn2/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div></li>
						</ul>
					</div>
					<div class="col-md-6 about-us-info">
                        <?php wp_nav_menu( array( 'menu' => 'Primary Navigation' ) ); ?>
					</div>
					<div class="col-md-2 sell-with-us">
						<a href="/tuyen-dung/">Tuyển Dụng</a>
					</div>
				</div>

			</div>
			
		</div>
		<div class="header-middle">
			<div class="container">
				<div class="header-middle-wrapper row">
					<div class="col-md-3 col-ssmm-7 col-ssm-7 shop-logo">
						<a href="/"><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/zsofa_logo.png" class="img-responsive" alt=""></a>
					</div>
					<div class="col-md-5 col-ssmm-12 col-ssm-12 main-search-box">
						<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
					</div>
					<div class="col-md-4 store-support">
						<div class="col-md-6 hotline">
							<div class="hotline-tilte">Hotline :</div>
							<div class="hotline-num">0975.488.488</div>
						</div>
						<div class="col-md-6 user-login">
							<div class="float-right user-login-wrapper">
								<div class="login"><?php echo do_shortcode( '[llrmloginlogout]' );?></div>
								<div class="register"><?php echo do_shortcode( '[llrmregister]' );?></div>
							</div>							
						</div>
					</div>
				</div>
				
				<div class="search-box-mobile col-ssmm-12 col-ssm-12 main-search-box">
                    <?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
                </div>				
			</div>
			<div class="header-middle-wrapper row menu-mobile-wrapper">
                <div class="col-ssmm-3 col-ssm-3 mega-menu-mobile">
                    <div class="mobile-menu-icon">
                        <ul>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                        </ul>
                    </div>
                    <div class="menu-mobile-contents">
                        <div class="member-login">
                            <div class="mobile-login col-ssmm-6 col-ssm-6"><?php echo do_shortcode( '[llrmloginlogout]' );?></div>
                            <div class="mobile-register col-ssmm-6 col-ssm-6"><?php echo do_shortcode( '[llrmregister]' );?></div>
                        </div>
                        <?php wp_nav_menu( array( 'menu' => 'Mobile main menu','menu_class' => 'sub-menu' ) ); ?>
                    </div>
                </div>
                <div class="mobile-top-hotline">
                    <a class="hotline-num" href="tel:0933322804">&nbsp;</a>
                </div>
                <div class="col-md-3 col-ssmm-6 col-ssm-6 shop-logo">
                    <a href="/"><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/zsofa_logo.png" class="img-responsive" alt=""></a>
                </div>
                <div class="col-ssmm-3 col-ssm-3 show-destop-screen">
                    <a href=""><img src="<?php echo get_template_directory_uri() ; ?>/assets/images/pc.png" alt=""></a>
                </div>

            </div>		
		</div>
		<div class="main-magemenu">
			<div class="container">
				<?php wp_nav_menu( array( 'theme_location' => 'primary-menu','menu' => 'Main Menu','menu_class' => 'cont-megamenu' ) ); ?>
			</div>			
		</div>

	</header><!-- End header -->
		<div id="wrapper" class="listing-page-wrapper products-list-page product-detail-page listing-page-wrapper news-page news-detail-page">
            <div id="content-wrapper">