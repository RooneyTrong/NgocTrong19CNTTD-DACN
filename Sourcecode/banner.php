<div class="header"></div>
<div class="headmenu">
	<ul>
		<li>
			<a href="home.php">Trang chủ</a>
		</li>
		<li>
			<a href="gioithieu.php">Giới thiệu</a>
		</li>
		<li>
			<a href="home.php">Sản phẩm</a>
			<ul>
				<?php 
					include_once('conn.php');
					$sql='select * from catalogs';
					$result=mysqli_query($con,$sql);
					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_assoc($result)){
							echo '<li><a href="list.php?id='.$row['catalog_id'].'">'.$row['name'].'</a></li>';
						}
					}
				?>
			</ul>
		</li>
		<li>
			<a href="lienhe.php">Liên hệ</a>
		</li>
		<li>
			<a href="timkiem.php">Tìm kiếm</a>
		</li>
	</ul>
</div>

