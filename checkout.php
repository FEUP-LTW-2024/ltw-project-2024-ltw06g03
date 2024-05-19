<?php
include_once("templates/head.php");
include_once("templates/header.php");
include_once("templates/footer.php");
include_once("templates/register_errors.php");
include_once("database/connect.php");
include_once("templates/checkout_item.php");

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
    <div class="checkout-page">

        <div class="checkout-information">
            <h1>CHECKOUT</h1>
            <?php
            foreach ($_SESSION['cart'] as $item) {
                output_checkout_item($item['id'], $item['quantity']);
            }
            ?>
            <div class="checkout-total">
                <p><?php
                output_total_price();
                ?>€</p>
            </div>
            <div class="checkout-actions">
                <button>Checkout</button>
            </div>
        </div>

        <div class="shipping">
            <h1>SHIPPING ADDRESS</h1>
            <form>
                    <input type="text" placeholder="First Name*" id="first-name">
                    <input type="text" placeholder="Last Name*" id="last-name">
                    <input type="text" placeholder="Address*" id="address">
                    <input type="text" placeholder="Apt, Suite" id='apt'>
                    <input type="text" placeholder="City" id='city'>
                    <input type="text" placeholder="Postal Code" id='p-code'>
            </form>
        </div>

        <div id="paymentModal" class="modal">
            <div class="modal-content">
                <span class="close-checkout-btn" onclick="closeModal()">&times;</span> 
                <h1>Payment Details</h1>
                <form id="paymentForm">
                    <input type="text" placeholder="Cardholder Name" required>
                    <input type="text" placeholder="Card Number" required>
                    <input type="text" placeholder="Expiration Date (MM/YY)" required>
                    <input type="text" placeholder="CVV" required>
                </form>
                <button>Pay Now</button>
            </div>
        </div>
    </div>
    <?php output_footer("EDU"); ?>

    <script>
        const modal = document.getElementById("paymentModal");
        const checkoutButton = document.querySelector('.checkout-actions button');
        const closeBtn = document.querySelector('.close-checkout-btn');
        const payNow = document.querySelector('.modal-content button');


        checkoutButton.addEventListener('click', function() {
            modal.style.display = "block";
        });

        closeBtn.addEventListener('click', closeModal);

        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }

        function closeModal() {
            modal.style.display = "none";
        }

        payNow.addEventListener('click', function() {
            const firstName = document.getElementById('first-name').value;
            const lastName = document.getElementById('last-name').value;
            const address = document.getElementById('address').value;
            const apt = document.getElementById('apt').value;
            const city = document.getElementById('city').value;
            const pCode = document.getElementById('p-code').value;

            const details = `${firstName} ${lastName}<br>${address} ${apt}<br>${city}, ${pCode}`

            const formData = new FormData();

            formData.append('details', details);

            console.log(formData);

            fetch('actions/checkout.php', {
                method: 'POST',
                body: JSON.stringify(details),
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    alert('Order Completed');
                    window.location.href = 'index.php';
                } else {
                    alert('Failed to complete order: ' + data);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error ocurred while making an order');
            });
        });    
        </script>
</body>
</html>