<!DOCTYPE html>
<html>
	<?php include_once('head.php');?>
	<body id="admin">
		<div class="admin">
			<?php include_once('left-admin.php');?>
			<div class="right-admin">
				<?php
					$user=$_SESSION['user'];
					if($user!='admin'){
						echo '<script language="javascript">alert("Bạn không đủ quyền để truy cập");';
						echo 'location.href="home.php";</script>';
					}else{ 
						include_once('conn.php');
						$id = $_GET['letter'];
						$update = 'update detail_report set status = "1" where id = "'.$id.'"';
						$result = mysqli_query($con,$update);
						
						$sql = 'select * from detail_report,loai_chude where loai_chude.id=detail_report.id_chude and detail_report.id = "'.$id.'" ';
						$kq = mysqli_query($con,$sql);
						
						if (mysqli_num_rows($kq)>0) {
							while ($row = mysqli_fetch_assoc($kq)) {
								$name = $row['name'];
								$title = $row['title'];
								$chude = $row['chude'];
								$email = $row['email'];
								$phone = $row['phone'];
								$detail = $row['detail'];
				?>
					<h2>PHẢN HỒI SỐ: <?php echo $id;?></h2>
					<table class="listtv" style="border:#888 2px solid;border-radius: 10px;">
						<tr>
							<th style="background: #f1d97e;">
								Chủ đề:
							</th>
							<td style="background: #f1d97e;">
								<?php echo $chude;?>
							</td>
						</tr>
						<tr>
							<td style="background: #f1d97e;">
								Tiêu đề:
							</td>
							<td style="background: #f1d97e;">
								<?php echo $title;?>
							</td>
						</tr>
						<tr>
							<th colspan="2"><hr></th>
						</tr>
						<tr>
							<th colspan="2" style="background: #f1d97e;padding: 10px">
								THÔNG TIN LIÊN HỆ
							</th>
						</tr>
						<tr>
							<th colspan="2"><hr></th>
						</tr>
						<tr>
							<td style="text-align: left; padding-left: 30px; border-right:#888 2px solid;border-bottom: #888 2px solid">
								Tên người gửi:
							</td>
							<td style="border-bottom: #888 2px solid">
								<?php echo $name;?>
							</td>
						</tr>
						<tr>
							<td style="text-align: left; padding-left: 30px; border-right:#888 2px solid;border-bottom: #888 2px solid">
								E-Mail:
							</td>
							<td style="border-bottom: #888 2px solid">
								<?php echo $email;?>
							</td>
						</tr>
						<tr>
							<td style="text-align: left; padding-left: 30px; border-right:#888 2px solid">
								Số điện thoại:
							</td>
							<td>
								<?php echo $phone;?>
							</td>
						</tr>
						<tr>
							<th colspan="2"><hr></th>
						</tr>
						<tr>
							<th colspan="2" style="background: #f1d97e;padding: 10px">
								NỘI DUNG
							</th>
						</tr>
						<tr>
							<th colspan="2"><hr></th>
						</tr>
						<tr>
							<td colspan="2">
								<?php echo $detail;?>
							</td>
						</tr>
					</table>
					<p >
						<a href="del-report.php?letter=<?php echo $id;?>">
							<input type="button" name="del" value="XÓA" style="border: 0.5px solid #9F847B; padding: 10px; border-radius: 5px; color: blue; font-weight: bold;"/>
						</a>
					</p>
							
				<?php
							}
						}
					}
				?>
			</div>
		</div>
	</body>
</html>