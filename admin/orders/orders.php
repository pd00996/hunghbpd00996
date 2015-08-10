<?php include 'view/header_admin.php'; ?>

<div id="content">
<div  class="content_text">
    <div class="content_tab"><b>Quản lý đơn hàng</b></div>
    <h1>Đơn hàng chưa giao</h1>
    <?php if (count($new_orders) > 0 ) : ?>
        <ul>
            <?php foreach($new_orders as $order) :
                $order_id = $order['iddonhang'];
                $order_date = strtotime($order['ngaydathang']);
                $order_date = date('M j, Y', $order_date);
                $url = $app_path . 'admin/orders' .
                       '?action=view_order&order_id=' . $order_id;
                ?>
                <li>
                    <a href="<?php echo $url; ?>">Đơn hàng số
                    <?php echo $order_id; ?></a> của khách hàng
                    <?php echo $order['firstName'] . ' ' .
                               $order['lastName']; ?> giao dịch ngày
                    <?php echo $order_date; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Không có đơn hàng nào.</p>
    <?php endif; ?>
    <h1>Đơn hàng đã giao</h1>
    <?php if (count($old_orders) > 0 ) : ?>
        <ul>
            <?php foreach($old_orders as $order) :
                $order_id = $order['iddonhang'];
                $order_date = strtotime($order['ngaydathang']);
                $order_date = date('M j, Y', $order_date);
                $url = $app_path . 'admin/orders' .
                       '?action=view_order&order_id=' . $order_id;
                ?>
                <li>
                    <a href="<?php echo $url; ?>">Đơn hàng số
                    <?php echo $order_id; ?></a> của khách hàng
                    <?php echo $order['firstName'] . ' ' .
                               $order['lastName']; ?> giao dịch ngày
                    <?php echo $order_date; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>There are no shipped orders.</p>
    <?php endif; ?>
     <a href="<?php echo $home; ?>"><input type="submit" value="Trở về" /></a>
    </div>
</div>
<?php include 'view/footer.php'; ?>