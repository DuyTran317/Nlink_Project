<?php
	class Ajax extends Controller{
		public $ProductModel;
		public $UserModel;
		function __construct()
		{
			$this->ProductModel = $this->model("ProductModel");
			$this->UserModel = $this->model("UserModel");
		}
		function LoadCommentProduct()
		{
			$data = "";
			if(isset($_POST['productId']))
			{
				$productId = $_POST['productId'];
				$begin = $_POST['begin'];
				$numComment = $_POST['numComment'];
				$listComment = json_decode($this->ProductModel->getCommentsByProductId($productId,"CrDateTime","DESC",$begin,$numComment),true);
				
				foreach($listComment as $item)
				{
					$data .= '<div class="row">
								<div class="col-md-2" style="text-align: center">
									<i class="fa fa-user" aria-hidden="true" style="font-size: 42px"></i>
									<p style="color:black; margin-top: 5px">Nguyễn Văn Test</p>
									<p style="font-size: 12px; color: gray">20/03/2020 14:00</p>
								</div>
								<div class="col-md-10">
									<p>
										<i class="fa fa-star" aria-hidden="true" style="color: yellow"></i>
										<i class="fa fa-star" aria-hidden="true" style="color: yellow"></i>
										<i class="fa fa-star" aria-hidden="true" style="color: yellow"></i>
										<i class="fa fa-star" aria-hidden="true" style="color: yellow"></i>
										<i class="fa fa-star" aria-hidden="true" style="color: yellow"></i>
									</p>
									<span style="font-size: 15px">Qua tuổi 25 rồi nên mình cũng chú trọng và chăm chỉ chăm sóc da hơn, đặc biệt là vấn đề bổ sung collagen để da thực sự khỏe mạnh. Mình uống Collagen pure white được trong khoảng 1 tháng rồi. Vì dạng nước công dụng cũng nhanh hơn khi uống dạng viên, mình dùng được khoảng hơn 2 tuần thì cảm nhận được da mịn màng và căng khỏe hơn trước rất nhiều</span>
									<p id="rep_nhanxet" style="color:blue; font-size: 14px; cursor: pointer">Trả lời</p>
			
									<div id="info_nhanxet{$item["CommentId"]}" style="margin-top: 20px">
										<textarea class="form-control" placeholder="Nhận xét của bạn"></textarea>
										<input type="text" value="" placeholder="Họ tên" required class="form-control" style="max-width: 300px; margin-top: 10px" />
										<input type="number" value="" placeholder="Số điện thoại" class="form-control" required style="max-width: 300px; margin-top: 10px" />
										<input type="email" value="" placeholder="Email" class="form-control" required style="max-width: 300px; margin-top: 10px" />
			
										<button class="btn btn-danger" style="float: right; margin-top: 10px" id="cancel_info_nhanxet">Hủy</button>					
										<button class="btn btn-info" style="float: right; margin-top: 10px; margin-right: 10px">Thêm</button>					
										<div style="clear: right"></div>
									</div> 
								</div>
							</div>';
				}
			}
		}
		function LoadAnswersComment()
		{
			$data = "";
			if(isset($_POST['commentId']))
			{
				$commentId = $_POST['commentId'];
				$begin = $_POST['begin'];
				$numAnswer = $_POST['numAnswer'];
				$listAnswer = json_decode($this->ProductModel->getAnswersCommentByCommentId($commentId,"CrDateTime","DESC",$begin,$numAnswer),true);
				
				while($item = current($listAnswer))
				{
					$temp = '<div style="margin-top: 10px">
								<span style="font-weight: bold; margin-bottom: 5px">Nhi</span> - <span style="color:gray">21/03/2020 14:00</span><br/>
								<span style="font-size: 15px">Ok bạn nhé!</span>
							</div>';
					next($listAnswer);
					if(current($listAnswer) == FALSE)
					$data = '<div id="answerlast{$commentId}" style="margin-top: 10px">
								<span style="font-weight: bold; margin-bottom: 5px">Nhi</span> - <span style="color:gray">21/03/2020 14:00</span><br/>
								<span style="font-size: 15px">Ok bạn nhé!</span>
							</div>';
				}
			}
			return $data;
		}
		function CheckIssetUser()
		{
			if(isset($_POST['email']))
			{
				$email = Trim($_POST['email']);
				if($email != "")
				{
					if(filter_var($email, FILTER_VALIDATE_EMAIL))
					{
						if(json_decode($this->UserModel->getUserByEmail($email),true)==null)
						{
							echo "1";
							//echo "<p style='color: red' >email đã được đăng ký!</p>";	
						}
						else
						{
							echo "-1";
							//echo "<p style='color: green' >có thể sử dụng email này!</p>";
						}
					}
					else
					{
						echo "-3";
					}
				}
				else{
					echo "-2";
				}
			}
		}
		function Register()
		{
			if(isset($_POST['email']))
			{
				$name = Trim($_POST['name']);
				$phone = $_POST['mobile'];
				$email = Trim($_POST['email']);
				$pass = password_hash($_POST['pass'],PASSWORD_DEFAULT); //sử dụng password_verify($passNgdungnhap,$passdaduochash) để xác thực
				$userid = $this->UserModel->insertUser($email,$name,$phone,$pass);

				if($userid!=0)
				{
					$_SESSION['UserId'] = $userid;
					$_SESSION['UserName'] = $name;

					echo "1";
				}
				else
				{
					echo "0";
				}
			}
			else echo "0";
		}
	}
?>