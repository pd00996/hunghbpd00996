<?php include '../view/header.php'; ?>
<div id="content">
<div  class="content_text">
    <div class="content_tab"><b>Thông tin tài khoản</b></div>
    <h1 class="top">Tài khoản của bạn</h1>
    <p><?php echo $customer_name . ' (' . $email . ')'; ?></p>
    <form action="" method="post">
        <input type="hidden" name="action" value="view_account_edit" />
        <input type="submit" value="Cập nhập tài khoản" />
    </form>
    <h2>Địa chỉ giao hàng</h2>
    <p>Địa chỉ: <?php echo $ship_line1; ?><br />
        <?php if ( strlen($ship_line2) > 0 ) : ?>
        <?php echo $ship_line2; ?><br />
        <?php endif; ?>
        Thành phố: <?php echo $ship_city; ?><br />
		Quận / Huyện: <?php echo $ship_state; ?><br />
        Mã vùng: <?php echo $ship_zip; ?><br />
        Số điện thoại: <?php echo $ship_phone; ?>
    </p>
    <form action="" method="post">
        <input type="hidden" name="action" value="view_address_edit" />
        <input type="hidden" name="address_type" value="shipping" />
        <input type="submit" value="Cập nhập địa chỉ giao hàng" />
    </form>
    <h2>Địa chỉ thanh toán</h2>
    <p>Địa chỉ: <?php echo $bill_line1; ?><br />
        <?php if ( strlen($bill_line2) > 0 ) : ?>
            <?php echo $bill_line2; ?><br />
        <?php endif; ?>
        Thành phố: <?php echo $bill_city; ?><br />
		Quận / Huyện: <?php echo $bill_state; ?><br />
        Mã vùng: <?php echo $bill_zip; ?><br />
        Số điện thoại: <?php echo $bill_phone; ?>
    </p>
    <form action="" method="post">
        <input type="hidden" name="action" value="view_address_edit" />
        <input type="hidden" name="address_type" value="billing" />
        <input type="submit" value="Cập nhập địa chỉ thanh toán" />
    </form>
    <?php if (count($orders) > 0 ) : ?>
        <h2>Đơn hàng đã mua</h2>
        <ul>
            <?php foreach($orders as $order) :
                $order_id = $order['iddonhang'];
                $order_date = strtotime($order['ngaygiaohang']);
                $order_date = date('M j, Y', $order_date);
                $url = $app_path . 'account' .
                       '?action=view_order&order_id=' . $order_id;
                ?>
                <li>
                     <a href="<?php echo $url; ?>">Đơn hàng số
                    <?php echo $order_id; ?></a> vào ngày
                    <?php echo $order_date; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="<?php echo $app_path; ?>"><input type="submit" value="Trở về trang chủ" /></a>
    </div>
</div>
<?php include '../view/footer.php'; ?>
