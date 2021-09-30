<?php

include_once('templates/layout/header.php');
?>

<div class="top-content product container archive-product   archive_product">
<?php if (isset($array) && !empty($array)) { ?>

        <header class="woocommerce-products-header">
           <?php $num=0; foreach ($array as $key => $value) { $num++ ?>
            <h6 id="title-archive-pd"  class="woocommerce-products-header__title page-title">
                <?php if($num == 2){
                    break;
                }else{
                    echo $value['category_name'];
                    $id = $value['cat_id'];
                } ?>

            </h6>
        <input type="hidden" id="cat_id" name="cat_id" value="<?php echo $id  ?>">
        <?php } ?>
        
        <div class="ordering-custom">
              <select name="orderby" id="orderby">
                 <option value="selected"> Thứ tự mặc định</option>
                 <option value="priceASC" name="" > Giá từ thấp đến cao </option>
                 <option value="priceDESC" name=""> Giá từ cao xuống thấp </option>
                 <option value="nameASC" name=""> Tên từ A -> Z </option>
                <option value="nameDESC" name=""> Tên từ Z-> A </option>
                <input type="hidden" name="id" id="cat_id" value="<?= $id ?>">    
             </select>        
     </div>
 </header>
<div class="products">
 <div class="row" id="products">
    <?php foreach ($array as $key => $value) { ?>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 product">
            <a href="?action=singleProduct&id=<?=$value['id'] ?>">
                <div class="show-product">
                    <img src="http://localhost:8080/foodviet/uploads/image/<?php echo $value['image_link']; ?>" class="product-thumbnail">

                    <div class="main-product">
                        <p><?= $value['name_product'] ?> </p>
                        <div class="price">
                            <p class="discount"><?php echo number_format($value['discount']); ?> </p>
                            <del class="price"><?php echo number_format($value['price']); ?> </del>
                            <div class="onsale">
                                <?php echo ceil((($value['price'] - $value['discount']) / $value['price']) * 100) . "%" ?>
                            </div>
                        </div>
                    </div>

                </div>
            </a>
        </div>
        <?php
    }
    ?>
</div>
<div id="show-product">

</div>
</div>
<div id="pagination-1">
<ul class="pagination ">
    <?php 
    if ($current_page > 1 ) {  
        $fist_page = 1;
        ?>
        <li> 
             <button  id="<?= $fist_page ?>" value="per_page=<?= $item_per_page ?>&page=<?=  $fist_page ?>">  First</button>
        </li>
    <?php  } ?>

    <?php for ($num=1; $num <= $totalPages ; $num++) { ?>
        
        <?php if($num > 1 ) : ?>
        <li class="page-item">
             <?php if($num != $current_page ) { ?>
                <button  id="<?= $num ?>" value="per_page=<?= $item_per_page ?>&page=<?= $num ?>"> <?= $num ?></button>
            <?php  }else{ ?>
                <strong class="disabled active"> <?= $num ?></strong>
            <?php } ?> 
        </li>
      <?php endif; ?>
    <?php } ?>

    <?php 
        if ($current_page < $totalPages - 1 ) {  //neu tong so page lon hon 1 thi in
            $end_page = $totalPages;
         ?>
        <li> 
            <button  id="<?= $num ?>" value="per_page=<?= $item_per_page ?>&page=<?= $end_page  ?> ">  Last </button>
        </li>
     <?php }  ?>
</ul>
</div>
<?php }else{ ?>
         <header class="woocommerce-products-header">
           
            <h6 id="title-archive-pd"  class="woocommerce-products-header__title page-title">
                    Không có sản phẩm nào trong danh mục
            </h6>

      
        </header>   
<?php
} ?>
</div>
<?php
include_once('templates/layout/footer.php');
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#orderby').on('change',function(){
            var orderby = $(this).val();
            var cat_id  = $('#cat_id').val();

            $.ajax({
                url : "?action=ajaxOrderProduct",
                method : "POST",
                data :
                {
                    orderby : orderby,
                    cat_id  : cat_id
                },
                success: function(data){
                    $('#show-product').html(data);
                    $('#products').addClass('hidden');
                } 
            });
        });
        $("button").click(function(){
            var cat_id  = $('#cat_id').val();
            console.log(cat_id);

            var fired_button = $(this).val();
            var per_page = parseInt(fired_button.split("&")[0].split("=")[1]); //tach string thanh mang bang dau & ở vị trí đầu tiên.
            var page = parseInt(fired_button.split("&")[1].split("=")[1]);
            var orderby = $('#orderby').val();

            console.log(per_page);
            
            $.ajax({
                url : "?action=ajaxOrderProduct",
                method : "POST",
                data :
                {
                    cat_id    : cat_id,
                    per_page : per_page,
                    page     : page,
                    orderby : orderby,
                },
                success: function(data){
                    $('#show-product').html(data);
                    $('#products').addClass('hidden');
                    $('#pagination-1').addClass('hidden');
                } 
            });
        });
    })
</script>