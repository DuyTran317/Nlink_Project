<!-- top Products -->

<div class="ads-grid">
	<div class="container">
		<div class="row" style="margin:-50px 0 35px 0">
			<div class="col-md-3" style="border:1px solid #ebe1e1">
				<p><i class="fa fa-check" aria-hidden="true" style="color:green"></i> <span style="color:black">SẢN PHẨM CHÍNH HÃNG</span></p>
				<p style="font-size: 12px">Cam kết về sản phẩm và sức khỏe</p>
			</div>
			<div class="col-md-3" style="border:1px solid #ebe1e1">
				<p><i class="fa fa-check" aria-hidden="true" style="color:green"></i> <span style="color:black">GIÁ THÀNH HỢP LÝ</span></p>
				<p style="font-size: 12px">Nhập khẩu và Phân phối trực tiếp</p>
			</div>
			<div class="col-md-3" style="border:1px solid #ebe1e1">
				<p><i class="fa fa-check" aria-hidden="true" style="color:green"></i> <span style="color:black">AN TOÀN TÀI CHÍNH</span></p>
				<p style="font-size: 12px">Giao hàng và thu tiền tận nơi</p>
			</div>
			<div class="col-md-3" style="border:1px solid #ebe1e1">
				<p><i class="fa fa-check" aria-hidden="true" style="color:green"></i> <span style="color:black">TƯ VẤN NHIỆT TÌNH</span></p>
				<p style="font-size: 12px">Đội ngũ tư vấn có chuyên môn</p>
			</div>
		</div>
		<!-- tittle heading -->
		<h3 class="tittle-w3l" style="font-size: 30px">Kitchen Products
			<span class="heading-style">
				<i></i>
				<i></i>
				<i></i>
			</span>
		</h3>
		<!-- //tittle heading -->
		<!-- product left -->
		<form id="formfilter" action="#" method="POST">
			<div class="side-bar col-md-3">
			
			<?php
				if($data['action'] != "Category")
				{
			?>	
				<div class="left-side">
					<h3 class="agileits-sear-head">Danh mục sản phẩm</h3>
					<ul>
					<?php
						foreach($data['listCateOfDepart'] as $item)
						{
					?>
						<li style="margin-top: 3px; font-size: 15px">
							<a href="<?=$_SESSION['projectName']?>/Product/Category/<?=$item['url']?>"><?=$item['CateName']?></a>				
						</li>
					<?php
						}
					?>
					</ul>
				</div>
			<?php
				}
			?>
			
				<!-- price range -->
				<div class="range">
					<h3 class="agileits-sear-head">Tìm theo giá</h3>
					<ul class="dropdown-menu6">
						<li>

							<div id="slider-range"></div>
							<input name="rangePrice" type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal; width:500px" />
							<input id="priceMin" name="priceMin" type="number" value="<?=$data['priceMin']?>" style="display:none" />
							<input id="priceMax" name="priceMax" type="number" value=<?=$data['priceMax']?> style="display:none" />
							<button onclick="$('#formfilter').submit()" class="btn btn-primary" style="margin-top:15px">Lọc</button>
						</li>
					</ul>
				</div>
				<!-- //price range -->
				<!-- food preference -->
				<div class="left-side">
					<h3 class="agileits-sear-head">Thương hiệu</h3>
					<ul>
						<li style="margin-top: 3px; font-size: 15px">						
							<label class="rdo">Tất cả
								<input type="radio" name="brand" value="0" <?php if($data['brand']==0) echo "checked";?>>
								<span class="checkmark"></span>
							</label>
						</li>
					<?php
						foreach($data['listBrands'] as $item)
						{
					?>
						<li style="margin-top: 3px; font-size: 15px">				
							<label class="rdo" for="brand"><?=$item['BrandName']?>
								<input type="radio" name="brand" value="<?=$item['BrandId']?>" <?php if($item['BrandId'] == $data['brand']) echo "checked";?>>
								<span class="checkmark"></span>
							</label>
						</li>
					<?php
						}
					?>
					</ul>
				</div>
				
				<!-- //food preference -->								
				<!-- deals -->
				<div class="deal-leftmk left-side">
					<h3 class="agileits-sear-head">Sản phẩm mới</h3>
				<?php
					foreach($data['listProductNew'] as $item)
					{
				?>
					<div class="special-sec1">
						<div class="col-xs-4 img-deals">
							<a href="<?=$_SESSION['projectName']?>/Product/Detail/<?=$item['url']?>"><img src="<?=$_SESSION['projectName']?>/lib/images/product/<?=$item['Img']?>" alt="err" style="width: 100%; height: 70px"></a>
						</div>
						<div class="col-xs-8 img-deal1">
						<a href="<?=$_SESSION['projectName']?>/Product/Detail/<?=$item['url']?>"><h3><?=$item['ProductName']?></h3></a>
							<p style="color:red"><?php echo number_format($item['Price']);?> VNĐ</p>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php
					}
				?>
				</div>
				<!-- //deals -->
			</div>
			<!-- //product left -->
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-9 w3l-rightpro">
				<div class="wrapper">
					<!-- first section -->
					
					<?php
					$dem = 0;
					foreach($data['listProduct'] as $item)
					{
						$dem++;
						if($dem % 3 == 1)
						{
					?>
						<div class="product-sec1">
					<?php
						}
					?>
						<div class="col-xs-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="<?=$_SESSION['projectName']?>/lib/images/product/<?=$item['Img']?>" alt="err" style="width: 100%; height: 200px">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="<?=$_SESSION['projectName']?>/Product/Detail/<?=$item['url']?>" class="link-product-add-cart">Xem Chi Tiết</a>
										</div>
									</div>
						<?php if($dem <= 3) {?><span class="product-new-top">New</span><?php }?>
								</div>
								<div class="item-info-product ">
									<h4>
										<a href="<?=$_SESSION['projectName']?>/Product/Detail/<?=$item['url']?>"><?=$item['ProductName']?></a>
									</h4>
									<div class="info-product-price">
										<span class="item_price"><?php echo number_format($item['Price'])." đ";?></span>
										<del><?php echo number_format($item['PriceOfMarket'])." đ";?></del>
									</div>
									

								</div>
							</div>
						</div>
					<?php
						if($dem % 3 == 0)
						{
					?>
							<div class="clearfix"></div>
						</div>
					<?php
						}
					}
					?>
						
					<input id="pagenumber" name="pagenumber" type="number" value="<?=$data['pagenumber']?>" style="display:none" />
					<!-- //3rd section -->
					<?php
						$pagebegin = $data['pagenumber']-2 > 0 ? $data['pagenumber']-2 : 1;
						$pageend = $data['pagenumber']+2 < $data['sumpage'] ? $data['pagenumber']+2 : $data['sumpage'];
					?>
					<div style="text-align: center">
						<?php if($pageend == 0) echo"*** Chưa có sản phẩm hiển thị ***";?>
						<ul class="pagination">
							<?php
								if($pageend>0)
								{
							?>
							<li onclick="toPageNumber(1)"><a class="pointer-mouse">&laquo;</a></li>		
							<?php 
								}
								for($i = $pagebegin; $i <= $pageend; $i++)
								{
							?>
									<li onclick="toPageNumber(<?=$i?>)" <?php if($i == $data['pagenumber']) {echo 'class="active"';}?>><a class="pointer-mouse"><?=$i?></a></li>
							<?php
								}
								if($pageend>0)
								{
							?>							
							<li onclick="toPageNumber(<?=$data['sumpage']?>)"><a class="pointer-mouse">&raquo;</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</form>
		<!-- //product right -->
	</div>
</div>
<!-- //top products -->	

<script>
	$(document).ready(function () {
		$("#slider-range").slider({
			range: true,
			min: 1000,
			max: 5000000,
			values: [<?=$data['priceMin']==-1?1000:$data['priceMin']?>, <?=$data['priceMax']==-1?5000000:$data['priceMax']?>],
			slide: function (event, ui) {
				$("#amount").val(ui.values[0] + " VND - " + ui.values[1] + " VND");
				$("#priceMin").val(ui.values[0]);
				$("#priceMax").val(ui.values[1]);
			}
		});
		$("#amount").val(<?=$data['priceMin']==-1?1000:$data['priceMin']?> + " VND - " + <?=$data['priceMax']==-1?5000000:$data['priceMax']?> + " VND");
		
	});
	$("input[name='brand']").change(function(){
		$("#formfilter").submit();
	})
	function toPageNumber(page)
	{
		$("#pagenumber").val(page);
		$("#formfilter").submit();
	}
	// function filter(brand = 0)
	// {
	// 	//var brand = typeof $("input[name='brand']:checked").val() !== 'undefined' ? $("input[name='brand']:checked").val() : 0;
	// 	var brand = brand;
	// 	var priceMin = $("#slider-range").slider("values", 0);
	// 	var priceMax = $("#slider-range").slider("values", 1);

	// 	window.location = "$_SESSION['projectName']/Product/$data['action']/$data['url']/"+brand+
	// }
</script>