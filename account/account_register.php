<?php include '../view/header.php'; ?>
<div id="content">
<div  class="content_text">
    <div class="content_tab"><b>Đăng ký thành viên</b></div>
    <table cellpadding="3px" align="center">
    <tr>
    	<td></td>
    	<form action="" method="post" id="register_form">
        <td>
        <h2>Thông tin tài khoản</h2>
        </td>
    </tr>
    <tr>
    	<td>
        <input type="hidden" name="action" value="register" />
        <label>E-Mail:</label>
        </td>
        <td>
        <input type="text" name="email"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['email']:''; ?>"
               size="30" />
        </td>
	<tr>
    </tr>
    	<td>
        <label>Password:</label>
        </td>
        <td>
        <input type="password" name="password_1" size="30" />
        <?php echo  isset($password_message)?$password_message:''; ?>
        </td>
	</tr>
    <tr>
    	<td>
        <label for="password_2">Retype Password:</label>
        </td>
        <td>
        <input type="password" name="password_2" size="30" />
        </td>
	</tr>
    <tr>
    	<td>
        <label for="first_name">Họ:</label>
        </td>
        <td>
        <input type="text" name="first_name"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['first_name']:''; ?>" 
               size="30" />
        </td>
	</tr>
    <tr>
    	<td>
        <label for="last_name">Tên:</label>
        </td>
        <td>
        <input type="text" name="last_name"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['last_name']:''; ?>"
               size="30" />
        </td>
	</tr>
    <tr>
    <td></td>
    </tr>
     <tr>
     <td></td>
     </tr>
    <tr>
    	<td></td>
        <td>
        <h2>Địa chỉ giao hàng</h2>
        </td>
    </tr>
    <tr>
    	<td>
        <label for="ship_line1">Địa chỉ:</label>
        </td>
        <td>
        <input type="text" name="ship_line1"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['ship_line1']:''; ?>"
               size="30" />
		</td>
    </tr>
    <tr>
    	<td>
        <label hidden="" for="ship_line2">Line 2:</label>
        </td>
        <td>
        <input hidden="" type="text" name="ship_line2"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['ship_line2']:''; ?>"
               size="30" />
        </td>
	</tr>
    <tr>
    	<td>
        <label for="ship_city">Thành phố:</label>
        </td>
        <td>
        <input type="text" name="ship_city"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['ship_city']:''; ?>"
               size="30" />
        </td>
	</tr>
    <tr>
    	<td>
        <label for="ship_state">Quận / Huyện:</label>
        </td>
        <td>	
        <input type="text" name="ship_state"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['ship_state']:''; ?>"
               size="30" />
        </td>
	</tr>
    <tr>
    	<td>
        <label for="ship_zip">Mã vùng:</label>
        </td>
        <td>
        <input type="text" name="ship_zip"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['ship_zip']:''; ?>"
               size="30" />
        </td>
	</tr>
    <tr>
    	<td>
        <label for="ship_phone">Số điện thoại:</label>
        </td>
        <td>
        <input type="text" name="ship_phone"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['ship_phone']:''; ?>"
               size="30" />
        </td>
	</tr>
     <tr>
    <td></td>
    </tr>
     <tr>
     <td></td>
     </tr>
    <tr>
    	<td></td>
        <td>
        <h2>Địa chỉ thanh toán</h2>
        </td>
   </tr>
    <tr>
    	<td></td>
        <td>     
        <input type="checkbox" name="use_shipping"
               <?php if (isset($_SESSION['form_data'])?$_SESSION['form_data']['use_shipping']: false) : ?>
                   checked="checked"
               <?php endif; ?>
               size="30" />
        Sử dụng địa chỉ giao hàng
        </td>
	</tr>
    <tr>
    	<td>
        <label for="bill_line1">Địa chỉ:</label>
        </td>
        <td>
        <input type="text" name="bill_line1"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['bill_line1']:''; ?>"
               size="30" />
		</td>
	</tr>
    <tr>
    	<td>
        <label hidden="" for="bill_line2">Địa chỉ:</label>
        </td>
        <td>
        <input  hidden="" type="text" name="bill_line2"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['bill_line2']:''; ?>"
               size="30" />
        </td>
	</tr>
    <tr>
    	<td>
        <label for="bill_city">Thành phố:</label>
        </td>
        <td>
        <input type="text" name="bill_city"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['bill_city']:''; ?>"
               size="30" />
        </td>
	</tr>
    <tr>
    	<td>
        <label for="bill_state">Quận / Huyện:</label>
        </td>
        <td>
        <input type="text" name="bill_state"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['bill_state']:''; ?>"
               size="30" />
        </td>
	</tr>
    <tr>
    	<td>
        <label for="bill_zip">Mã vùng:</label>
        </td>
        <td>
        <input type="text" name="bill_zip"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['bill_zip']:''; ?>"
               size="30" />
        </td>
	</tr>
    <tr>
    	<td>
        <label for="bill_phone">Số điện thoại:</label>
        </td>
        <td>
        <input type="text" name="bill_phone"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['bill_phone']:''; ?>"
               size="30" />
        </td>
	</tr>
    <tr>
    	<td></td>
        <td>
        <input type="submit" value="Đăng ký" />&nbsp;<input type="reset" value="Nhập lại" />
    </form>
    	</td>
     </tr>
    </table><br />
</div>
<?php
if (isset($_SESSION['form_data'])) {
    unset($_SESSION['form_data']);
}
?>
<?php include '../view/footer.php'; ?>