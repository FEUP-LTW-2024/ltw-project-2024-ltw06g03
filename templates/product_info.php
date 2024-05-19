<?php

include_once('actions/item.php');

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
        <button data-id="<?php echo $info['id'] ?>"><img src="./assets/delete.png" alt="Delete"></button>
    </div>
</div>
<?php } 

function output_selling_order_info($info) { 
    $item_info = get_item_info($info['item_id']);
    $buyer_user_id = get_user_id_from_buyer($info['buyer_id']);

    ?>
    <div class="product-delete">
        <!-- Product information -->
        <div class="product-info">
            <a href="item.php?id=<?php echo $item_info['id']; ?>">
            <p>Title: <?php echo $item_info['title'] ?></p>
            <p>Quantity: <?php echo $info['quantity'] ?></p>
            <p>Total Price: <?php echo $info['quantity'] * $item_info['price'] ?>€</p>
            <p>Buyer: <?php echo get_seller_username($buyer_user_id) ?></p>
            </a>
        </div>
        <div class="delete-icon">
            <a href="print_form.php?details=<?php echo $info['shipping_details']; ?>"><button data-id="<?php echo $info['id'] ?>">Print Form</button></a>
        </div>
    </div>
    
    <?php } 

function output_buying_order_info($info) { 
    $item_info = get_item_info($info['item_id']);    
    ?>
    <div class="product-delete">
        <!-- Product information -->
        <div class="product-info">
            <a href="item.php?id=<?php echo $item_info['id']; ?>">
            <p>Title: <?php echo $item_info['title'] ?></p>
            <p>Quantity: <?php echo $info['quantity'] ?></p>
            <p>Total Price: <?php echo $info['quantity'] * $item_info['price'] ?>€</p>
            </a>
        </div>
    </div>
    
<?php }

function output_wishlist_info($info) { 
    ?>
    <a href="item.php?id=<?php echo $info['id'] ?>">
    <div class="product-delete">
        <!-- Product information -->
        <div class="product-info">
            <p>Title: <?php echo $info['title'] ?></p>
            <p>Price: <?php echo $info['price'] ?>€</p>
        </div>
    </div>
    </a>
    <?php }
?>