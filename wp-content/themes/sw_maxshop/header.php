<?php $box_layout = ya_options()->getCpanelValue('layout'); ?>
<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
<div class="body-wrapper theme-clearfix<?php echo ( $box_layout == 'boxed' )? ' box-layout' : '';?> ">
<?php 
	$colorset = ya_options()->getCpanelValue('scheme');
	$header_style = ya_options()->getCpanelValue('header_style');
if ($header_style == 'default'){
?>
<header id="header" role="banner" class="header">
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1241753019230315');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1241753019230315&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1011087145647321";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


    <div class="header-msg">
        <div class="container">
        <?php if (is_active_sidebar_YA('top')) {?>
            <div id="sidebar-top" class="sidebar-top">
                <?php dynamic_sidebar('top'); ?>
            </div>
        <?php }?>
        </div>
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
			<?php if (is_active_sidebar_YA('top-header')) {?>
				<div id="sidebar-top-header" class="sidebar-top-header">
						<?php dynamic_sidebar('top-header'); ?>
				</div>
			<?php }?>
		</div>
	</div>
</header>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '231487294076853');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=231487294076853&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<?php if ( has_nav_menu('primary_menu') ) {?>
	<!-- Primary navbar -->
<div id="main-menu" class="main-menu">
	<nav id="primary-menu" class="primary-menu" role="navigation">
		<div class="container">
			<div class="mid-header clearfix">
				<a href="#" class="phone-icon-menu"></a>
				<div class="navbar-inner navbar-inverse">
						<?php
							$menu_class = 'nav nav-pills';
							if ( 'mega' == ya_options()->getCpanelValue('menu_type') ){
								$menu_class .= ' nav-mega';
							} else $menu_class .= ' nav-css';
						?>
						<?php wp_nav_menu(array('theme_location' => 'primary_menu', 'menu_class' => $menu_class)); ?>
				</div>
				<?php if (is_active_sidebar_YA('top-menu')) {?>
					<div id="sidebar-top-menu" class="sidebar-top-menu">
							<?php dynamic_sidebar('top-menu'); ?>
					</div>
				<?php }?>
			</div>
		</div>
	</nav>
</div>
	<!-- /Primary navbar -->
<?php 
	}
} else {
    echo '<div class="header-' . $header_style . '">';
    get_template_part('templates/header', $header_style);
    echo '</div>';
}	
?>

<div id="main" class="theme-clearfix" role="document">
<?php

	if (function_exists('ya_breadcrumb')){
		ya_breadcrumb('<div class="breadcrumbs theme-clearfix"><div class="container">', '</div></div>');
	} 

?>

