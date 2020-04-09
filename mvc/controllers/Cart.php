<?php
	class Cart extends Controller{
		public $DepartModel;
		public $CategoryModel;
		public $ProductModel;
		public $LocationModel;
		function __construct()
		{
			$this->DepartModel = $this->model("DepartmentModel");
			$this->CategoryModel = $this->model("CategoryModel");
			$this->ProductModel = $this->model("ProductModel");
			$this->LocationModel = $this->model("LocationModel");
		}
		function Index(){
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$listCity = json_decode($this->LocationModel->getAllCity("`CityName`","ASC"),true);
			
			$this->view("layout1",array (
				"page" => "checkout",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listCity" => $listCity
			));
		}
		
	}
?>