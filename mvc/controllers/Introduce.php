<?php
	class Introduce extends Controller{
		public $DepartModel;
		public $Category;
		function __construct()
		{
			$this->DepartModel = $this->model("DepartmentModel");
			$this->Category = $this->model("CategoryModel");
		}
		function Index(){
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->Category->getCategories("`Order`,`DepartId`","ASC"),true);
			$this->view("layout1",array (
			"page" => "about",
			"listDepart" => json_decode($this->DepartModel->getAllDepartment(),true),
			"listCate" => json_decode($this->Category->getAllCategory(),true)
			));
		}
		
	}
?>