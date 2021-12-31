<!DOCTYPE html>
<html>
	<?php include_once('head.php');?>
	<body>
	<?php include_once('banner.php');?>
		<div id="container">
			
			<div class="contein">
				<?php include_once('left.php');?>
				<div class="right">
					<form action="xuly.php" method="POST" class="lienhe">
						<h2 style="padding: 15px 0px; color: #eb721b; text-align: center; border-bottom: #199dd1 3px solid">XIN HÂN HẠNH ĐƯỢC HỖ TRỢ QUÝ KHÁCH.</h2>
						<table style="margin: 20px 0px; width: 100%;">
							<tr>
								<td style="text-align: center; width: 150px;">Quý khách đang quan tâm về*:</td>
								<td style="border-left:#888 1px solid; padding-left: 15px">
									<select name="chude" style="width: 460px; height: 30px;padding-left: 10px; border-radius: 10px;">
										<option value="0" selected>Chọn Chủ đề</option>
										<?php 
											include_once('conn.php');
											$sql = 'select * from loai_chude';
											$kq = mysqli_query($con,$sql);
											if (mysqli_num_rows($kq)>0) {
												while ($chude = mysqli_fetch_array($kq)) {
													echo '<option value="'.$chude['id'].'">'.$chude['chude'].'</option>';
												}
											}
										?>
									</select>
								</td>
							</tr>
							<tr><td colspan="2"><hr></td></tr>
							<tr>
								<td style="text-align: center;">Tiêu đề*:</td>
								<td style="border-left:#888 1px solid; padding-left: 15px">
									<input type="text" name="title" size="60px" style="height: 30px; padding-left: 10px; border-radius: 10px;" />
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">Họ và tên*:</td>
								<td style="border-left:#888 1px solid; padding-left: 15px">
									<input type="text" name="name" size="60px" style="height: 30px; padding-left: 10px; border-radius: 10px;"/>
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">Địa chỉ Email*:</td>
								<td style="border-left:#888 1px solid; padding-left: 15px">
									<input type="email" name="email" style="margin: 10px 0px; height: 30px; padding-left: 10px; border-radius: 10px;" size="60px" />
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">Số điện thoại:</td>
								<td style="border-left:#888 1px solid; padding-left: 15px">
									<input type="text" name="phone" size="60px" style="height: 30px; padding-left: 10px; border-radius: 10px;"/>
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">Nội dung*:</td>
								<td style="border-left:#888 1px solid; padding-left: 15px">
									<textarea name="detail" style="margin: 10px 0px; width: 453px; height: 111px;" placeholder="Mô tả"></textarea>
								</td>
							</tr>
							<tr><td colspan="2"><hr></td></tr>
							<tr><td colspan="2"><hr></td></tr>
							<tr>
								<td colspan="2" style="text-align: center;">
									<input type="submit" name="gui" style="margin: 10px 0px; background: #4a4747; color: white; padding: 10px; border-radius: 10px;" value="SEND" />
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<?php include_once('footer.php');?>
		</div>
	</body>
</html>