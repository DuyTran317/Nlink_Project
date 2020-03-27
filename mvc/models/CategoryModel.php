<?php
	class CategoryModel extends DB{
		
		function getAllCategory(){
			$sql = "select * from `nl_categories` where `Active` = 1 order by `Order` ASC";
			return $this->getAllItem($sql);
		}
	}
?>