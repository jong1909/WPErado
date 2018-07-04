		</div>
	</div><!-- End wrapper -->
<?php do_action( 'zsofa_before_footer' ); ?>
<footer id="footer">
		<div class="footer-main">
			<div class="container">
				<div class="row">
					<div class="col-md-4 about-store-cont">
						<div class="footer-ge-title about-Zsofa">
							VỀ Zsofa
						</div>
						<p class="about-Zsofa-desc">
							" Nội thất Zsofa tiếp nối thành công của thương hiệu rOsano (thuộc công ty cổ phần rOsano Việt Nam nay đổi tên thành công ty cổ phần Zsofa Việt Nam)..được hàng trăm nghìn khách hàng trên toàn quốc tin dùng."
						</p>
						<img src="" alt="" class="img-responsive">
					</div>
					<div class="col-md-5 about-buyers">
						<div class="row top-content">
							<div class="col-md-6 col-ssm-12 col-ssmm-6 about-us">
								<div class="footer-ge-title about-us-title">
									<h2><a href="">VỀ CÔNG TY</a></h2>
								</div>
								<ul>
									<li><a href="">Giới thiệu Zsofa</a></li>
									<li><a href="">Công Trình Đã Thực Hiện</a></li>
									<li><a href="">Chỉ đường đến Zsofa</a></li>
								</ul>
							</div>
							<div class="col-md-6 col-ssm-12 col-ssmm-6 for-buyers">
								<div class="footer-ge-title for-buyers-title">
									<h2><a href="">DÀNH CHO NGƯỜI MUA</a></h2>
								</div>
								<ul>
									<li><a href="">Bảo mật thông tin</a></li>
									<li><a href="">Chính sách bảo hành</a></li>
									<li><a href="">Chương trình khuyến mại</a></li>
									<li><a href="">Mua hàng và thanh toán</a></li>
								</ul>
							</div>
						</div>
						
						<div class="row support-phone authentication">
							<div class="col-md-7">
								<div class="call-to-us">
									HÃY GỌI Zsofa ĐỂ ĐƯỢC TƯ VẤN
								</div>
								<div class="hot-line">
									<span>Hỗ trợ : </span>
									<span class="phone-number">0976.529.529</span>
								</div>
							</div>
							<div class="col-md-5">
								<a class="authentication-logo" href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/bct.png" alt=""></a>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 company-addresses">
						<div class="footer-ge-title company-addresses-title">
							CÔNG TY CP Zsofa VIỆT NAM
						</div>
						<ul>
							<li>
								<div class="spmarket">Showroom Q7</div>
								<p class="address">Địa chỉ: 981 Huỳnh Tấn Phát, P. Phú Thuận, Quận 7, TP.HCM</p>
								<p class="hot-line">Hotline: 19006107 - 0975488488  </p>
							</li>
							<li>
								<div class="spmarket">Showroom GV</div>
								<p class="address">Địa chỉ: 687 Phan Văn Trị P. 7, Q. Gò Vấp, TP.HCM</p>
								<p class="hot-line">Hotline: 19006107</p>
							</li>
							<li>
								<div class="spmarket">Showroom TĐ</div>
								<p class="address">Địa chỉ: 209 Tô Ngọc Vân, P. Linh Đông, Thủ Đức, TP.HCM</p>
								<p class="hot-line">Hotline: 19006107 </p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- End main -->	
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-ssmm-6 col-ssm-6">
						<div class="company-name">Công ty cổ phần <span>Zsofa</span> Việt Nam</div>
					</div>
					<div class="col-md-9">
						<div class="bussiness-num">Số ĐKKD : 0106404186 - Cấp bởi Sở kế Hoạch Đầu Tư Thành phố Hà Nội</div>
					</div>
				</div>				
			</div>
		</div>
	</footer><!-- End footer -->
	<?php do_action( 'zsofa_after_footer' ); ?>
	<div class="fbmstest animated fadeInLeftBig" id="fbmstest" style="">
	    <a href="https://m.me/sieuthinoithatrosano" target="_blank" class="testms">
	        <img class="img-responsive img-avatar" src="<?php echo get_template_directory_uri() ; ?>/assets/images/fb.png" alt="sieuthinoithatrosano">
	        <span class="camera-icon btn-browse">8</span>
	    </a>
	</div>
	<div id="leave-mess">
		<a href=""><img class="img-responsive" src="<?php echo get_template_directory_uri() ; ?>/assets/images/leave-mess.png" alt=""></a>
	</div>

</div>
<div class="win-wrapper-vdproduct popup-mobile show">
    <div class="win">
        <a href="javascript:;" class="win-close"></a>
        <a class="button-click" href="javascript:;">close</a>

    </div>
</div>
<script>
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
        });
    }
    popup.closePopup('#overlay-region', ".win-wrapper-vdproduct");
</script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=558707871150274';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
<?php wp_footer(); ?>
</html>