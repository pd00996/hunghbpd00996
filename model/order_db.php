<?php

// This function calculates a shipping charge of $5 per item
// but it only charges shipping for the first 5 items
function shipping_cost() {
    $item_count = cart_item_count();
    $item_shipping = 5;   // $5 per item
    if ($item_count > 5) {
        $shipping_cost = $item_shipping * 5;
    } else {
        $shipping_cost = $item_shipping * $item_count;
    }
    return $shipping_cost;
}

// This function calcualtes the sales tax,
// but only for orders in California (CA)
function tax_amount($subtotal) {
    $shipping_address = get_address($_SESSION['user']['iddiachigiaohang']);
    $state = $shipping_address['quanhuyen'];
    $state = strtoupper($state);
    switch ($state) {
        case 'CA': $tax_rate = 0.09; break;
        default: $tax_rate = 0; break;
    }
    return round($subtotal * $tax_rate, 2);
}

function card_name($card_type) {
    switch($card_type){
        case 1: 
           return 'MasterCard';
           break;
        case 2: 
            return 'Visa';
            break;
        case 3: 
            return 'Discover';
            break;
        case 4:
            return 'American Express';
            break;
        default:
            return 'Unknown Card Type';
            break;
    }
}

function add_order($card_type, $card_number, $card_cvv, $card_expires) {
    global $db;
    $customer_id = $_SESSION['user']['idkhachhang'];
    $billing_id = $_SESSION['user']['iddiachithanhtoan'];
    $shipping_id = $_SESSION['user']['iddiachigiaohang'];
    $shipping_cost = shipping_cost();
    $tax = tax_amount(cart_subtotal());
    $order_date = date("Y-m-d H:i:s");

    $query = '
         INSERT INTO donhang (idkhachhang, ngaydathang, phigiaohang, thue,
                             iddiachigiaohang, loaithe, mathe,
                             hansudungthe, iddiachithanhtoan)
         VALUES (:idkhachhang, :ngaydathang, :phigiaohang, :thue,
                 :iddiachigiaohang, :loaithe, :mathe,
                 :hansudungthe, :iddiachithanhtoan)';
    $statement = $db->prepare($query);
    $statement->bindValue(':idkhachhang', $customer_id);
    $statement->bindValue(':ngaydathang', $order_date);
    $statement->bindValue(':phigiaohang', $shipping_cost);
    $statement->bindValue(':thue', $tax);
    $statement->bindValue(':iddiachigiaohang', $shipping_id);
    $statement->bindValue(':loaithe', $card_type);
    $statement->bindValue(':mathe', $card_number);
    $statement->bindValue(':hansudungthe', $card_expires);
    $statement->bindValue(':iddiachithanhtoan', $billing_id);
    $statement->execute();
    $order_id = $db->lastInsertId();
    $statement->closeCursor();
    return $order_id;
}

function add_order_item($order_id, $product_id,
                        $item_price, $quantity) {
    global $db;
    $query = '
        INSERT INTO chitietdonhang (iddonhang, idsanpham, trigiadonhang, soluong)
        VALUES (:order_id, :product_id, :item_price, :quantity)';
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id', $order_id);
    $statement->bindValue(':product_id', $product_id);
    $statement->bindValue(':item_price', $item_price);
    $statement->bindValue(':quantity', $quantity);
    $statement->execute();
    $statement->closeCursor();
}

function get_order($order_id) {
    global $db;
    $query = 'SELECT * FROM donhang WHERE iddonhang = :order_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id', $order_id);
    $statement->execute();
    $order = $statement->fetch();
    $statement->closeCursor();
    return $order;
}

function get_order_items($order_id) {
    global $db;
    $query = 'SELECT * FROM chitietdonhang WHERE iddonhang = :order_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id', $order_id);
    $statement->execute();
    $order_items = $statement->fetchAll();
    $statement->closeCursor();
    return $order_items;
}

function get_orders_by_customer_id($customer_id) {
    global $db;
    $query = 'SELECT * FROM donhang WHERE idkhachhang = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $order = $statement->fetchAll();
    $statement->closeCursor();
    return $order;
}

function get_unfilled_orders() {
    global $db;
    $query = 'SELECT * FROM donhang
              INNER JOIN khachhang
              ON khachhang.idkhachhang = donhang.idkhachhang
              WHERE ngaygiaohang IS NULL ORDER BY ngaydathang';
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;
}

function get_filled_orders() {
    global $db;
    $query =
        'SELECT * FROM donhang
         INNER JOIN khachhang
         ON khachhang.idkhachhang = donhang.idkhachhang
         WHERE ngaygiaohang IS NOT NULL ORDER BY ngaydathang';
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;
}

function set_ship_date($order_id) {
    global $db;
    $ship_date = date("Y-m-d H:i:s");
    $query = '
         UPDATE donhang
         SET ngaygiaohang = :ship_date
         WHERE iddonhang = :order_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':ship_date', $ship_date);
    $statement->bindValue(':order_id', $order_id);
    $statement->execute();
    $statement->closeCursor();
}

function delete_order($order_id) {
    global $db;
    $query = 'DELETE FROM donhang WHERE iddonhang = :order_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id', $order_id);
    $statement->execute();
    $statement->closeCursor();
}
?>