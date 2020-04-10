<?php
    class VoucherModel extends DB{
        public function checkVoucher($Code)
        {
            $now = date("Y-m-d H:i:s");
            $sql = "select * from `nl_vouchers` where `Code`='$Code' and `CrDateTime`<'$now' and `ExDateTime`>'$now'";
            $r = mysqli_query($this->con,$sql);
            $rs = mysqli_fetch_assoc($r);
            return json_encode($rs);
        }
        public function addOrderVoucher($orderId,$voucherId)
        {
            $now = date("Y-m-d H:i:s");
            $sql = "INSERT INTO `nl_ordervoucher`(`OrderVoucherId`, `OrderId`, `VoucherId`, `CrDateTime`) VALUES (NULL,$orderId,$voucherId,'$now')";
            if(mysqli_query($this->con,$sql))
            {
                return mysqli_insert_id($this->con);
            }
            else
            {
                return 0;
            }

        }
    }
?>