<?php
	class Product extends Controller{
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
			
		}
		function Search()
		{
			if(isset($_POST['key']))
			{
				$key = $_POST['key'];
				$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
				$listCate = json_decode($this->Category->getCategories("`Order`,`DepartId`","ASC"),true);
				$listProduct = json_decode($this->ProductModel->getProductsByKeyWord($key,"CrDateTime","DESC"),true);
				$this->view("layout1",array(
					"page" => "product",
					"listDepart" => $listDepart,
					"listCate" => $listCate,
					"listProduct"=>$listProduct
				));
			}
		}
	}
?>