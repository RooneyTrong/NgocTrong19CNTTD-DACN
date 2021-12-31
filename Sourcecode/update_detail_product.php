<?php
	include_once('conn.php');
	$id=$_GET['id'];
	$name=''; $price='';$image_link='';$image_name='';$catalog_id='';$catalog_name='';$size='';$weight='';$cpu='';$ram='';$cart='';$rom='';$display='';$port='';$pin='';$cam='';$loa='';$cd='';$os='';$bh='';$sl='';
	$sql='SELECT DISTINCT product.product_id AS id, catalogs.name AS ctname, product.name AS ptname, price, product.catalog_id as catalog_id, kichthuoc, trongluong, manhinh, cpu, ram, ocung, pin, cong, dohoa, webcam, diaquang, loa, HDH, baohanh, image_link, image_name, soluong
		FROM detail_product, product, catalogs
		WHERE detail_product.product_id = product.product_id AND catalogs.catalog_id = product.catalog_id
		AND product.product_id="'.$id.'"';
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_array($result)) {
			$name=$row['ptname']; 
			$price=$row['price'];
			$image_link=$row['image_link'];
			$image_name=$row['image_name'];
			$catalog_id=$row['catalog_id'];
			$catalog_name=$row['ctname'];
			$size=$row['kichthuoc'];
			$weight=$row['trongluong'];
			$cpu=$row['cpu'];
			$ram=$row['ram'];
			$cart=$row['dohoa'];
			$rom=$row['ocung'];
			$display=$row['manhinh'];
			$port=$row['cong'];
			$pin=$row['pin'];
			$cam=$row['webcam'];
			$loa=$row['loa'];
			$cd=$row['diaquang'];
			$os=$row['HDH'];
			$bh=$row['baohanh'];	
			$sl=$row['soluong'];	
		}
	}
?>
<h2> CHỈNH SỬA SẢN PHẨM</h2>
<br>
<form action="update_product_action.php" method="POST">
	<table class="listsp" style="padding:5px;">
		<input type="hidden" name="product_id" value="<?php echo $id; ?>">
		<tr>
			<th colspan="2" style="color: red;">CHỈNH SỬA THÔNG SỐ SẢN PHẨM</th>
		</tr>	
		<tr>
			<td>Tên sản phẩm:</td>
			<td>
				<input type="text" name="name" value="<?php echo $name; ?>" size="60px">
			</td>
		</tr>
		<tr>
			<td>Giá:</td>
			<td>
				<input type="text" name="price" value="<?php echo $price; ?>" size="60px">
			</td>
		</tr>
		<tr>
			<td>Số lượng trong kho:</td>
			<td>
				<input type="text" name="sl" value="<?php echo $sl; ?>" size="60px">
			</td>
		</tr>
		<tr>
			<td>Hãng:</td>
			<td>
				<select name="catalog_id" style="width: 475px;  height: 40px; font-weight: bold;">
					<?php
						$select='select * from catalogs';
						$kq=mysqli_query($con,$select);
						if(mysqli_num_rows($kq)>0) {
							while ($row2=mysqli_fetch_assoc($kq)) {?>
								<option value="<?php echo $row2['catalog_id']; ?>" <?php ($catalog_id == $row2['catalog_id'])?"selected":""; ?>><?php echo $row2['name']; ?></option>
							<?php	
							}
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Kích cỡ:</td>
			<td>
				<input type="text" name="size" value="<?php echo $size; ?>" size="60px">
			</td>
		</tr>
		<tr>
			<td>Trọng lượng:</td>
			<td>
				<input type="text" name="weight" value="<?php echo $weight;?>" size="60px">
			</td>
		</tr>
		<tr>
			<td>Màn hình:</td>
			<td>
				<input type="text" name="display" value="<?php echo $display;?>" size="60px">
			</td>
		</tr>
		<tr>
			<td>CPU:</td>
			<td>
				<input type="text" name="cpu" value="<?php echo $cpu;?>" size="60px">
			</td>
		</tr>
		<tr>
			<td>RAM:</td>
			<td>
				<input type="text" name="ram" value="<?php echo $ram;?>" size="60px">
			</td>
		</tr>
		<tr>
			<td>ROM:</td>
			<td>
				<input type="text" name="rom" value="<?php echo $rom;?>" size="60px">
			</td>
		</tr>
		<tr>
			<td>Cart đồ họa:</td>
			<td>
				<input type="text" name="cart" value="<?php echo $cart;?>" size="60px">
			</td>
		</tr>
		<tr>
			<td>PIN/Battery:</td>
			<td>
				<input type="text" name="pin" value="<?php echo $pin;?>" size="60px">
			</td>
		</tr>
		<tr>
			<td>Cổng giao tiếp:</td>
			<td>
				<input type="text" name="port" value="<?php echo $port;?>" size="60px">
			</td>
		</tr>
		<tr>
			<td>Webcam</td>
			<td>
				<input type="text" name="cam" value="<?php echo $cam;?>" size="60px">
			</td>
		</tr>
		<tr>
			<td>CD-DVD:</td>
			<td>
				<input type="text" name="cd" value="<?php echo $cd;?>" size="60px">
			</td>
		</tr>
		<tr>
			<td>Hệ điều hành:</td>
			<td>
				<input type="text" name="os" value="<?php echo $os;?>" size="60px">
			</td>
		</tr>
		<tr>
			<td>Loa:</td>
			<td>
				<input type="text" name="loa" value="<?php echo $loa;?>" size="60px">
			</td>
		</tr>
		<tr>
			<td>Bảo hành:</td>
			<td>
				<input type="text" name="bh" value="<?php echo $bh;?>" size="60px">
			</td>
		</tr>
		<tr><td colspan="2"><hr/><hr/></td></tr>
		<tr>
			<td colspan="2" style="text-align: center; border: 0;">
				<input onclick="return ConfirmUpdate();" type="submit" name="update" value="CẬP NHẬP THÔNG SỐ" style="border-top-left-radius:5px; padding:3px; border-color:#888; background-color:#888; color:white;" >
				<input type="reset" value="LÀM LẠI" style="border-top-left-radius:5px; padding:3px; border-color:#888; background-color:#888; color:white;">
			</td>
		</tr>
	</table>
</form>
<form action="update_image.php" method="POST" enctype="multipart/form-data">
	<table class="listtv">
		<tr>
			<th colspan="2" style="color: red;">CẬP NHẬP HÌNH ẢNH SẢN PHẨM</th>
		</tr>
		<tr><td colspan="2"><hr/><hr/><hr/></td></tr>
		<input type="hidden" name="product_id" value="<?php echo $id; ?>" >
		<input type="hidden" name="catalog_name" value="<?php echo $catalog_name;?>">
		<tr>
			<td>
				<img src="<?php echo $image_link; ?>" alt="<?php echo $image_name; ?>" height="200px" width="250px" style="border:#888 1px solid;">
			</td>
			<td>
				<input type="file" name="image">
			</td>
		</tr>
		<tr><td colspan="2"><hr/><hr/></td></tr>
		<tr>
			<td colspan="2">
				<input onclick="return ConfirmUpdate();" type="submit" name="submit_upload" value="CẬP NHẬP HÌNH ẢNH" style="border-top-left-radius:5px; padding:3px; border-color:#888; background-color:#888; color:white;" >
			</td>
		</tr>
	</table>
</form>