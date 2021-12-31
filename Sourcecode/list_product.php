<!DOCTYPE html>
<html>
	<?php include_once('head.php');?>
	<body id="admin">
		<div class="admin">
			<?php include_once('left-admin.php');?>
			<div class="right-admin" style="padding-top: 0px;">
				<?php 
					include_once('conn.php');
					$user=$_SESSION['user'];
					$pass=$_SESSION['pass'];
					if($user!='admin'){
						echo '<script language="javascript">alert("Bạn không đủ quyền để truy cập");';
						echo 'location.href="home.php";</script>';
					}else{
				?>
				<table class="listtv" style="border:#888 1px solid;">
					<tr><td colspan="8"><hr/></td></tr>
					<tr><th colspan="8" style="color:red;">QUẢN LÝ SẢN PHẨM<hr/><hr/><hr/><br/></th></tr>
					<tr>
						<th style="color:red;">ID:</th>
						<th style="color:red;">Hãng:</th>
						<th style="color:red;">Tên sản phẩm:</th>
						<th style="color:red;">Giá:</th>
						<th style="color:red;">Hình ảnh:</th>
						<th style="color: red;">Số lượng:</th>
						<th colspan="8">
							<a href="add_product.php">
								<img src="images/addproduct.png" alt="addproduct" height="50px" width="150px">
							</a>
						</th>
					</tr>
					<tr><td colspan="8"><hr/></td></tr>
					<?php 
					$sql='select * from product';
					$result=mysqli_query($con,$sql);
					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_assoc($result)){
							$slton=$row['soluong'];
							echo '<tr>
								<th>'.$row['product_id'].'</th>
								<td>';
									$sql2='select * from catalogs where catalog_id = "'.$row['catalog_id'].'"';
									$result2=mysqli_query($con,$sql2);
									if($row2=mysqli_fetch_assoc($result2)){
										echo $row2['name'];
									}	
							echo '</td>
								<td>'.$row['name'].'</td>
								<td>'.$row['price'].'VNĐ</td>
								<td>
									<a href="detail.php?id='.$row['product_id'].'"><img style="border:#888 1px solid;" src="'.$row['image_link'].'" alt="'.$row['image_name'].'" height="100px" width="150px"/></a>
								</td>
								<td>
									'.$slton.'
								</td>
								<td>
									<a onclick="return ConfirmUpdate();" href="update_product.php?id='.$row['product_id'].'">
										<input type="button" style="border-top-left-radius:5px; padding:3px; border-color:#888; background-color:#888; color:white;" value="UPDATE"/>
									</a>
									
								</td>
								<td>
									<a onclick="return ConfirmDelete();" href="delete_product.php?id='.$row['product_id'].'">
										<input type="button" style="border-top-left-radius:5px; padding:3px; border-color:#888; background-color:#888; color:white;" value="DELETE"/>
									</a>
								</td>
							</tr>';
						}
					}
				echo '<tr><td colspan="8"><hr/></td></tr></table>';}?>
			</div>
		</div>
	</body>
</html>
<script>
    function ConfirmUpdate()
    {
      var x = confirm("Bạn có chắc muốn thay đổi thông tin sản phẩm không?");
      if (x)
        return true;
      else
        return false;
    }
    function ConfirmDelete() {
    	var a = confirm("Bạn có chắc muốn xóa sản phẩm không?");
    	if (a)
    		return true;
    	else
    		return false;
    }
</script>  