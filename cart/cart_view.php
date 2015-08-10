<?php include '../view/header.php'; ?>
<div id="content">
<div  class="content_text">
    <div class="content_tab"><b>Giỏ hàng</b></div>
    <?php if (cart_product_count() == 0) : ?>
        <p>Hiện không có sản phẩm nào.</p>
    <?php else: ?>
        <p>Nhập 0 để xóa sản phẩm khỏi đơn hàng.</p>
        <form action="." method="post">
            <input type="hidden" name="action" value="update" />
            <table id="cart" cellpadding="5px">
            <tr id="cart_header">
                <th class="left">Sản phẩm</th>
                <th class="right">Giá</th>
                <th class="right">Số lượng</th>
                <th class="right">Tổng tiền</th>
            </tr>
            <?php foreach ($cart as $product_id => $item) : ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td class="right">
                    <?php echo sprintf( $item['unit_price']); ?>
                </td>
                <td class="right">
                    <input type="text" size="3" class="right"
                           name="items[<?php echo $product_id; ?>]"
                           value="<?php echo $item['quantity']; ?>" />
                </td>
                <td class="right">
                    <?php echo sprintf( $item['line_price']); ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr id="cart_footer" >
                <td colspan="3" class="right" ><b>Tổng cộng</b></td>
                <td class="right">
                    <?php echo sprintf( cart_subtotal()); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="right">
                    <input type="submit" value="Cập nhập giỏ hàng" />
                </td>
            </tr>
            </table>
        </form>
        
    <?php endif; ?>

   

    <!-- display most recent category -->


    <!-- if cart has items, display the Checkout link -->
    <?php if (cart_product_count() > 0) : ?>
        <p>
             <h3><a href="../checkout">Thanh toán</a></h3>
        </p>
    <?php endif; ?>
</div>
<?php include '../view/footer.php'; ?>