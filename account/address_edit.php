<?php include '../view/header.php'; ?>
<div id="content">
<div  class="content_text">
    <div class="content_tab"><b>Thông tin tài khoản</b></div>
    <h1 class="top" align="center"><?php echo $heading; ?></h1>
    <table align="center" cellpadding="3px">
    <form action="" method="post" id="edit_address_form">
        <input type="hidden" name="action" value="update_address" />
        <?php if ($billing) : ?>
            <input type="hidden" name="address_type" value="billing" />
        <?php else: ?>
            <input type="hidden" name="address_type" value="shipping" />
        <?php endif; ?>
        <tr>
        <td>
        <label for="line1">Địa chỉ:</label>
        </td>
        <td>
        <input type="text" name="line1" value="<?php echo $line1; ?>" />
        </td>
    </tr>
    <tr>
    	<td>
        <label hidden="" for="line2">Line 2:</label>
        </td>
        <td>
        <input hidden="" type="text" name="line2" value="<?php echo $line2; ?>" />
        </td>
	</tr>
    <tr>
    	<td>
        <label for="city">Thành phố:</label>
        </td>
        <td>
        <input type="text" name="city" value="<?php echo $city; ?>" />
        </td>
    </tr>
    <tr>
    	<td>    
        <label for="state">Mã Quận / Huyện:</label>
        </td>
        <td>
        <input type="text" name="state" value="<?php echo $state; ?>" />
        </td>
    </tr>
    <tr>
    	<td>    
        <label for="zip">Mã vùng:</label>
        </td>
        <td>
        <input type="text" name="zip" value="<?php echo $zip; ?>" />
        </td>
    </tr>
    <tr>    
        <td>	
        <label for="phone">Số điện thoại:</label>
        </td>
        <td>
        <input type="text" name="phone" value="<?php echo $phone; ?>" />
        </td>
    </tr>
    <tr>
    	<td></td>
        <td>
        <input type="submit" value="<?php echo $heading; ?>" />
        </td>
    </tr>
    <tr>
    	<td></td>
        <td>    
        <form action="" method="post">
            <input type="submit" value="Trở về" />
        </form>
    </form>
    	</td>
    </tr>
    </table>
    </div>
    
</div>
<?php include '../view/footer.php'; ?>
