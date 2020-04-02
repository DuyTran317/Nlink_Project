<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12" style="margin-top: 30px">	
				<h4 style="font-weight: bold">Quản Lý Tài Khoản</h4>
				<div style="margin-top: 25px">
					<p>Xin chào, Nguyễn Văn Test</p>
					<div style="margin-top: 12px">
						<a href="#" style="font-size: 15px">&rarr; Thông Tin Tài Khoản</a>
					</div>
					<div style="margin-top: 12px">
						<a href="#" style="font-size: 15px">&rarr; Thông Tin Đơn Hàng</a>
					</div>
					<div style="margin-top: 12px">
						<a href="#" style="font-size: 15px">&rarr; Đăng Xuất</a>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-8 col-xs-12"  style="margin-top: 30px">
				<div id="thong_tin_ca_nhan">
					<h4 style="font-weight: bold">Thông Tin Cá Nhân</h4>
					<div style="margin-top: 30px">
						<table>
							<tr>
								<td><span style="margin-top:20px">Họ và tên:</span><hr/></td>
								<td>
									<span style="width:250px; margin-left:10px; margin-top:20px">Nguyễn Văn A</span><hr/>
								</td>
							</tr>
							<tr>
								<td><span style="margin-top:20px">Số điện thoại:</span><hr/></td>
								<td>
									<span style="width:250px; margin-left:10px; margin-top:20px">Chưa có thông tin</span><hr/>
								</td>
							</tr>
							<tr>
								<td><span style="margin-top:20px">Email:</span><hr/></td>
								<td>
									<span style="width:250px; margin-left:10px; margin-top:20px">Chưa có thông tin</span><hr/>
								</td>
							</tr>
							<tr>
								<td><span style="margin-top:20px">Ngày sinh:</span><hr/></td>
								<td>
									<span style="width:250px; margin-left:10px; margin-top:20px">Chưa có thông tin</span><hr/>
								</td>
							</tr>
							<tr>
								<td><span style="margin-top:20px">Giới tính:</span><hr/></td>
								<td>
									<span style="width:250px; margin-left:10px; margin-top:20px">Chưa có thông tin</span><hr/>
								</td>
							</tr>
							<tr>
								<td><span style="margin-top:20px">Địa chỉ:</span><hr/></td>
								<td>
									<span style="width:250px; margin-left:10px; margin-top:20px">Chưa có thông tin</span><hr/>
								</td>
							</tr>
							<tr>
								<td><span style="margin-top:20px">Tỉnh/thành phố:</span><hr/></td>
								<td>
									<span style="width:250px; margin-left:10px; margin-top:20px">Chưa có thông tin</span><hr/>
								</td>
							</tr>
							<tr>
								<td><span style="margin-top:20px">Quận/huyện:</span><hr/></td>
								<td>
									<span style="width:250px; margin-left:10px; margin-top:20px">Chưa có thông tin</span><hr/>
								</td>
							</tr>
							<tr>
								<td><span style="margin-top:20px">Phường/xã:</span><hr/></td>
								<td>
									<span style="width:250px; margin-left:10px; margin-top:20px">Chưa có thông tin</span><hr/>
								</td>
							</tr>
							<tr>
								<td colspan="2"><button class="btn btn-primary">Đổi Thông Tin</button></td>			
							</tr>
						</table>
					</div>
				</div>
				
				<div id="upd_thong_tin_ca_nhan">
					<h4 style="font-weight: bold">Thay Đổi Thông Tin</h4>
					<div style="margin-top: 30px">
						<table>
							<tr>
								<td><span style="margin-top:20px">Họ và tên:</span><hr/></td>
								<td>
									<span style="margin-left:10px; margin-top:20px; width: 100%"><input type="text" value="Nguyên Văn A" /></span><hr/>
								</td>
							</tr>
							<tr>
								<td><span style="margin-top:20px">Số điện thoại:</span><hr/></td>
								<td>
									<span style="margin-left:10px; margin-top:20px; width: 100%"><input type="number" value="" /></span><hr/>
								</td>
							</tr>
							<tr>
								<td><span style="margin-top:20px">Email:</span><hr/></td>
								<td>
									<span style="margin-left:10px; margin-top:20px; width: 100%"><input type="email" value="" /></span><hr/>
								</td>
							</tr>
							<tr>
								<td><span style="margin-top:20px">Ngày sinh:</span><hr/></td>
								<td>
									<span style="margin-left:10px; margin-top:20px; width: 100%"><input type="date" value="" /></span><hr/>
								</td>
							</tr>
							<tr>
								<td><span style="margin-top:20px">Giới tính:</span><hr/></td>
								<td>
									<span style="margin-left:10px; margin-top:20px; width: 100%">
										<select>
											<option>Nam</option>
											<option>Nữ</option>
										</select>
									</span><hr/>
								</td>
							</tr>
							<tr>
								<td><span style="margin-top:20px">Địa chỉ:</span><hr/></td>
								<td>
									<span style="margin-left:10px; margin-top:20px;"><textarea style="width: 250px; height: 70px"></textarea></span><hr/>
								</td>
							</tr>
							<tr>
								<td><span style="margin-top:20px">Tỉnh/thành phố:</span><hr/></td>
								<td>
									<span style="margin-left:10px; margin-top:20px">
										<select id="tinh_thanh_tttk" style="width: auto">
											<option value="0">---Chọn Tỉnh Thành---</option>
											<option value="1">Hồ Chí Minh</option>
										</select>
									</span><hr/>
								</td>
							</tr>
							<tr>
								<td><span style="margin-top:20px">Quận/huyện:</span><hr/></td>
								<td>
									<span style="margin-left:10px; margin-top:20px">
										<select id="qh_change_tttk" style="width: auto">
											<option id="chon_qh_tttk" value="0">---Chọn Quận/Huyện---</option>
											<option class="quan_huyen_tttk" value="1">Gò Vấp</option>	
											<option class="quan_huyen_tttk" value="2">Phú Nhuận</option>
										</select>
									</span><hr/>
								</td>
							</tr>
							<tr>
								<td><span style="margin-top:20px">Phường/xã:</span><hr/></td>
								<td>
									<span style="margin-left:10px; margin-top:20px">
										<select style="width: auto">
											<option id="chon_px_tttk" value="0">---Chọn Phường/Xã---</option>
											<option class="phuong_xa_tttk" value="1">Phường 16</option>
										</select>
									</span><hr/>
								</td>
							</tr>
							<tr>
								<td colspan="2"><button class="btn btn-primary">Lưu Thay Đổi</button></td>			
							</tr>
						</table>
					</div>
				</div>
				
				<div id="don_hang">
					<h4 style="font-weight: bold">Thông Tin Đơn Hàng</h4>
					<div style="margin-top: 15px">
						<table border="1" class="col-md-12 col-sm-12 col-xs-12">
							<tbody>
								<tr>
									<td align="center" style="color:#972385"><strong>Mã đơn hàng</strong></td>
									<td align="center" style="color:#972385"><strong>Ngày đặt</strong></td>
									<td align="center" style="color:#972385"><strong>Người nhận</strong></td>
									<td align="center" style="color:#972385"><strong>Tổng tiền</strong></td>
									<td align="center" style="color:#972385"><strong>Trạng thái</strong></td>
								</tr>

								<tr>
									<td align="center">DH02042020</td>
									<td align="center">02/04/2020</td>
									<td align="center">Tran Duy</td>
									<td align="center">4,600,000đ</td>
									<td align="center" colspan="2"><span style="font-size: 14px">Mới Đặt</span>
									<div></div><a href="" style="text-decoration:none">Xem</a> 
									<a href="" style="text-decoration:none" onclick="return confirm('Bạn chắc chắn muốn hủy ?')"> | Hủy</a></td>
								</tr>
								<tr>
									<td align="center">DH02042020</td>
									<td align="center">02/04/2020</td>
									<td align="center">Tran Duy</td>
									<td align="center">4,600,000đ</td>
									<td align="center" colspan="2"><span style="font-size: 14px">Mới Đặt</span>
									<div></div><a href="#" style="text-decoration:none">Xem</a> 
									<a href="#" style="text-decoration:none" onclick="return confirm('Bạn chắc chắn muốn hủy ?')"> | Hủy</a></td>
								</tr>
							</tbody>
				   		</table>
						<div style="text-align: right; margin:10px 0 20px 0">
							<ul class="pagination">
								<li><a href="#">&lt;</a></li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">&gt;</a></li>
							</ul>
						</div>
					</div>
				</div>
				
			</div>
		</div>	
	</div>