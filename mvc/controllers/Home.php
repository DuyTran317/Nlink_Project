<?php
	class Home extends Controller{
		public $DepartModel;
		public $CategoryModel;
		public $ProductModel;
		public $KeywordModel;
		public $UserModel;
		function __construct()
		{
			$this->DepartModel = $this->model("DepartmentModel");
			$this->CategoryModel = $this->model("CategoryModel");
			$this->ProductModel = $this->model("ProductModel");
			$this->KeywordModel = $this->model("KeywordModel");
			$this->UserModel = $this->model("UserModel");
		}
		function Index(){
			$listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
			$listCate = json_decode($this->CategoryModel->getCategories("`Order`,`DepartId`","ASC"),true);
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
		
		function Register()
		{
			if(isset($_POST['register']))
			{
				$name = Trim($_POST['name']);
				$phone = $_POST['mobile'];
				$email = Trim($_POST['email']);
				$pass = $_POST['pass'];
				$userid = $this->UserModel->insertUser($email,$name,$phone,$pass);

				if($userid!=0)
				{
					$_SESSION['UserId'] = $userid;
					$_SESSION['UserName'] = $name;

					echo "<script>
						location.reload(true);
						</script>";
				}
				else
				{

				}
			}
		}
	}
?>