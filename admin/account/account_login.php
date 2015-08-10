<style>
body {color:#FFF;}
</style>
<?php include 'view/header_admin.php'; ?>
<div  class="login">
    	<div class="content_login"><b>ĐĂNG NHẬP</b></div>
        <div class="lh_new">
        <h2 style="text-align:center">Đăng nhập</h2>
    <form action="" method="post" id="login_form">
	<table align="center" cellpadding="3px" >
		<tr>
			<td width="120" align="right">E-Mail: </td>
			<td>
            	<input type="hidden" name="action" value="login" />
				<input type="text" name="email" />
            </td>
        </tr>
        <tr>
        	<td width="120" align="right">Password: </td>
			<td>
				 <input type="password" name="password" />
            </td>
        </tr>
        <tr>
			<td width="100" align="right" valign="top"></td>
			<td>
				<input type="submit" value="Login" />
				<input type="reset" value="Nhập lại"/>				
												
			</td>
		</tr>
		
	</table>
    </form>
    </div>
</div>
<?php include 'view/footer.php'; ?>