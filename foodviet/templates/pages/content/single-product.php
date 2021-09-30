
<?php
require_once ('templates/layout/header.php');

?>
<div class="main-content container content" style="padding-top: 50px;">
<?php
$row = mysqli_fetch_assoc($result);

?>
<div class="main-content">
<div class="page-single-product">
	<div class="images-product">
		<img src="uploads/image/<?php echo $row['image_link'] ?>">
		<div class="list-hotline">
			<h3>Văn phòng hà nội</h3>
			<ul>
				<li>0365563553</li>
				<li>0365563553</li>
				<li>0365563553</li>
				<li>0365563553</li>
			</ul>
			<h3>Văn phòng TP HCM</h3>
			<ul>
				<li>0365563553</li>
				<li>0365563553</li>
				<li>0365563553</li>
				<li>0365563553</li>
			</ul>
		</div>
	</div>
	<div class="summary">
		<div class="title-sp">
			<h3><?php echo $row['name_product'] ?></h3>
		</div>
		<div class="des_short">
			<h4>Thông tin sản Phẩm: </h4>
			<?php echo $row['des_short'] ?>
		</div>
		<div class="khohang">
			<h4>Kho hàng</h4>
			<p>
			– Số 5 Vũ Trọng Phụng – Thanh Xuân – Hà nội</p><p>
			- 164 Đào Duy Anh – Phường 9 – Quận Phú Nhuận – HCM</p>
		
		</div>
		<div class="giaohang">
			<h4>Giao hàng</h4>
			<p>
			Giao hàng nhanh trong 2h (Chi tiết)</p><p>
			– Miễn phí giao hàng (Trong bán kính 20 km) cho đơn hàng từ 500.000 đ trở lên (Chi tiết)</p>
			<p>– Miễn phí giao hàng 300 km đối với khách hàng thân thiết</p>
			<p>– Nhận giao hàng 8h00 – 20h30 các ngày kể cả ngày lễ, thứ 7, CN</p>
		
		</div>
		<div class="price_sg">
			<?php if ($row['discount'] > 0) { ?>
				<p class="discount_sg"><?php echo number_format($row['discount']); ?> VNĐ</p>
				<p><span>Giá Gốc: </span><del><?php echo number_format($row['price']); ?> VNĐ</del>
					<span class="onsale">
					<?php
					$sale = ceil((($row['price']-$row['discount'])/$row['price'])*100);
					echo "-".$sale."%";
				?></span></p>
				
				<?php
			}else{?>
				<p class="sg_price"><?php echo number_format($row['price']); ?> VNĐ</p>
			<?php }?> 
		</div>
		<div class="add-to-cart">
			<?php $soluong =   $row['total']; ?>
			<?php if(!$soluong <= 0) {?>
					<?php
		                if (isset($_SESSION['current_user'])) {
		                ?>
					<form action="?action=addToCart" method="POST">
						<input type="text" value="1" name="quantity[<?=$row['id'] ?>]" size="2" class="quantity-input">
						<input type="hidden" value="addToCart" name="mode">
						<input type="submit" value="Đặt hàng" class="sb">
					</form>
					         <?php 
		                }else{ ?>
		                	<p class="loginadd"> <a href="?action=login"> Login </a> to add cart</p>
		                    <?php 
			          }
			      }else{
			          ?>
			          <p class="loginadd"> Hết hàng</p>
		      <?php } ?>
		</div>
	
		<div class="fb-like" 
		    data-href="http://localhost:8080/doantotnghiep/index.php?view=single-product&id=<?php echo $id?>" 
		    data-layout="standard" 
		    data-action="like" 
		    data-show-faces="true"
		    data-share="true">
		  </div>

	</div>
	<div class="fb-comments" data-href="http://localhost:8080/doantotnghiep/index.php?view=single-product&id=<?php echo $id?>" data-numposts="5" data-width="100%"></div>
	<div class="description">
		<div class="title-des">
			<h3>Mô tả</h3>
		</div>
		
		<div class="main-description">
			<?php echo $row['des'] ?>
		</div>
	</div>

</div>
</div>
</div>
<?php
require_once ('templates/layout/footer.php');
?>