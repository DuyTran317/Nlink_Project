<?php
	class Product extends Controller{
		public $ProductModel;
		function __construct()
		{
			$this->ProductModel = $this->model("ProductModel");
		}
		function Index(){
			
		}
		function Search()
		{
			if(isset($_POST['key']))
			{
				$key = $_POST['key'];
				$listProduct = json_decode($this->ProductModel->getProductByKeyWord($key,"CrDateTime","DESC"),true);
				$this->view("layout1",array(
					"page" => "product",
					"listProduct"=>$listProduct
				));
			}
		}
	}
?>