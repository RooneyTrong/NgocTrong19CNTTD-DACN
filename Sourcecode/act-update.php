<?php
	include_once('conn.php');
	$id=$_POST['user_id'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$name=$_POST['name'];
	$date_of_birth=$_POST['date_of_birth'];
	$gender = $_POST['sex'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	if(isset($_POST['save'])) {
		$update='update users set name = "'.$name.'", date_of_birth = "'.$date_of_birth.'", gender = "'.$gender.'", phone = "'.$phone.'", address = "'.$address.'", password= "'.$pass.'" where user_id = "'.$id.'"';
		$result=mysqli_query($con,$update);
		//var_dump($update);exit();
		if(mysqli_affected_rows($con)>0) {
			echo '<script language="javascript">alert("Thay đổi thông tin thành công!");';
			echo 'location.href="update_profile.php?user_id='.$id.'";</script>';
		}else {
			echo '<script language="javascript">alert("Thay đổi thông tin không thành công!");';
			echo 'location.href="update_profile.php?user_id='.$id.'";</script>';
		}
	}
?>