<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require_once('../util/main.php');


require_once('model/customer_db.php');
require_once('model/address_db.php');
require_once('model/order_db.php');
require_once('model/product_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
} elseif (isset($_SESSION['user'])) {
    $action = 'view_account';
} else {
    $action = 'view_login';
}

switch ($action) {
    case 'view_login':
        include 'account_login_register.php';
        break;
    case 'view_register':
        include 'account_register.php';
        break;
    case 'register':
        // Store user data in local variables
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $ship_line1 = $_POST['ship_line1'];
        $ship_line2 = $_POST['ship_line2'];
        $ship_city = $_POST['ship_city'];
        $ship_state = $_POST['ship_state'];
        $ship_zip = $_POST['ship_zip'];
        $ship_phone = $_POST['ship_phone'];
        $use_shipping = isset($_POST['use_shipping']);
        $bill_line1 = $_POST['bill_line1'];
        $bill_line2 = $_POST['bill_line2'];
        $bill_city = $_POST['bill_city'];
        $bill_state = $_POST['bill_state'];
        $bill_zip = $_POST['bill_zip'];
        $bill_phone = $_POST['bill_phone'];

        // Store data in the session
        $_SESSION['form_data'] = array();
        $_SESSION['form_data']['email'] = $email;
        $_SESSION['form_data']['first_name'] = $first_name;
        $_SESSION['form_data']['last_name'] = $last_name;
        $_SESSION['form_data']['ship_line1'] = $ship_line1;
        $_SESSION['form_data']['ship_line2'] = $ship_line2;
        $_SESSION['form_data']['ship_city'] = $ship_city;
        $_SESSION['form_data']['ship_state'] = $ship_state;
        $_SESSION['form_data']['ship_zip'] = $ship_zip;
        $_SESSION['form_data']['ship_phone'] = $ship_phone;
        $_SESSION['form_data']['use_shipping'] = isset($use_shipping);
        $_SESSION['form_data']['bill_line1'] = $bill_line1;
        $_SESSION['form_data']['bill_line2'] = $bill_line2;
        $_SESSION['form_data']['bill_city'] = $bill_city;
        $_SESSION['form_data']['bill_state'] = $bill_state;
        $_SESSION['form_data']['bill_zip'] = $bill_zip;
        $_SESSION['form_data']['bill_phone'] = $bill_phone;

        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];

        // Validate user data
        // TODO: Improve this validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            display_error('Email ' . $email . ' không hợp lệ.');
        } elseif (is_valid_customer_email($email)) {
            display_error('Email ' . $email . ' đã được sử dụng.');
        }
        if (empty($first_name)) {
            display_error('Vui lòng nhập Họ .');
        }
        if (empty($last_name)) {
            display_error('Vui lòng nhập Tên.');
        }
        if (empty($password_1) || empty($password_2)) {
            display_error('Vui lòng nhập Password.');
        } elseif ($password_1 !== $password_2) {
            display_error('Password không trùng khớp.');
        } elseif (strlen($password_1) < 6) {
            display_error('Password nhiều hơn 6 ký tự.');
        }

        // Validate shipping address
        if (empty($ship_line1)) {
            display_error('Vui lòng nhập địa chỉ.');
        }
        if (empty($ship_city)) {
            display_error('Vui lòng nhập thành phố.');
        }
        if (empty($ship_state)) {
            display_error('Vui lòng nhập quận huyện.');
        }
        if (strlen($ship_state) > 40 ) {
            display_error('Không quá 40 ký tự.');
        }
        if (empty($ship_zip)) {
            display_error('Vui lòng nhập mã vùng.');
        }
        if (empty($ship_phone)) {
            display_error('Vui lòng nhập số điện thoại.');
        }

        // If necessary, validate billing address
        if (!$use_shipping) {
            if (empty($bill_line1)) {
                display_error('Billing address line 1 is required.');
            }
            if (empty($bill_city)) {
                display_error('Billing city is required.');
            }
            if (empty($bill_state)) {
                display_error('Billing state is required.');
            }
            if (strlen($bill_state) > 40 ) {
                display_error('Không quá 40 ký tự.');
            }
            if (empty($bill_zip)) {
                display_error('Billing ZIP code is required.');
            }
            if (empty($bill_phone)) {
                display_error('Billing phone number is required.');
            }
        }

        // Add the customer data to the database
        $customer_id = add_customer($email, $first_name,
                                    $last_name, $password_1, $password_2);

        // Add the shipping address
        $shipping_id = add_address($customer_id, $ship_line1, $ship_line2,
                                   $ship_city, $ship_state, $ship_zip,
                                   $ship_phone);
        customer_change_shipping_id($customer_id, $shipping_id);

        // Add the billing address
        if ($use_shipping) {
            $billing_id = add_address($customer_id, $ship_line1, $ship_line2,
                                       $ship_city, $ship_state, $ship_zip,
                                       $ship_phone);
        } else {
            $billing_id = add_address($customer_id, $bill_line1, $bill_line2,
                                   $bill_city, $bill_state, $bill_zip,
                                   $bill_phone);
        }
        customer_change_billing_id($customer_id, $billing_id);

        // Set up session data
        unset($_SESSION['form_data']);
        $_SESSION['user'] = get_customer($customer_id);

        // Redirect to the Checkout application if necessary
        if (isset($_SESSION['checkout'])) {
            unset($_SESSION['checkout']);
            redirect('../checkout');
        } else {
            redirect('.');
        }        
        break;
    case 'login':
        $email = $_POST['email'];
        $password = $_POST['password'];

        // If valid username/password, login
        // TODO: Improve this validation
        if (is_valid_customer_login($email, $password)) {
            $_SESSION['user'] = get_customer_by_email($email);
        } else {
            display_error('Lỗi đăng nhập. Email và mật khẩu không chính xác !');
        }

        // If necessary, redirect to the Checkout app
        if (isset($_SESSION['checkout'])) {
            unset($_SESSION['checkout']);
            redirect('../checkout');
        } else {
            redirect('.');
        }
        break;
    case 'view_account':
        $customer_name = $_SESSION['user']['firstName'] . ' ' .
                         $_SESSION['user']['lastName'];
        $email = $_SESSION['user']['email'];

        $ship_address_id = $_SESSION['user']['iddiachigiaohang'];
        $shipping_address = get_address($ship_address_id);
        $ship_line1 = $shipping_address['diachi1'];
        $ship_line2 = $shipping_address['diachi2'];
        $ship_city = $shipping_address['thanhpho'];
        $ship_state = $shipping_address['quanhuyen'];
        $ship_zip = $shipping_address['mavung'];
        $ship_phone = $shipping_address['sodienthoai'];

        $billing_address = get_address($_SESSION['user']['iddiachithanhtoan']);
        $bill_line1 = $billing_address['diachi1'];
        $bill_line2 = $billing_address['diachi2'];
        $bill_city = $billing_address['thanhpho'];
        $bill_state = $billing_address['quanhuyen'];
        $bill_zip = $billing_address['mavung'];
        $bill_phone = $billing_address['sodienthoai'];

        $orders = get_orders_by_customer_id($_SESSION['user']['idkhachhang']);

        include 'account_view.php';
        break;
    case 'view_order':
        $order_id = $_GET['order_id'];
        $order = get_order($order_id);
        $order_date = strtotime($order['ngaydathang']);
        $order_date = date('M j, Y', $order_date);
        $order_items = get_order_items($order_id);

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

        include 'account_view_order.php';
        break;
    case 'view_account_edit':
        $first_name = $_SESSION['user']['firstName'];
        $last_name = $_SESSION['user']['lastName'];
        $email = $_SESSION['user']['email'];
        $shipping_id = $_SESSION['user']['iddiachigiaohang'];
        $billing_id = $_SESSION['user']['iddiachithanhtoan'];
        include 'account_edit.php';
        break;
    case 'update_account':
        // Get the customer data
        $customer_id = $_SESSION['user']['idkhachhang'];
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];

        // Get the old data for the customer
        $old_customer = get_customer($customer_id);

        // Validate the data for the customer
        if ($email != $old_customer['email']) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                display_error('The e-mail address ' . $email . ' is not valid.');
            } elseif (is_valid_customer_email($email)) {
                display_error('The e-mail address ' . $email . ' is already in use.');
            }
        }
        if (empty($first_name)) {
            display_error('First name is a required field.');
        }
        if (empty($last_name)) {
            display_error('Last name is a required field.');
        }

        // Only validate the passwords if they are NOT empty
        if (!empty($password_1) && !empty($password_2)) {
            if ($password_1 !== $password_2) {
                display_error('Passwords do not match.');
            } elseif (strlen($password_1) < 6) {
                display_error('Password ít nhất 6 ký tự.');
            }
        }

        // Update the customer data
        update_customer($customer_id, $email, $first_name, $last_name,
            $password_1, $password_2);

        // Set the new customer data in the session
        $_SESSION['user'] = get_customer($customer_id);

        redirect('.');
        break;
    case 'view_address_edit':
        // Set up variables for address type
        $billing = $_POST['address_type'] == 'billing';
        if ($billing) {
            $address_id = $_SESSION['user']['iddiachithanhtoan'];
            $heading = 'Cập nhập địa chỉ thanh toán';
        } else {
            $address_id = $_SESSION['user']['iddiachigiaohang'];
            $heading = 'Cập nhập địa chỉ giao hàng';
        }

        // Get the data for the address
        $address = get_address($address_id);
        $line1 = $address['diachi1'];
        $line2 = $address['diachi2'];
        $city = $address['thanhpho'];
        $state = $address['quanhuyen'];
        $zip = $address['mavung'];
        $phone = $address['sodienthoai'];

        // Display the data on the page
        include 'address_edit.php';
        break;
    case 'update_address':
        $customer_id = $_SESSION['user']['idkhachhang'];
    
        // Get the address ID for the address to be updated
        $billing = $_POST['address_type'] == 'billing';
        if ($billing) {
            $address_id = $_SESSION['user']['iddiachithanhtoan'];
        } else {
            $address_id = $_SESSION['user']['iddiachigiaohang'];
        }

        // Get the post data
          $line1 = $_POST['line1'];
        $line2 = $_POST['line2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $phone = $_POST['phone'];

        // Validate the data
        // TODO: Improve this validation
        if (empty($line1)) {
            display_error('Address line 1 is required.');
        }
        if (empty($city)) {
            display_error('City is required.');
        }
        if (empty($state)) {
            display_error('State is required.');
        }
        if (strlen($state) > 40 ) {
            display_error('"Quận / Huyện" không quá 40 ký tự.');
        }
        if (empty($zip)) {
            display_error('ZIP code is required.');
        }
        if (empty($phone)) {
            display_error('Phone number is required.');
        }

        // If the old address has orders, disable it
        // Otherwise, delete it
        disable_or_delete_address($address_id);

        // Add the new address
        $address_id = add_address($customer_id, $line1, $line2, $city,
                                   $state, $zip, $phone);

        // Relate the address to the customer account
        if ($billing) {
            customer_change_billing_id ($customer_id, $address_id);
        } else {
            customer_change_shipping_id ($customer_id, $address_id);
        }

        // Set the user data in the session
        $_SESSION['user'] = get_customer($customer_id);

        redirect('.');
        break;
    case 'logout':
        unset($_SESSION['user']);
        redirect('..');
        break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}
?>