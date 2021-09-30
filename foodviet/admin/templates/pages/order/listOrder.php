<?php 
require_once('templates/layout/headerAdmin.php');
$error =isset($error)?$error:"";
?>
<?php
$stt =0;
?>
<?php
if ($error != ""){
  ?>
  <input id="error" type="hidden" value="<?php echo $error ?>">
  <?php
}
?>
<div class="table-responsive">
 <?php
 if (!empty($result)) { ?>
  <table id="example" class="display" style="width:100%">
    <thead>
   <tr>
    <th>STT</th>
    <th>Họ và tên </th>
    <th>Số điện thoại</th>
    <th>Email</th>
    <th>Địa chỉ</th>
    <th>Ghi chú</th>
    <th>Tổng giá đơn hàng</th>
    <th>Tình trạng</th>
    <th>Ngày</th>
    <th>Chi tiết</th>
    <th>Theo dõi</th>
    <th>Xóa</th>
  </tr>
</thead>
<tbody>
  <?php    
  while ($row= mysqli_fetch_assoc($result)) {
    $stt++;
    ?>
    <tr>
      <td> <?php echo $stt; ?> </td>
      <td> <?php echo $row['name'] ?> </td>
      <td><?php echo $row['phone'] ?></td>
      <td><?php echo $row['email'] ?></td>
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
      <td> <a  onclick="return confirm('delete?');" class="btn btn-danger" href="?action=deleteOrder&url=<?=urlencode($row['id'])?>&id=<?= $row['id']?>"> DELETE </a>

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
<div class="container"> 
   <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
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
</div>
<script language="javascript">
  function load_ajax(id){
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

<?php 
require_once('templates/layout/footerAdmin.php');
?>