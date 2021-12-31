<?php 
	session_start();
	include_once('conn.php');
	if (isset($_POST['gui'])) {
		if ($_POST['chude'] == '' || $_POST['name'] == '' || $_POST['email'] == '' || $_POST['detail'] == '' || $_POST['title'] == '') {
			echo '<script language="javascript">alert("Vui lòng điền đầy đủ các thông tin yêu cầu!");';
			echo 'location.href="lienhe.php";</script>';
		}else {
			$chude=$_POST['chude'];
			$detail=$_POST['detail'];
			$title=$_POST['title'];
			$name=$_POST['name'];
			$email=$_POST['email'];
			$phone=$_POST['phone'];	
			$sql = 'select * from loai_chude where id = "'.$chude.'"';
			$kq = mysqli_query($con,$sql);
			//var_dump($sql);var_dump($kq);exit();
			if (mysqli_num_rows($kq)>0) {
				while ($chude = mysqli_fetch_array($kq)) {
					$insert = 'insert into detail_report (title,name,detail,email,phone,id_chude) values ("'.$title.'","'.$name.'","'.$detail.'","'.$email.'","'.$phone.'","'.$chude['id'].'")';
					$result = mysqli_query($con,$insert);
					if(mysqli_affected_rows($con)>0) {
						echo '<script language="javascript">alert("Gửi phản hồi thành công!");';
						echo 'location.href="lienhe.php";</script>';
					}else {
						echo '<script language="javascript">alert("Gửi phản hồi không thành công");';
						echo 'location.href="lienhe.php";</script>';
					}
				}
			}
		}
	}
?>