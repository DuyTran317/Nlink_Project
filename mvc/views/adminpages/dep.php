
  <div class="content-wrapper" style="margin-bottom:50px; overflow:auto">
  	<section class="content">
  		<div class="container-fluid">
		  <div class="container" style="margin-top:10px">
			<!-- Main content -->

			<div class="content-header">
			<div class="row mb-2">
				<div class="col-sm-12">
					<ol class="breadcrumb float-sm-left">
						<li class="breadcrumb-item" style="font-size:18px">Danh Sách Chủng Loại</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
			<!-- /.container-fluid -->
			</div>  
			
			<div>
    			<a href="<?=$_SESSION['projectName']?>/admin/Department/Create"><button class="btn btn-primary">Tạo Chủng Loại <i class="fas fa-plus-circle"></i></button></a><br>
    
				<button style="float:right;" class="btn btn-default but_search" onclick="GetDSKH()"><i class="fas fa-search" style="font-size:16px"></i></button>
				<input class="keyword_search" type="text" style="float:right; height:30px; margin-right:3px" name="keyword" id="keyword_cond">
				<div style="clear:right"></div>
			</div>  
			  
			<div id="tbl_dskh">
				<table class="col-md-12 col-sm-12 col-xs-12 table-bordered table_form datatable">
					<thead>
						<tr class="table_header">
							<th class="table_th">STT</th>
							<th class="table_th">Tên Chủng Loại</th>
							<th class="table_th">Thứ Tự</th>
							<th class="table_th">Trạng Thái</th>
							<th class="table_th">Thao Tác</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$stt=0;
						foreach($data['listDepart'] as $item)
						{
							$stt++;
					?>
						<tr class="hv_row" style="cursor:pointer" onclick="toUpdate('<?=$item['DepartId']?>')">
							<td class="table_row"><?=$stt?></td>
							<td class="table_row" style="color:#F00; font-weight:bold"><?=$item['DepartName']?></td>
							<td class="table_row"><?=$item['Order']?></td>
							<td class="table_row"><?=$item['Active']==1?"Active":"Deactive"?></td>					
							<td class="table_row"><a onclick="deleteDepart(<?=$item['DepartId']?>)" style="color:red"><i class="fas fa-trash-alt"></i></a></td>					
						</tr>		
					<?php
						}
					?>
					</tbody>
				</table>	

				<ul class="pagination" style="float:right; margin-top:10px; cursor:pointer">
					<?php
					if(count($data['listDepart']))
					{
						?>
						<li class="page-item"><a class="page-link" href="<?=$_SESSION['projectName']?>/admin/Department/Index/1">First Page</a></li>
						<?php
						$begin = $data['pageDepart']-2<=1?1:$data['pageDepart']-2;
						$end = $data['pageDepart']+2>=$data['sumPageDepart']?$data['sumPageDepart']:$data['pageDepart']+2;
						for($i=$begin;$i<=$end;$i++)
						{
							if($i == $data['pageDepart'])
							{
							?>
							<li class="page-item active"><a class="page-link"><?=$i?></a></li>
							<?php
							}
							else
							{
							?>
							<li class="page-item "><a class="page-link" href="<?=$_SESSION['projectName']?>/admin/Department/Index/<?=$i?>"><?=$i?></a></li>
							<?php
							}
						}
						?>
						<li class="page-item"><a class="page-link" href="<?=$_SESSION['projectName']?>/admin/Department/Index/<?=$data['sumPageDepart']?>">Last Page</a></li>
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
	function deleteDepart(id){
		var kq = confirm("Bạn có chắc muốn xóa Chủng Loại này?");
		if(kq){
			$.ajax({
				url:"<?=$_SESSION['projectName']?>/admin/Department/Delete",
				type:"POST",
				data:{
					departmentId:id
				},
				success: function(data){
					window.location.reload(true);
				}
			})
		}
	}
	function toUpdate(id){
		window.location = "<?=$_SESSION['projectName']?>/admin/Department/Update/"+id;
	}
  </script>
 