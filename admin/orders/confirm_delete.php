<?php include 'view/header_admin.php'; ?>
<div id="content">
<div  class="content_text">
    <div class="content_tab"><b>Quản lý đơn hàng</b></div>
    <h2 class="top">Xóa đơn hàng</h2>
    <p>Đơn hàng số: <?php echo $order_id; ?></p>
    <p>Ngày đặt hàng: <?php echo $order_date; ?></p>
    <p>Khách hàng: <?php echo $name . ' (' . $email . ')'; ?></p>
    <p>Bạn chắc chắn muốn xóa đơn hàng này?</p>
    <form action="" method="post">
        <input type="hidden" name="action" value="delete" />
        <input type="hidden" name="order_id"
               value="<?php echo $order_id; ?>" />
        <input type="submit" value="Xóa" />
    </form>
    <form action="" method="post">
        <input type="submit" value="Trở về" />
    </form>
</div>
</div>
<?php include 'view/footer.php'; ?>