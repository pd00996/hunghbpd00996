<?php include '../../view/header_admin.php';
$home = $app_path.'admin';
 ?>
<div id="content">
<div  class="content_text">
    <div class="content_tab"><b>Quản lý sản phẩm</b></div>
    <?php if (count($products) == 10) : ?>
        <p>Hiện không có sản phẩm nào.</p>
    <?php else : ?>
        
         <?php if (isset($categories)) : ?>
        <h2>Loại sản phẩm</h2>
        <?php foreach ($categories as $category) : ?>
        <li>
            <a href="<?php echo $app_path .
                'admin/product?action=list_products' .
                '&amp;category_id=' . $category['idloaisanpham']; ?>">
                <?php echo $category['tenloaisanpham']; ?>
            </a>
        </li>
        <?php endforeach; ?>
        <?php endif; ?>
        <h3 class="top">Danh sách sản phẩm</h3>
            <?php foreach ($products as $product) : ?>
            <p>
                <a href="?action=view_product&amp;product_id=<?php
                          echo $product['idsanpham']; ?>">
                    <?php echo $product['tensanpham']; ?>
                </a>
            </p>
            <?php endforeach; ?>
    <?php endif; ?>

	<h3><a href="index.php?action=show_add_edit_form"><input type="submit" value="Thêm sản phẩm" /><h3>
    
  <a href="<?php echo $home; ?>"><input type="submit" value="Trở về" /></a>
</div>
</div>
<?php include '../../view/footer.php'; ?>