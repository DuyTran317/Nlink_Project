<?php
	class Home extends Controller{
		public $DepartModel;
		public $Category;
		function __construct()
		{
			$this->DepartModel = $this->model("DepartmentModel");
			$this->Category = $this->model("CategoryModel");
		}
		function Index(){
			$this->view("layout1",array (
			"page" => "index",
			"listDepart" => json_decode($this->DepartModel->getAllDepartment(),true),
			"listCate" => json_decode($this->Category->getAllCategory(),true)
			));
		}
		
	}
?>