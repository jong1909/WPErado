(function($) {
	$(document).ready(function() {
		$("#news-post-detail").on('click','.paginate_links a',function(e){
			e.preventDefault();
			var hrefThis = $(this).attr('href');
			var paged = hrefThis.match(/\/\d+\//)[0];
			var categories_id = JSON.parse($('#current-category').val());
            categories_id = JSON.stringify(categories_id);
			paged = paged.match(/\d+/)[0];
			if(!paged) paged = 1;
			$.ajax({
				type : "post",
				dataType : "json",
				url : zsofavn_url.admin_ajax,
				data : {action: "ajax_load_post", ajax_paged : paged, categories: categories_id, nonce: zsofavn_url.load_post_nonce},
				context: this,
				beforeSend: function(){
					$('#news-post-detail').addClass('active');
				},
				success: function(response) {
					
					if(response.success) {
						$(response.data).addClass('holder');
						$("#news-post-detail").empty();
						$("#news-post-detail").append($(response.data));
					}
					$('#news-post-detail').removeClass('active');
				}
			});
		});
        //aja load news category

        $("#archive-news-test").on('click','.paginate_links a',function(e){
            e.preventDefault();
            var hrefThis = $(this).attr('href');
            var paged = hrefThis.match(/\/\d+\//)[0];
            var categories_id = JSON.parse($('#current-news-category').val());
            categories_id = JSON.stringify(categories_id);
            paged = paged.match(/\d+/)[0];
            if(!paged) paged = 1;
            $.ajax({
                type : "post",
                dataType : "json",
                url : zsofavn_url.admin_ajax,
                data : {action: "ajax_load_news_post", ajax_paged : paged, categories: categories_id, nonce: zsofavn_url.load_post_nonce},
                context: this,
                beforeSend: function(){
                    $('#archive-news').addClass('active');
                },
                success: function(response) {

                    if(response.success) {
                        $(response.data).addClass('holder');
                        $("#archive-news").empty();
                        $("#archive-news").append($(response.data));
                    }
                    $('#archive-news').removeClass('active');
                }
            });
        });

        //aja load similar products

        $("#similar-products").on('click','.paginate_links a',function(e){
            e.preventDefault();
            var hrefThis = $(this).attr('href');
            var paged = hrefThis.match(/\/\d+\//)[0];
            var categories_id = JSON.parse($('#current-product-category').val());
            categories_id = JSON.stringify(categories_id);
            paged = paged.match(/\d+/)[0];
            if(!paged) paged = 1;
            $.ajax({
                type : "post",
                dataType : "json",
                url : zsofavn_url.admin_ajax,
                data : {action: "simiar_products", ajax_paged : paged, categories: categories_id, nonce: zsofavn_url.load_post_nonce},
                context: this,
                beforeSend: function(){
                    $('#similar-products').addClass('active');
                },
                success: function(response) {

                    if(response.success) {
                        $(response.data).addClass('holder');
                        $("#similar-products").empty();
                        $("#similar-products").append($(response.data));
                    }
                    $('#similar-products').removeClass('active');
                }
            });
        });
	});
})(jQuery);