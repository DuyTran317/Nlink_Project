<div class="container">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12" style="margin-top: 30px">	
			<h4 style="font-weight: bold">Quản Lý Tài Khoản</h4>
			<div style="margin-top: 25px">
				<p>Xin chào, Nguyễn Văn Test</p>
				<div style="margin-top: 12px">
					<a href="<?=$_SESSION['projectName']?>/Account" style="font-size: 15px">&rarr; Thông Tin Tài Khoản</a>
				</div>
				<div style="margin-top: 12px">
					<a href="<?=$_SESSION['projectName']?>/Account/dsOrder" style="font-size: 15px">&rarr; Thông Tin Đơn Hàng</a>
				</div>
				<div style="margin-top: 12px">
					<a href="<?=$_SESSION['projectName']?>/Account/logout" style="font-size: 15px">&rarr; Đăng Xuất</a>
				</div>
			</div>
		</div>
		<div class="col-md-8 col-sm-8 col-xs-12"  style="margin-top: 30px">
		<?php 
			require_once("./mvc/views/pages/pagechildAccount/".$data['pagechild'].".php");
		?>
		</div>
	</div>	
</div>