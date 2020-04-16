<?php
	class Introduce extends Controller{
		public $DepartModel;
		public $CategoryModel;
		function __construct()
		{
			$this->DepartModel = $this->model("DepartmentModel");
			$this->CategoryModel = $this->model("CategoryModel");
		}
		function Index(){
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$this->view("layout1",array (
			"page" => "introduce",
			"listDepart" => $listDepart,
			"listCate" => $listCate
			));
		}
		
		function Policy(){
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$this->view("layout1",array (
			"page" => "policy",
			"listDepart" => $listDepart,
			"listCate" => $listCate
			));
		}
		
		function Tutorial_Buying(){
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$this->view("layout1",array (
			"page" => "tutorial_buy_product",
			"listDepart" => $listDepart,
			"listCate" => $listCate
			));
		}
	}
?>