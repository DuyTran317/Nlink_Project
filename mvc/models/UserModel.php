<?php
    class UserModel extends DB{
        public function getUserByEmail($email)
        {
            $sql="select * from `nl_users` where `Email` = '$email'";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			
			return json_encode($rs);
        }
        public function getUserById($id)
        {
            $sql="select * from `nl_users` where `UserId` = $id";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			
			return json_encode($rs);
        }
        public function insertUser($email,$name,$phone,$pass,$birthday,$cityId,$dictrictId,$wardId,$address)
        {
            $now = date("Y-m-d H:i:s");
            $sql="INSERT INTO `nl_users`(`UserId`, `FullName`, `GenderId`, `PhoneNumber`, `Email`, `Password`, `Birthday`, `CityId`, `DictrictId`, `WardId`, `Address`, `Point`, `RankId`, `CrDateTime`) 
                                VALUES (NULL,N'$name',1,'$phone','$email','$pass','$birthday',$cityId,$dictrictId,$wardId,N'$address',0,1,'$now')";
            if(mysqli_query($this->con,$sql))
                return mysqli_insert_id($this->con);
            else
                return 0;
        }
        public function getAllGender()
        {
            $sql = "select * from `nl_genders`";
            $r = mysqli_query($this->con,$sql);
            $mang = array();
			while($rs = mysqli_fetch_assoc($r))
			{
				$mang[] = $rs;
			}
			return json_encode($mang);
        }
        public function updateUser($userId,$name,$genderId,$phone,$birthday,$cityId,$dictrictId,$wardId,$address)
        {
            $sql = "UPDATE `nl_users` SET `FullName`=N'$name',`GenderId`=$genderId,`PhoneNumber`='$phone',`Birthday`='$birthday',`CityId`=$cityId,`DictrictId`=$dictrictId,`WardId`=$wardId,`Address`=N'$address' WHERE `UserId` = $userId";
            $r = mysqli_query($this->con,$sql);
            return mysqli_affected_rows($this->con);
        }
        public function updatePointUser($userId,$point)
        {
            $sql = "UPDATE `nl_users` SET `Point` = $point WHERE `UserId` = $userId";
            $r = mysqli_query($this->con,$sql);
            return mysqli_affected_rows($this->con);
        }
        public function updatePassword($userId,$pass)
        {
            $sql = "UPDATE `nl_users` SET `Password` = '$pass' WHERE `UserId` = $userId";
            $r = mysqli_query($this->con,$sql);
            return mysqli_affected_rows($this->con);
        }
    }
?>