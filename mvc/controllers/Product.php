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
			
			$brand = 0; $priceMin = -1; $priceMax = -1;$pagenumber = 1;$key="";
			if(isset($_POST['brand']) )
			{
				$brand = $_POST['brand'];
			}
			if(isset($_POST['priceMin']))
			{
				$priceMin = $_POST['priceMin'];
			}
			if(isset($_POST['priceMax']))
			{
				$priceMax = $_POST['priceMax'];
			}
			if(isset($_POST['pagenumber']))
			{
				$pagenumber = $_POST['pagenumber'];
			}
			if(isset($_POST['key']))
			{
			$key = $_POST['key'];
			}
			$display = 12;$begin = ($pagenumber-1)*$display;
			$sumsp = json_decode($this->ProductModel->getSumProductsOfSearch($key,$brand,$priceMin,$priceMax),false);
			$sumpage = ceil($sumsp/$display);
			
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$listCateOfSearch = json_decode($this->ProductModel->getCategoriesOfSearch($key,$brand,$priceMin,$priceMax,"b.`Order`","ASC"),true);
			$listProduct = json_decode($this->ProductModel->getProductsByKeyWord($key,$brand,$priceMin,$priceMax,"CrDateTime","DESC"),true);
			$listBrands = json_decode($this->ProductModel->getBrandsProductByKeyWord($key,$brand,$priceMin,$priceMax,"b.`BrandName`","ASC"),true);
			$action = "Search";
			
			$this->view("layout1",array(
				"page" => "product",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listCateOfDepart" => $listCateOfSearch,
				"listProduct"=>$listProduct,
				"listBrands" => $listBrands,
				"brand" => $brand,
				"priceMin" => $priceMin,
				"priceMax" => $priceMax,
				"action" => $action,
				"pagenumber" => $pagenumber,
				"sumpage" => $sumpage
			));
			
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
		function Department($url = "")
		{
			$brand = 0; $priceMin = -1; $priceMax = -1;$pagenumber = 1;
			if(isset($_POST['brand']) )
			{
				$brand = $_POST['brand'];
			}
			if(isset($_POST['priceMin']))
			{
				$priceMin = $_POST['priceMin'];
			}
			if(isset($_POST['priceMax']))
			{
				$priceMax = $_POST['priceMax'];
			}
			if(isset($_POST['pagenumber']))
			{
				$pagenumber = $_POST['pagenumber'];
			}
			$depart = json_decode($this->DepartModel->getDepartmentByUrl($url),true);
			$display = 12;$begin = ($pagenumber-1)*$display;
			$sumsp = json_decode($this->ProductModel->getSumProductsOfDepart($depart['DepartId'],$brand,$priceMin,$priceMax),false);
			
			$sumpage = ceil($sumsp/$display);
			
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$listCateOfDepart = json_decode($this->DepartModel->getCategoriesOfDepartment($depart['DepartId'],"`Order`","ASC"),true);
			$listProduct = json_decode($this->ProductModel->getProductsByDepartId($depart['DepartId'],$brand,$priceMin,$priceMax,"`CrDateTime`","DESC",$begin,$display),true);
			$listBrands = json_decode($this->DepartModel->getBrandsDepartmentById($depart['DepartId'],"c.`BrandName`","ASC"),true);
			$action = "Department";
			

			$this->view("layout1",array(
				"page" => "product",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listCateOfDepart" => $listCateOfDepart,
				"listProduct" => $listProduct,
				"listBrands" => $listBrands,
				"brand" => $brand,
				"priceMin" => $priceMin,
				"priceMax" => $priceMax,
				"action" => $action,
				"pagenumber" => $pagenumber,
				"sumpage" => $sumpage
			));
		}
		function Category($url = "")
		{
			$brand = 0; $priceMin = -1; $priceMax = -1;$pagenumber = 1;
			if(isset($_POST['brand']) )
			{
				$brand = $_POST['brand'];
			}
			if(isset($_POST['priceMin']))
			{
				$priceMin = $_POST['priceMin'];
			}
			if(isset($_POST['priceMax']))
			{
				$priceMax = $_POST['priceMax'];
			}
			if(isset($_POST['pagenumber']))
			{
				$pagenumber = $_POST['pagenumber'];
			}
			$cate = json_decode($this->CategoryModel->getCategoryByUrl($url),true);
			$display = 12;$begin = ($pagenumber-1)*$display;
			$sumsp = json_decode($this->ProductModel->getSumProductsOfCate($cate['CateId'],$brand,$priceMin,$priceMax),false);
			
			$sumpage = ceil($sumsp/$display);
			
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$listProduct = json_decode($this->ProductModel->getProductsByCateId($cate['CateId'],$brand,$priceMin,$priceMax,"`CrDateTime`","DESC",$begin,$display),true);
			$listBrands = json_decode($this->CategoryModel->getBrandsCategoryById($cate['CateId'],"c.`BrandName`","ASC"),true);
			$action = "Category";
			

			$this->view("layout1",array(
				"page" => "product",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listProduct" => $listProduct,
				"listBrands" => $listBrands,
				"brand" => $brand,
				"priceMin" => $priceMin,
				"priceMax" => $priceMax,
				"action" => $action,
				"pagenumber" => $pagenumber,
				"sumpage" => $sumpage
			));
		}
	}
?>