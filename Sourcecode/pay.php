<?php
	$id_trans= $_GET['id'];
	//var_dump($id_trans);exit;
	include_once('conn.php');
	$sql= 'update transactions set status = "1" where transaction_id = "'.$id_trans.'"';
	$result= mysqli_query($con,$sql);
	$sql2 = 'update orders set status = "1" where transaction_id = "'.$id_trans.'"';
	$result2= mysqli_query($con,$sql2);
	if(mysqli_affected_rows($con)>0) {
		echo '<script language="javascript">alert("Bạn đã đặt hàng thành công!");';
		echo 'location.href="shoppingcart.php";</script>';	
	}else {
		echo '<script language="javascript">alert("Quá trình đặt hàng đang gặp sự cố!");';
		echo 'location.href="shoppingcart.php";</script>';
	}
?>