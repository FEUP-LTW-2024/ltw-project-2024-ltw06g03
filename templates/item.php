<?php
include_once("actions/utils.php");
function output_item(array $info) { ?>
    <main>
        <div id="image">
            <img src="user_images/1.jpeg" alt="Item Photograph">
        </div>
        <div id="item-info">
            <div id="seller_info">
                <h1 id="seller-name">
                    <?php
                    echo get_seller_name($info['seller_id']);
                    ?>
                </h1>
            </div>
            <h1 id="item-category">
                <?php
                echo get_category($info['category_id']);
                ?>
            </h1>
            <h1 id="item-brand">
                <?php
                echo $info['brand'];
                ?>
            </h1>
            <h1 id="item-model">
                <?php
                echo $info['model'];
                ?>
            </h1>
            <h1 id="item-condition">
                <?php
                echo $info['condition'];
                ?>
            </h1>
            <h1 id="price">
                <?php
                echo (string)$info['price'] . '€';
                ?>
            </h1>
        </div>
        <div id="description">
            <?php
            echo $info['description'];
            ?>
        </div>
    </main>
<?php }
?>