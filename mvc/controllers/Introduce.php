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
		
	}
?>