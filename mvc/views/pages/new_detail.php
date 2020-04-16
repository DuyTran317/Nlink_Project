<!-- checkout page -->
<div class="container">
	<div class="row">
		<div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 30px">	
			<h3 style="font-weight: bold"><?=$data['News']['NewTitle']?></h3>
			<div style="margin-top: 25px">
				<?=$data['News']['Content']?>
			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-info" style="margin-top: 20px">
			  <div class="panel-heading" style="text-align:center; font-size:18px; font-weight:bold">Bài Viết Nổi Bật</div>
			  <div class="panel-body">                  
				  <ul style="list-style-type:none; padding:0 3px 0 5px;"> 
				  <?php
					 foreach($data['listNewsTopView'] as $item)
					 {
				  ?>                     
					<li style="padding-bottom:30px;">
						<a href="<?=$_SESSION['projectName']?>/News/Detail/<?=$item['url']?>"><img style="float:left; margin-right:15px;" src="<?=$_SESSION['projectName']?>/lib/images/news/<?=$item['Img']?>" width="70px" height="50px" alt="" /></a>
						<a href="<?=$_SESSION['projectName']?>/News/Detail/<?=$item['url']?>" style="font-size:16px; color: black"><?=$item['NewTitle']?></a>                            
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
<div class="container" style="margin-bottom: 70px">
	<h4 style="font-size: 22px; font-weight: bold; color:#993414; margin-top: 50px">Bài Viết Mới</h4>
	<div class="row" style="margin-top: 15px">
	<?php
		foreach($data['listNewsNew'] as $item)
		{
	?>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<img class="col-md-12 col-sm-12 col-xs-12" src="<?=$_SESSION['projectName']?>/lib/images/news/<?=$item['Img']?>" alt="" style="margin-bottom: 10px" />
			<h4 style="margin-top: 8px; font-weight: bold; margin-left: 12px;"><?=$item['NewTitle']?></h4>
			<p style="margin:5px 0 0 12px; font-size: 14px"><?=$item['CrDateTime']?></p>
		</div>
	<?php
		}
	?>
	</div>
</div>
<!-- //checkout page -->