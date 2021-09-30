
<?php
require_once('templates/layout/headerAdmin.php');
$error = isset($error) ? $error : "";
?>
<form action="?action=doAddSlide" method="post" enctype="multipart/form-data">
    <table class="table table-bordered ">
        <tr>
            <td>Hình Ảnh</td>
            <td><input type="file" name="image_link"   required="required" class="form-control" ></td>
            <td> <input class="btn btn-success" type="submit" name="submitadd"></td>
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
    CKEDITOR.replace('des_short');
    CKEDITOR.replace('describe');
</script>
<!--<script type="text/javascript">
    CKEDITOR.replace("describe",{
        filebrowserBrowseUrl : 'tpl/product/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
    CKEDITOR.replace("des_short",{
        filebrowserBrowseUrl : 'tpl/product/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
</script>-->
