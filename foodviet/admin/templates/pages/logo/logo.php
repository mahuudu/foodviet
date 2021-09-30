<?php 
require_once('templates/layout/headerAdmin.php');
$row = mysqli_fetch_assoc($result);
 ?>	
<form action="?action=doChangeLogo" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
        <td>
        	  <?php if (!empty($row['image_link'])) { ?>
                    <img style="width: 150px; height: 150px;" src="../uploads/logo/<?= $row['image_link'] ?>" /><br/>
                <?php } ?>
        </td>
        <td>
        	<input type="file" name="image_link"  class="form-control" >
        	<input type="hidden" name="id" value="<?= $row['id'] ?>">
        </td>
     </tr>

     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >ADD</button></td>
     </tr>
  </table>
</form>
<?php
require_once('templates/layout/footerAdmin.php');
?>
