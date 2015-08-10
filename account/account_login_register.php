<?php include '../view/header.php'; ?>
<div id="content">
<div  class="content_text">
    <div class="content_tab"><b>Đăng nhập</b></div>
    <table align="center" cellpadding="3px">
    <tr>
    <td></td>
    <td><h1>Đăng nhập</h1></td>
    </tr>
    <tr>
    <form action="" method="post" id="login_form">
        <input type="hidden" name="action" value="login" />
	<td>
        <label>E-Mail:</label>
    </td>
    <td>    
        <input type="text" name="email" size="30" />
    </td>
    <tr>
<td>
        <label>Password:</label>
        </td>
    <td> 
        <input type="password" name="password" size="30" />
       </td>
</tr>
<tr>
    <td><input type="submit" value="Đăng nhập" />
        </td>
        <td></form><br />
        <form action="" method="post">
        <input type="hidden" name="action" value="view_register" />
        <input type="submit" value="Đăng ký" />
    </form>
        </td>

        </tr>
    


    </table>
    </div>
</div>
<?php include '../view/footer.php'; ?>
