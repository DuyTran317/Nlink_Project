<?php
    class LocationModel extends DB{
        public function getAllCity($field,$sort,$position = -1, $display = -1){
            $sql = "select * from `nl_cities` order by $field $sort";
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
        public function getDictrictsOfCityId($id,$field,$sort,$position = -1, $display = -1){
            $sql = "select * from `nl_dictricts` where `CityId`=$id order by $field $sort";
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
        public function getWardsOfDictrictId($id,$field,$sort,$position = -1, $display = -1){
            $sql = "select * from `nl_wards` where `DictrictId`=$id order by $field $sort";
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