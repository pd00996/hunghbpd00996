<?php include '../view/header.php'; ?>
<div id="content">
<div  class="content_text">
    <div class="content_tab"><b>Thông tin tài khoản</b></div>
    <h1 align="center">Cập nhập thông tin tài khoản</h1>
    <table align="center" cellpadding="3px">
    <form action="" method="post">
    <tr>
    	<td>
        <input type="hidden" name="action" value="update_account" />
        <label for="email">E-Mail:</label>
        </td>
        <td>
        <input type="text" name="email" value="<?php echo $email; ?>" />
        </td>
    </tr>
    <tr>
    	<td>    
        <label for="first_name">Họ:</label>
        </td>
        <td>
        <input type="text" name="first_name" value="<?php echo $first_name; ?>" />
        </td>
    </tr>
    <tr>
    	<td>
        <label for="last_name">Tên:</label>
        </td>
        <td>
        <input type="text" name="last_name" value="<?php echo $last_name; ?>" />
        </td>
    </tr>
    <tr>
    	<td>    
        <label for="password_1">New Password:</label>
        </td>
        <td>
        <input type="password" name="password_1" />&nbsp;&nbsp;
        ( Không bắt buộc )
        </td>
    </tr>
    <tr>
    	<td>    
        <label for="password_2">Retype Password:</label>
        </td>
        <td>
        <input type="password" name="password_2" />
        </td>
    </tr>
    <tr>
    	<td></td>
        <td>
        <input type="submit" value="Cập nhập" />
    </form>
    	</td>
    </tr>
   <tr>
    	<td></td>
		<td>
     <form action="" method="post" class="aligned">
        <input type="submit" value="Trở lại" />
    </form>
    	</td>
   </tr>
    </table>
    </div>
</div>
<?php include '../view/footer.php'; ?>
