<?php
include_once("templates/head.php");
include_once("templates/header.php");
include_once("templates/footer.php");
include_once("templates/register_errors.php");

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
            <div class="checkout-item">
                <div class="checkout-item-img">
                    <img src="./assets/shopping-cart.png" alt="item">
                </div>
                <div class="checkout-item-name">
                    Product Name
                </div>
                <div class="checkout-item-price">
                    0.00
                </div>
                <div class="checkout-item-quantity">
                    <span class="less">-</span>
                    <span>1</span>
                    <span class="more">+</span>
                </div>
            </div>
            <div class="checkout-total">
                <p>Total: 0.00</p>
            </div>
            <div class="checkout-actions">
                <button>Checkout</button>
            </div>
        </div>

        <div class="shipping">
            <h1>SHIPPING ADDRESS</h1>
            <form>
                    <input type="text" placeholder="First Name*">
                    <input type="text" placeholder="Last Name*">
                    <input type="text" placeholder="Address*">
                    <input type="text" placeholder="Apt, Suite">
                    <input type="text" placeholder="City">
                    <input type="text" placeholder="Postal Code">
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
                    <button type="submit">Pay Now</button>
                </form>
            </div>
        </div>
    </div>
    <?php output_footer("EDU"); ?>

    <script>
        const modal = document.getElementById("paymentModal");
        const checkoutButton = document.querySelector('.checkout-actions button');
        const closeBtn = document.querySelector('.close-checkout-btn');

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
    </script>
</body>
</html>