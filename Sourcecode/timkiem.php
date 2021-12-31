<!DOCTYPE html>
<html>
	<?php include_once('head.php');?>
	<body>
		<?php
			if (!isset($_SESSION['user'])) {
				$_SESSION['giohang'] = array();
				$_SESSION['giohang'][0]['id'] = '';
				$_SESSION['giohang'][0]['soluong'] = '';
			} else {
				if (isset($_GET['giohang'])) {
					$giohang = $_GET['giohang'];
					if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
						$count = count ($_SESSION['giohang']);
						$flag = false;
						for ( $i = 0; $i < $count; $i++) {
							if ($_SESSION['giohang'][$i]['id'] == $giohang) {
								$_SESSION['giohang'][$i]['soluong'] += 1;
								$flag = true;
								break;
							}
						}
						if ($flag == false) {
							$_SESSION['giohang'][$count]['id'] = $giohang;
							$_SESSION['giohang'][$count]['soluong'] = 1;
						}
					} else {
						$_SESSION['giohang'] = array();
						$_SESSION['giohang'][0]['id'] = $giohang;
						$_SESSION['giohang'][0]['soluong'] = 1;
					}
					echo '<script language="javascript">alert("Bạn đã thêm giỏ hàng thành công!");';
					echo 'location.href="?id='.$_SESSION['giohang'].'";</script>';
				}
			}
		?>
		<?php include_once('banner.php');?>
		<div id="container">
			
			<div class="contein">
				<?php include_once('left.php');?>
				<div class="right" >
					<?php include_once('search.php');?>
				</div>
			</div>
			<?php include_once('footer.php');?>
		</div>
	</body>
</html>