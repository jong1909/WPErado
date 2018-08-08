(function($) {
    
    function runSlider(){
         $('#main-slider').flexslider({
            animation: "slide",
            directionNav: false,
            drag: true
          });
         $('#main-mobile-slider').flexslider({
            animation: "slide",
            directionNav: false,
            drag: true
          });
        $('#product-detail-slider').flexslider({
            animation: "slide",
            animationLoop: true,
            itemWidth: 210,
            itemMargin: 25,
            minItems: 2,
            maxItems: 4,
            move: 1,
            slideshowSpeed: 5000,
            controlNav: false,
            pauseOnAction: true,
            pauseOnHover: true,
            drag: true
          });
        $('#viewed-product-slider').flexslider({
            animation: "slide",
            animationLoop: true,
            itemWidth: 208,
            itemMargin: 30,
            minItems: 2,
            maxItems: 3,
            move: 1,
            slideshowSpeed: 5000,
            controlNav: false,
            pauseOnAction: true,
            pauseOnHover: true,
            drag: true
          });
        $('#product-list-slider').flexslider({
            animation: "slide",
            directionNav: false,
            drag: true
          });
        $('.customer-reviews-slider').flexslider({
            animation: "slide",
            directionNav: false,
            drag: true
          });
    }
    // Function to scroll to top on click arrow button event
    function scrollTop() {
        $(function() {
            // scroll body to 0px on click
            $('#scroll-top').click(function(e) {
                e.preventDefault();
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        });
    }
    function toggleMenuLeftSide(){
        $('#collapse-left-menu').click(function(){
            $(this).parent().toggleClass('active');
        });
    }
    function showToolTipMenu(){
        var tip;
        $('a[title]').mouseover(function(e) {

            tip = $(this).attr('title');
            $(this).attr('title','');
            $('.tooltip').show().children('.tipBody').html( tip );

        }).mousemove(function(e) {

            $('.tooltip').css('top', e.pageY + 10 );
            $('.tooltip').css('left', e.pageX - 100 );

        }).mouseout(function(e) {
            $('.tooltip').hide();
            $(this).attr( 'title', tip );
        });
        
    }
    function showProductVideo(){
        $('.view-more').click(function(){
            var videoContentIframe = $(this).parent().find('.product-video-link').html();
            $('#product-video-content').html(videoContentIframe);
            $('.win-wrapper-vdproduct,#overlay-region-pr').show();
        });
        $('#overlay-region-pr').click(function(){
            $('#product-video-content').html('');
            $('.win-wrapper-vdproduct,#overlay-region-pr').hide();
        });
    }
    function showPopupOrderOnline(){
        $('.buy-online').click(function(){
            var productPurchased = $('.order-online h1.product_title').text();
            var linkProduct = $('link[rel="canonical"]').attr('href');
            $('.order-online,#overlay-region-pr').show();
            $('#user-message textarea').html(productPurchased+'<br>'+linkProduct);
        });
        $('#overlay-region-pr,.order-close-bt').click(function(){
            $('.order-online,#overlay-region-pr').hide();
        });
    }
    function activeMenu(){
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.main-magemenu').addClass('active');
            } else {
                $('.main-magemenu').removeClass('active');
            }
        });
    }
    function showHideMobileMenu(){
        $(".mobile-menu-icon").click(function(e){
            e.preventDefault();
            $(this).toggleClass('active');
            $(".menu-mobile-contents").toggleClass('active');
            $('#overlay-region').toggleClass('active');
        });
        $('#menu-mobile-main-menu>li.menu-item-has-children>a').click(function(event) {
            event.preventDefault();
            $(this).parent().toggleClass('active').find('ul').slideToggle("slow");
            $(this).parent().siblings('.active').removeClass('active').find('ul').slideUp("slow");
        });
        $('#overlay-region').on("click touchstart",function() {
            $(".menu-mobile-contents").removeClass('active');
            $(this).removeClass('active');
            $(".mobile-menu-icon").removeClass('active');
        });

    }
    function inputPlaceholder(){
        $('input,textarea').focus(function () {
            $(this).data('placeholder', $(this).attr('placeholder'))
                .attr('placeholder', '');
        }).blur(function () {
            $(this).attr('placeholder', $(this).data('placeholder'));
        });
    }
    /* ----------------------------------------------- */
    /* ------------- FrontEnd Functions -------------- */
    /* ----------------------------------------------- */

    /* OnLoad Page */
    $(document).ready(function($) {
        scrollTop();
        runSlider();
        toggleMenuLeftSide();
        showToolTipMenu();
        showProductVideo();
        activeMenu();
        showPopupOrderOnline();
        showHideMobileMenu();
        inputPlaceholder();
        
        var popup = popup || {};

        // close popup function
        popup.closePopup = function(idName, className) {
            var winClose = $(className + " .win-close");
            $(idName).click(function() {
                $(className).removeClass('show').addClass('hide');
                $(this).css({
                    display: 'none',
                    left: '0'
                });
            });
            winClose.click(function() {
                $(className).hide();
                $(idName).hide();
                $('#product-video-content').html('');
            });
        }
        popup.closePopup('#overlay-region-pr', ".win-wrapper-vdproduct");

    });

})(jQuery);