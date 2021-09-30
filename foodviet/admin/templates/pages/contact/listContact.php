<?php 
require_once('templates/layout/headerAdmin.php');
?>
<?php
$stt =0;
?>
<div class="table-responsive">
    <table  id="example" class="display" style="width:100%">
        <thead>
           <tr>
            <th>STT</th>
            <th>Họ Tên</th>
            <th>Tiêu đề</th>
            <th>Ngày gửi</th>
            <th>Chi Tiết</th>
            <th> Xóa</th>
        </tr>
    </thead>
    <tbody>
     <?php if (!empty($arrayVals)) {?>

        <?php $stt=1;  foreach($arrayVals as $value)  { ?>
            <tr>
             <td><?= $stt++ ?></td>
             <td> <?php echo $value['name']; ?></td>
             <td>  <?php echo $value['title']; ?>   </td>
             <td> <?php echo date("d-m-Y h:i:sa", $value['created_at']) ?>  </td>
             <td>     
              <input type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" name="clickme" id="clickme" onclick="load_ajax(<?=$value['id']?>)" value="Chi tiết"/>    
          </td>
      </td>
      <td class="action-cart"><a  onclick="return confirm('delete?');" href="?action=deleteContact&id=<?php echo $value['id'] ?>">X</a></td>

  </tr>
  <?php 
}
?>

</table>

<?php
}
?>
</tbody>
</table>
<div class="container"> 
 <!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog xss">

      <!-- Modal content-->
      <div class="modal-content ">
        <div class="modal-header">
          <h4 class="modal-title">Chi tiết Liên hệ</h4>
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
    url : "?action=listContactDetails",
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
</div>
<?php 
require_once('templates/layout/footerAdmin.php');
?>