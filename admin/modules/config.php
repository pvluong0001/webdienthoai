<?php 
	$tenmaychu = "127.0.0.1";
	$taikhoan = "root";
	$matkhau = "";
	$csdl = "webbandienthoai";
	$conn = mysqli_connect($tenmaychu,$taikhoan,$matkhau,$csdl) or die('khong ket loi duoc!');
	mysqli_set_charset($conn,'utf8')
 ?>