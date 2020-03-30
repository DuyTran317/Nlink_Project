<?php
	class Product extends Controller{
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
			
		}
		function Search()
		{
			if(isset($_POST['key']))
			{
				$key = $_POST['key'];
				$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
				$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);

				$listProduct = json_decode($this->ProductModel->getProductsByKeyWord($key,"CrDateTime","DESC"),true);
				$this->view("layout1",array(
					"page" => "product",
					"listDepart" => $listDepart,
					"listCate" => $listCate,
					"listProduct"=>$listProduct
				));
			}
		}
		function Detail($url="")
		{
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$Product = json_decode($this->ProductModel->getProductByUrl($url),true);
			$Img = json_decode($this->ProductModel->getProductImgs($Product['ProductId']),true);
			$listQA = json_decode($this->ProductModel->getQuestionAnswersByProductId($Product['ProductId'],"a.`CrDateTime`","DESC"),true);
			$listComment = json_decode($this->ProductModel->getCommentsByProductId($Product['ProductId'],"CrDateTime","DESC"),true);
			$Star = current($listComment)['sao'];

			$this->view("layout1",array(
				"page" => "product_detail",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"Product"=>$Product,
				"Img" => $Img,
				"listQA" => $listQA,
				"Star" => $Star
			));
		}
	}
?>