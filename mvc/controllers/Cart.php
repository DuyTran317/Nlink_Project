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
			$cart = array();
			$listOrderDetail = array();
			if(isset($_COOKIE['cart_nlink']))
			{
				$cart = json_decode($_COOKIE['cart_nlink'],true);
			}
			echo $_COOKIE['cart_nlink'];
			while(current($cart))
			{
				$pro = json_decode($this->ProductModel->getProductById(key($cart)),true);
				$listOrderDetail[] = $pro; 
				next($cart);
			}
			

			$this->view("layout1",array (
				"page" => "order_detail",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listOrderDetail" => $listOrderDetail
			));
		}
		
	}
?>