<?php
	include_once('conn.php');
	$catalog_name=$_POST['catalog_name'];

	$target_dir = 'images/'.$catalog_name.'/';
	$target_file = $target_dir . basename ($_FILES['image']['name']);
	//var_dump($_FILES['image']['name']);exit;
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if(isset($_POST['submit_upload'])){
		$check = getimagesize($_FILES['image']['tmp_name']);
		if($check !== false){
			$uploadOk = 1;
		}else{
			echo '<script language="javascript">alert("File is not an image.");';
			echo 'location.href="update_product.php";</script>';
			$uploadOk = 0;
		}
	}
	if(file_exists($target_file)){
		echo '<script language="javascript">alert("Sorry, file already exists.");';
		echo 'location.href="update_product.php";</script>';
		$uploadOk = 0;
	}
	if($_FILES["image"]["size"] > 3000000){
		echo '<script language="javascript">alert("Sorry, your file is too large.");';
		echo 'location.href="update_product.php";</script>';
		$uploadOk = 0;
	}
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ){
		echo '<script language="javascript">alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");';
		echo 'location.href="update_product.php";</script>';
		$uploadOk = 0;
	}
	if($uploadOk == 0){
		echo '<script language="javascript">alert("Sorry, your file was not uploaded.");';
		echo 'location.href="update_product.php";</script>';
	}else{
		if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
			//$link_image=var_dump($target_file);
			$sql='select * from product where product_id = "'.$_POST['product_id'].'"';
			$result=mysqli_query($con,$sql);
			while ($row=mysqli_fetch_assoc($result)) {
				if(file_exists($row['image_link'])) {
					unlink($row['image_link']);
					
					$update='update product set image_link = "'.$target_file.'", image_name = "'.basename($_FILES['image']['name']).'" where product_id = "'.$_POST['product_id'].'"';
					$result_update=mysqli_query($con,$update);
					//$update2='update product set image_name = "'.basename($_FILES['image']['name']).'" where product_id = "'.$row['product_id'].'"';
					//$result_update2=mysqli_query($con,$update2);
					//echo 'The file '.basename($_FILES['image']['name']).' has been uploaded.';
					//var_dump($update);exit;
					echo '<script language="javascript">alert("The file '.basename($_FILES['image']['name']).' has been uploaded.");';
					echo 'location.href="detail.php?id='.$_POST['product_id'].'";</script>';
				}
			}
		}else{
			echo '<script language="javascript">alert("Sorry, there was an error uploading your file.");';
			echo 'location.href="update_product.php";</script>';
		}
	}
?>