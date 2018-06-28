<?php 
	$colorset = ya_options()->getCpanelValue('scheme');
	$phone = ya_options() ->getCpanelValue('phone');
	$search = ya_options()->getCpanelValue('search');
?>
<header id="header" role="banner" class="header">
    <div class="header-msg">
        <div class="container">
		<div class="pull-left menu-top-link">
			<a href="http://zsofa.vn/">Trang chủ</a>
			<a href="http://zsofa.vn/ghe-sofa-khuyen-mai/">Khuyến mãi</a>
			<a href="http://zsofa.vn/kiem-tra-bao-hanh-online/">Kiểm tra bảo hành</a>
			<a href="http://zsofa.vn/kiem-tra-tinh-trang-don-hang/">Check tình trạng giao hàng</a>
			<a href="http://zsofa.vn/about-us/">Về zSOFA.vn</a>
			<a href="http://zsofa.vn/tuyen-dung/">Tuyển dụng</a>
			<a href="http://zsofa.vn/phan-hoi-khach-hang">Góp ý - Cảm ơn</a>
		</div>
        <?php if (is_active_sidebar_YA('top')) {?>
            <div id="sidebar-top" class="sidebar-top">
                <?php dynamic_sidebar('top'); ?>
            </div>
        <?php }?>
        </div>
    </div>
	
	<div class="">
			<p>
				<a href="http://zsofa.vn/ghe-sofa-khuyen-mai/"><img src="http://zsofa.vn/wp-content/uploads/home/sofa-khuyen-mai.png" title="Sofa khuyến mãi đến 50%" alt="Sofa khuyến mãi đến 50%" style="display: block; margin: auto;" rel="display: block; margin: auto;"></a>
			</p>
	</div>
		
	<div class="container">
		<div class="top-header">
			<div class="ya-logo pull-left">
				<a  href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if(ya_options()->getCpanelValue('sitelogo')){ ?>
							<img src="<?php echo esc_attr( ya_options()->getCpanelValue('sitelogo') ); ?>" alt="<?php bloginfo('name'); ?>"/>
						<?php }else{
							if ($colorset){$logo = get_template_directory_uri().'/assets/img/logo-'.$colorset.'.png';}
							else $logo = get_template_directory_uri().'/assets/img/logo-default.png';
						?>
							<img src="<?php echo esc_attr( $logo ); ?>" alt="<?php bloginfo('name'); ?>"/>
						<?php } ?>
				</a>
			</div>
		
				<div id="sidebar-top-header" class="sidebar-top-header">
						<?php if($phone != '') {?>
						<div class="box-contact-email-phone">
						<h2><?php _e('HOT LINE:','yatheme') ;?></h2>
						<a href="#" title="Call: <?php echo esc_attr( $phone ) ?>"><?php echo esc_html( $phone ) ?></a>
					</div>
						<?php }?>
					<?php get_template_part( 'woocommerce/minicart-ajax-style1' ); ?>
				</div>
			
		</div>
	</div>
<div class="yt-header-under">
<div class="container">
<div class="row yt-header-under-wrap">
<div class="yt-main-menu col-md-12">
	<?php if ( has_nav_menu('primary_menu') ) {?>
	<!-- Primary navbar -->
<div id="main-menu" class="main-menu">
	<nav id="primary-menu" class="primary-menu" role="navigation">
			<div class="mid-header clearfix">
				<a href="#" class="phone-icon-menu"></a>
				<div class="navbar-inner navbar-inverse">
						<?php
							$menu_resclass 	= ya_options() -> getCpanelValue( 'menu_visible' );
							$menu_class 	= 'nav nav-pills'.' '.$menu_resclass;
							if ( 'mega' == ya_options()->getCpanelValue('menu_type') ){
								$menu_class .= ' nav-mega';
							} else $menu_class .= ' nav-css';
						?>
						<?php wp_nav_menu(array('theme_location' => 'primary_menu', 'menu_class' => $menu_class)); ?>
				</div>
					<div id="sidebar-top-menu" class="sidebar-top-menu">
							<?php if($search !='') {?>
						<div class="widget ya_top-3 ya_top non-margin"><div class="widget-inner">
	                         <?php get_template_part( 'widgets/ya_top/searchcate' ); ?>
						</div></div>
					<?php }?>
					</div>
			</div>
		
	</nav>
</div>
	<!-- /Primary navbar -->
<?php 
	} 
?>
</div>
</div>
</div>
</div>
		
</header>

<header class="header2" class="nav-down">

<div class="container demo-1">	
	<div id="dl-menu" class="dl-menuwrapper">
		<button class="dl-trigger">Open Menu</button>
		<ul class="dl-menu">
			<li><a href="http://zsofa.vn/">Trang chủ</a></li>
			<li>
				<a href="http://zsofa.vn/sofa-gia-re/">Sản phẩm</a>
				<ul class="dl-submenu">
					<li><a href="http://zsofa.vn/danh-muc/ghe-sofa/">-Ghế sofa</a></li>
					<li><a href="http://tham.zsofa.vn/">-Thảm trang trí TNK</a></li>
					<li><a href="http://zsofa.vn/danh-muc/ban-sofa/" selected="selected">-Bàn sofa</a></li>
					<li><a href="http://zsofa.vn/danh-muc/ghe-sofa-cao-cap/">-Ghế sofa cao cấp</a></li>
					<li><a href="http://zsofa.vn/danh-muc/ghe-sofa-thu-gian/">-Ghế sofa thư giản</a></li>
					<li><a href="http://zsofa.vn/danh-muc/ke-tivi/">-Kệ Tivi</a></li>
					<li><a href="http://zsofa.vn/danh-muc/sofa-cafe-karaoke/">-Sofa cafe – karaoke</a></li>
					<li><a href="http://zsofa.vn/danh-muc/sofa-gia-re/">-Sofa giá rẻ</a></li>
					<li><a href="http://zsofa.vn/danh-muc/sofa-giuong/">-Sofa giường</a></li>
					<li><a href="http://zsofa.vn/danh-muc/sofa-goc-gia-re/">-Sofa góc</a></li>
					<li><a href="http://zsofa.vn/danh-muc/sofa-khuyen-mai/">-Sofa khuyến mãi</a></li>
					<li><a href="http://zsofa.vn/danh-muc/sofa-phong-khach/">-Sofa phòng khách</a></li>
					<li><a href="http://zsofa.vn/danh-muc/sofa-thu-gian/">-Sofa thư giãn</a></li>
					<li><a href="http://zsofa.vn/danh-muc/sofa-van-phong/">-Sofa văn phòng</a></li>
					<li><a href="http://zsofa.vn/danh-muc/sofa-co-dien/">-Sofa cổ điển</a></li>
					<li><a href="http://zsofa.vn/danh-muc/goi-ba-bau/">-Gối bà bầu zSOFA.vn</a></li>
				</ul>
			</li>
			<li>
				<a href="http://zsofa.vn/ghe-sofa-khuyen-mai/">Sofa khuyến mãi</a>
				<ul class="dl-submenu">
					<li><a href="http://zsofa.vn/ghe-sofa-khuyen-mai/">-Sofa khuyến mãi</a></li>
					<li><a href="http://zsofa.vn/ghe-sofa-gia-re-giam-den-50/">-Ghế sofa giá rẻ giảm đến 50%%</a></li>
				</ul>
			</li>	
			<li>
				<a href="http://zsofa.vn/sofa-dong-gia-59-trieu/">Đồng giá</a>
				<ul class="dl-submenu">
					<li><a href="http://zsofa.vn/sofa-bed-dong-gia/">-Sofa bed đồng giá 3,7 triệu</a></li>
					<li><a href="http://zsofa.vn/ban-sofa-dong-gia-chi-4-5-trieu-re-nhat-hcm/">-BÁN SOFA đồng giá chỉ 4.5 TRIỆU rẻ nhất HCM</a></li>
					<li><a href="http://zsofa.vn/sofa-dong-gia-59-trieu/">-Sofa đồng giá 5,9 triệu</a></li>
				</ul>
			</li>	
			<li><a href="http://zsofa.vn/tra-gop-khong-lai-suat/">Mua trả góp</a></li>
			<li><a href="http://zsofa.vn/lien-he/">Liên hệ</a></li>
		</ul>
		
		<div class="search-top-header">
			<form class="navbar-form" role="search" method="get" action="http://zsofa.vn/">
			<div class="input-group add-on">
			  <input class="form-control" placeholder="Tìm kiếm sản phẩm" value="" name="s" type="text">
			  <div class="input-group-btn">
				<button  class="btn btn-default btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				<input type="hidden" name="search_posttype" value="product">
			  </div>
			</div>
		  </form>
		</div>
		
		<div class="pull-right phone-num">
			<a href="tel:19006107" style='color:red'><i class="fa fa-phone" aria-hidden="true"></i>19006107</a>
		</div>
	</div><!-- /dl-menuwrapper -->
</div>
<script src="/wp-content/themes/sw_maxshop/menu/js/jquery.dlmenu.js"></script>
<script src="/wp-content/themes/sw_maxshop/menu/js/menu.js"></script>
</header>

