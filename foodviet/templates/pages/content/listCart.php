<?php
require_once ('templates/layout/header.php');
//echo "<pre/>";
//print_r($_SESSION['cart']);
?>

<div class="main container">
  <div class="table-cart">
      <!--   <?php
        if(isset($notice)){
            echo "<h2>$notice</h2>";
        }
        ?> -->
        <form action="?action=updateCart" method="POST" class="form-control">
          <?php
          if (isset($_SESSION["cart"])) {
            ?>
            <table  id="example" class="display" style="width:100%">
              <tr>
                <th>Stt</th>
                <th>Sản Phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                <th>action</th>
              </tr>
              <?php
              $total_price_cart = 0;
              ?>
              <?php if (!empty($arrayVals)): ?>

                <?php $stt=1;  foreach($arrayVals as $value)  { ?>
                  <tr>
                    <td><?= $stt++ ?></td>
                    <td class="img-cart"><img style="max-width: 100;" src="uploads/image/<?php echo $value['image_link'] ?>">
                      <span>  <a href="?action=singleProduct&id=<?= $value['id'] ?>"><?php echo $value['name_product'] ?> </a></span></td>
                      <td>

                        <?php if ($value['discount'] > 0) { ?>
                          <p class="discount_sg"><?php echo number_format($value['discount']); ?> VNĐ</p>

                          <?php
                        }else{?>
                          <p class="sg_price"><?php echo number_format($row['price']); ?> VNĐ</p>
                        <?php }?>

                      </td>
                      <td>
                        <input type="number" class="form-control" name="quantity[<?php echo $value['id']; ?>]" min="0" step="1"  
                        value="<?= $_SESSION['cart'][$value['id']]?>">
                      </td>
                      <td>
                        <?php if ($value['discount'] > 0) { ?>
                          <?php 
                          echo number_format($value['discount']* $_SESSION['cart'][$value['id']])." VNĐ";
                          $total_price_cart+=$value['discount']* $_SESSION['cart'][$value['id']];
                          ?>
                        <?php }else{ ?>
                          <?php 
                          echo number_format($value['price']* $_SESSION['cart'][$value['id']])." VNĐ";
                          $total_price_cart+=$value['price']* $_SESSION['cart'][$value['id']];
                          ?>
                        <?php }?>

                      </td>
                      <td class="action-cart"><a href="?action=deleteCart&id=<?php echo $value['id'] ?>">X</a></td>
                    </tr>
                    <?php 
                  }
                endif; 
                ?>

              </table>
              <div class="d-flex cart-ft">
                <div class="updateCart-left">
                 <input type="submit" value="updateCart" name="mode">
               </div>
               <div class="tongtien-right">
                 <div class="footer-table">
                  <ul class="list-group">
                    <li class="list-group-item">Tổng tiền thanh toán</li>
                    <li class="list-group-item">
                      <p class="total-price"> Tiền hàng :  <?php echo number_format($total_price_cart).' VNĐ'; ?>  </p>
                      <input type="hidden" name="" id="price-product" value="<?php echo $total_price_cart ?>">
                    </li>
                    <li class="list-group-item">
                      <p class="total-price"> Tiền ship <span id="kilometers"> </span> :  <span id="price-km"></span>   </p>
                    </li>
                    <li class="list-group-item">
                      <p class="total-price"> Tổng :  <span id="totalPrice"></span>  </p>
                    </li>
                    <li class="list-group-item">
                      <a href="?action=index" class="btn btn-success">Tiếp tục mua hàng</a>
                    </li>
                  </ul>
                </div>
              </div>

            </div>

          </form>

          <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 col-12 col-sm-12">


              <form action="?action=order" method="post">
                <div class="row">
                  <legend class="text-center">Thông tin đặt hàng <span class="req"></span></legend>
                  <div class="col-md-6 col-lg-6 col-xl-6 col-12">

                    <fieldset>

                      <div class="form-group">
                        <label for="lastname"><span class="req">* </span> Họ và tên: </label>

                        <?php   if (isset($_SESSION['current_user'])) { ?>
                          <input class="form-control" type="text" name="fullname" id ="txt"  value="<?php echo $_SESSION['current_user']['fullname'] ?>" placeholder="Name" required />
                          <?php
                        }else{ ?>
                          <input class="form-control" type="text" name="fullname" id = "txt"  placeholder="Name" required />
                          <?php
                        }
                        ?>

                      </div>

                      <div class="form-group">
                        <label for="email"><span class="req">* </span> Email : </label>
                        <?php   if (isset($_SESSION['current_user'])) { ?>
                          <input class="form-control" placeholder="email"  required type="text" name="email" id = "email"  value="<?php echo $_SESSION['current_user']['email'] ?>"  onchange="email_validate(this.value);" />
                          <?php
                        }else{ ?>
                          <input class="form-control" placeholder="email"  required type="text" name="email" id = "email"  onchange="email_validate(this.value);" />
                          <?php
                        }
                        ?>
                        <div class="status" id="status"></div>
                      </div>
                      <div class="form-group">
                        <label for="phonenumber"><span class="req">* </span> Số điện thoại: </label>
                        <?php   if (isset($_SESSION['current_user'])) { ?>
                          <input required type="text" name="phonenumber" id="phone" value="<?php echo $_SESSION['current_user']['phonenumber'] ?>" class="form-control phone" maxlength="28" placeholder="phone"/>
                          <?php
                        }else{ ?>
                          <input required type="text" name="phonenumber" id="phone" class="form-control phone" maxlength="28"  placeholder="phone"/>
                          <?php
                        }
                        ?>

                      </div>

                      <div class="form-group">
                        <label for="note"><span class="req"> </span> Ghi chú: </label>
                        <input class="form-control" type="text" name="note" id = "txt"  placeholder="Ghi chú" required />
                        <div id="errLast"></div>
                      </div>
                      <?php 
                      foreach($arrayVals as $value){ ?>
                        <input type="hidden" class="form-control" name="quantity[<?php echo $value['id']; ?>]" min="0" step="1"  
                        value="<?= $_SESSION['cart'][$value['id']]?>">

                        <?php   
                      }
                      ?>

                      <div class="form-group">
                        <input class="btn btn-success" type="submit" name="submit_reg" id="submit-order" value="Đặt hàng">
                      </div>
                    </fieldset>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                    <div class="form-group">
                      <label for="address"><span class="req">* </span> Chọn từ google map: </label>
                      <div class="form-group">
                        <div id="map"></div>
                      </div>

                      <div class="hidden">
                        <input type="text" id="lat">
                        <input type="text" id="lng">
                      </div>
                      <div class="form-group">
                        <input id="button" type="button" value="Lấy địa chỉ" class="btn btn-success text-right" />
                      </div>
                      <label for="address"><span class="req">* </span> Hoặc nhập địa chỉ: </label>
                      <input class="form-control" id="search_text" name="address" value="" placeholder="địa chỉ" />
                      <div id="result">

                      </div>

                      <div id="errLast"></div>

                      <input type="button" class="btn btn-success" id="submit-address" value="Giao tới địa chỉ này" />
                      <input class="form-control" id="latnew" type="hidden" name="lat" value="" placeholder="lat" />
                      <input class="form-control" id="lngnew" type="hidden" name="lng" value="" placeholder="lng" />
                      <input class="form-control" id="priceShipNew" type="hidden" name="priceShipNew" value="" placeholder="" />
                      <input class="form-control" id="totalPriceNew" type="hidden" name="totalPriceNew" value="" placeholder="" />
                      <?php  if (isset($_SESSION['current_user'])) {
                        ?>
                        <input class="form-control" id="userId" type="hidden" name="idUser" value="<?php echo $_SESSION['current_user']['id']; ?> </a> " placeholder="" />
                        <?php 
                      }
                      ?>
                    </div>
                    
                  </div>
                </div>
              </form>
            </div><!-- ends col-12 -->

            <?php
          }else{?>
            <ul class="list-group">
              <li  class="list-group-item">
                Giỏ hàng trống
              </li>
              <li class="list-group-item">
                <a href="?action=index" class="btn btn-success">Tiếp tục mua hàng</a>

              </li>
            </ul>

          <?php } ?>

        </div>
      </div>
    </div>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0FIYihEwLcI3VxgSGD-OMMmDll6DsQ6w&callback=initMap&libraries=&v=weekly"
    async
    ></script>

    <?php
    require_once ('templates/layout/footer.php');
    ?>
    <script type="text/javascript">
      function initMap() {
       const myLatlng = { lat: 20.972701738576042, lng: 105.86191624072345 };
       const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 14,
        center: myLatlng,
      });
       const geocoder = new google.maps.Geocoder();
       const infowindow = new google.maps.InfoWindow();
  // Create the initial InfoWindow.
  let infoWindow = new google.maps.InfoWindow({
    content: "Click vào map để lấy địa chỉ",
    position: myLatlng,
  });
  infoWindow.open(map);
  // Configure the click listener.
  map.addListener("click", (mapsMouseEvent) => {
    // Close the current InfoWindow.
    infoWindow.close();
    // Create a new InfoWindow.
    infoWindow = new google.maps.InfoWindow({
      position: mapsMouseEvent.latLng,
    });
    infoWindow.setContent(
      JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
      );
    
    infoWindow.open(map);
    
    let jsonData =  JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
    let obj = JSON.parse(jsonData);

    const lng = obj.lng;
    const lat = obj.lat;
    
    document.getElementById('lat').value = lat;
    document.getElementById('lng').value = lng;

    document.getElementById("button").addEventListener("click", () => {
     getLocation(lat, lng);
   });
  });
}

function email_validate(email)
{
  var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

  if(regMail.test(email) == false)
  {
    document.getElementById("status").innerHTML    = "<span class='warning'>Email address is not valid yet.</span>";
  }
  else
  {
    document.getElementById("status").innerHTML = "<span class='valid'>Thanks, you have entered a valid Email address!</span>"; 
  }
}


function getLocation(lat,lng) {

  $.ajax({
    url : "map/getLatlng.php",
    method : "POST",
    dataType: 'JSON',
    data :
    {
      lat : lat,
      lng : lng,
    },
    success: function(response) {
      var json = JSON.parse(response);
      var address = json.results[0].formatted_address;
      var lat = json.results[0].geometry.location.lat;
      var lng = json.results[0].geometry.location.lng;



      document.getElementById("latnew").setAttribute("value", lat);
      document.getElementById("lngnew").setAttribute("value", lng);
      document.getElementById("search_text").setAttribute("value", address);


      $('#search_text').val(address);
    },
    error: function(response) {
      console.log('ERROR BLOCK');
      console.log(response.results);
    }
  });
}
</script>
<script>
  $(document).ready(function(){

   var timeout = null;

   function load_data(address)
   {
    $.ajax({
     url:"map/getAddress.php",
     method:"POST",
     data:{address:address},
     success:function(response)
     {

      const data = JSON.parse(response);

      if (data.length !== 0){

        console.log(data)
       let addressSearch = data.results[0].formatted_address;


       let lat = data.results[0].geometry.location.lat;
       let lng = data.results[0].geometry.location.lng;

       document.getElementById("latnew").setAttribute("value", lat);
       document.getElementById("lngnew").setAttribute("value", lng);

       localStorage.setItem("AddressOrder", addressSearch);
       document.getElementById("search_text").setAttribute("value", addressSearch);


       $('#result').html(addressSearch);
     }else{
      console.log('err');
    }
  },
  error: function(response) {
    console.log('ERROR BLOCK');
    console.log(response);
  }
});
  }

  //load data using keyup
  $('#search_text').keyup(function(){

    clearTimeout(timeout);

    var search = $(this).val();
    timeout = setTimeout(function ()
    {
      if(search != '')
      {
        $('#result').addClass('address-content-result');
        load_data(search);
      }
      else
      {
       load_data();
     }
   }, 100);
  });


  $( "#result" ).click(function() {
    let text = $(this).text();

    document.getElementById("search_text").setAttribute("value", text );
    $("#search_text:text").val(text);
  });


  //when click to submit adress
  $("#submit-address" ).click(function() {
   let address = document.getElementById('search_text').value;
   let lat = document.getElementById('latnew').value;
   let lng = document.getElementById('lngnew').value;

    if(document.getElementById("search_text").value != ""){
      document.getElementById("submit-order").disabled = false;
    }

    localStorage.setItem("AddressOrder", address);
    localStorage.setItem("lat", lat);
    localStorage.setItem("lng", lng);

   $.ajax({
     url:"map/getKm.php",
     method:"POST",
     data:{lat:lat,
      lng : lng},
      success:function(response)
      {

        const data = JSON.parse(response);

        console.log(data);
        let miles = parseInt(data.rows[0].elements[0].distance.text);
        var kilometers =  Math.round((miles * 1.6) * 100) / 100;


        $('#kilometers').html('('+kilometers+'km'+')');

        priceShip(kilometers);
      },
      error: function(response) {
        console.log('ERROR BLOCK');
        console.log(response);
      }
    });
 });

  //tinh tien ship = so km
  function priceShip(kilometers){
    var kilometers = kilometers;
    var price = kilometers*2000;
    var priceNew = price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});


    $('#price-km').html(priceNew);
    totalPrice(price);

  }

  //tinh tong gia tri don hang add vao bills
  function totalPrice(price){
    var price = price;
    var priceProduct = parseInt(document.getElementById('price-product').value);
    var totalPrice = price + priceProduct;
    totalPriceNew = totalPrice.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});


       //addto localStorage
    localStorage.setItem("priceShip", price);
    localStorage.setItem("totalPriceNew", totalPrice);

    document.getElementById("priceShipNew").setAttribute("value", price);
    document.getElementById("totalPriceNew").setAttribute("value", totalPrice);


    $('#totalPrice').html(totalPriceNew);
  }





  function setValueFromLocalStorage(){
    if (localStorage.length != 0) {
      var localPriceShip =  parseInt(localStorage.getItem("priceShip"));
      var localTotalPriceNew = localStorage.getItem("totalPriceNew");
      var localAddress    =  localStorage.getItem("AddressOrder");
      var localLat    =  localStorage.getItem("lat");
      var localLng    =  localStorage.getItem("lng");
      var priceProduct = parseInt(document.getElementById('price-product').value);

      if (priceProduct != "") {
        var totalPrice = localPriceShip + priceProduct;
        var totalPriceNewString = totalPrice.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
        var PriceShipString     = localPriceShip.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});

        document.getElementById("priceShipNew").setAttribute("value", localPriceShip);
        document.getElementById("price-km").setAttribute("value", localPriceShip);


        document.getElementById("totalPriceNew").setAttribute("value", localTotalPriceNew);
        document.getElementById("price-km").innerHTML =  PriceShipString;
        document.getElementById("totalPrice").innerHTML =  totalPriceNewString;
        document.getElementById("search_text").setAttribute("value", localAddress);
        document.getElementById("latnew").setAttribute("value", localLat);
        document.getElementById("lngnew").setAttribute("value", localLng);
       

        if(document.getElementById("search_text").value == ""){
            document.getElementById("submit-order").disabled = true;
        }
      }
     

    }
  }

  setValueFromLocalStorage();



});
</script>