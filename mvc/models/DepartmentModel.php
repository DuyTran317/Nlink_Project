<?php
	class DepartmentModel extends DB{
		
		function getDepartments($field,$sort,$position = -1, $display = -1){
			$sql="select * from `nl_departments` where `Active` = 1 order by $field $sort";
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
		function getCategoriesOfDepartment($id,$field,$sort,$position = -1, $display = -1){
			$sql="select b.* from `nl_departments` as a INNER JOIN `nl_categories` as b ON a.`DepartId`=b.`DepartId` where b.`Active` = 1 order by $field $sort";
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
		
		function getDepartmentByUrl($url)
		{
			$sql="select * from `nl_departments` where `url` = '$url' and `Active` = 1";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			
			return json_encode($rs);
		}
		function getBrandsDepartmentById($id,$field,$sort,$position = -1, $display = -1){
			$sql="select c.* from `nl_departments` as a INNER JOIN `nl_branddeparts` as b ON a.`DepartId` = b.`DepartId`
													INNER JOIN `nl_brands` as c ON b.`BrandId` = c.`BrandId`
													where a.`DepartId` = $id order by $field $sort";
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