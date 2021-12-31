<?php 
	$sotin1trang = 12;
	if(!isset($_GET['page']))
		$trang = 1;
	else
		$trang = $_GET['page'];
		include_once('conn.php');
		$from = ($trang - 1)*$sotin1trang;
		$sql="select * from product limit $from,$sotin1trang";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
				echo '
				<div class="icon_item">
					<form action="cart.php" method="GET">
						<table style="padding:0px;">
							<tr>
								<th style="padding:10px 0px;"> '.$row['name'].' </th>
							</tr>
							<input type="hidden" name="id" value="'.$row['product_id'].'"/>
							<tr>
								<td style="padding:0px 0px 20px 0px;">
									<a href="detail.php?id='.$row['product_id'].'">
										<img src="'.$row['image_link'].'" alt="'.$row['image_name'].'" height="200px" width="244px"/>
									</a>
								</td>
							</tr>
							<tr>
								<th style="padding:0px 0px 0px 0px;"> GIÁ: '.$row['price'].' VNĐ</th>
							</tr>
							<tr>
								<td> 
									<a href="?giohang='.$row['product_id'].'">
										<input type="button" style="border:#888 1px solid; border-radius: 10px; background:#249ECF; font-weight: bold; padding:8px 10px; color:white;" value="ADD TO CART"/>
									</a>
								</td>
							</tr>
						</table>
					</form>
				</div>';
			}
		}
		$select = 'select product_id from product';
		$result = mysqli_query($con,$select);
		$tongsotin = mysqli_num_rows($result);
		$sotrang = ceil($tongsotin/$sotin1trang);
?>
<!--<select name="sl" style="border:#888 1px solid; border-radius: 5px; padding:10px 5px; font-weight:bold; text-align:center;" >
<option value="1" selected="selected">1</option>';
for ($i=2;$i<=10;$i++) {echo '<option value="'.$i.'" >'.$i.'</option>';}echo '	</select>-->