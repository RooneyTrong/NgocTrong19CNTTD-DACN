<?php 
	$select='select * from product order by product_id desc limit 0,1';
	$result_select=mysqli_query($con,$select);
	while($row=mysqli_fetch_assoc($result_select)){
		$product_id=$row['product_id'];
		//var_dump($result_select);exit;
		if(mysqli_num_rows($result_select)>0){
			$insert='insert into detail_product (product_id,kichthuoc,trongluong,manhinh,cpu,ram,ocung,dohoa,pin,cong,webcam,loa,diaquang,hdh)
			values ("'.$product_id.'","'.$size.'","'.$weight.'","'.$display.'","'.$cpu.'","'.$ram.'","'.$rom.'","'.$card.'","'.$pin.'","'.$port.'","'.$webcam.'","'.$loa.'","'.$cd.'","'.$os.'")';
			$result_insert=mysqli_query($con,$insert);
		}
		include_once('upload_image.php');
	}
?>