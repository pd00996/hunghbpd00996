
<div id="content">


    <!-- display products -->
    
    <?php foreach ($products as $product) :
        // Get product data
        $list_price = $product['giasanpham'];
        $discount_percent = $product['phantramgiamgia'];
        $description = $product['motasanpham'];
        
        // Calculate unit price
         $discount_amount = round($list_price * ($discount_percent / 100.0), 2);
        $unit_price = $list_price ;

        // Get first paragraph of description
        $description = add_tags($description);
        $i = strpos($description, "</p>");
        $description = substr($description, 3, $i);
    ?>
    <table style="float:left; margin-right:20px; margin-left:10px; text-align:center">
        <tr >
            <td id="product_image_column" height="120px" width="145px" style="text-align:center; margin-left:30px;" >
               <img src="images/<?php echo $product['masanpham']; ?>_s.png"
                     alt="&nbsp;">
            </td>
            </tr>
            <tr>
            <td>
                <p>
                    <h3><a href="catalog?product_id=<?php echo
                           $product['idsanpham']; ?>">
                        <?php echo $product['tensanpham']; ?>
                        
                    </a></h3>
                    
                </p>
                <p>
                    <b>Giá:</b>
                    $<?php echo number_format($unit_price, 0); ?>
                </p>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
    
</div>
