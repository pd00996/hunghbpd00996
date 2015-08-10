<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require_once('../../util/main.php');



require_once('model/customer_db.php');
require_once('model/address_db.php');
require_once('model/order_db.php');
require_once('model/product_db.php');

if ( isset($_POST['action']) ) {
    $action = $_POST['action'];
} elseif ( isset($_GET['action']) ) {
    $action = $_GET['action'];
} else {
    $action = 'view_orders';
}

switch($action) {
    case 'view_orders':
        $new_orders = get_unfilled_orders();
        $old_orders = get_filled_orders();
        
        include 'orders.php';
        break;
    case 'view_order':
        $order_id = $_GET['order_id'];

        // Get order data
        $order = get_order($order_id);
        $order_date = date('M j, Y', strtotime($order['ngaydathang']));
        $order_items = get_order_items($order_id);

        // Get customer data
        $customer = get_customer($order['idkhachhang']);
        $name = $customer['lastName'] . ', ' . $customer['firstName'];
        $email = $customer['email'];
        $card_number = $order['mathe'];
        $card_expires = $order['hansudungthe'];
        $card_name = card_name($order['loaithe']);

        $shipping_address = get_address($order['iddiachigiaohang']);
        $ship_line1 = $shipping_address['diachi1'];
        $ship_line2 = $shipping_address['diachi2'];
        $ship_city = $shipping_address['thanhpho'];
        $ship_state = $shipping_address['quanhuyen'];
        $ship_zip = $shipping_address['mavung'];
        $ship_phone = $shipping_address['sodienthoai'];

        $billing_address = get_address($order['iddiachithanhtoan']);
        $bill_line1 = $billing_address['diachi1'];
        $bill_line2 = $billing_address['diachi2'];
        $bill_city = $billing_address['thanhpho'];
        $bill_state = $billing_address['quanhuyen'];
        $bill_zip = $billing_address['mavung'];
        $bill_phone = $billing_address['sodienthoai'];

        include 'order.php';
        break;
    case 'set_ship_date':
        $order_id = intval($_POST['order_id']);
        set_ship_date($order_id);
        $url = '?action=view_order&order_id=' . $order_id;
        redirect($url);
    case 'confirm_delete':
        // Get order data
        $order_id = intval($_POST['order_id']);
        $order = get_order($order_id);
        $order_date = date('M j, Y', strtotime($order['ngaydathang']));

        // Get customer data
        $customer = get_customer($order['idkhachhang']);
        $name = $customer['lastName'] . ', ' . $customer['firstName'];
        $email = $customer['email'];

        include 'confirm_delete.php';
        break;
    case 'delete':
        $order_id = intval($_POST['order_id']);
        delete_order($order_id);
        redirect('.');
        break;
    default:
        display_error("Unknown order action: " . $action);
        break;
}
?>