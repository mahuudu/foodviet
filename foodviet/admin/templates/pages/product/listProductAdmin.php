<?php 
	require_once('templates/layout/headerAdmin.php');
 ?>
<?php
 $stt =0;
?>
<div class="table-responsive">
<table  id="example" class="display" style="width:100%">
        <thead>
			<tr>
				<th>STT</th>
				<th>Sản Phẩm</th>
				<th>Loại Sản Phẩm</th>
				<th>Nhà Sản Xuất</th>
				<th>Giá</th>
				<th>Khuyến Mãi</th>
				<th>Hình Ảnh</th>
				<th>Tiền vốn</th>
				<th>Xóa</th>
                <th>Sửa</th>
			</tr>
         </thead>
          <tbody>
    <?php
while ($row= mysqli_fetch_assoc($result)) {
    $stt++;
    ?>
    <tr>
        <td> <?php echo $stt; ?> </td>
        <td><?php echo $row['name_product'] ?></td>
        <td><?php echo $row['category_name'] ?></td>
        <td><?php echo $row['producer_name'] ?></td>
        <td><?php echo number_format($row['price']) ?></td>
        <td><?php echo number_format($row['discount']) ?></td>
        <td><img src="../uploads/image/<?php echo $row['image_link']?>" style="width: 150px;" alt=""></td>
        <td><?php echo $row['investment_money'] ?></td>
        <td> <a  onclick="return confirm('delete?');" class="btn btn-danger" 
            href="?action=deleteProductAdmin&url=<?php echo $row['image_link']?>&id=<?= $row['id']?>"> DELETE </a>
        </td>
        <td> <a class="btn btn-primary" href="?action=editProductAdmin&id=<?= $row['id'] ?>"> EDIT </a> </td>
    </tr>
    <?php } ?>
	</tbody>
	</table>
</div>
<?php 
	require_once('templates/layout/footerAdmin.php');
 ?>