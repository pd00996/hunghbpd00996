<?php include '../../view/header_admin.php'; ?>
<div id="content">
<div  class="content_text">
    <div class="content_tab"><b>Quản lý sản phẩm</b></div>
    <?php
    if (isset($product_id)) {
        $heading_text = 'Cập nhập sản phẩm';
    } else {
        $heading_text = 'Thêm sản phẩm mới';
    }
    ?>
    <h1 style="text-align:center"><?php echo $heading_text; ?></h1>
    <form action="index.php" method="POST" id="add_product_form">
        <?php if (isset($product_id) && $product_id >0) : ?>
            <input type="hidden" name="action" value="update_product" />
            <input type="hidden" name="product_id"
                   value="<?php echo $product_id; ?>" />
        <?php else: ?>
            <input type="hidden" name="action" value="add_product" />
        <?php endif; ?>
            <input type="hidden" name="category_id"
                   value="<?php echo $product['idloaisanpham']; ?>" />
	<table align="center" cellpadding="3px">
      <tr>
        <td>
        <label>Loại sản phẩm:</label>
        </td>
        <td>
        <select name="category_id">
        <?php foreach ($categories as $category) : 
            if ($category['categoryID'] == $product['idloaisanpham']) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
        ?>
            <option value="<?php echo $category['idloaisanpham']; ?>"<?php
                      echo $selected ?>>
                <?php echo $category['tenloaisanpham']; ?>
            </option>
        <?php endforeach; ?>
        </select>
       	</td>
	</tr>
    <tr>
    	<td>
        <label>Mã sản phẩm:</label>
        </td>
        <td>
        <input type="input" name="code"
               value="<?php echo $product['masanpham']; ?>" />
        </td>
	</tr>
    <tr>
    	<td>
        <label>Tên sản phẩm:</label>
        </td>
        <td>
        <input type="input" name="name" 
               value="<?php echo $product['tensanpham']; ?>" size="50" />
        </td>
	</tr>
    <tr>
    	<td>
        <label>Giá sản phẩm:</label>
        </td>
        <td>
        <input type="input" name="price" 
               value="<?php echo $product['giasanpham']; ?>" />
        </td>
	</tr>
    <tr>
    	<td>
        <label>Giảm giá:</label>
        </td>
        <td>
        <input type="input" name="discount_percent" 
               value="<?php echo $product['phantramgiamgia']; ?>" />
        </td>
	</tr>
    <tr>
    	<td>
        <label>Mô tả sản phẩm:</label>
        </td>
        <td>
        <textarea name="description" rows="10"
                  cols="50"><?php echo $product['motasanpham']; ?></textarea>
        </td>
	</tr>
    <tr>
    	<td></td>
        <td>
        <input type="submit" value="Cập nhập" />
        </td>
   </tr>
    </form>
   <tr>
   		<td></td>
   		<td>
		<form action="../product" method="post" >
        <input type="submit" value="Trở về" />
 		</form>
        </td>
    </tr>    
 </table>
</div>
<?php include '../../view/footer.php'; ?>