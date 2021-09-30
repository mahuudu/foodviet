<?php

include_once('templates/layout/header.php');
?>

    <div class="top-content product container archive-product   archive_product">
        <header class="woocommerce-products-header">
        <h6 id="title-archive-pd"  class="woocommerce-products-header__title page-title">
            Kết Quả tìm kiếm cho : " <?php echo $key ?> "
            </h6>
        
        </header>
 <div class="row" id="products">
    <?php if (isset($array)) { ?>
    <?php foreach ($array as $key => $value) { ?>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 product">
            <a href="?action=singleProduct&id=<?=$value['id'] ?>">
                <div class="show-product">
                    <img src="./uploads/image/<?php echo $value['image_link']; ?>" class="product-thumbnail">

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
    }}
    ?>
</div>
<div id="show-product">

</div>
</div>

<?php
include_once('templates/layout/footer.php');
?>
<!-- <script type="text/javascript">
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
    })
</script> -->