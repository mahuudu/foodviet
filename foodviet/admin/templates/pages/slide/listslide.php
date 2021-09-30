
<?php
require_once('templates/layout/headerAdmin.php');
$error = isset($error) ? $error : "";
?>

<?php
if ($error != ""){
    ?>
    <input id="error" type="hidden" value="<?php echo $error ?>">
    <?php
}
?>
<div class="container">
    
<form action="tpl/slide/action.php" method="post" enctype="multipart/form-data">
   <table id="example" class="display" style="width:100%">
        <tr>
            <th>Stt</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
            <?php if (!empty($arrayVals)) {?>
                    
                <?php $stt=1;  foreach($arrayVals as $value)  { ?>
                <tr>
                     <td><?= $stt++ ?></td>
                    <td> <img style="max-width: 100%" height="250px" src="../uploads/slide/<?php echo $value['slide_link']; ?>"> </td>
                    <td><a href="?action=editSlide&id=<?= $value['id'] ?>" class="btn btn-primary">Edit</a></td>
                    </td>
                        <td class="action-cart"><a  onclick="return confirm('delete?');" href="?action=deleteSlide&id=<?php echo $value['id'] ?>">X</a></td>
                </tr>
                <?php 
                    }
                 ?>

            </table>
                    
                <?php
                    }
                ?>
  </table>
</form>
</div>
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
