<?php
	class Home extends Controller{
		public $DepartModel;
		public $Category;
		public $ProductModel;
		function __construct()
		{
			$this->DepartModel = $this->model("DepartmentModel");
			$this->Category = $this->model("CategoryModel");
			$this->ProductModel = $this->model("ProductModel");
		}
		function Index(){
			$listDepart = json_decode($this->DepartModel->getAllDepartment(),true);
			$listCate = json_decode($this->Category->getAllCategory(),true);
			$listProductNew = json_decode($this->ProductModel->getProductsByOrder("CrDateTime","DESC",0,5),true);
			$listProductTopSold = json_decode($this->ProductModel->getProductsByOrder("Sold","DESC",0,5),true);
			
			$this->view("layout1",array (
			"page" => "home",
			"listDepart" => $listDepart,
			"listCate" => $listCate,
			"listProductNew" => $listProductNew,
			"listProductTopSold" => $listProductTopSold
			));
		}
		
	}
?>