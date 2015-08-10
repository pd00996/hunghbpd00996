<?php
    // Parse data
    $category_id = $product['idsanpham'];
    $product_code = $product['masanpham'];
    $product_name = $product['tensanpham'];
    $description = $product['motasanpham'];
    $list_price = $product['giasanpham'];
    $discount_percent = $product['phantramgiamgia'];

    // Add HMTL tags to the description
    $description = add_tags($description);

    // Calculate discounts
    $discount_amount = round($list_price * ($discount_percent / 100));
    $unit_price = $list_price - $discount_amount;

    // Format discounts
    $discount_percent = number_format($discount_percent);
    $discount_amount = number_format($discount_amount);
    $unit_price = number_format($unit_price);

    // Get image URL and alternate text
    $image_filename = $product_code . '_m.png';
    $image_path = $app_path . 'images/' . $image_filename;
    $image_alt = 'Image filename: ' . $image_filename;
?>
<div  class="content_sp">
    <div class="content_tab"><b>Thông tin sản phẩm</b></div>
<h2><?php echo $product_name; ?></h2>
<div id="left_column">
    <p><img src="<?php echo $image_path; ?>"
            alt="<?php echo $image_alt; ?>" /></p>
</div>

<div id="right_column">
    <p><b>Giá sản phẩm:</b>
        <?php echo  $list_price; ?></p>
    <p><b>Giảm giá:</b>
        <?php echo $discount_percent . '%'; ?></p>
    <p><b>Giá:</b>
        <?php echo  $unit_price; ?>
        (Giảm: 
        <?php echo  $discount_amount; ?>)</p>
    <form action="<?php echo $app_path . 'cart' ?>" method="get" id="add_to_cart_form">
        <input type="hidden" name="action" value="add" />
        <input type="hidden" name="product_id"
               value="<?php echo $product_id; ?>" />
        <b>Số lượng:</b>&nbsp;
        <input type="text" name="quantity" value="1" size="2" />
        <input type="submit" value="Thêm vào giỏ hàng" />
    </form>
    <h2>Mô tả sản phẩm</h2>
    <?php echo $description; ?>
</div>