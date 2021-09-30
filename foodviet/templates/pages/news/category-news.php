<?php
//
//function makeUrl($string) {
//    $string = trim($string);
//    $string=str_replace(" ", "-", $string);
//    $string=str_replace("+", "plus", $string);
//    $string=str_replace("/", "", $string);
//    $string = strtolower($string);
//    $string=preg_replace("/(đ|Đ)/", "d", $string);
//    $string=str_replace("S", "s", $string);
//    $string=preg_replace('/(á|à|ã|ạ|ả|ă|ằ|ắ|ẵ|ẳ|ặ|â|ầ|ấ|ẩ|ậ|ẫ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ẳ|Ặ|Ẵ|Â|Ầ|Ấ|Ẫ|Ẩ|Ậ|Ằ)/', 'a', $string);
//    $string=preg_replace("/(é|ẽ|ẻ|ẹ|ê|ế|ễ|ể|ệ|É|È|Ẽ|Ẻ|Ẹ|Ê|Ế|Ễ|Ể|Ệ|è|Ề|ề)/", "e", $string);
//    $string=preg_replace("/(í|ỉ|ị|ĩ|j|Í|Ỉ|Ĩ|Ị|ì|Ì)/", "i", $string);
//    $string=preg_replace("/(ó|ọ|õ|ỏ|ô|ố|ộ|ổ|ỗ|ơ|ỡ|ở|ợ|ớ|Ó|Ọ|Õ|Ỏ|Ô|Ố|Ổ|Ỗ|Ộ|Ơ|Ợ|Ở|Ớ|Ở|ò|Ò|ồ|Ồ|ờ|Ờ)/", "o", $string);
//    $string=preg_replace("/(ú|ủ|ụ|ũ|ư|ứ|ử|ự|ữ|Ú|Ủ|Ụ|Ũ|Ư|Ự|Ử|Ứ|Ữ|ù|Ù|ừ|Ừ)/", "u", $string);
//    $string=preg_replace("/(ý|ỵ|ỹ|ỷ|Ý|Ỵ|Ỹ|Ỷ|ỳ|Ỳ)/", "y", $string);
//    return $string;
//}
//?>

<!DOCTYPE html>
<html>
<body>
    
<?php

include_once('templates/layout/header.php');
?>
<div class="content">
    <div class="container">
        <h2 class="title"> Tin tức </h2>
        <article class="article category-post-article">
         <?php foreach ($result as $key => $value) { ?>
        <div class="row">
            <div class="col-xs-3 col-xl3 col-lg-3 col-sm-12 col-12">
                <a href="?action=singleNews&id=<?php echo $value['id'] ?>" class="post-thumbnail thumbnail-hover-scale thumbnail-bordered">
                    <img src="uploads/news/<?php echo $value['image_link'] ?>" >
                </a>
            </div>
            <div class="col-sm-9 col-lg-9 col-12 col-md-9 col-xl-9">          
                <h3 class="post-title">
                    <a class="no-style" href="?action=singleNews&id=<?php echo $value['id'] ?>"> <?php echo $value['title'] ?></a>
                </h3>
                
                <div class="post-date"><i class="fa fa-clock-o"></i> <?php ;?></div>
                <div class="post-excerpt hidden-xs">
                    <?php   ?>
                </div>
                <a class="read-more  hidden-xs" href="?action=singleNews&id=<?php echo $value['id'] ?>"><i class="fa fa-angle-double-right"></i> Chi tiết</a>
            </div>  
                
        </div>
    <?php  } ?>
</article>
    </div>
</div>

   


<?php
include_once('templates/layout/footer.php');
?>
</body>
</html>