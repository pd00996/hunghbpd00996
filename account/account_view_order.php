<?php include '../view/header.php'; ?>
<div id="content">
<div  class="content_text">

    <div class="content_tab"><b>Thông tin tài khoản</b></div>
    <h1>Đơn hàng của bạn</h1>
    <p>Mã số đơn hàng: <?php echo $order_id; ?></p>
    <p>Ngày đặt hàng: <?php echo $order_date; ?></p>
    <h2>Địa chỉ giao hàng</h2>
    <p>Ngày giao hàng:
        <?php
		$trove = $app_path.'account';
            if ($order['ngaygiaohang'] === NULL) {
                echo 'Not shipped yet';
            } else {
                $ship_date = strtotime($order['ngaygiaohang']);
                echo date('M j, Y', $ship_date);
            }
        ?>
    </p>
    <p>Địa chỉ: <?php echo $ship_line1; ?><br />
        <?php if ( strlen($ship_line2) > 0 ) : ?>
            <?php echo $ship_line2; ?><br />
        <?php endif; ?>
        Thành phố: <?php echo $ship_city; ?><br />
		Quận / Huyện: <?php echo $ship_state; ?><br />
        Mã vùng: <?php echo $ship_zip; ?><br />
        Số điện thoại: <?php echo $ship_phone; ?>
    </p>
    <h2>Địa chỉ thanh toán:</h2>
    <p>Mã số thẻ: ...<?php echo substr($order['mathe'], -4); ?></p>
    <p>Địa chỉ: <?php echo $bill_line1; ?><br />
        <?php if ( strlen($bill_line2) > 0 ) : ?>
            <?php echo $bill_line2; ?><br />
        <?php endif; ?>
        Thành phố: <?php echo $bill_city; ?><br />
        Quận / Huyện: <?php echo $bill_state; ?><br />
        Mã vùng: <?php echo $bill_zip; ?><br />
        Số điện thoại: <?php echo $bill_phone; ?>
    </p>
    <h2>Hóa đơn</h2>
    <table id="cart" cellpadding="10px">
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
            <td colspan="5" class="right">Tổng:</td>
            <td class="right">
                <?php echo sprintf( $subtotal); ?>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="right">Thuế:</td>
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
            <td colspan="5" class="right">Tổng Cộng:</td>
            <td class="right">
                <?php
                    $total = $subtotal + $order['thue'] +
                             $order['phigiaohang'];
                    echo sprintf( $total);
                ?>
            </td>
        </tr>
</table>
<a href="<?php echo $trove; ?>"><input type="submit" value="Trở về" /></a>
</div>
</div>
<?php include '../view/footer.php'; ?>
