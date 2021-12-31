<!DOCTYPE html>
<html>
	<?php include_once('head.php');?>
	<body id="admin">
		<div class="admin">
			<?php include_once('left-admin.php');?>
			<div class="right-admin" style="padding-top: 0px">
				<?php 
					$user=$_SESSION['user'];
					$pass=$_SESSION['pass'];
					if($user!='admin'){
						echo '<script language="javascript">alert("Bạn không đủ quyền để truy cập");';
						echo 'location.href="home.php";</script>';
					}else{
				?>
				<form action="upload_product.php" method="POST" enctype="multipart/form-data">
					<table class="listsp" style="margin:15px 0px;">
						<tr>
							<th colspan="2" style="color:black;padding: 10px;">THÊM SẢN PHẨM MỚI:<hr/><hr/><hr/></th>
						</tr>
						<tr>
							<td colspan="2">
								<input type="text" name="catalog" placeholder="Hãng(Catalogs):" size="100"/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="text" name="sl" placeholder="Nhập số lượng trong kho:" size="100"/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="text" name="product_name" placeholder="Tên sản phẩm(Product's Name):" size="100"/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="text" name="price" placeholder="Giá(Price):" size="100"/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="text" name="size" placeholder="Kích thước(Size):" size="100"/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="text" name="weight" placeholder="Trọng lượng(Weight):" size="100"/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="text" name="display" placeholder="Độ phân giải(Screen Resolution):" size="100"/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="text" name="cpu" placeholder="CPU:" size="100"/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="text" name="ram" placeholder="RAM:" size="100"/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="text" name="rom" placeholder="Ổ cứng(ROM):" size="100"/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="text" name="card" placeholder="Card màn hình(Graphics Card):" size="100"/>
							</td>
						</tr>
						<tr>
							
							<td colspan="2">
								<input type="text" name="pin" placeholder="PIN(Battery):" size="100"/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="text" name="port" placeholder="Cổng(Ports):" size="100"/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="text" name="os" placeholder="Hệ điều hành(Operation System):" size="100"/>
							</td>
						</tr>
						<tr>
							<td>Webcam:</td>
							<td>
								<input type="radio" name="cam" value="Có">Có</input>
								<input type="radio" name="cam" value="Không">Không</input>
							</td>
						</tr>
						<tr>
							<td>Loa(Speaker):</td>
							<td>
								
								<input type="radio" name="loa" value="Có">Có</input>
								<input type="radio" name="loa" value="Không">Không</input>
							</td>
						</tr>
						<tr>
							<td>Đĩa quang(Compact Disc):</td>
							<td>
								
								<input type="radio" name="cd" value="Có">Có</input>
								<input type="radio" name="cd" value="Không">Không</input>
							</td>
						</tr>
						<tr>
							<td>Hình ảnh sản phẩm(Product's Image):</td>
							<td>
								<input style="border:#888 1px solid;" type="file" name="image" id="image"/>
							</td>
						</tr>
						<tr>
							<th colspan="2"><hr/><hr/>
								<input onclick="return ConfirmUpload();" type="submit" name="submit_upload" value="Upload sản phẩm" style="border-top-left-radius:5px; padding:10px; border-color:#888; background-color:#888; color:white;"/><hr/>
							</th>
						</tr>
					</table>
				</form>
				<?php }?>
			</div>
		</div>
	</body>
</html>
<script>
    function ConfirmUpload()
    {
      var x = confirm("Bạn có chắc muốn Thêm sản phẩm không?");
      if (x)
        return true;
      else
        return false;
    }
</script>  