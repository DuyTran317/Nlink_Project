<?php
    class Product extends Controller{
        public $ProductModel;
        public $CateModel;
        public $DepartModel;
        public $BrandModel;

        function __construct(){
            if(!isset($_SESSION['AdminId']))
            {
                header("location:".$_SESSION['projectName']."/admin/Home/Login");
            }
            $this->ProductModel=$this->model("ProductModel");
            $this->CateModel=$this->model("CategoryModel");
            $this->DepartModel=$this->model("DepartmentModel");
            $this->BrandModel=$this->model("BrandModel");
        }
        

        function Index($cateId = 0, $pageProduct = 1){
            $listDepart = json_decode($this->DepartModel->getDepartments("`DepartId`","ASC",1),true);
            $listCate = json_decode($this->CateModel->getCategories("`CateId`","ASC",-1,-1,1),true);
            $display=10; $begin=($pageProduct-1)*$display;
            if(isset($_POST['keyword']))
            {
                $listProduct=json_decode($this->ProductModel->getProductsByKeyWord($_POST['keyword'],0,-1,-1,"`CrDateTime`","DESC",$begin,$display,1),true);
                $sumProduct = json_decode($this->ProductModel->getSumProductsOfSearch($_POST['keyword'],0,-1,-1,1),true);
            }
            else
            {
                if($cateId == 0){
                    $listProduct = json_decode($this->ProductModel->getProductsByOrder("`CrDateTime`","DESC",$begin,$display,1),true);
                    $sumProduct = json_decode($this->ProductModel->getSumProductsByOrder(1),true);
                }
                else
                {
                    $listProduct = json_decode($this->ProductModel->getProductsByCateId($cateId,0,-1,-1,"`CrDateTime`","DESC",$begin,$display,1),true);
                    $sumProduct = json_decode($this->ProductModel->getSumProductsOfCate($cateId,0,-1,-1,1),true);
                }
            }
            
            $sumPageProduct = ceil($sumProduct/$display);

            $this->view("layout2",array(
                "page" => "product",
                "listDepart" => $listDepart,
                "listCate" => $listCate,
                "listProduct" => $listProduct,
                "pageProduct" => $pageProduct,
                "sumPageProduct" => $sumPageProduct,
                "cateId" => $cateId
            ));
        }
        function Create(){
            $listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC",1),true);
            $listBrand = json_decode($this->BrandModel->getAllBrand("`BrandName`","ASC"),true);
            
            $this->view("layout2",array(
                "page" => "product_add",
                "listDepart" => $listDepart,
                "listBrand" => $listBrand
            ));
        }
        function Update($id){
            $Product = json_decode($this->ProductModel->getProductById($id),true);
            $listImg = json_decode($this->ProductModel->getProductImgs($id),true);
            $listDepart = json_decode($this->DepartModel->getDepartments("`Order`","ASC",1),true);
            $listBrand = json_decode($this->BrandModel->getAllBrand("`BrandName`","ASC"),true);
            $Cate = json_decode($this->CateModel->getCategoryById($Product['CategoryId']),true);

            $this->view("layout2",array(
                "page" => "product_upd",
                "listDepart" => $listDepart,
                "Product" => $Product,
                "listBrand" => $listBrand,
                "DepartId" => $Cate['DepartId'],
                "listImg" => $listImg
            ));
        }
        function Delete()
        {
            if(isset($_POST['productId'])){
                $productId = $_POST['productId'];
                echo $this->ProductModel->deleteProductById($productId);
            }
        }
        function XuLyThem(){
            if(isset($_POST['createProduct'])){
                $id=$_POST['id'];
                $name = $_POST['name'];
                $cateId = $_POST['cateId'];
                $img = $_FILES['img'];
                $img1 = $_FILES['img1'];
                $img2 = $_FILES['img2'];
                $img3 = $_FILES['img3'];
                $desc = $_POST['desc'];
                $active = $_POST['active'];
                $brandid=$_POST['brandid'];
                $price = $_POST['price'];
                $priceOfMarket=$_POST['priceOfMarket'];
                $qty = $_POST['qty'];
                $point = $_POST['point'];
                $meta_title=$_POST['meta_title'];
                $meta_des = $_POST['meta_des'];
                $meta_keyword = $_POST['meta_keyword'];
                $url = $_POST['url'];

                $kq = json_decode($this->ProductModel->getProductByUrl($url),true);
                if($kq==null){
                    $img_url = NULL;
                    if($img['name']!=''){
                        $img_url = $url.substr($img['name'],-4,4);
                        copy($img['tmp_name'],$_SESSION['projectName']."/lib/images/product/".$img_url);
                    }
                    $img1_url = NULL;
                    if($img1['name']!=''){
                        $img1_url = $url."-1".substr($img1['name'],-4,4);
                        copy($img1['tmp_name'],$_SESSION['projectName']."/lib/images/product/".$img1_url);
                    }
                    $img2_url = NULL;
                    if($img2['name']!=''){
                        $img2_url = $url."-2".substr($img2['name'],-4,4);
                        copy($img2['tmp_name'],$_SESSION['projectName']."/lib/images/product/".$img2_url);
                    }
                    $img3_url = NULL;
                    if($img3['name']!=''){
                        $img3_url = $url."-3".substr($img3['name'],-4,4);
                        copy($img3['tmp_name'],$_SESSION['projectName']."/lib/images/product/".$img3_url);
                    }
                    
                    if($this->ProductModel->addProduct($cateId,$name,$img_url,$img1_url,$img2_url,$img3_url,$desc,$price,$priceOfMarket,$point,$brandid,$qty,$active,$meta_title,$meta_des,$meta_keyword,$url))
                    {
                        echo "<script>
						alert('Thêm Sản Phẩm thành công!');
						setTimeout(function(){
							window.location = '".$_SESSION['projectName']."/admin/Product';
						}, 1500);
					    </script>";
                    }
                    else
                    {
                        header("location:".$_SESSION['projectName']."/admin/Product/Create");
                    }
                }
                else
                {
                    header("location:".$_SESSION['projectName']."/admin/Product/Create");
                }
            }
        }

        function checkUrl(){
            if(isset($_POST['url']))
            {
                $url = $_POST['url'];

                $kq = json_decode($this->ProductModel->getProductByUrl($url),true);
                if($kq!=null){
                    echo 0;
                }
                else 
                {
                    echo 1;
                }
            }
        }
        function XulySua(){
            if(isset($_POST['updateProduct'])){
                $id = $_POST['id'];
                $name = $_POST['name'];
                $cateId = $_POST['cateId'];
                $oldimg = $_POST['oldimg'];
                $img = $_FILES['img'];
                $oldimg1 = $_POST['oldimg1'];
                $img1 = $_FILES['img1'];
                $oldimg2 = $_POST['oldimg2'];
                $img2 = $_FILES['img2'];
                $oldimg3 = $_POST['oldimg3'];
                $img3 = $_FILES['img3'];
                $desc = $_POST['desc'];
                $active = $_POST['active'];
                $brandid=$_POST['brandid'];
                $price = $_POST['price'];
                $priceOfMarket=$_POST['priceOfMarket'];
                $qty = $_POST['qty'];
                $point = $_POST['point'];
                $meta_title=$_POST['meta_title'];
                $meta_des = $_POST['meta_des'];
                $meta_keyword = $_POST['meta_keyword'];
                $url = $_POST['url'];

                $kq = json_decode($this->ProductModel->getProductByUrl($url),true);
                if($kq==null || $kq['ProductId']==$id){
                    $img_url = $oldimg;
                    if($img['name']!=''){
                        unlink($_SESSION['projectName']."/lib/images/product/".$img_url);
                        $img_url = $url.substr($img['name'],-4,4);
                        copy($img['tmp_name'],$_SESSION['projectName']."/lib/images/product/".$img_url);
                    }
                    $img1_url = $oldimg1;
                    if($img1['name']!=''){
                        unlink($_SESSION['projectName']."/lib/images/product/".$img1_url);
                        $img1_url = $url."-1".substr($img1['name'],-4,4);
                        copy($img1['tmp_name'],$_SESSION['projectName']."/lib/images/product/".$img1_url);
                    }
                    $img2_url = $oldimg2;
                    if($img2['name']!=''){
                        unlink($_SESSION['projectName']."/lib/images/product/".$img2_url);
                        $img2_url = $url."-2".substr($img2['name'],-4,4);
                        copy($img2['tmp_name'],$_SESSION['projectName']."/lib/images/product/".$img2_url);
                    }
                    $img3_url = $oldimg3;
                    if($img3['name']!=''){
                        unlink($_SESSION['projectName']."/lib/images/product/".$img3_url);
                        $img3_url = $url."-3".substr($img3['name'],-4,4);
                        copy($img3['tmp_name'],$_SESSION['projectName']."/lib/images/product/".$img3_url);
                    }
                    
                    if($this->ProductModel->addProduct($cateId,$name,$img_url,$img1_url,$img2_url,$img3_url,$desc,$price,$priceOfMarket,$point,$brandid,$qty,$active,$meta_title,$meta_des,$meta_keyword,$url))
                    {
                        echo "<script>
						alert('Thêm Sản Phẩm thành công!');
						setTimeout(function(){
							window.location = '".$_SESSION['projectName']."/admin/Product';
						}, 1500);
					    </script>";
                    }
                    else
                    {
                        header("location:".$_SESSION['projectName']."/admin/Product/Create");
                    }
                }
                else{
                    header("location:".$_SESSION['projectName']."/admin/Product/Create");
                }
            }
        }
    }
?>