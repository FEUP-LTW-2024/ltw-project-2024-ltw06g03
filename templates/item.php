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
            </div>
            <div id="item-specifics" class="outer-box-format background-color-very-dark-green">
                <h1 id="item-name">
                    <?php
                    echo $info['title'];
                    ?>
                </h1>
                <h2 id="item-category">
                    <?php
                    echo get_category($info['category_id']);
                    ?>
                </h2>

                <h2 id="item-brand">
                    <?php
                    echo $info['brand'];
                    ?>
                </h2>
                <h3 id="item-model">
                    <?php
                    echo $info['model'];
                    ?>
                </h3>
                <h3 id="item-condition">
                    <?php
                    echo $info['condition'];
                    ?>
                </h3>
                <h2 id="price">
                    <?php
                    echo (string) $info['price'] . '€';
                    ?>
                </h2>
                <p id="description">
                    <?php
                    echo $info['description'];
                    ?>
                </p>
            </div>
        </div>
    </main>
<?php }
?>