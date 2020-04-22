  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-bottom:50px; overflow:auto">
  	<section class="content">
  		<div class="container-fluid">
			<div class="content-header">
			<div class="row mb-2">
				<div class="col-sm-12">
					<ol class="breadcrumb float-sm-left">
						<li class="breadcrumb-item" style="font-size:18px">Thêm Chủng Loại</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
			<!-- /.container-fluid -->
			</div>  
			<div class="container" style="display: flex; justify-content: center; align-items: center;">
			<!-- Main content -->			
				<div>
          <form action="<?=$_SESSION['projectName']?>/admin/Department/XuLyThem" method="POST">
					<table>
						<tbody>
							<tr>
								<td><label style="margin-top:20px">Tên Chủng Loại<span style="color:red"> *</span>:</label></td>
								<td>
									<input name="name" type="text" onchange="getUrl($(this).val(),'url')" style="width:250px; margin-left:10px; margin-top:20px" value="" required>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Thứ Tự<span style="color:red"> *</span>:</label></td>
								<td>
									<input name="order" type="number" style="width:250px; margin-left:10px; margin-top:20px" value="<?=$data['Order']+1?>" required>
								</td>
							</tr>                
							<tr>
								<td><label style="margin-top:20px">Trạng Thái:</label></td>
								<td>
									<select name="active" id="grouproleid" style="margin-top:20px; margin-left:10px">
												<option value="1">Hoạt Động</option>
												<option value="0">Không Hoạt Động</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Meta Title:</label></td>
								<td>
									<input name="meta_title" type="text" style="width:250px; margin-left:10px; margin-top:20px" value="">
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Meta Description:</label></td>
								<td>
									<input name="meta_des" type="text" style="width:250px; margin-left:10px; margin-top:20px" value="">
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Meta Keyword:</label></td>
								<td>
									<input name="meta_keyword" type="text" style="width:250px; margin-left:10px; margin-top:20px" value="">
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">URL:</label></td>
								<td>
									<input name="url" id="url" type="text" style="width:250px; margin-left:10px; margin-top:20px" value="" required><p id="noti_url" style="color:red"></p>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" style="font-size:14px">Quay Lại</button>
						<button type="submit" name="createDepart" class="btn btn-success" style="font-size:14px">Thêm</button>
          </div>
          </form>
				</div>
				<!-- /.content -->	
			</div>
		</div>
  	</section>
  </div>
  <!-- /.content-wrapper -->
  <script>
    function getUrl(str){
      str = convertUrlString(str);
      $("#url").val(str);
      $.ajax({
        url:"<?=$_SESSION['projectName']?>/admin/Department/checkUrl",
        type:"POST",
        data:{
          url:$("#url").val()
        },
        success: function(data){
          if(data=='1')
          {
            $("#noti_url").html("");
          }
          else if(data=='0'){
            $("#noti_url").html("url này đã tồn tại!");
          }
        }
      })
    }
    </script>
  