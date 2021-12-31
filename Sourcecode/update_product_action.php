<?php
	include_once('conn.php');
	if(isset($_POST['update'])) {
		$id=$_POST['product_id']; 
		$name=$_POST['name'];
		$price=$_POST['price'];
		$catalog_id=$_POST['catalog_id'];
		$size=$_POST['size'];
		$weight=$_POST['weight'];
		$display=$_POST['display'];
		$cpu=$_POST['cpu'];
		$ram=$_POST['ram'];
		$rom=$_POST['rom'];
		$port=$_POST['port'];
		$cart=$_POST['cart'];
		$pin=$_POST['pin'];
		$cam=$_POST['cam'];
		$cd=$_POST['cd'];
		$loa=$_POST['loa'];
		$bh=$_POST['bh'];
		$os=$_POST['os'];
		$sl=$_POST['sl'];
		$update1='update product set catalog_id = "'.$catalog_id.'", name = "'.$name.'", price = "'.$price.'", soluong = "'.$sl.'" where product_id = "'.$id.'"';
		$result1=mysqli_query($con,$update1);
		$update2='update detail_product set product_id = "'.$id.'", kichthuoc = "'.$size.'", trongluong = "'.$weight.'", manhinh = "'.$display.'", ram = "'.$ram.'", ocung = "'.$rom.'", pin = "'.$pin.'", webcam = "'.$cam.'", loa = "'.$loa.'", baohanh = "'.$bh.'", HDH = "'.$os.'", diaquang = "'.$cd.'", cong = "'.$port.'", dohoa = "'.$cart.'"';
		echo '<script language="javascript">alert("The Product has been updated.");';
		echo 'location.href="detail.php?id='.$id.'";</script>';
	}	
?>