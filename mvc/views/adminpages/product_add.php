
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-bottom:50px; overflow:auto">
  	<section class="content">
  		<div class="container-fluid">
			<div class="content-header">
			<div class="row mb-2">
				<div class="col-sm-12">
					<ol class="breadcrumb float-sm-left">
						<li class="breadcrumb-item" style="font-size:18px">Thêm Sản Phẩm</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
			<!-- /.container-fluid -->
			</div>  
			<div class="container" style="display: flex; justify-content: center; align-items: center;">
			<!-- Main content -->			
				<div>
					<form action="<?=$_SESSION['projectName']?>/admin/Product/XulyThem" method="POST">
					<table>
						<tbody>
							<tr>
								<td><label style="margin-top:20px">Thuộc Chủng Loại:</label></td>
								<td>
									<select id="DepartId" name="departId" onchange="loadCates($(this).val())" style="margin-top:20px; margin-left:10px">
									<?php
										foreach($data['listDepart'] as $item)
										{
									?>
										<option value="<?=$item['DepartId']?>"><?=$item['DepartName']?></option>
									<?php
										}
									?>
									</select>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Thuộc Thể Loại:</label></td>
								<td>
									<select id="CateId" name="cateId" style="margin-top:20px; margin-left:10px">
										
									</select>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Tên Sản Phẩm<span style="color:red"> *</span>:</label></td>
								<td>
									<input name="name" type="text" onchange="getUrl($(this).val())" style="width:250px; margin-left:10px; margin-top:20px" value="" required>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Hình Ảnh Chính<span style="color:red"> *</span>:</label></td>
								<td>
									<input name="img" type="file" style="width:250px; margin-left:10px; margin-top:20px" required>
								</td>
							</tr> 
							<tr>
								<td><label style="margin-top:20px">Hình Ảnh Phụ 1<span style="color:red"> *</span>:</label></td>
								<td>
									<input name="img1" type="file" style="width:250px; margin-left:10px; margin-top:20px" required>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Hình Ảnh Phụ 2<span style="color:red"> *</span>:</label></td>
								<td>
									<input name="img2" type="file" style="width:250px; margin-left:10px; margin-top:20px" required>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Hình Ảnh Phụ 3<span style="color:red"> *</span>:</label></td>
								<td>
									<input name="img3" type="file" style="width:250px; margin-left:10px; margin-top:20px" required>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Mô Tả<span style="color:red"> *</span>:</label></td>							
							</tr>
							<tr>
								<td colspan="2">
									<textarea required id="desc" name="desc" class="ckeditor"></textarea>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Trạng Thái:</label></td>
								<td>
									<select id="grouproleid" name="active" style="margin-top:20px; margin-left:10px">
										<option value="1">Hoạt Động</option>
										<option value="0">Không Hoạt Động</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Thương Hiệu:</label></td>
								<td>
									<select name="brandid" style="margin-top:20px; margin-left:10px">
										<?php
											foreach($data['listBrand'] as $item)
											{
										?>
											<option value="<?=$item['BrandId']?>"><?=$item['BrandName']?></option>
										<?php
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Giá:</label></td>
								<td>
									<input name="price" type="number" style="width:250px; margin-left:10px; margin-top:20px" value="" required>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Giá Thị Trường:</label></td>
								<td>
									<input name="priceOfMarket" type="number" style="width:250px; margin-left:10px; margin-top:20px" value="" required>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Số Lượng:</label></td>
								<td>
									<input name="qty" type="number" style="width:250px; margin-left:10px; margin-top:20px" value="" required>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Điểm Thưởng:</label></td>
								<td>
									<input name="point" type="number" style="width:250px; margin-left:10px; margin-top:20px" value="" required>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Meta Title:</label></td>
								<td>
									<input name="meta_title" type="text" style="width:250px; margin-left:10px; margin-top:20px" value="" >
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Meta Description:</label></td>
								<td>
									<input name="meta_des" type="text" style="width:250px; margin-left:10px; margin-top:20px" value="" >
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Meta Keyword:</label></td>
								<td>
									<input name="meta_keyword" type="text" style="width:250px; margin-left:10px; margin-top:20px" value="" >
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">URL:</label></td>
								<td>
									<input id="url" name="url" type="text" style="width:250px; margin-left:10px; margin-top:20px" value="" required><p id="noti_url" style="color:red"></p>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="modal-footer">
						<a href="<?=$_SESSION['projectName']?>/admin/Product"><button type="button" class="btn btn-default" style="font-size:14px">Quay Lại</button></a>
						<button name="createProduct" type="submit" class="btn btn-success" style="font-size:14px">Thêm</button>
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
	$(document).ready(function(){
		loadCates($("#DepartId").val());
	})
	function loadCates(departId)
	{
		$.ajax({
			url:"<?=$_SESSION['projectName']?>/admin/Category/loadCategoriesOfDepartment",
			type:"POST",
			data:{
				departId:departId
			},
			success: function(data){
				$("#CateId").html("");
				if(data!="")
				{
					var dsCate = JSON.parse(data);
					for(var i = 0; i < dsCate.length; i++)
					{
						$("#CateId").append('<option value="'+dsCate[i].CateId+'">'+dsCate[i].CateName+'</option>');
					}
				}
			}
		})
	}
	function getUrl(str){
      str = convertUrlString(str);
      $("#url").val(str);
      $.ajax({
        url:"<?=$_SESSION['projectName']?>/admin/Product/checkUrl",
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