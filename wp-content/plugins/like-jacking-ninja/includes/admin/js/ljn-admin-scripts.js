(function( $ ) {
	'use strict';

	var urlsContainer = $('.js-urls-container'),
		blockedRefsContainer = $('.js-blocked-refs-container'),
		blockedLocationsContainer = $('.js-blocked-locations-container');

	$(document).on('click', '.js-add-url', function() {
		urlsContainer.append('<div><input class="long-input" name="ljn_urls[]" type="text"><div class="button js-delete">x</div></div>');
	});

	$(document).on('click', '.js-add-ref', function() {
		blockedRefsContainer.append('<article><input name="ljn_blocked_refs[]" type="url"><div class="button js-delete">x</div></article>');
	});

	$(document).on('click', '.js-add-location', function() {
		blockedLocationsContainer.append('<article><input type="text" name="ljn_blocked_locations[]"><div class="button js-delete">x</div></article>');
	});

	$(document).on('click', '.js-delete', function() {
		$(this).parent().remove();
	});

	$(document).on('click', '.js-modal-content-switch', function() {
		var dynamicRow = $('.js-dynamic-row');
		dynamicRow.fadeToggle('fast');
		dynamicRow.find('textarea').html('');
	});

	$('.js-timepicker').timepicker();

	$(document).on('click', '.js-tab-switcher', function() {
	    var _this = $(this),
	        switchedTo = _this.data('tab'),
	    	hiddenLabel = switchedTo == 'advanced' ? 'basic' : 'advanced';

	    _this.addClass('active-tab');
	    $('.js-tab-switcher.' + hiddenLabel + '-tab').removeClass('active-tab');

	    $('.js-' + switchedTo + '-container').removeClass('display-none');
	    $('.js-' + hiddenLabel + '-container').addClass('display-none');
	});

	$(document).on('click', '.js-flush-db', function() {
		if(!confirm('Are you sure you want to flush the jacked users table from your database?')) {
			return;
		}

		var flushMessageContainer = $('.js-flush-message');
		flushMessageContainer.text('Please wait...');
		$.ajax({
		    url : ajaxObject.ajaxUrl,
		    type : 'POST',
		    dataType : 'json',
		    data : {
		        action : 'flush_db'
		    }
		}).done(function(response) {
			var addClass, removeClass;
			if(response.success) {
				addClass = 'success-message';
				removeClass = 'fail-message';
			} else {
				removeClass = 'success-message';
				addClass = 'fail-message';
			}

			flushMessageContainer.addClass(addClass).removeClass(removeClass).text(response.message);
		});
	});

	(function()
	{
		var container = $('.js-banners-container'),
			banners = $('.js-banner'),
			bannersCount = banners.length,
			index = bannersCount-1;

		if(bannersCount > 1) {
			setInterval(function() {
				var currentBanner = banners.eq(index);
				currentBanner.animate({
					'left': '-=' + currentBanner.width() + 'px'
				}, 'slow', function() {
					container.prepend(currentBanner.css('left', '0px'));
				});

				index--;
				if(index < 0) {
					index = bannersCount-1;
				}
			}, 5000);
		}
	})();

})( jQuery );
