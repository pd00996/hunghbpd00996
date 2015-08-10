<div id="sidebar">
<div id="seach">

            <?php
            // Check if user is logged in and
            // display appropriate account links
            $account_url = $app_path . 'account';
            $logout_url = $account_url . '?action=logout';
            if (isset($_SESSION['user'])) :
            ?>
				<a href="<?php echo $account_url; ?>">Thông tin tài khoản</a>
               | <a href="<?php echo $logout_url; ?>">Đăng xuất</a>
            <?php else: ?>
                <a href="<?php echo $account_url; ?>">Đăng nhập</a>
            <?php endif; ?>
        
        
     
        <!-- display links for all categories -->
        <?php
            require_once('model/database.php');
            require_once('model/category_db.php');
            
           
        ?>
      
 
      

    
        
    </ul>
    </div>
</div>