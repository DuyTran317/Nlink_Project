<?php
	class CategoryModel extends DB{
		
		function getCategories($field,$sort,$position = -1, $display = -1, $fullactive = 0){
			$sql="select * from `nl_categories`";
			if($fullactive == 0)
			{
				$sql .= " where `Active`=1";
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
		function getSumCategory($fullactive = 0){
			$sql = "select COUNT(`CateId`) as sum from `nl_categories`";
			if($fullactive == 0)
			{
				$sql.=" where `Active` = 1"; 
			}
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			return json_encode($rs['sum']);
		}
		function getCategoryByUrl($url)
		{
			$sql="select * from `nl_categories` where `url` = '$url' and `Active` = 1";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			
			return json_encode($rs);
		}
		function getCategoryById($id)
		{
			$sql="select * from `nl_categories` where `CateId` = '$id'";
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
		function deleteCategoryById($id){
			$sql = "DELETE FROM `nl_categories` WHERE `CateId`=$id";
			return $r = mysqli_query($this->con,$sql);
		}
		function getBiggestOrder(){
			$sql="select MAX(`Order`) as `Order` from `nl_categories`";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			return $rs['Order'];
		}
		function addCategory($departId,$name,$order,$active,$metaTitle,$metaDes,$metaKeyword,$url){
			$sql = "INSERT INTO `nl_categories`(`CateId`, `DepartId`, `CateName`, `Order`, `Active`, `ParentId`, `meta_title`, `meta_description`, `meta_keyword`, `url`) 
					VALUES (NULL,$departId,N'$name',$order,$active,0,N'$metaTitle',N'$metaDes',N'$metaKeyword','$url')";
			return mysqli_query($this->con,$sql);
		}
		function updateCategory($id,$departId,$name,$order,$active,$metaTitle,$metaDes,$metaKeyword,$url)
		{
			$sql = "UPDATE `nl_categories` SET `DepartId`=$departId,`CateName`=N'$name',`Order`=$order,`Active`=$active,`meta_title`=N'$metaTitle',`meta_description`=N'$metaDes',`meta_keyword`=N'$metaKeyword',`url`='$url' WHERE `CateId`=$id";
			return mysqli_query($this->con,$sql);
		}
	}
?>