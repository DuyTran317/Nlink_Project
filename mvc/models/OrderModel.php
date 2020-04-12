<?php
    class OrderModel extends DB{
        public function addOrder($price,$pricePay,$userId,$name,$email,$phonenumber1,$phonenumber2,$wardId,$address,$transpotId,$note,$support,$payment,$shipFee,$valueVoucher){
            $now = date("Y-m-d H:i:s");
            $code = date("YmdHis");
            $sql = "INSERT INTO `nl_orders`(`OrderId`, `OrderCode`, `Price`, `PointUsed`, `PricePay`, `UserId`, `FullName`, `Email`, `PhoneNumber1`, `PhoneNumber2`, `WardId`, `Address`, `TransportId`, `NoteTypeId`, `Note`, `CallSupport`, `PaymentId`, `StatusId`, `HasPaid`, `CrDateTime`, `Sale`, `ShipFee`, `ShipDateTime`) 
                VALUES (NULL,'$code',$price,0,$pricePay,$userId,N'$name','$email','$phonenumber1','$phonenumber2',$wardId,N'$address',$transpotId,0,N'$note',$support,$payment,1,0,'$now',$shipFee,$valueVoucher,NULL)";
            if(mysqli_query($this->con,$sql))
            {
                return mysqli_insert_id($this->con);
            }
            else
            {
                return 0;
            }
        }
        public function addOrderDetail($orderId,$productId,$qty,$price){
            $sql="INSERT INTO `nl_orderdetails`(`OrderDetailId`, `OrderId`, `ProductId`, `Qty`, `Price`, `PricePay`) VALUES (NULL,$orderId,$productId,$qty,$price,$price)";
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