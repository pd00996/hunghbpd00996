<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Email Form</title>
</head>
<body>
	<h1 align="center">Gửi ý kiến phản hồi</h1>
    <table align="center" cellpadding="3px">
    <form action="." method="post" id="email_form">
    <tr>
    	<td>
        <input type="hidden" name="action" value="send_email"/>
        <label>Email:</label>
        </td>
        <td>
        <input size="34" type="text" name="from"/><br />
        </td>
    </tr>
    <tr>
    	<td>
        <label>Gửi đến:</label>
        </td>
        <td>
        <input size="34" type="text" name="to" /><br />
        </td>
    </tr>
    <tr>
    	<td>    
        <label>Vấn đề:</label>
        </td>
        <td>
        <input size="34" type="text" name="subject" /><br />
        </td>
    </tr>
    <tr>
    	<td>    
        <label>Nội dung:</label>
        </td>
        <td>
        <textarea rows="10" cols="30" name="message"></textarea><br />
        </td>
    </tr>
    <tr>
    	<td></td>
        <td>
        <input type="submit" value="Gửi" />
    </form>
    	</td>
    </tr>
    <tr>
    	<td></td>
        <td>
        <a href="<?php echo $app_path; ?>"><input type="submit" value="Trở về"></a>
        </td>
    </tr>
    </table>
    
    <h2><?= isset($msg)?$msg:'' ?></h2>
</body>
</html>