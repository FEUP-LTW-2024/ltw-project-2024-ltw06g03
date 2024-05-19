<?php
include_once('../actions/utils.php');

session_start();

function get_item_info_c(int $id) : array {
    $db = getDatabaseConnection("database/database.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare('SELECT * FROM items WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    return $res;
}

function output_checkout_item(int $id, int $quantity) { 
    $info = get_item_info_c($id);
    ?>

    <div class="checkout-item">
        <div class="checkout-item-img ">
            <img src="./assets/shopping-cart.png" alt="item">
        </div>
        <div class="checkout-item-name">
            <?php echo $info['title']; ?>
        </div>
        <div class="checkout-item-price">
        <?php echo $info['price']; ?>€
        </div>
        <div class="checkout-item-quantity">
            <span class="less">-</span>
            <span><?php echo $quantity ?></span>
            <span class="more">+</span>
        </div>
    </div>
<?php }

function output_total_price() {
    $sum = 0;
    foreach ($_SESSION['cart'] as $item) {
        $info = get_item_info_c($item['id']);
        $sum += $info['price'] * $item['quantity'];
    }
    echo $sum;
}
?>