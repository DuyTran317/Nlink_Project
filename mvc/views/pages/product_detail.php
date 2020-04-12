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
								<img src="<?=$_SESSION['projectName']?>/lib/images/product/<?=$img['Img']?>" data-imagezoom="true" class="img-responsive" alt="err" style="width: 100%; height: 300px"> 
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
						<button onclick="addCart(<?=$data['Product']['ProductId']?>,$('#qty').val(),<?=$data['Product']['Price']?>,'<?=$data['Product']['ProductName']?>','<?=$data['Product']['Img']?>','<?=$data['Product']['url']?>',<?=$data['Product']['Point']?>,1)" class="btn btn-danger">Mua Ngay</button>
						<button onclick="addCart(<?=$data['Product']['ProductId']?>,$('#qty').val(),<?=$data['Product']['Price']?>,'<?=$data['Product']['ProductName']?>','<?=$data['Product']['Img']?>','<?=$data['Product']['url']?>',<?=$data['Product']['Point']?>)" class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm Vào Giỏ</button>
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
	<!-- <li><a data-toggle="tab" href="#menu1">Hỏi & Đáp</a></li> -->
	<li><a data-toggle="tab" href="#menu2">Đánh Giá</a></li>
	</ul>

	<div class="tab-content">
		<div id="home" class="tab-pane fade in active" style="margin-top: 10px">
			<?=$data['Product']['ProductDesc']?>
		</div>
		<!-- <div id="menu1" class="tab-pane fade">
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
				// $flag = 0;
				// foreach($data['listQA'] as $item)
				// {
				// 	if($flag != $item['QuestionId'] && $flag != 0)
				// 	{
						?>
							</div>
							<hr/>
						<?php
					// }
					// if($flag != $item['QuestionId'])
					// {
						?>
						<div class="container-fluid" style="margin-top: 20px">
							<div class="row" style="margin-top: 15px">
								<label class="col-md-1">Hỏi:</label>
								<span class="col-md-11">Trời nóng ở sài gòn như bây giờ thì mình phải bào quản như thế nào. Minh thấy shop ghi la đẻ ở tủ đông đá, vậy mỗi lần sd la phải làm tan đá mơi uống được phải khôg shop?<br/>
								<span style="font-size: 14px; color: gray">Bởi: Thanh Mai vào 21/03/2020 14:00</span></span>
							</div>
						<?php
					// }
					// if($item['AnswerId'] != NULL)
					// {
						?>
							<div class="row" style="margin-top: 15px">
								<label class="col-md-1">Đáp:</label>
								<span class="col-md-11">Bạn chỉ cần bảo quản sản phẩm ở ngăn mát tủ lạnh thôi nhé, không để ở ngăn đông đá ạ<br/>
								<span style="font-size: 14px; color: gray">Bởi: Nlink.vn vào 21/03/2020 14:00</span></span>
							</div>
						<?php
				// 	}
				// }
				// if($flag != 0)
				// {
			?>
				</div>
				<hr/>
			<?php
				// }
			?>
			</div>
			<div style="text-align: center"><button class="btn btn-default">Xem thêm</button></div>
		</div> -->
		<div id="menu2" class="tab-pane fade">
			<div class="container" style="margin-top: 15px">
				<h4>Khách hàng đánh giá</h4>
				<h3 style="margin-top: 20px; color: red; font-size: 42px">
					<?=$data['Star']==NULL?0:round($data['Star'])?>/5 <i class="fa fa-star" aria-hidden="true" style="color: yellow; font-size: 42px"></i>
				</h3>
				<h4 style="margin-top: 40px">Gửi nhận xét của bạn</h4>
				<h5 id="rateform" style="margin-top: 20px">Đánh giá của bạn về sản phẩm này:<br/>				
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
				<h5 style="margin-top: 20px">Viết nhận xét của bạn vào bên dưới: <span style="color:red">*</span>
					<textarea id="content-cmt" class="form-control" style="margin-top: 10px; max-width: 500px; height: 80px" placeholder="Nhận xét của bạn về sản phẩm này"></textarea>
				</h5>
				<h5 style="margin-top: 20px">Thông tin cá nhân của bạn: <span style="color:red">*</span><br/>
					<input id="name-cmt" type="text" value="<?php if($data['User']!="") echo $data['User']['FullName'];?>" placeholder="Họ tên" required class="form-control" style="max-width: 300px; margin-top: 10px" />
					<input id="phone-cmt" type="number" value="<?php if($data['User']!="") echo $data['User']['PhoneNumber'];?>" placeholder="Số điện thoại" class="form-control" required style="max-width: 300px; margin-top: 10px" />
					<input id="email-cmt" type="email" value="<?php if($data['User']!="") echo $data['User']['Email'];?>" placeholder="Email" class="form-control" required style="max-width: 300px; margin-top: 10px" />
				</h5>
				<button onclick="addComment()" class="btn btn-primary" style="margin-top: 20px">Thêm nhận xét</button>
			</div>
			<div id="ds_Comment" data-page="0" data-itemEnd="-1" class="container" style="margin-top: 40px">

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
		checkAllowRate();
		getComments(1);
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

	});
	function getComments(page = 1)
	{
		$("#btnLoadCmt").remove();
		//var begin = (page-1)*10;
		var begin = parseInt($("#ds_Comment").attr("data-itemEnd")) + 1;
		var numComment = 10;
		var productId = <?=$data['Product']['ProductId']?>;

		$.ajax({
			url:"<?=$_SESSION['projectName']?>/Ajax/LoadCommentProduct",
			type:"POST",
			data:{
				begin:begin,
				numComment:numComment,
				productId:productId
			},
			success: function(data){
				if(data!='' && data != '[]'){
					var listComment = JSON.parse(data);
					for(var i = 0; i<listComment.length;i++)
					{
						var drawComment = '<div class="row" style="margin-top:25px">';
								drawComment += '<div class="col-md-2" style="text-align: center">';
									drawComment += '<i class="fa fa-user" aria-hidden="true" style="font-size: 42px"></i>';
									drawComment += 	'<p style="color:black; margin-top: 5px">'+listComment[i].Name+'</p>';
									drawComment += 	'<p style="font-size: 12px; color: gray">'+listComment[i].CrDateTime.substring(0,listComment[i].CrDateTime.length - 3)+'</p>';
								drawComment += 	'</div>';
								drawComment += 	'<div id="comment'+listComment[i].CommentId+'" data-page="0" data-itemEnd="-1" class="col-md-10">';
									drawComment += 	'<p>';
									if(listComment[i].StarNumber != 'NULL')
									{
										for(var j=1;j<=listComment[i].StarNumber;j++)
										{
											drawComment += 	'<i class="fa fa-star" aria-hidden="true" style="color: yellow"></i>';
										}
									}
									drawComment += 	'</p>';
									drawComment += '<span style="font-size: 15px">'+listComment[i].Content+'</span>';
									drawComment += 	'<p onclick="showAnswerCmtForm('+listComment[i].CommentId+')" style="color:blue; font-size: 14px; cursor: pointer">Trả lời</p>';
									drawComment += 	'<div id="info_nhanxet'+listComment[i].CommentId+'" style="margin-top: 20px;display:none">';
										drawComment += 	'<textarea name="content" class="form-control" placeholder="Nhận xét của bạn"></textarea>';
										drawComment += 	'<input name="name" type="text" value="<?=isset($data['User']['FullName'])?$data['User']['FullName']:""?>" placeholder="Họ tên" required class="form-control" style="max-width: 300px; margin-top: 10px" />';
										drawComment += 	'<input name="phone" type="number" value="<?=isset($data['User']['PhoneNumber'])?$data['User']['PhoneNumber']:""?>" placeholder="Số điện thoại" class="form-control" required style="max-width: 300px; margin-top: 10px" />';
										drawComment += 	'<input name="email" type="email" value="<?=isset($data['User']['Email'])?$data['User']['Email']:""?>" placeholder="Email" class="form-control" required style="max-width: 300px; margin-top: 10px" />';
										drawComment += 	'<button class="btn btn-danger" style="float: right; margin-top: 10px;" onclick="hideAnswerCmtForm('+listComment[i].CommentId+')">Hủy</button>';				
										drawComment += 	'<button onclick="addAnswerComment('+listComment[i].CommentId+')" class="btn btn-info" style="float: right; margin-top: 10px; margin-right: 10px">Thêm</button>';				
										drawComment += 	'<div style="clear: right"></div>';
									drawComment += 	'</div>';

								drawComment += 	'</div>';
							drawComment += 	'</div>';
						$("#ds_Comment").append(drawComment);
						getAnswersComment(listComment[i].CommentId,1);
					}
					if(listComment.length == numComment)
					{
						$("#ds_Comment").append('<div id="btnLoadCmt" style="font-size: 14px; margin-top: 10px; text-align: center"><button onclick="getComments('+(page+1)+')" class="btn btn-default">Xem thêm</button></div>');
					}
					$("#ds_Comment").attr("data-itemEnd",parseInt($("#ds_Comment").attr("data-itemEnd"))+listComment.length);
					$("#ds_Comment").attr("data-page",page);
				}
			}
		});
	}
	function getAnswersComment(commentId,page = 1)
	{
		var numComment = 3;
		//var begin = (page-1)*numComment;
		var begin = parseInt($("#comment"+commentId).attr("data-itemEnd")) + 1;
		$("#btnLoadAnswerCmt"+commentId).remove();
		$.ajax({
			url:"<?=$_SESSION['projectName']?>/Ajax/LoadAnswersComment",
			type:"POST",
			data:{
				begin:begin,
				numComment:numComment,
				commentId:commentId
			},
			success: function(data){
				if(data != '' && data != '[]'){
					var listAnswer = JSON.parse(data);

					for(var i=0; i<listAnswer.length; i++)
					{
						var drawAnswer = '<div style="margin-top: 10px">';
							drawAnswer += 	'<span style="font-weight: bold; margin-bottom: 5px">'+listAnswer[i].Name+'</span> - <span style="color:gray">'+listAnswer[i].CrDateTime.substring(0,listAnswer[i].CrDateTime.length - 3)+'</span><br/>';
							drawAnswer += 	'<span style="font-size: 15px">'+listAnswer[i].Content+'</span>';
							drawAnswer += '</div>';
						
						$("#comment"+commentId).append(drawAnswer);
					}
					if(listAnswer.length == numComment)
					{
						$("#comment"+commentId).append('<div id="btnLoadAnswerCmt'+commentId+'" style="font-size: 14px; margin-top: 6px"><a onclick="getAnswersComment('+commentId+','+(page+1)+')">Xem thêm</a></div>');
					}
					$("#comment"+commentId).attr("data-itemEnd",parseInt($("#comment"+commentId).attr("data-itemEnd"))+listAnswer.length);
					$("#comment"+commentId).attr("data-page",page);
				}
			}
		});
	}
	function addComment(){
		if($("#content-cmt").val()=='')
		{
			alert("Vui lòng nhập nội dung nhận xét!");
		}
		else if($("#name-cmt").val()=='')
		{
			alert("Vui lòng nhập tên!");
		}
		else if($("#phone-cmt").val()=='')
		{
			alert("Vui lòng nhập số điện thoại!");
		}
		else if($("#email-cmt").val()=='')
		{
			alert("Vui lòng nhập email!");
		}
		else
		{
			var productId = <?=$data['Product']['ProductId']?>;
			var content = $("#content-cmt").val();
			var name = $("#name-cmt").val();
			var phone = $("#phone-cmt").val();
			var email = $("#email-cmt").val();
			var rate = $("#rateform").is(":hidden")?'NULL':document.querySelector('input[name="rate"]:checked').value;
			var userId = <?=$data['User']==''?0:$data['User']['UserId']?>;
			$.ajax({
				url:"<?=$_SESSION['projectName']?>/Ajax/addComment",
				type:"POSt",
				data:{
					productId:productId,
					content:content,
					name:name,
					phone:phone,
					email:email,
					rate:rate,
					userId:userId
				},
				success: function(data){
					if(data != 0)
					{
						var now = new Date();
						var timeformat = now.getDate() +"/"+(now.getMonth()+1)+"/"+now.getFullYear()+" "+now.getHours() + ":" + now.getMinutes();

							var drawComment = '<div class="row style="margin-top:25px">';
									drawComment += '<div class="col-md-2" style="text-align: center">';
										drawComment += '<i class="fa fa-user" aria-hidden="true" style="font-size: 42px"></i>';
										drawComment += 	'<p style="color:black; margin-top: 5px">'+name+'</p>';
										drawComment += 	'<p style="font-size: 12px; color: gray">'+timeformat+'</p>';
									drawComment += 	'</div>';
									drawComment += 	'<div id="comment'+data+'" data-page="0" data-itemEnd="-1" class="col-md-10">';
										drawComment += 	'<p>';
										if(rate!='NULL'){
											for(var j=1;j<=rate;j++)
											{
												drawComment += 	'<i class="fa fa-star" aria-hidden="true" style="color: yellow"></i>';
											}
										}
										drawComment += 	'</p>';
										drawComment += '<span style="font-size: 15px">'+content+'</span>';
										drawComment += 	'<p onclick="showAnswerCmtForm('+data+')" style="color:blue; font-size: 14px; cursor: pointer">Trả lời</p>';
										drawComment += 	'<div id="info_nhanxet'+data+'" style="margin-top: 20px;display:none">';
											drawComment += 	'<textarea name="content" class="form-control" placeholder="Nhận xét của bạn"></textarea>';
											drawComment += 	'<input name="name" type="text" value="<?=isset($data['User']['FullName'])?$data['User']['FullName']:""?>" placeholder="Họ tên" required class="form-control" style="max-width: 300px; margin-top: 10px" />';
											drawComment += 	'<input name="phone" type="number" value="<?=isset($data['User']['PhoneNumber'])?$data['User']['PhoneNumber']:""?>" placeholder="Số điện thoại" class="form-control" required style="max-width: 300px; margin-top: 10px" />';
											drawComment += 	'<input name="email" type="email" value="<?=isset($data['User']['Email'])?$data['User']['Email']:""?>" placeholder="Email" class="form-control" required style="max-width: 300px; margin-top: 10px" />';
											drawComment += 	'<button class="btn btn-danger" style="float: right; margin-top: 10px" onclick="hideAnswerCmtForm('+data+')">Hủy</button>';				
											drawComment += 	'<button onclick="addAnswerComment('+data+')" class="btn btn-info" style="float: right; margin-top: 10px; margin-right: 10px">Thêm</button>';				
											drawComment += 	'<div style="clear: right"></div>';
										drawComment += 	'</div>';

									drawComment += 	'</div>';
								drawComment += 	'</div>';
						$("#ds_Comment").prepend(drawComment);
						$("#ds_Comment").attr("data-itemEnd",parseInt($("#ds_Comment").attr("data-itemEnd"))+1);
						checkAllowRate();
					}
				}
			});
		}
	}
	function addAnswerComment(commentId){
		if($("#info_nhanxet"+commentId).children("textarea[name='content']").val()=='')
		{
			alert("Vui lòng nhập nội dung trả lời nhận xét!");
		}
		else if($("#info_nhanxet"+commentId).children("input[name='name']").val()=='')
		{
			alert("Vui lòng nhập tên!");
		}
		else if($("#info_nhanxet"+commentId).children("input[name='phone']").val()=='')
		{
			alert("Vui lòng nhập số điện thoại!");
		}
		else if($("#info_nhanxet"+commentId).children("input[name='email']").val()=='')
		{
			alert("Vui lòng nhập email!");
		}
		else
		{
			var productId = <?=$data['Product']['ProductId']?>;
			var content = $("#info_nhanxet"+commentId).children("textarea[name='content']").val();
			var name = $("#info_nhanxet"+commentId).children("input[name='name']").val();
			var phone = $("#info_nhanxet"+commentId).children("input[name='phone']").val();
			var email = $("#info_nhanxet"+commentId).children("input[name='email']").val();
			var userId = <?=$data['User']==''?0:$data['User']['UserId']?>;
			$.ajax({
				url:"<?=$_SESSION['projectName']?>/Ajax/addComment",
				type:"POST",
				data:{
					productId:productId,
					content:content,
					name:name,
					phone:phone,
					email:email,
					userId:userId,
					parentId:commentId
				},
				success: function(data){
					if(data != 0)
					{
						var now = new Date();
						var timeformat = now.getDate() +"/"+(now.getMonth()+1)+"/"+now.getFullYear()+" "+now.getHours() + ":" + now.getMinutes();

						var drawAnswer = '<div style="margin-top: 10px">';
								drawAnswer += 	'<span style="font-weight: bold; margin-bottom: 5px">'+name+'</span> - <span style="color:gray">'+timeformat+'</span><br/>';
								drawAnswer += 	'<span style="font-size: 15px">'+content+'</span>';
							drawAnswer += '</div>';
						$("#info_nhanxet"+commentId).after(drawAnswer);
						$("#comment"+commentId).attr("data-itemEnd",parseInt($("#comment"+commentId).attr("data-itemEnd"))+1);
						hideAnswerCmtForm(commentId);
					}
				}
			});
		}
	}
	function hideAnswerCmtForm(id)
	{
		$("#info_nhanxet"+id).hide();
	}
	function showAnswerCmtForm(id)
	{
		$("#info_nhanxet"+id).show();
	}
	function checkAllowRate(){
		var productId = <?=$data['Product']['ProductId']?>;
		var email = '<?=$data['Email']?>';
		if(email != '')
		{
			$.ajax({
				url:"<?=$_SESSION['projectName']?>/Ajax/checkAllowRate",
				type:"POST",
				data:{
					productId:productId,
					email:email
				},
				success:function(data){
					console.log(data);
					if(data == '1')
					{
						$("#rateform").show();
					}
					else
					{
						$("#rateform").hide();
					}
				}
			})
		}
	}
</script>