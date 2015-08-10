<?php include 'view/header_admin.php'; ?>

<div id="content">
<div  class="content_text">
    <div class="content_tab"><b>Quản lý đơn hàng</b></div>
    <h1>Thông tin đơn hàng</h1>
    <p>Đơn hàng số: <?php echo $order_id; ?></p>
    <p>Ngày đặt hàng: <?php echo $order_date; ?></p>
    <p>Khách hàng: <?php echo $name . ' (' . $email . ')'; ?></p>
    <h2>Địa chỉ giao hàng</h2>
    <?php if ($order['ngaygiaohang'] === NULL) : ?>
        <p>Ngày giao hàng: Chưa giao hàng</p>
        <p>
            <form action="" method="post" >
                <input type="hidden" name="action" value="set_ship_date" />
                <input type="hidden" name="order_id"
                       value="<?php echo $order_id; ?>" />
                <input type="submit" value="Đã giao hàng" />
            </form>
            <form action="" method="post" >
                <input type="hidden" name="action" value="confirm_delete" />
                <input type="hidden" name="order_id"
                       value="<?php echo $order_id; ?>" />
                <input type="submit" value="Xóa đơn hàng" />
            </form>
        </p>

    <?php else:
        $ship_date = date('M j, Y', strtotime($order['ngaygiaohang']));
        ?>
        <p>Ngày giao hàng: <?php echo $ship_date; ?></p>
    <?php endif; ?>
    <p>Địa chỉ: <?php echo $ship_line1; ?><br />
        <?php if ( strlen($ship_line2) > 0 ) : ?>
        <?php echo $ship_line2; ?><br />
        <?php endif; ?>
       	Thành phố: <?php echo $ship_city; ?><br />
        Quận / Huyện: <?php echo $ship_state; ?><br />
        Mã vùng: <?php echo $ship_zip; ?><br />
        Số điện thoại: <?php echo $ship_phone; ?>
    </p>
    <h2>Địa chỉ thanh toán</h2>
    Mã thẻ: <?php echo $card_number . ' (' . $card_name . ')'; ?><br />
    Hạn sử dụng: <?php echo $card_expires; ?><br />
    Địa chỉ: <?php echo $bill_line1; ?><br />
        <?php if ( strlen($bill_line2) > 0 ) : ?>
            <?php echo $bill_line2; ?><br />
        <?php endif; ?>
        Thành phố: <?php echo $bill_city; ?><br />
        Quận / Huyện: <?php echo $bill_state; ?><br />
        Mã vùng: <?php echo $bill_zip; ?><br />
        Số điện thoại: <?php echo $bill_phone; ?>
    </p>
    <h2>Giỏ hàng</h2>
    <table id="cart" cellpadding="5px" >
        <tr id="cart_header">
            <th class="left">Sản phẩm</th>
            <th class="right">Đơn giá</th>
            <th class="right">Giảm</th>
            <th class="right">Giá</th>
            <th class="right">Số lượng</th>
            <th class="right">Thành tiền</th>
        </tr>
        <?php
        $subtotal = 0;
        foreach ($order_items as $item) :
            $product_id = $item['idsanpham'];
            $product = get_product($product_id);
            $item_name = $product['tensanpham'];
            $list_price = $item['trigiadonhang'];
            $savings = $item['giamgia'];
            $your_cost = $list_price - $savings;
            $quantity = $item['soluong'];
            $line_total = $your_cost * $quantity;
            $subtotal += $line_total;
            ?>
            <tr>
                <td><?php echo $item_name; ?></td>
                <td class="right">
                    <?php echo sprintf( $list_price); ?>
                </td>
                <td class="right">
                    <?php echo sprintf( $savings); ?>
                </td>
                <td class="right">
                    <?php echo sprintf( $your_cost); ?>
                </td>
                <td class="right">
                    <?php echo $quantity; ?>
                </td>
                <td class="right">
                    <?php echo sprintf( $line_total); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr id="cart_footer">
            <td colspan="5" class="right">Tổng phụ:</td>
            <td class="right">
                <?php echo sprintf( $subtotal); ?>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="right"> Thuế:</td>
            <td class="right">
                <?php echo sprintf( $order['thue']); ?>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="right">Phí giao hàng:</td>
            <td class="right">
                <?php echo sprintf( $order['phigiaohang']); ?>
            </td>
        </tr>
            <tr>
            <td colspan="5" class="right">Tổng cộng:</td>
            <td class="right">
                <?php
                    $total = $subtotal + $order['thue'] +
                             $order['phigiaohang'];
                    echo sprintf( $total);
                ?>
            </td>
        </tr>
</table><br />
<form action="../orders" method="post" >
        <input type="submit" value="Trở về" />
    </form>
</div>
</div>
<?php include 'view/footer.php'; ?>