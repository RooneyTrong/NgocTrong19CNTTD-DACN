<?php 
	$con=mysqli_connect('localhost','root','','qlyban_hang',3306) or die ('Không thể kết nối đến database!');
	mysqli_query($con,'SET NAMES "utf8"');
	mysqli_set_charset($con,'utf8');
?>