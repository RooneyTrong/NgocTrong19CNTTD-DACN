<?php
	@session_start();
	include_once('conn.php');
	$user = $_SESSION['user'];
	if (!$user) {
		echo '<script language="javascript">alert("Bạn hiện tại chưa đăng nhập!");';
		echo 'location.href="detail.php?id='.$id_pd.'";</script>';
	} else {
		//var_dump($_POST['product_id']);exit();
		$soluong = $_POST['soluong'];
		//var_dump($soluong);
		$product_id = $_POST['product_id'];
		//var_dump($product_id);
		$amount = $_POST['amount'];
		$sql = 'select * from users where username like "'.$user.'"';
		$kq = mysqli_query($con,$sql);
		if (mysqli_num_rows($kq)>0) {
			while ($data = mysqli_fetch_assoc($kq)) {
					$insert_trans = 'insert into transactions (user_id,amount) values ("'.$data['user_id'].'","'.$amount.'")';
					$result_trans = mysqli_query($con,$insert_trans);
					//var_dump($insert_trans);exit;
					if (mysqli_affected_rows($con)>0) {
						$sl_order = 'select count(*) as sl from transactions where user_id = "'.$data['user_id'].'" and process = "0"';
						$kq_sl = mysqli_query($con,$sl_order);
						if (mysqli_num_rows($kq_sl)>0) {
							while ($sl=mysqli_fetch_assoc($kq_sl)) {
								$count = $sl['sl'];
							}
						}
						for ($m = 0; $m < $count; $m++) {
							$check = 'select * from transactions where user_id = "'.$data['user_id'].'" and process = "0" limit '.$m.',1';
							$checked = mysqli_query($con,$check);
							if (mysqli_num_rows($checked)>0) {
								while ($trans = mysqli_fetch_assoc($checked)) {
									//var_dump($insert_order1);exit;
									//var_dump($_SESSION['giohang']);exit();
									//for ($i = 0; $i < count($_SESSION['giohang']); $i++) {
										//$insert_order1 = 'insert into orders (transaction_id) values ("'.$trans['transaction_id'].'")';
										//$result_order1 = mysqli_query($con,$insert_order1);
										for ($a = 0; $a < count($product_id); $a++) {
											$insert_order = 'insert into orders (transaction_id,product_id,soluong,status) values ("'.$trans['transaction_id'].'","'.$product_id[$a].'","'.$soluong[$a].'","1")';
											$result_order = mysqli_query($con,$insert_order);
											//var_dump($insert_order);exit();
											if (mysqli_affected_rows($con)>0) {
												unset($_SESSION['giohang']);
												echo '<script language="javascript">alert("Bạn đã đặt hàng thành công!");';
												echo 'location.href="donhang.php";</script>';
											}else {
												echo '<script language="javascript">alert("Bạn đã đặt hàng thất bại 2");';
												echo 'location.href="shoppingcart.php";</script>';
											}
										}
									//}
								}
							}
						}
					} else {
						echo '<script language="javascript">alert("Bạn đã đặt hàng thất bại 3");';
						echo 'location.href="shoppingcart.php";</script>';
					}
				//}
			}
		}
	}

?>