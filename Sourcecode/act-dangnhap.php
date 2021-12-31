<?php 
	session_start();
	include_once('conn.php');
	if(isset($_POST['login']))
	{
		$user= mysqli_real_escape_string($con,$_POST['user']);
		$pass= mysqli_real_escape_string($con,$_POST['pass']);
		if($user== '' || $pass == '')
		{
			echo '<script language="javascript">alert("Tài khoản hoặc mật khẩu không được để trống!");';
			echo 'location.href="home.php";</script>';
		}
		else
		{
			$sql='select * from users where username = "'.$user.'" and password = "'.$pass.'"';//var_dump($sql);exit;
			$result=mysqli_query($con,$sql);//var_dump($result);exit;
			if(mysqli_num_rows($result)>0)
			{
				while($row=mysqli_fetch_assoc($result))
				{
					if($row['level']!=1)
					{
					$_SESSION['user']=$user;
					$_SESSION['pass']=$pass;
					$_SESSION['login']=$_POST['login'];
		//			var_dump($_SESSION['email']);exit;
					echo '<script language="javascript">alert("Bạn đã đăng nhập thành công!");';
					echo 'location.href="home.php";</script>';
					}
					else
					{
						$_SESSION['user']=$user;
						$_SESSION['pass']=$pass;
						$_SESSION['login']=$_POST['login'];
			//			var_dump($_SESSION['email']);exit;
						echo '<script language="javascript">alert("Xin chao Admin!");';
						echo 'location.href="home.php";</script>';
					}
				}
			}
			else
			{
				echo '<script language="javascript">alert("Tài khoản hoặc mật khẩu không đúng!");';
				echo 'location.href="home.php";</script>';
			}
		}
	}
?>
