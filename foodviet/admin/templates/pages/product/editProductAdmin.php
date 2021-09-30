<?php
require_once('templates/layout/headerAdmin.php');
$error = isset($error) ? $error : "";
$row_product = mysqli_fetch_assoc($result_product);

?>

<form action="?action=doEditProductAdmin&id=<?php echo $row_product['id'] ?>" method="post" enctype="multipart/form-data">
    <table class="table table-striped">

        <tr>
            <td>Tên Sản Phẩm</td>
            <td><input type="text" name="product_name" required="required" value="<?php echo $row_product['name_product'] ?>"  class="form-control" ></td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td><select style="width: 100%;padding: 10px;" name="category_name">
                    <?php

                    while ($row2= mysqli_fetch_assoc($result_category)) {
                        ?>
                        <option 
                            <?php 
                                    if($row2['cat_id'] == $row_product['category_id']  ){ echo 'selected';}
                             ?>

                             value="<?php echo $row2['cat_id'] ?>"
                        >

                        <?php echo $row2['category_name'] ?>
                            
                        </option>
                        <?php
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Thương hiệu</td>
            <td><select style="width: 100%;padding: 10px;" name="producer_name">
                    <?php

                    while ($row= mysqli_fetch_assoc($result_producer))  {
                        ?>
                        <option
                            <?php 
                                    if($row['id'] == $row_product['producer_id']  ){ echo 'selected';}
                             ?>
                             value="<?php echo $row['id'] ?>"
                        >

                        <?php echo $row['producer_name'] ?>
                            
                        </option>
                        <?php
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Tiền vốn</td>
            <td><input type="text" name="investment_money"  value="<?php echo $row_product['investment_money'] ?>"  required="required" class="form-control" ></td>
        </tr>
        <tr>
            <td>Giá</td>
            <td><input type="text" name="price"  value="<?php echo $row_product['price'] ?>"  required="required" class="form-control" ></td>
        </tr>
        <tr>
            <td>Khuyến Mãi</td>
            <td><input type="text" name="discount"  value="<?php echo $row_product['discount'] ?>"   class="form-control" ></td>
        </tr>
        <tr>
            <td>Số Lượng</td>
            <td><input type="text" name="total"  value="<?php echo $row_product['total'] ?>"  required="required" class="form-control" ></td>
        </tr>
        <tr>
            <td>Hình Ảnh</td>
            <td>
                <?php if (!empty($row_product['image_link'])) { ?>
                    <img style="width: 150px; height: 150px;" src="../uploads/image/<?= $row_product['image_link'] ?>" /><br/>
                    <!-- <input type="hidden" name="image_link_old" value="<?= $row_product['image_link'] ?>" /> -->
                <?php } ?>
                    <input type="file" name="image_link"  class="form-control" >
            </td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td><textarea style="width: 100%;"   name="describe" id="describe"><?php echo $row_product['des'] ?></textarea></td>
        </tr>
        <tr>
            <td>Mô tả ngắn</td>
            <td><textarea style="width: 100%;"   name="des_short" id="des_short"><?php echo $row_product['des_short'] ?></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit_product" class="btn btn-primary btn-lg" >EDIT</button></td>
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
