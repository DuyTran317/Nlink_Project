<!-- Single Page -->
<div class="banner-bootom-w3-agileits">
	<div class="container">			
		<div class="col-md-5 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<ul class="slides">
					<?php
						foreach($data['Img'] as $img)
						{
					?>
						<li data-thumb="<?=$_SESSION['projectName']?>/lib/images/product/<?=$img['Img']?>">
							<div class="thumb-image">
								<img src="<?=$_SESSION['projectName']?>/lib/images/product/<?=$img['Img']?>" data-imagezoom="true" class="img-responsive" alt=""> 
							</div>
						</li>
					<?php
						}
					?>
						
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="col-md-7 single-right-left simpleCart_shelfItem">
			<h3><?=$data['Product']['ProductName']?></h3>				
			<p>
				<span class="item_price"><?php echo number_format($data['Product']['Price']);?> VND</span>
				<del><?php echo number_format($data['Product']['PriceOfMarket']);?> VND</del>					
			</p>
			<div class="single-infoagile">
				<ul>
					<li>
						<span style="font-weight: bold; font-size: 17px">Trình trạng: <?php if($data['Product']['Qty']>0){echo "<font color='green'>Còn hàng</font>";}else{echo "<font color='red'>Hết hàng</font>";} ?></span> 
					</li>
					<li>
						<span style="font-weight: bold; font-size: 17px">Số lượng:</span>
						<input id="qty" type="number" min="1" value="1" style="width: 50px; margin-left: 10px; text-align: center" />
					</li>
					<li>
						<button onclick="addCart(<?=$data['Product']['ProductId']?>,$('#qty').val(),<?=$data['Product']['Price']?>,<?=$data['Product']['ProductName']?>,<?=$data['Product']['Img']?>,1)" class="btn btn-danger">Mua Ngay</button>
						<button onclick="addCart(<?=$data['Product']['ProductId']?>,$('#qty').val(),<?=$data['Product']['Price']?>,<?=$data['Product']['ProductName']?>,<?=$data['Product']['Img']?>)" class="btn btn-success">Thêm Vào Giỏ</button>
					</li>
					<!--<li>
						1 offer from
						<span class="item_price">$950.00</span>
					</li>-->
				</ul>
				
			</div>
			<div class="product-single-w3l">	
				<div style="margin-top: 20px">
					<?=$data['Product']['ProductDesc']?>						
				</div>					
			</div>				
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //Single Page -->

<div class="container">
	<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#home">Thông Tin Chi Tiết</a></li>
	<li><a data-toggle="tab" href="#menu1">Hỏi & Đáp</a></li>
	<li><a data-toggle="tab" href="#menu2">Đánh Giá</a></li>
	</ul>

	<div class="tab-content">
		<div id="home" class="tab-pane fade in active" style="margin-top: 10px">
			<?=$data['Product']['ProductDesc']?>
		</div>
		<div id="menu1" class="tab-pane fade">
			<div class="container-fluid">
				<textarea class="form-control" placeholder="Câu hỏi của bạn" style="margin-top: 15px"></textarea>
				<button class="btn btn-primary" style="float: right; margin-top: 10px" id="open_add_question">Thêm Câu Hỏi</button>
				<div style="clear: right"></div>

				<div id="info_add_question">
					<input type="text" value="" placeholder="Họ tên" required class="form-control" style="max-width: 300px; margin-top: 10px" />
					<input type="number" value="" placeholder="Số điện thoại" class="form-control" required style="max-width: 300px; margin-top: 10px" />
					<input type="email" value="" placeholder="Email" class="form-control" required style="max-width: 300px; margin-top: 10px" />

					<button class="btn btn-danger" style="float: right; margin-top: 10px" id="cancel_add_question">Hủy</button>

					<button class="btn btn-info" style="float: right; margin-top: 10px; margin-right: 10px" id="add_question">Thêm</button>

					<div style="clear: right"></div>
				</div>										
			</div>
			<div style="margin-top: 20px">
			<?php
				$flag = 0;
				foreach($data['listQA'] as $item)
				{
					if($flag != $item['QuestionId'] && $flag != 0)
					{
						?>
							</div>
							<hr/>
						<?php
					}
					if($flag != $item['QuestionId'])
					{
						?>
						<div class="container-fluid" style="margin-top: 20px">
							<div class="row" style="margin-top: 15px">
								<label class="col-md-1">Hỏi:</label>
								<span class="col-md-11">Trời nóng ở sài gòn như bây giờ thì mình phải bào quản như thế nào. Minh thấy shop ghi la đẻ ở tủ đông đá, vậy mỗi lần sd la phải làm tan đá mơi uống được phải khôg shop?<br/>
								<span style="font-size: 14px; color: gray">Bởi: Thanh Mai vào 21/03/2020 14:00</span></span>
							</div>
						<?php
					}
					if($item['AnswerId'] != NULL)
					{
						?>
							<div class="row" style="margin-top: 15px">
								<label class="col-md-1">Đáp:</label>
								<span class="col-md-11">Bạn chỉ cần bảo quản sản phẩm ở ngăn mát tủ lạnh thôi nhé, không để ở ngăn đông đá ạ<br/>
								<span style="font-size: 14px; color: gray">Bởi: Nlink.vn vào 21/03/2020 14:00</span></span>
							</div>
						<?php
					}
				}
				if($flag != 0)
				{
			?>
				</div>
				<hr/>
			<?php
				}
			?>
			</div>
			<div style="text-align: center"><button class="btn btn-default">Xem thêm</button></div>
		</div>
		<div id="menu2" class="tab-pane fade">
			<div class="container" style="margin-top: 15px">
				<h4>Khách hàng đánh giá</h4>
				<h3 style="margin-top: 20px; color: red; font-size: 42px">
					<?=$data['Star']==NULL?0:$data['Star']?>/5 <i class="fa fa-star" aria-hidden="true" style="color: yellow; font-size: 42px"></i>
				</h3>
				<h4 style="margin-top: 40px">Gửi nhận xét của bạn</h4>
				<h5 style="margin-top: 20px">1. Đánh giá của bạn về sản phẩm này:<br/>				
					<div class="form-group">
						<div class="rate" style="margin-top: 12px">
							<i class="fa fa-hand-o-right" aria-hidden="true" style="font-size: 20px; margin-right: 10px"></i>
							<input type="radio" id="star5" name="rate" value="5" checked/>
							<label for="star5" title="text">5</label>
							<input type="radio" id="star4" name="rate" value="4" />
							<label for="star4" title="text">4</label>
							<input type="radio" id="star3" name="rate" value="3" />
							<label for="star3" title="text">3</label>
							<input type="radio" id="star2" name="rate" value="2" />
							<label for="star2" title="text">2</label>
							<input type="radio" id="star1" name="rate" value="1" />
							<label for="star1" title="text">1</label>
						</div>
					</div>
					<div style="clear: both"></div>
				</h5>
				<h5 style="margin-top: 20px">2. Viết nhận xét của bạn vào bên dưới: <span style="color:red">*</span>
					<textarea class="form-control" style="margin-top: 10px; max-width: 500px; height: 80px" placeholder="Nhận xét của bạn về sản phẩm này"></textarea>
				</h5>
				<h5 style="margin-top: 20px">3. Thông tin cá nhân của bạn: <span style="color:red">*</span><br/>
					<input type="text" value="" placeholder="Họ tên" required class="form-control" style="max-width: 300px; margin-top: 10px" />
					<input type="number" value="" placeholder="Số điện thoại" class="form-control" required style="max-width: 300px; margin-top: 10px" />
					<input type="email" value="" placeholder="Email" class="form-control" required style="max-width: 300px; margin-top: 10px" />
				</h5>
				<button class="btn btn-primary" style="margin-top: 20px">Thêm nhận xét</button>
			</div>
			<div class="container" style="margin-top: 40px">
				<div class="row">
					<div class="col-md-2" style="text-align: center">
						<i class="fa fa-user" aria-hidden="true" style="font-size: 42px"></i>
						<p style="color:black; margin-top: 5px">Nguyễn Văn Test</p>
						<p style="font-size: 12px; color: gray">20/03/2020 14:00</p>
					</div>
					<div class="col-md-10">
						<p>
							<i class="fa fa-star" aria-hidden="true" style="color: yellow"></i>
							<i class="fa fa-star" aria-hidden="true" style="color: yellow"></i>
							<i class="fa fa-star" aria-hidden="true" style="color: yellow"></i>
							<i class="fa fa-star" aria-hidden="true" style="color: yellow"></i>
							<i class="fa fa-star" aria-hidden="true" style="color: yellow"></i>
						</p>
						<span style="font-size: 15px">Qua tuổi 25 rồi nên mình cũng chú trọng và chăm chỉ chăm sóc da hơn, đặc biệt là vấn đề bổ sung collagen để da thực sự khỏe mạnh. Mình uống Collagen pure white được trong khoảng 1 tháng rồi. Vì dạng nước công dụng cũng nhanh hơn khi uống dạng viên, mình dùng được khoảng hơn 2 tuần thì cảm nhận được da mịn màng và căng khỏe hơn trước rất nhiều</span>
						<p id="rep_nhanxet" style="color:blue; font-size: 14px; cursor: pointer">Trả lời</p>

						<div id="info_nhanxet" style="margin-top: 20px">
							<textarea class="form-control" placeholder="Nhận xét của bạn"></textarea>
							<input type="text" value="" placeholder="Họ tên" required class="form-control" style="max-width: 300px; margin-top: 10px" />
							<input type="number" value="" placeholder="Số điện thoại" class="form-control" required style="max-width: 300px; margin-top: 10px" />
							<input type="email" value="" placeholder="Email" class="form-control" required style="max-width: 300px; margin-top: 10px" />

							<button class="btn btn-danger" style="float: right; margin-top: 10px" id="cancel_info_nhanxet">Hủy</button>					
							<button class="btn btn-info" style="float: right; margin-top: 10px; margin-right: 10px">Thêm</button>					
							<div style="clear: right"></div>
						</div>

						<div style="margin-top: 10px">
							<span style="font-weight: bold; margin-bottom: 5px">Nhi</span> - <span style="color:gray">21/03/2020 14:00</span><br/>
							<span style="font-size: 15px">Ok bạn nhé!</span>
						</div>
						
						<!--Xem thêm theo mỗi comment-->
						<div style="font-size: 14px; margin-top: 6px">
							<a href="#">Xem thêm</a>
						</div>
						
						<!--Xem thêm theo tất cả comment-->
						<div style="font-size: 14px; margin-top: 10px; text-align: center">
							<button class="btn btn-default">Xem thêm</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>			
</div>

<!-- special offers -->
<div class="featured-section" id="projects">
	<div class="container">
		<!-- tittle heading -->
		<h3 class="tittle-w3l" style="font-size: 30px; margin-top: 50px">Sản Phẩm Liên Quan
			<span class="heading-style">
				<i></i>
				<i></i>
				<i></i>
			</span>
		</h3>
		<!-- //tittle heading -->
		<div class="content-bottom-in">
			<ul id="flexiselDemo1">
				<li>
					<div class="w3l-specilamk">
						<div class="speioffer-agile">
							<a href="single.html">
								<img src="lib/images/s1.jpg" alt="">
							</a>
						</div>
						<div class="product-name-w3l">
							<h4>
								<a href="single.html">Aashirvaad, 5g</a>
							</h4>
							<div class="w3l-pricehkj">
								<h6>$220.00</h6>
								<p>Save $40.00</p>
							</div>
							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
								<form action="#" method="post">
									<fieldset>
										<input type="hidden" name="cmd" value="_cart" />
										<input type="hidden" name="add" value="1" />
										<input type="hidden" name="business" value=" " />
										<input type="hidden" name="item_name" value="Aashirvaad, 5g" />
										<input type="hidden" name="amount" value="220.00" />
										<input type="hidden" name="discount_amount" value="1.00" />
										<input type="hidden" name="currency_code" value="USD" />
										<input type="hidden" name="return" value=" " />
										<input type="hidden" name="cancel_return" value=" " />
										<input type="submit" name="submit" value="Add to cart" class="button" />
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="w3l-specilamk">
						<div class="speioffer-agile">
							<a href="single.html">
								<img src="lib/images/s4.jpg" alt="">
							</a>
						</div>
						<div class="product-name-w3l">
							<h4>
								<a href="single.html">Kissan Tomato Ketchup, 950g</a>
							</h4>
							<div class="w3l-pricehkj">
								<h6>$99.00</h6>
								<p>Save $20.00</p>
							</div>
							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
								<form action="#" method="post">
									<fieldset>
										<input type="hidden" name="cmd" value="_cart" />
										<input type="hidden" name="add" value="1" />
										<input type="hidden" name="business" value=" " />
										<input type="hidden" name="item_name" value="Kissan Tomato Ketchup, 950g" />
										<input type="hidden" name="amount" value="99.00" />
										<input type="hidden" name="discount_amount" value="1.00" />
										<input type="hidden" name="currency_code" value="USD" />
										<input type="hidden" name="return" value=" " />
										<input type="hidden" name="cancel_return" value=" " />
										<input type="submit" name="submit" value="Add to cart" class="button" />
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</li>										
				<li>
					<div class="w3l-specilamk">
						<div class="speioffer-agile">
							<a href="single2.html">
								<img src="lib/images/s6.jpg" alt="">
							</a>
						</div>
						<div class="product-name-w3l">
							<h4>
								<a href="single2.html">Fair & Lovely, 80 g</a>
							</h4>
							<div class="w3l-pricehkj">
								<h6>$121.60</h6>
								<p>Save $30.00</p>
							</div>
							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
								<form action="#" method="post">
									<fieldset>
										<input type="hidden" name="cmd" value="_cart" />
										<input type="hidden" name="add" value="1" />
										<input type="hidden" name="business" value=" " />
										<input type="hidden" name="item_name" value="Fair & Lovely, 80 g" />
										<input type="hidden" name="amount" value="121.60" />
										<input type="hidden" name="discount_amount" value="1.00" />
										<input type="hidden" name="currency_code" value="USD" />
										<input type="hidden" name="return" value=" " />
										<input type="hidden" name="cancel_return" value=" " />
										<input type="submit" name="submit" value="Add to cart" class="button" />
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</li>					
				<li>
					<div class="w3l-specilamk">
						<div class="speioffer-agile">
							<a href="single2.html">
								<img src="lib/images/s9.jpg" alt="">
							</a>
						</div>
						<div class="product-name-w3l">
							<h4>
								<a href="single2.html">Lakme Eyeconic Kajal, 0.35 g</a>
							</h4>
							<div class="w3l-pricehkj">
								<h6>$153.00</h6>
								<p>Save $40.00</p>
							</div>
							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
								<form action="#" method="post">
									<fieldset>
										<input type="hidden" name="cmd" value="_cart" />
										<input type="hidden" name="add" value="1" />
										<input type="hidden" name="business" value=" " />
										<input type="hidden" name="item_name" value="Lakme Eyeconic Kajal, 0.35 g" />
										<input type="hidden" name="amount" value="153.00" />
										<input type="hidden" name="discount_amount" value="1.00" />
										<input type="hidden" name="currency_code" value="USD" />
										<input type="hidden" name="return" value=" " />
										<input type="hidden" name="cancel_return" value=" " />
										<input type="submit" name="submit" value="Add to cart" class="button" />
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- //special offers -->

<script>
	$(document).ready(function () {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
		
		$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
		});
		
		$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		$("#info_add_question").hide();

		$("#open_add_question").click(function(){
			$("#info_add_question").show();				
			$(this).hide();
		});

		$("#cancel_add_question").click(function(){
			$("#info_add_question").hide();
			$("#open_add_question").show();
		});

		$("#info_nhanxet").hide();

		$("#rep_nhanxet").click(function(){
			$("#info_nhanxet").show();
		});

		$("#cancel_info_nhanxet").click(function(){
			$("#info_nhanxet").hide();
		});

	});
	
</script>