<?php 
	//session_start();
	include_once('conn.php');
	$id = $_GET['id'];
	//var_dump($id);exit();
	//for ($i = 0; $i < count($_SESSION['giohang']); $i++) {
	//	$id = $_SESSION['giohang'][$i]['id'];
	//}
	$sql='select * from product where product_id = "'.$id.'"';
	$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
			//if($id==$row['product_id']){
				echo 
				'<img class="item" src="'.$row['image_link'].'" alt="'.$row['image_name'].'"/>
				<h2>'.$row['name'].'</h2><hr/>
				<table style="margin: 10px 50px;">
					<tr>
						<th>GIÁ:</th>
						<th style="color:black; padding:10px 0px 10px 30px;">'.$row['price'].' VNĐ</th>';
						echo '
						<td>
							<a href="?id='.$row['product_id'].'&giohang='.$row['product_id'].'">
								<input type="button" style="border:#888 1px solid; margin-left: 50px ;border-radius: 10px; 50px;background:#e47c11; font-weight: bold; padding:10px; color:white;" value="ADD TO CART"/>
							</a>
						</td>
					</tr>
				</table><hr/>';
			//}
		}
	}
	echo '
	<h2>THÔNG SỐ KỶ THUẬT:</h2><br>'; 
	$query='select * from detail_product where product_id like "'.$id.'"';
	$result1=mysqli_query($con,$query);
	echo '<table class="listsp">'; 
	if(mysqli_num_rows($result1)>0){
		while($row=mysqli_fetch_assoc($result1)){
			//if($id==$row['product_id']){
				echo 
				'<tr><th colspan="2"><hr/></th></tr>
				<tr>
					<td>Màn hình(Độ phân giải):</td><td>'.$row['manhinh'].'</td>
				</tr>
				<tr>
					<td>CPU:</td><td>'.$row['cpu'].'</td>
				</tr>
				<tr>
					<td>RAM:</td><td>'.$row['ram'].'</td>
				</tr>
				<tr>
					<td>Ổ cứng:</td><td>'.$row['ocung'].'</td>
				</tr>
				<tr>
					<td>Chíp đồ họa:</td><td>'.$row['dohoa'].'</td>
				</tr>
				<tr>
					<td>PIN:</td><td>'.$row['pin'].'</td>
				</tr>
				<tr>
					<td>Cổng giao tiếp:</td><td>'.$row['cong'].'</td>
				</tr>
				<tr>
					<td>Webcam:</td><td>'.$row['webcam'].'</td>
				</tr>
				<tr>
					<td>Loa ngoài:</td><td>'.$row['loa'].'</td>
				</tr>
				<tr>
					<td>Đĩa quang:</td><td>'.$row['diaquang'].'</td>
				</tr>
				<tr>
					<td>Hệ điều hành:</td><td>'.$row['HDH'].'</td>
				</tr>
				<tr>
					<td>Kích thước(m.m):</td><td>'.$row['kichthuoc'].'</td>
				</tr>
				<tr>
					<td>Trọng lượng:</td><td>'.$row['trongluong'].'</td>
				</tr>
				<tr>
					<td>Bảo hành:</td><td>'.$row['baohanh'].'</td>
				</tr>';
			//}
		}
	}
	echo '</table><br>';
?>
<!--<select name="sl" style="border:#888 1px solid; border-radius: 5px; margin-left: 50px; padding:10px 5px; font-weight:bold; text-align:center;">
									<option value="1" selected="selected">1</option>';
									for ($i=2;$i<=10;$i++) {
										echo '<option value="'.$i.'" >'.$i.'</option>';
									}
						echo '	</select>-->