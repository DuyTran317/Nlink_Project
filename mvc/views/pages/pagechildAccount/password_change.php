<div id="thay_doi_mat_khau">
	<h4 style="font-weight: bold">Thay Đổi Mật Khẩu</h4>
	<div style="margin-top: 30px">
		<table>
			<tr>
				<td><span style="margin-top:20px">Mật khẩu cũ <span style="color:red">*</span>:</span><hr style="border-top:1px solid #fffefe" /></td>
				<td>
					<span style="margin-left:10px; margin-top:20px; width: 100%"><input id="oldpass" type="password" value="" required /></span><hr style="border-top:1px solid #fffefe" />
				</td>
			</tr>
			<tr>
				<td><span style="margin-top:20px">Mật khẩu mới <span style="color:red">*</span>:</span><hr style="border-top:1px solid #fffefe" /></td>
				<td>
					<span style="margin-left:10px; margin-top:20px; width: 100%"><input id="newpass" type="password" value="" required /></span><hr style="border-top:1px solid #fffefe" />
				</td>
			</tr>	
			<tr>
				<td><span style="margin-top:20px">Nhập lại mật khẩu mới <span style="color:red">*</span>:</span><hr style="border-top:1px solid #fffefe" /></td>
				<td>
					<span style="margin-left:10px; margin-top:20px; width: 100%"><input id="repass" type="password" value="" required /></span><hr style="border-top:1px solid #fffefe" />
				</td>
			</tr>	
			<tr>
				<td colspan="2"><button onClick="submitChangePassword()" class="btn btn-primary">Cập Nhật</button></td>
			</tr>
		</table>
	</div>
</div>
<script>
	function submitChangePassword(){
		var flag = 1;
		var oldpass = $("#oldpass").val();
		var newpass = $("#newpass").val();
		var repass = $("#repass").val();
		if(oldpass == "")
		{
			alert("Vui lòng điền mật khẩu cũ!");
			flag = 0;
		}
		else
		{
			if(newpass == "")
			{
				alert("Vui lòng điền mật khẩu mới!");
				flag = 0;
			}
			else
			{
				if(newpass.length < 6)
				{
					alert("Mật khẩu phải có it nhất 6 kí tự!");
					flag = 0;
				}
				else
				{
					if(repass == "")
					{
						alert("Vui lòng nhập lại mật khẩu mới!");
						flag = 0;
					}
					else
					{
						if(repass != newpass)
						{
							alert("Nhập lại mật khẩu không đúng!");
							flag = 0;
						}
						else
						{
							if(flag == 1){
								$.ajax({
									url: "<?=$_SESSION['projectName']?>/Ajax/changePassword",
									type:"POST",
									data:{
										oldpass:oldpass,
										newpass:newpass,
										repass:repass
									},
									success: function(data){
										if(data=="1"){
											alert("Đổi mật khẩu thành công!");
											setTimeout(function(){
												window.location = '<?=$_SESSION['projectName']?>/Account';
											}, 2000);
										}
										else
										{
											alert("Đổi mật khẩu thất bại!");
										}
									}
								})
							}
						}
					}
				}
			}
		}
	}
</script>