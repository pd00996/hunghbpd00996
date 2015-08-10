<style>
body {color:#FFF;}
</style>
<?php include 'view/header_admin.php'; ?>
<div id="content">
<div  class="content_text">
    <div class="content_tab"><b>Quản lý tài khoản</b></div>

    <?php if (isset($_SESSION['admin'])) : ?>
    <h2>Tải khoản của bạn</h2>
    <p><?php echo $name_admin . ' (' . $email . ')'; ?></p>
    <form action="" method="post">
        <input type="hidden" name="action" value="view_edit" />
        <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" />
        <input type="submit" value="Sửa" />
    </form>
    <?php endif; ?>
    <?php if ( count($admins) > 1 ) : ?>
        <h2>Các tài khoản khác</h2>
        <table cellpadding="3px">
        <?php foreach($admins as $admin):
            if ( $admin['idadmin'] != $admin_id ) :
                ?>
                <tr>
                    <td><?php echo $admin['lastName'] . ', ' .
                               $admin['firstName']; ?>
                    </td>
                    <td>
                        <form action="" method="post" class="inline">
                            <input type="hidden" name="action"
                                value="view_edit" />
                            <input type="hidden" name="admin_id"
                                value="<?php echo $admin['idadmin']; ?>" />
                            <input type="submit" value="Sửa" />
                        </form>
                        </td>
                        <td>
                        <form action="" method="post" class="inline">
                            <input type="hidden" name="action"
                                value="view_delete_confirm" />
                            <input type="hidden" name="admin_id"
                                value="<?php echo $admin['idadmin']; ?>" />
                            <input type="submit" value="Xóa" />
                        </form>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <h2>Thêm tài khoản mới</h2>
    <table cellpadding="3px">
    <form action="" method="post" id="add_admin_user_form">
        <tr>
        <td>
        <input type="hidden" name="action" value="create" />
        <label for="email">E-Mail:</label>
        <td>
        <input type="text" name="email"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['email']:''; ?>" />
        </td>
        </tr>
        <tr>
        <td>
        <label for="first_name">Họ:</label></td>
         <td>
        <input type="text" name="first_name"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['first_name']:''; ?>" />
        </td>
        </tr>
        <tr>
        <td>
        <label for="last_name">Tên:</label></td>
         <td>
        <input type="text" name="last_name"
               value="<?php echo isset($_SESSION['form_data'])?$_SESSION['form_data']['last_name']:''; ?>" />
        </td>
        </tr>
         <tr>
        <td>
        <label for="password_1">Password:</label></td>
         <td>
        <input type="password" name="password_1" />
        <?php echo isset($password_message)?$password_message:''; ?>
        </td>
        </tr>
         <tr>
        <td>
        <label for="password_2">Retype password:</label></td>
         <td>
        <input type="password" name="password_2" />
        </td>
        </tr>
        <tr>
        <td>
     	</td>
        <td>
        <input type="submit" value="Thêm" />
        </td>
        </tr>
    </form>
    </table>
     <a href="<?php echo $home; ?>"><input type="submit" value="Trở về" /></a>
    </div>
</div>
<?php
if (isset($_SESSION['form_data'])) {
    unset($_SESSION['form_data']);
}
?>
<?php include 'view/footer.php'; ?>