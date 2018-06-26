		</div>
	</div><!-- End wrapper -->
<?php do_action( 'zsofa_before_footer' ); ?>
<footer id="footer">
		<div class="footer-main">
			<div class="container">
				<div class="row">
					<div class="col-md-4 about-store-cont">
						<div class="footer-ge-title about-erado">
							VỀ ERADO
						</div>
						<p class="about-erado-desc">
							" Nội thất Erado tiếp nối thành công của thương hiệu rOsano (thuộc công ty cổ phần rOsano Việt Nam nay đổi tên thành công ty cổ phần Erado Việt Nam)..được hàng trăm nghìn khách hàng trên toàn quốc tin dùng."
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
									<li><a href="">Giới thiệu Erado</a></li>
									<li><a href="">Công Trình Đã Thực Hiện</a></li>
									<li><a href="">Chỉ đường đến Erado</a></li>
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
									HÃY GỌI ERADO ĐỂ ĐƯỢC TƯ VẤN
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
							CÔNG TY CP ERADO VIỆT NAM
						</div>
						<ul>
							<li>
								<div class="spmarket">Siêu Thị Nội Thất 1</div>
								<p class="address">Địa chỉ: Số 356 Bạch Mai, Hà Nội</p>
								<p class="hot-line">Hotline: O9O5.356.356 - O916 59 8668 </p>
							</li>
							<li>
								<div class="spmarket">Siêu Thị Nội Thất 2</div>
								<p class="address">Tầng 3, C14 Bắc Hà  ( C14 - Bộ Công An)
								Đường Lê Văn Lương kéo dài..</p>
								<p class="hot-line">O985.OO.8668 - O979. 16. 3456</p>
							</li>
							<li>
								<div class="spmarket">Siêu Thị Nội Thất 3</div>
								<p class="address">Địa chỉ: Tầng 3, Toà FLC complex
								Số 36 Phạm Hùng (cạnh bến xe Mỹ Đình)</p>
								<p class="hot-line">Hotline: O976.52.6688 - O904. 962.888</p>
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
						<div class="company-name">Công ty cổ phần <span>Erado</span> Việt Nam</div>
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