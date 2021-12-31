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
						echo 'location.href="detail.php?id='.$id_pd.'";</script>';
					}else {
						echo '
						<table class="cart">
							<tr>
								<th style="padding:5px;">Tên sản phẩm</th>
								<th>Số lượng</th>
								<th>Giá</th>
								<th>Sản phẩm</th>
							</tr>';
						$sql= 'select * from users where username = "'.$user.'"';
						$kq= mysqli_query($con,$sql);
						//var_dump($sql)
						if(mysqli_num_rows($kq)>0) {
							while($data=mysqli_fetch_assoc($kq)) {
								$select = 'SELECT product.product_id, catalog_id, name, price, image_link, image_name, orders.soluong, order_id, transactions.transaction_id, amount, process, status 
									FROM 
										product,orders,transactions 
									WHERE
										product.product_id = orders.product_id
									AND 	
										transactions.transaction_id = orders.transaction_id
									AND 
										user_id = "'.$data['user_id'].'"
									and 
										process = "1";
									';
								$result= mysqli_query($con,$select);
								//var_dump($select);exit;
								if (mysqli_num_rows($result)>0) {
									while($row=mysqli_fetch_assoc($result)) {
										$amount=$row['amount'];
										$process=$row['process'];
										echo '
										<tr>
											<td style="font-weight: bold; padding-left: 30px;">'.$row['name'].'</td>
											<th>
												<input readonly="readonly" style="padding:5px; border-radius: 5px;margin: 0px; font-weight: bold; text-align: center;" type="text" name="sl" value="'.$row['soluong'].'" size="1"/>
											</th>
											<th>'.$row['price'].' VNĐ</th>
											<th>
												<a href="detail.php?id='.$row['product_id'].'">
													<img style="border:#888 1px solid;" src="'.$row['image_link'].'" alt="'.$row['image_name'].'" height="100px" width="150px"/>
												</a>
											</th>
										</tr>';
									}
									if($process!='0') {
									$style=' style="text-align:center; border-radius:5px; background: green; color: white; padding: 5px; font-weight: bold;" value="Đã được xử lý"';
									}else {
										$style=' style="background: yellow; border-radius:5px; color: red; padding: 5px; font-weight: bold; text-align:center;" value="Đang chờ xử lý"';
									}
									echo '
									<tr>
										<th style="padding:10px;">TỔNG GIÁ:</th>
										<th colspan="2">'.$amount.'</th>
										<th>
											<input type="text" readonly="readonly" '.$style.'/>
										</th>
									</tr>';
								}
							}
						}
						echo '</table>';
					}
				?>
			</div>

		</div>
		<?php include_once('footer.php');?>
	</div>
</body>
</html>
