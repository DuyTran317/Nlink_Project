
<!-- //navigation -->
<!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators-->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1" class=""></li>
		<li data-target="#myCarousel" data-slide-to="2" class=""></li>
		<li data-target="#myCarousel" data-slide-to="3" class=""></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<div class="container">
				<div class="carousel-caption">
					<h3>Big
						<span>Save</span>
					</h3>
					<p>Get flat
						<span>10%</span> Cashback</p>
					<a class="button2" href="product.html">Shop Now </a>
				</div>
			</div>
		</div>
		<div class="item item2">
			<div class="container">
				<div class="carousel-caption">
					<h3>Healthy
						<span>Saving</span>
					</h3>
					<p>Get Upto
						<span>30%</span> Off</p>
					<a class="button2" href="product.html">Shop Now </a>
				</div>
			</div>
		</div>
		<div class="item item3">
			<div class="container">
				<div class="carousel-caption">
					<h3>Big
						<span>Deal</span>
					</h3>
					<p>Get Best Offer Upto
						<span>20%</span>
					</p>
					<a class="button2" href="product.html">Shop Now </a>
				</div>
			</div>
		</div>
		<div class="item item4">
			<div class="container">
				<div class="carousel-caption">
					<h3>Today
						<span>Discount</span>
					</h3>
					<p>Get Now
						<span>40%</span> Discount</p>
					<a class="button2" href="product.html">Shop Now </a>
				</div>
			</div>
		</div>
	</div>
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<!-- //banner -->

<!-- top Products -->
<div class="ads-grid">
	<div class="container">
		<div class="agileinfo-ads-display col-md-12">
			<div class="wrapper">
				<!-- first section (nuts) -->
				<div class="product-sec1">
					<h3 class="tittle-w3l" style="font-size:30px">Sản Phẩm Mới
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
									<a href="single.html">
										<img src="<?=$_SESSION['projectName']?>/lib/images/product/<?=$item['Img'] ?>" alt="" style="width:150px; height:150px">
									</a>
								</div>
								<div class="product-name-w3l">
									<h4>
										<a href="single.html"><?=$item['ProductName'] ?></a>
									</h4>
									<div class="w3l-pricehkj">
										<h6><?php echo number_format($item['Price'])." đ"?></h6>
										<p>Save <?php echo number_format($item['PriceOfMarket'] - $item['Price'])." đ"; ?></p>
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
					<h3 class="tittle-w3l" style="font-size:30px">Sản Phẩm Bán Chạy
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
									<a href="single.html">
										<img src="<?=$_SESSION['projectName']?>/lib/images/product/<?=$item['Img'] ?>" alt="" style="width:150px; height:150px">
									</a>
								</div>
								<div class="product-name-w3l">
									<h4>
										<a href="single.html"><?=$item['ProductName'] ?></a>
									</h4>
									<div class="w3l-pricehkj">
										<h6>$220.00</h6>
										<p>Save <?php echo number_format($item['PriceOfMarket'] - $item['Price'])." đ"; ?></p>
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
		<h3 class="tittle-w3l" style="font-size:30px"><?php echo key($data['listProductAllDepart']); ?>
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
							<a href="single.html">
								<img src="<?=$_SESSION['projectName']?>/lib/images/product/<?=$pro['Img'] ?>" alt="" style="width:150px; height:150px">
							</a>
						</div>
						<div class="product-name-w3l">
							<h4>
								<a href="single.html"><?=$pro['ProductName'] ?></a>
							</h4>
							<div class="w3l-pricehkj">
								<h6><?php echo number_format($pro['Price'])." đ"; ?></h6>
								<p>Save <?php echo number_format($pro['PriceOfMarket'] - $pro['Price'])." đ"; ?></p>
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
	