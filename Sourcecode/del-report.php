<?php 
	include_once('conn.php');
	$id = $_GET['letter'];
	$del = 'DELETE FROM detail_report WHERE id = "'.$id.'"';
	$kq = mysqli_query($con,$del);
	if(mysqli_affected_rows($con)>0) {
		echo '<script language="javascript">alert("Bạn đã xóa thư phản hồi thành công!");';
		echo 'location.href="report_management.php";</script>';
	}else {
		echo '<script language="javascript">alert("Bạn đã xóa thư phản hồi không thành công!");';
		echo 'location.href="report_management.php";</script>';
	}
?>