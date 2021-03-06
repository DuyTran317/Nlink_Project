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
			if(!isset($_SESSION['UserId']))
			{
				header("location:".$_SESSION['projectName']."/Home");
			}
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