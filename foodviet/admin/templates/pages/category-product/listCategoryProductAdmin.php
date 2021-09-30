<?php
require_once('templates/layout/headerAdmin.php');
$error =isset($error)?$error:"";
?>
<div class="table-responsive table-bordered table-hover">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Loại sản phẩm</th>
                <th> Ảnh </th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
      
      
            <?php
            $stt=0;
            while ($row= mysqli_fetch_assoc($result)) {
                $stt++;
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $row['cat_id'] ?></td>
                    <td><?php echo $row['category_name'] ?></td>
                    <td><img src="../uploads/category/<?php echo $row['category_image']?>" style="width: 150px;" alt="">
                    </td>
                    <td>
                        <a href="?action=editCategoryProductAdmin&id=<?php echo $row['cat_id'] ?>" class="btn btn-primary"> Edit</a>
                    </td>
                    <td>
                        <a  onclick="return confirm('delete?');" class="btn btn-danger
                        " href="?action=deleteCategoryProductAdmin&url=<?php echo $row['category_image']?>&id=<?= $row['cat_id']?>"> DELETE </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
if ($error != ""){
    ?>
    <input id="err" type="hidden" value="<?php echo $error ?>">
    <?php
}
?>
<?php
require_once('templates/layout/footerAdmin.php');
?>
