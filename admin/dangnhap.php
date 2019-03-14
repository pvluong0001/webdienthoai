<?php 
	include("modules/config.php");
	session_start();
	$error="";
	if(isset($_POST['dangnhap'])) {
		
		$taikhoan=$_POST['taikhoan'];
		$matkhau=$_POST['matkhau'];
		$sql="select * from admin where taikhoan='$taikhoan' and matkhau='$matkhau'";
		$row = mysqli_query($conn,$sql);
		$result=mysqli_fetch_array($row,MYSQLI_ASSOC);
		if(mysqli_num_rows($row)>0) {
			//session_register("user");
			$_SESSION['taikhoan']=$taikhoan;
			header("location:index.php");
		}
		else {
			//$error='Tài khoản hoặc mật khẩu không đúng!';
			echo"<script>alert('Tài khoản hoặc mật khẩu không đúng!')</script>";
		}
	}
	else if(isset($_POST['dangxuat'])) {
		session_destroy();
		header("location:index.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trang đăng nhập</title>
	<link rel="stylesheet" href="">
	<style>
		table {
			width: 400px;
			margin: auto;
			margin-top: 200px;
			border-collapse: collapse;
			border: 1px;
			background-color: #B3ABAB;
			border-radius: 10px 10px 10px 10px;
			box-shadow: 0px 0px 5px #5F5D56;
		}
		td {
			padding: 10px;
		}
		table input[type="submit"] {
			width: 85px;
    		height: 35px;
    		margin-left: 45px;
    		border-radius: 5px;
			border: none;
			font-weight: bold;
		}
		.ipu {
			width: 170px;
    		height: 25px;
		}
		.title {
			width: 100px;
			text-align: center;
		}
		b {
			color: white;
		}
		.td {
			background-color: black;
			border-radius: 10px 10px 0px 0px;
		}
	</style>
</head>
<body>
	<form action="" method="POST">
		<div>
			<table>
				<tr">
					<td colspan="3" align="center" class="td"><b>TRUY CẬP VÀO TRANG QUAN TRỊ</b></td>
				</tr>
				<tr>
					<td class="title">Tài khoản</td>
					<td colspan="2"><input type="text" name="taikhoan" value="" placeholder="" class="ipu"></td>
				</tr>
				<tr>
					<td class="title">Mật khẩu</td>
					<td colspan="2"><input type="password" name="matkhau" value="" placeholder="" class="ipu"></td>
				</tr>
				<tr><td colspan="3">
					<span><?php echo $error;?></span>
				</td></tr>
				<tr>
					<td></td>
					<td class="ip" ><input type="submit" name="dangnhap" value="Đăng nhập"></td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>