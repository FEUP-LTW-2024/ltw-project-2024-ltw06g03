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
        <div class = "admin-box scroll">
            <h2>My Wishlist</h2>
            <?php
            $id = get_id_from_email($_SESSION['user_email']);
            $items = get_wishlist_items($id);
            foreach ($items as $item) {
                output_wishlist_info($item);
            }
            ?>
        </div>
    </section>

    <?php output_footer('seller-items'); ?>
</body>