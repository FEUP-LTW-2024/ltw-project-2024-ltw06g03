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
            <h2>My items</h2>
            <?php
            $seller_id = get_seller_id(get_id_from_email($_SESSION['user_email']));
            $items = get_selling_items($seller_id);
            foreach ($items as $item) {
                output_product_info($item);
            }
            ?>
        </div>
    </section>

    <?php output_footer('seller-items'); ?>

    <script>
        const buttons = document.querySelectorAll('.delete-icon button');

        buttons.forEach(button => {
            button.addEventListener('click', (event) => {
                const id = event.target.closest('button').dataset.id;

                const formData = new FormData();

                formData.append('id', id);

                fetch('actions/delete_item.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'success') {
                        alert('Item deleted!');
                        window.location.href = 'seller-items.php';
                    } else {
                        alert('Failed to delete item: ' + data);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating the profile.');
                });
            })
        });
    </script>

</body>