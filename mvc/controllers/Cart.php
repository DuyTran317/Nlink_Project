<?php
	class Cart extends Controller{
		public $DepartModel;
		public $CategoryModel;
		public $ProductModel;
		function __construct()
		{
			$this->DepartModel = $this->model("DepartmentModel");
			$this->CategoryModel = $this->model("CategoryModel");
			$this->ProductModel = $this->model("ProductModel");
		}
		function Index(){
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			
			$this->view("layout1",array (
				"page" => "order_detail",
				"listDepart" => $listDepart,
				"listCate" => $listCate
			));
		}
		
	}
?>