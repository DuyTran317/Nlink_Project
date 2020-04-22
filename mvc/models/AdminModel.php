<?php
    class AdminModel extends DB{
        public function getAdminByEmail($email){
            $sql = "select * from `nl_admins` where `Username` = '$email'";
            $r = mysqli_query($this->con,$sql);
            $rs = mysqli_fetch_assoc($r);
			
			return json_encode($rs);
        }
    }
?>