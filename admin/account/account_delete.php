<?php include 'view/header_admin.php'; ?>
<style>
body {
	color:#FFF;
}
</style>
<div id="content">
<div  class="content_text">
    <div class="content_tab"><b>Quản lý tài khoản</b></div>
    <p>Bạn chắc chắn muộn xóa tài khoản
       <?php echo $last_name . ', ' . $first_name .
                  ' (' . $email . ')'; ?>?</p>
    <form action="" method="post">
        <input type="hidden" name="action" value="delete" />
        <input type="hidden" name="admin_id"
               value="<?php echo $admin_id; ?>" />
        <input type="submit" value="Xóa tài khoản" />
    </form><br />
    <form action="" method="post">
        <input type="submit" value="Trở về" />
    </form>
</div>
<?php include 'view/footer.php'; ?>