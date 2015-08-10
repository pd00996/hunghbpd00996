<?php include '../view/header.php'; ?>
<div id="content">
<div  class="content_text">
    <div class="content_tab"><b>Giỏ hàng</b></div>
    <h2>Địa chỉ thanh toán</h2>
    <p>Địa chỉ: <?php echo $bill_line1; ?><br />
        <?php if ( strlen($bill_line2) > 0 ) : ?><br />
            <?php echo $bill_line2; ?><br />
        <?php endif; ?>
       Thành phố: <?php echo $bill_city; ?><br />
       Quận huyện: <?php echo $bill_state; ?><br />
        Mã vùng: <?php echo $bill_zip; ?><br />
        Số điện thoại: <?php echo $bill_phone; ?>
    </p>
    <form action="../account" method="post">
        <input type="hidden" name="action" value="edit_billing" />
        <input type="submit" value="Sửa địa chỉ thanh toán" />
    </form>
    <h2>Thông tin thanh toán</h2>
    <table cellpadding="3px">
    <tr>
    <form action="." method="post" id="payment_form">
        <input type="hidden" name="action" value="process" />
        <td>
        <label for="card_type">Loại thẻ:</label>
        </td>
        <td>
        <select name="card_type">
            <option value="1">MasterCard</option>
            <option value="2">Visa</option>
            <option value="3">Discover</option>
            <option value="4">American Express</option>
        </select>
        </td>
     </tr>
     <tr>
     	<td>
        <label for="card_number">Mã thẻ:</label>
        </td>
        <td>
        <input type="text" name="card_number" />
        &nbsp;&nbsp;(16 số )
        </td>
     </tr>
     <tr>
        <td>
        <label for="card_cvv">Mã bảo mật:</label>
        </td>
        <td>
        <input type="text" name="card_cvv" />
         &nbsp;&nbsp;(3 số )
        </td>
      </tr>
      <tr>
      	<td  
        <label for="card_expires">Hạn sử dụng:</label>
        </td>
        <td>
        <input type="text" name="card_expires" />&nbsp;&nbsp;(Tháng/Năm (02/2014) )
        </td>
      </tr>
      <tr>
      	<td></td>
      	<td>
        <input type="submit" value="Thanh toán" />&nbsp;&nbsp;
    	</td>
      </tr>
    </form>
    </table>
    <form action="../cart" method="post" >
        <input type="submit" value="Trở về" />
    </form>
    
</div>
<?php include '../view/footer.php'; ?>