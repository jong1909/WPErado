//WCMD
function wcmd_isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

jQuery(document).ready(function($) {
 $('.wcmd-form').submit(function() {
    msg = '';
    $form = $(this);
    $form.find('.wcmd-validation').removeClass('av-success').hide();
    $form.find('.wcmd-validation').removeClass('av-error').hide();

    var terms_validation = true;
    if( wcmd.enable_terms_condition == 'yes' ) {
      if( $form.find('input[name=wcmd_terms_condition]').prop('checked') ==  false ) {
        terms_validation = false;
      }
    }


    if(wcmd_isEmail($form.find('.wcmd_email').val()) && terms_validation ) {
      $form.parents('.wcmd-form-wrapper,#wcmd_modal').find('.wcmd-loading ').show();
      $.post(
        wcmd.ajax_url,
        {email: $form.find('.wcmd_email').val(), fname: $form.find('.wcmd_fname').val(), lname: $form.find('.wcmd_lname').val(), action: 'wcmd_subscribe'},
        function(data) {
          var response = jQuery.parseJSON(data);
          $form.parents('.wcmd-form-wrapper,#wcmd_modal').find('.wcmd-loading ').hide();
          if( typeof response.status  !== "undefined" && response.status == 'error' ) {
            $form.find('.wcmd-validation').html(response.error).addClass('av-error').css('display','inline-block');
          }
          else if( typeof response.status  !== "undefined" && response.status =='success' && response.title == 'Invalid Resource' ) {
            $form.find('.wcmd-validation').html(response.detail).addClass('av-error').css('display','inline-block');
          }
          else{
            if( wcmd.close_time > 0 && $('.mfp-ready').length > 0 )
              setTimeout( wcmd_close_popup, wcmd.close_time*1000 );

            var SuccessMsg = wcmd.success;
            if( wcmd.double_optin !== 'yes' ) {
              var ResponseMsg = SuccessMsg.replace('{COUPONCODE}', response.coupon_code);
            }
            else {
              var ResponseMsg = SuccessMsg.replace('{COUPONCODE}', '');
            }
            $form.find('.wcmd-validation').html(ResponseMsg).addClass('av-success').css('display','inline-block');
			// Set Cookie
			$.cookie("wcmdSuccsess", "true", { expires : parseInt(wcmd.cookie_length), path: '/'});
            if( wcmd.signup_redirect == 'yes' && wcmd.redirect_url !== '' ) {
              window.setTimeout(function () {
                window.location.href = wcmd.redirect_url;
              }, wcmd.redirect_timeout*1000 );
            }
          }
      });
    }
    else {
      if( terms_validation ) 
        $form.find('.wcmd-validation').html( wcmd.valid_email ).addClass('av-error').css('display','inline-block');
      else 
        $form.find('.wcmd-validation').html( wcmd.terms_condition_error ).addClass('av-error').css('display','inline-block');
      
    }
    return false;
  });

});
//End
/*js begins*/
jQuery(document).ready(function($){
	"use strict";
	//Cart Login Expand
	$("body").on("click", ".av-cart-login-expand-form", function(e){
	  e.preventDefault();
	  $(this).hide();
	  $('#pt_login_form').show(300);
	  $('.av-forgot-p').show(300);
	});
	//End
	if($.cookie('fixedCTAclosed') !== 'true'){
		$('.av-fixed-cta').removeClass('closed');
	}
	// Hack to enable multiple modals by making sure the .modal-open class
    $("#pt-user-register").on('shown.bs.modal', function (e) {
      $('body').addClass('modal-open');
	  $('.av-fixed-cta').hide(300);
    });
    $("#pt-user-register").on('hidden.bs.modal', function (e) {
      $('body').removeClass('modal-open');
	  $('.av-fixed-cta').show(300);
    });
	$("body").on("click", ".av-fixed-cta-close", function(e){
	  e.preventDefault();
	  $('.av-fixed-cta').addClass('closed');
	  $.cookie("fixedCTAclosed", "true", { path: '/'});
	});
	$("body").on("click", ".av-fixed-cta.closed", function(e){
	  e.preventDefault();
	  $('.av-fixed-cta').removeClass('closed');
	});
	//
	 $(".av-foot-container #av-footer-video-modal").on('hidden.bs.modal', function (e) {
	   $(this).find("video").trigger('pause');
	 });
	 $(".av-foot-container #av-footer-video-modal").on('shown.bs.modal', function (e) {
	   $(this).find("video").trigger('play');
	 });
	//My Account Subscribe
	$('.av-myacc-submit-form').on('submit', function(e){
		e.preventDefault();
		var ids_checked = [];
		var ids_not_checked = [];
		$('.myacc-interests-checkbox:checked').each(function(i, e) {
			ids_checked.push($(this).attr('id'));
		});
		$('.myacc-interests-checkbox:not(:checked)').each(function(i, e) {
			ids_not_checked.push($(this).attr('id'));
		});
		$.ajax({
			type: 'POST',
            dataType: 'json',
            url: ptajax.ajaxurl,
			data: { 
				'action': 'mailchimpsubscribe', 
				'user_email': $('.filter-section').attr("data-email"),
				'ids_checked[]': ids_checked,
				'ids_not_checked[]': ids_not_checked
			},
			success: function(data){
				$('.av-login-bt').removeClass('loading');				
				$('.av-forgot-psw-messages').html(data.message);				
			}
		});
	});
	//Quiz Result Subscription
	if(getUrlParameter('av_mc_subscribe') === 'true'){
	  $('.av-quiz-rezults-wrapper .wcmd-form').submit();
	}
	//Checkout Order Received Form
	$('.woocommerce-order .wcmd-form').submit();
	//
    $('.av-related-products-slider').slick({
		lazyLoad: 'ondemand',
        slidesToShow: 5,
        slidesToScroll: 2,
        dots: false,
        focusOnSelect: false,
        infinite: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: false,
                    centerMode: false,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: false,
                    centerMode: false,
                }
            },
        ],
        prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
        nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
    });
	//
	// On after and init slide change
	//$('.av-single-product-slider').on('afterChange init', function(event, slick, currentSlide){
		 $("body").on("click", ".av-zoom-icon.av-zoom-clicked", function(e){
		  $('.av-zoom-icon').removeClass('av-zoom-clicked');
		 //var clicking = true;
		 //$('.av-single-product-slider').click(function() {
		  $(".av-single-product-slider .av-zoom" ).each(function() {
			  $(this).zoom({
				url: $(this).find('img').attr('data-zoom'),
				});
		  }); 
			 
			 
/*		 $(this).next().zoom({
			url: $(this).find('img').attr('data-zoom'),
			magnify: 1.3,
			on: 'mouseover'
		  });*/
		 //$(this).find('.av-zoom').trigger('mouseover'); 
		  //if (clicking) {
		  //$('.slick-current img').trigger('click');
			//clicking = false;
		  //}
			});
		/*$(this).find('.slick-current').zoom({
	      url: $(this).find('.slick-current img').attr('data-zoom'),
		  magnify: 1.3,
		  on: 'click'
		});*/
	//});
	//Product Page Main Slider
    $('.av-single-product-slider').slick({
        dots: false,
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
		draggable: false,
		speed: 200,
		fade: true,
        adaptiveHeight: false,
		accessibility: false,
		touchMove: false,
		asNavFor: '.av-single-product-slider-nav',
		arrows: false,
    });
	//Product Page Thumb Slider
    $('.av-single-product-slider-nav').slick({
        dots: false,
        infinite: false,
        slidesToShow: 8,
        slidesToScroll: 8,
        adaptiveHeight: false,
		asNavFor: '.av-single-product-slider',
		vertical: true,
		centerMode: false,
		focusOnSelect: true,
		accessibility: false,
		touchMove: false,
        prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
        nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
	    responsive: [
		{
		  breakpoint: 576,
		  settings: {
			vertical: false,
		  }
		}
	   ]
    });
	//
/*	$('.testimonials-slider').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  dots: false,
	  focusOnSelect: true,
	  infinite: true,
	  prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
	  nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
	});*/
	//
	$('.quantity-dropdown').select2({
		minimumResultsForSearch: -1,
		width: 180
	});
	$('#gift_amounts').select2({
		minimumResultsForSearch: -1,
		width: 160
	});
	$(".quantity-dropdown").on("change", function() {
		var Qty = $(this,"option:selected").val();
	  	$(this).parent().parent().find('.add-to-bag-product').attr('data-addtobagqty', Qty);
	});
	//
/*	$('.av-single-row-btf .tab-pane').on('hide.bs.collapse', function (e) {
			$(this).show().slideUp(100);
	});*/
	
	//////////////////////////////////////////////////////////////////////////////
	if(!$('.av-single-insp-slider-images').hasClass("slick-initialized")){
	  $('.av-single-insp-slider-images').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: false,
		focusOnSelect: true,
		infinite: true,
		asNavFor: '.av-single-insp-slider-text',
		prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
		nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
	  });
	}
	if(!$('.av-single-insp-slider-quotes').hasClass("slick-initialized")){
	  $('.av-single-insp-slider-quotes').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: false,
		adaptiveHeight: true,
		focusOnSelect: true,
		infinite: true,
		prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
		nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
	  });
	}
	if(!$('.av-single-insp-slider-text').hasClass("slick-initialized")){
	  $('.av-single-insp-slider-text').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: false,
			speed: 500,
			fade: true,
		adaptiveHeight: true,
		focusOnSelect: true,
		infinite: true,
		asNavFor: '.av-single-insp-slider-images',
		arrows: false,
	  });
	}
	$('.av-single-row-btf .tab-pane').on('shown.bs.collapse', function (e) {
		var target_tab = $(this).attr('data-target_tab');
	//Quotes
	if(target_tab === 'sia-nojax' && !$('.av-single-insp-slider-quotes').hasClass("slick-initialized")){
	  $('.av-single-insp-slider-quotes').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: false,
		adaptiveHeight: true,
		focusOnSelect: true,
		infinite: true,
		prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
		nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
	  });
	}
	//
	if(target_tab === 'sia-nojax' && !$('.av-single-insp-slider-images').hasClass("slick-initialized")){
	  $('.av-single-insp-slider-images').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: false,
		focusOnSelect: true,
		infinite: true,
		asNavFor: '.av-single-insp-slider-text',
		prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
		nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
	  });
	}
	//
	if(target_tab === 'sia-nojax' && !$('.av-single-insp-slider-text').hasClass("slick-initialized")){
	  $('.av-single-insp-slider-text').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: false,
			speed: 500,
			fade: true,
		adaptiveHeight: true,
		focusOnSelect: true,
		infinite: true,
		asNavFor: '.av-single-insp-slider-images',
		arrows: false,
	  });
	}
		/*$('html, body').animate({
			scrollTop: $('.tab-content').offset().top - 130
		}, 0);
		$(this).hide().slideDown(200);
		var target_tab = $(this).attr('data-target_tab');
		var product_id = $(this).attr('data-product_id');*/
		/*$.ajax({
			type: 'POST',
            url: ptajax.ajaxurl,
			data: { 
				'action': 'av_product_tabs',
				'target_tab': target_tab,
				'product_id': product_id
			},
			context: this,
			dataType: "html",
			cache: true,
			success: function(data){			
				$('#nav-'+target_tab).html(data);
				if(target_tab === 'specification' && !$('.testimonials-slider').hasClass("slick-initialized")){
				  $('#av-single-testimonials').on('shown.bs.modal', function (e) {
					$('.testimonials-slider').slick({
					  slidesToShow: 1,
					  slidesToScroll: 1,
					  dots: false,
					  focusOnSelect: true,
					  infinite: true,
					  prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
					  nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
					});
				  });
				 //Play pause video
				 $("#nav-specification #av-footer-video-modal").on('hidden.bs.modal', function (e) {
				   $(this).find("video").trigger('pause');
				 });
				 $("#nav-specification #av-footer-video-modal").on('shown.bs.modal', function (e) {
				   $(this).find("video").trigger('play');
				 });
				}
				else if(target_tab === 'sia' && !($('.av-single-insp-slider-images').hasClass("slick-initialized") || $('.av-single-insp-slider-text').hasClass("slick-initialized")) || $('.av-single-insp-slider-quotes').hasClass("slick-initialized")){
				  $('.av-single-insp-slider-images').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: false,
					focusOnSelect: true,
					infinite: true,
					asNavFor: '.av-single-insp-slider-text',
					prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
					nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
				  });
				  //
				  $('.av-single-insp-slider-text').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: false,
						speed: 500,
						fade: true,
					adaptiveHeight: true,
					focusOnSelect: true,
					infinite: true,
					asNavFor: '.av-single-insp-slider-images',
					arrows: false,
				  });
				  //
				  $('.av-single-insp-slider-quotes').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: false,
					adaptiveHeight: true,
					focusOnSelect: true,
					infinite: true,
					prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
					nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
				  });
				}
							
			}
		});*/
    });
	//Popup video
	$('.av-single-video-modal').on('shown.bs.modal', function (e) {
		$.ajax({
			type: 'POST',
            url: ptajax.ajaxurl,
			data: { 
				'action': 'av_product_tabs_video',
			},
			context: this,
			dataType: "html",
			cache: true,
			success: function(data){
				$('.insert-video').html(data);
			}
	    });
	});
   $(".av-single-video-modal").on('hidden.bs.modal', function (e) {
	 $(this).find("video").trigger('pause');
   });
   //Popup Testimonials
	$('#av-single-testimonials').on('shown.bs.modal', function (e) {
		$.ajax({
			type: 'POST',
            url: ptajax.ajaxurl,
			data: { 
				'action': 'av_product_tabs_testimonials',
			},
			context: this,
			dataType: "html",
			cache: true,
			success: function(data){
				$('.av-product-insert-testimonials').html(data);
				if(!$('.testimonials-slider').hasClass("slick-initialized")){
				  $('.testimonials-slider').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: false,
					focusOnSelect: true,
					infinite: true,
					prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
					nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
				  });
				}
			}
	    });
	});
	//
    $(document).ready(function() {
	  if (typeof $.cookie('woocommerce_recently_viewed') !== 'undefined' && frezia.is_product){
		$('.av-seen-products').prepend('<h3 class="av-main-nav-item">Recently Viewed</h3>');
		$('#seen-products').html('<div class="av-loader"></div>');
		$.ajax({
			type: 'POST',
            url: ptajax.ajaxurl,
			data: { 
				'action': 'av_product_recently_viewed',
			},
			context: this,
			dataType: "html",
			cache: true,
			success: function(data){			
				$('#seen-products').html(data);
				$('#seen-products').slick({
					lazyLoad: 'ondemand',
					slidesToShow: 6,
					slidesToScroll: 2,
					dots: false,
					centerMode: false,
					infinite: true,
					responsive: [
						{
							breakpoint: 992,
							settings: {
								slidesToShow: 4,
								slidesToScroll: 2,
								infinite: true,
								dots: false
							}
						},
						{
							breakpoint: 768,
							settings: {
								slidesToShow: 3,
								slidesToScroll: 1,
								infinite: true,
								dots: false
							}
						},
						{
							breakpoint: 576,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 2,
								infinite: true,
								dots: false,
								centerMode: false,
							}
						},
					],
					prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
					nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
				});		
			}
		});
	  }
 });
	//Product Tabs
/*	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		//alert('sex');
		e.preventDefault();
		var target_tab = $(this).attr('data-target_tab');
		var product_id = $(this).attr('data-product_id');
		$.ajax({
			type: 'POST',
            url: ptajax.ajaxurl,
			data: { 
				'action': 'av_product_tabs',
				'target_tab': target_tab,
				'product_id': product_id
			},
			context: this,
			dataType: "html",
			cache: true,
			success: function(data){
				//$('.av-login-bt').removeClass('loading');				
				$('#nav-'+target_tab).html(data);				
			}
		});
	});*/
	//End
	/**/
		//Homepage
		//object fit edge fix
if ( ! Modernizr.objectfit ) {
  jQuery('.hero-slider-item').each(function () {
    var $container = jQuery(this),
        imgUrl = $container.find('img').attr('data-lazy');
    if (imgUrl) {
      $container
        .css('backgroundImage', 'url(' + imgUrl + ')')
        .addClass('no-object-fit');
    }  
  });
}
var heroSlide = window.location.hash.substr(1);
var heroSlideIndex = jQuery(".hero-slider").find("[data-heroproduct='" + heroSlide + "']").index();
if(heroSlideIndex >0){
	var heroSlideStart = heroSlideIndex;
}
else{
	var heroSlideStart = 0;
}
//hero init
jQuery('.hero-slider').on('init', function(event, slick){
  jQuery('.no-hero-slider').remove();
  jQuery('.hero-slider').show();
  jQuery('.testimonials-slider-n').show();
  jQuery('.hero-preload').hide();
  jQuery('.circle-loader').hide();
  jQuery('.homepage-hero-link').css('visibility', 'visible');
});
jQuery('.hero-slider').on('lazyLoaded', function(event, slick, image, imageSource){
  jQuery('.hero-loader').css('z-index', '0');
});
//
jQuery('.hero-slider').slick({
	    /*lazyLoad: 'ondemand',*/
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        centerMode: false,
        focusOnSelect: false,
		autoplay: true,
		autoplaySpeed: frezia.home_slider_autoplaySpeed,
        prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></div>',
        nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></div>',
	    responsive: [
		{
		  breakpoint: 576,
		  settings: {
			arrows: false
		  }
		}
	   ]
    });
	$(".wp-caption-text a").click(function() {
    	$(this).attr("target", "_blank");
    return false;
	});
	$(".av-blocked-link a").click(function() {
    	$(this).attr("target", "_blank");
    return false;
	});
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 300) {
			$('.scrolltotop').fadeIn();
		} else {
			$('.scrolltotop').fadeOut();
		}
	});
	//Click to scroll
	$('.scrolltotop').click(function(){
		$('html, body').animate({scrollTop : 0},700);
		return false;
	});
	//minibag
	$(".header_mini_cart, .av-checkout-cart-link ").hoverIntent({    
		sensitivity: 3, // number = sensitivity threshold (must be 1 or higher)    
		interval: 200,  // number = milliseconds for onMouseOver polling interval    
		timeout: 200,   // number = milliseconds delay before onMouseOut    
		over:function(){
			if( !$('.header-mini-cart-container').hasClass("opened") ){
						$(".header-mini-cart-container").hide();
						$(".header_cart_span_frez").hide();
						$(this).addClass("frezia-loader-input");
						$(".mini_cart_ajax_content").css('height', 'auto');
						$.ajax({
							type: 'POST',
							url: ptajax.ajaxurl,
							data: {"action": "frezia_mini_cart"},
							context: this,
							dataType: "html",
							cache: false,
							success: function (data) {
								$(".header-mini-cart-container").show();
								$(this).before("<div class='overlay-bag'></div>")
								$(".header_cart_span_frez").show();
								$(this).removeClass("frezia-loader-input");
								$(".mini_cart_ajax_content").show();
								$(".mini_cart_ajax_content").html(data);
								$('.header-mini-cart-container').addClass("opened");
								$('.av-checkout-cart-link').hide();
							}
						});
					}  
		},
		out: function(){
	/*            $(".header-mini-cart-container").hide();
				$('.header-mini-cart-container').removeClass("opened");*/
		}
	});
	$(".header-mini-cart-container").hoverIntent({    
		sensitivity: 3, // number = sensitivity threshold (must be 1 or higher)    
		interval: 200,  // number = milliseconds for onMouseOver polling interval    
		timeout: 700,   // number = milliseconds delay before onMouseOut    
		over:function(){
	 
		},
		out: function(){
				$(".header-mini-cart-container").hide();
				$('.header-mini-cart-container').removeClass("opened");
				$(".overlay-bag").remove();
		}
	});
	$("body").on("click", ".overlay-bag", function(e){
		e.preventDefault();
		$(".header-mini-cart-container").hide();
		$(".overlay-bag").remove();
		$(".header-mini-cart-container").removeClass("opened");
	});
	//
	$("body").on("click", ".av-close-minicart", function(e){
		e.preventDefault();
		$(".mini_cart_ajax_content").hide(300);
		$('.av-checkout-cart-link').show();
	});
	//search opening and closing
	$("body").on("click", ".icon-search-right-nav:not('.icon-search-right-nav-love')", function(e){
		e.preventDefault();
		$(".search-form").toggle();
		$(".header-search-home").toggle();
		$(".search-field").focus();
	});
	$("body").on("click", ".pseudo-click-love-search-nonsense", function(e){
		e.preventDefault();
		$(".facetwp-facet-search_facet").slideToggle();
	});
	$("body").on("click", ".search-close", function(e){
		e.preventDefault();
		$(".search-form").toggle();
		$(".header-search-home").toggle();
	});
	// Post login form
	$('#pt_login_form').on('submit', function(e){

		e.preventDefault();

		var button = $(this).find('.btn');
			button.button('loading');
			$('.av-login-bt').addClass('loading');
			$('.pt-loading').show();

		$.post(ptajax.ajaxurl, $('#pt_login_form').serialize(), function(data){

			var obj = $.parseJSON(data);

			$('.pt-login .pt-login-errors').html(obj.message);
			
			if(obj.error === false){
				window.location.reload(true);
				button.hide();
			}

			$('.av-login-bt').removeClass('loading');
			$('.av-login-bt').removeClass('love-heart-button-loader');
		});
	});
	//Forgot Password
	$("body").on("click", ".login-forget", function(e){
		e.preventDefault();
		$(this).text('back to login');
		if($('.av-login-dialog').is(':visible')){
			  $(this).text('back to login');
		}else{
			  $(this).text('forgot my password');
		}
		$('.av-login-dialog').slideToggle();
		$('.av-forgot_password-form').slideToggle();
	});
// Perform AJAX forget password on form submit
	$('form#av-forgot_password').on('submit', function(e){
		$('.av-login-bt.av-forgot-pass-btn').addClass('loading');
		$.ajax({
			type: 'POST',
            dataType: 'json',
            url: ptajax.ajaxurl,
			data: { 
				'action': 'ajaxforgotpassword', 
				'user_login_forgot': $('#user_login_forgot').val(), 
				'security': $('#forgotsecurity').val(), 
			},
			success: function(data){
				$('.av-login-bt').removeClass('loading');				
				$('.av-forgot-psw-messages').html(data.message);				
			}
		});
		e.preventDefault();
		return false;
	});
	//
	$('#pt_subscribe_me').on('ifToggled', function(event){
	  $('.av-conditional-text').slideToggle();
	});
	//Custom Registration Post register form
	$('#pt_register_user_email, #pt_register_user_password').focusin(function(){
    	$(this).removeClass('av-input-box-error');
		$('.pt-register .pt-errors').html('');
	});
	//
	$('#pt_registration_form').on('submit', function(e){
		e.preventDefault();
		var memberEmail = $('#pt_register_user_email').val();
		if(wcmd_isEmail(memberEmail) && $('#pt_register_user_password').val() !== '' ){
		$('.pt-register .pt-errors').html('');
		$('.av-login-bt').addClass('loading').attr('disabled','disabled');
		$.post(ptajax.ajaxurl, $('#pt_registration_form').serialize(), function(data){
			
			var obj = $.parseJSON(data);
			$('.av-login-bt').removeClass('loading').removeAttr('disabled');
			$('.pt-register .pt-errors').html(obj.message);
			if(obj.error === false){
				$('#pt-user-modal .modal-dialog').addClass('registration-complete');
				//Subscribtion
				if($('#pt_subscribe_me').is(':checked')){
				  $.ajax({
					  type: 'POST',
					  dataType: 'json',
					  url: ptajax.ajaxurl,
					  data: { 
						  'action': 'wcmd_subscribe', 
						  'email': memberEmail, 
					  },
					  success: function(data){
						  //window.location.reload(true);
						  var response = jQuery.parseJSON(JSON.stringify(data));
						  if( typeof response.status  !== "undefined" && response.status === 'error' ) {
							  $('.pt-register .pt-errors').html(response.error).addClass('error');
							}
						  else if( typeof response.status  !== "undefined" && response.status === 'success' && response.title === 'Invalid Resource' ) {
							$('.pt-register .pt-errors').html(response.detail).addClass('error');
						  }
						  else{
							var SuccessMsg = wcmd.success;
							var ResponseMsg = SuccessMsg.replace('{COUPONCODE}', '');
							$('.pt-register .pt-errors').html(ResponseMsg).addClass('success');
							$.cookie("wcmdSuccsess", "true", { expires : parseInt(wcmd.cookie_length), path: '/'});
							
						  }
						  window.setTimeout(function () {
							window.location.reload(true);
						  }, 3000 );
					  }
				  });
				}
				else{//Not checked
				   window.location.reload(true);
				}
			}		
		});
		}
		else if(!wcmd_isEmail(memberEmail)){
			$('#pt_register_user_email').addClass('av-input-box-error');
			$('.pt-register .pt-errors').html('<p class="av-error">Add a Valid Email Address</p>').addClass('error');
		}
		else if($('#pt_register_user_password').val() === ''){
			$('#pt_register_user_password').addClass('av-input-box-error');
			$('.pt-register .pt-errors').html('<p class="av-error">The Password field cannot be empty</p>').addClass('error');
		}
	});
	//end
	//Thank you reg form
	$("body").on("click", ".av-thank-you-form-toggle", function(e){
		e.preventDefault();
		$(this).text('No');
		if($('.av-thank-you-form_wrapper').is(':visible')){
			  $(this).text('Yes');
		}else{
			  $(this).text('No');
		}
		$(".av-thank-you-form_wrapper").slideToggle();
	});
    //caches a jQuery object containing the header element
    var header = jQuery(".clearheader");
    jQuery(window).scroll(function() {
        var scroll = jQuery(window).scrollTop();
        if (scroll >= 50) {
            header.removeClass('clearheader').addClass("scrollheader");
        } else {
            header.removeClass("scrollheader").addClass('clearheader');
        }
    });
	//radio buttons
	  $('#pt_subscribe_me').iCheck({
			checkboxClass: 'icheckbox_minimal-pink',
			radioClass: 'icheckbox_minimal-pink',
			increaseArea: '20%' // optional
		});
	  $('.keep-me-in input').iCheck({
			checkboxClass: 'icheckbox_minimal-pink',
			radioClass: 'iradio_minimal-pink',
			increaseArea: '20%' // optional
		});
	  $('.frezia-reg-form-newsletter-field input').iCheck({
			checkboxClass: 'icheckbox_minimal-pink',
			radioClass: 'iradio_minimal-pink',
			increaseArea: '20%' // optional
		});
	  $('.prefered-metric input').iCheck({
			checkboxClass: 'icheckbox_minimal-pink',
			radioClass: 'iradio_minimal-pink',
			increaseArea: '20%' // optional
		});
	  $('.filter-section input').iCheck({
			checkboxClass: 'icheckbox_minimal-pink',
			radioClass: 'iradio_minimal-pink',
			increaseArea: '20%' // optional
		});
	  $('#update_all_subscriptions_addresses_field input').iCheck({
			checkboxClass: 'icheckbox_minimal-pink',
			radioClass: 'iradio_minimal-pink',
			increaseArea: '20%' // optional
		});
	  $('.av-ref-form-ref-type input').iCheck({
			checkboxClass: 'icheckbox_minimal-pink',
			radioClass: 'iradio_minimal-pink',
			increaseArea: '20%' // optional
		});
	  $('#bfwc_save_credit_card').iCheck({
			checkboxClass: 'icheckbox_minimal-pink',
			radioClass: 'iradio_minimal-pink',
			increaseArea: '20%' // optional
		});
	  //$('#billing_mc').prop('checked', true);
	  $('#billing_mc').iCheck({
			checkboxClass: 'icheckbox_minimal-pink av-medium-text',
			radioClass: 'iradio_minimal-pink',
			increaseArea: '20%',
			cursor: true,
		});
	  $('.wc-terms-and-conditions input').iCheck({
			checkboxClass: 'icheckbox_minimal-pink',
			radioClass: 'iradio_minimal-pink',
			increaseArea: '20%' // optional
		});
	  $('#wc_twilio_sms_optin').iCheck({
			checkboxClass: 'icheckbox_minimal-pink',
			radioClass: 'iradio_minimal-pink',
			increaseArea: '20%' // optional
		});
	  $('.customer-satisfaction-survey input[type=radio]').iCheck({
			checkboxClass: 'icheckbox_minimal-pink',
			radioClass: 'iradio_minimal-pink',
			increaseArea: '20%' // optional
		});
//
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
//homepage testimonials slider
jQuery('.homepage-testimonials-slider').slick({
	lazyLoad: 'ondemand',
    slidesToShow: 8,
    slidesToScroll: 3,
    dots: false,
    centerMode: false,
    focusOnSelect: true,
    infinite: true,
	variableWidth: true,
	adaptiveHeight: false,
    prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
    nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
});
	//Tableware logos slider
	jQuery('.av-tableware-hotels-slider').slick({
		lazyLoad: 'ondemand',
		slidesToShow: 9,
		slidesToScroll: 3,
		dots: false,
		centerMode: false,
		focusOnSelect: true,
		infinite: false,
		variableWidth: true,
		adaptiveHeight: false,
		prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
		nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
	});
	$('#mailchimp').submit(function(e){
		e.preventDefault();
		var mailchimpform = $(this);
		var ResponseText;
		$(this).find('button').addClass('love-heart-button-loader');
		$.ajax({
			url: ptajax.ajaxurl,
			type:'POST',
			data: mailchimpform.serialize(),
			success:function(data){
				$('#mailchimp button').removeClass('love-heart-button-loader');
				$('#mailchimp input').val('');
				//alert(data);
				if(data !== '0'){
					ResponseText = data;
				}else{
					ResponseText = '<p align="center">Oooops!<br>There is a problem with the subscription email. Please check if you have already subscribed with this email before or try again later!</p>';
				}
				$.confirm({
                    title: "AnnaVasily Newsletter",
                    text: ResponseText,
                    dialogClass: "modal-dialog subscribe-dialog",
                    confirmButton: "Yes",
                    cancelButton: "No"
                });
			}
		});
		return false;
	});
	$(".invite-get-nav").on("click", "a", function(e){
	   e.preventDefault();
	   $.confirm({
			title: "Invite Friends & Earn Points",
			text: '<div class="av-loading-message"><div class="av-signal"></div></div>',
			dialogClass: "modal-dialog invite-form-result invite-form",
			confirmButton: "OK",
			cancelButton: "Cancel"
			});
		$.ajax({
				type: 'POST',
				url: ptajax.ajaxurl,
				data: {"action": "av_invite_form"},
				context: this,
				dataType: "html",
				cache: false,
				success: function (data) {
					$(".invite-form .modal-body").html(data);
				}
			});
	});
	
        // This button will increment the value
        $('.qtyplus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If is not undefined
            if (!isNaN(currentVal)) {
                // Increment only if value is < 20
                if (currentVal < 20)
                {
                  $('input[name='+fieldName+']').val(currentVal + 1);
                  $('.qtyminus').val("-").removeAttr('style');
								}
                else
                {
                	$('.qtyplus').val("+").css('color','#aaa');
            			$('.qtyplus').val("+").css('cursor','not-allowed');
                }
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(1);

            }
        });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 1) {
            // Decrement one only if value is > 1
            $('input[name='+fieldName+']').val(currentVal - 1);
             $('.qtyplus').val("+").removeAttr('style');
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
            $('.qtyminus').val("-").css('color','#aaa');
            $('.qtyminus').val("-").css('cursor','not-allowed');
        }
    });
	
	
		$(".av-refund-form111").on("click", "a", function(e){
		   e.preventDefault();
		   $("#av-refund-modal").modal();
		   //var ReforderID = $(this).attr("data-orderID");
		   //var RefproductID = $(this).attr("data-productID");
		   //var post_link = $(this).attr("href") + "?view=simple";
		   var RefProductName = $(this).attr("data-productName");
		   var RefProductPrice = $(this).attr("data-productPrice");
		   var RefProductQty = $(this).attr("data-productQty");
		   $(".av-ref-form-product-name input").val(RefProductName);
		   $(".av-ref-form-product-price input").val(RefProductPrice);
		   $(".av-ref-form-product-qty input").val(RefProductQty);
		});
		//
	
	
		//on the page
	$("body").on("click", ".send-invites", function(e){
	   e.preventDefault();
	   $(this).remove();
	   $(".inline-ajax-content").html('<div class="av-loading-message"><div class="av-signal"></div></div>');
		$.ajax({
				type: 'POST',
				url: ptajax.ajaxurl,
				data: {"action": "av_invite_form"},
				context: this,
				dataType: "html",
				cache: false,
				success: function (data) {
					$(".inline-ajax-content").html(data);
				}
			});
	});
	//share button
	$(".invites-sharelist").on("click", ".facebook-share", function(e){
		e.preventDefault();
		window.open($(this).attr('href'), 'title', 'width=600, height=400');
		return false;
	});
	//stickey
	$.lockfixed(".av-container-header", {offset: {top: 0, bottom: 10}});
	//$.lockfixed(".cart-collaterals", {offset: {top: 50, bottom: 400}});
	$.lockfixed(".av-checkout-summary-wrapper", {offset: {top: 10, bottom: 300}});
	//header message
		if($.cookie("header_message") !== "true"){
			setTimeout(function() {jQuery(".frezia-member-custom-message p").slideToggle(50);},50);
			setTimeout(function() {jQuery(".frezia-member-custom-message p").slideToggle(1000); },3000);
		}
		if($.cookie("header_message") !== "undefined" && $.cookie("header_message") !== "true" ){ 
				$.cookie("header_message", "true", {expires:'', path:'/' });
		}
	$("body").on("click", ".frezia-member-custom-message", function(e){
		e.preventDefault();
		$(".frezia-member-custom-message p").slideToggle(200);
	});
	$("body").on("click", ".header-av-message-go", function(e){
		e.preventDefault();
		var rLink =  jQuery(this).attr("href");
		window.location.replace(rLink);
	});
	//trigger sign out dialog
	$(".sign-out-confirm a").confirm({
		title:"Sign out?",
		text:"",
		confirmButton: "Yes",
		cancelButton: "No",
		dialogClass: "modal-dialog sign-out-dialog",
		confirmButtonClass: "av-pink-cta-small inverted",
		cancelButtonClass: "av-pink-cta-small"
	});
	//trigger remove from cart dialog
	$(".cart-page-remove-product a").confirm({
		title:"Are you sure?",
		text:"",
		confirmButton: "Yes",
		cancelButton: "No",
		dialogClass: "modal-dialog sign-out-dialog",
		confirmButtonClass: "av-pink-cta-small inverted",
		cancelButtonClass: "av-pink-cta-small"
	});
		//Testimonials slider
		$('.av-testimonials-slider-wrapper').slick({
				lazyLoad: 'ondemand',
				slidesToShow: 4,
				slidesToScroll: 4,
				dots: false,
				centerMode: false,
				focusOnSelect: false,
				autoplay: false,
				autoplaySpeed: 3000,
				//speed: 500,
				prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></div>',
				nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></div>',
				responsive: [
					{
					  breakpoint: 993,
					  settings: {
					  slidesToShow: 3,
					  slidesToScroll: 3,
					  }
					},
					{
					  breakpoint: 769,
					  settings: {
					  slidesToShow: 2,
					  slidesToScroll: 2,
					  }
					},
					{
					  breakpoint: 577,
					  settings: {
					  slidesToShow: 1,
					  slidesToScroll: 1,
					  }
					},
				  ]
			});
//Insp Product Slider
			$('.insp-product-slider').on('init', function(event, slick){
				jQuery('.inspirations-loading-message').hide();
			});
			$('.insp-product-slider').slick({
				lazyLoad: 'ondemand',
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: false,
				centerMode: false,
				prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
				nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
			});
			//See more inspirations slider
			$('.more-inspirations-list').slick({
					dots: false,
					infinite: true,
					slidesToShow: 4,
					slidesToScroll: 1,
					adaptiveHeight: false,
					prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
					nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
					responsive: [
							{
									breakpoint: 1001, 
									settings: {
										slidesToShow: 3, 
										slidesToScroll: 1
									}
							},
							{
								   breakpoint: 769, 
									settings: { 
										slidesToShow: 2, 
										slidesToScroll: 1
									}
							},
							{
								   breakpoint: 601, 
									settings: { 
										slidesToShow: 2, 
										slidesToScroll: 1
									}
							},
							{
								   breakpoint: 481, 
									settings: { 
										slidesToShow: 1, 
										slidesToScroll: 1
									}
							}
					   ]
				});
			//Thank you related
			$('.av-thank-you-related-slider').slick({
					dots: false,
					infinite: true,
					slidesToShow: 4,
					slidesToScroll: 1,
					adaptiveHeight: false,
					prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
					nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
					responsive: [
							{
									breakpoint: 1001, 
									settings: {
										slidesToShow: 3, 
										slidesToScroll: 1
									}
							},
							{
								   breakpoint: 769, 
									settings: { 
										slidesToShow: 2, 
										slidesToScroll: 1
									}
							},
							{
								   breakpoint: 601, 
									settings: { 
										slidesToShow: 2, 
										slidesToScroll: 1
									}
							},
							{
								   breakpoint: 481, 
									settings: { 
										slidesToShow: 1, 
										slidesToScroll: 1
									}
							}
					   ]
				});
				//Annas story slider
					$('.av-annas-slider').slick({
							lazyLoad: 'ondemand',
							slidesToShow: 1,
							slidesToScroll: 1,
							dots: false,
							centerMode: false,
							focusOnSelect: false,
							autoplay: true,
							autoplaySpeed: 3000,
							//speed: 500,
							prevArrow: '<div class="slick-prev-fa slick-fa"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></div>',
							nextArrow: '<div class="slick-next-fa slick-fa"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></div>',
						responsive: [
							{
								   breakpoint: 993, 
									settings: { 
										slidesToShow: 2, 
										slidesToScroll: 2
									}
							},
							{
							  breakpoint: 576,
							  settings: {
								arrows: false,
								slidesToShow: 1, 
								slidesToScroll: 1
							  }
							}
						  ]
						});
				//Add To Bag
				//ajax add to bag
				$("body").on("click", ".add-to-bag-product", function(e){
					$(this).addClass("add-to-bag-loader");	
					var addToBagHref = $(this).data("addtobaghref");
					var addToBagId = $(this).data("addtobagid");
					var addToBagQty = $(this).data("addtobagqty");
					var PerfectPair = $(this).data("perfect_pair");
				
					$.ajax({
						type: 'POST',
						url: ptajax.ajaxurl,
						data: {"action": "frezia_add_to_bag", "add_tobag_id": addToBagId, "add_tobag_qty": addToBagQty, "add_tobag_perfect_pair": PerfectPair},
						context: this,
						dataType: "json",
						cache: false,
						success: function (data) {
							$(".add-to-bag-product").removeClass("add-to-bag-loader");
							if (data.status === "Error") {
								$.confirm({
									title: "Error!",
									text: data.message,
									dialogClass: "modal-dialog single-add-to-cart-ajax single-add-to-cart-ajax-error",
									confirmButton: "Yes",
									cancelButton: "No"
								});
							}
							if (data.status === "Incart") {
								$.confirm({
									title: '<span class="av-big-text">Already in your cart!</span>',
									text: data.message_body,
									dialogClass: "modal-dialog single-add-to-cart-ajax single-add-to-cart-ajax-incart",
									confirmButtonClass: "av-default-cta-inverted",
									cancelButtonClass: "av-default-cta",

									confirm: function(button) {
										//nothing
										},
									cancel: function(button) {
											  window.location.href = frezia.cart_url;

										},
									confirmButton: "Continue Shopping",
									cancelButton: "Go to Cart"
								});
							}
							if (data.status === "Success") {
								$(".header_cart_span_frez").text(data.cart_quantity);
								$.confirm({
									title: '<span class="av-big-text">Just added to your cart. Thank you!</span>',
									text: data.message_body,
									dialogClass: "modal-dialog single-add-to-cart-ajax single-add-to-cart-ajax-success",
									confirmButtonClass: "av-default-cta-inverted",
									cancelButtonClass: "av-default-cta",
									confirm: function(button) {
										//nothing
										},
									cancel: function(button) {
											window.location.href = frezia.cart_url;
										},
									confirmButton: "Continue Shopping",
									cancelButton: "Go to Cart"
								});
							}
						},
					});
					e.preventDefault();
				});
				//laxy tax
				(function($) {
						$(".facetwp-template img.lazy").show().lazyload({effect: "fadeIn", threshold : 200});
				})(jQuery);
				  //toglle grid
				  $(".toogle-columns-class").on("click", "button", function(e){
					  e.preventDefault();
					  if ($(this).hasClass('four-grid-toggle')) {
						  $("ul.products li").each(function(){
							  $(this).addClass("col-xl-3").removeClass("col-xl-6");
							  $(this).addClass("col-lg-4").removeClass("col-lg-6");
						  });
						  $('.four-grid-toggle').addClass('selected');
						  $('.two-grid-toggle').removeClass('selected');
						  $('ul.products').removeClass('two-grid-view').addClass('four-grid-view');
						  $.cookie("twogridview", "false", {expires: 10});
					  }   else if ($(this).hasClass('two-grid-toggle')) {
						  $("ul.products li").each(function(){
							  $(this).removeClass("col-xl-3").addClass("col-xl-6");
							  $(this).removeClass("col-lg-4").addClass("col-lg-6");
						  });
						  $.cookie("twogridview", "true", {expires: 10});
						  $('.four-grid-toggle').removeClass('selected');
						  $('.two-grid-toggle').addClass('selected');
						  $('ul.products').removeClass('four-grid-view').addClass('two-grid-view');
						  
					  }
				  });
				  //Mailchimp
				  //subscribe
						  $("#av-overlay-form").on("click", ".av-overlay-send-btn", function(e){
						  e.preventDefault();
						  var olEmail = $("#subscriber-email").val();
						  $(this).attr("disabled", true);
						  $(".av-overlay-loader").append('<div class="av-signal"></div>');
						  $(".av-overlay-message").html("");
						  $.ajax({
							  url: ptajax.ajaxurl,
							  type:'POST',
							  dataType:'json',
							  data: {action: "av_overlay_subscribe", overlay_email: olEmail},
							  success:function(data){
								  $(".av-overlay-send-btn").prop("disabled", false);
								  $(".av-overlay-loader").html("");
								  $(".av-overlay-message").append(data.message);
							  }
						  });
						  return false;
					  });
				  //
				 (function($) {
					  $(document).on('facetwp-refresh', function() {
						  if($.cookie("twogridview") === 'true' ){
							$('ul.products').removeClass('four-grid-view').addClass('two-grid-view');
							$("ul.products li").each(function(){
								$(this).removeClass("col-xl-3").addClass("col-xl-6");
								$(this).removeClass("col-lg-4").addClass("col-lg-6");
							});  
						  }
						  $('.facetwp-template').animate({ opacity: 0.3 }, 600);
						  $('.av-taxonomy-container .facetwp-pager-inner').addClass('av-pager-loader');
					  });
					  $(document).on('facetwp-loaded', function() {
						  if($.cookie("twogridview") === 'true' ){
							$('ul.products').removeClass('four-grid-view').addClass('two-grid-view');
							$("ul.products li").each(function(){
								$(this).removeClass("col-xl-3").addClass("col-xl-6");
								 $(this).removeClass("col-lg-4").addClass("col-lg-6");
							});  
						  }
						  $('.facetwp-template').animate({ opacity: 1 }, 600);
						  $('.av-taxonomy-container .facetwp-pager-inner').removeClass('av-pager-loader');
						  $('html,body').animate({ scrollTop: 0 }, 800);
					  });
				  })(jQuery);
				  jQuery(document).on('click', '.facetwp-custom-reset', function(e) {
					  e.preventDefault();
					  FWP.reset();
				  });
				//main quiz error handling
					 $(".main-frezia-quiz input.gform_next_button").removeAttr("onkeypress");
					 $(".main-frezia-quiz input.gform_next_button").removeAttr("onclick");
					 $("#gform_1").on("click", "input.gform_next_button", function(e){
						e.preventDefault();
						$('.quiz-first-question').removeClass('quiz-missing-selection');
						$('.quiz-second-question').removeClass('quiz-missing-selection');
						$('.quiz-third-question').removeClass('quiz-missing-selection');
						$('p.quiz-error-message').remove();
						if(!$('.main-frezia-quiz .gfield.quiz-first-question input[type=radio]:checked').val()){
							$('.quiz-first-question').addClass('quiz-missing-selection');
							$('.quiz-first-question label:first-child').after('<p class="quiz-error-message av-medium-text av-error">Choose your favourite!</p>');
							$('html, body').animate({
									scrollTop: $('.quiz-first-question').offset().top-70 
									}, 1000);
						}
						if(!$('.main-frezia-quiz .gfield.quiz-second-question input[type=radio]:checked').val()){
							$('.quiz-second-question').addClass('quiz-missing-selection');
							$('.quiz-second-question label:first-child').after('<p class="quiz-error-message av-medium-text av-error">Choose your favourite!</p>');
							if($('.main-frezia-quiz .gfield.quiz-first-question input[type=radio]:checked').val()){
							$('html, body').animate({
									scrollTop: $('.quiz-second-question').offset().top-70 
									}, 1000);	
							}
						}
						if(!$('.main-frezia-quiz .gfield.quiz-third-question input[type=radio]:checked').val()){
							$('.quiz-third-question').addClass('quiz-missing-selection');
							$('.quiz-third-question label:first-child').after('<p class="quiz-error-message av-medium-text av-error">Choose your favourite!</p>');
							if($('.main-frezia-quiz .gfield.quiz-first-question input[type=radio]:checked').val() && $('.main-frezia-quiz .gfield.quiz-second-question input[type=radio]:checked').val()){
							$('html, body').animate({
									scrollTop: $('.quiz-third-question').offset().top-70 
									}, 1000);	
							}
						}
						if($('.main-frezia-quiz .gfield.quiz-first-question input[type=radio]:checked').val() && $('.main-frezia-quiz .gfield.quiz-second-question input[type=radio]:checked').val() && $('.main-frezia-quiz .gfield.quiz-third-question input[type=radio]:checked').val()){
							$('.main-frezia-quiz').trigger('submit');
						}
				});
				//end
				//quiz results actions
				$(".frezia-quiz-result").on("click", ".gform_footer input[type=submit]", function(e){
						e.preventDefault();
						$(this).addClass('disabledelement');
						$('.frezia-quiz-result ul li').addClass('disabledelement');
						$('.quiz-first-question').removeClass('quiz-missing-selection');
						$('.quiz-second-question').removeClass('quiz-missing-selection');
						$('.quiz-third-question').removeClass('quiz-missing-selection');
						$('p.quiz-error-message').remove();
						var selectedMainGroup = $('li.gform_hidden input[type=hidden]').val();
						var selectedGroup1 = $('input[name=input_1]:checked').val();
						var selectedGroup2 = $('input[name=input_2]:checked').val();
						var selectedGroup3 = $('input[name=input_3]:checked').val();
						var selectedGroups = selectedGroup1 + '|' + selectedGroup2 + '|' + selectedGroup3;
						if(selectedGroups !== ''){
						$.ajax({
							type: 'POST',
							url: ptajax.ajaxurl,
							context: this,
							cache: false,
							dataType: "json",
							data: {"action": "frezia_quiz_member_update", "frezia_quiz_groups": selectedGroups, "main_group": selectedMainGroup},
							success: function(data){
							$(this).removeClass('disabledelement');
							$('.frezia-quiz-result ul li').removeClass('disabledelement');
							if (data.status === "error" && data.message === "not logged in") {
								$('.frezia-quiz-result').trigger('submit');
							}
							if (data.status === "error" && data.message === "missing selection") {
								if (data.missed_question1 === true){
									$('.quiz-first-question').addClass('quiz-missing-selection');
									$('.quiz-first-question label:first-child').after('<p class="quiz-error-message av-medium-text av-error">Choose your favourite!</p>');
									$('html, body').animate({
										scrollTop: $('.quiz-first-question').offset().top-60 
										}, 1000);
								}
								if (data.missed_question2 === true){
									$('.quiz-second-question').addClass('quiz-missing-selection');
									$('.quiz-second-question label:first-child').after('<p class="quiz-error-message av-medium-text av-error">Choose your favourite!</p>');
									if(data.missed_question1 !== true){
									$('html, body').animate({
										scrollTop: $('.quiz-second-question').offset().top-60 
										}, 1000);
									}
								}
								if (data.missed_question3 === true){
									$('.quiz-third-question').addClass('quiz-missing-selection');
									$('.quiz-third-question label:first-child').after('<p class="quiz-error-message av-medium-text av-error">Choose your favourite!</p>');
									if(data.missed_question1 !== true && data.missed_question2 !== true ){
									$('html, body').animate({
										scrollTop: $('.quiz-third-question').offset().top-60 
										}, 1000);
									}
								}
							}
							if (data.status === "success") {
								window.location.replace(data.redirect);
							}
							},
						});
					}
					else{
						  $.confirm({
							  title: "Error!",
							  text: "Please...",
							  dialogClass: "modal-dialog quiz-no-selection-error quiz-error",
							  confirmButton: "OK",
							  cancelButton: "OK"
						  });
					}
				});
				//end
				// Javascript to enable link to tab
				var hash = document.location.hash;
				var prefix = "tab_";
				if (hash) {
					$('.nav-tabs a[href="'+hash.replace(prefix,"")+'"]').tab('show');
				} 
				
				// Change hash for page-reload
				$('.nav-tabs a').on('shown', function (e) {
					window.location.hash = e.target.hash.replace("#", "#" + prefix);
				});
				$(".term-love-list").on("click", ".av-heading-nav-love-list", function(e){
						e.preventDefault();
						if($(".av-love-list-filters").hasClass("av-love-list-show")){
							$(".av-love-list-filters").removeClass("av-love-list-show").addClass("av-love-list-hide");
							$(".av-love-list-nav").removeClass("av-love-list-hide").addClass("av-love-list-show");
						}else
						{
						if($(".av-love-list-nav").hasClass("av-love-list-show")){
							$(".av-love-list-filters").removeClass("av-love-list-hide").addClass("av-love-list-show");
							$(".av-love-list-nav").removeClass("av-love-list-show").addClass("av-love-list-hide");
						}}
					});
				$("body").on("click", ".av-comm-login", function(e){
					e.preventDefault();
					$("#pt-user-modal").modal();	
				});
				//
				$("body").on("click", ".myaccordion-section-title", function(e){
				var currentAttrValue = $(this).attr('href');
				if ($(e.target).is('.active')) {
					close_myaccordion_section();
					$('html,body').animate({scrollTop: $(this.hash).position().top + 100}, 1000);
				} else {
					close_myaccordion_section();
					$(this).addClass('active');
					$('.myaccordion ' + currentAttrValue).show(300).addClass('open');
					$('html,body').animate({scrollTop: $(this.hash).position().top + 100}, 1000);
				}
				});
				//Top Chefs Shindiri
				jQuery('body').on( "click", ".cats-tabs a", function(e){
					e.preventDefault();
					jQuery('.cats-tabs a').removeClass('active');
					jQuery('.cat-content').animate({"opacity":0, "visibility":"hidden"}, 300 );
					var categoryid = jQuery(this).data('parent');
					jQuery(this).addClass('active');
				
					var data_for_ajax = {
						'action': 'frezia_send_html',
						'category':categoryid
					};
				
					
					jQuery.ajax({
						url: ajaxF.ajaxurl,
						type: 'POST',
						dataType: 'json',
						data: data_for_ajax,
						success: function (response) { 
							jQuery('.cat-content').html(response.locations);
							jQuery('.cat-content').delay(300).animate({"opacity":1, "visibility":"visible"}, 300 );
							jQuery( ".cat-img" ).scrollLeft( 550 );
						},
						error: function (xhr, ajaxOptions, thrownError) {
						  alert(xhr.status);
						  alert(thrownError);
						}
					});
				});
				//
				jQuery(document).on("change", "select.one-subcat", function(){
					var klasa = jQuery(this).find(":selected").data("catid");
					//jQuery('div.full-list .list-posts').fadeIn(300);
					
					jQuery('div.full-list .list-posts').each(function(){
						if( !jQuery(this).hasClass(klasa) ){
							var $this = jQuery(this);
							$this.fadeOut(300);
							$this.addClass("fadeouted");
						}
						
						jQuery('.full-list .list-posts').each(function(){
							jQuery(this).find('hotel-info').css('margin-top', -(jQuery(this).find('hotel-info').height() / 2));
						});
						
						if( jQuery(this).hasClass(klasa) ){
							var $this = jQuery(this);
							setTimeout(function(){
								$this.fadeIn(300);
								$this.removeClass("fadeouted"); 
							}, 300);
							
						}
					});
					
					if( klasa === 'all_locations' ){
						setTimeout(function(){
							jQuery('div.full-list .list-posts').fadeIn(300);
							jQuery('div.full-list .list-posts').removeClass("fadeouted"); 
						}, 200);
						
					}
				});
				//
				jQuery(document).ready(function(){
					jQuery('.cats-tabs a:nth-child(2)').addClass('active');
					
					jQuery('.full-list .list-posts').each(function(){
						jQuery(this).find('.hotel-info .hinfo-inner').css('margin-top', 0);
					});
					jQuery( ".cat-img" ).scrollLeft( 550 );
				});
				
				$(".unsubscribe-myacc").click(function (e) {
					e.preventDefault();
					jQuery.confirm({
					  title:"<span class='av-main-body-text'>Are you sure you would like to unsubscribe?</span>",
					  text:'',
					  confirm: function(button) {
							  jQuery(".unsubscribe-me").trigger( "click" );
						  },
					  cancel: function(button) {
						  // nothing to do
					  },
					  dialogClass: "modal-dialog myacc-unsubs sign-out-dialog",
					  confirmButtonClass: "av-pink-cta-small inverted",
					  cancelButtonClass: "av-pink-cta-small",
					  confirmButton: "Yes",
					  cancelButton: "No",
					  /*submitForm: true,*/
					  post: true
					  });
					});
				$(".av-my-acc-down").on( "click", "i", function(e){
				  e.preventDefault();
				  $(".av-my-acc-nav").slideToggle();
				});
				//
				$(window).resize(function() {
				  if ($(window).width() < 992) {
					 $(".av-my-acc-nav").hide();
				  }
				 else {
					$(".av-my-acc-nav").show();
				 }
				});
				//
				$('body').on('click', '.input-text.qty', function (e) {
				e.preventDefault();
					$(this).parents(':eq(1)').next().find('.update-cart-button').show();
				});
				$('body').on('click', '.minus', function (e) {
					e.preventDefault();
					$(this).parents(':eq(1)').next().find('.update-cart-button').show();
						var $inputQty = $(this).parent().find('input.av-number-input');
						var val = parseInt($inputQty.val());
						var step = $inputQty.attr('step');
						step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
						if (val > 1) {
							$inputQty.val(val - step).change();
						}
					});
					$('body').on('click', '.plus', function (e) {
						e.preventDefault();
						$(this).parents(':eq(1)').next().find('.update-cart-button').show();
						var $inputQty = $(this).parent().find('input.av-number-input');
						var val = parseInt($inputQty.val());
						var step = $inputQty.attr('step');
						var max_ = $inputQty.attr('max');
						step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
						if (val < max_){
						$inputQty.val(val + step).change();
						}
					});
					  $("body").on("click", ".action_notice", function (e) {
						e.preventDefault();
						var disPacksAdd = parseInt(jQuery(this).data("dispacks"));
						var OldVal = parseInt($(this).parent().find("input.qty").val());
						//alert(OldVal);
						var InputSum = OldVal + disPacksAdd;
						$(this).parent().find("input.qty").val(InputSum);
						$(this).parent().find(".av-quantity-drop input").removeAttr('disabled').attr('clicked','true').submit();
					  });
					//ajax love rate cart
					$("body").on("click", ".av-insp-love-wrapper .love-hearts-inputs.frezia-not-logged .love-heart-button, .av-cart-love .love-hearts-inputs.frezia-not-logged .love-heart-button, .av-single-product-container .love-hearts-inputs.frezia-not-logged .love-heart-button, .single-perfect-match-wrapper .love-hearts-inputs.frezia-not-logged .love-heart-button", function(e){
						e.preventDefault();
						$.confirm({
							title: "&nbsp;",
							text: '<h5 class="av-main-body-text-capitals">Your Lovelist</h5><p class="av-medium-text">Start Saving Your<br>Favourite Home Accessories<br>in Your LoveList</p><div class="left-action-heading av-medium-text">Have a Profile?</div><div class="right-action-heading av-medium-text">No Profile Yet</div>',
							dialogClass: "modal-dialog no-logged-lovelist-dialog",
							confirmButton: "Sign In",
							cancelButton: "Earn $"+frezia.signup_money,
							confirmButtonClass: "av-medium-text",
							cancelButtonClass: "av-medium-text",
							confirm: function(button) {
								$('#pt-user-modal').modal('show');
							},
							cancel: function(button) {
								$('#pt-user-register').modal('show');
							},
						});
					});
					$("body").on("click", ".av-insp-love-wrapper .love-hearts-inputs.frezia-logged .love-heart-button, .av-cart-love .love-hearts-inputs.frezia-logged .love-heart-button, .av-single-product-container .love-hearts-inputs.frezia-logged .love-heart-button, .single-perfect-match-wrapper .love-hearts-inputs.frezia-logged .love-heart-button", function(e){
						$(this).addClass("love-heart-button-loader");
						var LoveRate = $(this).data("loverate");
						var LoveRatePostID = $(this).data("lovepostid");
						var LoveRateClear = false;
						if($(this).hasClass("love-heart-button-full")){
							LoveRateClear = true;
							LoveRate = 0;
						}
						$.ajax({
							type: 'POST',
							url: ajaxF.ajaxurl,
							data: {
								"action": "frezia_love_update",
								"love_rate_id": LoveRate,
								"love_rate_post_id": LoveRatePostID,
								"love_rate_clear": LoveRateClear
							},
							cache: false,
							context: this,
							success: function(data) {
								if (LoveRate === 0) {
									$(this).removeClass("love-heart-button-loader");
									$(this).removeClass("love-heart-button-full");
									$(this).next().removeClass("love-heart-button-full");
									$(this).next().next().removeClass("love-heart-button-full");
									//
									jQuery(this).attr("title", "Save this for later. Add it to your Lovelist");
								}
								if (LoveRate === 1) {
									$(this).removeClass("love-heart-button-loader");
									$(this).addClass("love-heart-button-full");
									$(this).next().removeClass("love-heart-button-full");
									$(this).next().next().removeClass("love-heart-button-full");
								}
								if (LoveRate === 2) {
									$(this).removeClass("love-heart-button-loader");
									$(this).addClass("love-heart-button-full");
									$(this).prev().addClass("love-heart-button-full");
									$(this).next().removeClass("love-heart-button-full");
								}
								if (LoveRate === 3) {/*CURRENT*/
									$(this).removeClass("love-heart-button-loader");
									$(this).addClass("love-heart-button-full");
									//
									jQuery(this).attr("title", "Click to remove from the Lovelist");
								}
							},
						});
						e.preventDefault();
					});
					//
					//jQuery(document).ready(function ($) {
						$(".shipping_address").css("display", "");
					//});
					$("body").on("click", ".av-checkout-collapse-address", function(e){
						e.preventDefault();
						$(this).hide();
						$(this).parents(':eq(2)').find('.av-save-checkout-fields-wrapper').show();
						$(this).parents(':eq(1)').next().toggleClass("collapsed-group");
						$(this).parents(':eq(1)')/*.toggleClass("av-main-body-text").toggleClass("av-medium-text")*/.toggleClass("av-collapsed-heading");
					});
					//
				  $(document).ready(function() {
					  $('.wc_payment_methods input[type=radio][name=payment_method]').change(function() {
						  $(this).parent().addClass('selected-method');
						  $(this).parent().next().next().toggleClass('selected-method');
						  $('.wc_payment_methods').children().not($(this).parent()).removeClass('selected-method');
					  });
				  });
				  //
				  $(document).ready(function() {
					  $('#ship-to-different-address-checkbox').change(function() {
						  if ($(this).is(":checked")) {
							  $(".woocommerce-shipping-fields .av-checkout-fileds-edit").show();
						  }
						  else {
							  $(".woocommerce-shipping-fields .av-checkout-fileds-edit").hide();
						  }
					  });
				  });
				  //
				  $("body").on("click", ".bfwc-payment-method-buttons a", function(e){
						//e.preventDefault();
					  if ($("#braintree_payment_methods").is(":visible") || $("#braintree-hostedfields-container").is(":visible")){
							//$(".av-secure-bottom").toggle();
							$(".form-row.place-order").show();
					  }
					  else if($("#braintree-paypal-container").is(":visible")) {
						  //$(".av-secure-bottom").toggle();
						  $(".form-row.place-order").toggle();
					  }
				   });
				   $("#payment_method_braintree_paypal_payments").change(function() { 
				     $('#braintree_paypal_payments-tab').tab('show');
				   });
				   $("#payment_method_braintree_payment_gateway").change(function() { 
				     $('#braintree_payment_gateway-tab').tab('show');
				   });
				   $("#payment_method_afterpay").change(function() { 
				     $('#afterpay-tab').tab('show');
				     $(".form-row.place-order").show();
				   });
				  $("body").on("click", ".av-save-checkout-fields", function(e){
					  e.preventDefault();
					  $('.av-checkout-save-error').remove();
					  var formValid = false;
					  var first_name_valid, last_name_valid, country_valid, state_valid, city_valid, address_1_valid, postcode_valid, phone_valid, email_valid;
					  var el = $(this);
					  var fieldsType = $(this).attr("data-save");			  
					  
					  var first_name = $("#"+fieldsType+"_first_name").val();
					  if(first_name !== '' && !$("#"+fieldsType+"_first_name_field").hasClass('woocommerce-invalid')){
						  first_name_valid = true;
					  }else{
						  first_name_valid = false;
					  }				  
					  var last_name = $("#"+fieldsType+"_last_name").val();
					  if(last_name !== '' && !$("#"+fieldsType+"_last_name_field").hasClass('woocommerce-invalid')){
						  last_name_valid = true;
					  }else{
						  last_name_valid = false;
					  }	
					  var country = $("#"+fieldsType+"_country").val();
					  if(country !== '' && !$("#"+fieldsType+"_country_field").hasClass('woocommerce-invalid')){
						  country_valid = true;
					  }else{
						  country_valid = false;
					  }			
					  var state = $("#"+fieldsType+"_state").val();
					  if(!$("#"+fieldsType+"_state_field").hasClass('woocommerce-invalid')){
						  state_valid = true;
					  }else{
						  state_valid = false;
					  }			
					  var city = $("#"+fieldsType+"_city").val();
					  if(city !== '' && !$("#"+fieldsType+"_city_field").hasClass('woocommerce-invalid')){
						  city_valid = true;
					  }else{
						  city_valid = false;
					  }
					  var address_1 = $("#"+fieldsType+"_address_1").val();
					  if(address_1 !== '' && !$("#"+fieldsType+"_address_1_field").hasClass('woocommerce-invalid')){
						  address_1_valid = true;
					  }else{
						  address_1_valid = false;
					  }
					  var postcode = $("#"+fieldsType+"_postcode").val();
					  if(postcode !== '' && !$("#"+fieldsType+"_postcode_field").hasClass('woocommerce-invalid')){
						  postcode_valid = true;
					  }else{
						  postcode_valid = false;
					  }
					  var phone = '';
					  var email = '';
					  if(fieldsType === 'billing'){
						phone = $("#"+fieldsType+"_phone").val();
						if(phone !== '' && !$("#"+fieldsType+"_phone_field").hasClass('woocommerce-invalid')){
							phone_valid = true;
						}else{
							phone_valid = false;
						}
						email = $("#"+fieldsType+"_email").val();
						if(email !== '' && !$("#"+fieldsType+"_email_field").hasClass('woocommerce-invalid')){
							email_valid = true;
						}else{
							email_valid = false;
						}
						
						if(first_name_valid && last_name_valid && country_valid && state_valid && city_valid && address_1_valid && phone_valid && email_valid){
							formValid = true;
						}
					  }
					  else if(fieldsType === 'shipping'){
						if(first_name_valid && last_name_valid && country_valid && state_valid && city_valid && address_1_valid){
							formValid = true;
						}
					  }
					  if(formValid){
					  $(this).parents(':eq(1)').find('.av-checkout-fields-to-find').css('opacity', '0.5');
					  $(this).css('pointer-events', 'none');
						  $.ajax({
							type: 'POST',
							dataType:'json',
							url: ajaxF.ajaxurl,
							data: {
								"action": "checkout_fields_update",
								"fields_type": fieldsType,
								"first_name": first_name,
								"last_name": last_name,
								"email": email,
								"country": country,
								"state": state,
								"city": city,
								"address_1": address_1,
								"postcode": postcode,
								"phone": phone,
							},
							success: function(data) {
								if(data.error === "yes" && data.email === "notvalid"){
									$("form.woocommerce-checkout").prepend('<ul id="woocommerce-error" class="woocommerce-error av-checkout-save-error"><li>Either the Email is missing, or you have entered a not valid email.</li></ul>');
									el.css('pointer-events', 'auto');
									el.parents(':eq(1)').find('.av-checkout-fields-to-find').css('opacity', '1.0');
								  }
								else if(data.error === "no" && data.email === "valid"){
								  $('html, body').animate({scrollTop : 0},700);
								  el.css('pointer-events', 'auto');
								  el.parent().hide();
								  el.parents(':eq(1)').find('.av-checkout-fields-to-find').toggleClass('collapsed-group').css('opacity', '1.0');
								  el.parents(':eq(1)').find('.av-checkout-fields-to-find').prev().toggleClass('av-collapsed-heading');
								  el.parents(':eq(1)').find('.av-checkout-fields-to-find').prev().find(".av-checkout-collapse-address").show();
								  
								}			
							}
							
						  });
					  }
					  else{
						$('html, body').animate({
							scrollTop: $('.woocommerce-'+fieldsType+'-fields').offset().top
						}, 1000);
					  }
				  });
				  
				  
				  $('#ajax-contact-form').submit(function(e){
					  var name = $("#name").val();
					  $.ajax({ 
						   data: {action: 'contact_form', name:name},
						   type: 'post',
						   url: ajaxurl,
						   success: function(data) {
								console.log(data); //should print out the name since you sent it along
				  
						  }
					  });
				  
				  });
				  //
				  $(document).on('shown.bs.tab', '.woocommerce-checkout-payment a[data-toggle="tab"]', function (e) {
					  e.preventDefault();
   	 					if ($('#payment_method_braintree_payment_gateway').is(":checked")) {
							if($("#braintree-paypal-container").is(":visible")){
								$(".place-order").hide();
							}
						}
   	 					else if ($('#payment_method_braintree_paypal_payments').is(":checked")) {
							if($("#braintree-hostedfields-container").is(":visible") || $("#braintree_payment_methods").is(":visible")){
								$(".place-order").show();
							}	
						}
				  });
				  $(document).ready(function() {
					  if ($("#braintree_payment_methods").is(":visible")){
							$(".form-row.place-order").show();
					  }
					  else if($("#braintree-paypal-container").is(":visible")) {
						  $(".form-row.place-order").toggle();
					  }
					  	  
					  
					  $('#payment_method_braintree_paypal_payments').change(function() {
						  if ($(this).is(":checked")) {
							  if( !$('.payment_method_braintree_paypal_payments .bfwc-payment-method-container').length ){
								$(".place-order").hide();
							  }
						  }
					  });
					  $('#payment_method_braintree_payment_gateway').change(function() {
						  if ($(this).is(":checked")) {
							  $(".place-order").show();
						  }
					  });
				  });
				  //
				  $( document.body ).on( 'updated_cart_totals', function(){
   					$("#calc_shipping_country").select2();
	
				  });
	              $("#calc_shipping_country").select2();
				  $('#calc_shipping_country').on('select2:select', function(e) {
				  });
				  $("input[type=checkbox]#createaccount").change(function(){
					  if( $(this).is(':checked')) {
						  $(".av-create-account-psw").show();
					  } else {
						  $(".av-create-account-psw").hide();
					  }
				  }); 	  
					
					

});/*jQuery ends*/
//js functions
//
	var getUrlParameter = function getUrlParameter(sParam) {
		var sPageURL = decodeURIComponent(window.location.search.substring(1)),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;
	
		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');
	
			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : sParameterName[1];
			}
		}
	};
//
//end
//overlay popup
var counter = 0;
var overlayDays = parseInt(wcmd.cookie_length);
var overlayDelay = parseInt(wcmd.delay*1000);
var overlayDelay2 = parseInt(wcmd.delay2*1000);
//BGR CTA
if ( $(".av-overlay-modal") !== null && $(".av-overlay-modal").length){
  $("#av-subsc-ovelay-modal").on('shown.bs.modal', function (e) {
	"use strict";
	if ($("#av-subsc-ovelay-modal").is(":visible")){
	  $('.av-fixed-cta').hide('400');
	}
  });
}
//
if ( $(".av-overlay-modal") !== null && $(".av-overlay-modal").length){
  $("#av-subsc-ovelay-modal").on('hidden.bs.modal', function (e) {
	"use strict";
	$('.av-fixed-cta').show('400');
	/*if (typeof $.cookie("overlayPopup") !== "undefined" && $.cookie("overlayPopup") === "DialogShown" && $.cookie("FirstOverlayPopup") !== "DialogShown" && $.cookie("wcmdSuccsess") !== "true"){
		setTimeout(function() {
		  if(!jQuery("#av-subsc-ovelay-modal").is(":visible")){
			  $("#av-subsc-ovelay-modal").modal();
			  if (typeof $.cookie("FirstOverlayPopup") === "undefined"){
				jQuery.cookie("FirstOverlayPopup", "DialogShown", { expires : overlayDays, path: '/'});
			  }
		  }
		}, overlayDelay2);
	}*/
  });
}
/*setTimeout(function() {
  if(!jQuery("#av-subsc-ovelay-modal").is(":visible") && jQuery.cookie("overlayPopup") !== "DialogShown"){
      $("#av-subsc-ovelay-modal").modal();
	  if (typeof $.cookie("overlayPopup") === "undefined"){
		jQuery.cookie("overlayPopup", "DialogShown", { expires : overlayDays, path: '/'});
	  }
  }
}, overlayDelay);*/

jQuery('body').mouseleave(function(event) {
    if(event.clientY <= 100 && counter < 1)
    {
	  if(!jQuery("#av-subsc-ovelay-modal").is(":visible") && jQuery.cookie("overlayPopup") !== "DialogShown"){
          jQuery("#av-subsc-ovelay-modal").modal();
	  if (typeof jQuery.cookie("overlayPopup") === "undefined"){
		jQuery.cookie("overlayPopup", "DialogShown", { expires : overlayDays, path: '/'});
	  }
	  }
	counter++;
    }
});
//
	// FAQ Accordion
	var hashValue = location.hash; 
	var footTab = getUrlParameter('tabloc');
	function close_myaccordion_section() {
        jQuery('.myaccordion .myaccordion-section-title').removeClass('active');
        jQuery('.myaccordion .myaccordion-section-content').hide(300).removeClass('open');
	}
	if(footTab === 'footer'){
        jQuery(hashValue).show(300).addClass('open');
        jQuery(hashValue).prev().prev().addClass('active');
        jQuery('#billing-and-shipping').show(300).addClass('open');
	}
	else{
		if(hashValue !== ''){
            jQuery(hashValue).show(300).addClass('open');
            jQuery(hashValue).prev().prev().addClass('active');
		}
	}
	
	function av_trigger_checkout_update() {
        $( 'body' ).trigger( 'update_checkout' );
    }
//
if(frezia.is_product){
        $("body").on("click", ".av-suggested-action", function(e){
			e.preventDefault();
			var SuggPostID = $(this).data("suggid");
			var isTaxonomy = $(this).data("taxonomy");
			$('.facetwp-template').css({"opacity":"0.7","pointer-events":"none",});
                jQuery.ajax({
				  type: 'POST',
				  dataType:'json',
				  url: ajaxF.ajaxurl,
				  data: {
					  "action": "suggested_product_update",
					  "suggested_product_id": SuggPostID,
				  },
				  success: function(data) {
					  $('.facetwp-template').css({"opacity":"1.0","pointer-events":"auto",});
					  if(isTaxonomy === true){
						FWP.refresh();
					  }else{
						location.reload();
					  }
				  }
		  });
   });	
}
(function($) {
    $(document).on('facetwp-loaded', function() {
        //Clear suggested product
        $("body").on("click", ".av-suggested-action", function(e){
			e.preventDefault();
			var SuggPostID = $(this).data("suggid");
			var isTaxonomy = $(this).data("taxonomy");
			$('.facetwp-template').css({"opacity":"0.7","pointer-events":"none",});
                jQuery.ajax({
				  type: 'POST',
				  dataType:'json',
				  url: ajaxF.ajaxurl,
				  data: {
					  "action": "suggested_product_update",
					  "suggested_product_id": SuggPostID,
				  },
				  success: function(data) {
					  $('.facetwp-template').css({"opacity":"1.0","pointer-events":"auto",});
					  if(isTaxonomy === true){
						FWP.refresh();
					  }else{
						location.reload();
					  }
				  }
		  });
        });
		  //hover event custom code	
		  //fork image
		  if(jQuery().lazyload) {
			$(".facetwp-template img.lazy").show().lazyload({effect: "fadeIn", threshold : 200});
		  }
		  if(jQuery().hoverIntent) {
		  $(".top-product-section a.product-category").hoverIntent({
			  sensitivity: 10, // number = sensitivity threshold (must be 1 or higher)
			  interval: 0,  // number = milliseconds for onMouseOver polling interval
			  timeout: 100,   // number = milliseconds delay before onMouseOut
			  over:function(){
				  var imageSet = $(this).find("img").attr("data-setimage");
				  $(this).css("border", "4px double #ECECEC");
				  if(imageSet !== ''){
					$(this).find("img").css("opacity", "0");
					$(this).after('<div class="av-signal"></div>');
					$(this).find("img").attr("src",imageSet)
					.one('load', function() {
					  $('.av-signal').remove();
					  $(this).css("transform", "scale(1.0)").animate({opacity: 1}, 800);
					});
				  }
			  },
			  out: function(){
					var ImageSrc = $(this).find("img").attr("data-osrc");
					$(this).find("img").hide(0).attr("src",ImageSrc).fadeIn(400).css("transform", "scale(1.0)");
				  	$(this).css("border", "4px double transparent");
			  }
		  });
		  //Surprise me
		  $(".product_cat-surprise-me").hoverIntent({
			  sensitivity: 3, // number = sensitivity threshold (must be 1 or higher)
			  interval: 5,  // number = milliseconds for onMouseOver polling interval
			  timeout: 5,   // number = milliseconds delay before onMouseOut
			  over:function(){
				  $(this).find(".shop-grid-surprise").css("display", "none");
				  $(this).find(".av-bottom-product-section").css("display", "flex");
			  },
			  out: function(){
				  $(this).find(".shop-grid-surprise").css("display", "block");
				  $(this).find(".av-bottom-product-section").css("display", "none");
			  }
		  });
		  }
        //ajax love rate
        jQuery("body").on("click", ".love-hearts-inputs.frezia-not-logged .love-heart-button", function(e){
            e.preventDefault();
			$.confirm({
				title: "&nbsp;",
				text: '<h5 class="av-main-body-text-capitals">Your Lovelist</h5><p class="av-medium-text">Start Saving Your<br>Favourite Home Accessories<br>in Your LoveList</p><div class="left-action-heading av-medium-text">Have a Profile?</div><div class="right-action-heading av-medium-text">No Profile Yet</div>',
				dialogClass: "modal-dialog no-logged-lovelist-dialog",
				confirmButton: "Sign In",
				cancelButton: "Earn $25",
				confirmButtonClass: "av-medium-text",
				cancelButtonClass: "av-medium-text",
				confirm: function(button) {
					$('#pt-user-modal').modal('show');
				},
				cancel: function(button) {
					$('#pt-user-register').modal('show');
				},
			});
        });
        jQuery("body").on("click", ".love-hearts-inputs.frezia-logged .love-heart-button", function(e){
            jQuery(this).addClass("love-heart-button-loader");
            var LoveRate = jQuery(this).data("loverate");
            var LoveRatePostID = jQuery(this).data("lovepostid");
			var LoveRateClear = false;
			if(jQuery(this).hasClass("love-heart-button-full")){
				LoveRateClear = true;
				LoveRate = 0;
			}
            jQuery.ajax({
                type: 'POST',
                url: ajaxF.ajaxurl,
                data: {
                    "action": "frezia_love_update",
                    "love_rate_id": LoveRate,
                    "love_rate_post_id": LoveRatePostID,
					"love_rate_clear": LoveRateClear
                },
                cache: false,
                context: this,
                success: function(data) {
                    if (LoveRate === 0) {
                        jQuery(this).removeClass("love-heart-button-loader");
                        jQuery(this).removeClass("love-heart-button-full");
                        jQuery(this).next().removeClass("love-heart-button-full");
                        jQuery(this).next().next().removeClass("love-heart-button-full");
						//FWP.refresh();
						jQuery(this).attr("title", "Save this for later. Add it to your Lovelist");
                    }
                    if (LoveRate === 1) {
                        jQuery(this).removeClass("love-heart-button-loader");
                        jQuery(this).addClass("love-heart-button-full");
                        jQuery(this).next().removeClass("love-heart-button-full");
                        jQuery(this).next().next().removeClass("love-heart-button-full");
                    }
                    if (LoveRate === 2) {
                        jQuery(this).removeClass("love-heart-button-loader");
                        jQuery(this).addClass("love-heart-button-full");
                        jQuery(this).prev().addClass("love-heart-button-full");
                        jQuery(this).next().removeClass("love-heart-button-full");
                    }
                    if (LoveRate === 3) {
                        jQuery(this).removeClass("love-heart-button-loader");
                        jQuery(this).addClass("love-heart-button-full");
                        jQuery(this).prev().addClass("love-heart-button-full");
                        jQuery(this).prev().prev().addClass("love-heart-button-full");
						//
						jQuery(this).attr("title", "Click to remove from the Lovelist");
                    }
                },
            });
            e.preventDefault();
        });
     });
})(jQuery);