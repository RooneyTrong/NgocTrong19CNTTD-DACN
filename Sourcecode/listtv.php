<!DOCTYPE html>
<html>
	<?php include_once('head.php');?>
	<body id="admin">
		<div class="admin">
			<?php include_once('left-admin.php');?>
			<div class="right-admin">
				<?php
				$user=$_SESSION['user'];
				include_once('conn.php');
				if ($user!='admin') {
					echo '<script language="javascript">alert("Bạn không đủ quyền để truy cập");';
					echo 'location.href="home.php";</script>';
				}else {
					$sql = 'select * from users where username != "admin"';
					$kq =mysqli_query($con,$sql);
					echo '
					<table class="listtv" style="margin:0px;padding:0px;border:#888 2px solid;">
						<tr><th colspan="9">DANH SÁCH THÀNH VIÊN</th></tr>
							<tr>
								<th>ID:</th>
								<th>Name:</th>
								<th>User:</th>
								<th>Password:</th>
								<th>Date Of Birth:</th>
								<th>Gender:</th>
								<th>Phone:</th>
								<th>Address:</th>
								<th/>
							</tr>
							<tr><td colspan="9"><hr/></td></tr>';
					if (mysqli_num_rows($kq)>0) {
						while ($row=mysqli_fetch_assoc($kq)) {
							echo '
							<tr>
								<th>'.$row['user_id'].'</th>
								<td>'.$row['name'].'</td>
								<td>'.$row['username'].'</td>
								<td>'.$row['password'].'</td>
								<td>'.$row['date_of_birth'].'</td>
								<td>'.$row['gender'].'</td>
								<td>'.$row['phone'].'</td>
								<td>'.$row['address'].'</td>
								<td>
									<a onclick="return ConfirmEdit();" href="update_profile_admin.php?user_id='.$row['user_id'].'">
										<input type="button" style="border-top-left-radius:5px; padding:5px 17px; border-color:#888; background-color:#888; color:white; margin:5px 0px;"  value= "EDIT"/>
									</a>
									<a onclick="return ConfirmDelete();" href="delete_user.php?id='.$row['user_id'].'">
										<input type="button" style="border-top-left-radius:5px; padding:5px 6px; border-color:#888; background-color:#888; color:white;" value="DELETE"/>
									</a>
								</td>
							</tr>
							<tr><td colspan="9"><hr/></td></tr>';
						}
					}
				}
				?>
			</div>
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
    function ConfirmEdit(){
    	var a = confirm("Bạn có chắc muốn thay đổi dữ liệu thành viên?");
    	if (a)
    		return true;
    	else
    		return false;
    }
</script>