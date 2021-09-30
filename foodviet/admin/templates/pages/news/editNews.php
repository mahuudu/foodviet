
<?php
require_once('templates/layout/headerAdmin.php');
$error = isset($error) ? $error : "";
$row = mysqli_fetch_assoc($result);
?>
<form action="?action=doEditNews&id=<?php echo $row['id'] ?>" method="post" enctype="multipart/form-data">
    <table class="table table-bordered ">

        <tr>
            <td>Tiêu Đề bài viết</td>
            <td><input type="text" name="title" required="required" value="<?= $row['title'] ?>"  class="form-control" ></td>
        </tr>
        <tr>
            <td>Hình Ảnh
            </td>
            <td>
                    <?php if (!empty($row['image_link'])) { ?>
                    <img style="max-width: 100%; height: 350px;" src="../uploads/news/<?= $row['image_link'] ?>" /><br/>
                    
                <?php } ?>
                <input type="file" name="image_link"  class="form-control" >
            </td>
        </tr>
        <tr>
            <td>Nội Dung</td>
            <td><textarea style="width: 100%;" name="content" id="content">
                <?php echo $row['content']; ?>
            </textarea></td>
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
