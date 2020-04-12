<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Nlink Vietnam Co., Ltd</title>
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
	<link rel="shortcut icon" href="<?=$_SESSION['projectName']?>/lib/images/logo.png" />
	<link href="<?=$_SESSION['projectName']?>/lib/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?=$_SESSION['projectName']?>/lib/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?=$_SESSION['projectName']?>/lib/css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="<?=$_SESSION['projectName']?>/lib/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="<?=$_SESSION['projectName']?>/lib/css/jquery-ui1.css">
	<!-- flexslider -->
	<link rel="stylesheet" href="<?=$_SESSION['projectName']?>/lib/css/flexslider.css" type="text/css" media="screen" />
	<!-- jquery -->
	<script src="<?=$_SESSION['projectName']?>/lib/js/jquery-2.1.4.min.js"></script>
	<!-- //jquery -->
	<script src="<?=$_SESSION['projectName']?>/lib/js/jquery.simpleLoadMore.min.js"></script>
	<!-- price range -->
	<script src="<?=$_SESSION['projectName']?>/lib/js/jquery-ui.js"></script>		
	<!-- flexisel (for special offers) -->
	<script src="<?=$_SESSION['projectName']?>/lib/js/jquery.flexisel.js"></script>
	<!--slide and zoom product_detail -->
	<script src="<?=$_SESSION['projectName']?>/lib/js/jquery.magnific-popup.js"></script>
	<script src="<?=$_SESSION['projectName']?>/lib/js/imagezoom.js"></script>
	<script src="<?=$_SESSION['projectName']?>/lib/js/jquery.flexslider.js"></script>

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
					<a href="<?=$_SESSION['projectName']?>/Home">

						<span>N</span>link							
						<img src="<?=$_SESSION['projectName']?>/lib/images/logo.png" alt=" ">

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
					<?php
						if(isset($_SESSION['UserId']))
						{
					?>
							<li>
								<a href="<?=$_SESSION['projectName']?>/Profile">
									<i class="fa fa-user-circle-o" aria-hidden="true" style="color:#993414"></i> Tài Khoản
								</a>
							</li>
							<li style="border-right:none">
								<a href="javascript:void();"><i class="fa fa-sign-out" aria-hidden="true" style="color:#993414"></i> Đăng Xuất</a>
							</li>
					<?php
						}
		  				else
						{
					?>
							<li>
								<a href="#" data-toggle="modal" data-target="#myModal1">
									<span class="fa fa-unlock-alt" aria-hidden="true"></span> Đăng Nhập
								</a>
							</li>
							<li>
								<a href="#" data-toggle="modal" data-target="#myModal2">
									<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Đăng Ký 
								</a>
							</li>
					<?php
						}
					?>
				</ul>
				<!-- //header lists -->
				<!-- search -->
				<div class="agileits_search">
					<form action="<?=$_SESSION['projectName']?>/Product/Search" method="post">
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
						<button onclick="drawCart()" class="w3view-cart" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
						</button>
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
						
							<div class="styled-input agile-styled-input-top">
								<input id="l_email" type="email" placeholder="Email" name="email" required>
							</div>
							<div class="styled-input">
								<input id="l_pass" type="password" placeholder="Mật Khẩu" name="pass" required>
							</div>
							<a data-toggle="modal" data-target="#tim_lai_mat_khau" style="cursor: pointer">Quên mật khẩu</a><br/>
							<div style="margin-top: 15px">
								<input class="btn btn-primary" type="button" onclick="login()" value="Đăng Nhập">&nbsp;					
								Chưa có tài khoản? Đăng ký <a href="" data-toggle="modal" data-target="#myModal2">tại đây</a>
							</div>
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
						<p style="color:gray">
							Chưa có tài khoản? Vui lòng tạo tài khoản mới.
						</p>
						<!-- <form action="<?=$_SESSION['projectName']?>/Home/Register" method="post"> -->
							<div class="agile-styled-input-top">
								<label style="margin-bottom: 5px">Họ Tên <span style="color:red">*</span></label>
								<input class="form-control" id="r_name" type="text" name="name" required>
							</div>
							<div>
								<label style="margin-bottom: 5px">Số Điện Thoại <span style="color:red">*</span></label>
								<input class="form-control" id="r_phone" type="text" name="mobile" required>
							</div>
							<div>
								<label style="margin-bottom: 5px">Email <span style="color:red">*</span></label><br/>
								<span id="noti_email"></span>
								<input class="form-control" id="r_email" type="email" onkeyup="checkEmail($(this).val())" name="email" required>
							</div>
							<div>
								<label style="margin-bottom: 5px">Mật Khẩu <span style="color:red">*</span></label><br/>
								<span id="noti_pass"></span>
								<input class="form-control" id="r_pass" type="password" onkeyup="checkPass($(this).val())" name="pass" id="password1" required>
							</div>
							<div>
								<label style="margin-bottom: 5px">Nhập Lại Mật Khẩu <span style="color:red">*</span></label><br/>
								<span id="noti_repass"></span>
								<input class="form-control" id="r_repass" type="password" onkeyup="checkRepass($(this).val())" name="re_pass" id="password2" required>
							</div>
							<div>
								<label style="margin-bottom: 5px">Năm Sinh <span style="color:red">*</span></label>								
								<input id="" type="date" class="form-control" name="" id="" required style="margin-bottom: 15px">
							</div>
							<div>
								<label style="margin:10px 0 5px 0">Tỉnh/Thành Phố <span style="color:red">*</span></label>				
								<select id="tinh_thanh_ly" class="form-control">
									<option value="0">---Chọn Tỉnh Thành---</option>
									<option value="1">Hồ Chí Minh</option>
								</select>
							</div>
							<div>
								<label style="margin:20px 0 5px 0">Quận/Huyện <span style="color:red">*</span></label>				
								<select id="qh_change" class="form-control">
								    <option id="chon_qh_ly" value="0">---Chọn Quận/Huyện---</option>
									<option class="quan_huyen_ly" value="1">Gò Vấp</option>				
								</select>
							</div>
							<div>
								<label style="margin:20px 0 5px 0">Phường/Xã <span style="color:red">*</span></label>				
								<select class="form-control">
									<option id="chon_px_ly" value="0">---Chọn Phường/Xã---</option>
									<option class="phuong_xa_ly" value="1">Phường 16</option>
								</select>
							</div>
							<div>
								<label style="margin:20px 0 5px 0">Địa Chỉ <span style="color:red">*</span></label><br/>
								<span id="noti_email"></span>
								<input class="form-control" id="" type="text" name="" required>
							</div>
								<input type="button" class="btn btn-primary" id="r_submit" onclick="register()" name="register" value="Đăng Ký">					
							</div>

						<!-- </form> -->
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
		<div class="container" style="max-height: 53px;">
			<div class="agileits-navi_search">
				<form id="form-select-depart" action="<?=$_SESSION['projectName']?>/Product/Department" method="get">
					<select id="agileinfo-nav_search" name="url" required="">
						<option value="">Danh mục sản phẩm</option>
						<?php
							foreach($data['listDepart'] as $item)
							{
						?>
                        	<option value="<?=$item['url']?>"><?=$item['DepartName']?></option>
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
								<li class="">
									<a class="nav-stylehead" href="<?=$_SESSION['projectName']?>/Home">Trang Chủ
										<span class="sr-only">(current)</span>
									</a>
								</li>								
								<li class="">
									<a class="nav-stylehead" href="<?=$_SESSION['projectName']?>/Introduce">Giới Thiệu</a>
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
														if($flag!=0 && $flag != $item['CateId'])
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
														<a href="<?=$_SESSION['projectName']?>/Product/Category/<?=$item['url']?>"><?=$item['CateName']?></a>
													</li>
												<?php
													$flag = $item['CateId'];
													}
												?>
												</ul>
											</div>
											<!--<div class="col-sm-4 multi-gd-img">
												<img src="<?=$_SESSION['projectName']?>/lib/images/nav.png" alt="">
											</div>-->
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
									<a class="nav-stylehead" href="<?=$_SESSION['projectName']?>/Contact">Liên Hệ</a>
								</li>
								<li class="dropdown">
									<a class="nav-stylehead dropdown-toggle" href="#" data-toggle="modal" data-target="#tra_cuu_don_hang">Tra Cứu Đơn Hàng
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
				<img src="<?=$_SESSION['projectName']?>/lib/images/tab3.png" alt=" ">
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //newsletter -->
	<!-- footer -->
	<footer style="padding-bottom: 0px">
		<div class="container">
			<!-- footer first section -->
			<p class="footer-main" style="margin-top: -30px">
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
						<h3>Nlink</h3>
						<a href="http://online.gov.vn/Home/WebDetails/32856" target="_blank">
							<img src="<?=$_SESSION['projectName']?>/lib/images/bct.png" alt="err" style="width: 80%; height: 60px" />
						</a>
					</div>
					<div class="col-xs-6 footer-grids agile-secomk">
						<h5 style="color:#656565; font-weight: bold; font-size:12px">CÔNG TY TNHH NLINK VIỆT NAM</h5>
						<p style="font-size: 12px; color:#656565; margin-top: 10px">Độc quyền phân phối thương hiệu REVLON, AIMER và TWG tại thị trường Việt Nam.</p>
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
								<a href="<?=$_SESSION['projectName']?>/Introduce">Giới Thiệu</a>
							</li>
							<li>
								<a href="<?=$_SESSION['projectName']?>/Contact">Liên Hệ</a>
							</li>
							<li>
								<a data-toggle="modal" data-target="#tra_cuu_don_hang" style="cursor: pointer">Tra Cứu Đơn Hàng</a>
							</li>
							<li>
								<a href="faqs.html">Tin Tức</a>
							</li>
							<li>
								<a href="<?=$_SESSION['projectName']?>/Introduce/Policy">Chính Sách Đổi Trả</a>
							</li>
							<li>
								<a href="privacy.html">Hướng Dẫn Đặt Hàng</a>
							</li>
						</ul>
					</div>
					<div class="col-xs-6 footer-grids">
						<h3>Thông Tin</h3>
						<ul>
							<li style="color:#656565">
								<i class="fa fa-map-marker"></i> 76 Trần Đình Xu, P. Cô Giang, Q.1, TP.HCM</li>
							<li style="color:#656565">
								<i class="fa fa-mobile"></i> +84 08 383 78111/222</li>
							<li style="color:#656565">
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
			<!--<div class="agile-sometext">				
				<!-- payment -->
				<!--<div class="sub-some child-momu">
					<h5>Payment Method</h5>
					<ul>
						<li>
							<img src="<?=$_SESSION['projectName']?>/lib/images/pay2.png" alt="">
						</li>
						<li>
							<img src="<?=$_SESSION['projectName']?>/lib/images/pay5.png" alt="">
						</li>
						<li>
							<img src="<?=$_SESSION['projectName']?>/lib/images/pay1.png" alt="">
						</li>
						<li>
							<img src="<?=$_SESSION['projectName']?>/lib/images/pay4.png" alt="">
						</li>
						<li>
							<img src="<?=$_SESSION['projectName']?>/lib/images/pay6.png" alt="">
						</li>
						<li>
							<img src="<?=$_SESSION['projectName']?>/lib/images/pay3.png" alt="">
						</li>
						<li>
							<img src="<?=$_SESSION['projectName']?>/lib/images/pay7.png" alt="">
						</li>
						<li>
							<img src="<?=$_SESSION['projectName']?>/lib/images/pay8.png" alt="">
						</li>
						<li>
							<img src="<?=$_SESSION['projectName']?>/lib/images/pay9.png" alt="">
						</li>
					</ul>
				</div>-->
				<!-- //payment -->
			<!--</div>-->
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
	
	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

		  <!-- Modal content-->
	  		<div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Giỏ Hàng</h4>
				</div>
				<div id="cart-modal" class="modal-body">
					
					
					
					
				</div>
				<div class="modal-footer">						
					<button onclick="window.location='<?=$_SESSION['projectName']?>/Cart'" type="button" class="btn btn-primary">Kiểm Tra Giỏ Hàng</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
		  	</div>

		</div>
	</div>
	
	<div class="modal fade" id="tra_cuu_don_hang" role="dialog">
		<div class="modal-dialog">

		  <!-- Modal content-->
	  		<div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Tra Cứu Đơn Hàng</h4>
				</div>
				<div class="modal-body">					
					<input class="form-control" type="text" placeholder="Vui lòng nhập mã đơn hàng tại đây" style="width: 50%" />
				</div>
				<div class="modal-footer">						
					<button type="button" class="btn btn-primary">Tra Cứu</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
		  	</div>

		</div>
	</div>
	
	<div class="modal fade" id="tim_lai_mat_khau" role="dialog">
		<div class="modal-dialog">

		  <!-- Modal content-->
	  		<div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Tìm Lại Mật Khẩu</h4>
				</div>
				<div class="modal-body">		
					<label>Nhập Email: <span style="color:red">*</span></label>
					<input class="form-control" type="text" placeholder="Vui lòng nhập email của bạn tại đây" style="width: 50%; margin-top: 15px" />
				</div>
				<div class="modal-footer">						
					<button type="button" class="btn btn-success">Gửi</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
		  	</div>

		</div>
	</div>
	
	<!-- //copyright -->

	<!-- js-files -->
	<!-- <script>-->		
	

	<script src="<?=$_SESSION['projectName']?>/lib/js/SmoothScroll.min.js"></script>

	<script src="<?=$_SESSION['projectName']?>/lib/js/move-top.js"></script>
	<script src="<?=$_SESSION['projectName']?>/lib/js/easing.js"></script>

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
			
			$(".quan_huyen_ly").hide();
			$(".phuong_xa_ly").hide();
			$("#tinh_thanh_ly").change(function(){
				if($("#tinh_thanh_ly").val() == 0)
				{
					$(".quan_huyen_ly").hide();
					$(".phuong_xa_ly").hide();				
					$("#chon_qh_ly").prop('selected', true);
					$("#chon_px_ly").prop('selected', true);
				}
				else{
					$(".quan_huyen_ly").show();					
				}
			});
			
			$("#qh_change").change(function(){				
				if($("#qh_change").val() == 0)
				{
					$("#chon_px_ly").prop('selected', true);
					$(".phuong_xa_ly").hide();	
				}
				else{
					$(".phuong_xa_ly").show();					
				}
			});
			$("#agileinfo-nav_search").change(function(){
				console.log($("#agileinfo-nav_search").val());
				window.location = "<?=$_SESSION['projectName']?>/Product/Department/"+$("#agileinfo-nav_search").val();
			})
		});
		
		function checkEmail(email)
		{
			if(email.trim()!="")
			{
				$.ajax({
					url:'<?=$_SESSION['projectName']?>/Ajax/CheckIssetUser',
					type:"POST",
					data: {
						email : email.trim()
					},
					success: function (data){
						switch(data)
						{
							case "1":
								$("#noti_email").html("");
								$('#r_submit').prop('disabled', false);
								break;
							case "-1":
								$("#noti_email").html("<p style='color: red' >email đã được đăng ký!</p>");
								$('#r_submit').prop('disabled', true);
								break;
							case "-3":
								$("#noti_email").html("<p style='color: red' >email không đúng định dạng!</p>");
								$('#r_submit').prop('disabled', true);
								break;
							default:
								$("#noti_email").html("");
								$('#r_submit').prop('disabled', true);
								break;
						}
					}
				});
			}
		}
		function checkPass(pass)
		{
			if(pass!="")
			{
				if(pass.length < 6)
				{
					$("#noti_pass").html('<p style="color: red">Mật khẩu phải có ít nhất 6 kí tự!</p>');
				}
				else
				{
					$("#noti_pass").html("");
				}
			}
		}
		function checkRepass(repass)
		{
			if(repass!="")
			{
				if(repass!=$('#r_pass').val())
				{
					$('#noti_repass').html('<p style="color: red">Nhập lại Mật Khẩu phải giống Mật khẩu!</p>');
				}
				else
				{
					$("#noti_repass").html("");
				}
			}
		}
		function register()
		{
			var email = $("#r_email").val().trim();
			var name = $("#r_name").val().trim();
			var phone = $("#r_phone").val();
			var pass = $("#r_pass").val();
			var repass = $("#r_repass").val();
			var noti = "";
			if(email == "")
			{
				noti += "Địa chỉ email không được rỗng!\n";
			}
			if(name == "")
			{
				noti += "Họ tên không được rỗng!\n";
			}
			if(phone == "")
			{
				noti += "Số điện thoại không được rỗng!\n";
			}
			if(pass == "")
			{
				noti += "Mật khẩu không được rỗng!\n";
			}
			if(email == "")
			{
				noti += "Nhập lại mật khẩu không được rỗng!\n";
			}
			if(noti != "")
			{
				alert(noti);
			}
			else
			if(noti == "" && $("#noti_repass").html() == "" && $("#noti_pass").html() == "" && $("#noti_email").html() == "")
			{
				$.ajax({
					url:'<?=$_SESSION['projectName']?>/Ajax/Register',
					type:"POST",
					data: {
						email : email,
						name: name,
						mobile: phone,
						pass : pass,
					},
					success: function (data){
						console.log(data);
						switch(data)
						{
							case "1":
								location.reload(true);
								break;
							default:
								alert("Đăng ký thất bại!")
								break;
						}
					}
				});
			}
		}
		function login(){
			var email = $("#l_email").val();
			var pass = $("#l_pass").val();
			$.ajax({
					url:'<?=$_SESSION['projectName']?>/Ajax/Login',
					type:"POST",
					data: {
						email : email,
						pass : pass,
					},
					success: function (data){
						console.log(data);
						if(data == "1")
						{
							location.reload(true);
						}
						else
						{
							alert("Đăng nhập thất bại!");
						}
					}
				});
		}
	function addCart(id,qty,price,name,img,url,point,buynow = 0)
	{
		if(qty > 0){
			var cart = new Array();
			if(getCookie("cart_nlink") == '')
			{
				setCookie("cart_nlink",JSON.stringify(cart),30);
			}
			
			cart = JSON.parse(getCookie("cart_nlink"));
			var flag = 0;
			for(var i = 0; i < cart.length; i++){
				if(cart[i].id == id)
				{
					cart[i].qty = parseInt(cart[i].qty) + parseInt(qty); 
					flag = 1;
					break;
				}
			}
			if(flag == 0)
			{
				var pro = {
						id:id,
						qty:qty,
						price:price,
						name:name,
						img:img,
						url:url,
						point:point
					}
				cart.push(pro);
			}
			setCookie("cart_nlink",JSON.stringify(cart),30);
			drawCart();
			if(buynow == 1)
			{
				window.location = "<?=$_SESSION['projectName']?>/Cart";
			}
			else
			{
				$("#myModal").modal("show");
			}
		}
		else
		{
			alert("Số lượng sản phẩm phải lớn hơn 0");
		}
	}
	function updateCart(id,qty)
	{
		if(qty > 0){
			if(getCookie("cart_nlink") != "")
			{
				var cart = JSON.parse(getCookie("cart_nlink"));

				for(var i = 0; i < cart.length; i++){
					if(cart[i].id == id)
					{
						cart[i].qty = qty;
						break;
					}
				}
				setCookie("cart_nlink",JSON.stringify(cart),30);
				drawCart();
			}
		}
		else
		{
			alert("Số lượng sản phẩm phải lớn hơn 0");
		}
	}
	function deleteCart(id)
	{
		if(getCookie("cart_nlink") != "")
		{
			var r = confirm("Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?");
			if(r == true)
			{
				var cart = JSON.parse(getCookie("cart_nlink"));

				for(var i = 0; i < cart.length; i++){
					if(cart[i].id == id)
					{
						cart.splice(i,1);
						break;
					}
				}
				setCookie("cart_nlink",JSON.stringify(cart),30);
				drawCart();
			}
		}
	}
	function drawCart()
	{
		if(getCookie("cart_nlink")!="")
		{
			var cart  = JSON.parse(getCookie("cart_nlink"));
			$("#cart-modal").html("");
			var totalPrice = 0;
			for(var i = 0; i< cart.length; i++)
			{
				totalPrice += cart[i].qty * cart[i].price;
				$("#cart-modal").append('<table style="margin-top: 10px"><tr><td style="width: 200px; font-size: 15px">'+cart[i].name+'</td><td style="width: 100px"><input onchange="updateCart('+cart[i].id+',$(this).val())" type="number" min="1" value="'+cart[i].qty+'" style="width: 50px; text-align: center" /></td><td style="width: 100px"><button class="btn btn-danger" onclick="deleteCart('+cart[i].id+')" style="font-size: 8px">X</button></td><td><label style="font-size: 15px">'+new Intl.NumberFormat('de-DE').format(cart[i].price)+'</label></td></tr></table>');
			}
			if(cart.length > 0)
			{
				$("#cart-modal").append('<table style="margin-top: 40px"><tr><td colspan="2" style="font-weight: bold">Tổng thành tiền: <span style="color:red">'+new Intl.NumberFormat('de-DE').format(totalPrice)+' VND</span></td></tr></table>');
			}
			else{
				$("#cart-modal").append('<table><tr><td colspan="2" style="font-weight: bold">Bạn chưa chọn sản phẩm nào. Vui lòng chọn sản phẩm!</td></tr></table>');
			}
		}
	}
	function setCookie(cname, cvalue, exdays) {
       var d = new Date();
       d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
       var expires = "expires=" + d.toUTCString();
       document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    function getCookie(cname) {
       var name = cname + "=";
       var decodedCookie = decodeURIComponent(document.cookie);
       var ca = decodedCookie.split(';');
       for (var i = 0; i < ca.length; i++) {
           var c = ca[i];
           while (c.charAt(0) == ' ') {
               c = c.substring(1);
           }
           if (c.indexOf(name) == 0) {
               return c.substring(name.length, c.length);
           }
       }
       return "";
    }
	
	</script>

	<script src="<?=$_SESSION['projectName']?>/lib/js/bootstrap.js"></script>

</body>

</html>