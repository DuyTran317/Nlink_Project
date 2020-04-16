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
		function Index($pageNews = 1){
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$listKeyword=json_decode($this->KeywordModel->getKeywords("`TimesSearch`","DESC"),true);
			$listNewsTopView = json_decode($this->NewsModel->getNews("`View`","DESC",0,5),true);
			$display=5; $begin=($pageNews-1)*$display;
			$listNews = json_decode($this->NewsModel->getNews("`CrDateTime`","DESC",$begin,$display),true);
			$sumNews = json_decode($this->NewsModel->getSumNews(),true);
			$sumPageNews = ceil($sumNews/$display);
			$listNewsHot = json_decode($this->NewsModel->getNewsHot("`CrDateTime`","DESC",0,3),true);

			$this->view("layout1",array (
				"page" => "new",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listKeyword" => $listKeyword,
				"listNewsTopView" => $listNewsTopView,
				"listNewsHot" => $listNewsHot,
				"listNews" => $listNews,
				"sumNews" => $sumNews,
				"pageNews" => $pageNews,
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