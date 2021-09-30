
<?php
require_once('templates/layout/headerAdmin.php');
$error = isset($error) ? $error : "";
?>
<form action="?action=doAddNews" method="post" enctype="multipart/form-data">
    <table class="table table-bordered ">

        <tr>
            <td>Tiêu Đề bài viết</td>
            <td><input type="text" name="title" required="required" value=""  class="form-control" ></td>
        </tr>
        <tr>
            <td>Hình Ảnh</td>
            <td><input type="file" name="image_link"   required="required" class="form-control" ></td>
        </tr>
        <tr>
            <td>Nội Dung</td>
            <td><textarea style="width: 100%;"  name="content" id="content"></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="add" class="btn btn-primary btn-lg" >ADD</button></td>
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
