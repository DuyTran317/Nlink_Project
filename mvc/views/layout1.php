<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Site</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="<?=$_SESSION['temp']?>/lib/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?=$_SESSION['temp']?>/lib/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?=$_SESSION['temp']?>/lib/css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="<?=$_SESSION['temp']?>/lib/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="<?=$_SESSION['temp']?>/lib/css/jquery-ui1.css">
	<!-- flexslider -->
	<link rel="stylesheet" href="<?=$_SESSION['temp']?>/lib/css/flexslider.css" type="text/css" media="screen" />
	<!-- jquery -->
	<script src="<?=$_SESSION['temp']?>/lib/js/jquery-2.1.4.min.js"></script>
	<!-- //jquery -->
	<script src="<?=$_SESSION['temp']?>/lib/js/jquery.simpleLoadMore.min.js"></script>
	<!-- price range -->
	<script src="<?=$_SESSION['temp']?>/js/jquery-ui.js"></script>		
	<!-- flexisel (for special offers) -->
	<script src="<?=$_SESSION['temp']?>/lib/js/jquery.flexisel.js"></script>
	<!--slide and zoom product_detail -->
	<script src="<?=$_SESSION['temp']?>/lib/js/jquery.magnific-popup.js"></script>
	<script src="<?=$_SESSION['temp']?>/lib/js/imagezoom.js"></script>
	<script src="<?=$_SESSION['temp']?>/lib/js/jquery.flexslider.js"></script>
</head>

<body>
	<!-- top-header -->
	<!--<div class="header-most-top">
		<p>Grocery Offer Zone Top Deals & Discounts</p>
	</div>-->
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile" style="margin-top:20px">
				<h1>
					<a href="#"
						<span>N</span>link							
						<img src="<?=$_SESSION['temp']?>/lib/images/logo.png" alt=" ">
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			<div class="col-md-8 header">
				<!-- header lists -->
				<ul>
					<li>
						<a href="#" class="play-icon popup-with-zoom-anim">
							<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#993414"></i> Mua Hàng</a>
					</li>
					<li>
						<a href="#" data-toggle="modal">
							<span class="fa fa-truck" aria-hidden="true"></span>Thanh Toán</a>
					</li>
					<li>
						<span class="fa fa-phone" aria-hidden="true"></span> 0903 029 313
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-unlock-alt" aria-hidden="true"></span> Đăng Nhập </a>
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal2">
							<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Đăng Ký </a>
					</li>
				</ul>
				<!-- //header lists -->
				<!-- search -->
				<div class="agileits_search">
					<form action="./Product/Search" method="post">
						<input name="key" type="search" placeholder="Tìm kiếm sản phẩm..." required>
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<span class="fa fa-search" aria-hidden="true"> </span>
						</button>
					</form>
				</div>
				<!-- //search -->
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="wthreecartaits wthreecartaits2 cart cart box_1">
						<form action="#" method="post" class="last">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">
							<button class="w3view-cart" type="submit" name="submit" value="">
								<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</div>
				<!-- //cart details -->
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>	
	<!-- signin Model -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Đăng Nhập </h3>						
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Email" name="email" required>
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Mật Khẩu" name="pass" required>
							</div>
							<a href="#">Quên mật khẩu</a><br/>
							<input type="submit" value="Đăng Nhập">
						</form>		
						Chưa có tài khoản? Đăng ký <a href="" data-toggle="modal" data-target="#myModal2">tại đây</a>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal1 -->
	<!-- //signin Model -->
	<!-- signup Model -->
	<!-- Modal2 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Đăng Ký</h3>
						<p>
							Chưa có tài khoản? Vui lòng tạo tài khoản mới.
						</p>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Họ Tên" name="name" required>
							</div>
							<div class="styled-input">
								<input type="text" placeholder="Số Điện Thoại" name="mobile" required>
							</div>
							<div class="styled-input">
								<input type="email" placeholder="Email" name="email" required>
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Mật Khẩu" name="pass" id="password1" required>
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Nhập Lại Mật Khẩu" name="re_pass" id="password2" required>
							</div>
							<input type="submit" value="Đăng Ký">
						</form>
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal2 -->
	<!-- //signup Model -->
	<!-- //header-bot -->
	<!-- navigation -->
	<div class="ban-top">
		<div class="container" style="max-height: 53px">
			<div class="agileits-navi_search">
				<form action="#" method="post">
					<select id="agileinfo-nav_search" name="agileinfo_search" required="">
						<option value="">Danh mục sản phẩm</option>
						<?php
							foreach($data['listDepart'] as $item)
							{
						?>
                        	<option value="<?=$item['DepartId']?>"><?=$item['DepartName']?></option>
						<?php
							}
						?>
					</select>
				</form>
			</div>
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
								<li class="active">
									<a class="nav-stylehead" href="./Home">Trang Chủ
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="">
									<a class="nav-stylehead" href="about.html">Liên Hệ</a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sản Phẩm
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-4 multi-gd-img">
												<ul class="multi-column-dropdown">
                                                <?php
													$flag = 0;
													foreach($data['listCate'] as $item)
													{
														$flag++;
														if($flag%10 == 1)
														{
												?>
                                                            </ul>
														</div>
														<div class="col-sm-4 multi-gd-img">
															<ul class="multi-column-dropdown">
                                                <?php
														}
												?>
													<li>
														<a href="product.html"><?=$item['CateName']?></a>
													</li>
												<?php
													}
												?>
												</ul>
											</div>
											<div class="col-sm-4 multi-gd-img">
												<img src="lib/images/nav.png" alt="">
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
								<!--<li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Household
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-6 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product2.html">Kitchen & Dining</a>
													</li>
													<li>
														<a href="product2.html">Detergents</a>
													</li>
													<li>
														<a href="product2.html">Utensil Cleaners</a>
													</li>
													<li>
														<a href="product2.html">Floor & Other Cleaners</a>
													</li>
													<li>
														<a href="product2.html">Disposables, Garbage Bag</a>
													</li>
													<li>
														<a href="product2.html">Repellents & Fresheners</a>
													</li>
													<li>
														<a href="product2.html"> Dishwash</a>
													</li>
												</ul>
											</div>
											<div class="col-sm-6 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product2.html">Pet Care</a>
													</li>
													<li>
														<a href="product2.html">Cleaning Accessories</a>
													</li>
													<li>
														<a href="product2.html">Pooja Needs</a>
													</li>
													<li>
														<a href="product2.html">Crackers</a>
													</li>
													<li>
														<a href="product2.html">Festive Decoratives</a>
													</li>
													<li>
														<a href="product2.html">Plasticware</a>
													</li>
													<li>
														<a href="product2.html">Home Care</a>
													</li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>-->
								<li class="">
									<a class="nav-stylehead" href="faqs.html">Giới Thiệu</a>
								</li>
								<li class="dropdown">
									<a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown">Tra Cứu Đơn Hàng
										<!--<b class="caret"></b>-->
									</a>
									<!--<ul class="dropdown-menu agile_short_dropdown">
										<li>
											<a href="icons.html">Web Icons</a>
										</li>
										<li>
											<a href="typography.html">Typography</a>
										</li>
									</ul>-->
								</li>
								<li class="">
									<a class="nav-stylehead" href="contact.html">Tin Tức</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->
	
	<!--main-->
	<?php 
		require_once("./mvc/views/pages/".$data['page'].".php");
	?>
	<!--end main-->
	
	<!-- newsletter -->
	<div class="footer-top">
		<div class="container-fluid">
			<div class="col-xs-8 agile-leftmk">
				<p>CÔNG TY TNHH NLINK VIỆT NAM - Độc quyền phân phối thương hiệu REVLON, AIMER và TWG tại thị trường Việt Nam.</p>
				<p style="font-size: 17px">Địa chỉ: 76 Trần Đình Xu, P. Cô Giang, Q.1, TP.HCM /  E-mail: crm@nlink.vn / contact@nlink.vn - ĐT: +84 08 383 78111/222 - Fax: +84 08 3837 8000 - Hotline: 0903 029 313</p>
				<div class="newsform-w3l">
					<span class="fa fa-envelope-o" aria-hidden="true"></span>
				</div>
			</div>
			<div class="col-xs-4 w3l-rightmk">
				<img src="lib/images/tab3.png" alt=" ">
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //newsletter -->
	<!-- footer -->
	<footer>
		<div class="container">
			<!-- footer first section -->
			<p class="footer-main">
				<span>"NLink Việt Nam"</span> xây dựng một đội ngũ nhân sự chuyên môn cao và có tâm với nghề, một môi trường làm việc lành mạnh, đoàn kết, chia sẻ, cùng nhau phát triển. Hướng tới chính sách đãi ngộ nhân sự xứng đáng, NLink Việt Nam là điểm đến cho những ai muốn phát triển bằng chính thực lực.</p>
			<!-- //footer first section -->
			<!-- footer second section -->
			<div class="w3l-grids-footer">
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-truck" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Giao Hàng Nhanh Chóng</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-refresh" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Dễ Dàng Đổi Trả</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-ravelry" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Cam Kết Chất Lượng</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- //footer second section -->
			<!-- footer third section -->
			<div class="footer-info w3-agileits-info">
				<!-- footer categories -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>Các Sản Phẩm</h3>
						<ul>
							<li>
								<a href="product.html">Grocery</a>
							</li>
							<li>
								<a href="product.html">Fruits</a>
							</li>
							<li>
								<a href="product.html">Soft Drinks</a>
							</li>
							<li>
								<a href="product2.html">Dishwashers</a>
							</li>
							<li>
								<a href="product.html">Biscuits & Cookies</a>
							</li>
							<li>
								<a href="product2.html">Baby Diapers</a>
							</li>
						</ul>
					</div>
					<div class="col-xs-6 footer-grids agile-secomk">
						<ul>
							<li>
								<a href="product.html">Snacks & Beverages</a>
							</li>
							<li>
								<a href="product.html">Bread & Bakery</a>
							</li>
							<li>
								<a href="product.html">Sweets</a>
							</li>
							<li>
								<a href="product.html">Chocolates & Biscuits</a>
							</li>
							<li>
								<a href="product2.html">Personal Care</a>
							</li>
							<li>
								<a href="product.html">Dried Fruits & Nuts</a>
							</li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- //footer categories -->
				<!-- quick links -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>Liên Kết</h3>
						<ul>
							<li>
								<a href="about.html">Giới Thiệu</a>
							</li>
							<li>
								<a href="contact.html">Liên Hệ</a>
							</li>
							<li>
								<a href="help.html">Tra Cứu Đơn Hàng</a>
							</li>
							<li>
								<a href="faqs.html">Tin Tức</a>
							</li>
							<li>
								<a href="terms.html">Chính Sách Đổi Trả</a>
							</li>
							<li>
								<a href="privacy.html">Hướng Dẫn Đặt Hàng</a>
							</li>
						</ul>
					</div>
					<div class="col-xs-6 footer-grids">
						<h3>Thông Tin</h3>
						<ul>
							<li>
								<i class="fa fa-map-marker"></i> 76 Trần Đình Xu, P. Cô Giang, Q.1, TP.HCM</li>
							<li>
								<i class="fa fa-mobile"></i> +84 08 383 78111/222</li>
							<li>
								<i class="fa fa-phone"></i> 0903 029 313 </li>
							<li>
								<i class="fa fa-envelope-o"></i>
								<a href="mailto:example@mail.com"> crm@nlink.vn</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- //quick links -->
				<!-- social icons -->
				<div class="col-sm-2 footer-grids  w3l-socialmk">
					<h3>Theo Dõi</h3>
					<div class="social">
						<ul>
							<li>
								<a class="icon fb" href="#">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li>
								<a style="background-color: red" href="#">
									<i class="fa fa-youtube-play"></i>
								</a>
							</li>
							<li>
								<a class="icon gp" href="#">
									<i class="fa fa-pinterest"></i>
								</a>
							</li>
						</ul>
					</div>					
				</div>
				<!-- //social icons -->
				<div class="clearfix"></div>
			</div>
			<!-- //footer third section -->
			<!-- footer fourth section (text) -->
			<div class="agile-sometext">				
				<!-- payment -->
				<div class="sub-some child-momu">
					<h5>Payment Method</h5>
					<ul>
						<li>
							<img src="<?=$_SESSION['temp']?>/images/pay2.png" alt="">
						</li>
						<li>
							<img src="<?=$_SESSION['temp']?>/images/pay5.png" alt="">
						</li>
						<li>
							<img src="<?=$_SESSION['temp']?>/images/pay1.png" alt="">
						</li>
						<li>
							<img src="<?=$_SESSION['temp']?>/images/pay4.png" alt="">
						</li>
						<li>
							<img src="<?=$_SESSION['temp']?>/images/pay6.png" alt="">
						</li>
						<li>
							<img src="<?=$_SESSION['temp']?>/images/pay3.png" alt="">
						</li>
						<li>
							<img src="<?=$_SESSION['temp']?>/images/pay7.png" alt="">
						</li>
						<li>
							<img src="<?=$_SESSION['temp']?>/images/pay8.png" alt="">
						</li>
						<li>
							<img src="<?=$_SESSION['temp']?>/images/pay9.png" alt="">
						</li>
					</ul>
				</div>
				<!-- //payment -->
			</div>
			<!-- //footer fourth section (text) -->
		</div>
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right">
		<div class="container">
			<p>© 2020 NLink Vietnam Co., Ltd. Copyright by Superior5</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- js-files -->
	<!-- <script>
	<!-- cart-js -->
	<script src="<?=$_SESSION['temp']?>/lib/js/minicart.js"></script>
	<script>
		paypalm.minicartk.render(); //use only unique class names other than paypalm.minicartk.Also Replace same class name in css and minicart.min.js

		paypalm.minicartk.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->	
	
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>

	<script src="<?=$_SESSION['temp']?>/lib/js/SmoothScroll.min.js"></script>

	<script src="<?=$_SESSION['temp']?>/lib/js/move-top.js"></script>
	<script src="<?=$_SESSION['temp']?>/lib/js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>

	<script>
		$(document).ready(function () {
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>

	<script src="<?=$_SESSION['temp']?>/lib/js/bootstrap.js"></script>

</body>

</html>