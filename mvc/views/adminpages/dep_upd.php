
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-bottom:50px; overflow:auto">
  	<section class="content">
  		<div class="container-fluid">
			<div class="content-header">
			<div class="row mb-2">
				<div class="col-sm-12">
					<ol class="breadcrumb float-sm-left">
						<li class="breadcrumb-item" style="font-size:18px">Cập Nhật Chủng Loại</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
			<!-- /.container-fluid -->
			</div>  
			<div class="container" style="display: flex; justify-content: center; align-items: center;">
			<!-- Main content -->			
				<div>
          			<form action="<?=$_SESSION['projectName']?>/admin/Department/XuLySua" method="POST">
					<input type="text" name="id" value="<?=$data['Depart']['DepartId']?>" style="display:none">
					<table>
						<tbody>
							<tr>
								<td><label style="margin-top:20px">Tên Chủng Loại<span style="color:red"> *</span>:</label></td>
								<td>
									<input name="name" onchange="getUrl($(this).val())" type="text" style="width:250px; margin-left:10px; margin-top:20px" value="<?=$data['Depart']['DepartName']?>" required>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Thứ Tự<span style="color:red"> *</span>:</label></td>
								<td>
									<input name="order" type="number" style="width:250px; margin-left:10px; margin-top:20px" value="<?=$data['Depart']['Order']?>" required>
								</td>
							</tr>                
							<tr>
								<td><label style="margin-top:20px">Trạng Thái:</label></td>
								<td>
									<select name="active" id="grouproleid" style="margin-top:20px; margin-left:10px">
												<option value="1" <?php if($data['Depart']['Active']==1) echo "selected";?>>Hoạt Động</option>
												<option value="0" <?php if($data['Depart']['Active']==0) echo "selected";?>>Không Hoạt Động</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Meta Title:</label></td>
								<td>
									<input name="meta_title" type="text" style="width:250px; margin-left:10px; margin-top:20px" value="<?=$data['Depart']['meta_title']?>">
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Meta Description:</label></td>
								<td>
									<input name="meta_des" type="text" style="width:250px; margin-left:10px; margin-top:20px" value="<?=$data['Depart']['meta_description']?>" >
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Meta Keyword:</label></td>
								<td>
									<input name="meta_keyword" type="text" style="width:250px; margin-left:10px; margin-top:20px" value="<?=$data['Depart']['meta_keyword']?>">
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">URL:</label></td>
								<td>
									<input id="url" name="url" type="text" style="width:250px; margin-left:10px; margin-top:20px" value="<?=$data['Depart']['url']?>" required><p id="noti_url" style="color:red"></p>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="modal-footer">
					<a href="<?=$_SESSION['projectName']?>/admin/Department"><button type="button" class="btn btn-default" style="font-size:14px">Quay Lại</button></a>
						<button name="updateDepart" type="submit" class="btn btn-success" style="font-size:14px">Cập Nhật</button>
					</div>
					</form>
				</div>
				<!-- /.content -->	
			</div>
		</div>
  	</section>
  </div>
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
          else if(data=='0' && $("#url").val()!='<?=$data['Depart']['url']?>'){
            $("#noti_url").html("url này đã tồn tại!");
          }
        }
      })
    }
    </script>
  