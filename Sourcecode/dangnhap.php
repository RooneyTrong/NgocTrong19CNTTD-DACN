
<?php
	if(!isset($_SESSION['user'])){
		echo '
		<form action="dangnhap.php" method="POST">
			<table class="dangnhap" style="width:100%; background:#dcd4c6">
				<tr>
					<th>ĐĂNG NHẬP</th>
				</tr>
				<tr>
					<td>Tài khoản:<td>
				</tr>
				<tr>
					<td>
						<input type="text" name="user" style="border:#888 1px solid;  background: #f1f1f1; padding:5px;"/>
					<td>
				</tr>
				<tr>
					<td>Password:<td>
				</tr>
				<tr>
					<td>
						<input type="password" name="pass" style="border:#888 1px solid;  background: #f1f1f1;padding:5px;"/>
					<td>
				</tr>
				<tr>
					<td>
						<a href="dkm.php">
							<input type="button" name="dkm" value="Đăng ký mới" style="border-top-left-radius:5px; padding:5px; border-color:#888; background-color:rgb(224, 146, 28); color:white; margin:10px 10px;"/>
						</a>
						<input type="submit" name="login" value="Đăng nhập" style="border-top-left-radius:5px; padding:5px; border-color:#888; background-color:rgb(224, 146, 28); color:white;"/>
					</td>
				</tr>
			</table>
		</form>';
}
?>
<div class="headmenu">
	<form action="act-dangnhap.php" method="POST">
		<ul>
			<li>
				<input type="text" name="user" style="border:#888 1px solid;  background: #f1f1f1; padding:10px; border-radius: 5px" placeholder="Tài khoản:"/>
			</li>
			<li>
				<input type="password" name="pass" style="border:#888 1px solid;  background: #f1f1f1;padding:10px; border-radius: 5px;" placeholder="Mật khẩu:" />
				<a href="dkm.php">Sign up?</a>
			</li>
			<li>
				<input type="submit" name="login" value="Đăng nhập" style="border-top-left-radius:5px; padding:5px; border-color:#888; background-color:#888; color:white;"/>
			</li>
		</ul>
	</form>
</div>
