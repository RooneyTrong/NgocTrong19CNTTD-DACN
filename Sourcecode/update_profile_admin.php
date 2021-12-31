<!DOCTYPE html>
<html>
	<?php include_once('head.php');?>
	<body id="admin">
		<div class="admin">
			<?php include_once('left-admin.php');?>
			<div class="right-admin">
				<?php
					include_once('conn.php');
					$id=$_GET['user_id'];
					//$user=$_SESSION['user'];
					$sql='select * from users where user_id = "'.$id.'"';
					$result=mysqli_query($con,$sql);
					if(mysqli_num_rows($result)>0) {
						while ($row=mysqli_fetch_assoc($result)) {
							echo '
							<form action="act-update-admin.php" method="POST">
								<table class="listtv" style="padding:5px;">
									<input type="hidden" name="user_id" value="'.$id.'"/>
									<tr>
										<th colspan="2" style="color: red;">THÔNG TIN TÀI KHOẢN</th>
									</tr>
									<tr><td colspan="2"><hr/><hr/></td></tr>
									<tr>
										<td>Tài khoản:</td>
										<td style="text-align:left;">
											<input type="text" name="user" readonly="readonly" value="'.$row['username'].'" size="50"/>
										</td>
									</tr>
									<tr>
										<td>Mật khẩu:</td>
										<td style="text-align:left;">
											<input type="text" name="pass" value="'.$row['password'].'" size="50"/>
										</td>
									</tr>
									<tr><td colspan="2"><hr/></td></tr>
									<tr><td colspan="2"><hr/><hr/><hr/></td></tr>
									<tr>
										<td>Họ và tên:</td>
										<td style="text-align:left;">
											<input type="text" name="name" value="'.$row['name'].'" size="50"/>
										</td>
									</tr>
									<tr>
										<td>Ngày sinh:</td>
										<td style="text-align:left;">
											<input type="date" name="date_of_birth" value="'.$row['date_of_birth'].'"/>
										</td>
									</tr>
									<tr>';?>	
										<td>Giới tính:</td>
										<td style="text-align:left;">
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
										<td style="text-align:left;">
											<input type="text" name="phone" value="'.$row['phone'].'"size="50"/>
										</td>
									</tr>				
									<tr>
										<td>Địa chỉ:</td>
										<td style="text-align:left;">
											<input type="text" name="address" value="'.$row['address'].'" size="50"/>
										</td>
									</tr>
									<tr><td colspan="2"><hr/><hr/><hr/></td></tr>
									<tr>
										<th colspan="2" style="border-top:#888 1px solid;">
											<input type="reset" name="reset" value="RESET" style="border-top-left-radius:5px; padding:3px; border-color:#888; background-color:#888; color:white;"/>
											<input onclick="return ConfirmUpdate();" type="submit" name="save" value="SAVE" style="border-top-left-radius:5px; padding:3px; border-color:#888; background-color:#888; color:white;"/>
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
