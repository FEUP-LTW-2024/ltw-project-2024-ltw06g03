<?php
function output_cart_item(string $item_id) {?>
     <div class = "cartItem">
        <div class = "cartItemImg">
            <img class src = "./assets/shopping-cart.png" alt = "item">
        </div>
        <div class = "cartItemName">
            Product Name
        </div>
        <div class = "cartItemPrice">
            0.00
        </div>
        <div class = "cartItemQuantity">
            <span class = "less">-</span>
            <span>1</span>
            <span class = "more">+</span>
        </div>
    </div>
<?php }

?>