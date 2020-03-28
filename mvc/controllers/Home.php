<?php
	class Home extends Controller{
		public $DepartModel;
		public $Category;
		public $ProductModel;
		public $KeywordModel;
		function __construct()
		{
			$this->DepartModel = $this->model("DepartmentModel");
			$this->Category = $this->model("CategoryModel");
			$this->ProductModel = $this->model("ProductModel");
			$this->KeywordModel = $this->model("KeywordModel");
		}
		function Index(){
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->Category->getCategories("`Order`,`DepartId`","ASC"),true);
			$listProductNew = json_decode($this->ProductModel->getProductsByOrder("`CrDateTime`","DESC",0,5),true);
			$listProductTopSold = json_decode($this->ProductModel->getProductsByOrder("`Sold`","DESC",0,5),true);
			$listProductAllDepart = array();
			foreach($listDepart as $item)
			{
				$productsDepart = json_decode($this->ProductModel->getProductsByDepartId($item['DepartId'],"`CrDateTime`","DESC",0,5),true);
				$listProductAllDepart[$item['DepartName']] = $productsDepart;
			}
			$listKeyword=json_decode($this->KeywordModel->getKeywords("`TimesSearch`","DESC"),true);

			$this->view("layout1",array (
				"page" => "home",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listProductNew" => $listProductNew,
				"listProductTopSold" => $listProductTopSold,
				"listProductAllDepart" => $listProductAllDepart,
				"listKeyword" => $listKeyword
			));
		}
		
	}
?>