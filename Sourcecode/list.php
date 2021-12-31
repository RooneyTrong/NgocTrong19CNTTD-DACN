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
			
			<div class="contein" style="background:#2d271b;">
			<?php include_once('left.php');?>
			<div class="right" style="background:#dcd4c6">
			<?php 
				include_once('conn.php');
				$sql='select * from product';
				$result=mysqli_query($con,$sql);
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_assoc($result)){
						$id=$_GET['id'];
						//var_dump($_GET['id_catal']);exit();
						if($id==$row['catalog_id']){
							echo '
							<div class="icon_item">
								<form action="cart.php" method="GET">
									<table style="padding:0px;">
										<tr>
											<th style="padding:10px 0px;"> '.$row['name'].' </th>
										</tr>
										<input type="hidden" name="id" value="'.$row['product_id'].'"/>
										
										<tr>
											<td style="padding:0px 0px 20px 0px;">
												<a href="detail.php?id='.$row['product_id'].'">
													<img src="'.$row['image_link'].'" alt="'.$row['image_name'].'" height="200px" width="247px"/>
												</a>
											</td>
										</tr>
										<tr>
											<th style="padding:0px 0px 0px 0px;"> GIÁ: '.$row['price'].' VNĐ</th>
										</tr>
										<tr>
											<td> 
												<a href="?id='.$id.'&giohang='.$row['product_id'].'">
													<input type="button" style="border:#888 1px solid; border-radius: 5px; background:#e47c11; font-weight: bold; padding:10px; color:white;" value="ADD TO CART"/>
												</a>
											</td>
										</tr>
									</table>
								</form>
							</div>';
						}
					}
				}
			?>
			</div>
			</div>
			<?php include_once('footer.php')?>
		</div>
	</body>
</html>