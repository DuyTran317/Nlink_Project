<?php
	class Ajax extends Controller{
		public $ProductModel;
		public $UserModel;
		public $VoucherModel;
		public $LocationModel;
		public $OrderModel;
		function __construct()
		{
			$this->ProductModel = $this->model("ProductModel");
			$this->UserModel = $this->model("UserModel");
			$this->VoucherModel = $this->model("VoucherModel");
			$this->LocationModel = $this->model("LocationModel");
			$this->OrderModel = $this->model("OrderModel");
		}
		function LoadCommentProduct()
		{
			if(isset($_POST['productId']))
			{
				$productId = $_POST['productId'];
				$begin = $_POST['begin'];
				$numComment = $_POST['numComment'];
				echo $this->ProductModel->getCommentsByProductId($productId,"`CrDateTime`","DESC",$begin,$numComment);
				
			}
			else
			{
				echo "";
			}
		}
		function LoadAnswersComment()
		{
			if(isset($_POST['commentId']))
			{
				$commentId = $_POST['commentId'];
				$begin = $_POST['begin'];
				$numAnswer = $_POST['numComment'];
				echo $this->ProductModel->getAnswersCommentByCommentId($commentId,"`CrDateTime`","DESC",$begin,$numAnswer);
				
			}
			else
			{
				echo "";
			}
		}
		function addComment(){
			if(isset($_POST['productId']))
			{
				$productId = $_POST['productId'];
				$content = $_POST['content'];
				$name = $_POST['name'];
				$phone = $_POST['phone'];
				$email = $_POST['email'];
				$rate = isset($_POST['rate'])?$_POST['rate']:'NULL';
				$userId = $_POST['userId'] == 0 ? 'NULL' : $_POST['userId'];
				$parentId = isset($_POST['parentId'])?$_POST['parentId']:'NULL';

				echo $this->ProductModel->addComment($productId,$content,$name,$phone,$email,$rate,$userId,$parentId);
			}
			else
			{
				echo 0;
			}
		}
		function checkAllowRate()
		{
			if(isset($_POST['email']))
			{
				$email = $_POST['email'];
				$productId = $_POST['productId'];

				echo $this->ProductModel->checkAllowRateProduct($productId,$email);
			}
			else 
			{
				echo 0;
			}
		}
		function CheckIssetUser()
		{
			if(isset($_POST['email']))
			{
				$email = Trim($_POST['email']);
				if($email != "")
				{
					if(filter_var($email, FILTER_VALIDATE_EMAIL))
					{
						if(json_decode($this->UserModel->getUserByEmail($email),true)==null)
						{
							echo "1";
							//echo "<p style='color: red' >email đã được đăng ký!</p>";	
						}
						else
						{
							echo "-1";
							//echo "<p style='color: green' >có thể sử dụng email này!</p>";
						}
					}
					else
					{
						echo "-3";
					}
				}
				else{
					echo "-2";
				}
			}
		}
		function Register()
		{
			if(isset($_POST['email']))
			{
				$name = Trim($_POST['name']);
				$phone = $_POST['mobile'];
				$email = Trim($_POST['email']);
				$pass = password_hash($_POST['pass'],PASSWORD_DEFAULT); //sử dụng password_verify($passNgdungnhap,$passdaduochash) để xác thực
				$birthday = $_POST['birthday'];
				$cityId = $_POST['city'];
				$dictrictId = $_POST['dictrict'];
				$wardId = $_POST['ward'];
				$address = Trim($_POST['address']);
				$userId = $this->UserModel->insertUser($email,$name,$phone,$pass,$birthday,$cityId,$dictrictId,$wardId,$address);
				
				if($userId!=0)
				{
					$_SESSION['UserId'] = $userId;
					$_SESSION['UserName'] = $name;

					echo "1";
				}
				else
				{
					echo "0";
				}
			}
			else echo "0";
		}
		function Login()
		{
			if(isset($_POST['email']))
			{
				$email = $_POST['email'];
				$pass = $_POST['pass'];
				
				$user = json_decode($this->UserModel->getUserByEmail($email),true);
				if($user != null)
				{

					if(password_verify($pass,$user['Password']))
					{
						$_SESSION['UserId'] = $user['UserId'];
						$_SESSION['UserName'] = $user['FullName'];

						echo "1";
					}
					else 
					{
						echo "-1";
					}
				}
				else
				{
					echo "-2";
				}
			}
			else echo "0";
		}
		function checkVoucher()
		{
			if(isset($_POST['Code']))
			{
				$code = $_POST['Code'];
				$voucher = $this->VoucherModel->checkVoucher($code);
				if($voucher != null)
				{
					echo $voucher;
				}
				echo null;
			}
		}
		function loadCity()
		{
			echo $this->LocationModel->getAllCity("`CityName`","ASC");
		}
		function loadDictrict()
		{
			if(isset($_POST['id']))
			{
				$id = $_POST['id'];
				echo $this->LocationModel->getDictrictsOfCityId($id,"`DictrictId`","ASC");
			}
			else
			{
				echo "";
			}
		}
		function loadWard()
		{
			if(isset($_POST['id']))
			{
				$id = $_POST['id'];
				echo $this->LocationModel->getWardsOfDictrictId($id,"`WardId`","ASC");
			}
			else
			{
				echo "";
			}
		}
		function createOrder()
		{
			if(isset($_POST['cart'])){
				 $price = 0;
				$userId = isset($_SESSION['UserId']) ? $_SESSION['UserId'] : 0;
				$name = $_POST['name'];
				$email = $_POST['email'];
				$phonenumber1 = $_POST['phonenumber1'];
				$phonenumber2 = $_POST['phonenumber2'];
				$wardId = $_POST['phuong_xa'];
				$address = $_POST['address'];
				$transpotId = $_POST['transpot'];
				$note = $_POST['note'];
				$support = $_POST['support'];
				$payment = $_POST['payment'];
				$valueVoucher = 0;
				$haveusepoint = $_POST['haveusepoint'];
				$cart = json_decode($_POST['cart'],true);
				// tính tổng tiền hàng
				foreach($cart as $item)
				{
					$price += $item['price'] * $item['qty'];
				}
				$pricePay = $price;
				if(isset($_POST['codeVoucher']))
				{
					$voucher = json_decode($this->VoucherModel->checkVoucher($_POST['codeVoucher']),true);
					switch($voucher['TypeId'])
					{
						case '1':
							$valueVoucher = $voucher['Value'];
							$pricePay -= $valueVoucher;
							break;
						case '2':
							$valueVoucher = $price*$voucher['Value'];
							$pricePay -= $valueVoucher;
							break;
					}
				}
				$location = json_decode($this->LocationModel->getAllbyWardId($wardId),true);
				$shipFee = $location['FeeShip'];
				$pricePay += $shipFee;
				$timeShipMin = $location['TimeShipMin'];
				$timeShipMax = $location['TimeShipMax'];
				$point = 0;
				if($haveusepoint == 1)
				{
					$User = json_decode($this->UserModel->getUserById($_SESSION['UserId']),true);
					$pricePay -= $User['Point'] * 500;
					$point = $User['Point'];
					$this->UserModel->updatePointUser($User['UserId'],0);
				}
				
				$now = date("Y-m-d H:i:s");
            	$code = date("YmdHis");
				
				$orderId = $this->OrderModel->addOrder($price,$pricePay,$userId,$name,$email,$phonenumber1,$phonenumber2,$wardId,$address,$transpotId,$note,$support,$payment,$shipFee,$valueVoucher,$point,$timeShipMin,$timeShipMax);
				
				
				foreach($cart as $item)
				{
					$this->OrderModel->addOrderDetail($orderId,$item['id'],$item['qty'],$item['price']);
				}

				if(isset($_POST['codeVoucher']))
				{
					$voucher = json_decode($this->VoucherModel->checkVoucher($_POST['codeVoucher']),true);
					$this->VoucherModel->addOrderVoucher($orderId,$voucher['VoucherId']);
				}
				if($orderId != 0){
					$this->mailer("dodangkhoagtvt@gmail.com",$email,"Thông tin đặt hàng thành công","Nhấp vào <a href='".$this->domain.$_SESSION['projectName']."/Account/OrderDetail/".$code."'>đây</a> để xem thông tin đơn hàng");
					echo 1;
				}
				else
				{ 
					echo 0;
				}
			}
			else
			{
			echo 0;
			}
		}
		function loadDsOrderUser()
		{
			if(isset($_POST['userId']))
			{
				$userId = $_POST['userId'];
				$begin = $_POST['begin'];
				$numOrder = $_POST['numOrder'];

				echo $this->OrderModel->loadDsOrderOfUser($userId,"a.`CrDateTime`","DESC",$begin,$numOrder);
			}
			else
			{
				echo "";
			}
		}
		function getSumOrderUser()
		{
			if(isset($_POST['userId']))
			{
				$userId = $_POST['userId'];

				echo $this->OrderModel->getSumOrderOfUser($userId);
			}
			else
			{
				echo 0;
			}
		}
		function changePassword()
		{
			if(isset($_POST['oldpass']))
			{
				$oldpass = $_POST['oldpass'];
				$newpass = $_POST['newpass'];
				$repass = $_POST['repass'];

				$User = json_decode($this->UserModel->getUserById($_SESSION['UserId']),true);
				if(password_verify($oldpass,$User['Password'])){
					$this->UserModel->updatePassword($User['UserId'],password_hash($newpass,PASSWORD_DEFAULT));
					echo "1";
				}
				else
				{
					echo "0";
				}
			}
		}
		function CancelOrder(){
			if(isset($_POST['code']))
			{
				$kq = $this->OrderModel->CancelOrder($_POST['code']);

				if($kq){
					echo 1;
				}
				else
				{
					echo 0;
				}
			}
			else
			{echo 0;}
		}
		// function setCart()
		// {
		// 	if(isset($_POST['id']))
		// 	{
		// 		$id = $_POST['id'];
		// 		$qty = $_POST['qty'];

		// 		$cart = json_decode($_COOKIE['cart_nlink'],true);
		// 		if(!isset($cart[$id]))
		// 		{
		// 			$cart[$id]=$qty;
		// 		}
		// 		else
		// 		{
		// 			$cart[$id]+=$qty;
		// 		}
		// 		$_COOKIE['cart_nlink']=json_encode($cart);
		// 		echo $_COOKIE['cart_nlink'];
		// 		echo "1";
		// 	}
		// 	else
		// 	{
		// 		echo "0";
		// 	}
		// }
		// function deleteCart()
		// {
		// 	if(isset($_POST['id']))
		// 	{
		// 		$id = $_POST['id'];
		// 		if(isset($_COOKIE['cart_nlink']))
		// 		{
		// 			$cart = json_decode($_COOKIE['cart_nlink'],true);
		// 			unset($cart[$id]);
		// 			$_COOKIE['cart_nlink'] = json_encode($cart);
		// 			echo "1";
		// 		}
		// 		else echo "0";
		// 	}else echo "0";
		// }
	}
?>