<?php
	class DepartmentModel extends DB{
		
		function getAllDepartment(){
			$sql = "select * from `nl_departments` where `Active` = 1 order by `Order` ASC";
			return $this->getAllItem($sql);
		}
	}
?>