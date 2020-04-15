<?php
	class Product extends Controller{
		public $DepartModel;
		public $CategoryModel;
		public $ProductModel;
		public $UserModel;
		function __construct()
		{
			$this->DepartModel = $this->model("DepartmentModel");
			$this->CategoryModel = $this->model("CategoryModel");
			$this->ProductModel = $this->model("ProductModel");
			$this->UserModel = $this->model("UserModel");
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
			$listProductNew = json_decode($this->ProductModel->getProductsByOrder("`CrDateTime`","DESC",0,5),true);
			$listCateOfSearch = json_decode($this->ProductModel->getCategoriesOfSearch($key,$brand,$priceMin,$priceMax,"b.`Order`","ASC"),true);
			$listProduct = json_decode($this->ProductModel->getProductsByKeyWord($key,$brand,$priceMin,$priceMax,"CrDateTime","DESC",$begin,$display),true);
			$listBrands = json_decode($this->ProductModel->getBrandsProductByKeyWord($key,$brand,$priceMin,$priceMax,"b.`BrandName`","ASC"),true);
			$action = "Search";
			
			$this->view("layout1",array(
				"page" => "product",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listProductNew" => $listProductNew,
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
		function Detail($url="",$email="")
		{
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
			$Product = json_decode($this->ProductModel->getProductByUrl($url),true);
			$listProductSame = json_decode($this->ProductModel->getProductsByCateId($Product['CategoryId'],0,-1,-1,"a.`Sold`","DESC",0,5),true);
			$Img = json_decode($this->ProductModel->getProductImgs($Product['ProductId']),true);
			// $listQA = json_decode($this->ProductModel->getQuestionAnswersByProductId($Product['ProductId'],"a.`CrDateTime`","DESC"),true);
			
			$Star =  $this->ProductModel->getTotalRateByProductId($Product['ProductId']);
			$User = "";
			if(isset($_SESSION['UserId']))
			{
				$User = json_decode($this->UserModel->getUserById($_SESSION['UserId']),true);
			}
			$Email = '';
			if($User!='')
			{
				$Email = $User['Email'];
			}
			else if($email !='')
			{
				$Email = $email;
			}
			$this->view("layout1",array(
				"page" => "product_detail",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"Product"=>$Product,
				"Img" => $Img,
				// "listQA" => $listQA,
				"Star" => $Star,
				"User" => $User,
				"Email" => $Email,
				"listProductSame" => $listProductSame
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
			$listProductNew = json_decode($this->ProductModel->getProductsByOrder("`CrDateTime`","DESC",0,5),true);
			$listCateOfDepart = json_decode($this->DepartModel->getCategoriesOfDepartment($depart['DepartId'],"`Order`","ASC"),true);

			$listProduct = json_decode($this->ProductModel->getProductsByDepartId($depart['DepartId'],$brand,$priceMin,$priceMax,"`CrDateTime`","DESC",$begin,$display),true);
			$listBrands = json_decode($this->DepartModel->getBrandsDepartmentById($depart['DepartId'],"c.`BrandName`","ASC"),true);
			$action = "Department";
			

			$this->view("layout1",array(
				"page" => "product",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listProductNew" => $listProductNew,
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
			$listProductNew = json_decode($this->ProductModel->getProductsByOrder("`CrDateTime`","DESC",0,5),true);
			$listProduct = json_decode($this->ProductModel->getProductsByCateId($cate['CateId'],$brand,$priceMin,$priceMax,"`CrDateTime`","DESC",$begin,$display),true);
			$listBrands = json_decode($this->CategoryModel->getBrandsCategoryById($cate['CateId'],"c.`BrandName`","ASC"),true);
			$action = "Category";
			

			$this->view("layout1",array(
				"page" => "product",
				"listDepart" => $listDepart,
				"listCate" => $listCate,
				"listProductNew" => $listProductNew,
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