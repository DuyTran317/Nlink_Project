
<!-- //navigation -->
<!-- banner -->
<div id="myCarousel" class="carousel slide col-md-12 col-sm-12 col-xs-12" data-ride="carousel" style="margin-bottom: 50px">
		<!-- Indicators -->
			<ol class="carousel-indicators">
			  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			  <li data-target="#myCarousel" data-slide-to="1"></li>
			  <li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			  <div class="item active">
				<img class="img-crs" src="lib/images/slideshow/sld_home1.png" alt="err">			
			  </div>

			  <div class="item">
				<img class="img-crs" src="lib/images/slideshow/sld_home2.png" alt="err">
			  </div>

			  <div class="item">
				<img class="img-crs" src="lib/images/slideshow/sld_home3.png" alt="err">
			  </div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			  <span class="glyphicon glyphicon-chevron-left"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
			  <span class="glyphicon glyphicon-chevron-right"></span>
			  <span class="sr-only">Next</span>
			</a>
		</div>
<!-- //banner -->

<!-- top Products -->
<div class="ads-grid" style="background-color: #f4f4f4">
	<div class="container">
		<div class="agileinfo-ads-display col-md-12">
			<div class="wrapper">
				<!-- first section (nuts) -->
				<div class="product-sec1" style="box-shadow: none">
					<h3 class="tittle-w3l" style="font-size:30px; color:#993414">Sản Phẩm Mới
						<span class="heading-style">
							<i></i>
							<i></i>
							<i></i>
						</span>
					</h3>
					<ul id="flexiselDemoMoiNhat">
					<?php
						foreach($data['listProductTopSold'] as $item)
						{
					?>
						<li>
							<div class="w3l-specilamk">
								<div class="speioffer-agile">
									<a href="<?=$_SESSION['projectName']?>/Product/Detail/<?=$item['url']?>">
										<img src="<?=$_SESSION['projectName']?>/lib/images/product/<?=$item['Img'] ?>" alt="" style="width:150px; height:150px">
									</a>
								</div>
								<div class="product-name-w3l">
									<h4 style="text-align: center">
										<a href="<?=$_SESSION['projectName']?>/Product/Detail/<?=$item['url']?>"><?=$item['ProductName'] ?></a>
									</h4>
									<div class="w3l-pricehkj">
										<h6 style="text-align: center"><?php echo number_format($item['Price'])." đ"?></h6>
										<p style="text-align: center; border: none"><button class="btn btn-danger">Mua Ngay</button></p>
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										
									</div>
								</div>
							</div>
						</li>
					<?php
						}
					?>
					</ul>
					<div class="clearfix"></div>
				</div>
				<!-- //first section (nuts) -->
				<!-- second section (nuts special) -->
				<!--<div class="product-sec1 product-sec2">
					<div class="col-xs-7 effect-bg">
						<h3 class="">Pure Energy</h3>
						<h6>Enjoy our all healthy Products</h6>
						<p>Get Extra 10% Off</p>
					</div>
					<h3 class="w3l-nut-middle">Nuts & Dry Fruits</h3>
					<div class="col-xs-5 bg-right-nut">
						<img src="/lib/images/nut1.png" alt="">
					</div>
					<div class="clearfix"></div>
				</div>-->
				<!-- //second section (nuts special) -->
				<!-- third section (oils) -->
				<div class="product-sec3">
					<h3 class="tittle-w3l" style="font-size:30px; margin-top: 50px; color:#993414">Sản Phẩm Bán Chạy
						<span class="heading-style">
							<i></i>
							<i></i>
							<i></i>
						</span>
					</h3>
					<ul id="flexiselDemoBanChay">
					<?php
						foreach($data['listProductNew'] as $item)
						{
					?>
						<li>
							<div class="w3l-specilamk">
								<div class="speioffer-agile">
									<a href="<?=$_SESSION['projectName']?>/Product/Detail/<?=$item['url']?>">
										<img src="<?=$_SESSION['projectName']?>/lib/images/product/<?=$item['Img'] ?>" alt="" style="width:150px; height:150px">
									</a>
								</div>
								<div class="product-name-w3l">
									<h4 style="text-align: center">
										<a href="<?=$_SESSION['projectName']?>/Product/Detail/<?=$item['url']?>"><?=$item['ProductName'] ?></a>
									</h4>
									<div class="w3l-pricehkj">
										<h6 style="text-align: center"><?php echo number_format($item['Price'])." đ"?></h6>
										<p style="text-align: center; border: none"><button class="btn btn-danger">Mua Ngay</button></p>
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										
									</div>
								</div>
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
		<!-- //product right -->
	</div>
</div>
<!-- //top products -->
<!-- special offers -->
<?php
while($depart = current($data['listProductAllDepart'])) 
{
?>
<div class="featured-section" id="projects">
	<div class="container">
		<!-- tittle heading -->
		<h3 class="tittle-w3l" style="font-size:28px"><?php echo key($data['listProductAllDepart']); ?>
			<span class="heading-style">
				<i></i>
				<i></i>
				<i></i>
			</span>
		</h3>
		<!-- //tittle heading -->
		<div class="content-bottom-in">
			<ul id="flexisel<?=key($data['listProductAllDepart'])?>">
			<?php
				foreach($depart as $pro)
				{
			?>
				<li>
					<div class="w3l-specilamk">
						<div class="speioffer-agile">
							<a href="<?=$_SESSION['projectName']?>/Product/Detail/<?=$pro['url']?>">
								<img src="<?=$_SESSION['projectName']?>/lib/images/product/<?=$pro['Img'] ?>" alt="" style="width:150px; height:150px">
							</a>
						</div>
						<div class="product-name-w3l">
							<h4 style="text-align: center">
								<a href="<?=$_SESSION['projectName']?>/Product/Detail/<?=$pro['url']?>"><?=$pro['ProductName'] ?></a>
							</h4>
							<div class="w3l-pricehkj">
								<h6 style="text-align: center"><?php echo number_format($pro['Price'])." đ"; ?></h6>
								<p style="text-align: center; border: none"><button class="btn btn-primary">Mua Ngay</button></p>
							</div>
							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
								
							</div>
						</div>
					</div>
				</li>
			<?php
				}
			?>					
			</ul>
		</div>
	</div>
</div>

<?php
	next($data['listProductAllDepart']);
	}
	reset($data['listProductAllDepart']);
?>
<script>
	$(document).ready(function () {
		$("#flexiselDemoMoiNhat").flexisel({
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

		$("#flexiselDemoBanChay").flexisel({
			visibleItems: 3,
			animationSpeed: 1000,
			autoPlay: true,
			autoPlaySpeed: 5000,
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

			
		
			

	});
</script>
<?php
while($depart = current($data['listProductAllDepart']))
{
	?>
	<script>
	$(document).ready(function () {
		$("#flexisel<?=key($data['listProductAllDepart'])?>").flexisel({
			visibleItems: 3,
			animationSpeed: 1000,
			autoPlay: false,
			autoPlaySpeed: 10000,
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
	});
	</script>
	<?php
	next($data['listProductAllDepart']);
}
?>
	