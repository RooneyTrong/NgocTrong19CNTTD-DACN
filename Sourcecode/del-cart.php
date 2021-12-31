<?php 
	session_start();
	unset($_SESSION['giohang']);
	header('location: shoppingcart.php');

?>