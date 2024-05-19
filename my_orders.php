<?php
include_once("templates/head.php");
include_once("templates/header.php");
include_once("templates/footer.php");
include_once("database/connect.php");
include_once("templates/footer.php");
include_once("actions/utils.php");
include_once("templates/product_info.php");


output_head("Smooth As Silk");
session_start();
?>
<body>
    <?php 
    if ($_SESSION['logged_in'] === true) {
        output_logged_in_header();
    } else {
        output_header(); 
    } ?>

    <section id="seller-items-page" class="page">
        <div class = "admin-box scroll bmargin">
            <h2>My selling orders</h2>
            <?php
            $seller_id = get_buyer_id(get_id_from_email($_SESSION['user_email']));
            if ($seller_id) {
                $items = get_my_selling_orders($seller_id);
            }
            foreach ($items as $item) {
                output_selling_order_info($item);
            }
            ?>
        </div>

        <div class = "admin-box scroll bmargin">
            <h2>My buying orders</h2>
            <?php
            $buyer_id = get_buyer_id(get_id_from_email($_SESSION['user_email']));
            if ($buyer_id)
            {$items = get_my_buying_orders($buyer_id);}
            foreach ($items as $item) {
                output_buying_order_info($item);
            }
            ?>
        </div>
    </section>

    <?php output_footer('my_orders'); ?>

</body>