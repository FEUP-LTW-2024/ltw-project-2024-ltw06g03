<?php
include_once('../actions/utils.php');

function get_item_info_(int $id) : array {
    $db = getDatabaseConnection("database/database.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare('SELECT * FROM items WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    return $res;
}

function output_cart_item(int $item_id, int $quantity) {
    $info = get_item_info_($item_id);
    ?>
    <div class = "cartItem">
        <div class = "cartItemImg">
            <img src="" alt = "item">
        </div>
        <div class = "cartItemName">
            <?php echo $info['title']; ?>
        </div>
        <div class = "cartItemPrice">
        <?php echo $info['price']; ?>
        </div>
        <div class = "cartItemQuantity">
            <button class="less" data-item-id="<?php echo $item_id ?>">-</button>
            <span><?php echo $quantity ?></span>
            <button class="more" data-item-id="<?php echo $item_id ?>">+</button>
        </div>
    </div>
<?php }

?>
