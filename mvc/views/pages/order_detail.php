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
						</tr>
					</thead>
					<tbody>
					<?php
						$i=0;$sumpoint = 0;
						foreach($data['listOrderDetail'] as $item)
						{
							$i++;$sumpoint += $item['Point']*$item['Qty'];
					?>
						<tr>
							<td class="invert"><?=$i?></td>
							<td class="invert-image">
								<a href="<?=$_SESSION['projectName']?>/Product/Detail/<?=$item['url']?>">
									<img src="<?=$_SESSION['projectName']?>/lib/images/product/<?=$item['Img']?>" alt=" " class="img-responsive" style="width: 50px; height: 50px">
								</a>
							</td>
							<td class="invert">
								<div class="quantity">
									<label style="font-size: 18px">2</label>
								</div>
							</td>
							<td class="invert"><?=$item['ProductName']?></td>
							<td class="invert"><?php echo number_format($item['Price']);?> VND</td>
							<td class="invert" style="color:darkblue; font-weight: bold"><?php echo number_format($item['PricePay']);?> VND</td>		
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>				
			</div>
		</div>
		<hr/>
		<div class="checkout-left">
			<div class="address_form_agile row">
				<h4 style="color:black">Thông Tin Nhận Hàng</h4>
					<div class="creditly-wrapper wthree, w3_agileits_wrapper">
						<div class="information-wrapper">
							<div class="first-row">
								<div class="controls">
									<input class="billing-address-name" type="text" name="name" value="<?=$data['Order']['FullName']?>" readonly>
								</div>
								<div class="controls">
									<input class="billing-address-name" type="email" name="email" value="<?=$data['Order']['Email']?>" readonly>
								</div>
								<div class="w3_agileits_card_number_grids">
									<div class="w3_agileits_card_number_grid_left">
										<div class="controls">
											<input type="text" name="mobile" value="<?=$data['Order']['PhoneNumber1']?>" readonly>
										</div>
									</div>
									<div class="w3_agileits_card_number_grid_left">
										<div class="controls">
											<input type="text" placeholder="Số Điện Thoại 2" value="<?=$data['Order']['PhoneNumber2']?>" name="mobile2" readonly>
										</div>
									</div>
									<div class="w3_agileits_card_number_grid_right">
										<div class="controls">
											<input type="text" name="" value="<?=$data['Order']['CityName']?>" readonly style="width: 30%">
											<input type="text" name="" value="<?=$data['Order']['DictrictName']?>" readonly style="width: 30%">
											<input type="text" name="" value="<?=$data['Order']['WardName']?>" readonly style="width: 30%">
										</div>
									</div>
									<div class="w3_agileits_card_number_grid_right">
										<div class="controls">
											<input class="billing-address-name" type="text" name="name" value="<?=$data['Order']['Address']?>" readonly>
										</div>
									</div>
									<div class="clear"> </div>
								</div>
								<div class="controls">
									<input class="billing-address-name" type="text" name="name" value="<?=$data['Order']['Note']?>" placeholder="Ghi Chú" readonly>
								</div>
								<div class="controls">
									<input class="billing-address-name" type="text" name="name" value="<?=$data['Order']['TransportName']?>" readonly>
								</div>								
							</div>							
						</div>
					</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div style="margin-bottom: 15px">
						<p style="color:black; margin-top: 10px;">Tiền Hàng: <span style="font-weight: bold"><?php echo number_format($data['Order']['Price'])?> VND</span></p>
						<p id="trans_pay" style="color:black; margin-top: 10px;">Phí Vận Chuyển: <span style="font-weight: bold"><?php echo number_format($data['Order']['FeeShip'])?> VND</span></p>
					</div>
					
					<a style="font-size:14px; color:black; font-weight: bold">Sử dụng mã giảm giá: <?=$data['Order']['Sale']>0?"Có":"Không"?></a><br/>

					<a style="font-size:14px; color:black; font-weight: bold">Sử dụng điểm tích lũy: <?=$data['Order']['PointUsed']?> điểm</a><br/>

					<p style="color:black; margin-top: 15px;">Tổng Tiền Cần Thanh Toán: <span style="color:#d60c0c; font-weight: bold"><?php echo number_format($data['Order']['PricePay'])?> VND</span></p>

					<p style="color:black; margin-top: 10px;">Tổng Điểm Nhận Được: <span style="color:#d60c0c; font-weight: bold"><?=$sumpoint?></span></p>
					
					<p id="day_ship" style="color:black; margin-top: 10px; font-weight: bold">Thời gian giao hàng: Từ <span class="day_shipfrom"><?=$data['Order']['TimeShipMin']?></span> đến <span id="day_shipto"><?=$data['Order']['TimeShipMax']?></span> ngày làm việc kể từ khi xác nhận đơn hàng</p>					
					
				</div>
			</div>
			<h4 style="color:black; margin-top: 15px">Phương Thức Thanh Toán: <span style="font-size: 16px; color:#0E37B8"><?=$data['Order']['PaymentName']?></h4>
			<div style="margin-top:20px" class="clearfix"> </div>
			<a href="<?=$_SESSION['projectName']?>/Account/dsOrder"><button class="btn btn-success">Quay Lại</button></a>
		</div>
	</div>
</div>
<!-- //checkout page -->

