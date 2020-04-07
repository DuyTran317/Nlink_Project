<?php
	class CategoryModel extends DB{
		
		function getCategories($field,$sort,$position = -1, $display = -1){
			$sql="select * from `nl_categories` where `Active` = 1 order by $field $sort";
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
		function getCategoryByUrl($url)
		{
			$sql="select * from `nl_categories` where `url` = '$url' and `Active` = 1";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			
			return json_encode($rs);
		}
		function getBrandsCategoryById($id,$field,$sort,$position = -1, $display = -1){
			$sql="select c.* from `nl_categories` as a INNER JOIN `nl_brandcates` as b ON a.`CateId` = b.`CateId`
													INNER JOIN `nl_brands` as c ON b.`BrandId` = c.`BrandId`
													where a.`CateId` = $id order by $field $sort";
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