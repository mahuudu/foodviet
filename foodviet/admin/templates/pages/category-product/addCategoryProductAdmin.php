<?php
require_once('templates/layout/headerAdmin.php');
$error = isset($error) ? $error : "";
?>
<form action="?action=doAddCategoryProductAdmin" method="post" enctype="multipart/form-data">
    <table class="table table-striped">
        <tr>
            <td>Tên Danh Mục sản phẩm</td>
            <td><input type="text" name="category_name" required="required" value=""  class="form-control" ></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="image_link"  required="required" value=""  class="form-control" ></td>
        </tr>
    </table>
    <div class="row" >
        <div class="col-2 col-sm-2 col-xl-2 col-lg-2 col-md-2">
        <input type="submit" name="add_category" class="btn btn-primary btn-block btn-flat"</input>
            </div>
    </div>
    <?php
    if ($error != ""){
        ?>
        <input id="error" type="hidden" value="<?php echo $error ?>">
        <?php
    }
    ?>
</form>
<?php
require_once('templates/layout/footerAdmin.php');
?>
