<!-- page -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="index.html">Home</a>
					<i>|</i>
				</li>
				<li>Đơn Hàng</li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->
<!-- checkout page -->
<div class="privacy">
	<div class="container">
		<!-- tittle heading -->
		<h3 class="tittle-w3l" style="font-size: 30px">Thông Tin Đơn Hàng
			<span class="heading-style">
				<i></i>
				<i></i>
				<i></i>
			</span>
		</h3>
		<!-- //tittle heading -->
		<div class="checkout-right">				
			<div class="table-responsive">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>STT</th>
							<th>Hình</th>
							<th>Số Lượng</th>
							<th>Sản Phẩm</th>
							<th>Giá</th>
							<th>Thành Tiền</th>
							<th>Xóa</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="invert">1</td>
							<td class="invert-image">
								<a href="single2.html">
									<img src="lib/images/s8.jpg" alt=" " class="img-responsive" style="width: 50px; height: 50px">
								</a>
							</td>
							<td class="invert">
								<div class="quantity">
									<label style="font-size: 18px">2</label>
								</div>
							</td>
							<td class="invert">Spotzero Spin Mop</td>
							<td class="invert">10,000 VND</td>
							<td class="invert" style="color:darkblue; font-weight: bold">20,000 VND</td>
							<td class="invert">
								<a href="#" style="color:red"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<td class="invert">2</td>
							<td class="invert-image">
								<a href="single2.html">
									<img src="lib/images/s7.jpg" alt=" " class="img-responsive" style="width: 50px; height: 50px">
								</a>
							</td>
							<td class="invert">
								<div class="quantity">
									<label style="font-size: 18px">2</label>
								</div>
							</td>
							<td class="invert">Spotzero Spin Mop</td>
							<td class="invert">20,000 VND</td>
							<td class="invert" style="color:darkblue; font-weight: bold">40,000 VND</td>
							<td class="invert">
								<a href="#" style="color:red"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</td>
						</tr>
					</tbody>
				</table>				
			</div>
		</div>
		<hr/>
		<div class="checkout-left">
			<div class="address_form_agile row">
				<h4 style="color:black">Thông Tin Nhận Hàng</h4>
				<form action="payment.html" method="post" class="creditly-card-form agileinfo_form col-md-8 col-sm-12 col-xs-12">
					<div class="creditly-wrapper wthree, w3_agileits_wrapper">
						<div class="information-wrapper">
							<div class="first-row">
								<div class="controls">
									<input class="billing-address-name" type="text" name="name" placeholder="Họ Tên Người Nhận *" required>
								</div>
								<div class="controls">
									<input class="billing-address-name" type="email" name="email" placeholder="Email *" required>
								</div>
								<div class="w3_agileits_card_number_grids">
									<div class="w3_agileits_card_number_grid_left">
										<div class="controls">
											<input type="text" placeholder="Số Điện Thoại *" name="mobile" required>
										</div>
									</div>
									<div class="w3_agileits_card_number_grid_left">
										<div class="controls">
											<input type="text" placeholder="Số Điện Thoại 2" name="mobile2">
										</div>
									</div>
									<div class="w3_agileits_card_number_grid_right">
										<div class="controls">
											<select id="tinh_thanh" style="width: 30%">
												<option value="0">---Chọn Tỉnh Thành---</option>
												<option value="1">Hồ Chí Minh</option>
											</select>
											<select style="width: 30%">
												<option id="chon_qh" value="0">---Chọn Quận/Huyện---</option>		<option class="quan_huyen" value="1">Gò Vấp</option>				
											</select>
											<select style="width: 30%">
												<option id="chon_px" value="0">---Chọn Phường/Xã---</option>
												<option class="phuong_xa" value="1">Phường 16</option>
											</select>
										</div>
									</div>
									<div class="w3_agileits_card_number_grid_right">
										<div class="controls">
											<input type="text" placeholder="Địa Chỉ Chi Tiết *" name="address" required>
										</div>
									</div>
									<div class="clear"> </div>
								</div>
								<div class="controls">
									<input type="text" placeholder="Ghi Chú" name="note">
								</div>
								<div class="controls">
									<select class="option-w3ls">
										<option>Giao Hàng Tiêu Chuẩn</option>
										<option>Giao Hàng Nhanh</option>							
									</select>
								</div>								
							</div>							
						</div>
					</div>
				</form>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div style="margin-bottom: 15px">
						<p style="color:black; margin-top: 10px;">Tiền Hàng: <span style="font-weight: bold">2.000.000 VND</span></p>
						<p id="trans_pay" style="color:black; margin-top: 10px;">Phí Vận Chuyển: <span style="font-weight: bold">15.000 VND</span></p>
					</div>

					<i class="fa fa-hand-o-right" aria-hidden="true"></i>
					<a id="use_ma_giamgia" href="javascript:void()" style="font-size:14px; color:black; font-weight: bold">Sử dụng mã giảm giá <i class="fa fa-chevron-down" aria-hidden="true"></i></a><br/>

					<div id="ma_giamgia">
						<input type="text" style="margin: 8px; border-radius: 2px" /><button class="btn btn-success">Áp dụng</button>
					</div>

					<div style="margin-top: 15px">
						<i class="fa fa-hand-o-right" aria-hidden="true"></i>
						<a id="use_diem_tichluy" href="javascript:void()" style="font-size:14px; color:black; font-weight: bold">Sử dụng điểm tích lũy <i class="fa fa-question-circle" aria-hidden="true" style="color:#3D6199" title="Xem chính sách tích điểm của chúng tôi"></i></a><br/>
						<p id="diem_tichluy" style="color:black; margin: 8px; font-size: 15px">Bạn có: 9 điểm <button class="btn btn-success">Áp dụng</button></p>
					</div>

					<p style="color:black; margin-top: 15px;">Tổng Tiền Cần Thanh Toán: <span style="color:#d60c0c; font-weight: bold">2.015.000 VND</span></p>

					<p style="color:black; margin-top: 10px;">Tổng Điểm Nhận Được: <span style="color:#d60c0c; font-weight: bold">10</span></p>
					
					<p id="day_ship" style="color:black; margin-top: 10px; font-weight: bold">Thời gian giao hàng: Từ <span class="day_shipfrom">2</span> đến <span id="day_shipto">4</span> ngày làm việc kể từ khi xác nhận đơn hàng</p>
					
					<p style="color:black; margin-top: 10px; font-size: 14px">Đặt hàng qua điện thoại (8h-17h30)</p>
					
				</div>
			</div>
			<div class="controls">
				<input type="checkbox" id="" name="support" style="cursor: pointer; margin: 15px 0 25px 0">
				<label for="support"> Chọn vào đây nếu bạn muốn được gọi tư vấn</label>
				<i class="fa fa-question-circle" aria-hidden="true" style="cursor: pointer; color: #3D6199" title="Nếu quý khách có bất cứ thắc mắc nào về đơn hàng hoặc chính sách vận chuyển. Hãy chọn vào đây để chúng tôi liên lạc và giải đáp thắc mắc của quý khách. Cảm ơn!"></i>
			</div>
			<h4 style="color:black; margin-top: 15px">Phương Thức Thanh Toán</h4>
			<div class="row" style="margin:20px 0 35px 0">
				<div id="cod" class="col-md-3" style="border:1px solid #ebe1e1; height: 130px; cursor: pointer">
					<p><i class="fa fa-truck" aria-hidden="true" style="color:dodgerblue"></i> <span style="color:black">Thanh toán khi nhận hàng</span></p>
					<p style="font-size: 12px">Quý khách sẽ thanh toán bằng tiền mặt khi nhận hàng</p>										
				</div>
				<div id="cast_bank" class="col-md-3" style="border:1px solid #ebe1e1; height: 130px; cursor: pointer">
					<p><i class="fa fa-credit-card-alt" aria-hidden="true" style="color:dodgerblue"></i> <span style="color:black">Thanh toán bằng chuyển khoản ngân hàng</span></p>
					<p style="font-size: 12px">Chuyển khoản trực tiếp đến tài khoản của Nlink.vn</p>
				</div>
				<div id="cast_online" class="col-md-3" style="border:1px solid #ebe1e1; height: 130px; cursor: pointer">
					<p><i class="fa fa-money" aria-hidden="true" style="color:dodgerblue"></i> <span style="color:black">Thanh toán online</span></p>
					<p style="font-size: 12px">Thanh toán trực tuyến qua cổng thanh toán OnePay</p>
				</div>
			</div>
			<div class="checkout-right-basket">
				<button class="btn btn-primary check_out">Tiếp tục mua hàng</button>
				<button class="btn btn-danger check_out">Đặt hàng</button>
			</div>			
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //checkout page -->

<script>
	$(document).ready(function () {
		//Chọn Tỉnh/Thành Phố => Mã vận chuyển
		$("#trans_pay").hide();
		$("#day_ship").hide();
		$(".quan_huyen").hide();
		$(".phuong_xa").hide();
		$("#tinh_thanh").change(function(){
			if($("#tinh_thanh").val() == 0)
			{
				$("#trans_pay").hide();
				$(".quan_huyen").hide();
				$(".phuong_xa").hide();
				$(".day_ship").hide();
				$("#chon_qh").prop('selected', true);
				$("#chon_px").prop('selected', true);
			}
			else{
				$("#trans_pay").show();
				$("#day_ship").show();
				$(".quan_huyen").show();
				$(".phuong_xa").show();
			}
		});
		
		//Chọn Mã Giám Giá
		$("#ma_giamgia").hide();
		$("#use_ma_giamgia").click(function(){
			$("#ma_giamgia").show();
		});

		//Chọn Điểm Tích Lũy
		$("#diem_tichluy").hide();
		$("#use_diem_tichluy").click(function(){
			$("#diem_tichluy").show();
		});

		//Phương Thức Thanh Toán
		$("#cod").css("border-color","#43c0e4");
		$("#cod").css("border-width","3px");

		$("#cast_bank").click(function(){
			$("#cod").css("border-color","#ebe1e1");
			$("#cast_online").css("border-color","#ebe1e1");
			$(this).css("border-color","#43c0e4");
			$(this).css("border-width","3px");
		});

		$("#cast_online").click(function(){
			$("#cod").css("border-color","#ebe1e1");
			$("#cast_bank").css("border-color","#ebe1e1");
			$(this).css("border-color","#43c0e4");
			$(this).css("border-width","3px");
		});

		$("#cod").click(function(){
			$("#cast_online").css("border-color","#ebe1e1");
			$("#cast_bank").css("border-color","#ebe1e1");
			$(this).css("border-color","#43c0e4");
			$(this).css("border-width","3px");
		});
	});
</script>