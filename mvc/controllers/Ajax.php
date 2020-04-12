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
				$userid = $this->UserModel->insertUser($email,$name,$phone,$pass);
				
				if($userid!=0)
				{
					$_SESSION['UserId'] = $userid;
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
				$price = $_POST['total'];
				$pricePay = $_POST['totalPay'];
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
				$shipFee = $_POST['shipFee'];
				$valueVoucher = $_POST['valueVoucher'];

				$now = date("Y-m-d H:i:s");
            	$code = date("YmdHis");
				$sql = "INSERT INTO `nl_orders`(`OrderId`, `OrderCode`, `Price`, `PointUsed`, `PricePay`, `UserId`, `FullName`, `Email`, `PhoneNumber1`, `PhoneNumber2`, `WardId`, `Address`, `TransportId`, `NoteTypeId`, `Note`, `CallSupport`, `PaymentId`, `StatusId`, `CrDateTime`, `Sale`, `ShipFee`, `ShipDateTime`) 
                VALUES (NULL,'$code',$price,0,$pricePay,$userId,N'$name','$email','$phonenumber1','$phonenumber2',$wardId,N'$address',$transpotId,0,N'$note',$support,$payment,1,'$now',$shipFee,$valueVoucher,NULL)";
				
				$orderId = $this->OrderModel->addOrder($price,$pricePay,$userId,$name,$email,$phonenumber1,$phonenumber2,$wardId,$address,$transpotId,$note,$support,$payment,$shipFee,$valueVoucher);
				
				$cart = json_decode($_POST['cart'],true);
				foreach($cart as $item)
				{
					$this->OrderModel->addOrderDetail($orderId,$item['id'],$item['qty'],$item['price']);
				}

				if(isset($_POST['codeVoucher']) && $_POST['codeVoucher']!="")
				{
					$voucher = json_decode($this->VoucherModel->checkVoucher($_POST['codeVoucher']),true);
					$this->VoucherModel->addOrderVoucher($orderId,$voucher['VoucherId']);
				}
				if($orderId != 0)
					echo 1;
				else 
					echo 0;
			}
			else
			{
			echo 0;
			}
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