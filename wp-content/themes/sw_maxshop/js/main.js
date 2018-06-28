// jQuery
$.getScript('https://zsofa.cdn.vccloud.vn/wp-content/themes/sw_maxshop/js/slick.min.js', function()
{

(function($) {
	"use strict";
	/* Add Click On Ipad */
	$(window).resize(function(){
		var $width = $(this).width();
		if( $width < 1199 ){
			$( '.primary-menu .nav .dropdown-toggle'  ).each(function(){
				$(this).attr('data-toggle', 'dropdown');
			});
		}
	});
	/* Responsive Menu */
	$(document).ready(function(){
		$( '.show-dropdown' ).each(function(){
			$(this).on('click', function(){
				var $parent = $(this).parent().attr('class');
				var $class = $parent.replace( /\s/g, '.' );
				var $element = $( '.' + $class + ' > ul' );
				$element.toggle( 300 );
			});
		});
	});
    jQuery('.phone-icon-search').click(function(){
		//alert("The paragraph was clicked.");
        jQuery('.top-search').toggle("slide");
    });
	jQuery('ul.orderby.order-dropdown li ul').hide(); //hover in
    jQuery("ul.orderby.order-dropdown li span.current-li-content,ul.orderby.order-dropdown li ul").hover(function() {
        jQuery('ul.orderby.order-dropdown li ul').stop().fadeIn("fast");
    }, function() {
        jQuery('ul.orderby.order-dropdown li ul').stop().fadeOut("fast");
    });

    jQuery('.orderby-order-container ul.sort-count li ul').hide();
    jQuery('.sort-count.order-dropdown li span.current-li,.orderby-order-container ul.sort-count li ul').hover(function(){
        jQuery('.orderby-order-container ul.sort-count li ul').stop().fadeIn("fast");

    },function(){
        jQuery('.orderby-order-container ul.sort-count li ul').stop().fadeOut("fast");
    });

//  jQuery(".box-newsletter").center();

var mobileHover = function () {
    $('*').on('touchstart', function () {
        $(this).trigger('hover');
    }).on('touchend', function () {
        $(this).trigger('hover');
    });
};

mobileHover();

    /*jQuery('.product-categories')
        .find('li:gt(4)') //you want :gt(4) since index starts at 0 and H3 is not in LI
        .hide()
        .end()
        .each(function(){
            if($(this).children('li').length > 4){ //iterates over each UL and if they have 5+ LIs then adds Show More...
                $(this).append(
                    $('<li><a><strong>Xem thêm   +</strong></a></li>')
                        .addClass('showMore')
                        .click(function(){
                            if($(this).siblings(':hidden').length > 0){
                                $(this).html('<a><strong>Thu gọn   -</strong></a>').siblings(':hidden').show(400);
                            }else{
                                $(this).html('<a><strong>Xem thêm   +</strong></a>').show().siblings('li:gt(4)').hide(400);
                            }
                        })
                );
            }
        });*/
    /*Form search iP*/




    jQuery('a.phone-icon-menu').click(function(){
       var temp = jQuery('.navbar-inner.navbar-inverse').toggle( "slide" );
	   $(this).toggleClass('active');
    });
	$('.ya-tooltip').tooltip();
	// fix accordion heading state
	$('.accordion-heading').each(function(){
		var $this = $(this), $body = $this.siblings('.accordion-body');
		if (!$body.hasClass('in')){
			$this.find('.accordion-toggle').addClass('collapsed');
		}
	});
	

	// twice click
	$(document).on('click.twice', '.open [data-toggle="dropdown"]', function(e){
		var $this = $(this), href = $this.attr('href');
		e.preventDefault();
		window.location.href = href;
		return false;
	});

    $('#cpanel').collapse();

    $('#cpanel-reset').on('click', function(e) {

    	if (document.cookie && document.cookie != '') {
    		var split = document.cookie.split(';');
    		for (var i = 0; i < split.length; i++) {
    			var name_value = split[i].split("=");
    			name_value[0] = name_value[0].replace(/^ /, '');

    			if (name_value[0].indexOf(cpanel_name)===0) {
    				$.cookie(name_value[0], 1, { path: '/', expires: -1 });
    			}
    		}
    	}

    	location.reload();
    });

	$('#cpanel-form').on('submit', function(e){
		var $this = $(this), data = $this.data(), values = $this.serializeArray();

		var checkbox = $this.find('input:checkbox');
		$.each(checkbox, function() {

			if( !$(this).is(':checked') ) {
				name = $(this).attr('name');
				name = name.replace(/([^\[]*)\[(.*)\]/g, '$1_$2');

				$.cookie( name , 0, { path: '/', expires: 7 });
			}

		})

		$.each(values, function(){
			var $nvp = this;
			var name = $nvp.name;
			var value = $nvp.value;

			if ( !(name.indexOf(cpanel_name + '[')===0) ) return ;

			//console.log('name: ' + name + ' -> value: ' +value);
			name = name.replace(/([^\[]*)\[(.*)\]/g, '$1_$2');

			$.cookie( name , value, { path: '/', expires: 7 });

		});

		location.reload();

		return false;

	});

	$('a[href="#cpanel-form"]').on( 'click', function(e) {
		var parent = $('#cpanel-form'), right = parent.css('right'), width = parent.width();

		if ( parseFloat(right) < -10 ) {
			parent.animate({
				right: '0px',
			}, "slow");
		} else {
			parent.animate({
				right: '-' + width ,
			}, "slow");
		}

		if ( $(this).hasClass('active') ) {
			$(this).removeClass('active');
		} else $(this).addClass('active');

		e.preventDefault();
	});
/*Product listing select box*/
	jQuery('.catalog-ordering .orderby .current-li a').html(jQuery('.catalog-ordering .orderby ul li.current a').html());
	jQuery('.catalog-ordering .sort-count .current-li a').html(jQuery('.catalog-ordering .sort-count ul li.current a').html());
/*currency Selectbox*/
	$('.currency_switcher li a').click(function(){
		$current = $(this).attr('data-currencycode');
		jQuery('.currency_w > li > a').html($current);
	});
	
	$(document).ready(function(){
		/* Quickview */
		$('.fancybox').fancybox({
			'width'     : 800,
			'height'   : 600,
			'autoSize' : false,
			helpers:  {
				title:  null
			},
			afterShow: function() {
				$( '.product-images' ).each(function(){
					var $id = this.id;
					var $rtl = $('body').hasClass( 'rtl' );
					var $img_slider = $( '#' + $id + ' .product-responsive');
					var $thumb_slider = $( '#' + $id + ' .product-responsive-thumbnail' )
					$img_slider.slick({
						slidesToShow: 1,
						slidesToScroll: 1,
						fade: true,
						arrows: false,
						rtl: $rtl,
						asNavFor: $thumb_slider
					});
					$thumb_slider.slick({
						slidesToShow: 3,
						slidesToScroll: 1,
						asNavFor: $img_slider,
						arrows: true,
						focusOnSelect: true,
						rtl: $rtl,
						responsive: [				
							{
							  breakpoint: 360,
							  settings: {
								slidesToShow: 2    
							  }
							}
						  ]
					});

					$(".product-images").fadeIn(1000, function() {
						$(this).removeClass("loading");
					});
				});
			}
		});
		/* Slider Image */
		$( '.product-images' ).each(function(){
			var $id 			= this.id;
			var $rtl 			= $(this).data('rtl');
			var $vertical		= $(this).data('vertical');
			var $img_slider 	= $( '#' + $id + ' .product-responsive');
			var $thumb_slider 	= $( '#' + $id + ' .product-responsive-thumbnail' );
			$img_slider.slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				fade: true,
				arrows: false,
				rtl: $rtl,
				asNavFor: $thumb_slider
			});
			$thumb_slider.slick({
				slidesToShow: 4,
				slidesToScroll: 1,
				asNavFor: $img_slider,
				arrows: true,
				focusOnSelect: true,
				rtl: $rtl,
				vertical: $vertical,
				verticalSwiping: $vertical,
				responsive: [				
					{
					  breakpoint: 360,
					  settings: {
						slidesToShow: 2    
					  }
					}
				  ]
			});

			$(".product-images").fadeIn(300, function() {
				$(this).removeClass("loading");
			});
		});
	});
/*lavalamp*/
	$.fn.lavalamp = function(options){
		var defaults = {
    			elm_class: 'active',
				durations: 400
 		    },
            settings = $.extend(defaults, options);
		this.each( function(){
			var elm = ('> li');
			var current_check = $(elm, this).hasClass( settings.elm_class );
			current = elm + '.' + settings.elm_class;
			if( current_check ){
				var $this=jQuery(this), left0 = $(this).offset().left, dleft0 = $(current, this).offset().left - left0, dwidth0 = $('>ul>li.active', this).width();
				$(this).append('<div class="floatr"></div>');
				var $lava = jQuery('.floatr', $this), move = function(l, w){
					$lava.stop().animate({
						left: l,
						width: w
					}, {
						duration: settings.durations,
						easing: 'linear'
					});
				};
				
				var $li = jQuery('>li', this);
				//console.log( $li );
				// 1st time
				
				move(dleft0, dwidth0);
				$lava.show();
				$li.hover(function(e){
					var dleft = $(this).offset().left - left0;
					var dwidth = $(this).width();
					//console.log(dleft);
					move(dleft, dwidth);
				}, function(e){
					move(dleft0, dwidth0);
				});	
			}
		});
	}
	jQuery(document).ready(function(){
		var currency_show = jQuery('ul.currency_switcher li a.active').html();
		jQuery('.currency_to_show').html(currency_show);	
	}); 
/*end lavalamp*/
	jQuery(function($){
	// back to top
	$("#ya-totop").hide();
	$(function () {
		var wh = $(window).height();
		var whtml = $(document).height();
		$(window).scroll(function () {
			if ($(this).scrollTop() > whtml/10) {
					$('#ya-totop').fadeIn();
				} else {
					$('#ya-totop').fadeOut();
				}
			});
		$('#ya-totop').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
			});
	});
	// end back to top
	}); 
	$('#lang_sel ul > li > a').click(function(){
		$('#lang_sel ul > li ul').slideToggle(); 
	});
	var $current ='';
	$('#lang_sel ul > li > ul li a').on('click',function(){
		//console.log($(this).html());
		$current = $(this).html();
		$('#lang_sel ul > li > a.lang_sel_sel').html($current);
		 $a = $.cookie('lang_select_maxshop', $current, { expires: 1, path: '/'});	
	});
	if( $.cookie('lang_select_lovefashion') && $.cookie('lang_select_maxshop').length > 0 ) {
		$('#lang_sel ul > li > a.lang_sel_sel').html($.cookie('lang_select_maxshop'));
	}
	jQuery(document).ready(function(){
		jQuery('.wpcf7-form-control-wrap').hover(function(){
			$(this).find('.wpcf7-not-valid-tip').css('display', 'none');
		});
	 });
	 // fix js
	$('.wpb_map_wraper').click(function () {
		$('.wpb_map_wraper iframe').css("pointer-events", "auto");
	});

	$( ".wpb_map_wraper" ).mouseleave(function() {
		$('.wpb_map_wraper iframe').css("pointer-events", "none"); 
	});
	$('#myTabs a').hover(function (e) {
		e.preventDefault()
		$(this).tab('show')
	})
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
	
	jQuery(document).on("click", ".check-warranty", function(){
		var phone = jQuery('#phone').val();
			while(phone.charAt(0) === '0')
				phone = phone.substr(1);	
		var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange=function() {
			if (this.readyState == 4 && this.status == 200) {
				var data = JSON.parse(this.responseText);
				if(data.code == 200){
							  jQuery("#content-warranty").show();
				  jQuery(".name").html(data.message.name);
				  jQuery(".phone").html(data.message.phone);
				  jQuery(".detail").html(data.message.detail);
				  jQuery(".address").html(data.message.address);
				  jQuery(".date_buy").html(data.message.date_buy);
				  jQuery(".date_war").html(data.message.date_war);
				}else{
				 jQuery(".check-none").html(data.message);
				jQuery("#content-warranty").hide();
				alert('Không tìm thấy thông tin bảo hành !');
				}
			}
		  };
		  xhttp.open("GET", "https://m.zsofa.vn/index.php/site/CheckWarranty?type=warranty&phone="+phone, true);
		  xhttp.send();
	});
	
	
	jQuery(document).on("click", ".check-bill-status", function(){
		var phone = jQuery('#phone').val();
			while(phone.charAt(0) === '0')
				phone = phone.substr(1);	
		var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange=function() {
			if (this.readyState == 4 && this.status == 200) {
				var data = JSON.parse(this.responseText);
				if(data.code == 200){
				  jQuery("#content-warranty").show();
				  jQuery(".name").html(data.message.name);
				  jQuery(".phone").html(data.message.phone);
				  jQuery(".detail").html(data.message.detail);
				  jQuery(".address").html(data.message.address);
				  jQuery(".date_buy").html(data.message.date_buy);
				  jQuery(".bill_status").html(data.message.bil_status);
				  jQuery(".appointment_date").html(data.message.appointment_date);
				}else{
				 jQuery(".check-none").html(data.message);
				jQuery("#content-warranty").hide();
				alert('Không tìm thấy thông tin!');
				}
			}
		  };
		  xhttp.open("GET", "https://m.zsofa.vn/index.php/site/CheckWarranty?type=bill_status&phone="+phone, true);
		  xhttp.send();
	});
	
	// external js: masonry.pkgd.js, imagesloaded.pkgd.js

	// init Masonry
	var $grid = $('.grid').masonry({
	  itemSelector: '.grid-item',
	  percentPosition: true,
	  columnWidth: '.grid-sizer'
	});
	// layout Masonry after each image loads
	$grid.imagesLoaded().progress( function() {
	  $grid.masonry();
	});  

	
}(jQuery));
                                   });
