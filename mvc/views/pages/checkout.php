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
	<div id="fullpage" class="container">
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
					<tbody id="order-detail">
						
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
									<input id="name" class="billing-address-name" type="text" name="name" placeholder="Họ Tên Người Nhận *" required>
								</div>
								<div class="controls">
									<input id="email" class="billing-address-name" type="email" name="email" placeholder="Email" required>
								</div>
								<div class="w3_agileits_card_number_grids">
									<div class="w3_agileits_card_number_grid_left">
										<div class="controls">
											<input id="phonenumber1" type="text" placeholder="Số Điện Thoại *" name="mobile" required>
										</div>
									</div>
									<div class="w3_agileits_card_number_grid_left">
										<div class="controls">
											<input id="phonenumber2" type="text" placeholder="Số Điện Thoại 2" name="mobile2">
										</div>
									</div>
									
									<div class="w3_agileits_card_number_grid_right">
										<div class="controls">
											<select id="tinh_thanh" style="width: 30%">
												<option class="dscity" value="0" data-fee="0" data-timemin="0" data-timemax="0">---Chọn Tỉnh Thành---</option>
											<?php
												foreach($data['listCity'] as $item)
												{
											?>
												<option class="dscity" value="<?=$item['CityId']?>" data-fee="<?=$item['FeeShip']?>" data-timemin="<?=$item['TimeShipMin']?>" data-timemax="<?=$item['TimeShipMax']?>"><?=$item['CityName']?></option>
												
											<?php
												}
											?>
											</select>
											<select id="qh_change_ck" style="width: 30%">
												<option id="chon_qh" value="0">---Chọn Quận/Huyện---</option>
											</select>
											<select id="phuong_xa" style="width: 30%">
												<option id="chon_px" value="0">---Chọn Phường/Xã---</option>
											</select>
										</div>
									</div>
									<div class="w3_agileits_card_number_grid_right">
										<div class="controls">
											<input id="address" type="text" placeholder="Địa Chỉ Chi Tiết *" name="address" required>
										</div>
									</div>
									<div class="clear"> </div>
								</div>
								<div class="controls">
									<input id="note" type="text" placeholder="Ghi Chú" name="note">
								</div>
								<div class="controls">
									<select id="transpot" class="option-w3ls">
									<?php
										foreach($data['listTransport'] as $item)
										{
									?>
										<option value="<?=$item['TransportId']?>"><?=$item['TransportName']?></option>
									<?php
										}
									?>
									</select>
								</div>								
							</div>							
						</div>
					</div>
				</form>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div style="margin-bottom: 15px">
						<p style="color:black; margin-top: 10px;">Tiền Hàng: <span id="total" style="font-weight: bold">0</span> VND</p>
						<p id="trans_pay" style="color:black; margin-top: 10px;">Phí Vận Chuyển: <span id="shipFee" style="font-weight: bold">0</span> VND</p>
					</div>

					<i class="fa fa-hand-o-right" aria-hidden="true"></i>
					<a id="use_ma_giamgia" href="javascript:void();" style="font-size:14px; color:black; font-weight: bold">Sử dụng mã giảm giá <i class="fa fa-chevron-down" aria-hidden="true"></i></a><br/>

					<div id="ma_giamgia">
						<input id="value-voucher" type=number style="display:none" />
						<input id="code-voucher" type="text" style="margin: 8px; border-radius: 2px" /><button id="submit-voucher" onclick="applyVoucher()" class="btn btn-success">Áp dụng</button>
					</div>

					<div style="margin-top: 15px">
						<i class="fa fa-hand-o-right" aria-hidden="true"></i>
						<a id="use_diem_tichluy" href="javascript:void();" style="font-size:14px; color:black; font-weight: bold">Sử dụng điểm tích lũy <i class="fa fa-question-circle" aria-hidden="true" style="color:#3D6199" title="Xem chính sách tích điểm của chúng tôi"></i></a><br/>
						<p id="diem_tichluy" style="color:black; margin: 8px; font-size: 15px">Bạn có: <?=$data['User']['Point']?> điểm <button <?php if(isset($_SESSION['UserId']) && $data['User']['Point'] <= 0) {echo "disabled";} else {echo "onClick='UsePoint()'";}?> class="btn btn-success">Áp dụng</button></p>
					</div>

					<p style="color:black; margin-top: 15px;">Tổng Tiền Cần Thanh Toán: <span id="total-pay" style="color:#d60c0c; font-weight: bold">0</span> VND</p>

					<p style="color:black; margin-top: 10px;">Tổng Điểm Nhận Được: <span id="total-point" style="color:#d60c0c; font-weight: bold">0</span></p>
					
					<p id="day_ship" style="color:black; margin-top: 10px; font-weight: bold">Thời gian giao hàng: Từ <span id="day_shipfrom">2</span> đến <span id="day_shipto">4</span> ngày làm việc kể từ khi xác nhận đơn hàng</p>
					
					<p style="color:black; margin-top: 10px; font-size: 14px">Đặt hàng qua điện thoại (8h-17h30)</p>
					
				</div>
			</div>
			<div class="controls">
				<input type="checkbox" id="support" name="support" style="cursor: pointer; margin: 15px 0 25px 0">
				<label for="support"> Chọn vào đây nếu bạn muốn được gọi tư vấn</label>
				<i class="fa fa-question-circle" aria-hidden="true" style="cursor: pointer; color: #3D6199" title="Nếu quý khách có bất cứ thắc mắc nào về đơn hàng hoặc chính sách vận chuyển. Hãy chọn vào đây để chúng tôi liên lạc và giải đáp thắc mắc của quý khách. Cảm ơn!"></i>
			</div>
			<h4 style="color:black; margin-top: 15px">Phương Thức Thanh Toán</h4>
			<div class="row" style="margin:20px 0 35px 0">
				<div id="cod" onclick="changePayment(1)" class="col-md-3" style="border:1px solid #ebe1e1; height: 130px; cursor: pointer">
					<p><i class="fa fa-truck" aria-hidden="true" style="color:dodgerblue"></i> <span style="color:black">Thanh toán khi nhận hàng</span></p>
					<p style="font-size: 12px">Quý khách sẽ thanh toán bằng tiền mặt khi nhận hàng</p>										
				</div>
				<div id="cast_bank" onclick="changePayment(2)" class="col-md-3" style="border:1px solid #ebe1e1; height: 130px; cursor: pointer">
					<p><i class="fa fa-credit-card-alt" aria-hidden="true" style="color:dodgerblue"></i> <span style="color:black">Thanh toán bằng chuyển khoản ngân hàng</span></p>
					<p style="font-size: 12px">Chuyển khoản trực tiếp đến tài khoản của Nlink.vn</p>
				</div>
				<!-- <div id="cast_online" onclick="changePayment(3)" class="col-md-3" style="border:1px solid #ebe1e1; height: 130px; cursor: pointer">
					<p><i class="fa fa-money" aria-hidden="true" style="color:dodgerblue"></i> <span style="color:black">Thanh toán online</span></p>
					<p style="font-size: 12px">Thanh toán trực tuyến qua cổng thanh toán OnePay</p>
				</div> -->
			</div>
			<div class="checkout-right-basket">
				<button onclick="window.location='<?=$_SESSION['projectName']?>/Home'" class="btn btn-primary check_out">Tiếp tục mua hàng</button>
				<button onclick="submitCheckout()" class="btn btn-danger check_out">Đặt hàng</button>
			</div>			
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //checkout page -->

<script>
var havevoucher = 0; var haveusepoint = 0; var payment = 1;
	$(document).ready(function () {
		drawOrderDetail();
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
				var shipFee = $(".dscity:selected").attr('data-fee');
				$("#shipFee").html(new Intl.NumberFormat('de-DE').format(shipFee));
				$("#day_shipfrom").html($(".dscity:selected").attr('data-timemin'));
				$("#day_shipto").html($(".dscity:selected").attr('data-timemax'));
				$("#qh_change_ck").html("");
				$("#qh_change_ck").append('<option id="chon_qh" value="0">---Chọn Quận/Huyện---</option>')
				$.ajax({
					url:"<?=$_SESSION['projectName']?>/Ajax/loadDictrict",
					type:"POST",
					data:{
						id:$("#tinh_thanh").val()
					},
					success: function(data){
						var listDictrict = JSON.parse(data);
						for(var i = 0; i<listDictrict.length; i++)
						{
							$("#qh_change_ck").append('<option value="'+listDictrict[i].DictrictId+'">'+listDictrict[i].DictrictName+'</option>');
						}
					}
				});
				drawOrderDetail();
			}
		});
		
		$("#qh_change_ck").change(function(){
			if($("#qh_change_ck").val() == 0)
			{
				$("#chon_px").prop('selected', true);
				$(".phuong_xa").hide();	
			}
			else{
				$(".phuong_xa").show();	
				$("#phuong_xa").html("");
				$("#phuong_xa").append('<option id="chon_px" value="0">---Chọn Phường/Xã---</option>');
				
				$.ajax({
					url:"<?=$_SESSION['projectName']?>/Ajax/loadWard",
					type:"POST",
					data:{
						id:$("#qh_change_ck").val()
					},
					success: function(data){
						var listWard = JSON.parse(data);
						for(var i = 0; i<listWard.length; i++)
						{
							$("#phuong_xa").append('<option value="'+listWard[i].WardId+'">'+listWard[i].WardName+'</option>');
						}
					}
				})	
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
	function drawOrderDetail()
	{
		$("#order-detail").html("");
		if(getCookie("cart_nlink")!="")
		{
			var cart = JSON.parse(getCookie("cart_nlink"));
			if(cart.length == 0)
			{
				$("#fullpage").html("<h1>Bạn chưa chọn sản phẩm. Vui lòng chọn sản phẩm mà bạn muốn!</h1>");
			}
			else
			{
				var totalPrice = 0; var totalPoint = 0;
				for(var i = 0; i< cart.length; i++)
				{
					totalPrice += cart[i].qty * cart[i].price;
					$("#order-detail").append('<tr><td class="invert">'+(i+1)+'</td><td class="invert-image"><a href="<?=$_SESSION["projectName"]?>/Product/Detail/'+cart[i].url+'"><img src="<?=$_SESSION["projectName"]?>/lib/images/product/'+cart[i].img+'" alt=" " class="img-responsive" style="width: 50px; height: 50px"></a></td><td class="invert"><div class="quantity"><input onchange="updateCart('+cart[i].id+',$(this).val());drawOrderDetail();" type="number" min="1" value="'+cart[i].qty+'" style="font-size: 18px; width:50px; text-align: center"/></div></td><td class="invert">'+cart[i].name+'</td><td class="invert">'+new Intl.NumberFormat('de-DE').format(cart[i].price)+' VND</td><td class="invert" style="color:darkblue; font-weight: bold">'+new Intl.NumberFormat('de-DE').format(parseInt(cart[i].price) * parseInt(cart[i].qty))+' VND</td><td class="invert"><a onclick="deleteCheckout('+cart[i].id+')" style="color:red"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>');
					
					totalPoint += parseInt(cart[i].point) * parseInt(cart[i].qty);
				}
				$("#total-point").html(totalPoint);
				$("#total").html(new Intl.NumberFormat('de-DE').format(totalPrice));
				$("#total-pay").html(new Intl.NumberFormat('de-DE').format(totalPrice));
				if(havevoucher == 1)
				{
					var totalPay = parseInt($('#total-pay').html().replace('.',''));
					$("#total-pay").html(new Intl.NumberFormat('de-DE').format(totalPay-parseInt($("#value-voucher").val())));
				}
				if($("#shipFee").html()!='0')
				{
					var totalPay = parseInt($('#total-pay').html().replace('.',''));
					var shipFee = parseInt($('#shipFee').html().replace('.',''));
					$("#total-pay").html(new Intl.NumberFormat('de-DE').format(totalPay+shipFee));
				}
			}
		}
		
	}
	function deleteCheckout(id)
	{
		deleteCart(id);
		drawOrderDetail();
	}
	
	function changePayment(p)
	{
		payment = p;
	}
	function applyVoucher()
	{
		var code = $('#code-voucher').val();
		if(havevoucher == 0 && code != "")
		{
			$.ajax({
				url:"<?=$_SESSION['projectName']?>/Ajax/checkVoucher",
				type:"POST",
				data:{
					Code:code
				},
				success: function(data){
					if(data != 'null')
					{
						var voucher = JSON.parse(data);
						
						
						var total = parseInt($('#total').html().replace('.',''));
						var totalPay = parseInt($('#total-pay').html().replace('.',''));
						
						$('#code-voucher').prop('disabled', true);
						$('#submit-voucher').prop('disabled', true);
						switch(voucher.TypeId)
						{
							case '1':
								if(voucher.Value > $('#total-pay').html()) {
									$('#value-voucher').val(parseInt(voucher.Value));
									havevoucher = 1;
								}
								break;
							case '2':
								$('#value-voucher').val(totalPay*parseFloat(voucher.Value));
								havevoucher = 1;
								break;
						}
						drawOrderDetail();
					}
					else
					{
						alert("Mã giảm giá không phù hợp, vui lòng kiểm tra lại!");
					}
				}
			})
		}
	}
	function UsePoint()
	{
		haveusepoint = 1;
	}
	function submitCheckout(){
		var flag = 1;
		var name = $("#name").val().trim();
		var email = $("#email").val().trim();
		var phonenumber1 = $("#phonenumber1").val().trim();
		var phonenumber2 = $("#phonenumber2").val().trim();
		var tinh_tp = $("#tinh_thanh").val();
		var quan_huyen = $("#qh_change_ck").val();
		var phuong_xa = $("#phuong_xa").val();
		var address = $("#address").val().trim();
		var note = $("#note").val().trim();
		var transpot = $("#transpot").val();
		var support = $("#support").val() == 'on' ? 1 : 0;
		// var total = parseInt($('#total').html().replace('.',''));
		// var totalPay = parseInt($('#total-pay').html().replace('.',''));
		// var shipFee = parseInt($('#shipFee').html().replace('.',''));
		var codeVoucher = '';
		// var valueVoucher = 0;
		if(havevoucher == 1)
		{
			codeVoucher = $('#code-voucher').val();
			// valueVoucher = parseInt($('#value-voucher').val());
		}
		// var timemin = $("#day_shipfrom").html();
		// var timemax = $("#day_shipmax").html();
		
		if(name == "")
		{
			alert("Vui lòng nhập tên người nhận!");
			flag = 0;
		}
		if(email == "")
		{
			alert("Vui lòng nhập email người nhận!");
			flag = 0;
		}
		else if(email != "")
		{
			if(!validateEmail(email))
			{
				alert("Email người nhận không đúng định dạng!");
				flag = 0;
			}
		}
		if(phonenumber1 == ""){
			alert("Vui lòng nhập số điện thoại người nhận!");
			flag = 0;
		}
		else
		{
			if(isNaN(phonenumber1) || phonenumber1.length <10 || phonenumber1.length >13)
			{
				alert("Số điện thoại người nhận không hợp lệ!");
				flag = 0;
			}
		}
		if(tinh_tp == 0)
		{
			alert("Vui lòng chọn tỉnh/thành phố!");
			flag = 0;
		}
		if(quan_huyen == 0)
		{
			alert("Vui lòng chọn quận/huyện!");
			flag = 0;
		}
		if(phuong_xa == 0)
		{
			alert("Vui lòng chọn phường/xã!");
			flag = 0;
		}
		if(address == "")
		{
			alert("Vui lòng nhập địa chỉ!");
			flag = 0;
		}
		if(flag == 1)
		{
			var cart = getCookie("cart_nlink");
			$.ajax({
				url: "<?=$_SESSION['projectName']?>/Ajax/createOrder",
				type: "POST",
				data:{
					cart:cart,
					name:name,
					email:email,
					phonenumber1:phonenumber1,
					phonenumber2:phonenumber2,
					tinh_tp:tinh_tp,
					quan_huyen:quan_huyen,
					phuong_xa:phuong_xa,
					address:address,
					note:note,
					transpot:transpot,
					support:support,
					payment:payment,
					// total:total,
					// totalPay:totalPay,
					// shipFee:shipFee,
					codeVoucher:codeVoucher,
					// valueVoucher:valueVoucher,
					// timemin:timemin,
					// timemax:timemax,
					haveusepoint:haveusepoint
				},
				success: function(data){
					console.log(data);
					if(data == '1')
					{
						setCookie("cart_nlink",JSON.stringify(new Array()),30);
						drawCart();
						drawOrderDetail();
						alert("Đặt hàng thành công!");
						if(payment == 1){
							setTimeout(function(){
								window.location = "<?=$_SESSION['projectName']?>/Home";
							}, 2000);
						}
						else if(payment == 2){
							setTimeout(function(){
								window.location = "<?=$_SESSION['projectName']?>/Cart/paymentBanking";
							}, 2000);
						}
					}
				}
			})
		}
	}
	function validateEmail(email) {
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}
</script>