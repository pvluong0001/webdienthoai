<?php
if (isset($_POST['timkiems'])) {
    $timkiemt = $_POST['timkiemt'];
    $sql = "select * from sp where tensp like '%$timkiemt%'";
    $sp = mysqli_query($conn, $sql);
}
?>
<p style="text-align: center;padding:10px;  background-color: #eaeaea;color: red">SẢN PHẨM TÌM THẤY</p>
<div class="tatcasanpham content">
    <?php
    if ($count = mysqli_num_rows($sp) == 0) {
        ?>
        <p>Không tìm thấy sản phẩm nào</p>
        <?php
    } else {
        ?>
        <div class="grid-sp">
            <?php
            while ($dong_sp=mysqli_fetch_array($sp,MYSQLI_ASSOC)) {

                ?>
                <div class="item">
                    <a href="index.php?xem=chitietsanpham&id=<?php echo $dong_sp['id_sp'] ?>&id_loaisp=<?php echo $dong_sp['id_loaisp'] ?>">
                        <img src="<?php echo $dong_sp['hinhanh'] ?>" alt="" style="width: 200px;height:200px;" /></a>
                    <h3><a href="index.php?xem=chitietsanpham&id=<?php echo $dong_sp['id_sp'] ?>&id_loaisp=<?php echo $dong_sp['id_loaisp'] ?>"><?php echo $dong_sp['tensp'] ?></a></h3>
                    <div class="price-details">
                        <div class="price-number">
                            <p><span class="rupees"><?php echo number_format($dong_sp['gia'], 0, ',', '.') ?> đ</span></p>
                        </div>
                        <div class="add-cart">
                            <h4><a href="index.php?xem=giohang&id_sp=<?php echo $dong_sp['id_sp'] ?>">Add to Cart</a></h4>
                        </div>
                        <div class="clear"></div>
                    </div>

                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?>
</div>