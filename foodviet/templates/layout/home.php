
<!DOCTYPE html>
<html>

<?php
include_once('header.php');
?>
<body>
  <div class="content">
<!--     <div class="top-banner">
      <div class="wrapper">
        <div class="search-box">
         <form role="search" method="POST" class="woocommerce-product-search" action="?action=searchProduct">
          <span class="btn bg-transparent text-blue btn-search btn-link">
            <button class="icon-search" type="submit" value="Tìm kiếm">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </span>
          <input type="text" class="search-box-input" placeholder="Tìm quán ăn, trà sữa yêu thích để đặt Loship giao ngay" name="key" value="">
          <input type="hidden" name="post_type" value="product">
        </form>

      </div>
    </div>
  </div> -->
<!--   <div class="sliders mb-20 mt-3">
    <div class="container">
     <div class="slider">      
       <?php if (!empty($slide)) {?>
        <?php $stt=1;  foreach($slide as $value)  { ?>
          <div class="item">
           <img style="max-width: 100%" height="250px" src="uploads/slide/<?php echo $value['slide_link']; ?>"> 
         </div>
         <?php 
       }
       ?>
       <?php
     }
     ?>
   </div>
 </div>
</div> -->
<div class="menu-category container">
 <div class="title">
  <div class="title"><h2>Chọn theo thể loại</h2></div>
</div>
<?php
    include('templates/pages/sidebar.php');
?>
</div>
<div class="container">
  <div class="content-product gradient-border" id="box">
    <div class="n-header">
      <div class="avatar-box">
        <div class="avatar">
        </div>
        <div class="title"><a class="text-title" href="?action=categoryProductNews"> Khám phá đồ ăn mới</a></div>
      </div>
    </div>
    <div class="list-item">
      <div class="row row-cols-5">
       <?php foreach ($arrayproduct as $key => $value) { ?>
         <li class="col-lg-15 col-md-15 col-sm-15 col-xs-6 box-product">
          <div class="box-item">
            <div class="box-item-image">
              <a href="?action=singleProduct&id=<?= $value['id'] ?>" >
                <div class="image">
                  <img width="802" height="615" src="uploads/image/<?php echo $value['image_link']; ?>">                </div>
                </a>

              </div>

              <div class="box-item-adding">   
                <div class="box-item-title">
                  <a href="?action=singleProduct&id=<?= $value['id'] ?>" tabindex="0">
                    <?php echo $value['name_product'] ?>
                  </a>
                </div>

                <div class="box-item-price">
                  <a href="?action=singleProduct&id=<?= $value['id'] ?>">
                    <span class="price"><span class="woocommerce-Price-amount amount">
                      <?php if ($value['discount'] > 0) { ?>
                        <?php echo number_format($value['discount']); ?>
                        <?php
                      }else{?>
                        <?php echo number_format($value['price']); ?> VNĐ
                      <?php }?> 
                      <span class="woocommerce-Price-currencySymbol">₫</span></span></span>
                    </a>
                  </div>
                   <div class="on_sale">
                    <?php if ($value['discount'] > 0) { ?>
                        <span class="on_sale" style="">- <?php echo ceil((($value['price']-$value['discount'])/$value['price'])*100)."%"?>
                      </span>
                    <?php } ?>
                    </div> 
                </div>
              </div>

            </li>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="product_4">
      <?php foreach ($arrayproduct2 as $key => $cat) {?>
        <div class="box box-border gradient-border">
         <div class="the-heading ">
          <div class="the-heading-title ">
           <?php $num = 0; foreach ($cat as $value) { $num++ ?>
            
              <a href="?action=categoryProduct&id=<?= $value['category_id'] ?>">
              <?php } ?>
              <?php echo $key; ?>
            </a>
          </div>

          <span class="list-all">
           <?php $num = 0; foreach ($cat as $value) { $num++ ?>
            <?php if ($num == 2 ){ break; ?>
            <?php }else{ ?> 
              <a class="view-all" href="?action=categoryProduct&id=<?= $value['category_id'] ?>" title="Xem tất cả">
              <?php }} ?>
              Xem tất cả
              <i class="fa fa-angle-double-right" aria-hidden="true">
              </i>
            </a>
          </span>
        </div>


        <div class="row pd-15">
         <?php foreach ($cat as $value) { ?>
          <li class="col-lg-15 col-md-15 col-sm-15 col-xs-6 box-product box-4" style="width: 100%; display: inline-block;">
            <input type="hidden" value="<?= $cat['category_id'] ?>">
            <div class="box-item">
              <div class="box-item-image">
                <a href="?action=singleProduct&id=<?= $value['id'] ?>" >
                  <div class="image">
                    <img width="802" height="615" src="uploads/image/<?php echo $value['image_link']; ?>">                </div>
                  </a>

                </div>

                <div class="box-item-adding">   
                  <div class="box-item-title">
                    <a href="?action=singleProduct&id=<?= $value['id'] ?>" tabindex="0">
                      <?php echo $value['name_product'] ?>
                    </a>
                  </div>

                  <div class="box-item-price">
                    <a href="?action=singleProduct&id=<?= $value['id'] ?>">
                     <span class="price">
                      <?php if ($value['discount'] > 0) { ?>
                        <ins>
                          <span class="woocommerce-Price-amount amount"><?php echo number_format($value['discount']); ?><span class="woocommerce-Price-currencySymbol">₫</span></span>
                        </ins>

                        <del class="price">
                          <span class="woocommerce-Price-amount amount">  <?php echo number_format($value['price']); ?> 
                        </span>

                      </del>
                      <div class="on_sale">
                        <?php if ($row['discount'] < 0) { ?>
                        <span class="on_sale" style="">- <?php echo ceil((($value['price']-$value['discount'])/$value['price'])*100)."%"?>
                      <?php } ?>
                      </span>

                    </div>
                    <?php
                  }else{?>
                    <p style="color: #f06560" class="price"><?php echo number_format($value['price']); ?></p>
                  <?php }?>
                </span>
              </a>
            </div>
            <div class="on_sale">
                <div class="on_sale">
                    <?php if ($value['discount'] > 0) { ?>
                        <span class="on_sale" style="">- <?php echo ceil((($value['price']-$value['discount'])/$value['price'])*100)."%"?>
                      </span>
                    <?php } ?>
                    </div> 
               
            </div>  
          </div>
        </div>

      </li>
    <?php } ?>
  </div>
</div>
<?php } ?>
</div>
</div>
<div class="bg-white">
  <div class="container">
  <div class="register-shiper section-newsfeed wrap-section-chien-binh-loship">
    <div class="title"><h2>Trở thành Chiến binh Foodviet ngay hôm nay!</h2></div>
    <div class="section-chien-binh-loship">
      <div class="linear-bg"></div><div class="content">
        <h3>Trở thành chiến binh Foodviet - nhanh và miễn phí</h3>
        <p>Dễ dàng trở thành chiến binh của Foodviet</p><p>Foodviet - ứng dụng giao trà sữa trong vòng 1 giờ - với xe máy của chính mình và điện thoại Android hoặc iPhone.</p>
      </div>
        <div>
          <a class="btn bg-red text-white btn-banner" href="?action=registerShip" target="_blank">Đăng ký ngay!</a>
        </div>
        </div>
  </div>
</div>

</div>

         <div class="footer-down-app-wrap" style="margin-top:0;background: #eeeeee;position: relative;z-index: 11;">
    <div class="footer-down-app container">
        <div class="footer-intro-app">Tìm địa điểm trên đường đi? Tải app Foodviet!</div>
        <div class="row">
          
          
            <div class="col-md-3">
                <div class="thong-ke">
                    Thống kê
                </div>
                <div class="footer-down-stats">
                    <div class="footer-down-stats-header">33,384 Địa điểm</div>
                    <div class="footer-down-stats-desc">toàn quốc</div>
                </div>
                <div class="footer-down-stats">
                    <div class="footer-down-stats-header">630 người sử dụng</div>
                    <div class="footer-down-stats-desc">trong &amp; ngoài nước</div>
                </div>
                <div class="footer-down-stats">
                    <div class="footer-down-stats-header">481,841 bình luận</div>
                    <div class="footer-down-stats-desc">đã chia sẻ</div>
                </div>
                <div class="footer-down-stats">
                    <div class="footer-down-stats-header">608 check-in</div>
                    <div class="footer-down-stats-desc">đã thực hiện</div>
                </div>
                <div class="footer-down-stats">
                    <div class="footer-down-stats-header">10,232 hình ảnh</div>
                    <div class="footer-down-stats-desc">được tải lên</div>
                </div>
                <div class="footer-down-stats">
                    <div class="footer-down-stats-header">376 Bộ sưu tập</div>
                    <div class="footer-down-stats-desc">bộ sưu tập được tạo</div>
                </div>

            </div>
            <div class="col-md-9">
              <div class="ft-phone">

                      <a class="ft-phone-a">
                          <span class="ft-phone-span" style="">iOS App</span>
                          <img src="images/ios-footer.png" alt="App Foody iOS" title="App Foody iOS">
                      </a>
                      <a class="ft-phone-a">
                                <span class="ft-phone-span" style="">iOS App</span>
                          <img  src="images/android-footer.png" alt="App Foody Android" title="App Foody Android">
                      </a>
                     <a class="ft-phone-a">
                               <span class="ft-phone-span" style="">iOS App</span>
                          <img src="images/windows-footer.png" alt="App Foody WindowPhone" title="App Foody WindowPhone">
                      </a>

              </div>
            </div>
          </div>
    </div>
</div>
<a href="#" class="hidden scroll-to-top"><i class="fa fa-angle-up"></i></a>
<?php
include_once('templates/layout/footer.php');
?>
</body>
</html>