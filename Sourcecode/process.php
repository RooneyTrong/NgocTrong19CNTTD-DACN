<?php
	include_once('conn.php');
	$id_trans=$_GET['id'];
	$sql= 'update transactions set process = "1" where transaction_id = "'.$id_trans.'"';
	mysqli_query($con,$sql);
	if(mysqli_affected_rows($con)>0) {
		echo '<script language="javascript">alert("Yêu cầu đã được nhận!");';
		echo 'location.href="order_management.php";</script>';
	}else {
		echo '<script language="javascript">alert("Yêu cầu không thể thực hiện! Vui lòng kiểm tra lại.");';
		echo 'location.href="order_management.php";</script>';
	}
?>