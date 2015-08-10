<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Bá Hưng Shop, ba hung shop, bahungshop, bahungdtdd" />
<!-- InstanceBeginEditable name="EditRegion_title" -->
<title>Login</title>
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="../../CSS/main.css"/>
<link rel="stylesheet" type="text/css" href="../../Jquery%20UI/css/ui-lightness/jquery-ui-1.10.4.custom.css"/>
	<script src="../../Jquery%20UI/js/jquery-1.10.2.js"></script>
	<script src="../../Jquery%20UI/js/jquery-ui-1.10.4.custom.js"></script>
<style type="text/css">
a:link {text-decoration: none;}
a:visited {text-decoration: none;}
.ui-menu { 
	width: 184px; 
	z-index:9999;
	border-top-left-radius:0px;
	border-top-right-radius:0px;
	border:0px #999 solid;
	font-size:15px;
}
#menu li ul {
	border-radius: 5px;
}
#menu li a:hover {
	color:#00F;
	background:#CCC;
}
</style>
<script>
  $(function() {
    $( "#menu" ).menu();
  });
  </script>
</head>
		<script type="text/javascript">

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53320103-1', 'auto');
  ga('send', 'pageview');


	</script>
<body >
<div id="main">

    
    <div class="content_center"><!-- InstanceBeginEditable name="content_center" -->
   
	<?php
require_once('../../util/main.php');

require_once('model/admin_db.php');

if (isset($_SESSION['user'])) {
    display_error('Bạn không thẻ truy cập vào quản trị khi đang là khách hàng.');
}

if ( admin_count() == 0 ) {
    if ( $_POST['action'] == 'create' ) {
        $action = 'create';
    } else {
        $action = 'view_account';
    }
} elseif ( isset($_SESSION['admin']) ) {
    if ( isset($_POST['action']) ) {
        $action = $_POST['action'];
    } elseif ( isset($_GET['action']) ) {
        $action = $_GET['action'];
    } else {
        $action = 'view_account';
    }
} elseif (isset ($_POST['action']) && $_POST['action'] == 'login') {
    $action = 'login';
} else {
    $action = 'view_login';
}

echo $action;

switch ($action) {
    case 'view_login':
        include 'account_login.php';
        break;
    case 'login':
        // Get username/password
        $email = $_POST['email'];
        $password = $_POST['password'];

        // If valid username/password, log in
        if (is_valid_admin_login($email, $password)) {
            $_SESSION['admin'] = get_admin_by_email($email);
        } else {
            display_error('Lỗi đăng nhập. Email và mật khẩu không chính xác !');
        }
		

        // Display Admin Menu page
        redirect('..');
        break;
    case 'create':
        // Get admin user data
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];

        // Set admin user data in session
        $_SESSION['form_data'] = array();
        $_SESSION['form_data']['email'] = $email;
        $_SESSION['form_data']['first_name'] = $first_name;
        $_SESSION['form_data']['last_name'] = $last_name;

        // Validate admin user data
        // TODO: Improve this validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            display_error('The e-mail address ' . $email . ' is not valid.');
        } elseif (is_valid_admin_email($email)) {
            display_error('The e-mail address ' . $email . ' is already in use.');
        }
        if (empty($first_name)) {
            display_error('First name is a required field.');
        }
        if (empty($last_name)) {
            display_error('Last name is a required field.');
        }
        if (empty($password_1) || empty($password_2)) {
            display_error('Password is a required field.');
        } elseif ($password_1 !== $password_2) {
            display_error('Passwords do not match.');
        } elseif (strlen($password_1) < 6) {
            display_error('Password must be at least six characters.');
        }

        // Add admin user
        $admin_id = add_admin($email, $first_name, $last_name,
                                 $password_1, $password_2);

        // Set up session data
        unset($_SESSION['form_data']);
        if (!isset($_SESSION['admin'])) {
            $_SESSION['admin'] = get_admin($admin_id);
        }

        redirect('.');
        break;
    case 'view_account':
        // Get admin user data from session
        $name_admin = $_SESSION['admin']['firstName'] . ' ' .
                $_SESSION['admin']['lastName'];
        $email = $_SESSION['admin']['email'];
        $admin_id = $_SESSION['admin']['idadmin'];

        // Get all accounts from database
        $admins = get_all_admins();

        // View admin accounts
        include 'account_view.php';
        break;
    case 'view_edit':
        // Get admin user data
        $admin_id = intval($_POST['admin_id']);
        $admin = get_admin($admin_id);
        $first_name = $admin['firstName'];
        $last_name = $admin['lastName'];
        $email = $admin['email'];

        // Display Edit page
        include 'account_edit.php';
        break;
    case 'update':
        $admin_id = intval($_POST['admin_id']);
        update_admin(
            $admin_id,
            $_POST['email'],
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['password_1'],
            $_POST['password_2']
        );
        if ($admin_id == $_SESSION['admin']['adminID']) {
            $_SESSION['admin'] = get_admin($admin_id);
        }
        redirect($app_path . 'admin/account');
        break;
    case 'view_delete_confirm':
        $admin_id = intval($_POST['admin_id']);
        if ($admin_id == $_SESSION['admin']['idadmin']) {
            display_error('You cannot delete your own account.');
        }
        $admin = get_admin($admin_id);
        $first_name = $admin['firstName'];
        $last_name = $admin['lastName'];
        $email = $admin['email'];
        include 'account_delete.php';
        break;
    case 'delete':
        $admin_id = intval($_POST['admin_id']);
        delete_admin($admin_id);
        redirect($app_path . 'admin/account');
        break;
    case 'logout':
        unset($_SESSION['admin']);
        redirect($app_path . 'admin/account');
        break;
    default:
        display_error('Unknown account action: ' . $action);
        break;
}
?>
	
	<!-- InstanceEndEditable -->

</div>
</body>
<!-- InstanceEnd --></html>
