
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
    
   <table class="table table-striped">
        <tr>
            <th>Stt</th>
            <th>Tiêu đề</th>
            <th> Ảnh </th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
            <?php if (!empty($arrayVals)) {?>
                    
                <?php $stt=1;  foreach($arrayVals as $value)  { ?>
                <tr>
                     <td><?= $stt++ ?></td>
                     <td> <h5> <?php echo $value['title']; ?> </h5></td>
                    <td> <img style="max-width: 100%" height="250px" src="../uploads/news/<?php echo $value['image_link']; ?>"> </td>
                    <td><a href="?action=editNews&id=<?= $value['id'] ?>" class="btn btn-info">Edit</a></td>
                    </td>
                        <td class="action-cart"><a  onclick="return confirm('delete?');" href="?action=deleteNews&id=<?php echo $value['id'] ?>">X</a></td>

                </tr>
                <?php 
                    }
                 ?>

            </table>
                    
                <?php
                    }
                ?>
  </table>

</div>
<?php
require_once('templates/layout/footerAdmin.php');
?>

