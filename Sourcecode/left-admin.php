<?php
			include_once('conn.php');
			$user=$_SESSION['user'];
			$pass=$_SESSION['pass'];
			$sql='select * from users where username like "'.$user.'" and password like "'.$pass.'"';
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)){
				while($row=mysqli_fetch_assoc($result)){
					$user_id=$row['user_id'];
					if($user!='admin') {
						echo '<script language="javascript">alert("Bạn không đủ quyền để truy cập");';
						echo 'location.href="home.php";</script>';
					}else {
						$select='select count(*) as sl from users';
						$result2=mysqli_query($con,$select);
						$select2='select count(*) as sl from product';
						$result3=mysqli_query($con,$select2);
						$select3='select count(*) as sl from transactions where  process = "0"';
						$result4=mysqli_query($con,$select3);
						$select4='select count(*) as sl from transactions where process = "1"';
						$result5=mysqli_query($con,$select4);
						while($row1=mysqli_fetch_assoc($result2)) {
							while($row2=mysqli_fetch_assoc($result3)) {
								while($row3=mysqli_fetch_assoc($result4)) {
									while ($row4=mysqli_fetch_assoc($result5)) {
										$count_user=$row1['sl']-1;
										$count_product=$row2['sl'];
										$count_order_wait=$row3['sl'];
										$count_order_finish=$row4['sl'];
									}
								}
							}
						}
						$count = 'select count(*) as sl from detail_report where status = "0"';
						$kq = mysqli_query($con,$count);
						while ($row5 = mysqli_fetch_assoc($kq)) {
							$count_mail = $row5['sl'];
						}
					}
				}
			}
		?>
<div class="left-admin">
				<h1><a href="admin.php" style="color: #199dd1;">HELLO:  <?php echo $user;?></a></h1>
				<ul>
					<a href="listtv.php">
						<li>
							Quản lý thành viên
						</li>
					</a>
					<a href="list_product.php">
						<li>
							Quản lý sản phẩm
						</li>
					</a>
					<a href="update_profile_admin.php?user_id=<?php echo $user_id;?>">
						<li>
							Chỉnh sửa thông tin admin
						</li>
					</a>
					<a href="order_management.php">
						<li>
							<table>
								<tr>
									<td rowspan="2" style="border-right:#888 2px solid; ">
										Đơn hàng
									</td>
									<th style="border-bottom: #888 2px solid;">Chờ: <?php echo $count_order_wait;?></th>
								</tr>
								<tr>
									<th>Hoàn thành: <?php echo $count_order_finish	;?></th>
								</tr>
							</table>
						</li>
					</a>
					<a href="report_management.php">
						<li>
							<table>
								<tr>
									<td style="border-right:#888 2px solid;">
										Thư phản hồi:
									</td>
									<td>
										-<?php echo $count_mail;?>-
									</td>
								</tr>
							</table>
						</li>
					</a>
				</ul>
				<a href="logout.php" >
					<input type="button" name="logout"  value="LOGOUT" style="background:#f1bc80;  margin:0px 250px; color:blue; padding:7px; font-weight: bold; border-radius: 5px;"/>
				</a>
			</div>