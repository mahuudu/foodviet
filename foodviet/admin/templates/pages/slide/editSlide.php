
<?php
require_once('templates/layout/headerAdmin.php');
$error = isset($error) ? $error : "";
$row = mysqli_fetch_assoc($result);
?>
<form action="?action=doEditSlide" method="post" enctype="multipart/form-data">
    <table class="table table-bordered ">
        <tr>
            <th>Hình Ảnh</th>
        </tr>
        <tr>
              <td>
                <?php if (!empty($row['slide_link'])) { ?>
                    <img style="width: 100%; height: 350px;" src="../uploads/slide/<?= $row['slide_link'] ?>" /><br/>
                    
                <?php } ?>
                 <input type="hidden" name="id" value="<?= $row['id'] ?>" /> 
            </td>

            <td><input type="file" name="image_link"   required="required" class="form-control" ></td>
            <td> <input class="btn btn-success" type="submit" name="submitadd"></td>
            <td> <a href="?action=slide" class="btn btn-danger"> Hủy</a></td>
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
