<?php

include_once('../actions/item.php');

function output_product_info($info) { 
?>
<div class="product-delete">
    <!-- Product information -->
    <div class="product-info">
        <p>Title: <?php echo $info['title'] ?></p>
        <p>Price: <?php echo $info['price'] ?>€</p>
    </div>
    <!-- Delete icon -->
    <div class="delete-icon">
        <button product-id="<?php echo $info['id'] ?>"><img src="./assets/delete.png" alt="Delete"></button>
    </div>
</div>

<?php } 
?>