<?php
	class DepartmentModel extends DB{
		
		function getAllDepartment(){
			$sql = "select * from `nl_departments` where `Active` = 1 order by `Order` ASC";
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