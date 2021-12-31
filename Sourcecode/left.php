<div class="left">
	<div id="slideshow">
		<div class="slide-wrapper">
			<div class="slide"><img src="./images/bn1.png"></div>
			<div class="slide"><img src="./images/bn2.png"></div>
			<div class="slide"><img src="./images/bn3.png"></div>

		</div>
	</div>
	<?php
	if (!isset($_SESSION['user'])) {
		echo '
			<form action="act-dangnhap.php" method="POST">
				<table class="dangnhap" style="width:200px; background-color: #249ECF;
				height: 200px;">
					<tr>
						<th style="color: #fff;">ĐĂNG NHẬP</th>
					</tr>
					<tr>
						<td>
							<input type="text" name="user" style="border:#888 1px solid; margin-left: 10px; background: #f1f1f1; padding:10px; border-radius: 10px;" placeholder="Tài khoản:"/>
						<td>
					</tr>
					<tr>
						<td>
							<input type="password" name="pass" style="border:#888 1px solid;  margin-left: 10px; background: #f1f1f1;padding:10px; border-radius: 10px;" placeholder="Mật khẩu: "/>
						<td>
					</tr>
						<tr>
						<td>
							<a href="dkm.php"><input type="button" name="dkm" value="Đăng ký mới" style="border-top-left-radius:5px; padding:5px; border-color:#888;font-weight: bold; background-color:#e6a701; color:white; margin:10px 4px;"/></a>
							<input type="submit" name="login" value="Đăng nhập" style="font-weight: bold;border-top-left-radius:5px; padding:5px; border-color:#888; background-color:#e6a701; color:white;"/>
						</td>
					</tr>
					<tr><td colspan="2"><hr/></td></tr>
				</table>
			</form>';
	} else {
		echo '<table class="dangnhap" style="width:200px; height: 50px;  background-color: #249ECF;>';
		include_once('conn.php');
		$user = $_SESSION['user'];
		$pass = $_SESSION['pass'];
		$sql = 'select * from users where username like "' . $user . '" and password like "' . $pass . '"';
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result)) {
			while ($row = mysqli_fetch_assoc($result)) {
				if ($user != 'admin') {
					echo '
						<tr><td colspan="2"></td></tr>
						<tr>
							<td style="color:#fff; font-weight:bold; text-align: center;">ACCOUNT: </td>
							<td>' . $row['username'] . '</td>
							<td>
								<a href="logout.php"><input type="button" name="logout"  value="LOGOUT" style="background:#f1bc80; color:black; padding:2px; font-weight: bold; border-radius: 5px;"/></a>
							</td>
						</tr>
						</table>
						<table style="width:200px;height:150px; background:#249ECF">
							<tr><td colspan="2"><hr/></td></tr>
							
							<tr>
								<td colspan="2">
									<a href="update_profile.php?user_id=' . $row['user_id'] . '" style="font-weight: bold;color: #fff;  padding-left: 15px;">Tài khoản.</a>
								</td>
							</tr>
							<tr><td colspan="2"><hr></td></tr>
							<tr>
								<td colspan="2">
									<a href="donhang.php?user_id=' . $row['user_id'] . '" style="font-weight: bold; color: #fff; padding-left: 15px;">Lịch sử đơn hàng</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="shoppingcart.php"><img src="images/shopping-cart.jpg" alt="shopping-cart" name="cart" style="margin-left:10px; border-radius:23px;" /></a>
								</td>';
					if (isset($_SESSION['giohang'])) {
						$sl = count($_SESSION['giohang']);
						echo '<th border=1 style="background:#f1f1f1;margin-right:10px; border-radius:10px;">Số lượng: ' . $sl . ' </th>';
					} else {
						echo '<th border=1 style="background:#f1f1f1;margin-right:10px; border-radius:10px;">Số lượng: 0</th>';
					}
					echo '
							</tr>
							<tr><td colspan="2"><br></td></tr>
							<tr><td colspan="2"><hr/></td></tr>';
				} else {
					header('location:admin.php');
				}
			}
		}
		echo '
						</table>';
	}
	?>
</div>