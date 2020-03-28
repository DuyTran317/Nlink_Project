<?php
    class KeywordModel extends DB{
        public function getKeywords($field,$sort,$position = -1, $display = -1)
        {
            $sql="select * from `nl_keywords` order by $field $sort";
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