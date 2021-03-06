<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=$_SESSION['projectName']?>/lib/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?=$_SESSION['projectName']?>/lib/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=$_SESSION['projectName']?>/lib/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=$_SESSION['projectName']?>/lib/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=$_SESSION['projectName']?>/lib/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=$_SESSION['projectName']?>/lib/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=$_SESSION['projectName']?>/lib/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=$_SESSION['projectName']?>/lib/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="javascript:void()" class="nav-link"><img src="<?=$_SESSION['projectName']?>/lib/images/logo.png" style="width:100px; height:35px" /></a>
      </li>
    </ul>   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
	  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user-shield"></i> &nbsp;Quản Trị Viên
        </a>        
      </li> 
      <li class="nav-item dropdown">
        <a href="<?=$_SESSION['projectName']?>/admin/Home/Logout" class="nav-link" data-toggle="dropdown">
          <i class="fas fa-sign-out-alt"></i> Đăng Xuất
        </a>        
      </li>           
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class="far fa-grin-alt" style="color:white; font-size: 18px; margin-top: 7px"></i>
        </div>
        <div class="info">
          <a href="#" class="d-block">Hi, <?=$_SESSION['AdminName']?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?=$_SESSION['projectName']?>/admin/Department" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Chủng Loại                
              </p>
            </a>            
          </li>  
		  <li class="nav-item has-treeview">
            <a href="<?=$_SESSION['projectName']?>/admin/Category" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Thể Loại                
              </p>
            </a>            
          </li> 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li>                                                       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper"> -->
    <!-- Main content -->
  <?php 
		require_once("./mvc/views/".$_SESSION['area']."pages/".$data['page'].".php");
	?>
    <!-- /.content -->	
  <!-- </div> -->
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="position:fixed; bottom:0; overflow:hidden; width:100%">
            <span style="margin-left:33%">
                <strong>&copy; Copyright by DuyTran IT - Emmanuel</strong>               
            </span>
  </footer> 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=$_SESSION['projectName']?>/lib/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=$_SESSION['projectName']?>/lib/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=$_SESSION['projectName']?>/lib/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=$_SESSION['projectName']?>/lib/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=$_SESSION['projectName']?>/lib/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=$_SESSION['projectName']?>/lib/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=$_SESSION['projectName']?>/lib/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=$_SESSION['projectName']?>/lib/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=$_SESSION['projectName']?>/lib/plugins/moment/moment.min.js"></script>
<script src="<?=$_SESSION['projectName']?>/lib/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=$_SESSION['projectName']?>/lib/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=$_SESSION['projectName']?>/lib/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=$_SESSION['projectName']?>/lib/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$_SESSION['projectName']?>/lib/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=$_SESSION['projectName']?>/lib/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=$_SESSION['projectName']?>/lib/dist/js/demo.js"></script>

<script>
  
  function convertUrlString(str) {
    str = str.toLowerCase();
      var AccentsMap = [
          "aàảãáạăằẳẵắặâầẩẫấậ",
          "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ",
          "dđ", "DĐ",
          "eèẻẽéẹêềểễếệ",
          "EÈẺẼÉẸÊỀỂỄẾỆ",
          "iìỉĩíị",
          "IÌỈĨÍỊ",
          "oòỏõóọôồổỗốộơờởỡớợ",
          "OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ",
          "uùủũúụưừửữứự",
          "UÙỦŨÚỤƯỪỬỮỨỰ",
          "yỳỷỹýỵ",
          "YỲỶỸÝỴ"
      ];
      for (var i = 0; i < AccentsMap.length; i++) {
          var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g');
          var char = AccentsMap[i][0];
          str = str.replace(re, char);
      }
    str = str.replace(/ /g,'-');
      return str;
  }
</script>
</body>
</html>
