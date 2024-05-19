<?php

include_once('actions/item.php');

function output_product_info($info) { 
?>
<div class="product-delete">
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

function output_user_info($info) { 
    ?>
    <div class="user-delete">
        <div class="user-info">
            <p>Username: <?php echo $info['username']; ?></p>
            <p>Email: <?php echo $info['email']; ?></p>
            <p>Name: <?php echo $info['name']; ?></p>
        </div>
        <!-- Delete icon -->
        <div class="delete-icon">
            <button data-id="<?php echo $info['id'] ?>"><img src="./assets/delete.png" alt="Delete"></button>
        </div>
        <div class="promote">
            <button data-id="<?php echo $info['id'] ?>"><p>Promote to Admin</p></button>
        </div>
    </div>
    <?php } 
?>