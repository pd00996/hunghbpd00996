<?php include 'view/header_admin.php';
 ?>
<div id="content">
<div  class="content_text">
    <div class="content_tab"><b>QUẢN LÝ SẢN PHẨM</b></div>
    <h3>Danh sách loại sản phẩm</h3>
    <table id="category_table">
        <?php foreach ($categories as $category) : ?>
        <tr>
            <form action="" method="post" >
            <td>
                 <input type="text" name="name"
                        value="<?php echo $category['tenloaisanpham']; ?>" />
            </td>
            <td>
                <input type="hidden" name="action" value="update_category" />
                <input type="hidden" name="category_id"
                       value="<?php echo $category['idloaisanpham']; ?>"/>
                <input type="submit" value="Update"/>
            </td>
            </form>
            <td>
                
                <form action="" method="post" >
                    <input type="hidden" name="action" value="delete_category" />
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['idloaisanpham']; ?>" />
                    <input type="submit" value="Delete" />
                </form>
                
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Thêm mới</h3>
    <form action="" method="post" id="add_category_form" >
        <input type="hidden" name="action" value="add_category" />
        <input type="input" name="name" />
        <input type="submit" value="Thêm"/>
    </form><br />
      <a href="<?php echo $home; ?>"><input type="submit" value="Trở về" /></a>
    </div>
</div>
<?php include 'view/footer.php'; ?>