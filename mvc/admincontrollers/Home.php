<?php
    class Home extends Controller{
        public $AdminModel;
        function __construct(){
            $this->AdminModel = $this->model("AdminModel");
        }
        function Index(){
            header("location:".$_SESSION['projectName']."/admin/Department");
        }
        function Login($thongbao=0){
            switch($thongbao){
                case 1:
                    $thongbao = "Sai Mật Khẩu!";
                    break;
                case 2:
                    $thongbao = "Sai Tài Khoản";
                    break;
                default:
                    $thongbao = "";
                    break;
            }
            $this->view("login",array (
                "thongbao"=>$thongbao
			));
        }
        function XuLyDangNhap()
        {
            if(isset($_POST['login'])){
                $email = $_POST['email'];
                $password = $_POST['password'];

                $admin = json_decode($this->AdminModel->getAdminByEmail($email),true);
                if($admin != null)
                {
                    if(password_verify($password,$admin['Password']))
                    {
                        $_SESSION['AdminId']=$admin['AdminId'];
                        $_SESSION['AdminName']=$admin['AdminName'];

                        header("location:".$_SESSION['projectName']."/admin/Home/Index");
                    }
                    else
                    {
                        header("location:".$_SESSION['projectName']."/admin/Home/Login/1");
                    }
                }
                else
                {
                    header("location:".$_SESSION['projectName']."/admin/Home/Login/2");
                }
            }
            else
            {
                header("location:".$_SESSION['projectName']."/admin/Home/Login");
            }
        }
        function Logout()
        {
            if(isset($_SESSION['AdminId']))
            {
                unset($_SESSION['AdminId']);
                unset($_SESSION['AdminName']);
            }
            header("location:".$_SESSION['projectName']."/admin/Home/Login");
        }
        function createPasswordString($password = ""){
            if($password != "")
            {
                echo password_hash($password,PASSWORD_DEFAULT);
            }
        }
    }
?>