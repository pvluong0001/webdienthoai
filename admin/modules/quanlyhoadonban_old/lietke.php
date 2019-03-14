<?php
//$sql="select * from hoadonban";
//$sql="SELECT a.id_hdb, b.tenkhach, b.diachi, b.dienthoai, a.ngayban, a.tongtien, a.trangthai  FROM hoadonban as a, khachhang as b WHERE a.id_khachhang=b.id_khachhang";
$sql = "select a.id_hdb, b.tenkhach, b.diachi, b.dienthoai, a.ngayban, a.tongtien, a.trangthai from hoadonban as a, khachhang as b where a.id_khachhang=b.id_khachhang order by a.id_hdb desc";
$hoadonban = mysqli_query($conn, $sql);
?>
<h1 style="text-align: center;padding-top: 10px;">ĐƠN ĐẶT HÀNG</h1>
<table width="99%" style="margin: auto;margin-top: 10px;text-align: center;border-collapse: collapse;">
    <tr>
        <td class="tt">STT</td>
        <td class="tt" style="width: 30px;">Mã hóa đơn</td>
        <td class="tt">Ngày bán</td>
        <td class="tt">Tên khách</td>
        <td class="tt">Địa chỉ</td>
        <td class="tt">Sđt</td>
        <td class="tt">Giá hóa đơn</td>
        <td class="tt">Trạng thái</td>
        <td class="tt" colspan="2">Quản lý</td>
        <td class="tt"></td>
    </tr>
    <?php
    $i = 0;
    while ($dong_hoadonban = mysqli_fetch_array($hoadonban, MYSQLI_ASSOC)) {
        $i++;
        if (isset($_GET['id_hdb'])) {
            $id_hdb = $_GET['id_hdb'];
        } else {
            $id_hdb = "";
        }
        if ($id_hdb == $dong_hoadonban['id_hdb']) {

            ?>
            <tr class="doimaudong">
                <td><?php echo $i; ?></td>
                <td><?php echo $dong_hoadonban['id_hdb'] ?></td>
                <td><?php echo $dong_hoadonban['ngayban'] ?></td>
                <td><?php echo $dong_hoadonban['tenkhach'] ?></td>
                <td><?php echo $dong_hoadonban['diachi'] ?></td>
                <td><?php echo $dong_hoadonban['dienthoai'] ?></td>
                <td><?php echo $dong_hoadonban['tongtien'] ?></td>
                <td><?php echo $dong_hoadonban['trangthai'] ?></td>
                <td>
                    <a href="../admin/index.php?quanly=quanlyhoadonban&ac=sua&id_hdb=<?php echo $dong_hoadonban['id_hdb'] ?>">
                        <img src="images/edit1.png" alt="">
                    </a>
                </td>
                <td>
                    <a onclick="return confirm('Bạn có thực sự muốn xóa không?');"
                       href="modules/quanlyhoadonban/xuly.php?xoahoadonban=hoadonban&id_hdb=<?php echo $dong_hoadonban['id_hdb'] ?>">
                        <img src="images/delete1.png" alt="">
                    </a>
                </td>
                <td>
                    <a href="../admin/index.php?quanly=quanlyhoadonban&ac=chitiethoadonban&id_hdb=<?php echo $dong_hoadonban['id_hdb'] ?>">Chi
                        tiết
                    </a>
                </td>
            </tr>
            <?php
        } else {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $dong_hoadonban['id_hdb'] ?></td>
                <td><?php echo $dong_hoadonban['ngayban'] ?></td>
                <td><?php echo $dong_hoadonban['tenkhach'] ?></td>
                <td><?php echo $dong_hoadonban['diachi'] ?></td>
                <td><?php echo $dong_hoadonban['dienthoai'] ?></td>
                <td><?php echo $dong_hoadonban['tongtien'] ?></td>
                <td><?php echo $dong_hoadonban['trangthai'] ?></td>
                <td>
                    <a href="../admin/index.php?quanly=quanlyhoadonban&ac=sua&id_hdb=<?php echo $dong_hoadonban['id_hdb'] ?>">
                        <img src="images/edit1.png" alt="">
                    </a>
                </td>
                <td>
                    <a onclick="return confirm('Bạn có thực sự muốn xóa không?');"
                       href="modules/quanlyhoadonban/xuly.php?xoahoadonban=hoadonban&id_hdb=<?php echo $dong_hoadonban['id_hdb'] ?>">
                        <img src="images/delete1.png" alt="">
                    </a>
                </td>
                <td>
                    <a href="../admin/index.php?quanly=quanlyhoadonban&ac=chitiethoadonban&id_hdb=<?php echo $dong_hoadonban['id_hdb'] ?>">Chi
                        tiết</a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>