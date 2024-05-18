<?php
include_once ("actions/utils.php");
function output_item(array $info)
{ ?>
    <main id="item-main">
        <div id="item-image" class="outer-box-format background-color-very-dark-green">
            <div class="iner-box-format background-color-dark-green"><img src="<?php echo get_photo_path($info['id']) ?>" alt="Item Photograph"></div>
            <button class="iner-box-format background-color-dark-green"><img src="./assets/heartempty.png" alt=""><h5>Add to Wishlist</h5></button>
            <button class="iner-box-format background-color-dark-green"><img src="./assets/shopping-cart.png" alt=""><h5>Add to Cart</h5></button>
        </div>
        <div id="item-info">
            <div id="seller-info" class="outer-box-format background-color-very-dark-green text-beige">
                <img class="iner-box-format background-color-dark-green" src="<?php
                $v = pfp_exists($_SESSION['user_email']);
                if ($v) {
                    echo $v;
                } else {
                    echo './assets/user_profile.png';
                }
                ?>" alt="" id="">
                <div class="iner-box-format background-color-dark-green">
                    <h2 id="seller-name">
                        <?php
                        echo get_seller_name($info['seller_id']);
                        ?>
                    </h2>
                    <h3 id="seller-username">
                        <?php
                        echo get_seller_username($info['seller_id']);
                        ?>
                    </h3>
                </div>
            </div>
            <div id="item-specifics" class="outer-box-format background-color-very-dark-green">
                <h2 id="item-name" class="iner-box-format background-color-dark-green">
                    <?php
                    echo $info['title'];
                    ?>
                </h2>
                <h3 id="item-category" class="iner-box-format background-color-dark-green">
                    <?php
                    echo get_category($info['category_id']);
                    ?>
                </h3>

                <h3 id="item-brand" class="iner-box-format background-color-dark-green">
                    <?php
                    echo $info['brand'];
                    ?>
                </h3>
                <h4 id="item-model" class="iner-box-format background-color-dark-green">
                    <?php
                    echo $info['model'];
                    ?>
                </h4>
                <h4 id="item-condition" class="iner-box-format background-color-dark-green">
                    <?php
                    echo $info['condition'];
                    ?>
                </h4>
                <h3 id="price" class="iner-box-format background-color-dark-green">
                    <?php
                    echo (string) $info['price'] . '€';
                    ?>
                </h3>
                <p id="description" class="iner-box-format background-color-dark-green">
                    <?php
                    echo $info['description'];
                    ?>
                </p>
            </div>
        </div>
    </main>
<?php }
?>