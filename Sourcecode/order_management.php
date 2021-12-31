<!DOCTYPE html>
<html>
	<?php include_once('head.php');?>
	<body id="admin">
		<div class="admin">
			<?php include_once('left-admin.php');?>
			<div class="right-admin" style="padding-top: 0px; ">
				<?php
					$user=$_SESSION['user'];
					if($user!='admin'){
						echo '<script language="javascript">alert("Bạn không đủ quyền để truy cập");';
						echo 'location.href="home.php";</script>';
					}else{
						include_once('conn.php');
						$sql= 'SELECT * FROM users,transactions WHERE users.user_id=transactions.user_id ORDER BY process ASC';
						$result=mysqli_query($con,$sql);
						if(mysqli_num_rows($result)>0) {
							while($data_user=mysqli_fetch_assoc($result)) {
								$username=$data_user['username'];
								$name_user=$data_user['name'];
								$phone=$data_user['phone'];
								$address=$data_user['address'];
								$id_trans=$data_user['transaction_id'];
								$process=$data_user['process'];
								$amount=$data_user['amount'];
								if($process!='0') {
									$style=' style="background: green; color: white; padding: 10px; font-weight: bold;" value="ĐÃ XỬ LÝ"';
								}else {
									$style=' style="background: red; color: white; padding: 10px; font-weight: bold;" value="CHƯA XỬ LÝ"';
								}
								echo '<br/></hr>
								<table class="cart2" style="padding: 5px; " border="0" >
									<tr>
										<th colspan="2" style="padding:10px;">QUẢN LÝ ĐƠN HÀNG SỐ '.$id_trans.'</th>
									</tr>
									<tr>
										<td style="font-weight: bolder; padding-left: 15px; width: 200px;">Tài khoản:</td>
										<td style="padding-left: 15px">
											'.$username.'
										</td>
									</tr>
									<tr>
										<td style="font-weight: bolder; padding-left: 15px;">Họ tên khách hàng:</td>
										<td style="padding-left: 15px">
											'.$name_user.'
										</td>
									</tr>
									<tr>
										<td style="font-weight: bolder; padding-left: 15px;">Số điện thoại:</td>
										<td style="padding-left: 15px">
											'.$phone.'
										</td>
									</tr>
									<tr>
										<td style="font-weight: bolder; padding-left: 15px;">Địa chỉ liên hệ:</td>
										<td style="padding-left: 15px">
											'.$address.'
										</td>
									</tr>
								</table>';
								$sql2='select orders.product_id, name, price, image_link, image_name, orders.soluong from orders,product where orders.product_id=product.product_id and transaction_id = "'.$id_trans.'" and status = "1"';
								$result2=mysqli_query($con,$sql2);
								echo '
								<table class="cart2" style="padding: 5px;">
									<tr>
										<th style="width: 250px;">Tên sản phẩm:</th>
										<th style="width: 100px;">Giá:</th>
										<th>
											Số lượng:
										</th>
										<th>Hình ảnh:</th>
									</tr>';
								if(mysqli_num_rows($result2)>0) {
									while ($data_order=mysqli_fetch_assoc($result2)) {
										$id_product=$data_order['product_id'];
										$name_product=$data_order['name'];
										$price=$data_order['price'];
										$image_link=$data_order['image_link'];
										$image_name=$data_order['image_name'];
										$soluong=$data_order['soluong'];

										echo '
										<tr>
											<td style="font-weight: bolder; padding-left: 15px;">
												'.$name_product.'
											</td>
											<th>
												'.$price.'VNĐ
											</th>
											<th>
												<input readonly="readonly" style="padding:5px; border-radius: 5px;margin: 0px; font-weight: bold; text-align: center;" type="text" name="sl" value="'.$soluong.'" size="1"/>
											</th>
											<th>
												<a href="detail.php?id='.$id_product.'">
													<img style="border:#888 1px solid;" src="'.$image_link.'" alt="'.$image_name.'" height="100px" width="150px"/>
												</a>
											</th>
										</tr>';
									}
								}
								echo '
									<tr>
										<th>Tổng giá:</th>
										<th colspan="2">
											'.$amount.'VNĐ
										</th>
										<th >
											<a onclick="return ConfirmProcess();" href="process.php?id='.$id_trans.'" >
												<input type="button" name="process" '.$style.'/>
											</a>
										</th>
									</tr>
								</table><hr/><br/></hr>';
							}
						}
					}
				?>
			</div>
		</div>
	</body>
</html>
<script>
    function ConfirmProcess()
    {
      	var x = confirm("Bạn có chắc muốn thực hiện?");
      	if (x)
        	return true;
      	else
        	return false;
    }
</script>  
