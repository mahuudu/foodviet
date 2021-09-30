
<?php
require_once ('controller/controller.php');
$controller = new Controller();
$side_bar = $controller->sideBar();
?>

<div class="sidebar" id="sidebar">
    <!-- danh muc san pham -->
    <div class="category-content">
        
        <div class="list-view d-flex">
            <?php
            while ($row= mysqli_fetch_assoc($side_bar)) {
                $category_product =$row['category_name'];
                ?>
                <a href="?action=categoryProduct&id=<?php echo $row['cat_id'] ?>" class="list-item category-item">
                              <div class="img-lazy">
                                  <img src="uploads/category/<?php echo $row['category_image'] ?>" />
                              </div>
                              <div class="category-title">
                                  <div class="metadata"><b><?php echo $row['category_name'] ?></b></div>
                              </div>
                </a>
                <?php
            }
            ?>
        </div>
    </div>

</div>
