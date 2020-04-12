<?php
	class Account extends Controller{
		public $UserModel;
        public $DepartModel;
        public $CategoryModel;
        public $KeywordModel;
		function __construct()
		{
			$this->UserModel = $this->model("UserModel");
            $this->DepartModel = $this->model("DepartmentModel");
            $this->CategoryModel = $this->model("CategoryModel");
            $this->KeywordModel = $this->model("KeywordModel");
		}
		function Index(){
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
            $listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
            $listKeyword=json_decode($this->KeywordModel->getKeywords("`TimesSearch`","DESC"),true);
            
            $this->view("layout1",array (
				"page" => "account_info",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listKeyword" => $listKeyword
			));
		}
		
	}
?>