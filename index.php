<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>didongthaibinh.com</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style/css.css">
</head>
<body>
	<?php 
		session_start();
		ob_start();
	 ?>
	<div class="wrapper">
		<?php include("admin/modules/config.php"); ?>
		<?php include("modules/header.php"); ?>
		<?php include("modules/menu.php"); ?>
		<?php include("modules/content.php"); ?>
		<?php include("modules/footer.php"); ?>
	</div>
</body>
</html>