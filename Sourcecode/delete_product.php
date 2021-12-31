<?php
	include_once('conn.php');
	$id= $_GET['id'];
	$sql='select * from product, catalogs where product.catalog_id = catalogs.catalog_id and product_id = "'.$id.'"';
	$kq=mysqli_query($con,$sql);
	if(mysqli_num_rows($kq)>0) {
		while($row=mysqli_fetch_assoc($kq)) {
			if(file_exists($row['image_link'])) {
				unlink($row['image_link']);
				$delete = 'delete from product where product_id = "'.$id.'"';
				//var_dump($select);exit;
				$result=mysqli_query($con,$delete);
				if(mysqli_affected_rows($con)>0) {
					echo '<script language="javascript">alert("Bạn đã xóa thành công!");';
					echo 'location.href="list_product.php";</script>';
				}else{
					echo '<script language="javascript">alert("Bạn đã xóa không thành công!");';
					echo 'location.href="list_product.php";</script>';
				}
			}else {
				echo '<script language="javascript">alert("File của bạn không tồn tại!");';
				echo 'location.href="list_product.php";</script>';
				$delete = 'delete from product where product_id = "'.$id.'"';
				//var_dump($select);exit;
				$result=mysqli_query($con,$delete);
				if(mysqli_affected_rows($con)>0) {
					echo '<script language="javascript">alert("Bạn đã xóa thành công!");';
					echo 'location.href="list_product.php";</script>';
				}else{
					echo '<script language="javascript">alert("Bạn đã xóa không thành công!");';
					echo 'location.href="list_product.php";</script>';
				}
			}
		}
	}
?>