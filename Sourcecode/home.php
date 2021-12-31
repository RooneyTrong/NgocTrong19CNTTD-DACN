
<!DOCTYPE html>
<html>
	<?php include_once('head.php');?>
	<body>
		<?php
			if (!isset($_SESSION['user'])) {
				unset($_SESSION['giohang']);
				//$_SESSION['giohang'] = array();
				//$_SESSION['giohang'][0]['id'] = '';
				//$_SESSION['giohang'][0]['soluong'] = '';
			} else {
				if (isset($_GET['giohang'])) {
					$id=$_GET['giohang'];
					if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
						$count = count($_SESSION['giohang']);
						$flag = false;
						for ($i = 0 ; $i < $count ; $i++) {
							if ($_SESSION['giohang'][$i]['id'] == $id) {
								$_SESSION['giohang'][$i]['soluong'] += 1;
								$flag = true;
								break;
							}
						}
						if ($flag == false) {
							$_SESSION['giohang'][$count]['id'] = $id;
							$_SESSION['giohang'][$count]['soluong'] = 1;
						}
					} else {
						$_SESSION['giohang'] = array();
						$_SESSION['giohang'][0]['id'] = $id;
						$_SESSION['giohang'][0]['soluong'] = 1;
					}
					//echo $_SESSION['giohang'][0]['soluong'];
					header('location: home.php');
				}
			}
			
		?>

		
			<?php include_once('banner.php');?>
			<div id="container">
			<div class="contein">
				<?php include_once('left.php')?>
				<div class="right" >
					<?php include_once('item.php');?>
				</div>
				<div class="phantrang" >
					<?php
						for($i = 1; $i<$sotrang+1; $i++)
							echo '<b><a href="?page='.$i.'" style="color:red;">'.'Page '.$i.'</a> - </b>';
					?>
				</div>
				<?php include_once('footer.php');?>
			</div>
		</div>
	</body>
</html>