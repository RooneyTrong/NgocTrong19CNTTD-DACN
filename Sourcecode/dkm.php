<!DOCTYPE html>
<html>
	<?php include_once('head.php');?>
	<body>
	<?php include_once('banner.php');?>
		<div id="container">
			
			<div class="contein">
				<form action="dangky.php" method="POST">
					<table class="listsp" style="padding:20px;">
						<tr><td colspan="2"><hr/></td></tr>
						<th colspan="2">ĐĂNG KÝ THÔNG TIN</th>
						<tr><td colspan="2"><hr/></td></tr>
						<tr>
							<td style="padding:0px 20px;font-weight: bold;">Họ và tên*:</td>
							<td>
								<input type="text" name="name" size="50px" style="border:0;border-radius:10px;"></input>
							</td>
						</tr>
						<tr>
							<td style="padding:0px 20px;font-weight: bold;">Tên tài khoản*:</td>
							<td>
								<input type="text" name="user" size="50px" style="border:0;border-radius: 10px;"></input>
							</td>
						</tr>
						<tr>
							<td style="padding:0px 20px;font-weight: bold;">Ngày sinh:</td>
							<td>
								<input type="date" name="date_of_birth" />
							</td>
						</tr>
						<tr>
							<td style="padding:0px 20px;font-weight: bold;">Giới tính:</td>
							<td>
								<input type="radio" name="gender" value="male" style="border:0;border-radius:10px;">Nam</input>
								<input type="radio" name="gender" value="female" style="border:0;border-radius:10px;">Nữ</input>
							</td>
						</tr>
						
						<tr>
							<td style="padding:0px 20px;font-weight: bold;">Điện thoại:</td>
							<td>
								<input type="text" name="phone" style="border:0;border-radius:10px;"input>
							</td>
						</tr>
						<tr>
							<td style="padding:0px 20px;font-weight: bold;">Địa chỉ:</td>
							<td>
								<input type="text" name="address" size="50px" style="border:0;border-radius:10px;"></input>
							</td>
						</tr>
						<tr>
							<td style="padding:0px 20px;font-weight: bold;">Mật khẩu*:</td>
							<td>
								<input type="password" name="password" style="border:0;border-radius:10px;"></input></td>
							</tr>
						<tr>
							<td/>
							<td>
								<input type="submit" name="dangky" value="Đăng ký" style="color:white;font-weight: bold;background:#888;border:0;padding:5px; border-radius:5px;"></input>
								<input type="reset" value="Làm lại" style="color:white;font-weight: bold; background:#888;border:0;padding:5px; border-radius:5px;"></input>
							</td>
						</tr>
						<tr><th colspan="2"></th></tr>
						<tr><td colspan="2"><hr/></td></tr>
						<tr><td colspan="2"><hr/></td></tr>
					</table>
				</form>
			</div>
			<?php include_once('footer.php');?>
		</div>
	</body>
</html>