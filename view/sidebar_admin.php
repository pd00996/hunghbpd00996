<div id="sidebar">
<div id="seach">
<?php
        // Check if user is logged in and
        // display appropriate account links
        $account_url = $app_path . 'admin/account';
        $logout_url = $account_url . '?action=logout';
        if (isset($_SESSION['admin'])) :
        ?>
           <a href="<?php echo $app_path; ?>admin">Quản trị</a>  |  <a href="<?php echo $logout_url; ?>">Đăng xuất</a>
        <?php else: ?>
        <a href="<?php echo $account_url; ?>">Đăng nhập</a>
        <?php endif; ?></div>
 
        
       
    

</div>
