<?php
	class Home extends Controller{
		public $DepartModel;
		public $CategoryModel;
		public $ProductModel;
		public $KeywordModel;
		public $UserModel;
		function __construct()
		{
			$this->DepartModel = $this->model("DepartmentModel");
			$this->CategoryModel = $this->model("CategoryModel");
			$this->ProductModel = $this->model("ProductModel");
			$this->KeywordModel = $this->model("KeywordModel");
			$this->UserModel = $this->model("UserModel");
		}
		function Index(){
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$listProductNew = json_decode($this->ProductModel->getProductsByOrder("`CrDateTime`","DESC",0,5),true);
			$listProductTopSold = json_decode($this->ProductModel->getProductsByOrder("`Sold`","DESC",0,5),true);
			$listProductAllDepart = array();
			foreach($listDepart as $item)
			{
				$productsDepart = json_decode($this->ProductModel->getProductsByDepartId($item['DepartId'],0,-1,-1,"`CrDateTime`","DESC",0,5),true);
				
				$listProductAllDepart[$item['DepartName']] = $productsDepart;
			}
			$listKeyword=json_decode($this->KeywordModel->getKeywords("`TimesSearch`","DESC"),true);

			$this->view("layout1",array (
				"page" => "home",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listProductNew" => $listProductNew,
				"listProductTopSold" => $listProductTopSold,
				"listProductAllDepart" => $listProductAllDepart,
				"listKeyword" => $listKeyword
			));
		}
		
		function Register()
		{
			if(isset($_POST['register']))
			{
				$name = Trim($_POST['name']);
				$phone = $_POST['mobile'];
				$email = Trim($_POST['email']);
				$pass = $_POST['pass'];
				$userid = $this->UserModel->insertUser($email,$name,$phone,$pass);

				if($userid!=0)
				{
					$_SESSION['UserId'] = $userid;
					$_SESSION['UserName'] = $name;

					echo "<script>
						location.reload(true);
						</script>";
				}
				else
				{

				}
			}
		}
		
		function sendPassword()
		{
			if(isset($_POST['email']))
			{
				$User = json_decode($this->UserModel->getUserByEmail($_POST['email']),true);
				$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
				// Output: 54esmdr0qf
				$passnew = substr(str_shuffle($permitted_chars), 0, 10);
				$pass = password_hash($passnew,PASSWORD_DEFAULT);
				$kq = $this->UserModel->updatePassword($User['UserId'],$pass);
				if($kq > 0)
				{
					$this->mailer("dodangkhoagtvt@gmail.com",$_POST['email'],"Tạo mới password!","Mật khẩu mới của bạn là:".$passnew);
					echo "<script>
						alert('Gửi Password thành công!');
						setTimeout(function(){
							window.location = '".$_SESSION['projectName']."/Home';
						}, 2000);
					</script>";
				}
				else
				{
					echo "<script>
						alert('Gửi Password thất bại!');
					</script>";
				}
			}
		}
	}
?>