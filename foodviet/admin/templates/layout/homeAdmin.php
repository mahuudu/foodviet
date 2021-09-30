<?php
require_once('templates/layout/headerAdmin.php');
?>

 

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
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
  <div class="">
   <section class="content">

          <?php
          require_once('controller/controller.php');
          $home = new AdminController();
          $home-> dashBoard();
          ?>
 

   </section>
   <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php
require_once('templates/layout/footerAdmin.php');
?>

</body>
</html>
