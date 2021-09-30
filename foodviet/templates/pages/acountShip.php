<?php
$error =isset($error)?$error:"";

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Shiper profile | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./admin/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./admin/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./admin/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="./admin/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="./admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="./admin/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="./admin/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="./admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">

  <link rel="stylesheet" type="text/css" href="css/style.css">

   <link rel="stylesheet" type="text/css" href="js/toast/toastr.min.css">
   <style type="text/css">
      html{
        height: 100%;
      }
      body{
        height: 100%;
      }
     
   </style>
</head>
<body class="hold-transition">
  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="client client-bg">
      <section class="content">
          <div class="container acount">
            <div class="row">
              <div class="col-md-12">
               <div class="card-user card">
                <div class="card-body">
                  <p class="card-text"></p>
                  <div class="author">
                    <div class="block block-one">

                    </div>
                    <div class="block block-two">

                    </div><div class="block block-three">

                    </div>
                    <div class="block block-four">

                    </div>
                    <a href="#pablo">
                      <img src="./admin/dist/img/avatar04.png" class="img-circle elevation-2" alt="User Image">

                      <h5 class="title"> <?php echo $_SESSION['ship']['fullname'];
                      ?></h5>
                    </a>
                    <p class="description">Email: <?php echo $_SESSION['ship']['email'];
                    ?></p>
                  </div>
                  <div class="card-description text-center">Phone : <?php echo $_SESSION['ship']['phonenumber'];
                  ?></div>
                </div>
                <div class="text-center card-footer"><p class="text-success">Last updated a few seconds ago</p><br>
                  <button type="button" id="scanButton" class="btn btn-simple btn-success btn btn-secondary" name="clickme" id="clickme">Update Now</button>
                  <button id="scanButton" class="btn btn-simple btn-success btn btn-secondary">
                       <a href="?action=doLogOutShip" class="">
                               LogOut
                      </a>
                  </button>
                    <button id="scanButton" class="btn btn-simple btn-success btn btn-secondary">
                       <a href="?action=" class="">
                               Home
                      </a>
                  </button>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="container">
          <h5>Đơn hàng đang chờ </h5>
          <div class="table-responsive table ">
           <?php
           $stt =0;
           if (!empty($result)) { ?>
            <table id="example" class="display table-color" style="width:100%">
              <thead>
               <tr>
                <th>STT</th>

                <th>Địa chỉ</th>
                <th>Ghi chú</th>
                <th>Tổng giá đơn hàng</th>
                <th>Tình trạng</th>
                <th>Ngày</th>
                <th>Chi tiết</th>

              </tr>
            </thead>
            <tbody>
              <?php    
              while ($row= mysqli_fetch_assoc($result)) {
                $stt++;
                ?>
                <tr>
                  <td> <?php echo $stt; ?> </td>
                  <td><?php echo $row['address'] ?></td>
                  <td><?php echo $row['note'] ?></td>
                  <td><?php echo number_format($row['total'])?></td>
                  <td>
                    <?php   $status =  $row['status'];
                    switch ($status ) {
                      case '0':
                      echo '<span class="badge badge-info">Đang xử lý</span>';
                      break;
                      case '1':
                      echo  '<span class="badge badge-success">Đã Hoàn thành</span>';
                      break;
                      case '2':
                      echo '<span class="badge badge-warning">Đang giao</span>';
                      break;
                      case '3':
                      echo '<span class="badge badge-danger">Đã hủy</span>';
                      break;
                      case '4':
                      echo '<span class="badge badge badge-info">Chuẩn bị hàng</span>';
                      break;
                      default:
                      echo '<span class="badge badge-info">Đang xử lý</span>';
                      break;
                    }
                    ?>
                  </td>
                  <td><?php echo date("d-m-Y h:i:sa", $row['created_time']) ?></td>
                  <td> 

                  

                      <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal2" onclick="load_ship(<?=$row['id']?>)" >Chi tiết</button>

                 </td>


               </tr>
               <?php
             }
             ?>

           </tbody>
         </table>
         <?php 
       }else{ ?>
         <div class="alert alert alert-danger text-center" role="alert">
          <h5> Hiện tại, không có đơn hàng nào cần ship bạn ơi !</h5>
        </div>
        <?php 
      }
      ?>
      <div class="mt-5">
        <h5> Đơn hàng đã nhận</h5>
        <?php  
         $stt =0;
           if (!empty($result2)) { ?>
            <table id="example" class="display table-color" style="width:100%">
              <thead>
               <tr>
                <th>STT</th>

                <th>Địa chỉ</th>
                <th>Ghi chú</th>
                <th>Tổng giá đơn hàng</th>
                <th>Tình trạng</th>
                <th>Ngày</th>
                <th>Chi tiết</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php    
              while ($row= mysqli_fetch_assoc($result2)) {
                $stt++;
                ?>
                <tr>
                  <td> <?php echo $stt; ?> </td>
                  <td><?php echo $row['address'] ?></td>
                  <td><?php echo $row['note'] ?></td>
                  <td><?php echo number_format($row['total'])?></td>
                  <td>
                <?php   $status =  $row['status'];
                    switch ($status ) {
                      case '0':
                      echo '<span class="badge badge-info">Đang xử lý</span>';
                      break;
                      case '1':
                      echo  '<span class="badge badge-success">Đã Hoàn thành</span>';
                      break;
                      case '2':
                      echo '<span class="badge badge-warning">Đang giao</span>';
                      break;
                      case '3':
                      echo '<span class="badge badge-danger">Đã hủy</span>';
                      break;
                      case '4':
                      echo '<span class="badge badge badge-info">Chuẩn bị hàng</span>';
                      break;
                      default:
                      echo '<span class="badge badge-info">Đang xử lý</span>';
                      break;
                    }
                    ?>
                  </td>
                  <td><?php echo date("d-m-Y h:i:sa", $row['created_time']) ?></td>
                  <td> 

                      <button type="button" id="" class="btn btn-info" data-toggle="modal" data-target="#myModal2" onclick="load_ship(<?=$row['id']?>)" >Chi tiêt</button>
                     
                 </td>
                 <td class="d-flex action-ship">
                          <?php  
                     if($row['status'] == 1){ ?>
                       <button type="button" id="getCurrentPosition" disabled class="getCurrentPosition btn btn-primary" value="<?=$row['id']?>" >
                        Update location
                     </button>
                    <?php }else{ ?>
                         <button type="button" id="getCurrentPosition" class="getCurrentPosition btn btn-primary" value="<?=$row['id']?>" >
                        Update location
                     </button>
                     <?php } ?>
                     <button type="button" id=" " class="btn btn-success" data-toggle="modal" data-target="#myModal2" onclick="on_complete(<?=$row['id']?>)" >
                        Đã nhận hàng
                     </button>
                     <?php  
                     if($row['status'] == 1){ ?>
                        <button type="button" id=" " class="btn btn-danger" disabled data-toggle="modal" data-target="#myModal2" onclick="on_cancle(<?=$row['id']?>)" >
                        Hủy đơn
                      </button>
                    <?php }else{ ?>
                         <button type="button" id=" " class="btn btn-danger" data-toggle="modal" data-target="#myModal2" onclick="on_cancle(<?=$row['id']?>)" >
                        Hủy đơn
                      </button>
                     <?php } ?>
                 </td>

               </tr>
               <?php
             }
             ?>

           </tbody>
         </table>
         <?php 
       }else{ ?>
         <div class="alert alert alert-danger text-center" role="alert">
          <h5> Chưa có đơn hàng đã nhận </h5>
        </div>
        <?php 
      }
      ?>
      </div>
      <div class="container"> 
       <!-- Modal -->
       <div class="modal fade " id="myModal2" tabindex="-1" aria-labelledby="myModal2" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Chi tiết đơn hàng</h4>
            </div>
            <div class="modal-body">
             <div id="result">
               Nội dung ajax sẽ được load ở đây
             </div>
           </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
  </div>
   <div id="change-pass">
     
            <div id="login-row" class="row justify-content-center align-items-center pd-1 mg-1 mt-5">
                    <div id="login-column" class="col-md-6">
                      <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="?action=doChangePassShip" method="post">
                          <h3 class="text-center text-info">Change Password</h3>
                          <div class="form-group">
                            <label for="oldpassword" class="req">Old password:</label><br>
                            <input type="password" name="oldpassword" id="oldpassword" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="password"><span class="req">* </span> New Password: </label>
                            <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" /> </p>

                            <label for="password"><span class="req">* </span> Password Confirm: </label>
                            <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Enter again to validate"  id="pass2" onkeyup="checkPass(); return false;" />
                            <span id="confirmMessage" class="confirmMessage"></span>
                          </div>
                          <input type="hidden" value="<?php echo $_SESSION['current_user']['id'];
                          ?>" name="user_id">
                          <div class="form-group">
                            <input class="btn btn-success" type="submit" name="submit_change_pass" value="submit">
                          </div>
                        </form>
                      </div>
                    </div>
               </div>
   </div>   
 
          

</div>
</div>

</div>
<canvas id="nodes">


</canvas>
<div id="map" class="acountmap"></div>


  <?php
  if ($error != ""){
    ?>
    <input id="err" type="hidden" value="<?php echo $error ?>">
    <?php
  }
  ?>



</section>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<div class="aler">

</div>
<!-- jQuery -->
<script src="./admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script src="./admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/nodebg/nodes.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->
<!-- Bootstrap 4 -->

<!-- AdminLTE for demo purposes -->


 <script src="js/toast/toastr.min.js"></script>
<script type="text/javascript" src="js/sweetalert2.all.min.js"></script>

  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=&signed_in=true&callback=initMap"  async>

  </script>
    <script type="text/javascript">
   let map, infoWindow;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 6,
  });

  infoWindow = new google.maps.InfoWindow();

  
  let locationButton  = document.getElementsByClassName('getCurrentPosition');


  for(let i of locationButton){
  i.addEventListener("click", function() {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };

    
     
        let idCart = this.value;

        var lat = pos.lat;
        var lng = pos.lng;

        var google_map_pos = new google.maps.LatLng( lat, lng );


         var google_maps_geocoder = new google.maps.Geocoder();
                google_maps_geocoder.geocode(
                    { 'latLng': google_map_pos },
                    function( results, status ) {
                        if ( status == google.maps.GeocoderStatus.OK && results[0] ) {
                            console.log( results[0].formatted_address );
                            var address = results[0].formatted_address; 
                            addAddress(idCart,address,lat,lng);
                        }else{
                          console.log("null");
                        }
                    }
                );

          infoWindow.setPosition(pos);
          infoWindow.setContent("Location found.");
          infoWindow.open(map);
          map.setCenter(pos);
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });
}


}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}

    </script>

<script>
  var title = document.getElementById("err").value;
  function show_meage(title,type = 'sucess') {
    Swal.fire({
      position : 'top-center',
      icon: 'warning',
      type : type,
      title: title,
      timer: 6000,
      background: '#fff url(/images/trees.png)',
      backdrop: `
      rgba(0,0,123,0.4)
      url("/images/nyan-cat.gif")
      left top
      no-repeat
      `
    })
  }
  show_meage(title);

  setTimeout(function(){ 
       window.location = "http://localhost:8080/foodviet/?action=detailAcountShip";
    }, 3000);

</script>

</div>
<script language="javascript">
  function load_ship(id){
    $.ajax({
      url : "?action=listOrderDetail",
      type : "POST",
      dataType:"text",
      data : { id },
      success : function (result){
        $('#result').html(result);
        $('#myModal').modal('show');
      }
    });
  }

   function on_complete(id){
    $.ajax({
      url : "?action=onComplete",
      type : "POST",
      dataType:"text",
      data : { id },
      success : function (result){
        toastr.success('Hủy đơn hàng');
           window.location = "http://localhost:8080/foodviet/?action=detailAcountShip";

      }
    });
  }

    function on_cancle(id){
    $.ajax({
      url : "?action=on_cancle",
      type : "POST",
      dataType:"text",
      data : { id },
      success : function (result){
          var sucess = "Cập nhật thành công";
           window.location = "http://localhost:8080/foodviet/?action=detailAcountShip";

      }
    });
  }

 function addAddress(idCart,address,lat,lng){
    
    $.ajax({
      url : "?action=addAddressToCart",
      type : "POST",
      dataType:"text",
      data : { 
        idCart,address,lat,lng
       },
      success : function (result){
           toastr.success('Update địa chỉ thành công');
      }
    });
  }


</script> 
<script>
$(document).ready(function(){
  $("#scanButton").click(function(){
    $("#change-pass").toggle();
  });
});
</script>
<script type="text/javascript">
  var nodesjs = new NodesJs({

    // container ID
    id: 'nodes',

    // width
    width: window.innerWidth,

    // height
    height: window.innerHeight,

    // background transition options
    backgroundFrom: [10, 25, 100],
    backgroundTo: [25, 50, 150],
    backgroundDuration: 4000,

    // the number of particles
    number: window.hasOwnProperty('orientation') ? 20: 100,

    // animation speed
    speed: 20
    
});
</script>
</body>
</html>
