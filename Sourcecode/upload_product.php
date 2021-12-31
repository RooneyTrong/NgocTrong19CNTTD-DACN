<?php
	include_once('conn.php');
	if(isset($_POST['submit_upload'])){
		$catalog=$_POST['catalog'];
		$name=$_POST['product_name'];
		$price=$_POST['price'];
		$sl=$_POST['sl'];
		$size=$_POST['size'];
		$weight=$_POST['weight'];
		$display=$_POST['display'];
		$cpu=$_POST['cpu'];
		$ram=$_POST['ram'];
		$rom=$_POST['rom'];
		$card=$_POST['card'];
		$pin=$_POST['pin'];
		$port=$_POST['port'];
		$webcam=$_POST['cam'];
		$loa=$_POST['loa'];
		$cd=$_POST['cd'];
		$os=$_POST['os'];
		$sql = 'select * from product where name = "'.$name.'"';
		$kq= mysqli_query($con,$sql);
		if (mysqli_num_rows($kq)>0) {
			echo '<script language="javascript">alert("Sản phẩm đã tồn tại, vui lòng kiểm tra lại!");';
			echo 'location.href="add_product.php";</script>';
		}else {
			$select1='select * from catalogs where name like "'.$catalog.'"';
			$result_select1=mysqli_query($con,$select1);
			if(mysqli_num_rows($result_select1)>0){
				while($type=mysqli_fetch_assoc($result_select1)){
					$insert1='insert into product (catalog_id,name,price,soluong) values ("'.$type['catalog_id'].'","'.$name.'","'.$price.'","'.$sl.'")';
					$result_insert1=mysqli_query($con,$insert1);
					include_once('upload_product_action.php');
				}
			}else{
				$insert1='insert into catalogs (name) values ("'.$catalog.'")';
				$result_insert1=mysqli_query($con,$insert1);
				mkdir('images/'.$catalog.'');
				$select2='select * from catalogs where name like "'.$catalog.'"';
				$result_select2=mysqli_query($con,$select2);
				if(mysqli_num_rows($result_select2)>0){
					while($type=mysqli_fetch_assoc($result_select2)){
						$insert2='insert into product (catalog_id,name,price,soluong) values ("'.$type['catalog_id'].'","'.$name.'","'.$price.'","'.$sl.'")';
						$result_insert2=mysqli_query($con,$insert2);
						include_once('upload_product_action.php');
					}
				}
			}
		}	
	}
?>