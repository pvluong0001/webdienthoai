<?php
	$txttensp=$_POST['txttensp'];
	$num=10;
	if(isset($_GET['page'])) {
		$trang = $_GET['page'];
	}
	else {
		$trang=1;
	}
	$batdau=($trang-1)*$num;

	$sql="select a.id_sp,a.tensp,a.gia,a.soluong,a.hinhanh,b.tenloaisp,a.thutu from sp as a,loaisp as b where a.id_loaisp=b.id_loaisp and tensp like '%$txttensp%' order by thutu desc limit $batdau, $num";
	$sp=mysqli_query($conn,$sql);
 ?>
<table width="95%" style="margin: auto;margin-top: 10px;text-align: center;border-collapse: collapse;">
	<tr>
		<td class="tt">STT</td>
		<td class="tt">ID</td>
		<td class="tt">Tên sp</td>
		<td class="tt">Giá sp</td>
		<td class="tt">Số lượng</td>
		<td class="tt">Hình ảnh</td>
		<td class="tt">Loại sp</td>
		<td class="tt">Thứ tự</td>
		<td class="tt" colspan="2">Quản lý</td>
	</tr>
	<?php 
		$i=0;
		if(isset($_GET['id_sp'])){
			$id_sp=$_GET['id_sp'];
		}
		else{
			$id_sp="";
		}
		while ($dong_sp=mysqli_fetch_array($sp,MYSQLI_ASSOC)) {
			$i++;
			if($dong_sp['id_sp']==$id_sp){
	 ?>
	<tr class="doimaudong">
		<td><?php echo $i ?></td>
		<td><?php echo $dong_sp['id_sp'] ?></td>
		<td width="100px"><?php echo $dong_sp['tensp'] ?></td>
		<td width="90px"><?php echo $dong_sp['gia'] ?></td>
		<td width="50px"><?php echo $dong_sp['soluong'] ?></td>
		<td>
			<img src="../<?php echo $dong_sp['hinhanh'] ?>" alt="" width="60px">
		</td>
		<td><?php echo $dong_sp['tenloaisp'] ?></td>
		<td><?php echo $dong_sp['thutu'] ?></td>
		<td>
			<a href="../admin/index.php?quanly=quanlysp&ac=sua&id_sp=<?php echo $dong_sp['id_sp'] ?>&page=<?php echo $trang ?>">
				<img src="images/edit1.png" alt="">
			</a>
		</td>
		<td>
			<a onclick="return confirm('Bạn có thực sự muốn xóa không?');" href="modules/quanlysp/xuly.php?xoasp=sp&id_sp=<?php echo $dong_sp['id_sp'] ?>">
				<img src="images/delete1.png" alt="">
			</a>
		</td>
	</tr>
		<?php 
			}
			else{
		?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $dong_sp['id_sp'] ?></td>
		<td width="100px"><?php echo $dong_sp['tensp'] ?></td>
		<td width="90px"><?php echo $dong_sp['gia'] ?></td>
		<td width="50px"><?php echo $dong_sp['soluong'] ?></td>
		<td>
			<img src="../<?php echo $dong_sp['hinhanh'] ?>" alt="" width="60px">
		</td>
		<td><?php echo $dong_sp['tenloaisp'] ?></td>
		<td><?php echo $dong_sp['thutu'] ?></td>
		<td><a href="../admin/index.php?quanly=quanlysp&ac=sua&id_sp=<?php echo $dong_sp['id_sp'] ?>&page=<?php echo $trang ?>">
			<img src="images/edit1.png" alt="">
		</a></td>
		<td><a onclick="return confirm('Bạn có thực sự muốn xóa không?');" href="modules/quanlysp/xuly.php?xoasp=sp&id_sp=<?php echo $dong_sp['id_sp'] ?>">
			<img  src="images/delete1.png" alt="">
		</a></td>
	</tr>
	<?php
			}
		}
	 ?>
</table>
<?php include("trang.php") ?>