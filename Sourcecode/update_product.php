<!DOCTYPE html>
<html>
	<?php include_once('head.php');?>
	<body id="admin">
		<div class="admin">
			<?php include_once('left-admin.php');?>
			<div class="right-admin" style="padding-top: 0px;">
				<?php 
					$user=$_SESSION['user'];
					$pass=$_SESSION['pass'];
					if($user!='admin'){
						echo '<script language="javascript">alert("Bạn không đủ quyền để truy cập");';
						echo 'location.href="home.php";</script>';
					}else{
						include_once('update_detail_product.php');
					}
				?>
			</div>
		</div>
	</body>
</html>
<script>
    function ConfirmUpdate()
    {
      var x = confirm("Bạn có chắc muốn thay đổi dữ liệu không?");
      if (x)
        return true;
      else
        return false;
    }
</script>  