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
		public function getWardById($id)
		{
			$sql = "select * from `nl_wards` where `WardId`=$id";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			return json_encode($rs);
		}
		public function getDictrictById($id)
		{
			$sql = "select * from `nl_dictricts` where `DictrictId`=$id";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			return json_encode($rs);
		}
		public function getCityById($id)
		{
			$sql = "select * from `nl_cities` where `CityId`=$id";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			return json_encode($rs);
		}
		public function getAllbyWardId($id)
		{
			$sql = "select * from `nl_wards` as a INNER JOIN `nl_dictricts` as b ON a.`DictrictId`=b.`DictrictId`
												INNER JOIN `nl_cities` as c ON b.`CityId`=c.`CityId` where a.`WardId`=$id";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			return json_encode($rs);
		}
    }
?>