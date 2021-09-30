
<?php
require_once('templates/layout/headerAdmin.php');
$error =isset($error)?$error:"";
$row= mysqli_fetch_assoc($result);
?>

<form action="?action=doEditProducerAdmin" method="post" enctype="multipart/form-data">
    <table class="table table-striped">
        <tr>
            <td>Tên Nhà Sản Xuất</td>
            <td> <input type="text" name="name" required="required" value="<?php echo $row['producer_name']; ?>"  class="form-control" >
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            </td>
            
        </tr>
    </table>
    <div class="row" >
        <div class="col-2 col-sm-2 col-lg-2 col-xl-2 col-md-2">
            <input type="submit" name="edit_Producer" class="btn btn-primary btn-block btn-flat">
        </div>
    </div>
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


<?php
