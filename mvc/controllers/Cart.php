<?php
	class Cart extends Controller{
		public $DepartModel;
		public $CategoryModel;
		public $LocationModel;
		public $OrderModel;
		public $UserModel;
		function __construct()
		{
			$this->DepartModel = $this->model("DepartmentModel");
			$this->CategoryModel = $this->model("CategoryModel");
			$this->LocationModel = $this->model("LocationModel");
			$this->OrderModel = $this->model("OrderModel");
			$this->UserModel = $this->model("UserModel");
		}
		function Index(){
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$listCity = json_decode($this->LocationModel->getAllCity("`CityName`","ASC"),true);
			$listPayment = json_decode($this->OrderModel->loadDsPayment("`PaymentId`","ASC"),true);
			$listTransport = json_decode($this->OrderModel->loadDsTransport("`TransportId`","ASC"),true);
			$User="";
			if(isset($_SESSION['UserId']))
			{
				$User = json_decode($this->UserModel->getUserById($_SESSION['UserId']),true);
			}

			$this->view("layout1",array (
				"page" => "checkout",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listCity" => $listCity,
				"listPayment" => $listPayment,
				"listTransport" => $listTransport,
				"User" => $User
			));
		}
		function paymentBanking()
		{
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
            $listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$listKeyword=json_decode($this->KeywordModel->getKeywords("`TimesSearch`","DESC"),true);

			$this->view("layout1",array (
				"page" => "payment_banking",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listKeyword" => $listKeyword,
			));
		}
	}
?>