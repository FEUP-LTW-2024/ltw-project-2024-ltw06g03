<?php
include_once("actions/utils.php");
function output_item(array $info) { ?>
    <main>
        <div id="image">
            <img src="<?php echo get_photo_path($info['id']) ?>" alt="Item Photograph">
        </div>
        <div id="item-info">
            <div id="seller_info">
                <h1 id="seller-name">
                    <?php
                    echo get_seller_name($info['seller_id']);
                    ?>
                </h1>
                <h2 id="seller-username">
                    <?php
                    echo get_seller_username($info['seller_id']);
                    ?>
                </h2>
            </div>
            <h1 id="item-name">
                <?php
                echo $info['title'];
                ?>
            </h1>
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
        <p id="description">
            <?php
            echo $info['description'];
            ?>
        </p>
    </main>
<?php }
?>