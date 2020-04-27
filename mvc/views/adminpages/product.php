
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-bottom:50px; overflow:auto">
  	<section class="content">
  		<div class="container-fluid">
		  <div class="container" style="margin-top:10px">
			<!-- Main content -->

			<div class="content-header">
			<div class="row mb-2">
				<div class="col-sm-12">
					<ol class="breadcrumb float-sm-left">
						<li class="breadcrumb-item" style="font-size:18px">Danh Sách Sản Phẩm</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
			<!-- /.container-fluid -->
			</div>  
			
			<div>
    			<a href="<?=$_SESSION['projectName']?>/admin/Product/Create"><button class="btn btn-primary">Tạo Sản Phẩm <i class="fas fa-plus-circle"></i></button></a><br>
				<select style="width:auto; height:30px; margin:10px 0 10px 0" name="" id="" onchange="">
					<option value="0">Theo Thể Loại</option>
					<?php
						foreach($data['listDepart'] as $item){
					?>
						<optgroup label="<?=$item['DepartName']?>">
							<?php 
								while(current($data['listCate'])['DepartId']==$item['DepartId']){
								$cate = current($data['listCate']);
							?>
								<option value="<?=$cate['CateId']?>" <?php if($cate['CateId']==$data['cateId']) echo "selected";?>><?=$cate['CateName']?></option>   
							<?php
								next($data['listCate']);
								}
							?>
						</optgroup>
					<?php
						}
					?>
				</select>
    
				<button style="float:right;" class="btn btn-default but_search" onclick=""><i class="fas fa-search" style="font-size:16px"></i></button>
				<input class="keyword_search" type="text" style="float:right; height:30px; margin-right:3px" name="keyword" id="keyword_cond">
				<div style="clear:right"></div>
			</div>  
			  
			<div id="tbl_dskh">
				<table class="col-md-12 col-sm-12 col-xs-12 table-bordered table_form datatable">
					<thead>
						<tr class="table_header">
							<th class="table_th">STT</th>
							<th class="table_th">Tên Sản Phẩm</th>
							<th class="table_th">Giá</th>
							<th class="table_th">Số Lượng</th>
							<th class="table_th">Trạng Thái</th>
							<th class="table_th">Thao Tác</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$stt = 0;
						foreach($data['listProduct'] as $item){
							$stt++;
					?>
						<tr class="hv_row" style="cursor:pointer" onclick="toUpdate('<?=$item['ProductId']?>')">
							<td class="table_row"><?=$stt?></td>
							<td class="table_row" style="color:#F00; font-weight:bold"><?=$item['ProductName']?></td>
							<td class="table_row"><?=number_format($item['Price'])?> VND</td>
							<td class="table_row"><?=$item['Qty']?></td>
							<td class="table_row"><?=$item['Active']==1?"Đang Hoạt Động":"Dừng Hoạt Động"?></td>					
							<td class="table_row"><a onclick="deleteProduct(<?=$item['ProductId']?>)" style="color:red"><i class="fas fa-trash-alt"></i></a></td>					
						</tr>		
					<?php
						}
					?>
					</tbody>
				</table>	

				<ul class="pagination" style="float:right; margin-top:10px; cursor:pointer">
				<?php
					if(count($data['listProduct']))
					{
						?>
						<li class="page-item"><a class="page-link" href="<?=$_SESSION['projectName']?>/admin/Product/Index/<?=$data['cateId']?>/1">First Page</a></li>
						<?php
						$begin = $data['pageProduct']-2<=1?1:$data['pageProduct']-2;
						$end = $data['pageProduct']+2>=$data['sumPageProduct']?$data['sumPageProduct']:$data['pageProduct']+2;
						for($i=$begin;$i<=$end;$i++)
						{
							if($i == $data['pageProduct'])
							{
							?>
							<li class="page-item active"><a class="page-link"><?=$i?></a></li>
							<?php
							}
							else
							{
							?>
							<li class="page-item "><a class="page-link" href="<?=$_SESSION['projectName']?>/admin/Product/Index/<?=$data['cateId']?>/<?=$i?>"><?=$i?></a></li>
							<?php
							}
						}
						?>
						<li class="page-item"><a class="page-link" href="<?=$_SESSION['projectName']?>/admin/Product/Index/<?=$data['cateId']?>/<?=$data['sumPageProduct']?>">Last Page</a></li>
					<?php
					}
					?>
				</ul>
				<div style="clear:right"></div>
				<!-- End Table -->
			</div>
	  
		<!-- /.content -->	
			</div>
	  </div>
  	</section>
  </div>
  <script>
  	function toUpdate(id){
		window.location = "<?=$_SESSION['projectName']?>/admin/Product/Update/"+id;
	}
	function deleteProduct(id){
      var kq = confirm("Bạn có chắc muốn xóa Sản Phẩm này?");
      if(kq){
        $.ajax({
          url:"<?=$_SESSION['projectName']?>/admin/Product/Delete",
          type:"POST",
          data:{
            productId:id
          },
          success: function(data){
            window.location.reload(true);
          }
        })
      }
	}
  </script>
  <!-- /.content-wrapper -->
  