
<?php
require_once('templates/layout/headerAdmin.php');
$error = isset($error) ? $error : "";
?>
<form action="?action=doAddproductAdmin" method="post" enctype="multipart/form-data">
    <table class="table table-bordered ">

        <tr>
            <td>Tên Sản Phẩm</td>
            <td><input type="text" name="product_name" required="required" value=""  class="form-control" ></td>
        </tr>
        <tr>
            <td>Danh mục Sản Phẩm</td>
            <td><select style="width: 100%;padding: 10px;" name="category_name">
                    <?php
                    while ($row= mysqli_fetch_assoc($result_category)) {
                        ?>
                        <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['category_name'] ?></option>
                        <?php
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Thương hiệu</td>
            <td><select style="width: 100%;padding: 10px;" name="producer_name">
                    <?php
                    while ($row= mysqli_fetch_assoc($result_producer)) {
                        ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['producer_name'] ?></option>
                        <?php
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Giá</td>
            <td><input type="text" name="price"  value=""  required="required" class="form-control" ></td>
        </tr>
        <tr>
            <td>Khuyến Mãi</td>
            <td><input type="text" name="discount"  value=""   class="form-control" ></td>
        </tr>
        <tr>
            <td>Số Lượng</td>
            <td><input type="text" name="total"  value=""  required="required" class="form-control" ></td>
        </tr>
        <tr>
            <td>Hình Ảnh</td>
            <td><input type="file" name="image_link"   required="required" class="form-control" ></td>
        </tr>
        <tr>
            <td>Mô tả ngắn</td>
            <td><textarea style="width: 100%;"  name="des_short" id="des_short"></textarea></td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td><textarea style="width: 100%;"  name="describe" id="describe"></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="add_product" class="btn btn-primary btn-lg" >ADD</button></td>
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
