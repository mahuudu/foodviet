<?php
require_once('templates/layout/headerAdmin.php');
$error = isset($error) ? $error : "";
$row = mysqli_fetch_assoc($result);

?>
<form action="?action=doEditUser&id=<?php echo $row['id'] ?>" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
      <input type="hidden" name="username" required="required" value="<?php echo $row['username'] ?>"  class="form-control" >
      <tr>
        <td>Tên khách hàng</td>
        <td><input type="text" name="fullname" required="required" value="<?php echo $row['fullname'] ?>"  class="form-control" ></td>
     </tr>
    
       <tr>
        <td>Email</td>
        <td><input type="text" name="email"  value="<?php echo $row['email'] ?>"  required="required" class="form-control" ></td>
     </tr>
       <tr>
        <td>Số điện thoại</td>
        <td><input type="text" name="phonenumber"  value="<?php echo $row['phonenumber'] ?>"   class="form-control" ></td>
     </tr>
       <tr>
        <td>Mật khẩu Mới </td>
        <td><input type="text" name="password"  value=""   class="form-control" ></td>
     </tr>
     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >EDIT</button></td>
     </tr>
  </table>
</form>
<?php 
  require_once('templates/layout/footerAdmin.php');
 ?>