<?php
	class ProductModel extends DB{
		public function getProductByKeyWord($key, $field, $sort, $position = -1, $display = -1){
			$sql= "select * from `nl_products` where `ProductName` like('%$key%') order by $field $sort";
			if($position >= 0 && $display > 0)
			{
				$sql .= " limit $position,$display";	
			}
			return $this->getAllItem($sql);
		}
	}
?>