<!DOCTYPE html>
<html>
	<?php include_once('head.php');?>
	<body id="admin">
		<?php
			$user=$_SESSION['user'];
			if($user!='admin'){
				echo '<script language="javascript">alert("Bạn không đủ quyền để truy cập");';
				echo 'location.href="home.php";</script>';
			}else{
		?>
		<div class="admin">
			<?php include_once('left-admin.php');?>
			<div class="right-admin">
				<table class="listtv" style="border:#888 2px solid ;">
					<tr>
						<th style="padding:10px; color: red; border-right:#888 1px solid;">
							Chủ đề:
						</th>
						<th style=" color: red;">
							Tiêu đề:
						</th>
						<th></th>
					</tr>
					<tr><th colspan="3"><hr/></th></tr>
					<?php
						include_once('conn.php');
						$sql = 'select detail_report.id, chude, title, status from detail_report,loai_chude where loai_chude.id=detail_report.id_chude';
						$kq = mysqli_query($con,$sql);
						if (mysqli_num_rows($kq)>0) {
							while ($mail = mysqli_fetch_array($kq)) {?>
					<tr>
						<td style="padding:10px; border-right:#888 1px solid;">
							<?php echo $mail['chude'];?>
						</td>
						<td style="padding:10px; border-right:#888 1px solid;">
							<?php echo $mail['title'];?>
						</td>
						<?php 
							if ($mail['status']!=0) {
								$style = 'value="ĐÃ XEM" style="border-radius: 5px; background:yellow; color: blue; font-weight: bold;"';
							} else {
								$style = 'value="XEM" style="border-radius: 5px; color: blue; font-weight: bold;"';
							}
						?>
						<th>
							<a href="see-report.php?letter=<?php echo $mail['id'];?>">
								<input type="button" name="see" <?php echo $style;?> />
							</a>
							<a href="del-report.php?letter=<?php echo $mail['id'];?>">
								<input type="button" name="del" value="XÓA" style="margin-left: 10px; border-radius: 5px; color: blue; font-weight: bold;"/>
							</a>
						</th>
					</tr>
					<tr><th colspan="3"><hr/><hr></th></tr>
					<?php 	}
						}
			}
					?>
				</table>
			</div>
		</div>
	</body>
</html>