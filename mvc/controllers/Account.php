<?php
	class Account extends Controller{
		public $UserModel;
        public $DepartModel;
        public $CategoryModel;
		public $KeywordModel;
		public $LocationModel;
		public $OrderModel;
		function __construct()
		{
			$this->UserModel = $this->model("UserModel");
            $this->DepartModel = $this->model("DepartmentModel");
            $this->CategoryModel = $this->model("CategoryModel");
			$this->KeywordModel = $this->model("KeywordModel");
			$this->LocationModel = $this->model("LocationModel");
			$this->OrderModel = $this->model("OrderModel");
		}
		function Index(){
			$userId = $_SESSION['UserId'];$noti="";
			if(isset($_POST['submitUpdate']))
			{
				$name = $_POST['name'];
				$phone = $_POST['phonenumber'];
				$birthday = $_POST['birthday'];
				$gender = $_POST['gender'];
				$address = $_POST['address'];
				$wardId = $_POST['ward'];
				$dictrictId = $_POST['dictrict'];
				$cityId = $_POST['city'];

				$kq = $this->UserModel->updateUser($userId,$name,$gender,$phone,$birthday,$cityId,$dictrictId,$wardId,$address);

				if($kq > 0)
				{
					$noti = "Cập Nhật Tài Khoản Thành Công!";
				}
				else
				{
					$noti = "Cập Nhật Tài Khoản Thất Bại!";
				}
			}

			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
            $listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
            $listKeyword=json_decode($this->KeywordModel->getKeywords("`TimesSearch`","DESC"),true);
			$User = json_decode($this->UserModel->getUserById($userId),true);
			$UserWard = json_decode($this->LocationModel->getWardById($User['WardId']),true);
			$UserDictrict = json_decode($this->LocationModel->getDictrictById($User['DictrictId']),true);
			$UserCity = json_decode($this->LocationModel->getCityById($User['CityId']),true);
			
			
            $this->view("layout1",array (
				"page" => "account_info",
				"pagechild" => "info",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listKeyword" => $listKeyword,
				"User" => $User,
				"noti" => $noti,
				"City" => $UserCity,
				"Dictrict" => $UserDictrict,
				"Ward" => $UserWard
			));
		}
		function update()
		{
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
            $listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
            $listKeyword=json_decode($this->KeywordModel->getKeywords("`TimesSearch`","DESC"),true);
			$userId = $_SESSION['UserId'];
			$User = json_decode($this->UserModel->getUserById($userId),true);
			$listGender = json_decode($this->UserModel->getAllGender(),true);
			$listCity = json_decode($this->LocationModel->getAllCity("`CityName`","ASC"),true);
			$listDictrict = json_decode($this->LocationModel->getDictrictsOfCityId($User['CityId'],'`DictrictName`','ASC'),true);
			$listWard = json_decode($this->LocationModel->getWardsOfDictrictId($User['DictrictId'],'`WardName`','ASC'),true);
            $this->view("layout1",array (
				"page" => "account_info",
				"pagechild" => "update",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listKeyword" => $listKeyword,
				"User" => $User,
				"listGender" => $listGender,
				"listCity" => $listCity,
				"listDictrict" => $listDictrict,
				"listWard"=>$listWard,
			));
		}
		function dsOrder()
		{
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
            $listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$listKeyword=json_decode($this->KeywordModel->getKeywords("`TimesSearch`","DESC"),true);

			$this->view("layout1",array (
				"page" => "account_info",
				"pagechild" => "dsorder",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listKeyword" => $listKeyword,
			));
		}
		function logout(){
			unset($_SESSION['UserName']);
			unset($_SESSION['UserId']);

			header('location: '.$_SESSION["projectName"].'/Home');
		}
		function OrderDetail($OrderCode){
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
            $listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$listKeyword=json_decode($this->KeywordModel->getKeywords("`TimesSearch`","DESC"),true);
			$Order = json_decode($this->OrderModel->getOrderByCode($OrderCode),true);
			$listOrderDetail = json_decode($this->OrderModel->getOrderDetailsByOrderId($Order['OrderId'],"a.`OrderDetailId`","ASC"),true);
			
			$this->view("layout1",array (
				"page" => "order_detail",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listKeyword" => $listKeyword,
				"Order" => $Order,
				"listOrderDetail"=>$listOrderDetail
			));
		}
		function ForgotPassword()
		{
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
            $listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$listKeyword=json_decode($this->KeywordModel->getKeywords("`TimesSearch`","DESC"),true);

			$this->view("layout1",array (
				"page" => "password_forgot_change",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listKeyword" => $listKeyword
			));
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
		function ChangePassword()
		{
			if(isset($_SESSION['UserId']))
			{
				$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
				$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
				$listKeyword=json_decode($this->KeywordModel->getKeywords("`TimesSearch`","DESC"),true);

				$this->view("layout1",array (
					"page" => "account_info",
					"pagechild" => "password_change",
					"listDepart" => $listDepart,
					"listCate" => $listCate,
					"listKeyword" => $listKeyword
				));
			}
		}
		
	}
?>