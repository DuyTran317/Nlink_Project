<?php
    class Department extends Controller{
        public $DepartModel;
        function __construct(){
            if(!isset($_SESSION['AdminId']))
            {
                header("location:".$_SESSION['projectName']."/admin/Home/Login");
            }
            $this->DepartModel=$this->model("DepartmentModel");
        }
        function Index($pageDepart = 1){
            $display=10; $begin=($pageDepart-1)*$display;
			$listDepart = json_decode($this->DepartModel->getDepartmentsFullActive("`Order`","ASC",$begin,$display),true);
			$sumDepart = json_decode($this->DepartModel->getSumDepartment(),true);
            $sumPageDepart = ceil($sumDepart/$display);
            $this->view("layout2",array(
                "page" => "dep",
                "pageDepart" => $pageDepart,
                "sumPageDepart" => $sumPageDepart,
                "listDepart" => $listDepart
            ));
        }
        function Delete()
        {
            if(isset($_POST['departmentId'])){
                $departId = $_POST['departmentId'];
                echo $this->DepartModel->deleteDepartmentById($departId);
            }
        }
        function Create(){
            $Order = $this->DepartModel->getBiggestOrder();
            $this->view("layout2",array(
                "page" => "dep_add",
                "Order" => $Order
            ));
        }
        function XuLyThem(){
            if(isset($_POST['createDepart']))
            {
                $name = $_POST['name'];
                $order = $_POST['order'];
                $active = $_POST['active'];
                $metaTitle = $_POST['meta_title'];
                $metaDes = $_POST['meta_des'];
                $metaKeyword = $_POST['meta_keyword'];
                $url = $_POST['url'];

                $kq = json_decode($this->DepartModel->getDepartmentByUrl($url),true);
                if($kq==null){
                    if($this->DepartModel->addDepartment($name,$order,$active,$metaTitle,$metaDes,$metaKeyword,$url)){
                        echo "<script>
						alert('Thêm Chủng loại thành công!');
						setTimeout(function(){
							window.location = '".$_SESSION['projectName']."/admin/Department';
						}, 1500);
					    </script>";
                    }
                    else{
                        header("location:".$_SESSION['projectName']."/admin/Department/Create");
                    }
                }
                else
                {
                    header("location:".$_SESSION['projectName']."/admin/Department/Create");
                }
            }
        }
        function Update($id){
            $Depart = json_decode($this->DepartModel->getDepartmentById($id),true);
            $this->view("layout2",array(
                "page" => "dep_upd",
                "Depart" => $Depart
            ));
        }
        function XuLySua(){
            if(isset($_POST['updateDepart']))
            {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $order = $_POST['order'];
                $active = $_POST['active'];
                $metaTitle = $_POST['meta_title'];
                $metaDes = $_POST['meta_des'];
                $metaKeyword = $_POST['meta_keyword'];
                $url = $_POST['url'];

                $kq = json_decode($this->DepartModel->getDepartmentByUrl($url),true);
                if($kq==null || $kq['DepartId']==$id){
                    if($this->DepartModel->updateDepartment($id,$name,$order,$active,$metaTitle,$metaDes,$metaKeyword,$url)){
                        echo "<script>
						alert('Cập nhật Chủng loại thành công!');
						setTimeout(function(){
							window.location = '".$_SESSION['projectName']."/admin/Department';
						}, 1500);
					    </script>";
                    }
                    else{
                        header("location:".$_SESSION['projectName']."/admin/Department/Update/".$id);
                    }
                }
                else
                {
                    header("location:".$_SESSION['projectName']."/admin/Department/Update/".$id);
                }
            }
        }
        function checkUrl(){
            if(isset($_POST['url']))
            {
                $url = $_POST['url'];

                $kq = json_decode($this->DepartModel->getDepartmentByUrl($url),true);
                if($kq!=null){
                    echo 0;
                }
                else 
                {
                    echo 1;
                }
            }
        }
    }
?>