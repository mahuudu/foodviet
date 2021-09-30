<?php 
require_once('templates/layout/headerAdmin.php');
$row = mysqli_fetch_assoc($result);
$error = isset($error) ? $error : "";
 ?>	
<form action="?action=doChangefooter" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
        <td>
        	<input type="hidden" name="id" value="<?= $row['id'] ?>">
        </td>
        <td>
            <textarea style="width: 100%;"   name="content" id="content">
                <?php echo $row['content'] ?>
                    
                </textarea>
        </td>
     </tr>

     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >ADD</button></td>
     </tr>
  </table>
</form>
<?php
if ($error != ""){
    ?>
    <input id="error" type="hidden" value="<?php echo $error ?>">
    <?php
}
?>
<?php
require_once('templates/layout/footerAdmin.php');
?>
<script type="text/javascript">
    CKEDITOR.replace('content');
</script>