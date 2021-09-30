
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" type="text/css" href="../css/bs/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/custom.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
   <!-- Date datatable -->
  <link rel="stylesheet" href="dist/js/plugins/datatable/jquery.dataTables.css">
  <!-- ddd picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="?action=" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="?action=" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">
                <?php
                if (isset($_SESSION['current_admin'])) {
                  ?>
                  <a href="#" class="d-block">
                    <?php echo $_SESSION['current_admin']['username'];

                    ?>
                  </a>
                  <?php
                }else{
                 header('location: http://localhost/thuctap/admin');
               }
               ?>
             </a>
           </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview menu-open">
            <a href="?action=dashBoard" class="nav-link">
              <i class="fa fa-dashcube" aria-hidden="true"></i>
              <p>
                Dashboard
              </p>
            </a>
         
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>
                  Sản phẩm
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?action=listProductAdmin" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Danh Sách</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?action=addProductAdmin" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Thêm</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>
                  Danh mục sản phẩm
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?action=listCategoryAdmin" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Danh Sách</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?action=addCategoryProductAdmin" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Thêm</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>
                    Thương hiệu
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?action=listProducerAdmin" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Danh Sách</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?action=addProducerAdmin" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Thêm</p>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="nav-item">
              <a href="?action=listOrder" class="nav-link">
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                Đơn hàng
              </a>
            </li>
            <li class="nav-item">
              <a href="?action=slide" class="nav-link">
               <i class="fa fa-sliders" aria-hidden="true"></i>
                Slide
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?action=slide" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Danh sách</p>
                  </a>
                  <a href="?action=addSlide" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Thêm</p>
                  </a>
                </li>

              </ul>
            </li>
            <li class="nav-item">
              <a href="?action=listNews" class="nav-link">
               <i class="fa fa-file" aria-hidden="true"></i>
                Tin Tức
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?action=listNews" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Danh sách</p>
                  </a>
                  <a href="?action=addNews" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Thêm</p>
                  </a>
                </li>

              </ul>
            </li>
            <li class="nav-item">
              <a href="?action=listUser" class="nav-link">
                <i class="fa fa-user" aria-hidden="true"></i>
                Quản lý User
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?action=listUser" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Danh sách</p>
                  </a>

                </li>

              </ul>
            </li>
             <li class="nav-item">
              <a href="?action=listContact" class="nav-link">
               <i class="fa fa-id-card-o" aria-hidden="true"></i>
                  Liên Hệ
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?action=listContact" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Danh sách</p>
                  </a>

                </li>

              </ul>
            </li>
            <li class="nav-item">
              <a href="?action=doLogOutAdmin" class="nav-link">
               <i class="fa fa-unlock" aria-hidden="true"></i>
                  Tài khoản
              </a>
              <ul class="nav nav-treeview">
                 <li class="nav-item">
                <a href="?action=doLogOutAdmin" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                    Đăng xuất
              </a>
              </li>
               <li class="nav-item">
                <a href="?action=changePass" class="nav-link">
                   <i class="fa fa-circle-o nav-icon"></i>
                    Đổi pass
                </a>
              </li>
                 </ul>
              </li>
                <li class="nav-item">
              <a href="?action=changeLogo" class="nav-link">
               <i class="fa fa-codepen" aria-hidden="true"></i>
                  Sửa Logo
              </a>
              </li>
                  <li class="nav-item">
              <a href="?action=changefooter" class="nav-link">
             <i class="fa fa-file-o" aria-hidden="true"></i>
                  Thông tin website
              </a>
              </li>

        </ul>
         </nav> 
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <section class="content">
    <div class="container-fluid">