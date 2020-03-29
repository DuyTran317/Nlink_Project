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
			$sql="select * from `nl_products` where `id` = $id";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_row($r);
			
			return json_encode($rs);
		}
		public function getProductByUrl($url)
		{
			$sql="select * from `nl_products` where `url` = '$url'";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_row($r);
			
			return json_encode($rs);
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
		public function getProductsByDepartId($id,$field,$sort,$position = -1, $display = -1)
		{
			$sql="select a.* from `nl_products` as a INNER JOIN `nl_categories` as b ON a.`CategoryId` = b.`CateId`
						 							 INNER JOIN nl_departments as c ON b.`DepartId` = c.`DepartId`
			 											 where a.`Active` = 1 and c.`DepartId` = $id order by $field $sort";
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