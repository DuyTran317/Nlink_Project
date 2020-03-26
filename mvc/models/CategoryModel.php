<?php
	class CategoryModel extends DB{
		
		function getAllCategory(){
			$sql = "select * from `nl_categories` where `Active` = 1 order by `Order` ASC";
			$r = mysqli_query($this->con,$sql);
			$mang = array();
			while($rs = mysqli_fetch_array($r))
			{
				$mang[] = $rs;
			}
			return json_encode($mang);
		}
	}
?>