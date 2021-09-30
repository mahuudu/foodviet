
<?php
function makeUrl($string) {
    $string = trim($string);
    $string=str_replace(" ", "-", $string);
    $string=str_replace("+", "plus", $string);
    $string=str_replace("/", "", $string);
    $string = strtolower($string);
    $string=preg_replace("/(đ|Đ)/", "d", $string);
    $string=str_replace("S", "s", $string);
    $string=preg_replace('/(á|à|ã|ạ|ả|ă|ằ|ắ|ẵ|ẳ|ặ|â|ầ|ấ|ẩ|ậ|ẫ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ẳ|Ặ|Ẵ|Â|Ầ|Ấ|Ẫ|Ẩ|Ậ|Ằ)/', 'a', $string);
    $string=preg_replace("/(é|ẽ|ẻ|ẹ|ê|ế|ễ|ể|ệ|É|È|Ẽ|Ẻ|Ẹ|Ê|Ế|Ễ|Ể|Ệ|è|Ề|ề)/", "e", $string);
    $string=preg_replace("/(í|ỉ|ị|ĩ|j|Í|Ỉ|Ĩ|Ị|ì|Ì)/", "i", $string);
    $string=preg_replace("/(ó|ọ|õ|ỏ|ô|ố|ộ|ổ|ỗ|ơ|ỡ|ở|ợ|ớ|Ó|Ọ|Õ|Ỏ|Ô|Ố|Ổ|Ỗ|Ộ|Ơ|Ợ|Ở|Ớ|Ở|ò|Ò|ồ|Ồ|ờ|Ờ)/", "o", $string);
    $string=preg_replace("/(ú|ủ|ụ|ũ|ư|ứ|ử|ự|ữ|Ú|Ủ|Ụ|Ũ|Ư|Ự|Ử|Ứ|Ữ|ù|Ù|ừ|Ừ)/", "u", $string);
    $string=preg_replace("/(ý|ỵ|ỹ|ỷ|Ý|Ỵ|Ỹ|Ỷ|ỳ|Ỳ)/", "y", $string);
    return $string;
}
?>
<head>
    <base href="http://localhost:8080/foodviet/">
    <title>foodviet</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i&amp;subset=vietnamese" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bs/css/bootstrap.min.css">
    <script type="text/javascript" src="js/bs/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/sweetalert2.all.min.js"></script>
</head>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=652289215127099&autoLogAppEvents=1" nonce="QF1mRgrr"></script>
<header id="header">
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

          <a href="?action=">
            <img src="uploads/logo/logo.png" />
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
>
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


    <div class="container">
        <div style="min-height: 200px; height: 200px; padding-top: 50px" class="text-center">
            <div class="row">
                <div class="col-md-12 col-12 col-sm-12 col-lg-12 ">
                    <h1 class="text-capitalize" style="color: #333"> Đặt hàng thành công !</h1>
                    <a href="?aciton=index" class="btn-info btn">
                        Quay lại trang chủ 
                    </a>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer">
        <div class="hidden-mobile">
            <div class="top-footer">
                <div class="container">
                    <div class="column">
                        <p>Thông tin chung</p>
                    </div>
                    <div class="column">
                        <p>Chính sách chung</p>
                    </div>
                    <div class="column">
                        <p>Hỗ trợ khách hàng</p>
                    </div>
                    <div class="column">
                        <p>Thanh toán an toàn</p>
                    </div>
                </div>
            </div>
            <div class="mid-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 footer-block">
                            <div class="footer-block-menu">
                                <a href="?action=archiveCategory">
                                    Tin tức
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 footer-block">

                            <div class="footer-block-menu">
                                <a href="?action=archiveCategory">
                                    Tin tức
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 footer-block">
                            <div class="footer-block-menu">
                                <a href="?action=archiveCategory">
                                    Tin tức
                                </a>
                            </div>

                        </div>
                        <div class="col-sm-6 col-md-3 footer-block">
                            <div class="footer-block-menu">
                                <a href="?action=archiveCategory">
                                    Tin tức
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer hidden-mobile">
                <div class="container">
                    <div class="row">
                        <div class="column col-md-4 col-lg-4 col-xl-4 col-sm-4">
                            <div class="map">
                                <div style="text-decoration:none; overflow:hidden;max-width:100%;width:300px;height:150px;"><div id="mymap-display" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=35+Nguyễn+Kiệm+-+Phường+3+-+Quận+Gò+Vấp&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="googlemap-code-enabler" href="https://www.embed-map.com" id="getdata-formap">https://www.embed-map.com</a><style>#mymap-display img{max-height:none;max-width:none!important;background:none!important;}</style></div>
                            </div>
                        </div>
                        <div class="column column-50 col-md-5 col-lg-5 col-xl-5 col-sm-12">
                         <div class="footer_info">
                          <p><strong class="title-foodviet">Foodviet - Hệ thông giao hàng nhanh </strong><br>
                          &nbsp;</p>

                          <p>- Địa chỉ<strong>: </strong> số 51 ngõ 59 Mễ Trì - Nam Từ Liêm</p>

                          <p>-&nbsp;<strong>Hotline: <a href="tel:0365563535">036.5563.535</a> - <a href="tel:0365563535">036.5563.535</a></strong></p>

                          <p>-&nbsp;<strong>Email: </strong><a href="mailto:mahuudunt@gmail.com">mahuudunt@gmail.com</a></p>

                          <p>-&nbsp;<strong>Website:</strong>&nbsp;foodviet.com</p>

                          <p>-&nbsp;<strong>Fanpage: </strong><a href="https://www.facebook.com/mahuudu98">https://www.facebook.com/mahuudu98</a></p>
                      </div>
                      <div class="column column-50 col-md-3 col-lg-3 col-xl-3 col-sm-3">
                        <div class="fan_page">
                            <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="" data-height="200" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="hidden-pc">
        <div class="top-ft">
            <p>Hỗ trợ 24/7</p>
            <p>Thanh toán bảo mật</p>
        </div>
        <div class="mid-ft">
            <ul class="menu-footer">
                <li data-toggle="collapse" data-target="#ft-1">
                    <span>Thông tin chung</span>
                    <i class="fa fa-caret-down"></i>

                    <div id="ft-1" class="collapse">
                      <a href="?action=archiveCategory">
                        Tin tức
                    </a>
                </div>
            </li>
            <li data-toggle="collapse" data-target="#ft-2">
                <span>Chính sách chung</span>
                <i class="fa fa-caret-down"></i>

                <div id="ft-2" class="collapse">
                  <a href="?action=archiveCategory">
                    Tin tức
                </a>
            </div>
        </li>
        <li data-toggle="collapse" data-target="#ft-3">
            <span>Hỗ trợ khách hàng</span>
            <i class="fa fa-caret-down"></i>

            <div id="ft-3" class="collapse">
              <a href="?action=archiveCategory">
                Tin tức
            </a>
        </div>
    </li>
    <li data-toggle="collapse" data-target="#ft-4">
        <span>Thanh toán an toàn</span>
        <i class="fa fa-caret-down"></i>

        <div id="ft-4" class="collapse">
          <a href="?action=archiveCategory">
            Tin tức
        </a>
    </div>
</li>
</ul>
</div>
<div class="bot-ft">
    <p>THÔNG TIN</p>

</div>

</div>
</footer>

<div class="footer-bottom">
    <div class="container">
        <div class="col-sm-12 text-center">
            <div id="copyright">
                Copyright © 2019. <a href="https://samivietnam.com/thiet-ke-web-thai-nguyen/" target="_blank">
                Thiết kế web Thái Nguyên</a>
            </div>
        </div>
    </div>
</div>



</div> <!-- #site-outer-wrap -->

<div class="socical-icons hidden-mobile">
    <ul>

        <li>
            <a href="tel:0365563553" title="Liên hệ với hotline">
                <i class="fas fa-phone"></i>
            </a>
        </li>
        <li class="for-pc">
           <a data-toggle="modal" data-target="#myModal"  class="fancybox">
            <i class="fa fa-location-arrow"></i>
        </a>
    </li>
    <li class="for-pc">
        <a href="https://www.facebook.com/mahuudu98 ?>" target="_blank" title="Fanpage">
           <i class="fab fa-facebook"></i>
       </a>
   </li>
   <li class="for-pc">
    <a href="https://www.youtube.com/channel/UCN--fbnlWAyCZ7G-5yOSO9g?view_as=subscriber" target="_blank" title="Kênh Youtube">
        <i class="fab fa-youtube"></i>
    </a>
</li>

</ul>
</div>
<!-- <button type="button" class="btn  btn-lg btn-lienhe blue-gradient" data-toggle="modal" data-target="#myModal">Gửi liên hệ</button> -->
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
            <?php require_once ('templates/pages/contact/contact.php'); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </div>

</div>
</div>

<div id="to-top">
    <a href="#top"><i class="fas fa-chevron-circle-up"></i></a>
</div>
</body>
</html>


