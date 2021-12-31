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
						$id=$_GET['user_id'];
						//$user=$_SESSION['user'];
						$sql='select * from users where user_id = "'.$id.'"';
						$result=mysqli_query($con,$sql);
						if(mysqli_num_rows($result)>0) {
							while ($row=mysqli_fetch_assoc($result)) {
								echo '
								<form action="act-update.php" method="POST">
									<table class="listsp" style="padding:5px;">
										<input type="hidden" name="user_id" value="'.$id.'"/>
										<tr>
											<th colspan="2" style="color: red;">THÔNG TIN TÀI KHOẢN</th>
										</tr>
										<tr><td colspan="2"><hr/><hr/></td></tr>
										<tr>
											<td>Tài khoản:</td>
											<td>
												<input type="text" name="user" readonly="readonly" value="'.$row['username'].'" />
											</td>
										</tr>
										<tr>
											<td>Mật khẩu:</td>
											<td>
												<input type="password" name="pass"  value="'.$row['password'].'" />
											</td>
										</tr>
										<tr><td colspan="2"><hr/></td></tr>
										<tr><td colspan="2"><hr/><hr/><hr/></td></tr>
										<tr>
											<td>Họ và tên:</td>
											<td>
												<input type="text" name="name" value="'.$row['name'].'" />
											</td>
										</tr>
										<tr>
											<td>Ngày sinh:</td>
											<td>
												<input type="date" name="date_of_birth" value="'.$row['date_of_birth'].'"/>
											</td>
										</tr>
										<tr>';?>	
											<td>Giới tính:</td>
											<td>
												<input type="radio" name="sex" value="male" <?php
													if($row['gender'] == 'male'){
														echo 'checked';
													}else{
														echo '';
													}
												?>>male</input>
												<input type="radio" name="sex" value="female" <?php 
													if($row['gender'] == 'female'){
														echo 'checked';
													}else{
														echo '';
													}
												?>>female</input>
											</td>
										</tr>
							<?php echo '<tr>
											<td>Số điện thoại:</td>
											<td>
												<input type="text" name="phone" value="'.$row['phone'].'"/>
											</td>
										</tr>				
										<tr>
											<td>Địa chỉ:</td>
											<td>
												<input type="text" name="address" value="'.$row['address'].'"/>
											</td>
										</tr>
										<tr><td colspan="2"><hr/><hr/><hr/></td></tr>
										<tr>
											<th colspan="2" style="border-top:#888 1px solid;">
												<input type="reset" name="reset" value="RESET" style=" margin:10px; border-top-left-radius:5px; padding:5px; border-color:#888; background-color:#888; color:white;"/>
												<input onclick="return ConfirmUpdate();" type="submit" name="save" value="SAVE" style="border-top-left-radius:5px; margin:10px ;padding:5px; border-color:#888; background-color:#888; color:white;"/>
											</th>
										</tr>
										<tr><td colspan="2"><hr/></td></tr>
										<tr><td colspan="2"><hr/><hr/></td></tr>
									</table>
								</form>';	
							}
						}
					?>
				</div>
			</div>
			<?php include_once('footer.php');?>
		</div>
	</body>
</html>
<script>
    function ConfirmUpdate()
    {
      var x = confirm("Bạn có chắc muốn thay đổi dữ liệu không?");
      if (x)
        return true;
      else
        return false;
    }
</script>  