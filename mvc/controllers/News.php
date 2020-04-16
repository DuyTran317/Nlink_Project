<?php
	class News extends Controller{
		public $DepartModel;
        public $CategoryModel;
		public $KeywordModel;
		public $NewsModel;
		function __construct()
		{
			$this->DepartModel = $this->model("DepartmentModel");
            $this->CategoryModel = $this->model("CategoryModel");
			$this->KeywordModel = $this->model("KeywordModel");
			$this->NewsModel = $this->model("NewsModel");
		}
		function Index($page = 1){
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$listKeyword=json_decode($this->KeywordModel->getKeywords("`TimesSearch`","DESC"),true);
			$listNewsTopView = json_decode($this->NewsModel->getNews("`View`","DESC",0,5),true);
			$display=5; $begin=($page-1)*$display;
			$listNews = json_decode($this->NewsModel->getNews("`CrDateTime`","DESC",$begin,$display),true);
			$sumNews = json_decode($this->NewsModel->getSumNews(),true);
			$sumPageNews = ceil($sumNews/$display);

			$this->view("layout1",array (
				"page" => "new",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listKeyword" => $listKeyword,
				"listNewsTopView" => $listNewsTopView,
				"listNews" => $listNews,
				"sumNews" => $sumNews,
				"page" => $page,
				"sumPageNews" => $sumPageNews
			));
		}
		function Detail($url="")
		{
			if($url!="")
			{
				$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
				$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
				$listKeyword=json_decode($this->KeywordModel->getKeywords("`TimesSearch`","DESC"),true);
				$News = json_decode($this->NewsModel->getDetailNewsByUrl($url),true);
				$listNewsTopView = json_decode($this->NewsModel->getNews("`View`","DESC",0,5),true);
				$listNewsNew = json_decode($this->NewsModel->getNews("`CrDateTime`","DESC",0,3),true);
				$this->NewsModel->updateViewNews($News['NewId'],$News['View']+1);

				$this->view("layout1",array (
					"page" => "new_detail",
					"listDepart" => $listDepart,
					"listCate" => $listCate,
					"listKeyword" => $listKeyword,
					"listNewsTopView" => $listNewsTopView,
					"listNewsNew" => $listNewsNew,
					"News" => $News
				));
			}
		}
	}
?>