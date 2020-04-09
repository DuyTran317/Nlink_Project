<?php
	class ProductModel extends DB{
		public function getProductsByKeyWord($key,$brand=0,$priceMin=-1,$priceMax=-1, $field, $sort, $position = -1, $display = -1){
			$sql= "select * from `nl_products` where `Active` = 1 and `ProductName` like('%$key%')";
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
		public function getSumProductsOfSearch($key,$brand=0,$priceMin=-1,$priceMax=-1)
		{
			$sql="select COUNT(`ProductId`) as `tongsp` from `nl_products` where `Active` = 1 and `ProductName` like('%$key%')";
													  
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
		public function getProductsByOrder($field,$sort,$position = -1, $display = -1)
		{
			$sql="select * from `nl_products` where `Active` = 1 order by $field $sort";
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
			$sql = "SELECT *,SUM(`StarNumber`)/COUNT(*) as sao FROM `nl_comments` WHERE `ProductId`=$id and `ParentId`=NULL order by $field $sort";
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
		public function getProductsByCateId($id,$brand=0,$priceMin=-1,$priceMax=-1,$field,$sort,$position = -1, $display = -1)
		{
			$sql="select a.* from `nl_products` as a 
							INNER JOIN `nl_categories` as b ON a.`CategoryId` = b.`CateId` 
							where a.`Active` = 1 and b.`CateId` = $id";
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
		public function getSumProductsOfCate($id,$brand=0,$priceMin=-1,$priceMax=-1)
		{
			$sql="select COUNT(a.`ProductId`) as tongsp from `nl_products` as a INNER JOIN `nl_categories` as b ON a.`CategoryId` = b.`CateId`
														  where a.`Active` = 1 and b.`CateId` = $id";
													  
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
	}
?>