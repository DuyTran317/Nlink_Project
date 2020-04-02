<?php
    class UserModel extends DB{
        public function getUserByEmail($email)
        {
            $sql="select * from `nl_users` where `Email` = '$email'";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			
			return json_encode($rs);
        }
        public function insertUser($email,$name,$phone,$pass)
        {
            $now = date("Y-m-d H:i:s");
            $sql="INSERT INTO `nl_users`(`UserId`, `FullName`, `GenderId`, `PhoneNumber`, `Email`, `Password`, `Birthday`, `WardId`, `Address`, `Point`, `CrDateTime`) 
                                VALUES (NULL,N'$name',1,'$phone','$email','$pass','2000-2-22',NULL,NULL,0,'$now')";
            if(mysqli_query($this->con,$sql))
                return mysqli_insert_id($this->con);
            else
                return 0;
        }
    }
?>