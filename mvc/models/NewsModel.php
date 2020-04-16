<?php
    class NewsModel extends DB{
        public function getNews($field,$sort,$position = -1, $display = -1)
        {
            $sql = "select * from `nl_news` where `Active`=1 and `Hot`=0 order by $field $sort";
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
        public function getSumNews()
        {
            $sql = "select COUNT(`NewId`) as sumnews from `nl_news` where `Active`=1 and `Hot`=0";
            $r = mysqli_query($this->con,$sql);
            $rs = mysqli_fetch_assoc($r);
            return $rs['sumnews'];
        }
        public function getDetailNewsByUrl($url)
        {
            $sql = "select * from `nl_news` where `Active`=1 and `url`='$url'";
            $r = mysqli_query($this->con,$sql);
            $rs = mysqli_fetch_assoc($r);
            return json_encode($rs);
        }
        public function getNewsHot($field,$sort,$position = -1, $display = -1)
        {
            $sql = "select * from `nl_news` where `Active`=1 and `Hot`=1 order by $field $sort";
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
        public function updateViewNews($id,$numView)
        {
            $sql="UPDATE `nl_news` SET `View`=$numView WHERE `NewId` = $id";
            $r = mysqli_query($this->con,$sql);
        }
    }
?>