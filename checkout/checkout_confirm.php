<?php include '../view/header.php'; ?>
<div id="content">
<div  class="content_text">
    <div class="content_tab"><b>Giỏ hàng</b></div>
    <h1>Xác nhận đơn hàng</h1>
    <table id="cart" cellpadding="3px" >
        <tr id="cart_header">
            <th class="left" >Sản phẩm</th>
            <th class="right">Giá</th>
            <th class="right">Số lượng</th>
            <th class="right">Tổng</th>
        </tr>
        <?php foreach ($cart as $product_id => $item) : ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td class="right">
                    <?php echo sprintf( $item['unit_price']); ?>
                </td>
                <td class="right">
                    <?php echo $item['quantity']; ?>
                </td>
                <td class="right">
                    <?php echo sprintf( $item['line_price']); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr id="cart_footer">
            <td colspan="3" class="right"><b>Subtotal</b></td>
            <td class="right">
                <?php echo sprintf( $subtotal); ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="right"> Thuế</td>
            <td class="right">
                <?php echo sprintf( $tax); ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="right">Phí giao hàng</td>
            <td class="right">
                <?php echo sprintf( $shipping_cost); ?>
            </td>
        </tr>
            <tr>
            <td colspan="3" class="right"><b>Tổng cộng</b></td>
            <td class="right">
                <?php echo sprintf( $total); ?>
            </td>
        </tr>
</table>
    <p>
      <a href="<?php echo '?action=payment'; ?>"><input type="submit" value="Thanh toán"></a>
    </p>
    <form action="../cart" method="post" >
        <input type="submit" value="Trở về" />
    </form>
</div>
<?php include '../view/footer.php'; ?>