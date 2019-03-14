<?php 
	if(isset($_POST['subdoanhthu'])){
		if(isset($_POST['thang'])){
			$thang=$_POST['thang'];
		}
		if(empty($_POST['nam'])){
			$errnam="Hãy nhập năm!";
		}
		else{
			$nam=$_POST['nam'];
		}
		if(empty($errnam)){
			$sql="select a.id_hdb, a.ngayban, a.trangthai, a.tongtien from hoadonban as a where month(a.ngayban)='$thang' and year(a.ngayban)='$nam' and trangthai='Đã thanh toán'";
			//SELECT a.id_hdb, a.ngayban, a.trangthai,a.tongtien FROM hoadonban as a where month(a.ngayban)='9' and year(a.ngayban)='2017' and trangthai='Đã thanh toán'
			$sp=mysqli_query($conn,$sql);

			$sql2="select sum(a.tongtien) as doanhthu from hoadonban as a where month(a.ngayban)='$thang' and year(a.ngayban)='$nam' and trangthai='Đã thanh toán'";
			//SELECT SUM(a.tongtien) as doanhthu from hoadonban as a where month(a.ngayban)='9' and year(a.ngayban)='2017' and trangthai='Đã thanh toán'
			$doanhthu=mysqli_query($conn,$sql2);
			$dong_doanhthu=mysqli_fetch_array($doanhthu,MYSQLI_ASSOC);
		}
		else{
			echo "<script>alert('Bạn phải nhập đủ thông tin');</script>";
			echo "<script>window.history.back()</script>";
		}
	}
 ?>
<h2 style="text-align: center;padding-top: 10px;">DOANH THU BÁN HÀNG</h2>
<table style="width: 99%;text-align: center;">
	<tr>
		<td class="tt">STT</td>
		<td class="tt">Mã Hóa đơn</td>
		<td class="tt">Trạng thái</td>
		<td class="tt">Ngày bán</td>
		<td class="tt" style="width: 159px;">Giá hóa đơn</td>
	</tr>
	<?php 
		$i=0;
		while ($dong_sp=mysqli_fetch_array($sp,MYSQLI_ASSOC)) {
			$i++;
	?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $dong_sp['id_hdb'] ?></td>
		<td><?php echo $dong_sp['trangthai'] ?></td>
		<td><?php echo $dong_sp['ngayban'] ?></td>
		<td><?php echo number_format($dong_sp['tongtien'],0,',','.'); ?>₫</td>
	</tr>
	<?php
		}
	 ?>
	 <tr>
	 	<td colspan="4" style="padding-top: 55px;"><span style="margin-left: -220px;font-weight: bold;font-size: 20px">Doanh thu</span></td>
	 	<td style="padding-top: 50px;font-weight: bold;font-size: 20px"><?php echo number_format($dong_doanhthu['doanhthu'],0,',','.') ?>₫</td>
	 </tr>
</table>