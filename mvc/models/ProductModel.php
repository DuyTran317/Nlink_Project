<?php
	class ProductModel extends DB{
		public function getProductsByKeyWord($key,$brand=0,$priceMin=-1,$priceMax=-1, $field, $sort, $position = -1, $display = -1, $fullactive = 0){
			$sql= "select * from `nl_products` where `ProductName` like('%$key%')";
			if($fullactive == 0){
				$sql.=" and `Active` = 1";
			}
			if($brand != "")
			{
				$sql.=" and `BrandId` = $brand";
			}
			if($priceMin != -1)
			{
				$sql .= " and `Price` >= $priceMin";
			}
			if($priceMax != -1)
			{
				$sql .= " and `Price` <= $priceMax";
			}
			$sql .= " order by $field $sort";
			if($position >= 0 && $display > 0)
			{
				$sql .= " limit $position,$display";	
			}
			$r = mysqli_query($this->con,$sql);
			$mang = array();
			while($rs = mysqli_fetch_assoc($r))
			{
				$mang[] = $rs;
			}
			return json_encode($mang);
		}
		function getCategoriesOfSearch($key,$brand=0,$priceMin=-1,$priceMax=-1,$field,$sort,$position = -1, $display = -1){
			$sql="select b.`CateName`,b.`url` from `nl_products` as a INNER JOIN `nl_categories` as b ON a.`CategoryId` = b.`CateId` where a.`Active` = 1 and a.`ProductName` like('%$key%')";
			if($brand != "")
			{
				$sql.=" and a.`BrandId` = $brand";
			}
			if($priceMin != -1)
			{
				$sql .= " and a.`Price` >= $priceMin";
			}
			if($priceMax != -1)
			{
				$sql .= " and a.`Price` <= $priceMax";
			}
			$sql .= " group by b.`CateName`,b.`url` order by $field $sort";
			if($position >= 0 && $display > 0)
			{
				$sql .= " limit $position,$display";	
			}
			$r = mysqli_query($this->con,$sql);
			$mang = array();
			while($rs = mysqli_fetch_assoc($r))
			{
				$mang[] = $rs;
			}
			return json_encode($mang);
		}
		public function getSumProductsOfSearch($key,$brand=0,$priceMin=-1,$priceMax=-1,$fullactive = 0)
		{
			$sql="select COUNT(`ProductId`) as `tongsp` from `nl_products` where `ProductName` like('%$key%')";
			
			if($fullactive == 0){
				$sql.=" and `Active` = 1";
			}
			if($brand != "")
			{
				$sql.=" and `BrandId` = $brand";
			}
			if($priceMin != -1)
			{
				$sql .= " and `Price` >= $priceMin";
			}
			if($priceMax != -1)
			{
				$sql .= " and `Price` <= $priceMax";
			}
			
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			return json_encode($rs['tongsp']);
		}
		function getBrandsProductByKeyWord($key,$brand=0,$priceMin=-1,$priceMax=-1,$field,$sort,$position = -1, $display = -1){
			$sql="select b.`BrandId`,b.`BrandName` from `nl_products` as a INNER JOIN `nl_brands` as b ON a.`BrandId` = b.`BrandId` where a.`Active` = 1 and a.`ProductName` like('%$key%')";
			if($brand != "")
			{
				$sql.=" and a.`BrandId` = $brand";
			}
			if($priceMin != -1)
			{
				$sql .= " and a.`Price` >= $priceMin";
			}
			if($priceMax != -1)
			{
				$sql .= " and a.`Price` <= $priceMax";
			}
			$sql .= " group by b.`BrandId`,b.`BrandName` order by $field $sort";
			if($position >= 0 && $display > 0)
			{
				$sql .= " limit $position,$display";	
			}
			$r = mysqli_query($this->con,$sql);
			$mang = array();
			while($rs = mysqli_fetch_assoc($r))
			{
				$mang[] = $rs;
			}
			return json_encode($mang);
		}
		public function getProductsByOrder($field,$sort,$position = -1, $display = -1, $fullactive = 0)
		{
			$sql="select * from `nl_products`";
			
			if($fullactive == 0){
				$sql.=" where `Active` = 1";
			}
			$sql.=" order by $field $sort";
			if($position >= 0 && $display > 0)
			{
				$sql .= " limit $position,$display";	
			}
			$r = mysqli_query($this->con,$sql);
			$mang = array();
			while($rs = mysqli_fetch_assoc($r))
			{
				$mang[] = $rs;
			}
			return json_encode($mang);
		}
		public function getSumProductsByOrder($fullactive = 0)
		{
			$sql="select COUNT(`ProductId`) as sum from `nl_products`";

			if($fullactive == 0){
				$sql.=" where `Active` = 1";
			}
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			
			return json_encode($rs['sum']);
		}
		public function getProductById($id)
		{
			$sql="select * from `nl_products` where `ProductId` = $id";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			
			return json_encode($rs);
		}
		public function getProductByUrl($url)
		{
			$sql="select * from `nl_products` where `url` = '$url'";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			
			return json_encode($rs);
		}
		public function getProductImgs($id, $position = -1, $display = -1)
		{
			$sql = "select * from `nl_productimg` where `ProductId` = $id";
			if($position >= 0 && $display > 0)
			{
				$sql .= " limit $position,$display";	
			}
			$r = mysqli_query($this->con,$sql);
			$mang = array();
			while($rs = mysqli_fetch_assoc($r))
			{
				$mang[] = $rs;
			}
			return json_encode($mang);
		}
		public function getQuestionAnswersByProductId($id,$field,$sort,$position = -1, $display = -1)
		{
			$sql = "select * from `nl_Questions` as a LEFT JOIN `nl_Answers` as b ON a.`QuestionId`=b.`QuestionId` where a.`ProductId`=$id GROUP BY a.`QuestionId` order by $field $sort";
			if($position >= 0 && $display > 0)
			{
				$sql .= " limit $position,$display";	
			}
			$r = mysqli_query($this->con,$sql);
			$mang = array();
			while($rs = mysqli_fetch_assoc($r))
			{
				$mang[] = $rs;
			}
			return json_encode($mang);
		}
		public function getCommentsByProductId($id,$field,$sort,$position = -1, $display = -1)
		{
			$sql = "SELECT * FROM `nl_comments` WHERE `ProductId`=$id and `ParentId` is NULL order by $field $sort";
			if($position >= 0 && $display > 0)
			{
				$sql .= " limit $position,$display";	
			}
			$r = mysqli_query($this->con,$sql);
			$mang = array();
			while($rs = mysqli_fetch_assoc($r))
			{
				$mang[] = $rs;
			}
			return json_encode($mang);
		}
		public function getTotalRateByProductId($id){
			$sql = "SELECT SUM(StarNumber)/COUNT(`CommentId`) as sao FROM `nl_comments` WHERE `ProductId`=$id and `ParentId` is NULL and `StarNumber` is not NULL";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			return $rs['sao'];
		}
		public function getAnswersCommentByCommentId($id,$field,$sort,$position = -1, $display = -1)
		{
			$sql = "SELECT * FROM `nl_comments` WHERE `ParentId`=$id order by $field $sort";
			if($position >= 0 && $display > 0)
			{
				$sql .= " limit $position,$display";	
			}
			$r = mysqli_query($this->con,$sql);
			$mang = array();
			while($rs = mysqli_fetch_assoc($r))
			{
				$mang[] = $rs;
			}
			return json_encode($mang);
		}
		public function addComment($productId,$content,$name,$phone,$email,$rate,$userId,$parentId){
			$now = date("Y-m-d H:i:s");
			$sql = "INSERT INTO `nl_comments`(`CommentId`, `ProductId`, `Content`, `Name`, `PhoneNumber`, `Email`, `Img`, `Like`, `StarNumber`, `CrDateTime`, `UserId`, `AdminId`, `ParentId`) VALUES (NULL,$productId,N'$content',N'$name','$phone','$email','',0,$rate,'$now',$userId,NULL,$parentId)";
			if(mysqli_query($this->con,$sql))
				return mysqli_insert_id($this->con);
			else
				return 0;
		}
		public function getProductsByCateId($id,$brand=0,$priceMin=-1,$priceMax=-1,$field,$sort,$position = -1, $display = -1,$fullactive = 0)
		{
			$sql="select a.* from `nl_products` as a 
							INNER JOIN `nl_categories` as b ON a.`CategoryId` = b.`CateId` 
							where b.`CateId` = $id";

			if($fullactive == 0){
				$sql.=" and a.`Active` = 1";
			}
			if($brand != "")
			{
				$sql.=" and a.`BrandId` = $brand";
			}
			if($priceMin != -1)
			{
				$sql .= " and a.`Price` >= $priceMin";
			}
			if($priceMax != -1)
			{
				$sql .= " and a.`Price` <= $priceMax";
			}
			$sql .= " order by $field $sort";
			if($position >= 0 && $display > 0)
			{
				$sql .= " limit $position,$display";	
			}
			$r = mysqli_query($this->con,$sql);
			$mang = array();
			while($rs = mysqli_fetch_assoc($r))
			{
				$mang[] = $rs;
			}
			return json_encode($mang);
		}
		public function getSumProductsOfCate($id,$brand=0,$priceMin=-1,$priceMax=-1,$fullactive = 0)
		{
			$sql="select COUNT(a.`ProductId`) as tongsp from `nl_products` as a INNER JOIN `nl_categories` as b ON a.`CategoryId` = b.`CateId`
														  where b.`CateId` = $id";
			if($fullactive == 0){
				$sql.=" and a.`Active` = 1";
			}										  
			if($brand != "")
			{
				$sql.=" and a.`BrandId` = $brand";
			}
			if($priceMin != -1)
			{
				$sql .= " and a.`Price` >= $priceMin";
			}
			if($priceMax != -1)
			{
				$sql .= " and a.`Price` <= $priceMax";
			}
			
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			return json_encode($rs['tongsp']);
		}
		public function getProductsByDepartId($id,$brand=0,$priceMin=-1,$priceMax=-1,$field,$sort,$position = -1, $display = -1)
		{
			$sql="select a.* from `nl_products` as a INNER JOIN `nl_categories` as b ON a.`CategoryId` = b.`CateId`
						 							 INNER JOIN nl_departments as c ON b.`DepartId` = c.`DepartId`
														  where a.`Active` = 1 and c.`DepartId` = $id";
													  
			if($brand != "")
			{
				$sql.=" and a.`BrandId` = $brand";
			}
			if($priceMin != -1)
			{
				$sql .= " and a.`Price` >= $priceMin";
			}
			if($priceMax != -1)
			{
				$sql .= " and a.`Price` <= $priceMax";
			}
			$sql .= " order by $field $sort";
			if($position >= 0 && $display > 0)
			{
				$sql .= " limit $position,$display";	
			}
			$r = mysqli_query($this->con,$sql);
			$mang = array();
			while($rs = mysqli_fetch_assoc($r))
			{
				$mang[] = $rs;
			}
			return json_encode($mang);
		}
		public function getSumProductsOfDepart($id,$brand=0,$priceMin=-1,$priceMax=-1)
		{
			$sql="select COUNT(a.`ProductId`) as tongsp from `nl_products` as a INNER JOIN `nl_categories` as b ON a.`CategoryId` = b.`CateId`
						 							 INNER JOIN nl_departments as c ON b.`DepartId` = c.`DepartId`
														  where a.`Active` = 1 and c.`DepartId` = $id";
													  
			if($brand != "")
			{
				$sql.=" and a.`BrandId` = $brand";
			}
			if($priceMin != -1)
			{
				$sql .= " and a.`Price` >= $priceMin";
			}
			if($priceMax != -1)
			{
				$sql .= " and a.`Price` <= $priceMax";
			}
			
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			return json_encode($rs['tongsp']);
		}
		public function getPointProduct($id)
		{
			$sql = "select `Point` from `nl_products` where `ProductId` = $id";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			
			return json_encode($rs['Point']);
		}
		public function checkAllowRateProduct($productId,$email)
		{
			$sql = "select a.`OrderId` from `nl_orders` as a INNER JOIN `nl_orderdetails` as b ON a.`OrderId` = b.`OrderId` where a.`StatusId` == 4 and a`Email` = '$email' and b.`productId`=$productId";
			$r = mysqli_query($this->con,$sql);
			if($rs = mysqli_fetch_assoc($r))
			{
				$sql1 = "select * from `nl_rateproduct` where `OrderId`={$rs['OrderId']} and `Email`='$email' and `ProductId`=$productId";
				$r1 = mysqli_query($this->con,$sql1);
				if($rs1 = mysqli_fetch_assoc($r1))
				{
					return 0;
				}
				else
				{
					return 1;
				}
			}
			else
			{
				return 0;
			}
		}
		public function updateViewProduct($id,$numView)
        {
            $sql="UPDATE `nl_products` SET `View`=$numView WHERE `ProductId` = $id";
            return $r = mysqli_query($this->con,$sql);
		}
		public function deleteProductById($id){
			$sql="DELETE FROM `nl_products` WHERE `ProductId` = $id";
			return $r = mysqli_query($this->con,$sql);
		}
		public function addProduct($cateId,$name,$img,$img1,$img2,$img3,$desc,$price,$priceOfMarket,$point,$brandid,$qty,$active,$meta_title,$meta_des,$meta_keyword,$url){
			$now = date("Y-m-d H:i:s");
			$sql="INSERT INTO `nl_products`(`ProductId`, `CategoryId`, `ProductName`, `Img`, `ProductDesc`, `Price`, `PriceOfMarket`, `Point`, `brandid`, `CrDateTime`, `Qty`, `Sold`, `View`, `Active`, `meta_title`, `meta_description`, `meta_keyword`, `url`)
			 VALUES (NULL,$cateId,$name,'$img',N'$desc',$price,$priceOfMarket,$point,$brandid,'$now',$qty,0,0,$active,N'$meta_title',N'$meta_des',N'$meta_keyword','$url')";
			$r = mysqli_query($this->con,$sql);
			$id = mysqli_insert_id($this->con);
			if($img1!=null){
				addProductImg($id,$img1);
			}
			if($img2!=null){
				addProductImg($id,$img2);
			}
			if($img3!=null){
				addProductImg($id,$img3);
			}
			return $r;
		}
		public function updateProduct($id,$cateId,$name,$img,$img1,$img2,$img3,$desc,$price,$priceOfMarket,$point,$brandid,$qty,$active,$meta_title,$meta_des,$meta_keyword,$url){
			$sql="UPDATE `nl_products` SET `CategoryId`=$cateId,`ProductName`=N'$name',`Img`='$img',`ProductDesc`=N'$desc',`Price`=$price,`PriceOfMarket`=$priceOfMarket,`Point`=$point,`brandid`=$brandid,`Qty`=$qty,`Active`=$active,`meta_title`=N'$meta_title',`meta_description`=N'$meta_des',`meta_keyword`=N'$meta_keyword',`url`='$url' WHERE `ProductId`=$id";
			return $r = mysqli_query($this->con,$sql);
		}
		public function updateProductImg($imgId,$Img)
		{
			$sql="UPDATE `nl_productimg` SET `Img`='$Img' WHERE `ProductImgId`=$imgId";
			return $r = mysqli_query($this->con,$sql);
		}
		public function addProductImg($productId,$Img){
			$sql = "INSERT INTO `nl_productimg`(`ProductImgId`, `ProductId`, `Img`) VALUES (NULL,$productId,'$Img')";
			return $r = mysqli_query($this->con,$sql);
		}
	}
?>