<!DOCTYPE html>
<html>
<?php include_once('head.php');?>
<body>
<?php include_once('banner.php');?>
	<div id="container">
		
		<div class="contein">
			<?php include_once('left.php');?>
			<div class="right">
				<?php 
					include_once('conn.php');
					$user=$_SESSION['user'];
					if(!$user) {
						echo '<script language="javascript">alert("Bạn hiện tại chưa đăng nhập!");';
						echo 'location.href="home.php";</script>';
					}else {
						echo '
						<form action="cart.php" method="POST">
							<table class="cart">
								<tr>
									<th>Tên sản phẩm</th>
									<th>Giá</th>
									<th>Số lượng</th>
									<th>Sản phẩm</th>
									
								</tr>';
							$sql= 'select * from users where username = "'.$user.'"';
							$kq= mysqli_query($con,$sql);
							//var_dump($sql)
							if (isset($_SESSION['giohang'])) {
								if (isset($_GET['minus'])) {
									$id = $_GET['minus'];
									for ($i = 0 ; $i < count($_SESSION['giohang']) ; $i ++) {
										if ($_SESSION['giohang'][$i]['id'] == $id) {
											$_SESSION['giohang'][$i]['soluong'] = $_SESSION['giohang'][$i]['soluong'] - 1;
											//$_SESSION['giohang'][$i]['soluong'] = $_SESSION['soluong'];
										}
									}
									header('location: shoppingcart.php');
								}
								if (isset($_GET['plus'])) {
									$id = $_GET['plus'];
									for ($i = 0 ; $i < count($_SESSION['giohang']) ; $i ++) {
										if ($_SESSION['giohang'][$i]['id'] == $id) {
											$_SESSION['giohang'][$i]['soluong'] = $_SESSION['giohang'][$i]['soluong'] + 1;
											//$_SESSION['giohang'][$i]['soluong'] = $_SESSION['soluong'];
											
										}
									}
									header('location: shoppingcart.php');
								}

								$amount = 0;
								for ($i = 0 ; $i < count($_SESSION['giohang']) ; $i ++) {

									$select = 'select * from product where product_id = "'.$_SESSION['giohang'][$i]['id'].'"';
									$result = mysqli_query($con,$select);
									if (mysqli_num_rows($result)>0) {
										while ($row=mysqli_fetch_array($result)) {
											$amount = $amount + ($row['price'] * $_SESSION['giohang'][$i]['soluong']);
											echo '<input type="hidden" name="soluong[]" value="'.$_SESSION['giohang'][$i]['soluong'].'" />';
											echo '<input type="hidden" name="product_id[]" value="'.$_SESSION['giohang'][$i]['id'].'"/>';
											//$_SESSION['giohang'][$i]['id']=$_SESSION['product_id'];
										}
									}
								}
								for ($i = 0 ; $i < count($_SESSION['giohang']) ; $i ++) {
									$select = 'select * from product where product_id = "'.$_SESSION['giohang'][$i]['id'].'"';
									$result = mysqli_query($con,$select);
									
									if (mysqli_num_rows($result)>0) {
										while ($row=mysqli_fetch_array($result)) {
									?>
										<tr>
											<td style="font-weight: bold; padding-left: 30px;">
												<?php echo $row['name'];?>
											</td>
											<th>
												<?php echo $row['price'];?>VNĐ
											</th>
											<th>
												<a href="?minus=<?php echo $_SESSION['giohang'][$i]['id'];?>">
													<img src="images/minus.png" alt="minus.png" width="12px" width="12px" style="border-radius: 5px;" />
												</a>
													<input readonly="readonly" style="padding:5px; border-radius: 5px;margin: 0px; font-weight: bold; text-align: center;" type="text" name="sl" value="<?php echo $_SESSION['giohang'][$i]['soluong'];?>" size="1"/>
												<a href="?plus=<?php echo $_SESSION['giohang'][$i]['id'];?>">
													<img src="images/plus.png" alt="plus.png" width="12px" width="12px" style="border-radius: 5px;" />
												</a>
											</th>
											<th>
												<a href="detail.php?id=<?php echo $_SESSION['giohang'][$i]['id'];?>">
													<img style="border:#888 1px solid;" src="<?php echo $row['image_link'];?>" alt="<?php echo $row['image_name'];?>" height="100px" width="150px"/>
												</a>
											</th>
										</tr>
									<?php 
										}
									}
								}
								echo '
								<tr>
									<th>Tổng giá:</th>
										<input type="hidden" name="amount" value="'.$amount.'" />
									<th colspan="2">'.$amount.' VNĐ</th>
									<th colspan="1">
										<a onclick="return ConfirmOrder();">
												<input type="submit" name="order" style="border-radius:5px; padding:5px 15px; background-color:#ff5200b8; font-weight: bold; color:white;" value="ĐẶT HÀNG"/>
										</a>
										<a onclick="return ConfirmDelete();" href = "del-cart.php">
											<input type="button" style="border-radius:5px; padding:5px 15px; background-color:#888; font-weight: bold; color:white;" value="DELETE" />
										</a>
									</th>
								</tr>';
							}
						echo '</table></form>';
					}
				?>
			</div>

		</div>
		<?php include_once('footer.php');?>
	</div>
</body>
</html>
<script>
    function ConfirmDelete()
    {
      	var x = confirm("Bạn có chắc muốn xóa không?");
      	if (x)
        	return true;
      	else
        	return false;
    }
    function ConfirmOrder() {
    	var a = confirm("Bạn có chắc muốn đặt hàng không?");
      	if (a)
        	return true;
      	else
        	return false;
    }
</script>  