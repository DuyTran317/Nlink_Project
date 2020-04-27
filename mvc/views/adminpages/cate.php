
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
						<li class="breadcrumb-item" style="font-size:18px">Danh Sách Thể Loại</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
			<!-- /.container-fluid -->
			</div>  
			
			<div>
    			<a href="<?=$_SESSION['projectName']?>/admin/Category/Create"><button class="btn btn-primary">Tạo Thể Loại <i class="fas fa-plus-circle"></i></button></a><br>
				<select style="width:auto; height:30px; margin:10px 0 10px 0" name="nhomkh" id="nhomkh_cond" onchange="changeDepart($(this).val())">
          <option value="0">Thuộc Chủng Loại</option>   
          <?php
            foreach($data['listDepart'] as $item){
          ?>
            <option value="<?=$item['DepartId']?>" <?php if($item['DepartId']==$data['departId']) echo "selected";?>><?=$item['DepartName']?></option>
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
							<th class="table_th">Tên Thể Loại</th>
							<th class="table_th">Thứ Tự</th>
							<th class="table_th">Trạng Thái</th>
							<th class="table_th">Thao Tác</th>
						</tr>
					</thead>
					<tbody>
            <?php
              $stt = 0;
              foreach($data['listCate'] as $item){
                $stt++;
            ?>
						<tr class="hv_row" style="cursor:pointer" onclick="toUpdate('<?=$item['CateId']?>')">
							<td class="table_row"><?=$stt?></td>
							<td class="table_row" style="color:#F00; font-weight:bold"><?=$item['CateName']?></td>
							<td class="table_row"><?=$item['Order']?></td>
							<td class="table_row"><?=$item['Active']==1?"Active":"Deactive"?></td>					
							<td class="table_row"><a onclick="deleteCate(<?=$item['CateId']?>)" style="color:red"><i class="fas fa-trash-alt"></i></a></td>					
						</tr>		
            <?php
              }
            ?>
					</tbody>
				</table>	

				<ul class="pagination" style="float:right; margin-top:10px; cursor:pointer">
        <?php
					if(count($data['listCate']))
					{
						?>
						<li class="page-item"><a class="page-link" href="<?=$_SESSION['projectName']?>/admin/Category/Index/<?=$data['departId']?>/1">First Page</a></li>
						<?php
						$begin = $data['pageCate']-2<=1?1:$data['pageCate']-2;
						$end = $data['pageCate']+2>=$data['sumPageCate']?$data['sumPageCate']:$data['pageCate']+2;
						for($i=$begin;$i<=$end;$i++)
						{
							if($i == $data['pageCate'])
							{
							?>
							<li class="page-item active"><a class="page-link"><?=$i?></a></li>
							<?php
							}
							else
							{
							?>
							<li class="page-item "><a class="page-link" href="<?=$_SESSION['projectName']?>/admin/Category/Index/<?=$data['departId']?>/<?=$i?>"><?=$i?></a></li>
							<?php
							}
						}
						?>
						<li class="page-item"><a class="page-link" href="<?=$_SESSION['projectName']?>/admin/Category/Index/<?=$data['departId']?>/<?=$data['sumPageDepart']?>">Last Page</a></li>
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
  <!-- /.content-wrapper -->
  <script>
    function changeDepart(departId){
      window.location="<?=$_SESSION['projectName']?>/admin/Category/Index/"+departId;
    }
    function deleteCate(id){
      var kq = confirm("Bạn có chắc muốn xóa Thể Loại này?");
      if(kq){
        $.ajax({
          url:"<?=$_SESSION['projectName']?>/admin/Category/Delete",
          type:"POST",
          data:{
            cateId:id
          },
          success: function(data){
            window.location.reload(true);
          }
        })
      }
	}
    function toUpdate(id){
		  window.location = "<?=$_SESSION['projectName']?>/admin/Category/Update/"+id;
	  }
  </script>
  