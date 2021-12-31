<?php
	include_once('conn.php');
	$id= $_GET['id'];
	$select = 'delete from users where user_id like "'.$id.'"';
	//var_dump($select);exit;
	$result=mysqli_query($con,$select);
	if(mysqli_affected_rows($con)>0){
		echo '<script language="javascript">alert("Bạn đã xóa thành công!");';
		echo 'location.href="listtv.php";</script>';
	}else{
		echo '<script language="javascript">alert("Bạn đã xóa không thành công!");';
		echo 'location.href="listtv.php";</script>';
	}
?>