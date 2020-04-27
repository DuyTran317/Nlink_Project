
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-bottom:50px; overflow:auto">
  	<section class="content">
  		<div class="container-fluid">
			<div class="content-header">
			<div class="row mb-2">
				<div class="col-sm-12">
					<ol class="breadcrumb float-sm-left">
						<li class="breadcrumb-item" style="font-size:18px">Cập Nhật Sản Phẩm</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
			<!-- /.container-fluid -->
			</div>  
			<div class="container" style="display: flex; justify-content: center; align-items: center;">
			<!-- Main content -->			
				<div>
				<form action="<?=$_SESSION['projectName']?>/admin/Product/XulySua" method="POST">
				<input type="text" name="id" value="<?=$data['Product']['ProductId']?>" style="display:none">
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
										<option value="<?=$item['DepartId']?>" <?php if($item['DepartId'] == $data['DepartId']) echo "selected"; ?>><?=$item['DepartName']?></option>
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
									<input name="name" type="text" onchange="getUrl($(this).val())" style="width:250px; margin-left:10px; margin-top:20px" value="<?=$data['Product']['ProductName']?>" required>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Hình Ảnh Chính<span style="color:red"> *</span>:</label></td>
								<td>
									<input type="text" name="oldimg" value="<?=$data['Product']['Img']?>" style="display:none" />
									<img src="<?=$_SESSION['projectName']?>/lib/images/product/<?=$data['Product']['Img']?>" height="100px" width="100px">
									<input type="file" name="img" style="width:250px; margin-left:10px; margin-top:20px" required>
								</td>
							</tr> 
							<?php $img = current($data['listImg']); next($data['listImg']);?>
							<tr>
								<td><label style="margin-top:20px">Hình Ảnh Phụ 1<span style="color:red"> *</span>:</label></td>
								<td>
									<input type="text" name="oldimg1" value="<?=$img['Img']?>" style="display:none" />
									<img src="<?=$_SESSION['projectName']?>/lib/images/product/<?=$img['Img']?>" height="100px" width="100px">
									<input type="file" name="img1" style="width:250px; margin-left:10px; margin-top:20px" required>
								</td>
							</tr>
							<?php $img = current($data['listImg']); next($data['listImg']);?>
							<tr>
								<td><label style="margin-top:20px">Hình Ảnh Phụ 2<span style="color:red"> *</span>:</label></td>
								<td>
									<input type="text" name="oldimg2" value="<?=$img['Img']?>" style="display:none" />
									<img src="<?=$_SESSION['projectName']?>/lib/images/product/<?=$img['Img']?>" height="100px" width="100px">
									<input type="file" style="width:250px; margin-left:10px; margin-top:20px" required>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Hình Ảnh Phụ 3<span style="color:red"> *</span>:</label></td>
								<td>
								<input type="text" name="oldimg3" value="<?=$img['Img']?>" style="display:none" />
									<img src="<?=$_SESSION['projectName']?>/lib/images/product/<?=$img['Img']?>" height="100px" width="100px">
									<input type="file" style="width:250px; margin-left:10px; margin-top:20px" required>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Mô Tả<span style="color:red"> *</span>:</label></td>							
							</tr>
							<tr>
								<td colspan="2">
									<textarea required id="desc" name="desc" class="ckeditor"><?=$data['Product']['ProductDesc']?></textarea>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Trạng Thái:</label></td>
								<td>
									<select id="active" style="margin-top:20px; margin-left:10px">
												<option value="1" <?php if($data['Product']['Active']==1) echo "selected";?>>Hoạt Động</option>
												<option value="0" <?php if($data['Product']['Active']==0) echo "selected";?>>Không Hoạt Động</option>
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
											<option value="<?=$item['BrandId']?>" <?php if($item['BrandId']==$data['Product']['brandid']) echo "selected";?>><?=$item['BrandName']?></option>
										<?php
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Giá:</label></td>
								<td>
									<input type="number" name="price" value="<?=$data['Product']['Price']?>" style="width:250px; margin-left:10px; margin-top:20px" required>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Giá Thị Trường:</label></td>
								<td>
									<input type="number" name="priceOfMarket" value="<?=$data['Product']['PriceOfMarket']?>" style="width:250px; margin-left:10px; margin-top:20px" required>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Số Lượng:</label></td>
								<td>
									<input type="number" name="qty" value="<?=$data['Product']['Qty']?>" style="width:250px; margin-left:10px; margin-top:20px" required>
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Meta Title:</label></td>
								<td>
									<input type="text" name="meta_title" value="<?=$data['Product']['meta_title']?>" style="width:250px; margin-left:10px; margin-top:20px" >
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Meta Description:</label></td>
								<td>
									<input type="text" name="meta_des" value="<?=$data['Product']['meta_description']?>" style="width:250px; margin-left:10px; margin-top:20px" >
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">Meta Keyword:</label></td>
								<td>
									<input type="text" name="meta_keyword" value="<?=$data['Product']['meta_keyword']?>" style="width:250px; margin-left:10px; margin-top:20px" >
								</td>
							</tr>
							<tr>
								<td><label style="margin-top:20px">URL:</label></td>
								<td>
									<input id="url" type="text" name="url" value="<?=$data['Product']['url']?>" style="width:250px; margin-left:10px; margin-top:20px" required><p id="noti_url" style="color:red"></p>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="modal-footer">
						<a href="<?=$_SESSION['projectName']?>/admin/Product"><button type="button" class="btn btn-default" style="font-size:14px">Quay Lại</button></a>
						<button type="submit" class="btn btn-success" style="font-size:14px">Cập Nhật</button>
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
						if(dsCate[i].CateId==<?=$data['Product']['CategoryId']?>){
							$("#CateId").append('<option value="'+dsCate[i].CateId+'" selected>'+dsCate[i].CateName+'</option>');
						}
						else{
							$("#CateId").append('<option value="'+dsCate[i].CateId+'">'+dsCate[i].CateName+'</option>');
						}
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
          else if(data=='0' && $("#url").val() != <?=$data['Product']['url']?>){
            $("#noti_url").html("url này đã tồn tại!");
          }
        }
      })
    }
  </script>