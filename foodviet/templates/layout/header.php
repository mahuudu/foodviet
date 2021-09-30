
<head>
  <base href="http://localhost:8080/foodviet/">
  <title> Foodviet</title>
  <meta charset="UTF-8"  >

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i&amp;subset=vietnamese" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="css/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="css/bs/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="js/toast/toastr.min.css">
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/bs/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/slick.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="js/sweetalert2.all.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="js/toast/toastr.min.js"></script>
</head>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=652289215127099&autoLogAppEvents=1" nonce="QF1mRgrr"></script>
<header id="header">

  <?php
  include('templates/pages/menumobile/menu-mobile.php');
  ?>
  <div class="header">
    <div class="topbar">
      <div class="container">
        <div class="topbar-content">
          <a href="https://www.foody.vn" class="current" rel="home">Home</a>
          <a href="#" target="_blank" rel="nofollow">Đặt Bàn</a>
          <a href="?action=loginShip" target="_blank" rel="nofollow">Kênh shiper</a>
          <a href="?action=registerShip" target="_blank" rel="nofollow">Become shiper</a>
          <a href="?action=listCart" target="_blank" rel="nofollow">Cart</a>
        </div>
      </div>
    </div>
    <div class="top-header">
      <div class="container">
        <div class="row">
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
            <div class="top-logo">
              <?php
              require_once ('controller/controller.php');
              $controller = new Controller();
              $link = $controller->logo();
              ?>
              <a href="?action=">
                <img src="uploads/logo/<?= $link ?>" />
              </a>
            </div>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
           <div class="box-search">
            <div class="search-form-product">
             <form role="search" method="POST" class="woocommerce-product-search" action="?action=searchProduct">
              <div class="input-search">

                <input type="search" id="woocommerce-product-search-field-1" class="search-input search-field" placeholder="Gõ từ khóa tìm kiếm" value="" name="key">
                <button class="icon-search" type="submit" value="Tìm kiếm">
                  <i class="fa fa-search" aria-hidden="true"></i>

                </button>
                <input type="hidden" name="post_type" value="product">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
        <div class="user-nav-menu right d-flex">
          <div class="header-apps">
           
            <?php  if (isset($_SESSION['ship'])) {
              ?>
             <a href="?action=detailAcountShip" class="btn"> 
                <span class="fa fa-mobile"></span>
                <?php echo $_SESSION['ship']['username']; ?>
              </a> 
              <?php 
            }else{ ?>
              <a href="?action=loginShip" class="btn" target="_blank"><span class="fa fa-mobile"></span>&nbsp;Login Ship</a>
              <?php 
            }
            ?>
          </div>

          <?php
          if(!isset($_SESSION))
          {
            session_start();
          }
          ?>

          <?php
          if (isset($_SESSION['current_user'])) {
            ?>
            <div class="nav-item user-panel">
             <span class="btn bg-light-gray  btn-login"> 
               <a href="?action=detailAcount"> 
                <?php echo $_SESSION['current_user']['username']; ?> </a> 
              </span>
            </div>
            <div class="nav-item user-panel">
              <span class="btn bg-light-gray  btn-login"> 
               <a class="button-login" href="?action=doLogout">Đăng xuất </a>
             </span>
           </div>
           <?php 
         }else{ ?>
           <div class="nav-item user-panel">
            <span class="btn bg-light-gray  btn-login"> 
             <a class="button-login" href="?action=login">Đăng nhập </a>
           </span>
         </div>
         <div class="nav-item user-panel">
          <span class="btn bg-light-gray  btn-login"> <a href="?action=register" class="button-register">Đăng ký</a> </span>
        </div>
        
        <?php 
      }
      ?>
      <div class="left">
        <div class="cart">
          <a href="?action=listCart" class="btn">
            <i class="fa fa-shopping-cart"></i>
            Giỏ hàng
          </a>
        </div>

      </div>
    </div>

  </div>

</div>
</div>
</div>

</div>
<?php if (!empty($slide)) {?>
 <div class="slider-slick">
  <div class="slider center custom-slider">       

    <?php $stt=1;  foreach($slide as $value)  { ?>
      <div class="slide">
       <img class="cl"  src="uploads/slide/<?php echo $value['slide_link']; ?>"> 
       <div class="banner-caption">
        <div class="banner-caption-name">
            Now Foodviet
        </div>
        <div class="banner-caption-desc">
          <p>Không gian chill - món Thái chất</p>
        </div>
      </div>
    </div>
    <?php 
  }
  ?>

</div>
</div>
<?php
}
?>
</header>
