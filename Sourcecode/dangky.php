<?php 
	include_once('conn.php');
	if(isset($_POST['dangky'])){
		$name=$_POST['name'];
		$username=$_POST['user'];
		$date_of_birth=$_POST['date_of_birth'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$password=$_POST['password'];
		$gender=$_POST['gender'];
		if($name == '' || $username == '' || $password == ''){
			echo 'Bạn vui lòng nhập đủ thông tin';
			header('location: dkm.php');
		}else {
			
			$sql= 'select * from users where username = "'.$username.'"';
			$result= mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0){
				echo '<script language="javascript">alert("Tài khoản đã tồn tại");';
				echo 'location.href="home.php";</script>';
			}else{
				$query='insert into users (name,username,date_of_birth,gender,phone,address,password) 
				values ("'.$name.'","'.$username.'","'.$date_of_birth.'","'.$gender.'","'.$phone.'","'.$address.'","'.$password.'")';
				mysqli_query($con,$query);
				echo '<script language="javascript">alert("Bạn đã đăng ký thành công!");';
				echo 'location.href="home.php";</script>';
			}
		}
	}
?>