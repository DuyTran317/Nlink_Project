<?php
    class OrderModel extends DB{
        public function addOrder($price,$pricePay,$userId,$name,$email,$phonenumber1,$phonenumber2,$wardId,$address,$transpotId,$note,$support,$payment,$shipFee,$valueVoucher,$point,$timeShipMin,$timeShipMax){
            $now = date("Y-m-d H:i:s");
            $code = date("YmdHis");
            $sql = "INSERT INTO `nl_orders`(`OrderId`, `OrderCode`, `Price`, `PointUsed`, `PricePay`, `UserId`, `FullName`, `Email`, `PhoneNumber1`, `PhoneNumber2`, `WardId`, `Address`, `TransportId`, `NoteTypeId`, `Note`, `CallSupport`, `PaymentId`, `StatusId`, `HasPaid`, `CrDateTime`, `Sale`, `ShipFee`, `TimeShipMin`, `TimeShipMax`) 
                VALUES (NULL,'$code',$price,$point,$pricePay,$userId,N'$name','$email','$phonenumber1','$phonenumber2',$wardId,N'$address',$transpotId,0,N'$note',$support,$payment,1,0,'$now',$valueVoucher,$shipFee,$timeShipMin,$timeShipMax)";
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
        public function loadDsOrderOfUser($userId,$field,$sort,$position = -1, $display = -1)
        {
            $sql = "select a.`OrderId`, a.`OrderCode`, a.`CrDateTime`, a.`FullName`, a.`PricePay`, b.`OrderStatusId`, b.`OrderStatusName` from `nl_orders` as a INNER JOIN `nl_orderstatus` as b ON a.`StatusId`=b.`OrderStatusId` where a.`UserId` = $userId order by $field $sort";
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
        public function getSumOrderOfUser($userId)
        {
            $sql = "select COUNT(a.`UserId`) as sum from `nl_orders` as a INNER JOIN `nl_orderstatus` as b ON a.`StatusId`=b.`OrderStatusId` where a.`UserId` = $userId";
			$r = mysqli_query($this->con,$sql);
			$rs = mysqli_fetch_assoc($r);
			return $rs['sum'];
        }
        public function getOrderByCode($orderCode)
        {
            $sql = "select a.*, b.`CityName`, b.`FeeShip`, b.`TimeShipMin`, b.`TimeShipMax`, c.`DictrictName`, d.`WardName`, e.`TransportName`, f.`PaymentName` from `nl_orders` as a 
                                                    LEFT JOIN `nl_wards` as d ON a.`WardId`=d.`WardId` 
                                                    LEFT JOIN `nl_dictricts` as c ON d.`DictrictId`=c.`DictrictId`
                                                    LEFT JOIN `nl_cities` as b ON C.`CityId`=b.`CityId`
                                                    LEFT JOIN `nl_transports` as e ON a.`TransportId`=e.`TransportId` 
                                                    LEFT JOIN `nl_payments` as f ON a.`PaymentId`=f.`PaymentId` where a.`OrderCode`='$orderCode'";
            $r = mysqli_query($this->con,$sql);
            $rs = mysqli_fetch_assoc($r);
            return json_encode($rs);
        }
        public function getOrderDetailsByOrderId($orderId,$field,$sort,$position = -1, $display = -1)
        {
            $sql = "select a.*, b.`Img`, b.`ProductName`, b.`url`, b.`Point` from `nl_orderdetails` as a INNER JOIN `nl_products` as b ON a.`ProductId`=b.`ProductId` where a.`OrderId` = $orderId order by $field $sort";
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
        public function loadDsPayment($field,$sort,$position = -1, $display = -1)
        {
            $sql = "select * from `nl_payments` where `Active` = 1 order by $field $sort";
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
        public function loadDsTransport($field,$sort,$position = -1, $display = -1)
        {
            $sql = "select * from `nl_transports` where `Active` = 1 order by $field $sort";
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