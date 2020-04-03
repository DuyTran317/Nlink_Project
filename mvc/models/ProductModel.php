<?php
	class ProductModel extends DB{
		public function getProductsByKeyWord($key, $field, $sort, $position = -1, $display = -1){
			$sql= "select * from `nl_products` where `Active` = 1 and `ProductName` like('%$key%') order by $field $sort";
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
		public function getProductsByCateId($id,$field,$sort,$position = -1, $display = -1)
		{
			$sql="select a.* from `nl_products` as a 
							INNER JOIN `nl_categories` as b ON a.`CategoryId` = b.`CateId` 
							where a.`Active` = 1 and b.`CateId` = $id order by $field $sort";
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
		
		public function getProductsByDepartId($id,$brand,$priceMin,$priceMax,$field,$sort,$position = -1, $display = -1)
		{
			$sql="select a.* from `nl_products` as a INNER JOIN `nl_categories` as b ON a.`CategoryId` = b.`CateId`
						 							 INNER JOIN nl_departments as c ON b.`DepartId` = c.`DepartId`
														  where a.`Active` = 1 and c.`DepartId` = $id";
														  
			if($brand != "")
			{
				$sql.=" and a.`Brand` = '$brand'";
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
	}
?>