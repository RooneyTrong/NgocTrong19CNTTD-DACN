<!DOCTYPE html>
<html>
	<?php include_once('head.php');?>
	<body id="admin">
		<div class="admin">
			<?php include_once('left-admin.php');?>
			<div class="right-admin">
				<p style="padding-top: 100px;font-size: 50px; color: red;">
					Chào ADMIN, bạn hiện tại đang có <?php echo $count_order_wait;?> đơn hàng đang chờ xử lý
				</p>
			</div>
		</div>
	</body>
</html>

