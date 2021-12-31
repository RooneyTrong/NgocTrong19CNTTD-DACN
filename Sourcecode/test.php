<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>
	<?php 
		echo $_GET['email'];
	?>
	<form action="?" method="GET">
		<input type="email" name="email">
		<input type="submit" name="send">
	</form>
</body>
</html>