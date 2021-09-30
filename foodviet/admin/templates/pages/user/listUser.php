<?php 
require_once('templates/layout/headerAdmin.php');
?>
<?php
$stt =0;
?>
<div class="table-responsive">
	<table id="example" class="display" style="width:100%">
		<thead>
		<tr>
			<th>STT</th>
			<th>User name</th>
			<th>Tên khách hàng</th>
			<th>Email</th>
			<th>Số điện thoại</th>
			<th>Mật khẩu( MD5)</th>
			<th>action</th>
		</tr>
		</thead>
	  <tbody>
		<?php
		if (isset($result) && !empty($result)) {
			while ($row= mysqli_fetch_assoc($result)) {
				$stt++;
				?>
				<tr>
					<td><?php echo $stt; ?></td>
					<td><?php echo $row['username'] ?></td>
					<td><?php echo $row['fullname'] ?></td>
					
					<td><?php echo $row['email'] ?></td>
					<td><?php echo $row['phonenumber'] ?> </td>
					<td><?php echo $row['password'] ?></td>
					<td>

						<a href="?action=editUser&id=<?php echo $row['id'] ?>" class="navbar-link btn btn-info">Edit</a> || 
						<a href="?action=deleteUser&id=<?php echo $row['id'] ?>" class="navbar-link btn btn-danger">delete</a>
					</td>
				</tr>
				<?php
			} 
		}
			?>
	  </tbody>

		</table>
	</div>
	<?php 
	require_once('templates/layout/footerAdmin.php');
	?>