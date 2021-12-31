
<form action="timkiem.php" method="GET" style="margin: 10px 0px;">
	<table style="margin: auto;">
		<tr>
			<td>
				<input type="text" name="search" size="70px" style="height: 30px; background: #f1f1f1; padding-left: 10px;" placeholder="Nhập tên sản phẩm bạn đang tìm...." />
			</td>
			<td style="padding-left: 5px ;">
				<input type="submit" name="tim" value="Tìm kiếm" style="margin-right: 10px; padding: 7px; font-weight: bold; background: #f1f1f1;" />
				<button type="button" onclick='window.location.href="timkiem.php"' style="padding: 7px; font-weight: bold; background: #f1f1f1;">Clear</button>
			</td>
		</tr>
	</table>
</form>
<?php 
	include_once('conn.php');
	$select='';
	if(isset($_GET['tim'])) {
		$select = 'select * from product where 1=1 ';
		$search= mysqli_real_escape_string($con,$_GET['search']);
		$where = '';
		if ($search!='') {
			$where.= 'and name like "%'.$search.'%"';
		}else {
			$where.= 'and 1=2';
		}
		$select.=$where;
		$result=mysqli_query($con,$select);
	}
	//var_dump($select);exit;
	if(mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_assoc($result)) {
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
										<input type="button" style="border:#888 1px solid; border-radius: 10px; background:#249ECF; font-weight: bold; padding: 7px 10px; color:white;" value="ADD TO CART"/>
									</a>
								</td>
							</tr>
						</table>
					</form>
				</div>';
		}
	}
?>
