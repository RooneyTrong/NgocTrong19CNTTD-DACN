<?php
	include_once('conn.php');
	$id= $_GET['id'];
	$delete= 'delete from orders where order_id = "'.$id.'"';
	$result= mysqli_query($con,$delete);
	if(mysqli_affected_rows($con)>0) {
		echo '<script language="javascript">alert("Bạn đã xóa thành công!");';
		echo 'location.href="shoppingcart.php";</script>';
	}else {
		echo '<script language="javascript">alert("Bạn đã xóa không thành công!");';
		echo 'location.href="shoppingcart.php";</script>';
	}
?>