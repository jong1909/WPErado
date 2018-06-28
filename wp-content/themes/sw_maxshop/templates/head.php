<!DOCTYPE html>
<?php
	$direction = ya_options()->getCpanelValue('direction');
?>
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>         <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> <?php if( $direction == 'rtl' ){echo 'dir="rtl"';}; ?>> <!--<![endif]-->
<head>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '1133033793423747');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1133033793423747&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php
	$wp_version = get_bloginfo( 'version' );
	if ( version_compare( $wp_version, '4.1', '<' ) ) { ?>
		<title><?php wp_title('|', true, 'right'); ?></title>
	<?php } ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="google-site-verification" content="3zK6SjvFH1wFurFQiuB3UG1dkUOkT7HLEJTwBjThwd4" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url( home_url()); ?>/feed/">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/sw_maxshop/menu/css/default.css" />
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/sw_maxshop/menu/css/component.css" />
	<?php wp_head(); ?>

<script>
// ViewContent
// Track key page views (ex: product page, landing page or article)
fbq('track', 'ViewContent');

// Search
// Track searches on your website (ex. product searches)
fbq('track', 'Search');

// AddToCart
// Track when items are added to a shopping cart (ex. click/landing page on Add to Cart button)
fbq('track', 'AddToCart');

// AddToWishlist
// Track when items are added to a wishlist (ex. click/landing page on Add to Wishlist button)
fbq('track', 'AddToWishlist');

// InitiateCheckout
// Track when people enter the checkout flow (ex. click/landing page on checkout button)
fbq('track', 'InitiateCheckout');

// AddPaymentInfo
// Track when payment information is added in the checkout flow (ex. click/landing page on billing info)
fbq('track', 'AddPaymentInfo');

// Purchase
// Track purchases or checkout flow completions (ex. landing on "Thank You" or confirmation page)
fbq('track', 'Purchase', {value: '1.00', currency: 'USD'});

// Lead
// Track when a user expresses interest in your offering (ex. form submission, sign up for trial, landing on pricing page)
fbq('track', 'Lead');

// CompleteRegistration
// Track when a registration form is completed (ex. complete subscription, sign up for a service)
fbq('track', 'CompleteRegistration');

// Other
// 
fbq('track', 'Other');
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71044493-1', 'auto');
  ga('send', 'pageview');

</script>

<script src="/wp-content/themes/sw_maxshop/menu/js/modernizr.custom.js"></script>

<style>

</style>

</head>
