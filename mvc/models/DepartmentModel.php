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
			$sql="select b.* from `nl_departments` as a INNER JOIN `nl_categories` as b ON a.`DepartId`=b.`DepartId` where a.`DepartId` = $id order by $field $sort";
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
			$sql="select * from `nl_departments` where `url` = '$url'";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			
			return json_encode($rs);
		}
		function getDepartmentById($id)
		{
			$sql="select * from `nl_departments` where `DepartId` = '$id'";
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
		function getSumDepartment(){
			$sql = "select COUNT(`DepartId`) as sum from `nl_departments`";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			return json_encode($rs['sum']);
		}
		function deleteDepartmentById($id){
			$sql = "DELETE FROM `nl_departments` WHERE `DepartId`=$id";
			return $r = mysqli_query($this->con,$sql);
		}
		function getBiggestOrder(){
			$sql="select MAX(`Order`) as `Order` from `nl_departments`";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			return $rs['Order'];
		}
		function addDepartment($name,$order,$active,$metaTitle,$metaDes,$metaKeyword,$url){
			$sql = "INSERT INTO `nl_departments`(`DepartId`, `DepartName`, `Order`, `Active`, `meta_title`, `meta_description`, `meta_keyword`, `url`) 
					VALUES (NULL,N'$name',$order,$active,N'$metaTitle',N'$metaDes',N'$metaKeyword','$url')";
			return mysqli_query($this->con,$sql);
		}
		function updateDepartment($id,$name,$order,$active,$metaTitle,$metaDes,$metaKeyword,$url)
		{
			$sql = "UPDATE `nl_departments` SET `DepartName`=N'$name',`Order`=$order,`Active`=$active,`meta_title`=N'$metaTitle',`meta_description`=N'$metaDes',`meta_keyword`=N'$metaKeyword',`url`='$url' WHERE `DepartId`=$id";
			return mysqli_query($this->con,$sql);
		}
	}
?>