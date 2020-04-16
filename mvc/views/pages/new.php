<!-- checkout page -->
<div class="container">
	<div class="row">
		<div id="myCarousel" class="carousel slide col-md-8 col-sm-8 col-xs-12" data-ride="carousel" style="margin-top: 15px">
		<!-- Indicators -->
			<ol class="carousel-indicators">
			  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			  <li data-target="#myCarousel" data-slide-to="1"></li>
			  <li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			  <div class="item active">
				<img src="lib/images/banner1.jpg" alt="Los Angeles" style="max-width:100%;">			
			  </div>

			  <div class="item">
				<img src="lib/images/banner2.jpg" alt="Chicago" style="max-width:100%;">
			  </div>

			  <div class="item">
				<img src="lib/images/banner3.jpg" alt="New york" style="max-width:100%;">
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
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-info" style="margin-top: 15px">
			  <div class="panel-heading" style="text-align:center; font-size:18px; font-weight:bold">Bài Viết Nổi Bật</div>
			  <div class="panel-body">                  
				  <ul style="list-style-type:none; padding:0 3px 0 5px;"> 
				  <?php
					  foreach($data['listNewsTopView'] as $item)
					  {
				  ?>                     
					<li style="padding-bottom:20px;">
						<a href=""><img style="float:left; margin-right:15px;" src="<?=$_SESSION['projectName']?>/lib/images/news/<?=$item['Img']?>" width="70px" height="50px" alt="" /></a>
						<a href="" style="font-size:16px; color: black"><?=$item['NewTitle']?></a>                            
					</li>   
				<?php
					  }
				?>
				  </ul>                                           
			 </div>                 
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="col-md-10 col-sm-10 col-xs-10">
		<div style="margin-top:40px; margin-bottom:25px">
			<?php
				foreach($data['listNews'] as $item)
				{
			?>
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-12 col-xs-12">
							<a href="<?=$_SESSION['projectName']?>/News/Detail/<?=$item['url']?>">
								<figure style="display: flex"><img src="<?=$_SESSION['projectName']?>/lib/images/news/<?=$item['Img']?>" style="height:100px; margin-top:10px; margin: auto" alt=""></figure>
							</a>    
						</div>
						<div class="col-md-9 col-sm-12 col-xs-12 content-tin" style="margin-bottom: 10px">
							<a class="header_new" href="<?=$_SESSION['projectName']?>/News/Detail/<?=$item['url']?>" style="color:#337ab7; overflow-wrap:break-word"><b style="color:#000"><?=$item['NewTitle']?></b></a>
							<div class="content_new hiddentext" style="margin-top:10px"><?=$item['Content']?></div>
							<p style="font-size: 14px; color: gray"><?=$item['CrDateTime']?></p>
							<div style="text-align:right;margin:5px 0 10px auto;"><a href="<?=$_SESSION['projectName']?>/News/Detail/<?=$item['url']?>" class="btn btn-info btn_res_size">Xem thêm</a></div>
						</div>
					</div>                    
				</div>   
			<?php
				}
			?>
		</div>   
		<div style="text-align: center; margin:10px 0 20px 0">
			<ul class="pagination">
				<?php
					if(count($data['listNews']))
					{
						?>
						<li><a href="<?=$_SESSION['projectName']?>/News/Index/1">&lt;</a></li>
						<?php
						$begin = $page-2<=1?1:$page-2;
						$end = $page+2>=$data['sumPageNews']?$data['sumPageNews']:$page+2;
						for($i=$begin;$i<=$end;$i++)
						{
							if($i == $data['page'])
							{
							?>
							<li class="active"><a><?=$i?></a></li>
							<?php
							}
							else
							{
							?>
							<li><a href="<?=$_SESSION['projectName']?>/News/Index/<?=$i?>"><?=$i?></a></li>
							<?php
							}
						}
						?>
						<li><a href="<?=$_SESSION['projectName']?>/News/Index/<?=$data['sumPageNews']?>">&gt;</a></li>
						<?php
					}
				?>
			</ul>
		</div>
	</div>
</div>
<!-- //checkout page -->