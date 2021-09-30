<?php
$error =isset($error)?$error:"";

?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> User Profile</title>
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
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

   

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="?action=acount" class="brand-link">
        <img src="./admin/dist/img/avatar.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">My Acount</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item has-treeview">
              <a href="?action=doLogOut" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>
                  LogOut
                </p>
              </a>

            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper client">
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
                      <img src="./admin/dist/img/avatar.jpg" class="img-circle elevation-2" alt="User Image">

                      <h5 class="title"> <?php echo $_SESSION['current_user']['fullname'];
                      ?></h5>
                    </a>
                    <p class="description">Email: <?php echo $_SESSION['current_user']['email'];
                    ?></p>
                  </div>
                  <div class="card-description text-center">Phone : <?php echo $_SESSION['current_user']['phonenumber'];
                  ?></div>
                </div>
                <div class="text-center card-footer"><p class="text-success">Last updated a few seconds ago</p><br>
                  <button type="button" id="scanButton" class="btn btn-simple btn-success btn btn-secondary" name="clickme" id="clickme" >Update Now</button>
              

                </div>
              </div>

            </div>
          </div>
        </div>
         <div class="container">
          <h5>Đang Giao</h5>
          <div class="table-responsive table">
           <?php
           $stt =0;
           if (!empty($result2)) { ?>
            <table id="example" class="display" style="width:100%">
              <thead>
               <tr>
                <th>Đơn hàng</th>
                
                <th>Địa chỉ</th>
                <th>Ghi chú</th>
                <th>Tổng giá đơn hàng</th>
                <th>Tình trạng</th>
                <th>Ngày</th>
                <th>Chi tiết</th>
                 <th>Tình trạng đơn hàng</th>
              </tr>
            </thead>
            <tbody>

              <?php    
              while ($row= mysqli_fetch_assoc($result2)) {

                $stt++;
                ?>
              
                <tr>
                  <td>  <?php echo $row['id'] ?>  </td>
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
                    <input type="button" class="btn btn-success " data-toggle="modal" data-target="#myModal" name="clickme" id="clickme" onclick="load_ajax(<?=$row['id']?>)" value="Chi tiết"/> 
                    <input type="hidden" name="idOnPending" class="idOnPending" value="<?=$row['id']?>">

                  </td>
                   <td> 
                    <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" name="clickme" id="clickme" onclick="load_order_status(<?=$row['id']?>)" value="View"/> 

                    
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
          <h5> không có đơn hàng nào</h5>
        </div>
        <?php 
      }
      ?>
    </div>
     </div>
        <div class="container">
          <h5>Đơn hàng</h5>
          <div class="table-responsive table">
           <?php
           $stt =0;
           if (!empty($result)) { ?>
            <table id="example" class="display" style="width:100%">
              <thead>
               <tr>
                <th>STT</th>
                
                <th>Địa chỉ</th>
                <th>Ghi chú</th>
                <th>Tổng giá đơn hàng</th>
                <th>Tình trạng</th>
                <th>Ngày</th>
                <th>Chi tiết</th>
                 <th>Tình trạng đơn hàng</th>
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
                    <input type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" name="clickme" id="clickme" onclick="load_ajax(<?=$row['id']?>)" value="Chi tiết"/> 


                  </td>
                   <td> 
                    <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" name="clickme" id="clickme" onclick="load_order_status(<?=$row['id']?>)" value="View"/> 

                    
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
          <h5> không có đơn hàng nào</h5>
        </div>
        <?php 
      }
      ?>
    </div>
     </div>
      <div class="container"> 
       <!-- Modal -->
       <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-xl  modal-lg">

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
                        <form id="login-form" class="form" action="?action=doChangePass" method="post">
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
                          <input type="hidden" value=" <?php echo $_SESSION['current_user']['id'];
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
<div class="container">

  <?php
  if ($error != ""){
    ?>
    <input id="err" type="hidden" value="<?php echo $error ?>">
    <?php
  }
  ?>
</div>
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

<script src="./admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="js/toast/toastr.min.js"></script>
<script src="./admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<script language="javascript">


  function load_ajax(id){
    $.ajax({
      url : "?action=listOrderDetailUser",
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
        var sucess = "Cập nhật thành công";
         $('#result').html(sucess);
        $('#myModal').modal('show');
      }
    });
  }


  function load_order_status(id){
    $.ajax({
      url : "?action=load_order_status",
      type : "POST",
      dataType:"text",
      data : { id },
      success : function (result){
        
         $('#result').html(result);
        $('#myModal').modal('show');
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

 let container  = document.getElementsByClassName('idOnPending');
 var arr = [];

 for(var i = 0; i < container.length; i++){

    var idOnPending = container[i].value;

    //get các lat và lng của đơn hàng hiện tại
     function getAddressOffCart(idOnPending){
  
         var objx =  getLatLngCartPending(idOnPending);    
          return objx;
     }

      function getJSONAsync(idOnPending) {
        console.log('calling');
        
        //diachi don hang
        var shiplatlngObj =  JSON.parse(getAddressOffCart(idOnPending));
        var lat1 = shiplatlngObj[0].lat;
        var lng1 = shiplatlngObj[0].lng;

        //di chi shiper
        let shiplatlngObj2 =  JSON.parse(getLastAddressOfShip(idOnPending));
        var lat2 = shiplatlngObj2[0].lat;
        var lng2 = shiplatlngObj2[0].lng;

        //sau khi lấy đc 2 cái last lng/lat của 2 đầu vị trí. tiến hành add vô để tính số km
        var km = DistanceMatrixTwoPoint(lat1, lng1, lat2, lng2);

        var obj = JSON.parse(km);
        let miles = parseInt(obj.rows[0].elements[0].distance.text);
        var kilometers =  Math.round((miles * 1.6) * 100) / 100;

         var item = {
        id : idOnPending,
        kilometers : kilometers
        };

        arr.push(item);
            
     


  
     }

     getJSONAsync(idOnPending);

    //get last addrress of shiper
    function getLastAddressOfShip(idOnPending){
            
              var id = idOnPending;
              var data = false;

              $.ajax({
                url : "?action=getLastLatLngCartPending",
                type : "POST",
                dataType:"text",
                data : { id : id },
                async: false,
                success : function (result){
                   data = result;
                }
              });
              return data;
        }


       function DistanceMatrixTwoPoint(lat1, lng1, lat2, lng2){
            var data;
            $.ajax({
              url: "map/DistanceMatrixTwoPoint.php",
              type: "POST",
              dataType: "text",
              async: false, 
              data: { lat1, lng1, lat2, lng2 },
              success: function (result) {
                   data = result;
                   /*console.log(data);*/
              },
              error: function (error) {
                console.log("error");
              }
            });
            return data;

       }

       //get lat and long when pending
        function getLatLngCartPending(idOnPending){

              var id = idOnPending;
              var data = false;

              $.ajax({
                url : "?action=getLatLngCartPending",
                type : "POST",
                dataType:"text",
                data : { id : id },
                async: false,
                success : function (result){
                   data = result;
                }
              });

              return data;
       } 



}

var myVar = setInterval(function(){ notifiAlertToUsers(arr); 
}, 10000);


function notifiAlertToUsers(arr){
    var idNotifi = false;
   
    if ('0' in arr){
        for(let i = 0; i<arr.length; i++){
              if(arr[i].kilometers < 3){
                var idCart = parseInt(arr[i].id);
                toastr.warning(`Đơn hàng số ${idCart} Sắp đến, bạn chú ý nhé !`,'Thông báo');
                /*idNotifi = arr[i].id;
                var div = document.createElement('div');
                div.textContent = "Don hang so :" + `${idNotifi}`;
                div.setAttribute('class', 'cart'+`${idNotifi}`);*/

              }
            }

        }
}



toastr.options.onclick = function() { clearInterval(myVar);
  console.log('clear');
 }



/*notifiAlertToUsers(arr);
*/




</script>

</body>
</html>
