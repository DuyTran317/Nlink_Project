<div id="upd_thong_tin_ca_nhan">
    <h4 style="font-weight: bold">Thay Đổi Thông Tin</h4>
    <div style="margin-top: 30px">
    <form action="<?=$_SESSION['projectName']?>/Account" method="POST">
        <table>
            <tr>
                <td><span style="margin-top:20px">Họ và tên *:</span><hr/></td>
                <td>
                    <span style="margin-left:10px; margin-top:20px; width: 100%"><input name="name" type="text" value="<?=$data['User']['FullName']?>" required /></span><hr/>
                </td>
            </tr>
            <tr>
                <td><span style="margin-top:20px">Số điện thoại *:</span><hr/></td>
                <td>
                    <span style="margin-left:10px; margin-top:20px; width: 100%"><input name="phonenumber" type="text" value="<?=$data['User']['PhoneNumber']?>" required /></span><hr/>
                </td>
            </tr>
            <tr>
                <td><span style="margin-top:20px">Ngày sinh:</span><hr/></td>
                <td>
                    <span style="margin-left:10px; margin-top:20px; width: 100%"><input name="birthday" type="date" value="<?=$data['User']['Birthday']?>" /></span><hr/>
                </td>
            </tr>
            <tr>
                <td><span style="margin-top:20px">Giới tính:</span><hr/></td>
                <td>
                    <span style="margin-left:10px; margin-top:20px; width: 100%">
                        <select name="gender">
                            <?php
                                foreach($data['listGender'] as $item)
                                {
                                    ?>
                                    <option value="<?=$item['GenderId']?>" <?php if($data['User']['GenderId']==$item['GenderId']) echo "selected"; ?>><?=$item['GenderName']?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </span><hr/>
                </td>
            </tr>
            <tr>
                <td><span style="margin-top:20px">Địa chỉ:</span><hr/></td>
                <td>
                    <span style="margin-left:10px; margin-top:20px;"><textarea name="address" style="width: 250px; height: 70px"><?=$data['User']['Address']?></textarea></span><hr/>
                </td>
            </tr>
            <tr>
                <td><span style="margin-top:20px">Tỉnh/thành phố:</span><hr/></td>
                <td>
                    <span style="margin-left:10px; margin-top:20px">
                        <select name="city" id="tinh_thanh_tttk" style="width: auto">
                            <option value="0">---Chọn Tỉnh Thành---</option>
                            <?php
                            foreach($data['listCity'] as $item)
                            {
                                ?>
                                <option value="<?=$item['CityId']?>" <?php if($item['CityId']==$data['User']['CityId']) echo "selected";?>><?=$item['CityName']?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </span><hr/>
                </td>
            </tr>
            <tr>
                <td><span style="margin-top:20px">Quận/huyện:</span><hr/></td>
                <td>
                    <span style="margin-left:10px; margin-top:20px">
                        <select name="dictrict" id="qh_change_tttk" style="width: auto">
                            <option id="chon_qh_tttk" value="0">---Chọn Quận/Huyện---</option>
                            <?php
                            foreach($data['listDictrict'] as $item)
                            {
                                ?>
                                <option value="<?=$item['DictrictId']?>" <?php if($item['DictrictId']==$data['User']['DictrictId']) echo "selected";?>><?=$item['DictrictName']?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </span><hr/>
                </td>
            </tr>
            <tr>
                <td><span style="margin-top:20px">Phường/xã:</span><hr/></td>
                <td>
                    <span style="margin-left:10px; margin-top:20px">
                        <select name="ward" id="phuong_xa" style="width: auto" >
                            <option id="chon_px_tttk" value="0">---Chọn Phường/Xã---</option>
                            <?php
                            foreach($data['listWard'] as $item)
                            {
                                ?>
                                <option value="<?=$item['WardId']?>" <?php if($item['WardId']==$data['User']['WardId']) echo "selected";?>><?=$item['WardName']?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </span><hr/>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="submitUpdate" class="btn btn-primary">Lưu Thay Đổi</button></td>			
            </tr>
        </table>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#tinh_thanh_tttk").change(function(){
            if($("#tinh_thanh_tttk").val()!=0)
            {
                $("#qh_change_tttk").html("");
				$("#qh_change_tttk").append('<option id="chon_qh_tttk" value="0">---Chọn Quận/Huyện---</option>')
				$.ajax({
					url:"<?=$_SESSION['projectName']?>/Ajax/loadDictrict",
					type:"POST",
					data:{
						id:$("#tinh_thanh_tttk").val()
					},
					success: function(data){
						var listDictrict = JSON.parse(data);
						for(var i = 0; i<listDictrict.length; i++)
						{
							$("#qh_change_tttk").append('<option value="'+listDictrict[i].DictrictId+'">'+listDictrict[i].DictrictName+'</option>');
						}
					}
				});
            }
        });
        $("#qh_change_tttk").change(function(){
            if($("#qh_change_tttk").val() != 0)
            {
                $("#phuong_xa").html("");
				$("#phuong_xa").append('<option id="chon_px_tttk" value="0">---Chọn Phường/Xã---</option>');
				
				$.ajax({
					url:"<?=$_SESSION['projectName']?>/Ajax/loadWard",
					type:"POST",
					data:{
						id:$("#qh_change_tttk").val()
					},
					success: function(data){
						var listWard = JSON.parse(data);
						for(var i = 0; i<listWard.length; i++)
						{
							$("#phuong_xa").append('<option value="'+listWard[i].WardId+'">'+listWard[i].WardName+'</option>');
						}
					}
				})	
            }
        });
    });
</script>