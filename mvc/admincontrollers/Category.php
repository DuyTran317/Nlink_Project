<?php
    class Category extends Controller{
        public $CateModel;
        public $DepartModel;
        function __construct(){
            if(!isset($_SESSION['AdminId']))
            {
                header("location:".$_SESSION['projectName']."/admin/Home/Login");
            }
            $this->CateModel=$this->model("CategoryModel");
            $this->DepartModel=$this->model("DepartmentModel");
        }
        function Index($departId = 0,$pageCate = 1){
            $display=10; $begin=($pageCate-1)*$display;
            if($departId == 0){
			    $listCate = json_decode($this->CateModel->getCategories("`Order`","ASC",$begin,$display,1),true);
                $sumCate = json_decode($this->CateModel->getSumCategory(1),true);
            }
            else
            {
                $listCate = json_decode($this->DepartModel->getCategoriesOfDepartment($departId,"`Order`","ASC",$begin,$display),true);
                $sumCate = json_decode($this->DepartModel->getSumCategoriesOfDepartment($departId,1),true);
            }
            
            $sumPageCate = ceil($sumCate/$display);
            $listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC"),true);
            
            $this->view("layout2",array(
                "page" => "cate",
                "pageCate" => $pageCate,
                "sumPageCate" => $sumPageCate,
                "listCate" => $listCate,
                "listDepart" => $listDepart,
                "departId" => $departId
            ));
        }
        function Delete()
        {
            if(isset($_POST['cateId'])){
                $cateId = $_POST['cateId'];
                echo $this->CateModel->deleteCategoryById($cateId);
            }
        }
        function Create(){
            $Order = $this->CateModel->getBiggestOrder();
            $listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC",1),true);
            $this->view("layout2",array(
                "page" => "cate_add",
                "listDepart" => $listDepart,
                "Order" => $Order
            ));
        }
        function Update($id){
            $Cate = json_decode($this->CateModel->getCategoryById($id),true);
            $listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC",1),true);
            $this->view("layout2",array(
                "page" => "cate_upd",
                "listDepart" => $listDepart,
                "Cate" => $Cate
            ));
        }
        function checkUrl(){
            if(isset($_POST['url']))
            {
                $url = $_POST['url'];

                $kq = json_decode($this->CateModel->getCategoryByUrl($url),true);
                if($kq!=null){
                    echo 0;
                }
                else 
                {
                    echo 1;
                }
            }
        }
        function XuLyThem(){
            if(isset($_POST['createCate']))
            {
                $departId = $_POST['departId'];
                $name = $_POST['name'];
                $order = $_POST['order'];
                $active = $_POST['active'];
                $metaTitle = $_POST['meta_title'];
                $metaDes = $_POST['meta_des'];
                $metaKeyword = $_POST['meta_keyword'];
                $url = $_POST['url'];

                $kq = json_decode($this->CateModel->getCategoryByUrl($url),true);
                if($kq==null){
                    if($this->CateModel->addCategory($departId,$name,$order,$active,$metaTitle,$metaDes,$metaKeyword,$url)){
                        echo "<script>
						alert('Thêm Thể Loại thành công!');
						setTimeout(function(){
							window.location = '".$_SESSION['projectName']."/admin/Category';
						}, 1500);
					    </script>";
                    }
                    else{
                        header("location:".$_SESSION['projectName']."/admin/Category/Create");
                    }
                }
                else
                {
                    header("location:".$_SESSION['projectName']."/admin/Category/Create");
                }
            }
        }
        function XuLySua(){
            if(isset($_POST['updateCate']))
            {
                $id = $_POST['id'];
                $departId = $_POST['departId'];
                $name = $_POST['name'];
                $order = $_POST['order'];
                $active = $_POST['active'];
                $metaTitle = $_POST['meta_title'];
                $metaDes = $_POST['meta_des'];
                $metaKeyword = $_POST['meta_keyword'];
                $url = $_POST['url'];

                $kq = json_decode($this->CateModel->getCategoryByUrl($url),true);
                if($kq==null || $kq['CateId']==$id){
                    if($this->CateModel->updateCategory($id,$departId,$name,$order,$active,$metaTitle,$metaDes,$metaKeyword,$url)){
                        echo "<script>
						alert('Cập nhật Thể Loại thành công!');
						setTimeout(function(){
							window.location = '".$_SESSION['projectName']."/admin/Category';
						}, 1500);
					    </script>";
                    }
                    else{
                        header("location:".$_SESSION['projectName']."/admin/Category/Update/".$id);
                    }
                }
                else
                {
                    header("location:".$_SESSION['projectName']."/admin/Category/Update/".$id);
                }
            }
        }
        function loadCategoriesOfDepartment(){
            if(isset($_POST['departId'])){
                $departId = $_POST['departId'];
                echo $this->DepartModel->getCategoriesOfDepartment($departId,"`Order`","ASC",-1,-1,1);
            }
            else
            {
                echo "";
            }
        }
    }
?>