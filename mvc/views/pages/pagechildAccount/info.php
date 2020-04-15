<?php
    if($data['noti']!="")
    {
        ?>
        <script>
            alert('<?=$data['noti']?>');
        </script>
        <?php
    }
?>
<div id="thong_tin_ca_nhan">
    <h4 style="font-weight: bold">Thông Tin Cá Nhân</h4>
    <div style="margin-top: 30px">
        <table>
            <tr>
                <td><span style="margin-top:20px">Họ và tên:</span><hr/></td>
                <td>
                    <span style="width:250px; margin-left:10px; margin-top:20px"><?=$data['User']['FullName']==''?"Chưa có thông tin":$data['User']['FullName']?></span><hr/>
                </td>
            </tr>
            <tr>
                <td><span style="margin-top:20px">Số điện thoại:</span><hr/></td>
                <td>
                    <span style="width:250px; margin-left:10px; margin-top:20px"><?=$data['User']['PhoneNumber']==''?"Chưa có thông tin":$data['User']['PhoneNumber']?></span><hr/>
                </td>
            </tr>
            <tr>
                <td><span style="margin-top:20px">Email:</span><hr/></td>
                <td>
                    <span style="width:250px; margin-left:10px; margin-top:20px"><?=$data['User']['Email']==''?"Chưa có thông tin":$data['User']['Email']?></span><hr/>
                </td>
            </tr>
            <tr>
                <td><span style="margin-top:20px">Mật khẩu:</span><hr/></td>
                <td>
                    <span style="width:250px; margin-left:10px; margin-top:20px"><a href="<?=$_SESSION['projectName']?>/Account/ChangePassword"><button type="button" class="btn btn-info">Thay Đổi</button></a></span><hr/>
                </td>
            </tr>
            <tr>
                <td><span style="margin-top:20px">Ngày sinh:</span><hr/></td>
                <td>
                    <span style="width:250px; margin-left:10px; margin-top:20px"><?=$data['User']['Birthday']=='NULL'?"Chưa có thông tin":$data['User']['Birthday']?></span><hr/>
                </td>
            </tr>
            <tr>
                <td><span style="margin-top:20px">Giới tính:</span><hr/></td>
                <td>
                    <span style="width:250px; margin-left:10px; margin-top:20px"><?=$data['User']['GenderId']=='NULL'?"Chưa có thông tin":$data['User']['GenderId']?></span><hr/>
                </td>
            </tr>
            <tr>
                <td><span style="margin-top:20px">Địa chỉ:</span><hr/></td>
                <td>
                    <span style="width:250px; margin-left:10px; margin-top:20px"><?=$data['User']['Address']=='NULL'?"Chưa có thông tin":$data['User']['Address']?></span><hr/>
                </td>
            </tr>
            <tr>
                <td><span style="margin-top:20px">Tỉnh/thành phố:</span><hr/></td>
                <td>
                    <span style="width:250px; margin-left:10px; margin-top:20px"><?=$data['User']['CityId']==0?"Chưa có thông tin":$data['City']['CityName']?></span><hr/>
                </td>
            </tr>
            <tr>
                <td><span style="margin-top:20px">Quận/huyện:</span><hr/></td>
                <td>
                    <span style="width:250px; margin-left:10px; margin-top:20px"><?=$data['User']['DictrictId']==0?"Chưa có thông tin":$data['Dictrict']['DictrictName']?></span><hr/>
                </td>
            </tr>
            <tr>
                <td><span style="margin-top:20px">Phường/xã:</span><hr/></td>
                <td>
                    <span style="width:250px; margin-left:10px; margin-top:20px"><?=$data['User']['WardId']==0?"Chưa có thông tin":$data['Ward']['WardName']?></span><hr/>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button onclick="window.location='<?=$_SESSION['projectName']?>/Account/update'" class="btn btn-primary">Đổi Thông Tin</button></td>			
            </tr>
        </table>
    </div>
</div>
