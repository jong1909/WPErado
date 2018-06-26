(function($) {

    
    // Function click tabs
    function clickTabs(idTab) {
        $(idTab +" li").click(function(event) {            
            var index = $(this).index();
            event.preventDefault();
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
            var z = $(this).closest(idTab).next().children('li').eq(index);
            z.fadeIn(350, "swing");
            z.siblings().removeClass('show').hide();

        });
    }
    /**
     * START - ONLOAD - JS
     */
    /* ----------------------------------------------- */
    /* ------------- FrontEnd Functions -------------- */
    /* ----------------------------------------------- */


    /* ----------------------------------------------- */
    /* ----------------------------------------------- */
    /* OnLoad Page */
    $(document).ready(function($) {
        clickTabs(".tab-links");
    });

    /* OnLoad Window */
    var init = function() {

    };
    window.onload = init;

})(jQuery);
