<?php
    class SubscribeModel extends DB{
        function issetEmailSub($email){
            $sql = "select * from `nl_registeremails` where `RegisterEmail`='$email'";
            $r = mysqli_query($this->con,$sql);
            return mysqli_num_rows($r);
        }
        function addEmailSub($email){
            $now = date("Y-m-d H:i:s");
            $sql ="INSERT INTO `nl_registeremails`(`RegisterEmailId`, `RegisterEmail`, `CrDateTime`) VALUES (NULL,'$email','$now')";
            $r = mysqli_query($this->con,$sql);
            return mysqli_insert_id($this->con);
        }
    }
?>